<?php
/**
 * Application level Controller
 *
 * This file is application-wide controller file. You can put all
 * application-wide controller-related methods here.
 *
 * CakePHP(tm) : Rapid Development Framework (http://cakephp.org)
 * Copyright (c) Cake Software Foundation, Inc. (http://cakefoundation.org)
 *
 * Licensed under The MIT License
 * For full copyright and license information, please see the LICENSE.txt
 * Redistributions of files must retain the above copyright notice.
 *
 * @copyright     Copyright (c) Cake Software Foundation, Inc. (http://cakefoundation.org)
 * @link          http://cakephp.org CakePHP(tm) Project
 * @package       app.Controller
 * @since         CakePHP(tm) v 0.2.9
 * @license       http://www.opensource.org/licenses/mit-license.php MIT License
 */

App::uses('Controller', 'Controller');

/**
 * Application Controller
 *
 * Add your application-wide methods in the class below, your controllers
 * will inherit them.
 *
 * @package		app.Controller
 * @link		http://book.cakephp.org/2.0/en/controllers.html#the-app-controller
 */
class AppController extends Controller {
    
    public $components = array(
        'Flash',
        'Auth' => array(
            'loginRedirect' => array(
                'controller' => 'departments',
                'action' => 'index'
            ),
            'logoutRedirect' => array(
                'controller' => 'users',
                'action' => 'login'
            ),
            'authenticate' => array(
                'Form' => array(
                    'passwordHasher' => 'Blowfish'
                )
            )
        ),
        'Session'
    );

    public function beforeRender() 
    {
        if ($this->Session->read('Auth.User')) {
            $this->set('user', $this->Session->read('Auth.User'));
        }
    }
    
    /**
     * uploads files to the server
     */
    protected function uploadFiles($folder, $formdata, $itemId = null) {
        // setup dir names absolute and relative
        $folder_url = WWW_ROOT.$folder;
        $rel_url = $folder;

        // create the folder if it does not exist
        if(!is_dir($folder_url)) {
            mkdir($folder_url);
        }

        // if itemId is set create an item folder
        if($itemId) {
            // set new absolute folder
            $folder_url = WWW_ROOT.$folder.'/'.$itemId;
            // set new relative folder
            $rel_url = $folder.'/'.$itemId;
            // create directory
            if(!is_dir($folder_url)) {
                mkdir($folder_url);
            }
        }

        // list of permitted file types, this is only images but documents can be added
        $permitted = array('image/gif','image/jpeg','image/pjpeg','image/png');

        // loop through and deal with the files
        foreach($formdata as $file) {
            // replace spaces with underscores
            $filename = str_replace(' ', '_', $file['name']);
            // assume filetype is false
            $typeOK = false;
            // check filetype is ok
            foreach($permitted as $type) {
                if($type == $file['type']) {
                    $typeOK = true;
                    break;
                }
            }

            // if file type ok upload the file
            if($typeOK) {
                // switch based on error code
                switch($file['error']) {
                    case 0:
                        // check filename already exists
                        if(!file_exists($folder_url.'/'.$filename)) {
                            $full_url = $folder_url.'/'.$filename;
                            $url = $rel_url.'/'.$filename;
                            $success = move_uploaded_file($file['tmp_name'], $url);
                        } else {
                            // create unique filename and upload file
                            ini_set('date.timezone', 'UTC');
                            $now = date('YmdHis');
                            $full_url = $folder_url.'/'.$now.$filename;
                            $url = $rel_url.'/'.$now.$filename;
                            $success = move_uploaded_file($file['tmp_name'], $url);
                        }
                        // if upload was successful
                        if($success) {
                            $result['urls'][] = $url;
                        } else {
                            $result['errors'][] = "Error uploaded $filename. Please try again.";
                        }
                        break;
                    case 3:
                        $result['errors'][] = "Error uploading $filename. Please try again.";
                        break;
                    default:
                        $result['errors'][] = "System error uploading $filename. Contact webmaster.";
                        break;
                }
            } elseif($file['error'] == 4) {
                $result['nofiles'][] = "No file Selected";
            } else {
                $result['errors'][] = "$filename cannot be uploaded. Acceptable file types: gif, jpg, png.";
            }
        }
        return $result;
    }
    
    protected function checkImage ($name) {
        if ( $name == '' || file_exists('img/upload/'.$name )) {
            $name = 'img/upload/noimage.png';
        }
        return $name;
    }
}

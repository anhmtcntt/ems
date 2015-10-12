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
    protected function uploadFiles($folder, $file) {
        // setup dir names absolute and relative
        $folder_url = WWW_ROOT.$folder;
        $rel_url = 'upload';

        // create the folder if it does not exist
        if(!is_dir($folder_url)) {
            mkdir($folder_url);
        }

        // list of permitted file types, this is only images but documents can be added
        $permitted = array("image/gif","image/jpeg","image/pjpeg","image/png");
       
        // replace spaces with underscores
        $filename = str_replace(' ', '_', $file['name']);
        $filetype = $file['type'];

        // assume filetype is false
        $typeOK = false;
        // check filetype is ok
        if (in_array($filetype, $permitted)) {
            $typeOK = true;
        }
        // if file type ok upload the file
        if ($typeOK) {
            // switch based on error code
            switch($file['error']) {
                case UPLOAD_ERR_OK:
                    // check file exists
                    if (file_exists($folder_url.DS.$filename)) {
                        $now = date('YmdHis');
                        $filename = $now.$filename;
                    }
                    $full_url = $folder.DS.$now.$filename;
                    
                    $success = move_uploaded_file($file['tmp_name'], $full_url);

                    // if upload was successful
                    if ($success) {
                        $result['urls'] = $rel_url.DS.$filename;
                    } else {
                        $result['errors'] = "Error uploaded {$filename} Please try again.";
                    }
                    break;
                case UPLOAD_ERR_PARTIAL:
                    $result['errors'] = "Error uploading {$filename} Please try again.";
                    break;
                case UPLOAD_ERR_NO_FILE:
                    $result['errors'] = "No file selected";
                    break;
                default:
                    $result['errors'] = "System error uploading {$filename} Contact webmaster.";
                    break;
            }
        } else {
            $result['errors'] = "{$filename} cannot be uploaded. Acceptable file types: gif, jpg, png.";
        }
        return $result;
    }
}

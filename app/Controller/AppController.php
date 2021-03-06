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
        if ($this->Auth->user()) {
            $this->set('user', $this->Auth->user());
        }
    }
    
    /**
     * uploads files to the server
     */
    protected function uploadFile($folder, $file) 
    {
        // Always upload to img folder
        $folder_path = WWW_ROOT.'img'.DS.$folder;

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
                    // create the folder if it does not exist
                    if(!is_dir($folder_path)) {
                        mkdir($folder_path, '0744', true);
                    }
                    // check file exists
                    if (file_exists($folder_path.DS.$filename)) {
                        $now = date('YmdHis');
                        $filename = $now.$filename;
                    }
                    $success = move_uploaded_file($file['tmp_name'], $folder_path.DS.$filename);

                    // if upload was successful
                    if ($success) {
                        $result['url'] = str_replace('\\', '/', "{$folder}/{$filename}");
                    } else {
                        $result['error'] = "Error uploaded {$filename} Please try again.";
                    }
                    break;
                case UPLOAD_ERR_PARTIAL:
                    $result['error'] = "Error uploading {$filename} Please try again.";
                    break;
                case UPLOAD_ERR_NO_FILE:
                    $result['error'] = "No file selected";
                    break;
                default:
                    $result['error'] = "System error uploading {$filename} Contact webmaster.";
                    break;
            }
        } else {
            $result['error'] = "{$filename} cannot be uploaded. Acceptable file types: gif, jpg, png.";
        }
        return $result;
    }
}

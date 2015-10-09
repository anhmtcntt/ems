<?php
/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
App::uses('AppController', 'Controller');

class UsersController extends AppController 
{   
    public $helpers = array('Html', 'Form');
    public $component = array('Session');
    
    public function beforeFilter() {
       parent::beforeFilter();
       $this->Auth->allow('add');
    }
    
    public function index()
    {
        echo "abc";
        var_dump($this->Session->read('Auth.User'));
    }
    
    public function login() 
    {   
        $this->layout = 'login';
        if ($this->request->is('post')) {
            if ($this->Auth->login()) {
                return $this->redirect($this->Auth->redirectUrl());
            }
            $this->Session->setFlash('Invalid username or password, try again','login_error');
        }
    }
    
    public function logout()
    {
        $this->autoRender = false;
        $this->Session->destroy();
        $this->redirect($this->Auth->redirectUrl());
    }

    public function add() {
        if ($this->request->is('post')) {
            $this->User->create();
            if ($this->User->save($this->request->data)) {
                $this->Flash->success(__('The user has been saved'));
                return $this->redirect(array('action' => 'login'));
            }
            $this->Session->setFlash('The user could not be saved. Please, try again.','error');
        }
    }
    
}
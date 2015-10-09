<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

class DepartmentsController extends AppController 
{
    public $uses = array('Department','Employee');
    
    public function index()
    {
        $total = $this->Department->find('count');
        $pagemax = ceil($total/10);
        $data = $this->Department->find('all',array('limit'=> 10));
        
        //set view
        $this->set('pagemax',$pagemax);
        $this->set('data',$data);
    }
    
    public function add()
    {
        $employ = $this->Employee->find('list');
        if ($this->request->is('post')) {
            if (!$this->Department->validates()) {
                if ($this->Department->save( $this->request->data )) {
                    $this->Session->setFlash('Save success!','success');
                    $this->redirect(['action' => 'index']);
                } 
            }
        }
        $this->set('employ',$employ);
    }
    
    public function delete($id)
    {
        //check employee exists
        if (!$this->Department->exists($id)) {
            throw new NotFoundException();
        }
        
        if ($this->Department->delete($id)) {
            $this->Session->setFlash('Delete success!','success');
                    $this->redirect(['action' => 'index']);
        } else {
            throw new InternalErrorException();
        }
    }
    
    public function edit($id) 
    {
        //check employee exists
        if (!$this->Department->exists($id)) {
            throw new NotFoundException();
        }
        $data = $this->Department->findById($id);
        $employ = $this->Employee->find('list');
        
        if ($this->request->is('post'))
        {
            if (!$this->Department->validates()) {
                
                if ($this->Department->save( $this->request->data )) {
                    $this->Session->setFlash('Edit success!','success');
                    $this->redirect(['action' => 'index']);
                } 
            }
        }
        
        //set view 
        $this->set('data',$data);
        $this->set('employ',$employ);
    }
    
    public function detail($id) 
    {
        //check employee exists
        if (!$this->Department->exists($id)) {
            throw new NotFoundException();
        }
        $data = $this->Department->findById($id);
        
        //set view 
        $this->set('data',$data);
    }
    
    public function search()
    {
        $this->layout = false;

        if ( $this->request->isAjax() ) {
            $data = $this->Department->search($this->request->data);
            $total = $this->Department->find('count');
            $pagemax = ceil($total/$this->request->data['page_size']);
            $this->set('data', $data);
            $this->set('total', $total);
            $this->set('pagemax', $pagemax);
            $this->set('default', $this->request->data);
        }
    }
    
}
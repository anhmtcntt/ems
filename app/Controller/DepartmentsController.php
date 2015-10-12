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
        $data = $this->Department->find('all');

        //set view
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

        // Prepare department data for form on enter edit screen
        if (empty($this->request->data)) {
	    $this->request->data = $this->Department->findById($id);
	}

	// Get manager list for view
        $managers = $this->Employee->find('list');
        $this->set('managers',$managers);

	// Update department
        if ($this->request->is('post')) {
	    $updated = $this->Department->update($id, $this->request->data);
	    
	    // Success
	    if ($updated != false) {
		$this->Session->setFlash('Edit success!', 'success');
		return $this->redirect(['action' => 'index']);
	    }
	    
	    // Failed
	    $this->Session->setFlash('Unable to update department.');
	}
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

            $this->set('data', $data);
        }
    }

}

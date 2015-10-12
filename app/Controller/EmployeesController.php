<?php

class EmployeesController extends AppController 
{
    const PHOTO_FOLDER = 'upload';

    public $uses = array('Employee', 'Department');
    
    
    public function index()
    {
        $data = $this->Employee->find('all');
        
        //set view
        $this->set('data',$data);
    }
    
    public function add()
    {
        // Get department list
        $department = $this->Department->find('list');
        $this->set('department',$department);
        
        if ($this->request->is('post')) {
            $data = $this->request->data;
            
            // Process upload photo if exists
            if (!empty($data['Employee']['photo']['name'])) {
                $upload   = $data['Employee']['photo'];
                $result   = $this->uploadFile(self::PHOTO_FOLDER, $upload);
                if (isset($result['error'])) {
                    $this->Flash->error($result['error']);
                    unset($this->request->data['Employee']['photo']);
                    return;
                }
                $data['Employee']['photo'] = $result['url'];
            }


            if ($this->Employee->add($data)) {
                $this->Flash->success('Add new employee success!');
                $this->redirect(['action' => 'index']);
            }

            $this->Flash->error('Unable to add new employee.');
        }
    }
    
    public function delete($id)
    {
        //check employee exists
        if (!$this->Employee->exists($id)) {
            throw new NotFoundException();
        }
        
        if ($this->Employee->delete($id)) {
            $this->Flash->success('Delete success!');
            $this->redirect(['action' => 'index']);
        } else {
            throw new InternalErrorException();
        }
    }
    
    public function edit($id) 
    {
        //check employee exists
        if (!$this->Employee->exists($id)) {
            throw new NotFoundException();
        }
        
        // Get department list
        $department = $this->Department->find('list');
        $this->set('department', $department);
        
        // Prepare employees data for form on enter edit screen
        if (empty($this->request->data)) {
	    $this->request->data = $this->Employee->findById($id);
            $this->request->data['Employee']['oldphoto'] = $this->request->data['Employee']['photo'];
	}
        
        if ($this->request->is('post'))
        {
            $data = $this->request->data;
            
            // Process upload photo if exists
            if (!empty($data['Employee']['photo']['name'])) {
                $upload   = $data['Employee']['photo'];
                $result   = $this->uploadFile(self::PHOTO_FOLDER, $upload);
                if (isset($result['error'])) {
                    $this->Flash->error($result['error']);
                    unset($this->request->data['Employee']['photo']);
                    return;
                }
                $data['Employee']['photo'] = $result['url'];
            }
            
            if ($this->Employee->update($id, $data)) {
                // TODO: delete old photo file if changed
                
                $this->Flash->success('Edit success!');
                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error('Unable to update employee.');
        }
    }
    
    public function detail($id) 
    {
        //check employee exists
        if (!$this->Employee->exists($id)) {
            throw new NotFoundException();
        }
        $data = $this->Employee->findById($id);
        
        //set view 
        $this->set('data', $data);
    }
}
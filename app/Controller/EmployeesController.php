<?php
define ('PHOTO_FOLDER',"img/upload");

class EmployeesController extends AppController 
{
    public $uses = array('Employee','Department');
    
    
    public function index()
    {
        $data = $this->Employee->find('all');
        
        //set view
        $this->set('data',$data);
    }
    
    public function add()
    {
        $department = $this->Department->find('list');
        
        if ($this->request->is('post')) {
            $data = $this->request->data;
            $filename = $data['Employee']['photo']['name'];
            $uploadOk = true;
            // upload file if exists
            if ($filename != '') {
                $upload = $data['Employee']['photo'];
                $result = $this->uploadFile(PHOTO_FOLDER, $upload);
                if (isset($result['error'])) {
                    $uploadOk = false;
                    $this->Flash->error($result['error']);
                } else {
                    $filename = $result['url'];
                }
            }
            $data['Employee']['photo'] = $filename;
            
            if ($uploadOk && $this->Employee->add( $data )) {
                $this->Flash->success('Add new employee success!');
                $this->redirect(['action' => 'index']);
            } 
            
            $this->Flash->error('Unable to add new employee.');
        }
        
        //set view 
        $this->set('department',$department);
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
        //set default data
        $department = $this->Department->find('list');
        
        // Prepare employees data for form on enter edit screen
        if (empty($this->request->data)) {
	    $this->request->data = $this->Employee->findById($id);
	}
        
        if ($this->request->is('post'))
        {
            $data = $this->request->data;
            $filename = $data['Employee']['photo']['name'];
            $uploadOk = true;
            // upload file if exists
            if ($filename != '') {
                $upload = $data['Employee']['photo'];
                $result = $this->uploadFile(PHOTO_FOLDER, $upload);
                if (isset($result['errors'])) {
                    $uploadOk = false;
                    $this->Flash->error($result['error']);
                } else {
                    $data['Employee']['photo'] = $result['url'];
                }
            } else {
                //if filename not exists, dont update this field
                unset($data['Employee']['photo']);
            }
            if ($uploadOk && $this->Employee->update($id,$data)) {
                $this->Flash->success('Edit success!');
                $this->redirect(['action' => 'index']);
            } else {
                if (file_exists('img'.DS.$filename)) {
                    unlink('img'.DS.$filename);
                }
                $this->Flash->error('Unable to update employee.');
            }
        }
        
        //set view 
        $this->set('department',$department);
    }
    
    public function detail($id) 
    {
        //check employee exists
        if (!$this->Employee->exists($id)) {
            throw new NotFoundException();
        }
        $data = $this->Employee->findById($id);
        
        //set view 
        $this->set('data',$data);
    }
}
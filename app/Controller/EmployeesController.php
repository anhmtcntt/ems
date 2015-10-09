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
            if (!$this->Employee->validates()) {
                $data = $this->request->data;
                $filename = $data['Employee']['photo']['name'];
                $uploadOk = true;
                // upload file if exists
                if ($filename != '') {
                    $upload['photo'] = $data['Employee']['photo'];
                    $result = $this->uploadFiles(PHOTO_FOLDER, $upload);
                    if (isset($result['errors'])) {
                        $uploadOk = false;
                        $this->Session->setFlash($result['errors'][0]);
                    } else {
                        $data['Employee']['photo'] = $result['urls'][0];
                    }
                }
                if ($uploadOk && $this->Employee->save( $data )) {
                    $this->Session->setFlash('Save success!','success');
                    $this->redirect(['action' => 'index']);
                } 
            }
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
            $this->Session->setFlash('Delete success!','success');
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
        $data = $this->Employee->findById($id);
        
        if ($this->request->is('post'))
        {
            if (!$this->Employee->validates()) {
                $data = $this->request->data;
                $filename = $data['Employee']['photo']['name'];
                $uploadOk = true;
                // upload file if exists
                if ($filename != '') {
                    $upload['photo'] = $data['Employee']['photo'];
                    $result = $this->uploadFiles(PHOTO_FOLDER, $upload);
                    if (isset($result['errors'])) {
                        $uploadOk = false;
                        $this->Session->setFlash($result['errors'][0]);
                    } else {
                        $data['Employee']['photo'] = $result['urls'][0];
                    }
                } else {
                    //if filename not exists, dont update this field
                    unset($data['Employee']['photo']);
                }
                
                if ($this->Employee->save( $data )) {
                    $this->Session->setFlash('Edit success!','success');
                    $this->redirect(['action' => 'index']);
                } 
            }
        }
        
        //set view 
        $this->set('department',$department);
        $this->set('data',$data);
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
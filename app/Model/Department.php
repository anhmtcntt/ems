<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

class Department extends AppModel
{

    public $validate = array(
        'name' => array(
            'minLength' => array(
                'rule'     => array('minLength', '8'),
                'required' => true,
                'message'  => 'Minimum 8 characters long'
            ),
            'unique'    => array(
                'rule'     => 'isUnique',
                'required' => 'create',
                'message'  => 'Department name is unique'
            ),
        ),
    );
    public $hasMany  = array(
        'Employee' => array(
            'className'  => 'Employee',
            'foreignKey' => 'department_id'
        )
    );

    public function search($keyword)
    {
        $conditions = '';
        if ($keyword != '') {
            $conditions = array('Department.name LIKE' => '%' . $keyword . '%');
        }

        return $this->find('all', array(
                    'conditions' => $conditions
        ));
    }

    /**
     * Update Department
     * 
     * @param int $id Department Id
     * @param array $data Department data to update
     * @return mixed Department data on success, false on failure
     */
    public function update($id, $data)
    {
        $this->id = $id;
        return $this->save($data);
    }

    /**
     * Add Department
     * 
     * @param array $data Department data to add
     * @return mixed Department data on success, false on failure
     */
    public function add($data = array())
    {
        $this->create();
        return $this->save($data);
    }

}

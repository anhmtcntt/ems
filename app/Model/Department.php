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
                'rule' => array('minLength', '8'),
                'required' => true,
                'message' => 'Minimum 8 characters long'
            ),
            'unique' => array(
                'rule' => 'isUnique',
                'required' => 'create',
                'message' => 'Department name is unique'
            ),
        ),
    );
    
    public $hasMany = array(
        'Employee' => array(
            'className' => 'Employee',
            'foreignKey' => 'department_id'
        )
    );
    
    public function search($arr){
        $conditions = '';
        if ($arr['keyword'] != '') {
            $conditions = array('Department.name LIKE' => '%' . $arr['keyword'] . '%');
        }
        
        return $this->find('all',array(
            'conditions' => $conditions,
            'limit'     => $arr['page_size'],
            'offset'    => (($arr['page'] - 1) * $arr['page_size'])
        ));
    }
}
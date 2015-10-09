<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

class Employee extends AppModel
{
    public $validate = array(
        'employee_cd' => array(
            'required' => array(
                'rule' => 'notBlank',
                'required' => true,
                'message' => 'Please enter employee code'
            ),
            'unique' => array(
                'rule' => 'isUnique',
                'required' => 'create',
                'message' => 'Employee code is exists'
            )
        ),
        'name' => array(
            'minLength' => array(
                'rule' => array('minLength', '8'),
                'required' => true,
                'message' => 'Minimum 8 characters long'
            )
        ),
        'email' => array(
            'rule' => 'email',
            'message' => 'Please supply a valid email address.'
        ),
        'tel' => array(
            'rule' => 'numeric',
            'message' => 'Please enter number only'
        ),
        'department_id' => array(
            'rule' => 'notBlank',
            'required' => true,
            'message' => 'Please select department'
        )
    );
    
    public $belongsTo = array(
        'Department' => array(
            'className' => 'Department',
            'foreignKey' => 'department_id',
            'fields' => array('Department.id','Department.name')
        )
    );
}
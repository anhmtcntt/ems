<div class="pageheader">
    <div class="media">
        <div class="pageicon pull-left">
            <i class="fa fa-plus-circle"></i>
        </div>
        <div class="media-body left-80">
            <ul class="breadcrumb">
                <li><i class="glyphicon glyphicon-home"></i></li>
                <li>Edit</li>
            </ul>
            <h5>EDIT EMPLOYEE</h5>
        </div>
    </div>
</div>

<div class="contentpanel">
    <?php echo $this->Flash->render();?>
    <div class="col-md-12">
        <?php 
        echo $this->Form->create('Employee', array(
            'type'          => 'file', 
            'id'            => 'addForm', 
            'novalidate'    => 'novalidate',
            'inputDefaults' => array(
              'div'   => false,
              'label' => false,
          ),
        )); 
        ?>
            <div class="panel panel-default">
                <div class="panel-body">
                    <div class="row">
                        <div class="form-group">
                            <label class="col-sm-3 control-label">Department <span class="asterisk color-red">*</span></label>
                            <div class="col-sm-9">
                                <?php echo $this->Form->input('department_id', array(
                                    'options'   => $department,
                                    'empty'     => 'Select Department',
                                    'id'        => 'department',
                                    'class'     => 'province-select',
                                ));
                                ?>
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="col-sm-3 control-label">Employee Code <span class="asterisk color-red">*</span></label>
                            <div class="col-sm-9">
                                <?php echo $this->Form->input('employee_cd',
                                    array('class' => 'form-control',
                                    'placeholder' => 'Type your employee code...'
                                    ));
                                ?>
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="col-sm-3 control-label">Name <span class="asterisk color-red">*</span></label>
                            <div class="col-sm-9">
                                <?php 
                                echo $this->Form->input('name',array(
                                    'class'         => 'form-control',
                                    'placeholder'   => 'Type your name...'
                                ));
                                ?>
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="col-sm-3 control-label">Email <span class="asterisk color-red">*</span></label>
                            <div class="col-sm-9">
                                <?php echo $this->Form->input('email',array(
                                    'class'         => 'form-control',
                                    'placeholder'   => 'Type your email...',
                                    'type'          => 'email',
                                    ));
                                ?>
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="col-sm-3 control-label">Phone</label>
                            <div class="col-sm-9">
                                <?php 
                                echo $this->Form->input('tel',array(
                                    'class'         => 'form-control',
                                    'placeholder'   => 'Type your phone number...',
                                    'type'          => 'text'
                                    ));
                                ?>
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="col-sm-3 control-label">Job</label>
                            <div class="col-sm-9">
                                <?php 
                                echo $this->Form->textarea('job', array(
                                    'rows' => '5', 
                                    'class' => 'form-control', 
                                    'placeholder' => 'Job title...'
                                ));
                                ?>
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="col-sm-3 control-label">Gender</label>
                            <div class="col-sm-9 gender">
                                <?php 
                                    echo $this->Form->radio('gender', array(
                                        '0' => 'Male', 
                                        '1' => 'Female'
                                    ), array(
                                        'legend'    => false
                                    ));
                                ?>
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="col-sm-3 control-label">Profile Picture</label>
                            <div class="col-sm-9">
                                <?php 
                                echo $this->Form->input('photo',array( 
                                    'type'  => 'file',  
                                    'id'    => 'pro-image'
                                )); 
                                ?>
                                <div class="div-pro-img">
                                    <?php echo $this->Html->image($this->request->data['Employee']['oldphoto'],array(
                                        'width' => '50px'
                                    ));?>
                                    <?php echo $this->Form->hidden('oldphoto');?>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                
                <div class="panel-footer">
                    <div class="row">
                        <div class="col-sm-9 col-sm-offset-3">
                            <?php echo $this->Form->submit('Submit', array('div' => false, 'class' => 'btn btn-primary mr5')); ?>
                            <?php echo $this->Html->link('Cancel', array('controller' => 'employees','action'=>'index'),array('class' => 'btn btn-dark')); ?>
                        </div>
                    </div>
                </div>
            </div>
    </div>
    <?php echo $this->Form->end(); ?>
</div>


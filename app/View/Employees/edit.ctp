<div class="pageheader">
    <div class="media">
        <div class="pageicon pull-left">
            <i class="fa fa-plus-circle"></i>
        </div>
        <div class="media-body left-80">
            <ul class="breadcrumb">
                <li><a href="/staff"><i class="glyphicon glyphicon-home"></i></a></li>
                <li>Edit</li>
            </ul>
            <h5>EDIT EMPLOYEE</h5>
        </div>
    </div>
</div>

<div class="contentpanel">
    <?php echo $this->Flash->render();?>
    <div class="col-md-12">
        <?php echo $this->Form->create('Employee', array('type' => 'file', 'id' => 'addForm', 'novalidate' => 'novalidate')); ?>
            <div class="panel panel-default">
                <div class="panel-body">
                    <div class="row">
                        <div class="form-group">
                            <label class="col-sm-3 control-label">Department <span class="asterisk color-red">*</span></label>
                            <div class="col-sm-9">
                                <?php echo $this->Form->input('department_id', array(
                                    'options' => $department,
                                    'empty' => 'Select Department',
                                    'id' => 'department',
                                    'label' => false,
                                    'class' => 'province-select',
                                    'div' => false,
                                    'selected' => $data['Employee']['department_id']
                                ));
                                ?>
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="col-sm-3 control-label">Employee Code <span class="asterisk color-red">*</span></label>
                            <div class="col-sm-9">
                                <?php echo $this->Form->input('employee_cd',
                                    array('class' => 'form-control',
                                    'placeholder' => 'Type your employee code...',
                                    'label' => false,
                                    'div' => false,
                                    'value' => $data['Employee']['employee_cd']
                                    ));
                                ?>
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="col-sm-3 control-label">Name <span class="asterisk color-red">*</span></label>
                            <div class="col-sm-9">
                                <?php echo $this->Form->input('name',
                                    array('class' => 'form-control',
                                    'placeholder' => 'Type your name...',
                                    'label' => false,
                                    'div' => false,
                                    'required' => 'required',
                                    'value' => $data['Employee']['name']
                                ));?>
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="col-sm-3 control-label">Email <span class="asterisk color-red">*</span></label>
                            <div class="col-sm-9">
                                <?php echo $this->Form->input('email',
                                    array('class' => 'form-control',
                                    'placeholder' => 'Type your email...',
                                    'label' => false,
                                    'div' => false,
                                    'type' => 'email',
                                    'required' => 'required',
                                    'value' => $data['Employee']['email']));?>
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="col-sm-3 control-label">Phone</label>
                            <div class="col-sm-9">
                                <?php echo $this->Form->input('tel',
                                    array('class' => 'form-control',
                                    'placeholder' => 'Type your phone number...',
                                    'label' => false,
                                    'div' => false,
                                    'type' => 'text',
                                    'value' => $data['Employee']['tel']));?>
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="col-sm-3 control-label">Job</label>
                            <div class="col-sm-9">
                                <?php echo $this->Form->textarea('job', array('rows' => '5', 'class' => 'form-control', 'placeholder' => 'Job title...'));?>
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="col-sm-3 control-label">Gender</label>
                            <div class="col-sm-9 gender">
                                <div class="rdio rdio-primary">
                                    <input type="radio" id="male" value="0" name="data[Employee][gender]" <?php if ($data['Employee']['gender'] == 0) { echo "checked='checked'";} ?> class="valid">
                                    <label for="male">Male</label>
                                </div>
                                <div class="rdio rdio-primary">
                                    <input type="radio" value="1" id="female" name="data[Employee][gender]" <?php if ($data['Employee']['gender'] == 1) { echo "checked='checked'";} ?> class="valid">
                                    <label for="female">Female</label>
                                </div>
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="col-sm-3 control-label">Profile Picture</label>
                            <div class="col-sm-9">
                                <?php echo $this->Form->input('photo',array( 'type' => 'file', 'label'=> false, 'div'=> false, 'id'=>'pro-image')); ?>
                                <div class="div-pro-img"><img class="pro-img"/></div>
                            </div>
                        </div>
                    </div>
                </div>
                
                <?php echo $this->Form->hidden('id', array('value' => $data['Employee']['id']));?>
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


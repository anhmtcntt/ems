<div class="pageheader">
  <div class="media">
    <div class="pageicon pull-left">
      <i class="fa fa-plus-square"></i>
    </div>
    <div class="media-body left-80">
      <ul class="breadcrumb">
        <li><i class="glyphicon glyphicon-home"></i></li>
        <li>Action</li>
      </ul>
      <h5>EDIT DEPARTMENT</h5>
    </div>
  </div>
</div>

<div class="contentpanel">
  <div class="col-md-12">
      <?php
      echo $this->Form->create('Department', array(
          'id'            => 'addDepartment',
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
            <label class="col-sm-3 control-label">Name <span class="asterisk color-red">*</span></label>
            <div class="col-sm-9">
                <?php
                echo $this->Form->input('name', array(
                    'class'       => 'form-control',
                    'placeholder' => 'Name',
                    'type'        => 'text',
                ));
                ?>
            </div>
          </div>

          <div class="form-group">
            <label class="col-sm-3 control-label">Telephone</label>
            <div class="col-sm-9">
                <?php
                echo $this->Form->input('tel', array(
                    'class'       => 'form-control',
                    'placeholder' => 'Telephone number',
                    'type'        => 'text',
                ));
                ?>
            </div>
          </div>

          <div class="form-group">
            <label class="col-sm-3 control-label">Manager</label>
            <div class="col-sm-9">
                <?php
                echo $this->Form->input('employee_id', array(
                    'options' => $managers,
                    'empty'   => 'Select Manager',
                    'id'      => 'department',
                ));
                ?>
            </div>
          </div>
          <div class="panel-footer">
            <div class="row">
              <div class="col-sm-9 col-sm-offset-3">
                <?php echo $this->Form->submit('Update', array('class' => 'btn btn-primary mr5', 'div' => false)); ?>
                <?php echo $this->Html->link('Cancel', array('controller' => 'departments', 'action' => 'index'), array('class' => 'btn btn-dark')); ?>
              </div>
            </div>
          </div>
        </div>
      </div>
      <?php echo $this->Form->end(); ?>
    </div>
  </div>
</div>

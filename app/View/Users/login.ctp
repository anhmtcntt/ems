<div class="panel panel-signin login-panel">
    <div class="panel-body">
        <div class="logo text-center login-header">
            Login Page
         </div>
        <br>
         <p class="text-center login-text">Enter your username and password</p>

        <div class="mb10"></div>
        <div class="errorForm"><?php echo $this->Session->flash(); ?></div>

        <?php echo $this->Form->create('User', array('type' => 'post', 'id' => 'loginForm')); ?>
        <div class="input-group mb15">
            <span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
            <?php echo $this->Form->input('username',
                array('class' => 'form-control'
                , 'placeholder' => 'Username'
                , 'label' => false
                , 'div' => false));?>
        </div>
        <div class="input-group mb15">
            <span class="input-group-addon"><i class="glyphicon glyphicon-lock"></i></span>
            <?php echo $this->Form->input('password',
                array('class' => 'form-control'
                , 'placeholder' => 'Password'
                , 'label' => false
                ,  'div' => false
                , 'type' => 'password')); ?>
        </div>

        <div class="clearfix">
            <div class="pull-left"></div>
            <div class="pull-right">
                <?php echo $this->Form->button('Login <i class="fa fa-angle-right ml5"></i>', array('type' => 'submit', 'class' => 'btn btn-success')); ?>
            </div>
        </div>
        <?php echo $this->Form->end(); ?>
    </div>
</div>


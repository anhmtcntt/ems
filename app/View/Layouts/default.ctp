<!DOCTYPE html>
<!-- saved from url=(0042)http://themepixels.com/demo/webpage/chain/ -->
<html lang="en" class=" js flexbox flexboxlegacy canvas canvastext webgl no-touch geolocation postmessage websqldatabase indexeddb hashchange history draganddrop websockets rgba hsla multiplebgs backgroundsize borderimage borderradius boxshadow textshadow opacity cssanimations csscolumns cssgradients cssreflections csstransforms csstransforms3d csstransitions fontface generatedcontent video audio localstorage sessionstorage webworkers applicationcache svg inlinesvg smil svgclippaths">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>EMPLOYEE MANAGEMENT SYSTEM</title>

    <?php echo $this->Html->css(array('style.default', 'morris', 'select2','style.datatables','dataTables.responsive','public')); ?>

    <!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
    <script src="js/html5shiv.js"></script>
    <script src="js/respond.min.js"></script>
    <![endif]-->
</head>
<body class=" pace-done">
<div class="pace  pace-inactive"><div class="pace-progress" data-progress-text="100%" data-progress="99" style="width: 100%;">
        <div class="pace-progress-inner"></div>
    </div>
    <div class="pace-activity"></div></div>

<header>
    <div class="headerwrapper">
        <div class="header-left">
            <div class="pull-right">
                <a href="#" class="menu-collapse">
                    <i class="fa fa-bars"></i>
                </a>
            </div>
        </div>

        <div class="header-right">
            <div class="pull-right">
                <div class="btn-group btn-group-option">
                    <button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown">
                        <i class="fa fa-caret-down"></i>
                    </button>
                    <ul class="dropdown-menu pull-right" role="menu">
                        <li class="divider"></li>
                        <li><?php echo $this->Html->link('<i class="glyphicon glyphicon-log-out"></i>Sign Out',array('controller' => 'users','action'=>'logout'),array('escape' => false)); ?></li>
                    </ul>
                </div>
            </div>
        </div>

    </div>
</header>

<section>
    <div class="mainwrapper">
        <div class="leftpanel">
            <div class="media profile-left">
                <a class="pull-left profile-thumb" href="#">
                    <?php echo $this->Html->image('noimage.png', array('alt' => 'profile image', 'class' => 'img-circle'));?>
                </a>
                <div class="media-body">
                    <h4 class="media-heading"><?php echo $user['username']; ?></h4>
                    <small class="text-muted"></small>
                </div>
            </div><!-- media -->

            <h5 class="leftpanel-title">Menu</h5>
            <ul class="nav nav-pills nav-stacked">
                <li><a href="<?php echo $this->webroot; ?>departments"><i class="fa fa-stumbleupon-circle"></i> <span>Department</span></a></li>
                <li><a href="<?php echo $this->webroot; ?>employees"><i class="fa fa-edit"></i> <span>Employee</span></a></li>
            </ul>

        </div><!-- leftpanel -->
        <div class="mainpanel">
            <?php echo $this->fetch('content'); ?>
        </div><!-- mainpanel -->
        
    </div><!-- mainwrapper -->
</section>

<?php echo $this->Html->script(
        array('analytics', 
            'jquery-1.11.1.min', 
            'jquery-migrate-1.2.1.min',
            'jquery-ui-1.10.3.min',
            'bootstrap.min',
            'modernizr.min',
            'pace.min',
            'retina.min',
            'jquery.cookies',
            'jquery.validate',
            'jquery.flot.min',
            'jquery.flot.resize.min',
            'jquery.flot.spline.min',
            'jquery.sparkline.min',
            'morris.min',
            'raphael-2.1.0.min',
            'bootstrap-wizard.min',
            'jquery.dataTables.min',
            'dataTables.bootstrap',
            'dataTables.responsive',
            'select2.min',
            'custom',
            'dashboard',
            'public'
    ));?>

<span role="status" aria-live="polite" class="select2-hidden-accessible"></span><span role="status" aria-live="polite" class="select2-hidden-accessible"></span><span role="status" aria-live="polite" class="select2-hidden-accessible"></span></body></html>
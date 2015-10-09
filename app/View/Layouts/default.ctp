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

    <link href="<?php echo $this->webroot.'css/style.default.css'; ?>" rel="stylesheet">
    <link href="<?php echo $this->webroot.'css/morris.css'; ?>" rel="stylesheet">
    <link href="<?php echo $this->webroot.'css/select2.css'; ?>" rel="stylesheet">
    <link href="<?php echo $this->webroot.'css/style.datatables.css'; ?>" rel="stylesheet">
    <link href="<?php echo $this->webroot.'css/dataTables.responsive.css'; ?>" rel="stylesheet">
    <link href="<?php echo $this->webroot.'css/public.css'; ?>" rel="stylesheet">

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
            <a href="/staff" class="logo">
                <img class="home-logo" src="<?php echo $this->webroot.'img/logo.jpg'; ?>" alt="logo">
            </a>
            <div class="pull-right">
                <a href="" class="menu-collapse">
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
                        <li><a href="/users/changepasswd"><i class="glyphicon glyphicon-wrench"></i> Change Password</a></li>
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
                    <img class="img-circle" src="<?php echo $this->webroot;?>img/noimage.png" alt="profile image">
                </a>
                <div class="media-body">
                    <h4 class="media-heading"><?php echo $user['username']; ?></h4>
                    <small class="text-muted"></small>
                </div>
            </div><!-- media -->

            <h5 class="leftpanel-title">Menu</h5>
            <ul class="nav nav-pills nav-stacked">
                <li class=""><a href="<?php echo $this->webroot; ?>departments"><i class="fa fa-stumbleupon-circle"></i> <span>Department</span></a></li>
                <li class=""><a href="<?php echo $this->webroot; ?>employees"><i class="fa fa-edit"></i> <span>Employee</span></a></li>
            </ul>

        </div><!-- leftpanel -->
        <div class="mainpanel">
            <?php echo $this->fetch('content'); ?>
        </div><!-- mainpanel -->
        
    </div><!-- mainwrapper -->
</section>

<script async="" src="<?php echo $this->webroot.'js/analytics.js'; ?>"></script>
<script src="<?php echo $this->webroot.'js/jquery-1.11.1.min.js'; ?>"></script>
<script src="<?php echo $this->webroot.'js/jquery-migrate-1.2.1.min.js'; ?>"></script>
<script src="<?php echo $this->webroot.'js/jquery-ui-1.10.3.min.js'; ?>"></script>
<script src="<?php echo $this->webroot.'js/bootstrap.min.js'; ?>"></script>
<script src="<?php echo $this->webroot.'js/modernizr.min.js'; ?>"></script>
<script src="<?php echo $this->webroot.'js/pace.min.js'; ?>"></script>
<script src="<?php echo $this->webroot.'js/retina.min.js'; ?>"></script>
<script src="<?php echo $this->webroot.'js/jquery.cookies.js'; ?>"></script>
<script src="<?php echo $this->webroot.'js/jquery.validate.js'; ?>"></script>
<script src="<?php echo $this->webroot.'js/jquery.flot.min.js'; ?>"></script>
<script src="<?php echo $this->webroot.'js/jquery.flot.resize.min.js'; ?>"></script>
<script src="<?php echo $this->webroot.'js/jquery.flot.spline.min.js'; ?>"></script>
<script src="<?php echo $this->webroot.'js/jquery.sparkline.min.js'; ?>"></script>
<script src="<?php echo $this->webroot.'js/morris.min.js'; ?>"></script>
<script src="<?php echo $this->webroot.'js/raphael-2.1.0.min.js'; ?>"></script>
<script src="<?php echo $this->webroot.'js/bootstrap-wizard.min.js'; ?>"></script>
<script src="<?php echo $this->webroot.'js/jquery.dataTables.min.js'; ?>"></script>
<script src="<?php echo $this->webroot.'js/dataTables.bootstrap.js'; ?>"></script>
<script src="<?php echo $this->webroot.'js/dataTables.responsive.js'; ?>"></script>
<script src="<?php echo $this->webroot.'js/select2.min.js'; ?>"></script>
<script src="<?php echo $this->webroot.'js/custom.js'; ?>"></script>
<script src="<?php echo $this->webroot.'js/dashboard.js'; ?>"></script>
<script src="<?php echo $this->webroot.'js/public.js'; ?>"></script>

<span role="status" aria-live="polite" class="select2-hidden-accessible"></span><span role="status" aria-live="polite" class="select2-hidden-accessible"></span><span role="status" aria-live="polite" class="select2-hidden-accessible"></span></body></html>
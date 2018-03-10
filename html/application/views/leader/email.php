<!DOCTYPE html>
<html lang="en">
<head><title>Email</title>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="cache-control" content="no-cache">
    <meta http-equiv="expires" content="Thu, 19 Nov 1900 08:52:00 GMT">
    <link rel="shortcut icon" href="<?=base_url();?>assets/images/icons/favicon.ico">
    <link rel="apple-touch-icon" href="<?=base_url();?>assets/images/icons/favicon.png">
    <link rel="apple-touch-icon" sizes="72x72" href="<?=base_url();?>assets/images/icons/favicon-72x72.png">
    <link rel="apple-touch-icon" sizes="114x114" href="<?=base_url();?>assets/images/icons/favicon-114x114.png">
    
    <!--Loading bootstrap css-->
    <link type="text/css" rel="stylesheet"
          href="http://fonts.googleapis.com/css?family=Open+Sans:400italic,400,300,700">
    <link type="text/css" rel="stylesheet" href="http://fonts.googleapis.com/css?family=Oswald:400,700,300">
    <link type="text/css" rel="stylesheet"
          href="<?=base_url();?>assets/vendors/jquery-ui-1.10.4.custom/css/ui-lightness/jquery-ui-1.10.4.custom.min.css">
    <link type="text/css" rel="stylesheet" href="<?=base_url();?>assets/vendors/font-awesome/css/font-awesome.min.css">
    <link type="text/css" rel="stylesheet" href="<?=base_url();?>assets/vendors/bootstrap/css/bootstrap.min.css">
    <link type="text/css" rel="stylesheet" href="<?=base_url();?>assets/vendors/bootstrap/css/bootstrap-rtl.min.css">
    <!--LOADING STYLESHEET FOR PAGE--><!--Loading style vendors-->
    <link type="text/css" rel="stylesheet" href="<?=base_url();?>assets/vendors/animate.css/animate.css">
    <link type="text/css" rel="stylesheet" href="<?=base_url();?>assets/vendors/jquery-pace/pace.css">
    <link type="text/css" rel="stylesheet" href="<?=base_url();?>assets/vendors/iCheck/skins/all.css">
    <link type="text/css" rel="stylesheet" href="<?=base_url();?>assets/vendors/jquery-notific8/jquery.notific8.min.css">
    <link type="text/css" rel="stylesheet" href="<?=base_url();?>assets/vendors/bootstrap-daterangepicker/daterangepicker-bs3.css">
    <!--Loading style-->
    <link type="text/css" rel="stylesheet" href="<?=base_url();?>assets/css/themes/style1/orange-blue.css" class="default-style">
    <link type="text/css" rel="stylesheet" href="<?=base_url();?>assets/css/themes/style1/orange-blue.css" id="theme-change"
          class="style-change color-change">
    <link type="text/css" rel="stylesheet" href="<?=base_url();?>assets/css/style-rtl.css">
    <link type="text/css" rel="stylesheet" href="<?=base_url();?>assets/css/style-responsive.css">
    <link type="text/css" rel="stylesheet" href="<?=base_url();?>assets/css/style-responsive-rtl.css">

</head>
<body class=" ">
<div>
    <!--BEGIN BACK TO TOP--><a id="totop" href="#"><i class="fa fa-angle-up"></i></a><!--END BACK TO TOP-->
    <!--BEGIN TOPBAR-->
    <?php  require_once 'include/top.php';?>
    <!--END TOPBAR-->
    <div id="wrapper"><!--BEGIN SIDEBAR MENU-->
        
        <?php  require_once 'include/left.php';?>

        <!--BEGIN PAGE WRAPPER-->
        <div id="page-wrapper"><!--BEGIN TITLE & BREADCRUMB PAGE-->
            <div id="title-breadcrumb-option-demo" class="page-title-breadcrumb">
                <div class="page-header pull-left">
                    <div class="page-title">Email</div>
                </div>
                <ol class="breadcrumb page-breadcrumb">
                    <li><i class="fa fa-home"></i>&nbsp;<a href="<?=base_url();?>leader/home">Home</a>&nbsp;&nbsp;<i
                            class="fa fa-angle-right"></i>&nbsp;&nbsp;</li>
                    <li><a href="#">Tables</a>&nbsp;&nbsp;<i class="fa fa-angle-right"></i>&nbsp;&nbsp;</li>
                    <li class="active">Email</li>
                </ol>
                <div class="btn btn-blue reportrange hide"><i class="fa fa-calendar"></i>&nbsp;<span></span>&nbsp;report&nbsp;<i
                        class="fa fa-angle-down"></i><input type="hidden" name="datestart"/><input type="hidden"
                                                                                                   name="endstart"/>
                </div>
                <div class="clearfix"></div>
            </div>
            <!--END TITLE & BREADCRUMB PAGE--><!--BEGIN CONTENT-->
            <div class="page-content">
                <div class="row">
                    <div class="col-sm-3 col-md-2">
                        <div class="btn-group btn-group-sm">
                            <button type="button" data-toggle="dropdown" class="btn btn-primary dropdown-toggle">Mail
                                &nbsp;<span class="caret"></span></button>
                            <ul role="menu" class="dropdown-menu">
                                <li><a href="#">Mail</a></li>
                                <li><a href="#">Contacts</a></li>
                                <li><a href="#">Tasks</a></li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-sm-9 col-md-10">
                        <div class="btn-group">
                            <button type="button" class="btn btn-default"><input type="checkbox"
                                                                                 style="margin: 0; vertical-align: middle;"
                                                                                 class="checkall"/></button>
                            <button type="button" data-toggle="dropdown" class="btn btn-default dropdown-toggle"><span
                                    class="caret"></span><span class="sr-only">Toggle Dropdown</span></button>
                            <ul role="menu" class="dropdown-menu">
                                <li><a href="#">All</a></li>
                                <li><a href="#">None</a></li>
                                <li><a href="#">Read</a></li>
                                <li><a href="#">Unread</a></li>
                                <li><a href="#">Starred</a></li>
                                <li><a href="#">Unstarred</a></li>
                            </ul>
                        </div>
                        <button type="button" data-toggle="tooltip" title="Refresh" class="btn btn-default mls mrs">
                            <span class="glyphicon glyphicon-refresh"></span></button>
                        <div class="btn-group">
                            <button type="button" data-toggle="dropdown" class="btn btn-default dropdown-toggle">More
                                &nbsp;<span class="caret"></span></button>
                            <ul role="menu" class="dropdown-menu">
                                <li><a href="#">Mark all as read</a></li>
                                <li class="divider"></li>
                                <li class="text-center pbm">
                                    <small class="text-muted">Select messages to see more actions</small>
                                </li>
                            </ul>
                        </div>
                        <div class="pull-left"><span class="text-muted"><b>1</b>&nbsp; – &nbsp;<b>50</b>&nbsp; of &nbsp;<b>277</b></span>

                            <div class="btn-group mlm">
                                <button type="button" class="btn btn-default"><span
                                        class="glyphicon glyphicon-chevron-right"></span></button>
                                <button type="button" class="btn btn-default"><span
                                        class="glyphicon glyphicon-chevron-left"></span></button>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="mtl mbl"></div>
                <div class="row">
                    <div class="col-sm-3 col-md-2"><a href="#" role="button" class="btn btn-danger btn-sm btn-block">COMPOSE</a>

                        <div class="mtm mbm"></div>
                        <div class="panel">
                            <div class="panel-body pan">
                                <ul style="background: #fff" class="nav nav-pills nav-stacked">
                                    <li class="active"><a href="#"><span class="badge pull-right">42</span><i
                                            class="fa fa-inbox fa-fw mrs"></i>Inbox</a></li>
                                    <li><a href="#"><i class="fa fa-star-o fa-fw mrs"></i>Starred</a></li>
                                    <li><a href="#"><i class="fa fa-info-circle fa-fw mrs"></i>Important</a></li>
                                    <li><a href="#"><i class="fa fa-plane fa-fw mrs"></i>Sent Mail</a></li>
                                    <li><a href="#"><span class="badge badge-orange pull-right">3</span><i
                                            class="fa fa-edit fa-fw mrs"></i>Drafts</a></li>
                                </ul>
                            </div>
                        </div>
                        <hr/>
                        <div class="panel">
                            <div class="panel-body pan">
                                <ul style="background: #fff" class="nav nav-pills nav-stacked">
                                    <li class="active"><a href="#">Buddy Online</a></li>
                                    <li><a href="#"><i class="fa fa-circle text-yellow pull-right"></i>Home</a></li>
                                    <li><a href="#"><i class="fa fa-circle text-success pull-right"></i>Work</a></li>
                                    <li><a href="#"><i class="fa fa-circle text-red pull-right"></i>Family</a></li>
                                    <li><a href="#"><i class="fa fa-circle text-muted pull-right"></i>Other</a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-9 col-md-10">
                        <ul class="nav nav-tabs">
                            <li class="active"><a href="#home" data-toggle="tab"><span
                                    class="glyphicon glyphicon-inbox"></span>&nbsp;
                                Primary</a></li>
                            <li><a href="#profile" data-toggle="tab"><span class="glyphicon glyphicon-user"></span>&nbsp;
                                Social</a></li>
                            <li><a href="#messages" data-toggle="tab"><span class="glyphicon glyphicon-tags"></span>&nbsp;
                                Promotions</a></li>
                            <li><a href="#settings" data-toggle="tab"><span class="glyphicon glyphicon-plus man"></span></a>
                            </li>
                        </ul>
                        <div class="tab-content">
                            <div id="home" class="tab-pane fade in active">
                                <div class="list-group mail-box"><a href="#" class="list-group-item"><input
                                        type="checkbox"/><span class="fa fa-star-o mrm mlm"></span><span
                                        style="min-width: 120px; display: inline-block;"
                                        class="name">Bhaumik Patel</span><span>Sed ut perspiciatis unde</span>&nbsp; -
                                    &nbsp;<span style="font-size: 11px;" class="text-muted">Lorem ipsum dolor sit amet, consectetur adipisicing elit</span><span
                                            class="time-badge">12:10 AM</span><span class="pull-left mll"><span
                                            class="glyphicon glyphicon-paperclip"></span></span></a><a href="#"
                                                                                                       class="list-group-item"><input
                                        type="checkbox"/><span class="fa fa-star-o mrm mlm"></span><span
                                        style="min-width: 120px; display: inline-block;"
                                        class="name">Bhaumik Patel</span><span>Sed ut perspiciatis unde</span>&nbsp; -
                                    &nbsp;<span style="font-size: 11px;" class="text-muted">Lorem ipsum dolor sit amet, consectetur adipisicing elit</span><span
                                            class="time-badge">12:10 AM</span><span class="pull-left mll"><span
                                            class="glyphicon glyphicon-paperclip"></span></span></a><a href="#"
                                                                                                       class="list-group-item"><input
                                        type="checkbox"/><span class="fa fa-star-o mrm mlm"></span><span
                                        style="min-width: 120px; display: inline-block;"
                                        class="name">Bhaumik Patel</span><span>Sed ut perspiciatis unde</span>&nbsp; -
                                    &nbsp;<span style="font-size: 11px;" class="text-muted">Lorem ipsum dolor sit amet, consectetur adipisicing elit ...</span><span
                                            class="time-badge">12:10 AM</span><span class="pull-left mll"><span
                                            class="glyphicon glyphicon-paperclip"></span></span></a><a href="#"
                                                                                                       class="list-group-item"><input
                                        type="checkbox"/><span class="fa fa-star-o mrm mlm"></span><span
                                        style="min-width: 120px; display: inline-block;"
                                        class="name">Bhaumik Patel</span><span>Sed ut perspiciatis unde</span>&nbsp; -
                                    &nbsp;<span style="font-size: 11px;" class="text-muted">Lorem ipsum dolor sit amet, consectetur adipisicing elit</span><span
                                            class="time-badge">12:10 AM</span><span class="pull-left mll"><span
                                            class="glyphicon glyphicon-paperclip"></span></span></a><a href="#"
                                                                                                       class="list-group-item"><input
                                        type="checkbox"/><span class="fa fa-star-o mrm mlm"></span><span
                                        style="min-width: 120px; display: inline-block;"
                                        class="name">Bhaumik Patel</span><span>Sed ut perspiciatis unde</span>&nbsp; -
                                    &nbsp;<span style="font-size: 11px;" class="text-muted">Lorem ipsum dolor sit amet, consectetur adipisicing elit ...</span><span
                                            class="time-badge">12:10 AM</span><span class="pull-left mll"><span
                                            class="glyphicon glyphicon-paperclip"></span></span></a><a href="#"
                                                                                                       class="list-group-item"><input
                                        type="checkbox"/><span class="fa fa-star-o mrm mlm"></span><span
                                        style="min-width: 120px; display: inline-block;"
                                        class="name">Bhaumik Patel</span><span>Sed ut perspiciatis unde</span>&nbsp; -
                                    &nbsp;<span style="font-size: 11px;" class="text-muted">Lorem ipsum dolor sit amet, consectetur adipisicing elit</span><span
                                            class="time-badge">12:10 AM</span><span class="pull-left mll"><span
                                            class="glyphicon glyphicon-paperclip"></span></span></a><a href="#"
                                                                                                       class="list-group-item"><input
                                        type="checkbox"/><span class="fa fa-star-o mrm mlm"></span><span
                                        style="min-width: 120px; display: inline-block;"
                                        class="name">Bhaumik Patel</span><span>Sed ut perspiciatis unde</span>&nbsp; -
                                    &nbsp;<span style="font-size: 11px;" class="text-muted">Lorem ipsum dolor sit amet, consectetur adipisicing elit</span><span
                                            class="time-badge">12:10 AM</span><span class="pull-left mll"><span
                                            class="glyphicon glyphicon-paperclip"></span></span></a><a href="#"
                                                                                                       class="list-group-item"><input
                                        type="checkbox"/><span class="fa fa-star-o mrm mlm"></span><span
                                        style="min-width: 120px; display: inline-block;"
                                        class="name">Bhaumik Patel</span><span>Sed ut perspiciatis unde</span>&nbsp; -
                                    &nbsp;<span style="font-size: 11px;" class="text-muted">Lorem ipsum dolor sit amet, consectetur adipisicing elit</span><span
                                            class="time-badge">12:10 AM</span><span class="pull-left mll"><span
                                            class="glyphicon glyphicon-paperclip"></span></span></a><a href="#"
                                                                                                       class="list-group-item"><input
                                        type="checkbox"/><span class="fa fa-star-o mrm mlm"></span><span
                                        style="min-width: 120px; display: inline-block;"
                                        class="name">Bhaumik Patel</span><span>Sed ut perspiciatis unde</span>&nbsp; -
                                    &nbsp;<span style="font-size: 11px;" class="text-muted">Lorem ipsum dolor sit amet, consectetur adipisicing elit ...</span><span
                                            class="time-badge">12:10 AM</span><span class="pull-left mll"><span
                                            class="glyphicon glyphicon-paperclip"></span></span></a><a href="#"
                                                                                                       class="list-group-item"><input
                                        type="checkbox"/><span class="fa fa-star-o mrm mlm"></span><span
                                        style="min-width: 120px; display: inline-block;"
                                        class="name">Bhaumik Patel</span><span>Sed ut perspiciatis unde</span>&nbsp; -
                                    &nbsp;<span style="font-size: 11px;" class="text-muted">Lorem ipsum dolor sit amet, consectetur adipisicing elit</span><span
                                            class="time-badge">12:10 AM</span><span class="pull-left mll"><span
                                            class="glyphicon glyphicon-paperclip"></span></span></a><a href="#"
                                                                                                       class="list-group-item"><input
                                        type="checkbox"/><span class="fa fa-star-o mrm mlm"></span><span
                                        style="min-width: 120px; display: inline-block;"
                                        class="name">Bhaumik Patel</span><span>Sed ut perspiciatis unde</span>&nbsp; -
                                    &nbsp;<span style="font-size: 11px;" class="text-muted">Lorem ipsum dolor sit amet, consectetur adipisicing elit</span><span
                                            class="time-badge">12:10 AM</span><span class="pull-left mll"><span
                                            class="glyphicon glyphicon-paperclip"></span></span></a><a href="#"
                                                                                                       class="list-group-item"><input
                                        type="checkbox"/><span class="fa fa-star-o mrm mlm"></span><span
                                        style="min-width: 120px; display: inline-block;"
                                        class="name">Bhaumik Patel</span><span>Sed ut perspiciatis unde</span>&nbsp; -
                                    &nbsp;<span style="font-size: 11px;" class="text-muted">Lorem ipsum dolor sit amet, consectetur adipisicing elit ...</span><span
                                            class="time-badge">12:10 AM</span><span class="pull-left mll"><span
                                            class="glyphicon glyphicon-paperclip"></span></span></a></div>
                            </div>
                            <div id="profile" class="tab-pane fade in">
                                <div class="list-group mail-box"><a href="#" class="list-group-item"><input
                                        type="checkbox"/><span class="fa fa-star-o mrm mlm"></span><span
                                        style="min-width: 120px; display: inline-block;"
                                        class="name">Bhaumik Patel</span><span>Sed ut perspiciatis unde</span>&nbsp; -
                                    &nbsp;<span style="font-size: 11px;" class="text-muted">Lorem ipsum dolor sit amet, consectetur adipisicing elit</span><span
                                            class="time-badge">12:10 AM</span><span class="pull-left mll"><span
                                            class="glyphicon glyphicon-paperclip"></span></span></a><a href="#"
                                                                                                       class="list-group-item"><input
                                        type="checkbox"/><span class="fa fa-star-o mrm mlm"></span><span
                                        style="min-width: 120px; display: inline-block;"
                                        class="name">Bhaumik Patel</span><span>Sed ut perspiciatis unde</span>&nbsp; -
                                    &nbsp;<span style="font-size: 11px;"
                                                class="text-muted">Lorem ipsum dolor sit amet</span><span
                                            class="time-badge">12:10 AM</span><span class="pull-left mll"><span
                                            class="glyphicon glyphicon-paperclip"></span></span></a><a href="#"
                                                                                                       class="list-group-item"><input
                                        type="checkbox"/><span class="fa fa-star-o mrm mlm"></span><span
                                        style="min-width: 120px; display: inline-block;"
                                        class="name">Bhaumik Patel</span><span>Sed ut perspiciatis unde</span>&nbsp; -
                                    &nbsp;<span style="font-size: 11px;" class="text-muted">Lorem ipsum dolor sit amet, consectetur adipisicing elit ...</span><span
                                            class="time-badge">12:10 AM</span><span class="pull-left mll"><span
                                            class="glyphicon glyphicon-paperclip"></span></span></a><a href="#"
                                                                                                       class="list-group-item"><input
                                        type="checkbox"/><span class="fa fa-star-o mrm mlm"></span><span
                                        style="min-width: 120px; display: inline-block;"
                                        class="name">Bhaumik Patel</span><span>Sed ut perspiciatis unde</span>&nbsp; -
                                    &nbsp;<span style="font-size: 11px;" class="text-muted">Lorem ipsum dolor sit amet, consectetur adipisicing elit</span><span
                                            class="time-badge">12:10 AM</span><span class="pull-left mll"><span
                                            class="glyphicon glyphicon-paperclip"></span></span></a><a href="#"
                                                                                                       class="list-group-item"><input
                                        type="checkbox"/><span class="fa fa-star-o mrm mlm"></span><span
                                        style="min-width: 120px; display: inline-block;"
                                        class="name">Bhaumik Patel</span><span>Sed ut perspiciatis unde</span>&nbsp; -
                                    &nbsp;<span style="font-size: 11px;" class="text-muted">Lorem ipsum dolor sit amet, consectetur adipisicing elit</span><span
                                            class="time-badge">12:10 AM</span><span class="pull-left mll"><span
                                            class="glyphicon glyphicon-paperclip"></span></span></a><a href="#"
                                                                                                       class="list-group-item"><input
                                        type="checkbox"/><span class="fa fa-star-o mrm mlm"></span><span
                                        style="min-width: 120px; display: inline-block;"
                                        class="name">Bhaumik Patel</span><span>Sed ut perspiciatis unde</span>&nbsp; -
                                    &nbsp;<span style="font-size: 11px;" class="text-muted">Lorem ipsum dolor sit amet, consectetur adipisicing elit</span><span
                                            class="time-badge">12:10 AM</span><span class="pull-left mll"><span
                                            class="glyphicon glyphicon-paperclip"></span></span></a><a href="#"
                                                                                                       class="list-group-item"><input
                                        type="checkbox"/><span class="fa fa-star-o mrm mlm"></span><span
                                        style="min-width: 120px; display: inline-block;"
                                        class="name">Bhaumik Patel</span><span>Sed ut perspiciatis unde</span>&nbsp; -
                                    &nbsp;<span style="font-size: 11px;" class="text-muted">Lorem ipsum dolor sit amet, consectetur adipisicing elit</span><span
                                            class="time-badge">12:10 AM</span><span class="pull-left mll"><span
                                            class="glyphicon glyphicon-paperclip"></span></span></a><a href="#"
                                                                                                       class="list-group-item"><input
                                        type="checkbox"/><span class="fa fa-star-o mrm mlm"></span><span
                                        style="min-width: 120px; display: inline-block;"
                                        class="name">Bhaumik Patel</span><span>Sed ut perspiciatis unde</span>&nbsp; -
                                    &nbsp;<span style="font-size: 11px;"
                                                class="text-muted">Lorem ipsum dolor sit amet</span><span
                                            class="time-badge">12:10 AM</span><span class="pull-left mll"><span
                                            class="glyphicon glyphicon-paperclip"></span></span></a><a href="#"
                                                                                                       class="list-group-item"><input
                                        type="checkbox"/><span class="fa fa-star-o mrm mlm"></span><span
                                        style="min-width: 120px; display: inline-block;"
                                        class="name">Bhaumik Patel</span><span>Sed ut perspiciatis unde</span>&nbsp; -
                                    &nbsp;<span style="font-size: 11px;" class="text-muted">Lorem ipsum dolor sit amet, consectetur adipisicing elit</span><span
                                            class="time-badge">12:10 AM</span><span class="pull-left mll"><span
                                            class="glyphicon glyphicon-paperclip"></span></span></a><a href="#"
                                                                                                       class="list-group-item"><input
                                        type="checkbox"/><span class="fa fa-star-o mrm mlm"></span><span
                                        style="min-width: 120px; display: inline-block;"
                                        class="name">Bhaumik Patel</span><span>Sed ut perspiciatis unde</span>&nbsp; -
                                    &nbsp;<span style="font-size: 11px;" class="text-muted">Lorem ipsum dolor sit amet, consectetur adipisicing elit</span><span
                                            class="time-badge">12:10 AM</span><span class="pull-left mll"><span
                                            class="glyphicon glyphicon-paperclip"></span></span></a><a href="#"
                                                                                                       class="list-group-item"><input
                                        type="checkbox"/><span class="fa fa-star-o mrm mlm"></span><span
                                        style="min-width: 120px; display: inline-block;"
                                        class="name">Bhaumik Patel</span><span>Sed ut perspiciatis unde</span>&nbsp; -
                                    &nbsp;<span style="font-size: 11px;" class="text-muted">Lorem ipsum dolor sit amet, consectetur adipisicing elit</span><span
                                            class="time-badge">12:10 AM</span><span class="pull-left mll"><span
                                            class="glyphicon glyphicon-paperclip"></span></span></a><a href="#"
                                                                                                       class="list-group-item"><input
                                        type="checkbox"/><span class="fa fa-star-o mrm mlm"></span><span
                                        style="min-width: 120px; display: inline-block;"
                                        class="name">Bhaumik Patel</span><span>Sed ut perspiciatis unde</span>&nbsp; -
                                    &nbsp;<span style="font-size: 11px;" class="text-muted">Lorem ipsum dolor sit amet, consectetur adipisicing elit ...</span><span
                                            class="time-badge">12:10 AM</span><span class="pull-left mll"><span
                                            class="glyphicon glyphicon-paperclip"></span></span></a></div>
                            </div>
                            <div id="messages" class="tab-pane fade in">
                                <div class="list-group mail-box"><a href="#" class="list-group-item"><input
                                        type="checkbox"/><span class="fa fa-star-o mrm mlm"></span><span
                                        style="min-width: 120px; display: inline-block;"
                                        class="name">Bhaumik Patel</span><span>Sed ut perspiciatis unde</span>&nbsp; -
                                    &nbsp;<span style="font-size: 11px;" class="text-muted">Lorem ipsum dolor sit amet, consectetur adipisicing elit</span><span
                                            class="time-badge">12:10 AM</span><span class="pull-left mll"><span
                                            class="glyphicon glyphicon-paperclip"></span></span></a><a href="#"
                                                                                                       class="list-group-item"><input
                                        type="checkbox"/><span class="fa fa-star-o mrm mlm"></span><span
                                        style="min-width: 120px; display: inline-block;"
                                        class="name">Bhaumik Patel</span><span>Sed ut perspiciatis unde</span>&nbsp; -
                                    &nbsp;<span style="font-size: 11px;" class="text-muted">Lorem ipsum dolor sit amet, consectetur adipisicing elit</span><span
                                            class="time-badge">12:10 AM</span><span class="pull-left mll"><span
                                            class="glyphicon glyphicon-paperclip"></span></span></a><a href="#"
                                                                                                       class="list-group-item"><input
                                        type="checkbox"/><span class="fa fa-star-o mrm mlm"></span><span
                                        style="min-width: 120px; display: inline-block;"
                                        class="name">Bhaumik Patel</span><span>Sed ut perspiciatis unde</span>&nbsp; -
                                    &nbsp;<span style="font-size: 11px;"
                                                class="text-muted">Lorem ipsum dolor sit amet</span><span
                                            class="time-badge">12:10 AM</span><span class="pull-left mll"><span
                                            class="glyphicon glyphicon-paperclip"></span></span></a><a href="#"
                                                                                                       class="list-group-item"><input
                                        type="checkbox"/><span class="fa fa-star-o mrm mlm"></span><span
                                        style="min-width: 120px; display: inline-block;"
                                        class="name">Bhaumik Patel</span><span>Sed ut perspiciatis unde</span>&nbsp; -
                                    &nbsp;<span style="font-size: 11px;" class="text-muted">Lorem ipsum dolor sit amet, consectetur adipisicing elit</span><span
                                            class="time-badge">12:10 AM</span><span class="pull-left mll"><span
                                            class="glyphicon glyphicon-paperclip"></span></span></a><a href="#"
                                                                                                       class="list-group-item"><input
                                        type="checkbox"/><span class="fa fa-star-o mrm mlm"></span><span
                                        style="min-width: 120px; display: inline-block;"
                                        class="name">Bhaumik Patel</span><span>Sed ut perspiciatis unde</span>&nbsp; -
                                    &nbsp;<span style="font-size: 11px;" class="text-muted">Lorem ipsum dolor sit amet, consectetur adipisicing elit</span><span
                                            class="time-badge">12:10 AM</span><span class="pull-left mll"><span
                                            class="glyphicon glyphicon-paperclip"></span></span></a><a href="#"
                                                                                                       class="list-group-item"><input
                                        type="checkbox"/><span class="fa fa-star-o mrm mlm"></span><span
                                        style="min-width: 120px; display: inline-block;"
                                        class="name">Bhaumik Patel</span><span>Sed ut perspiciatis unde</span>&nbsp; -
                                    &nbsp;<span style="font-size: 11px;" class="text-muted">Lorem ipsum dolor sit amet, consectetur adipisicing elit ...</span><span
                                            class="time-badge">12:10 AM</span><span class="pull-left mll"><span
                                            class="glyphicon glyphicon-paperclip"></span></span></a><a href="#"
                                                                                                       class="list-group-item"><input
                                        type="checkbox"/><span class="fa fa-star-o mrm mlm"></span><span
                                        style="min-width: 120px; display: inline-block;"
                                        class="name">Bhaumik Patel</span><span>Sed ut perspiciatis unde</span>&nbsp; -
                                    &nbsp;<span style="font-size: 11px;" class="text-muted">Lorem ipsum dolor sit amet, consectetur adipisicing elit</span><span
                                            class="time-badge">12:10 AM</span><span class="pull-left mll"><span
                                            class="glyphicon glyphicon-paperclip"></span></span></a><a href="#"
                                                                                                       class="list-group-item"><input
                                        type="checkbox"/><span class="fa fa-star-o mrm mlm"></span><span
                                        style="min-width: 120px; display: inline-block;"
                                        class="name">Bhaumik Patel</span><span>Sed ut perspiciatis unde</span>&nbsp; -
                                    &nbsp;<span style="font-size: 11px;" class="text-muted">Lorem ipsum dolor sit amet, consectetur adipisicing elit</span><span
                                            class="time-badge">12:10 AM</span><span class="pull-left mll"><span
                                            class="glyphicon glyphicon-paperclip"></span></span></a><a href="#"
                                                                                                       class="list-group-item"><input
                                        type="checkbox"/><span class="fa fa-star-o mrm mlm"></span><span
                                        style="min-width: 120px; display: inline-block;"
                                        class="name">Bhaumik Patel</span><span>Sed ut perspiciatis unde</span>&nbsp; -
                                    &nbsp;<span style="font-size: 11px;" class="text-muted">Lorem ipsum dolor sit amet, consectetur adipisicing elit ...</span><span
                                            class="time-badge">12:10 AM</span><span class="pull-left mll"><span
                                            class="glyphicon glyphicon-paperclip"></span></span></a><a href="#"
                                                                                                       class="list-group-item"><input
                                        type="checkbox"/><span class="fa fa-star-o mrm mlm"></span><span
                                        style="min-width: 120px; display: inline-block;"
                                        class="name">Bhaumik Patel</span><span>Sed ut perspiciatis unde</span>&nbsp; -
                                    &nbsp;<span style="font-size: 11px;" class="text-muted">Lorem ipsum dolor sit amet, consectetur adipisicing elit</span><span
                                            class="time-badge">12:10 AM</span><span class="pull-left mll"><span
                                            class="glyphicon glyphicon-paperclip"></span></span></a><a href="#"
                                                                                                       class="list-group-item"><input
                                        type="checkbox"/><span class="fa fa-star-o mrm mlm"></span><span
                                        style="min-width: 120px; display: inline-block;"
                                        class="name">Bhaumik Patel</span><span>Sed ut perspiciatis unde</span>&nbsp; -
                                    &nbsp;<span style="font-size: 11px;" class="text-muted">Lorem ipsum dolor sit amet, consectetur adipisicing elit</span><span
                                            class="time-badge">12:10 AM</span><span class="pull-left mll"><span
                                            class="glyphicon glyphicon-paperclip"></span></span></a><a href="#"
                                                                                                       class="list-group-item"><input
                                        type="checkbox"/><span class="fa fa-star-o mrm mlm"></span><span
                                        style="min-width: 120px; display: inline-block;"
                                        class="name">Bhaumik Patel</span><span>Sed ut perspiciatis unde</span>&nbsp; -
                                    &nbsp;<span style="font-size: 11px;" class="text-muted">Lorem ipsum dolor sit amet, consectetur adipisicing elit ...</span><span
                                            class="time-badge">12:10 AM</span><span class="pull-left mll"><span
                                            class="glyphicon glyphicon-paperclip"></span></span></a></div>
                            </div>
                            <div id="settings" class="tab-pane fade in">
                                <div class="list-group mail-box"><a href="#" class="list-group-item"><input
                                        type="checkbox"/><span class="fa fa-star-o mrm mlm"></span><span
                                        style="min-width: 120px; display: inline-block;"
                                        class="name">Bhaumik Patel</span><span>Sed ut perspiciatis unde</span>&nbsp; -
                                    &nbsp;<span style="font-size: 11px;" class="text-muted">Lorem ipsum dolor sit amet, consectetur adipisicing elit</span><span
                                            class="time-badge">12:10 AM</span><span class="pull-left mll"><span
                                            class="glyphicon glyphicon-paperclip"></span></span></a><a href="#"
                                                                                                       class="list-group-item"><input
                                        type="checkbox"/><span class="fa fa-star-o mrm mlm"></span><span
                                        style="min-width: 120px; display: inline-block;"
                                        class="name">Bhaumik Patel</span><span>Sed ut perspiciatis unde</span>&nbsp; -
                                    &nbsp;<span style="font-size: 11px;"
                                                class="text-muted">Lorem ipsum dolor sit amet</span><span
                                            class="time-badge">12:10 AM</span><span class="pull-left mll"><span
                                            class="glyphicon glyphicon-paperclip"></span></span></a><a href="#"
                                                                                                       class="list-group-item"><input
                                        type="checkbox"/><span class="fa fa-star-o mrm mlm"></span><span
                                        style="min-width: 120px; display: inline-block;"
                                        class="name">Bhaumik Patel</span><span>Sed ut perspiciatis unde</span>&nbsp; -
                                    &nbsp;<span style="font-size: 11px;" class="text-muted">Lorem ipsum dolor sit amet, consectetur adipisicing elit</span><span
                                            class="time-badge">12:10 AM</span><span class="pull-left mll"><span
                                            class="glyphicon glyphicon-paperclip"></span></span></a><a href="#"
                                                                                                       class="list-group-item"><input
                                        type="checkbox"/><span class="fa fa-star-o mrm mlm"></span><span
                                        style="min-width: 120px; display: inline-block;"
                                        class="name">Bhaumik Patel</span><span>Sed ut perspiciatis unde</span>&nbsp; -
                                    &nbsp;<span style="font-size: 11px;" class="text-muted">Lorem ipsum dolor sit amet, consectetur adipisicing elit</span><span
                                            class="time-badge">12:10 AM</span><span class="pull-left mll"><span
                                            class="glyphicon glyphicon-paperclip"></span></span></a><a href="#"
                                                                                                       class="list-group-item"><input
                                        type="checkbox"/><span class="fa fa-star-o mrm mlm"></span><span
                                        style="min-width: 120px; display: inline-block;"
                                        class="name">Bhaumik Patel</span><span>Sed ut perspiciatis unde</span>&nbsp; -
                                    &nbsp;<span style="font-size: 11px;" class="text-muted">Lorem ipsum dolor sit amet, consectetur adipisicing elit</span><span
                                            class="time-badge">12:10 AM</span><span class="pull-left mll"><span
                                            class="glyphicon glyphicon-paperclip"></span></span></a><a href="#"
                                                                                                       class="list-group-item"><input
                                        type="checkbox"/><span class="fa fa-star-o mrm mlm"></span><span
                                        style="min-width: 120px; display: inline-block;"
                                        class="name">Bhaumik Patel</span><span>Sed ut perspiciatis unde</span>&nbsp; -
                                    &nbsp;<span style="font-size: 11px;" class="text-muted">Lorem ipsum dolor sit amet, consectetur adipisicing elit ...</span><span
                                            class="time-badge">12:10 AM</span><span class="pull-left mll"><span
                                            class="glyphicon glyphicon-paperclip"></span></span></a><a href="#"
                                                                                                       class="list-group-item"><input
                                        type="checkbox"/><span class="fa fa-star-o mrm mlm"></span><span
                                        style="min-width: 120px; display: inline-block;"
                                        class="name">Bhaumik Patel</span><span>Sed ut perspiciatis unde</span>&nbsp; -
                                    &nbsp;<span style="font-size: 11px;" class="text-muted">Lorem ipsum dolor sit amet, consectetur adipisicing elit</span><span
                                            class="time-badge">12:10 AM</span><span class="pull-left mll"><span
                                            class="glyphicon glyphicon-paperclip"></span></span></a><a href="#"
                                                                                                       class="list-group-item"><input
                                        type="checkbox"/><span class="fa fa-star-o mrm mlm"></span><span
                                        style="min-width: 120px; display: inline-block;"
                                        class="name">Bhaumik Patel</span><span>Sed ut perspiciatis unde</span>&nbsp; -
                                    &nbsp;<span style="font-size: 11px;" class="text-muted">Lorem ipsum dolor sit amet, consectetur adipisicing elit</span><span
                                            class="time-badge">12:10 AM</span><span class="pull-left mll"><span
                                            class="glyphicon glyphicon-paperclip"></span></span></a><a href="#"
                                                                                                       class="list-group-item"><input
                                        type="checkbox"/><span class="fa fa-star-o mrm mlm"></span><span
                                        style="min-width: 120px; display: inline-block;"
                                        class="name">Bhaumik Patel</span><span>Sed ut perspiciatis unde</span>&nbsp; -
                                    &nbsp;<span style="font-size: 11px;" class="text-muted">Lorem ipsum dolor sit amet, consectetur adipisicing elit</span><span
                                            class="time-badge">12:10 AM</span><span class="pull-left mll"><span
                                            class="glyphicon glyphicon-paperclip"></span></span></a><a href="#"
                                                                                                       class="list-group-item"><input
                                        type="checkbox"/><span class="fa fa-star-o mrm mlm"></span><span
                                        style="min-width: 120px; display: inline-block;"
                                        class="name">Bhaumik Patel</span><span>Sed ut perspiciatis unde</span>&nbsp; -
                                    &nbsp;<span style="font-size: 11px;" class="text-muted">Lorem ipsum dolor sit amet, consectetur adipisicing elit</span><span
                                            class="time-badge">12:10 AM</span><span class="pull-left mll"><span
                                            class="glyphicon glyphicon-paperclip"></span></span></a><a href="#"
                                                                                                       class="list-group-item"><input
                                        type="checkbox"/><span class="fa fa-star-o mrm mlm"></span><span
                                        style="min-width: 120px; display: inline-block;"
                                        class="name">Bhaumik Patel</span><span>Sed ut perspiciatis unde</span>&nbsp; -
                                    &nbsp;<span style="font-size: 11px;" class="text-muted">Lorem ipsum dolor sit amet, consectetur adipisicing elit</span><span
                                            class="time-badge">12:10 AM</span><span class="pull-left mll"><span
                                            class="glyphicon glyphicon-paperclip"></span></span></a><a href="#"
                                                                                                       class="list-group-item"><input
                                        type="checkbox"/><span class="fa fa-star-o mrm mlm"></span><span
                                        style="min-width: 120px; display: inline-block;"
                                        class="name">Bhaumik Patel</span><span>Sed ut perspiciatis unde</span>&nbsp; -
                                    &nbsp;<span style="font-size: 11px;" class="text-muted">Lorem ipsum dolor sit amet, consectetur adipisicing elit ...</span><span
                                            class="time-badge">12:10 AM</span><span class="pull-left mll"><span
                                            class="glyphicon glyphicon-paperclip"></span></span></a></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!--END CONTENT--></div>
        <!--BEGIN FOOTER-->
        
        <?php  require_once 'include/footer.php';?>

        <!--END FOOTER--><!--END PAGE WRAPPER--></div>
</div>
<script src="<?=base_url();?>assets/js/jquery-1.10.2.min.js"></script>
<script src="<?=base_url();?>assets/js/jquery-migrate-1.2.1.min.js"></script>
<script src="<?=base_url();?>assets/js/jquery-ui.js"></script>
<!--loading bootstrap js-->
<script src="<?=base_url();?>assets/vendors/bootstrap/js/bootstrap.min.js"></script>
<script src="<?=base_url();?>assets/vendors/bootstrap-hover-dropdown/bootstrap-hover-dropdown.js"></script>
<script src="<?=base_url();?>assets/js/html5shiv.js"></script>
<script src="<?=base_url();?>assets/js/respond.min.js"></script>
<script src="<?=base_url();?>assets/vendors/metisMenu/jquery.metisMenu.js"></script>
<script src="<?=base_url();?>assets/vendors/slimScroll/jquery.slimscroll.js"></script>
<script src="<?=base_url();?>assets/vendors/jquery-cookie/jquery.cookie.js"></script>
<script src="<?=base_url();?>assets/vendors/iCheck/icheck.min.js"></script>
<script src="<?=base_url();?>assets/vendors/iCheck/custom.min.js"></script>
<script src="<?=base_url();?>assets/vendors/jquery-notific8/jquery.notific8.min.js"></script>
<script src="<?=base_url();?>assets/vendors/jquery-highcharts/highcharts.js"></script>
<script src="<?=base_url();?>assets/js/jquery.menu.js"></script>
<script src="<?=base_url();?>assets/vendors/jquery-pace/pace.min.js"></script>
<script src="<?=base_url();?>assets/vendors/holder/holder.js"></script>
<script src="<?=base_url();?>assets/vendors/responsive-tabs/responsive-tabs.js"></script>
<script src="<?=base_url();?>assets/vendors/jquery-news-ticker/jquery.newsTicker.min.js"></script>
<script src="<?=base_url();?>assets/vendors/moment/moment.js"></script>
<script src="<?=base_url();?>assets/vendors/bootstrap-datepicker/js/bootstrap-datepicker.js"></script>
<script src="<?=base_url();?>assets/vendors/bootstrap-daterangepicker/daterangepicker.js"></script>
<!--CORE JAVASCRIPT-->
<script src="<?=base_url();?>assets/js/main.js"></script>
<!--LOADING SCRIPTS FOR PAGE-->
<script src="<?=base_url();?>assets/js/email-inbox.js"></script>

</body>
</html>
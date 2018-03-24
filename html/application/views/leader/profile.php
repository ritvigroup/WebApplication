<!DOCTYPE html>
<html lang="en">
<head><title>Profile</title>
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
    <!--LOADING STYLESHEET FOR PAGE-->
    <link type="text/css" rel="stylesheet" href="<?=base_url();?>assets/vendors/bootstrap-datepicker/css/datepicker.css">
    <!--Loading style vendors-->
    <link type="text/css" rel="stylesheet" href="<?=base_url();?>assets/vendors/animate.css/animate.css">
    <link type="text/css" rel="stylesheet" href="<?=base_url();?>assets/vendors/jquery-pace/pace.css">
    <link type="text/css" rel="stylesheet" href="<?=base_url();?>assets/vendors/iCheck/skins/all.css">
    <link type="text/css" rel="stylesheet" href="<?=base_url();?>assets/vendors/jquery-notific8/jquery.notific8.min.css">
    <link type="text/css" rel="stylesheet" href="<?=base_url();?>assets/vendors/bootstrap-daterangepicker/daterangepicker-bs3.css">
    <!--Loading style-->
    <link type="text/css" rel="stylesheet" href="<?=base_url();?>assets/css/themes/style1/orange-blue.css" class="default-style">
    <link type="text/css" rel="stylesheet" href="<?=base_url();?>assets/css/themes/style1/orange-blue.css" id="theme-change"
          class="style-change color-change">
    <link type="text/css" rel="stylesheet" href="<?=base_url();?>assets/css/style-responsive.css">
</head>
<body class=" ">
<div>
    <!--BEGIN BACK TO TOP--><a id="totop" href="#"><i class="fa fa-angle-up"></i></a><!--END BACK TO TOP-->
    
    <!--BEGIN TOPBAR-->
    <?php  require_once './include/top.php';?>
    <!--END TOPBAR-->
    
    <div id="wrapper"><!--BEGIN SIDEBAR MENU-->
        
        <?php  require_once './include/left.php';?>

        <!--BEGIN PAGE WRAPPER-->
        <div id="page-wrapper"><!--BEGIN TITLE & BREADCRUMB PAGE-->
            <div id="title-breadcrumb-option-demo" class="page-title-breadcrumb">
                <div class="page-header pull-left">
                    <div class="page-title">Profile</div>
                </div>
                <ol class="breadcrumb page-breadcrumb">
                    <li><i class="fa fa-home"></i>&nbsp;<a href="<?=base_url();?>leader/home">Home</a>&nbsp;&nbsp;<i
                            class="fa fa-angle-right"></i>&nbsp;&nbsp;</li>
                    <li><a href="#">Extras</a>&nbsp;&nbsp;<i class="fa fa-angle-right"></i>&nbsp;&nbsp;</li>
                    <li class="active">User Profile</li>
                </ol>
                <div class="btn btn-blue reportrange hide"><i class="fa fa-calendar"></i>&nbsp;<span></span>&nbsp;report&nbsp;<i
                        class="fa fa-angle-down"></i><input type="hidden" name="datestart"/><input type="hidden"
                                                                                                   name="endstart"/>
                </div>
                <div class="clearfix"></div>
            </div>
            <!--END TITLE & BREADCRUMB PAGE--><!--BEGIN CONTENT-->
            <div class="page-content">
                <div id="page-user-profile" class="row">
                    <div class="col-md-12">
                        <div class="row">
                            <div class="col-md-3">
                                <div class="form-group">
                                    <div class="text-center mbl"><img
                                            src="https://s3.amazonaws.com/uifaces/faces/twitter/oliveirasimoes/128.jpg"
                                            style="border: 5px solid #fff; box-shadow: 0 2px 3px rgba(0,0,0,0.25);"
                                            class="img-circle"/></div>
                                </div>
                                <table class="table table-striped table-hover">
                                    <tbody>
                                    <tr>
                                        <td width="50%">User Name</td>
                                        <td>Diane Harris</td>
                                    </tr>
                                    <tr>
                                        <td width="50%">Email</td>
                                        <td>name@example.com</td>
                                    </tr>
                                    <tr>
                                        <td width="50%">Address</td>
                                        <td>Street 123, Avenue 45, Country</td>
                                    </tr>
                                    <tr>
                                        <td width="50%">Status</td>
                                        <td><span class="label label-success">Active</span></td>
                                    </tr>
                                    <tr>
                                        <td width="50%">Rating</td>
                                        <td><i class="fa fa-star text-yellow fa-fw"></i><i
                                                class="fa fa-star text-yellow fa-fw"></i><i
                                                class="fa fa-star text-yellow fa-fw"></i><i
                                                class="fa fa-star text-yellow fa-fw"></i><i
                                                class="fa fa-star text-yellow fa-fw"></i></td>
                                    </tr>
                                    <tr>
                                        <td width="50%">Join Since</td>
                                        <td> Jun 03, 2014</td>
                                    </tr>
                                    </tbody>
                                </table>
                            </div>
                            <div class="col-md-9">
                                <ul class="nav nav-tabs ul-edit responsive">
                                    <li class="active"><a href="#tab-activity" data-toggle="tab"><i
                                            class="fa fa-bolt"></i>&nbsp;
                                        Activity</a></li>
                                    <li><a href="#tab-edit" data-toggle="tab"><i class="fa fa-edit"></i>&nbsp;
                                        Edit Profile</a></li>
                                    <li><a href="#tab-messages" data-toggle="tab"><i class="fa fa-envelope-o"></i>&nbsp;
                                        Messages</a></li>
                                </ul>
                                <div id="generalTabContent" class="tab-content">
                                    <div id="tab-activity" class="tab-pane fade in active">
                                        <ul class="list-activity list-unstyled">
                                            <li>
                                                <div class="avatar"><img
                                                        src="https://s3.amazonaws.com/uifaces/faces/twitter/uxceo/48.jpg"
                                                        class="img-circle"/></div>
                                                <div class="body">
                                                    <div class="desc"><strong class="mrs">Diane Harris</strong>posted a
                                                        new note<br/>
                                                        <small class="text-muted">1 days ago at 6:18am</small>
                                                    </div>
                                                    <div class="content"><a href="#"><strong>Ut enim ad minim
                                                        veniam</strong></a>

                                                        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed
                                                            do eiusmod tempor incididunt ut labore et dolore magna
                                                            aliqua. Ut enim ad minim veniam, quis nostrud exercitation
                                                            ullamco laboris nisi ut aliquip ex ea commodo consequat.</p>
                                                    </div>
                                                </div>
                                            </li>
                                            <li>
                                                <div class="avatar"><img
                                                        src="https://s3.amazonaws.com/uifaces/faces/twitter/rssems/48.jpg"
                                                        class="img-circle"/></div>
                                                <div class="body">
                                                    <div class="desc"><strong class="mrs">Justin Coleman</strong>posted
                                                        a new blog<br/>
                                                        <small class="text-muted">3 days ago at 12:20am</small>
                                                    </div>
                                                    <div class="content">
                                                        <div class="content-thumb"><img
                                                                src="http://swlabs.co/madmin/code/images/gallery/media4.jpg"
                                                                alt="" class="img-responsive"/></div>
                                                        <div class="content-info"><a href="#"><strong>Excepteur sint
                                                            occaecat cupidatat</strong></a>

                                                            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit,
                                                                sed do eiusmod tempor incididunt ut labore et dolore
                                                                magna aliqua. Ut enim ad minim veniam, quis nostrud
                                                                exercitation ullamco laboris nisi ut aliquip ex ea
                                                                commodo consequat.Sed ut perspiciatis unde omnis iste
                                                                natus error sit voluptatem accusantium doloremque
                                                                laudantium, totam rem aperiam.</p></div>
                                                    </div>
                                                </div>
                                            </li>
                                            <li>
                                                <div class="avatar"><img
                                                        src="https://s3.amazonaws.com/uifaces/faces/twitter/claudioguglieri/48.jpg"
                                                        class="img-circle"/></div>
                                                <div class="body">
                                                    <div class="desc"><strong class="mrs">Jack Price</strong>posted a
                                                        new blog<br/>
                                                        <small class="text-muted">4 days ago at 3:08pm</small>
                                                    </div>
                                                    <div class="content">
                                                        <div class="content-thumb"><img
                                                                src="http://swlabs.co/madmin/code/images/gallery/media5.jpg"
                                                                alt="" class="img-responsive"/></div>
                                                        <div class="content-info"><a href="#"><strong>Finibus Bonorum et
                                                            Malorum</strong></a>

                                                            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit,
                                                                sed do eiusmod tempor incididunt ut labore et dolore
                                                                magna aliqua. Ut enim ad minim veniam, quis nostrud
                                                                exercitation ullamco laboris nisi ut aliquip ex ea
                                                                commodo consequat.Sed ut perspiciatis unde omnis iste
                                                                natus error sit voluptatem accusantium doloremque
                                                                laudantium, totam rem aperiam.</p></div>
                                                    </div>
                                                </div>
                                            </li>
                                            <li>
                                                <div class="avatar"><img
                                                        src="https://s3.amazonaws.com/uifaces/faces/twitter/jackmcdade/48.jpg"
                                                        class="img-circle"/></div>
                                                <div class="body">
                                                    <div class="desc"><strong class="mrs">Jordan Walsh</strong>uploaded
                                                        3 pictures<br/>
                                                        <small class="text-muted">7 days ago at 9:15pm</small>
                                                    </div>
                                                    <div class="content">
                                                        <div class="content-thumb-large"><img
                                                                src="http://swlabs.co/madmin/code/images/gallery/media1.jpg"
                                                                alt="" class="img-responsive"/><img
                                                                src="http://swlabs.co/madmin/code/images/gallery/media2.jpg"
                                                                alt="" class="img-responsive"/><img
                                                                src="http://swlabs.co/madmin/code/images/gallery/media3.jpg"
                                                                alt="" class="img-responsive"/></div>
                                                    </div>
                                                </div>
                                            </li>
                                            <li>
                                                <div class="avatar"><img
                                                        src="https://s3.amazonaws.com/uifaces/faces/twitter/dominikmartn/48.jpg"
                                                        class="img-circle"/></div>
                                                <div class="body">
                                                    <div class="desc"><strong class="mrs">Phillip Bailey</strong>posted
                                                        news 3 tasks<br/>
                                                        <small class="text-muted">10 days ago at 2:15pm</small>
                                                    </div>
                                                    <div class="content">
                                                        <div class="row">
                                                            <div class="col-md-4"><span class="task-item"><span
                                                                    class="task-item"></span>Admin Template<small
                                                                    class="pull-right text-muted">80%
                                                            </small></span>

                                                                <div class="progress progress-sm">
                                                                    <div role="progressbar" aria-valuenow="80"
                                                                         aria-valuemin="0" aria-valuemax="100"
                                                                         style="width: 80%;"
                                                                         class="progress-bar progress-bar-orange"><span
                                                                            class="sr-only">80% Complete (success)</span>
                                                                    </div>
                                                                </div>
                                                                <span class="task-item">Wordpress Themes<small
                                                                        class="pull-right text-muted">40%
                                                                </small></span>

                                                                <div class="progress progress-sm">
                                                                    <div role="progressbar" aria-valuenow="40"
                                                                         aria-valuemin="0" aria-valuemax="100"
                                                                         style="width: 40%;"
                                                                         class="progress-bar progress-bar-success"><span
                                                                            class="sr-only">40% Complete (success)</span>
                                                                    </div>
                                                                </div>
                                                                <span class="task-item">Landing Page<small
                                                                        class="pull-right text-muted">67%
                                                                </small></span>

                                                                <div class="progress progress-sm">
                                                                    <div role="progressbar" aria-valuenow="67"
                                                                         aria-valuemin="0" aria-valuemax="100"
                                                                         style="width: 67%;"
                                                                         class="progress-bar progress-bar-warning"><span
                                                                            class="sr-only">67% Complete (success)</span>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </li>
                                        </ul>
                                    </div>
                                    <div id="tab-edit" class="tab-pane fade">
                                        <div class="row">
                                            <div class="col-md-9">
                                                <div class="tab-content">
                                                    <div id="tab-profile-setting" class="tab-pane fade in active">
                                                        <form action="#" class="form-horizontal">
                                                            <div class="form-group"><label
                                                                    class="col-sm-3 control-label">First Name</label>

                                                                <div class="col-sm-9 controls"><input type="text"
                                                                                                      placeholder="first name"
                                                                                                      class="form-control"/>
                                                                </div>
                                                            </div>
                                                            <div class="form-group"><label
                                                                    class="col-sm-3 control-label">Last Name</label>

                                                                <div class="col-sm-9 controls"><input type="text"
                                                                                                      placeholder="last name"
                                                                                                      class="form-control"/>
                                                                </div>
                                                            </div>
                                                            <div class="form-group"><label
                                                                    class="col-sm-3 control-label">Gender</label>

                                                                <div class="col-sm-9 controls">
                                                                    <div class="radio-list"><label class="radio-inline"><input
                                                                            type="radio" value="0" name="gender"
                                                                            checked="checked"/>&nbsp;
                                                                        Male</label><label class="radio-inline"><input
                                                                            type="radio" value="1" name="gender"/>&nbsp;
                                                                        Female</label></div>
                                                                </div>
                                                            </div>
                                                            <div class="form-group"><label
                                                                    class="col-sm-3 control-label">Birthday</label>

                                                                <div class="col-sm-9 controls">
                                                                    <div class="row">
                                                                        <div class="col-xs-6"><input type="text"
                                                                                                     data-date-format="dd/mm/yyyy"
                                                                                                     placeholder="dd/mm/yyyy"
                                                                                                     class="datepicker-normal form-control"/>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="form-group"><label
                                                                    class="col-sm-3 control-label">Marital
                                                                Status</label>

                                                                <div class="col-sm-9 controls">
                                                                    <div class="row">
                                                                        <div class="col-xs-6"><select
                                                                                class="form-control">
                                                                            <option>Single</option>
                                                                            <option>Married</option>
                                                                        </select></div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="form-group"><label
                                                                    class="col-sm-3 control-label">Position</label>

                                                                <div class="col-sm-9 controls">
                                                                    <div class="row">
                                                                        <div class="col-xs-6"><select
                                                                                class="form-control">
                                                                            <option>CEO</option>
                                                                            <option>Director</option>
                                                                            <option>Manager</option>
                                                                            <option>Staff</option>
                                                                            <option>Office Boy</option>
                                                                        </select></div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="form-group"><label
                                                                    class="col-sm-3 control-label">About</label>

                                                                <div class="col-sm-9 controls"><textarea rows="3"
                                                                                                         class="form-control"></textarea>
                                                                </div>
                                                            </div>
                                                            <div class="form-group mbn"><label
                                                                    class="col-sm-3 control-label"></label>

                                                                <div class="col-sm-9 controls">
                                                                    <button type="submit" class="btn btn-success"><i
                                                                            class="fa fa-save"></i>&nbsp;
                                                                        Save
                                                                    </button>
                                                                    &nbsp; &nbsp;<a href="#" class="btn btn-default">Cancel</a>
                                                                </div>
                                                            </div>
                                                        </form>
                                                    </div>
                                                    <div id="tab-account-setting" class="tab-pane fade">
                                                        <form action="#" class="form-horizontal">
                                                            <div class="form-body">
                                                                <div class="form-group"><label
                                                                        class="col-sm-3 control-label">Email</label>

                                                                    <div class="col-sm-9 controls"><input type="email"
                                                                                                          placeholder="email@yourcompany.com"
                                                                                                          class="form-control"/>
                                                                    </div>
                                                                </div>
                                                                <div class="form-group"><label
                                                                        class="col-sm-3 control-label">Username</label>

                                                                    <div class="col-sm-9 controls"><input type="text"
                                                                                                          placeholder="username"
                                                                                                          class="form-control"/>
                                                                    </div>
                                                                </div>
                                                                <div class="form-group"><label
                                                                        class="col-sm-3 control-label">Password</label>

                                                                    <div class="col-sm-9 controls">
                                                                        <div class="row">
                                                                            <div class="col-xs-6"><input type="password"
                                                                                                         placeholder=""
                                                                                                         class="form-control"/>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div class="form-group"><label
                                                                        class="col-sm-3 control-label">Confirm
                                                                    Password</label>

                                                                    <div class="col-sm-9 controls">
                                                                        <div class="row">
                                                                            <div class="col-xs-6"><input type="password"
                                                                                                         placeholder=""
                                                                                                         class="form-control"/>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div class="form-group mbn"><label
                                                                        class="col-sm-3 control-label"></label>

                                                                    <div class="col-sm-9 controls">
                                                                        <button type="submit" class="btn btn-success"><i
                                                                                class="fa fa-save"></i>&nbsp;
                                                                            Save
                                                                        </button>
                                                                        &nbsp; &nbsp;<a href="#"
                                                                                        class="btn btn-default">Cancel</a>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </form>
                                                    </div>
                                                    <div id="tab-contact-setting" class="tab-pane fade">
                                                        <form action="#" class="form-horizontal">
                                                            <div class="form-group"><label
                                                                    class="col-sm-3 control-label">Mobile Phone</label>

                                                                <div class="col-sm-9 controls"><input type="text"
                                                                                                      placeholder="0-123-456-789"
                                                                                                      class="form-control"/>
                                                                </div>
                                                            </div>
                                                            <div class="form-group"><label
                                                                    class="col-sm-3 control-label">Website</label>

                                                                <div class="col-sm-9 controls"><input type="text"
                                                                                                      placeholder="http://website.com"
                                                                                                      class="form-control"/>
                                                                </div>
                                                            </div>
                                                            <div class="form-group"><label
                                                                    class="col-sm-3 control-label">Facebook</label>

                                                                <div class="col-sm-9 controls"><input type="text"
                                                                                                      placeholder=""
                                                                                                      class="form-control"/>
                                                                </div>
                                                            </div>
                                                            <div class="form-group"><label
                                                                    class="col-sm-3 control-label">Twitter</label>

                                                                <div class="col-sm-9 controls"><input type="text"
                                                                                                      placeholder=""
                                                                                                      class="form-control"/>
                                                                </div>
                                                            </div>
                                                            <div class="form-group mbn"><label
                                                                    class="col-sm-3 control-label"></label>

                                                                <div class="col-sm-9 controls">
                                                                    <button type="submit" class="btn btn-success"><i
                                                                            class="fa fa-save"></i>&nbsp;
                                                                        Save
                                                                    </button>
                                                                    &nbsp; &nbsp;<a href="#" class="btn btn-default">Cancel</a>
                                                                </div>
                                                            </div>
                                                        </form>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-3">
                                                <ul class="nav nav-pills nav-stacked">
                                                    <li class="active"><a href="#tab-profile-setting" data-toggle="tab"><i
                                                            class="fa fa-folder-open"></i>&nbsp;
                                                        Profile Setting</a></li>
                                                    <li><a href="#tab-account-setting" data-toggle="tab"><i
                                                            class="fa fa-cogs"></i>&nbsp;
                                                        Account Setting</a></li>
                                                    <li><a href="#tab-contact-setting" data-toggle="tab"><i
                                                            class="fa fa-envelope-o"></i>&nbsp;
                                                        Contact Setting</a></li>
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                    <div id="tab-messages" class="tab-pane fade in">
                                        <div class="row mbl">
                                            <div class="col-lg-6"><span style="margin-left: 15px"></span><input
                                                    type="checkbox" title="Check All" class="checkall-email"/><a
                                                    href="#" class="btn btn-success btn-sm mlm mrm"><i
                                                    class="fa fa-send-o"></i>&nbsp;
                                                Write Mail</a><a href="#" class="btn btn-white btn-sm"><i
                                                    class="fa fa-trash-o"></i>&nbsp;
                                                Delete</a></div>
                                            <div class="col-lg-6">
                                                <div class="input-group"><input type="text" class="form-control"/><span
                                                        class="input-group-btn"><button type="button"
                                                                                        class="btn btn-white">Search
                                                </button></span></div>
                                            </div>
                                        </div>
                                        <div class="list-group"><a href="#" class="list-group-item"><input
                                                type="checkbox"/><span
                                                class="fa fa-star text-yellow mrm mlm"></span><span
                                                style="min-width: 120px; display: inline-block;" class="name">Bhaumik Patel</span><span>Sed ut perspiciatis unde</span>&nbsp;
                                            - &nbsp;<span style="font-size: 11px;" class="text-muted">Lorem ipsum dolor sit amet, consectetur</span><span
                                                    class="badge">12:10 AM</span><span class="pull-right mrl"><span
                                                    class="glyphicon glyphicon-paperclip"></span></span></a><a href="#"
                                                                                                               class="list-group-item"><input
                                                type="checkbox"/><span class="fa fa-star-o mrm mlm"></span><span
                                                style="min-width: 120px; display: inline-block;" class="name">Bhaumik Patel</span><span>Sed ut perspiciatis unde</span>&nbsp;
                                            - &nbsp;<span style="font-size: 11px;" class="text-muted">Lorem ipsum dolor sit amet</span><span
                                                    class="badge">12:10 AM</span><span class="pull-right mrl"><span
                                                    class="glyphicon glyphicon-paperclip"></span></span></a><a href="#"
                                                                                                               class="list-group-item"><input
                                                type="checkbox"/><span
                                                class="fa fa-star text-yellow mrm mlm"></span><span
                                                style="min-width: 120px; display: inline-block;" class="name">Bhaumik Patel</span><span>Sed ut perspiciatis unde</span>&nbsp;
                                            - &nbsp;<span style="font-size: 11px;" class="text-muted">Lorem ipsum dolor sit amet, consectetur </span><span
                                                    class="badge">12:10 AM</span><span class="pull-right mrl"><span
                                                    class="glyphicon glyphicon-paperclip"></span></span></a><a href="#"
                                                                                                               class="list-group-item"><input
                                                type="checkbox"/><span class="fa fa-star-o mrm mlm"></span><span
                                                style="min-width: 120px; display: inline-block;" class="name">Bhaumik Patel</span><span>Sed ut perspiciatis unde</span>&nbsp;
                                            - &nbsp;<span style="font-size: 11px;" class="text-muted">Lorem ipsum dolor sit amet</span><span
                                                    class="badge">12:10 AM</span><span class="pull-right mrl"><span
                                                    class="glyphicon glyphicon-paperclip"></span></span></a><a href="#"
                                                                                                               class="list-group-item"><input
                                                type="checkbox"/><span class="fa fa-star-o mrm mlm"></span><span
                                                style="min-width: 120px; display: inline-block;" class="name">Bhaumik Patel</span><span>Sed ut perspiciatis unde</span>&nbsp;
                                            - &nbsp;<span style="font-size: 11px;" class="text-muted">Lorem ipsum dolor sit amet</span><span
                                                    class="badge">12:10 AM</span><span class="pull-right mrl"><span
                                                    class="glyphicon glyphicon-paperclip"></span></span></a><a href="#"
                                                                                                               class="list-group-item"><input
                                                type="checkbox"/><span class="fa fa-star-o mrm mlm"></span><span
                                                style="min-width: 120px; display: inline-block;" class="name">Bhaumik Patel</span><span>Sed ut perspiciatis unde</span>&nbsp;
                                            - &nbsp;<span style="font-size: 11px;" class="text-muted">Lorem ipsum dolor sit amet</span><span
                                                    class="badge">12:10 AM</span><span class="pull-right mrl"><span
                                                    class="glyphicon glyphicon-paperclip"></span></span></a><a href="#"
                                                                                                               class="list-group-item"><input
                                                type="checkbox"/><span class="fa fa-star-o mrm mlm"></span><span
                                                style="min-width: 120px; display: inline-block;" class="name">Bhaumik Patel</span><span>Sed ut perspiciatis unde</span>&nbsp;
                                            - &nbsp;<span style="font-size: 11px;" class="text-muted">Lorem ipsum dolor sit amet, consectetur</span><span
                                                    class="badge">12:10 AM</span><span class="pull-right mrl"><span
                                                    class="glyphicon glyphicon-paperclip"></span></span></a><a href="#"
                                                                                                               class="list-group-item"><input
                                                type="checkbox"/><span class="fa fa-star-o mrm mlm"></span><span
                                                style="min-width: 120px; display: inline-block;" class="name">Bhaumik Patel</span><span>Sed ut perspiciatis unde</span>&nbsp;
                                            - &nbsp;<span style="font-size: 11px;" class="text-muted">Lorem ipsum dolor sit amet, consectetur </span><span
                                                    class="badge">12:10 AM</span><span class="pull-right mrl"><span
                                                    class="glyphicon glyphicon-paperclip"></span></span></a><a href="#"
                                                                                                               class="list-group-item"><input
                                                type="checkbox"/><span class="fa fa-star-o mrm mlm"></span><span
                                                style="min-width: 120px; display: inline-block;" class="name">Bhaumik Patel</span><span>Sed ut perspiciatis unde</span>&nbsp;
                                            - &nbsp;<span style="font-size: 11px;" class="text-muted">Lorem ipsum dolor sit amet,</span><span
                                                    class="badge">12:10 AM</span><span class="pull-right mrl"><span
                                                    class="glyphicon glyphicon-paperclip"></span></span></a><a href="#"
                                                                                                               class="list-group-item"><input
                                                type="checkbox"/><span class="fa fa-star-o mrm mlm"></span><span
                                                style="min-width: 120px; display: inline-block;" class="name">Bhaumik Patel</span><span>Sed ut perspiciatis unde</span>&nbsp;
                                            - &nbsp;<span style="font-size: 11px;" class="text-muted">Lorem ipsum dolor sit amet</span><span
                                                    class="badge">12:10 AM</span><span class="pull-right mrl"><span
                                                    class="glyphicon glyphicon-paperclip"></span></span></a><a href="#"
                                                                                                               class="list-group-item"><input
                                                type="checkbox"/><span class="fa fa-star-o mrm mlm"></span><span
                                                style="min-width: 120px; display: inline-block;" class="name">Bhaumik Patel</span><span>Sed ut perspiciatis unde</span>&nbsp;
                                            - &nbsp;<span style="font-size: 11px;" class="text-muted">Lorem ipsum dolor sit amet, consectetur </span><span
                                                    class="badge">12:10 AM</span><span class="pull-right mrl"><span
                                                    class="glyphicon glyphicon-paperclip"></span></span></a><a href="#"
                                                                                                               class="list-group-item"><input
                                                type="checkbox"/><span class="fa fa-star-o mrm mlm"></span><span
                                                style="min-width: 120px; display: inline-block;" class="name">Bhaumik Patel</span><span>Sed ut perspiciatis unde</span>&nbsp;
                                            - &nbsp;<span style="font-size: 11px;" class="text-muted">Lorem ipsum dolor sit amet</span><span
                                                    class="badge">12:10 AM</span><span class="pull-right mrl"><span
                                                    class="glyphicon glyphicon-paperclip"></span></span></a></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!--END CONTENT--></div>
        <!--BEGIN FOOTER-->
        <?php  require_once './include/footer.php';?>
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
<script src="<?=base_url();?>assets/vendors/bootstrap-datepicker/js/bootstrap-datepicker.js"></script>
<script src="<?=base_url();?>assets/js/extra-profile.js"></script>

</body>
</html>
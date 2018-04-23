<!DOCTYPE html>
<html lang="en">
<head><title>Create Sub Leader</title>
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
    <link type="text/css" rel="stylesheet" href="<?=base_url();?>assets/vendors/jquery-bootstrap-wizard/custom.css">
    <link type="text/css" rel="stylesheet" href="<?=base_url();?>assets/vendors/jquery-steps/css/jquery.steps.css">
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
                    <div class="page-title">Sub Leader</div>
                </div>
                <ol class="breadcrumb page-breadcrumb">
                    <li><i class="fa fa-home"></i>&nbsp;<a href="<?=base_url();?>leader/home">Home</a>&nbsp;&nbsp;<i
                            class="fa fa-angle-right"></i>&nbsp;&nbsp;</li>
                    <li><a href="#">Organize</a>&nbsp;&nbsp;<i class="fa fa-angle-right"></i>&nbsp;&nbsp;</li>
                    <li><a href="<?=base_url();?>leader/team">Team</a>&nbsp;&nbsp;<i class="fa fa-angle-right"></i>&nbsp;&nbsp;</li>
                    <li class="active">Sub Leader</li>
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
                    <div class="col-lg-12">
                        <div class="portlet box portlet-green">
                            <div class="portlet-header">
                                <div class="caption">New Sub Leader</div>
                                <?php /*<div class="tools"><i class="fa fa-chevron-up"></i><i data-toggle="modal"
                                                                                      data-target="#modal-config"
                                                                                      class="fa fa-cog"></i><i
                                        class="fa fa-refresh"></i><i class="fa fa-times"></i></div> */ ?>
                            </div>
                            <div class="portlet-body">
                                <div id="rootwizard-custom-circle">
                                    <div class="navbar">
                                        <div class="navbar-inner">
                                            <ul>
                                                <li><a href="#tab1-wizard-custom-circle" data-toggle="tab"><i
                                                        class="glyphicon glyphicon-user"></i>

                                                    <p class="anchor">1. Basic Information</p>

                                                    <p class="description">Choose Basic Information</p></a></li>
                                                <li><a href="#tab2-wizard-custom-circle" data-toggle="tab"><i
                                                        class="glyphicon glyphicon-send mln"></i>

                                                    <p class="anchor">2. Contact Information</p>

                                                    <p class="description">Provide information</p></a></li>
                                                <li><a href="#tab3-wizard-custom-circle" data-toggle="tab"><i
                                                        class="glyphicon glyphicon-shopping-cart"></i>

                                                    <p class="anchor">3. Address Information</p>

                                                    <p class="description">Village / Town</p></a></li>
                                                <li><a href="#tab4-wizard-custom-circle" data-toggle="tab"><i
                                                        class="glyphicon glyphicon-check"></i>

                                                    <p class="anchor">4. Finish</p>

                                                    <p class="description"></p></a></li>
                                            </ul>
                                        </div>
                                    </div>
                                    <div id="bar" class="progress active">
                                        <div class="bar progress-bar progress-bar-primary"></div>
                                    </div>
                                    <div class="tab-content">
                                        <div id="tab1-wizard-custom-circle" class="tab-pane"><h3 class="mbxl">Choose Basic Information</h3>

                                            <form action="#" class="form-horizontal">
                                                <div class="form-group"><label for="inputUsername"
                                                                               class="col-sm-3 control-label">First Name
                                                    <span class='require'>*</span></label>

                                                    <div class="col-sm-9">
                                                        <div class="input-group"><span class="input-group-addon"><i
                                                                class="fa fa-user"></i></span><input type="text"
                                                                                                     placeholder="First Name"
                                                                                                     class="inputUsername form-control"/>
                                                        </div>
                                                        <i class="alert alert-hide">Oops! Forgot something? Let try
                                                            again.</i></div>
                                                </div>
                                                <div class="form-group"><label for="inputUsername"
                                                                               class="col-sm-3 control-label">Last Name
                                                    <span class='require'>*</span></label>

                                                    <div class="col-sm-9">
                                                        <div class="input-group"><span class="input-group-addon"><i
                                                                class="fa fa-user"></i></span><input type="text"
                                                                                                     placeholder="Last Name"
                                                                                                     class="inputUsername form-control"/>
                                                        </div>
                                                        <i class="alert alert-hide">Oops! Forgot something? Let try
                                                            again.</i></div>
                                                </div>
                                                <div class="form-group"><label for="inputUsername"
                                                                               class="col-sm-3 control-label">Email
                                                    <span class='require'>*</span></label>

                                                    <div class="col-sm-9">
                                                        <div class="input-group"><span class="input-group-addon"><i
                                                                class="fa fa-user"></i></span><input type="text"
                                                                                                     placeholder="Email"
                                                                                                     class="inputUsername form-control"/>
                                                        </div>
                                                        <i class="alert alert-hide">Oops! Forgot something? Let try
                                                            again.</i></div>
                                                </div>
                                                
                                            </form>
                                        </div>
                                        <div id="tab2-wizard-custom-circle" class="tab-pane"><h3 class="mbxl">Contact
                                            information</h3>

                                            <div class="row">
                                                <div class="col-md-12">
                                                    <div class="form-group"><label for="inputStreet"
                                                                                   class="control-label">Name <span
                                                            class='require'>*</span></label><input id="inputStreet"
                                                                                                   type="text"
                                                                                                   placeholder=""
                                                                                                   class="form-control"/><i
                                                            class="alert alert-hide">Oops! Forgot something? Let try
                                                        again.</i></div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <div class="form-group"><label for="inputFirstName"
                                                                                   class="control-label">Email</label><input
                                                            id="inputDistrict" type="text" placeholder=""
                                                            class="form-control"/><i class="alert alert-hide">Oops!
                                                        Forgot something? Let try again.</i></div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group"><label for="inputCity"
                                                                                   class="control-label">Phone <span
                                                            class='require'>*</span></label><input id="inputCity"
                                                                                                   type="text"
                                                                                                   placeholder=""
                                                                                                   class="form-control"/><i
                                                            class="alert alert-hide">Oops! Forgot something? Let try
                                                        again.</i></div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <div class="form-group"><label for="inputPostCode"
                                                                                   class="control-label">Post
                                                        Code</label><input id="inputPostCode" type="text" placeholder=""
                                                                           class="form-control"/><i
                                                            class="alert alert-hide">Oops! Forgot something? Let try
                                                        again.</i></div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group"><label for="selCountry"
                                                                                   class="control-label">Country</label><select
                                                            id="selCountry" class="form-control">
                                                        <option value="">Select a Country</option>
                                                        <option value="">United States</option>
                                                        <option value="">England</option>
                                                        <option value="">France</option>
                                                        <option value="">Spain</option>
                                                    </select></div>
                                                </div>
                                            </div>
                                        </div>
                                        <div id="tab3-wizard-custom-circle" class="tab-pane fadeIn"><h3 class="mbxl">
                                            Address Information</h3>

                                            <div class="row">
                                                <div class="col-md-12">
                                                    <div class="form-group"><label for="inputStreet"
                                                                                   class="control-label">Street <span
                                                            class='require'>*</span></label><input id="inputStreet"
                                                                                                   type="text"
                                                                                                   placeholder=""
                                                                                                   class="form-control"/><i
                                                            class="alert alert-hide">Oops! Forgot something? Let try
                                                        again.</i></div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <div class="form-group"><label for="inputFirstName"
                                                                                   class="control-label">District</label><input
                                                            id="inputDistrict" type="text" placeholder=""
                                                            class="form-control"/><i class="alert alert-hide">Oops!
                                                        Forgot something? Let try again.</i></div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group"><label for="inputCity"
                                                                                   class="control-label">City <span
                                                            class='require'>*</span></label><input id="inputCity"
                                                                                                   type="text"
                                                                                                   placeholder=""
                                                                                                   class="form-control"/><i
                                                            class="alert alert-hide">Oops! Forgot something? Let try
                                                        again.</i></div>
                                                </div>
                                            </div>
                                        </div>
                                        <div id="tab4-wizard-custom-circle" class="tab-pane fadeIn"><h3 class="mbxl">
                                            Thank you!</h3>

                                            <p>Congratulation! New Sub Leader is created and send for approval.</p>

                                            <p></p></div>
                                        <div class="action text-right">
                                            <button type="button" name="previous" value="Previous"
                                                    class="btn btn-info button-previous"><i
                                                    class="fa fa-arrow-circle-o-left mrx"></i>Previous
                                            </button>
                                            <button type="button" name="next" value="Next"
                                                    class="btn btn-info button-next mlm">Next<i
                                                    class="fa fa-arrow-circle-o-right mlx"></i></button>
                                        </div>
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
<script src="<?=base_url();?>assets/vendors/jquery-validate/jquery.validate.min.js"></script>
<script src="<?=base_url();?>assets/vendors/jquery-steps/js/jquery.steps.min.js"></script>
<script src="<?=base_url();?>assets/vendors/jquery-bootstrap-wizard/jquery.bootstrap.wizard.min.js"></script>
<script src="<?=base_url();?>assets/js/form-wizard.js"></script>

</body>
</html>
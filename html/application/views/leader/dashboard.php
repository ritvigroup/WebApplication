<!DOCTYPE html>
<html lang="en">
<head><title>Dashboard | Dashboard</title>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="cache-control" content="no-cache">
    <meta http-equiv="expires" content="Thu, 19 Nov 1900 08:52:00 GMT">
    <link rel="shortcut icon" href="images/icons/favicon.ico">
    <link rel="apple-touch-icon" href="images/icons/favicon.png">
    <link rel="apple-touch-icon" sizes="72x72" href="images/icons/favicon-72x72.png">
    <link rel="apple-touch-icon" sizes="114x114" href="images/icons/favicon-114x114.png">
    <!--Loading bootstrap css-->
    <link type="text/css" rel="stylesheet"
          href="http://fonts.googleapis.com/css?family=Open+Sans:400italic,400,300,700">
    <link type="text/css" rel="stylesheet" href="http://fonts.googleapis.com/css?family=Oswald:400,700,300">
    <link type="text/css" rel="stylesheet"
          href="<?=base_url();?>assets/vendors/jquery-ui-1.10.4.custom/css/ui-lightness/jquery-ui-1.10.4.custom.min.css">
    <link type="text/css" rel="stylesheet" href="<?=base_url();?>assets/vendors/font-awesome/css/font-awesome.min.css">
    <link type="text/css" rel="stylesheet" href="<?=base_url();?>assets/vendors/bootstrap/css/bootstrap.min.css">
    <!--LOADING STYLESHEET FOR PAGE-->
    <link type="text/css" rel="stylesheet" href="<?=base_url();?>assets/vendors/intro.js/introjs.css">
    <link type="text/css" rel="stylesheet" href="<?=base_url();?>assets/vendors/calendar/zabuto_calendar.min.css">
    <link type="text/css" rel="stylesheet" href="<?=base_url();?>assets/vendors/sco.message/sco.message.css">
    <link type="text/css" rel="stylesheet" href="<?=base_url();?>assets/vendors/intro.js/introjs.css">
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
    
    <?php  include_once './include/top.php';?>

    <div id="wrapper"><!--BEGIN SIDEBAR MENU-->
        
        <?php  include_once './include/left.php';?>


        <!--END CHAT FORM--><!--BEGIN PAGE WRAPPER-->
        <div id="page-wrapper"><!--BEGIN TITLE & BREADCRUMB PAGE-->
            <div id="title-breadcrumb-option-demo" class="page-title-breadcrumb">
                <div class="page-header pull-left">
                    <div class="page-title">Dashboard</div>
                </div>
                <ol class="breadcrumb page-breadcrumb pull-left">
                    <li><i class="fa fa-home"></i>&nbsp;<a href="<?=base_url();?>leader/dashboard">Home</a>&nbsp;&nbsp;<i
                            class="fa fa-angle-right"></i>&nbsp;&nbsp;</li>
                    <li class="hidden"><a href="#">Dashboard</a>&nbsp;&nbsp;<i class="fa fa-angle-right"></i>&nbsp;&nbsp;
                    </li>
                    <li class="active">Dashboard</li>
                </ol>
                <div class="btn btn-blue reportrange"><i class="fa fa-calendar"></i>&nbsp;<span></span>&nbsp;report&nbsp;<i
                        class="fa fa-angle-down"></i><input type="hidden" name="datestart"/><input type="hidden"
                                                                                                   name="endstart"/>
                </div>
                <div class="clearfix"></div>
            </div>
            <!--END TITLE & BREADCRUMB PAGE--><!--BEGIN CONTENT-->
            <div class="page-content">
                <div id="tab-general">
                    <div id="sum_box" class="row mbl">
                        <div class="col-sm-6 col-md-4">
                           
                            <div class="panel panel-white">
                            <div class="panel-heading">Ordered Lists</div>
                            <div class="panel-body">
                                <ol>
                                    <li>Lorem ipsum dolor sit amet</li>
                                    <li>Consectetur adipiscing elit</li>
                                    <li>Integer molestie lorem at massa</li>
                                    <li>Facilisis in pretium nisl aliquet</li>
                                    <li>Nulla volutpat aliquam velit</li>
                                    <li>Faucibus porta lacus fringilla vel</li>
                                    <li>Aenean sit amet erat nunc</li>
                                    <li>Eget porttitor lorem</li>
                                </ol>
                            </div>
                        </div>
                               
                            
                           
                        </div>
                        <div class="col-sm-6 col-md-4">
                          
                            
                                      <div class="panel panel-white">
                            <div class="panel-heading">Unordered Lists</div>
                            <div class="panel-body">
                                <ul>
                                    <li>Lorem ipsum dolor sit amet</li>
                                    <li>Consectetur adipiscing elit</li>
                                    <li>Integer molestie lorem at massa</li>
                                    <li>Facilisis in pretium nisl aliquet</li>
                                    <li>Nulla volutpat aliquam velit
                                        <ul>
                                            <li>Phasellus iaculis neque</li>
                                            <li>Purus sodales ultricies</li>
                                            <li>Vestibulum laoreet porttitor sem</li>
                                            <li>Ac tristique libero volutpat at</li>
                                        </ul>
                                    </li>
                                    <li>Faucibus porta lacus fringilla vel</li>
                                    <li>Aenean sit amet erat nunc</li>
                                    <li>Eget porttitor lorem</li>
                                </ul>
                            </div>
                        </div>
                             
                          
                        </div>
                        <div class="col-sm-6 col-md-4">
                               <div class="panel panel-white">
                            <div class="panel-heading">Lists With Font Awesome</div>
                            <div class="panel-body">
                                <ul class="list-icon">
                                    <li>Lorem ipsum dolor sit amet</li>
                                    <li>Consectetur adipiscing elit</li>
                                    <li>Integer molestie lorem at massa</li>
                                    <li>Facilisis in pretium nisl aliquet</li>
                                    <li>Nulla volutpat aliquam velit</li>
                                    <li>Faucibus porta lacus fringilla vel</li>
                                    <li>Aenean sit amet erat nunc</li>
                                    <li>Eget porttitor lorem</li>
                                </ul>
                            </div>
                        </div>
                        </div>

                                   <div class="col-sm-6 col-md-4">
                             <div class="panel panel-white">
                            <div class="panel-heading">Unstyled Lists</div>
                            <div class="panel-body">
                                <ul class="list-unstyled">
                                    <li>Lorem ipsum dolor sit amet</li>
                                    <li>Consectetur adipiscing elit</li>
                                    <li>Integer molestie lorem at massa</li>
                                    <li>Facilisis in pretium nisl aliquet</li>
                                    <li>Nulla volutpat aliquam velit</li>
                                    <li>Faucibus porta lacus fringilla vel</li>
                                    <li>Aenean sit amet erat nunc</li>
                                    <li>Eget porttitor lorem</li>
                                </ul>
                            </div>
                        </div>
                        </div>
                        <div class="col-sm-6 col-md-4">
                               <div class="panel panel-white">
                            <div class="panel-heading">Inline Lists</div>
                            <div class="panel-body">
                                <ol class="list-inline">
                                    <li>1.Lorem ipsum</li>
                                    <li>2.Consectetur</li>
                                    <li>3.Integer</li>
                                </ol>
                            </div>
                        </div>
                        </div>
                        <div class="col-sm-6 col-md-4">
                            <div class="panel panel-white">
                            <div class="panel-heading">Description Lists</div>
                            <div class="panel-body">
                                <dl>
                                    <dt>Description lists</dt>
                                    <dd>A description list is perfect for defining terms.</dd>
                                    <dt>Euismod</dt>
                                    <dd>Vestibulum id ligula porta felis euismod semper eget lacinia odio sem nec
                                        elit.
                                    </dd>
                                    <dd>Donec id elit non mi porta gravida at eget metus.</dd>
                                    <dt>Malesuada porta</dt>
                                    <dd>Etiam porta sem malesuada magna mollis euismod.</dd>
                                </dl>
                            </div>
                        </div>
                        </div>

                 
                  



                  <!--       <div class="col-sm-6 col-md-3">
                            <div class="panel visit db mbm">
                                <div class="panel-body"><p class="icon"><i class="icon fa fa-group"></i></p><h4
                                        class="value"><span>78,450.00</span></h4>

                                    <p class="description">Group Complaint</p>

                                    <div class="progress progress-sm mbn">
                                        <div role="progressbar" aria-valuenow="70" aria-valuemin="0" aria-valuemax="100"
                                             style="width: 70%;" class="progress-bar progress-bar-warning"><span
                                                class="sr-only">70% Complete (success)</span></div>
                                    </div>
                                </div>
                            </div>
                        </div> -->
                    </div>
                 

                    
                </div>
            </div>
            <!--END CONTENT-->
        </div>
        
        <?php  require_once './include/footer.php';?>
        <!--END PAGE WRAPPER-->
    </div>
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
<script src="<?=base_url();?>assets/vendors/intro.js/intro.js"></script>
<script src="<?=base_url();?>assets/vendors/flot-chart/jquery.flot.js"></script>
<script src="<?=base_url();?>assets/vendors/flot-chart/jquery.flot.categories.js"></script>
<script src="<?=base_url();?>assets/vendors/flot-chart/jquery.flot.pie.js"></script>
<script src="<?=base_url();?>assets/vendors/flot-chart/jquery.flot.tooltip.js"></script>
<script src="<?=base_url();?>assets/vendors/flot-chart/jquery.flot.resize.js"></script>
<script src="<?=base_url();?>assets/vendors/flot-chart/jquery.flot.fillbetween.js"></script>
<script src="<?=base_url();?>assets/vendors/flot-chart/jquery.flot.stack.js"></script>
<script src="<?=base_url();?>assets/vendors/flot-chart/jquery.flot.spline.js"></script>
<script src="<?=base_url();?>assets/vendors/calendar/zabuto_calendar.min.js"></script>
<script src="<?=base_url();?>assets/vendors/sco.message/sco.message.js"></script>
<script src="<?=base_url();?>assets/vendors/intro.js/intro.js"></script>
<script src="<?=base_url();?>assets/js/index.js"></script>

</body>
</html>
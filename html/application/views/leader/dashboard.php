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
    
    <?php  require_once 'include/top.php';?>

    <div id="wrapper"><!--BEGIN SIDEBAR MENU-->
        
        <?php  require_once 'include/left.php';?>


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
                        <div class="col-sm-6 col-md-3">
                            <div class="panel profit db mbm">
                                <div class="panel-body"><p class="icon"><i class="icon fa fa-shopping-cart"></i></p><h4
                                        class="value"><span data-counter="" data-start="10" data-end="50" data-step="1"
                                                            data-duration="0"></span><span>36</span></h4>

                                    <p class="description">Total Coommunication</p>

                                    <div class="progress progress-sm mbn">
                                        <div role="progressbar" aria-valuenow="80" aria-valuemin="0" aria-valuemax="100"
                                             style="width: 80%;" class="progress-bar progress-bar-success"><span
                                                class="sr-only">80% Complete (success)</span></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-6 col-md-3">
                            <div class="panel income db mbm">
                                <div class="panel-body"><p class="icon"><i class="icon fa fa-money"></i></p><h4
                                        class="value"><span>157</span></h4>

                                    <p class="description">Complaint</p>

                                    <div class="progress progress-sm mbn">
                                        <div role="progressbar" aria-valuenow="60" aria-valuemin="0" aria-valuemax="100"
                                             style="width: 60%;" class="progress-bar progress-bar-info"><span
                                                class="sr-only">60% Complete (success)</span></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-6 col-md-3">
                            <div class="panel task db mbm">
                                <div class="panel-body"><p class="icon"><i class="icon fa fa-signal"></i></p><h4
                                        class="value"><span>17.9</span></h4>

                                    <p class="description">Suggestion</p>

                                    <div class="progress progress-sm mbn">
                                        <div role="progressbar" aria-valuenow="50" aria-valuemin="0" aria-valuemax="100"
                                             style="width: 50%;" class="progress-bar progress-bar-danger"><span
                                                class="sr-only">50% Complete (success)</span></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-6 col-md-3">
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
                        </div>
                    </div>
                    <div class="row mbl">
                        <div class="col-lg-8">
                            
                            <div class="row">
                                        <div class="col-md-12">
                                        <div class="portlet box">
                                        <div class="portlet-header">
                                <div class="caption">Recent Communication</div>
                                <div class="tools">
                                <div class="row"><div class="col-lg-5  "><div class="btn-group"> <button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Complaint<span class="caret"></span></button> <ul class="dropdown-menu"> <li><a href="#" class="dropdown-item">Suggestion</a></li> <li><a href="#" class="dropdown-item">Group Complain</a></li><li><a href="#" class="dropdown-item">Other Complain</a></li>  </ul> </div></div>
                                <div class="col-lg-5 "><div class="btn-group"> <button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Today <span class="caret"></span></button> <ul class="dropdown-menu"> <li><a href="#" class="dropdown-item">Last 2 Days</a></li> <li><a href="#" class="dropdown-item">Last 7 Days</a></li>  </ul> </div></div>
                                <div class="col-lg-2 no-padding"><i class="fa fa-refresh"></i></div>
                                                 
                                                 </div>
                                                 </div>
                            </div>
                            
                         
                                 <div class="portlet-body">
                                 <div id="area-chart-spline" style="width: 100%; height:300px"></div>
                                  </div>
                                  </div>
                                  </div>
                                        
                                    </div>
                        </div>
                        <div class="col-lg-4">
                           <div class="portlet box prolet-primary">
                                <div class="portlet-header">
                                    <div class="caption ">Campaign
                                    </div>
                                    <div class="tools">
                                <div class="row">
                                <div class="col-lg-10 "><div class="btn-group btn-tab-group">
                                        <button type="button" class="btn btn-white btn-tab">Online</button>
                                        <button type="button" class="btn btn-white btn-tab">Offline</button>
                                     </div></div>
                                <div class="col-lg-2 no-padding"><i class="fa fa-refresh"></i></div>
                                                 
                                                 </div>
                                                 </div>
                                </div>
                                <div class="portlet-body">
                                    <div class="ads-resume">
                                        <div class="ads-info">
                                        <div class="ads-progress"><span data-toggle="counter" data-end="55" data-suffix="%" class="ads-progress-counter">55%</span><span class="ads-progress-title">Click</span>
                                        <div class="progress">
                                        <div style="width: 55%" class="progress-bar progress-bar-primary"></div>
                                        </div>
                                        </div>
                                        <div id="ads-chart-legend" class="ads-legend"><table style="font-size:smaller;color:#545454"><tbody><tr><td class="legendColorBox"><div style="border:1px solid #ccc;padding:1px"><div style="width:4px;height:0;border:5px solid rgb(62,211,151);overflow:hidden"></div></div></td><td class="legendLabel">Google ads</td></tr><tr><td class="legendColorBox"><div style="border:1px solid #ccc;padding:1px"><div style="width:4px;height:0;border:5px solid rgb(44,193,133);overflow:hidden"></div></div></td><td class="legendLabel">Facebook</td></tr></tbody></table></div>
                                        </div>
                                        <div class="ads-users">
                                        <div class="widget-chart-container">
                                         <img src="<?=base_url();?>assets/images/campaign.jpg">
                                        </div>
                                        </div>
                                        </div>
                                         <div class="compaign-update">
                                          <img src="<?=base_url();?>assets/images/graph.jpg">
                                              </div>                              
                                </div>
                            </div> 
                        </div>
                    </div>
                    <div class="row mbl">
                        <div class="col-md-4">
                            <div class="portlet box">
                                <div class="portlet-header  ">
                                    <div class="caption  ">Connection
                                    </div>
                                    <div class="tools">
                                <i class="fa fa-refresh"></i>
                                </div>
                                </div>
                                <div style="overflow: hidden;" class="portlet-body">
                                    <div class="row">
                                        <div class="col-lg-6">
                                        <div class="widget-value-title">
                                        <div class="widget-value">232</div>
                                        <div class="widget-title">Total Connection</div>
                                        </div>
                                        </div>

                                        <div class="col-lg-6">
                                        <div class="widget-value-title">
                                        <div class="widget-value">5432</div>
                                        <div class="widget-title">New Connection</div>
                                        </div>
                                         
                                        </div>

                                        <div class="col-lg-6">
                                        <div class="widget-value-title">
                                        <div class="widget-value">890</div>
                                        <div class="widget-title">Assign for Communication</div>
                                        </div>
                                         </div>

                                        <div class="col-lg-6">
                                        <div class="widget-value-title">
                                        <div class="widget-value">643</div>
                                        <div class="widget-title"> Not assign for Communication</div>
                                        </div>
                                         </div>


                                        </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="portlet box">
                                <div class="portlet-header  ">
                                    <div class="caption ">Broadcast
                                    </div>
                                    <div class="tools">
                                <i class="fa fa-refresh"></i>
                                </div>
                                </div>
                                <div style="overflow: hidden;" class="portlet-body">
                                    <div class="table-responsive">
                                    <table class="table table-striped table-bordered table-hover">
                                        <thead>
                                        <tr>
                                            <th>#</th>
                                            <th>Post Name   </th>
                                            <th>Likes</th>
                                            <th>Comments</th>
                                                 </tr>
                                        </thead>
                                        <tbody>
                                        <tr>
                                            <td>1</td>
                                            <td>Meeting schedule    </td>
                                            <td>87K</td>
                                            <td>12K</td>
                                        </tr>
                                        
                                         <tr>
                                            <td>2</td>
                                            <td>Meeting schedule    </td>
                                            <td>87K</td>
                                            <td>12K</td>
                                        </tr>
                                         <tr>
                                            <td>3</td>
                                            <td>Meeting schedule    </td>
                                            <td>87K</td>
                                            <td>12K</td>
                                        </tr>
                                        </tbody>
                                    </table>
                                </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4">
                         <div id="my-calendar"></div>
                        </div>
                    </div>
                    
                </div>
            </div>
            <!--END CONTENT-->
        </div>
        
        <?php  require_once 'include/footer.php';?>
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
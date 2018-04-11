<!DOCTYPE html>
<html lang="en">
<head><title>New Plan</title>
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

    <link type="text/css" rel="stylesheet" href="<?php echo base_url(); ?>assets/css/sweetalert.css?ver=1.04">

    <!--LOADING STYLESHEET FOR PAGE-->
    <link type="text/css" rel="stylesheet" href="<?=base_url();?>assets/vendors/bootstrap-colorpicker/css/colorpicker.css">
    <link type="text/css" rel="stylesheet" href="<?=base_url();?>assets/vendors/bootstrap-datepicker/css/datepicker.css">
    <link type="text/css" rel="stylesheet" href="<?=base_url();?>assets/vendors/bootstrap-daterangepicker/daterangepicker-bs3.css">
    <link type="text/css" rel="stylesheet"
          href="<?=base_url();?>assets/vendors/bootstrap-datetimepicker/build/css/bootstrap-datetimepicker.min.css">
    <link type="text/css" rel="stylesheet" href="<?=base_url();?>assets/vendors/bootstrap-timepicker/css/bootstrap-timepicker.min.css">
    <link type="text/css" rel="stylesheet" href="<?=base_url();?>assets/vendors/bootstrap-clockface/css/clockface.css">
    <link type="text/css" rel="stylesheet" href="<?=base_url();?>assets/vendors/bootstrap-switch/css/bootstrap-switch.css">
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
                    <div class="page-title">Plan</div>
                </div>
                <ol class="breadcrumb page-breadcrumb">
                    <li><i class="fa fa-home"></i>&nbsp;<a href="<?=base_url();?>leader/home">Home</a>&nbsp;&nbsp;<i
                            class="fa fa-angle-right"></i>&nbsp;&nbsp;</li>
                    <li><a href="#">Plan</a>&nbsp;&nbsp;<i class="fa fa-angle-right"></i>&nbsp;&nbsp;</li>
                    <li class="active">New</li>
                </ol>
                <div class="btn btn-blue reportrange hide"><i class="fa fa-calendar"></i>&nbsp;<span></span>&nbsp;report&nbsp;<i
                        class="fa fa-angle-down"></i><input type="hidden" name="datestart"/><input type="hidden"
                                                                                                   name="endstart"/>
                </div>
                <div class="clearfix"></div>
            </div>
            <!--END TITLE & BREADCRUMB PAGE-->
            <!--BEGIN CONTENT-->


            <?php

            // echo '<pre>';
            // print_r($UserType);
            // print_r($Vehicle);
            // print_r($Fund);
            // echo '</pre>';
            ?>


            <div class="page-content">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="portlet box portlet-green">
                            <div class="portlet-header">
                                <div class="caption">New Plan</div>
                            </div>
                            <div class="portlet-body">
                                
                                <h3 class="mbxl">Set Your Goal</h3>

                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="form-group">

                                                <h2>Your goal to be: <?php echo $plan_title; ?></h2>

                                                <input type="hidden" name="plan_title" value="<?php echo $plan_title; ?>">
                                                
                                        </div>
                                    </div>
                                </div>

                                <h3 class="mbxl">Lets define your Timeline</h3>
                                
                                <div class="row">
                                    <div class="col-md-6 controls">
                                        <div class="form-group">
                                            <label for="start_date" class="control-label">Start date</label>
                                            <input type="text" name="start_date" id="start_date" value="2018-04-05" data-date-format="yyyy-mm-dd" placeholder="yyyy-mm-dd" class="datepicker-normal form-control">
                                        </div>
                                    </div>

                                    <div class="col-md-6 controls">
                                        <div class="form-group">
                                            <label for="end_date" class="control-label">End Date</label>
                                            <input type="text" name="end_date" id="end_date" value="2019-04-05" data-date-format="yyyy-mm-dd" placeholder="yyyy-mm-dd" class="datepicker-normal form-control">
                                        </div>
                                    </div>
                                </div>
                                
                                <h3 class="mbxl">Lets define your Geography</h3>
                                
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="target_area" class="control-label">Target Area</label>
                                            <input type="text" name="target_area" id="target_area" class="form-control" value="Ghaziabad">
                                        </div>
                                    </div>

                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="specific_area" class="control-label">Specific Area</label>
                                            <input type="text" name="specific_area" id="specific_area" class="form-control" value="Indira Puram">
                                        </div>
                                    </div>
                                </div>

                                <h3 class="mbxl" style="text-align: center;"><button class="btn">Show !</button></h3>

                                <div class="row">
                                    <div class="col-md-2">
                                        <div class="form-group">
                                            Total Population: <input type="text" class="form-control" name="total_population" id="total_population" readonly="readonly" value="7876767676">
                                        </div>
                                    </div>
                                    <div class="col-md-2">
                                        <div class="form-group">
                                            Male Population: <input type="text" class="form-control" name="male_population" id="male_population" readonly="readonly" value="2332432432"><br>
                                        </div>
                                    </div>

                                    <div class="col-md-2">
                                        <div class="form-group">
                                            Female Population: <input type="text" class="form-control" name="female_population" id="female_population" readonly="readonly" value="5342352353"><br>
                                        </div>
                                    </div>

                                    <div class="col-md-2">
                                        <div class="form-group">
                                            >18 < 30 Yrs.: <input type="text" class="form-control" name="above_18_30_population" id="above_18_30_population" readonly="readonly" value="34235325"><br>
                                        </div>
                                    </div>

                                    <div class="col-md-2">
                                        <div class="form-group">
                                            > 31 < 50 Yrs.: <input type="text" class="form-control" name="above_31_50_population" id="above_31_50_population" readonly="readonly" value="34523523"><br>
                                        </div>
                                    </div>

                                    <div class="col-md-2">
                                        <div class="form-group">
                                            > 51 < 60 Yrs.: <input type="text" class="form-control" name="above_51_60_population" id="above_51_60_population" readonly="readonly" value="34325233"><br>
                                        </div>
                                    </div>

                                    <div class="col-md-2">
                                        <div class="form-group">
                                            > 60 Yrs.: <input type="text" class="form-control" name="above_60_population" id="above_60_population" readonly="readonly" value="11212121"><br>
                                        </div>
                                    </div>

                                    <div class="col-md-2">
                                        <div class="form-group">
                                            Total Area: <input type="text" class="form-control" name="total_area" id="total_area" readonly="readonly" value="1345665 sq. ft."><br>
                                        </div>
                                    </div>
                                </div>

                                <h3 class="mbxl">Let's connect people</h3>
                                <div class="row">
                                    <div class="col-md-2">
                                        <div class="form-group">
                                            Target Population: <input type="text" class="form-control" name="target_total_population" id="target_total_population" value="3432432432"><br>
                                        </div>
                                    </div>
                                    <div class="col-md-2">
                                        <div class="form-group">
                                            Target Male Population: <input type="text" class="form-control" name="target_male_population" id="target_male_population" value="2312312312"><br>
                                        </div>
                                    </div>
                                    <div class="col-md-2">
                                        <div class="form-group">
                                            Target Female Population: <input type="text" class="form-control" name="target_female_population" id="target_female_population" value="435345345"><br>
                                        </div>
                                    </div>
                                    <div class="col-md-2">
                                        <div class="form-group">
                                            Target > 18 < 30 Yrs.: <input type="text" class="form-control" name="target_above_18_30_population" id="target_above_18_30_population" value="35325325"><br>
                                        </div>
                                    </div>
                                    <div class="col-md-2">
                                        <div class="form-group">
                                            Target > 31 < 50 Yrs.: <input type="text" class="form-control" name="target_above_31_50_population" id="target_above_31_50_population" value="325324324"><br>
                                        </div>
                                    </div>
                                    <div class="col-md-2">
                                        <div class="form-group">
                                            Target > 51 < 60 Yrs.: <input type="text" class="form-control" name="target_above_51_60_population" id="target_above_51_60_population" value="3523523523"><br>
                                        </div>
                                    </div>
                                    <div class="col-md-2">
                                        <div class="form-group">
                                            Target > 60 Yrs.: <input type="text" class="form-control" name="target_above_60_population" id="target_above_60_population" value="232"><br>
                                        </div>
                                    </div>
                                    <div class="col-md-2">
                                        <div class="form-group">
                                            Target Total Area: <input type="text" class="form-control" name="target_total_area" id="target_total_area" value="222322 sq. ft."><br>
                                        </div>
                                    </div>

                                    <div class="col-md-2">
                                        <div class="form-group">
                                            Religion: 
                                            <select class="form-control" name="religion" id="religion">
                                                <option value="">All</option>
                                                <option value="">Hindu</option>
                                                <option value="">Muslim</option>
                                                <option value="">Sikh</option>
                                                <option value="">Cristian</option>
                                            </select>
                                        </div>
                                    </div>

                                    <div class="col-md-2">
                                        <div class="form-group">
                                            Caste: 
                                            <select class="form-control" name="caste" id="caste">
                                                <option value="">All</option>
                                                <option value="">ST</option>
                                                <option value="">SC</option>
                                                <option value="">OBC</option>
                                                <option value="">General</option>
                                            </select>
                                        </div>
                                    </div>

                                </div>

                                <h3 class="mbxl">Let's plan your team</h3>

                                <div class="row">
                                    
                                    <table width="100%" class="table">
                                        <tr>
                                            <td style="text-align: center;font-weight: bold;"></td>
                                            <td style="text-align: center;font-weight: bold;">Kaajneeti Suggested Team Size</td>
                                            <td style="text-align: center;font-weight: bold;">Your Planned Team Size</td>
                                            <td style="text-align: center;font-weight: bold;">Total Paid Team</td>
                                            <td style="text-align: center;font-weight: bold;">Paid Team Expenses</td>
                                        </tr>
                                        <tr>
                                            <td style="text-align: center">Male</td>
                                            <td><input type="text" class="form-control" style="text-align: center" value="20"></td>
                                            <td><input type="text" class="form-control" style="text-align: center" value="15"></td>
                                            <td><input type="text" class="form-control" style="text-align: center" value="2"></td>
                                            <td><input type="text" class="form-control" style="text-align: center" value="20000"></td>
                                        </tr>
                                        <tr>
                                            <td style="text-align: center">Female</td>
                                            <td><input type="text" class="form-control" style="text-align: center" value="25"></td>
                                            <td><input type="text" class="form-control" style="text-align: center" value="10"></td>
                                            <td><input type="text" class="form-control" style="text-align: center" value="5"></td>
                                            <td><input type="text" class="form-control" style="text-align: center" value="50000"></td>
                                        </tr>
                                    </table>
                                </div>

                                <h3 class="mbxl">Let's plan your action strategy <a href="javascript:void(0);" class="small btn btn-default addmorestrategy">Add More</a></h3>
                                <div class="row">
                                    <table width="100%" class="table" id="stategy_table">
                                        <tr>
                                            <td style="text-align: center;font-weight: bold;">Particular</td>
                                            <td style="text-align: center;font-weight: bold;">Kaajneeti Suggested</td>
                                            <td style="text-align: center;font-weight: bold;">Your Planned</td>
                                        </tr>
                                        <tr>
                                            <td style="text-align: center">Rally</td>
                                            <td><input type="text" class="form-control" style="text-align: center" value="3"></td>
                                            <td><input type="text" class="form-control" style="text-align: center" value="2"></td>
                                        </tr>
                                        <tr>
                                            <td style="text-align: center">Road Show</td>
                                            <td><input type="text" class="form-control" style="text-align: center" value="13"></td>
                                            <td><input type="text" class="form-control" style="text-align: center" value="5"></td>
                                        </tr>
                                        <tr>
                                            <td style="text-align: center">T-Shirt Campaign</td>
                                            <td><input type="text" class="form-control" style="text-align: center" value="30"></td>
                                            <td><input type="text" class="form-control" style="text-align: center" value="4"></td>
                                        </tr>
                                    </table>
                                    
                                </div>

                                <h3 class="mbxl">Let's plan your media <a href="javascript:void(0);" class="small btn btn-default addmoremedia">Add More</a></h3>
                                <div class="row">
                                    <table width="100%" class="table" id="media_table">
                                        <tr>
                                            <td style="text-align: center;font-weight: bold;">Particular</td>
                                            <td style="text-align: center;font-weight: bold;">Kaajneeti Suggested</td>
                                            <td style="text-align: center;font-weight: bold;">Your Planned</td>
                                        </tr>
                                        <tr>
                                            <td style="text-align: center">Print Media</td>
                                            <td><input type="text" class="form-control" style="text-align: center" value="13"></td>
                                            <td><input type="text" class="form-control" style="text-align: center" value="22"></td>
                                        </tr>
                                        <tr>
                                            <td style="text-align: center">Articles</td>
                                            <td><input type="text" class="form-control" style="text-align: center" value="3"></td>
                                            <td><input type="text" class="form-control" style="text-align: center" value="35"></td>
                                        </tr>
                                        <tr>
                                            <td style="text-align: center">Posters</td>
                                            <td><input type="text" class="form-control" style="text-align: center" value="34"></td>
                                            <td><input type="text" class="form-control" style="text-align: center" value="54"></td>
                                        </tr>
                                    </table>
                                    
                                </div>


                                <h3 class="mbxl">Let's plan your campaigns</h3>
                                <div class="row">
                                    <table width="100%" class="table">
                                        <tr>
                                            <td style="text-align: center">Print Media</td>
                                            <td><input type="text" class="form-control" style="text-align: center" value="13"></td>
                                            <td><input type="text" class="form-control" style="text-align: center" value="22"></td>
                                        </tr>
                                        <tr>
                                            <td style="text-align: center">Articles</td>
                                            <td><input type="text" class="form-control" style="text-align: center" value="3"></td>
                                            <td><input type="text" class="form-control" style="text-align: center" value="35"></td>
                                        </tr>
                                        <tr>
                                            <td style="text-align: center">Posters</td>
                                            <td><input type="text" class="form-control" style="text-align: center" value="34"></td>
                                            <td><input type="text" class="form-control" style="text-align: center" value="54"></td>
                                        </tr>
                                    </table>
                                    
                                </div>

                                <h3 class="mbxl">Let's plan your fleet</h3>
                                <div class="row">
                                    <table width="100%" class="table">
                                        <tr>
                                            <td style="text-align: center;font-weight: bold;">&nbsp;</td>
                                            <td style="text-align: center;font-weight: bold;">Suggested</td>
                                            <td style="text-align: center;font-weight: bold;">Suggested Budget</td>
                                            <td style="text-align: center;font-weight: bold;">Plan</td>
                                            <td style="text-align: center;font-weight: bold;">Estimated</td>
                                        </tr>
                                        <tr>
                                            <td style="text-align: center">Cars</td>
                                            <td><input type="text" class="form-control" style="text-align: center" value="13"></td>
                                            <td><input type="text" class="form-control" style="text-align: center" value="50000"></td>
                                            <td><input type="text" class="form-control" style="text-align: center" value="22"></td>
                                            <td><input type="text" class="form-control" style="text-align: center" value="22"></td>
                                        </tr>
                                        <tr>
                                            <td style="text-align: center">Bikes</td>
                                            <td><input type="text" class="form-control" style="text-align: center" value="3"></td>
                                            <td><input type="text" class="form-control" style="text-align: center" value="70000"></td>
                                            <td><input type="text" class="form-control" style="text-align: center" value="35"></td>
                                            <td><input type="text" class="form-control" style="text-align: center" value="35"></td>
                                        </tr>
                                        <tr>
                                            <td style="text-align: center">Bus</td>
                                            <td><input type="text" class="form-control" style="text-align: center" value="34"></td>
                                            <td><input type="text" class="form-control" style="text-align: center" value="20000"></td>
                                            <td><input type="text" class="form-control" style="text-align: center" value="54"></td>
                                            <td><input type="text" class="form-control" style="text-align: center" value="54"></td>
                                        </tr>
                                    </table>
                                    
                                </div>


                                <h3 class="mbxl">Funds Required</h3>
                                <div class="row">
                                    <table width="100%" class="table">
                                        <tr>
                                            <?php foreach($Fund AS $fund) { ?>
                                            <td style="text-align: center;font-weight: bold;"><?php echo $fund->FundName; ?></td>
                                            <?php } ?>
                                        </tr>
                                        <tr>
                                            <?php foreach($Fund AS $fund) { ?>
                                            <td><input type="text" class="form-control" style="text-align: center" value="1110"></td>
                                            <?php } ?>
                                        </tr>
                                    </table>
                                    
                                </div>

                                

                                
                            </div>
                            <!-- <div class="form-group"><button type="submit" class="btn btn-success plan_button">Submit&nbsp;<i class="fa fa-chevron-circle-right"></i></button></div> -->
                        </div>
                    </div>
                </div>
                
            </div>
            <!--END CONTENT--></div>
        <!--BEGIN FOOTER-->
        
        <?php  require_once './include/footer.php';?>

        <!--END FOOTER--><!--END PAGE WRAPPER--></div>
</div>
<script src="<?php echo base_url(); ?>assets/js/sweetalert-dev.js"></script> 
<script src="<?php echo base_url(); ?>assets/js/sweetalert.min.js"></script> 

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
<script src="<?=base_url();?>assets/vendors/bootstrap-daterangepicker/daterangepicker.js"></script>
<script src="<?=base_url();?>assets/vendors/moment/moment.js"></script>
<script src="<?=base_url();?>assets/vendors/bootstrap-datetimepicker/build/js/bootstrap-datetimepicker.min.js"></script>
<script src="<?=base_url();?>assets/vendors/bootstrap-timepicker/js/bootstrap-timepicker.js"></script>
<script src="<?=base_url();?>assets/vendors/bootstrap-clockface/js/clockface.js"></script>
<script src="<?=base_url();?>assets/vendors/bootstrap-colorpicker/js/bootstrap-colorpicker.js"></script>
<script src="<?=base_url();?>assets/vendors/bootstrap-switch/js/bootstrap-switch.min.js"></script>
<script src="<?=base_url();?>assets/vendors/jquery-maskedinput/jquery-maskedinput.js"></script>
<script src="<?=base_url();?>assets/vendors/charCount.js"></script>
<script src="<?=base_url();?>assets/js/form-components.js"></script>



<script src="<?=base_url();?>assets/vendors/jquery-validate/jquery.validate.min.js"></script>
<script src="<?=base_url();?>assets/js/extra-profile.js"></script>

<script>
    function getCityDetailByStateIdCityId(state_id_city_id) {

        $.post("<?php echo base_url(); ?>plan/searchCityByCityId", {state_id_city_id: state_id_city_id},
            function (data, status) {
                var json_data = $.parseJSON(data);

                $('#total_population').val(json_data.TotalPopulation);
                $('#male_population').val(json_data.MalePopulation);
                $('#female_population').val(json_data.FemalePopulation);
                $('#above_18_30_population').val(json_data.Above18_30Population);
                $('#above_31_50_population').val(json_data.Above31_50Population);
                $('#above_51_60_population').val(json_data.Above51_60Population);
                $('#above_60_population').val(json_data.Above60Population);
                $('#total_area').val(json_data.TotalArea);


                $('#target_total_population').val(json_data.TotalPopulation);
                $('#target_male_population').val(json_data.MalePopulation);
                $('#target_female_population').val(json_data.FemalePopulation);
                $('#target_above_18_30_population').val(json_data.Above18_30Population);
                $('#target_above_31_50_population').val(json_data.Above31_50Population);
                $('#target_above_51_60_population').val(json_data.Above51_60Population);
                $('#target_above_60_population').val(json_data.Above60Population);
                $('#target_total_area').val(json_data.TotalArea);
            }
        );
    }


    document.querySelector('.addmorestrategy').onclick = function () {
        
        var html_add = '<tr>';
        html_add += '<td style="text-align: center"><input type="text" name=""></td>';
        html_add += '<td><input type="text" class="form-control" style="text-align: center" value="0"></td>';
        html_add += '<td><input type="text" class="form-control" style="text-align: center" value="0"></td>';
        html_add += '</tr>';
        $('#stategy_table').append(html_add);
    };


    document.querySelector('.addmoremedia').onclick = function () {
        var html_add = '<tr>';
        html_add += '<td style="text-align: center"><input type="text" name=""></td>';
        html_add += '<td><input type="text" class="form-control" style="text-align: center" value="0"></td>';
        html_add += '<td><input type="text" class="form-control" style="text-align: center" value="0"></td>';
        html_add += '</tr>';
        $('#media_table').append(html_add);
    };

    document.querySelector('.plan_button').onclick = function () {
        var $this = $(this);
        var user_type                       = $("#user_type").val();
        var state_id_city_id                = $("#state_id_city_id").val();


        var target_total_population         = $("#target_total_population").val();
        var target_male_population          = $("#target_male_population").val();
        var target_female_population        = $("#target_female_population").val();
        var target_above_18_30_population   = $("#target_above_18_30_population").val();
        var target_above_31_50_population   = $("#target_above_31_50_population").val();
        var target_above_51_60_population   = $("#target_above_51_60_population").val();
        var target_above_60_population      = $("#target_above_60_population").val();
        var target_total_area               = $("#target_total_area").val();


        var male_team_size                  = $("#male_team_size").val();
        var female_team_size                = $("#female_team_size").val();
        var total_event                     = $("#total_event").val();
        var total_vehicle                   = $("#total_vehicle").val();
        var total_budget                    = $("#total_budget").val();


        if (user_type > 0) {
            $this.button('Uploading...');

            var funds = '';
            $('input[name="funds"]:checked').each(function() {
                funds += this.value+',';
            });

            $.post("<?php echo base_url(); ?>plan/createplan", {
                                                            user_type: user_type, 
                                                            state_id_city_id: state_id_city_id,
                                                            target_total_population: target_total_population,
                                                            target_male_population: target_male_population,
                                                            target_female_population: target_female_population,
                                                            target_above_18_30_population: target_above_18_30_population,
                                                            target_above_31_50_population: target_above_31_50_population,
                                                            target_above_51_60_population: target_above_51_60_population,
                                                            target_above_60_population: target_above_60_population,
                                                            target_total_area: target_total_area,
                                                            male_team_size: male_team_size,
                                                            female_team_size: female_team_size,
                                                            total_event: total_event,
                                                            total_vehicle: total_vehicle,
                                                            total_budget: total_budget,
                                                            funds: funds,
                                                            },
                function (data, status) {
                   
                    if (data.status === "failed") {
                        sweetAlert("Oops...", data.message, "error");
                        return false;
                    } else { 
                        $this.button('Submit');
                        if (data.status === "success") {
                            window.location.href="plan";
                        }
                    }
                });

        } else {
            sweetAlert("Oops...", "Please enter event name", "error");
            return false;
        }
    };
</script> 

</body>
</html>
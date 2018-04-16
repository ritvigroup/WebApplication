<!DOCTYPE html>
<html lang="en">
<head><title>Listen</title>
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
                    <div class="page-title">Listen</div>
                </div>
                <ol class="breadcrumb page-breadcrumb">
                    <li><i class="fa fa-home"></i>&nbsp;<a href="<?=base_url();?>leader/home">Home</a>&nbsp;&nbsp;<i
                            class="fa fa-angle-right"></i>&nbsp;&nbsp;</li>
                    <li><a href="<?=base_url();?>event/event">Listen</a>&nbsp;&nbsp;<i class="fa fa-angle-right"></i>&nbsp;&nbsp;</li>
                    <li class="active">Listen</li>
                </ol>

                <div class="clearfix"></div>
            </div>
            <!--END TITLE & BREADCRUMB PAGE--><!--BEGIN CONTENT-->

            <?php

            // echo '<pre>';
            // print_r($result);
            // echo '</pre>';
            ?>
            <div class="page-content">
                <div id="tab-general">
                    <div id="sum_box" class="row mbl">
                        <div class="col-sm-6 col-md-3">
                            <div class="panel profit db mbm">
                                <div class="panel-body"><p class="icon"><i class="icon fa fa-paper-plane"></i></p><h4
                                        class="value"><span data-counter="" data-start="10" data-end="<?php echo $result->TotalComplaintReceived; ?>" data-step="1"
                                                            data-duration="0"></span><span><?php echo $result->TotalComplaintReceived; ?></span></h4> 

                                    <p class="description"><a href="<?=base_url();?>complaint/complaintReceived">Complaint Received</a></p>

                                    
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-6 col-md-3">
                            <div class="panel profit db mbm">
                                <div class="panel-body"><p class="icon"><i class="icon fa fa-comment"></i></p><h4
                                        class="value"><span data-counter="" data-start="10" data-end="<?php echo $result->TotalComplaint; ?>" data-step="1"
                                                            data-duration="0"></span><span><?php echo $result->TotalComplaint; ?></span></h4> 

                                    <p class="description"><a href="<?=base_url();?>complaint/mycomplaint">My Complaint</a></p>

                                    
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-6 col-md-3">
                            <div class="panel income db mbm">
                                <div class="panel-body"><p class="icon"><i class="icon fa fa-calendar"></i></p><h4
                                        class="value"><span><?php echo $result->TotalEvent; ?></span></h4>

                                    <p class="description"><a href="<?=base_url();?>event/event">Events</a></p>

                                    
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-6 col-md-3">
                            <div class="panel task db mbm">
                                <div class="panel-body"><p class="icon"><i class="icon fa fa-lightbulb-o"></i></p><h4
                                        class="value"><span><?php echo $result->TotalSuggestionReceived; ?></span></h4>

                                    <p class="description"><a href="<?=base_url();?>suggestion/suggestionReceived">Suggestion Received</a></p>

                                    
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-6 col-md-3">
                            <div class="panel task db mbm">
                                <div class="panel-body"><p class="icon"><i class="icon fa fa-lightbulb-o"></i></p><h4
                                        class="value"><span><?php echo $result->TotalSuggestion; ?></span></h4>

                                    <p class="description"><a href="<?=base_url();?>suggestion/suggestion">My Suggestion</a></p>

                                    
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-6 col-md-3">
                            <div class="panel visit db mbm">
                                <div class="panel-body"><p class="icon"><i class="icon fa fa-list-ul"></i></p><h4
                                        class="value"><span><?php echo $result->TotalPoll; ?></span></h4>

                                    <p class="description"><a href="<?=base_url();?>poll/poll">Poll</a></p>

                                    
                                </div>
                            </div>
                        </div>

                        <div class="col-sm-6 col-md-3">
                            <div class="panel visit db mbm">
                                <div class="panel-body"><p class="icon"><i class="icon fa fa-envelope"></i></p><h4
                                        class="value"><span><?php echo $result->TotalPost; ?></span></h4>

                                    <p class="description"><a href="<?=base_url();?>post/post">Post</a></p>

                                    
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-6 col-md-3">
                            <div class="panel visit db mbm">
                                <div class="panel-body"><p class="icon"><i class="icon fa fa-info-circle"></i></p><h4
                                        class="value"><span><?php echo $result->TotalInformation; ?></span></h4>

                                    <p class="description"><a href="<?=base_url();?>information/information">Information</a></p>

                                    
                                </div>
                            </div>
                        </div>
                    </div>

                    <?php
                    $overall_report = array(
                                            'Complaint Received' => $result->TotalComplaintReceived,
                                            'My Complaint' => $result->TotalComplaint,
                                            'Events' => $result->TotalEvent,
                                            'Suggestion Received' => $result->TotalSuggestionReceived,
                                            'Suggestion' => $result->TotalSuggestion,
                                            'Information' => $result->TotalInformation,
                                            'Posts' => $result->TotalPost,
                                            'Poll' => $result->TotalPoll,
                                            );
                    ?>

                    <div class="portlet box">
                        <div class="portlet-header">
                            <div class="caption">Overall listen report</div>
                            <!-- <div class="tools">
                                <i class="fa fa-chevron-up"></i>
                                <i data-toggle="modal" data-target="#modal-config" class="fa fa-cog"></i>
                                <i class="fa fa-refresh"></i>
                                <i class="fa fa-times"></i>
                            </div> -->
                        </div>
                        <div class="portlet-body">
                            <div id="pie-with-legend"></div>
                        </div>
                    </div>                    
                </div>
            </div>
            <!--END CONTENT--></div>
        <!--BEGIN FOOTER-->
        
        <?php  require_once './include/footer.php';?>

        <!--END FOOTER--><!--END PAGE WRAPPER--></div>
</div>

<div id="modal-stackable" tabindex="-1" role="dialog" aria-labelledby="modal-stackable-label" aria-hidden="true" class="modal fade" style="display: none;">
    <div class="modal-dialog">
        <div class="modal-content">
            
        </div>
    </div>
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
<script src="<?=base_url();?>assets/vendors/bootstrap-datetimepicker/build/js/bootstrap-datetimepicker.min.js"></script>
<script src="<?=base_url();?>assets/vendors/bootstrap-timepicker/js/bootstrap-timepicker.js"></script>
<script src="<?=base_url();?>assets/vendors/bootstrap-clockface/js/clockface.js"></script>
<script src="<?=base_url();?>assets/vendors/bootstrap-colorpicker/js/bootstrap-colorpicker.js"></script>
<script src="<?=base_url();?>assets/vendors/bootstrap-switch/js/bootstrap-switch.min.js"></script>
<script src="<?=base_url();?>assets/vendors/jquery-maskedinput/jquery-maskedinput.js"></script>
<script src="<?=base_url();?>assets/vendors/charCount.js"></script>
<script src="<?=base_url();?>assets/js/form-components.js"></script>



<script src="<?=base_url();?>assets/vendors/jquery-highcharts/highcharts.js"></script>
<script src="<?=base_url();?>assets/vendors/jquery-highcharts/data.js"></script>
<script src="<?=base_url();?>assets/vendors/jquery-highcharts/drilldown.js"></script>
<script src="<?=base_url();?>assets/vendors/jquery-highcharts/exporting.js"></script>
<!-- <script src="<?=base_url();?>assets/js/charts-highchart-pie.js"></script> -->

<script>
$('#pie-with-legend').highcharts({
        chart: {
            plotBackgroundColor: null,
            plotBorderWidth: null,
            plotShadow: false
        },
        title: {
            text: 'Overall report'
        },
        tooltip: {
            pointFormat: '{series.name}: <b>{point.percentage:.1f}</b>'
        },
        plotOptions: {
            pie: {
                allowPointSelect: true,
                cursor: 'pointer',
                dataLabels: {
                    enabled: false
                },
                showInLegend: true
            }
        },
        series: [{
            type: 'pie',
            name: 'Percentage',
            data: [
                <?php foreach($overall_report AS $total_summary_key => $total_summary_val) { ?>
                    ['<?php echo $total_summary_key; ?>',   <?php echo $total_summary_val; ?>],
                <?php } ?>
                // ['Firefox',   45.0],
                // ['IE',       26.8],
                // {
                //     name: 'Chrome',
                //     y: 12.8,
                //     sliced: true,
                //     selected: true
                // },
                // ['Safari',    8.5],
                // ['Opera',     6.2],
                // ['Others',   0.7]
            ]
        }]
    });
</script>

<script>
function openListenDetail(event_id) {

    if (event_id > 0) {
        $.post("<?php echo base_url(); ?>event/eventdetail", {event_id: event_id},
            function (data, status) {
                if(data != '') {
                    $('.modal-content').html(data);
                } else {
                    $('.modal-content').html(data);
                }
            });
    } else {
        sweetAlert("Oops...", "Please enter something to search leaders", "error");
        return false;
    }
}
</script>
</body>
</html>
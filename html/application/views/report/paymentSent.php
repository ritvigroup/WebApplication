<!DOCTYPE html>
<html lang="en">
<head><title>Payment Sent</title>
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
                    <div class="page-title">Payment Sent</div>
                </div>
                <ol class="breadcrumb page-breadcrumb">
                    <li><i class="fa fa-home"></i>&nbsp;<a href="<?=base_url();?>leader/home">Home</a>&nbsp;&nbsp;<i
                            class="fa fa-angle-right"></i>&nbsp;&nbsp;</li>
                    <li><a href="<?=base_url();?>complaint/complaint">Payment Sent</a>&nbsp;&nbsp;<i class="fa fa-angle-right"></i>&nbsp;&nbsp;</li>
                    <li class="active">Payment Sent</li>
                </ol>

                <div class="clearfix"></div>
            </div>
            <!--END TITLE & BREADCRUMB PAGE--><!--BEGIN CONTENT-->
            <div class="page-content">
                <div class="row">
                    <div class="col-md-12">
                        <div class="portlet box">
                            <div class="portlet-header">
                                <div class="caption">Payment Sent</div>
                                <div class="actions">
                                    <?php echo $this->payment_links; ?>
                                </div>
                            </div>
                            <div class="portlet-body pan">
                                <div class="table-responsive">
                                    <table id="user-last-logged-table"
                                           class="table table-striped table-hover thumb-small">
                                        <thead>
                                        <tr class="condensed">
                                            <th scope="col"><span class="column-sorter"></span></th>
                                            <th scope="col">Transaction Id<span class="column-sorter"></span></th>
                                            <th scope="col">Payment Gateway<span class="column-sorter"></span></th>
                                            <th scope="col">Comment<span class="column-sorter"></span></th>
                                            <th scope="col">From<span class="column-sorter"></span></th>
                                            <th scope="col">To<span class="column-sorter"></span></th>
                                            <th scope="col">Debit/Credit<span class="column-sorter"></span></th>
                                            <th scope="col">Amount<span class="column-sorter"></span></th>
                                            <th scope="col">Status<span class="column-sorter"></span></th>
                                            <th scope="col">Transaction On<span class="column-sorter"></span></th>
                                        </tr>
                                        </thead>
                                        <?php 
                                        if(count($result) > 0) { ?>
                                            <tbody class="media-thumb">
                                            <?php foreach($result AS $payment) { ?>
                                                <?php
                                                $debit_or_credit = ($payment->DebitOrCredit == 1) ? 'Credit' : 'Debit';
                                                $status = ($payment->TransactionStatus == 1) ? 'Success' : 'Failed';

                                                $plus_minus = ($payment->DebitOrCredit == 1) ? '' : '-';
                                                ?>
                                                <tr>
                                                    <td></td>
                                                    <td><?php echo $payment->TransactionId; ?></td>
                                                    <td><?php echo $payment->PaymentGatewayName; ?></td>
                                                    <td><?php echo $payment->TransactionComment; ?></td>
                                                    <td><a href="<?=base_url();?>profile/profile/<?php echo $payment->PaymentBy->user_profile_detail->user_info->UserUniqueId; ?>" target="_blank"><?php echo $payment->PaymentBy->user_profile_detail->profile->FirstName.' '.$payment->PaymentBy->user_profile_detail->profile->LastName; ?></a></td>
                                                    <td><a href="<?=base_url();?>profile/profile/<?php echo $payment->PaymentTo->user_profile_detail->user_info->UserUniqueId; ?>" target="_blank"><?php echo $payment->PaymentTo->user_profile_detail->profile->FirstName.' '.$payment->PaymentTo->user_profile_detail->profile->LastName; ?></a></td>
                                                    <td><?php echo $debit_or_credit; ?></td>
                                                    <td><?php echo $plus_minus; ?> &#8377; <?php echo $payment->TransactionAmount; ?></td>
                                                    <td><?php echo $status; ?></td>
                                                    <td><?php echo $payment->AddedOn; ?></td>
                                                </tr>
                                            <?php } ?>
                                            </tbody>
                                        <?php } else { ?>
                                        <tr>
                                            <td colspan="100%" align="center">No Payment Record found</td>
                                        </tr>
                                        <?php } ?>                                        
                                    </table>
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
<script src="<?=base_url();?>assets/vendors/jquery-steps/js/jquery.steps.min.js"></script>
<script src="<?=base_url();?>assets/vendors/jquery-bootstrap-wizard/jquery.bootstrap.wizard.min.js"></script>
<script src="<?=base_url();?>assets/js/form-wizard.js"></script>



<script src="<?=base_url();?>assets/vendors/mixitup/src/jquery.mixitup.js"></script>
<script src="<?=base_url();?>assets/vendors/lightbox/js/lightbox.min.js"></script>
<script src="<?=base_url();?>assets/js/page-gallery.js"></script>


</body>
</html>
<!DOCTYPE html>
<html lang="en">
<head><title>My Influence</title>
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
                    <div class="page-title">Influence</div>
                </div>
                <ol class="breadcrumb page-breadcrumb">
                    <li><i class="fa fa-home"></i>&nbsp;<a href="<?=base_url();?>leader/home">Home</a>&nbsp;&nbsp;<i
                            class="fa fa-angle-right"></i>&nbsp;&nbsp;</li>
                    <li><a href="<?=base_url();?>leader/team">Organise</a>&nbsp;&nbsp;<i class="fa fa-angle-right"></i>&nbsp;&nbsp;</li>
                    <li class="active">Influence</li>
                </ol>

                <div class="clearfix"></div>
            </div>
            <!--END TITLE & BREADCRUMB PAGE--><!--BEGIN CONTENT-->

            <div class="page-content">
                <div class="page-content">
                <div id="table-advanced" class="row">
                    <div class="col-lg-12">
                        <ul id="tableadvancedTab" class="nav nav-tabs">
                            <li class="active"><a href="#table-Email-tab" data-toggle="tab">Email</a></li>
                            <li><a href="#table-color-tab" data-toggle="tab">SMS</a></li>
                            <li><a href="#table-size-tab" data-toggle="tab">Social Media</a></li>
                        </ul>
                        <?php
                        // echo '<pre>';
                        // print_r($EmailSent);
                        // print_r($SmsSent);
                        // print_r($SocialSent);
                        // echo '</pre>';
                        ?>
                        <div id="tableadvancedTabContent" class="tab-content">
                            <div id="table-Email-tab" class="tab-pane fade in active">
                                <a data-target="#modal-stackable" data-toggle="modal" href="javascript:void(0);" class="btn btn-success" style="float: right" onClick="return emailCompose();">Compose</a>
                                <div class="row">
                                    <br>
                                    <table class="table table-hover table-striped table-bordered table-advanced tableEmail">
                                        <thead>
                                            <tr>
                                                <th width="1%"><input type="checkbox"></th>
                                                <th width="1%" class="header"><i class="fa fa-paperclip" style="float: right;"></i></th>
                                                <th width="10%" class="header">To</th>
                                                <th width="20%" class="header">Subject</th>
                                                <th width="50%" class="header">Message</th>
                                                <th width="15%" class="header">On</th>
                                                <!-- <th width="9%" class="header">Action</th> -->
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php if(count($EmailSent) > 0) { ?>
                                                <?php foreach($EmailSent AS $email_sent) { ?>
                                                    <tr>
                                                        <td><input type="checkbox"></td>
                                                        <td><?php if(count($email_sent->EmailAttachment) > 0) { ?><i class="fa fa-paperclip" style="float: right;"></i> <?php }?></td>
                                                        <td><?php echo $email_sent->EmailType; ?></td>
                                                        <td><a data-target="#modal-stackable" data-toggle="modal" href="javascript:void(0);" onClick="return viewEmail('<?php echo $email_sent->EmailSentUniqueId; ?>');"><?php echo $email_sent->EmailSubject; ?></a></td>
                                                        <td><?php echo substr(strip_tags($email_sent->EmailMessage), 0, 100); ?></td>
                                                        <td><?php echo $email_sent->SentOn; ?></td>
                                                        <!-- <td><button type="button" class="btn btn-red btn-xs"><i class="fa fa-trash"></i>&nbsp;Delete</button></td> -->
                                                    </tr>
                                                <?php } ?>
                                            <?php } ?>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                            
                            <div id="table-color-tab" class="tab-pane fade">
                                <a data-target="#modal-stackable" data-toggle="modal" href="javascript:void(0);" class="btn btn-success" style="float: right" onClick="return smsCompose();">Compose</a>
                                <div class="row">
                                    <table class="table table-hover table-striped table-bordered table-advanced tableEmail">
                                        <thead>
                                            <tr>
                                                <th width="1%"><input type="checkbox"></th>
                                                <th width="20%" class="header">To</th>
                                                <th width="60%" class="header">Message</th>
                                                <th width="15%" class="header">On</th>
                                                <!-- <th width="9%" class="header">Action</th> -->
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php if(count($SmsSent) > 0) { ?>
                                                <?php foreach($SmsSent AS $sms_sent) { ?>
                                                    <tr>
                                                        <td><input type="checkbox"></td>
                                                        <td><a data-target="#modal-stackable" data-toggle="modal" href="javascript:void(0);" onClick="return viewSms('<?php echo $sms_sent->SmsSentUniqueId; ?>');"><?php echo $sms_sent->SmsTo; ?></a></td>
                                                        <td><?php echo substr(strip_tags($sms_sent->SmsMessage), 0, 100); ?></td>
                                                        <td><?php echo $sms_sent->SentOn; ?></td>
                                                        <!-- <td><button type="button" class="btn btn-red btn-xs"><i class="fa fa-trash"></i>&nbsp;Delete</button></td> -->
                                                    </tr>
                                                <?php } ?>
                                            <?php } ?>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                                 
                            <div id="table-size-tab" class="tab-pane fade">
                                <a data-target="#modal-stackable" data-toggle="modal" href="javascript:void(0);" class="btn btn-success" style="float: right" onClick="return socialCompose();">Post</a>
                                <div class="row">
                                    <table class="table table-hover table-striped table-bordered table-advanced tableEmail">
                                        <thead>
                                            <tr>
                                                <th width="1%"><input type="checkbox"></th>
                                                <th width="1%" class="header"><i class="fa fa-paperclip" style="float: right;"></i></th>
                                                <th width="20%" class="header">Type</th>
                                                <th width="20%" class="header">Subject</th>
                                                <th width="50%" class="header">Message</th>
                                                <th width="15%" class="header">On</th>
                                                <!-- <th width="9%" class="header">Action</th> -->
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php if(count($SocialSent) > 0) { ?>
                                                <?php foreach($SocialSent AS $social_sent) { ?>
                                                    <tr>
                                                        <td><input type="checkbox"></td>
                                                        <td><?php if(count($social_sent->SocialAttachment) > 0) { ?><i class="fa fa-paperclip" style="float: right;"></i> <?php }?></td>
                                                        <td><?php echo $social_sent->SocialType; ?></td>
                                                        <td><a data-target="#modal-stackable" data-toggle="modal" href="javascript:void(0);" onClick="return viewSocial('<?php echo $social_sent->SocialSentUniqueId; ?>');"><?php echo $social_sent->SocialSubject; ?></a></td>
                                                        <td><?php echo substr(strip_tags($social_sent->SocialMessage), 0, 100); ?></td>
                                                        <td><?php echo $social_sent->SentOn; ?></td>
                                                        <!-- <td><button type="button" class="btn btn-red btn-xs"><i class="fa fa-trash"></i>&nbsp;Delete</button></td> -->
                                                    </tr>
                                                <?php } ?>
                                            <?php } ?>
                                            
                                        </tbody>
                                    </table>
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

<script>
    function emailCompose() {

        $.post("<?php echo base_url(); ?>influence/emailCompose", {'display': 'Y'},
            function (data, status) {
                if(data != '') {
                    $('.modal-content').html(data);
                } else {
                    $('.modal-content').html(data);
                }
            });
    }


    function smsCompose() {

        $.post("<?php echo base_url(); ?>influence/smsCompose", {'display': 'Y'},
            function (data, status) {
                if(data != '') {
                    $('.modal-content').html(data);
                } else {
                    $('.modal-content').html(data);
                }
            });
    }


    function socialCompose() {
        $.post("<?php echo base_url(); ?>influence/socialCompose", {'display': 'Y'},
            function (data, status) {
                if(data != '') {
                    $('.modal-content').html(data);
                } else {
                    $('.modal-content').html(data);
                }
            });
    }


    function viewEmail(email_unique_id) {

        $.post("<?php echo base_url(); ?>influence/viewEmail", {'email_unique_id': email_unique_id},
            function (data, status) {
                if(data != '') {
                    $('.modal-content').html(data);
                } else {
                    $('.modal-content').html(data);
                }
            });
    }

    function viewSms(sms_unique_id) {

        $.post("<?php echo base_url(); ?>influence/viewSms", {'sms_unique_id': sms_unique_id},
            function (data, status) {
                if(data != '') {
                    $('.modal-content').html(data);
                } else {
                    $('.modal-content').html(data);
                }
            });
    }


    function viewSocial(social_unique_id) {

        $.post("<?php echo base_url(); ?>influence/viewSocial", {'social_unique_id': social_unique_id},
            function (data, status) {
                if(data != '') {
                    $('.modal-content').html(data);
                } else {
                    $('.modal-content').html(data);
                }
            });
    }
</script>

</body>
</html>
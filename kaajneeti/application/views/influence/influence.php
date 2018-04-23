<!DOCTYPE html>
<html lang="en">
<head><title>My Influence</title>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="cache-control" content="no-cache">
    <meta http-equiv="expires" content="Thu, 19 Nov 1900 08:52:00 GMT">
    <?php  require_once './include/css.php';?>
</head>
<body class="page-header-fixed ">
    
    <?php  require_once './include/top.php';?>

    <div class="clearfix"> </div>
    <div class="page-container">
        
        <?php  require_once './include/left.php';?>

        <!-- Start page content wrapper -->
        <div class="page-content-wrapper animated fadeInRight">
            <div class="page-content">
                <div id="table-advanced" class="row  border-bottom white-bg dashboard-header">
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
                                    <div class="table-responsive">
                                        <table id="table_id" class="table table-hover table-striped table-bordered table-advanced tablesorter display">
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
                                            </thead>
                                        </table>
                                    </div>
                                </div>
                            </div>
                            
                            <div id="table-color-tab" class="tab-pane fade">
                                <a data-target="#modal-stackable" data-toggle="modal" href="javascript:void(0);" class="btn btn-success" style="float: right" onClick="return smsCompose();">Compose</a>
                                <div class="row">
                                    <div class="table-responsive">
                                        <table id="table_id" class="table table-hover table-striped table-bordered table-advanced tablesorter display">
                                            <thead>
                                            <tr>
                                                <th width="1%"><input type="checkbox"></th>
                                                <th width="20%" class="header">To</th>
                                                <th width="60%" class="header">Message</th>
                                                <th width="15%" class="header">On</th>
                                                <!-- <th width="9%" class="header">Action</th> -->
                                            </tr>
                                            
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
                                            </thead>
                                        </table>
                                    </div>
                                </div>
                            </div>
                                 
                            <div id="table-size-tab" class="tab-pane fade">
                                <a data-target="#modal-stackable" data-toggle="modal" href="javascript:void(0);" class="btn btn-success" style="float: right" onClick="return socialCompose();">Post</a>
                                <div class="row">
                                    <div class="table-responsive">
                                        <table id="table_id"
                                               class="table table-hover table-striped table-bordered table-advanced tablesorter display">
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
                                            <tbody>
                                            </tbody>
                                            </thead>
                                        </table>
                                    </div>
                                </div>
                            </div>
                                

                        </div>
                    </div>
                </div>
            </div>


            <!-- stat timeline and feed  -->
                <div class="top20">
                    
                    <div class="clearfix"> </div>
                    <!-- End projects list -->
                    
                    <?php  require_once './include/footer.php';?>

                </div>
            </div>
        </div>
    </div>
    
    <?php  require_once './include/scroll_top.php';?>

</body>

<?php  require_once './include/js.php';?>


<div id="modal-stackable" tabindex="-1" role="dialog" aria-labelledby="modal-stackable-label" aria-hidden="true" class="modal fade" style="display: none;">
    <div class="modal-dialog">
        <div class="modal-content">
        
        </div>
    </div>
</div>



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
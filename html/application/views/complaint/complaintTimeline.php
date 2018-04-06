<!DOCTYPE html>
<html lang="en">
<head><title>Complaint History</title>
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
                    <div class="page-title">Complaint History</div>
                </div>
                <ol class="breadcrumb page-breadcrumb">
                    <li><i class="fa fa-home"></i>&nbsp;<a href="<?=base_url();?>leader/home">Home</a>&nbsp;&nbsp;<i
                            class="fa fa-angle-right"></i>&nbsp;&nbsp;</li>
                    <li><a href="<?=base_url();?>complaint/complaint">Complaint History</a>&nbsp;&nbsp;<i class="fa fa-angle-right"></i>&nbsp;&nbsp;</li>
                    <li class="active">Complaint History</li>
                </ol>

                <div class="clearfix"></div>
            </div>
            <!--END TITLE & BREADCRUMB PAGE--><!--BEGIN CONTENT-->

            <div class="page-content">
                <div class="row">
                    <div class="col-md-12">
                        <div class="portlet box">
                            <div class="portlet-header">
                                <div class="caption">Complaint History</div>
                                <div class="actions">
                                    <a href="<?=base_url();?>complaint/complaintReceived" class="btn btn-info btn-xs"><i class="fa fa-plus"></i>&nbsp;Complaint Received</a>&nbsp;
                                    <a href="<?=base_url();?>complaint/newcomplaint" class="btn btn-info btn-xs"><i class="fa fa-plus"></i>&nbsp;New Complaint</a>&nbsp;
                                    <a href="<?=base_url();?>complaint/mycomplaint" class="btn btn-info btn-xs"><i class="fa fa-plus"></i>&nbsp;My Complaint</a>&nbsp;
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <?php
                // echo '<pre>';
                // print_r($ComplaintDetail);
                // print_r($ComplaintHistory);
                // echo '</pre>';
                ?>
                <div class="row">
                    <div class="col-md-12">
                        
                        <div class="tab-content tab-edit">
                            <div id="non-responsive" class="tab-pane fade in active">
                                <div class="row">
                                    <div class="col-lg-12">
                                        <div class="timeline-centered">
                                            <?php
                                            $count = 0;

                                            $color_array = array('violet', 'green', 'orange', 'pink', 'yellow');
                                            foreach($ComplaintHistory->result AS $complaint_history) {
                                                $left_aligned = ($count % 2) ? '' : ' left-aligned';
                                                ?>
                                                <?php
                                                $datetime = date('d M,Y h:i', strtotime($complaint_history->AddedOnTime));
                                                $datetime_ago = $complaint_history->AddedOn;

                                                $UserProfileHrefLink = base_url().'profile/profile/'.$complaint_history->ComplaintHistoryProfile->user_profile_detail->user_info->UserUniqueId;

                                                $By = $complaint_history->ComplaintHistoryProfile->user_profile_detail->profile->FirstName. ' '.$complaint_history->ComplaintHistoryProfile->user_profile_detail->profile->LastName;
                                                ?>
                                                <article class="timeline-entry <?php echo $left_aligned; ?>">
                                                    <div class="timeline-entry-inner">
                                                        <time datetime="<?php echo $datetime; ?>" class="timeline-time"><span><?php echo $datetime_ago; ?></span><span><?php echo $datetime; ?></span>
                                                        </time>
                                                        <div class="timeline-icon bg-<?php echo $color_array[rand(0,4)]; ?>"><i class="fa fa-exclamation"></i></div>
                                                        <div class="timeline-label">
                                                            <h2 class="timeline-title"><?php echo $complaint_history->HistoryTitle; ?></h2>
                                                            <p><?php echo $complaint_history->HistoryDescription; ?></p>
                                                            <p style="text-align: right;">By - 
                                                                <a href="<?php echo $UserProfileHrefLink; ?>" target="_blank"><?php echo $By; ?></a>
                                                            </p>
                                                            <?php
                                                            $ComplaintHistoryAttachment = $complaint_history->ComplaintHistoryAttachment;
                                                            if(count($ComplaintHistoryAttachment) > 0) {
                                                                echo '<p>';
                                                                $i = 0;
                                                                foreach($ComplaintHistoryAttachment AS $complaint_history_attachment) {
                                                                    echo '<a href="'.$complaint_history_attachment->AttachmentFile.'" target="_blank">File '.($i+1).'</a>';
                                                                    echo ',&nbsp;';
                                                                    $i++;
                                                                }
                                                                echo '</p>';
                                                            }
                                                            ?>
                                                        </div>
                                                    </div>
                                                </article>
                                                <?php
                                                $count++;
                                            }
                                            if($left_aligned == '') { $left_aligned = ' left-aligned'; } else { $left_aligned = ''; } 
                                            ?>
                                            <article class="timeline-entry <?php echo $left_aligned; ?>">
                                                <div class="timeline-entry-inner">
                                                    <?php
                                                    $datetime = date('d M,Y h:i', strtotime($ComplaintDetail->result->AddedOnTime));
                                                    $datetime_ago = $ComplaintDetail->result->AddedOn;
                                                    ?>
                                                    <time datetime="<?php echo $datetime; ?>" class="timeline-time"><span><?php echo $datetime_ago; ?></span><span><?php echo $datetime; ?></span>
                                                    </time>
                                                    <div class="timeline-icon bg-yellow"><i class="fa fa-camera"></i>
                                                    </div>
                                                    <div class="timeline-label">
                                                        <h2 class="timeline-title"><?php echo $ComplaintDetail->result->ComplaintSubject; ?></h2>
                                                        <p><?php echo $ComplaintDetail->result->ComplaintDescription; ?></p>
                                                        <p>Applicant Name: <?php echo $ComplaintDetail->result->ApplicantName; ?></p>
                                                        <p>Department: <?php echo $ComplaintDetail->result->ComplaintDepartment; ?></p>
                                                        <?php
                                                        $ComplaintMember = $ComplaintDetail->result->ComplaintMember;
                                                        if(count($ComplaintMember) > 0) {
                                                            echo '<p>';
                                                            foreach($ComplaintMember AS $complaint_member) {
                                                                if((int) $complaint_member->AcceptedYesNo == 1) {
                                                                    $UserProfileHrefLink = base_url().'profile/profile/'.$complaint_member->user_profile_detail->user_info->UserUniqueId;
                                                                    echo '<a href="'.$UserProfileHrefLink.'" target="_blank">';
                                                                    echo $complaint_member->user_profile_detail->profile->FirstName;
                                                                    echo ' ';
                                                                    echo $complaint_member->user_profile_detail->profile->LastName;
                                                                    echo '</a>';
                                                                    echo ',&nbsp;';
                                                                }
                                                            }
                                                            echo '</p>';
                                                        }
                                                        ?>
                                                        <?php
                                                        $ComplaintAttachment = $ComplaintDetail->result->ComplaintAttachment;
                                                        if(count($ComplaintAttachment) > 0) {
                                                            echo '<p>';
                                                            $i = 0;
                                                            foreach($ComplaintAttachment AS $complaint_attachment) {
                                                                echo '<a href="'.$complaint_attachment->AttachmentFile.'" target="_blank">File '.($i+1).'</a>';
                                                                echo ',&nbsp;';
                                                                $i++;
                                                            }
                                                            echo '</p>';
                                                        }

                                                        $UserProfileHrefLink = base_url().'profile/profile/'.$ComplaintDetail->result->ComplaintProfile->user_profile_detail->user_info->UserUniqueId;

                                                        $By = $ComplaintDetail->result->ComplaintProfile->user_profile_detail->profile->FirstName.' '.$ComplaintDetail->result->ComplaintProfile->user_profile_detail->profile->LastName;

                                                        ?>
                                                        <p style="text-align: right;">By- <a href="<?php echo $UserProfileHrefLink; ?>" target="_blank"><?php echo $By; ?></a></p>
                                                    </div>
                                                </div>
                                            </article>
                                            <article class="timeline-entry begin">
                                                <div class="timeline-entry-inner">
                                                    <?php if($ComplaintDetail->result->ComplaintStatus == 4) { ?>
                                                        <div style="-webkit-transform: rotate(-90deg); -moz-transform: rotate(-90deg);"
                                                         class="timeline-icon"><i class="fa fa-plus"></i>Closed</div>
                                                    <?php } else { ?>
                                                    <a data-target="#modal-stackable" data-toggle="modal" href="javascript:void(0);" onClick="return displayFormComplaintHistory();" title="Reply">
                                                        <div style="-webkit-transform: rotate(-90deg); -moz-transform: rotate(-90deg);"
                                                         class="timeline-icon"><i class="fa fa-plus"></i>Started</div>
                                                    </a>
                                                    <?php } ?>
                                                </div>
                                            </article>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        
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

<script>
    function displayFormComplaintHistory() {

        $.post("<?php echo base_url(); ?>complaint/complaintHistoryForm", {'display': 'Y'},
            function (data, status) {
                if(data != '') {
                    $('.modal-content').html(data);
                } else {
                    $('.modal-content').html(data);
                }
            });
    }

    function saveComplaintHistory() {
        var progress_title          = $("#progress_title").val();
        var progress_description    = $("#progress_description").val();
        var progess_status          = $("#progress_status").val();

        if (progress_title.length > 0) {            
            var form_data = new FormData($('input[name^="file"]'));

            jQuery.each($('input[name^="file[]"]')[0].files, function(i, file) {
                form_data.append('file[]', file);
            });

            form_data.append('title', progress_title);
            form_data.append('description', progress_description);
            form_data.append('current_status', progess_status);

            jQuery.ajax({
                type: 'POST',
                cache: false,
                processData: false,
                contentType: false,
                data: form_data,
                url: "<?php echo base_url(); ?>complaint/complaintTimeline/<?php echo $this->uri->segment(3); ?>",

                success: function(data) {
                    if (data.status === "failed") {
                        sweetAlert("Oops...", data.message, "error");
                        return false;
                    } else { 
                        if (data.status === "success") {
                            window.location.href="<?php echo $this->uri->segment(3); ?>";
                        }
                    }
                }
            });

        } else {
            sweetAlert("Oops...", "Please enter subject or title of history", "error");
            return false;
        }
    };
</script>
</body>
</html>
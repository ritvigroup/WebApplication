<!DOCTYPE html>
<html lang="en">
<head><title>My Complaint</title>
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
                <div class="row  border-bottom white-bg dashboard-header">
                    <div class="col-md-12">
                        <div class="portlet box">
                            <div class="portlet-header">
                                <ol class="breadcrumb page-breadcrumb">
                                    <?php echo $this->complaint_links; ?>
                                    <li class="active"><a href="javascript:void(0);">Timeline</a>&nbsp;&nbsp;</li>
                                </ol>
                            </div>
                            <div class="portlet-body">
                                <div class="row mbm">
                                    <div class="col-lg-12">
                                        <div class="timeline-centered">
                                            <?php
                                            $count = 0;

                                            $color_array = array('violet', 'green', 'orange', 'pink', 'yellow');
                                            foreach($ComplaintHistory->result AS $complaint_history) {
                                                $left_aligned = ($count % 2) ? '' : ' left-aligned';
                                                ?>
                                                <?php
                                                $datetime = date('d M, Y h:i', strtotime($complaint_history->AddedOnTime));
                                                $datetime_ago = $complaint_history->AddedOn;

                                                $UserProfileHrefLink = base_url().'profile/profile/'.$complaint_history->ComplaintHistoryProfile->UserUniqueId;

                                                $By = $complaint_history->ComplaintHistoryProfile->FirstName. ' '.$complaint_history->ComplaintHistoryProfile->LastName;
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
                                                    $datetime = date('d M, Y h:i', strtotime($ComplaintDetail->result->AddedOnTime));
                                                    $datetime_ago = $ComplaintDetail->result->AddedOn;
                                                    ?>
                                                    <time datetime="<?php echo $datetime; ?>" class="timeline-time"><span><?php echo $datetime_ago; ?></span><span><?php echo $datetime; ?></span>
                                                    </time>
                                                    <div class="timeline-icon bg-yellow"><i class="fa fa-exclamation"></i>
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
                                                                    $UserProfileHrefLink = base_url().'profile/profile/'.$complaint_member->UserUniqueId;
                                                                    echo '<a href="'.$UserProfileHrefLink.'" target="_blank">';
                                                                    echo $complaint_member->FirstName;
                                                                    echo ' ';
                                                                    echo $complaint_member->LastName;
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

                                                        $UserProfileHrefLink = base_url().'profile/profile/'.$ComplaintDetail->result->ComplaintProfile->UserUniqueId;

                                                        $By = $ComplaintDetail->result->ComplaintProfile->FirstName.' '.$ComplaintDetail->result->ComplaintProfile->LastName;

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
                <div class="top20">

                    <div class="clearfix"> </div>

                    

                </div>
            </div>
        </div>
    </div>

    <?php  require_once './include/scroll_top.php';?>
<?php  require_once './include/footer.php';?>
</body>

<?php  require_once './include/js.php';?>


<div id="modal-stackable" tabindex="-1" role="dialog" aria-labelledby="modal-stackable-label" aria-hidden="true" class="modal fade" style="display: none;">
    <div class="modal-dialog">
        <div class="modal-content">

        </div>
    </div>
</div>



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
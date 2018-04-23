<!DOCTYPE html>
<html lang="en">
<head><title>Suggestion History</title>
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
                    
                    <?php
                    // echo '<pre>';
                    // print_r($SuggestionDetail);
                    // print_r($SuggestionHistory);
                    // echo '</pre>';
                    ?>

                    <div class="col-md-12">
                        
                        <div class="tab-content tab-edit">
                            <div id="non-responsive" class="tab-pane fade in active">
                                <div class="row">
                                    <div class="col-lg-12">
                                        <div class="timeline-centered">
                                            <?php
                                            $count = 0;

                                            $color_array = array('violet', 'green', 'orange', 'pink', 'yellow');
                                            foreach($SuggestionHistory->result AS $suggestion_history) {
                                                $left_aligned = ($count % 2) ? '' : ' left-aligned';
                                                ?>
                                                <?php
                                                $datetime = date('d M,Y h:i', strtotime($suggestion_history->AddedOnTime));
                                                $datetime_ago = $suggestion_history->AddedOn;

                                                $UserProfileHrefLink = base_url().'profile/profile/'.$suggestion_history->SuggestionHistoryProfile->user_profile_detail->user_info->UserUniqueId;

                                                $By = $suggestion_history->SuggestionHistoryProfile->user_profile_detail->profile->FirstName. ' '.$suggestion_history->SuggestionHistoryProfile->user_profile_detail->profile->LastName;
                                                ?>
                                                <article class="timeline-entry <?php echo $left_aligned; ?>">
                                                    <div class="timeline-entry-inner">
                                                        <time datetime="<?php echo $datetime; ?>" class="timeline-time"><span><?php echo $datetime_ago; ?></span><span><?php echo $datetime; ?></span>
                                                        </time>
                                                        <div class="timeline-icon bg-<?php echo $color_array[rand(0,4)]; ?>"><i class="fa fa-exclamation"></i></div>
                                                        <div class="timeline-label">
                                                            <h2 class="timeline-title"><?php echo $suggestion_history->HistoryTitle; ?></h2>
                                                            <p><?php echo $suggestion_history->HistoryDescription; ?></p>
                                                            <p style="text-align: right;">By - 
                                                                <a href="<?php echo $UserProfileHrefLink; ?>" target="_blank"><?php echo $By; ?></a>
                                                            </p>
                                                            <?php
                                                            $SuggestionHistoryAttachment = $suggestion_history->SuggestionHistoryAttachment;
                                                            if(count($SuggestionHistoryAttachment) > 0) {
                                                                echo '<p>';
                                                                $i = 0;
                                                                foreach($SuggestionHistoryAttachment AS $suggestion_history_attachment) {
                                                                    echo '<a href="'.$suggestion_history_attachment->AttachmentFile.'" target="_blank">File '.($i+1).'</a>';
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
                                                    $datetime = date('d M,Y h:i', strtotime($SuggestionDetail->result->AddedOnTime));
                                                    $datetime_ago = $SuggestionDetail->result->AddedOn;
                                                    ?>
                                                    <time datetime="<?php echo $datetime; ?>" class="timeline-time"><span><?php echo $datetime_ago; ?></span><span><?php echo $datetime; ?></span>
                                                    </time>
                                                    <div class="timeline-icon bg-yellow"><i class="fa fa-camera"></i>
                                                    </div>
                                                    <div class="timeline-label">
                                                        <h2 class="timeline-title"><?php echo $SuggestionDetail->result->SuggestionSubject; ?></h2>
                                                        <p><?php echo $SuggestionDetail->result->SuggestionDescription; ?></p>
                                                        <p>Applicant Name: <?php echo $SuggestionDetail->result->ApplicantName; ?></p>
                                                        <p>Department: <?php echo $SuggestionDetail->result->SuggestionDepartment; ?></p>
                                                        <?php
                                                        $SuggestionMember = $SuggestionDetail->result->SuggestionMember;
                                                        if(count($SuggestionMember) > 0) {
                                                            echo '<p>';
                                                            foreach($SuggestionMember AS $suggestion_member) {
                                                                if((int) $suggestion_member->AcceptedYesNo == 1) {
                                                                    $UserProfileHrefLink = base_url().'profile/profile/'.$suggestion_member->user_profile_detail->user_info->UserUniqueId;
                                                                    echo '<a href="'.$UserProfileHrefLink.'" target="_blank">';
                                                                    echo $suggestion_member->user_profile_detail->profile->FirstName;
                                                                    echo ' ';
                                                                    echo $suggestion_member->user_profile_detail->profile->LastName;
                                                                    echo '</a>';
                                                                    echo ',&nbsp;';
                                                                }
                                                            }
                                                            echo '</p>';
                                                        }
                                                        ?>
                                                        <?php
                                                        $SuggestionAttachment = $SuggestionDetail->result->SuggestionAttachment;
                                                        if(count($SuggestionAttachment) > 0) {
                                                            echo '<p>';
                                                            $i = 0;
                                                            foreach($SuggestionAttachment AS $suggestion_attachment) {
                                                                echo '<a href="'.$suggestion_attachment->AttachmentFile.'" target="_blank">File '.($i+1).'</a>';
                                                                echo ',&nbsp;';
                                                                $i++;
                                                            }
                                                            echo '</p>';
                                                        }

                                                        $UserProfileHrefLink = base_url().'profile/profile/'.$SuggestionDetail->result->SuggestionProfile->user_profile_detail->user_info->UserUniqueId;

                                                        $By = $SuggestionDetail->result->SuggestionProfile->user_profile_detail->profile->FirstName.' '.$SuggestionDetail->result->SuggestionProfile->user_profile_detail->profile->LastName;

                                                        ?>
                                                        <p style="text-align: right;">By- <a href="<?php echo $UserProfileHrefLink; ?>" target="_blank"><?php echo $By; ?></a></p>
                                                    </div>
                                                </div>
                                            </article>
                                            <article class="timeline-entry begin">
                                                <div class="timeline-entry-inner">
                                                    <?php if($SuggestionDetail->result->SuggestionStatus == 4) { ?>
                                                        <div style="-webkit-transform: rotate(-90deg); -moz-transform: rotate(-90deg);"
                                                         class="timeline-icon"><i class="fa fa-plus"></i>Closed</div>
                                                    <?php } else { ?>
                                                    <a data-target="#modal-stackable" data-toggle="modal" href="javascript:void(0);" onClick="return displayFormSuggestionHistory();" title="Reply">
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
    $(document).ready(function() {
        // Flexible table

        $('#table_id').DataTable();

    });
    function displayFormSuggestionHistory() {

        $.post("<?php echo base_url(); ?>suggestion/suggestionHistoryForm", {'display': 'Y'},
            function (data, status) {
                if(data != '') {
                    $('.modal-content').html(data);
                } else {
                    $('.modal-content').html(data);
                }
            });
    }

    function saveSuggestionHistory() {
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
                url: "<?php echo base_url(); ?>suggestion/suggestionTimeline/<?php echo $this->uri->segment(3); ?>",

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
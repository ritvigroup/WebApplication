<!DOCTYPE html>
<html lang="en">

<head>
    <title>Explore</title>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="cache-control" content="no-cache">
    <meta http-equiv="expires" content="Thu, 19 Nov 1900 08:52:00 GMT">
    <?php require_once './include/css.php';?>

</head>

<body class="page-header-fixed ">
    <?php require_once './include/top.php';?>
    <div class="clearfix"></div>
    <div class="page-container">
        <?php require_once './include/left.php';?>
        <div class="page-content-wrapper animated fadeInRight">
            <div class="page-content">
                <div class="row  border-bottom" style="padding: 7px 50px; 10px 50px; background: #dadcdf;">
                    <div class="col-md-12">

                        <?php
                        // echo '<pre>';
                        // print_r($result);
                        // echo '</pre>';

                        ?>
                        <div class="row">
                            
                            <div class="col-sm-8">
                                <div class="row">
                                    <div class="col-sm-12" style="margin-bottom: -23px; margin-top: -6px;"> 
                                        
                                        <div class="ibox post-box" data-toggle="modal" class="post-model-box" data-target="#express-popup" onClick="return openExpressPopup();">
                                            <div class="feed-element post-element" style="background: #dadcdf;">
                                                <div class="media-body  box_desgin_shadow" style="background: #FFFFFF; height: 90px;">
                                                    <a href="#" class="pull-left">
                                                        <img alt="image" class="img-circle" src="<?php echo $this->session->userdata('UserProfilePic'); ?>">
                                                    </a>
                                                    <div class="media-body "> 
                                                        <strong><?php echo $this->session->userdata('Name'); ?></strong>

                                                    </div>

                                                    
                                                    <p>What is happening?</p>

                                                </div>
                                                <div class="clearfix"></div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                
                                <div class="tabs-container post-container">
                                <?php
                                    // echo '<pre>';
                                    // print_r($result);
                                    // echo '</pre>';

                                ?>
                                <div id="demo1" class="ibox-content collapse in">
                                    <div class="widgets-container">
                                        <div>
                                            <div class="feed-activity-list">
                                                <?php /*foreach($result AS $result_data) { ?>
                                                    <?php if($result_data->feedtype == 'complaint') {
                                                        
                                                        $ComplaintId        = $result_data->complaintdata->ComplaintId;
                                                        $ComplaintUniqueId      = $result_data->complaintdata->ComplaintUniqueId;
                                                        $ComplaintSubject      = $result_data->complaintdata->ComplaintSubject;
                                                        $ComplaintDescription  = $result_data->complaintdata->ComplaintDescription;
                                                        $PostBy                 = $result_data->complaintdata->ComplaintProfile->FirstName. ' '.$result_data->complaintdata->ComplaintProfile->LastName;
                                                        if($result_data->complaintdata->ComplaintProfile->ProfilePhotoPath != '') {
                                                            $PostByProfilePic = ($result_data->complaintdata->ComplaintProfile->ProfilePhotoPath != '') ? $result_data->complaintdata->ComplaintProfile->ProfilePhotoPath : base_url().'assets/images/default-user.png';
                                                        } else {
                                                            $PostByProfilePic = ($result_data->complaintdata->ComplaintProfile->ProfilePhotoPath != '') ? $result_data->complaintdata->ComplaintProfile->ProfilePhotoPath : base_url().'assets/images/default-user.png';
                                                        }

                                                        $PostOn                 = $result_data->complaintdata->AddedOn;
                                                        $PostOnTime             = $result_data->complaintdata->AddedOnTime;
                                                        
                                                        $ApplicantName          = $result_data->complaintdata->ApplicantName;
                                                        $ComplaintAddress       = $result_data->complaintdata->ComplaintAddress;
                                                        $ComplaintStatusName    = $result_data->complaintdata->ComplaintStatusName;

                                                        $ComplaintMember = $result_data->complaintdata->ComplaintMember;

                                                        $TotalLikes     = $result_data->complaintdata->TotalLikes;
                                                        $TotalUnLikes   = $result_data->complaintdata->TotalUnLikes;
                                                        $MeLike         = $result_data->complaintdata->MeLike;
                                                        $MeUnLike       = $result_data->complaintdata->MeUnLike;
                                                        $TotalComment   = $result_data->complaintdata->TotalComment;

                                                        $ComplaintMemberDisplay = '';
                                                        if(count($ComplaintMember) > 0) {
                                                            $pt = 0;
                                                            foreach($ComplaintMember AS $complaint_tag) {

                                                                $complaint_tag_name = $complaint_tag->FirstName. ' '.$complaint_tag->LastName;
                                                                $ComplaintMemberDisplay .= '<button type="button" class="btn green btn-outline sbold btn-xs">'.$complaint_tag_name.'</button>';
                                                                $pt++;
                                                                //if($PostTag == $pt)
                                                            }
                                                        }

                                                        $ComplaintAttachment = $result_data->complaintdata->ComplaintAttachment;
                                                        $ComplaintAttachmentDisplay = '';
                                                        if(count($ComplaintAttachment) > 0) {
                                                            $pt = 0;
                                                            foreach($ComplaintAttachment AS $complaint_attachment) {

                                                                $complaint_tag_name = $complaint_attachment->FirstName. ' '.$complaint_attachment->LastName;
                                                                $ComplaintAttachmentDisplay .= '<button type="button" class="btn green btn-outline sbold btn-xs" style="margin-right: 3px;"><a href="'.$complaint_attachment->AttachmentFile.'" target="_blank">File '.($pt+1).'</a></button>';
                                                                $pt++;
                                                                //if($PostTag == $pt)
                                                            }
                                                        }
                                                        ?>

                                                        <div class="feed-element box_desgin_shadow">
                                                            <a href="#" class="pull-left">
                                                                <img alt="image" class="img-circle" src="<?php echo $PostByProfilePic; ?>">
                                                            </a>
                                                            <div class="media-body "> <small class="pull-right text-navy"><?php echo $PostOn; ?></small>  <strong><?php echo $PostBy; ?></strong> file a complaint
                                                                <br> <small class="text-muted"><?php echo date('h:i a - d.m.Y', strtotime($PostOnTime)); ?></small>

                                                            </div>
                                                            <div class="">
                                                                <div class="photos">
                                                                    <p>Complaint Id: <?php echo $ComplaintUniqueId; ?></p>
                                                                    <p>Applicant Name: <?php echo $ApplicantName; ?></p>
                                                                    <p>Address: <?php echo $ComplaintAddress; ?></p>
                                                                    <p>Current Status: <?php echo $ComplaintStatusName; ?></p>
                                                                    <?php if($ComplaintMemberDisplay != '') { ?>
                                                                        <p>Memeber Associated: <?php echo $ComplaintMemberDisplay; ?></p>
                                                                    <?php } ?>
                                                                    <?php if($ComplaintAttachmentDisplay != '') { ?>
                                                                        <p>Attachment: <?php echo $ComplaintAttachmentDisplay; ?></p>
                                                                    <?php } ?>
                                                                </div>
                                                                <div class="actions text-center"> 
                                                                    <a class="btn btn-xs btn-success pull-left" id="express_complaint_like_<?php echo $ComplaintId; ?>" onClick="return likeComplaint(<?php echo $ComplaintId; ?>);"><i class="fa fa-thumbs-up"></i> Like </a>

                                                                    <span class=" pull-left express_complaint_like_<?php echo $ComplaintId; ?>"><?php echo $TotalLikes; ?></span>  
                                                                    <a class="btn btn-xs btn-danger" id="express_complaint_unlike_<?php echo $ComplaintId; ?>" onClick="return unlikeComplaint(<?php echo $ComplaintId; ?>);"><i class="fa fa-thumbs-down"></i> Unlike</a>
                                                                    
                                                                    <span class="express_complaint_unlike_<?php echo $ComplaintId; ?>"><?php echo $TotalUnLikes; ?></span>
                                                                    <a class="btn btn-xs aqua pull-right"><i class="fa fa-pencil"></i> Comments</a> 
                                                                    
                                                                    <span class=" pull-right express_complaint_comment_<?php echo $ComplaintId; ?>"><?php echo $TotalComment; ?></span>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    <?php } else if($result_data->feedtype == 'poll') {
                                                        
                                                        $PollId         = $result_data->polldata->PollId;
                                                        $PollUniqueId   = $result_data->polldata->PollUniqueId;
                                                        $PollQuestion   = $result_data->polldata->PollQuestion;
                                                        $ValidFromDate  = $result_data->polldata->ValidFromDate;
                                                        $ValidEndDate   = $result_data->polldata->ValidEndDate;
                                                        $PollLocation   = $result_data->polldata->PollLocation;
                                                        $PollPrivacy    = $result_data->polldata->PollPrivacy;
                                                        $PollStatus     = $result_data->polldata->PollStatus;
                                                        $AddedOn        = $result_data->polldata->AddedOn;
                                                        $AddedOnTime    = $result_data->polldata->AddedOnTime;
                                                        $PollProfile    = $result_data->polldata->PollProfile;
                                                        $PollImage      = ($result_data->polldata->PollImage != '') ? '<img src="'.$result_data->polldata->PollImage.'" style="width: 100%;">' : '';
                                                        $PollTotalParticipation  = $result_data->polldata->PollTotalParticipation;
                                                        $PollAnswerWithTotalParticipation  = $result_data->polldata->PollAnswerWithTotalParticipation;
                                                        $MeParticipated = $result_data->polldata->MeParticipated;

                                                        $TotalLikes     = $result_data->polldata->TotalLikes;
                                                        $TotalUnLikes   = $result_data->polldata->TotalUnLikes;
                                                        $MeLike         = $result_data->polldata->MeLike;
                                                        $MeUnLike       = $result_data->polldata->MeUnLike;
                                                        $TotalComment   = $result_data->polldata->TotalComment;



                                                        $PostBy = $result_data->polldata->PollProfile->FirstName. ' '.$result_data->polldata->PollProfile->LastName;
                                                        if($result_data->polldata->PollProfile->ProfilePhotoPath != '') {
                                                            $PostByProfilePic = ($result_data->polldata->PollProfile->ProfilePhotoPath != '') ? $result_data->polldata->PollProfile->ProfilePhotoPath : base_url().'assets/images/default-user.png';
                                                        } else {
                                                            $PostByProfilePic = ($result_data->polldata->PollProfile->ProfilePhotoPath != '') ? $result_data->polldata->PollProfile : base_url().'assets/images/default-user.png';
                                                        }
                                                        ?>

                                                        <div class="feed-element box_desgin_shadow">
                                                            <a href="#" class="pull-left">
                                                                <img alt="image" class="img-circle" src="<?php echo $PostByProfilePic; ?>">
                                                            </a>
                                                            <div class="media-body "> <small class="pull-right text-navy"><?php echo $PostOn; ?></small>  <strong><?php echo $PostBy; ?></strong> created poll
                                                                <br> <small class="text-muted"><?php echo date('h:i a - d.m.Y', strtotime($AddedOnTime)); ?></small>

                                                            </div>
                                                            <div class="">
                                                                <div class="photos">
                                                                    <p><?php echo $PollQuestion.$PollImage; ?></p>
                                                                    <ul>
                                                                        <?php
                                                                        foreach($PollAnswerWithTotalParticipation AS $answers) {
                                                                            $PollAnswerImage = ($answers->PollAnswerImage != '') ? '<img src="'.$answers->PollAnswerImage.'" style="width: 200px; height: 120px;">' : '';
                                                                            echo '<li style="overflow: hidden; max-height: 300px;">'.$PollAnswerImage.'<br>'.$answers->PollAnswer.' : <input type="button" value="'.$answers->TotalAnswerdMe.'"></li>';
                                                                        }
                                                                        ?>
                                                                    </ul>
                                                                </div>
                                                                
                                                                <div class="actions text-center"> 
                                                                    <a class="btn btn-xs btn-success pull-left" id="express_poll_like_<?php echo $PollId; ?>" onClick="return likePoll(<?php echo $PollId; ?>);"><i class="fa fa-thumbs-up"></i> Like </a>

                                                                    <span class=" pull-left express_poll_like_<?php echo $PollId; ?>"><?php echo $TotalLikes; ?></span>  
                                                                    <a class="btn btn-xs btn-danger" id="express_poll_unlike_<?php echo $PollId; ?>" onClick="return unlikePoll(<?php echo $PollId; ?>);"><i class="fa fa-thumbs-down"></i> Unlike</a>
                                                                    
                                                                    <span class="express_poll_unlike_<?php echo $PollId; ?>"><?php echo $TotalUnLikes; ?></span>
                                                                    <a class="btn btn-xs aqua pull-right"><i class="fa fa-pencil"></i> Comments</a> 
                                                                    
                                                                    <span class=" pull-right express_poll_comment_<?php echo $PollId; ?>"><?php echo $TotalComment; ?></span>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    <?php } else if($result_data->feedtype == 'event') {
                                                        
                                                        $EventId   = $result_data->eventdata->EventId;
                                                        $EventUniqueId   = $result_data->eventdata->EventUniqueId;
                                                        $EventName   = $result_data->eventdata->EventName;
                                                        $EventDescription  = $result_data->eventdata->EventDescription;
                                                        $EventLocation   = $result_data->eventdata->EventLocation;
                                                        $StartDate   = $result_data->eventdata->StartDate;
                                                        $EndDate    = $result_data->eventdata->EndDate;
                                                        $EventStatus     = $result_data->eventdata->EventStatus;
                                                        $EventPrivacy        = $result_data->eventdata->EventPrivacy;
                                                        $AddedOn    = $result_data->eventdata->AddedOn;
                                                        $AddedOnTime    = $result_data->eventdata->AddedOnTime;
                                                        $EventProfile    = $result_data->eventdata->EventProfile;
                                                        
                                                        $EventAttendee  = $result_data->eventdata->EventAttendee;
                                                        $EventAttachment  = $result_data->eventdata->EventAttachment;
                                                        $TotalEventLike  = $result_data->eventdata->TotalEventLike;
                                                        $EventLikedByMe  = $result_data->eventdata->EventLikedByMe;
                                                        $TotalEventInterest  = $result_data->eventdata->TotalEventInterest;
                                                        $EventInterestTotal  = $result_data->eventdata->EventInterestTotal;
                                                        $MeInterested  = $result_data->eventdata->MeInterested;

                                                        $TotalLikes     = $result_data->eventdata->TotalLikes;
                                                        $TotalUnLikes   = $result_data->eventdata->TotalUnLikes;
                                                        $MeLike         = $result_data->eventdata->MeLike;
                                                        $MeUnLike       = $result_data->eventdata->MeUnLike;
                                                        $TotalComment   = $result_data->eventdata->TotalComment;

                                                        
                                                        $PostBy = $result_data->eventdata->EventProfile->FirstName. ' '.$result_data->eventdata->EventProfile->LastName;
                                                        if($result_data->eventdata->EventProfile->ProfilePhotoPath != '') {
                                                            $PostByProfilePic = ($result_data->eventdata->EventProfile->ProfilePhotoPath != '') ? $result_data->eventdata->EventProfile->ProfilePhotoPath : base_url().'assets/images/default-user.png';
                                                        } else {
                                                            $PostByProfilePic = ($result_data->eventdata->EventProfile->ProfilePhotoPath != '') ? $result_data->eventdata->EventProfile : base_url().'assets/images/default-user.png';
                                                        }

                                                        $i = 0;
                                                        $event_main_image = '';
                                                        foreach($EventAttachment AS $event_attachment) {
                                                            if($i == 0) {
                                                                $event_main_image = $event_attachment->AttachmentFile;
                                                            }
                                                            $i++;
                                                        }
                                                        ?>

                                                        <div class="feed-element box_desgin_shadow">
                                                            <a href="#" class="pull-left">
                                                                <img alt="image" class="img-circle" src="<?php echo $PostByProfilePic; ?>">
                                                            </a>
                                                            <div class="media-body "> <small class="pull-right text-navy"><?php echo $PostOn; ?></small>  <strong><?php echo $PostBy; ?></strong> created an event
                                                                <br> <small class="text-muted"><?php echo date('h:i a - d.m.Y', strtotime($AddedOnTime)); ?></small>

                                                            </div>
                                                            <div class="">
                                                                <div class="photos">
                                                                    <p><?php if($event_main_image != '') {
                                                                        echo '<img src="'.$event_main_image.'" style="width: 100%; height: 300px;">';
                                                                    }?></p>
                                                                    <p><?php echo $EventName; ?></p>
                                                                    <p>
                                                                        <?php foreach($TotalEventInterest AS $event_interest) { ?>
                                                                            <?php echo $event_interest->EventInterestTypeName .' : '.$event_interest->TotalCount; ?>, 
                                                                        <?php } ?>
                                                                    </p>
                                                                    <p>Start Date: <?php echo date('d-M, Y', strtotime($StartDate)); ?></p>
                                                                    <p>End Date: <?php echo date('d-M, Y', strtotime($EndDate)); ?></p>
                                                                    <p>
                                                                        <?php
                                                                        foreach($EventAttachment AS $event_attachment) {
                                                                            echo '<img src="'.$event_attachment->AttachmentFile.'" style="width: 200px; height: 120px; margin-left: 10px;">';
                                                                        }
                                                                        ?>
                                                                    </p>
                                                                </div>
                                                                <div class="actions text-center"> 
                                                                    <a class="btn btn-xs btn-success pull-left" id="express_event_like_<?php echo $EventId; ?>" onClick="return likeEvent(<?php echo $EventId; ?>);"><i class="fa fa-thumbs-up"></i> Like </a>

                                                                    <span class=" pull-left express_event_like_<?php echo $EventId; ?>"><?php echo $TotalLikes; ?></span>  
                                                                    <a class="btn btn-xs btn-danger" id="express_event_unlike_<?php echo $EventId; ?>" onClick="return unlikeEvent(<?php echo $EventId; ?>);"><i class="fa fa-thumbs-down"></i> Unlike</a>
                                                                    
                                                                    <span class="express_event_unlike_<?php echo $EventId; ?>"><?php echo $TotalUnLikes; ?></span>
                                                                    <a class="btn btn-xs aqua pull-right"><i class="fa fa-pencil"></i> Comments</a> 
                                                                    
                                                                    <span class=" pull-right express_event_comment_<?php echo $EventId; ?>"><?php echo $TotalComment; ?></span>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    <?php } else if($result_data->feedtype == 'post') {
                                                        
                                                        $PostId             = $result_data->postdata->PostId;
                                                        $UserProfileId      = $result_data->postdata->UserProfileId;
                                                        $PostTitle          = $result_data->postdata->PostTitle;
                                                        $PostStatus         = $result_data->postdata->PostStatus;
                                                        $PostLocation       = $result_data->postdata->PostLocation;
                                                        $PostDescription    = $result_data->postdata->PostDescription;
                                                        $PostURL        = $result_data->postdata->PostURL;
                                                        $PostPrivacy    = $result_data->postdata->PostPrivacy;
                                                        $AddedOn        = $result_data->postdata->AddedOn;
                                                        $AddedOnTime    = $result_data->postdata->AddedOnTime;
                                                        $PostTag        = $result_data->postdata->PostTag;
                                                        $PostAttachment = $result_data->postdata->PostAttachment;

                                                        $TotalLikes     = $result_data->postdata->TotalLikes;
                                                        $TotalUnLikes   = $result_data->postdata->TotalUnLikes;
                                                        $MeLike         = $result_data->postdata->MeLike;
                                                        $MeUnLike       = $result_data->postdata->MeUnLike;
                                                        $TotalComment   = $result_data->postdata->TotalComment;                                                        
                                                        
                                                        $PostBy = $result_data->postdata->PostProfile->FirstName. ' '.$result_data->postdata->PostProfile->LastName;
                                                        if($result_data->postdata->PostProfile->ProfilePhotoPath != '') {
                                                            $PostByProfilePic = ($result_data->postdata->PostProfile->ProfilePhotoPath != '') ? $result_data->postdata->PostProfile->ProfilePhotoPath : base_url().'assets/images/default-user.png';
                                                        } else {
                                                            $PostByProfilePic = ($result_data->postdata->PostProfile->ProfilePhotoPath != '') ? $result_data->postdata->PostProfile : base_url().'assets/images/default-user.png';
                                                        }
                                                        ?>

                                                        <div class="feed-element box_desgin_shadow" id="explore_post_<?php echo $PostId; ?>">
                                                            <a href="#" class="pull-left">
                                                                <img alt="image" class="img-circle" src="<?php echo $PostByProfilePic; ?>">
                                                            </a>
                                                            <div class="media-body "> 
                                                                <?php
                                                                if($this->session->userdata('UserProfileId') == $result_data->postdata->PostProfile->UserProfileId) {
                                                                ?>
                                                                <div style="float: right;"><a class="btn btn-xs btn-danger" onClick="return deleteMyPostStatus(<?php echo $PostId; ?>);"><i class="glyphicon glyphicon-remove " aria-hidden="true"></i> Delete</a></div>
                                                                <?php } ?>
                                                                <small class="pull-right text-navy"><?php echo $PostOn; ?></small>  
                                                                <strong><?php echo $PostBy; ?></strong> post status
                                                                <br> 
                                                                <small class="text-muted"><?php echo date('h:i a - d.m.Y', strtotime($AddedOnTime)); ?></small>

                                                            </div>
                                                            <div class="">
                                                                <div class="photos">
                                                                    <p><?php echo $PostTitle; ?></p>
                                                                    <p>
                                                                    <?php 
                                                                        if(count($PostAttachment) > 1) {
                                                                            $style_post = "width: 200px; height: 120px;";
                                                                        } else {
                                                                            $style_post = "width: 100%;";
                                                                        }
                                                                        foreach($PostAttachment AS $post_attachment) {
                                                                            if($post_attachment->AttachmentType == "video") {
                                                                                echo '<video controls style="'.$style_post.'">
                                                                                    <source src="'.$post_attachment->AttachmentFile.'" type="video/mp4">
                                                                                    Your browser does not support the video tag.
                                                                                    </video>';
                                                                            } else if($post_attachment->AttachmentType == "photo") {
                                                                                echo '<img src="'.$post_attachment->AttachmentFile.'" style="'.$style_post.'">';
                                                                            } else {

                                                                            }
                                                                        }
                                                                    ?></p>                                                              
                                                                </div>
                                                                <div class="actions text-center"> 
                                                                    <a class="btn btn-xs btn-success pull-left" id="express_post_like_<?php echo $PostId; ?>" onClick="return likePost(<?php echo $PostId; ?>);"><i class="fa fa-thumbs-up"></i> Like </a>

                                                                    <span class=" pull-left express_post_like_<?php echo $PostId; ?>"><?php echo $TotalLikes; ?></span>  
                                                                    <a class="btn btn-xs btn-danger" id="express_post_unlike_<?php echo $PostId; ?>" onClick="return unlikePost(<?php echo $PostId; ?>);"><i class="fa fa-thumbs-down"></i> Unlike</a>
                                                                    
                                                                    <span class="express_post_unlike_<?php echo $PostId; ?>"><?php echo $TotalUnLikes; ?></span>
                                                                    <a class="btn btn-xs aqua pull-right"><i class="fa fa-pencil"></i> Comments</a> 
                                                                    
                                                                    <span class=" pull-right express_post_comment_<?php echo $PostId; ?>"><?php echo $TotalComment; ?></span>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    <?php } ?>
                                                <?php }*/ ?>
                                                <?php $this->load->view('explore/explorefeed.php'); ?>
                                            </div>
                                            <?php if(count($result) > 0) { ?>
                                            <button class="btn aqua btn-block show_next_explore" onClick="return showNextExplore();"><i class="fa fa-arrow-down"></i> Show More</button>
                                            <?php } ?>
                                            <div class="new_loader_div" id="new_loader_div"><img src="<?=base_url();?>assets/images/new-loader.gif"></div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-4" style="padding: 10px 50px; 10px 50px;">
                            <div class="ibox box_desgin_shadow" style="background: #FFFFFF;">
                                <div class="widgets-container" style="background: #FFFFFF;">
                                    <div class="feed-element">
                                        <a href="#" class="pull-left">
                                            <img alt="image" class="img-circle" src="../assets/images/teem/a3.jpg">
                                        </a>
                                        <div class="media-body "> <strong>Olivia Wenscombe </strong>send Friend Requests to you .
                                            <br> <small class="text-muted">Today 9:00 pm - 11.06.2016</small>
                                            <div class="actions"> <a class="btn btn-xs aqua"><i class="glyphicon glyphicon-ok"></i> Confirm</a>  <a class="btn btn-xs btn-danger"><i class="glyphicon glyphicon-remove " aria-hidden="true"></i> Delete</a> 
                                            </div>
                                        </div>
                                    </div>
                                    <h3>About Olivia Wenscombe</h3>
                                    <p class="small">There are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration in some form, by injected humour, or randomised words which don't.
                                    <br>
                                    <br>If you are going to use a passage of Lorem Ipsum, you need to be sure there isn't anything embarrassing</p>
                                    <p class="small font-bold"> <span><i class="fa fa-circle text-navy"></i> Online status</span> 
                                    </p>
                                </div>
                            </div>

                            <div class="ibox box_desgin_shadow" style="background: #FFFFFF;">
                                <div class="widgets-container" style="background: #FFFFFF;">
                                    <h3>Private message</h3>
                                    <p class="small">Send private message to Olivia Wenscombe</p>
                                    <div class="form-group">
                                        <label>Subject</label>
                                        <input placeholder="Message subject" class="form-control" type="email">
                                    </div>
                                    <div class="form-group">
                                        <label>Message</label>
                                        <textarea rows="3" placeholder="Your message" class="form-control"></textarea>
                                    </div>
                                    <button class="btn aqua btn-block">Send</button>
                                </div>
                            </div>
                        </div>

                        

                        
                    </div>
                </div>
            </div>
            
        </div>
    </div>
</div>

<?php require_once './include/footer.php';?>

<?php require_once './include/scroll_top.php';?>
<!-- Profile Edit Page -->
<div class="modal fade" id="edit-profile" tabindex="-1" role="dialog" aria-labelledby="edit-profile-Label">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span>
                </button>
                <h4 class="modal-title" id="myModalLabel">Edit Profile</h4>
            </div>
            <div class="modal-body">Edit</div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary">Save changes</button>
            </div>
        </div>
    </div>
</div>
<!-- Profile Edit Page -->
<div class="modal fade" id="setting-profile" tabindex="-1" role="dialog" aria-labelledby="setting-profile-Label">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span>
                </button>
                <h4 class="modal-title" id="myModalLabel">Profile Setting</h4>
            </div>
            <div class="modal-body">Setting</div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary">Save changes</button>
            </div>
        </div>
    </div>
</div>
<!-- Adding New Post -->
<div class="modal fade" id="new-user-post" tabindex="-1" role="dialog" aria-labelledby="setting-profile-Label">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span>
                </button>
                <h4 class="modal-title" id="myModalLabel">Post</h4>
            </div>
            <div class="modal-body">Post</div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary">Save changes</button>
            </div>
        </div>
    </div>
</div>
<!-- Overview-about-profile -->
<div class="modal fade" id="Overview-about-profile" tabindex="-1" role="dialog" aria-labelledby="Overview-about-profile-Label">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span>
                </button>
                <h4 class="modal-title" id="myModalLabel">Overview-about-profile</h4>
            </div>
            <div class="modal-body">
                <p><a href="#work-and-education-about-profile" data-toggle="modal">Work and Education</a>
                </p>
                <p><a href="#Places-You-Lived-about-profile" data-toggle="modal">Places You've Lived</a>
                </p>
                <p><a href="#Family-and-Relationships-about-profile" data-toggle="modal">Family and Relationships</a>
                </p>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary">Save changes</button>
            </div>
        </div>
    </div>
</div>
<!-- work-and-education-about-profile -->
<div class="modal fade" id="work-and-education-about-profile" tabindex="-1" role="dialog" aria-labelledby="work-and-education-about-profile-Label">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span>
                </button>
                <h4 class="modal-title" id="myModalLabel">work-and-education-about-profile</h4>
            </div>
            <div class="modal-body">
                <div class="work"> <a class="" data-toggle="collapse" href="#work" aria-expanded="false" aria-controls="work"> Work 
                    <button type="button" class="collapse" ><span aria-hidden="true">&times;</span></button></a>
                    <div class="collapse" id="work">
                        <div class="well">
                            <div class="row">
                                <div class>
                                    <div class="form-group">
                                        <label class="col-sm-3 control-label">Company</label>
                                        <div class="col-sm-9">
                                            <input class="form-control" type="text" placeholder="Where have you worked?">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-sm-3 control-label">Position</label>
                                        <div class="col-sm-9">
                                            <input class="form-control" type="text" placeholder="What is your job title?">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-sm-3 control-label">City</label>
                                        <div class="col-sm-9">
                                            <input class="form-control" type="text" placeholder="What is your job title?">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-sm-3 control-label">Time Period
                                            <br>
                                        </label>
                                        <div class="col-md-9">
                                            <label class="">
                                                <div class="icheckbox_square-blue " style="position: relative;">
                                                    <input type="checkbox" class="iCheck" style="position: absolute; top: -20%; left: -20%; display: block; width: 140%; height: 140%; margin: 0px; padding: 0px; background: rgb(255, 255, 255); border: 0px; opacity: 0;"><ins class="iCheck-helper" style="position: absolute; top: -20%; left: -20%; display: block; width: 140%; height: 140%; margin: 0px; padding: 0px; background: rgb(255, 255, 255); border: 0px; opacity: 0;"></ins>
                                                </div>Checkbox 1</label>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-primary">Save changes</button>
                </div>
            </div>
        </div>
    </div>
    <!-- Places-You've-Lived-about-profile -->
    <div class="modal fade" id="Places-You-Lived-about-profile" tabindex="-1" role="dialog" aria-labelledby="Places-You-Lived-about-profile">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span>
                    </button>
                    <h4 class="modal-title" id="myModalLabel">Places-You've-Lived-about-profile</h4>
                </div>
                <div class="modal-body">Places-You've-Lived-about-profile</div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-primary">Save changes</button>
                </div>
            </div>
        </div>
    </div>
    <!-- Contact-and-Basic-Info-about-profile -->
    <div class="modal fade" id="Contact-and-Basic-Info-about-profile" tabindex="-1" role="dialog" aria-labelledby="Contact-and-Basic-Info-about-profile">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span>
                    </button>
                    <h4 class="modal-title" id="myModalLabel">Contact-and-Basic-Info-about-profile</h4>
                </div>
                <div class="modal-body">Contact-and-Basic-Info-about-profile</div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-primary">Save changes</button>
                </div>
            </div>
        </div>
    </div>
    <!-- Family-and-Relationships-about-profile -->
    <div class="modal fade" id="Family-and-Relationships-about-profile" tabindex="-1" role="dialog" aria-labelledby="Family-and-Relationships-about-profile">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span>
                    </button>
                    <h4 class="modal-title" id="myModalLabel">Family-and-Relationships-about-profile</h4>
                </div>
                <div class="modal-body">Family-and-Relationships-about-profile</div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-primary">Save changes</button>
                </div>
            </div>
        </div>
    </div>
    <!-- Details-About-You-about-profile -->
    <div class="modal fade" id="Details-About-You-about-profile" tabindex="-1" role="dialog" aria-labelledby="Details-About-You-about-profile">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span>
                    </button>
                    <h4 class="modal-title" id="myModalLabel">Details-About-You-about-profile</h4>
                </div>
                <div class="modal-body">Details-About-You-about-profile</div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-primary">Save changes</button>
                </div>
            </div>
        </div>
    </div>
    <!-- Life-Events-about-profile -->
    <div class="modal fade" id="Life-Events-about-profile" tabindex="-1" role="dialog" aria-labelledby="Life-Events-about-profile">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span>
                    </button>
                    <h4 class="modal-title" id="myModalLabel">Life-Events-about-profile</h4>
                </div>
                <div class="modal-body">Life-Events-about-profile</div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-primary">Save changes</button>
                </div>
            </div>
        </div>
    </div>
</body>
<?php require_once './include/js.php';?>

<?php require_once './include/explore/explore.php';?>


</html>
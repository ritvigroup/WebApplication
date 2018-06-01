<?php
// echo '<pre>';
// print_r($result);
// echo '</pre>';
?>

<?php foreach($result AS $result_data) { ?>
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
        $ComplaintStatus        = $result_data->complaintdata->ComplaintStatus;
        $ComplaintStatusName    = $result_data->complaintdata->ComplaintStatusName;

        $ComplaintMember = $result_data->complaintdata->ComplaintMember;

        $TotalLikes     = $result_data->complaintdata->TotalLikes;
        $TotalUnLikes   = $result_data->complaintdata->TotalUnLikes;
        $MeLike         = $result_data->complaintdata->MeLike;
        $MeUnLike       = $result_data->complaintdata->MeUnLike;
        $TotalComment   = $result_data->complaintdata->TotalComment;
        
        $ComplaintAssigned   = $result_data->complaintdata->ComplaintAssigned;

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
                    <p style="text-align: center;">
                    <?php if($ComplaintStatus == 1) { ?>
                        <?php if($ComplaintAssigned[0]->UserProfileId == $this->session->userdata('UserProfileId')) { ?>
                            <div class="actions" id="confirm_delete_complaint_<?php echo $ComplaintId; ?>"> 
                                <a class="btn btn-xs aqua" onClick="return confirmRequestComplaint(<?php echo $ComplaintId; ?>);"><i class="glyphicon glyphicon-ok"></i> Confirm</a>  
                                <a class="btn btn-xs btn-danger" onClick="return cancelRequestComplaint(<?php echo $ComplaintId; ?>);"><i class="glyphicon glyphicon-remove " aria-hidden="true"></i> Delete</a> 
                            </div>
                        <?php } ?>
                    <?php } ?>
                    </p>

                </div>
                <div class="actions text-center"> 
                    <a class="btn btn-xs btn-success pull-left" id="express_complaint_like_<?php echo $ComplaintId; ?>" onClick="return likeComplaint(<?php echo $ComplaintId; ?>);"><i class="fa fa-thumbs-up"></i> Like </a>

                    <span class=" pull-left express_complaint_like_<?php echo $ComplaintId; ?>"><?php echo $TotalLikes; ?></span>  
                    <a class="btn btn-xs btn-danger" id="express_complaint_unlike_<?php echo $ComplaintId; ?>" onClick="return unlikeComplaint(<?php echo $ComplaintId; ?>);"><i class="fa fa-thumbs-down"></i> Unlike</a>
                    
                    <?php /*
                    <span class="express_complaint_unlike_<?php echo $ComplaintId; ?>"><?php echo $TotalUnLikes; ?></span>
                    <a class="btn btn-xs aqua pull-right"><i class="fa fa-pencil"></i> Comments</a> 
                    
                    <span class=" pull-right express_complaint_comment_<?php echo $ComplaintId; ?>"><?php echo $TotalComment; ?></span>
                    */ ?>
                    
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

        <div class="feed-element box_desgin_shadow" id="explore_poll_<?php echo $PollId; ?>">
            <a href="#" class="pull-left">
                <img alt="image" class="img-circle" src="<?php echo $PostByProfilePic; ?>">
            </a>
            <div class="media-body ">
                <?php
                if($this->session->userdata('UserProfileId') == $result_data->polldata->PollProfile->UserProfileId) {
                ?>
                <div style="float: right;"><a class="btn btn-xs btn-danger" onClick="return deleteMyPoll(<?php echo $PollId; ?>);"><i class="glyphicon glyphicon-remove " aria-hidden="true"></i> Delete</a></div>
                <?php } ?>

             <small class="pull-right text-navy"><?php echo $PostOn; ?></small>  <strong><?php echo $PostBy; ?></strong> created poll
                <br> <small class="text-muted"><?php echo date('h:i a - d.m.Y', strtotime($AddedOnTime)); ?></small>

            </div>
            <div class="">
                <div class="photos">
                    <p><?php echo $PollQuestion.$PollImage; ?></p>
                    <ul>
                        <?php
                        foreach($PollAnswerWithTotalParticipation AS $answers) {

                            $PollAnswerImage = ($answers->PollAnswerImage != '') ? '<img src="'.$answers->PollAnswerImage.'" style="width: 200px; height: 120px;">' : '';
                            if($answers->PollAnswer != '') {
                                echo '<li style="overflow: hidden; max-height: 300px;">'.$PollAnswerImage.'<br>'.$answers->PollAnswer.' : <input type="button" value="'.$answers->TotalAnswerdMe.'"></li>';
                            }
                        }
                        ?>
                    </ul>
                </div>
                
                <div class="actions text-center"> 
                    <a class="btn btn-xs btn-success pull-left" id="express_poll_like_<?php echo $PollId; ?>" onClick="return likePoll(<?php echo $PollId; ?>);"><i class="fa fa-thumbs-up"></i> Like </a>

                    <span class=" pull-left express_poll_like_<?php echo $PollId; ?>"><?php echo $TotalLikes; ?></span>  
                    <a class="btn btn-xs btn-danger" id="express_poll_unlike_<?php echo $PollId; ?>" onClick="return unlikePoll(<?php echo $PollId; ?>);"><i class="fa fa-thumbs-down"></i> Unlike</a>
                    
                    <span class="express_poll_unlike_<?php echo $PollId; ?>"><?php echo $TotalUnLikes; ?></span>
                    <a class="btn btn-xs aqua pull-right" data-target="#express-popup" data-toggle="modal" onClick="return commentPoll(<?php echo $PollId; ?>);"><i class="fa fa-pencil"></i> Comments</a> 
                    
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

        <div class="feed-element box_desgin_shadow" id="explore_event_<?php echo $EventId; ?>">
            <a href="#" class="pull-left">
                <img alt="image" class="img-circle" src="<?php echo $PostByProfilePic; ?>">
            </a>
            <div class="media-body "> 
                <?php
                if($this->session->userdata('UserProfileId') == $result_data->eventdata->EventProfile->UserProfileId) {
                ?>
                <div style="float: right;"><a class="btn btn-xs btn-danger" onClick="return deleteMyEvent(<?php echo $EventId; ?>);"><i class="glyphicon glyphicon-remove " aria-hidden="true"></i> Delete</a></div>
                <?php } ?>

                <small class="pull-right text-navy"><?php echo $PostOn; ?></small>  <strong><?php echo $PostBy; ?></strong> created an event
                <br> <small class="text-muted"><?php echo date('h:i a - d.m.Y', strtotime($AddedOnTime)); ?></small>

            </div>
            <div class="">
                <div class="photos">
                    <p><?php if($event_main_image != '') {
                        echo '<img src="'.$event_main_image.'" style="max-width: 100%;">';
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
                            $style_post = "text-align: center;max-width: 100%;";
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
<?php } ?>
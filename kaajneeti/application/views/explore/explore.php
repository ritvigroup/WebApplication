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
                <div class="row  border-bottom aqua-bg-color dashboard-header">
                    <div class="col-md-12">

                        <?php
                        // echo '<pre>';
                        // print_r($result);
                        // echo '</pre>';

                        ?>
                        <div class="row">
                            <div class="col-sm-6">
                                <div class="row">
                                    <div class="col-sm-12"> <a href="javascript:void(0);" data-toggle="modal" class="post-model-box" data-target="#express-popup" onClick="return openExpressPopup();">
                                        &nbsp;
                                    </a>
                                    <div class="ibox post-box">
                                        <div class="feed-list">
                                            <ul>
                                                <li><a href="javascript:void(0);" data-toggle="modal" data-target="#express-popup" onClick="return openExpressPopup();"><i class="fa fa-edit"></i> Make Post</a>
                                                </li>
                                                <li><a href="javascript:void(0);" data-toggle="modal" data-target="#express-popup" onClick="return openExpressPopup();"><i class="fa fa-camera"></i> Photo/Video</a>
                                                </li>
                                                <li><a href="javascript:void(0);" data-toggle="modal" data-target="#exampleModalCenter"><i class="fa fa-camera"></i> Live Video</a>
                                                </li>
                                                <li><a href="javascript:void(0);" data-toggle="modal" data-target="#express-popup" onClick="return openExpressPopup();"><i class="fa fa-flag"></i> LIfe Event</a>
                                                </li>
                                            </ul>
                                        </div>
                                        <div class="feed-element post-element">
                                            <div class="media-body ">
                                                <a href="#" class="pull-left">
                                                    <img alt="image" class="img-circle" src="../assets/images/teem/a9.jpg">
                                                </a>
                                                <p>What's on your mind?</p>

                                            </div>
                                            <div class="clearfix"></div>
                                            <div class="media-footer">
                                                <p class="activity-btn">
                                                    <button class="btn btn-default" type="button"><i class="fa fa-camera"></i> Video/Photos</button>
                                                    <button class="btn btn-success" type="button"><i class="fa fa-camera"></i> feeling/Activity</button>
                                                    <button class="btn btn-default" type="button"><i class="fa fa-ellipsis-h"></i>
                                                    </button>
                                                    <!-- </p> --> <span class="pull-right media-footer-btn">
                                                    <button class="btn btn-default" type="button"><i class="fa fa-user"></i> Public</button>
                                                    <button class="btn btn-info" type="button"><i class="fa fa-envelope"></i> post</button></span> 
                                                </p>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- </a> -->
                                </div>
                            </div>
                            
                            <div class="tabs-container post-container">
                                <?php
                                    // echo '<pre>';
                                    // print_r($result);
                                    // echo '</pre>';

                                    /*foreach($result AS $result_data) { ?>
                                    <div class="col-lg-4">
                                        
                                        <?php if($result_data->feedtype == 'post') { ?>
                                            <?php
                                            $PostTitle          = $result_data->postdata->PostTitle;
                                            $PostDescription    = $result_data->postdata->PostDescription;
                                            $PostBy             = $result_data->postdata->PostProfile->FirstName. ' '.$result_data->postdata->PostProfile->LastName;
                                            $PostOn             = $result_data->postdata->AddedOn;

                                            $PostTag = $result_data->postdata->PostTag;

                                            $PostTagDisplay = '';
                                            if(count($PostTag) > 0) {
                                                $pt = 0;
                                                foreach($PostTag AS $post_tag) {

                                                    $post_tag_name = $post_tag->FirstName. ' '.$post_tag->LastName;
                                                    $PostTagDisplay .= '<button type="button" class="btn green btn-outline sbold btn-xs">'.$post_tag_name.'</button>';
                                                    $pt++;
                                                    //if($PostTag == $pt)
                                                }
                                            }
                                            ?>
                                            <div class="ibox"> 
                                                <!-- <img alt="" class="full-width" src="assets/images/blogs/1.jpg"> -->
                                                <div class="widgets-container padding-top10"> 
                                                    <a class="btn-link" href="#">Post
                                                        <h2 class="hed"> <?php echo $PostTitle; ?> </h2>
                                                    </a>
                                                    <div class="small bottom5"> <strong><?php echo $PostBy; ?></strong> <span class="text-muted right"><i class="fa fa-clock-o"></i> <?php echo $PostOn; ?></span> </div>
                                                    <?php if($PostDescription != '') { ?>
                                                    <p> <?php echo $PostDescription; ?> </p>
                                                    <?php } ?>
                                                    <div class="row">
                                                        <div class="col-md-4">
                                                            <?php if($PostTagDisplay != '') { ?>
                                                            <h5>Tags:</h5>
                                                                <?php echo $PostTagDisplay; ?>
                                                            <?php } ?>
                                                        </div>
                                                        <div class="col-md-8">
                                                            <div class="small text-right">
                                                                <h5>&nbsp;</h5>
                                                                <div> 
                                                                    <i class="fa fa-comments-o"> </i> 80 &nbsp;
                                                                    <i class="fa fa-eye"> </i> 200 views 
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        <?php } ?>

                                        <?php if($result_data->feedtype == 'suggestion') { ?>
                                            <?php
                                            $SuggestionSubject      = $result_data->suggestiondata->SuggestionSubject;
                                            $SuggestionDescription  = $result_data->suggestiondata->SuggestionDescription;
                                            $PostBy                 = $result_data->suggestiondata->SuggestionProfile->FirstName. ' '.$result_data->suggestiondata->SuggestionProfile->LastName;
                                            $PostOn                 = $result_data->suggestiondata->AddedOn;

                                            $PostTag = $result_data->suggestiondata->PostTag;

                                            $PostTagDisplay = '';
                                            if(count($PostTag) > 0) {
                                                $pt = 0;
                                                foreach($PostTag AS $post_tag) {

                                                    $post_tag_name = $post_tag->FirstName. ' '.$post_tag->LastName;
                                                    $PostTagDisplay .= '<button type="button" class="btn green btn-outline sbold btn-xs">'.$post_tag_name.'</button>';
                                                    $pt++;
                                                    //if($PostTag == $pt)
                                                }
                                            }
                                            ?>
                                            <div class="ibox"> 
                                                <!-- <img alt="" class="full-width" src="assets/images/blogs/1.jpg"> -->
                                                <div class="widgets-container padding-top10"> 
                                                    <a class="btn-link" href="#">Suggestion
                                                        <h2 class="hed"> <?php echo $SuggestionSubject; ?> </h2>
                                                    </a>
                                                    <div class="small bottom5"> <strong><?php echo $PostBy; ?></strong> <span class="text-muted right"><i class="fa fa-clock-o"></i> <?php echo $PostOn; ?></span> </div>
                                                    <?php if($SuggestionDescription != '') { ?>
                                                    <p> <?php echo $SuggestionDescription; ?> </p>
                                                    <?php } ?>
                                                    <div class="row">
                                                        <div class="col-md-4">
                                                            <?php if($PostTagDisplay != '') { ?>
                                                            <h5>Tags:</h5>
                                                                <?php echo $PostTagDisplay; ?>
                                                            <?php } ?>
                                                        </div>
                                                        <div class="col-md-8">
                                                            <div class="small text-right">
                                                                <h5>&nbsp;</h5>
                                                                <div> 
                                                                    <i class="fa fa-comments-o"> </i> 80 &nbsp;
                                                                    <i class="fa fa-eye"> </i> 200 views 
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        <?php } ?>

                                        <?php if($result_data->feedtype == 'complaint') { ?>
                                            <?php
                                            $ComplaintSubject      = $result_data->complaintdata->ComplaintSubject;
                                            $ComplaintDescription  = $result_data->complaintdata->ComplaintDescription;
                                            $PostBy                 = $result_data->complaintdata->ComplaintProfile->FirstName. ' '.$result_data->complaintdata->ComplaintProfile->LastName;
                                            $PostOn                 = $result_data->complaintdata->AddedOn;

                                            $ComplaintMember = $result_data->complaintdata->ComplaintMember;

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
                                            ?>
                                            <div class="ibox"> 
                                                <!-- <img alt="" class="full-width" src="assets/images/blogs/1.jpg"> -->
                                                <div class="widgets-container padding-top10"> 
                                                    <a class="btn-link" href="#">Complaint
                                                        <h2 class="hed"> <?php echo $ComplaintSubject; ?> </h2>
                                                    </a>
                                                    <div class="small bottom5"> <strong><?php echo $PostBy; ?></strong> <span class="text-muted right"><i class="fa fa-clock-o"></i> <?php echo $PostOn; ?></span> </div>
                                                    <?php if($ComplaintDescription != '') { ?>
                                                    <p> <?php echo $ComplaintDescription; ?> </p>
                                                    <?php } ?>
                                                    <div class="row">
                                                        <div class="col-md-4">
                                                            <?php if($ComplaintMemberDisplay != '') { ?>
                                                            <h5>Tags:</h5>
                                                                <?php echo $ComplaintMemberDisplay; ?>
                                                            <?php } ?>
                                                        </div>
                                                        <div class="col-md-8">
                                                            <div class="small text-right">
                                                                <h5>&nbsp;</h5>
                                                                <div> 
                                                                    <i class="fa fa-comments-o"> </i> 80 &nbsp;
                                                                    <i class="fa fa-eye"> </i> 200 views 
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        <?php } ?>

                                    </div>
                                    <?php }*/ ?>
                                <div id="demo1" class="ibox-content collapse in">
                                    <div class="widgets-container">
                                        <div>
                                            <div class="feed-activity-list">
                                                <?php foreach($result AS $result_data) { ?>
                                                    <?php if($result_data->feedtype == 'complaint') { ?>
                                                    <?php
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

                                                        <div class="feed-element">
                                                            <a href="#" class="pull-left">
                                                                <img alt="image" class="img-circle" src="<?php echo $PostByProfilePic; ?>">
                                                            </a>
                                                            <div class="media-body "> <small class="pull-right text-navy"><?php echo $PostOn; ?></small>  <strong><?php echo $PostBy; ?></strong> file a complaint
                                                                <br> <small class="text-muted"><?php echo date('h:i a - d.m.Y', strtotime($PostOnTime)); ?></small>

                                                            </div>
                                                            <div class="">
                                                                <div class="photos">
                                                                    <p>Complaint Id: <?php echo $result_data->complaintdata->ComplaintUniqueId; ?></p>
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
                                                                    <a class="btn btn-xs btn-success pull-left"><i class="fa fa-thumbs-up"></i> Like </a>  <a class="btn btn-xs btn-danger"><i class="fa fa-thumbs-down"></i> Unlike</a>
                                                                    <a class="btn btn-xs aqua pull-right"><i class="fa fa-pencil"></i> Comments</a> 
                                                                </div>
                                                            </div>
                                                        </div>

                                                        <!-- <div class="ibox"> 
                                                            <div class="widgets-container padding-top10"> 
                                                                <a class="btn-link" href="#">Post
                                                                    <h2 class="hed"> <?php echo $PostTitle; ?> </h2>
                                                                </a>
                                                                <div class="small bottom5"> <strong><?php echo $PostBy; ?></strong> <span class="text-muted right"><i class="fa fa-clock-o"></i> <?php echo $PostOn; ?></span> </div>
                                                                <?php if($PostDescription != '') { ?>
                                                                <p> <?php echo $PostDescription; ?> </p>
                                                                <?php } ?>
                                                                <div class="row">
                                                                    <div class="col-md-4">
                                                                        <?php if($PostTagDisplay != '') { ?>
                                                                        <h5>Tags:</h5>
                                                                            <?php echo $PostTagDisplay; ?>
                                                                        <?php } ?>
                                                                    </div>
                                                                    <div class="col-md-8">
                                                                        <div class="small text-right">
                                                                            <h5>&nbsp;</h5>
                                                                            <div> 
                                                                                <i class="fa fa-comments-o"> </i> 80 &nbsp;
                                                                                <i class="fa fa-eye"> </i> 200 views 
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div> -->
                                                    <?php } ?>
                                                <?php } ?>
                                                <?php /*
                                                <div class="feed-element">
                                                    <a href="#" class="pull-left">
                                                        <img alt="image" class="img-circle" src="../assets/images/teem/a9.jpg">
                                                    </a>
                                                    <div class="media-body "> <small class="pull-right text-navy">1m ago</small>  <strong>Mitch Buchannon</strong> started following <strong>Olivia Wenscombe</strong>.
                                                        <br> <small class="text-muted">Today 9:00 pm - 11.06.2016</small>
                                                        <div class="actions"> <a class="btn btn-xs btn-white"><i class="fa fa-thumbs-up"></i> Like </a>  <a class="btn btn-xs btn-danger"><i class="fa fa-thumbs-down"></i> Unlike</a> 
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="feed-element">
                                                    <a href="#" class="pull-left">
                                                        <img alt="image" class="img-circle" src="../assets/images/teem/a9.jpg">
                                                    </a>
                                                    <div class="media-body "> <small class="pull-right text-navy">1m ago</small>  <strong>Sunil Vishvakrma</strong> started following <strong>Pushpender</strong>.
                                                        <br> <small class="text-muted">Today 9:00 pm - 11.06.2016</small>

                                                    </div>
                                                    <div class="">
                                                        <div class="photos">
                                                            <img alt="image" class="img-responsive" src="../assets/img/concert-3387324_1920.jpg">
                                                        </div>
                                                        <div class="actions text-center"> 
                                                            <a class="btn btn-xs btn-success pull-left"><i class="fa fa-thumbs-up"></i> Like </a>  <a class="btn btn-xs btn-danger"><i class="fa fa-thumbs-down"></i> Unlike</a>
                                                            <a class="btn btn-xs aqua pull-right"><i class="fa fa-pencil"></i> Comments</a> 
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="feed-element">
                                                    <a href="#" class="pull-left">
                                                        <img alt="image" class="img-circle" src="../assets/images/teem/a3.jpg">
                                                    </a>
                                                    <div class="media-body "> <small class="pull-right">5m ago</small>  <strong>Olivia Wenscombe</strong> posted a new blog.
                                                        <br> <small class="text-muted">Today 5:60 pm - 12.06.2016</small> 
                                                    </div>
                                                </div>
                                                <div class="feed-element">
                                                    <a href="#" class="pull-left">
                                                        <img alt="image" class="img-circle" src="../assets/images/teem/a2.jpg">
                                                    </a>
                                                    <div class="media-body "> <small class="pull-right">2h ago</small>  <strong>Robert Angier</strong> posted message on <strong>Olivia Wenscombe</strong> site.
                                                        <br> <small class="text-muted">Today 2:10 pm - 12.06.2016</small>
                                                        <div class="well">Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s. Over the years, sometimes by accident, sometimes on purpose (injected humour and the like).</div>
                                                        <div class="pull-right"> <a class="btn btn-xs btn-success"><i class="fa fa-thumbs-up"></i> Like </a>  <a class="btn btn-xs btn-white"><i class="fa fa-heart"></i> Love</a>  <a class="btn btn-xs aqua"><i class="fa fa-pencil"></i> Comments</a> 
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="feed-element">
                                                    <a href="#" class="pull-left">
                                                        <img alt="image" class="img-circle" src="../assets/images/teem/a5.jpg">
                                                    </a>
                                                    <div class="media-body "> <small class="pull-right">2h ago</small>  <strong>Ariadne</strong> add 1 photo on <strong>Olivia Wenscombe</strong>.
                                                        <br> <small class="text-muted">2 days ago at 8:30am</small>
                                                        <div class="photos">
                                                            <img alt="image" class="feed-photo" src="../assets/images/profile_big2.jpg">
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="feed-element">
                                                    <a href="#" class="pull-left">
                                                        <img alt="image" class="img-circle" src="../assets/images/teem/a4.jpg">
                                                    </a>
                                                    <div class="media-body "> <small class="pull-right text-navy">5h ago</small>  <strong> Alex Smith </strong> started following <strong>Olivia Wenscombe</strong>.
                                                        <br> <small class="text-muted">Yesterday 1:21 pm - 11.06.2016</small>
                                                        <div class="actions"> <a class="btn btn-xs btn-white"><i class="fa fa-thumbs-up"></i> Like </a>  <a class="btn btn-xs btn-white"><i class="fa fa-heart"></i> Love</a> 
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="feed-element">
                                                    <a href="#" class="pull-left">
                                                        <img alt="image" class="img-circle" src="../assets/images/teem/a10.jpg">
                                                    </a>
                                                    <div class="media-body "> <small class="pull-right">2h ago</small>  <strong>Susan Wenscombe </strong> posted message on <strong>Olivia Wenscombe</strong> site.
                                                        <br> <small class="text-muted">Yesterday 5:20 pm - 12.06.2016</small>
                                                        <div class="well">Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s. Over the years, sometimes by accident, sometimes on purpose (injected humour and the like).</div>
                                                        <div class="pull-right"> <a class="btn btn-xs btn-white"><i class="fa fa-thumbs-up"></i> Like </a> 
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="feed-element">
                                                    <a href="#" class="pull-left">
                                                        <img alt="image" class="img-circle" src="../assets/images/teem/a3.jpg">
                                                    </a>
                                                    <div class="media-body "> <small class="pull-right">23h ago</small>  <strong>Olivia Wenscombe</strong> love <strong>Sophie </strong>.
                                                        <br> <small class="text-muted">2 days ago at 2:30 am - 11.06.2016</small>
                                                        <div class="photos">
                                                            <img alt="image" class="feed-photo" src="../assets/images/profile_big3.jpg">
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="feed-element">
                                                    <a href="#" class="pull-left">
                                                        <img alt="image" class="img-circle" src="../assets/images/teem/a7.jpg">
                                                    </a>
                                                    <div class="media-body "> <small class="pull-right">46h ago</small>  <strong>Mike Loreipsum</strong> started following <strong>Olivia Wenscombe</strong>.
                                                        <br> <small class="text-muted">3 days ago at 7:58 pm - 10.06.2016</small> 
                                                    </div>
                                                </div>
                                                */ ?>
                                            </div>
                                            <button class="btn aqua btn-block "><i class="fa fa-arrow-down"></i> Show More</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-3">
                            <div class="ibox">
                                <div class="widgets-container">
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

                            <div class="ibox">
                                <div class="widgets-container">
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

                        <div class="col-sm-3">
                            <div class="ibox">
                                <div class="widgets-container">
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
                            
                            <div class="ibox">
                                <div class="widgets-container">
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
<!-- </body> -->

</html>
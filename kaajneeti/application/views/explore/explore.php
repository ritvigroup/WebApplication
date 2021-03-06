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
                                                        <img alt="image" class="img-circle" src="<?php echo $this->session->userdata('UserProfilePic'); ?>" style="width: 70px; height: 70px; margin: 0 10px 0 0;">
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
                                                <?php $this->load->view('explore/explorefeed.php'); ?>
                                            </div>
                                            <?php //if(count($result) > 0) { ?>
                                            <button class="btn aqua btn-block show_next_explore" onClick="return showNextExplore();"><i class="fa fa-arrow-down"></i> Show More</button>
                                            <?php //} ?>
                                            <div class="new_loader_div" id="new_loader_div"><img src="<?=base_url();?>assets/images/new-loader.gif"></div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-4" style="padding: 10px 50px; 10px 50px;">
                            
                            <?php
                            // echo '<pre>';
                            // print_r($Connections);
                            // echo '</pre>';

                            if(count($Connections->result) > 0) {
                            ?>

                            <div class="ibox box_desgin_shadow" style="background: #FFFFFF;">
                                <?php 
                                $i = 0;
                                foreach($Connections->result AS $profile_data) {
                                    if($i == 5) { break; }
                                    $users = $profile_data;
                                    $Name = $users->FirstName.' '.$users->LastName;

                                    if($users->ProfilePhotoPath != '') {
                                        $profile_pic = ($users->ProfilePhotoPath != '') ? $users->ProfilePhotoPath : base_url().'assets/images/default-user.png';
                                    } else {
                                        $profile_pic = ($users->ProfilePhotoPath != '') ? $users->ProfilePhotoPath : base_url().'assets/images/default-user.png';
                                    } 
                                    ?>
                                <div class="widgets-container" style="background: #FFFFFF;" id="connection_id_<?php echo $users->UserProfileId; ?>">
                                    <div class="feed-element">
                                        <a href="#" class="pull-left">
                                            <img alt="image" class="img-circle" src="<?php echo $profile_pic; ?>">
                                        </a>
                                        <div class="media-body "> <strong><?php echo $Name; ?> </strong>send Connect Requests to you .
                                            <br> <small class="text-muted"><?php echo $users->RequestSentOn;?></small>
                                            <div class="actions" id="dropdown_and_button_<?php echo $users->UserProfileId; ?>"> 

                                                <a class="btn btn-xs aqua" onClick="return acceptRequest(<?php echo $users->UserProfileId; ?>);"><i class="glyphicon glyphicon-ok"></i> Confirm</a>  
                                                <a class="btn btn-xs btn-danger" onClick="return deleteRequest(<?php echo $users->UserProfileId; ?>);"><i class="glyphicon glyphicon-remove " aria-hidden="true"></i> Delete</a> 
                                            </div>
                                        </div>
                                    </div>
                                    <h3>About <?php echo $Name; ?></h3>
                                    <p class="small"><?php echo $users->UserBio; ?></p>
                                    <!-- <p class="small font-bold"> <span><i class="fa fa-circle text-navy"></i> Online status</span>  -->
                                    </p>
                                </div>
                                <?php $i++; } ?>
                            </div>
                            <?php } ?>

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
<?php require_once './include/connect/connect.php';?>


</html>
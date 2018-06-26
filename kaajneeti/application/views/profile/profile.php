<?php
// echo '<pre>';
// print_r($Profile);
// print_r($HomePageData);
//print_r($Connections);
//print_r($ConnectWithFollowFollwers);
//echo '</pre>';
if($Profile->result->Profile->UserId > 0) {

    // echo '<pre>';
    // print_r($result);
    // echo '</pre>';
    $UserId         = $Profile->result->Profile->UserId;
    $UserProfileId  = $Profile->result->Profile->UserProfileId;
    $UserUniqueId   = $Profile->result->Profile->UserUniqueId;
    $Email      = $Profile->result->Profile->Email;
    $FirstName  = $Profile->result->Profile->FirstName;
    $LastName   = $Profile->result->Profile->LastName;
    $Name       = $FirstName.' '.$LastName;
    $Status     = (($Profile->result->Profile->ProfileStatus == 1) ? 'Active' : 'In-Active');
    $AddedOn    = $Profile->result->Profile->AddedOn;

    $DateOfBirth    = $Profile->result->Profile->DateOfBirth;
    $Gender         = $Profile->result->Profile->Gender;
    $MaritalStatus  = $Profile->result->Profile->MaritalStatus;
    $Mobile         = $Profile->result->Profile->UserProfileLeader->Mobile;

    $Address = '';
    if($Profile->result->Profile->Address != '') {
        $Address .= $Profile->result->Profile->Address.', ';
    }
    if($Profile->result->Profile->City != '') {
        $Address .= $Profile->result->Profile->City.', ';
    }
    if($Profile->result->Profile->State != '') {
        $Address .= $Profile->result->Profile->State.', ';
    }
    if($Profile->result->Profile->ZipCode != '') {
        $Address .= $Profile->result->Profile->ZipCode.', ';
    }
    if($Profile->result->Profile->Country != '') {
        $Address .= $Profile->result->Profile->Country.', ';
    }

    $Address = ($Address != '') ? substr($Address, 0, -2) : '';

    $WebsiteUrl         = $Profile->result->Profile->WebsiteUrl;
    $FacebookPageUrl    = $Profile->result->Profile->FacebookPageUrl;
    $TwitterPageUrl     = $Profile->result->Profile->TwitterPageUrl;
    $GooglePageUrl      = $Profile->result->Profile->GooglePageUrl;

    if($Profile->result->Profile->ProfilePhotoPath != '') {
        $profile_pic = ($Profile->result->Profile->ProfilePhotoPath != '') ? $Profile->result->Profile->ProfilePhotoPath : base_url().'assets/images/default-user.png';
    } else {
        $profile_pic = ($Profile->result->Profile->ProfilePhotoPath != '') ? $Profile->result->Profile->ProfilePhotoPath : base_url().'assets/images/default-user.png';
    }

}
?>

<!DOCTYPE html>
<html lang="en">
<head><title><?php echo $Name; ?></title>
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

        <div class="page-content-wrapper animated fadeInRight">
            <div class="page-content">
                <div class="row  border-bottom aqua-bg-color dashboard-header">
                    <div class="col-md-12">
                        <div class="row">
                            
                            <!-- Headings-->
                            <div class="col-sm-3">
                                <div class="ibox float-e-margins">
                                  <div>
                                    <div class="profile-img-box" style="background: white;"> <img src="<?php echo $profile_pic; ?>" class="full-width" alt="image"> <a href="#" class="pro-like" style="color: black;"> <i class="fa fa-heart-o" aria-hidden="true"></i> <?php echo $Profile->result->Profile->MyTotalConnections; ?></a> </div>
                                    <div class="widgets-container">
                                      <h4><strong><?php echo $Name; ?></strong></h4>
                                      <p><i class="fa fa-map-marker"></i> <?php echo $Address; ?></p>

                                      <div class="profile-edit-about-tabs tabs-container">
                                            <ul class="nav nav-tabs">
                                                <li class="active"><a href="#about-profile" data-toggle="tab"><i class="fa fa-user fa-fw"></i>About</a></li>
                                                <li><a href="#social-profile" data-toggle="tab"><i class="fa fa-user fa-fw"></i>Social Profile</a></li>
                                                <li><a href="#tab-4" data-toggle="tab"><i class="fa fa-ellipsis-h"></i></a></li>
                                                                                                  
                                            </ul>
                                          <div class="tab-content">
                                            <div class="tab-pane active" id="about-profile">
                                                <div class="panel-body"> 
                                                    <ul class="list-unstyled">
                                                        <li><a href="#Overview-about-profile" data-toggle="modal">Overview</a></li>
                                                        <li><a href="#work-and-education-about-profile" data-toggle="modal">Work and Education</a></li>
                                                        <li><a href="#Places-You-Lived-about-profile" data-toggle="modal">Places You've Lived</a></li>
                                                        <li><a href="#Contact-and-Basic-Info-about-profile" data-toggle="modal">Contact and Basic Info</a></li>
                                                        <li><a href="#Family-and-Relationships-about-profile" data-toggle="modal">Family and Relationships</a></li>
                                                        <li><a href="#Details-About-You-about-profile" data-toggle="modal">Details About You</a></li>
                                                        <li><a href="#Life-Events-about-profile" data-toggle="modal">Life Events</a></li>
                                                    </ul>
                                                </div>
                                            </div>
                                            <div class="tab-pane" id="social-profile">
                                                <div class="panel-body"> 
                                                    <ul class="list-unstyled">
                                                        <li><a href="<?php echo $Profile->result->Profile->FacebookPageUrl; ?>" target="_blank">Facebook</a><?php if($Profile->result->Profile->FacebookPageUrl == '') { echo ' <span>Not Added</span>'; }; ?></li>
                                                        <li><a href="<?php echo $Profile->result->Profile->TwitterPageUrl; ?>" target="_blank">Twitter</a><?php if($Profile->result->Profile->TwitterPageUrl == '') { echo ' <span>Not Added</span>'; }; ?></li>
                                                        <li><a href="<?php echo $Profile->result->Profile->GooglePageUrl; ?>" target="_blank">Google</a><?php if($Profile->result->Profile->GooglePageUrl == '') { echo ' <span>Not Added</span>'; }; ?></li>
                                                    </ul>

                                                </div>
                                            </div>
                                            
                                            <div class="tab-pane" id="tab-4">
                                              <div class="panel-body"> 
                                                <p><?php 
                                                    if($Profile->result->Profile->UserBio != '') {
                                                        echo $Profile->result->Profile->UserBio; 
                                                    } else {
                                                        echo 'Please update your bio';
                                                    }
                                                    ?></p>
                                              </div>
                                            </div>
                                          </div>
                                        </div>

                                      
                                      <div class="row m-t-lg"> </div>
                                      
                                    </div>
                                    <div class="widgets-container">
                                      <h3>Followers and friends</h3>
                                      <p class="small"> Your connections and Followers </p>
                                        <div class="user-friends"> 
                                            <?php 
                                            foreach($ConnectWithFollowFollwers->result AS $ConnectWithFollowFollwer) { 
                                                if($ConnectWithFollowFollwer->ProfilePhotoPath != '') {
                                                    $connect_profile_pic = ($ConnectWithFollowFollwer->ProfilePhotoPath != '') ? $ConnectWithFollowFollwer->ProfilePhotoPath : base_url().'assets/images/default-user.png';
                                                } else {
                                                    $connect_profile_pic = ($ConnectWithFollowFollwer->ProfilePhotoPath != '') ? $ConnectWithFollowFollwer->ProfilePhotoPath : base_url().'assets/images/default-user.png';
                                                }
                                                $ConnectWithFollowFollwerName = $ConnectWithFollowFollwer->FirstName.' '.$ConnectWithFollowFollwer->LastName;
                                            ?>
                                            <a href="<?php echo base_url(); ?>profile/profile/<?php echo $ConnectWithFollowFollwer->UserProfileId; ?>" title="<?php echo $ConnectWithFollowFollwerName; ?>"><img src="<?php echo $connect_profile_pic; ?>" class="img-circle" alt="image"></a>  
                                            <?php 
                                            } 
                                            ?>
                                        </div>
                                    </div>
                                  </div>
                                </div>

                                <div class="ibox">
                                  <div class="widgets-container">
                                    <h3>Personal Details </h3>
                                    <table class="table small m-b-xs">
                                      <tbody>
                                        <tr>
                                          <td><strong><?php echo $Profile->result->Profile->MyTotalConnections; ?></strong> Connections </td>
                                          <td><strong><?php echo $Profile->result->Profile->MyTotalFollowers; ?></strong> Followers </td>
                                        </tr>
                                        <tr>
                                          <td><strong><?php echo $Profile->result->Profile->MyTotalFollowings; ?></strong> Followings </td>
                                          <td><strong><?php echo $Profile->result->Profile->MyTotalGroupWithAssociated; ?></strong> Groups </td>
                                        </tr>
                                        
                                      </tbody>
                                    </table>
                                  </div>
                                </div>
                                
                                <div class="ibox"> </div>
                            </div>

                            <div class="col-sm-6">

                                <div class="row">
                                    <div class="col-sm-12">
                                        <a href="javascript:void(0);" data-toggle="modal" class="post-model-box" data-target="#express-popup" onClick="return openExpressPopup();">
                                            &nbsp;
                                        </a>

                                        <div class="ibox post-box">
                                            <div class="feed-list">
                                                <ul>
                                                    <li><a href="javascript:void(0);" data-toggle="modal" data-target="#express-popup" onClick="return openExpressPopup();"><i class="fa fa-edit"></i> Make Post</a></li>
                                                    <li><a href="javascript:void(0);" data-toggle="modal" data-target="#express-popup" onClick="return openExpressPopup();"><i class="fa fa-camera"></i> Photo/Video</a></li>
                                                    <li><a href="javascript:void(0);" data-toggle="modal" data-target="#exampleModalCenter"><i class="fa fa-camera"></i> Live Video</a></li>
                                                    <li><a href="javascript:void(0);" data-toggle="modal" data-target="#express-popup" onClick="return openExpressPopup();"><i class="fa fa-flag"></i> LIfe Event</a></li>
                                                </ul>
                                            </div>

                                            <div class="feed-element post-element"> 
                                                <a href="#" class="pull-left"> 
                                                    <img alt="image" class="img-circle" src="<?php echo $profile_pic; ?>"> 
                                                </a>
                                                <div class="media-body "> 
                                                    <p>
                                                        What's on your mind?
                                                    </p>
                                                    
                                                    <!-- <small class="pull-right text-navy">1m ago</small> 
                                                    <strong>Mitch Buchannon</strong> started following <strong>Olivia Wenscombe</strong>. <br>
                                                    <small class="text-muted">Today 9:00 pm - 11.06.2016</small>
                                                    <div class="actions"> 
                                                        <a class="btn btn-xs btn-white"><i class="fa fa-thumbs-up"></i> Like </a> 
                                                        <a class="btn btn-xs btn-danger"><i class="fa fa-heart"></i> Love</a> </div> -->
                                                </div>
                                                <div class="clearfix"> </div>
                                               
                                                <div class="media-footer">
                                                    <p class="activity-btn">
                                                        <button class="btn btn-default" type="button"><i class="fa fa-camera"></i> Video/Photos</button>
                                                        <button class="btn btn-success" type="button"><i class="fa fa-camera"></i> feeling/Activity</button>
                                                        <button class="btn btn-default" type="button"><i class="fa fa-ellipsis-h"></i></button>
                                                    </p>
                                                    <p class="pull-right media-footer-btn">
                                                        <button class="btn btn-default" type="button"><i class="fa fa-user"></i> Public</button>
                                                        <button class="btn btn-info" type="button"><i class="fa fa-envelope"></i> post</button>
                                                    </p>
                                                    
                                                </div>
                                            </div>
                                        </div> 
                                        <!-- </a> -->
                                                                                   
                                    </div>
                                </div>

                                <div class="tabs-container post-container">
                                    <?php /*
                                    <ul class="nav nav-tabs">
                                        <li class="active"><a href="#tab-1" data-toggle="tab">Post</a></li>
                                        <li><a href="#tab-2" data-toggle="tab">Poll</a></li>
                                        <li><a href="#tab-3" data-toggle="tab">Event</a></li>
                                        <li><a href="#tab-4" data-toggle="tab">Group</a></li>
                                        <li><a href="#tab-5" data-toggle="tab">Complaint</a></li>
                                        <li><a href="#tab-6" data-toggle="tab">Suggestions</a></li>
                                        <li><a href="#tab-6" data-toggle="tab">Find Friend</a></li>
                                        
                                    </ul>
                                    <div class="tab-content">
                                        <div class="tab-pane active" id="tab-1">
                                            <div class="panel-body">                                                

                                            </div>
                                        </div>
                                        <div class="tab-pane" id="tab-2">
                                            <div class="panel-body"> tab-2
                                            </div>
                                        </div>
                                        <div class="tab-pane" id="tab-3">
                                            <div class="panel-body"> tab-3
                                            </div>
                                        </div>
                                        <div class="tab-pane" id="tab-4">
                                            <div class="panel-body"> tab-4
                                            </div>
                                        </div>
                                    </div>
                                    */ ?>
                                    <div class="feed-activity-list">
                                        <?php $this->load->view('explore/explorefeed.php'); ?>
                                    </div>
                                </div>

                                
                            </div>

                            <div class="col-sm-3">
                                
                                <div class="ibox">
                                  <div class="widgets-container">
                                    <h3>Private message</h3>
                                    <p class="small"> Send private message to Olivia Wenscombe </p>
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
    
    <?php  require_once './include/scroll_top.php';?>


    <!-- Profile Edit Page -->
    <div class="modal fade" id="edit-profile" tabindex="-1" role="dialog" aria-labelledby="edit-profile-Label">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title" id="myModalLabel">Edit Profile</h4>
                </div>
                <div class="modal-body">
                    Edit
                </div>
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
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title" id="myModalLabel">Profile Setting</h4>
                </div>
                <div class="modal-body">
                    Setting
                </div>
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
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title" id="myModalLabel">Post</h4>
                </div>
                <div class="modal-body">
                    Post
                </div>
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
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title" id="myModalLabel">Overview-about-profile</h4>
                </div>
                <div class="modal-body">

                    <p><a href="#work-and-education-about-profile" data-toggle="modal">Work and Education</a></p>

                    <p><a href="#Places-You-Lived-about-profile" data-toggle="modal">Places You've Lived</a></p>

                    <p><a href="#Family-and-Relationships-about-profile" data-toggle="modal">Family and Relationships</a></p>

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
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title" id="myModalLabel">work-and-education-about-profile</h4>
                </div>
                <div class="modal-body">
                    <div class="work">
                        <a class="" data-toggle="collapse" href="#work" aria-expanded="false" aria-controls="work"> Work 
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
                                            <label class="col-sm-3 control-label">Time Period <br></label>
                                            <div class="col-md-9">
                                             
                                            <label class="">
                                            <div class="icheckbox_square-blue " style="position: relative;"><input type="checkbox" class="iCheck" style="position: absolute; top: -20%; left: -20%; display: block; width: 140%; height: 140%; margin: 0px; padding: 0px; background: rgb(255, 255, 255); border: 0px; opacity: 0;"><ins class="iCheck-helper" style="position: absolute; top: -20%; left: -20%; display: block; width: 140%; height: 140%; margin: 0px; padding: 0px; background: rgb(255, 255, 255); border: 0px; opacity: 0;"></ins></div>
                                                Checkbox 1 </label>
                                            
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
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title" id="myModalLabel">Places-You've-Lived-about-profile</h4>
                </div>
                <div class="modal-body">
                    Places-You've-Lived-about-profile
                </div>
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
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title" id="myModalLabel">Contact-and-Basic-Info-about-profile</h4>
                </div>
                <div class="modal-body">
                    Contact-and-Basic-Info-about-profile
                </div>
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
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title" id="myModalLabel">Family-and-Relationships-about-profile</h4>
                </div>
                <div class="modal-body">
                    Family-and-Relationships-about-profile
                </div>
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
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title" id="myModalLabel">Details-About-You-about-profile</h4>
                </div>
                <div class="modal-body">
                    Details-About-You-about-profile
                </div>
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
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title" id="myModalLabel">Life-Events-about-profile</h4>
                </div>
                <div class="modal-body">
                    Life-Events-about-profile
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-primary">Save changes</button>
                </div>
            </div>
         </div>
    </div>

</body>

<?php  require_once './include/js.php';?>

<!-- </body> -->
</html>
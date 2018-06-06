<?php
echo '<pre>';
print_r($HomePageData);
print_r($Connections);
echo '</pre>';
if($result->UserId > 0) {

    // echo '<pre>';
    // print_r($result);
    // echo '</pre>';
    $UserId         = $result->UserId;
    $UserProfileId  = $result->UserProfileId;
    $UserUniqueId   = $result->UserUniqueId;
    $Email      = $result->Email;
    $FirstName  = $result->FirstName;
    $LastName   = $result->LastName;
    $Name       = $FirstName.' '.$LastName;
    $Status     = (($result->ProfileStatus == 1) ? 'Active' : 'In-Active');
    $AddedOn    = $result->AddedOn;

    $DateOfBirth    = $result->DateOfBirth;
    $Gender         = $result->Gender;
    $MaritalStatus  = $result->MaritalStatus;
    $Mobile         = $result->UserProfileLeader->Mobile;

    $Address = '';
    if($result->Address != '') {
        $Address .= $result->Address.', ';
    }
    if($result->City != '') {
        $Address .= $result->City.', ';
    }
    if($result->State != '') {
        $Address .= $result->State.', ';
    }
    if($result->ZipCode != '') {
        $Address .= $result->ZipCode.', ';
    }
    if($result->Country != '') {
        $Address .= $result->Country.', ';
    }

    $Address = ($Address != '') ? substr($Address, 0, -2) : '';

    $WebsiteUrl         = $result->WebsiteUrl;
    $FacebookPageUrl    = $result->FacebookPageUrl;
    $TwitterPageUrl     = $result->TwitterPageUrl;
    $GooglePageUrl      = $result->GooglePageUrl;

    if($result->ProfilePhotoPath != '') {
        $profile_pic = ($result->ProfilePhotoPath != '') ? $result->ProfilePhotoPath : base_url().'assets/images/default-user.png';
    } else {
        $profile_pic = ($result->ProfilePhotoPath != '') ? $result->ProfilePhotoPath : base_url().'assets/images/default-user.png';
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
                                    <div class="profile-img-box" style="background: white;"> <img src="<?php echo $profile_pic; ?>" class="full-width" alt="image"> <a href="#" class="pro-like" style="color: black;"> <i class="fa fa-heart-o" aria-hidden="true"></i> 398</a> </div>
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
                                                        <li><a href="<?php echo $result->FacebookPageUrl; ?>" target="_blank">Facebook</a><?php if($result->FacebookPageUrl == '') { echo ' <span>Not Added</span>'; }; ?></li>
                                                        <li><a href="<?php echo $result->TwitterPageUrl; ?>" target="_blank">Twitter</a><?php if($result->TwitterPageUrl == '') { echo ' <span>Not Added</span>'; }; ?></li>
                                                        <li><a href="<?php echo $result->GooglePageUrl; ?>" target="_blank">Google</a><?php if($result->GooglePageUrl == '') { echo ' <span>Not Added</span>'; }; ?></li>
                                                    </ul>

                                                </div>
                                            </div>
                                            
                                            <div class="tab-pane" id="tab-4">
                                              <div class="panel-body"> 
                                                <p><?php 
                                                    if($result->UserBio != '') {
                                                        echo $result->UserBio; 
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
                                      <div class="user-friends"> <a href="#"><img src="../assets/images/teem/a1.jpg" class="img-circle" alt="image"></a> <a href="#"><img src="../assets/images/teem/a2.jpg" class="img-circle" alt="image"></a> <a href="#"><img src="../assets/images/teem/a3.jpg" class="img-circle" alt="image"></a> <a href="#"><img src="../assets/images/teem/a4.jpg" class="img-circle" alt="image"></a> <a href="#"><img src="../assets/images/teem/a5.jpg" class="img-circle" alt="image"></a> <a href="#"><img src="../assets/images/teem/a6.jpg" class="img-circle" alt="image"></a> <a href="#"><img src="../assets/images/teem/a7.jpg" class="img-circle" alt="image"></a> <a href="#"><img src="../assets/images/teem/a8.jpg" class="img-circle" alt="image"></a> <a href="#"><img src="../assets/images/teem/a9.jpg" class="img-circle" alt="image"></a> <a href="#"><img src="../assets/images/teem/a11.jpg" class="img-circle" alt="image"></a> </div>
                                    </div>
                                  </div>
                                </div>

                                <div class="ibox">
                                  <div class="widgets-container">
                                    <h3>Personal Details </h3>
                                    <table class="table small m-b-xs">
                                      <tbody>
                                        <tr>
                                          <td><strong><?php echo $result->MyTotalConnections; ?></strong> Connections </td>
                                          <td><strong><?php echo $result->MyTotalFollowers; ?></strong> Followers </td>
                                        </tr>
                                        <tr>
                                          <td><strong><?php echo $result->MyTotalFollowings; ?></strong> Followings </td>
                                          <td><strong><?php echo $result->MyTotalGroupWithAssociated; ?></strong> Groups </td>
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
                                                    <img alt="image" class="img-circle" src="../assets/images/teem/a9.jpg"> 
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

                                               <div class="ibox float-e-margins">
                                    <!-- <div class="ibox-title">
                                        <h5>Activites</h5>
                                        <div class="ibox-tools"> <a data-target="#demo1"  data-toggle="collapse" class="collapse-link"> <i class="fa fa-chevron-up"></i> <i class="fa fa-chevron-down"></i> </a> <a  class="dropdown-toggle" data-toggle="dropdown" href="#"> <i class="fa fa-wrench"></i> </a>
                                        <ul class="dropdown-menu dropdown-user">
                                            <li><a href="#">Config option 1</a> </li>
                                            <li><a href="#">Config option 2</a> </li>
                                        </ul>
                                        <!-- /dropdown-menu ->
                                        <a class="close-link"> <i class="fa fa-times"></i> </a> </div>
                                          <!-- ibox-tools ->
                                    </div> -->
                                  <!-- / ibox-title -->
                                  <div id="demo1" class="ibox-content collapse in">
                                    <div class="widgets-container">
                                      <div>
                                        <div class="feed-activity-list">
                                          <div class="feed-element"> <a href="#" class="pull-left"> <img alt="image" class="img-circle" src="../assets/images/teem/a9.jpg"> </a>
                                            <div class="media-body "> <small class="pull-right text-navy">1m ago</small> <strong>Mitch Buchannon</strong> started following <strong>Olivia Wenscombe</strong>. <br>
                                              <small class="text-muted">Today 9:00 pm - 11.06.2016</small>
                                              <div class="actions"> <a class="btn btn-xs btn-white"><i class="fa fa-thumbs-up"></i> Like </a> <a class="btn btn-xs btn-danger"><i class="fa fa-heart"></i> Love</a> </div>
                                            </div>
                                          </div>
                                          <div class="feed-element"> <a href="#" class="pull-left"> <img alt="image" class="img-circle" src="../assets/images/teem/a3.jpg"> </a>
                                            <div class="media-body "> <small class="pull-right">5m ago</small> <strong>Olivia Wenscombe</strong> posted a new blog. <br>
                                              <small class="text-muted">Today 5:60 pm - 12.06.2016</small> </div>
                                          </div>
                                          <div class="feed-element"> <a href="#" class="pull-left"> <img alt="image" class="img-circle" src="../assets/images/teem/a2.jpg"> </a>
                                            <div class="media-body "> <small class="pull-right">2h ago</small> <strong>Robert Angier</strong> posted message on <strong>Olivia Wenscombe</strong> site. <br>
                                              <small class="text-muted">Today 2:10 pm - 12.06.2016</small>
                                              <div class="well"> Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s.
                                                Over the years, sometimes by accident, sometimes on purpose (injected humour and the like). </div>
                                              <div class="pull-right"> <a class="btn btn-xs btn-white"><i class="fa fa-thumbs-up"></i> Like </a> <a class="btn btn-xs btn-white"><i class="fa fa-heart"></i> Love</a> <a class="btn btn-xs aqua"><i class="fa fa-pencil"></i> Message</a> </div>
                                            </div>
                                          </div>
                                          <div class="feed-element"> <a href="#" class="pull-left"> <img alt="image" class="img-circle" src="../assets/images/teem/a5.jpg"> </a>
                                            <div class="media-body "> <small class="pull-right">2h ago</small> <strong>Ariadne</strong> add 1 photo on <strong>Olivia Wenscombe</strong>. <br>
                                              <small class="text-muted">2 days ago at 8:30am</small>
                                              <div class="photos"> <img alt="image" class="feed-photo" src="../assets/images/profile_big2.jpg"> </div>
                                            </div>
                                          </div>
                                          <div class="feed-element"> <a href="#" class="pull-left"> <img alt="image" class="img-circle" src="../assets/images/teem/a4.jpg"> </a>
                                            <div class="media-body "> <small class="pull-right text-navy">5h ago</small> <strong> Alex Smith </strong> started following <strong>Olivia Wenscombe</strong>. <br>
                                              <small class="text-muted">Yesterday 1:21 pm - 11.06.2016</small>
                                              <div class="actions"> <a class="btn btn-xs btn-white"><i class="fa fa-thumbs-up"></i> Like </a> <a class="btn btn-xs btn-white"><i class="fa fa-heart"></i> Love</a> </div>
                                            </div>
                                          </div>
                                          <div class="feed-element"> <a href="#" class="pull-left"> <img alt="image" class="img-circle" src="../assets/images/teem/a10.jpg"> </a>
                                            <div class="media-body "> <small class="pull-right">2h ago</small> <strong>Susan Wenscombe </strong> posted message on <strong>Olivia Wenscombe</strong> site. <br>
                                              <small class="text-muted">Yesterday 5:20 pm - 12.06.2016</small>
                                              <div class="well"> Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s.
                                                Over the years, sometimes by accident, sometimes on purpose (injected humour and the like). </div>
                                              <div class="pull-right"> <a class="btn btn-xs btn-white"><i class="fa fa-thumbs-up"></i> Like </a> </div>
                                            </div>
                                          </div>
                                          <div class="feed-element"> <a href="#" class="pull-left"> <img alt="image" class="img-circle" src="../assets/images/teem/a3.jpg"> </a>
                                            <div class="media-body "> <small class="pull-right">23h ago</small> <strong>Olivia Wenscombe</strong> love <strong>Sophie </strong>. <br>
                                              <small class="text-muted">2 days ago at 2:30 am - 11.06.2016</small>
                                              <div class="photos"><img alt="image" class="feed-photo" src="../assets/images/profile_big3.jpg"></div>
                                            </div>
                                          </div>
                                          <div class="feed-element"> <a href="#" class="pull-left"> <img alt="image" class="img-circle" src="../assets/images/teem/a7.jpg"> </a>
                                            <div class="media-body "> <small class="pull-right">46h ago</small> <strong>Mike Loreipsum</strong> started following <strong>Olivia Wenscombe</strong>. <br>
                                              <small class="text-muted">3 days ago at 7:58 pm - 10.06.2016</small> </div>
                                          </div>
                                        </div>
                                        <button class="btn aqua btn-block "><i class="fa fa-arrow-down"></i> Show More</button>
                                      </div>
                                    </div>
                                  </div>
                                </div> 

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
                                </div>

                                
                            </div>

                            <div class="col-sm-3">
                                <div class="ibox">
                                  <div class="widgets-container">
                                    <div class="feed-element"> <a href="#" class="pull-left"> <img alt="image" class="img-circle" src="../assets/images/teem/a3.jpg"> </a>
                                      <div class="media-body "> <strong>Olivia Wenscombe </strong>send Friend Requests to you . <br>
                                        <small class="text-muted">Today 9:00 pm - 11.06.2016</small>
                                        <div class="actions"> <a class="btn btn-xs aqua"><i class="glyphicon glyphicon-ok"></i> Confirm</a> <a class="btn btn-xs btn-danger"><i class="glyphicon glyphicon-remove " aria-hidden="true"></i> Delete</a> </div>
                                      </div>
                                    </div>
                                    <h3>About Olivia Wenscombe</h3>
                                    <p class="small"> There are many variations of passages of Lorem Ipsum available, but the majority have
                                      suffered alteration in some form, by injected humour, or randomised words which don't. <br>
                                      <br>
                                      If you are going to use a passage of Lorem Ipsum, you need to be sure there isn't
                                      anything embarrassing </p>
                                    <p class="small font-bold"> <span><i class="fa fa-circle text-navy"></i> Online status</span> </p>
                                  </div>
                                </div>
                                <!-- <div class="ibox">
                                  <div class="widgets-container">
                                    <h3>Personal Details </h3>
                                    <table class="table small m-b-xs">
                                      <tbody>
                                        <tr>
                                          <td><strong>142</strong> Projects </td>
                                          <td><strong>22</strong> Followers </td>
                                        </tr>
                                        <tr>
                                          <td><strong>61</strong> Comments </td>
                                          <td><strong>54</strong> Articles </td>
                                        </tr>
                                        <tr>
                                          <td><strong>154</strong> Tags </td>
                                          <td><strong>32</strong> Friends </td>
                                        </tr>
                                      </tbody>
                                    </table>
                                  </div>
                                </div> -->
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


                            <?php /* if($UserId > 0) { ?>
                            <div class="col-md-3">
                                
                                <div class="form-group">
                                    <div class="text-center mbl"><img
                                            src="<?php echo $profile_pic; ?>"
                                            style="border: 5px solid #fff; box-shadow: 0 2px 3px rgba(0,0,0,0.25);width: 150px; height: 150px;"
                                            class="img-circle"/></div>
                                </div>
                                <table class="table table-striped table-hover">
                                    <tbody>
                                    <tr>
                                        <td width="50%">Name</td>
                                        <td><?php echo $Name; ?></td>
                                    </tr>
                                    <tr>
                                        <td width="50%">Email</td>
                                        <td><?php echo $Email; ?></td>
                                    </tr>
                                    <tr>
                                        <td width="50%">Address</td>
                                        <td>
                                            <?php echo $Address; ?>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td width="50%">Status</td>
                                        <td><span class="label label-success"><?php echo $Status; ?></span></td>
                                    </tr>
                                    <tr>
                                        <td width="50%">Rating</td>
                                        <td><i class="fa fa-star text-yellow fa-fw"></i><i
                                                class="fa fa-star text-yellow fa-fw"></i><i
                                                class="fa fa-star text-yellow fa-fw"></i><i
                                                class="fa fa-star text-yellow fa-fw"></i><i
                                                class="fa fa-star text-yellow fa-fw"></i></td>
                                    </tr>
                                    <tr>
                                        <td width="50%">Join Since</td>
                                        <td><?php echo $AddedOn; ?></td>
                                    </tr>
                                    </tbody>
                                </table>
                                
                            </div>
                            <div class="col-md-9">
                            </div>
                            <?php } else { ?>
                            <h2 style="text-align: center;">Sorry, This user does not exist</h2>
                            <?php } */ ?>
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
<?php
// echo '<pre>';
// print_r($result);
// echo '</pre>';
$UserDetail = $result;

$UserName   = $UserDetail->UserName;
$Email      = $UserDetail->UserProfileLeader->Email;
$FirstName  = $UserDetail->UserProfileLeader->FirstName;
$LastName   = $UserDetail->UserProfileLeader->LastName;
$Name       = $FirstName.' '.$LastName;
$Status     = (($UserDetail->UserProfileLeader->ProfileStatus == 1) ? 'Active' : 'In-Active');
$AddedOn    = $UserDetail->UserProfileLeader->AddedOn;

$DateOfBirth    = $UserDetail->DateOfBirth;
$Gender         = $UserDetail->Gender;
$MaritalStatus  = $UserDetail->MaritalStatus;
$Mobile         = $UserDetail->UserProfileLeader->Mobile;

$WebsiteUrl         = $UserDetail->UserProfileLeader->WebsiteUrl;
$FacebookPageUrl    = $UserDetail->UserProfileLeader->FacebookPageUrl;
$TwitterPageUrl     = $UserDetail->UserProfileLeader->TwitterPageUrl;
$GooglePageUrl      = $UserDetail->UserProfileLeader->GooglePageUrl;


$profile_pic = ($UserDetail->ProfilePhotoPath != '') ? $UserDetail->ProfilePhotoPath : base_url().'assets/images/default-user.png';
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

 <!-- End page sidebar wrapper -->
  <!-- Start page content wrapper -->
  <div class="page-content-wrapper animated fadeInRight">
    <div class="profile-header">
      <div class="profile-cover">
        <div class="profile-container">
          <div class="profile-card">
            <div class="profile-avetar"> <img class="profile-avetar-img" src="<?=base_url();?>assets/images/teem/a5.jpg" alt="Teddy Wilson" width="128" height="128"> </div>
            <div class="profile-overview">
              <h1 class="profile-name"> Ariadne </h1>
              <a class="aqua btn uppercase" href="#">Follow</a>
              <p>There are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration in some form, by injected humour, or randomised words which don't. If you are going to use a passage of Lorem Ipsum, you need to be sure there isn't anything embarrassing .</p>
            </div>
            <div class="profile-info">
              <ul class="profile-nav">
                <li> <a href="#">
                  <h3 class="profile-nav-heading">2,193</h3>
                  <em> <small>posts</small> </em> </a> </li>
                <li> <a href="#">
                  <h3 class="profile-nav-heading">40M</h3>
                  <em> <small>followers</small> </em> </a> </li>
                <li> <a href="#">
                  <h3 class="profile-nav-heading">300</h3>
                  <em> <small>following</small> </em> </a> </li>
              </ul>
            </div>
          </div>
          <div class="profile-tabs">
            <ul class="profile-nav">
              <li class="active"> <a href="#">Posts</a> </li>
              <li><a href="#">Followers</a></li>
              <li><a href="#">Following</a></li>
            </ul>
          </div>
        </div>
      </div>
    </div>
    <div class="page-content">
      <div class="wrapper-content ">
        <div class="row">
          <!-- start feeds  -->
          <div class="col-sm-4">
            <div class="social-feed-box">
              <div class="pull-right social-action dropdown">
                <button class="dropdown-toggle btn-white" data-toggle="dropdown"> <i class="fa fa-angle-down"></i> </button>
                <ul class="dropdown-menu m-t-xs">
                  <li><a href="#">Mute</a></li>
                  <li><a href="#">Block</a></li>
                  <li><a href="#">Report</a></li>
                </ul>
              </div>
              <div class="social-avatar"> <a class="pull-left" href="#"> <img src="<?=base_url();?>assets/images/teem/a9.jpg" alt="image"> </a>
                <div class="media-body"> <a href="#">Mitch Buchannon </a> <small class="text-muted">Today 9:00 pm - 11.06.20117</small> </div>
              </div>
              <div class="social-body"> <img alt="" class="img-responsive" src="<?=base_url();?>assets/images/gallery/5.jpg">
                <div class="btn-group">
                  <button class="btn btn-white btn-xs"><i class="fa fa-thumbs-up"></i> Like this!</button>
                  <button class="btn btn-white btn-xs"><i class="fa fa-comments"></i> Comment</button>
                  <button class="btn btn-white btn-xs"><i class="fa fa-share"></i> Share</button>
                </div>
              </div>
              <div class="social-footer">
                <div class="social-comment"> <a class="pull-left" href="#"> <img src="<?=base_url();?>assets/images/teem/a1.jpg" alt="image"> </a>
                  <div class="media-body"> <a href="#">Mitch Buchannon </a> Lorem ipsum dolor sit amet, consectetur adipiscing elit. Etiam euismod eleifend ipsum, at posuere augue. Pellentesque mi felis, aliquam at iaculis eu, mi felis, aliquam at iaculis mi felis, aliquam at iaculis finibus eu ex. Integer efficitur tincidunt malesuada. Sed sit amet molestie elit, vel placerat ipsum. <br>
                    <a class="small" href="#"><i class="fa fa-thumbs-up"></i> 26 Like this!</a> - <small class="text-muted">12.06.2014</small> </div>
                </div>
                <div class="social-comment"> <a class="pull-left" href="#"> <img src="<?=base_url();?>assets/images/teem/a2.jpg" alt="image"> </a>
                  <div class="media-body"> <a href="#">Robert Angier </a> Lorem ipsum dolor sit amet, consectetur adipiscing elit. Etiam euismod eleifend ipsum, at posuere augue. <br>
                    <a class="small" href="#"><i class="fa fa-thumbs-up"></i> 11 Like this!</a> - <small class="text-muted">2.01.2017</small> </div>
                </div>
                <div class="social-comment"> <a class="pull-left" href="#"> <img src="<?=base_url();?>assets/images/teem/a1.jpg" alt="image"> </a>
                  <div class="media-body"> <a href="#"> Jordan Belfort </a> Lorem ipsum dolor sit amet, consectetur adipiscing elit. Etiam euismod eleifend ipsum, at posuere augue. <br>
                    <a class="small" href="#"><i class="fa fa-thumbs-up"></i> 11 Like this!</a> - <small class="text-muted">2.01.2017</small> </div>
                </div>
                <div class="social-comment"> <a class="pull-left" href="#"> <img src="<?=base_url();?>assets/images/teem/a10.jpg" alt="image"> </a>
                  <div class="media-body">
                    <textarea placeholder="Write comment..." class="form-control"></textarea>
                  </div>
                </div>
              </div>
            </div>
            <div class="social-feed-box">
              <div class="pull-right social-action dropdown">
                <button class="dropdown-toggle btn-white" data-toggle="dropdown"> <i class="fa fa-angle-down"></i> </button>
                <ul class="dropdown-menu m-t-xs">
                  <li><a href="#">Mute</a></li>
                  <li><a href="#">Block</a></li>
                  <li><a href="#">Report</a></li>
                </ul>
              </div>
              <div class="social-avatar"> <a class="pull-left" href="#"> <img src="<?=base_url();?>assets/images/teem/a10.jpg" alt="image"> </a>
                <div class="media-body"> <a href="#"> Jordan Belfort </a> <small class="text-muted">Today 9:00 pm - 11.06.20117</small> </div>
              </div>
              <div class="social-body">
                <p> Lorem Ipsum as their default model text, and a search for 'lorem ipsum' will uncover many web sites still in their infancy. Packages and web page editors now use Lorem Ipsum as their default model text. </p>
                <img alt="" class="img-responsive" src="<?=base_url();?>assets/images/gallery/2.jpg">
                <div class="btn-group">
                  <button class="btn btn-white btn-xs"><i class="fa fa-thumbs-up"></i> Like this!</button>
                  <button class="btn btn-white btn-xs"><i class="fa fa-comments"></i> Comment</button>
                  <button class="btn btn-white btn-xs"><i class="fa fa-share"></i> Share</button>
                </div>
              </div>
              <div class="social-footer">
                <div class="social-comment"> <a class="pull-left" href="#"> <img src="<?=base_url();?>assets/images/teem/a1.jpg" alt="image"> </a>
                  <div class="media-body"> <a href="#">Mitch Buchannon </a> Lorem ipsum dolor sit amet, consectetur adipiscing elit. Etiam euismod eleifend ipsum, at posuere augue. Pellentesque mi felis, aliquam at iaculis eu, mi felis, aliquam at iaculis mi felis, aliquam at iaculis finibus eu ex. Integer efficitur tincidunt malesuada. Sed sit amet molestie elit, vel placerat ipsum. <br>
                    <a class="small" href="#"><i class="fa fa-thumbs-up"></i> 26 Like this!</a> - <small class="text-muted">12.06.2014</small> </div>
                </div>
                <div class="social-comment"> <a class="pull-left" href="#"> <img src="<?=base_url();?>assets/images/teem/a2.jpg" alt="image"> </a>
                  <div class="media-body"> <a href="#">Robert Angier </a> Lorem ipsum dolor sit amet, consectetur adipiscing elit. Etiam euismod eleifend ipsum, at posuere augue. <br>
                    <a class="small" href="#"><i class="fa fa-thumbs-up"></i> 11 Like this!</a> - <small class="text-muted">2.01.2017</small> </div>
                </div>
                <div class="social-comment"> <a class="pull-left" href="#"> <img src="<?=base_url();?>assets/images/teem/a1.jpg" alt="image"> </a>
                  <div class="media-body"> <a href="#"> Jordan Belfort </a> Lorem ipsum dolor sit amet, consectetur adipiscing elit. Etiam euismod eleifend ipsum, at posuere augue. <br>
                    <a class="small" href="#"><i class="fa fa-thumbs-up"></i> 11 Like this!</a> - <small class="text-muted">2.01.2017</small> </div>
                </div>
                <div class="social-comment"> <a class="pull-left" href="#"> <img src="<?=base_url();?>assets/images/teem/a10.jpg" alt="image"> </a>
                  <div class="media-body">
                    <textarea placeholder="Write comment..." class="form-control"></textarea>
                  </div>
                </div>
              </div>
            </div>
            <div class="social-feed-box">
              <div class="pull-right social-action dropdown">
                <button class="dropdown-toggle btn-white" data-toggle="dropdown"> <i class="fa fa-angle-down"></i> </button>
                <ul class="dropdown-menu m-t-xs">
                  <li><a href="#">Mute</a></li>
                  <li><a href="#">Block</a></li>
                  <li><a href="#">Report</a></li>
                </ul>
              </div>
              <div class="social-avatar"> <a class="pull-left" href="#"> <img src="<?=base_url();?>assets/images/teem/a10.jpg" alt="image"> </a>
                <div class="media-body"> <a href="#"> Jordan Belfort </a> <small class="text-muted">Today 9:00 pm - 11.06.20117</small> </div>
              </div>
              <div class="social-body"> <img alt="" class="img-responsive" src="<?=base_url();?>assets/images/gallery/6.jpg">
                <div class="btn-group">
                  <button class="btn btn-white btn-xs"><i class="fa fa-thumbs-up"></i> Like this!</button>
                  <button class="btn btn-white btn-xs"><i class="fa fa-comments"></i> Comment</button>
                  <button class="btn btn-white btn-xs"><i class="fa fa-share"></i> Share</button>
                </div>
              </div>
              <div class="social-footer">
                <div class="social-comment"> <a class="pull-left" href="#"> <img src="<?=base_url();?>assets/images/teem/a1.jpg" alt="image"> </a>
                  <div class="media-body"> <a href="#">Mitch Buchannon </a> Lorem ipsum dolor sit amet, consectetur adipiscing elit. Etiam euismod eleifend ipsum, at posuere augue. Pellentesque mi felis, aliquam at iaculis eu, mi felis, aliquam at iaculis mi felis, aliquam at iaculis finibus eu ex. Integer efficitur tincidunt malesuada. Sed sit amet molestie elit, vel placerat ipsum. <br>
                    <a class="small" href="#"><i class="fa fa-thumbs-up"></i> 26 Like this!</a> - <small class="text-muted">12.06.2014</small> </div>
                </div>
                <div class="social-comment"> <a class="pull-left" href="#"> <img src="<?=base_url();?>assets/images/teem/a2.jpg" alt="image"> </a>
                  <div class="media-body"> <a href="#">Robert Angier </a> Lorem ipsum dolor sit amet, consectetur adipiscing elit. Etiam euismod eleifend ipsum, at posuere augue. <br>
                    <a class="small" href="#"><i class="fa fa-thumbs-up"></i> 11 Like this!</a> - <small class="text-muted">2.01.2017</small> </div>
                </div>
                <div class="social-comment"> <a class="pull-left" href="#"> <img src="<?=base_url();?>assets/images/teem/a1.jpg" alt="image"> </a>
                  <div class="media-body"> <a href="#"> Jordan Belfort </a> Lorem ipsum dolor sit amet, consectetur adipiscing elit. Etiam euismod eleifend ipsum, at posuere augue. <br>
                    <a class="small" href="#"><i class="fa fa-thumbs-up"></i> 11 Like this!</a> - <small class="text-muted">2.01.2017</small> </div>
                </div>
                <div class="social-comment"> <a class="pull-left" href="#"> <img src="<?=base_url();?>assets/images/teem/a10.jpg" alt="image"> </a>
                  <div class="media-body">
                    <textarea placeholder="Write comment..." class="form-control"></textarea>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <div class="col-sm-4">
            <div class="social-feed-box">
              <div class="pull-right social-action dropdown">
                <button class="dropdown-toggle btn-white" data-toggle="dropdown"> <i class="fa fa-angle-down"></i> </button>
                <ul class="dropdown-menu m-t-xs">
                  <li><a href="#">Mute</a></li>
                  <li><a href="#">Block</a></li>
                  <li><a href="#">Report</a></li>
                </ul>
              </div>
              <div class="social-avatar"> <a class="pull-left" href="#"> <img src="<?=base_url();?>assets/images/teem/a9.jpg" alt="image"> </a>
                <div class="media-body"> <a href="#">Mitch Buchannon </a> <small class="text-muted">Today 9:00 pm - 11.06.20117</small> </div>
              </div>
              <div class="social-body">
                <p> Lorem Ipsum as their default model text, and a search for 'lorem ipsum' will uncover many web sites still in their infancy. Packages and web page editors now use Lorem Ipsum as their default model text. </p>
                <img alt="" class="img-responsive" src="assets/images/gallery/3.jpg">
                <div class="btn-group">
                  <button class="btn btn-white btn-xs"><i class="fa fa-thumbs-up"></i> Like this!</button>
                  <button class="btn btn-white btn-xs"><i class="fa fa-comments"></i> Comment</button>
                  <button class="btn btn-white btn-xs"><i class="fa fa-share"></i> Share</button>
                </div>
              </div>
              <div class="social-footer">
                <div class="social-comment"> <a class="pull-left" href="#"> <img src="<?=base_url();?>assets/images/teem/a1.jpg" alt="image"> </a>
                  <div class="media-body"> <a href="#">Mitch Buchannon </a> Lorem ipsum dolor sit amet, consectetur adipiscing elit. Etiam euismod eleifend ipsum, at posuere augue. Pellentesque mi felis, aliquam at iaculis eu, mi felis, aliquam at iaculis mi felis, aliquam at iaculis finibus eu ex. Integer efficitur tincidunt malesuada. Sed sit amet molestie elit, vel placerat ipsum. <br>
                    <a class="small" href="#"><i class="fa fa-thumbs-up"></i> 26 Like this!</a> - <small class="text-muted">12.06.2014</small> </div>
                </div>
                <div class="social-comment"> <a class="pull-left" href="#"> <img src="<?=base_url();?>assets/images/teem/a2.jpg" alt="image"> </a>
                  <div class="media-body"> <a href="#">Robert Angier </a> Lorem ipsum dolor sit amet, consectetur adipiscing elit. Etiam euismod eleifend ipsum, at posuere augue. <br>
                    <a class="small" href="#"><i class="fa fa-thumbs-up"></i> 11 Like this!</a> - <small class="text-muted">2.01.2017</small> </div>
                </div>
                <div class="social-comment"> <a class="pull-left" href="#"> <img src="<?=base_url();?>assets/images/teem/a1.jpg" alt="image"> </a>
                  <div class="media-body"> <a href="#"> Jordan Belfort </a> Lorem ipsum dolor sit amet, consectetur adipiscing elit. Etiam euismod eleifend ipsum, at posuere augue. <br>
                    <a class="small" href="#"><i class="fa fa-thumbs-up"></i> 11 Like this!</a> - <small class="text-muted">2.01.2017</small> </div>
                </div>
                <div class="social-comment"> <a class="pull-left" href="#"> <img src="<?=base_url();?>assets/images/teem/a10.jpg" alt="image"> </a>
                  <div class="media-body">
                    <textarea placeholder="Write comment..." class="form-control"></textarea>
                  </div>
                </div>
              </div>
            </div>
            <div class="social-feed-box">
              <div class="pull-right social-action dropdown">
                <button class="dropdown-toggle btn-white" data-toggle="dropdown"> <i class="fa fa-angle-down"></i> </button>
                <ul class="dropdown-menu m-t-xs">
                  <li><a href="#">Mute</a></li>
                  <li><a href="#">Block</a></li>
                  <li><a href="#">Report</a></li>
                </ul>
              </div>
              <div class="social-avatar"> <a class="pull-left" href="#"> <img src="<?=base_url();?>assets/images/teem/a10.jpg" alt="image"> </a>
                <div class="media-body"> <a href="#"> Jordan Belfort </a> <small class="text-muted">Today 9:00 pm - 11.06.20117</small> </div>
              </div>
              <div class="social-body"> <img alt="" class="img-responsive" src="assets/images/gallery/9.jpg">
                <div class="btn-group">
                  <button class="btn btn-white btn-xs"><i class="fa fa-thumbs-up"></i> Like this!</button>
                  <button class="btn btn-white btn-xs"><i class="fa fa-comments"></i> Comment</button>
                  <button class="btn btn-white btn-xs"><i class="fa fa-share"></i> Share</button>
                </div>
              </div>
              <div class="social-footer">
                <div class="social-comment"> <a class="pull-left" href="#"> <img src="<?=base_url();?>assets/images/teem/a1.jpg" alt="image"> </a>
                  <div class="media-body"> <a href="#">Mitch Buchannon </a> Lorem ipsum dolor sit amet, consectetur adipiscing elit. Etiam euismod eleifend ipsum, at posuere augue. Pellentesque mi felis, aliquam at iaculis eu, mi felis, aliquam at iaculis mi felis, aliquam at iaculis finibus eu ex. Integer efficitur tincidunt malesuada. Sed sit amet molestie elit, vel placerat ipsum. <br>
                    <a class="small" href="#"><i class="fa fa-thumbs-up"></i> 26 Like this!</a> - <small class="text-muted">12.06.2014</small> </div>
                </div>
                <div class="social-comment"> <a class="pull-left" href="#"> <img src="<?=base_url();?>assets/images/teem/a2.jpg" alt="image"> </a>
                  <div class="media-body"> <a href="#">Robert Angier </a> Lorem ipsum dolor sit amet, consectetur adipiscing elit. Etiam euismod eleifend ipsum, at posuere augue. <br>
                    <a class="small" href="#"><i class="fa fa-thumbs-up"></i> 11 Like this!</a> - <small class="text-muted">2.01.2017</small> </div>
                </div>
                <div class="social-comment"> <a class="pull-left" href="#"> <img src="<?=base_url();?>assets/images/teem/a10.jpg" alt="image"> </a>
                  <div class="media-body">
                    <textarea placeholder="Write comment..." class="form-control"></textarea>
                  </div>
                </div>
              </div>
            </div>
            <div class="social-feed-box">
              <div class="pull-right social-action dropdown">
                <button class="dropdown-toggle btn-white" data-toggle="dropdown"> <i class="fa fa-angle-down"></i> </button>
                <ul class="dropdown-menu m-t-xs">
                  <li><a href="#">Mute</a></li>
                  <li><a href="#">Block</a></li>
                  <li><a href="#">Report</a></li>
                </ul>
              </div>
              <div class="social-avatar"> <a class="pull-left" href="#"> <img src="<?=base_url();?>assets/images/teem/a10.jpg" alt="image"> </a>
                <div class="media-body"> <a href="#"> Jordan Belfort </a> <small class="text-muted">Today 9:00 pm - 11.06.20117</small> </div>
              </div>
              <div class="social-body"> <img alt="" class="img-responsive" src="<?=base_url();?>assets/images/gallery/5.jpg">
                <div class="btn-group">
                  <button class="btn btn-white btn-xs"><i class="fa fa-thumbs-up"></i> Like this!</button>
                  <button class="btn btn-white btn-xs"><i class="fa fa-comments"></i> Comment</button>
                  <button class="btn btn-white btn-xs"><i class="fa fa-share"></i> Share</button>
                </div>
              </div>
              <div class="social-footer">
                <div class="social-comment"> <a class="pull-left" href="#"> <img src="<?=base_url();?>assets/images/teem/a1.jpg" alt="image"> </a>
                  <div class="media-body"> <a href="#">Mitch Buchannon </a> Lorem ipsum dolor sit amet, consectetur adipiscing elit. Etiam euismod eleifend ipsum, at posuere augue. Pellentesque mi felis, aliquam at iaculis eu, mi felis, aliquam at iaculis mi felis, aliquam at iaculis finibus eu ex. Integer efficitur tincidunt malesuada. Sed sit amet molestie elit, vel placerat ipsum. <br>
                    <a class="small" href="#"><i class="fa fa-thumbs-up"></i> 26 Like this!</a> - <small class="text-muted">12.06.2014</small> </div>
                </div>
                <div class="social-comment"> <a class="pull-left" href="#"> <img src="<?=base_url();?>assets/images/teem/a2.jpg" alt="image"> </a>
                  <div class="media-body"> <a href="#">Robert Angier </a> Lorem ipsum dolor sit amet, consectetur adipiscing elit. Etiam euismod eleifend ipsum, at posuere augue. <br>
                    <a class="small" href="#"><i class="fa fa-thumbs-up"></i> 11 Like this!</a> - <small class="text-muted">2.01.2017</small> </div>
                </div>
                <div class="social-comment"> <a class="pull-left" href="#"> <img src="<?=base_url();?>assets/images/teem/a10.jpg" alt="image"> </a>
                  <div class="media-body">
                    <textarea placeholder="Write comment..." class="form-control"></textarea>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <div class="col-sm-4">
            <div class="social-feed-box">
              <div class="pull-right social-action dropdown">
                <button class="dropdown-toggle btn-white" data-toggle="dropdown"> <i class="fa fa-angle-down"></i> </button>
                <ul class="dropdown-menu m-t-xs">
                  <li><a href="#">Mute</a></li>
                  <li><a href="#">Block</a></li>
                  <li><a href="#">Report</a></li>
                </ul>
              </div>
              <div class="social-avatar"> <a class="pull-left" href="#"> <img src="<?=base_url();?>assets/images/teem/a9.jpg" alt="image"> </a>
                <div class="media-body"> <a href="#">Mitch Buchannon </a> <small class="text-muted">Today 9:00 pm - 11.06.20117</small> </div>
              </div>
              <div class="social-body">
                <p> Lorem Ipsum as their default model text, and a search for 'lorem ipsum' will uncover many web sites still in their infancy. Packages and web page editors now use Lorem Ipsum as their default model text. </p>
                <img alt="" class="img-responsive" src="<?=base_url();?>assets/images/gallery/4.jpg">
                <div class="btn-group">
                  <button class="btn btn-white btn-xs"><i class="fa fa-thumbs-up"></i> Like this!</button>
                  <button class="btn btn-white btn-xs"><i class="fa fa-comments"></i> Comment</button>
                  <button class="btn btn-white btn-xs"><i class="fa fa-share"></i> Share</button>
                </div>
              </div>
              <div class="social-footer">
                <div class="social-comment"> <a class="pull-left" href="#"> <img src="<?=base_url();?>assets/images/teem/a1.jpg" alt="image"> </a>
                  <div class="media-body"> <a href="#">Mitch Buchannon </a> Lorem ipsum dolor sit amet, consectetur adipiscing elit. Etiam euismod eleifend ipsum, at posuere augue. Pellentesque mi felis, aliquam at iaculis eu, mi felis, aliquam at iaculis mi felis, aliquam at iaculis finibus eu ex. Integer efficitur tincidunt malesuada. Sed sit amet molestie elit, vel placerat ipsum. <br>
                    <a class="small" href="#"><i class="fa fa-thumbs-up"></i> 26 Like this!</a> - <small class="text-muted">12.06.2014</small> </div>
                </div>
                <div class="social-comment"> <a class="pull-left" href="#"> <img src="<?=base_url();?>assets/images/teem/a2.jpg" alt="image"> </a>
                  <div class="media-body"> <a href="#">Robert Angier </a> Lorem ipsum dolor sit amet, consectetur adipiscing elit. Etiam euismod eleifend ipsum, at posuere augue. <br>
                    <a class="small" href="#"><i class="fa fa-thumbs-up"></i> 11 Like this!</a> - <small class="text-muted">2.01.2017</small> </div>
                </div>
                <div class="social-comment"> <a class="pull-left" href="#"> <img src="<?=base_url();?>assets/images/teem/a1.jpg" alt="image"> </a>
                  <div class="media-body"> <a href="#"> Jordan Belfort </a> Lorem ipsum dolor sit amet, consectetur adipiscing elit. Etiam euismod eleifend ipsum, at posuere augue. <br>
                    <a class="small" href="#"><i class="fa fa-thumbs-up"></i> 11 Like this!</a> - <small class="text-muted">2.01.2017</small> </div>
                </div>
                <div class="social-comment"> <a class="pull-left" href="#"> <img src="<?=base_url();?>assets/images/teem/a10.jpg" alt="image"> </a>
                  <div class="media-body">
                    <textarea placeholder="Write comment..." class="form-control"></textarea>
                  </div>
                </div>
              </div>
            </div>
            <div class="social-feed-box">
              <div class="pull-right social-action dropdown">
                <button class="dropdown-toggle btn-white" data-toggle="dropdown"> <i class="fa fa-angle-down"></i> </button>
                <ul class="dropdown-menu m-t-xs">
                  <li><a href="#">Mute</a></li>
                  <li><a href="#">Block</a></li>
                  <li><a href="#">Report</a></li>
                </ul>
              </div>
              <div class="social-avatar"> <a class="pull-left" href="#"> <img src="<?=base_url();?>assets/images/teem/a10.jpg" alt="image"> </a>
                <div class="media-body"> <a href="#"> Jordan Belfort </a> <small class="text-muted">Today 9:00 pm - 11.06.20117</small> </div>
              </div>
              <div class="social-body"> <img alt="" class="img-responsive" src="<?=base_url();?>assets/images/gallery/8.jpg">
                <div class="btn-group">
                  <button class="btn btn-white btn-xs"><i class="fa fa-thumbs-up"></i> Like this!</button>
                  <button class="btn btn-white btn-xs"><i class="fa fa-comments"></i> Comment</button>
                  <button class="btn btn-white btn-xs"><i class="fa fa-share"></i> Share</button>
                </div>
              </div>
              <div class="social-footer">
                <div class="social-comment"> <a class="pull-left" href="#"> <img src="<?=base_url();?>assets/images/teem/a1.jpg" alt="image"> </a>
                  <div class="media-body"> <a href="#">Mitch Buchannon </a> Lorem ipsum dolor sit amet, consectetur adipiscing elit. Etiam euismod eleifend ipsum, at posuere augue. Pellentesque mi felis, aliquam at iaculis eu, mi felis, aliquam at iaculis mi felis, aliquam at iaculis finibus eu ex. Integer efficitur tincidunt malesuada. Sed sit amet molestie elit, vel placerat ipsum. <br>
                    <a class="small" href="#"><i class="fa fa-thumbs-up"></i> 26 Like this!</a> - <small class="text-muted">12.06.2014</small> </div>
                </div>
                <div class="social-comment"> <a class="pull-left" href="#"> <img src="<?=base_url();?>assets/images/teem/a2.jpg" alt="image"> </a>
                  <div class="media-body"> <a href="#">Robert Angier </a> Lorem ipsum dolor sit amet, consectetur adipiscing elit. Etiam euismod eleifend ipsum, at posuere augue. <br>
                    <a class="small" href="#"><i class="fa fa-thumbs-up"></i> 11 Like this!</a> - <small class="text-muted">2.01.2017</small> </div>
                </div>
                <div class="social-comment"> <a class="pull-left" href="#"> <img src="<?=base_url();?>assets/images/teem/a1.jpg" alt="image"> </a>
                  <div class="media-body"> <a href="#"> Jordan Belfort </a> Lorem ipsum dolor sit amet, consectetur adipiscing elit. Etiam euismod eleifend ipsum, at posuere augue. <br>
                    <a class="small" href="#"><i class="fa fa-thumbs-up"></i> 11 Like this!</a> - <small class="text-muted">2.01.2017</small> </div>
                </div>
                <div class="social-comment"> <a class="pull-left" href="#"> <img src="<?=base_url();?>assets/images/teem/a10.jpg" alt="image"> </a>
                  <div class="media-body">
                    <textarea placeholder="Write comment..." class="form-control"></textarea>
                  </div>
                </div>
              </div>
            </div>
            <div class="social-feed-box">
              <div class="pull-right social-action dropdown">
                <button class="dropdown-toggle btn-white" data-toggle="dropdown"> <i class="fa fa-angle-down"></i> </button>
                <ul class="dropdown-menu m-t-xs">
                  <li><a href="#">Mute</a></li>
                  <li><a href="#">Block</a></li>
                  <li><a href="#">Report</a></li>
                </ul>
              </div>
              <div class="social-avatar"> <a class="pull-left" href="#"> <img src="<?=base_url();?>assets/images/teem/a10.jpg" alt="image"> </a>
                <div class="media-body"> <a href="#"> Jordan Belfort </a> <small class="text-muted">Today 9:00 pm - 11.06.20117</small> </div>
              </div>
              <div class="social-body"> <img alt="" class="img-responsive" src="<?=base_url();?>assets/images/gallery/4.jpg">
                <div class="btn-group">
                  <button class="btn btn-white btn-xs"><i class="fa fa-thumbs-up"></i> Like this!</button>
                  <button class="btn btn-white btn-xs"><i class="fa fa-comments"></i> Comment</button>
                  <button class="btn btn-white btn-xs"><i class="fa fa-share"></i> Share</button>
                </div>
              </div>
              <div class="social-footer">
                <div class="social-comment"> <a class="pull-left" href="#"> <img src="<?=base_url();?>assets/images/teem/a1.jpg" alt="image"> </a>
                  <div class="media-body"> <a href="#">Mitch Buchannon </a> Lorem ipsum dolor sit amet, consectetur adipiscing elit. Etiam euismod eleifend ipsum, at posuere augue. Pellentesque mi felis, aliquam at iaculis eu, mi felis, aliquam at iaculis mi felis, aliquam at iaculis finibus eu ex. Integer efficitur tincidunt malesuada. Sed sit amet molestie elit, vel placerat ipsum. <br>
                    <a class="small" href="#"><i class="fa fa-thumbs-up"></i> 26 Like this!</a> - <small class="text-muted">12.06.2014</small> </div>
                </div>
                <div class="social-comment"> <a class="pull-left" href="#"> <img src="<?=base_url();?>assets/images/teem/a2.jpg" alt="image"> </a>
                  <div class="media-body"> <a href="#">Robert Angier </a> Lorem ipsum dolor sit amet, consectetur adipiscing elit. Etiam euismod eleifend ipsum, at posuere augue. <br>
                    <a class="small" href="#"><i class="fa fa-thumbs-up"></i> 11 Like this!</a> - <small class="text-muted">2.01.2017</small> </div>
                </div>
                <div class="social-comment"> <a class="pull-left" href="#"> <img src="<?=base_url();?>assets/images/teem/a1.jpg" alt="image"> </a>
                  <div class="media-body"> <a href="#"> Jordan Belfort </a> Lorem ipsum dolor sit amet, consectetur adipiscing elit. Etiam euismod eleifend ipsum, at posuere augue. <br>
                    <a class="small" href="#"><i class="fa fa-thumbs-up"></i> 11 Like this!</a> - <small class="text-muted">2.01.2017</small> </div>
                </div>
                <div class="social-comment"> <a class="pull-left" href="#"> <img src="<?=base_url();?>assets/images/teem/a10.jpg" alt="image"> </a>
                  <div class="media-body">
                    <textarea placeholder="Write comment..." class="form-control"></textarea>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <!-- End feeds  -->
        </div>
      </div>
      
<!-- start footer -->
<div class="footer">
        <div class="pull-right">
          <ul class="list-inline">
            <li><a title="" href="index.html">Dashboard</a></li>
            <li><a title="" href="mailbox.html"> Inbox </a></li>
            <li><a title="" href="blog.html">Blog</a></li>
            <li><a title="" href="contacts.html">Contacts</a></li>
          </ul>
        </div>
        <div> <strong>Copyright</strong> AdminBag Company &copy; 2017 </div>
      </div>
    </div>
  </div>
    
    <?php  require_once './include/scroll_top.php';?>

</body>

<?php  require_once './include/js.php';?>


<script>

    function submit_profile_setting() {

        var first_name          = $("#first_name").val();
        var last_name           = $("#last_name").val();
        var gender              = $("input[name='gender']:checked").val();
        var date_of_birth       = $("#date_of_birth").val();
        var martial_status      = $('#martial_status option:selected').val();

        var form_data = new FormData($('input[name^="file"]'));

        var file_selected = 0;
        jQuery.each($('input[name^="file"]')[0].files, function(i, file) {
            form_data.append('file', file);
            file_selected++;
        });

        $('.profile_setting').html('<i class="fa fa-save"></i> Updating');

        if(file_selected > 0) {
            form_data.append('first_name', first_name);
            form_data.append('last_name', last_name);
            form_data.append('fullname', first_name+' '+last_name);
            form_data.append('gender', gender);
            form_data.append('date_of_birth', date_of_birth);
            form_data.append('martial_status', martial_status);


            if (first_name.length > 0) {

                jQuery.ajax({
                    type: 'POST',
                    cache: false,
                    processData: false,
                    contentType: false,
                    data: form_data,
                    url: "<?php echo base_url(); ?>profile/profile",

                    success: function(data) {
                        if (data.status === "failed") {
                            sweetAlert("Oops...", data.message, "error");
                            return false;
                        } else { 
                            if (data.status === "success") {
                                window.location.href="profile";
                            }
                        }
                    }
                });

            } else {
                sweetAlert("Oops...", "Please enter first name", "error");
                return false;
            }
        } else {
            if (first_name.length > 0) {
                $.post("<?php echo base_url(); ?>profile/profile", {
                                                                first_name: first_name, 
                                                                last_name: last_name,
                                                                fullname: first_name+' '+last_name,
                                                                gender: gender,
                                                                date_of_birth: date_of_birth,
                                                                martial_status: martial_status,
                                                                },
                function (data, status) {
                   
                    if (data.status === "failed") {
                        sweetAlert("Oops...", data.message, "error");
                        return false;
                    } else { 
                        if (data.status === "success") {
                            window.location.href="profile";
                        }
                    }
                });
            } else {
                sweetAlert("Oops...", "Please enter first name", "error");
                return false;
            }
        }
    }

    
    function submit_account_setting() {
        var password          = $("#password").val();
        var confirm_password  = $("#confirm_password").val();

        
        if (password.length < 6) {
            sweetAlert("Oops...", "Please enter password atleast 6 character", "error");
            return false;
        } else if (confirm_password.length < 6) {
            sweetAlert("Oops...", "Please enter confirm password atleast 6 character", "error");
            return false;
        } else if (password != confirm_password) {
            sweetAlert("Oops...", "Password and confirm password not matched", "error");
            return false;
        } else {
            $('.account_setting').html('<i class="fa fa-save"></i> Updating');

            $.post("<?php echo base_url(); ?>profile/profile", {
                                                            password: password, 
                                                            confirm_password: confirm_password,
                                                            update_password: 'Y',
                                                            },
            function (data, status) {
               
                if (data.status === "failed") {
                    sweetAlert("Oops...", data.message, "error");
                    return false;
                } else { 
                    if (data.status === "success") {
                        window.location.href="profile";
                    }
                }
            });
        }
    }


    function submit_contact_setting() {
        var website_url     = $("#website_url").val();
        var facebook_url    = $("#facebook_url").val();
        var twitter_url     = $("#twitter_url").val();
        var google_url      = $("#google_url").val();
        
        $('.contact_setting').html('<i class="fa fa-save"></i> Updating');

        $.post("<?php echo base_url(); ?>profile/profile", {
                                                        website_url: website_url, 
                                                        facebook_url: facebook_url,
                                                        twitter_url: twitter_url,
                                                        google_url: google_url,
                                                        update_contact: 'Y',
                                                        },
        function (data, status) {
           
            if (data.status === "failed") {
                sweetAlert("Oops...", data.message, "error");
                return false;
            } else { 
                if (data.status === "success") {
                    window.location.href="profile";
                }
            }
        });
    }

</script> 

</body>
</html>
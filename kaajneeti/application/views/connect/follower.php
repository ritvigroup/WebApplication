<!DOCTYPE html>
<html lang="en">
<head><title>Follower</title>
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
    <div id="connect_myfriends" class="page-container">
        
        <?php  require_once './include/left.php';?>

        <!-- Start page content wrapper -->
        <div class="page-content-wrapper animated fadeInRight">
            <div class="page-content">
                <div class="row  border-bottom white-bg dashboard-header">
                    <div class="col-md-12">
                        <div class="portlet box ">
                            <div class="portlet-header">
                                <ol class="breadcrumb">
                                    <li> <a class="text-capitalize" href="<?=base_url();?>leader/dashboard">Kaajneeti</a> </li>
                                    <li> <a class="text-capitalize" href="<?=base_url(); ?>connect/connect">Connect</a> </li>
                                    <li class="active"><strong><a class="text-capitalize" href="<?=base_url(); ?>connect/follower">Follower</a> </strong> </li>
                                </ol>
                            </div>

                            <div class="portlet-body">
                                <div class="mbm">
                                    
                                    <div class="row head">
                                        <div class="user-heading">
                                            
                                            <div class="col-md-12">
                                                <div class="pull-right"> 
                                                    <?php  require_once './include/connect/connect_top.php';?>

                                                </div>
                                                
                                            </div>
                                       
                                        </div>

                                    </div>
                                    
                                    <div class="clearfix"></div>

                                    <?php
                                    // echo '<pre>';
                                    // print_r($Connections);
                                    // echo '</pre>';
                                    // die;
                                    ?>
                                    
                                    <div class="row margin-left-right-0 connect-menu-contents">

                                        <div class="col-sm-12" style=" margin-top: 5px; ">
                                            <i class="fa fa-th-list fa-2x pull-right" id="list-view-id"></i>
                                            <i class="fa fa-th fa-2x pull-right" id="grid-view-id"></i>
                                        </div>
                                        <div class="connect_list">
                                            <?php 
                                            foreach($Connections->result AS $users) {
                                                $Name = $users->FirstName.' '.$users->LastName;

                                                if($users->ProfilePhotoPath != '') {
                                                    $profile_pic = ($users->ProfilePhotoPath != '') ? $users->ProfilePhotoPath : base_url().'assets/images/default-user.png';
                                                } else {
                                                    $profile_pic = ($users->ProfilePhotoPath != '') ? $users->ProfilePhotoPath : base_url().'assets/images/default-user.png';
                                                } 
                                                ?>
                                                <div class="grid-list-view grid col-md-4 col-sm-6" data-name="<?php echo $Name; ?>" id="connection_id_<?php echo $users->UserProfileId; ?>">
                                                    <div class="contact-box">
                                                        <div class="col-sm-12">
                                                            <?php if($users->UserTypeId == 2) {?><i class="fa fa-certificate" style="position: absolute;top: 5px; left: 20px;"></i><?php } ?>
                                                            <a href="<?=base_url();?>profile/profile"">
                                                                <img src="<?php echo $profile_pic; ?>" class="img-responsive" alt="image">
                                                            </a>
                                                            <h3><strong><?php echo $Name; ?></strong></h3>
                                                            <p><i class="fa fa-star"></i> <?php echo $users->MyTotalConnections; ?> connections</p>
                                                            <div class="connection-features">
                                                                <div class="dropdown">

                                                                    <button class="btn aqua btn-outline btn-sm" id="follow_unfollow_<?php echo $users->UserProfileId; ?>" type="button" onClick="return followUnfollowUserProfile(<?php echo $users->UserProfileId; ?>);"><?php if($users->Following > 0) { ?><i class="fa fa-check"></i> Following<?php } else { ?>Follow<?php }?></button>
                                                                    
                                                                </div>
                                                            </div>    
                                                        </div>
                                                        <div class="clearfix"></div>
                                                    </div>
                                                    <div class="new_loader_div" id="connection_loader_id_<?php echo $users->UserProfileId; ?>"><img src="<?=base_url();?>assets/images/new-loader.gif"></div>
                                                </div>
                                            <?php } ?>
                                        </div>
                                    </div>

                                </div>
                            </div>
                        </div>
                    </div>
            
                </div>
            </div>

        <?php  require_once './include/footer.php';?>
        </div>

        <?php  require_once './include/scroll_top.php';?>

        <!--            Model for Edit Privecy          -->
        <div class="modal fade bs-example-modal-sm" id="express-post" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                  <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title" id="myModalLabel">header</h4>
                  </div>
                  <div class="modal-body">
                    
                    Express
                    
                  </div>
                  <div class="modal-footer">
                    footer                    
                  </div>
                </div>
            </div>
        </div>

        <!--            Model for Edit Privecy          -->
        <div class="modal fade bs-example-modal-sm" id="edit-privecy" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                  <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title" id="myModalLabel">Edit Privacy</h4>
                  </div>
                  <div class="modal-body">
                    <div class="row">
                        <div class="col-sm-8">
                            <h3>Connections List</h3>
                            <h4>Who can see your friends list?</h4>
                            <p>Remember, your friends control who can see their friendships on their own Timelines. If people can see your friendship on another timeline, they'll be able to see it in News Feed, search and other places on Facebook. If you set this to Only me, only you will be able to see your full friends list on your timeline. Other people will see only mutual friends.</p>
                        </div>
                        <div class="col-sm-4 text-right">
                            <div class="dropdown">
                              <a class="btn dropdown-toggle" type="button" id="dropdownMenu1" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">
                                <i class="fa fa-globe"></i> Public <span class="caret"></span>
                              </a>
                              <ul class="dropdown-menu" aria-labelledby="dropdownMenu1">
                                <li><a href="#" data-value="public"><i class="fa fa-globe"></i> Public</a></li>
                                <li><a href="#" data-value="connections"><i class="fa fa-users"></i> Connections</a></li>
                                <li><a href="#" data-value="only me"><i class="fa fa-unlock"></i> Only me</a></li>
                                <li><a href="#" data-value="separated link">Separated link</a></li>
                                <li><a href="#" data-toggle="modal" data-target="#edit-privecy-custom-button"> <i class="fa fa-cog"></i>Custom</a></li>
                              </ul>
                            </div>
                                          
                        </div>
                    </div>
                        <hr />
                    <div class="row">
                        <div class="col-sm-8">
                            <h3>Following</h3>
                            <h4>Who can see the people, Pages and lists you follow?</h4>
                            <p>Remember, the people you follow can see that you're following them.</p>
                        </div>
                        <div class="col-sm-4 text-right">
                             
                            <div class="dropdown">
                              <a class="btn dropdown-toggle" type="button" id="dropdownMenu1" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">
                                <i class="fa fa-globe"></i> Public <span class="caret"></span>
                              </a>
                              <ul class="dropdown-menu" aria-labelledby="dropdownMenu1">
                                <li><a href="#" data-value="public"><i class="fa fa-globe"></i> Public</a></li>
                                <li><a href="#" data-value="connections"><i class="fa fa-users"></i> Connections</a></li>
                                <li><a href="#" data-value="only me"><i class="fa fa-unlock"></i> Only me</a></li>
                                <li><a href="#" data-value="separated link">Separated link</a></li>
                                <li><a href="#" data-toggle="modal" data-target="#edit-privecy-custom-button"> <i class="fa fa-cog"></i>Custom</a></li>
                              </ul>
                            </div>            
                        </div>

                    </div>
                    
                  </div>
                  <div class="modal-footer">
                    <button type="button" class="btn btn-link text-right">Link</button>
                    <button type="button" class="btn btn-default pull-right" data-dismiss="modal">Done</button>
                    
                  </div>
                </div>
            </div>
        </div>

        <!--            Model for Edit Privecy custom Botton          -->
        <div class="modal fade bs-example-modal-sm" id="edit-privecy-custom-button" tabindex="0" role="dialog" aria-labelledby="myModalLabel">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                  <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title" id="myModalLabel">Edit Privacy</h4>
                  </div>
                  <div class="modal-body">
                    <div class="row">
                        <div class="col-sm-12">
                            <h3><i class="fa fa-plus">&nbsp;&nbsp;&nbsp;&nbsp; </i>Share with</h3>
                            <div class="row">
                                <div class="col-sm-4">
                                    <p>These people or lists</p>
                                </div>
                                <div class="col-sm-8">
                                    <div class="form-group">
                                        <input type="email" class="form-control" id="Share-with" placeholder="">
                                    </div>
                                    <p>Anyone tagged will be able to see this post.</p>
                                </div>
                            </div>
                            
                        </div>
                        
                    </div>
                        <hr />
                    <div class="row">
                        <div class="col-sm-12">
                            <h3><i class="fa fa-times-circle">&nbsp;&nbsp;&nbsp;&nbsp; </i>Share with</h3>
                            <div class="row">
                                <div class="col-sm-4">
                                    <p>These people or lists</p>
                                </div>
                                <div class="col-sm-8">
                                    <div class="form-group">
                                        <input type="email" class="form-control" id="Share-with" placeholder="">
                                    </div>
                                    <p>Anyone you include here or have on your restricted list won't be able to see this post unless you tag them. We don't let people know when you choose to not share something with them.</p>
                                </div>
                            </div>
                            
                        </div>

                    </div>
                    
                  </div>
                  <div class="modal-footer">
                    <button type="button" class="btn btn-default text-right">cancle</button>
                    <button type="button" class="btn btn-info pull-right" data-dismiss="modal">Save Change</button>
                    
                  </div>
                </div>
            </div>
        </div>

</body>

<?php  require_once './include/js.php';?>
<?php  require_once './include/connect/connect.php';?>



</html>
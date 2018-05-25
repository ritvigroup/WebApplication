<!DOCTYPE html>
<html lang="en">
<head><title>My Connections</title>
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
                                    <li> <a class="text-capitalize" href="<?=base_url(); ?>connect/myfriends">Connect</a> </li>
                                    <li class="active"><strong><a class="text-capitalize" href="<?=base_url(); ?>connect/groups">Groups</a> </strong> </li>
                                </ol>
                            </div>

                            <div class="portlet-body">
                                <div class="mbm">
                                    <!-- <div class="col-md-12"> -->
                                        <!-- <div class="row"> -->
                                            <!-- <div class="col-md-12"> -->
                                                <div class="row head">
                                                    <div class="user-heading">
                                                        <div class="col-md-6">
                                                            <!-- <i class="fa fa-thumbs-up"></i>  -->
                                                            <span class="user-frnd text-uppercase">
                                                                Groups
                                                            </span>
                                                        </div>
                                                        <div class="col-md-6 ">
                                                            <div class="pull-right"> 
                                                                <!-- <div class="btn-group" role="group" > -->
                                                                    <!-- <div class="btn-group" role="group"> -->
                                                                         <button type="button" class="btn aqua btn-outline btn-sm text-capitalize"><i class="fa fa-plus"></i> Find Connections</button>

                                                                        <button type="button" class="btn aqua btn-outline btn-sm text-capitalize">follower
                                                                        <span class="badge">4</span></button>
                                                                        <!-- <i class="fa fa-"></i> -->
                                                                    <!-- </div> -->
                                                                    <!-- <div class="btn-group" role="group"> -->
                                                                        <button type="button" class="btn aqua btn-outline btn-sm text-capitalize">
                                                                         Following <span class="badge">4</span></button>
                                                                    <!-- </div> -->
                                                                      
                                                                <!-- </div > -->

                                                                <div class="dropdown pull-right"style=" margin-left: 4px; ">
                                                                    <button class="btn aqua btn-outline btn-sm dropdown-toggle" type="button" id="dropdownMenu1" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">
                                                                    <i class="fa fa-ellipsis-h"></i>
                                                                    
                                                                    </button>
                                                                    <ul class="dropdown-menu" aria-labelledby="dropdownMenu1">
                                                                        <li><a href="#">txt</a></li>
                                                                        <li><a href="#">txt</a></li>
                                                                        <li><a href="#">txt</a></li>
                                                                        <li><a href="#">txt</a></li>
                                                                        <li>
                                                                            <a href="#edit-privecy" data-toggle="modal">
                                                                            Edit Privecy
                                                                            </a>
                                                                        <!-- Button trigger modal -->
                                                                        <!-- <button type="button" class="btn btn-primary btn-lg" data-toggle="modal" data-target="#myModal">
                                                                        Edit Privecy
                                                                        </button> -->
                                                                        </li>
                                                                    </ul>
                                                                </div>
                                                            </div>
                                                            
                                                        </div>
                                                   
                                                    </div><!--user headig-->

                                                    <div class="connect-menu">
                                                        <div class="col-md-12">
                                                            <div class="connections-tabs">
                                                                <ul class="connect-tab-menu">
                                                                    <li><a href="<?=base_url();?>connect/myfriends">all connections</a></li>
                                                                    <li><a href="<?=base_url();?>connect/requestsent">requests</a></li>
                                                                    <li class="active"><a href="<?=base_url();?>connect/groups">groups</a></li>
                                                                </ul>
                                                            </div><!--Tabs-->
                                                        </div>

                                                        <!-- <div class="col-md-3" style=" margin-top: 6px; ">
                                                            
                                                            <div class="input-group">
                                                              <input type="text" class="form-control" placeholder="Search for...">
                                                              <span class="input-group-btn">
                                                                <button class="btn btn-default" type="button">Go!</button>
                                                              </span>
                                                            </div>
                                                        </div> -->

                                                    </div>
                                                </div>
                                                
                                                <div class="clearfix"></div>
                                                
                                                <div class="row margin-left-right-0 connect-menu-contents">

                                                    <!-- Nav tabs -->
                                                    <ul class="margin-left-right-0 nav nav-tabs" role="tablist">
                                                        <li role="presentation" class="active"><a href="#my-groups" aria-controls="home" role="tab" data-toggle="tab">My groups <span class="badge">4</span></a></li>

                                                        <li role="presentation"><a href="#Suggested-groups" aria-controls="home" role="tab" data-toggle="tab">Suggested groups <span class="badge">4</span></a></li>

                                                        <li><button class="btn btn-success" type="button" data-target="#create-group" data-toggle="modal"onClick="return newGroup();"><i class="fa fa-plus"></i> Create Gruop</button></li>

                                                        <!-- <li role="presentation"><a href="#all-connections" aria-controls="home" role="tab" data-toggle="tab">Citizen <span class="badge">4</span></a></li> -->

                                                        <li class="connetions-search col-sm-3 pull-right">
                                                            <div class="row input-group">
                                                              <input type="text" class="form-control" placeholder="Search for...">
                                                              <span class="input-group-btn">
                                                                <button class="btn btn-default" type="button">Go!</button>
                                                              </span>
                                                            </div>
                                                        </li>
                                                        
                                                    </ul>

                                                    <!-- Tab panes -->
                                                    <div class="margin-left-right-0 tab-content">
                                                        
                                                        <!--               All Friends           -->
                                                        <div role="tabpanel" class="tab-pane active" id="my-groups">
                                                            <!-- <div class="row ">Both keys Grid & List view  -->
                                                                <div class="col-sm-12" style=" margin-top: 5px; ">
                                                                    <i class="fa fa-th-list fa-2x pull-right" id="list-view-id"></i>
                                                                    <i class="fa fa-th fa-2x pull-right" id="grid-view-id"></i>
                                                                </div>
                                                            <!-- </div> -->
                                                            <div class="connect_list">
                                                                <div class="grid-list-view grid col-md-4 col-sm-6">
                                                                    <div class="contact-box">
                                                                        <div class="col-sm-12">
                                                                            <a href="<?=base_url();?>profile/profile"">
                                                                                <img src="../assets/images/teem/a1.jpg" class="img-responsive" alt="image">
                                                                            </a>
                                                                            
                                                                            <h3><strong>My group</strong></h3>
                                                                            <p><a href="#"><i class="fa fa-star"></i> 10Unread post</a></p>
                                                                            <div class="connection-features">
                                                                                <div class="dropdown">
                                                                                    <button class="btn aqua btn-outline btn-sm dropdown-toggle" type="button" id="connection-featuresMenu" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                                                    <i class="fa fa-plus"></i>
                                                                                        
                                                                                    </button>
                                                                                     <ul class="dropdown-menu dropdown-menu-left" aria-labelledby="connection-featuresMenu">
                                                                                        <li><a href="#">Edit Notification Settings</a></li>
                                                                                        <li><a href="#">Leave Group</a></li>
                                                                                        <li><a href="#">Pin to Shortcuts</a></li>
                                                                                    </ul>
                                                                                </div>
                                                                            </div>    
                                                                        </div>
                                                                        <div class="clearfix"></div>
                                                                        
                                                                    </div>
                                                                </div>
                                                                <div class="grid-list-view grid col-md-4 col-sm-6">
                                                                    <div class="contact-box">
                                                                        <div class="col-sm-12">
                                                                            <a href="<?=base_url();?>profile/profile"">
                                                                                <img src="../assets/images/teem/a1.jpg" class="img-responsive" alt="image">
                                                                            </a>
                                                                            <h3><strong>My group</strong></h3>
                                                                            <p><a href="#"><i class="fa fa-star"></i> 10Unread post</a></p>
                                                                            <div class="connection-features">
                                                                                <div class="dropdown">
                                                                                    <button class="btn aqua btn-outline btn-sm dropdown-toggle" type="button" id="connection-featuresMenu" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                                                    <i class="fa fa-plus"></i>
                                                                                        
                                                                                    </button>
                                                                                     <ul class="dropdown-menu dropdown-menu-left" aria-labelledby="connection-featuresMenu">
                                                                                        <li><a href="#">Edit Notification Settings</a></li>
                                                                                        <li><a href="#">Leave Group</a></li>
                                                                                        <li><a href="#">Pin to Shortcuts</a></li>
                                                                                    </ul>
                                                                                </div>
                                                                            </div>    
                                                                        </div>
                                                                        <div class="clearfix"></div>
                                                                        
                                                                    </div>
                                                                </div>
                                                                <div class="grid-list-view grid col-md-4 col-sm-6">
                                                                    <div class="contact-box">
                                                                        <div class="col-sm-12">
                                                                            <a href="<?=base_url();?>profile/profile"">
                                                                                <img src="../assets/images/teem/a1.jpg" class="img-responsive" alt="image">
                                                                            </a>
                                                                            <h3><strong>My group</strong></h3>
                                                                            <p><a href="#"><i class="fa fa-star"></i> 10Unread post</a></p>
                                                                            <div class="connection-features">
                                                                                <div class="dropdown">
                                                                                    <button class="btn aqua btn-outline btn-sm dropdown-toggle" type="button" id="connection-featuresMenu" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                                                    <i class="fa fa-plus"></i>
                                                                                        
                                                                                    </button>
                                                                                     <ul class="dropdown-menu dropdown-menu-left" aria-labelledby="connection-featuresMenu">
                                                                                        <li><a href="#">Edit Notification Settings</a></li>
                                                                                        <li><a href="#">Leave Group</a></li>
                                                                                        <li><a href="#">Pin to Shortcuts</a></li>
                                                                                    </ul>
                                                                                </div>
                                                                            </div>    
                                                                        </div>
                                                                        <div class="clearfix"></div>
                                                                        
                                                                    </div>
                                                                </div>
                                                                <div class="grid-list-view grid col-md-4 col-sm-6">
                                                                    <div class="contact-box">
                                                                        <div class="col-sm-12">
                                                                            <a href="<?=base_url();?>profile/profile"">
                                                                                <img src="../assets/images/teem/a1.jpg" class="img-responsive" alt="image">
                                                                            </a>
                                                                            <h3><strong>My group</strong></h3>
                                                                            <p><a href="#"><i class="fa fa-star"></i> 10Unread post</a></p>
                                                                            <div class="connection-features">
                                                                                <div class="dropdown">
                                                                                    <button class="btn aqua btn-outline btn-sm dropdown-toggle" type="button" id="connection-featuresMenu" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                                                    <i class="fa fa-plus"></i>
                                                                                        
                                                                                    </button>
                                                                                     <ul class="dropdown-menu dropdown-menu-left" aria-labelledby="connection-featuresMenu">
                                                                                        <li><a href="#">Edit Notification Settings</a></li>
                                                                                        <li><a href="#">Leave Group</a></li>
                                                                                        <li><a href="#">Pin to Shortcuts</a></li>
                                                                                    </ul>
                                                                                </div>
                                                                            </div>    
                                                                        </div>
                                                                        <div class="clearfix"></div>
                                                                        
                                                                    </div>
                                                                </div>
                                                                <div class="grid-list-view grid col-md-4 col-sm-6">
                                                                    <div class="contact-box">
                                                                        <div class="col-sm-12">
                                                                            <a href="<?=base_url();?>profile/profile"">
                                                                                <img src="../assets/images/teem/a1.jpg" class="img-responsive" alt="image">
                                                                            </a>
                                                                            <h3><strong>My group</strong></h3>
                                                                            <p><a href="#"><i class="fa fa-star"></i> 10Unread post</a></p>
                                                                            <div class="connection-features">
                                                                                <div class="dropdown">
                                                                                    <button class="btn aqua btn-outline btn-sm dropdown-toggle" type="button" id="connection-featuresMenu" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                                                    <i class="fa fa-plus"></i>
                                                                                        
                                                                                    </button>
                                                                                     <ul class="dropdown-menu dropdown-menu-left" aria-labelledby="connection-featuresMenu">
                                                                                        <li><a href="#">Edit Notification Settings</a></li>
                                                                                        <li><a href="#">Leave Group</a></li>
                                                                                        <li><a href="#">Pin to Shortcuts</a></li>
                                                                                    </ul>
                                                                                </div>
                                                                            </div>    
                                                                        </div>
                                                                        <div class="clearfix"></div>
                                                                        
                                                                    </div>
                                                                </div>
                                                                <div class="grid-list-view grid col-md-4 col-sm-6">
                                                                    <div class="contact-box">
                                                                        <div class="col-sm-12">
                                                                            <a href="<?=base_url();?>profile/profile"">
                                                                                <img src="../assets/images/teem/a1.jpg" class="img-responsive" alt="image">
                                                                            </a>
                                                                            <h3><strong>My group</strong></h3>
                                                                            <p><a href="#"><i class="fa fa-star"></i> 10Unread post</a></p>
                                                                            <div class="connection-features">
                                                                                <div class="dropdown">
                                                                                    <button class="btn aqua btn-outline btn-sm dropdown-toggle" type="button" id="connection-featuresMenu" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                                                    <i class="fa fa-plus"></i>
                                                                                        
                                                                                    </button>
                                                                                     <ul class="dropdown-menu dropdown-menu-left" aria-labelledby="connection-featuresMenu">
                                                                                        <li><a href="#">Edit Notification Settings</a></li>
                                                                                        <li><a href="#">Leave Group</a></li>
                                                                                        <li><a href="#">Pin to Shortcuts</a></li>
                                                                                    </ul>
                                                                                </div>
                                                                            </div>    
                                                                        </div>
                                                                        <div class="clearfix"></div>
                                                                        
                                                                    </div>
                                                                </div>
                                                            </div>
                                                              
                                                        </div>

                                                        <!--              Group Leader           -->
                                                        <div role="tabpanel" class="tab-pane" id="Suggested-groups">
                                                            <!-- <div class="row ">Both keys Grid & List view  -->
                                                                <div class="col-sm-12" style=" margin-top: 5px; ">
                                                                    <i class="fa fa-th-list fa-2x pull-right" id="list-view-id"></i>
                                                                    <i class="fa fa-th fa-2x pull-right" id="grid-view-id"></i>
                                                                </div>
                                                            <!-- </div> -->
                                                            <div class="connect_list">
                                                                <div class="grid-list-view grid col-md-4 col-sm-6">
                                                                    <div class="contact-box">
                                                                        <div class="col-sm-12">
                                                                            <a href="<?=base_url();?>profile/profile"">
                                                                                <img src="../assets/images/teem/a1.jpg" class="img-responsive" alt="image">
                                                                            </a>
                                                                            
                                                                            <h3><strong>Suggested group</strong></h3>
                                                                            <p><a href="#"><i class="fa fa-star"></i> 10Unread post</a></p>
                                                                             <div>
                                                                                <button class="btn blue" type="button">Join</button>
                                                                                <button class="btn btn-warning" type="button">Delete</button>
                                                                            </div>
                                                                            <!-- <div class="connection-features">
                                                                                <div class="dropdown">
                                                                                    <button class="btn aqua btn-outline btn-sm dropdown-toggle" type="button" id="connection-featuresMenu" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                                                    <i class="fa fa-plus"></i>
                                                                                        
                                                                                    </button>
                                                                                     <ul class="dropdown-menu dropdown-menu-left" aria-labelledby="connection-featuresMenu">
                                                                                        <li><a href="#">Edit Notification Settings</a></li>
                                                                                        <li><a href="#">Leave Group</a></li>
                                                                                        <li><a href="#">Pin to Shortcuts</a></li>
                                                                                    </ul>
                                                                                </div>
                                                                            </div> -->    
                                                                        </div>
                                                                        <div class="clearfix"></div>
                                                                        
                                                                    </div>
                                                                </div>
                                                                <div class="grid-list-view grid col-md-4 col-sm-6">
                                                                    <div class="contact-box">
                                                                        <div class="col-sm-12">
                                                                            <a href="<?=base_url();?>profile/profile"">
                                                                                <img src="../assets/images/teem/a1.jpg" class="img-responsive" alt="image">
                                                                            </a>
                                                                            <h3><strong>Suggested group</strong></h3>
                                                                            <p><a href="#"><i class="fa fa-star"></i> 10Unread post</a></p>
                                                                             <div>
                                                                                <button class="btn blue" type="button">Join</button>
                                                                                <button class="btn btn-warning" type="button">Delete</button>
                                                                            </div>
                                                                            <!-- <div class="connection-features">
                                                                                <div class="dropdown">
                                                                                    <button class="btn aqua btn-outline btn-sm dropdown-toggle" type="button" id="connection-featuresMenu" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                                                    <i class="fa fa-plus"></i>
                                                                                        
                                                                                    </button>
                                                                                     <ul class="dropdown-menu dropdown-menu-left" aria-labelledby="connection-featuresMenu">
                                                                                        <li><a href="#">Edit Notification Settings</a></li>
                                                                                        <li><a href="#">Leave Group</a></li>
                                                                                        <li><a href="#">Pin to Shortcuts</a></li>
                                                                                    </ul>
                                                                                </div>
                                                                            </div>  -->   
                                                                        </div>
                                                                        <div class="clearfix"></div>
                                                                        
                                                                    </div>
                                                                </div>
                                                                <div class="grid-list-view grid col-md-4 col-sm-6">
                                                                    <div class="contact-box">
                                                                        <div class="col-sm-12">
                                                                            <a href="<?=base_url();?>profile/profile"">
                                                                                <img src="../assets/images/teem/a1.jpg" class="img-responsive" alt="image">
                                                                            </a>
                                                                            <h3><strong>Suggested group</strong></h3>
                                                                            <p><a href="#"><i class="fa fa-star"></i> 10Unread post</a></p>
                                                                            <div>
                                                                                <button class="btn blue" type="button">Join</button>
                                                                                <button class="btn btn-warning" type="button">Delete</button>
                                                                            </div>

                                                                            <!-- <div class="connection-features">
                                                                                <div class="dropdown">
                                                                                    <button class="btn aqua btn-outline btn-sm dropdown-toggle" type="button" id="connection-featuresMenu" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                                                    <i class="fa fa-plus"></i>
                                                                                        
                                                                                    </button>
                                                                                     <ul class="dropdown-menu dropdown-menu-left" aria-labelledby="connection-featuresMenu">
                                                                                        <li><a href="#">Edit Notification Settings</a></li>
                                                                                        <li><a href="#">Leave Group</a></li>
                                                                                        <li><a href="#">Pin to Shortcuts</a></li>
                                                                                    </ul>
                                                                                </div>
                                                                            </div> -->    
                                                                        </div>
                                                                        <div class="clearfix"></div>
                                                                        
                                                                    </div>
                                                                </div>
                                                                <div class="grid-list-view grid col-md-4 col-sm-6">
                                                                    <div class="contact-box">
                                                                        <div class="col-sm-12">
                                                                            <a href="<?=base_url();?>profile/profile"">
                                                                                <img src="../assets/images/teem/a1.jpg" class="img-responsive" alt="image">
                                                                            </a>
                                                                            <h3><strong>Suggested group</strong></h3>
                                                                            <p><a href="#"><i class="fa fa-star"></i> 10Unread post</a></p>
                                                                             <div>
                                                                                <button class="btn blue" type="button">Join</button>
                                                                                <button class="btn btn-warning" type="button">Delete</button>
                                                                            </div>
                                                                            <!-- <div class="connection-features">
                                                                                <div class="dropdown">
                                                                                    <button class="btn aqua btn-outline btn-sm dropdown-toggle" type="button" id="connection-featuresMenu" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                                                    <i class="fa fa-plus"></i>
                                                                                        
                                                                                    </button>
                                                                                     <ul class="dropdown-menu dropdown-menu-left" aria-labelledby="connection-featuresMenu">
                                                                                        <li><a href="#">Edit Notification Settings</a></li>
                                                                                        <li><a href="#">Leave Group</a></li>
                                                                                        <li><a href="#">Pin to Shortcuts</a></li>
                                                                                    </ul>
                                                                                </div>
                                                                            </div>  -->   
                                                                        </div>
                                                                        <div class="clearfix"></div>
                                                                        
                                                                    </div>
                                                                </div>
                                                                <div class="grid-list-view grid col-md-4 col-sm-6">
                                                                    <div class="contact-box">
                                                                        <div class="col-sm-12">
                                                                            <a href="<?=base_url();?>profile/profile"">
                                                                                <img src="../assets/images/teem/a1.jpg" class="img-responsive" alt="image">
                                                                            </a>
                                                                            <h3><strong>Suggested group</strong></h3>
                                                                            <p><a href="#"><i class="fa fa-star"></i> 10Unread post</a></p>
                                                                             <div>
                                                                                <button class="btn blue" type="button">Join</button>
                                                                                <button class="btn btn-warning" type="button">Delete</button>
                                                                            </div>
                                                                            <!-- <div class="connection-features">
                                                                                <div class="dropdown">
                                                                                    <button class="btn aqua btn-outline btn-sm dropdown-toggle" type="button" id="connection-featuresMenu" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                                                    <i class="fa fa-plus"></i>
                                                                                        
                                                                                    </button>
                                                                                     <ul class="dropdown-menu dropdown-menu-left" aria-labelledby="connection-featuresMenu">
                                                                                        <li><a href="#">Edit Notification Settings</a></li>
                                                                                        <li><a href="#">Leave Group</a></li>
                                                                                        <li><a href="#">Pin to Shortcuts</a></li>
                                                                                    </ul>
                                                                                </div>
                                                                            </div>   -->  
                                                                        </div>
                                                                        <div class="clearfix"></div>
                                                                        
                                                                    </div>
                                                                </div>
                                                                <div class="grid-list-view grid col-md-4 col-sm-6">
                                                                    <div class="contact-box">
                                                                        <div class="col-sm-12">
                                                                            <a href="<?=base_url();?>profile/profile"">
                                                                                <img src="../assets/images/teem/a1.jpg" class="img-responsive" alt="image">
                                                                            </a>
                                                                            <h3><strong>Suggested group</strong></h3>
                                                                            <p><a href="#"><i class="fa fa-star"></i> 10Unread post</a></p>
                                                                             <div>
                                                                                <button class="btn blue" type="button">Join</button>
                                                                                <button class="btn btn-warning" type="button">Delete</button>
                                                                            </div>
                                                                            <!-- <div class="connection-features">
                                                                                <div class="dropdown">
                                                                                    <button class="btn aqua btn-outline btn-sm dropdown-toggle" type="button" id="connection-featuresMenu" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                                                    <i class="fa fa-plus"></i>
                                                                                        
                                                                                    </button>
                                                                                     <ul class="dropdown-menu dropdown-menu-left" aria-labelledby="connection-featuresMenu">
                                                                                        <li><a href="#">Edit Notification Settings</a></li>
                                                                                        <li><a href="#">Leave Group</a></li>
                                                                                        <li><a href="#">Pin to Shortcuts</a></li>
                                                                                    </ul>
                                                                                </div>
                                                                            </div>  -->   
                                                                        </div>
                                                                        <div class="clearfix"></div>
                                                                        
                                                                    </div>
                                                                </div>
                                                            </div>
                                                              
                                                        </div>
                                                                                                              
                                                    </div>
                                                </div>
                                            <!-- </div> -->
                                        <!-- </div> -->
                                    <!-- </div>        -->
                                </div>
                            </div>
                        </div>
                    </div>
            
                    <!-- stat timeline and feed  -->
                    <div class="top20">
                        
                        <div class="clearfix"> </div>
                        <!-- End projects list -->
                        
                        <!-- <?php  //require_once './include/footer.php';?> -->

                    </div>
                </div>
            </div>

        <?php  require_once './include/footer.php';?>
        </div>

        <?php  require_once './include/scroll_top.php';?>


        <div id="create-group" tabindex="-1" role="dialog" aria-labelledby="modal-stackable-label" aria-hidden="true" class="modal fade" style="display: none;">
            <div class="modal-dialog">
                <div class="modal-content modal-content-ajax">
                    
                </div>
            </div>
        </div>

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

        <!-- Modal -->
        <div class="modal fade" id="create-groupold" tabindex="-1" role="dialog" aria-labelledby="create-group-ex">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                  <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title" id="myModalLabel">create group</h4>
                  </div>
                  <div class="modal-body modal-content-ajax">
                    
                    <div class="tabs-container">
                        <ul class="nav nav-tabs">
                            <li class="active"><a href="#tab-1" data-toggle="tab">Leader</a></li>
                            <li><a href="#tab-2" data-toggle="tab">Citizen</a></li>
                            
                        </ul>
                        <div class="tab-content">
                            <div class="tab-pane active" id="tab-1">
                              <div class="panel-body"> <strong>Lorem ipsum dolor sit amet</strong>
                                <p> Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap. </p>
                                <p> Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore veritatis et quasi architecto beatae vitae dicta sunt explicabo. Nemo enim ipsam voluptatem quia voluptas sit aspernatur aut odit aut fugit, </p>
                              </div>
                            </div>
                            <div class="tab-pane" id="tab-2">
                              <div class="panel-body"> <strong>Lorem ipsum dolor sit amet</strong>
                                <p>Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore veritatis et quasi architecto beatae vitae dicta sunt explicabo. Nemo enim ipsam voluptatem quia voluptas sit aspernatur aut odit aut fugit, sed quia consequuntur magni dolores eos qui ratione voluptatem sequi nesciunt. </p>
                                <p>I am alone, and feel the charm of existence in this spot, which was created for the bliss of souls like mine. I am so happy, my dear friend, so absorbed in the exquisite
                                  sense of mere tranquil existence, that I neglect my talents. I should be incapable of drawing a single stroke at the present moment; and yet.</p>
                              </div>
                            </div>
                            
                        </div>
                    </div>

                  </div>
                  <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-primary pull-right">Create Group</button>
                  </div>
                </div>
            </div>
        </div>

</body>

<?php  require_once './include/js.php';?>

<script>
    $(document).ready(function() {
            // Flexible table

            $('#table_id').DataTable();

        });
    function unFriend(id) {

        if (id > 0) {
            $.post("<?php echo base_url(); ?>connect/sendUserProfileFriendRequest", {id: id},
                function (data, status) {

                   if (data.status === "failed") {
                        
                        sweetAlert("Oops...", data.message, "error");
                        return false;
                    } else {
                        //$('#request_id_'+id).html('<tr><td colspan="100%" align="center"></td></tr>');
                        $('#request_id_'+id).html('');
                    }
                });
        } else {
            sweetAlert("Oops...", "Please select user to disconnect", "error");
            return false;
        }
    }

    $('#my-groups #list-view-id, #Suggested-groups #list-view-id').on('click', function(){
        $(' .grid-list-view').removeClass('grid col-md-4 col-sm-6');
        $('.grid-list-view').addClass('list col-md-12 col-sm-12');
    });

    $('#my-groups #grid-view-id, #Suggested-groups #grid-view-id').on('click', function(){
        $('.grid-list-view').removeClass('list col-md-12 col-sm-12');
        $('.grid-list-view').addClass('grid col-md-4 col-sm-6');
    });

    $(".dropdown-menu li a").click(function(){
        //$(this).parents(".dropdown").find('.btn').html($(this).text());
        $(this).parents(".dropdown").find('.btn').val($(this).data('value'));
        $(this).parents(".dropdown").find('.btn').html($(this).html() + '<span class="caret"></span>');
    });


    function newGroup() {

        $.post("<?php echo base_url(); ?>organize/newGroup", {'display': 'Y'},
            function (data, status) {
                if(data != '') {
                    $('.modal-content-ajax').html(data);
                } else {
                    $('.modal-content-ajax').html(data);
                }
            });
    }

</script>

</html>
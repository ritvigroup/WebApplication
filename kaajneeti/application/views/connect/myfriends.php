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
                                <!-- <ol class="breadcrumb page-breadcrumb">
                                    <li class="activelink"><a href="<?php //echo base_url(); ?>connect/myfriends">My Connection</a>&nbsp;</li>
                                    <li><a href="<?php //echo base_url(); ?>connect/search">Search</a>&nbsp;</li>
                                    <li><a href="<?php //echo base_url(); ?>connect/invitation">Incomming</a>&nbsp;</li>
                                    <li><a href="<?php //echo base_url(); ?>connect/requestsent">Outgoing</a>&nbsp;</li>
                                </ol> -->
                                <ol class="breadcrumb">
                                    <li> <a class="text-capitalize" href="index.html">kaajneeti</a> </li>
                                    <li> <a class="text-capitalize">connect</a> </li>
                                    <li class="active text-capitalize"> <strong>myfriends</strong> </li>
                                </ol>
                            </div>

                             <div class="portlet-body">
                                <div class="row mbm">
                                    <div class="col-md-12">
                                        <div class="row">
                                            <div class="col-md-12">
                                                <div class="row head">
                                                    <div class="row user-heading">
                                                    <div class="col-md-6">
                                                        <!-- <i class="fa fa-thumbs-up"></i>  -->
                                                        <span class="user-frnd text-uppercase">
                                                            Connectios
                                                        </span>
                                                    </div>
                                                    <div class="col-md-6 ">
                                                        <div class="pull-right"> 
                                                            <div class="btn-group" role="group" >
                                                                <div class="btn-group" role="group">
                                                                    <button type="button" class="btn aqua btn-outline btn-sm text-capitalize">follower
                                                                    <span class="badge">4</span></button>
                                                                    <!-- <i class="fa fa-"></i> -->
                                                                  </div>
                                                                  <div class="btn-group" role="group">
                                                                    <button type="button" class="btn aqua btn-outline btn-sm text-capitalize">
                                                                     Following <span class="badge">4</span></button>
                                                                  </div>
                                                                  
                                                                </div >

                                                                <div class="dropdown pull-right">
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

                                                <div class="row">
                                                    <div class="col-md-9">
                                                        <div>

                                                          <!-- Nav tabs -->
                                                          <ul class="nav nav-tabs" role="tablist">
                                                            <li role="presentation" class="active"><a href="#all-connections" aria-controls="home" role="tab" data-toggle="tab">All Connections <span class="badge">4</span></a></li>
                                                            <li role="presentation" class="dropdown"> <a href="#" class="dropdown-toggle" id="request-connections" data-toggle="dropdown" aria-controls="request-connections-contents" aria-expanded="false">Request <span class="caret"></span></a>
                                                                <ul class="dropdown-menu" aria-labelledby="request-connections" id="myTabDrop1-contents">
                                                                    <li><a href="#request-incoming-post" role="tab" id="request-connections-tab1" data-toggle="tab" aria-controls="request-incoming-post">Incoming Post <span class="badge">4</span></a></li>
                                                                    <li><a href="#request-outgoing-post" role="tab" id="request-connections-tab2" data-toggle="tab" aria-controls="request-outgoing-post">Outgoing Post <span class="badge">4</span></a></li>
                                                                </ul>
                                                            </li>
                                                            <li role="presentation" class="dropdown"> <a href="#" class="dropdown-toggle" id="connects" data-toggle="dropdown" aria-controls="connects-contents" aria-expanded="false">Connects <span class="caret"></span></a>
                                                                <ul class="dropdown-menu" aria-labelledby="Connects" id="myTabDrop1-contents">
                                                                    <li><a href="#connect-citizen" role="tab" id="connect-citizen-tab1" data-toggle="tab" aria-controls="request-incoming-post">Citizen <span class="badge">4</span></a></li>
                                                                    <li><a href="#connect-leader" role="tab" id="connect-citizen-tab2" data-toggle="tab" aria-controls="request-outgoing-post">Leader <span class="badge">4</span></a></li>
                                                                </ul>
                                                            </li>
                                                            <li role="presentation" class="dropdown"> <a href="#" class="dropdown-toggle" id="group-connection" data-toggle="dropdown" aria-controls="connects-contents" aria-expanded="false">Groups <span class="caret"></span></a>
                                                                <ul class="dropdown-menu" aria-labelledby="group-connection" id="group-connection-contents">
                                                                    <li><a href="#citizen-grout-connection" role="tab" id="group-connection-tab1" data-toggle="tab" aria-controls="request-incoming-post">Citizen Groups <span class="badge">4</span></a></li>
                                                                    <li><a href="#leader-grout-connection" role="tab" id="group-connection-tab2" data-toggle="tab" aria-controls="request-outgoing-post">Leader Groups <span class="badge">4</span></a></li>
                                                                </ul>
                                                            </li>
                                                           <!--  <li role="presentation"><a href="#incoming_post" aria-controls="profile" role="tab" data-toggle="tab">Incoming<span class="badge">4</span></a></li>
                                                            <li role="presentation"><a href="#birthday" aria-controls="messages" role="tab" data-toggle="tab">Outgoing <span class="badge">4</span></a></li> -->
                                                            <!-- <li role="presentation"><a href="#work" aria-controls="settings" role="tab" data-toggle="tab">Connection <span class="badge">4</span></a></li> -->
                                                            <!-- <li role="presentation"><a href="#college" aria-controls="home" role="tab" data-toggle="tab">Mutual Friends <span class="badge">4</span></a></li> -->
                                                             <li role="presentation"><a href="#txt-1" aria-controls="messages" role="tab" data-toggle="tab">txt-1 <span class="badge">4</span></a></li>
                                                            <li role="presentation" class="dropdown"> <a href="#" class="dropdown-toggle" id="myTabDrop1" data-toggle="dropdown" aria-controls="myTabDrop1-contents" aria-expanded="false">more <span class="caret"></span></a>
                                                                <ul class="dropdown-menu" aria-labelledby="myTabDrop1" id="myTabDrop1-contents">
                                                                    <li><a href="#dropdown1" role="tab" id="dropdown1-tab" data-toggle="tab" aria-controls="dropdown1">txt-2 <span class="badge">4</span></a></li>
                                                                    <li><a href="#dropdown2" role="tab" id="dropdown2-tab" data-toggle="tab" aria-controls="dropdown2">txt-3 <span class="badge">4</span></a></li>
                                                                    <li><a href="#dropdown3" role="tab" id="dropdown2-tab" data-toggle="tab" aria-controls="dropdown3">txt-4 <span class="badge">4</span></a></li>
                                                                    <li><a href="#dropdown4" role="tab" id="dropdown2-tab" data-toggle="tab" aria-controls="dropdown4">txt-5 <span class="badge">4</span></a></li>
                                                                    <li><a href="#dropdown5" role="tab" id="dropdown2-tab" data-toggle="tab" aria-controls="dropdown5">txt-6 <span class="badge">4</span></a></li>
                                                                </ul>
                                                            </li>
                                                          </ul>

                                                          

                                                        </div><!--Tabs-->
                                                    </div>

                                                    <div class="col-md-3">
                                                        
                                                        <div class="input-group">
                                                          <input type="text" class="form-control" placeholder="Search for...">
                                                          <span class="input-group-btn">
                                                            <button class="btn btn-default" type="button">Go!</button>
                                                          </span>
                                                        </div>
                                                    </div>

                                                </div>
                                                </div>
                                                

                                                <div class="row">
                                                    <!-- Tab panes -->
                                                      <div class="tab-content">
                                                        
                                                        <!--               All Friends           -->
                                                        <div role="tabpanel" class="tab-pane active" id="all-connections">
                                                            <div class="row "><!--Both keys Grid & List view -->
                                                                <div class="col-sm-12">
                                                                    <i class="fa fa-th-list fa-2x pull-right" id="list-view-id"></i>
                                                                    <i class="fa fa-th fa-2x pull-right" id="grid-view-id"></i>
                                                                </div>
                                                            </div>
                                                            <div class="connect_list row">
                                                                <div class="grid-list-view grid col-md-4 col-sm-6">
                                                                    <div class="contact-box">
                                                                        <div class="col-sm-12">
                                                                            <img src="../assets/images/teem/a1.jpg" class="img-responsive" alt="image">
                                                                            <h3><strong>Jordan Belfort</strong></h3>
                                                                            <p><i class="fa fa-star"></i> 333 Friends</p>
                                                                            <div class="connection-features">
                                                                                <div class="dropdown">
                                                                                    <button class="btn aqua btn-outline btn-sm dropdown-toggle" type="button" id="connection-featuresMenu" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                                                    <i class="fa fa-plus"></i>
                                                                                        
                                                                                    </button>
                                                                                     <ul class="dropdown-menu dropdown-menu-left" aria-labelledby="connection-featuresMenu">
                                                                                        <li><a href="#">Get Notification</a></li>
                                                                                        <li><a href="#">Close connetions</a></li>
                                                                                        <li><a href="#">Acquaintances</a></li>
                                                                                        <li><a href="#">Add to another list...</a></li>
                                                                                        <li><a href="#">Suggest connections...</a></li>
                                                                                        <li><a href="#">Unconfirmed</a></li>
                                                                                    </ul>
                                                                                </div>
                                                                            </div>    
                                                                        </div>
                                                                        <div class="clearfix"></div>
                                                                        
                                                                    </div>
                                                                </div>
                                                               
                                                            </div>
                                                              
                                                        </div>
                                                        <!--               Incomming Post           -->
                                                        <div role="tabpanel" class="tab-pane" id="request-incoming-post">
                                                            <div class="row "><!--Both keys Grid & List view -->
                                                                <div class="col-sm-12">
                                                                    <i class="fa fa-th-list fa-2x pull-right" id="list-view-id"></i>
                                                                    <i class="fa fa-th fa-2x pull-right" id="grid-view-id"></i>
                                                                </div>
                                                            </div>
                                                            <div class="connect_list row">
                                                                <div class="grid-list-view grid col-md-4 col-sm-6">
                                                                    <div class="contact-box">
                                                                        <div class="col-sm-12">
                                                                            <img src="../assets/images/teem/a1.jpg" class="img-responsive" alt="image">
                                                                            <h3><strong>Jordan Belfort</strong></h3>
                                                                            <p><i class="fa fa-star"></i> 14 Post</p>
                                                                            <p>
                                                                                <button class="btn blue  btn-circle" type="button"><i class="fa fa-check"></i> </button>
                                                                                <button class="btn btn-warning btn-circle" type="button"><i class="fa fa-times"></i> </button>
                                                                            </p>    
                                                                        </div>
                                                                        <div class="clearfix"></div>
                                                                        
                                                                    </div>
                                                                </div>
                                                            </div>
                                                                                                                                                                                   
                                                        </div>
                                                        <!--               Outcomming Post           -->
                                                        <div role="tabpanel" class="tab-pane" id="request-outgoing-post">
                                                            <div class="row "><!--Both keys Grid & List view -->
                                                            <div class="col-sm-12">
                                                                <i class="fa fa-th-list fa-2x pull-right" id="list-view-id"></i>
                                                                <i class="fa fa-th fa-2x pull-right" id="grid-view-id"></i>
                                                            </div>
                                                            </div>
                                                            <div class="connect_list row">
                                                                <div class="grid-list-view grid col-md-4 col-sm-6">
                                                                    <div class="contact-box">
                                                                        <div class="col-sm-12">
                                                                            <img src="../assets/images/teem/a1.jpg" class="img-responsive" alt="image">
                                                                            <h3><strong>Jordan Belfort</strong></h3>
                                                                            <p><a href="#">Send Request</a></p>
                                                                            <p>
                                                                                <button class="btn btn-default" type="button">Undo</button>
                                                                            </p>    
                                                                        </div>
                                                                        <div class="clearfix"></div>
                                                                        
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <!--               Connection           -->
                                                        <div role="tabpanel" class="tab-pane" id="connect-citizen">
                                                            <div class="row "><!--Both keys Grid & List view -->
                                                                <div class="col-sm-12">
                                                                    <i class="fa fa-th-list fa-2x pull-right" id="list-view-id"></i>
                                                                    <i class="fa fa-th fa-2x pull-right" id="grid-view-id"></i>
                                                                </div>
                                                            </div>
                                                            <div class="connect_list row">
                                                                <div class="grid-list-view grid col-md-4 col-sm-6">
                                                                    <div class="contact-box">
                                                                        <div class="col-sm-12">
                                                                            <img src="../assets/images/teem/a1.jpg" class="img-responsive" alt="image">
                                                                            <h3><strong>Jordan Belfort</strong></h3>
                                                                            <p><i class="fa fa-star"></i> 333 Friends</p>
                                                                            <div class="connection-features">
                                                                                <div class="dropdown">
                                                                                    <button class="btn aqua btn-outline btn-sm dropdown-toggle" type="button" id="connection-featuresMenu" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                                                    <i class="fa fa-plus"></i>
                                                                                        
                                                                                    </button>
                                                                                     <ul class="dropdown-menu dropdown-menu-left" aria-labelledby="connection-featuresMenu">
                                                                                        <li><a href="#">checkboxGet Notification</a></li>
                                                                                        <li><a href="#">Close Friends</a></li>
                                                                                        <li><a href="#">Acquaintances</a></li>
                                                                                        <li><a href="#">Add to another list...</a></li>
                                                                                        <li><a href="#">Suggest Friends...</a></li>
                                                                                        <li><a href="#">Unfriend</a></li>
                                                                                    </ul>
                                                                                </div>
                                                                            </div>    
                                                                        </div>
                                                                        <div class="clearfix"></div>
                                                                        
                                                                    </div>
                                                                </div>
                                                               
                                                            </div>
                                                        </div>
                                                        <!--               Mutual Friends           -->
                                                        <div role="tabpanel" class="tab-pane" id="connect-leader">
                                                            <div class="row "><!--Both keys Grid & List view -->
                                                                <div class="col-sm-12">
                                                                    <i class="fa fa-th-list fa-2x pull-right" id="list-view-id"></i>
                                                                    <i class="fa fa-th fa-2x pull-right" id="grid-view-id"></i>
                                                                </div>
                                                            </div>
                                                            <div class="connect_list row">
                                                                <div class="grid-list-view grid col-md-4 col-sm-6">
                                                                    <div class="contact-box">
                                                                        <div class="col-sm-12">
                                                                            <img src="../assets/images/teem/a1.jpg" class="img-responsive" alt="image">
                                                                            <h3><strong>Jordan Belfort Leader</strong></h3>
                                                                            <p><i class="fa fa-star"></i> 333 Friends</p>
                                                                            <div class="connection-features">
                                                                                <div class="dropdown">
                                                                                    <button class="btn aqua btn-outline btn-sm dropdown-toggle" type="button" id="connection-featuresMenu" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                                                    <i class="fa fa-plus"></i>
                                                                                        
                                                                                    </button>
                                                                                     <ul class="dropdown-menu dropdown-menu-left" aria-labelledby="connection-featuresMenu">
                                                                                        <li><a href="#">Lorem</a></li>
                                                                                        <li><a href="#">Lorem</a></li>
                                                                                        <li><a href="#">Lorem</a></li>
                                                                                        <li><a href="#">Lorem</a></li>
                                                                                        <li><a href="#">Lorem</a></li>
                                                                                        <li><a href="#">Lorem</a></li>
                                                                                    </ul>
                                                                                </div>
                                                                            </div>    
                                                                        </div>
                                                                        <div class="clearfix"></div>
                                                                        
                                                                    </div>
                                                                </div>
                                                               
                                                            </div>
                                                        </div>
                                                        <!--               High School           -->
                                                        <div role="tabpanel" class="tab-pane" id="citizen-grout-connection">
                                                            <div class="row "><!--Both keys Grid & List view -->
                                                                <div class="col-sm-12">
                                                                    <i class="fa fa-th-list fa-2x pull-right" id="list-view-id"></i>
                                                                    <i class="fa fa-th fa-2x pull-right" id="grid-view-id"></i>
                                                                </div>
                                                            </div>
                                                            Citizen group
                                                        </div>
                                                        <div role="tabpanel" class="tab-pane" id="leader-grout-connection">
                                                            <div class="row "><!--Both keys Grid & List view -->
                                                                <div class="col-sm-12">
                                                                    <i class="fa fa-th-list fa-2x pull-right" id="list-view-id"></i>
                                                                    <i class="fa fa-th fa-2x pull-right" id="grid-view-id"></i>
                                                                </div>
                                                            </div>
                                                            Citizen Leader
                                                        </div>
                                                        <div role="tabpanel" class="tab-pane" id="txt-1">
                                                            <div class="row "><!--Both keys Grid & List view -->
                                                                <div class="col-sm-12">
                                                                    <i class="fa fa-th-list fa-2x pull-right" id="list-view-id"></i>
                                                                    <i class="fa fa-th fa-2x pull-right" id="grid-view-id"></i>
                                                                </div>
                                                            </div>
                                                            txt-1
                                                        </div>
                                                        <div class="tab-pane fade" role="tabpanel" id="dropdown1" aria-labelledby="dropdown1-tab">
                                                            <div class="row "><!--Both keys Grid & List view -->
                                                                <div class="col-sm-12">
                                                                    <i class="fa fa-th-list fa-2x pull-right" id="list-view-id"></i>
                                                                    <i class="fa fa-th fa-2x pull-right" id="grid-view-id"></i>
                                                                </div>
                                                            </div>
                                                            dropdown1
                                                        </div>
                                                        <div class="tab-pane fade" role="tabpanel" id="dropdown2" aria-labelledby="dropdown1-tab">
                                                            <div class="row "><!--Both keys Grid & List view -->
                                                                <div class="col-sm-12">
                                                                    <i class="fa fa-th-list fa-2x pull-right" id="list-view-id"></i>
                                                                    <i class="fa fa-th fa-2x pull-right" id="grid-view-id"></i>
                                                                </div>
                                                            </div>
                                                            dropdown2
                                                        </div>
                                                        <div class="tab-pane fade" role="tabpanel" id="dropdown3" aria-labelledby="dropdown1-tab">
                                                            <div class="row "><!--Both keys Grid & List view -->
                                                                <div class="col-sm-12">
                                                                    <i class="fa fa-th-list fa-2x pull-right" id="list-view-id"></i>
                                                                    <i class="fa fa-th fa-2x pull-right" id="grid-view-id"></i>
                                                                </div>
                                                            </div>
                                                             dropdown3
                                                        </div>
                                                        <div class="tab-pane fade" role="tabpanel" id="dropdown4" aria-labelledby="dropdown1-tab">
                                                            <div class="row "><!--Both keys Grid & List view -->
                                                                <div class="col-sm-12">
                                                                    <i class="fa fa-th-list fa-2x pull-right" id="list-view-id"></i>
                                                                    <i class="fa fa-th fa-2x pull-right" id="grid-view-id"></i>
                                                                </div>
                                                            </div>
                                                            dropdown4
                                                        </div>
                                                        <div class="tab-pane fade" role="tabpanel" id="dropdown5" aria-labelledby="dropdown1-tab">
                                                            <div class="row "><!--Both keys Grid & List view -->
                                                                <div class="col-sm-12">
                                                                    <i class="fa fa-th-list fa-2x pull-right" id="list-view-id"></i>
                                                                    <i class="fa fa-th fa-2x pull-right" id="grid-view-id"></i>
                                                                </div>
                                                            </div>
                                                            dropdown5
                                                        </div>
                                                      
                                                </div>

                                            </div>
                                        </div>
                                    </div>
                                </div>       
                            </div>

                        </div>
                    </div>
                </div>
            
            </div>
        </div>

        
    </div>

    <?php  require_once './include/footer.php';?>

    <?php  require_once './include/scroll_top.php';?>

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
                        <!-- <div role="presentation" class="dropdown"> 
                            <a href="#" class="dropdown-toggle" id="drop5" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"><i class="fa fa-globe"></i> Public <span class="caret"></span> </a>
                            <ul class="dropdown-menu" id="menu2" aria-labelledby="drop5">
                                <li><a href="#" data-value="public"><i class="fa fa-globe"></i> Public</a></li>
                                <li><a href="#" data-value="connections"><i class="fa fa-users"></i> Connections</a></li>
                                <li><a href="#" data-value="only me"> <i class="fa fa-unlock"></i> Only me</a></li>
                                <li role="separator" class="divider"></li>
                                <li><a href="#" data-toggle="modal" data-target="#edit-privecy-custom-button"> <i class="fa fa-cog"></i>Custom</a></li>
                            </ul>
                        </div>  -->              
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
                        <!-- <div role="presentation" class="dropdown"> <a href="#" class="dropdown-toggle" id="drop5" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"><i class="fa fa-globe"></i> Public <span class="caret"></span> </a>
                            <ul class="dropdown-menu" id="menu2" aria-labelledby="drop5">
                                <li><a href="#" data-value="public"><i class="fa fa-globe"></i> Public</a></li>
                                <li><a href="#" data-value="connections"><i class="fa fa-users"></i> Connections</a></li>
                                <li><a href="#" data-value="only me"> <i class="fa fa-unlock"></i> Only me</a></li>
                                <li role="separator" class="divider"></li>
                                <li><a href="#edit-privecy-custom-button"> <i class="fa fa-cog"></i>Custom</a></li>
                            </ul>
                        </div>  -->  
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
                    <!-- <div class="col-sm-4 text-right">
                        <div role="presentation" class="dropdown"> <a href="#" class="dropdown-toggle" id="drop5" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"><i class="fa fa-globe"></i> Public <span class="caret"></span> </a>
                            <ul class="dropdown-menu" id="menu2" aria-labelledby="drop5">
                                <li><a href="#"><i class="fa fa-globe"></i> Public</a></li>
                                <li><a href="#"><i class="fa fa-users"></i> Connections</a></li>
                                <li><a href="#"> <i class="fa fa-unlock"></i> Only me</a></li>
                                <li role="separator" class="divider"></li>
                                <li><a href="#"> <i class="fa fa-cog"></i>Custom</a></li>
                            </ul>
                        </div>               
                    </div> -->
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

    $('#list-view-id').on('click', function(){
        $('.grid-list-view').removeClass('grid col-md-4 col-sm-6');
        $('.grid-list-view').addClass('list col-md-12 col-sm-12');
    });

    $('#grid-view-id').on('click', function(){
        $('.grid-list-view').removeClass('list col-md-12 col-sm-12');
        $('.grid-list-view').addClass('grid col-md-4 col-sm-6');
    });

    $(".dropdown-menu li a").click(function(){
        //$(this).parents(".dropdown").find('.btn').html($(this).text());
        $(this).parents(".dropdown").find('.btn').val($(this).data('value'));
        $(this).parents(".dropdown").find('.btn').html($(this).html() + '<span class="caret"></span>');
    });

</script>

</html>
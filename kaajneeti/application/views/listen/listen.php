<!DOCTYPE html>
<html lang="en">
<head><title>Listen</title>
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

        <!-- Start page content wrapper -->
        <div class="page-content-wrapper animated fadeInRight">
            <div class="page-content">
                <div class="page-content page-content2">
                    <div id="tab-general">
                        <div id="sum_box" class="row mbl">
                        	<h1>Received</h1>
                            <div class="col-sm-6 col-md-2 ">
                                <div class="panel profit db mbm">
                                    <div class="panel-body" id="complaint">
                                    	
                                    		<p class="icon"><i class="icon fa fa-paper-plane"></i></p>
	                                    	<h4 class="value"><span data-counter="" data-start="10" data-end="<?php echo $result->TotalComplaintReceived; ?>" data-step="1" data-duration="0"></span><span><?php echo $result->TotalComplaintReceived; ?></span></h4> 

	                                        <p class="description"><a href="<?=base_url();?>complaint/complaintReceived" class="profit-color">Complaint </a></p>
                                   
                        <div class="complaint-box-hover">
	                    <div class="feed-activity-list">
                      <div class="feed-element feed-element-div"> <a href="#" class="pull-left"> <img alt="image" class="img-circle" src="../assets/images/teem/a9.jpg"> </a>
                        <div class="media-body "> <small class="pull-right text-navy2"> <i class="fa fa-clock-o" aria-hidden="true"></i> 1m ago</small> <a class="btn btn-xs btn-primary pull-right profile-danger-btn"> Pending </a>  <strong class="profile-subject">Subject <br>started following information<br>Olivia Wenscombe information. <br></strong>
                        
                          <div class="actions"> <a href="#"> <span class="label label-info"> View </span></a> <a href="#"><span class="label label-success">  track </span>  </a> </div>
                        </div>
                      </div>
                         </div>

                                          <div class="feed-activity-list">
                      <div class="feed-element feed-element-div"> <a href="#" class="pull-left"> <img alt="image" class="img-circle" src="../assets/images/teem/a9.jpg"> </a>
                        <div class="media-body "> <small class="pull-right text-navy2"> <i class="fa fa-clock-o" aria-hidden="true"></i> 1m ago</small> <a class="btn btn-xs btn-primary pull-right profile-danger-btn"> Pending </a>  <strong class="profile-subject">Subject <br>started following information<br>Olivia Wenscombe information. <br></strong>
                        
                          <div class="actions"> <a href="#"> <span class="label label-info"> View </span></a> <a href="#"><span class="label label-success">  track </span>  </a> </div>
                        </div>
                      </div>
                         </div>
                                          <div class="feed-activity-list">
                      <div class="feed-element feed-element-div"> <a href="#" class="pull-left"> <img alt="image" class="img-circle" src="../assets/images/teem/a9.jpg"> </a>
                        <div class="media-body "> <small class="pull-right text-navy2"> <i class="fa fa-clock-o" aria-hidden="true"></i> 1m ago</small> <a class="btn btn-xs btn-primary pull-right profile-danger-btn"> Pending </a>  <strong class="profile-subject">Subject <br>started following information<br>Olivia Wenscombe information. <br></strong>
                        
                          <div class="actions"> <a href="#"> <span class="label label-info"> View </span></a> <a href="#"><span class="label label-success">  track </span>  </a> </div>
                        </div>
                      </div>
                         </div>
                                          <div class="feed-activity-list">
                      <div class="feed-element feed-element-div"> <a href="#" class="pull-left"> <img alt="image" class="img-circle" src="../assets/images/teem/a9.jpg"> </a>
                        <div class="media-body "> <small class="pull-right text-navy2"> <i class="fa fa-clock-o" aria-hidden="true"></i> 1m ago</small> <a class="btn btn-xs btn-primary pull-right profile-danger-btn"> Pending </a>  <strong class="profile-subject">Subject <br>started following information<br>Olivia Wenscombe information. <br></strong>
                        
                          <div class="actions"> <a href="#"> <span class="label label-info"> View </span></a> <a href="#"><span class="label label-success">  track </span>  </a> </div>
                        </div>
                      </div>
                         </div>


                      </div>
                                    	

                         </div>
                         </div>

                              	


                            </div>
                            <div class="col-sm-6 col-md-2">
                                <div class="panel profit task db mbm">
                                    <div class="panel-body" id="suggestion-box"><p class="icon"><i class="icon fa fa-lightbulb-o"></i></p><h4
                                            class="value"><span><?php echo $result->TotalSuggestionReceived; ?></span></h4>

                                        <p class="description"><a href="<?=base_url();?>suggestion/suggestionReceived" class="profit-color">Suggestion </a></p>

                                    	<div class="suggestion-box-hover">
                                    	
	                    <div class="feed-activity-list">
                      <div class="feed-element feed-element-div"> <a href="#" class="pull-left"> <img alt="image" class="img-circle" src="../assets/images/teem/a9.jpg"> </a>
                        <div class="media-body "> <small class="pull-right text-navy2"> <i class="fa fa-clock-o" aria-hidden="true"></i> 1m ago</small> <a class="btn btn-xs btn-primary pull-right profile-danger-btn"> Pending </a>  <strong class="profile-subject">Subject <br>started following information<br>Olivia Wenscombe information. <br></strong>
                        
                          <div class="actions"> <a href="#"> <span class="label label-info"> View </span></a> <a href="#"><span class="label label-success">  track </span>  </a> </div>
                        </div>
                      </div>
                         </div>

                                          <div class="feed-activity-list">
                      <div class="feed-element feed-element-div"> <a href="#" class="pull-left"> <img alt="image" class="img-circle" src="../assets/images/teem/a9.jpg"> </a>
                        <div class="media-body "> <small class="pull-right text-navy2"> <i class="fa fa-clock-o" aria-hidden="true"></i> 1m ago</small> <a class="btn btn-xs btn-primary pull-right profile-danger-btn"> Pending </a>  <strong class="profile-subject">Subject <br>started following information<br>Olivia Wenscombe information. <br></strong>
                        
                          <div class="actions"> <a href="#"> <span class="label label-info"> View </span></a> <a href="#"><span class="label label-success">  track </span>  </a> </div>
                        </div>
                      </div>
                         </div>
                                          <div class="feed-activity-list">
                      <div class="feed-element feed-element-div"> <a href="#" class="pull-left"> <img alt="image" class="img-circle" src="../assets/images/teem/a9.jpg"> </a>
                        <div class="media-body "> <small class="pull-right text-navy2"> <i class="fa fa-clock-o" aria-hidden="true"></i> 1m ago</small> <a class="btn btn-xs btn-primary pull-right profile-danger-btn"> Pending </a>  <strong class="profile-subject">Subject <br>started following information<br>Olivia Wenscombe information. <br></strong>
                        
                          <div class="actions"> <a href="#"> <span class="label label-info"> View </span></a> <a href="#"><span class="label label-success">  track </span>  </a> </div>
                        </div>
                      </div>
                         </div>
                                          <div class="feed-activity-list">
                      <div class="feed-element feed-element-div"> <a href="#" class="pull-left"> <img alt="image" class="img-circle" src="../assets/images/teem/a9.jpg"> </a>
                        <div class="media-body "> <small class="pull-right text-navy2"> <i class="fa fa-clock-o" aria-hidden="true"></i> 1m ago</small> <a class="btn btn-xs btn-primary pull-right profile-danger-btn"> Pending </a>  <strong class="profile-subject">Subject <br>started following information<br>Olivia Wenscombe information. <br></strong>
                        
                          <div class="actions"> <a href="#"> <span class="label label-info"> View </span></a> <a href="#"><span class="label label-success">  track </span>  </a> </div>
                        </div>
                      </div>
                         </div>
                                    	</div>

                                        
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-6 col-md-2">

                                <div class="panel profit db mbm">
                                    <div class="panel-body" id="information-box"><p class="icon"><i class="icon fa fa-info-circle"></i></p><h4
                                            class="value"><span><?php echo $result->TotalInformation; ?></span></h4>

                                        <p class="description"><a href="<?=base_url();?>information/information" class="profit-color">Information</a></p>

                                         	<div class="information-box-hover">
                                    	

	                                   	                    <div class="feed-activity-list">
                      <div class="feed-element feed-element-div"> <a href="#" class="pull-left"> <img alt="image" class="img-circle" src="../assets/images/teem/a9.jpg"> </a>
                        <div class="media-body "> <small class="pull-right text-navy2"> <i class="fa fa-clock-o" aria-hidden="true"></i> 1m ago</small> <a class="btn btn-xs btn-primary pull-right profile-danger-btn"> Pending </a>  <strong class="profile-subject">Subject <br>started following information<br>Olivia Wenscombe information. <br></strong>
                        
                          <div class="actions"> <a href="#"> <span class="label label-info"> View </span></a> <a href="#"><span class="label label-success">  track </span>  </a> </div>
                        </div>
                      </div>
                         </div>

                                          <div class="feed-activity-list">
                      <div class="feed-element feed-element-div"> <a href="#" class="pull-left"> <img alt="image" class="img-circle" src="../assets/images/teem/a9.jpg"> </a>
                        <div class="media-body "> <small class="pull-right text-navy2"> <i class="fa fa-clock-o" aria-hidden="true"></i> 1m ago</small> <a class="btn btn-xs btn-primary pull-right profile-danger-btn"> Pending </a>  <strong class="profile-subject">Subject <br>started following information<br>Olivia Wenscombe information. <br></strong>
                        
                          <div class="actions"> <a href="#"> <span class="label label-info"> View </span></a> <a href="#"><span class="label label-success">  track </span>  </a> </div>
                        </div>
                      </div>
                         </div>
                                          <div class="feed-activity-list">
                      <div class="feed-element feed-element-div"> <a href="#" class="pull-left"> <img alt="image" class="img-circle" src="../assets/images/teem/a9.jpg"> </a>
                        <div class="media-body "> <small class="pull-right text-navy2"> <i class="fa fa-clock-o" aria-hidden="true"></i> 1m ago</small> <a class="btn btn-xs btn-primary pull-right profile-danger-btn"> Pending </a>  <strong class="profile-subject">Subject <br>started following information<br>Olivia Wenscombe information. <br></strong>
                        
                          <div class="actions"> <a href="#"> <span class="label label-info"> View </span></a> <a href="#"><span class="label label-success">  track </span>  </a> </div>
                        </div>
                      </div>
                         </div>
                                          <div class="feed-activity-list">
                      <div class="feed-element feed-element-div"> <a href="#" class="pull-left"> <img alt="image" class="img-circle" src="../assets/images/teem/a9.jpg"> </a>
                        <div class="media-body "> <small class="pull-right text-navy2"> <i class="fa fa-clock-o" aria-hidden="true"></i> 1m ago</small> <a class="btn btn-xs btn-primary pull-right profile-danger-btn"> Pending </a>  <strong class="profile-subject">Subject <br>started following information<br>Olivia Wenscombe information. <br></strong>
                        
                          <div class="actions"> <a href="#"> <span class="label label-info"> View </span></a> <a href="#"><span class="label label-success">  track </span>  </a> </div>
                        </div>
                      </div>
                         </div>
                                    	</div>

                                        
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-6 col-md-2">
                                <div class="panel profit income db mbm">
                                    <div class="panel-body" id="event-box"><p class="icon"><i class="icon fa fa-calendar"></i></p><h4
                                            class="value"><span><?php echo $result->TotalEvent; ?></span></h4>

                                        <p class="description"><a href="<?=base_url();?>event/event" class="profit-color">Events</a></p>


                                         	<div class="event-box-hover">
                                    	

	                                  	                    <div class="feed-activity-list">
                      <div class="feed-element feed-element-div"> <a href="#" class="pull-left"> <img alt="image" class="img-circle" src="../assets/images/teem/a9.jpg"> </a>
                        <div class="media-body "> <small class="pull-right text-navy2"> <i class="fa fa-clock-o" aria-hidden="true"></i> 1m ago</small> <a class="btn btn-xs btn-primary pull-right profile-danger-btn"> Pending </a>  <strong class="profile-subject">Subject <br>started following information<br>Olivia Wenscombe information. <br></strong>
                        
                          <div class="actions"> <a href="#"> <span class="label label-info"> View </span></a> <a href="#"><span class="label label-success">  track </span>  </a> </div>
                        </div>
                      </div>
                         </div>

                                          <div class="feed-activity-list">
                      <div class="feed-element feed-element-div"> <a href="#" class="pull-left"> <img alt="image" class="img-circle" src="../assets/images/teem/a9.jpg"> </a>
                        <div class="media-body "> <small class="pull-right text-navy2"> <i class="fa fa-clock-o" aria-hidden="true"></i> 1m ago</small> <a class="btn btn-xs btn-primary pull-right profile-danger-btn"> Pending </a>  <strong class="profile-subject">Subject <br>started following information<br>Olivia Wenscombe information. <br></strong>
                        
                          <div class="actions"> <a href="#"> <span class="label label-info"> View </span></a> <a href="#"><span class="label label-success">  track </span>  </a> </div>
                        </div>
                      </div>
                         </div>
                                          <div class="feed-activity-list">
                      <div class="feed-element feed-element-div"> <a href="#" class="pull-left"> <img alt="image" class="img-circle" src="../assets/images/teem/a9.jpg"> </a>
                        <div class="media-body "> <small class="pull-right text-navy2"> <i class="fa fa-clock-o" aria-hidden="true"></i> 1m ago</small> <a class="btn btn-xs btn-primary pull-right profile-danger-btn"> Pending </a>  <strong class="profile-subject">Subject <br>started following information<br>Olivia Wenscombe information. <br></strong>
                        
                          <div class="actions"> <a href="#"> <span class="label label-info"> View </span></a> <a href="#"><span class="label label-success">  track </span>  </a> </div>
                        </div>
                      </div>
                         </div>
                                          <div class="feed-activity-list">
                      <div class="feed-element feed-element-div"> <a href="#" class="pull-left"> <img alt="image" class="img-circle" src="../assets/images/teem/a9.jpg"> </a>
                        <div class="media-body "> <small class="pull-right text-navy2"> <i class="fa fa-clock-o" aria-hidden="true"></i> 1m ago</small> <a class="btn btn-xs btn-primary pull-right profile-danger-btn"> Pending </a>  <strong class="profile-subject">Subject <br>started following information<br>Olivia Wenscombe information. <br></strong>
                        
                          <div class="actions"> <a href="#"> <span class="label label-info"> View </span></a> <a href="#"><span class="label label-success">  track </span>  </a> </div>
                        </div>
                      </div>
                         </div>
                                    	</div>

                                        
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-6 col-md-2">
                                <div class="panel  profit visit db mbm">
                                    <div class="panel-body" id="poll-box"><p class="icon"><i class="icon fa fa-list-ul"></i></p><h4
                                            class="value"><span><?php echo $result->TotalPoll; ?></span></h4>

                                        <p class="description"><a href="<?=base_url();?>poll/poll" class="profit-color">Poll</a></p>


                                         	<div class="poll-box-hover">
                                    	

	                                	                    <div class="feed-activity-list">
                      <div class="feed-element feed-element-div"> <a href="#" class="pull-left"> <img alt="image" class="img-circle" src="../assets/images/teem/a9.jpg"> </a>
                        <div class="media-body "> <small class="pull-right text-navy2"> <i class="fa fa-clock-o" aria-hidden="true"></i> 1m ago</small> <a class="btn btn-xs btn-primary pull-right profile-danger-btn"> Pending </a>  <strong class="profile-subject">Subject <br>started following information<br>Olivia Wenscombe information. <br></strong>
                        
                          <div class="actions"> <a href="#"> <span class="label label-info"> View </span></a> <a href="#"><span class="label label-success">  track </span>  </a> </div>
                        </div>
                      </div>
                         </div>

                                          <div class="feed-activity-list">
                      <div class="feed-element feed-element-div"> <a href="#" class="pull-left"> <img alt="image" class="img-circle" src="../assets/images/teem/a9.jpg"> </a>
                        <div class="media-body "> <small class="pull-right text-navy2"> <i class="fa fa-clock-o" aria-hidden="true"></i> 1m ago</small> <a class="btn btn-xs btn-primary pull-right profile-danger-btn"> Pending </a>  <strong class="profile-subject">Subject <br>started following information<br>Olivia Wenscombe information. <br></strong>
                        
                          <div class="actions"> <a href="#"> <span class="label label-info"> View </span></a> <a href="#"><span class="label label-success">  track </span>  </a> </div>
                        </div>
                      </div>
                         </div>
                                          <div class="feed-activity-list">
                      <div class="feed-element feed-element-div"> <a href="#" class="pull-left"> <img alt="image" class="img-circle" src="../assets/images/teem/a9.jpg"> </a>
                        <div class="media-body "> <small class="pull-right text-navy2"> <i class="fa fa-clock-o" aria-hidden="true"></i> 1m ago</small> <a class="btn btn-xs btn-primary pull-right profile-danger-btn"> Pending </a>  <strong class="profile-subject">Subject <br>started following information<br>Olivia Wenscombe information. <br></strong>
                        
                          <div class="actions"> <a href="#"> <span class="label label-info"> View </span></a> <a href="#"><span class="label label-success">  track </span>  </a> </div>
                        </div>
                      </div>
                         </div>
                                          <div class="feed-activity-list">
                      <div class="feed-element feed-element-div"> <a href="#" class="pull-left"> <img alt="image" class="img-circle" src="../assets/images/teem/a9.jpg"> </a>
                        <div class="media-body "> <small class="pull-right text-navy2"> <i class="fa fa-clock-o" aria-hidden="true"></i> 1m ago</small> <a class="btn btn-xs btn-primary pull-right profile-danger-btn"> Pending </a>  <strong class="profile-subject">Subject <br>started following information<br>Olivia Wenscombe information. <br></strong>
                        
                          <div class="actions"> <a href="#"> <span class="label label-info"> View </span></a> <a href="#"><span class="label label-success">  track </span>  </a> </div>
                        </div>
                      </div>
                         </div>
                                    	</div>


                                        
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-6 col-md-2">
                                <div class="panel profit visit db mbm">
                                    <div class="panel-body" id="post-box"><p class="icon"><i class="icon fa fa-envelope"></i></p><h4
                                            class="value"><span><?php echo $result->TotalPost; ?></span></h4>

                                        <p class="description"><a href="<?=base_url();?>post/post" class="profit-color">Post</a></p>


                                         	<div class="post-box-hover">
                                    	
	                    <div class="feed-activity-list">
                      <div class="feed-element feed-element-div"> <a href="#" class="pull-left"> <img alt="image" class="img-circle" src="../assets/images/teem/a9.jpg"> </a>
                        <div class="media-body "> <small class="pull-right text-navy2"> <i class="fa fa-clock-o" aria-hidden="true"></i> 1m ago</small> <a class="btn btn-xs btn-primary pull-right profile-danger-btn"> Pending </a>  <strong class="profile-subject">Subject <br>started following information<br>Olivia Wenscombe information. <br></strong>
                        
                          <div class="actions"> <a href="#"> <span class="label label-info"> View </span></a> <a href="#"><span class="label label-success">  track </span>  </a> </div>
                        </div>
                      </div>
                         </div>

                                          <div class="feed-activity-list">
                      <div class="feed-element feed-element-div"> <a href="#" class="pull-left"> <img alt="image" class="img-circle" src="../assets/images/teem/a9.jpg"> </a>
                        <div class="media-body "> <small class="pull-right text-navy2"> <i class="fa fa-clock-o" aria-hidden="true"></i> 1m ago</small> <a class="btn btn-xs btn-primary pull-right profile-danger-btn"> Pending </a>  <strong class="profile-subject">Subject <br>started following information<br>Olivia Wenscombe information. <br></strong>
                        
                          <div class="actions"> <a href="#"> <span class="label label-info"> View </span></a> <a href="#"><span class="label label-success">  track </span>  </a> </div>
                        </div>
                      </div>
                         </div>
                                          <div class="feed-activity-list">
                      <div class="feed-element feed-element-div"> <a href="#" class="pull-left"> <img alt="image" class="img-circle" src="../assets/images/teem/a9.jpg"> </a>
                        <div class="media-body "> <small class="pull-right text-navy2"> <i class="fa fa-clock-o" aria-hidden="true"></i> 1m ago</small> <a class="btn btn-xs btn-primary pull-right profile-danger-btn"> Pending </a>  <strong class="profile-subject">Subject <br>started following information<br>Olivia Wenscombe information. <br></strong>
                        
                          <div class="actions"> <a href="#"> <span class="label label-info"> View </span></a> <a href="#"><span class="label label-success">  track </span>  </a> </div>
                        </div>
                      </div>
                         </div>
                                          <div class="feed-activity-list">
                      <div class="feed-element feed-element-div"> <a href="#" class="pull-left"> <img alt="image" class="img-circle" src="../assets/images/teem/a9.jpg"> </a>
                        <div class="media-body "> <small class="pull-right text-navy2"> <i class="fa fa-clock-o" aria-hidden="true"></i> 1m ago</small> <a class="btn btn-xs btn-primary pull-right profile-danger-btn"> Pending </a>  <strong class="profile-subject">Subject <br>started following information<br>Olivia Wenscombe information. <br></strong>
                        
                          <div class="actions"> <a href="#"> <span class="label label-info"> View </span></a> <a href="#"><span class="label label-success">  track </span>  </a> </div>
                        </div>
                      </div>
                         </div>
                                    	</div>

                                        
                                    </div>
                                </div>
                            </div>
                            <?php /*
                            <div class="col-sm-6 col-md-3">
                                <div class="panel profit db mbm">
                                    <div class="panel-body"><p class="icon"><i class="icon fa fa-comment"></i></p><h4
                                            class="value"><span data-counter="" data-start="10" data-end="<?php echo $result->TotalComplaint; ?>" data-step="1"
                                                                data-duration="0"></span><span><?php echo $result->TotalComplaint; ?></span></h4> 

                                        <p class="description"><a href="<?=base_url();?>complaint/mycomplaint" class="profit-color">My Complaint</a></p>

                                        
                                    </div>
                                </div>
                            </div>
                            
                            
                            <div class="col-sm-6 col-md-3">
                                <div class="panel task db mbm">
                                    <div class="panel-body"><p class="icon"><i class="icon fa fa-lightbulb-o"></i></p><h4
                                            class="value"><span><?php echo $result->TotalSuggestion; ?></span></h4>

                                        <p class="description"><a href="<?=base_url();?>suggestion/suggestion" class="profit-color">My Suggestion</a></p>

                                        
                                    </div>
                                </div>
                            </div>
                            */ ?>

                            
                            
                        </div>

                        <?php
                        $overall_report = array(
                                                'Complaint Received' => $result->TotalComplaintReceived,
                                                'My Complaint' => $result->TotalComplaint,
                                                'Events' => $result->TotalEvent,
                                                'Suggestion Received' => $result->TotalSuggestionReceived,
                                                'Suggestion' => $result->TotalSuggestion,
                                                'Information' => $result->TotalInformation,
                                                'Posts' => $result->TotalPost,
                                                'Poll' => $result->TotalPoll,
                                                );
                        ?>

                        <div class="portlet box">
                            <div class="portlet-header">
                                <div class="caption">Overall listen report</div>
                                <!-- <div class="tools">
                                    <i class="fa fa-chevron-up"></i>
                                    <i data-toggle="modal" data-target="#modal-config" class="fa fa-cog"></i>
                                    <i class="fa fa-refresh"></i>
                                    <i class="fa fa-times"></i>
                                </div> -->
                            </div>
                            <div class="row">
                                <div class="col-lg-12">
                                    <div class="ibox float-e-margins">
                                        <div class="ibox-title">
                                            <h5>Pie Chart 3 </h5>
                                            <div class="ibox-tools">
                                                <a class="collapse-link" data-toggle="collapse" data-target="#demo8"> <i class="fa fa-chevron-up"></i><i class="fa fa-chevron-down"></i> </a>
                                                <a href="#" data-toggle="dropdown" class="dropdown-toggle">
                                                <i class="fa fa-wrench"></i> </a>
                                                <ul class="dropdown-menu dropdown-user">
                                                    <li><a href="#">Config option 1</a> </li>
                                                    <li><a href="#">Config option 2</a> </li>
                                                </ul>
                                                <a class="close-link"> <i class="fa fa-times"></i> </a>
                                            </div>
                                        </div>
                                        <div class="ibox-content collapse in" id="demo8">
                                            <div class="demo-container">
                                                <div id="pieChart3" class="demo-placeholder"></div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            
                        </div>                    
                    </div>
                </div>
            <!-- stat timeline and feed  -->
            <div class="top20">
                
                <div class="clearfix"> </div>
                <!-- End projects list -->
                
                

            </div>
        </div>
    </div>
</div>

<?php  require_once './include/scroll_top.php';?>
<?php require_once './include/footer.php';?>
</body>

<?php  require_once './include/js.php';?>


<div id="modal-stackable" tabindex="-1" role="dialog" aria-labelledby="modal-stackable-label" aria-hidden="true" class="modal fade" style="display: none;">
    <div class="modal-dialog">
        <div class="modal-content">
            
        </div>
    </div>
</div>



<script>
function openListenDetail(event_id) {

    if (event_id > 0) {
        $.post("<?php echo base_url(); ?>event/eventdetail", {event_id: event_id},
            function (data, status) {
                if(data != '') {
                    $('.modal-content').html(data);
                } else {
                    $('.modal-content').html(data);
                }



            });

        



    } else {
        sweetAlert("Oops...", "Please enter something to search leaders", "error");
        return false;
    }



}
</script>

<script>
$(document).ready(function(){
    $("#complaint").hover(function(){
        $(".complaint-box-hover").toggle();
       
    });

       $("#suggestion-box").hover(function(){
        $(".suggestion-box-hover").toggle();
       
    });

         $("#information-box").hover(function(){
        $(".information-box-hover").toggle();
       
    });

          $("#event-box").hover(function(){
        $(".event-box-hover").toggle();
       
    });

         $("#poll-box").hover(function(){
        $(".poll-box-hover").toggle();
       
    });

         $("#post-box").hover(function(){
        $(".post-box-hover").toggle();
       
    });

        $('#complaint').click(function(){

        	window.location.href ="http://localhost/kaajneeti/complaint/complaintReceived";

        });

          $('#suggestion-box').click(function(){

        	window.location.href ="http://localhost/kaajneeti/suggestion/suggestionReceived";

        });



          $('#information-box').click(function(){

        	window.location.href ="http://localhost/kaajneeti/information/information";

        });

               $('#event-box').click(function(){

        	window.location.href ="http://localhost/kaajneeti/event/event";

        });

             $('#poll-box').click(function(){

        	window.location.href ="http://localhost/kaajneeti/poll/poll";

        });

           $('#post-box').click(function(){

        	window.location.href ="http://localhost/kaajneeti/post/post";

        });



});
</script>
</body>
</html>
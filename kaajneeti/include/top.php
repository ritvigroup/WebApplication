<?php 

// echo '<pre>';
// print_r($_SESSION);
// echo '</pre>';
if($_SESSION['AdminId'] > 0) {
    $replace_controller = "admin";
} else if($_SESSION['UserTypeId'] == 2) { 
    $replace_controller = "leader";
} else if($_SESSION['UserTypeId'] > 2) {
    $replace_controller = "team";
} else {
    $replace_controller = "leader";
}
?>
    <div class="page-header navbar navbar-fixed-top">
        <!-- BEGIN HEADER INNER -->
        <div class="page-header-inner ">
            <!-- BEGIN LOGO -->
            <div class="page-logo">
                <a href="<?=base_url();?><?php echo $replace_controller; ?>/dashboard" style="color: white; font-size: 24px; text-align: center;margin-top: 7px;"> 
                    Kaajneeti
                </a>
            </div>
            <!-- END LOGO -->
            <div class="library-menu"> <span class="one">-</span> <span class="two">-</span> <span class="three">-</span> </div>
            <!-- BEGIN TOP NAVIGATION MENU -->
            <div class="top-menu">

                <div class="col-sm-5">      
                    <div class="row">
                        <div class="col-sm-12 search-box input-group">
                            <input id="search-projects" type="text" class="input-sm form-control" placeholder="Search">
                        </div>
                    </div>
                </div>
                
                

                <ul class="nav navbar-nav pull-right">
                    <li>
                        <!-- <span>
                            Sunil Vishwakarma
                        </span> -->
                        <div class="feed-element"> <a href="<?=base_url();?>profile/subprofile"> <img alt="image" class="img-circle" src="../assets/images/teem/a9.jpg" style=" margin: 5px 20px 0; "> </a></div>
                    </li>

                    <li style=" margin-left: 11px; margin-top: 7px; ">
                        <button class="express-btn" type="button" data-toggle="modal" data-target="#express-popup" onClick="return openExpressPopup();"><i class="fa fa-bullhorn"></i></button>
                    </li>
                    
                    <li class="dropdown switch-account">
                        <a href="#" data-toggle="dropdown" class="dropdown-toggle count-info"> <img src="../assets/images/switch_icon.png"> <span class="badge badge-info"></span> </a>
                        <div class="dropdown-menu dropdown-messages menuBig">
                            <div class="row">
                                <div class="col-md-12">
                                    <h3>Switch your account</h3>
                                    <div class="row">
                                        <div class="col-sm-4">
                                            <div class="contact-box">
                                                <a href="profile.html"> <img src="../assets/images/teem/a10.jpg" class="img-circle" alt="image">
                                                    <p>Susan Wenscombe</p>                                          
                                                </a>
                                                
                                            </div>
                                        </div>
                                        <div class="col-sm-4">
                                            <div class="contact-box">
                                                <a href="profile.html"> <img src="../assets/images/teem/a10.jpg" class="img-circle" alt="image">
                                                    <p>Susan Wenscombe</p>                                          
                                                </a>
                                                
                                            </div>
                                        </div>
                                        <div class="col-sm-4">
                                            <div class="contact-box">
                                                <a href="profile.html"> <img src="../assets/images/teem/a10.jpg" class="img-circle" alt="image">
                                                    <p>Add New Account</p>                                          
                                                </a>
                                                
                                            </div>
                                        </div>
                                        
                                    </div>
                                </div> 
                            </div>                                             
                        </div>

                    </li>

                    <!-- <li style="color: #fff; border-right:1px solid #fff; padding-right: 10px; float: left; padding-top: 10px;">Free Edition  <br><span style="color: skyblue; font-size: 12px;">Upgrade</span></li> -->
                    

                    <li class="dropdown user-notification">
                        <a href="#" data-toggle="dropdown" class="dropdown-toggle count-info"> <i class="fa fa-bell"></i> <span class="badge badge-primary"></span> </a>

                        <ul class="dropdown-menu dropdown-alerts menuBig">
                            <li><a href="<?=base_url();?>plan/plan"><i class="fa fa-pencil-square-o"></i>Plan</a></li>
                            <li class="divider"></li>
                            <li><a href="<?=base_url();?>organize/team"><i class="fa fa-users"></i>Team</a></li>
                            <li><a href="<?=base_url();?>organize/fleet"><i class="fa fa-car"></i>Fleet</a></li>
                            <li><a href="<?=base_url();?>organize/documents"><i class="fa fa-file-text"></i>Documents</a></li>
                            <li class="divider"></li>
                            <li><a href="<?=base_url();?>event/newevent"><i class="fa fa-calendar"></i>Event</a></li>
                            <li class="divider"></li>
                            <li><a href="<?=base_url();?>post/newpost"><i class="fa fa fa-envelope"></i>Post</a></li>
                            <li><a href="<?=base_url();?>poll/newpoll"><i class="fa fa-list-ul"</i></i>Poll</a></li>
                            <li><a href="<?=base_url();?>complaint/newcomplaint"><i class="fa fa-comment"></i>Complaint</a></li>
                            <li><a href="<?=base_url();?>information/newinformation"><i class="fa fa-info-circle"></i>Information</a></li>
                            <li class="divider"></li>
                            <li><a href="<?=base_url();?>suggestion/newsuggestion"><i class="fa fa-lightbulb-o"></i>Suggestion</a></li>
                            
                            <li class="last"></li>
                        </ul>
                    </li>

                    <li class="dropdown add">
                        <a href="#" data-toggle="dropdown" class="dropdown-toggle count-info"> <i class="fa fa-plus"></i> <span class="badge badge-info"></span> </a>
                        <div class="dropdown-menu dropdown-messages menuBig">
                            
                            <div class="col-md-12 padding-20">
                                <h3>Create</h3>
                                <div class="row">
                                    <div class="col-sm-3 add-item">
                                        <dl>
                                            <dt><a href="#">Plan</a></dt>
                                            <dd><a href="#">Goal</a></dd>
                                            <dd><a href="#">Geography</a></dd>
                                            <dd><a href="#">Audience</a></dd>
                                            <dd><a href="#">Forecast</a></dd>
                                            <dd><button id="expand" class="less hide btn btn-default btn-outline btn-sm pull-right">Expand</button></dd>
                                        </dl> 
                                        
                                    </div>
                                    <div class="col-sm-3 add-item">
                                        <dl>
                                            <dt><a href="#">Organize</a></dt>
                                            <dd><a href="#">Team</a></dd>
                                            <dd><a href="#">Fleet</a></dd>
                                            <dd><a href="#">Documents</a></dd>
                                            <dd><a href="#">Group</a></dd>
                                        </dl>
                                    </div>
                                    <div class="col-sm-3 add-item">
                                        <dl>
                                            <dt><a href="#">Listen</a></dt>
                                            <dd><a href="#">Complaint</a></dd>
                                            <dd><a href="#">Suggestion</a></dd>
                                            <dd><a href="#">Information</a></dd>
                                            <dd><a href="#">Events</a></dd>
                                            <dd><a href="#">Poll</a></dd>
                                            <dd><a href="#">Post</a></dd>
                                        </dl>
                                    </div>
                                    <div class="col-sm-3 add-item">
                                        <dl>
                                            <dt><a href="#">Connection</a></dt>
                                            <dd><a href="#">All Connection</a></dd>
                                            <dd><a href="#">Requests</a></dd>
                                            <dd><a href="#">Group</a></dd>
                                        </dl>
                                    </div>
                                </div>
                                <button class="less btn btn-default btn-outline btn-sm pull-right">Collapse</button>
                            </div>  
                                                 
                        </div>

                    </li>

                    <li class="dropdown">
                        <a href="#" data-toggle="dropdown" class="dropdown-toggle"> <i class="icon-calendar"></i></a>
                        <div class="dropdown-menu dropdown-messages calendar-menu menuBig">
                            <div class="row">
                                <div class="col-md-12">
                                    <div id='calendar'></div>
                                </div>
                            </div>
                        </div>      
                    </li>
                    
                    <!-- START USER LOGIN DROPDOWN -->
                    <li class="dropdown dropdown-user ">
                        <a data-close-others="true" data-hover="dropdown" data-toggle="dropdown" class="dropdown-toggle" href="javascript:;"><i class="fa fa-ellipsis-v setting-usr"></i> <span class="username username-hide-on-mobile">  </span>
                         </a>
                        <ul class="dropdown-menu dropdown-menu-default">
                            <li><h3 class="text-uppercase"><?php echo $this->session->userdata('Name'); ?></h3></li>
                            <li><h6><strong class="text-capitalize">User id:</strong> <?php echo $this->session->userdata('UserUniqueId'); ?></h6></li>
                            <li class="divider"> </li>

                            <li><h6><strong class="text-uppercase">Subscription</strong></h6></li>
                            <li><h6><strong>Enterprise trial</strong> expires in 15 day(s)</h6></li>
                            <li><a href="">Try Other Editions </a></li>
                            <li class="divider"> </li>

                            <li><a href="<?=base_url();?>profile/setting"><strong class="text-uppercase">Setting</strong></a></li>
                            <!-- <li><a href="#" target="_blank">New Feature</a></li> -->
                            <li class="divider"> </li>

                            <li><h6><strong class="text-uppercase">news room</strong></h6></li>
                            <li><a href="#">New Feature</a></li>
                            <li class="divider"> </li>

                            <li><a href="<?=base_url();?><?php echo $replace_controller; ?>/logout"> <i class="icon-key"></i> Log Out </a></li>
                            <li><h6 style=" background-color: #f2f2f3; "><span class="col-sm-5" style=" margin-top: 13px; ">Available on</span> <a href="#" class="text-uppercase"><img src="<?=base_url();?>assets/images/google_play_store.png" style="width: 25px; height: 25px;"></a><a href="#" class="text-uppercase"><img src="<?=base_url();?>assets/images/apple_play_store.png" style="width: 25px; height: 25px;"></h6></a></li>
                        </ul>
                    </li>
                    <!-- END USER LOGIN DROPDOWN -->
                </ul>
            </div>
            <!-- END TOP NAVIGATION MENU -->
        </div>
        <!-- END HEADER INNER -->
    </div>

    <?php // Express Start ?>
    <div id="express-popup" tabindex="-1" role="dialog" aria-labelledby="modal-stackable-label" aria-hidden="true" class="modal fade" style="display: none;">
        <div class="modal-dialog">
            <div class="modal-content modal-content-express">
                
            </div>
        </div>
    </div>
    <?php // Express End ?>


    <div class="modal fade custom-fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered model-top" role="document">
            <div class="modal-content">
                <div class="modal-header express-header">
                    <h5 class="modal-title" id="exampleModalLongTitle"></h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="button-group ">
                                <button type="button" class="btn btn-primary camera-btn"><i class="fa fa-video-camera" aria-hidden="true"></i> Camera</button>
                                <button type="button" class="btn btn-default connect-btn"><i class="fa fa-plug" aria-hidden="true"></i> Connect</button>
                            </div>

                            <h1 class="text-center camerah1">Unable to find camera</h1>
                            <p class="text-center">Please connect a camera and verify that camera permissions are correct in your browser</p><br>
                            <div class="button-group ">
                                <button type="button" data-dismiss="modal" class="btn btn-primary  ">Done</button></div>


                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>

    <div id="createEventModal" class="modal hide" tabindex="-1" role="dialog" aria-labelledby="myModalLabel1" aria-hidden="true">
        <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">x</button>
            <h3 id="myModalLabel1">Create Appointment</h3>
        </div>
        <div class="modal-body">
        <form id="createAppointmentForm" class="form-horizontal">
            <div class="control-group">
                <label class="control-label" for="inputPatient">Patient:</label>
                <div class="controls">
                    <input type="text" name="patientName" id="patientName" tyle="margin: 0 auto;" data-provide="typeahead" data-items="4" data-source="[&quot;Value 1&quot;,&quot;Value 2&quot;,&quot;Value 3&quot;]">
                      <input type="hidden" id="apptStartTime"/>
                      <input type="hidden" id="apptEndTime"/>
                      <input type="hidden" id="apptAllDay" />
                </div>
            </div>
            <div class="control-group">
                <label class="control-label" for="when">When:</label>
                <div class="controls controls-row" id="when" style="margin-top:5px;">
                </div>
            </div>
        </form>
        </div>
        <div class="modal-footer">
            <button class="btn" data-dismiss="modal" aria-hidden="true">Cancel</button>
            <button type="submit" class="btn btn-primary" id="submitButton">Save</button>
        </div>
    </div>

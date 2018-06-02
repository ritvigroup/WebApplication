<div class="modal-header">
    <button type="button" data-dismiss="modal" aria-hidden="true" class="close">×</button>
    <h4 id="modal-stackable-label" class="modal-title">Express yourself <?php echo $this->session->userdata('Name'); ?></h4>
</div>
<div class="modal-body">
    <div class="row">
        <div class="col-md-12">
            <?php /*
            <ul class="nav navbar-nav">
                <li><a href="javascript:void(0);"> <i class="fa fa-pencil" aria-hidden="true"></i> Compose Post</a></li>
                <li><a href="javascript:void(0);"> <i class="fa fa-picture-o" aria-hidden="true"></i> Photo/Video Album</a></li>
                <li><a href="javascript:void(0);" data-toggle="modal" data-target="#exampleModalCenter"> <i class="fa fa-video-camera" aria-hidden="true"></i> Live Video</a></li>
            </ul>

            
            <div class="actions action-right">

                <div class="dropdown">
                    <button onclick="myFunction()" class="dropbtn btn">&nbsp;Manage <span class="caret"></span></button>&nbsp;
                    <div id="myDropdown" class="dropdown-content">
                        <a href="#home"> Post</a>
                        <a href="#about"> Poll</a>
                        <a href="#home"> Event</a>
                        <a href="#about">Task</a>
                        <a href="#about">Calender</a>
                        <a href="#about">Social Post</a>
                        <a  data-target="#modal-stackable" data-toggle="modal" href="javascript:void(0);" onClick="return newTeam();"  href="#contact"> New Documents</a>
                        <a href="#about"> New Group</a>
                    </div>
                </div>
            </div>
            */ ?>

        </div>
    </div>


    

    <div class="row">
        <div class="col-xs-12">
            <div class="textarea-img">
                <img src="<?php echo $this->session->userdata('UserProfilePic'); ?>"  width="50"  height="50" class="img-circle">
            </div>
            <div class="form-group">
                <select name="express_public_private" id="express_public_private" class="btn btn-default express_pub_pri">
                    <option value="1">Public</option>
                    <option value="0">Private</option>
                </select>
                <textarea class="form-control placeholder" id="express_yourself_text"  placeholder="What is happening?" rows="2"></textarea>
                <?php
                // echo '<pre>';
                // print_r($Connections);
                // echo '</pre>';
                ?>
                <input type="text" id="post_location" name="post_location" placeholder="Enter Your Location" class="form-control" style="display: none;">
                <select id="post_attendee" name="post_attendee" multiple class="form-control" style="display: none;">
                    <?php
                    foreach($Connections->result AS $my_connect) {
                        echo '<option value="'.$my_connect->UserProfileId.'">'.$my_connect->FirstName.' '.$my_connect->LastName.'</option>';
                    }
                    ?>
                </select>
                <input type="file" name="file[]">

                <img src="<?php echo base_url()?>assets/images/location.png" class="location_express" id="location_express" onclick="return location_box_display();">
                <img src="<?php echo base_url()?>assets/images/tag.png" class="tag_express" id="tag_express" onclick="return tag_box_display();">
            </div>
        </div>
    </div>

    <div class="row" style="max-height: 100px; overflow-y: auto; overflow-x: none; max-width: 100%;">

        <div class="col-md-3" style="text-align:center;">
            <button type="button" class="btn btn-default round-border blue_bg" onClick="return newExpressPopupPoll();">
                <img src="<?php echo base_url(); ?>/assets/images/ic_poll_white.png" style="width: 35px; height: 35px;"> 
            </button><br>
            <span>Poll</span>
        </div>
        <div class="col-md-3" style="text-align:center;">
            <button type="button" class="btn btn-default round-border blue_bg" onClick="return newExpressPopupEvent();">
                <img src="<?php echo base_url(); ?>/assets/images/ic_event_white.png" style="width: 35px; height: 35px;"> 
            </button><br>
            <span>Event</span>
        </div>
        <div class="col-md-3" style="text-align:center;">
            <button type="button" class="btn btn-default round-border blue_bg">
                <img src="<?php echo base_url(); ?>/assets/images/ic_event_white.png" style="width: 35px; height: 35px;">
            </button><br>
            <span>Photo/Video</span>
        </div>
        <div class="col-md-3" style="text-align:center;">
            <button type="button" class="btn btn-default round-border blue_bg" data-toggle="modal" data-target="#exampleModalCenter">
                <img src="<?php echo base_url(); ?>/assets/images/ic_event_white.png" style="width: 35px; height: 35px;"> 
            </button><br>
            <span>Live Video</span>
        </div>

    </div>
   
</div>
<div class="modal-footer" style="padding: 5px !important; ">
    <div class="col-md-2">
        <?php /*<div class="dropup express-dropdown pull-right" id="my-id">
            <button type="button" class="btn btn-primary" data-dismiss="modal">Close</button>
        </div>*/ ?>
    </div>
    <div class="col-md-10 pull-right" >
        <div class="dropup express-dropdown " id="my-id">
            
            <?php /*<button class="btn btn-default dropdown-toggle" type="button"  id="my-id2" data-toggle="dropdown">Public
                <span class="caret"></span>
            </button>
            <ul class="dropdown-menu dropdown-menu2">
                <li><a href="#">Public</a></li>
                <li><a href="#">Only Me</a></li>
                <!-- <li><a href="#">My followers</a></li>
                <li><a href="#">My Connect</a></li>
                <li><a href="#">Only Me</a></li>
                <li><a href="#">Specific form</a></li> -->
            </ul>*/ ?>

             <button type="button" class="btn btn-success save_explore_post" onClick="return saveExplorePost();">Submit</button>

        </div>

       
    </div>
</div>



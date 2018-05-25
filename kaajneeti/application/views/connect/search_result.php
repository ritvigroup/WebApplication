<?php 
// echo '<pre>';
// print_r($Connections);
// echo '</pre>';
foreach($Connections->result AS $users) {
    $Name = $users->FirstName.' '.$users->LastName;

    if($users->ProfilePhotoPath != '') {
        $profile_pic = ($users->ProfilePhotoPath != '') ? $users->ProfilePhotoPath : base_url().'assets/images/default-user.png';
    } else {
        $profile_pic = ($users->ProfilePhotoPath != '') ? $users->ProfilePhotoPath : base_url().'assets/images/default-user.png';
    } 
    ?>
    <div class="grid-list-view grid col-md-6 col-sm-6" data-name="<?php echo $Name; ?>" id="connection_id_<?php echo $users->UserProfileId; ?>">
        <div class="contact-box">
            <div class="col-sm-12">
                <?php if($users->UserTypeId == 2) {?><i class="fa fa-certificate" style="position: absolute;top: 5px; left: 20px;"></i><?php } ?>
                <a href="<?=base_url();?>profile/profile"">
                    <img src="<?php echo $profile_pic; ?>" class="img-responsive" alt="image">
                </a>
                <h3><strong><?php echo $Name; ?></strong></h3>
                <p><i class="fa fa-star"></i> <?php echo $users->MyTotalConnections; ?> connections</p>
                <div class="connection-features">
                	<?php if($users->MyFriend != -1) {?>
	                    <div class="dropdown">
	                        <button class="btn aqua btn-outline btn-sm" id="follow_unfollow_<?php echo $users->UserProfileId; ?>" type="button" onClick="return followUnfollowUserProfile(<?php echo $users->UserProfileId; ?>);"><?php if($users->Following > 0) { ?><i class="fa fa-check"></i> Following<?php } else { ?>Follow<?php }?></button>

	                        <?php if($users->MyFriend == 3) {?>
		                        <button class="btn aqua btn-outline btn-sm dropdown-toggle" type="button" id="connection-featuresMenu" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
		                        <i class="fa fa-check"></i> Connected</button>
		                        <ul class="dropdown-menu dropdown-menu-left" aria-labelledby="connection-featuresMenu">
		                            <li><a href="javascript:void(0);" onClick="return getNotificationOnOff(<?php echo $users->UserProfileId; ?>);" id="connection_notification_id_<?php echo $users->UserProfileId; ?>"><?php if($users->GetNotification > 0) { echo '<i class="fa fa-check"></i>'; } ?> Get Notification</a></li>
		                            <li><a href="javascript:void(0);" onClick="return unFriend(<?php echo $users->UserProfileId; ?>);"><i class="fa fa-times"></i> Unconnect</a></li>
		                        </ul>
	                    	<?php } else if($users->MyFriend == 1) { ?>
	                    		<div class="connection-features" id="dropdown_and_button_<?php echo $users->UserProfileId; ?>" style="float:right; margin-left: 5px">
	                            	<button class="btn aqua btn-outline btn-sm " type="button" id="connection-featuresMenu" aria-expanded="false" onClick="return cancelRequest(<?php echo $users->UserProfileId; ?>);"> Cancel Request</button>
	                            </div>

	                    	<?php } else if($users->MyFriend == 2) { ?>
	                            <p id="dropdown_and_button_<?php echo $users->UserProfileId; ?>">
	                                <button class="btn blue  btn-circle" type="button" onClick="return acceptRequest(<?php echo $users->UserProfileId; ?>);"><i class="fa fa-check"></i> </button>
	                                <button class="btn btn-warning btn-circle" type="button" onClick="return deleteRequest(<?php echo $users->UserProfileId; ?>);"><i class="fa fa-times"></i> </button>
	                            </p>
	                    	<?php } else if($users->MyFriend == 0) { ?>
	                    		<div id="send_request_<?php echo $users->UserProfileId; ?>" style="float:right; margin-left: 5px">
	                                <button class="btn aqua btn-outline btn-sm " type="button" onClick="return sendConnectRequest(<?php echo $users->UserProfileId; ?>);">Send Request</button>
	                            </div>


	                        <?php } ?>
	                    </div>
	                <?php } ?>
                </div>    
            </div>
            <div class="clearfix"></div>
        </div>
        <div class="new_loader_div" id="connection_loader_id_<?php echo $users->UserProfileId; ?>"><img src="<?=base_url();?>assets/images/new-loader.gif"></div>
    </div>
<?php } ?>


<?php /*


<thead>
    <tr>
        <th style="width: 3%; padding: 10px; background: #efefef"><input
                type="checkbox" class="checkall"/></th>
        <th>Pic</th>
        <th>Name</th>
        <th>Email</th>
        <th>Gender</th>
        <th>Party</th>
        <th>Action</th>
    </tr>
    <?php
    // echo '<pre>';
    // print_r($UserProfileLeader);
    // echo '</pre>';
    ?>
    
    <?php if(count($UserProfileLeader) > 0) { ?>
        <?php foreach($UserProfileLeader AS $leader_profile) { ?>
        <?php
        $Gender = (($leader_profile->Gender == 1) ? 'Male' : (($leader_profile->Gender == 2) ? 'Female' : (($leader_profile->Gender == 3) ? 'Other' : '')));
        $ProfilePhotoPath = ($leader_profile->ProfilePhotoPath != '') ? $leader_profile->ProfilePhotoPath : base_url().'assets/images/default-user.png';

        $UserProfileHrefLink = base_url().'profile/profile/'.$leader_profile->UserUniqueId;

        ?>
        <tbody class="media-thumb" id="request_id_<?php echo $leader_profile->UserProfileLeader->UserProfileId; ?>">
            <tr>
                <td><input type="checkbox"></td>
                <td><span class="img-shadow"><img
                                src="<?php echo $ProfilePhotoPath; ?>"
                                style="border: 1px solid #fff; box-shadow: 0 2px 3px rgba(0,0,0,0.25);width: 40px; height: 40px;"
                                class="img-circle"/></span></td>
                <td><a href="<?php echo $UserProfileHrefLink; ?>" target="_blank"><h6 class="media-heading"><?php echo $leader_profile->UserProfileLeader->FirstName.' '.$leader_profile->UserProfileLeader->LastName; ?></h6>
                    </a></td>
                <td>
                    <div><?php echo $leader_profile->UserProfileLeader->Email; ?></div>
                </td>
                <td><span class="label label-success"><?php echo $Gender; ?></span></td>
                <td><span class="label label-warning"><?php echo $leader_profile->UserProfileLeader->PoliticalPartyName; ?></span></td>
                <td id="request_id_<?php echo $leader_profile->UserProfileLeader->UserProfileId; ?>">
                    <?php if($leader_profile->UserProfileLeader->MyFriend == 0) { ?>
                    <button type="button" class="btn btn-success btn-xs" onClick="return sendRequest(<?php echo $leader_profile->UserProfileLeader->UserProfileId; ?>);"><i
                            class="fa fa-plus-o"></i>&nbsp;
                        Add Friend
                    </button>
                    <?php } else if($leader_profile->UserProfileLeader->MyFriend == 1) { ?>
                    <button type="button" class="btn btn-danger btn-xs" onClick="return cancelRequest(<?php echo $leader_profile->UserProfileLeader->UserProfileId; ?>);"><i
                            class="fa fa-trash-o"></i>&nbsp;
                        Cancel Request
                    </button>
                    <?php } else if($leader_profile->UserProfileLeader->MyFriend == 2) { ?>
                    <button type="button" class="btn btn-success btn-xs" onClick="return acceptRequest(<?php echo $leader_profile->UserProfileLeader->UserProfileId; ?>);"><i
                            class="fa fa-plus-o"></i>&nbsp;
                        Accept Request
                    </button>
                    <button type="button" class="btn btn-danger btn-xs" onClick="return deleteRequest(<?php echo $leader_profile->UserProfileLeader->UserProfileId; ?>);"><i
                            class="fa fa-trash-o"></i>&nbsp;
                        Delete Request
                    </button>
                    <?php } else if($leader_profile->UserProfileLeader->MyFriend == 3) { ?>
                    <button type="button" class="btn btn-danger btn-xs" onClick="return unFriend(<?php echo $leader_profile->UserProfileLeader->UserProfileId; ?>);"><i
                            class="fa fa-trash-o"></i>&nbsp;
                        Unfriend
                    </button>
                    <?php } else if($leader_profile->UserProfileLeader->MyFriend == 4) { ?>

                    <?php } else { ?>
                    <?php } ?>
                    
                </td>
            </tr>
        </tbody>
        <?php } ?>
    <?php } else { ?>
    
    <?php }  ?>
    
</thead>
*/ ?>
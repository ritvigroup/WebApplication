
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
                
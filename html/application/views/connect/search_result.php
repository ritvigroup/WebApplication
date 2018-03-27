<table id="user-last-logged-table"
       class="table table-striped table-hover thumb-small">
    <thead>
    <tr class="condensed">
        <th scope="col"><span class="column-sorter"></span></th>
        <th scope="col">Name<span class="column-sorter"></span></th>
        <th scope="col">Email<span class="column-sorter"></span></th>
        <th scope="col">Gender<span class="column-sorter"></span></th>
        <th scope="col">Party<span class="column-sorter"></span></th>
        <th scope="col">Action<span class="column-sorter"></span></th>
    </tr>
    </thead>
    <tbody class="media-thumb">
    <?php if(count($UserProfileLeader) > 0) { ?>
        <?php foreach($UserProfileLeader AS $leader_profile) { ?>
        <?php
        $Gender = (($leader_profile->Gender == 1) ? 'Male' : (($leader_profile->Gender == 2) ? 'Female' : (($leader_profile->Gender == 3) ? 'Other' : '')));
        $ProfilePhotoPath = ($leader_profile->ProfilePhotoPath != '') ? '<img src="'.$leader_profile->ProfilePhotoPath.'"
                            class="media-object thumb"/>' : '';

        ?>
        <tr>
            <td><span class="img-shadow"><?php echo $ProfilePhotoPath; ?></span></td>
            <td><a href="javascript:void(0)"><h6 class="media-heading"><?php echo $leader_profile->UserProfileLeader->FirstName.' '.$leader_profile->UserProfileLeader->LastName; ?></h6>
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
        <?php } ?>
    <?php } else { ?>
    <tr><td colspan="100%" align="center">No Leader Found</td></tr>
    <?php }  ?>
    </tbody>
</table>
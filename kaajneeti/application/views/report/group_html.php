<table id="table_id" class="table table-hover table-striped table-bordered table-advanced tablesorter display">
    <thead>
        <tr class="condensed">
            <th scope="col">Pic<span class="column-sorter"></span></th>
            <th scope="col">Name<span class="column-sorter"></span></th>
            <th scope="col">Description<span class="column-sorter"></span></th>
            <th scope="col">Members<span class="column-sorter"></span></th>
            <th scope="col">Created By<span class="column-sorter"></span></th>
            <th scope="col">Status<span class="column-sorter"></span></th>
            <th scope="col">Added On<span class="column-sorter"></span></th>
        </tr>
        <tbody>
            <?php foreach($MyGroup->result AS $my_group) { ?>
                <?php
                $UserProfileHrefLink = base_url().'profile/subprofile/'.$my_group->UserUniqueId.'/'.$my_group->FriendGroupId;
                $UserProfileHrefLink = 'javascript:void(0);';

                if($my_group->FriendGroupPhoto != '') {
                    $profile_pic = ($my_group->FriendGroupPhoto != '') ? $my_group->FriendGroupPhoto : base_url().'assets/images/default-user.png';
                } else {
                    $profile_pic = ($my_group->FriendGroupPhoto != '') ? $my_group->FriendGroupPhoto : base_url().'assets/images/default-user.png';
                }

                $total_members = count($my_group->GroupMembers);

                $CreatedBy = $my_group->GroupProfile->FirstName.' '.$my_group->GroupProfile->LastName;

                if($my_group->GroupProfile->UserProfileId == $this->session->userdata('UserProfileId')) {
                    $CreatedBy .= ' (Me)';
                }

                $CreatedByUrl = ($my_group->GroupProfile->UserProfileId == $this->session->userdata('UserProfileId')) ? base_url().'profile/profile' : base_url().'profile/profile/'.$my_group->GroupProfile->UserProfileId

                ?>
                <tr>
                    <td><img src="<?php echo $profile_pic; ?>" style="border: 1px solid #fff; box-shadow: 0 2px 3px rgba(0,0,0,0.25);width: 30px; height: 30px;" class="img-circle"/></td>
                    <td><?php echo $my_group->FriendGroupName; ?></td>
                    <td><?php echo $my_group->FriendGroupDescription; ?></td>
                    <td><?php echo $total_members; ?></td>
                    <td><a href="<?php echo $CreatedByUrl; ?>"><?php echo $CreatedBy; ?></a></td>
                    <td><?php echo $my_group->FriendGroupStatusName; ?></td>
                    <td><?php echo $my_group->AddedOn; ?></td>
                </tr>
            <?php } ?>
        </tbody>
    </thead>
</table>

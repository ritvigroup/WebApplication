<?php
$user_profile = $SubLeaderDetail->result;
?>
<form name="plan_form" method="post" action="" onSubmit="return false;">
    <div class="modal-header">
        <button type="button" data-dismiss="modal" aria-hidden="true" class="close">×</button>
        <h4 id="modal-stackable-label" class="modal-title">Edit Team</h4>
    </div>
    <div class="modal-body">
        <div class="panel panel-white">
            <?php /*<div class="panel-heading">New Team</div>*/ ?>
            <div class="panel-body">
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label>First Name: </label>
                            <input type="text" class="form-control" id="first_name" name="first_name" placeholder="First Name" value="<?php echo $user_profile->FirstName; ?>" required>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label>Last Name: </label>
                            <input type="text" class="form-control" id="last_name" name="last_name" placeholder="Last Name" value="<?php echo $user_profile->LastName; ?>" required>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label>Email: </label>
                            <input type="text" class="form-control" id="email" name="email" placeholder="Email Address" value="<?php echo $user_profile->Email; ?>" required>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label>Department: </label>
                            <select class="form-control" id="department" name="department">
                                <?php
                                foreach($Department->result AS $department) {
                                    if($department->DepartmentStatus == 1) {
                                        $selected_d = ($user_profile->UserDepartment == $department->DepartmentId) ? ' selected="selected"' : '';
                                        echo '<option value="'.$department->DepartmentId.'" '.$selected_d.'>'.$department->DepartmentName.'</option>';
                                    }
                                }
                                ?>
                            </select>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label>Image: </label>
                            <input type="file" name="file" class="form-control fileUploadForm" />
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label>Status: </label>
                            <select class="form-control fileUploadForm" id="status">
                                <option value="2">In-Active</option>
                                <option value="1" <?php if($user_profile->ProfileStatus == 1) { echo ' selected="selected"';}?>>Active</option>
                                <option value="-1">Delete</option>
                            </select>
                        </div>
                    </div>
                    <input type="hidden" id="friend_user_profile_id" value="<?php echo $user_profile->UserProfileId; ?>">
                </div>
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                        <?php
                        $profile_pic = ($user_profile->ProfilePhotoPath != '') ? $user_profile->ProfilePhotoPath : base_url().'assets/images/default-user.png';
                        ?>
                        <img src="<?php echo $profile_pic; ?>" style="border: 1px solid #fff; box-shadow: 0 2px 3px rgba(0,0,0,0.25);width: 50px; height: 50px;" class="img-circle"/>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="modal-footer">
        <button type="submit" class="btn btn-success update_user">Update</button>
        <button type="reset" data-dismiss="modal" class="btn btn-default">Cancel</button>
    </div>
</form>



<script>


    document.querySelector('.update_user').onclick = function () {
        var $this = $(this);
        var friend_user_profile_id      = $("#friend_user_profile_id").val();
        var first_name      = $("#first_name").val();
        var last_name       = $("#last_name").val();
        var email           = $("#email").val();
        var department      = $("#department").val();
        var status          = $("#status").val();

        

        if (first_name.length > 3) {
            $('.update_user').html('Validating...');
                        
            var form_data = new FormData($('input[name^="file"]'));

            jQuery.each($('input[name^="file"]')[0].files, function(i, file) {
                form_data.append('file', file);
            });

            form_data.append('friend_user_profile_id', friend_user_profile_id);
            form_data.append('first_name', first_name);
            form_data.append('last_name', last_name);
            form_data.append('email', email);
            form_data.append('department', department);
            form_data.append('status', status);
            form_data.append('update_user', 'Y');

            jQuery.ajax({
                type: 'POST',
                cache: false,
                processData: false,
                contentType: false,
                data: form_data,
                url: "<?php echo base_url(); ?>organize/team",

                success: function(data) {
                    if (data.status === "failed") {
                        sweetAlert("Oops...", data.message, "error");
                        $('.update_user').html('Update');
                        return false;
                    } else { 
                        if (data.status === "success") {
                            $('.update_user').html('Saved');
                            window.location.href="team";
                        }
                    }
                }
            });

        } else {
            sweetAlert("Oops...", "Please enter first name", "error");
            return false;
        }
    };
</script>



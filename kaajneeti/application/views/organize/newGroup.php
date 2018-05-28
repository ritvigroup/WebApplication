<form name="plan_form" method="post" action="<?php echo base_url(); ?>" onSubmit="return false;">
    <div class="modal-header">
        <button type="button" data-dismiss="modal" aria-hidden="true" class="close">×</button>
        <h4 id="modal-stackable-label" class="modal-title">New Group</h4>
    </div>
    <div class="modal-body">
        <div class="panel panel-white">
            <div class="panel-body">
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label>Group Name: </label>
                            <input type="text" class="form-control" id="group_name" name="group_name" placeholder="Group Name" required>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label>Group Description: </label>
                            <input type="text" class="form-control" id="group_description" name="group_description" placeholder="Group Description" required>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label>Group Members: </label>
                            <select class="form-control" id="member_id" name="member_id[]" multiple="">
                                <?php
                                foreach($Connections->result AS $users) {
                                    $Name = $users->FirstName.' '.$users->LastName;

                                    if($users->ProfilePhotoPath != '') {
                                        $profile_pic = ($users->ProfilePhotoPath != '') ? $users->ProfilePhotoPath : base_url().'assets/images/default-user.png';
                                    } else {
                                        $profile_pic = ($users->ProfilePhotoPath != '') ? $users->ProfilePhotoPath : base_url().'assets/images/default-user.png';
                                    } 
                                    echo '<option value="'.$users->UserProfileId.'">'.$Name.'</option>';
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
                </div>
            </div>
        </div>
    </div>
    <div class="modal-footer">
        <button type="submit" class="btn btn-success save_group">Save</button>
        <button type="reset" data-dismiss="modal" class="btn btn-default">Cancel</button>
    </div>
</form>



<script>

    document.querySelector('.save_group').onclick = function () {
        var $this = $(this);
        var group_name          = $("#group_name").val();
        var group_description   = $("#group_description").val();
        var member_id           = $("#member_id").val();      

        if (group_name.length > 2) {
            $('.save_group').html('Saving...');
                        
            var form_data = new FormData($('input[name^="file"]'));

            jQuery.each($('input[name^="file"]')[0].files, function(i, file) {
                form_data.append('file', file);
            });

            form_data.append('group_name', group_name);
            form_data.append('group_description', group_description);
            form_data.append('member_id', member_id);
            form_data.append('save_group', 'Y');

            jQuery.ajax({
                type: 'POST',
                cache: false,
                processData: false,
                contentType: false,
                data: form_data,
                url: "<?php echo base_url(); ?>connect/group",

                success: function(data) {
                    if (data.status === "failed") {
                        sweetAlert("Oops...", data.message, "error");
                        $('.save_user').html('Save');
                        return false;
                    } else { 
                        if (data.status === "success") {
                            $('.save_user').html('Saved');
                            window.location.href="group";
                        }
                    }
                }
            });

        } else {
            sweetAlert("Oops...", "Please enter group name to proceed", "error");
            return false;
        }
    };
</script>



<?php
echo '<pre>';
print_r($SubLeaderDetail);
echo '</pre>';
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
                            <input type="text" class="form-control" id="first_name" name="first_name" placeholder="First Name" required>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label>Last Name: </label>
                            <input type="text" class="form-control" id="last_name" name="last_name" placeholder="Last Name" required>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label>Email: </label>
                            <input type="text" class="form-control" id="email" name="email" placeholder="Email Address" required>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label>Department: </label>
                            <select class="form-control" id="department" name="department">
                                <?php
                                foreach($Department->result AS $department) {
                                    if($department->DepartmentStatus == 1) {
                                        echo '<option value="'.$department->DepartmentId.'">'.$department->DepartmentName.'</option>';
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
                            <select class="form-control" id="status" name="status">
                                <option value="1">Active</option>
                                <option value="0">In-Active</option>
                            </select>
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

            form_data.append('first_name', first_name);
            form_data.append('last_name', last_name);
            form_data.append('email', email);
            form_data.append('department', department);
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



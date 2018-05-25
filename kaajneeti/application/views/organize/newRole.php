<form name="plan_form" method="post" action="<?php echo base_url(); ?>" onSubmit="return false;">
    <div class="modal-header">
        <button type="button" data-dismiss="modal" aria-hidden="true" class="close">×</button>
        <h4 id="modal-stackable-label" class="modal-title">Add New Role</h4>
    </div>
    <div class="modal-body">
        <div class="panel panel-white">
            <?php /*<div class="panel-heading">New Team</div>*/ ?>
            <div class="panel-body">
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label>Role Name: </label>
                            <input type="text" class="form-control" id="role_name" name="role_name" placeholder="Role Name" required>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label>Role Description: </label>
                            <input type="text" class="form-control" id="role_description" name="role_description" placeholder="Role Descriptoin" >
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="modal-footer">
        <button type="submit" class="btn btn-success save_role">Save</button>
        <button type="reset" data-dismiss="modal" class="btn btn-default">Cancel</button>
    </div>
</form>



<script>

    document.querySelector('.save_role').onclick = function () {
        var $this = $(this);
        var role_name           = $("#role_name").val();
        var role_description    = $("#role_description").val();

        

        if (role_name.length > 2) {
            $('.save_role').html('Validating...');
                        
            $.post("<?php echo base_url(); ?>organize/newRole", {
                                                            role_name: role_name, 
                                                            role_description: role_description,
                                                            },
            function (data, status) {
               
                if (data.status === "failed") {
                    $('.save_role').html('Save');
                    sweetAlert("Oops...", data.message, "error");
                    return false;
                } else { 
                    $('.save_role').html('Save');
                    if (data.status === "success") {
                        //console.log(data.result.UserRoleId);
                        //console.log(data.result.RoleName);
                        //sweetAlert("Oops...", data.result, "error");

                        swal(data.message, "This role is added in your role list to assign your team", "success");

                        $('#role').append('<option value="'+data.result.UserRoleId+'">'+data.result.RoleName+'</option>');
                        return false;
                    }
                }
            });

        } else {
            sweetAlert("Oops...", "Please select role name", "error");
            return false;
        }
    };
</script>



<form name="plan_form" method="post" action="<?php echo base_url(); ?>" onSubmit="return false;">
    <div class="modal-header">
        <button type="button" data-dismiss="modal" aria-hidden="true" class="close">×</button>
        <h4 id="modal-stackable-label" class="modal-title">Add New Folder</h4>
    </div>
    <div class="modal-body">
        <div class="panel panel-white">
            <?php /*<div class="panel-heading">New Team</div>*/ ?>
            <div class="panel-body">
                <div class="row">
                    <div class="col-md-12">
                        <div class="form-group">
                            <label>Folder Name: <span class="error">*</span></label>
                            <input type="text" class="form-control" id="folder_name" name="folder_name" placeholder="Folder Name" required>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12">
                        <div class="form-group">
                            <label>Folder Description: </label>
                            <input type="text" class="form-control" id="folder_description" name="folder_description" placeholder="Folder Descriptoin" >
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="modal-footer">
        <button type="submit" class="btn btn-success save_folder">Save</button>
        <button type="reset" data-dismiss="modal" class="btn btn-default">Cancel</button>
    </div>
</form>



<script>

    document.querySelector('.save_folder').onclick = function () {
        var $this = $(this);
        var folder_name           = $("#folder_name").val();
        var folder_description    = $("#folder_description").val();

        

        if (folder_name.length > 2) {
            $('.save_folder').html('Validating...');
                        
            $.post("<?php echo base_url(); ?>organize/newFolder", {
                                                            folder_name: folder_name, 
                                                            folder_description: folder_description,
                                                            },
            function (data, status) {
               
                if (data.status === "failed") {
                    $('.save_folder').html('Save');
                    sweetAlert("Oops...", data.message, "error");
                    return false;
                } else { 
                    $('.save_folder').html('Save');
                    if (data.status === "success") {
                        
                        swal(data.message, "This folder is added in your folder list to", "success");

                        $('#folder_id').append('<option value="'+data.result.DocumentFolderId+'">'+data.result.DocumentFolderName+'</option>');
                        return false;
                    }
                }
            });

        } else {
            sweetAlert("Oops...", "Please enter folder name", "error");
            return false;
        }
    };
</script>



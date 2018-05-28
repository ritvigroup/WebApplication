<form name="plan_form" method="post" action="<?php echo base_url(); ?>" onSubmit="return false;">
    <div class="modal-header">
        <button type="button" data-dismiss="modal" aria-hidden="true" class="close">×</button>
        <h4 id="modal-stackable-label" class="modal-title">New Document</h4>
    </div>
    <div class="modal-body">
        <div class="panel panel-white">
            <div class="panel-body">
                <div class="row">
                    <div class="col-md-12">
                        <div class="form-group">
                            <?php
                            // echo '<pre>';
                            // print_r($DocumentFolder);
                            // echo '</pre>';
                            ?>
                            <div style="float: right;"><a data-target="#modal-stackable-folder" data-toggle="modal" href="javascript:void(0);" onClick="return newFolder();">Add New</a></div>
                            <label>Choose Folder: </label>
                            <select class="form-control" id="folder_id" name="folder_id">
                                <?php
                                foreach($DocumentFolder->result AS $folder_value) {
                                    echo '<option value="'.$folder_value->DocumentFolderId.'">'.$folder_value->DocumentFolderName.'</option>';
                                }
                                ?>
                            </select>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12">
                        <div class="form-group">
                            <label>Document Name: </label>
                            <input type="text" class="form-control document_name" id="document_name" name="document_name" placeholder="Document Name" required>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12">
                        <div class="form-group">
                            <label>Image: </label>
                            <input type="file" name="file" class="form-control fileUploadForm" />
                        </div>
                    </div>
                </div>
                
                <div class="row">
                    
                </div>
            </div>
        </div>
    </div>
    <div class="modal-footer">
        <button type="submit" class="btn btn-success save_document">Save</button>
        <button type="reset" data-dismiss="modal" class="btn btn-default">Cancel</button>
    </div>
</form>



<script>

    document.querySelector('.save_document').onclick = function () {

        $('.save_document').prop('disabled', true);
        
        var folder_id  = $("#folder_id").val();
        var document_name  = $("#document_name").val();

        if (folder_id > 0) {
            
            var form_data = new FormData($('input[name^="file"]'));

            var files_selected = 0;
            jQuery.each($('input[name^="file"]')[0].files, function(i, file) {
                form_data.append('file', file);
                files_selected++;
            });


            if(files_selected > 0) {

                $('.save_document').html('Saving your document...');

                form_data.append('folder_id', folder_id);
                form_data.append('document_name', document_name);
                form_data.append('save_document', 'Y');

                jQuery.ajax({
                    type: 'POST',
                    cache: false,
                    processData: false,
                    contentType: false,
                    data: form_data,
                    url: "<?php echo base_url(); ?>organize/document",

                    success: function(data) {
                        if (data.status === "failed") {
                            sweetAlert("Oops...", data.message, "error");
                            $('.save_document').prop('disabled', false);
                            $('.save_document').html('Save');
                            return false;
                        } else { 
                            if (data.status === "success") {
                                window.location.href="document";
                            }
                        }
                    }
                });
            } else {
                sweetAlert("Oops...", "Please select atleast one file", "error");
                $('.save_document').prop('disabled', false);
                return false;
            }

        } else {
            sweetAlert("Oops...", "Please select any folder", "error");
            $('.save_document').prop('disabled', false);
            return false;
        }
    };
</script> 
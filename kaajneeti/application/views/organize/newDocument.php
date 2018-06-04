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
                            <lable>Upload Documents: </lable>
                            <button type="button" class="btn btn-default round-border blue_bg">
                                <img src="<?php echo base_url(); ?>assets/images/ic_event_white.png" class="document_popup_photo" style="width: 35px; height: 35px;">
                                <input type="file" name="file[]" id="documentUpload" multiple class="upload-file documentUploadForm" style="display: none;">
                            </button>
                        </div>
                    </div>
                </div>
                
                <div class="row" id="document_selected">
                    
                </div>
            </div>
        </div>
    </div>
    <div class="modal-footer">
        <input type="hidden" id="document_parent_folder_id" value="<?php echo $parent_folder_id; ?>">
        <button type="submit" class="btn btn-success save_document">Save</button>
        <button type="reset" data-dismiss="modal" class="btn btn-default">Cancel</button>
    </div>
</form>



<script>
    

    document.querySelector('.save_document').onclick = function () {

        
        
        var document_name       = $("#document_name").val();
        var parent_folder_id    = $("#document_parent_folder_id").val();
           
        var form_data = new FormData($('input[name^="file"]'));

        var files_selected = 0;
        jQuery.each($('input[name^="file"]')[0].files, function(i, file) {
            form_data.append('file[]', file);
            files_selected++;
        });

        if($('#document_selected').html() == "") {
            sweetAlert("Oops...", "Please select atleast one file", "error");
            return false;
        }

        


        if(files_selected > 0) {

            //$('.save_document').html('Saving your document...');
            //$('.save_document').prop('disabled', true);

            form_data.append('parent_folder_id', parent_folder_id);
            form_data.append('document_name', '');
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
                            window.location.href=window.location.href;
                        }
                    }
                }
            });
        } else {
            sweetAlert("Oops...", "Please select atleast one file", "error");
            $('.save_document').prop('disabled', false);
            return false;
        }
    };
</script> 
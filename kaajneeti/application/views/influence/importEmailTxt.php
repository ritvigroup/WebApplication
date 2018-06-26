<form name="plan_form" method="post" action="<?php echo base_url(); ?>influence/email" onSubmit="return false;">
    <div class="modal-header">
        <button type="button" data-dismiss="modal" aria-hidden="true" class="close">×</button>
        <h4 id="modal-stackable-label" class="modal-title">Import Email TXT</h4>
    </div>
    <div class="modal-body">
        <div class="panel panel-white">
            <div class="panel-heading">Import Email TXT</div>
            <div class="panel-body">
                
                <div class="form-group">
                    <label>Text File: </label>
                    <input type="file" name="txt_file" class="form-control fileUploadForm" />
                </div>

                <div class="form-group">
                    <label>Subject: </label>
                    <input type="text" class="form-control" id="subject_text" name="subject_text" placeholder="Subject" required>
                </div>
                <div class="form-group">
                    <label>Message: </label>
                    <textarea class="form-control" type="textarea" id="message_text" name="message_text" placeholder="Message" rows="7"></textarea>              
                </div>

                <div class="form-group">
                    <label>Attach: </label>
                    <input type="file" name="file[]" class="form-control fileUploadForm" multiple="true" />
                </div>
                
            </div>
        </div>
    </div>
    <div class="modal-footer">
        <button type="submit" class="btn btn-success btn_email_submit" onClick="return uploadEmailTxt();">Send</button>
        <button type="reset" data-dismiss="modal" class="btn btn-default">Cancel</button>
    </div>
</form>



<script>
    function uploadEmailTxt() {

        var subject_text   = $("#subject_text").val();
        var message_text   = $("#message_text").val();
        if (subject_text.length > 0) {
            $('.btn_email_submit').html('Uploading...');

            var form_data = new FormData($('input[name^="file[]"]'));

            jQuery.each($('input[name^="file[]"]')[0].files, function(i, file) {
                form_data.append('file[]', file);
            });

            jQuery.each($('input[name^="txt_file"]')[0].files, function(i, file) {
                form_data.append('txt_file', file);
            });

            form_data.append('subject_text', subject_text);
            form_data.append('message_text', message_text);
            form_data.append('email_txt', 'Y');

            jQuery.ajax({
                type: 'POST',
                cache: false,
                processData: false,
                contentType: false,
                data: form_data,
                url: "<?php echo base_url(); ?>influence/email",

                success: function(data) {
                    if (data.status === "failed") {
                        sweetAlert("Oops...", data.message, "error");
                        return false;
                    } else { 
                        $this.button('Submit');
                        if (data.status === "success") {
                            window.location.href="influence";
                        }
                    }
                }
            });

        } else {
            sweetAlert("Oops...", "Please enter email subject", "error");
            return false;
        }
    };
</script>



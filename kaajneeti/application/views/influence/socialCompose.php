<form name="plan_form" method="post" action="<?php echo base_url(); ?>influence/influence" onSubmit="return false;">
    <div class="modal-header">
        <button type="button" data-dismiss="modal" aria-hidden="true" class="close">×</button>
        <h4 id="modal-stackable-label" class="modal-title">Social Compose</h4>
    </div>
    <div class="modal-body">
        <div class="panel panel-white">
            <div class="panel-heading">Social Compose</div>
            <div class="panel-body">
                <div class="form-group">
                    <label>Post On: </label>
                    <select class="form-control" id="social_type" name="social_type">
                        <option value="Facebook">Facebook</option>
                        <option value="Twitter">Twitter</option>
                    </select>
                </div>
                <div class="form-group">
                    <label>Title: </label>
                    <input type="text" class="form-control" id="subject_text" name="subject_text" placeholder="Subject" required>
                </div>
                <div class="form-group">
                    <label>Message: </label>
                    <textarea class="form-control" type="textarea" id="message_text" name="message_text" placeholder="Message" rows="7"></textarea>              
                </div>
                <div class="form-group">
                    <label>URL: </label>
                    <input type="text" class="form-control" id="url_text" name="url_text" placeholder="Url" required>
                </div>
                <div class="form-group">
                    <label>Attach: </label>
                    <input type="file" name="file[]" class="form-control fileUploadForm" multiple="true"/>
                </div>
            </div>
        </div>
    </div>
    <div class="modal-footer">
        <button type="submit" class="btn btn-success save_social_sent">Send</button>
        <button type="reset" data-dismiss="modal" class="btn btn-default">Cancel</button>
    </div>
</form>



<script>
    document.querySelector('.save_social_sent').onclick = function () {
        var $this = $(this);
        var social_type    = $("#social_type").val();
        var subject_text   = $("#subject_text").val();
        var message_text   = $("#message_text").val();
        var url_text       = $("#url_text").val();


        if (subject_text.length > 0) {
            $this.button('Uploading...');

            
            var form_data = new FormData($('input[name^="file"]'));

            jQuery.each($('input[name^="file[]"]')[0].files, function(i, file) {
                form_data.append('file[]', file);
            });

            form_data.append('social_type', social_type);
            form_data.append('subject_text', subject_text);
            form_data.append('message_text', message_text);
            form_data.append('url_text', url_text);
            form_data.append('save_social', 'Y');

            jQuery.ajax({
                type: 'POST',
                cache: false,
                processData: false,
                contentType: false,
                data: form_data,
                url: "<?php echo base_url(); ?>influence/influence",

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
            sweetAlert("Oops...", "Please enter title", "error");
            return false;
        }
    };
</script>



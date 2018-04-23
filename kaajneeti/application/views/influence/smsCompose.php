<form name="plan_form" method="post" action="<?php echo base_url(); ?>influence/influence" onSubmit="return false;">
    <div class="modal-header">
        <button type="button" data-dismiss="modal" aria-hidden="true" class="close">×</button>
        <h4 id="modal-stackable-label" class="modal-title">Compose SMS</h4>
    </div>
    <div class="modal-body">
        <div class="panel panel-white">
            <div class="panel-heading">Compose SMS</div>
            <div class="panel-body">
                <div class="form-group">
                    <label>To: </label>
                    <input type="text" class="form-control" id="sms_text" name="sms_text" placeholder="To" required>
                </div>
              
                <div class="form-group">
                    <label>Message: </label>
                    <textarea class="form-control" type="textarea" id="message_text" name="message_text" placeholder="Message" rows="7" maxlength="160"></textarea>              
                </div>
            </div>
        </div>
    </div>
    <div class="modal-footer">
        <button type="submit" class="btn btn-success save_sms_sent">Send</button>
        <button type="reset" data-dismiss="modal" class="btn btn-default">Cancel</button>
    </div>
</form>



<script>
    document.querySelector('.save_sms_sent').onclick = function () {
        var $this = $(this);
        var sms_text        = $("#sms_text").val();
        var message_text    = $("#message_text").val();


        if (sms_text.length > 0 && message_text.length > 0) {
            $this.button('Uploading...');

            
            $.post("<?php echo base_url(); ?>influence/influence", {sms_text: sms_text, message_text: message_text, save_sms: 'Y', },
            function (data, status) {

               if (data.status === "failed") {
                    sweetAlert("Oops...", data.message, "error");
                    return false;
                } else { 
                    $this.button('Submit');
                    if (data.status === "success") {
                        window.location.href="influence";
                    }
                }
            });

        } else {
            sweetAlert("Oops...", "Please enter to and message", "error");
            return false;
        }
    };
</script>



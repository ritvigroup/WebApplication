<form name="comment_form" method="post" action="<?php echo base_url(); ?>" onSubmit="return false;" enctype="multipart/form-data">
    <div class="modal-header">
        <button type="button" data-dismiss="modal" aria-hidden="true" class="close">×</button>
        <h4 id="modal-stackable-label" class="modal-title">Comment</h4>
    </div>
    <div class="modal-body">
        <div class="panel panel-white">
            
        </div>
    </div>
    <div class="modal-footer">
        <input type="file" style="display: none;">
        <div class="col-sm-10"><input type="text" id="enter_your_comment" name="enter_your_comment" type="text" placeholder="Enter your comment" class="form-control"/></div>
        <div class="col-sm-2"><button type="submit" class="btn btn-success comment_button">Submit&nbsp;<i class="fa fa-chevron-circle-right"></i></button></div>
    </div>
</form>

<script>
    document.querySelector('.comment_button').onclick = function () {

        var enter_your_comment = $("#enter_your_comment").val();


        if (enter_your_comment.length > 0) {

            $('.comment_button').html('Please wait...&nbsp;<i class="fa fa-chevron-circle-right"></i>');
            $('.comment_button').prop('disabled', true);

            var form_data = new FormData($('input[name^="file"]'));

            jQuery.each($('input[name^="file[]"]')[0].files, function(i, file) {
                form_data.append('file[]', file);
            });

            form_data.append('enter_your_comment', enter_your_comment);
            form_data.append('save_comment', 'Y');


            jQuery.ajax({
                type: 'POST',
                cache: false,
                processData: false,
                contentType: false,
                data: form_data,
                url: "<?php echo base_url(); ?>organize/saveComment",

                success: function(data) {
                    if (data.status === "failed") {
                        sweetAlert("Oops...", data.message, "error");
                        
                    } else { 

                        if (data.status === "success") {
                            window.location.href=window.location.href;
                        }
                    }
                    $('.comment_button').prop('disabled', false);
                    $('.comment_button').html('Submit&nbsp;<i class="fa fa-chevron-circle-right"></i>');
                    return false;
                }
            });

        } else {
            sweetAlert("Oops...", "Please enter your comment", "error");
            return false;
        }
    };
</script> 

</body>
</html>
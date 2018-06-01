<?php
// echo '<pre>';
// print_r($result);
// echo '</pre>';

$total_comment = (count($result) > 0) ? '('.count($result).')' : '';
?>

<form name="comment_form" method="post" action="<?php echo base_url(); ?>" onSubmit="return false;" enctype="multipart/form-data">
    <div class="modal-header">
        <button type="button" data-dismiss="modal" aria-hidden="true" class="close">×</button>
        <input type="hidden" id="event_id" value="<?php echo $event_id; ?>">
        <h4 id="modal-stackable-label" class="modal-title">Comment <?php echo $total_comment; ?></h4>
    </div>
    <div class="modal-body">
        <div class="panel panel-white">

            <?php
            foreach($result AS $event_comment) {

                $EventCommentId = $event_comment->EventCommentId;
                $PostBy = $event_comment->CommentProfile->FirstName. ' '.$event_comment->CommentProfile->LastName;
                if($event_comment->CommentProfile->ProfilePhotoPath != '') {
                    $PostByProfilePic = ($event_comment->CommentProfile->ProfilePhotoPath != '') ? $event_comment->CommentProfile->ProfilePhotoPath : base_url().'assets/images/default-user.png';
                } else {
                    $PostByProfilePic = ($event_comment->CommentProfile->ProfilePhotoPath != '') ? $event_comment->CommentProfile->EventProfile : base_url().'assets/images/default-user.png';
                }
                ?>
                <div class="feed-element box_desgin_shadow" id="del_event_comment_<?php echo $EventCommentId; ?>">
                    <a href="#" class="pull-left">
                        <img alt="image" class="img-circle" src="<?php echo $PostByProfilePic; ?>">
                    </a>
                    <div class="media-body ">
                        <?php
                        if($this->session->userdata('UserProfileId') == $event_comment->CommentProfile->UserProfileId) {
                        ?>
                        <div style="float: right;"><a class="btn btn-xs btn-danger" onClick="return deleteMyEventComment(<?php echo $EventCommentId; ?>);"><i class="glyphicon glyphicon-remove " aria-hidden="true"></i> Delete</a></div>
                        <?php } ?>

                     <small class="pull-right text-navy"><?php echo $PostOn; ?></small>  <strong><?php echo $PostBy; ?></strong>  <small class="text-muted"><?php echo $event_comment->CommentOn; ?></small>

                    </div>
                    <p><?php echo $event_comment->CommentText; ?></p>
                </div>
                <?php
            }
            ?>
            
        </div>
    </div>
    <div class="modal-footer">
        <input type="file" name="file[]" style="display: none;">
        <div class="col-sm-10"><input type="text" id="enter_your_comment" name="enter_your_comment" type="text" placeholder="Enter your comment" class="form-control"/></div>
        <div class="col-sm-2"><button type="submit" class="btn btn-success comment_button">Submit&nbsp;<i class="fa fa-chevron-circle-right"></i></button></div>
    </div>
</form>

<script>
    document.querySelector('.comment_button').onclick = function () {

        var enter_your_comment = $("#enter_your_comment").val();
        var event_id = $("#event_id").val();


        if (enter_your_comment.length > 0) {

            $('.comment_button').html('Please wait...&nbsp;<i class="fa fa-chevron-circle-right"></i>');
            $('.comment_button').prop('disabled', true);

            var form_data = new FormData($('input[name^="file"]'));

            jQuery.each($('input[name^="file[]"]')[0].files, function(i, file) {
                form_data.append('file[]', file);
            });

            form_data.append('event_id', event_id);
            form_data.append('your_comment', enter_your_comment);
            form_data.append('save_comment', 'Y');


            jQuery.ajax({
                type: 'POST',
                cache: false,
                processData: false,
                contentType: false,
                data: form_data,
                url: "<?php echo base_url(); ?>explore/commentEvent",

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


    function deleteMyEventComment(comment_id) {

        var ans = confirm("Are you sure to delete your comment?");
        if(!ans) {
            return false;
        }

        if (comment_id > 0) {

            $.post("<?php echo base_url(); ?>explore/commentEvent", {comment_id: comment_id, delete_comment: 'Y'},
                function (data, status) {
                   
                    if (data.status === "failed") {
                        sweetAlert("Oops...", data.message, "error");
                    } else { 
                        if (data.status === "success") {
                            $('#del_event_comment_'+comment_id).html('');
                            $('#del_event_comment_'+comment_id).hide();
                        }
                    }
                    return false;
                    
                });

        } else {
            sweetAlert("Oops...", "Please select comment to delete", "error");
            return false;
        }
    }
</script> 

</body>
</html>
<script>
    $(document).ready(function() {
    // Flexible table

    //$('#table_id').DataTable();

    });

    function likePost(PostId) {

        $('#new_loader_div').show();

        $.post("<?php echo base_url(); ?>explore/likePost", {'display': 'Y', 'post_id' : PostId},
            function (data, status) {
                if(data != '') {
                    $('.express_post_like_'+PostId).html(data);
                } else {
                    //$('#display_user_detail').html(data);
                }
                $('#new_loader_div').hide();
            });       
    }

    function unlikePost(PostId) {

        $('#new_loader_div').show();

        $.post("<?php echo base_url(); ?>explore/unlikePost", {'display': 'Y', 'post_id' : PostId},
            function (data, status) {
                if(data != '') {
                    $('.express_post_unlike_'+PostId).html(data);
                } else {
                    //$('#display_user_detail').html(data);
                }
                $('#new_loader_div').hide();
            });       
    }

    function likePoll(PollId) {

        $('#new_loader_div').show();

        $.post("<?php echo base_url(); ?>explore/likePoll", {'display': 'Y', 'poll_id' : PollId},
            function (data, status) {
                if(data != '') {
                    $('.express_poll_like_'+PollId).html(data);
                } else {
                    //$('#display_user_detail').html(data);
                }
                $('#new_loader_div').hide();
            });       
    }

    function unlikePoll(PollId) {

        $('#new_loader_div').show();

        $.post("<?php echo base_url(); ?>explore/unlikePoll", {'display': 'Y', 'poll_id' : PollId},
            function (data, status) {
                if(data != '') {
                    $('.express_poll_unlike_'+PollId).html(data);
                } else {
                    //$('#display_user_detail').html(data);
                }
                $('#new_loader_div').hide();
            });       
    }
 

</script>

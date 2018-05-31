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

    function likeEvent(EventId) {

        $('#new_loader_div').show();

        $.post("<?php echo base_url(); ?>explore/likeEvent", {'display': 'Y', 'event_id' : EventId},
            function (data, status) {
                if(data != '') {
                    $('.express_event_like_'+EventId).html(data);
                } else {
                    //$('#display_user_detail').html(data);
                }
                $('#new_loader_div').hide();
            });       
    }

    function unlikeEvent(EventId) {

        $('#new_loader_div').show();

        $.post("<?php echo base_url(); ?>explore/unlikeEvent", {'display': 'Y', 'event_id' : EventId},
            function (data, status) {
                if(data != '') {
                    $('.express_event_unlike_'+EventId).html(data);
                } else {
                    //$('#display_user_detail').html(data);
                }
                $('#new_loader_div').hide();
            });       
    }

    function likeComplaint(ComplaintId) {

        $('#new_loader_div').show();

        $.post("<?php echo base_url(); ?>explore/likeComplaint", {'display': 'Y', 'complaint_id' : ComplaintId},
            function (data, status) {
                if(data != '') {
                    $('.express_complaint_like_'+ComplaintId).html(data);
                } else {
                    //$('#display_user_detail').html(data);
                }
                $('#new_loader_div').hide();
            });       
    }

    function unlikeComplaint(ComplaintId) {

        $('#new_loader_div').show();

        $.post("<?php echo base_url(); ?>explore/unlikeComplaint", {'display': 'Y', 'complaint_id' : ComplaintId},
            function (data, status) {
                if(data != '') {
                    $('.express_complaint_unlike_'+ComplaintId).html(data);
                } else {
                    //$('#display_user_detail').html(data);
                }
                $('#new_loader_div').hide();
            });       
    }
 

</script>

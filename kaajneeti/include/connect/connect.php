<script>
    function sendConnectRequest(id) {
        if (id > 0) {
            $('#connection_loader_id_'+id).show();
            $.post("<?php echo base_url(); ?>connect/sendUserProfileFriendRequest", {id: id},
                function (data, status) {

                   if (data.status === "failed") {
                        
                        sweetAlert("Oops...", data.message, "error");
                        return false;
                    } else {
                        $('#send_request_'+id).html('<button type="button" class="btn aqua btn-outline btn-sm "><i class="fa fa-check"></i> Sent</button>');
                    }
                    $('#connection_loader_id_'+id).hide();
                });
        } else {
            sweetAlert("Oops...", "Please select user to disconnect", "error");
            return false;
        }
    }

    function unFriend(id) {

        if (id > 0) {
            $('#connection_loader_id_'+id).show();
            $.post("<?php echo base_url(); ?>connect/sendUserProfileFriendRequest", {id: id},
                function (data, status) {

                   if (data.status === "failed") {
                        
                        sweetAlert("Oops...", data.message, "error");
                        return false;
                    } else {
                        $('#connection_id_'+id).html('');
                        $('#connection_id_'+id).hide();
                    }
                    $('#connection_loader_id_'+id).hide();
                });
        } else {
            sweetAlert("Oops...", "Please select user to disconnect", "error");
            return false;
        }
    }

    function getNotificationOnOff(id) {
        if (id > 0) {
            $('#connection_loader_id_'+id).show();
            $.post("<?php echo base_url(); ?>connect/getNotificationFromUserProfileOnOff", {id: id},
                function (data, status) {

                   if (data.status === "failed") {
                        
                        sweetAlert("Oops...", data.message, "error");
                        return false;
                    } else {
                        if(data.result === 1) {
                            $('#connection_notification_id_'+id).html('<i class="fa fa-check"></i> Get Notification');
                        } else {
                            $('#connection_notification_id_'+id).html(' Get Notification');
                        }
                        
                    }
                    $('#connection_loader_id_'+id).hide();
                });
        } else {
            sweetAlert("Oops...", "Please select user to disconnect", "error");
            return false;
        }
    }

    function followUnfollowUserProfile(id) {
        if (id > 0) {
            $('#connection_loader_id_'+id).show();
            $.post("<?php echo base_url(); ?>connect/followUnfollowUserProfile", {id: id},
                function (data, status) {

                   if (data.status === "failed") {
                        
                        sweetAlert("Oops...", data.message, "error");
                        return false;
                    } else {

                        if(data.result == 1) {
                            $('#follow_unfollow_'+id).html('<i class="fa fa-check"></i> Following');
                        } else {
                            $('#follow_unfollow_'+id).html(' Follow');
                        }
                        
                    }
                    $('#connection_loader_id_'+id).hide();
                });
        } else {
            sweetAlert("Oops...", "Please select user to follow and unfollow", "error");
            return false;
        }
    }

    function deleteRequest(id) {

        if (id > 0) {
            $('#connection_loader_id_'+id).show();
            $.post("<?php echo base_url(); ?>connect/cancelUserProfileFriendRequest", {id: id},
                function (data, status) {

                   if (data.status === "failed") {
                        
                        sweetAlert("Oops...", data.message, "error");
                        return false;
                    } else {
                        $('#dropdown_and_button_'+id).html('<button type="button" class="btn aqua btn-outline btn-sm btn-danger"><i class="fa fa-trash-o"></i> Declined</button>');
                    }
                    $('#connection_loader_id_'+id).hide();
                });
        } else {
            sweetAlert("Oops...", "Please select user to cancel", "error");
            return false;
        }
    }

    function acceptRequest(id) {

        if (id > 0) {
            $('#connection_loader_id_'+id).show();
            $.post("<?php echo base_url(); ?>connect/sendUserProfileFriendRequest", {id: id},
                function (data, status) {

                   if (data.status === "failed") {
                        
                        sweetAlert("Oops...", data.message, "error");
                        return false;
                    } else {

                        $('#dropdown_and_button_'+id).html('<button type="button" class="btn aqua btn-outline btn-sm btn-success "><i class="fa fa-check"></i> Connected</button>');
                    }
                    $('#connection_loader_id_'+id).hide();
                });
        } else {
            sweetAlert("Oops...", "Please select user to accept request", "error");
            return false;
        }
    }

    function cancelRequest(id) {

        if (id > 0) {
            $('#connection_loader_id_'+id).show();
            $.post("<?php echo base_url(); ?>connect/undoUserProfileFriendRequest", {id: id},
                function (data, status) {

                   if (data.status === "failed") {
                        
                        sweetAlert("Oops...", data.message, "error");
                        return false;
                    } else {
                        $('#dropdown_and_button_'+id).html('<button type="button" class="btn aqua btn-outline btn-sm btn-danger"><i class="fa fa-trash-o"></i> Cancelled</button>');
                    }
                    $('#connection_loader_id_'+id).hide();
                });
        } else {
            sweetAlert("Oops...", "Please select user to cancel", "error");
            return false;
        }
    }

    $('#list-view-id').on('click', function(){
        $(' .grid-list-view').removeClass('grid col-md-4 col-sm-6');
        $('.grid-list-view').addClass('list col-md-12 col-sm-12');
    });

    $('#grid-view-id').on('click', function(){
        $('.grid-list-view').removeClass('list col-md-12 col-sm-12');
        $('.grid-list-view').addClass('grid col-md-4 col-sm-6');
    });

    $(".dropdown-menu li a").click(function(){
        //$(this).parents(".dropdown").find('.btn').val($(this).data('value'));
        //$(this).parents(".dropdown").find('.btn').html($(this).html() + '<span class="caret"></span>');
    });


    function searchUserProfiles() {
        var search_text         = $('#search_text').val();
        var gender              = $('#gender').val();
        var political_party     = $('#political_party').val();

        $('#loader_div').show();

        //if (search_text != '' || gender != '' || political_party != '') {
            
            $.post("<?php echo base_url(); ?>connect/searchUserProfiles", {search_text: search_text, gender: gender, political_party: political_party, },
                function (data, status) {

                   if (data.status === "failed") {
                        
                        sweetAlert("Error", data.message, "error");
                        return false;
                    } else {
                        $('#search_result_show').html(data);
                    }

                    $('#loader_div').hide();

                   // $('#table_id').DataTable();
                });
        /*} else {
            sweetAlert("Error", "Please enter or select something to search", "error");
            $('#loader_div').hide();
            return false;
        }*/
    }


    function searchInConnect() {
        // Declare variables 
        var filter = $("#search_in_connect").val().toUpperCase();

        var grid_class = $('.grid');

        $( ".grid" ).each(function( index, element ) {

            var data_name = $(this).data('name');
            if (data_name.toUpperCase().indexOf(filter) > -1) {
                $(this).show();
            } else {
                 $(this).hide();
            }

        });
    }


    function getGroupNotificationOnOff(id) {
        if (id > 0) {
            $('#connection_loader_id_'+id).show();
            $.post("<?php echo base_url(); ?>connect/getNotificationFromGroupOnOff", {id: id},
                function (data, status) {

                   if (data.status === "failed") {
                        
                        sweetAlert("Oops...", data.message, "error");
                        return false;
                    } else {
                        if(data.result === 1) {
                            $('#group_notification_id_'+id).html('<i class="fa fa-check"></i> Get Notification');
                        } else {
                            $('#group_notification_id_'+id).html(' Get Notification');
                        }
                        
                    }
                    $('#connection_loader_id_'+id).hide();
                });
        } else {
            sweetAlert("Oops...", "Please select group to update notification", "error");
            return false;
        }
    }


    function exitMeFromFriendgroup(id) {
        var ans = confirm("Are you sure to leave this group?");
        if(!ans) {
            return false;
        } 
        if (id > 0) {
            $('#connection_loader_id_'+id).show();
            $.post("<?php echo base_url(); ?>connect/exitMeFromFriendgroup", {id: id},
                function (data, status) {

                   if (data.status === "failed") {
                        
                        sweetAlert("Oops...", data.message, "error");
                        
                    } else {
                        $('#group_id_'+id).html('');
                        $('#group_id_'+id).hide();
                    }
                    $('#connection_loader_id_'+id).hide();
                    return false;
                });
        } else {
            sweetAlert("Oops...", "Please select group to leave", "error");
            return false;
        }
    }

</script>
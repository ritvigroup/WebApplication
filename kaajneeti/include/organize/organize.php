
<div id="modal-stackable" tabindex="-1" role="dialog" aria-labelledby="modal-stackable-label" aria-hidden="true" class="modal fade" style="display: none;">
    <div class="modal-dialog">
        <div class="modal-content modal-content-ajax">

        </div>
    </div>
</div>

<div id="modal-stackable-role" tabindex="-1" role="dialog" aria-labelledby="modal-stackable-label" aria-hidden="true" class="modal fade" style="display: none;">
    <div class="modal-dialog">
        <div class="modal-content modal-content-ajax-role">

        </div>
    </div>
</div>

<div id="modal-stackable-folder" tabindex="-1" role="dialog" aria-labelledby="modal-stackable-label" aria-hidden="true" class="modal fade" style="display: none;">
    <div class="modal-dialog">
        <div class="modal-content modal-content-ajax-folder">

        </div>
    </div>
</div>

<script>
    $(document).ready(function() {
    // Flexible table

    //$('#table_id').DataTable();

    });

    $('.form_datetime').datetimepicker({

    });

    function showUserDetail(friend_user_profile_id) {

        $('#display_user_detail').html('Loading....');

        $.post("<?php echo base_url(); ?>organize/showUserDetail", {'friend_user_profile_id': friend_user_profile_id, 'display': 'Y'},
            function (data, status) {
                if(data != '') {
                    $('#display_user_detail').html(data);
                } else {
                    $('#display_user_detail').html(data);
                }
            });

        $('#user_detail').show();
    }

    function hideUserDetail() {
        $('#user_detail').hide();

        $('#display_user_detail').html('');
    }
    
    function newTeam() {

        $.post("<?php echo base_url(); ?>organize/newTeam", {'display': 'Y'},
            function (data, status) {
                if(data != '') {
                    $('.modal-content-ajax').html(data);
                } else {
                    $('.modal-content-ajax').html(data);
                }
            });
    }

    function editTeam(unique_profile_id, friend_user_profile_id) {

        $.post("<?php echo base_url(); ?>organize/editTeam/"+unique_profile_id+'/'+friend_user_profile_id, {'display': 'Y'},
            function (data, status) {
                if(data != '') {
                    $('.modal-content-ajax').html(data);
                } else {
                    $('.modal-content-ajax').html(data);
                }
            });
    }

    function deleteTeam(unique_profile_id, friend_user_profile_id) {

        var ans = confirm("Are you sure to delete this team member?");
        if(!ans) {
            return false;
        }

        $('#new_loader_div').show();
        $.post("<?php echo base_url(); ?>organize/deleteTeam/"+unique_profile_id+'/'+friend_user_profile_id, {'display': 'Y'},
            function (data, status) {
                
                if (data.status === "failed") {
                    sweetAlert("Oops...", data.message, "error");
                    
                } else { 
                    if (data.status === "success") {
                        window.location.href="team";
                    }
                }
                $('#new_loader_div').hide();
                return false;
            });
    }

    function addNewUserRole() {
        $.post("<?php echo base_url(); ?>organize/newRole", {'display': 'Y'},
            function (data, status) {
                if(data != '') {
                    $('.modal-content-ajax-role').html(data);
                } else {
                    $('.modal-content-ajax-role').html(data);
                }
            });
    }

    function newFleet() {

        $.post("<?php echo base_url(); ?>organize/newFleet", {'display': 'Y'},
            function (data, status) {
                if(data != '') {
                    $('.modal-content-ajax').html(data);
                } else {
                    $('.modal-content-ajax').html(data);
                }
            });
    }

    function deleteFleet(id) {

        var ans = confirm("Are you sure to delete this fleet?");
        if(!ans) {
            return false;
        }

        $('#new_loader_div').show();
        $.post("<?php echo base_url(); ?>organize/deleteFleet/"+id, {'display': 'Y'},
            function (data, status) {
                
                if (data.status === "failed") {
                    sweetAlert("Oops...", data.message, "error");
                    
                } else { 
                    if (data.status === "success") {
                        window.location.href="fleet";
                    }
                }
                $('#new_loader_div').hide();
                return false;
            });
    }

    function newDocument(parent_folder_id) {
        var parent_folder_id = (parent_folder_id > 0) ? parent_folder_id : 0;
        
        $.post("<?php echo base_url(); ?>organize/newDocument", {'display': 'Y', parent_folder_id: parent_folder_id},
            function (data, status) {
                if(data != '') {
                    $('.modal-content-ajax').html(data);
                } else {
                    $('.modal-content-ajax').html(data);
                }

                $('.document_popup_photo').click(function(){
                      $('.documentUploadForm').click();
                      $('.documentUploadForm').change(function(){

                            var file = this.files[0];
                            var name = file.name;
                            // $('.status').html(name);
                      });
                });

                $(".documentUploadForm").change(function(){
                    $('#document_selected').html('');
                    readDocumentURL(this);
                });

                
            });
    }

    function readDocumentURL(input) {
        var file_selected = input.files.length;
        if(file_selected > 5) {
            sweetAlert("Oops...", "Please select files not more than 5 at a time", "error");
            return false;
        }
        for(var i =0; i < file_selected; i++) {
            if (input.files[i]) {

                //console.log(input.files[i].name);

                var file_name = (parseInt(i)+1)+': '+input.files[i].name+'<br>';
                $('#document_selected').append(file_name);

                /*var reader = new FileReader();

                reader.onload = function (e) {

                    var file_name = (parseInt(i)+1)+': '+input.files[i].name+'<br>';
                    //$('#document_selected').append(file_name);
                    //var img = $('<img id="dynamic" style="width: 80px; height: 80px;">');
                    //img.attr('src', e.target.result);
                    //img.appendTo('#document_selected');  
                }
                reader.readAsDataURL(input.files[i]);*/
            }
        }
    }

    function deleteDocument(document_id) {

        var ans = confirm("Are you sure to delete this document?");
        if(!ans) {
            return false;
        }

        $('#new_loader_div').show();
        $.post("<?php echo base_url(); ?>organize/deleteDocument/"+document_id, {'display': 'Y'},
            function (data, status) {
                
                if (data.status === "failed") {
                    sweetAlert("Oops...", data.message, "error");
                    
                } else { 
                    if (data.status === "success") {
                        window.location.href=window.location.href;
                    }
                }
                $('#new_loader_div').hide();
                return false;
            });
    }

    function newFolder(parent_folder_id) {

        var parent_folder_id = (parent_folder_id > 0) ? parent_folder_id : 0;
        $.post("<?php echo base_url(); ?>organize/newFolder", {'display': 'Y', parent_folder_id: parent_folder_id},
            function (data, status) {
                if(data != '') {
                    $('.modal-content-ajax-folder').html(data);
                } else {
                    $('.modal-content-ajax-folder').html(data);
                }
            });
    }

    function deleteFolder(folder_id) {

        var ans = confirm("Are you sure to delete this folder and its documents?");
        if(!ans) {
            return false;
        }

        $('#new_loader_div').show();
        $.post("<?php echo base_url(); ?>organize/deleteFolder/"+folder_id, {'display': 'Y'},
            function (data, status) {
                
                if (data.status === "failed") {
                    sweetAlert("Oops...", data.message, "error");
                    
                } else { 
                    if (data.status === "success") {
                        window.location.href=window.location.href;
                    }
                }
                $('#new_loader_div').hide();
                return false;
            });
    }

    function newGroup() {

        $.post("<?php echo base_url(); ?>organize/newGroup", {'display': 'Y'},
            function (data, status) {
                if(data != '') {
                    $('.modal-content-ajax').html(data);
                } else {
                    $('.modal-content-ajax').html(data);
                }
            });
    }

    function deleteGroup(id) {

        var ans = confirm("Are you sure to delete this group?");
        if(!ans) {
            return false;
        }

        $('#new_loader_div').show();
        $.post("<?php echo base_url(); ?>organize/deleteGroup/"+id, {'display': 'Y'},
            function (data, status) {
                
                if (data.status === "failed") {
                    sweetAlert("Oops...", data.message, "error");
                    
                } else { 
                    if (data.status === "success") {
                        window.location.href="group";
                    }
                }
                $('#new_loader_div').hide();
                return false;
            });
    }

    function getGroupNotificationOnOff(id) {
        if (id > 0) {
            $('#new_loader_div').show();
            $.post("<?php echo base_url(); ?>connect/getNotificationFromGroupOnOff", {id: id},
                function (data, status) {

                   if (data.status === "failed") {
                        
                        sweetAlert("Oops...", data.message, "error");
                        
                    } else {
                        if(data.result === 1) {
                            $('#group_notification_id_'+id).html('<i class="fa fa-check"></i> Get Notification');
                        } else {
                            $('#group_notification_id_'+id).html(' Get Notification');
                        }
                    }
                    $('#new_loader_div').hide();
                    return false;
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
            $('#new_loader_div').show();
            $.post("<?php echo base_url(); ?>connect/exitMeFromFriendgroup", {id: id},
                function (data, status) {

                   if (data.status === "failed") {
                        
                        sweetAlert("Oops...", data.message, "error");
                        
                    } else {
                        if (data.status === "success") {
                            window.location.href="group";
                        }
                    }
                    $('#new_loader_div').hide();
                    return false;
                });
        } else {
            sweetAlert("Oops...", "Please select group to leave", "error");
            return false;
        }
    }

    function newEvent() {
        $('#new_loader_div').show();
        $.post("<?php echo base_url(); ?>organize/newEvent", {'display': 'Y'},
            function (data, status) {
                if(data != '') {
                    $('.modal-content-ajax').html(data);
                } else {
                    $('.modal-content-ajax').html(data);
                }
                $('.form_datetime').datetimepicker();
                $('#new_loader_div').hide();
            });
    }

    function openEventDetail(event_id) {

        if (event_id > 0) {
            $.post("<?php echo base_url(); ?>organize/eventDetail", {event_id: event_id},
                function (data, status) {
                    if(data != '') {
                        $('.modal-content-ajax').html(data);
                    } else {
                        $('.modal-content-ajax').html(data);
                    }
                });
        } else {
            sweetAlert("Oops...", "Please select event to open detail", "error");
            return false;
        }
    }

    function newPoll() {
        $('#new_loader_div').show();
        $.post("<?php echo base_url(); ?>organize/newPoll", {'display': 'Y'},
            function (data, status) {
                if(data != '') {
                    $('.modal-content-ajax').html(data);
                } else {
                    $('.modal-content-ajax').html(data);
                }
                //$('.form_datetime').datetimepicker();
                $('#new_loader_div').hide();
            });

        $('#new_loader_div').hide();
    }

    function openPollDetail(poll_id) {

        if(poll_id > 0) {
            $.post("<?php echo base_url(); ?>organize/pollDetail/"+poll_id, {'display': 'Y', 'poll_id': poll_id},
                function (data, status) {
                    if(data != '') {
                        $('.modal-content-ajax').html(data);
                    } else {
                        $('.modal-content-ajax').html(data);
                    }
                });
        } else {
            sweetAlert("Oops...", "Please select poll to open detail", "error");
            return false;
        }
    }

</script>


<script>
    $(document).ready(function(){

        $("#all_user_div").click(function(){
            $(".activate_user_div").show();
            $(".inactivate_user_div").show();
            $(".not_accepted_user_div").show();
        });
        $("#activate_user_div").click(function(){
            $(".activate_user_div").show();
            $(".inactivate_user_div").hide();
            $(".not_accepted_user_div").hide();
        });
        $("#inactivate_user_div").click(function(){
            $(".activate_user_div").hide();
            $(".inactivate_user_div").show();
            $(".not_accepted_user_div").hide();
        });
        $("#not_accepted_user_div").click(function(){
            $(".activate_user_div").hide();
            $(".inactivate_user_div").hide();
            $(".not_accepted_user_div").show();
        });

        $(".bootstrap-table .dropdown-menu li").addClass('ui-state-default');

        //$( ".bootstrap-table .dropdown-menu" ).sortable();

    });
</script>

<script type="text/javascript">

    $(document).ready(function(){

        $('#organize-active ul li').click(function(){

            var innerVAL =$(this).text();

            $('#active-id').text(innerVAL)
        })


        $('#organize-active2 ul li').click(function(){

            var innerVAL =$(this).text();

            $('#active-id2').text(innerVAL)
        })



        $('#organize-active3 ul li').click(function(){

            var innerVAL =$(this).text();

            $('#active-id3').text(innerVAL)
        })



        $('#organize-active4 ul li').click(function(){

            var innerVAL =$(this).text();

            $('#active-id4').text(innerVAL)
        })


        $('#organize-active5 ul li').click(function(){

            var innerVAL =$(this).text();

            $('#active-id5').text(innerVAL)
        })


        $('#organize-active6 ul li').click(function(){

            var innerVAL =$(this).text();

            $('#active-id6').text(innerVAL)
        })

    });
</script>
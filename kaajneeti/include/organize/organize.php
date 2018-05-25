
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

<script>
    $(document).ready(function() {
    // Flexible table

    //$('#table_id').DataTable();

    });

    $('.form_datetime').datetimepicker({

    });

    function showUserDetail() {

        $('#display_user_detail').html('Loading....');

        $.post("<?php echo base_url(); ?>organize/showUserDetail", {'display': 'Y'},
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

    function newDocument() {

        $.post("<?php echo base_url(); ?>organize/newDocument", {'display': 'Y'},
            function (data, status) {
                if(data != '') {
                    $('.modal-content-ajax').html(data);
                } else {
                    $('.modal-content-ajax').html(data);
                }
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

</script>
<div id="modal-stackable" tabindex="-1" role="dialog" aria-labelledby="modal-stackable-label" aria-hidden="true" class="modal fade" style="display: none;">
    <div class="modal-dialog">
        <div class="modal-content">
            
        </div>
    </div>
</div>

<div id="modal-stackable-user-profile" tabindex="-1" role="dialog" aria-labelledby="modal-stackable-label" aria-hidden="true" class="modal fade" style="display: none;">
    <div class="modal-dialog">
        <div class="modal-content-user-profile" style="background: #FFFFFF;">
            
        </div>
    </div>
</div>


<script>
    $(document).ready(function() {
        // Flexible table

        //$('#table_id').DataTable();

    });

    function viewUserDetail(user_unique_id) {

        $.post("<?php echo base_url(); ?>profile/userdetail/"+user_unique_id, {'display': 'Y'},
            function (data, status) {
                if(data != '') {
                    $('.modal-content-user-profile').html(data);
                } else {
                    $('.modal-content-user-profile').html(data);
                }
            });
    }


    function viewUserProfileDetail(user_profile_id, friend_user_profile_id) {

        $.post("<?php echo base_url(); ?>profile/userprofiledetail/"+user_profile_id+"/"+friend_user_profile_id, {'display': 'Y'},
            function (data, status) {
                if(data != '') {
                    $('.modal-content-user-profile').html(data);
                } else {
                    $('.modal-content-user-profile').html(data);
                }
            });
    }
</script>
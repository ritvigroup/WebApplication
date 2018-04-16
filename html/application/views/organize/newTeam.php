<form name="plan_form" method="post" action="<?php echo base_url(); ?>influence/influence" onSubmit="return false;">
    <div class="modal-header">
        <button type="button" data-dismiss="modal" aria-hidden="true" class="close">×</button>
        <h4 id="modal-stackable-label" class="modal-title">New Team</h4>
    </div>
    <div class="modal-body">
        <div class="panel panel-white">
            <div class="panel-heading">New Team</div>
            <div class="panel-body">
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label>Search: </label>
                            <input type="text" class="form-control" id="search_user" name="search_user" autocomplete="off" placeholder="Search Users" required>
                            <input type="button" value="Search" class="btn btn-default search_button">
                        </div>
                    </div>
                    <div class="col-md-6">
              
                        <div class="form-group">
                            <label>User: </label>
                            <select class="form-control" id="friend_profile" name="friend_profile">
                                <option value="">No User Found</option>
                            </select>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label>First Name: </label>
                            <input type="text" class="form-control" id="first_name" name="first_name" placeholder="First Name" required>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label>Last Name: </label>
                            <input type="text" class="form-control" id="last_name" name="last_name" placeholder="Last Name" required>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label>Email: </label>
                            <input type="text" class="form-control" id="email" name="email" placeholder="Email Address" required>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label>Image: </label>
                            <input type="file" name="file" class="form-control fileUploadForm" />
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="modal-footer">
        <button type="submit" class="btn btn-success save_user">Save</button>
        <button type="reset" data-dismiss="modal" class="btn btn-default">Cancel</button>
    </div>
</form>



<script>

    document.querySelector('.search_button').onclick = function () {
        var search_user = $("#search_user").val();

        if (search_user.length > 0) {

            $('.search_button').val('Searching...');

            $.post("<?php echo base_url(); ?>leader/searchLeaderProfiles", {search: search_user},
                function (data, status) {

                    if(data != '') {
                        $('#friend_profile').html(data);
                    } else {
                        $('#friend_profile').html('<option value="">No User Found</option>');
                    }
                    $('.search_button').val('Search');
                });
        } else {
            sweetAlert("Oops...", "Please enter something to search leaders", "error");
            return false;
        }
    };

    document.querySelector('.save_user').onclick = function () {
        var $this = $(this);
        var friend_profile  = $("#friend_profile").val();
        var first_name      = $("#first_name").val();
        var last_name       = $("#last_name").val();
        var email           = $("#email").val();


        if (friend_profile > 0 && first_name.length > 3) {
            $this.button('Uploading...');

            
            var form_data = new FormData($('input[name^="file"]'));

            jQuery.each($('input[name^="file"]')[0].files, function(i, file) {
                form_data.append('file', file);
            });

            form_data.append('friend_profile', friend_profile);
            form_data.append('first_name', first_name);
            form_data.append('last_name', last_name);
            form_data.append('email', email);
            form_data.append('save_user', 'Y');

            jQuery.ajax({
                type: 'POST',
                cache: false,
                processData: false,
                contentType: false,
                data: form_data,
                url: "<?php echo base_url(); ?>organize/team",

                success: function(data) {
                    if (data.status === "failed") {
                        sweetAlert("Oops...", data.message, "error");
                        return false;
                    } else { 
                        $this.button('Submit');
                        if (data.status === "success") {
                            window.location.href="team";
                        }
                    }
                }
            });

        } else {
            sweetAlert("Oops...", "Please select user and enter first name", "error");
            return false;
        }
    };
</script>


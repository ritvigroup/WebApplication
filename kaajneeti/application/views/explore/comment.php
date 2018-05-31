<form name="plan_form" method="post" action="<?php echo base_url(); ?>" onSubmit="return false;" enctype="multipart/form-data">
    <div class="modal-header">
        <button type="button" data-dismiss="modal" aria-hidden="true" class="close">×</button>
        <h4 id="modal-stackable-label" class="modal-title">Comment</h4>
    </div>
    <div class="modal-body">
        <div class="panel panel-white">
            <div class="panel-body" style="max-height: 500px;overflow-y: auto;">
                <div class="row">
                    
                    <div class="col-md-12">
                        <div class="form-group event-form" style="margin-top: 15px;">
                            <textarea
                                id="comment" name="comment" type="text" placeholder="Enter your comment"
                                class="form-control"/></textarea>
                            
                        </div>
                    </div>
                    <div class="col-md-12">
                        <div class="form-group"><button type="submit" class="btn btn-success comment_button">Submit&nbsp;<i class="fa fa-chevron-circle-right"></i></button></div>
                    </div>

                </div>
            </div>
        </div>
    </div>
</form>

<script>

    document.querySelector('.search_button').onclick = function () {
        var search_attendee = $("#search_attendee").val();

        if (search_attendee.length > 0) {
            //var pattern = /^\b[A-Z0-9._%-]+@[A-Z0-9.-]+\.[A-Z]{2,4}\b$/i;

            $.post("<?php echo base_url(); ?>leader/searchLeaderProfiles", {search: search_attendee},
                function (data, status) {

                    if(data != '') {
                        $('#event_attendee').html(data);
                    } else {
                        $('#event_attendee').html('<option value="">No Leader Found</option>');
                    }
                });
        } else {
            sweetAlert("Oops...", "Please enter something to search leaders", "error");
            return false;
        }
    };


    document.querySelector('.event_button').onclick = function () {

        var event_name          = $("#event_name").val();
        var event_description   = $("#event_description").val();
        var event_location      = $("#event_location").val();
        var start_date          = $("#start_date").val();
        var end_date            = $("#end_date").val();


        if (event_name.length > 0) {

            $('#new_loader_div').show();
            var event_attend = '';
            $('#event_attendee :selected').each(function(i, selected) {
                event_attend += $(selected).val()+',';
            });
            
            var form_data = new FormData($('input[name^="file"]'));

            jQuery.each($('input[name^="file[]"]')[0].files, function(i, file) {
                form_data.append('file[]', file);
            });

            form_data.append('event_name', event_name);
            form_data.append('event_description', event_description);
            form_data.append('event_location', event_location);
            form_data.append('start_date', start_date);
            form_data.append('end_date', end_date);
            form_data.append('event_attendee', event_attend);
            form_data.append('save_event', 'Y');


            jQuery.ajax({
                type: 'POST',
                cache: false,
                processData: false,
                contentType: false,
                data: form_data,
                url: "<?php echo base_url(); ?>organize/event",

                success: function(data) {
                    if (data.status === "failed") {
                        sweetAlert("Oops...", data.message, "error");
                        
                    } else { 

                        if (data.status === "success") {
                            window.location.href="event";
                        }
                    }
                    $('#new_loader_div').hide();
                    return false;
                }
            });

        } else {
            sweetAlert("Oops...", "Please enter event name", "error");
            return false;
        }
    };
</script> 

</body>
</html>
<!DOCTYPE html>
<html lang="en">
<head><title>New Event</title>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="cache-control" content="no-cache">
    <meta http-equiv="expires" content="Thu, 19 Nov 1900 08:52:00 GMT">
    <?php  require_once './include/css.php';?>
</head>
<body class="page-header-fixed ">
    
    <?php  require_once './include/top.php';?>

    <div class="clearfix"> </div>
    <div class="page-container">
        
        <?php  require_once './include/left.php';?>

        <!-- Start page content wrapper -->
        <div class="page-content-wrapper animated fadeInRight">
            <div class="page-content">
                <div class="row  border-bottom white-bg dashboard-header">
                    <div class="col-lg-12">
                        <div class="portlet box portlet-green">
                            <div class="portlet-header">
                                <h1>New Event</h1>
                            </div>
                            <div class="portlet-body">
                                
                                <h3 class="mbxl">Save Your New Event</h3>

                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group"><label for="event_name"
                                                                       class="control-label">Title <span
                                                class='require'>*</span></label><input id="event_name" name="event_name" type="text" placeholder="Event Title" class="form-control" onkeyup="return showPreviewTextAfterType('event_name', 'prev_event_name');" /><i
                                                class="alert alert-hide">Oops! Forgot something? Let try
                                            again.</i>
                                        </div>
                                    </div>
                                


                                    <div class="col-md-6">
                                                <div class="form-group"><label for="event_location" class="control-label">Location<span class='require'>*</span></label>

                                                    <div class="input-icon right"><i class="fa fa-location-arrow"></i><input id="event_location" name="event_location" type="text" placeholder="Event Location" class="form-control"></div>
                                                </div>
                                            </div>


                                </div>
                                
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="form-group event-form" style="margin-top: 15px;">
                                            <label for="event_description" class="control-label">Description</label>
                                            <textarea
                                                id="event_description" name="event_description" type="text" placeholder="Event Description"
                                                class="form-control"/></textarea>
                                            <i class="alert alert-hide">Oops! Forgot something? Let try again.</i>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                        
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label class="col-md-2 control-label">Start Date</label>
                                            <div class="input-group date form_datetime col-md-5" data-date-format="dd MM yyyy HH:ii p" data-link-field="dtp_input1">
                                                <input class="form-control" size="25" id="start_date" name="start_date" type="text" value="" readonly>
                                                <span class="input-group-addon"><span class="glyphicon glyphicon-remove"></span></span> <span class="input-group-addon"><span class="glyphicon glyphicon-th"></span></span>
                                            </div>
                                            <input type="hidden" id="dtp_input1" value="" />
                                            <br/>
                                        </div>
                                    </div>


                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label class="col-md-2 control-label">End Date</label>
                                            <div class="input-group date form_datetime col-md-5" data-date-format="dd MM yyyy HH:ii p" data-link-field="dtp_input2">
                                                <input class="form-control" size="16" id="end_date" name="end_date" type="text" value="" readonly>
                                                <span class="input-group-addon"><span class="glyphicon glyphicon-remove"></span></span> <span class="input-group-addon"><span class="glyphicon glyphicon-th"></span></span>
                                            </div>
                                            <input type="hidden" id="dtp_input2" value="" />
                                            <br/>
                                        </div>
                                    </div>

                                </div>

                                <div class="row">

                                          <div class="col-md-12">
                                        <div class="form-group"  style="margin-top: 15px;">
                                            <label class="control-label">Every <span class='require'>*</span></label>
                                            <input id="year" name="every_year" type="radio" class="form-control"/>Year
                                            <input id="month" name="every_year" type="radio" class="form-control"/>Month
                                        </div>
                                    </div>
                                  
                                </div>
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group" style="margin-top: 15px;"><label for="search_attendee"
                                                                       class="control-label">Event Attendees</label>
                                            <input id="search_attendee" type="text" name="search" placeholder="search.." class="form-control"/ style="position: relative;">

                                             <div class="form-group pull-right">

                                                <i class="fa fa-search search_button " aria-hidden="true" style="position: absolute; margin-top: -22px; margin-left: -20px;"></i></div>

                                        </div>


                                    </div>

                                             <div class="col-md-6">
                                        <div class="form-group"  style="margin-top: 15px;"><label for="files"
                                                                       class="control-label">Select Event Images</label>
                                            <input type="file" name="file[]" class="form-control fileUploadForm" multiple="true"/><br>
                                        </div>
                                    </div>
                                 
                        
                                </div>

                                <div class="row">
                                           <div class="col-md-6">
                                        <div class="form-group"><label for="event_attendee"
                                                                       class="control-label"></label><select
                                                id="event_attendee" name="event_attendee" multiple class="form-control">
                                            <option value="">Select Attendee</option>
                                        </select></div>
                                    </div>
                                </div>

                            </div>

                            <div class="form-group"><button type="submit" class="btn btn-success event_button">Submit&nbsp;<i class="fa fa-chevron-circle-right"></i></button></div>
                        </div>
                    </div>
                </div>
            <!-- stat timeline and feed  -->
                <div class="top20">
                    
                    <div class="clearfix"> </div>
                    <!-- End projects list -->
                    
                    

                </div>
            </div>
        </div>
    </div>

    <?php  require_once './include/scroll_top.php';?>
<?php  require_once './include/footer.php';?>
</body>

<?php  require_once './include/js.php';?>


<script>

    function showPreviewTextAfterType(from_text_field, show_where_id) {
        $('#'+show_where_id).html($('#'+from_text_field).val());
    }
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


            jQuery.ajax({
                type: 'POST',
                cache: false,
                processData: false,
                contentType: false,
                data: form_data,
                url: "<?php echo base_url(); ?>event/newevent",

                success: function(data) {
                    if (data.status === "failed") {
                        sweetAlert("Oops...", data.message, "error");
                        return false;
                    } else { 

                        if (data.status === "success") {
                            window.location.href="event";
                        }
                    }
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
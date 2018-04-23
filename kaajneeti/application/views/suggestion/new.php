<!DOCTYPE html>
<html lang="en">
<head><title>New Suggestion</title>
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
                                <h1>New Suggestion</h1>
                                <div class="actions">
                                    <a href="<?=base_url();?>suggestion/suggestionReceived" class="btn btn-info btn-xs"><i class="fa fa-plus"></i>&nbsp;Suggestion Received</a>&nbsp;
                                    <a href="<?=base_url();?>suggestion/newsuggestion" class="btn btn-info btn-xs"><i class="fa fa-plus"></i>&nbsp;New Suggestion</a>&nbsp;
                                    <a href="<?=base_url();?>suggestion/suggestion" class="btn btn-info btn-xs"><i class="fa fa-plus"></i>&nbsp;My Suggestion</a>&nbsp;
                                </div>
                            </div>
                            <div class="portlet-body">
                                

                                <h3 class="mbxl">Save Your New Suggestion</h3>

                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="form-group"><label for="suggestion_subject"
                                                                       class="control-label">Subject <span
                                                class='require'>*</span></label><input id="suggestion_subject" name="suggestion_subject"
                                                                                       type="text"
                                                                                       placeholder="Suggestion Title"
                                                                                       class="form-control"/><i
                                                class="alert alert-hide">Oops! Forgot something? Let try
                                            again.</i>
                                        </div>
                                    </div>
                                </div>
                                
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label for="suggestion_description" class="control-label">Description</label>
                                            <textarea
                                                id="suggestion_description" name="suggestion_description" type="text" placeholder="Suggestion Description"
                                                class="form-control"/></textarea>
                                            <i class="alert alert-hide">Oops! Forgot something? Let try again.</i>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-4">
                                        <div class="form-group"><label for="applicant_name"
                                                                       class="control-label">Applicant Name <span
                                                class='require'>*</span></label><input id="applicant_name" name="applicant_name"
                                                                                       type="text"
                                                                                       placeholder="Name"
                                                                                       class="form-control"/><i
                                                class="alert alert-hide">Oops! Forgot something? Let try
                                            again.</i>
                                        </div>
                                    </div>

                                    <div class="col-md-4">
                                        <div class="form-group"><label for="applicant_father_name"
                                                                       class="control-label">Applicant Father Name <span
                                                class='require'>*</span></label><input id="applicant_father_name" name="applicant_father_name"
                                                                                       type="text"
                                                                                       placeholder="Father Name"
                                                                                       class="form-control"/><i
                                                class="alert alert-hide">Oops! Forgot something? Let try
                                            again.</i>
                                        </div>
                                    </div>
                                    
                                </div>
                                    
                                
                                <div class="row">
                                    <div class="col-md-4">
                                        <div class="form-group"><label for="search_attendee"
                                                                       class="control-label">Search</label>
                                            <input id="search_attendee" type="text" name="search" placeholder="search.." class="form-control"/>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group"><label>&nbsp;</label><input type="button" class="search_button" value="Search"></div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group"><label for="assign_to_profile_id"
                                                                       class="control-label">Suggestion Applied To</label><select
                                                id="assign_to_profile_id" name="assign_to_profile_id" class="form-control">
                                            <option value="">Select Attendee</option>
                                        </select></div>
                                    </div>
                                </div>

                            </div>
                            <div class="form-group"><button type="submit" class="btn btn-success suggestion_button">Submit&nbsp;<i class="fa fa-chevron-circle-right"></i></button></div>
                        </div>
                    </div>
                    
                </div>
                
            </div>
            <!-- stat timeline and feed  -->
                <div class="top20">
                    
                    <div class="clearfix"> </div>
                    <!-- End projects list -->
                    
                    <?php  require_once './include/footer.php';?>

                </div>
            </div>
        </div>
    </div>
    
    <?php  require_once './include/scroll_top.php';?>

</body>

<?php  require_once './include/js.php';?>

<script>
    document.querySelector('.search_button').onclick = function () {
        var search_attendee = $("#search_attendee").val();

        if (search_attendee.length > 0) {
            //var pattern = /^\b[A-Z0-9._%-]+@[A-Z0-9.-]+\.[A-Z]{2,4}\b$/i;

            $.post("<?php echo base_url(); ?>leader/searchLeaderProfiles", {search: search_attendee},
                function (data, status) {
                    console.log(data);
                    if(data != '') {
                        $('#assign_to_profile_id').html(data);
                    } else {
                        $('#assign_to_profile_id').html('<option value="">No Leader Found</option>');
                    }
                });
        } else {
            sweetAlert("Oops...", "Please enter something to search leaders", "error");
            return false;
        }
    };


    document.querySelector('.suggestion_button').onclick = function () {
        var $this = $(this);
        var suggestion_subject          = $("#suggestion_subject").val();
        var suggestion_description      = $("#suggestion_description").val();
        var applicant_name              = $("#applicant_name").val();
        var applicant_father_name       = $("#applicant_father_name").val();
        var assign_to_profile_id        = $("#assign_to_profile_id").val();


        if (suggestion_subject.length > 0) {
            $this.button('Uploading...');

            $.post("<?php echo base_url(); ?>suggestion/newsuggestion", {
                                                            suggestion_subject: suggestion_subject, 
                                                            suggestion_description: suggestion_description,
                                                            applicant_name: applicant_name,
                                                            applicant_father_name: applicant_father_name,
                                                            assign_to_profile_id: assign_to_profile_id,
                                                            },
                function (data, status) {
                   
                    if (data.status === "failed") {
                        sweetAlert("Oops...", data.message, "error");
                        return false;
                    } else { 
                        $this.button('Submit');
                        if (data.status === "success") {
                            window.location.href="suggestion";
                        }
                    }
                });
        } else {
            sweetAlert("Oops...", "Please enter suggestion subject", "error");
            return false;
        }
    };
</script> 

</body>
</html>
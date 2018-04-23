<!DOCTYPE html>
<html lang="en">
<head><title>Report</title>
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
                                <h1>Report</h1>
                                <div class="actions">
                                    <?php echo $this->payment_links; ?>
                                </div>
                            </div>
                            <div class="portlet-body">
                                <h3 style="text-align:right;">Wallet Balance: &#8377; <?php echo $result->MyWalletBalance;?></h3>
                                <?php
                                // echo '<pre>';
                                // print_r($result);
                                // echo '</pre>';
                                ?>

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
    $(document).ready(function() {
        // Flexible table

        $('#table_id').DataTable();

    });
</script>

<script>
    var prev_leader_leader = '';
    function searchLeader() {
        var search_attendee = $("#search_attendee").val();

        if(prev_leader_leader == '') {
            prev_leader_leader = $('#assign_to_profile_id').html();
        }

        if (search_attendee.length > 0) {
            //var pattern = /^\b[A-Z0-9._%-]+@[A-Z0-9.-]+\.[A-Z]{2,4}\b$/i;

            $.post("<?php echo base_url(); ?>leader/searchLeaderProfiles", {search: search_attendee},
                function (data, status) {

                    if(data != '') {
                        $('#assign_to_profile_id').html(data);
                    } else {
                        $('#assign_to_profile_id').html(prev_leader_leader+'<option value="">No Leader Found</option>');
                    }
                });
        } else {
            $('#assign_to_profile_id').html(prev_leader_leader);
            //sweetAlert("Oops...", "Please enter something to search leaders", "error");
            return false;
        }
    };


    document.querySelector('.complaint_button').onclick = function () {
        var $this = $(this);
        var complaint_type_id       = $("#complaint_type_id").val();
        var complaint_subject       = $("#complaint_subject").val();
        var complaint_description   = $("#complaint_description").val();
        var applicant_name          = $("#applicant_name").val();
        var applicant_father_name   = $("#applicant_father_name").val();
        var applicant_mobile        = $("#applicant_mobile").val();
        var assign_to_profile_id    = $("#assign_to_profile_id").val();


        if (complaint_subject.length > 0) {
            $this.button('Uploading...');

            var complaint_member = '';
            $('#complaint_member :selected').each(function(i, selected) {
                complaint_member += $(selected).val()+',';
            });
            
            var form_data = new FormData($('input[name^="file"]'));

            jQuery.each($('input[name^="file[]"]')[0].files, function(i, file) {
                form_data.append('file[]', file);
            });

            form_data.append('complaint_type_id', complaint_type_id);
            form_data.append('complaint_subject', complaint_subject);
            form_data.append('complaint_description', complaint_description);
            form_data.append('applicant_name', applicant_name);
            form_data.append('applicant_father_name', applicant_father_name);
            form_data.append('applicant_mobile', applicant_mobile);
            form_data.append('assign_to_profile_id', assign_to_profile_id);
            form_data.append('complaint_member', complaint_member);


            jQuery.ajax({
                type: 'POST',
                cache: false,
                processData: false,
                contentType: false,
                data: form_data,
                url: "<?php echo base_url(); ?>complaint/newcomplaint",

                success: function(data) {
                    if (data.status === "failed") {
                        sweetAlert("Oops...", data.message, "error");
                        return false;
                    } else { 
                        $this.button('Submit');
                        if (data.status === "success") {
                            window.location.href="mycomplaint";
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
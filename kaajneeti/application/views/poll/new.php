<!DOCTYPE html>
<html lang="en">
<head><title>Search</title>
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
                                <div class="caption">New Poll</div>
                            </div>
                            <div class="portlet-body">
                                

                                <h3 class="mbxl">Save Your New Poll</h3>

                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="form-group"><label for="event_name"
                                                                       class="control-label">Question <span
                                                class='require'>*</span></label><input id="poll_question" name="poll_question"
                                                                                       type="text"
                                                                                       placeholder="Question"
                                                                                       class="form-control"/><i
                                                class="alert alert-hide">Oops! Forgot something? Let try
                                            again.</i>
                                        </div>
                                    </div>
                                </div>
                                
                                <div class="row">
                                    <div class="col-md-4">
                                        <div class="form-group"><label for="event_location"
                                                                       class="control-label">Privacy <span
                                                class='require'>*</span></label>
                                                <input id="poll_privacy_public" name="poll_privacy" type="radio" class="form-control"/>Public
                                                <input id="poll_privacy_private" name="poll_privacy" type="radio" class="form-control"/>Private
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group"><label for="valid_from_date"
                                                                       class="control-label">Start Date <span
                                                class='require'>*</span></label>
                                                <div class="input-group datetimepicker-default date">
                                                    <input type="text" id="valid_from_date" name="valid_from_date" class="form-control"><span class="input-group-addon"><i class="fa fa-calendar"></i></span>
                                                </div> 
                                                
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="valid_end_date" class="control-label">End Date <span
                                                class='require'>*</span></label>
                                            <div class="input-group datetimepicker-default date">
                                                <input type="text" id="valid_end_date" name="valid_end_date" class="form-control"><span class="input-group-addon"><i class="fa fa-calendar"></i></span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="form-group"><label for="event_name"
                                                                       class="control-label">Answer 1 <span
                                                class='require'>*</span></label><input id="poll_answer1" name="poll_answer[]"
                                                                                       type="text"
                                                                                       placeholder="Answer"
                                                                                       class="form-control poll_answer"/>
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="form-group"><label for="event_name"
                                                                       class="control-label">Answer 2 <span
                                                class='require'>*</span></label><input id="poll_answer2" name="poll_answer[]"
                                                                                       type="text"
                                                                                       placeholder="Answer"
                                                                                       class="form-control poll_answer"/>
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="form-group"><label for="event_name"
                                                                       class="control-label">Answer 3 <span
                                                class='require'>*</span></label><input id="poll_answer3" name="poll_answer[]"
                                                                                       type="text"
                                                                                       placeholder="Answer"
                                                                                       class="form-control poll_answer"/>
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="form-group"><label for="event_name"
                                                                       class="control-label">Answer 4 <span
                                                class='require'>*</span></label><input id="poll_answer4" name="poll_answer[]"
                                                                                       type="text"
                                                                                       placeholder="Answer"
                                                                                       class="form-control poll_answer"/>
                                        </div>
                                    </div>
                                </div>
                                

                            </div>
                            <div class="form-group"><button type="submit" class="btn btn-success poll_button">Submit&nbsp;<i class="fa fa-chevron-circle-right"></i></button></div>
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

    document.querySelector('.poll_button').onclick = function () {
        var $this = $(this);
        var poll_question       = $("#poll_question").val();
        var valid_from_date     = $("#valid_from_date").val();
        var valid_end_date      = $("#valid_end_date").val();
        var poll_privacy = 1;
        if($("#poll_privacy_private").is(":checked")) {
            var poll_privacy = 0;
        }

        var poll_answer = {};

        var poll_answer_arr = $("input[name*='poll_answer']");
        $.each(poll_answer_arr, function(i, item) {  //i=index, item=element in array
            poll_answer[i] = $(this).val();
        });;

        if (poll_question.length > 0) {
            $this.button('Uploading...');

            $.post("<?php echo base_url(); ?>poll/newpoll", {
                                                            poll_question: poll_question, 
                                                            valid_from_date: valid_from_date,
                                                            valid_end_date: valid_end_date,
                                                            poll_privacy: poll_privacy,
                                                            poll_answer: poll_answer,
                                                            },
                function (data, status) {
                   
                    if (data.status === "failed") {
                        sweetAlert("Oops...", data.message, "error");
                        return false;
                    } else { 
                        $this.button('Submit');
                        if (data.status === "success") {
                            window.location.href="poll";
                        }
                    }
                });
        } else {
            sweetAlert("Oops...", "Please enter poll name", "error");
            return false;
        }
    };
</script> 

</body>
</html>
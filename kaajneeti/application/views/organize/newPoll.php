<form name="plan_form" method="post" action="<?php echo base_url(); ?>" onSubmit="return false;" enctype="multipart/form-data">
    <div class="modal-header">
        <button type="button" data-dismiss="modal" aria-hidden="true" class="close">×</button>
        <h4 id="modal-stackable-label" class="modal-title">New Event</h4>
    </div>
    <div class="modal-body">
        <div class="panel panel-white">
            <div class="panel-body" style="max-height: 500px;overflow-y: auto;">

                <div class="row">
                    <div class="col-md-12">
                        <div class="form-group"><label for="event_name" class="control-label">Question <span class='require'>*</span></label><input id="poll_question" name="poll_question" type="text" placeholder="Question" class="form-control"/>
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-4">
                        <div class="form-group"><label for="event_location" class="control-label">Privacy <span class='require'>*</span></label>
                            <select name="poll_privacy" id="poll_privacy">
                                <option value="1">Public</option>
                                <option value="0">Private</option>
                            </select>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group"><label for="valid_from_date"
                            class="control-label">Start Date <span
                            class='require'>*</span></label>
                            <div class="input-group datetimepicker-default date">
                                <input type="text" id="valid_from_date" name="valid_from_date" class="form-control" value="<?php echo date('Y-m-d'); ?>"><span class="input-group-addon"><i class="fa fa-calendar"></i></span>
                            </div> 

                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            <label for="valid_end_date" class="control-label">End Date <spanv class='require'>*</span></label>
                            <div class="input-group datetimepicker-default date">
                                <input type="text" id="valid_end_date" name="valid_end_date" class="form-control" value="<?php echo date('Y-m-d', mktime(0,0,0,date('m'), (date('d')+5), date('Y'))); ?>"><span class="input-group-addon"><i class="fa fa-calendar"></i></span>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group"><label for="event_name" class="control-label">Answer 1 <span class='require'>*</span></label><input id="poll_answer1" name="poll_answer[]" type="text" placeholder="Answer" class="form-control poll_answer"/>
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="form-group"><label for="event_name" class="control-label">Answer 2 <span class='require'>*</span></label><input id="poll_answer2" name=" poll_answer[]" type="text" placeholder="Answer" class="form-control poll_answer"/>
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="form-group"><label for="event_name" class="control-label">Answer 3 <span class='require'>*</span></label><input id="poll_answer3" name="poll_answer[]"  type="text" placeholder="Answer" class="form-control poll_answer"/>
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="form-group"><label for="event_name" class="control-label">Answer 4 <span class='require'>*</span></label><input id="poll_answer4" name="poll_answer[]" type="text" placeholder="Answer" class="form-control poll_answer"/>
                            </div>
                        </div>
                    </div>


                </div>
                <div class="form-group"><button type="submit" class="btn btn-success poll_button">Submit&nbsp;<i class="fa fa-chevron-circle-right"></i></button></div>
            </div>
        </div>
    </div>
</form>


<script>

    document.querySelector('.poll_button').onclick = function () {
        var poll_question       = $("#poll_question").val();
        var valid_from_date     = $("#valid_from_date").val();
        var valid_end_date      = $("#valid_end_date").val();
        var privacy             = $('#poll_privacy').val();

        var poll_answer = {};

        var poll_answer_arr = $("input[name*='poll_answer']");
        $.each(poll_answer_arr, function(i, item) {  //i=index, item=element in array
            poll_answer[i] = $(this).val();
        });

        if (poll_question.length > 0) {

            $.post("<?php echo base_url(); ?>organize/poll", {
                                                            poll_question: poll_question, 
                                                            valid_from_date: valid_from_date,
                                                            valid_end_date: valid_end_date,
                                                            privacy: privacy,
                                                            poll_answer: poll_answer,
                                                            save_poll: 'Y',
                                                            },
                function (data, status) {
                   
                    if (data.status === "failed") {
                        sweetAlert("Oops...", data.message, "error");
                        return false;
                    } else { 
                        if (data.status === "success") {
                            window.location.href=window.location.href;
                        }
                    }
                });
        } else {
            sweetAlert("Oops...", "Please enter poll name", "error");
            return false;
        }
    };
</script> 
<script src="<?php echo base_url(); ?>assets/js/sweetalert-dev.js"></script> 
<script src="<?php echo base_url(); ?>assets/js/sweetalert.min.js"></script> 

<!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
<script src="<?=base_url();?>assets/js/vendor/jquery.min.js"></script>
<!-- bootstrap js -->
<script src="<?=base_url();?>assets/js/vendor/bootstrap.min.js"></script>
<script src="<?=base_url();?>assets/js/vendor/bootstrap-table.min.js"></script>
<script src="<?=base_url();?>assets/js/vendor/datatable.min.js"></script>

<script type="text/javascript" src="<?=base_url();?>assets/js/vendor/bootstrap-datetimepicker.js" charset="UTF-8"></script>
<script type="text/javascript" src="<?=base_url();?>assets/js/vendor/locales/bootstrap-datetimepicker.fr.js" charset="UTF-8"></script>

<script src="<?=base_url();?>assets/js/vendor/moment.js"></script>
<script src="<?=base_url();?>assets/js/vendor/daterangepicker.js"></script>

<!--  chartJs js  -->
<script src="<?=base_url();?>assets/js/vendor/chartJs/Chart.bundle.js"></script>
<!--timeline_horizontal-->
<script src="<?=base_url();?>assets/js/vendor/jquery.mobile.custom.min.js"></script>
<script src="<?=base_url();?>assets/js/vendor/hTimeline.js"></script>
<!-- amcharts -->
<script src="<?=base_url();?>assets/js/vendor/amcharts/amcharts.js"></script>
<script src="<?=base_url();?>assets/js/vendor/amcharts/serial.js"></script>
<script src="<?=base_url();?>assets/js/vendor/amcharts/pie.js"></script>
<script src="<?=base_url();?>assets/js/vendor/amcharts/gantt.js"></script>
<script src="<?=base_url();?>assets/js/vendor/amcharts/funnel.js"></script>
<script src="<?=base_url();?>assets/js/vendor/amcharts/radar.js"></script>
<script src="<?=base_url();?>assets/js/vendor/amcharts/amstock.js"></script>
<script src="<?=base_url();?>assets/js/vendor/amcharts/ammap.js"></script>
<script src="<?=base_url();?>assets/js/vendor/amcharts/worldLow.js"></script>
<script src="<?=base_url();?>assets/js/vendor/amcharts/light.js"></script>
<!-- Peity -->
<script src="<?=base_url();?>assets/js/vendor/peityJs/jquery.peity.min.js"></script>
<!-- fullcalendar -->
<script src='<?=base_url();?>assets/js/vendor/lib/moment.min.js'></script>
<script src='<?=base_url();?>assets/js/vendor/lib/jquery-ui.custom.min.js'></script>
<script src='<?=base_url();?>assets/js/vendor/fullcalendar.min.js'></script>
<!-- icheck -->
<script src="<?=base_url();?>assets/js/vendor/icheck.js"></script>
<!-- dataTables-->

<?php /*
<script type="text/javascript" src="<?=base_url();?>assets/js/vendor/jquery.dataTables.js"></script>
<script type="text/javascript" src="<?=base_url();?>assets/js/vendor/dataTables.bootstrap.min.js"></script>
<!-- js for print and download -->
<script type="text/javascript" src="<?=base_url();?>assets/js/vendor/dataTables.buttons.min.js"></script>
<script type="text/javascript" src="<?=base_url();?>assets/js/vendor/buttons.flash.min.js"></script>
<script type="text/javascript" src="<?=base_url();?>assets/js/vendor/jszip.min.js"></script>
<script type="text/javascript" src="<?=base_url();?>assets/js/vendor/pdfmake.min.js"></script>
<script type="text/javascript" src="<?=base_url();?>assets/js/vendor/vfs_fonts.js"></script>
<script type="text/javascript" src="<?=base_url();?>assets/js/vendor/buttons.html5.min.js"></script>
<script type="text/javascript" src="<?=base_url();?>assets/js/vendor/buttons.print.min.js"></script>
<script type="text/javascript" src="<?=base_url();?>assets/js/vendor/dataTables.responsive.min.js"></script>
<script type="text/javascript" src="<?=base_url();?>assets/js/vendor/dataTables.fixedHeader.min.js"></script>

*/ ?>
<!-- slimscroll js -->
<script type="text/javascript" src="<?=base_url();?>assets/js/vendor/jquery.slimscroll.js"></script>
<!-- dashboard1 js -->
<!-- <script src="<?=base_url();?>assets/js/dashboard1.js"></script> -->
<!-- pace js -->
<script src="<?=base_url();?>assets/js/vendor/pace/pace.min.js"></script>
<!-- main js -->
<script src="<?=base_url();?>assets/js/main.js"></script>
<!-- adminbag demo js-->
<script src="<?=base_url();?>assets/js/adminbagdemo.js"></script>
<!-- start theme config -->
<script src="<?=base_url();?>assets/js/select2.js"></script>

<script type="text/javascript">
    function openExpressPopup() {

        $.post("<?php echo base_url(); ?>express/expressPopup", {'display': 'Y'},
            function (data, status) {
                if(data != '') {
                    $('.modal-content-express').html(data);
                } else {
                    $('.modal-content-express').html(data);
                }
                $('.js-example-basic-single').select2();
                $('.explore_popup_photo').click(function(){
                      $('.upload-file').click();
                      $('.upload-file').change(function(){

                            var file = this.files[0];
                            var name = file.name;
                            // $('.status').html(name);
                      });
                });

                 $("#imgUpload").change(function(){
                    readURL(this);
                });


            });
    }

    function readURL(input) {
     for(var i =0; i< input.files.length; i++){
         if (input.files[i]) {
            var reader = new FileReader();

            reader.onload = function (e) {
               var img = $('<img id="dynamic">');
               img.attr('src', e.target.result);
               img.appendTo('#form1');  
            }
            reader.readAsDataURL(input.files[i]);
           }
        }
    }

    function newExpressPopupEvent() {
        $.post("<?php echo base_url(); ?>organize/newEvent", {'display': 'Y'},
            function (data, status) {
                if(data != '') {
                    $('.modal-content-express').html(data);
                } else {
                    $('.modal-content-express').html(data);
                }
                $('.form_datetime').datetimepicker();
            });
    }

    function newExpressPopupPoll() {
        $.post("<?php echo base_url(); ?>organize/newPoll", {'display': 'Y'},
            function (data, status) {
                if(data != '') {
                    $('.modal-content-express').html(data);
                } else {
                    $('.modal-content-express').html(data);
                }
            });
    }

    function deleteMyPostStatus(post_id) {
        
        var ans = confirm("Are you sure to delete this post?");
        if(!ans) {
        	return false;
        }

        $.post("<?php echo base_url(); ?>organize/deleteMyPostStatus", {
                                                            post_id: post_id, 
                                                            },
            function (data, status) {
               
                if (data.status === "failed") {
                    sweetAlert("Oops...", data.message, "error");
                    return false;
                } else { 
                    if (data.status === "success") {
                        $('#explore_post_'+post_id).html('');
                        $('#explore_post_'+post_id).hide();
                        //sweetAlert("Success", data.message, "success");
                    }
                }
            });
    }

    function deleteMyEvent(event_id) {
        
        var ans = confirm("Are you sure to delete this event?");
        if(!ans) {
        	return false;
        }

        $.post("<?php echo base_url(); ?>organize/deleteMyEvent", {
                                                            event_id: event_id, 
                                                            },
            function (data, status) {
               
                if (data.status === "failed") {
                    sweetAlert("Oops...", data.message, "error");
                    return false;
                } else { 
                    if (data.status === "success") {
                        $('#explore_event_'+event_id).html('');
                        $('#explore_event_'+event_id).hide();
                        //sweetAlert("Success", data.message, "success");
                    }
                }
            });
    }

    function deleteMyPoll(poll_id) {
        
        var ans = confirm("Are you sure to delete this poll?");
        if(!ans) {
        	return false;
        }

        $.post("<?php echo base_url(); ?>organize/deleteMyPoll", {
                                                            poll_id: poll_id, 
                                                            },
            function (data, status) {
               
                if (data.status === "failed") {
                    sweetAlert("Oops...", data.message, "error");
                    return false;
                } else { 
                    if (data.status === "success") {
                        $('#explore_poll_'+poll_id).html('');
                        $('#explore_poll_'+poll_id).hide();
                        //sweetAlert("Success", data.message, "success");
                    }
                }
            });
    }

    function participatePollWithAnswer(poll_id, poll_answer_id) {
        
        $.post("<?php echo base_url(); ?>explore/participatePollWithAnswer", {
                                                            poll_id: poll_id, 
                                                            poll_answer_id: poll_answer_id, 
                                                            participate: 'Y', 
                                                            },
            function (data, status) {
               
                if (data.status === "failed") {
                    sweetAlert("Oops...", data.message, "error");
                    return false;
                } else { 
                    if (data.status === "success") {
                        $('#participate_poll_'+poll_id).html('Thanks for your participation.');
                        //$('#participate_poll_'+poll_id).hide();
                        sweetAlert("Success", data.message, "success");
                    }
                }
            });
    }

    function saveMyEventInterest(event_id, interest_type) {
        
        $.post("<?php echo base_url(); ?>explore/saveMyEventInterest", {
                                                            event_id: event_id, 
                                                            interest_type: interest_type, 
                                                            participate: 'Y', 
                                                            },
            function (data, status) {
               
                if (data.status === "failed") {
                    sweetAlert("Oops...", data.message, "error");
                    return false;
                } else { 
                    if (data.status === "success") {
                        $('#participate_event_'+event_id).html('Thanks for your interest in this event.');
                        //$('#participate_poll_'+poll_id).hide();
                        sweetAlert("Success", data.message, "success");
                    }
                }
            });
    }

    function confirmRequestComplaint(complaint_id) {
        
        $.post("<?php echo base_url(); ?>organize/confirmRequestComplaint", {
                                                            complaint_id: complaint_id, 
                                                            },
            function (data, status) {
               
                if (data.status === "failed") {
                    sweetAlert("Oops...", data.message, "error");
                    return false;
                } else { 
                    if (data.status === "success") {
                        $('#confirm_delete_complaint_'+complaint_id).html('');
                        $('#confirm_delete_complaint_'+complaint_id).hide();
                        //sweetAlert("Success", data.message, "success");
                    }
                }
            });
    }

    function cancelRequestComplaint(complaint_id) {
        
        $.post("<?php echo base_url(); ?>organize/cancelRequestComplaint", {
                                                            complaint_id: complaint_id, 
                                                            },
            function (data, status) {
               
                if (data.status === "failed") {
                    sweetAlert("Oops...", data.message, "error");
                    return false;
                } else { 
                    if (data.status === "success") {
                        $('#confirm_delete_complaint_'+complaint_id).html('');
                        $('#confirm_delete_complaint_'+complaint_id).hide();
                        //sweetAlert("Success", data.message, "success");
                    }
                }
            });
    }

    function showNextExplore() {

        $('.show_next_explore').html('<i class="fa fa-arrow-down"></i> Loading more ....');
    	$.post("<?php echo base_url(); ?>explore/explorefeed", {
                                                            next: 'Y', 
                                                            },
            function (data, status) {

            	if(data != '') {
            		$('.feed-activity-list').append(data);
            	} else {
            		$('.show_next_explore').hide();
            	}
                $('.show_next_explore').html('<i class="fa fa-arrow-down"></i> Show More');
                
                /*if (data.status === "failed") {
                    sweetAlert("Oops...", data.message, "error");
                    return false;
                } else { 
                    if (data.status === "success") {
                        $('.feed-activity-list').append(data);
                    }
                }*/
            });
    }

    function commentPoll(poll_id) {
    	$.post("<?php echo base_url(); ?>explore/commentPoll", {
                                                            poll_id: poll_id, 
                                                            },
            function (data, status) {

            	if(data != '') {
                    $('.modal-content-express').html(data);
                } else {
                    $('.modal-content-express').html(data);
                }
            });
    }

    function savePollComment(poll_id) {

        var enter_your_comment = $("#poll_comment_"+poll_id).val();

        if (enter_your_comment.length > 0) {

            $('.btn_poll_comment_'+poll_id).html('Saving...&nbsp;<i class="fa fa-chevron-circle-right"></i>');
            $('.btn_poll_comment_'+poll_id).prop('disabled', true);

            $.post("<?php echo base_url(); ?>explore/commentPoll", {poll_id: poll_id, your_comment: enter_your_comment, save_comment: 'Y'},
                function (data, status) {
                   
                    if (data.status === "failed") {
                        sweetAlert("Oops...", data.message, "error");
                    } else { 
                        if (data.status === "success") {
                        	var new_total = parseInt($('.express_poll_comment_'+poll_id).html());
                            $('.express_poll_comment_'+poll_id).html(new_total+1);
                            $('#poll_comment_'+poll_id).val('');
                        }
                    }
                    $('.btn_poll_comment_'+poll_id).prop('disabled', false);
                    $('.btn_poll_comment_'+poll_id).html('Submit&nbsp;<i class="fa fa-chevron-circle-right"></i>');
                    return false;
                    
                });

        } else {
            sweetAlert("Oops...", "Please enter your comment", "error");
            return false;
        }
    }

    function commentPost(post_id) {
    	$.post("<?php echo base_url(); ?>explore/commentPost", {
                                                            post_id: post_id, 
                                                            },
            function (data, status) {

            	if(data != '') {
                    $('.modal-content-express').html(data);
                } else {
                    $('.modal-content-express').html(data);
                }
            });
    }

    function savePostComment(post_id) {

        var enter_your_comment = $("#post_comment_"+post_id).val();

        if (enter_your_comment.length > 0) {

            $('.btn_post_comment_'+post_id).html('Saving...&nbsp;<i class="fa fa-chevron-circle-right"></i>');
            $('.btn_post_comment_'+post_id).prop('disabled', true);

            $.post("<?php echo base_url(); ?>explore/commentPost", {post_id: post_id, your_comment: enter_your_comment, save_comment: 'Y'},
                function (data, status) {
                   
                    if (data.status === "failed") {
                        sweetAlert("Oops...", data.message, "error");
                    } else { 
                        if (data.status === "success") {
                        	var new_total = parseInt($('.express_post_comment_'+post_id).html());
                            $('.express_post_comment_'+post_id).html(new_total+1);
                            $('#post_comment_'+post_id).val('');
                        }
                    }
                    $('.btn_post_comment_'+post_id).prop('disabled', false);
                    $('.btn_post_comment_'+post_id).html('Submit&nbsp;<i class="fa fa-chevron-circle-right"></i>');
                    return false;
                    
                });

        } else {
            sweetAlert("Oops...", "Please enter your comment", "error");
            return false;
        }
    }

    function commentEvent(event_id) {
    	$.post("<?php echo base_url(); ?>explore/commentEvent", {
                                                            event_id: event_id, 
                                                            },
            function (data, status) {

            	if(data != '') {
                    $('.modal-content-express').html(data);
                } else {
                    $('.modal-content-express').html(data);
                }
            });
    }

    function saveEventComment(event_id) {

        var enter_your_comment = $("#event_comment_"+event_id).val();

        if (enter_your_comment.length > 0) {

            $('.btn_event_comment_'+event_id).html('Saving...&nbsp;<i class="fa fa-chevron-circle-right"></i>');
            $('.btn_event_comment_'+event_id).prop('disabled', true);

            $.post("<?php echo base_url(); ?>explore/commentEvent", {event_id: event_id, your_comment: enter_your_comment, save_comment: 'Y'},
                function (data, status) {
                   
                    if (data.status === "failed") {
                        sweetAlert("Oops...", data.message, "error");
                    } else { 
                        if (data.status === "success") {
                        	var new_total = parseInt($('.express_event_comment_'+event_id).html());
                            $('.express_event_comment_'+event_id).html(new_total+1);
                            $('#event_comment_'+event_id).val('');
                        }
                    }
                    $('.btn_event_comment_'+event_id).prop('disabled', false);
                    $('.btn_event_comment_'+event_id).html('Submit&nbsp;<i class="fa fa-chevron-circle-right"></i>');
                    return false;
                    
                });

        } else {
            sweetAlert("Oops...", "Please enter your comment", "error");
            return false;
        }
    }

    function replyYourComplaint(complaint_id, complaint_unique_id) {

        $.post("<?php echo base_url(); ?>complaint/complaintRejectForm/"+complaint_id+'/'+complaint_unique_id, {'display': 'Y'},
            function (data, status) {
                if(data != '') {
                    $('.modal-content-express').html(data);
                } else {
                    $('.modal-content-express').html(data);
                }
            });
    }

    function replyYourComplaintHistory(complaint_id, complaint_unique_id) {
        var progress_description    = $("#progress_description").val();
        var progess_status          = $("#progress_status").val();

        if (progress_description.length > 0) {            
            var form_data = new FormData($('input[name^="file"]'));

            jQuery.each($('input[name^="file[]"]')[0].files, function(i, file) {
                form_data.append('file[]', file);
            });

            form_data.append('description', progress_description);
            form_data.append('current_status', progess_status);

            jQuery.ajax({
                type: 'POST',
                cache: false,
                processData: false,
                contentType: false,
                data: form_data,
                url: "<?php echo base_url(); ?>complaint/complaintTimeline/"+complaint_unique_id,

                success: function(data) {
                    if (data.status === "failed") {
                        sweetAlert("Oops...", data.message, "error");
                        return false;
                    } else { 
                        if (data.status === "success") {
                            $('#confirm_delete_complaint_'+complaint_id).html('');
                            $('#confirm_delete_complaint_'+complaint_id).hide();

                            window.location.href=window.location.href;
                        }
                    }
                }
            });

        } else {
            sweetAlert("Oops...", "Please enter subject or title of history", "error");
            return false;
        }
    }

    function commentComplaint(complaint_id) {
    	$.post("<?php echo base_url(); ?>explore/commentComplaint", {
                                                            complaint_id: complaint_id, 
                                                            },
            function (data, status) {

            	if(data != '') {
                    $('.modal-content-express').html(data);
                } else {
                    $('.modal-content-express').html(data);
                }
            });
    }

    function saveComplaintComment(complaint_id) {

        var enter_your_comment = $("#complaint_comment_"+complaint_id).val();

        if (enter_your_comment.length > 0) {

            $('.btn_complaint_comment_'+complaint_id).html('Saving...&nbsp;<i class="fa fa-chevron-circle-right"></i>');
            $('.btn_complaint_comment_'+complaint_id).prop('disabled', true);

            $.post("<?php echo base_url(); ?>explore/commentComplaint", {complaint_id: complaint_id, your_comment: enter_your_comment, save_comment: 'Y'},
                function (data, status) {
                   
                    if (data.status === "failed") {
                        sweetAlert("Oops...", data.message, "error");
                    } else { 
                        if (data.status === "success") {
                        	var new_total = parseInt($('.express_complaint_comment_'+complaint_id).html());
                            $('.express_complaint_comment_'+complaint_id).html(new_total+1);
                            $('#complaint_comment_'+complaint_id).val('');
                        }
                    }
                    $('.btn_complaint_comment_'+complaint_id).prop('disabled', false);
                    $('.btn_complaint_comment_'+complaint_id).html('Submit&nbsp;<i class="fa fa-chevron-circle-right"></i>');
                    return false;
                    
                });

        } else {
            sweetAlert("Oops...", "Please enter your comment", "error");
            return false;
        }
    }

    function location_box_display() {
        if(document.getElementById('post_location').style.display == 'none') {
            document.getElementById('post_location').style.display = "block";
        } else {
            document.getElementById('post_location').style.display = "none";
            document.getElementById('post_location').value = "";
        }
    }

    function tag_box_display() {
        if(document.getElementById('post_attendee').style.display == 'none') {
            document.getElementById('post_attendee').style.display = "block";
        } else {
            document.getElementById('post_attendee').style.display = "none";
            //document.getElementById('post_attendee').value = "";
        }
    }

    // Explore Save Post
    function saveExplorePost() {

        var express_yourself_text 	= $("#express_yourself_text").val();
        var express_public_private  = $("#express_public_private").val();
        var post_location           = $("#post_location").val();

        if(post_location == 'undefined') {
            post_location = '';
        }


        $('.save_explore_post').html('Uploading your post');
        $('.save_explore_post').prop('disabled', true);
        //if (express_yourself_text.length > 1 || ) {

            var post_attendeea = '';
            $('#post_attendee :selected').each(function(i, selected) {
                post_attendeea += $(selected).val()+',';
            });
            
            var form_data = new FormData($('input[name^="file"]'));

            jQuery.each($('input[name^="file[]"]')[0].files, function(i, file) {
                form_data.append('file[]', file);
            });

            form_data.append('title', express_yourself_text);
            form_data.append('location', post_location);
            form_data.append('post_tag', post_attendeea);
            form_data.append('privacy', express_public_private);
            form_data.append('save_post', 'Y');


            jQuery.ajax({
                type: 'POST',
                cache: false,
                processData: false,
                contentType: false,
                data: form_data,
                url: "<?php echo base_url(); ?>organize/post",

                success: function(data) {
                    if (data.status === "failed") {
                        sweetAlert("Oops...", data.message, "error");
                        
                    } else { 

                        if (data.status === "success") {
                            window.location.href=window.location.href;
                        }
                    }
                    $('#new_loader_div').hide();
                    $('.save_explore_post').prop('disabled', false);
                    return false;
                }
            });

        /*} else {
            sweetAlert("Oops...", "Please enter something to what is happening", "error");
            $('.save_explore_post').prop('disabled', false);
            return false;
        }*/
    }
</script>

<script>
    function readURL(input) {

     for(var i =0; i< input.files.length; i++){
         if (input.files[i]) {
            var reader = new FileReader();

            reader.onload = function (e) {
               var img = $('<img id="dynamic" style="height: 100px; width: 100px; margin: 5px;">');
               img.attr('src', e.target.result);
               img.appendTo('#image_selected');  
            }
            reader.readAsDataURL(input.files[i]);
           }
        }
    }

    $("#imgUpload").change(function(){
        alert(input.files.length);
        readURL(this);
    });
</script>


<script>
// When the user clicks on the button, goggle between hiding and showing the dropdown content
/*function myFunction() {
    document.getElementById("myDropdown").classList.toggle("show");
}



// Close the dropdown if the user clicks outside of it
window.onclick = function(e) {
  if (!e.target.matches('.dropbtn')) {
    var myDropdown = document.getElementById("myDropdown");
      if (myDropdown.classList.contains('show')) {
        myDropdown.classList.remove('show');
      }
  }
} */
</script>

<script>
	$(document).ready(function() {

        $('.js-example-basic-single').select2();

		$("#activate_user").click(function(){
	    	$("#activate").show();
		});
	
		$(".nav-tabs li a").click(function(){
		    $('#activate').css("display","none");
		});
	
		$("#user").click(function(){
		    $("#user2").show();
		});
	
		$(".nav-tabs li a").click(function(){
		    $('#user2').css("display","none");
		});

	  $('#submitButton').on('click', function(e){
	    // We don't want this to act as a link so cancel the link action
	    e.preventDefault();

	    doSubmit();
	  });

	  function doSubmit(){
	    $("#createEventModal").modal('hide');
	    console.log($('#apptStartTime').val());
	    console.log($('#apptEndTime').val());
	    console.log($('#apptAllDay').val());
	    alert("form submitted");
	        
	    $("#calendar").fullCalendar('renderEvent',
	        {
	            title: $('#patientName').val(),
	            start: new Date($('#apptStartTime').val()),
	            end: new Date($('#apptEndTime').val()),
	            allDay: ($('#apptAllDay').val() == "true"),
	        },
	        true);
	   }
	});
</script>
<script type="text/javascript">
	$('.page-header.navbar .top-menu .navbar-nav > li > .dropdown-menu.menuBig').on('click', function(event){
	    // The event won't be propagated up to the document NODE and 
	    // therefore delegated events won't be fired
	    event.stopPropagation();
	});

	$(".less").click(function(){
	    $(".add").toggleClass("small");
	    $(".add .menuBig .row .add-item").toggleClass("col-sm-3");
	    $("#expand").toggleClass("hide");
	});

    
</script>

    <script type="text/javascript">
      $(document).ready(function () {
    $('#datepicker').datepicker({
      uiLibrary: 'bootstrap'
    });
});
    </script>

    <script type="text/javascript">
            $(function () {
                $('#datetimepicker1').datetimepicker();
            });
        </script>
<script src="https://cdn.rawgit.com/atatanasov/gijgo/master/dist/combined/js/gijgo.min.js" type="text/javascript"></script>
<link href="https://cdn.rawgit.com/atatanasov/gijgo/master/dist/combined/css/gijgo.min.css" rel="stylesheet" type="text/css" />








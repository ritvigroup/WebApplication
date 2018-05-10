<script src="<?php echo base_url(); ?>assets/js/sweetalert-dev.js"></script> 
<script src="<?php echo base_url(); ?>assets/js/sweetalert.min.js"></script> 

<!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
<script src="<?=base_url();?>assets/js/vendor/jquery.min.js"></script>
<!-- bootstrap js -->
<script src="<?=base_url();?>assets/js/vendor/bootstrap.min.js"></script>



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
<!-- slimscroll js -->
<script type="text/javascript" src="<?=base_url();?>assets/js/vendor/jquery.slimscroll.js"></script>
<!-- dashboard1 js -->
<script src="<?=base_url();?>assets/js/dashboard1.js"></script>
<!-- pace js -->
<script src="<?=base_url();?>assets/js/vendor/pace/pace.min.js"></script>
<!-- main js -->
<script src="<?=base_url();?>assets/js/main.js"></script>
<!-- adminbag demo js-->
<script src="<?=base_url();?>assets/js/adminbagdemo.js"></script>
<!-- start theme config -->


<script type="text/javascript">
    $('.form_datetime').datetimepicker({
        //language:  'fr',
        weekStart: 1,
        todayBtn:  1,
	    autoclose: 1,
	    todayHighlight: 1,
	    startView: 2,
	    forceParse: 0,
        showMeridian: 1
    });
  	$('.form_date').datetimepicker({
        language:  'fr',
        weekStart: 1,
        todayBtn:  1,
	    autoclose: 1,
	    todayHighlight: 1,
	    startView: 2,
	    minView: 2,
	    forceParse: 0
	});
  	$('.form_time').datetimepicker({
        language:  'fr',
        weekStart: 1,
        todayBtn:  1,
	    autoclose: 1,
	    todayHighlight: 1,
	    startView: 1,
	    minView: 0,
	    maxView: 1,
	    forceParse: 0
    });

	$(function () {
		$('#datetimepicker12').datetimepicker({
	    	inline: true,
	   		sideBySide: true
		});
      
       	$('input[name="daterange"]').daterangepicker();       

        $('input[name="dateTimeRange"]').daterangepicker({
	        timePicker: true,
	        timePickerIncrement: 30,
	        locale: {
	            format: 'MM/DD/YYYY h:mm A'
	        }
	    });

    });



    function openExpressPopup() {

        $.post("<?php echo base_url(); ?>express/expressPopup", {'display': 'Y'},
            function (data, status) {
                if(data != '') {
                    $('.modal-content-express').html(data);
                } else {
                    $('.modal-content-express').html(data);
                }
            });
    }
</script>


<script>
/* When the user clicks on the button, 
toggle between hiding and showing the dropdown content */
function myFunction() {
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
}
</script>

<script>
$(document).ready(function(){

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

	/*function ConfirmDialog(){
	    $('<div></div>').appendTo('body')
	        .html('<div><h6>Are you sure to close?</h6></div>')
	        .dialog({
	            modal: true, title: 'Delete message', zIndex: 10000, autoOpen: true,
	            width: 'auto', resizable: false,
	            buttons: {
	                Yes: function () {
	                    // $(obj).removeAttr('onclick');                                
	                    // $(obj).parents('.Parent').remove();
														
	                    $('body').append('<h1>Confirm Dialog Result: <i>Yes</i></h1>');
	                    
	                    $(this).dialog("close");
	                },
	                No: function () {                           		                              

	                	$('body').append('<h1>Confirm Dialog Result: <i>No</i></h1>');
	                
	                    $(this).dialog("close");
	                }
	            },
	            close: function (event, ui) {
	                $(this).remove();
	            }
	        });
	}*/


});
</script>
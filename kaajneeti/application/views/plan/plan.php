<!DOCTYPE html>
<html lang="en">
<head><title>Plan</title>
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
                    <div class="col-md-12">
                        <div class="portlet box">

                            <div class="portlet-header">
                                <ol class="breadcrumb page-breadcrumb">
                                    <li class="activelink"><a href="#">My Plan</a>&nbsp;</li>
                                    <li><a data-target="#modal-stackable" data-toggle="modal" href="javascript:void(0);" onClick="return nextScreen(0);" title="Let's begin with your Goal">New Plan</a>&nbsp;</li>
                                </ol>
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
    </div>

<div id="modal-stackable" tabindex="-1" role="dialog" aria-labelledby="modal-stackable-label" aria-hidden="true" class="modal fade" style="display: none;">
    <div class="modal-dialog">
        <div class="modal-content">
            
        </div>
    </div>
</div>

<script src="<?php echo base_url(); ?>assets/js/sweetalert-dev.js"></script> 
<script src="<?php echo base_url(); ?>assets/js/sweetalert.min.js"></script> 

<?php  require_once './include/scroll_top.php';?>

</body>

<?php  require_once './include/js.php';?>

<div id="modal-stackable" tabindex="-1" role="dialog" aria-labelledby="modal-stackable-label" aria-hidden="true" class="modal fade" style="display: none;">
    <div class="modal-dialog">
        <div class="modal-content">
            
        </div>
    </div>
</div>


<script>
        $( document ).ready(function() {
            
        });
    function nextScreen(next_screen_id) {

        $.post("<?php echo base_url(); ?>plan/nextScreen", {'next_screen': next_screen_id},
            function (data, status) {
                if(data != '') {
                    $('.modal-content').html(data);
                } else {
                    $('.modal-content').html(data);
                }
                $('.form_datetime').datetimepicker();
            });
    }



    function prevScreen(next_screen_id) {

        $.post("<?php echo base_url(); ?>plan/nextScreen", {'next_screen': next_screen_id},
            function (data, status) {
                if(data != '') {
                    $('.modal-content').html(data);
                } else {
                    $('.modal-content').html(data);
                }
                //$('.datepicker').datepicker();
            });
    }

    
</script>
<script>
    function resetFormPage() {
        //$('#create_plan_form').reset();
        document.create_plan_form.reset();
    }
</script>
</body>
</html>
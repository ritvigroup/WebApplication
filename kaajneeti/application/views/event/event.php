<!DOCTYPE html>
<html lang="en">
<head><title>Events Received</title>
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
                                <h1>Events Tagged</h1>
                                <div class="actions"><a href="<?=base_url();?>event/newevent" class="btn btn-info btn-xs"><i class="fa fa-plus"></i>&nbsp;
                                    New Event</a>
                                </div>
                            </div>
                            <div class="portlet-body">
                                <div class="row mbm">
                                    <div class="col-lg-12">
                                        <div class="table-responsive">
                                            <table id="table_id"
                                                   class="table table-hover table-striped table-bordered table-advanced tablesorter display">
                                                <thead>
                                                <tr>
                                                    <th scope="col"><input type="checkbox"></th>
                                                    <th scope="col">Name<span class="column-sorter"></span></th>
                                                    <th scope="col">Location<span class="column-sorter"></span></th>
                                                    <th scope="col">Start Date<span class="column-sorter"></span></th>
                                                    <th scope="col">End Sate<span class="column-sorter"></span></th>
                                                    <th scope="col">Status<span class="column-sorter"></span></th>
                                                </tr>
                                                <tbody class="media-thumb">
                                                <?php 
                                                if(count($result) > 0) { ?>
                                                
                                                <?php foreach($result AS $event) { ?>
                                                    <?php $EventStatus  = (($event->eventdata->EventStatus == 1) ? 'Active' : 'In-Active'); ?>
                                                    <?php $StartDate    = (($event->eventdata->StartDate == '0000-00-00 00:00:00') ? '' : date('d-M-Y h:i A', strtotime($event->eventdata->StartDate))); ?>
                                                    <?php $EndDate    = (($event->eventdata->EndDate == '0000-00-00 00:00:00') ? '' : date('d-M-Y h:i A', strtotime($event->eventdata->EndDate))); ?>
                                                    <tr>
                                                        <td><input type="checkbox"></td>

                                                        <td><a data-target="#modal-stackable" data-toggle="modal" onClick="return openEventDetail(<?php echo $event->eventdata->EventId; ?>);" href="javascript:void(0);"><?php echo $event->eventdata->EventName; ?></a></td>
                                                        <td><?php echo $event->eventdata->EventLocation; ?></td>
                                                        <td><?php echo $StartDate; ?></td>
                                                        <td><?php echo $EndDate; ?></td>
                                                        <td><?php echo $EventStatus; ?></td>
                                                    </tr>
                                                <?php }  ?>
                                                
                                                <?php }  ?>
                                                </tbody>
                                                </thead>
                                            </table>
                                        </div>
                                    </div>
                                </div>
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


<div id="modal-stackable" tabindex="-1" role="dialog" aria-labelledby="modal-stackable-label" aria-hidden="true" class="modal fade" style="display: none;">
    <div class="modal-dialog">
        <div class="modal-content">
            
        </div>
    </div>
</div>


<script>
$(document).ready(function() {
        // Flexible table

        $('#table_id').DataTable();

    });
function openEventDetail(event_id) {

    if (event_id > 0) {
        $.post("<?php echo base_url(); ?>event/eventdetail", {event_id: event_id},
            function (data, status) {
                if(data != '') {
                    $('.modal-content').html(data);
                } else {
                    $('.modal-content').html(data);
                }
            });
    } else {
        sweetAlert("Oops...", "Please enter something to search leaders", "error");
        return false;
    }
}
</script>
</body>
</html>
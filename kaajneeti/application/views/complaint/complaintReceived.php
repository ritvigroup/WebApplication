<!DOCTYPE html>
<html lang="en">
<head><title>Complaint Received</title>
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

        <div class="page-content-wrapper animated fadeInRight">
            <div class="page-content">
                <div class="row  border-bottom white-bg dashboard-header">
                    <div class="col-md-12">
                        <div class="portlet box ">
                            <div class="portlet-header">
                                <ol class="breadcrumb">
                                    <li> <a class="text-capitalize" href="<?=base_url();?>leader/dashboard">Kaajneeti</a> </li>
                                    <li> <a class="text-capitalize" href="<?=base_url(); ?>listen/listen">Listen</a> </li>
                                    <li class="active"><strong><a class="text-capitalize" href="<?=base_url(); ?>complaint/complaintReceived">Complaint Received</a> </strong> </li>
                                </ol>
                            </div>
                            <div class="portlet-body">
                                <div class="row mbm">
                                    <div class="col-lg-12">
                                        <div class="table-responsive">
                                            <table id="table_id" class="table table-hover table-striped table-bordered table-advanced tablesorter display">
                                                <thead>
                                                    <tr class="condensed">
                                                        <th scope="col"><input type="checkbox"></th>
                                                        <th scope="col">Id<span class="column-sorter"></span></th>
                                                        <th scope="col">Subject<span class="column-sorter"></span></th>
                                                        <th scope="col">Department<span class="column-sorter"></span></th>
                                                        <th scope="col">Applicant<span class="column-sorter"></span></th>
                                                        <th scope="col">Status<span class="column-sorter"></span></th>
                                                        <th scope="col">Assigned On<span class="column-sorter"></span></th>
                                                    </tr>
                                                    <tbody>
                                                        <?php 
                                                        if(count($result) > 0) { ?>
                                                        <?php foreach($result AS $complaint) { ?>
                                                            <tr>
                                                                <td><input type="checkbox"></td>

                                                                <td><a data-target="#modal-stackable" data-toggle="modal" href="javascript:void(0);" onClick="return displayComplaintDitail('<?php echo $complaint->ComplaintUniqueId; ?>');" title="View Complaint Detail"><?php echo $complaint->ComplaintUniqueId; ?></a></td>
                                                                <td><?php echo $complaint->ComplaintSubject; ?></td>
                                                                <td><?php echo $complaint->DepartmentName; ?></td>
                                                                <td><?php echo $complaint->ApplicantName; ?></td>
                                                                <td><a href="<?=base_url();?>complaint/complaintTimeline/<?php echo $complaint->ComplaintUniqueId; ?>"><?php echo $complaint->ComplaintStatusName; ?></a></td>
                                                                <td><?php echo $complaint->AddedOn; ?></td>
                                                            </tr>
                                                        <?php } ?>
                                                        
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
                    
                    

                </div>
            </div>
        </div>
    </div>
    
    <?php  require_once './include/scroll_top.php';?>
<?php  require_once './include/footer.php';?>
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
    function displayComplaintDitail(complaint_unique_id) {

        $.post("<?php echo base_url(); ?>complaint/complaintViewDetail/"+complaint_unique_id, {'display': 'Y'},
            function (data, status) {
                if(data != '') {
                    $('.modal-content').html(data);
                } else {
                    $('.modal-content').html(data);
                }
            });
    }
</script>

</body>
</html>
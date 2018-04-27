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
                    <div class="col-md-12">
                        <div class="portlet box">
                            <div class="portlet-header">
                                <h1>My Polls</h1>
                                <div class="actions">
                                    <a href="<?=base_url();?>poll/newpoll" class="btn btn-info btn-xs"><i class="fa fa-plus"></i>&nbsp; New Poll</a>
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
                                                    <th scope="col"><span class="column-sorter"><input type="checkbox"></span></th>
                                                    <th scope="col">Question<span class="column-sorter"></span></th>
                                                    <th scope="col">Privacy<span class="column-sorter"></span></th>
                                                    <th scope="col">Start Date<span class="column-sorter"></span></th>
                                                    <th scope="col">End Sate<span class="column-sorter"></span></th>
                                                    <th scope="col">Status<span class="column-sorter"></span></th>
                                                </tr>
                                                </thead>
                                                <?php 
                                                if(count($result) > 0) { ?>
                                                <tbody class="media-thumb">
                                                <?php foreach($result AS $poll) { ?>
                                                    <?php $PollStatus  = (($poll->polldata->PollStatus == 1) ? 'Active' : 'In-Active'); ?>
                                                    <?php $PollPrivacy  = (($poll->polldata->PollPrivacy == 1) ? 'Public' : 'Private'); ?>
                                                    <?php $ValidFromDate    = (($poll->polldata->ValidFromDate == '0000-00-00 00:00:00') ? '' : date('d-M-Y h:i A', strtotime($poll->polldata->ValidFromDate))); ?>
                                                    <?php $ValidEndDate    = (($poll->polldata->ValidEndDate == '0000-00-00 00:00:00') ? '' : date('d-M-Y h:i A', strtotime($poll->polldata->ValidEndDate))); ?>
                                                    <tr>
                                                        <td><input type="checkbox"></td>
                                                        <td><?php echo $poll->polldata->PollQuestion; ?></td>
                                                        <td><?php echo $PollPrivacy; ?></td>
                                                        <td><?php echo $ValidFromDate; ?></td>
                                                        <td><?php echo $ValidEndDate; ?></td>
                                                        <td><?php echo $PollStatus; ?></td>
                                                    </tr>
                                                <?php }  ?>
                                                </tbody>
                                                <?php }  ?>                                        
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

<script>
$(document).ready(function() {
        // Flexible table

        $('#table_id').DataTable();

    });
</script>
</body>
</html>
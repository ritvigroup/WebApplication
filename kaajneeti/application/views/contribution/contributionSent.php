<!DOCTYPE html>
<html lang="en">
<head><title>Sent</title>
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
                                    <li><a href="<?php echo base_url(); ?>contribution/contribution">Contribution</a>&nbsp;&nbsp;</li>
							        <li class="activelink"><a href="<?php echo base_url(); ?>contribution/contributionSent">Sent</a>&nbsp;&nbsp;</li>
							        <li><a href="<?php echo base_url(); ?>contribution/contributionReceived">Received</a>&nbsp;&nbsp;</li>
                                </ol>
                            </div>
                            
                            <div class="portlet-body">
                                <div class="row mbm">
                                    <div class="col-lg-12">
                                        <div class="table-responsive">
                                            <table id="table_id"
                                                   class="table table-hover table-striped table-bordered table-advanced tablesorter display">
                                                <thead>
                                                <tr>
                                                    <th scope="col">Id<span class="column-sorter"></span></th>
                                                    <th scope="col">Gateway<span class="column-sorter"></span></th>
                                                    <th scope="col">Comment<span class="column-sorter"></span></th>
                                                    <th scope="col">From<span class="column-sorter"></span></th>
                                                    <th scope="col">To<span class="column-sorter"></span></th>
                                                    <th scope="col">Debit/Credit<span class="column-sorter"></span></th>
                                                    <th scope="col">Amount<span class="column-sorter"></span></th>
                                                    <th scope="col">Status<span class="column-sorter"></span></th>
                                                    <th scope="col">On<span class="column-sorter"></span></th>
                                                </tr>
                                                <tbody class="media-thumb">
                                                <?php 
                                                if(count($result) > 0) { ?>
                                                    
                                                    <?php foreach($result AS $payment) { ?>
                                                        <?php
                                                        $debit_or_credit = ($payment->DebitOrCredit == 1) ? 'Credit' : 'Debit';
                                                        $status = ($payment->TransactionStatus == 1) ? 'Success' : 'Failed';

                                                        $plus_minus = ($payment->DebitOrCredit == 1) ? '' : '-';
                                                        ?>
                                                        <tr>
                                                            <td><?php echo $payment->TransactionId; ?></td>
                                                            <td><?php echo $payment->PaymentGatewayName; ?></td>
                                                            <td><?php echo $payment->TransactionComment; ?></td>
                                                            <td><a href="<?=base_url();?>profile/profile/<?php echo $payment->PaymentBy->user_profile_detail->user_info->UserUniqueId; ?>" target="_blank"><?php echo $payment->PaymentBy->user_profile_detail->profile->FirstName.' '.$payment->PaymentBy->user_profile_detail->profile->LastName; ?></a></td>
                                                            <td><a href="<?=base_url();?>profile/profile/<?php echo $payment->PaymentTo->user_profile_detail->user_info->UserUniqueId; ?>" target="_blank"><?php echo $payment->PaymentTo->user_profile_detail->profile->FirstName.' '.$payment->PaymentTo->user_profile_detail->profile->LastName; ?></a></td>
                                                            <td><?php echo $debit_or_credit; ?></td>
                                                            <td><?php echo $plus_minus; ?> &#8377; <?php echo $payment->TransactionAmount; ?></td>
                                                            <td><?php echo $status; ?></td>
                                                            <td><?php echo $payment->AddedOn; ?></td>
                                                        </tr>
                                                    <?php } ?>
                                                    
                                                <?php } else { ?>
                                                
                                                <?php } ?>  
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
</script>


</body>
</html>
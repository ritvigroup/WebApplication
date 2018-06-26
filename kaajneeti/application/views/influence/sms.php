<!DOCTYPE html>
<html lang="en">
<head><title>SMS Influence</title>
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
                        <div class="portlet box ">
                            <div class="portlet-header">
                                <ol class="breadcrumb page-breadcrumb">
                                    <li><a href="<?php echo base_url(); ?>influence/email">Email</a>&nbsp;</li>
                                    <li class="activelink"><a href="<?php echo base_url(); ?>influence/sms">SMS</a>&nbsp;</li>
                                    <li><a href="<?php echo base_url(); ?>influence/social">Social</a>&nbsp;</li>
                                </ol>
                            </div>
                            <div class="portlet-body">
                                <div class="row mbm">
                                    <div class="col-lg-12">
                                        
                                        <div style="float: right;">

                                         <button class="btn btn-primary"data-target="#modal-stackable" data-toggle="modal" onClick="return importSmsExcel();">Import Excel</button>
                                        <button class="btn btn-primary"data-target="#modal-stackable" data-toggle="modal" onClick="return importSmsTxt();">Import TXT</button>
                                        <button class="btn btn-primary" data-target="#modal-stackable" data-toggle="modal" onClick="return importSmsCsv();">Import CSV</button>

                                            <a data-target="#modal-stackable" data-toggle="modal" href="javascript:void(0);" class="btn btn-success" onClick="return smsCompose();">Compose SMS</a>

                                        </div>
                                        <div class="clearfix"> </div>

                                        <div class="table-responsive">
                                            <table id="table_id" class="table table-hover table-striped table-bordered table-advanced tablesorter display">
                                                <thead>
                                                <tr>
                                                    <th width="1%"><input type="checkbox"></th>
                                                    <th width="20%" class="header">To</th>
                                                    <th width="60%" class="header">Message</th>
                                                    <th width="15%" class="header">On</th>
                                                    <!-- <th width="9%" class="header">Action</th> -->
                                                </tr>
                                                
                                                <tbody>
                                                <?php if(count($SmsSent) > 0) { ?>
                                                    <?php foreach($SmsSent AS $sms_sent) { ?>
                                                        <tr>
                                                            <td><input type="checkbox"></td>
                                                            <td><a data-target="#modal-stackable" data-toggle="modal" href="javascript:void(0);" onClick="return viewSms('<?php echo $sms_sent->SmsSentUniqueId; ?>');"><?php echo $sms_sent->SmsTo; ?></a></td>
                                                            <td><?php echo substr(strip_tags($sms_sent->SmsMessage), 0, 100); ?></td>
                                                            <td><?php echo $sms_sent->SentOn; ?></td>
                                                            <!-- <td><button type="button" class="btn btn-red btn-xs"><i class="fa fa-trash"></i>&nbsp;Delete</button></td> -->
                                                        </tr>
                                                    <?php } ?>
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
    function smsCompose() {

        $.post("<?php echo base_url(); ?>influence/smsCompose", {'display': 'Y'},
            function (data, status) {
                if(data != '') {
                    $('.modal-content').html(data);
                } else {
                    $('.modal-content').html(data);
                }
            });
    }

        function importSmsCsv() {

        $.post("<?php echo base_url(); ?>influence/importSmsCsv", {'display': 'Y'},
            function (data, status) {
                if(data != '') {
                    $('.modal-content').html(data);
                } else {
                    $('.modal-content').html(data);
                }
            });
    }

     function importSmsTxt() {

        $.post("<?php echo base_url(); ?>influence/importSmsTxt", {'display': 'Y'},
            function (data, status) {
                if(data != '') {
                    $('.modal-content').html(data);
                } else {
                    $('.modal-content').html(data);
                }
            });
    }

         function importSmsExcel() {

        $.post("<?php echo base_url(); ?>influence/importSmsExcel", {'display': 'Y'},
            function (data, status) {
                if(data != '') {
                    $('.modal-content').html(data);
                } else {
                    $('.modal-content').html(data);
                }
            });
    }



    function viewSms(sms_unique_id) {

        $.post("<?php echo base_url(); ?>influence/viewSms", {'sms_unique_id': sms_unique_id},
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
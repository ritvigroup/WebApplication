<!DOCTYPE html>
<html lang="en">
<head><title>Email Influence</title>
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
                                    <li class="activelink"><a href="<?php echo base_url(); ?>influence/email">Email</a>&nbsp;</li>
                                    <li><a href="<?php echo base_url(); ?>influence/sms">SMS</a>&nbsp;</li>
                                    <li><a href="<?php echo base_url(); ?>influence/social">Social</a>&nbsp;</li>
                                </ol>
                            </div>
                            <div class="portlet-body">
                                <div class="row mbm">
                                    <div class="col-lg-12">
                                        
                                        <div style="float: right;">
                                        <button class="btn btn-primary"data-target="#modal-stackable" data-toggle="modal" onClick="return importEmailExcel();">Import Excel</button>
                                        <button class="btn btn-primary"data-target="#modal-stackable" data-toggle="modal" onClick="return importEmailTxt();">Import TXT</button>
                                        <button class="btn btn-primary" data-target="#modal-stackable" data-toggle="modal" onClick="return importEmailCsv();">Import CSV</button>

                                       <a data-target="#modal-stackable" data-toggle="modal" href="javascript:void(0);" class="btn btn-success" onClick="return emailCompose();">Compose Email</a>


                                        </div>


                                        <div class="clearfix"> </div>

                                        <div class="table-responsive">
                                            <table id="table_id" class="table table-hover table-striped table-bordered table-advanced tablesorter display">
                                                <thead>
                                                <tr>
                                                    <th width="1%"><input type="checkbox"></th>
                                                    <th width="1%" class="header"><i class="fa fa-paperclip" style="float: right;"></i></th>
                                                    <th width="10%" class="header">To</th>
                                                    <th width="20%" class="header">Subject</th>
                                                    <th width="50%" class="header">Message</th>
                                                    <th width="15%" class="header">On</th>
                                                    <!-- <th width="9%" class="header">Action</th> -->
                                                </tr>
                                                <tbody>
                                                <?php if(count($EmailSent) > 0) { ?>
                                                    <?php foreach($EmailSent AS $email_sent) { ?>
                                                        <tr>
                                                            <td><input type="checkbox"></td>
                                                            <td><?php if(count($email_sent->EmailAttachment) > 0) { ?><i class="fa fa-paperclip" style="float: right;"></i> <?php }?></td>
                                                            <td><?php echo $email_sent->EmailType; ?></td>
                                                            <td><a data-target="#modal-stackable" data-toggle="modal" href="javascript:void(0);" onClick="return viewEmail('<?php echo $email_sent->EmailSentUniqueId; ?>');"><?php echo $email_sent->EmailSubject; ?></a></td>
                                                            <td><?php echo substr(strip_tags($email_sent->EmailMessage), 0, 100); ?></td>
                                                            <td><?php echo $email_sent->SentOn; ?></td>
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
            
            </div>
        </div>
    </div>
    
    <?php  require_once './include/scroll_top.php';?>
<?php  require_once './include/footer.php';?>
</body>

<?php  require_once './include/js.php';?>


<div id="modal-stackable" tabindex="-1" role="dialog" aria-labelledby="modal-stackable-label" aria-hidden="true" class="modal fade" style="display: none;">
    <div class="modal-dialog">
        <div class="modal-content email_model_content">
        
        </div>
    </div>
</div>



<script>
    
    function emailCompose() {

        $.post("<?php echo base_url(); ?>influence/emailCompose", {'display': 'Y'},
            function (data, status) {
                if(data != '') {
                    $('.email_model_content').html(data);
                } else {
                    $('.email_model_content').html(data);
                }
            });
    }

    function importEmailCsv() {

        $.post("<?php echo base_url(); ?>influence/importEmailCsv", {'display': 'Y'},
            function (data, status) {
                if(data != '') {
                    $('.email_model_content').html(data);
                } else {
                    $('.email_model_content').html(data);
                }
            });
    }

        function importEmailTxt() {

        $.post("<?php echo base_url(); ?>influence/importEmailTxt", {'display': 'Y'},
            function (data, status) {
                if(data != '') {
                    $('.email_model_content').html(data);
                } else {
                    $('.email_model_content').html(data);
                }
            });
    }

    function importEmailExcel() {

        $.post("<?php echo base_url(); ?>influence/importEmailExcel", {'display': 'Y'},
            function (data, status) {
                if(data != '') {
                    $('.email_model_content').html(data);
                } else {
                    $('.email_model_content').html(data);
                }
            });
    }




    

    function viewEmail(email_unique_id) {

        $.post("<?php echo base_url(); ?>influence/viewEmail", {'email_unique_id': email_unique_id},
            function (data, status) {
                if(data != '') {
                    $('.email_model_content').html(data);
                } else {
                    $('.email_model_content').html(data);
                }
            });
    }

</script>

</body>
</html>
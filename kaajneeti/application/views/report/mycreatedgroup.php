<!DOCTYPE html>
<html lang="en">
<head><title>My Created Group</title>
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
    <div id="connect_myfriends" class="page-container">
        
        <?php  require_once './include/left.php';?>

        <!-- Start page content wrapper -->
        <div class="page-content-wrapper animated fadeInRight">
            <div class="page-content">
                <div class="row  border-bottom white-bg dashboard-header">
                    <div class="col-md-12">
                        <div class="portlet box ">
                            <div class="portlet-header">
                                <ol class="breadcrumb">
                                    <li> <a class="text-capitalize" href="<?=base_url();?>leader/dashboard">Kaajneeti</a> </li>
                                    <li> <a class="text-capitalize" href="<?=base_url(); ?>report/report">Report</a> </li>
                                    <li class="active"><strong><a class="text-capitalize" href="<?=base_url(); ?>report/mycreatedgroup">My Created Group</a> </strong> </li>
                                </ol>
                            </div>
                            <?php
                            // echo '<pre>';
                            // print_r($MyGroup);
                            // print_r($this->session->userdata('UserProfileId'));
                            // echo '</pre>';
                            //die;
                            ?>
                           <div class="portlet-body">
                                <div class="row mbm">
                                    <div class="col-lg-12">
                                        <div class="table-responsive">

                                            <?php $this->load->view('report/group_html.php'); ?>
                                                                                            
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>            
                </div>
            </div>
        </div>

        <?php  require_once './include/footer.php';?>

        <?php  require_once './include/scroll_top.php';?>
    </div>
</body>

<?php  require_once './include/js.php';?>
<?php  require_once './include/connect/connect.php';?>



</html>
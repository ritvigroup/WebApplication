<!DOCTYPE html>
<html lang="en">
<head><title>Dashboard | Dashboard</title>
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
                    <div class="col-sm-3">
                        <div class="contact-box center-version">
                            <a href="profile.html"> <img src="<?php echo $this->session->userdata('UserProfilePic'); ?>" class="img-circle" alt="image">
                                <h3 class="m-b-xs"><strong><?php echo $this->session->userdata('Name'); ?></strong></h3>
                                <div class="font-bold">Leader</div>
                                <div class="font-bold"><?php echo $this->session->userdata('UserUniqueId'); ?></div>
                                <address>
                                    <strong>Kaajneeti</strong><br>
                                </address>
                            </a>
                            <div class="contact-box-footer">
                                <div class="m-t-xs btn-group"> <a class="btn btn-xs btn-white"><i class="fa fa-phone"></i> Call </a> <a class="btn btn-xs btn-white"><i class="fa fa-envelope"></i> Email</a>                                   <a class="btn btn-xs btn-white"><i class="fa fa-user-plus"></i> Follow</a> </div>
                            </div>
                        </div>
                    </div>

                    <?php
                    // echo '<pre>';
                    // print_r($Dashboard);
                    // echo '</pre>';
                    ?>
                    <div class="col-sm-9">
                        <div id="chartdiv1"></div>
                    </div>
                </div>
                
            </div>
        </div>
    </div>
    
    <?php  require_once './include/scroll_top.php';?>

<?php  require_once './include/footer.php';?>
</body>

<?php  require_once './include/js.php';?>



</html>
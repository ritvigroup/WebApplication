<!DOCTYPE html>
<html lang="en">
<head><title>No User</title>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="cache-control" content="no-cache">
    <meta http-equiv="expires" content="Thu, 19 Nov 1900 08:52:00 GMT">
    <?php  require_once './include/admincss.php';?>
</head>
<body class="page-header-fixed ">
    
    <?php  require_once './include/admintop.php';?>

    <div class="clearfix"> </div>
    <div class="page-container">
        
        <?php  require_once './include/adminleft.php';?>

        <div class="page-content-wrapper animated fadeInRight">
            <div class="page-content">
                <div class="row  border-bottom white-bg dashboard-header">
                    <div class="col-md-12">
                        <h1>No any user found</h1>
                    </div>
                </div>

                <div class="wrapper-content ">
                    <div class="row">
                        <div class="col-sm-4">
                            <div class="contact-box">
                                <a href="profile.html">
                                    <div class="col-sm-4 padding-none">
                                        <div class="text-center"> <img src="<?php echo base_url(); ?>assets/images/default-user.png" class="img-responsive" alt="image"> </div>
                                    </div>
                                    <div class="col-sm-8">
                                        <h3><strong>-------------------------------</strong></h3>
                                        <p><i class="fa fa-map-marker"></i>-------------------</p>
                                        <address>
                                            <strong>-------------------</strong><br> -------------------<br>
                                            <i class="fa fa-phone"></i> 000-000-0000
                                        </address>
                                    </div>
                                    <div class="clearfix"></div>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
    
                <!-- stat timeline and feed  -->
                <div class="top20">
                    
                    <div class="clearfix"> </div>
                    <!-- End projects list -->
                    
                    <?php  require_once './include/adminfooter.php';?>

                </div>
            </div>
        </div>
    </div>
    
    <?php  require_once './include/adminscroll_top.php';?>

</body>

<?php  require_once './include/adminjs.php';?>

</body>
</html>
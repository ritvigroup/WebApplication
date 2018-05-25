<!DOCTYPE html>
<html lang="en">
<head><title>Incoming</title>
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
                                    <li> <a class="text-capitalize" href="<?=base_url(); ?>connect/connect">Connect</a> </li>
                                    <li class="active"><strong><a class="text-capitalize" href="<?=base_url(); ?>connect/incoming">Incoming</a> </strong> </li>
                                </ol>
                            </div>

                            <div class="portlet-body">
                                <div class="mbm">
                                    
                                    <div class="row head">
                                        <div class="user-heading">
                                            
                                            <div class="col-md-12">
                                                <div class="pull-right"> 
                                                    <?php  require_once './include/connect/connect_top.php';?>

                                                </div>
                                                
                                            </div>
                                       
                                        </div>

                                    </div>
                                    
                                    <div class="clearfix"></div>

                                    <?php
                                    // echo '<pre>';
                                    // print_r($Connections);
                                    // echo '</pre>';
                                    // die;
                                    ?>
                                    
                                    <div class="row margin-left-right-0 connect-menu-contents">

                                        <div class="col-sm-12" style=" margin-top: 5px; ">
                                            <i class="fa fa-th-list fa-2x pull-right" id="list-view-id"></i>
                                            <i class="fa fa-th fa-2x pull-right" id="grid-view-id"></i>
                                        </div>
                                        <div class="connect_list">
                                            <?php 
                                            foreach($Connections->result AS $users) {
                                                $Name = $users->FirstName.' '.$users->LastName;

                                                if($users->ProfilePhotoPath != '') {
                                                    $profile_pic = ($users->ProfilePhotoPath != '') ? $users->ProfilePhotoPath : base_url().'assets/images/default-user.png';
                                                } else {
                                                    $profile_pic = ($users->ProfilePhotoPath != '') ? $users->ProfilePhotoPath : base_url().'assets/images/default-user.png';
                                                } 
                                                ?>
                                                <div class="grid-list-view grid col-md-4 col-sm-6" data-name="<?php echo $Name; ?>" id="connection_id_<?php echo $users->UserProfileId; ?>">
                                                    <div class="contact-box">
                                                        <div class="col-sm-12">
                                                            <?php if($users->UserTypeId == 2) {?><i class="fa fa-certificate" style="position: absolute;top: 5px; left: 20px;"></i><?php } ?>
                                                            <a href="<?=base_url();?>profile/profile"">
                                                                <img src="<?php echo $profile_pic; ?>" class="img-responsive" alt="image">
                                                            </a>
                                                            <h3><strong><?php echo $Name; ?></strong></h3>
                                                            <p><i class="fa fa-star"></i> <?php echo $users->MyTotalConnections; ?> connections</p>
                                                            <div class="connection-features" id="dropdown_and_button_<?php echo $users->UserProfileId; ?>">
                                                                <p>
                                                                    <button class="btn blue  btn-circle" type="button" onClick="return acceptRequest(<?php echo $users->UserProfileId; ?>);"><i class="fa fa-check"></i> </button>
                                                                    <button class="btn btn-warning btn-circle" type="button" onClick="return deleteRequest(<?php echo $users->UserProfileId; ?>);"><i class="fa fa-times"></i> </button>
                                                                </p>
                                                            </div>    
                                                        </div>
                                                        <div class="clearfix"></div>
                                                    </div>
                                                    <div class="new_loader_div" id="connection_loader_id_<?php echo $users->UserProfileId; ?>"><img src="<?=base_url();?>assets/images/new-loader.gif"></div>
                                                </div>
                                            <?php } ?>
                                        </div>
                                    </div>

                                </div>
                            </div>
                        </div>
                    </div>
            
                </div>
            </div>

        <?php  require_once './include/footer.php';?>
        </div>

        <?php  require_once './include/scroll_top.php';?>

        

</body>

<?php  require_once './include/js.php';?>
<?php  require_once './include/connect/connect.php';?>



</html>
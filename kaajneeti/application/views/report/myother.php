<!DOCTYPE html>
<html lang="en">
<head><title>My Connected Others</title>
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
                                    <li class="active"><strong><a class="text-capitalize" href="<?=base_url(); ?>report/myother">My Connected Other</a> </strong> </li>
                                </ol>
                            </div>
                            <?php
                            // echo '<pre>';
                            // print_r($Connections);
                            // echo '</pre>';
                            //die;
                            ?>
                           <div class="portlet-body">
                                <div class="row mbm">
                                    <div class="col-lg-12">
                                        <div class="table-responsive">
                                            <table id="table_id" class="table table-hover table-striped table-bordered table-advanced tablesorter display">
                                                <thead>
                                                    <tr class="condensed">
                                                        <th scope="col">Pic<span class="column-sorter"></span></th>
                                                        <th scope="col">Name<span class="column-sorter"></span></th>
                                                        <th scope="col">Email<span class="column-sorter"></span></th>
                                                        <th scope="col">Gender<span class="column-sorter"></span></th>
                                                        <th scope="col">Type<span class="column-sorter"></span></th>
                                                        <th scope="col">Connect On<span class="column-sorter"></span></th>
                                                    </tr>
                                                    <tbody>
                                                    <?php 
                                                    foreach($Connections->result AS $users) {
                                                        $Name = $users->FirstName.' '.$users->LastName;

                                                        if($users->ProfilePhotoPath != '') {
                                                            $profile_pic = ($users->ProfilePhotoPath != '') ? $users->ProfilePhotoPath : base_url().'assets/images/default-user.png';
                                                        } else {
                                                            $profile_pic = ($users->ProfilePhotoPath != '') ? $users->ProfilePhotoPath : base_url().'assets/images/default-user.png';
                                                        } 
                                                        ?>
                                                        <tr>
                                                            <td><img src="<?php echo $profile_pic; ?>" style="border: 1px solid #fff; box-shadow: 0 2px 3px rgba(0,0,0,0.25);width: 30px; height: 30px;" class="img-circle"/></td>
                                                            <td><?php echo $Name; ?></td>
                                                            <td><?php echo $users->Email; ?></td>
                                                            <td><?php echo $users->GenderName; ?></td>
                                                            <td><?php echo $users->UserTypeName; ?></td>
                                                            <td><?php echo $users->RequestAcceptedOn; ?></td>
                                                        </tr>
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

        <?php  require_once './include/footer.php';?>

        <?php  require_once './include/scroll_top.php';?>
    </div>
</body>

<?php  require_once './include/js.php';?>
<?php  require_once './include/connect/connect.php';?>



</html>
<!DOCTYPE html>
<html lang="en">
<head><title>System User</title>
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
                                    <li class="activelink"><a href="javascript:void(0);">System User</a></li>
                                </ol>
                            </div>

                            <div class="portlet-body">
                                <div class="row mbm">
                                    <div class="col-lg-12">
                                        <div class="table-responsive">

                                            <?php
                                            // echo '<pre>';
                                            // print_r($SystemUser);
                                            // echo '</pre>';
                                            ?>

                                            <table id="table_id" class="table table-hover table-striped table-bordered table-advanced tablesorter display">
                                                <thead>
                                                <tr>
                                                    <th>Pic</th>
                                                    <th>Id</th>
                                                    <th>UserName</th>
                                                    <th>Mobile</th>
                                                    <th>UserEmail</th>
                                                    <th>DOB</th>
                                                    <th>Gender</th>
                                                    <th>Martial</th>
                                                    <th>Facebook</th>
                                                    <th>Google</th>
                                                    <th>LinkedIn</th>
                                                    <th>Status</th>
                                                    <th>Login Status</th>
                                                    <th>Updated On</th>
                                                    <th>Added On</th>
                                                </tr>

                                                <?php 
                                                if(count($SystemUser->result) > 0) { ?>
                                                <tbody>
                                                <?php foreach($SystemUser->result AS $system_user) { ?>
                                                    <?php
                                                    $UserStatus = ($system_user->UserStatus == 1) ? 'Active' : 'In-Active';
                                                    $LoginStatus = ($system_user->LoginStatus == 1) ? 'Logged In' : 'Logged Out';
                                                    $MaritalStatus = ($system_user->MaritalStatus == 1) ? 'Married' : 'Single';
                                                    $Gender = ($system_user->Gender == 1) ? 'Male' : (($system_user->Gender == 2) ? 'Female' : 'Other');

                                                    $UserProfileHrefLink = base_url().'profile/userdetail/'.$system_user->UserUniqueId;

                                                    if($system_user->ProfilePhotoPath != '') {
                                                        $profile_pic = ($system_user->ProfilePhotoPath != '') ? $system_user->ProfilePhotoPath : base_url().'assets/images/default-user.png';
                                                    } else {
                                                        $profile_pic = ($system_user->ProfilePhotoPath != '') ? $system_user->ProfilePhotoPath : base_url().'assets/images/default-user.png';
                                                    }

                                                    ?>
                                                    <tr>
                                                        <td><img src="<?php echo $profile_pic; ?>" style="border: 1px solid #fff; box-shadow: 0 2px 3px rgba(0,0,0,0.25);width: 50px; height: 50px;" class="img-circle"/></td>
                                                        <td><a data-target="#modal-stackable" data-toggle="modal" href="javascript:void(0);" onClick="return viewUserDetail('<?php echo $system_user->UserUniqueId; ?>');"><?php echo $system_user->UserUniqueId; ?></a></td>
                                                        <td><a data-target="#modal-stackable" data-toggle="modal" href="javascript:void(0);" onClick="return viewUserDetail('<?php echo $system_user->UserUniqueId; ?>');"><?php echo $system_user->UserName; ?></a></td>
                                                        <td><?php echo $system_user->UserMobile; ?></td>
                                                        <td><?php echo $system_user->UserEmail; ?></td>
                                                        <td><?php echo $system_user->DateOfBirth; ?></td>
                                                        <td><?php echo $Gender; ?></td>
                                                        <td><?php echo $MaritalStatus; ?></td>
                                                        <td><?php echo $system_user->FacebookProfileId; ?></td>
                                                        <td><?php echo $system_user->GoogleProfileId; ?></td>
                                                        <td><?php echo $system_user->LinkedinProfileId; ?></td>
                                                        <td><?php echo $UserStatus; ?></td>
                                                        <td><?php echo $LoginStatus; ?></td>
                                                        <td><?php echo date('d M, Y h:i a', strtotime($system_user->UpdatedOnTime)); ?></td>
                                                        <td><?php echo date('d M, Y h:i a', strtotime($system_user->AddedOnTime)); ?></td>
                                                        <!-- <td>
                                                            <button type="button" class="btn btn-default btn-xs" data-target="#modal-stackable" data-toggle="modal" href="javascript:void(0);" onClick="return editTeam('<?php echo $system_user->UserUniqueId; ?>', '<?php echo $system_user->UserProfileId; ?>');"><i
                                                                    class="fa fa-edit"></i>&nbsp;
                                                                Edit
                                                            </button>
                                                        </td> -->
                                                    </tr>
                                                <?php } ?>
                                                
                                                </tbody>
                                                <?php }  ?> 
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
                    
                    <?php  require_once './include/footer.php';?>

                </div>
            </div>
        </div>
    </div>
    
    <?php  require_once './include/scroll_top.php';?>

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

    function viewUserDetail(user_unique_id) {

        $.post("<?php echo base_url(); ?>profile/userdetail/"+user_unique_id, {'display': 'Y'},
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
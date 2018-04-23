<!DOCTYPE html>
<html lang="en">
<head><title>My Request to Friends</title>
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
                                <h1>Request Sent</h1>
                                <div class="actions">
                                    <?php echo $this->plan_links; ?>
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
                                                        <th style="width: 3%; padding: 10px; background: #efefef"><input
                                                                type="checkbox" class="checkall"/></th>
                                                        <th>Pic</th>
                                                        <th>Name</th>
                                                        <th>Email</th>
                                                        <th>Gender</th>
                                                        <th>Party</th>
                                                        <th>Request On</th>
                                                        <th>Action</th>
                                                    </tr>

                                                    <?php if(count($result) > 0) {?>
                                                        <?php foreach($result AS $user) { ?>
                                                            <?php
                                                            $ProfilePhotoPath = ($user->user_profile_detail->user_info->ProfilePhotoPath != '') ? $user->user_profile_detail->user_info->ProfilePhotoPath : base_url().'assets/images/default-user.png';


                                                            
                                                            $Gender = ($user->user_profile_detail->user_info->Gender == 1) ? 'Male' : (($user->user_profile_detail->user_info->Gender == 2) ? 'Female' : 'Other');

                                                            $UserProfileHrefLink = base_url().'profile/profile/'.$user->user_profile_detail->user_info->UserUniqueId;

                                                            ?>
                                                        <tbody class="media-thumb" id="request_id_<?php echo $user->user_profile_detail->profile->UserProfileId; ?>">
                                                            <tr>
                                                                <td><input type="checkbox"></td>
                                                                <td><span class="img-shadow"><img
                                                                src="<?php echo $ProfilePhotoPath; ?>"
                                                                style="border: 1px solid #fff; box-shadow: 0 2px 3px rgba(0,0,0,0.25);width: 40px; height: 40px;"
                                                                class="img-circle"/></span></td>
                                                                <td><a href="<?php echo $UserProfileHrefLink; ?>" target="_blank"><h6 class="media-heading"><?php echo $user->user_profile_detail->profile->FirstName.' '.$user->user_profile_detail->profile->LastName?></h6></a>
                                                                    
                                                                </td>
                                                                <td>
                                                                    <div><?php echo $user->user_profile_detail->profile->Email; ?></div>
                                                                </td>
                                                                <td><span class="label label-success"><?php echo $Gender; ?></span></td>
                                                                <td><span class="label label-warning"><?php echo $leader_profile->UserProfileLeader->PoliticalPartyName; ?></span></td>
                                                                <td><?php echo date('d-M-Y h:i A', strtotime($user->RequestSentOn)); ?></td>
                                                                <td>
                                                                    <button type="button" class="btn btn-danger btn-xs" onClick="return cancelRequest(<?php echo $user->user_profile_detail->profile->UserProfileId; ?>);"><i
                                                                            class="fa fa-trash-o"></i>&nbsp;
                                                                        Cancel Request
                                                                    </button>
                                                                </td>
                                                            </tr>
                                                        </tbody>
                                                        <?php } ?>
                                                    <?php } else { ?>
                                                    
                                                    <?php } ?>
                                                    
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
function cancelRequest(id) {

    if (id > 0) {
        $.post("<?php echo base_url(); ?>connect/undoUserProfileFriendRequest", {id: id},
            function (data, status) {

               if (data.status === "failed") {
                    
                    sweetAlert("Oops...", data.message, "error");
                    return false;
                } else {
                    $('#request_id_'+id).html('<td colspan="100%" style="text-align: center;">'+data.message+'</td>');
                }
            });
    } else {
        sweetAlert("Oops...", "Please select user to cancel", "error");
        return false;
    }
}
</script>

</body>
</html>
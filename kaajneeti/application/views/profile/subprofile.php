<?php
if($result->user_profile_detail->user_info->UserId > 0) {

    // echo '<pre>';
    // print_r($result);
    // echo '</pre>';
    $UserId     = $result->user_profile_detail->user_info->UserId;
    $UserDetail         = $result->user_profile_detail->user_info;
    $UserProfileDetail  = $result->user_profile_detail->profile;

    $Email      = $result->user_profile_detail->profile->Email;
    $FirstName  = $result->user_profile_detail->profile->FirstName;
    $LastName   = $result->user_profile_detail->profile->LastName;
    $Name       = $FirstName.' '.$LastName;
    $Status     = (($result->user_profile_detail->profile->ProfileStatus == 1) ? 'Active' : 'In-Active');
    $AddedOn    = $result->user_profile_detail->profile->AddedOn;

    $DateOfBirth    = $UserDetail->DateOfBirth;
    $Gender         = $UserDetail->Gender;
    $MaritalStatus  = $UserDetail->MaritalStatus;
    $Mobile         = $UserDetail->UserProfileLeader->Mobile;

    $Address = '';
    if($UserDetail->Address != '') {
        $Address .= $UserDetail->Address.', ';
    }
    if($UserDetail->City != '') {
        $Address .= $UserDetail->City.', ';
    }
    if($UserDetail->State != '') {
        $Address .= $UserDetail->State.', ';
    }
    if($UserDetail->ZipCode != '') {
        $Address .= $UserDetail->ZipCode.', ';
    }
    if($UserDetail->Country != '') {
        $Address .= $UserDetail->Country.', ';
    }

    $Address = ($Address != '') ? substr($Address, 0, -2) : '';

    $WebsiteUrl         = $UserDetail->WebsiteUrl;
    $FacebookPageUrl    = $UserDetail->FacebookPageUrl;
    $TwitterPageUrl     = $UserDetail->TwitterPageUrl;
    $GooglePageUrl      = $UserDetail->GooglePageUrl;

    if($UserProfileDetail->ProfilePhotoPath != '') {
        $profile_pic = ($UserProfileDetail->ProfilePhotoPath != '') ? $UserProfileDetail->ProfilePhotoPath : base_url().'assets/images/default-user.png';
    } else {
        $profile_pic = ($UserDetail->ProfilePhotoPath != '') ? $UserDetail->ProfilePhotoPath : base_url().'assets/images/default-user.png';
    }

}
?>

<!DOCTYPE html>
<html lang="en">
<head><title><?php echo $Name; ?></title>
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

        <div class="page-content-wrapper animated fadeInRight">
            <div class="page-content">
                <div class="row  border-bottom white-bg dashboard-header">
                    <div class="col-md-12">
                        <div class="row">
                            <?php if($UserId > 0) { ?>
                            <div class="col-md-3">
                                
                                <div class="form-group">
                                    <div class="text-center mbl"><img
                                            src="<?php echo $profile_pic; ?>"
                                            style="border: 5px solid #fff; box-shadow: 0 2px 3px rgba(0,0,0,0.25);width: 150px; height: 150px;"
                                            class="img-circle"/></div>
                                </div>
                                <table class="table table-striped table-hover">
                                    <tbody>
                                    <tr>
                                        <td width="50%">Name</td>
                                        <td><?php echo $Name; ?></td>
                                    </tr>
                                    <tr>
                                        <td width="50%">Email</td>
                                        <td><?php echo $Email; ?></td>
                                    </tr>
                                    <tr>
                                        <td width="50%">Address</td>
                                        <td>
                                            <?php echo $Address; ?>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td width="50%">Status</td>
                                        <td><span class="label label-success"><?php echo $Status; ?></span></td>
                                    </tr>
                                    <tr>
                                        <td width="50%">Rating</td>
                                        <td><i class="fa fa-star text-yellow fa-fw"></i><i
                                                class="fa fa-star text-yellow fa-fw"></i><i
                                                class="fa fa-star text-yellow fa-fw"></i><i
                                                class="fa fa-star text-yellow fa-fw"></i><i
                                                class="fa fa-star text-yellow fa-fw"></i></td>
                                    </tr>
                                    <tr>
                                        <td width="50%">Join Since</td>
                                        <td><?php echo $AddedOn; ?></td>
                                    </tr>
                                    </tbody>
                                </table>
                                
                            </div>
                            <div class="col-md-9">
                            </div>
                            <?php } else { ?>
                            <h2 style="text-align: center;">Sorry, This user does not exist</h2>
                            <?php } ?>
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

</body>
</html>
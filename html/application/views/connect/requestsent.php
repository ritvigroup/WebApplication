<!DOCTYPE html>
<html lang="en">
<head><title>My Request to Friends</title>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="cache-control" content="no-cache">
    <meta http-equiv="expires" content="Thu, 19 Nov 1900 08:52:00 GMT">
    <link rel="shortcut icon" href="<?=base_url();?>assets/images/icons/favicon.ico">
    <link rel="apple-touch-icon" href="<?=base_url();?>assets/images/icons/favicon.png">
    <link rel="apple-touch-icon" sizes="72x72" href="<?=base_url();?>assets/images/icons/favicon-72x72.png">
    <link rel="apple-touch-icon" sizes="114x114" href="<?=base_url();?>assets/images/icons/favicon-114x114.png">
    <!--Loading bootstrap css-->
    <link type="text/css" rel="stylesheet"
          href="http://fonts.googleapis.com/css?family=Open+Sans:400italic,400,300,700">
    <link type="text/css" rel="stylesheet" href="http://fonts.googleapis.com/css?family=Oswald:400,700,300">
    <link type="text/css" rel="stylesheet"
          href="<?=base_url();?>assets/vendors/jquery-ui-1.10.4.custom/css/ui-lightness/jquery-ui-1.10.4.custom.min.css">
    <link type="text/css" rel="stylesheet" href="<?=base_url();?>assets/vendors/font-awesome/css/font-awesome.min.css">
    <link type="text/css" rel="stylesheet" href="<?=base_url();?>assets/vendors/bootstrap/css/bootstrap.min.css">

    <link type="text/css" rel="stylesheet" href="<?=base_url();?>assets/vendors/DataTables/media/css/jquery.dataTables.css">
    <link type="text/css" rel="stylesheet"
          href="<?=base_url();?>assets/vendors/DataTables/extensions/TableTools/css/dataTables.tableTools.min.css">

    <!--LOADING STYLESHEET FOR PAGE--><!--Loading style vendors-->
    <link type="text/css" rel="stylesheet" href="<?=base_url();?>assets/vendors/animate.css/animate.css">
    <link type="text/css" rel="stylesheet" href="<?=base_url();?>assets/vendors/jquery-pace/pace.css">
    <link type="text/css" rel="stylesheet" href="<?=base_url();?>assets/vendors/iCheck/skins/all.css">
    <link type="text/css" rel="stylesheet" href="<?=base_url();?>assets/vendors/jquery-notific8/jquery.notific8.min.css">
    <link type="text/css" rel="stylesheet" href="<?=base_url();?>assets/vendors/bootstrap-daterangepicker/daterangepicker-bs3.css">
    <!--Loading style-->
    <link type="text/css" rel="stylesheet" href="<?=base_url();?>assets/css/themes/style1/orange-blue.css" class="default-style">
    <link type="text/css" rel="stylesheet" href="<?=base_url();?>assets/css/themes/style1/orange-blue.css" id="theme-change"
          class="style-change color-change">
    <link type="text/css" rel="stylesheet" href="<?=base_url();?>assets/css/style-responsive.css">
</head>
<body class=" ">
<div>
    <!--BEGIN BACK TO TOP--><a id="totop" href="#"><i class="fa fa-angle-up"></i></a><!--END BACK TO TOP-->
    <!--BEGIN TOPBAR-->
    <?php  require_once './include/top.php';?>
    <!--END TOPBAR-->
    <div id="wrapper"><!--BEGIN SIDEBAR MENU-->
        
        <?php  require_once './include/left.php';?>

        <!--BEGIN PAGE WRAPPER-->
        <div id="page-wrapper"><!--BEGIN TITLE & BREADCRUMB PAGE-->
            <div id="title-breadcrumb-option-demo" class="page-title-breadcrumb">
                <div class="page-header pull-left">
                    <div class="page-title">Request Sent</div>
                </div>
                <ol class="breadcrumb page-breadcrumb">
                    <li><i class="fa fa-home"></i>&nbsp;<a href="<?=base_url();?>leader/home">Home</a>&nbsp;&nbsp;<i
                            class="fa fa-angle-right"></i>&nbsp;&nbsp;</li>
                    <li><a href="<?=base_url();?>leader/team">Organise</a>&nbsp;&nbsp;<i class="fa fa-angle-right"></i>&nbsp;&nbsp;</li>
                    <li class="active">Request Sent</li>
                </ol>

                <div class="clearfix"></div>
            </div>
            <!--END TITLE & BREADCRUMB PAGE--><!--BEGIN CONTENT-->
            <div class="page-content">
                <div class="row">
                    <div class="col-md-12">
                        <div class="portlet box">
                            <div class="portlet-header">
                                <div class="caption">Request Sent</div>
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
            <!--END CONTENT--></div>
        <!--BEGIN FOOTER-->
        
        <?php  require_once './include/footer.php';?>

        <!--END FOOTER--><!--END PAGE WRAPPER--></div>
</div>
<script src="<?php echo base_url(); ?>assets/js/sweetalert-dev.js"></script> 
<script src="<?php echo base_url(); ?>assets/js/sweetalert.min.js"></script> 

<script src="<?=base_url();?>assets/js/jquery-1.10.2.min.js"></script>
<script src="<?=base_url();?>assets/js/jquery-migrate-1.2.1.min.js"></script>
<script src="<?=base_url();?>assets/js/jquery-ui.js"></script>
<!--loading bootstrap js-->
<script src="<?=base_url();?>assets/vendors/bootstrap/js/bootstrap.min.js"></script>
<script src="<?=base_url();?>assets/vendors/bootstrap-hover-dropdown/bootstrap-hover-dropdown.js"></script>
<script src="<?=base_url();?>assets/js/html5shiv.js"></script>
<script src="<?=base_url();?>assets/js/respond.min.js"></script>
<script src="<?=base_url();?>assets/vendors/metisMenu/jquery.metisMenu.js"></script>
<script src="<?=base_url();?>assets/vendors/slimScroll/jquery.slimscroll.js"></script>
<script src="<?=base_url();?>assets/vendors/jquery-cookie/jquery.cookie.js"></script>
<script src="<?=base_url();?>assets/vendors/iCheck/icheck.min.js"></script>
<script src="<?=base_url();?>assets/vendors/iCheck/custom.min.js"></script>
<script src="<?=base_url();?>assets/vendors/jquery-notific8/jquery.notific8.min.js"></script>
<script src="<?=base_url();?>assets/vendors/jquery-highcharts/highcharts.js"></script>
<script src="<?=base_url();?>assets/js/jquery.menu.js"></script>
<script src="<?=base_url();?>assets/vendors/jquery-pace/pace.min.js"></script>
<script src="<?=base_url();?>assets/vendors/holder/holder.js"></script>
<script src="<?=base_url();?>assets/vendors/responsive-tabs/responsive-tabs.js"></script>
<script src="<?=base_url();?>assets/vendors/jquery-news-ticker/jquery.newsTicker.min.js"></script>
<script src="<?=base_url();?>assets/vendors/moment/moment.js"></script>
<script src="<?=base_url();?>assets/vendors/bootstrap-datepicker/js/bootstrap-datepicker.js"></script>
<script src="<?=base_url();?>assets/vendors/bootstrap-daterangepicker/daterangepicker.js"></script>
<!--CORE JAVASCRIPT-->
<script src="<?=base_url();?>assets/js/main.js"></script>
<!--LOADING SCRIPTS FOR PAGE-->
<script src="<?=base_url();?>assets/vendors/moment/moment.js"></script>
<script src="<?=base_url();?>assets/vendors/bootstrap-datetimepicker/build/js/bootstrap-datetimepicker.min.js"></script>
<script src="<?=base_url();?>assets/vendors/bootstrap-timepicker/js/bootstrap-timepicker.js"></script>
<script src="<?=base_url();?>assets/vendors/bootstrap-clockface/js/clockface.js"></script>
<script src="<?=base_url();?>assets/vendors/bootstrap-colorpicker/js/bootstrap-colorpicker.js"></script>
<script src="<?=base_url();?>assets/vendors/bootstrap-switch/js/bootstrap-switch.min.js"></script>
<script src="<?=base_url();?>assets/vendors/jquery-maskedinput/jquery-maskedinput.js"></script>
<script src="<?=base_url();?>assets/vendors/charCount.js"></script>
<script src="<?=base_url();?>assets/js/form-components.js"></script>
<!--LOADING SCRIPTS FOR PAGE-->
<script src="<?=base_url();?>assets/vendors/DataTables/media/js/jquery.dataTables.js"></script>
<script src="<?=base_url();?>assets/vendors/DataTables/media/js/dataTables.bootstrap.js"></script>
<script src="<?=base_url();?>assets/vendors/DataTables/extensions/TableTools/js/dataTables.tableTools.min.js"></script>
<script src="<?=base_url();?>assets/js/table-datatables.js"></script>

<script>
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
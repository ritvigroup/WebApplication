<?php
// echo '<pre>';
// print_r($result);
// echo '</pre>';
$UserDetail = $result;

$UserName   = $UserDetail->UserName;
$Email      = $UserDetail->UserProfileLeader->Email;
$FirstName  = $UserDetail->UserProfileLeader->FirstName;
$LastName   = $UserDetail->UserProfileLeader->LastName;
$Name       = $FirstName.' '.$LastName;
$Status     = (($UserDetail->UserProfileLeader->ProfileStatus == 1) ? 'Active' : 'In-Active');
$AddedOn    = $UserDetail->UserProfileLeader->AddedOn;

$DateOfBirth    = $UserDetail->DateOfBirth;
$Gender         = $UserDetail->Gender;
$MaritalStatus  = $UserDetail->MaritalStatus;
$Mobile         = $UserDetail->UserProfileLeader->Mobile;

$WebsiteUrl         = $UserDetail->UserProfileLeader->WebsiteUrl;
$FacebookPageUrl    = $UserDetail->UserProfileLeader->FacebookPageUrl;
$TwitterPageUrl     = $UserDetail->UserProfileLeader->TwitterPageUrl;
$GooglePageUrl      = $UserDetail->UserProfileLeader->GooglePageUrl;


$profile_pic = ($UserDetail->ProfilePhotoPath != '') ? $UserDetail->ProfilePhotoPath : base_url().'assets/images/default-user.png';
?>

<!DOCTYPE html>
<html lang="en">
<head><title><?php echo $Name; ?></title>
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
    <!--LOADING STYLESHEET FOR PAGE-->
    <link type="text/css" rel="stylesheet" href="<?=base_url();?>assets/vendors/bootstrap-datepicker/css/datepicker.css">
    <!--Loading style vendors-->
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
                    <div class="page-title"><?php echo $Name; ?></div>
                </div>
                <ol class="breadcrumb page-breadcrumb">
                    <li><i class="fa fa-home"></i>&nbsp;<a href="<?=base_url();?>leader/home">Home</a>&nbsp;&nbsp;<i
                            class="fa fa-angle-right"></i>&nbsp;&nbsp;</li>
                    <li class="active">Profile</li>
                </ol>
                <div class="btn btn-blue reportrange hide"><i class="fa fa-calendar"></i>&nbsp;<span></span>&nbsp;report&nbsp;<i
                        class="fa fa-angle-down"></i><input type="hidden" name="datestart"/><input type="hidden"
                                                                                                   name="endstart"/>
                </div>
                <div class="clearfix"></div>
            </div>
            <!--END TITLE & BREADCRUMB PAGE--><!--BEGIN CONTENT-->

            
            <div class="page-content">
                <div id="page-user-profile" class="row">
                    <div class="col-md-12">
                        <div class="row">
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
                                        <td width="50%">User Name</td>
                                        <td><?php echo $UserName; ?></td>
                                    </tr>
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
                                        <td>Street 123, Avenue 45, Country</td>
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
                                <ul class="nav nav-tabs ul-edit responsive">
                                    <li class="active"><a href="#tab-edit" data-toggle="tab"><i class="fa fa-edit"></i>&nbsp;
                                        Edit Profile</a></li>
                                </ul>
                                <div id="generalTabContent" class="tab-content">
                                    <div id="tab-edit" class="tab-pane fade in active">
                                        <div class="row">
                                            <div class="col-md-9">
                                                <div class="tab-content">
                                                    <div id="tab-profile-setting" class="tab-pane fade in active">
                                                        <form action="" class="form-horizontal" onSubmit="return false;">
                                                            <div class="form-group"><label
                                                                    class="col-sm-3 control-label">First Name</label>

                                                                <div class="col-sm-9 controls"><input type="text" id="first_name" value="<?php echo $FirstName; ?>"
                                                                                                      placeholder="first name"
                                                                                                      class="form-control"/>
                                                                </div>
                                                            </div>
                                                            <div class="form-group"><label
                                                                    class="col-sm-3 control-label">Last Name</label>

                                                                <div class="col-sm-9 controls"><input type="text" id="last_name" value="<?php echo $LastName; ?>"
                                                                                                      placeholder="last name"
                                                                                                      class="form-control"/>
                                                                </div>
                                                            </div>
                                                            <div class="form-group"><label
                                                                    class="col-sm-3 control-label">Gender</label>

                                                                <div class="col-sm-9 controls">
                                                                    <div class="radio-list">
                                                                        <label class="radio-inline"><input type="radio" value="1" name="gender" <?php if($Gender == 1) { ?> checked="checked"<?php } ?> />&nbsp;Male</label>
                                                                        <label class="radio-inline"><input type="radio" value="2" name="gender" <?php if($Gender == 2) { ?> checked="checked"<?php } ?> />&nbsp;Female</label>
                                                                        <label class="radio-inline"><input type="radio" value="3" name="gender" <?php if($Gender == 3) { ?> checked="checked"<?php } ?> />&nbsp;Other</label>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="form-group"><label
                                                                    class="col-sm-3 control-label">Birthday</label>

                                                                <div class="col-sm-9 controls">
                                                                    <div class="row">
                                                                        <div class="col-xs-6"><input type="text" id="date_of_birth" value="<?php echo $DateOfBirth; ?>"
                                                                                                     data-date-format="yyyy-mm-dd"
                                                                                                     placeholder="yyyy-mm-dd"
                                                                                                     class="datepicker-normal form-control"/>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="form-group"><label
                                                                    class="col-sm-3 control-label">Marital
                                                                Status</label>

                                                                <div class="col-sm-9 controls">
                                                                    <div class="row">
                                                                        <div class="col-xs-6"><select
                                                                                class="form-control" id="martial_status">
                                                                            <option value="0" <?php if($MaritalStatus == 0) { ?> selected="selected"<?php } ?> >Single</option>
                                                                            <option value="1" <?php if($MaritalStatus == 1) { ?> selected="selected"<?php } ?> >Married</option>
                                                                        </select></div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            
                                                            <div class="form-group"><label
                                                                    class="col-sm-3 control-label">Profile Pic</label>

                                                                <div class="col-sm-9 controls">
                                                                    <input type="file" name="file" id="file">
                                                                </div>
                                                            </div>
                                                            <div class="form-group mbn"><label
                                                                    class="col-sm-3 control-label"></label>

                                                                <div class="col-sm-9 controls">
                                                                    <button type="submit" class="btn btn-success" onClick="return submit_profile_setting();"><i
                                                                            class="fa fa-save"></i>&nbsp;
                                                                        Save
                                                                    </button>
                                                                    &nbsp; &nbsp;<a href="#" class="btn btn-default">Cancel</a>
                                                                </div>
                                                            </div>
                                                        </form>
                                                    </div>
                                                    <div id="tab-account-setting" class="tab-pane fade">
                                                        <form action="" class="form-horizontal" onSubmit="return false;">
                                                            <div class="form-body">
                                                                <div class="form-group"><label
                                                                        class="col-sm-3 control-label">Email</label>

                                                                    <div class="col-sm-9 controls"><input type="email" id="email" value="<?php echo $Email; ?>"
                                                                                                          placeholder="email@yourcompany.com"
                                                                                                          class="form-control"/>
                                                                    </div>
                                                                </div>
                                                                <div class="form-group"><label
                                                                        class="col-sm-3 control-label">Username</label>

                                                                    <div class="col-sm-9 controls"><input type="text" value="<?php echo $UserName; ?>" readonly disabled="disabled"
                                                                                                          placeholder="username"
                                                                                                          class="form-control"/>
                                                                    </div>
                                                                </div>
                                                                <div class="form-group"><label
                                                                        class="col-sm-3 control-label">Password</label>

                                                                    <div class="col-sm-9 controls">
                                                                        <div class="row">
                                                                            <div class="col-xs-6"><input type="password" id="password"
                                                                                                         placeholder=""
                                                                                                         class="form-control"/>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div class="form-group"><label
                                                                        class="col-sm-3 control-label">Confirm
                                                                    Password</label>

                                                                    <div class="col-sm-9 controls">
                                                                        <div class="row">
                                                                            <div class="col-xs-6"><input type="password" id="confirm_password"
                                                                                                         placeholder=""
                                                                                                         class="form-control"/>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div class="form-group mbn"><label
                                                                        class="col-sm-3 control-label"></label>

                                                                    <div class="col-sm-9 controls">
                                                                        <button type="submit" class="btn btn-success account_setting"><i
                                                                                class="fa fa-save"></i>&nbsp;
                                                                            Save
                                                                        </button>
                                                                        &nbsp; &nbsp;<a href="#"
                                                                                        class="btn btn-default">Cancel</a>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </form>
                                                    </div>
                                                    <div id="tab-contact-setting" class="tab-pane fade">
                                                        <form action="" class="form-horizontal" onSubmit="return false;">
                                                            <div class="form-group"><label
                                                                    class="col-sm-3 control-label">Mobile Phone</label>

                                                                <div class="col-sm-9 controls"><input type="text" id="mobile" value="<?php echo $Mobile; ?>"
                                                                                                      placeholder="0-123-456-789"
                                                                                                      class="form-control"/>
                                                                </div>
                                                            </div>
                                                            <div class="form-group"><label
                                                                    class="col-sm-3 control-label">Website</label>

                                                                <div class="col-sm-9 controls"><input type="text" id="website_url" value="<?php echo $WebsiteUrl; ?>"
                                                                                                      placeholder="http://www.mywebsite.com"
                                                                                                      class="form-control"/>
                                                                </div>
                                                            </div>
                                                            <div class="form-group"><label
                                                                    class="col-sm-3 control-label">Facebook</label>

                                                                <div class="col-sm-9 controls"><input type="text" id="facebook_url" value="<?php echo $FacebookPageUrl; ?>" 
                                                                                                      placeholder="https://www.facebook.com"
                                                                                                      class="form-control"/>
                                                                </div>
                                                            </div>
                                                            <div class="form-group"><label
                                                                    class="col-sm-3 control-label">Twitter</label>

                                                                <div class="col-sm-9 controls"><input type="text" id="twitter_url" value="<?php echo $TwitterPageUrl; ?>"
                                                                                                      placeholder="https://www.twitter.com"
                                                                                                      class="form-control"/>
                                                                </div>
                                                            </div>
                                                             <div class="form-group"><label
                                                                    class="col-sm-3 control-label">Google</label>

                                                                <div class="col-sm-9 controls"><input type="text" id="google_url" value="<?php echo $GooglePageUrl; ?>"
                                                                                                      placeholder="https://www.google.com"
                                                                                                      class="form-control"/>
                                                                </div>
                                                            </div>
                                                            <div class="form-group mbn"><label
                                                                    class="col-sm-3 control-label"></label>

                                                                <div class="col-sm-9 controls">
                                                                    <button type="submit" class="btn btn-success contact_setting"><i
                                                                            class="fa fa-save"></i>&nbsp;
                                                                        Save
                                                                    </button>
                                                                    &nbsp; &nbsp;<a href="#" class="btn btn-default">Cancel</a>
                                                                </div>
                                                            </div>
                                                        </form>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-3">
                                                <ul class="nav nav-pills nav-stacked">
                                                    <li class="active"><a href="#tab-profile-setting" data-toggle="tab"><i
                                                            class="fa fa-folder-open"></i>&nbsp;
                                                        Profile Setting</a></li>
                                                    <li><a href="#tab-account-setting" data-toggle="tab"><i
                                                            class="fa fa-cogs"></i>&nbsp;
                                                        Account Setting</a></li>
                                                    <li><a href="#tab-contact-setting" data-toggle="tab"><i
                                                            class="fa fa-envelope-o"></i>&nbsp;
                                                        Contact Setting</a></li>
                                                </ul>
                                            </div>
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
<script src="<?=base_url();?>assets/vendors/bootstrap-datepicker/js/bootstrap-datepicker.js"></script>
<script src="<?=base_url();?>assets/js/extra-profile.js"></script>


<script>

    function submit_profile_setting() {

        var first_name          = $("#first_name").val();
        var last_name           = $("#last_name").val();
        var gender              = $("input[name='gender']:checked").val();
        var date_of_birth       = $("#date_of_birth").val();
        var martial_status      = $('#martial_status option:selected').val();


        // console.log('first_name:'+first_name);
        // console.log('last_name:'+last_name);
        // console.log('gender:'+gender);
        // console.log('date_of_birth:'+date_of_birth);
        // console.log('martial_status:'+martial_status);

        var form_data = new FormData($('input[name^="file"]'));

        var file_selected = 0;
        jQuery.each($('input[name^="file"]')[0].files, function(i, file) {
            form_data.append('file', file);
            file_selected++;
        });

        if(file_selected > 0) {
            form_data.append('first_name', first_name);
            form_data.append('last_name', last_name);
            form_data.append('fullname', first_name+' '+last_name);
            form_data.append('gender', gender);
            form_data.append('date_of_birth', date_of_birth);
            form_data.append('martial_status', martial_status);


            if (first_name.length > 0) {

                jQuery.ajax({
                    type: 'POST',
                    cache: false,
                    processData: false,
                    contentType: false,
                    data: form_data,
                    url: "<?php echo base_url(); ?>profile/profile",

                    success: function(data) {
                        if (data.status === "failed") {
                            sweetAlert("Oops...", data.message, "error");
                            return false;
                        } else { 
                            if (data.status === "success") {
                                window.location.href="profile";
                            }
                        }
                    }
                });

            } else {
                sweetAlert("Oops...", "Please enter first name", "error");
                return false;
            }
        } else {
            if (first_name.length > 0) {
                $.post("<?php echo base_url(); ?>profile/profile", {
                                                                first_name: first_name, 
                                                                last_name: last_name,
                                                                fullname: first_name+' '+last_name,
                                                                gender: gender,
                                                                date_of_birth: date_of_birth,
                                                                martial_status: martial_status,
                                                                },
                function (data, status) {
                   
                    if (data.status === "failed") {
                        sweetAlert("Oops...", data.message, "error");
                        return false;
                    } else { 
                        if (data.status === "success") {
                            window.location.href="profile";
                        }
                    }
                });
            } else {
                sweetAlert("Oops...", "Please enter first name", "error");
                return false;
            }
        }
    };
</script> 

</body>
</html>
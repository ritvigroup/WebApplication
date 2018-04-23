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
                                                                    <button type="submit" class="btn btn-success profile_setting" onClick="return submit_profile_setting();"><i
                                                                            class="fa fa-save"></i>&nbsp;
                                                                        Save
                                                                    </button>
                                                                    &nbsp; &nbsp;<a href="javascript:void(0);" class="btn btn-default">Cancel</a>
                                                                </div>
                                                            </div>
                                                        </form>
                                                    </div>
                                                    <div id="tab-account-setting" class="tab-pane fade">
                                                        <form action="" class="form-horizontal" onSubmit="return false;">
                                                            <div class="form-body">
                                                                <div class="form-group"><label
                                                                        class="col-sm-3 control-label">Email</label>

                                                                    <div class="col-sm-9 controls"><input type="email" id="email" value="<?php echo $Email; ?>" placeholder="email@yourcompany.com"class="form-control"  readonly disabled="disabled" />
                                                                    </div>
                                                                </div>
                                                                <div class="form-group"><label
                                                                        class="col-sm-3 control-label">Username</label>

                                                                    <div class="col-sm-9 controls"><input type="text" value="<?php echo $UserName; ?>" readonly disabled="disabled" placeholder="username" class="form-control"/>
                                                                    </div>
                                                                </div>
                                                                <div class="form-group"><label
                                                                        class="col-sm-3 control-label">Password</label>

                                                                    <div class="col-sm-9 controls">
                                                                        <div class="row">
                                                                            <div class="col-xs-6"><input type="password" id="password" placeholder="" class="form-control" autocomplete="off" />
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div class="form-group"><label
                                                                        class="col-sm-3 control-label">Confirm
                                                                    Password</label>

                                                                    <div class="col-sm-9 controls">
                                                                        <div class="row">
                                                                            <div class="col-xs-6"><input type="password" id="confirm_password" placeholder="" class="form-control" autocomplete="off" />
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div class="form-group mbn"><label
                                                                        class="col-sm-3 control-label"></label>

                                                                    <div class="col-sm-9 controls">
                                                                        <button type="submit" class="btn btn-success account_setting" onClick="return submit_account_setting();"><i
                                                                                class="fa fa-save"></i>&nbsp;
                                                                            Save
                                                                        </button>
                                                                        &nbsp; &nbsp;<a href="javascript:void(0);" class="btn btn-default">Cancel</a>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </form>
                                                    </div>
                                                    <div id="tab-contact-setting" class="tab-pane fade">
                                                        <form action="" class="form-horizontal" onSubmit="return false;">
                                                            <div class="form-group"><label
                                                                    class="col-sm-3 control-label">Mobile Phone</label>

                                                                <div class="col-sm-9 controls"><input type="text" id="mobile" value="<?php echo $Mobile; ?>" placeholder="0-123-456-789" readonly disabled="disabled" class="form-control"/>
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
                                                                    <button type="submit" class="btn btn-success contact_setting" onClick="return submit_contact_setting();"><i
                                                                            class="fa fa-save"></i>&nbsp;
                                                                        Save
                                                                    </button>
                                                                    &nbsp; &nbsp;<a href="javascript:void(0);" class="btn btn-default">Cancel</a>
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

    function submit_profile_setting() {

        var first_name          = $("#first_name").val();
        var last_name           = $("#last_name").val();
        var gender              = $("input[name='gender']:checked").val();
        var date_of_birth       = $("#date_of_birth").val();
        var martial_status      = $('#martial_status option:selected').val();

        var form_data = new FormData($('input[name^="file"]'));

        var file_selected = 0;
        jQuery.each($('input[name^="file"]')[0].files, function(i, file) {
            form_data.append('file', file);
            file_selected++;
        });

        $('.profile_setting').html('<i class="fa fa-save"></i> Updating');

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
    }

    
    function submit_account_setting() {
        var password          = $("#password").val();
        var confirm_password  = $("#confirm_password").val();

        
        if (password.length < 6) {
            sweetAlert("Oops...", "Please enter password atleast 6 character", "error");
            return false;
        } else if (confirm_password.length < 6) {
            sweetAlert("Oops...", "Please enter confirm password atleast 6 character", "error");
            return false;
        } else if (password != confirm_password) {
            sweetAlert("Oops...", "Password and confirm password not matched", "error");
            return false;
        } else {
            $('.account_setting').html('<i class="fa fa-save"></i> Updating');

            $.post("<?php echo base_url(); ?>profile/profile", {
                                                            password: password, 
                                                            confirm_password: confirm_password,
                                                            update_password: 'Y',
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
        }
    }


    function submit_contact_setting() {
        var website_url     = $("#website_url").val();
        var facebook_url    = $("#facebook_url").val();
        var twitter_url     = $("#twitter_url").val();
        var google_url      = $("#google_url").val();
        
        $('.contact_setting').html('<i class="fa fa-save"></i> Updating');

        $.post("<?php echo base_url(); ?>profile/profile", {
                                                        website_url: website_url, 
                                                        facebook_url: facebook_url,
                                                        twitter_url: twitter_url,
                                                        google_url: google_url,
                                                        update_contact: 'Y',
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
    }

</script> 

</body>
</html>
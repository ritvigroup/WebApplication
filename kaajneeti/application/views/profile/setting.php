<!DOCTYPE html>
<html lang="en">
<head><title>Setting</title>
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
        <!-- End page sidebar wrapper -->

        <!-- Start page content wrapper -->
        <div class="page-content-wrapper animated fadeInRight">
            <div class="page-content">
                <div class="row  border-bottom white-bg dashboard-header">
                    <div class="col-md-12">
                        <div class="portlet box ">
                            <div class="portlet-header">
                                <ol class="breadcrumb">
                                    <li> <a class="text-capitalize" href="<?=base_url();?>leader/dashboard">Home</a> </li>
                                    <!-- <li> <a class="text-capitalize" href="</?=base_url(); ?>connect">connect</a> </li> -->
                                    <li class="active"><strong><a class="text-capitalize" href="<?=base_url(); ?>profile/setting">Setting</a> </strong> </li>
                                </ol>
                            </div>

                            <div class="portlet-body">
                                <div class="mbm">
                                    <div class="row">
                                        <div class="col-sm-12">
                                            
                                            <h2 class="text-uppercase">Setting</h2>
                                            <hr>
                                            
                                        </div>
                                    </div>

                                    <div class="row profile-setting">
                                       <dl class="col-sm-3">
                                            <dt class="uppercase">ORGNIZE</dt>
                                            <dd><a href="<?php echo base_url(); ?>organize/team">Team</a></dd>
                                            <dd><a href="<?php echo base_url(); ?>organize/fleet">Fleet</a></dd>
                                            <dd><a href="<?php echo base_url(); ?>organize/document">Document</a></dd>
                                            <dd><a href="<?php echo base_url(); ?>organize/group">Group</a></dd>
                                        </dl>
                                        <dl class="col-sm-3">
                                            <dt class="uppercase">USERS AND CONTROL</dt>
                                            <dd><a href="#">Personal Settings</a></dd>
                                            <dd><a href="#">Personal Settings</a></dd>
                                            <dd><a href="#">Personal Settings</a></dd>
                                            <dd><a href="#">Personal Settings</a></dd>
                                        </dl>
                                        <dl class="col-sm-3">
                                            <dt class="uppercase">GENERAL</dt>
                                            <dd><a href="#">Personal Settings</a></dd>
                                            <dd><a href="#">Personal Settings</a></dd>
                                            <dd><a href="#">Personal Settings</a></dd>
                                            <dd><a href="#">Personal Settings</a></dd>
                                        </dl>
                                        <dl class="col-sm-3">
                                            <dt class="uppercase">USERS AND CONTROL</dt>
                                            <dd><a href="#">Personal Settings</a></dd>
                                            <dd><a href="#">Personal Settings</a></dd>
                                            <dd><a href="#">Personal Settings</a></dd>
                                            <dd><a href="#">Personal Settings</a></dd>
                                        </dl> 
                                    </div>

                                    <div class="row profile-setting">
                                       <dl class="col-sm-3">
                                            <dt class="uppercase">AUTOMATION</dt>
                                            <dd><a href="#">Workflow Rules</a></dd>
                                            <dd><a href="#">Blueprint</a></dd>
                                            <dd><a href="#">Approval Processes</a></dd>
                                            <dd><a href="#">Schedules</a></dd>
                                            <dd><a href="#">Actions</a></dd>
                                            <dd><a href="#">Assignment Rules</a></dd>
                                            <dd><a href="#">Case Escalation Rules</a></dd>
                                            <dd><a href="#">Scoring Rules</a></dd>
                                        </dl>
                                        <dl class="col-sm-3">
                                            <dt class="uppercase">DATA ADMINISTRATION</dt>
                                            <dd><a href="#">Import</a></dd>
                                            <dd><a href="#">Export</a></dd>
                                            <dd><a href="#">Remove sample data</a></dd>
                                            <dd><a href="#">Storage</a></dd>
                                            <dd><a href="#">Recycle Bin</a></dd>
                                            <dd><a href="#">Audit Log</a></dd>
                                        </dl>
                                        <dl class="col-sm-3">
                                            <dt class="uppercase">MARKETPLACE</dt>
                                            <dd><a href="#">All</a></dd>
                                            <dd><a href="#">Zoho</a></dd>
                                            <dd><a href="#">Google</a></dd>
                                            <dd><a href="#">Microsoft</a></dd>
                                        </dl>
                                        <dl class="col-sm-3">
                                            <dt class="uppercase">DEVELOPER SPACE</dt>
                                            <dd><a href="#">APIs</a></dd>
                                            <dd><a href="#">Widgets</a></dd>
                                            <dd><a href="#">Functions</a></dd>
                                            <dd><a href="#">Connections</a></dd>
                                            <dd><a href="#">CRM Variables</a></dd>
                                            <dd><a href="#">Webforms</a></dd>
                                            <dd><a href="#">SDKs</a></dd>
                                            <dd><a href="#">MobileApps</a></dd>
                                        </dl> 
                                    </div>

                                </div>
                            </div>
                        </div>
                    </div>
            
                    <!-- stat timeline and feed  -->
                    <div class="top20">                        
                        <div class="clearfix"> </div>
                        <!-- End projects list -->
                    </div>
                </div>
            </div>
            
        </div>



    <?php  require_once './include/scroll_top.php';?>
    <?php  require_once './include/footer.php';?>

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
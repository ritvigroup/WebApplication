<!DOCTYPE html>
<html lang="en">
<head><title>Registration</title>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="cache-control" content="no-cache">
    <meta http-equiv="expires" content="Thu, 19 Nov 1900 08:52:00 GMT">
    <!--Loading bootstrap css-->
    <link type="text/css" href="http://fonts.googleapis.com/css?family=Open+Sans:400italic,700italic,800italic,400,700,800">
    <link type="text/css" rel="stylesheet" href="http://fonts.googleapis.com/css?family=Oswald:400,700,300">
    <link type="text/css" rel="stylesheet" href="<?=base_url();?>assets/vendors/jquery-ui-1.10.3.custom/css/ui-lightness/jquery-ui-1.10.3.custom.css">
    <link type="text/css" rel="stylesheet" href="<?=base_url();?>assets/vendors/font-awesome/css/font-awesome.min.css">
    <link type="text/css" rel="stylesheet" href="<?=base_url();?>assets/vendors/bootstrap/css/bootstrap.min.css">

    <link type="text/css" rel="stylesheet" href="<?php echo base_url(); ?>assets/css/sweetalert.css?ver=1.04">

    <!--Loading style vendors-->
    <link type="text/css" rel="stylesheet" href="<?=base_url();?>assets/vendors/animate.css/animate.css">
    <link type="text/css" rel="stylesheet" href="<?=base_url();?>assets/vendors/iCheck/skins/all.css">
    <!--Loading style-->
    <link type="text/css" rel="stylesheet" href="<?=base_url();?>assets/css/themes/style1/pink-blue.css" class="default-style">
    <link type="text/css" rel="stylesheet" href="<?=base_url();?>assets/css/themes/style1/pink-blue.css" id="theme-change" class="style-change color-change">
    <link type="text/css" rel="stylesheet" href="<?=base_url();?>assets/css/style-responsive.css">
    <link rel="shortcut icon" href="<?=base_url();?>assets/images/favicon.ico">
</head>
<body id="signup-page">
<div class="page-form">
    <form id="signup-form" action="<?=base_url();?>leader/register" class="form" onSubmit="return false;">
        <div class="header-content"><h1>Register</h1></div>
        <div class="body-content">
            <div class="form-group">
                <div class="input-icon right"><i class="fa fa-envelope"></i><input type="email"
                                                                                   placeholder="Email address"
                                                                                   name="email" class="form-control signup_email" maxlength="100">
                </div>
            </div>
            <div class="form-group">
                <div class="input-icon right"><i class="fa fa-phone"></i><input type="text" placeholder="Mobile"
                                                                               name="mobile" class="form-control signup_mobile" maxlength="15">
                </div>
            </div>
            <div class="form-group">
                <div class="input-icon right"><i class="fa fa-user"></i><input type="text" placeholder="Username"
                                                                               name="username" class="form-control signup_username" maxlength="20">
                </div>
            </div>
            <div class="form-group">
                <div class="input-icon right"><i class="fa fa-key"></i><input id="password" type="password"
                                                                              placeholder="Password" name="password"
                                                                              class="form-control signup_password" maxlength="20"></div>
            </div>
            <div class="form-group">
                <div class="input-icon right"><i class="fa fa-key"></i><input type="password"
                                                                              placeholder="Confirm Password"
                                                                              name="passwordConfirm"
                                                                              class="form-control signup_confirm_password" maxlength="20"></div>
            </div>
            <hr>
            <div style="margin-bottom: 15px" class="row">
                <div class="col-lg-6"><label><input type="text" placeholder="First Name" name="firstname"
                                                    class="form-control signup_firstname" maxlength="30"></label></div>
                <div class="col-lg-6"><label><input type="text" placeholder="Last Name" name="lastname"
                                                    class="form-control signup_lastname" maxlength="30"></label></div>
            </div>
            <div class="form-group"><label style="display: block" class="select">
                <select name="gender" class="form-control signup_gender">
                <option value="0" selected disabled>Gender</option>
                <option value="1">Male</option>
                <option value="2">Female</option>
                <option value="3">Other</option>
            </select></label></div>

            <div class="form-group">
                <div class="checkbox-list"><label><input id="terms" type="checkbox" name="terms">&nbsp;
                    I agree with the Terms and Conditions</label></div>
            </div>
            <hr>
            <div class="form-group mbn"><a href="<?=base_url();?>leader/login" class="btn btn-warning"><i
                    class="fa fa-chevron-circle-left"></i>&nbsp;
                Back</a>
                <button type="submit" class="btn btn-info pull-right signup_button">Submit
                    &nbsp;<i class="fa fa-chevron-circle-right"></i></button>
            </div>
        </div>
    </form>
</div>
<script src="<?php echo base_url(); ?>assets/js/sweetalert-dev.js"></script> 
<script src="<?php echo base_url(); ?>assets/js/sweetalert.min.js"></script> 

<script src="<?=base_url();?>assets/js/jquery-1.10.2.min.js"></script>
<script src="<?=base_url();?>assets/js/jquery-migrate-1.2.1.min.js"></script>
<script src="<?=base_url();?>assets/js/jquery-ui.js"></script>
<!--loading bootstrap js-->
<script src="<?=base_url();?>assets/vendors/bootstrap/js/bootstrap.min.js"></script>
<script src="<?=base_url();?>assets/vendors/bootstrap-hover-dropdown/bootstrap-hover-dropdown.js"></script>
<script src="<?=base_url();?>assets/vendors/jquery-validate/jquery.validate.min.js"></script>
<script src="<?=base_url();?>assets/js/html5shiv.js"></script>
<script src="<?=base_url();?>assets/js/respond.min.js"></script>
<script src="<?=base_url();?>assets/js/extra-signup.js"></script>
<script src="<?=base_url();?>assets/vendors/iCheck/icheck.min.js"></script>
<script src="<?=base_url();?>assets/vendors/iCheck/custom.min.js"></script>
<script>//BEGIN CHECKBOX & RADIO
$('input[type="checkbox"]').iCheck({
    checkboxClass: 'icheckbox_minimal-grey',
    increaseArea: '20%' // optional
});
$('input[type="radio"]').iCheck({
    radioClass: 'iradio_minimal-grey',
    increaseArea: '20%' // optional
});
//END CHECKBOX & RADIO</script>

<script>
    /*document.querySelector('.signup_button').onclick = function () {
        var $this = $(this);
        var signup_email = $(".signup_email").val();
        var signup_mobile = $(".signup_mobile").val();
        var signup_username = $(".signup_username").val();
        var signup_username = signup_username.replace(/ /g,'');
        var signup_password = $(".signup_password").val();
        var signup_confirm_password = $(".signup_confirm_password").val();
        var signup_firstname = $(".signup_firstname").val();
        var signup_lastname = $(".signup_lastname").val();
        var signup_gender = $(".signup_gender").val();

        var error_found = false;
        var pattern = /^\b[A-Z0-9._%-]+@[A-Z0-9.-]+\.[A-Z]{2,4}\b$/i;
        if (!pattern.test(signup_email)) {
            sweetAlert("Error", "Please enter valid email address", "error");
            return false;
        } else if (signup_mobile.length < 10) {
            sweetAlert("Error", "Please enter valid phone number", "error");
            return false;
        } else if (signup_username.length < 6) {
            sweetAlert("Error", "Please enter your username atleast 6 character", "error");
            return false;
        } else if (signup_password.length < 6) {
            sweetAlert("Error", "Please enter atleast 6 character password", "error");
            return false;
        } else if (signup_confirm_password.length < 6) {
            sweetAlert("Error", "Please confirm your password", "error");
            return false;
        } else if (signup_password != signup_confirm_password) {
            sweetAlert("Error", "Please check both password and confirm password", "error");
            return false;
        } else if (signup_firstname.length < 3) {
            sweetAlert("Error", "Please enter valid first name atleast 3 charater", "error");
            return false;
        } else if (signup_lastname < 3) {
            sweetAlert("Error", "Please enter valid last name atleast 3 character", "error");
            return false;
        } else if (signup_gender == 0) {
            sweetAlert("Error", "Please select your gender", "error");
            return false;
        } else if($('#terms').prop("checked") == false) {
            sweetAlert("Error", "Please select terms and conditions checkbox", "error");
            return false;
        } else {

            $('.signup_button').html('Validating');

            $.post("<?php echo base_url(); ?>leader/register", 
                                    {
                                        email: signup_email, 
                                        mobile: signup_mobile, 
                                        username: signup_username, 
                                        password: signup_password, 
                                        passwordConfirm: signup_confirm_password, 
                                        firstname: signup_firstname, 
                                        lastname: signup_lastname, 
                                        gender: signup_gender
                                    },
                function (data, status) {
                   
                    if (data.status === "failed") {
                        sweetAlert("Error", data.message, "error");
                        $('.signup_button').html('Submit');
                        return false;
                    } else { 
                        $this.button('Submit');
                        if (data.status === "success") {
                            $('.signup_button').html('Registration Successful');

                            window.location.href="dashboard";
                        }
                    }
                });
        }
    };*/
</script> 

</body>
</html>
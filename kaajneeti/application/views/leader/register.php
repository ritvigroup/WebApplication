<!DOCTYPE html>
<html lang="en">
<head><title>Registration</title>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="cache-control" content="no-cache">
    <meta http-equiv="expires" content="Thu, 19 Nov 1900 08:52:00 GMT">
    <!--Loading bootstrap css-->
    <link rel="shortcut icon" href="<?=base_url();?>assets/images/favicon.ico">

    <!-- Bootstrap -->
    <link href="<?=base_url();?>assets/css/bootstrap.min.css" rel="stylesheet">
    <!-- slimscroll -->
    <link href="<?=base_url();?>assets/css/jquery.slimscroll.css" rel="stylesheet">
    <!-- Fontes -->
    <link href="<?=base_url();?>assets/css/font-awesome.min.css" rel="stylesheet">
    <link href="assets/css/simple-line-icons.css" rel="stylesheet">
    <!-- all buttons css -->
    <link href="<?=base_url();?>assets/css/buttons.css" rel="stylesheet">
    <!-- animate css -->
    <link href="<?=base_url();?>assets/css/animate.css" rel="stylesheet">
    <!-- adminbag main css -->
    <link href="<?=base_url();?>assets/css/main.css" rel="stylesheet">
    <!-- aqua black theme css -->
    <link href="<?=base_url();?>assets/css/aqua-black.css" rel="stylesheet">
    <!-- media css for responsive  -->
    <link href="<?=base_url();?>assets/css/main.media.css" rel="stylesheet">
    <!--[if lt IE 9]> <script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script> <![endif]-->
    <!--[if lt IE 9]> <script src="dist/html5shiv.js"></script> <![endif]-->

    <link type="text/css" rel="stylesheet" href="<?php echo base_url(); ?>assets/css/sweetalert.css?ver=1.04">

</head>
<body class="login-layout-full login">
    <div class="page-brand-info">
        <div class="brand"> <h1 class="logo-name">KaajNeeti</h1> </div>
        <p class="font-size-20">Ab Raajneeti nahi Kaajneeti chalegi</p>
        </div>
        <div class="loginColumns " style="width: 400px">
        
        <h3>Register to KaajNeeti</h3>
        <p>Create account to see it in action.</p>
        <div class="form-group"><input type="text" placeholder="First Name" name="firstname" class="form-control signup_firstname" maxlength="30"></div>
        <div class="form-group"><input type="text" placeholder="Last Name" name="lastname" class="form-control signup_lastname" maxlength="30"></div>
        <div class="form-group"><input type="text" required="" placeholder="Email" name="email" class="form-control signup_email" maxlength="100"></div>
        <div class="form-group"><input type="text" required="" placeholder="Mobile" name="mobile" class="form-control signup_mobile" maxlength="20"></div>
        <div class="form-group">
            <select name="gender" class="form-control signup_gender">
                <option value="0" selected disabled>Gender</option>
                <option value="1">Male</option>
                <option value="2">Female</option>
                <option value="3">Other</option>
            </select>
        </div>
        <p class="top15"><hr></p>
        <div class="form-group"><input type="text" placeholder="Username" name="username" class="form-control signup_username" maxlength="20"></div>
        <div class="form-group"><input type="password" required="" placeholder="Password" class="form-control signup_password"></div>
        
        
        <div class="form-group">
            <div class="1i-checks">
                <input type="checkbox" id="terms" name="terms" class="iCheck" indeterminate="true">
                Agree the terms and policy 
            </div>
        </div>
        <button class="btn aqua block full-width m-b signup_button" type="submit">Register</button>
        <p class="text-muted text-center"><small>Already have an account?</small></p>
        <a href="<?=base_url();?>leader/login" class="btn btn-sm btn-white btn-block">Login</a>
        <p class=" copyR"> <small>Developed at: <a href="http://www.ritvigroup.com" target="_blank">Ritvi Innovation Pvt. Ltd.</a> &copy; 2016-2017</small> </p>
    </div>
</body>
<script src="<?php echo base_url(); ?>assets/js/sweetalert-dev.js"></script> 
<script src="<?php echo base_url(); ?>assets/js/sweetalert.min.js"></script> 

<script src="<?=base_url();?>assets/js/vendor/jquery.min.js"></script>
<!-- icheck -->
<script src="<?=base_url();?>assets/js/vendor/icheck.js"></script>
<!-- bootstrap js -->
<script src="<?=base_url();?>assets/js/vendor/bootstrap.min.js"></script>
<!-- pace js -->
<script src="<?=base_url();?>assets/js/vendor/pace/pace.min.js"></script>
<!-- main js -->
<script src="<?=base_url();?>assets/js/main.js"></script>
<script>
    $(document).ready(function(){
        $('.i-checks').iCheck({
            checkboxClass: 'icheckbox_square-blue',
            radioClass: 'iradio_square-red',
        });
    });
</script>

<script>
    document.querySelector('.signup_button').onclick = function () {
        var $this = $(this);
        var signup_email = $(".signup_email").val();
        var signup_mobile = $(".signup_mobile").val();
        var signup_username = $(".signup_username").val();
        var signup_username = signup_username.replace(/ /g,'');
        var signup_password = $(".signup_password").val();
        var signup_confirm_password = $(".signup_password").val();
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
    };
</script> 

</body>
</html>
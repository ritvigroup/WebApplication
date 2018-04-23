<!DOCTYPE html>
<html lang="en">
<head><title>Login</title>
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


<body class="aqua-bg login">
    <div class="middle-box text-center loginscreen ">
        <div class="widgets-container">
            <div>
                <h1 class="logo-name">KaajNeeti</h1>
            </div>
            <h3>Welcome to Kaajneeti</h3>
            <p>Ab Raajneeti nahi Kaajneeti chalegi</p>
            <p>Login in. To see it in action.</p>
                <div class="form-group">
                    <input type="text" required="" name="username" placeholder="Username" class="form-control signin-username">
                </div>
                <div class="form-group">
                    <input type="password" required="" name="password" placeholder="Password" class="form-control signin-password">
                </div>
                <button class="btn aqua block full-width bottom15 signin_up_button" type="submit">Login</button>
                <a href="<?=base_url();?>leader/forgot"><small>Forgot password?</small></a>
                <p class="text-muted text-center"><small>Do not have an account?</small></p>
                <a href="<?=base_url();?>leader/register" class="btn btn-sm btn-white btn-block">Create an account</a>
            <p class="top15"> <small>Developed at: <a href="http://www.ritvigroup.com" target="_blank">Ritvi Innovation Pvt. Ltd.</a> &copy; 2016-2017</small> </p>
        </div>
    </div>
</body>


<script src="<?php echo base_url(); ?>assets/js/sweetalert-dev.js"></script> 
<script src="<?php echo base_url(); ?>assets/js/sweetalert.min.js"></script> 

<script src="<?=base_url();?>assets/js/vendor/jquery.min.js"></script>

<script>
    document.querySelector('.signin_up_button').onclick = function () {
        var $this = $(this);
        var signin_username = $(".signin-username").val();
        var signin_password = $(".signin-password").val();


        if (signin_username.length > 0 && signin_password.length > 0) {
            //var pattern = /^\b[A-Z0-9._%-]+@[A-Z0-9.-]+\.[A-Z]{2,4}\b$/i;

            $('.signin_up_button').html('Authenticating...');

            $.post("<?php echo base_url(); ?>leader/login", {username: signin_username, password: signin_password},
                function (data, status) {
                   
                    if (data.status === "failed") {
                        sweetAlert("Error", data.message, "error");
                        $('.signin_up_button').html('Login');
                        return false;
                    } else { 
                        if (data.status === "success") {
                            $('.signin_up_button').html('Login Successful');
                            window.location.href="dashboard";
                        }
                    }
                    
                });
        } else {
            sweetAlert("Error", "Please enter your username and password", "error");
            return false;
        }
    };
</script> 
</body>
</html>
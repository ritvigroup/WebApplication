<!DOCTYPE html>
<html lang="en">
<head><title>Forgot Password</title>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="cache-control" content="no-cache">
    <meta http-equiv="expires" content="Thu, 19 Nov 1900 08:52:00 GMT">

    <!-- Bootstrap -->
    <link href="<?=base_url();?>assets/css/bootstrap.min.css" rel="stylesheet">
    <!-- slimscroll -->
    <link href="<?=base_url();?>assets/css/jquery.slimscroll.css" rel="stylesheet">
    <!-- Fontes -->
    <link href="<?=base_url();?>assets/css/font-awesome.min.css" rel="stylesheet">
    <link href="<?=base_url();?>assets/css/simple-line-icons.css" rel="stylesheet">
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
    <link rel="shortcut icon" href="<?=base_url();?>assets/images/favicon.ico">

    <link type="text/css" rel="stylesheet" href="<?php echo base_url(); ?>assets/css/sweetalert.css?ver=1.04">
</head>

<body class="aqua-bg  login">
     <div class="middle-box loginscreen ">
    <div class="widgets-container">
    <div class="logo">
        <h1 class="logo-name">KaajNeeti</h1>
    </div>
    <div class="passwordBox">
        <div class="row">
            <div class="col-md-12">
                <div class="widgets-container">
                    <h2 class="font-bold">Forgot password</h2>
                    <p> Enter your Username and your password will be reset and emailed to you. </p>
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="form-group">
                                <input type="text" placeholder="Username" name="username" class="form-control signin-username">
                            </div>
                            <button class="btn aqua block bottom15 forgot_button" type="submit">Reset password</button>
                            <a href="<?=base_url();?>leader/login" class="btn aqua btn-outline pull-right ">Back</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12 login-copyright"> <small>Developed at: <a href="http://www.ritvigroup.com" target="_blank" style="color: #49b6d6;">Ritvi Innovation Pvt. Ltd.</a> &copy; 2016-2017</small> </div>
        </div>
    </div>
</div>
</div>
</body>


<script src="<?php echo base_url(); ?>assets/js/sweetalert-dev.js"></script> 
<script src="<?php echo base_url(); ?>assets/js/sweetalert.min.js"></script> 

<script src="<?=base_url();?>assets/js/vendor/jquery.min.js"></script>
<!-- icheck -->
<script src="<?=base_url();?>assets/js/vendor/icheck.js"></script>
<!-- bootstrap js -->
<script src="<?=base_url();?>assets/js/vendor/bootstrap.min.js"></script>

<script>//BEGIN CHECKBOX & RADIO
$('input[type="checkbox"]').iCheck({
    checkboxClass: 'icheckbox_minimal-grey',
    increaseArea: '20%' // optional
});
$('input[type="radio"]').iCheck({
    radioClass: 'iradio_minimal-grey',
    increaseArea: '20%' // optional
});
//END CHECKBOX & RADIO
</script>

<script>
    document.querySelector('.forgot_button').onclick = function () {
        var $this = $(this);
        var signin_username = $(".signin-username").val();


        if (signin_username.length > 0) {
            //var pattern = /^\b[A-Z0-9._%-]+@[A-Z0-9.-]+\.[A-Z]{2,4}\b$/i;

            $('.forgot_button').html('Validating');


            $.post("<?php echo base_url(); ?>leader/forgot", {username: signin_username},
                function (data, status) {
                   
                    if (data.status === "failed") {
                        sweetAlert("Error", data.message, "error");
                        $('.forgot_button').html('Submit');
                        $(".signin-username").val('');
                        $(".signin-username").focus();
                        return false;
                    } else { 
                        $('.forgot_button').html('Submit');
                        if (data.status === "success") {
                            $('.forgot_button').html('Submit');
                            swal("Congratulations!", data.message, "success");
                        }
                    }
                });
        } else {
            sweetAlert("Error", "Please enter your username", "error");
            return false;
        }
    };
</script> 
</body>
</html>
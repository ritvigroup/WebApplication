<!DOCTYPE html>
<html lang="en">
<head><title>Login</title>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="cache-control" content="no-cache">
    <meta http-equiv="expires" content="Thu, 19 Nov 1900 08:52:00 GMT">
    <!--Loading bootstrap css-->
    <link type="text/css"
          href="http://fonts.googleapis.com/css?family=Open+Sans:400italic,700italic,800italic,400,700,800">
    <link type="text/css" rel="stylesheet" href="http://fonts.googleapis.com/css?family=Oswald:400,700,300">
    <link type="text/css" rel="stylesheet"
          href="<?=base_url();?>assets/vendors/jquery-ui-1.10.3.custom/css/ui-lightness/jquery-ui-1.10.3.custom.css">
    <link type="text/css" rel="stylesheet" href="<?=base_url();?>assets/vendors/font-awesome/css/font-awesome.min.css">
    <link type="text/css" rel="stylesheet" href="<?=base_url();?>assets/vendors/bootstrap/css/bootstrap.min.css">

    <link type="text/css" rel="stylesheet" href="<?php echo base_url(); ?>assets/css/sweetalert.css?ver=1.04">

    <!--Loading style vendors-->
    <link type="text/css" rel="stylesheet" href="<?=base_url();?>assets/vendors/animate.css/animate.css">
    <link type="text/css" rel="stylesheet" href="<?=base_url();?>assets/vendors/iCheck/skins/all.css">
    <!--Loading style-->
    <link type="text/css" rel="stylesheet" href="<?=base_url();?>assets/css/themes/style1/pink-blue.css" class="default-style">
    <link type="text/css" rel="stylesheet" href="<?=base_url();?>assets/css/themes/style1/pink-blue.css" id="theme-change"
          class="style-change color-change">
    <link type="text/css" rel="stylesheet" href="<?=base_url();?>assets/css/style-responsive.css">
    <link rel="shortcut icon" href="<?=base_url();?>assets/images/favicon.ico">
</head>
<body id="signin-page">
<div class="page-form">
    <form action="index.html" class="form">
        <div class="header-content"><h1>Log In</h1></div>
        <div class="body-content"><p>Log in with a social network:</p>

            <div class="row mbm text-center">
                <div class="col-md-4"><a href="#" class="btn btn-sm btn-twitter btn-block"><i
                        class="fa fa-twitter fa-fw"></i>Twitter</a></div>
                <div class="col-md-4"><a href="#" class="btn btn-sm btn-facebook btn-block"><i
                        class="fa fa-facebook fa-fw"></i>Facebook</a></div>
                <div class="col-md-4"><a href="#" class="btn btn-sm btn-google-plus btn-block"><i
                        class="fa fa-google-plus fa-fw"></i>Google +</a></div>
            </div>
            <div class="form-group">
            
                <label style="color: red;" class="signup_email_error_msg"></label>
                                
            </div>
            <div class="form-group">
                <div class="input-icon right"><i class="fa fa-user"></i><input type="text" placeholder="Phone Number"
                                                                               name="mobile" class="form-control signin-mobile">
                </div>
            </div>
            <div class="form-group">
                <div class="input-icon right"><i class="fa fa-key"></i><input type="password" placeholder="Password"
                                                                              name="mpin" class="form-control signin-mpin">
                </div>
            </div>
            <div class="form-group pull-left">
                <div class="checkbox-list"><label><input type="checkbox">&nbsp;
                    Keep me signed in</label></div>
            </div>
            <div class="form-group pull-right">
                <button type="submit" class="btn btn-success signin_button">Log In
                    &nbsp;<i class="fa fa-chevron-circle-right"></i></button>
            </div>
            <div class="clearfix"></div>
            <div class="forget-password"><h4>Forgotten MPIN?</h4>

                <p>no worries, click <a href='#' class='btn-forgot-pwd'>here</a> to reset your MPIN.</p></div>
            <hr>
            <p>Don't have an account? <a id="btn-register" href="<?=base_url();?>leader/register">Register Now</a></p></div>
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
<script src="<?=base_url();?>assets/js/html5shiv.js"></script>
<script src="<?=base_url();?>assets/js/respond.min.js"></script>
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
//END CHECKBOX & RADIO
</script>

<script>
    document.querySelector('.signin_button').onclick = function () {
        var $this = $(this);
        var signin_mobile = $(".signin-mobile").val();
        var signin_mpin = $(".signin-mpin").val();

        //return false;

        if (signin_mobile.length == 10 && signin_mpin == 4) {
            //var pattern = /^\b[A-Z0-9._%-]+@[A-Z0-9.-]+\.[A-Z]{2,4}\b$/i;

            $this.button('loading');

            $.post("<?php echo API_CALL_PATH; ?>leader-login.php", {mobile: signin_mobile, mpin: signin_mpin},
                    function (data, status) {
                        if (data === "failed") {
                            sweetAlert("Oops...", "Mobile Number and MPIN does not matched with our record!", "error");
                        } else { 
                            $this.button('reset');
                            if (data === "success") {
                                
                                swal("Congratulations and thank you for joining us!", "You will shortly receive a confirmation email that you need to complete the activation process.", "success");
                            }
                        }
                    });
        } else {
            sweetAlert("Oops...", "Mobile Number and MPIN does not matched with our record!", "error");
        }
    };
</script> 
</body>
</html>
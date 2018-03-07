<!DOCTYPE html>
<html lang="en">
<head><title>Reset Password</title>
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
    <div class="header-content"><h1>Reset Password</h1></div>
    <div class="body-content">
       
        <div class="form-group">
            <div class="input-icon right">
                <i class="fa fa-key"></i>
                    <input type="password" placeholder="New Password" name="newpassword" class="form-control newpassword">
            </div>
        </div>
        <div class="form-group">
            <div class="input-icon right">
                <i class="fa fa-key"></i>
                    <input type="password" placeholder="Confirm Password" name="confirmpassword" class="form-control confirmpassword">
            </div>
        </div>
        <div class="form-group pull-right">
            <input type="hidden" name="resetpassword" value="<?php echo $reset_password; ?>" class="resetpassword">
            <button type="submit" class="btn btn-success reset_password_button">Submit
                &nbsp;<i class="fa fa-chevron-circle-right"></i></button>
        </div>
        <div class="clearfix"></div>
        <hr>
        <p>Don't have an account? <a id="btn-register" href="<?=base_url();?>leader/register">Register Now</a></p>
    </div>
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
    document.querySelector('.reset_password_button').onclick = function () {
        var $this = $(this);
        var newpassword = $(".newpassword").val();
        var confirmpassword = $(".confirmpassword").val();
        var resetpassword = $(".resetpassword").val();


        if (newpassword.length >= 6 && confirmpassword.length >= 6) {
            //var pattern = /^\b[A-Z0-9._%-]+@[A-Z0-9.-]+\.[A-Z]{2,4}\b$/i;

            $this.button('Validating...');

            $.post("<?php echo base_url(); ?>leader/resetpassword", {newpassword: newpassword, confirmpassword: confirmpassword, resetpassword: resetpassword, request_action: 'SET_NEW_PASSWORD'},
                function (data, status) {
                   
                    if (data.status === "failed") {
                        sweetAlert("Oops...", data.message, "error");
                        return false;
                    } else { 
                        $this.button('Submit');
                        if (data.status === "success") {
                            swal("Congratulations!", data.message, "success");
                            window.location.href= "<?php echo base_url(); ?>leader/login";
                        }
                    }
                });
        } else {
            sweetAlert("Oops...", "Please enter your password and confirm your password with atleast 6 character", "error");
            return false;
        }
    };
</script> 
</body>
</html>
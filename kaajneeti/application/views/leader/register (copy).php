<!DOCTYPE html>
<html lang="en">
<head><title>Leader Registration</title>
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
    <form id="signup-form" action="<?=base_url();?>leader/register" class="form">
        <div class="header-content"><h1>Register</h1></div>
        <div class="body-content">
            <div class="form-group">
                <div class="input-icon right"><i class="fa fa-user"></i><input type="text" placeholder="Username"
                                                                               name="username" class="form-control">
                </div>
            </div>
            <div class="form-group">
                <div class="input-icon right"><i class="fa fa-envelope"></i><input type="email"
                                                                                   placeholder="Email address"
                                                                                   name="email" class="form-control">
                </div>
            </div>
            <div class="form-group">
                <div class="input-icon right"><i class="fa fa-key"></i><input id="password" type="password"
                                                                              placeholder="Password" name="password"
                                                                              class="form-control"></div>
            </div>
            <div class="form-group">
                <div class="input-icon right"><i class="fa fa-key"></i><input type="password"
                                                                              placeholder="Confirm Password"
                                                                              name="passwordConfirm"
                                                                              class="form-control"></div>
            </div>
            <hr>
            <div style="margin-bottom: 15px" class="row">
                <div class="col-lg-6"><label><input type="text" placeholder="First Name" name="firstname"
                                                    class="form-control"></label></div>
                <div class="col-lg-6"><label><input type="text" placeholder="Last Name" name="lastname"
                                                    class="form-control"></label></div>
            </div>
            <div class="form-group"><label style="display: block" class="select"><select name="gender"
                                                                                         class="form-control">
                <option value="0" selected disabled>Gender</option>
                <option value="1">Male</option>
                <option value="2">Female</option>
                <option value="3">Other</option>
            </select></label></div>
            <div class="form-group">
                <div class="checkbox-list"><label><input id="subscription" type="checkbox" name="subscription">&nbsp;
                    I want to receive news and special offers</label></div>
            </div>
            <div class="form-group">
                <div class="checkbox-list"><label><input id="terms" type="checkbox" name="terms">&nbsp;
                    I agree with the Terms and Conditions</label></div>
            </div>
            <hr>
            <div class="form-group mbn"><a href="<?=base_url();?>leader/login" class="btn btn-warning"><i
                    class="fa fa-chevron-circle-left"></i>&nbsp;
                Back</a>
                <button type="submit" class="btn btn-info pull-right">Submit
                    &nbsp;<i class="fa fa-chevron-circle-right"></i></button>
            </div>
        </div>
    </form>
</div>
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

</body>
</html>
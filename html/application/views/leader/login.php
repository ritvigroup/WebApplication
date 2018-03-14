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


<script>
 /*
    // This is called with the results from from FB.getLoginStatus().
  function statusChangeCallback(response) {
    console.log('statusChangeCallback');
    console.log(response);
    // The response object is returned with a status field that lets the
    // app know the current login status of the person.
    // Full docs on the response object can be found in the documentation
    // for FB.getLoginStatus().
    if (response.status === 'connected') {
      // Logged into your app and Facebook.
      testAPI();
    } else {
      // The person is not logged into your app or we are unable to tell.
      document.getElementById('status').innerHTML = 'Please log ' +
        'into this app.';
    }
  }

  // This function is called when someone finishes with the Login
  // Button.  See the onlogin handler attached to it in the sample
  // code below.
  function checkLoginState() {
    FB.getLoginStatus(function(response) {
      statusChangeCallback(response);
    });
  }

  window.fbAsyncInit = function() {
    FB.init({
      appId      : '144567099675348',
      cookie     : true,
      xfbml      : true,
      version    : 'v2.8'
    });
      
    FB.AppEvents.logPageView();   

    FB.getLoginStatus(function(response) {
      statusChangeCallback(response);
    });
      
  };

  (function(d, s, id){
     var js, fjs = d.getElementsByTagName(s)[0];
     if (d.getElementById(id)) {return;}
     js = d.createElement(s); js.id = id;
     js.src = "https://connect.facebook.net/en_US/sdk.js";
     fjs.parentNode.insertBefore(js, fjs);
   }(document, 'script', 'facebook-jssdk'));

  function testAPI() {
    console.log('Welcome!  Fetching your information.... ');
    FB.api('/me', function(response) {
      console.log('Successful login for: ' + response.name);
      document.getElementById('status').innerHTML =
        'Thanks for logging in, ' + response.name + '!';
    });
  } */
</script>

</head>
<body id="signin-page">
<div class="page-form">
    <div class="header-content"><h1>Log In</h1></div>
    <div class="body-content"><p>Log in with a social network:</p>

        <div class="row mbm text-center">
            <div class="col-md-4"><a href="#" class="btn btn-sm btn-twitter btn-block"><i
                    class="fa fa-twitter fa-fw"></i>Twitter</a></div>
            <?php if(!empty($authUrl)) { ?><div class="col-md-4"><a href="<?php echo $authUrl; ?>" class="btn btn-sm btn-facebook btn-block"><i
                    class="fa fa-facebook fa-fw"></i>Facebook</a></div><?php } ?>
            <div class="col-md-4"><a href="#" class="btn btn-sm btn-google-plus btn-block"><i
                    class="fa fa-google-plus fa-fw"></i>Google +</a></div>
        </div>

        <?php
        if($userData['first_name'] != '') {
        ?>
        <div class="wrapper">
            <h1>Facebook Profile Details </h1>
            <div class="welcome_txt">Welcome <b><?php echo $userData['first_name']; ?></b></div>
            <div class="fb_box">
                <p class="image"><img src="<?php echo $userData['picture_url']; ?>" alt="" width="300" height="220"/></p>
                <p><b>Facebook ID : </b><?php echo $userData['oauth_uid']; ?></p>
                <p><b>Name : </b><?php echo $userData['first_name'].' '.$userData['last_name']; ?></p>
                <p><b>Email : </b><?php echo $userData['email']; ?></p>
                <p><b>Gender : </b><?php echo $userData['gender']; ?></p>
                <p><b>Locale : </b><?php echo $userData['locale']; ?></p>
                <p><b>You are login with : </b>Facebook</p>
                <p><a href="<?php echo $userData['profile_url']; ?>" target="_blank">Click to Visit Facebook Page</a></p>
                <p><b>Logout from <a href="<?php echo $logoutUrl; ?>">Facebook</a></b></p>
            </div>
        </div>
        <?php } ?>

        <?php /*
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
        <div class="form-group pull-right">
            <button type="submit" class="btn btn-success signin_button">Login By Phone
                &nbsp;<i class="fa fa-chevron-circle-right"></i></button>
        </div>
        <div class="clearfix"></div>
        <hr>
        */ ?>
        <div class="form-group">
            <div class="input-icon right"><i class="fa fa-user"></i><input type="text" placeholder="Username"
                                                                           name="username" class="form-control signin-username">
            </div>
        </div>
        <div class="form-group">
            <div class="input-icon right"><i class="fa fa-key"></i><input type="password" placeholder="Password"
                                                                          name="password" class="form-control signin-password">
            </div>
        </div>
        <div class="form-group pull-right">
            <button type="submit" class="btn btn-success signin_up_button">Log In
                &nbsp;<i class="fa fa-chevron-circle-right"></i></button>
        </div>
        <div class="clearfix"></div>
        <div class="forget-password"><h4>Forgotten MPIN?</h4>

            <p>no worries, click <a href="<?=base_url();?>leader/forgot" class='btn-forgot-pwd'>here</a> to reset your password.</p></div>
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
    /*document.querySelector('.signin_button').onclick = function () {
        var $this = $(this);
        var signin_mobile = $(".signin-mobile").val();
        var signin_mpin = $(".signin-mpin").val();


        if (signin_mobile.length >= 10 && signin_mpin.length >= 4) {
            //var pattern = /^\b[A-Z0-9._%-]+@[A-Z0-9.-]+\.[A-Z]{2,4}\b$/i;

            $this.button('Validating...');

            $.post("<?php echo base_url(); ?>leader/login", {mobile: signin_mobile, mpin: signin_mpin, request_action: 'LOGIN_WITH_MPIN'},
                function (data, status) {
                   
                    if (data.status === "failed") {
                        sweetAlert("Oops...", data.message, "error");
                        return false;
                    } else { 
                        $this.button('Login');
                        if (data.status === "success") {
                            window.location.href="dashboard";
                        }
                    }
                });
        } else {
            sweetAlert("Oops...", "Please enter your mobile number and mpin", "error");
            return false;
        }
    };*/


    document.querySelector('.signin_up_button').onclick = function () {
        var $this = $(this);
        var signin_username = $(".signin-username").val();
        var signin_password = $(".signin-password").val();


        if (signin_username.length > 0 && signin_password.length > 0) {
            //var pattern = /^\b[A-Z0-9._%-]+@[A-Z0-9.-]+\.[A-Z]{2,4}\b$/i;

            $this.button('Validating...');

            $.post("<?php echo base_url(); ?>leader/login", {username: signin_username, password: signin_password, page_name: 'userlogin/loginUsernamePassword', MOCK: 'Y'},
                function (data, status) {
                   
                    if (data.status === "failed") {
                        sweetAlert("Oops...", data.message, "error");
                        return false;
                    } else { 
                        $this.button('Login');
                        if (data.status === "success") {
                            window.location.href="dashboard";
                        }
                    }
                });
        } else {
            sweetAlert("Oops...", "Please enter your username and password", "error");
            return false;
        }
    };
</script> 
</body>
</html>
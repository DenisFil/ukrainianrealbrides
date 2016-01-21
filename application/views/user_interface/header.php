<!DOCTYPE html>
<html>
<head>
    <title>Ukrainian Real Brides</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, maximum-scale=1, target-densityDPI=device-dpi"/>
    <meta name="apple-mobile-web-app-status-bar-style" content="black" />
    <meta name="format-detection" content="telephone=no" />

    <!--Bootstrap css-->
    <link media="all" rel="stylesheet" href="<?php echo base_url(); ?>content/bootstrap/css/bootstrap.min.css" />
    <link media="all" rel="stylesheet" href="<?php echo base_url(); ?>content/bootstrap/css/bootstrap-theme.min.css" />
    <!--Bootstrap css end-->

    <link media="all" rel="stylesheet" href="<?php echo base_url(); ?>content/user_interface/css/header.css" type="text/css" />
    <link media="all" rel="stylesheet" href="<?php echo base_url(); ?>content/user_interface/css/<?php echo $css; ?>.css" type="text/css" />
    <link media="all" rel="stylesheet" href="<?php echo base_url(); ?>content/user_interface/css/footer.css" type="text/css" />
    <link media="all" rel="stylesheet" href="<?php echo base_url(); ?>content/user_interface/css/social-buttons.css" type="text/css" />
    <link media="all" rel="stylesheet" href="<?php echo base_url(); ?>content/user_interface/css/font-awesome.css" type="text/css" />

    <!--<link media="all" rel="stylesheet" href="css/sorry.css" type="text/css" />-->
    <!--[if lt IE 7]>
<link rel="stylesheet" type="text/css" href="css/lt7.css" media="screen"/>-->
<!-- <![endif]--> 
</head>
<body>

<!-- Header Starts Here -->
<div class="header-holder">
    <header id="header">
        <a class="logo" href="">Ukrainian real brides</a>
        <div class="header-top">
            <div class="header-left">
                <span>Language:</span>
						<span>
							<select class="select" name="" id="">
                                <option value="" selected>Eng</option>
                            </select>
						</span>
            </div>
            <div class="header-right">
                <a href="#login-modal" role="button" data-toggle="modal"><button type="button" class="login">Login</button></a>
                <a href="#signUp-modal" role="button" data-toggle="modal"><button type="button" class="sign-up">Sign up</button></a>
            </div>
        </div>
        <nav class="nav">
            <ul>
                <?php if ($gender == ''){ ?>
                    <li><a href="#">Profiles</a></li>
                <?php }elseif ($gender == 1){ ?>
                    <li><a href="#">Women profiles</a></li>
                <?php }elseif ($gender == 2){ ?>
                    <li><a href="#">Man profiles</a></li>
                <?php } ?>
                <li><a href="#">Search</a></li>
                <li><a href="#services">Services</a></li>
                <li><a href="#">Blog</a></li>
                <li><a href="#">Support</a></li>
                <li><a href="#">About us</a></li>
            </ul>
        </nav>
    </header>
</div>
<!-- Header Ends Here -->

<!--SignUp modal start-->
<div class="modal fade" id="signUp-modal">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-body">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">
                    <div class="exit"></div>
                </button>
                <h2>Registration</h2>
                <form class="form-horizontal" id="signup-form">
                    <div class="form-row">
                            <input type="text" class="form-control" placeholder="Name" autofocus tabindex="1" id="user-name">
                            <span id="user-name-error-text" class="form-error-message"></span>
                    </div>
                    <div class="form-row">
                            <input type="text" class="form-control" placeholder="Email Address" tabindex="2" id="user-email">
                            <span id="user-email-error-text" class="form-error-message"></span>
                    </div>
                    <div class="form-row">
                        <input type="password" class="form-control" placeholder="Password" tabindex="2" id="user-password">
                        <span class="view-password">
                            <img src="<?php base_url(); ?>content/user_interface/img/pop-ups/password_button.png" id="icon">
                        </span>
                        <span id="user-password-error-text" class="form-error-message"></span>
                    </div>
                    <button type="button" class="btn btn-danger" id="signUp">Register Now</button>
                    <a href="<?php echo $loginUrl; ?>"><button type="button" class="btn btn-social btn-xs btn-facebook"><i class="fa fa-facebook"></i> | Sign up with Facebook</button></a>

                    <a href="#"><button class="btn btn-social btn-xs btn-google-plus"><i class="fa fa-google-plus"></i> | Sign up with Google+</button></a>

                    <span class="terms-conditions">
                        <a href="#">terms & conditions</a> and <a href="#">privacy policy</a>.
                    </span>
                </form>
            </div>
            <div class="modal-bottom">
                <span>Already register? <a href="#login-modal" data-toggle="modal">Login now</a></span>
            </div>

        </div>
    </div>
</div>

<div class="modal fade" id="login-modal">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-body">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">
                    <div class="exit"></div>
                </button>
                <h2>Login</h2>
                <form class="form-horizontal" id="login-form">
                    <div class="form-row">
                        <input type="text" class="form-control" placeholder="Email Address" tabindex="2" id="user-email">
                    </div>
                    <div class="form-row last-form">
                        <input type="password" class="form-control" placeholder="Password" tabindex="2" id="user-password">
                        <span class="view-password">
                            <img src="<?php base_url(); ?>content/user_interface/img/pop-ups/password_button.png" id="icon">
                        </span>
                    </div>
                        <span class="forget-password"><a href="#">Forgot login or password?</a></span>
                    <button type="button" class="btn btn-danger" id="login">Log In</button>
                    <a href="#"><button class="btn btn-social btn-xs btn-facebook"><i class="fa fa-facebook"></i>  | Sign in with Facebook</button></a>
                    <a href="#"><button class="btn btn-social btn-xs btn-google-plus"><i class="fa fa-google-plus"></i>  | Sign in with Google+</button></a>
                </form>
            </div>
            <div class="modal-bottom">
                <span>Not with us? <a href="#">Sign Up</a> now</span>
            </div>
        </div>
    </div>
</div>
<!--SignUp modal ends-->
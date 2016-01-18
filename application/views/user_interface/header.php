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
    <!--<link media="all" rel="stylesheet" href="css/sorry.css" type="text/css" />-->
    <!--[if lt IE 7]><!--
<link rel="stylesheet" type="text/css" href="css/lt7.css" media="screen"/>-->
<![endif]-->
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
                <button type="button" class="login">Login</button>
                <a href="#signUp-modal" role="button" data-toggle="modal"><button type="button" class="sign-up">Sign up</button></a>
            </div>
        </div>
        <nav class="nav">
            <ul>
                <?php if ($user_sex == ''){ ?>
                    <li><a href="#">Profiles</a></li>
                <?php }elseif ($user_sex == 1){ ?>
                    <li><a href="#">Women profiles</a></li>
                <?php }elseif ($user_sex == 2){ ?>
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
                    <div class="exit">
                        <img src="<?php echo base_url(); ?>content/user_interface/img/pop-ups/exit.png">
                    </div>
                </button>

                <h2>Registration</h2>

                <form class="form-horizontal" id="signup-form">
                    <div class="form-group has-feedback" id="user-name-feedback">
                        <div class="col-lg-10 col-lg-push-1">
                            <input type="text" class="form-control" placeholder="Name" autofocus tabindex="1" id="user-name">
                            <span id="user-name-error" class="glyphicon form-control-feedback"></span>
                            <span id="user-name-error-text"></span>
                        </div>
                    </div>

                    <div class="form-group has-feedback" id="user-email-feedback">
                        <div  class="col-lg-10 col-lg-push-1">
                            <input type="text" class="form-control" placeholder="Email Address" tabindex="2" id="user-email">
                            <span id="user-email-error" class="glyphicon form-control-feedback"></span>
                            <span id="user-email-error-text"></span>
                        </div>
                    </div>

                    <div class="form-group" id="user-password-feedback">
                        <div  class="col-lg-10 col-lg-push-1">
                            <input type="password" class="form-control" placeholder="Password" tabindex="3" id="user-password">
                            <img src="<?php base_url(); ?>content/user_interface/img/pop-ups/password_button.png" id="icon">
                            <span id="user-password-error-text"></span>
                        </div>
                    </div>

                    <button type="button" class="btn btn-danger" id="signUp">Register Now</button>
                    <p id="privacy">
                        <a href="#" class="link">terms & conditions</a> and <a href="#" class="link">privacy policy</a>.
                    </p>
                </form>
            </div>
            <div class="otbivka"></div>
            <div class="modal-footer">
                <p id="modal-signup-footer">
                    <span>Already register?</span>
                    <a href="#">Login now</a>
                </p>
            </div>
        </div>
    </div>
</div>
<!--SignUp modal ends-->
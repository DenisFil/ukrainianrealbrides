<!DOCTYPE html>
<html>
<head>
    <title>Ukrainian Real Brides</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, maximum-scale=1"/>
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
        <a class="logo" href="<?php echo base_url(); ?>">Ukrainian real brides</a>
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
                <?php if($this->session->userdata('id')): ?>
                    <div class="header-signed">
                        <span class="profile-name">
                            <?php echo $this->session->userdata('name') . ' ' . $this->session->userdata('lastname'); ?>
                        </span>
                        <ul class="status-bar">
                            <li class="mail-status">
                                <a href="#">
                                    <span></span>
                                </a>
                                <em name="mail"><?php echo $new_messages; ?></em>
                            </li>
                            <li class="chat-status">
                                <a href="#">
                                    <span></span>
                                </a>
                                <em name="chat"><?php echo $users_online; ?></em>
                            </li>
                            <li class="video-chat-status">
                                <a href="#">
                                    <span></span>
                                </a>
                                <em name="video-chat"><?php echo $users_online; ?></em>
                            </li>
                            <li class="credit-status">
                                <a href="#">
                                    <span></span>
                                </a>
                                <em name="credit"><?php echo $credits; ?></em>
                            </li>
                        </ul>
                        <div class="profile-panel">
                            <a href="#"><img src="<?php echo base_url(); ?>content/user_interface/img/header/settings.png" width="14" height="14" alt="Profile settings"></a>
                            <a href="<?php echo base_url(); ?>user_interface/logout"><img src="<?php echo base_url(); ?>content/user_interface/img/header/log-out.png" width="14" height="14" alt="Log out"></a>
                        </div>
                    </div>

                <?php else: ?>
                    <a href="#login-modal" role="button" data-toggle="modal" id="login-button"><button type="button" class="login">Log in</button></a>
                    <a href="#signUp-modal" role="button" data-toggle="modal" id="signup-button"><button type="button" class="sign-up">Sign up</button></a>
                <?php endif; ?>
            </div>
        </div>
        <nav class="nav">
            <ul class="nav-left">
                <?php if ($gender == ''){ ?>
                    <li><a href="#">Profiles</a></li>
                <?php }elseif ($gender == 1){ ?>
                    <li><a href="#">Women profiles</a></li>
                <?php }elseif ($gender == 2){ ?>
                    <li><a href="#">Men profiles</a></li>
                <?php } ?>
                <li><a href="#">Search</a></li>
                <li><a href="#services">Services</a></li>
            </ul>
            <div class="logo-place"></div>
            <ul class="nav-right">
                <li><a href="#">Blog</a></li>
                <li><a href="#">Support</a></li>
                <li><a href="#">About us</a></li>
            </ul>
        </nav>
    </header>
</div>
<!-- Header Ends Here -->

<?php if(!$this->session->userdata('id')): ?>
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
                            <img src="<?php base_url(); ?>content/user_interface/img/pop-ups/password_button.png" class="icon" name="">
                        </span>
                        <span id="user-password-error-text" class="form-error-message"></span>
                    </div>
                    <button type="button" class="btn btn-danger" id="signUp">Registration</button>
                    <a href="#"><button type="button" class="btn btn-social btn-xs btn-facebook" id="fb-button"><i class="fa fa-facebook"></i> | Sign up with Facebook</button></a>

                    <button type="button" class="btn btn-social btn-xs btn-google-plus" id="google-signup"><i class="fa fa-google-plus"></i> | Sign up with Google+</button>

                    <span class="terms-conditions">
                        <a href="#">terms & conditions</a> and <a href="#">privacy policy</a>.
                    </span>
                </form>
            </div>
            <div class="modal-bottom">
                <span>Already register? <a href="#" id="login-modal-start" name="login">Log in</a> now</span>
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
                        <input type="text" class="form-control" placeholder="Email Address" tabindex="2" id="login-user-email" autofocus>
                    </div>
                    <div class="form-row last-form">
                        <input type="password" class="form-control" placeholder="Password" tabindex="2" id="login-user-password">
                        <span class="view-password">
                            <img src="<?php base_url(); ?>content/user_interface/img/pop-ups/password_button.png" class="icon" name="login">
                        </span>
                    </div>
                        <span class="forget-password"><a href="#">Forgot login or password?</a></span>
                    <button type="button" class="btn btn-danger" id="login">Log In</button>
                    <a href="#"><button type="button" class="btn btn-social btn-xs btn-facebook" id="fb-button-login"><i class="fa fa-facebook"></i> | Log In with Facebook</button></a>
                    <a href="#"><button class="btn btn-social btn-xs btn-google-plus"><i class="fa fa-google-plus"></i>  | Log in with Google+</button></a>
                </form>
            </div>
            <div class="modal-bottom">
                <span>Not with us? <a href="#" id="signup-modal-start" name="signup">Sign Up</a> now</span>
            </div>
        </div>
    </div>
</div>
<!--SignUp modal ends-->
<?php endif; ?>
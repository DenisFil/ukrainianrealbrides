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

    <link rel="stylesheet" href="http://jcrop-cdn.tapmodo.com/v2.0.0-RC1/css/Jcrop.css" type="text/css">

    <link media="all" rel="stylesheet" href="<?php echo base_url(); ?>content/user_interface/css/header.css" type="text/css" />
    <link media="all" rel="stylesheet" href="<?php echo base_url(); ?>content/user_interface/css/<?php echo $css; ?>.css" type="text/css" />
    <link media="all" rel="stylesheet" href="<?php echo base_url(); ?>content/user_interface/css/footer.css" type="text/css" />
    <link media="all" rel="stylesheet" href="<?php echo base_url(); ?>content/user_interface/css/social-buttons.css" type="text/css" />
    <link media="all" rel="stylesheet" href="<?php echo base_url(); ?>content/user_interface/css/font-awesome.css" type="text/css" />
    <link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>content/videosliderengine/amazingslider-1.css">
<script class="cssdeck" src="//cdnjs.cloudflare.com/ajax/libs/jquery/1.8.0/jquery.min.js"></script>
<!-- 
 <script type="text/javascript">
       $(document).ready(function(){
       $(window).scroll(function() {
       var scroll = getCurrentScroll();
       console.log(scroll);
         if ( scroll >= 100) {
              $('.header-holder').animate({ opacity: '0' }, 50);
              setTimeout(function () { $('.header-holder').addClass('shrink'); }, 60);
              $('.header-holder').animate({ opacity: '1' }, 500);
           }
           if (scroll < 100 && scroll >= 100) {
               $('.header-holder').animate({ opacity: '0' }, 50);
              setTimeout(function () { $('.header-holder').removeClass('shrink'); }, 60);
              $('.header-holder').animate({ opacity: '1' }, 500);
           }
     });
   function getCurrentScroll() {
       return window.pageYOffset || document.documentElement.scrollTop;
       }
   });
 </script>
 -->

<script>
   $(function(){
var shrinkHeader = 50;
 $(window).scroll(function() {
   var scroll = getCurrentScroll();
     if ( scroll >= shrinkHeader ) {
          $('.header-holder').addClass('shrink');
       }
       else {
           $('.header-holder').removeClass('shrink');
       }
 });
function getCurrentScroll() {
   return window.pageYOffset || document.documentElement.scrollTop;
   }
});
</script>

<!-- 
<script>
    function init() {
  window.addEventListener('scroll', function(e){
    var distanceY = window.pageYOffset || document.documentElement.scrollTop,
        shrinkOn = 200,
        header = document.querySelector("header");
    if (distanceY > shrinkOn) {
      header.setAttribute("class","smaller");
    } else {
        header.removeAttribute("class");
    }
  });
}
window.onload = init();
</script>
 -->
</head>



<body>

<!-- Header Starts Here -->
<div class="header-holder">
    <header id="header">
        <a class="logo" href="<?php echo base_url(); ?>">Ukrainian real brides</a>
        <div class="header-top">
            <div class="header-left">
                <span>Language:</span>
                <label>
                    <select>
                        <option selected>Eng</option>
                    </select>
                </label>
            </div>
            <div class="header-right">
                <?php if($this->session->userdata('id')): ?>
                    <div class="header-signed">
                        <span class="profile-name">
                            <a href="<?php echo base_url(); ?>user_interface/personal_area"><?php echo $this->session->userdata('name') . ' ' . $this->session->userdata('lastname'); ?></a>
                        </span>
                        <ul class="status-bar">
                            <li class="mail-status">
                                <a href="#">
                                    <span></span>
                                </a>
                                <em><?php echo $new_messages; ?></em>
                            </li>
                            <li class="chat-status">
                                <a href="<?php echo base_url(); ?>user_interface/chat">
                                    <span></span>
                                </a>
                                <em><?php echo 0; ?></em>
                            </li>
                            <li class="video-chat-status">
                                <a href="#">
                                    <span></span>
                                </a>
                                <em><?php echo 0; ?></em>
                            </li>
                            <?php if ($gender == 0 || $gender == 1): ?>
                            <li class="credit-status">
                                <a href="<?php echo base_url(); ?>/user_interface/payment">
                                    <span></span>
                                </a>
                                <em><?php echo $credits; ?></em>
                            </li>
                            <?php else: ?>
                            <li class="credit-status gift-status">
                                <a href="#">
                                    <span></span>
                                </a>
                                <em><?php echo $gifts; ?></em>
                            </li>
                            <?php endif; ?>
                        </ul>
                        <div class="profile-panel">
                            <a href="<?php echo base_url(); ?>/user_interface/profile_settings"><img src="<?php echo base_url(); ?>content/user_interface/img/header/settings.png" width="14" height="14" alt="Profile settings"></a>
                            <a href="<?php echo base_url(); ?>user_interface/logout"><img src="<?php echo base_url(); ?>content/user_interface/img/header/log-out.png" width="14" height="14" alt="Log out"></a>
                        </div>
                    </div>

                <?php else: ?>
                    <a href="#login-modal" role="button" data-toggle="modal" id="login-button"><button type="button" class="login">Log in</button></a>
                    <a href="#signUp-modal" role="button" data-toggle="modal" id="signup-button"><button type="button" class="sign-up">Sign up</button></a>
                <?php endif; ?>
            </div>

            <div class="header-right-shrink">
                <?php if($this->session->userdata('id')): ?>
                    <div class="header-signed">

                        <ul class="status-bar">
                            <li class="mail-status">
                                <a href="#">
                                    <span></span>
                                </a>
                                <em>Message: <span><?php echo $new_messages; ?></span></em>
                            </li>
                            <li class="chat-status">
                                <a href="<?php echo base_url(); ?>user_interface/chat">
                                    <span></span>
                                </a>
                                <em>Chat: <span><?php echo 0; ?></span></em>
                            </li>
                            <li class="video-chat-status">
                                <a href="#">
                                    <span></span>
                                </a>
                                <em>Video chat: <span><?php echo 0; ?></span></em>
                            </li>
                            <?php if ($gender == 0 || $gender == 1): ?>
                            <li class="credit-status">
                                <a href="<?php echo base_url(); ?>/user_interface/payment">
                                    <span></span>
                                </a>
                                <em>Credits: <span><?php echo $credits; ?></span></em>
                            </li>
                            <?php else: ?>
                            <li class="credit-status gift-status">
                                <a href="#">
                                    <span></span>
                                </a>
                                <em><?php echo $gifts; ?></em>
                            </li>
                            <?php endif; ?>
                        </ul>
                        <div class="profile-panel">
                            <a href="<?php echo base_url(); ?>/user_interface/profile_settings"><img src="<?php echo base_url(); ?>content/user_interface/img/header/settings-shrink.png" width="18" height="17" alt="Profile settings"></a>
                            <a href="<?php echo base_url(); ?>user_interface/logout"><img src="<?php echo base_url(); ?>content/user_interface/img/header/log-out-shrink.png" width="18" height="17" alt="Log out"></a>
                        </div>
                        <span class="profile-name">
                            <span class="header-avatar">
                                <img src="<?php echo base_url(); ?>content/profiles/avatars/<?php echo $this->session->userdata('id'); ?>/<?php echo $avatar; ?>_preview.jpg" width="41" height="41" alt="Profile avatar">
                            </span>
                            <a href="<?php echo base_url(); ?>user_interface/personal_area"><?php echo $this->session->userdata('name') . ' ' . $this->session->userdata('lastname'); ?></a>
                        </span>

                    </div>

                <?php else: ?>
                    <ul class="shrink-nav">
                        <?php if ($this->session->userdata('id')): ?>
                            <?php if ($gender == 1 || $gender == ''): ?>
                                <li><a href="#">Women profiles</a></li>
                            <?php elseif ($gender == 2): ?>
                                <li><a href="#">Men profiles</a></li>
                            <?php endif; ?>
                        <?php else: ?>
                            <li><a href="#">Women profiles</a></li>
                        <?php endif; ?>
                        <li><a href="<?php echo base_url(); ?>/user_interface/search">Search</a></li>
                        <li><a href="<?php echo base_url(); ?>user_interface/services">Services</a></li>
                        <li><a href="#">Blog</a></li>
                        <li><a href="<?php echo base_url(); ?>/user_interface/support">Support</a></li>
                        <li><a href="#">About us</a></li>
                    </ul>
                    <div class="shrink-buttons">
                        <a href="#login-modal" role="button" data-toggle="modal" id="login-button"><button type="button" class="login">Log in</button></a>
                        <a href="#signUp-modal" role="button" data-toggle="modal" id="signup-button"><button type="button" class="sign-up">Sign up</button></a>
                    </div>

                <?php endif; ?>
            </div>
        </div>
        <nav class="nav">
            <ul class="nav-left">
                <?php if ($this->session->userdata('id')): ?>
                    <?php if ($gender == 1 || $gender == ''): ?>
                        <li><a href="#">Women profiles</a></li>
                    <?php elseif ($gender == 2): ?>
                        <li><a href="#">Men profiles</a></li>
                    <?php endif; ?>
                <?php else: ?>
                    <li><a href="#">Women profiles</a></li>
                <?php endif; ?>
                <li><a href="<?php echo base_url(); ?>/user_interface/search">Search</a></li>
                <li><a href="<?php echo base_url(); ?>user_interface/services">Services</a></li>
            </ul>
            <div class="logo-place"></div>
            <ul class="nav-right">
                <li><a href="#">Blog</a></li>
                <li><a href="<?php echo base_url(); ?>/user_interface/support">Support</a></li>
                <li><a href="#">About us</a></li>
            </ul>
        </nav>
    </header>
    <div class="notification-holder"></div>
</div>

<!-- Header Ends Here -->

<?php if(!$this->session->userdata('id')): ?>
<!--SignUp modal start-->
<div class="modal fade" id="signUp-modal">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-body">
                <button type="button" class="exit" data-dismiss="modal" aria-hidden="true"></button>
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
<!--SignUp modal ends-->

<!--Login modal start-->
<div class="modal fade" id="login-modal">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-body">
                <button type="button" class="exit" data-dismiss="modal" aria-hidden="true"></button>
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
                    <button type="button" class="btn btn-social btn-xs btn-facebook" id="fb-button-login"><i class="fa fa-facebook"></i> | Log In with Facebook</button>
                    <button type="button" class="btn btn-social btn-xs btn-google-plus" id="google-signup-login"><i class="fa fa-google-plus"></i>  | Log in with Google+</button>
                </form>
            </div>
            <div class="modal-bottom">
                <span>Not with us? <a href="#" id="signup-modal-start" name="signup">Sign Up</a> now</span>
            </div>
        </div>
    </div>
</div>

<div class="modal fade services-modal" id="get-credits-modal">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-body">
                <button type="button" class="exit" data-dismiss="modal" aria-hidden="true"></button>
                <h2>So sad... You dont have enough credits...</h2>     
                <img src="<?php echo base_url(); ?>content/user_interface/img/header/get-credits.jpg" alt="Get credits" />
                <button type="button" class="btn btn-danger">Get credits</button>
            </div>
        </div>
    </div>
</div>

<!--Login modal ends-->
<?php endif; ?>


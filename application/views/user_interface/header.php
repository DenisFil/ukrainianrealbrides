<!DOCTYPE html>
<html>
<head>
    <title>Ukrainian Real Brides</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, maximum-scale=1, target-densityDPI=device-dpi"/>
    <meta name="apple-mobile-web-app-status-bar-style" content="black" />
    <meta name="format-detection" content="telephone=no" />
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
                <button type="button" class="sign-up">Sign up</button>
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
<!-- Footer Starts Here -->
<footer id="footer">
    <div class="footer-holder">
        <div class="footer-left">
            <div class="footer-left-box">
                <h4>Services:</h4>
                <ul>
                    <?php if ($login == 1): ?>
                        <li><a href="<?php echo base_url(); ?>user_interface/chat">Chatting</a></li>
                        <li><a href="<?php echo base_url(); ?>user_interface/sorry">Messaging</a></li>
                        <li><a href="<?php echo base_url(); ?>user_interface/sorry">Gift Service</a></li>
                        <li><a href="<?php echo base_url(); ?>user_interface/sorry">Romance Tour</a></li>
                    <?php else: ?>
                        <li><a href="#signUp-modal" type="button" data-toggle="modal">Chatting</a></li>
                        <li><a href="#signUp-modal" type="button" data-toggle="modal">Messaging</a></li>
                        <li><a href="#signUp-modal" type="button" data-toggle="modal">Gift Service</a></li>
                        <li><a href="#signUp-modal" type="button" data-toggle="modal">Romance Tour</a></li>
                    <?php endif; ?>
                    <li><a href="<?php echo base_url(); ?>user_interface/sorry">Very important service</a></li>
                </ul>
            </div>
            <div class="footer-left-box">
                <h4>Members:</h4>
                <ul>
                    <li><a href="#">Search</a></li>
                    <?php if ($this->session->userdata('id')): ?>
                        <?php if ($gender == 1 || $gender == ''): ?>
                            <li><a href="<?php echo base_url(); ?>user_interface/profiles">Women profiles</a></li>
                            <?php if ($gender == 0 || $gender == 1): ?>
                                <a class="girls-online" href="<?php echo base_url(); ?>user_interface/profiles?online=1">Girls online</a>
                            <?php else: ?>
                                <a class="girls-online" href="<?php echo base_url(); ?>user_interface/profiles?online=1">Men online</a>
                            <?php endif; ?>
                        <?php elseif ($gender == 2): ?>
                            <li><a href="<?php echo base_url(); ?>user_interface/profiles">Men profiles</a></li>
                        <?php endif; ?>
                    <?php else: ?>
                        <li><a href="<?php echo base_url(); ?>user_interface/profiles">Women profiles</a></li>
                        <li><a href="#">Girls online</a></li>
                    <?php endif; ?>
                </ul>
            </div>
            <div class="footer-left-box">
                <h4>Information:</h4>
                <ul>
                    <li><a href="<?php echo base_url(); ?>user_interface/support">Help</a></li>
                    <li><a href="<?php echo base_url(); ?>user_interface/about_us">About us</a></li>
                    <li><a href="<?php echo base_url(); ?>user_interface/sorry">Blog</a></li>
                    <li><a href="<?php echo base_url(); ?>user_interface/sorry">Partners</a></li>
                </ul>
            </div>

        </div>
        <div class="footer-right">
            <a class="footer-logo" href="<?php  echo base_url(); ?>"><img src="<?php echo base_url();?>content/user_interface/img/footer/footer-logo.png" alt="Ukrainian real brides" width="232px" height="131px" /></a>
            <ul>
                <li class="youtube-sprite"><a href="https://www.youtube.com/channel/UCh3M5uJ4v01u-7VN7l1bFvQ" target="_blank"><span></span></a></li>
                <li class="insta-sprite"><a href="https://www.instagram.com/dating.urb" target="_blank"><span></span></a></li>
                <li class="forsquare-sprite"><a href="#"><span></span></a></li>
            </ul>
        </div>
        <div class="footer-bottom">
            <div class="footer-copyrights">
                <span>UkrainianRealBrides 2001-<?php $year = getdate(); echo $year['year']; ?> &copy; All rights reserved.</span>
                <ul>
                    <li><a href="#modal-contact" data-toggle="modal">Contact Us</a></li>
                    <li><a href="#">Privacy Policy</a></li>
                    <li><a href="#">Termas And Conditions</a></li>
                </ul>
            </div>
            <span class="tel">+1-917-722-5338</span>
        </div>
    </div>
    <div class="page-bottom"></div>
</footer>

<!-- Modal contact us -->

<div class="modal fade" id="modal-contact">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-body">
                <button type="button" class="exit" data-dismiss="modal" aria-hidden="true"></button>
                <h2>Contact us</h2>
                <input type="text" class="form-control" placeholder="Name">
                <input type="email" class="form-control" placeholder="E-mail">
                <textarea class="form-control" name="" id="" cols="30" rows="8" placeholder="Write here your question please"></textarea>
                <a href="#" type="button" class="btn btn-danger">Send</a>
            </div>
        </div>
    </div>
</div>

<!-- Modal contact us END -->

<!-- Footer Ends Here -->
    <script src="https://apis.google.com/js/platform.js" async defer></script>
    <script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/1/jquery.min.js"></script>
    <script type="text/javascript" src="<?php echo base_url(); ?>content/bootstrap/js/bootstrap.js"></script>
    <script type="text/javascript" src="<?php echo base_url(); ?>content/user_interface/js/responsiveslides.js" type="text/javascript" ></script>
    <script type="text/javascript" src="<?php echo base_url(); ?>content/user_interface/js/signup.js"></script>
    <?php if(!$this->session->userdata('id')): ?>
        <script type="text/javascript" src="<?php echo base_url(); ?>content/user_interface/js/facebook.js"></script>
    <?php endif; ?>
    <script type="text/javascript" src="<?php echo base_url(); ?>content/user_interface/js/<?php echo $css; ?>.js"></script>
    <script type="text/javascript" src="<?php echo base_url(); ?>content/user_interface/js/jquery.jcarousel.min.js"></script>
    <script type="text/javascript" src="<?php echo base_url(); ?>content/user_interface/js/jcarousel.responsive.js"></script>
    <script type="text/javascript" src="<?php echo base_url(); ?>content/videosliderengine/amazingslider.js"></script>
    <script type="text/javascript" src="<?php echo base_url(); ?>content/videosliderengine/initslider-1.js"></script>
    <script src="http://jcrop-cdn.tapmodo.com/v2.0.0-RC1/js/Jcrop.js"></script>
    <script type="text/javascript" src="<?php echo base_url(); ?>content/user_interface/js/jquery-ui.js"></script>
    <script type="text/javascript" src="<?php echo base_url(); ?>content/user_interface/js/jquery.form.js"></script>
    <script type="text/javascript" src="<?php echo base_url(); ?>content/user_interface/js/masonry.pkgd.min.js"></script>
    <script type="text/javascript" src="<?php echo base_url(); ?>content/user_interface/js/script.js"></script>
    <script type="text/javascript" src="<?php echo base_url(); ?>content/user_interface/js/all.js"></script>
    <script src="https://autobahn.s3.amazonaws.com/autobahnjs/latest/autobahn.min.jgz"></script>
    </body>
</html>

<!-- Footer Starts Here -->
<footer id="footer">
    <div class="footer-holder">
        <div class="footer-left">
            <div class="footer-left-box">
                <h4>Services:</h4>
                <ul>
                    <li><a href="#">Chatting</a></li>
                    <li><a href="#">Messaging</a></li>
                    <li><a href="#">Gift Service</a></li>
                    <li><a href="#">Romance Tour</a></li>
                    <li><a href="#">Very important service</a></li>
                </ul>
            </div>
            <div class="footer-left-box">
                <h4>Members:</h4>
                <ul>
                    <li><a href="#">Search</a></li>
                    <li><a href="#">Women profiels</a></li>
                    <li><a href="#">Girls online</a></li>
                </ul>
            </div>
            <div class="footer-left-box">
                <h4>Information:</h4>
                <ul>
                    <li><a href="#">Help</a></li>
                    <li><a href="#">About us</a></li>
                    <li><a href="#">Blog</a></li>
                    <li><a href="#">Security</a></li>
                    <li><a href="#">Partners</a></li>
                </ul>
            </div>

        </div>
        <div class="footer-right">
            <a class="footer-logo" href="#"><img src="<?php echo base_url();?>content/user_interface/img/footer/footer-logo.png" alt="Ukrainian real brides" width="232px" height="131px" /></a>
            <ul>
                <li class="youtube-sprite"><a href="https://www.youtube.com/channel/UCh3M5uJ4v01u-7VN7l1bFvQ" target="_blank"><span></span></a></li>
                <li class="insta-sprite"><a href="#"><span></span></a></li>
                <li class="forsquare-sprite"><a href="#"><span></span></a></li>
            </ul>
        </div>
        <div class="footer-bottom">
            <div class="footer-copyrights">
                <span>UkrainianRealBrides 2001-2015 &copy; All rights reserved.</span>
                <ul>
                    <li><a href="#">Contact Us</a></li>
                    <li><a href="#">Privacy Policy</a></li>
                    <li><a href="#">Termas And Conditions</a></li>
                </ul>
            </div>
            <span class="tel">+1-917-722-5338</span>
        </div>
    </div>
    <div class="page-bottom"></div>
</footer>
</div>
<!-- Footer Ends Here -->
    <script src="https://apis.google.com/js/platform.js" async defer></script>
    <script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/1/jquery.min.js"></script>
    <script type="text/javascript" src="<?php echo base_url(); ?>content/bootstrap/js/bootstrap.js"></script>
    <script type="text/javascript" src="<?php echo base_url(); ?>content/user_interface/js/responsiveslides.js" type="text/javascript" ></script>
    <script type="text/javascript" src="<?php echo base_url(); ?>content/user_interface/js/jquery.form.js"></script>
    <script type="text/javascript" src="<?php echo base_url(); ?>content/user_interface/js/signup.js"></script>
    <?php if(!$this->session->userdata('id')): ?>
        <script type="text/javascript" src="<?php echo base_url(); ?>content/user_interface/js/facebook.js"></script>
    <?php endif; ?>
    <script type="text/javascript" src="<?php echo base_url(); ?>content/user_interface/js/personal_area.js"></script>
    <script type="text/javascript" src="<?php echo base_url(); ?>content/user_interface/js/jquery.jcarousel.min.js"></script>
    <script type="text/javascript" src="<?php echo base_url(); ?>content/user_interface/js/jcarousel.responsive.js"></script>
    <script type="text/javascript" src="<?php echo base_url(); ?>content/videosliderengine/amazingslider.js"></script>
    <script type="text/javascript" src="<?php echo base_url(); ?>content/videosliderengine/initslider-1.js"></script>

<script src="http://jcrop-cdn.tapmodo.com/v2.0.0-RC1/js/Jcrop.js"></script>
    </body>
</html>

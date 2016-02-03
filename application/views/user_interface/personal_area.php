<div class="personal-area">
    <div class="profile-block">
        <h2>Welcome <?php echo $this->session->userdata('name'); ?></h2>
		<span class="profile-photo">
            <?php if (!$avatar): ?>
		    <label class="file_upload">
                <img src="<?php echo base_url(); ?>content/user_interface/img/personal-area/upload-image.png" width="34" height="27" alt="Upload image">
                <span>Add Profile Photo</span>
                <form id="avatar"><input type="file" id="avatar-photo" name="avatar"></form>
            </label>
            <?php else: ?>
            <img src="<?php echo base_url(); ?>content/profiles/avatars/<?php echo $this->session->userdata('id') . '/' . $avatar; ?>_avatar.jpg" width="186" height="281" alt="Profile photo">
            <?php endif; ?>
		</span>
        <div class="profile-main">
            <ul>
                <li>
                    <img src="<?php echo base_url(); ?>content/user_interface/img/main/messaging.png"
                         width="40" height="50" alt="Messaging">
                    <div class="profile-box-right">
                        <h4>Messaging</h4>
                        <a class="inbox-online" href="">Inbox: <span><?php echo $new_messages; ?></span></a>
                    </div>
                </li>
                <li>
                    <img src="<?php echo base_url(); ?>content/user_interface/img/main/chat.png"
                         width="48" height="50" alt="Messaging">
                    <div class="profile-box-right">
                        <h4>Chat</h4>
                        <a class="inbox-online" href="">Online: <span><?php echo $users_online; ?></span></a>
                    </div>
                </li>
                <li class="video-chat">
                    <img src="<?php echo base_url(); ?>content/user_interface/img/main/video-chat.png"
                         width="49" height="50" alt="Messaging">
                    <div class="profile-box-right">
                        <h4>Video Chat</h4>
                        <a class="inbox-online" href="">Online: <span><?php echo $users_online; ?></span></a>
                    </div>
                </li>
                <li class="invite-friend">
                    <h4>Invite Friend</h4>
                    <a href="#invite-modal" data-toggle="modal">Send</a>
                </li>
                <li class="balance">
                    <h4>Balance: <?php echo $credits; ?>cr</h4>
                    <a href="<?php echo base_url(); ?>/user_interface/payment">Refill</a>
                </li>
            </ul>
            <div class="profile-bottom">
                <div class="profile-bottom-left">
                    <h4>My Photo</h4>
                    <span class="photo-page-number"><?php echo $photo_count; ?>/5</span>
                    <div class="profile-photos">
                        <div class="profile-photos-block">
                            <?php if($photo_count > 0): ?>
                                <span class="middle-photo">
                                    <a href="#photo-modal" role="button" data-toggle="modal" class="photo-view">
                                        <img src="<?php echo base_url(); ?>content/profiles/photo/<?php echo $this->session->userdata('id'); ?>/<?php echo $photos[0]->photo_link; ?>_preview.jpg" width="196" height="116" alt="Middle profile photo">
                                    </a>
                                </span>
                            <?php if ($photo_count > 1): ?>
                                <?php for($i = 1; $i < $photo_count; $i++): ?>
                                    <span class="small-photo">
                                        <a href="#photo-modal" role="button" data-toggle="modal" class="photo-view">
                                            <img src="<?php echo base_url(); ?>content/profiles/photo/<?php echo $this->session->userdata('id'); ?>/<?php echo $photos[$i]->photo_link; ?>_preview.jpg" width="98" height="58" alt="Small profile photo">
                                        </a>
                                    </span>
                                <?php endfor; ?>
                            <?php endif; ?>
                            <?php endif; ?>
                        </div>
                        <label class="file_upload">
                            <img
                                src="<?php echo base_url(); ?>content/user_interface/img/personal-area/upload-image.png"
                                width="34" height="27" alt="Upload image"">
                            <span>Add Photo</span>
                            <form id="photo"><input type="file" id="upload-photo" name="photo"></form>
                        </label>
                    </div>
                </div>
                <div class="profile-bottom-right">
                    <h4>My Video</h4>
                    <span class="video-page-number">1/2</span>
                    <div class="profile-videos">
                        <img src="<?php echo base_url(); ?>content/user_interface/img/personal-area/profile-video.jpg"
                             width="173" height="124" alt="Profile video">
                        <label class="file_upload">
                            <img
                                src="<?php echo base_url(); ?>content/user_interface/img/personal-area/upload-video.png"
                                width="24" height="26" alt="Upload image">
                            <span>Add Video</span>
                            <input type="file">
                        </label>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- jcarousel photo gallery -->
<div class="jcarousel-wrapper">
    <h4>Favorites</h4>
    <div class="jcarousel">
        <ul>
            <li>
                <img src="<?php echo base_url(); ?>content/user_interface/img/personal-area/favorites.jpg" width="143" height="182" alt="Favorites">
                <a class="delete-photo" href=""></a>
            </li>
            <li>
                <img src="<?php echo base_url(); ?>content/user_interface/img/personal-area/favorites.jpg" width="143" height="182" alt="Favorites">
                <a class="delete-photo" href=""></a>
            </li>
            <li>
                <img src="<?php echo base_url(); ?>content/user_interface/img/personal-area/favorites.jpg" width="143" height="182" alt="Favorites">
                <a class="delete-photo" href=""></a>
            </li>
            <li>
                <img src="<?php echo base_url(); ?>content/user_interface/img/personal-area/favorites.jpg" width="143" height="182" alt="Favorites">
                <a class="delete-photo" href=""></a>
            </li>
            <li>
                <img src="<?php echo base_url(); ?>content/user_interface/img/personal-area/favorites.jpg" width="143" height="182" alt="Favorites">
                <a class="delete-photo" href=""></a>
            </li>
            <li>
                <img src="<?php echo base_url(); ?>content/user_interface/img/personal-area/favorites.jpg" width="143" height="182" alt="Favorites">
                <a class="delete-photo" href=""></a>
            </li>
            <li>
                <img src="<?php echo base_url(); ?>content/user_interface/img/personal-area/favorites.jpg" width="143" height="182" alt="Favorites">
                <a class="delete-photo" href=""></a>
            </li>
            <li>
                <img src="<?php echo base_url(); ?>content/user_interface/img/personal-area/favorites.jpg" width="143" height="182" alt="Favorites">
                <a class="delete-photo" href=""></a>
            </li>
            <li>
                <img src="<?php echo base_url(); ?>content/user_interface/img/personal-area/favorites.jpg" width="143" height="182" alt="Favorites">
                <a class="delete-photo" href=""></a>
            </li>
        </ul>
    </div>
    <a href="#" class="jcarousel-control-prev"></a>
    <a href="#" class="jcarousel-control-next"></a>
</div>
<!-- jcarousel photo gallery END -->

<!-- Profile photo crop modal -->
<a href="#new-avatar" id="avatar-link" role="button" data-toggle="modal"></a>
<div class="modal fade" id="new-avatar">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-body">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">
                    <div class="exit"></div>
                </button>
                <h4>Create your avatar</h4>
                <img src="" class="new-user-avatar" id="target">
                <p>Crop your profile photo here</p>
                <button type="button" class="btn btn-success" id="save-avatar">Save photo</button>
            </div>
        </div>
    </div>
</div>
<!-- Profile photo crop modal END -->

<!-- Invite modal -->
<div class="modal fade" id="invite-modal">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-body">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">
                    <div class="exit"></div>
                </button>
                <h2>Invite friend</h2>
                <form class="form-horizontal" id="login-form">
                    <div class="form-row">
                        <input type="text" class="form-control" placeholder="Name" autofocus tabindex="1" id="user-name">
                        <span id="user-name-error-text" class="form-error-message"></span>
                    </div>
                    <div class="form-row last-form">
                            <input type="text" class="form-control" placeholder="Email Address" tabindex="2" id="user-email">
                            <span id="user-email-error-text" class="form-error-message"></span>
                    </div>
                    <button type="button" class="btn btn-danger" id="invite">Invite</button>
                </form>
                <div class="modal-bottom">
                <span>Send invitation letter to your friend</span>
            </div>
            </div>

        </div>
    </div>
</div>
<<<<<<< HEAD
<!-- Invite modal END
=======
<!-- Invite modal END -->

<!--Photo modal-->
<div class="modal fade" id="photo-modal">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-body">
                <a href="#" id="user-photo">
                    <img src="">
                </a>
                <button type="button" class="btn btn-danger">Delete this photo</button>
            </div>
        </div>
    </div>
</div>
<!--Photo modal END-->
>>>>>>> personalArea

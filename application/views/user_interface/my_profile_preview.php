<div class="content-wrapper">
    <div class="profile-preview">
        <h2>Profile view</h2>
        <div class="profile-preview-left">
            <img
                src="<?php echo base_url(); ?>content/profiles/avatars/<?php echo $id; ?>/<?php echo $avatar; ?>_avatar.jpg"
                alt="Profile photo" width="297" height="450">
            <button class="add-to-favorites" type="button"></button>
        </div>
        <div class="profile-preview-center">
            <span class="profile-preview-name">
				<?php echo $all_data[3][0]->name . ' ' . $all_data[3][0]->lastname; ?>
                , <?php echo $all_data[1][0]->birthday; ?>
			</span>
            <span class="profile-preview-status">
				<?php echo $all_data[0][0]->country_name; ?>
				<em>Online</em>
			</span>

            <!-- Profile info TABS -->
            <div class="profile-prewiev-tabs">
                <!-- Tabs nav -->
                <ul class="nav nav-tabs nav-justified" role="tablist">
                    <li role="presentation" class="active">
                    	<a href="#preview-personal-tab" aria-controls="preview-personal-tab" role="tab" data-toggle="tab">Personal</a>
                    </li>
                    <li role="presentation">
                    	<a href="#preview-about-me-tab" aria-controls="preview-about-me-tab" role="tab" data-toggle="tab">About me</a>
                    </li>
                    <li role="presentation">
                    	<a href="#preview-about-partner-tab" aria-controls="preview-aboutme-tab" role="tab" data-toggle="tab">About partner</a>
                    </li>
                </ul>

                <div class="tab-content">
                    <div role="tabpanel" class="active tab-pane" id="preview-personal-tab">
                        <div class="tab-body">
                            <ul class="profile-characters">
                                <li>
                                    <div class="characters-left">
                                        <span>Height</span>
                                    </div>
									<span class="characters-right"><?php echo $all_data[1][0]->height; ?></span>
								</li>
								<li>
									<div class="characters-left">
										<span>Weight</span>
									</div>
									<span class="characters-right"><?php echo $all_data[1][0]->weight; ?></span>
								</li>
								<li>
									<div class="characters-left">
										<span>Eyes color</span>
									</div>
									<span class="characters-right"><?php echo $all_data[1][0]->eyes_color; ?></span>
								</li>
								<li>
									<div class="characters-left">
										<span>Hair color</span>
									</div>
									<span class="characters-right"><?php echo $all_data[1][0]->hair_color; ?></span>
								</li>
								<li>
									<div class="characters-left">
										<span>Children</span>
									</div>
									<span class="characters-right"><?php echo $all_data[1][0]->children; ?></span>
								</li>
								<li>
									<div class="characters-left">
										<span>Smoking</span>
									</div>
									<span class="characters-right"><?php echo $all_data[1][0]->smoking; ?></span>
								</li>
								<li>
									<div class="characters-left">
										<span>Drinking</span>
									</div>
									<span class="characters-right"><?php echo $all_data[1][0]->drinking; ?></span>
								</li>
							</ul>
						</div>
					</div>
					<div role="tabpanel" class="tab-pane fade" id="preview-about-me-tab">
					    <div class="tab-body">
							<ul class="profile-characters">
								<li class="about-block">
									<div class="characters-left">
										<span>About me:</span>
									</div>
									<span class="characters-right"><?php echo $all_data[1][0]->about_me; ?></span>
								</li>
								<li class="about-block">
									<div class="characters-left">
										<span>My hobbies:</span>
									</div>
									<span class="characters-right"></span>
								</li>
							</ul>
					    </div>
					</div>
					<div role="tabpanel" class="tab-pane fade" id="preview-about-partner-tab">
						<div class="tab-body">
							<ul class="profile-characters">
								<li>
									<div class="characters-left">
										<span>Age</span>
									</div>
									<span class="characters-right"><?php echo $all_data[2][0]->age; ?></span>
								</li>
								<li>
									<div class="characters-left">
										<span>Children</span>
									</div>
									<span class="characters-right"><?php echo $all_data[2][0]->partner_children; ?></span>
								</li>
								<li>
									<div class="characters-left">
										<span>Drinking</span>
									</div>
									<span class="characters-right"><?php echo $all_data[2][0]->partner_drinking; ?></span>
								</li>
								<li>
									<div class="characters-left">
										<span>Smoking</span>
									</div>
									<span class="characters-right"><?php echo $all_data[2][0]->partner_smoking; ?></span>
								</li>
								<li class="about-block">
									<div class="characters-left">
										<span>About my partner:</span>
									</div>
									<span class="characters-right" id="about-my-partner">
										<?php echo $all_data[2][0]->about_my_partner; ?>
									</span>
									<button class="read-more-button" type="button" style="display:none;">Show more</button>
								</li>
							</ul>
						</div>
					</div>
				</div>
			</div>
			<!-- Profile info TABS END -->
		</div>
		<div class="profile-preview-right">
			<ul>
				<li>
					<a class="preview-chat" href="#">
						<img src="<?php echo base_url(); ?>content/user_interface/img/main/chat.png" width="48" height="47" alt="Invite to chat" />
						<span>Invite to chat</span>
					</a>
				</li>
				<li>
					<a href="#">
						<img src="<?php echo base_url(); ?>content/user_interface/img/main/messaging.png" width="44" height="44" alt="Send letter" />
						<span>Send Letter</span>
					</a>
				</li>
				<li>
					<a class="preview-gift" href="#">
            			<img src="<?php echo base_url(); ?>content/user_interface/img/main/gift-service.png" width="41" height="55" alt="Send gift" />
						<span>Send Gift</span>
					</a>
				</li>
				<li>
					<a class="preview-tour" href="#">
						<img src="<?php echo base_url(); ?>content/user_interface/img/main/romance-tours.png" width="56" height="44" alt="Invite to romance tours" />
						<span>Invite to romance tour</span>
					</a>
				</li>
				<li>
					<a class="preview-video" href="#">
            			<img src="<?php echo base_url(); ?>content/user_interface/img/main/video-chat.png" width="53" height="48" alt="Invite to video chat" />
						<span>Invite to video chat</span>
					</a>
				</li>
			</ul>
		</div>
	</div>

	<div class="profile-preview-bottom">
	  <div id="content" class="container clearfix">
		  <?php foreach ($photos as $value): ?>
			  <div class="item">
				  <a href="#photo-modal" role="button" data-toggle="modal">
					  <img src="<?php echo base_url(); ?>/content/profiles/photo/<?php echo $this->session->userdata('id'); ?>/<?php echo $value->photo_link; ?>_full.jpg" alt="Photo gallery" class="photos" />
				  </a>
			  </div>
		  <?php endforeach; ?>
	  </div>
	</div>
</div>

<!--Photo modal-->
<div class="modal fade" id="photo-modal">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-body">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">
                    <div class="exit"></div>
                </button>
                <span></span>
                <button type="button" id="user-photo">
	    			<img src="" alt="Photo gallery" />
                </button>
            </div>
        </div>
    </div>
</div>
<!--Photo modal END-->

<div class="profile-preview-holder">
	<div class="profile-preview">
		<h2>Profile view</h2>
		<div class="profile-preview-left">
			<img src="<?php echo base_url(); ?>content/profiles/avatars/<?php echo $this->session->userdata('id'); ?>/<?php echo $avatar; ?>_avatar.jpg" alt="Profile photo" width="297" height="450">
			<button class="add-to-favorites" type="button"></button>
		</div>
		<div class="profile-preview-center">
			<span class="profile-preview-name"><?php echo $this->session->userdata('name') . ' ' . $this->session->userdata('lastname'); ?></span>
			<span class="profile-preview-status"><?php if ($all_data[0][0]->country_name) {echo $all_data[0][0]->country_name;} ?> <em>Online</em></span>

			<!-- Profile info TABS -->
			<div class="profile-prewiev-tabs">
				<!-- Tabs nav -->
				<ul class="nav nav-tabs nav-justified" role="tablist">
					<li role="presentation" class="active"><a href="#preview-personal-tab" aria-controls="preview-personal-tab" role="tab" data-toggle="tab">Personal</a></li>
					<li role="presentation"><a href="#preview-about-me-tab" aria-controls="preview-about-me-tab" role="tab" data-toggle="tab">About me</a></li> 
					<li role="presentation"><a href="#preview-about-partner-tab" aria-controls="preview-aboutme-tab" role="tab" data-toggle="tab">About partner</a></li> 
				</ul>

				<div class="tab-content">
					<div role="tabpanel" class="active tab-pane" id="preview-personal-tab">
						<div class="tab-body">
							<ul class="profile-characters">
								<li>
									<div class="charachters-left">
										<span>Height</span>
									</div>
									<span class="characters-right">
										<?php if ($all_data[1][0]->height): ?>
											<?php echo $all_data[1][0]->height; ?>
										<?php else: ?>
											<a href="#">Ask information</a>
										<?php endif; ?>
									</span>
								</li>
								<li>
									<div class="charachters-left">
										<span>Weight</span>
									</div>
									<span class="characters-right"><?php echo $all_data[1][0]->weight; ?></span>
								</li>
								<li>
									<div class="charachters-left">
										<span>Eyes color</span>
									</div>
									<span class="characters-right"><?php echo $all_data[1][0]->eyes_color; ?></span>
								</li>
								<li>
									<div class="charachters-left">
										<span>Hair color</span>
									</div>
									<span class="characters-right"><?php echo $all_data[1][0]->hair_color; ?></span>
								</li>
								<li>
									<div class="charachters-left">
										<span>Children</span>
									</div>
									<span class="characters-right"><?php echo $all_data[1][0]->children; ?></span>
								</li>
							</ul>
						</div>
					</div>
					<div role="tabpanel" class="tab-pane fade" id="preview-about-me-tab">
					    <div class="tab-body">
							<?php echo $all_data[1][0]->about_me; ?>
					    </div>
					</div>
					<div role="tabpanel" class="tab-pane fade" id="preview-about-partner-tab">
					    <div class="tab-body">
							dsasdasd
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
    
    
    <div class="item">
    	<img src="<?php echo base_url(); ?>content/user_interface/img/profile-preview/image02.jpg" alt="Photo gallery" />
    </div>

    <div class="item featured">
    	<img src="<?php echo base_url(); ?>content/user_interface/img/profile-preview/image03.jpg" alt="Photo gallery" />
    </div>

    <div class="item">
    	<img src="<?php echo base_url(); ?>content/user_interface/img/profile-preview/image05.jpg" alt="Photo gallery" />
    </div>
    
    <div class="item featured">
    	<img src="<?php echo base_url(); ?>content/user_interface/img/profile-preview/image06.jpg" alt="Photo gallery" />
    </div>
    
    <div class="item">
    	<img src="<?php echo base_url(); ?>content/user_interface/img/profile-preview/image07.jpg" alt="Photo gallery" />
    </div>
    
    <div class="item">
    	<img src="<?php echo base_url(); ?>content/user_interface/img/profile-preview/image04.jpg" alt="Photo gallery" />
    </div>
    
    <div class="item">
    	<img src="<?php echo base_url(); ?>content/user_interface/img/profile-preview/image08.jpg" alt="Photo gallery" />
    </div>
    
  </div>
</div>



<!-- <div class="profile-preview-bottom">
	<div class="grid">
  <div class="grid-sizer"></div>
  <div class="grid-item">
    <img src="<?php echo base_url(); ?>content/user_interface/img/profile-preview/image01.jpg" alt="Photo gallery" />
  </div>
  <div class="grid-item">
    <img src="<?php echo base_url(); ?>content/user_interface/img/profile-preview/image02.jpg" alt="Photo gallery" />
  </div>
  <div class="grid-item">
    <img src="<?php echo base_url(); ?>content/user_interface/img/profile-preview/image03.jpg" alt="Photo gallery" />
  </div>
  <div class="grid-item">
    <img src="<?php echo base_url(); ?>content/user_interface/img/profile-preview/image04.jpg" alt="Photo gallery" />
  </div>
  <div class="grid-item">
    <img src="<?php echo base_url(); ?>content/user_interface/img/profile-preview/image05.jpg" alt="Photo gallery" />
  </div>
  <div class="grid-item">
    <img src="<?php echo base_url(); ?>content/user_interface/img/profile-preview/image06.jpg" alt="Photo gallery" />
  </div>
  <div class="grid-item">
    <img src="<?php echo base_url(); ?>content/user_interface/img/profile-preview/image07.jpg" alt="Photo gallery" />
  </div>
  <div class="grid-item">
    <img src="<?php echo base_url(); ?>content/user_interface/img/profile-preview/image08.jpg" alt="Photo gallery" />
  </div>
</div>
</div> -->



</div>
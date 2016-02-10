<!-- Services page -->
<div class="settings-wrap">
	<div class="tabs-holder">
	<h2>Profile Settings</h2>
	  <!-- Nav tabs -->
	  <ul class="nav nav-tabs nav-justified" role="tablist">
	    <li role="presentation" class="active"><a href="#general-tab" aria-controls="messaging-tab" role="tab" data-toggle="tab">General</a></li>
	    <li role="presentation"><a href="#gift-service-chat" aria-controls="gift-service-chat" role="tab" data-toggle="tab">Personal</a></li>
	    <li role="presentation"><a href="#important-service-tab" aria-controls="important-service-tab" role="tab" data-toggle="tab">Personal</a></li>
	    <li role="presentation"><a href="#romance-tours-tab" aria-controls="romance-tours-tab" role="tab" data-toggle="tab">Personal</a></li>
	  </ul>

	  <!-- Tab panes -->
	  <div class="tab-content">
	    <div role="tabpanel" class="active tab-pane" id="general-tab">
	    	<div class="tab-body">
                <h2>Profile information</h2>     
                <p>All fields are required. Please, set your profile info in fields below.</p>
                <form class="general-form" action="#">
	                <div class="profile-form-row">
	                	<span>First name</span>
	                	<input class="profile-form" type="text" placeholder="Your name" id="user-name">
						<span class="error"></span>
	                </div>
	                <div class="profile-form-row">
	                	<span>Last name</span>
	                	<input class="profile-form" type="text" placeholder="Your surname" id="user-lastname">
						<span class="error"></span>
	                </div>
	                <div class="profile-form-row">
	                	<span>Gender</span>
						<label>
						    <select id="gender">
						        <option selected>Male</option>
						        <option>Female</option>
						    </select>
						</label>
						<span class="error"></span>
	                </div>
	                <div class="profile-form-row">
		                <span>Birthday</span>
		                <div class="birthday">
			                <label>
								<select id="day">
								    <option selected>DD</option>
								    <?php for ($i = 1; $i <= 31; $i++): ?>
										<option><?php echo $i; ?></option>
									<?php endfor; ?>
								</select>
							</label>
							<label>
								<select id="month">
								    <option selected>MM</option>
								    <?php for ($i = 1; $i <= 12; $i++): ?>
										<option><?php echo $i; ?></option>
									<?php endfor; ?>
								</select>
							</label>
							<label class="year">
								<select id="year">
								    <option selected>YYYY</option>
									<?php $year = getdate(); ?>
								    <?php for($i = $year['year'] - 18; $i >= $year['year'] - 90; $i--): ?>
										<option><?php echo $i; ?></option>
									<?php endfor; ?>
								</select>
							</label>
		                </div>
						<span class="error"></span>
	                </div>
	                <div class="profile-form-row">
	                	<span>Country</span>
	                	<input class="profile-form" type="text" placeholder="Your location" id="user-country">
						<span class="error"></span>
	                	<div class="location-drop">
	                		<?php foreach ($countries as $value): ?>
								<span class="country"><?php echo $value->country_name; ?></span>
							<?php endforeach; ?>
	                	</div>	
	                </div>
				</form>
				<div class="buttons-row">
					<!-- <button type="button" class="btn">Previous</button> -->
<!-- 					<button type="button" class="btn skip"><a href="#" class="settings-controls">Skip</a></button> -->
					<button type="button" class="btn save"><a href="#" class="settings-controls">Save</a></button>
					<button type="button" class="btn next"><a href="#" class="settings-controls">Next</a></button>

				</div>
	    	</div>
	    </div>
	    <div role="tabpanel" class="tab-pane fade" id="gift-service-chat">
	    	<div class="tab-body gift-service-tab">
				<img src="<?php echo base_url(); ?>content/user_interface/img/main/gift-service.png" alt="Gift service" />
                <h2>Gift service</h2>     
                <p>You can express your feelings and send your romantic gift.</p>
                <button type="button" class="btn btn-danger">To Service</button>
	    	</div>
	    </div>
	    <div role="tabpanel" class="tab-pane fade" id="important-service-tab">
	    	<div class="tab-body">
				<img src="<?php echo base_url(); ?>content/user_interface/img/main/very-important-service.png" alt="Very important service" />
                <h2>Very important service</h2>     
                <p>You feel it is time to meet Ladies in real? Time to touch her hand, see her eyes and listen to her wonderful voice? You want to hug your lady and feel the smell of her beautiful hair? You desire to start the life full of romance and tender emotions? Then come to Ukraine as soon as possible! One meeting is worth lots of words. We will be very glad to meet you and help with everything in your romantic Tour.</p>
                <button type="button" class="btn btn-danger">To Service</button>
	    	</div>	    	
	    </div>
	    <div role="tabpanel" class="tab-pane fade" id="romance-tours-tab">
	    	<div class="tab-body">
                 <img src="<?php echo base_url(); ?>content/user_interface/img/main/romance-tours.png" alt="Romance tours" />
                <h2>Romance tours service</h2>     
                <p>You feel it is time to meet Ladies in real? Time to touch her hand, see her eyes and listen to her wonderful voice? You want to hug your lady and feel the smell of her beautiful hair? You desire to start the life full of romance and tender emotions? Then come to Ukraine as soon as possible! One meeting is worth lots of words. We will be very glad to meet you and help with everything in your romantic Tour.</p>
                <button type="button" class="btn btn-danger">To Service</button>
	    	</div>	    	
	    </div>
	  </div>

	</div>
	<!-- Services page END -->
</div>

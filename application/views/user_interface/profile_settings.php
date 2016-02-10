<!-- Services page -->
<div class="settings-wrap">
	<div class="tabs-holder">
	<h2>Profile Settings</h2>
	  <!-- Nav tabs -->
	  <ul class="nav nav-tabs nav-justified" role="tablist">
	    <li role="presentation" class="active"><a href="#general-tab" aria-controls="general-tab" role="tab" data-toggle="tab">General</a></li>
	    <li role="presentation"><a href="#personal-tab" aria-controls="personal-tab" role="tab" data-toggle="tab">Personal</a></li>
	    <li role="presentation"><a href="#background-tab" aria-controls="background-tab" role="tab" data-toggle="tab">Background</a></li>
	    <li role="presentation"><a href="#partner-tab" aria-controls="partner-tab" role="tab" data-toggle="tab">Partner</a></li>
	    <li role="presentation"><a href="#security-tab" aria-controls="security-tab" role="tab" data-toggle="tab">Security</a></li>
	  </ul>

	  <!-- Tab panes -->
	  <div class="tab-content">
	    <div role="tabpanel" class="active tab-pane" id="general-tab">
	    	<div class="tab-body">
                <h2>Profile information</h2>     
                <p>All fields with <em> * </em> are required. Please, set your profile info in fields below.</p>
                <form class="settings-form" action="#">
	                <div class="profile-form-row">
	                	<span>First name <em>*</em></span>
	                	<div class="form-block">
	                		<input class="profile-form form-control" type="text" placeholder="Your name" id="user-name" >
							<strong class="form-error-message"></strong>
	                	</div>
	                </div>
	                <div class="profile-form-row">
	                	<span>Last name</span>
		                <div class="form-block">
		                	<input class="profile-form form-control" type="text" placeholder="Your surname" id="user-lastname">
							<strong class="form-error-message"></strong>
						</div>
	                </div>
	                <div class="profile-form-row">
	                	<span>Gender <em>*</em></span>
		                <div class="form-block">
							<label>
							    <select id="gender">
							        <option selected>Male</option>
							        <option>Female</option>
							    </select>
							<strong class="form-error-message"></strong>
							</label>

						</div>
	                </div>
	                <div class="profile-form-row">
		                <span>Birthday <em>*</em></span>
		                <div class="form-block">
		                	<div class="birthday-block">
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
							<strong class="form-error-message"></strong>
		                </div>	
	                </div>
	                <div class="profile-form-row">
	                	<span>Country <em>*</em></span>
	                	<div class="form-block">
		                	<input class="profile-form form-control" type="text" placeholder="Your location" id="user-country">
							<strong class="form-error-message"></strong>
		                	<div class="location-drop">
		                		<?php foreach ($countries as $value): ?>
									<span class="country"><?php echo $value->country_name; ?></span>
								<?php endforeach; ?>
		                	</div>	
		                	<strong class="form-error-message"></strong>
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
	    <div role="tabpanel" class="tab-pane fade" id="personal-tab">
	    	<div class="tab-body">
                <h2>Personal</h2>     
                <p>Select your personal information</p>
                <form class="settings-form" action="#">
	                <div class="profile-form-row">
	                	<span>Height</span>
						<label>
						    <select>
						        <option selected>155</option>
						        <option>156</option>
						        <option>157</option>
						    </select>
						</label>		
	                </div>
	                <div class="profile-form-row">
	                	<span>Weight</span>
	                	<label>
						    <select>
						        <option selected>70</option>
						        <option>71</option>
						        <option>72</option>
						    </select>
						</label>
	                </div>
	                <div class="profile-form-row">
	                	<span>Eyes color</span>
	                	<label>
						    <select>
						        <option selected>Blue</option>
						        <option>Brown</option>
						        <option>Amber</option>
						        <option>Gray</option>
						        <option>Green</option>
						        <option>Hazel</option>
						    </select>
						</label>
	                </div>
	                <div class="profile-form-row">
	                	<span>Hair color</span>
	                	<label>
						    <select>
						        <option selected>Blonde</option>
						        <option>Gray</option>
						        <option>Blonde</option>
						        <option>Black</option>
						        <option>Redhead</option>
						    </select>
						</label>
	                </div>
	                <div class="profile-form-row">
	                	<span>Children</span>
	                	<label>
						    <select>
						        <option selected>0</option>
						        <option>1</option>
						        <option>2</option>
						        <option>3</option>
						        <option>4</option>
						    </select>
						</label>
	                </div>
	                <div class="profile-form-row">
	                	<span>Religion</span>
	                	<label>
						    <select>
						        <option selected>Atheism</option>
						        <option>Christianity</option>
						        <option>Islam</option>
						        <option>Judaism</option>
						    </select>
						</label>
	                </div>
				</form>
				<div class="buttons-row">
					<!-- <button type="button" class="btn">Previous</button> -->
<!-- 					<button type="button" class="btn skip"><a href="#" class="settings-controls">Skip</a></button> -->
					<button type="button" class="btn"><a href="#" class="settings-controls">Prev</a></button>
					<button type="button" class="btn save"><a href="#" class="settings-controls">Save</a></button>
					<button type="button" class="btn"><a href="#" class="settings-controls">Next</a></button>

				</div>
	    	</div>
	    </div>
	    <div role="tabpanel" class="tab-pane fade" id="background-tab">
	    	<div class="tab-body">
                <h2>Background</h2>     
                <p>Select your additional information</p>
                <form class="settings-form" action="#">
	                <div class="profile-form-row">
	                	<span>Education</span>
						<label>
						    <select>
						        <option selected>Master</option>
						        <option>Bachelor</option>
						        <option>Short-cycle tertiary</option>
						    </select>
						</label>		
	                </div>
	                <div class="profile-form-row">
	                	<span>Drinking</span>
	                	<label>
						    <select>
						        <option selected>No</option>
						        <option>Yes</option>
						    </select>
						</label>
	                </div>
	                <div class="profile-form-row">
	                	<span>Smoking</span>
	                	<label>
						    <select>
						        <option selected>No</option>
						        <option>Yes</option>
						    </select>
						</label>
	                </div>
	                <div class="profile-form-row">
	                	<span>Hobbies</span>
	                	<input class="profile-form" type="text" placeholder="Your hobbies">			
	                </div>
	                <div class="profile-form-row">
	                	<span>About me</span>
	                	<input class="profile-form" type="textarea" placeholder="Tell something about you">	
	                </div>
				</form>
				<div class="buttons-row">
					<!-- <button type="button" class="btn">Previous</button> -->
<!-- 					<button type="button" class="btn skip"><a href="#" class="settings-controls">Skip</a></button> -->
					<button type="button" class="btn"><a href="#" class="settings-controls">Prev</a></button>
					<button type="button" class="btn save"><a href="#" class="settings-controls">Save</a></button>
					<button type="button" class="btn"><a href="#" class="settings-controls">Next</a></button>

				</div>
	    	</div>    	
	    </div>
	    <div role="tabpanel" class="tab-pane fade" id="security-tab">
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

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
					<button type="button" class="btn save">Save</button>
					<button type="button" class="btn next">Next</button>

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
	                	<div class="form-block">
							<label>
							    <select>
									<option selected></option>
									<?php $ft = array(); ?>
							        <?php for ($i = 150; $i <= 210; $i++): ?>
										<?php
											$inches = round($i/2.54, 2);
											$intermediate = round($inches/12, 2);
											$ft_intermediate = floor($intermediate);
											$intermediate = $intermediate - $ft_intermediate;
											$inches = round($intermediate*12);
											array_push($ft, $ft_intermediate . "' " . $inches . "''");
										?>

										<option><?php echo $i . ' sm (' . $ft[$i - 150] . ')'; ?></option>
									<?php endfor; ?>
							    </select>
							</label>		
	                	</div>
	                </div>
	                <div class="profile-form-row">
	                	<span>Weight</span>
	                	<div class="form-block">
		                	<label>
							    <select>
							        <option selected></option>
									<?php for ($i = 40; $i <= 130; $i++): ?>
										<?php $lbs = round($i*2.20462, 1); ?>
										<option><?php echo $i . 'kg (' . $lbs . ' lbs)'; ?></option>
									<?php endfor; ?>
							    </select>
							</label>
	                	</div>
	                </div>
	                <div class="profile-form-row">
	                	<span>Eyes color</span>
	                	<div class="form-block">
		                	<label>
							    <select>
									<option selected></option>
							        <?php $eyes = array('Amber', 'Blue', 'Brown', 'Gray', 'Green', 'Hazel'); ?>
									<?php foreach ($eyes as $value): ?>
										<option><?php echo $value; ?></option>
									<?php endforeach; ?>
							    </select>
							</label>		
	                	</div>
	                </div>
	                <div class="profile-form-row">
	                	<span>Hair color</span>
	                	<div class="form-block">
		                	<label>
							    <select>
							        <option selected></option>
									<?php $hair = array('Black', 'Brown', 'Blond', 'Auburn', 'Chestnut', 'Red', 'Gray and white'); ?>
									<?php foreach ($hair as $value): ?>
										<option><?php echo $value; ?></option>
									<?php endforeach; ?>
							    </select>
							</label>
						</div>
	                </div>
	                <div class="profile-form-row">
	                	<span>Children</span>
	                	<div class="form-block">
		                	<label>
							    <select>
							        <option selected>None</option>
									<?php for ($i = 1; $i <= 5; $i++): ?>
										<option><?php echo $i; ?></option>
									<?php endfor; ?>
							    </select>
							</label>
						</div>	
	                </div>
	                <div class="profile-form-row">
	                	<span>Religion</span>
	                	<div class="form-block">
		                	<label>
							    <select>
							        <option selected></option>
									<?php $religion = array('Christian', 'Buddhist', 'Catholik', 'Jewish', 'Muslin', 'Hindu', 'Atheist', 'Other'); ?>
									<?php foreach ($religion as $value): ?>
										<option><?php echo $value; ?></option>
									<?php endforeach; ?>
							    </select>
							</label>
						</div>	
	                </div>
				</form>
				<div class="buttons-row">
					<!-- <button type="button" class="btn">Previous</button> -->
<!-- 					<button type="button" class="btn skip"><a href="#" class="settings-controls">Skip</a></button> -->
					<button type="button" class="btn">Prev</button>
					<button type="button" class="btn save">Save</button>
					<button type="button" class="btn next">Next</button>
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
	                	<div class="form-block">
							<label>
							    <select>
							        <option selected>Master's degree</option>
							        <option>Bachelor</option>
							        <option>Short-cycle tertiary</option>
							    </select>
							</label>
						</div>	
	                </div>
	                <div class="profile-form-row">
	                	<span>Drinking</span>
	                	<div class="form-block">
		                	<label>
							    <select>
							        <option selected>No</option>
							        <option>Yes</option>
							    </select>
							</label>
						</div>
	                </div>
	                <div class="profile-form-row">
	                	<span>Smoking</span>
	                	<div class="form-block">
		                	<label>
							    <select>
							        <option selected>No</option>
							        <option>Yes</option>
							    </select>
							</label>
						</div>
	                </div>
	                <div class="profile-form-row">
	                	<span>Hobbies</span>
	                	<div class="form-block">
	                		<input class="profile-form" type="text" placeholder="Your hobbies">	
	                	</div>	
	                </div>
	                <div class="profile-form-row aboutme">
	                	<span>About me</span>
	                	<div class="form-block">
	                		<textarea placeholder="Write something about you" class="profile-form"  cols="30" rows="5"></textarea>
	                	</div>
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
	    <div role="tabpanel" class="tab-pane fade" id="partner-tab">
	    	<div class="tab-body">
                <h2>Partner</h2>     
                <p>In the fields below , select the preferences of your partner</p>
                <form class="settings-form" action="#">
	                <div class="profile-form-row">
	                	<span>Age</span>
	                	<div class="form-block">
							<label>
							    <select>
							        <option selected></option>
							        <option>Bachelor</option>
							        <option>Short-cycle tertiary</option>
							    </select>
							</label>
						</div>	
	                </div>
	                <div class="profile-form-row">
	                	<span>Children</span>
	                	<div class="form-block">
		                	<label>
							    <select>
							        <option selected>No</option>
							        <option>Yes</option>
							    </select>
							</label>
						</div>
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
	  </div>

	</div>
	<!-- Services page END -->
</div>

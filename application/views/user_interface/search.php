<div class="search-holder">
	<h2>Search</h2>
	<span class="sub-heading">Sub heading</span>
	<div class="search">
		<form action="#">
			<div class="search-form-row">
				<div class="search-first-column">
					<span class="search-title">ID</span>
					<div class="search-id-holder">
			            <input class="search-form" type="text" placeholder="023" id="#" >
						<button type="button" class="search-id-button"></button>
					</div>
				</div>
				<div class="search-second-column">
					<span class="search-title">Age</span>
		            <div class="search-range">
		                <em class="left-range">18</em>
		               	<div class="slider-wrap">
		                	<div id="slider-age"></div>
		                </div>
		                <em class="right-range">90</em>
					</div>	
				</div>
				<div class="search-third-column">
					<span class="search-title">Country</span>
					<div class="search-country-block">
				        <input class="profile-form form-control location-arrow" type="text" placeholder="Select country" id="country-top">
						<strong class="form-error-message"></strong>
				        <div class="location-drop">
				            <?php foreach ($countries as $value): ?>
								<span class="country"><?php echo $value->country_name; ?></span>
							<?php endforeach; ?>
				        </div>
					</div>	
				</div>
				<div class="search-forth-column">
					<span class="search-title">Status</span>
					<label class="switch-light switch-candy" onclick="">
						<input type="checkbox">
						<span class="switch-holder">
						<span class="left-switch">All</span>
						    <span class="right-switch">Online</span>
						    <a></a>
						</span>
					</label>			
				</div>
				<button type="button" class="search-button search-top">Search</button>
			</div>
			<button type="button" class="advanced-search-button">Advanced Search</button>
		</form>
	</div>
	<div class="advanced-search">
		<form class="search-content" action="#">
			<div class="search-form-row last-search-row">
				<div class="search-first-column">
					<span class="search-title">ID</span>
					<div class="search-id-holder">
			            <input class="search-form" type="text" placeholder="023" id="#" >
						<button type="button" class="search-id-button"></button>
					</div>
				</div>
				<div class="search-second-column">
					<span class="search-title">Age</span>
		            <div class="search-range">
		                <em class="left-range">18</em>
		               	<div class="slider-wrap">
		                	<div id="slider-age-advanced"></div>
		                </div>
		                <em class="right-range">90</em>
					</div>	
				</div>
				<div class="search-third-column">
					<span class="search-title">Country</span>
					<div class="search-country-block">
				        <input class="profile-form form-control location-arrow" type="text" placeholder="Select country" id="country">
				        <div class="location-drop">
				            <?php foreach ($countries as $value): ?>
								<span class="country"><?php echo $value->country_name; ?></span>
							<?php endforeach; ?>
				        </div>
				    </div>
				</div>
				<div class="search-forth-column">
					<span class="search-title">Status</span>
					<label class="switch-light switch-candy" onclick="">
						 <input type="checkbox">
						 <span class="switch-holder">
							 <span class="left-switch">All</span>
							 <span class="right-switch">Online</span>
							 <a></a>
						 </span>
					</label>			
				</div>
			</div>
			<div class="search-form-row">
				<div class="search-first-column">
					<span class="search-title">Name</span>
			        <input class="profile-form form-control" type="text" placeholder="Name" id="#">
				</div>
				<div class="search-second-column">
					<span class="search-title">Weight</span>
		            <div class="search-range">
		                <em class="left-range">40</em>
		               	<div class="slider-wrap">
		                	<div id="slider-weight"></div>
		                </div>
		                <em class="right-range">100</em>
					</div>	
				</div>
				<div class="search-third-column">
					<span class="search-title">City</span>
			        <input class="profile-form form-control" type="text" placeholder="City" id="#">
				</div>
				<div class="search-forth-column">
					<span class="search-title">Eyes color</span>
		                <label>
							<select id="eyes">
								<option selected></option>
							    <?php $eyes = array('Amber', 'Blue', 'Brown', 'Gray', 'Green', 'Hazel'); ?>
								<?php foreach ($eyes as $value): ?>
								<option><?php echo $value; ?></option>
								<?php endforeach; ?>
							</select>
						</label>		
				</div>
			</div>
			<div class="search-form-row">
				<div class="search-first-column">
					<span class="search-title">Children</span>
		            <label>
						<select id="children">
							<option selected>None</option>
							<?php for ($i = 1; $i <= 5; $i++): ?>
							<option><?php echo $i; ?></option>
							<?php endfor; ?>
						</select>
					</label>
				</div>
				<div class="search-second-column">
					<span class="search-title">Height</span>
		            <div class="search-range">
		                <em class="left-range">-</em>
		               	<div class="slider-wrap">
		                	<div id="slider-height"></div>
		                </div>
		                <em class="right-range">+</em>
					</div>	
				</div>
				<div class="search-third-column">
					<span class="search-title">Religion</span>
		            <label>
						<select id="religion">
							<option selected></option>
							<?php $religion = array('Christian', 'Buddhist', 'Catholik', 'Jewish', 'Muslin', 'Hindu', 'Atheist', 'Other'); ?>
							<?php foreach ($religion as $value): ?>
							<option><?php echo $value; ?></option>
							<?php endforeach; ?>
						</select>
					</label>
				</div>
				<div class="search-forth-column">
					<span class="search-title">Hair color</span>
		            <label>
						<select id="hair">
							<option selected></option>
							<?php $hair = array('Black', 'Brown', 'Blond', 'Auburn', 'Chestnut', 'Red', 'Gray and white'); ?>
							<?php foreach ($hair as $value): ?>
							<option><?php echo $value; ?></option>
							<?php endforeach; ?>
						</select>
					</label>		
				</div>
			</div>
			<button type="button" class="search-button search-bottom">Search</button>
		</form>
	</div>
	<div class="search-results"></div>
</div>
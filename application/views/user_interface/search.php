<div class="search-holder">
	<div class="search">
		<h2>Search</h2>
		<span class="sub-heading">Sub heading</span>
		<form class="search-content" action="#">
			<div class="search-first-column">
				<span class="search-title">ID</span>
				<div class="search-id-holder">
		            <input class="search-form" type="text" placeholder="023" id="#" >
					<button type="button" class="search-id-button"></button>
				</div>
			</div>
			<div class="search-age">
				<span class="search-title">Age</span>
	            <div class="search-range">
	                <em class="left-range">18</em>
	               	<div class="slider-wrap">
	                	<div id="search-age-slider"></div>
	                </div>
	                <em class="right-range">90</em>
				</div>	
			</div>
			<div class="search-country">
				<span class="search-title">Country</span>
				<div class="search-country-block">
			        <input class="profile-form form-control location-arrow" type="text" placeholder="Select country" id="country">
					<strong class="form-error-message"></strong>
			        <div class="location-drop">
			            <?php foreach ($countries as $value): ?>
							<span class="country"><?php echo $value->country_name; ?></span>
						<?php endforeach; ?>
			        </div>
				</div>	

			</div>
			<div class="search-status">
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
			<button type="button" class="view-profile-button search-top">Search</button>
		</form>
		<button type="button" class="advanced-search-button">Advanced Search</button>
	<div class="advanced-search">
		<form class="search-content" action="#">
			<div class="search-form-row">
				<div class="search-first-column">
					<span class="search-title">ID</span>
					<div class="search-id-holder">
			            <input class="search-form" type="text" placeholder="023" id="#" >
						<button type="button" class="search-id-button"></button>
					</div>
				</div>
				<div class="search-age">
					<span class="search-title">Age</span>
		            <div class="search-range">
		                <em class="left-range">18</em>
		               	<div class="slider-wrap">
		                	<div id="slider"></div>
		                </div>
		                <em class="right-range">90</em>
					</div>	
				</div>
				<div class="search-country">
					<span class="search-title">Country</span>
				        <input class="profile-form form-control location-arrow" type="text" placeholder="Select country" id="country">
						<strong class="form-error-message"></strong>
				        <div class="location-drop">
				            <?php foreach ($countries as $value): ?>
								<span class="country"><?php echo $value->country_name; ?></span>
							<?php endforeach; ?>
				        </div>
				</div>
				<div class="search-status">
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
			        <input class="profile-form form-control" type="text" placeholder="Name" id="country">
				</div>
				<div class="search-age">
					<span class="search-title">Weight</span>
		            <div class="search-range">
		                <em class="left-range">18</em>
		               	<div class="slider-wrap">
		                	<div id="slider"></div>
		                </div>
		                <em class="right-range">90</em>
					</div>	
				</div>
				<div class="search-country">
					<span class="search-title">City</span>
				        <input class="profile-form form-control location-arrow" type="text" placeholder="Select country" id="country">
						<strong class="form-error-message"></strong>
				        <div class="location-drop">
				            <?php foreach ($countries as $value): ?>
								<span class="country"><?php echo $value->country_name; ?></span>
							<?php endforeach; ?>
				        </div>
				</div>
				<div class="search-status">
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
		</form>
	</div>
	</div>
	<div class="search-results"></div>
</div>
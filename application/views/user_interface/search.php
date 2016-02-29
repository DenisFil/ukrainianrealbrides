<div class="search-holder">
    <h2>Search</h2>
    <span class="sub-heading">Sub heading</span>
    <div class="search">
        <form action="#">
            <div class="search-form-row">
                <div class="search-first-column">
                    <span class="search-title">ID</span>
                    <div class="search-id-holder">
                        <input class="search-form" type="text" placeholder="023" id="id-top">
                        <button type="button" data-tooltip="Write here partners ID" class="search-id-button"></button>
                    </div>
                </div>
                <div class="search-second-column">
                    <span class="search-title">Age</span>
                    <div class="search-range both-holder">
                        <em class="left-range">18</em>
                        <div class="slider-wrap">
                            <div id="slider-age"></div>
                        </div>
                        <em class="right-range">90</em>
                    </div>
                </div>
                <div class="search-third-column">
                    <span class="search-title">Country</span>
                    <div class="search-location-block">
                        <?php if ($gender == 0 || $gender == 1): ?>
                            <input class="profile-form form-control location-arrow" type="text"
                                   placeholder="Select country" id="country-top" value="Ukraine" disabled>
                        <?php else: ?>
                            <input class="profile-form form-control location-arrow" type="text"
                                   placeholder="Select country" id="country-top" style="cursor: pointer;">
                        <?php endif; ?>
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
						<span class="switch-holder" id="switch-holder-top">
						<span class="left-switch">All</span>
						    <span class="right-switch active">Online</span>
						    <a></a>
						</span>
                    </label>
                </div>
                <button type="button" class="search-button search-top" id="search-top">Search</button>
            </div>
            <button type="button" class="advanced-search-button" style="margin-bottom: 50px; ">Advanced Search</button>
        </form>
    </div>
    <div class="advanced-search" style="display: none; ">
        <form class="search-content" action="#">
            <div class="search-form-row last-search-row">
                <div class="search-first-column">
                    <span class="search-title">ID</span>
                    <div class="search-id-holder">
                        <input class="form-control" type="text" placeholder="023" id="id-bottom">
                        <button type="button" data-tooltip="Write here partners ID" class="search-id-button"></button>
                    </div>
                </div>
                <div class="search-second-column">
                    <span class="search-title">Age</span>
                    <div class="search-range both-holder">
                        <em class="left-range">18</em>
                        <div class="slider-wrap">
                            <div id="slider-age-advanced"></div>
                        </div>
                        <em class="right-range">90</em>
                    </div>
                </div>
                <div class="search-third-column">
                    <span class="search-title">Country</span>
                    <div class="search-location-block">
                        <?php if ($gender == 0 || $gender == 1): ?>
                            <input class="profile-form form-control location-arrow" type="text"
                                   placeholder="Select country" id="country-bottom" value="Ukraine" disabled>
                        <?php else: ?>
                            <input class="profile-form form-control location-arrow" type="text"
                                   placeholder="Select country" id="country-bottom" style="cursor: pointer;">
                        <?php endif; ?>
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
						 <span class="switch-holder" id="switch-holder-bottom">
							 <span class="left-switch">All</span>
							 <span class="right-switch active">Online</span>
							 <a></a>
						 </span>
                    </label>
                </div>
            </div>
            <div class="search-form-row">
                <div class="search-first-column">
                    <span class="search-title">Name</span>
                    <input class="profile-form form-control" type="text" placeholder="Name" id="name-bottom">
                </div>
                <div class="search-second-column">
                    <span class="search-title">Weight</span>
                    <div class="search-range both-holder">
                        <em class="left-range">40</em>
                        <div class="slider-wrap">
                            <div id="slider-weight"></div>
                        </div>
                        <em class="right-range">130</em>
                    </div>
                </div>
                <div class="search-third-column">
                    <span class="search-title">City</span>
                    <div class="search-location-block">
                        <input class="profile-form form-control location-arrow" type="text" placeholder="Select city" id="city" disabled>
                        <div class="location-drop">

                        </div>
                    </div>
                </div>
                <div class="search-forth-column">
                    <span class="search-title">Eyes color</span>
                    <label>
                        <select id="eyes" class="form-control">
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
                    <div class="search-range both-holder">
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
            <button type="button" class="search-button search-bottom" id="search-bottom">Search</button>
        </form>
    </div>
    <div class="search-results"></div>
</div>
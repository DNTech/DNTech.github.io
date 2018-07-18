		<div class='w3-container w3-teal'>
			<br/><br/>
			<div class="w3-row">
				<div class="w3-col l2 m2">
					<br/>
				</div>
				<div class="w3-col l8 m8 w3-opacity-min">
					<button class='w3-button w3-white w3-round-small font-2 w3-right w3-text-teal w3-small'>
						Subscribe Now
					</button>
					<input type="text" class="w3-input w3-teal font-2 w3-right w3-margin-right w3-border w3-small w3-round-small" placeholder="Enter Your Email" style="max-width:300px"/>
					<span class='font-2 w3-small w3-opacity-min'>
						<big>
							Sign Up<br/>
							for Our Newsletter
						</big>
					</span>
					<br/>
					<br/>
					<div class='w3-bar'>
			<?php
				$social = array(
					"youtube" => "https://youtube.com/richnet",
					"twitter" => "https://twitter.com/richnet",
					"google-plus" => "https://plus.google.com/richnet",
					"linkedin" => "https://linkedin.com/richnet",
					"facebook" => "https://facebook.com/richnet",
				);
				foreach( $social as $icon=>$url ){
					echo("
						<a href='$url' class='w3-bar-item w3-right w3-button w3-hover-teal w3-hover-text-red w3-xlarge'>
							<i class='fa fa-$icon'></i>
						</a>
					");
				}
			?>
					</div>
					<br/>
					<div class="w3-row">
						<div class='w3-col l4 m4 font-2 w3-small'>
							<br/>
							<big>
							<span class='w3-text-white w3-block'>
								Address:
							</span>
							<span class='w3-text-white w3-opacity w3-block '>
								5th Floor, Sana Complex,<br/>
								Sakchi, Jamshedpur - 831001 
							</span>
							<br/>
							<span class='w3-text-white w3-block'>
								Tel:<span class='w3-opacity'> 91 7254 9922 86</span>
							</span>
							<span class='w3-text-white w3-block'>
								Email: <span class='w3-opacity'>contact.richnet@gmail.com</span>
							</span>
							<span class='w3-text-white w3-block'>
								Web: <span class='w3-opacity'> www.richnet.in</span>
							</span>
							</big>
						</div>
						<div class='w3-col l2 m2 w3-small font-2'>
							<br/>
							<big>
								<span class='w3-text-white w3-block'>
									Quick Links:
								</span>
					<?php
						$quick = array(
							"Courses" => "courses.php",
							"Faculties" => "faculties.php",
							"Apply Now" => "apply_now.php",
							"Visit Us" => "visit_us.php",
							"Gallery" => "gallery.php",
							"News Portal" => "news.php"
						);
						foreach( $quick as $name=>$url ){
							echo("
								<a href='$url' class='w3-opacity w3-small w3-text-none w3-block w3-hover-text-black'>
									$name	
								</a>
							");
						}
					?>
							</big>
						</div>
						<div class='w3-col l6 m6'>
							<img src="img/map_png.png" class='w3-block' />
						</div>
					</div>
					<hr class='w3-border-white  w3-opacity-min' />
					<div class='w3-bar w3-opacity-min w3-small'>
						<a class='w3-bar-item w3-button w3-teal font-2'>
							<i class="fa fa-group"></i> Team
						</a>
						<a class='w3-bar-item w3-button w3-teal font-2'>
							<i class="fa fa-barn"></i> Join Us
						</a>
						<a class='w3-bar-item w3-button w3-teal font-2'>
							<i class="fa fa-send"></i> Invite Us
						</a>
						<span class='w3-bar-item w3-right font-2 '>
							COPYRIGHT 2018 <i class='fa fa-copyright'></i> RICHNET ALL RIGHTS RESERVED
						</span>
					</div>
				</div>
			</div>
			<br/><br/>
		</div>



<html>  
	<head>
		<title>Richnet | A Complete web & Network Solution</title>
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<meta name="keyword" content="Richnet,Web, Network, Android,Website, Intership">
		<link href="https://fonts.googleapis.com/css?family=Open+Sans+Condensed:300" rel="stylesheet">
		<link href="https://fonts.googleapis.com/css?family=Changa" rel="stylesheet">
		<link href="/css/w3.css" rel="stylesheet" />
		<link href="/fa/css/fa.css" rel="stylesheet" />
		<link href="/css/style.css" rel="stylesheet" />
	<body>
		
		<div class="w3-container w3-white" id="topbar">
		
			<div class="w3-row">
				<div class="w3-col l1 m1 w3-hide-small">
					&nbsp;
				</div>
				<div class="w3-col l10 m10">
					<div class="w3-bar w3-text-teal font-1">
						<span class="w3-bar-item w3-border-right w3-hide-small">
							<i class="fa fa-phone"></i> 
							91-7091-272-082
						</span>
						<span class="w3-bar-item w3-hide-small">
							<i class="fa fa-envelope"></i> 
							danish@richnet.in
						</span>
						<a href="/student/" class="w3-bar-item w3-button w3-hover-white w3-right">
							<i class="fa fa-sign-in"></i> 
							Login
						</a>
						<a href="" class="w3-bar-item w3-button w3-hover-white w3-right w3-border-right">
							<i class="fa fa-user"></i> 
							Register
						</a>
					</div>
				</div>
			</div>
		</div>
		

		<div class="w3-container w3-teal">
			<div class="w3-row">
				<div class="w3-col l1 m1 w3-hide-small">&nbsp;</div>
				<div class="w3-col l10 m10">
					<div class="w3-bar w3-padding-large w3-text-bold font-1">
						<a href="index_new.php" class="w3-bar-item w3-button w3-hover-teal w3-padding-small w3-xlarge w3-wide font-2">
							<i class="fa fa-graduation-cap"></i> RICHNET
						</a>
						<button class="w3-bar-item w3-button w3-white w3-hide-large w3-hide-medium w3-text-teal w3-right w3-large w3-hover-teal " dn-toggle="collapse" dn-target="#menu">
							<i class="fa fa-align-right"></i>
						</button>
					<div class="dn-hide-small w3-mobile" id="menu">
						<span class='w3-bar-item w3-show-small w3-mobile w3-padding-small'></span>
						<form id="search" class="w3-bar-item w3-mobile w3-right w3-padding-small w3-small">
							<input type="search" placeholder="Search" id="input" class="w3-input w3-text-white w3-teal font-2">
						</form>
			<?php
				$navs = array( 
					"CONTACT" => "/contact.php",
					"ABOUT" => "/about.php",
					"GALLERY" => "/gallery.php",
					"FACULTY" => "/faculty.php",
					"COURSES" => "/courses.php",
					"HOME" => "/index.php",
				);
				$PAGE = isset($PAGE) ? $PAGE : "index.php";
				foreach( $navs as $k=>$v ){
					$c = $PAGE==$v ? "w3-border" : "";
					echo("
						<a href='$v' class='w3-bar-item w3-right w3-button w3-mobile $c'>
							$k
						</a>
					");
				}
			?>
					</div>
					</div>
				</div>
				<div class="w3-col l1 m1 w3-hide-small">&nbsp;</div>
			</div>
		</div>
<div class="icon-bar">
				<a href="www.facebook.com/richnet" class="w3-facebook w3-button w3-hover-black"><i class="fa fa-facebook"></i></a>
				<a href="www.linkedin.com/richnet" class="w3-linkedin w3-button w3-hover-black"><i class="fa fa-linkedin"></i></a>
				<a href="www.plus.google.com/richnet" class="w3-google w3-button-black"><i class="fa fa-google-plus"></i></a>
				<a href="www.twitter.com/richnet" class="w3-twitter w3-buton w3-hover-black"><i class="fa fa-twitter"></i></a>
				<a href="www.youtube.com/richnet" class="w3-youtube w3-button w3-hover-black"><i class="fa fa-youtube"></i></a>	
		</div>		

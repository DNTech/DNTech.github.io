		<link href="/css/w3.css" rel="stylesheet" />
		<link href="/fa/css/fa.css" rel="stylesheet" />
		<link href="https://fonts.googleapis.com/css?family=Oswald" rel="stylesheet">
		<link href="https://fonts.googleapis.com/css?family=Dosis" rel="stylesheet">
		<link href="https://fonts.googleapis.com/css?family=Ubuntu" rel="stylesheet">
		<style>
			body{ font-family: 'Ubuntu', sans-serif; }
			.font-2{ font-family: 'Dosis', sans-serif; }
			button,a{ transition:all 0.15s ease; }
	</style>
	</head>
	<body class="w3-black">
		<div class="w3-sidebar w3-card font-2 w3-black w3-rightbar w3-border-red" id="drawerMenu" style="margin-left:-300px">
			<div class="w3-bar-block w3-large">
				<button class="w3-bar-item w3-black w3-hover-red w3-border-bottom w3-border-gray" jq-dismiss="drawer" jq-target="#drawerMenu">
					<i class="fa fa-arrow-circle-left fa-fw"></i> CLOSE
				</button>
				<a href="/index.php" class="w3-bar-item w3-button w3-border-gray w3-hover-red">
					<i class="fa fa-home fa-fw"></i> Home
				</a>
				<a href="/student/" class="w3-bar-item w3-button w3-border-gray w3-hover-red">
					<i class="fa fa-th-large fa-fw"></i> Dashboard
				</a>
				<a href="/student/account.php" class="w3-bar-item w3-button w3-border-gray w3-hover-red">
					<i class="fa fa-user fa-fw"></i> Account
				</a>
				<a href="/student/courses.php" class="w3-bar-item w3-button w3-border-gray w3-hover-red">
					<i class="fa fa-book fa-fw"></i> Courses
				</a>
				<a href="/student/assignment.php" class="w3-bar-item w3-button w3-border-gray w3-hover-red">
					<i class="fa fa-stack-overflow fa-fw"></i> Assignments
				</a>
				<a href="/student/logout.php" class="w3-bar-item w3-button w3-border-gray w3-hover-red">
					<i class="fa fa-sign-out fa-fw"></i> Logout
				</a>
			</div>
		</div>

		<div class="w3-bar w3-padding w3-white w3-bottombar w3-border-red w3-black w3-card w3-card">
			<button class="w3-bar-item w3-button w3-hover-red w3-wide" jq-toggle="drawer" jq-target="#drawerMenu">
				<i class=" fa fa-align-left"></i> MENU
			</button>
			<span class="w3-bar-item w3-right w3-wide w3-text-bold">
				RICHNET SOLUTIONS
			</span>
		</div>


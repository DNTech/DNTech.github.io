<?php

	session_start();

//include CONNECTION FILE
	$ROOT = $_SERVER["DOCUMENT_ROOT"];
	require_once( "$ROOT/includes/connect.php" );

//CHECK WHETHER USER ALREADY LOGGED IN
	if( isset($_SESSION["LOGIN_STATUS"]) ){
		if( $_SESSION["LOGIN_TYPE"]=="ADMIN" )
			header("location:/admin/");
		else if( $_SESSION["LOGIN_TYPE"]=="STUDENT" )
			header("location:/student/");
		else
			header("location:/");
	}

//CHECK WHETHER LOGIN FORM HAS BEEN SUBMITTED
	if( isset($_POST["adminLoginForm"]) ){
		$email = addslashes($_POST["adminEmail"]);
		$pass = addslashes($_POST["adminPassword"]);
		$query = "SELECT * FROM admin WHERE admin_email='$email'";
		$res = mysqli_query( $con, $query );
		if( mysqli_num_rows($res)==0 ){
			$ERROR_LOGIN = true;
			$ERROR_MSG = "Invalid Email ID";
		}else{
			$row = mysqli_fetch_object($res);
			if( $row->admin_password==$pass ){
				$_SESSION["LOGIN_STATUS"]="TRUE";
				$_SESSION["LOGIN_TYPE"]="ADMIN";
				$_SESSION["LOGIN_ADMIN_ID"]=$row->admin_id;
				header("location:/admin/");
			}else{
				$ERROR_LOGIN = true;
				$ERROR_MSG = "You entered a wrong password";
			}
		}
	}

	if( !isset($_GET["dn_key"]) ){
		header( "location:/" );
		exit();
	}else if( $_GET["dn_key"] != "C80b905b65fc" ){
		header( "location:/" );
		exit();
	}


?>
<html>
	<head>
		<title>Richnet | A Complete web & Network Solution</title>
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<meta name="keyword" content="Richnet,Web, Network, Android,Website, Intership">


<?php
	include( "$ROOT/includes/header.php" );
?>
		<div class="w3-container w3-center w3-black w3-bottombar w3-border-red w3-padding">
			<font class="w3-wide w3-xlarge w3-text-bold w3-animate-zoom w3-block">
				Admin login
			</font>
		</div>
		<br/>
		<div class="w3-container">
			<div class="w3-row">
				<div class="w3-col l4 m4">
					<br/>
				</div>
				<div class="w3-col l4 m4">
					<div class="w3-padding">
						<form action="/admin/login.php?dn_key=C80b905b65fc" method="POST">
							<label for="adminRoll" class="w3-text-bold">
								Email ID
							</label>
							<input name="adminEmail" type="text" class="w3-input " placeholder="Enter Your Email" required /><br/>
							<label for="adminPassword" class="w3-text-bold">
								Password
							</label>
							<input name="adminPassword" type="password" class="w3-input " placeholder="Enter Password" required /><br/>
				<?php
					if( isset($ERROR_LOGIN) )
						echo("
							<div class='w3-padding-small w3-small w3-yellow w3-alert w3-margin-bottom w3-round-small'>
								$ERROR_MSG
							</div>
						");
				?>
							<button type="submit" class="w3-button w3-round-small w3-red w3-text-bold" name="adminLoginForm">
								L O G I N &nbsp; <i class="fa fa-lock"></i>
							</button>
						</form>
					</div>
				</div>
			</div>
		</div>


<br/>
<br/>


<?php
	include( "$ROOT/includes/footer.php" );
?>

	<script src="/js/jq.js"></script>
	<script>
		
	</script>

	</body>
	
</html>

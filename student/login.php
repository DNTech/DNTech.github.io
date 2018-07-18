<?php
	session_start();

//include CONNECTION FILE
	$ROOT = $_SERVER["DOCUMENT_ROOT"];
	require_once( "$ROOT/includes/connect.php" );

//CHECK WHETHER USER ALREADY LOGGED IN
	if( isset($_SESSION["LOGIN_STATUS"]) ){
		if( $_SESSION["LOGIN_TYPE"]=="STUDENT" )
			header("location:/student/");
		else
			header("location:/");
	}

//CHECK WHETHER LOGIN FORM HAS BEEN SUBMITTED
	if( isset($_POST["studentLoginForm"]) ){
		$roll = addslashes($_POST["studentRoll"]);
		$pass = addslashes($_POST["studentPassword"]);
		$query = "SELECT * FROM student WHERE s_roll='$roll'";
		$res = mysqli_query( $con, $query );
		if( mysqli_num_rows($res)==0 ){
			$ERROR_LOGIN = true;
			$ERROR_MSG = "Invalid Roll Number";
		}else{
			$row = mysqli_fetch_object($res);
			if( $row->s_password==$pass ){
				$_SESSION["LOGIN_STATUS"]="TRUE";
				$_SESSION["LOGIN_TYPE"]="STUDENT";
				$_SESSION["LOGIN_STUDENT_ID"]=$row->s_id;
				header("location:/student/");
			}else{
				$ERROR_LOGIN = true;
				$ERROR_MSG = "Wrong Password";
			}
		}
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
				Student login
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
						<form action="/student/login.php" method="POST">
							<label for="studentRoll" class="w3-text-bold">
								Roll Number
							</label>
							<input name="studentRoll" type="text" class="w3-input " placeholder="Enter Your Roll Number" required /><br/>
							<label for="studentPassword" class="w3-text-bold">
								Password
							</label>
							<input name="studentPassword" type="password" class="w3-input " placeholder="Enter Password" required /><br/>
				<?php
					if( $ERROR_LOGIN )
						echo("
							<div class='w3-padding-small w3-small w3-red'>
								$ERROR_MSG
							</div>
						");
				?>
							<button type="submit" class="w3-button w3-round-small w3-red w3-text-bold" name="studentLoginForm">
								L O G I N &nbsp; <i class="fa fa-lock"></i>
							</button>
							<a class="w3-button w3-right w3-text-bold w3-hover-black w3-hover-text-green" href="/student/signup.php">
								Join Richnet ?
							</a>
						</form>
					</div>
				</div>
			</div>
		</div>


<br/>
<br/>


<!--footer-->
	<footer class="w3-container w3-padding-32 w3-light-grey w3-center w3-bottombar w3-border-red">
	  
	  <div class="w3-xlarge w3-section">
      	<i class="fa fa-facebook-official w3-text-blue w3-hover-opacity w3-xxlarge"></i>
        <i class="fa fa-instagram w3-text-red w3-hover-opacity w3-xxlarge"></i>
        <i class="fa fa-twitter w3-text-light-blue w3-hover-opacity w3-xxlarge"></i>
        <i class="fa fa-linkedin w3-hover-opacity w3-xxlarge"></i>
   	 </div>
	 <p><b class="w3-ceter w3-wide w3-text-black">Made With </b><i class=" fa fa-heart w3-text-red "></i></p>
	</footer>


	<script src="/js/jq.js"></script>
	<script>
		
	</script>

	</body>
	
</html>

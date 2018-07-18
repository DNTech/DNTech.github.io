<?php
	session_start();

//include CONNECTION FILE
	$ROOT = $_SERVER["DOCUMENT_ROOT"];
	require_once( "$ROOT/includes/connect.php" );

//CHECK WHETHER USER ALREADY LOGGED IN
	require_once( "$ROOT/includes/verifyStudent.php" );

//FETCH LOGGED IN STUDENT DETAILS
	$s_id = $_SESSION["LOGIN_STUDENT_ID"];
	$query = "SELECT student.*, course_master.course_name FROM student, course_master WHERE student.s_id='$s_id' AND course_master.course_master_id=student.s_course_id";
	$res = mysqli_query( $con, $query );
	$STUDENT = mysqli_fetch_object($res);

?>
<html>
	<head>
		<title>Richnet | A Complete web & Network Solution</title>
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<meta name="keyword" content="Richnet,Web, Network, Android,Website, Intership">


<?php
	include( "$ROOT/includes/headerStudent.php" );
?>
<div class="w3-container w3-white">
	<b class="w3-padding w3-block w3-xlarge w3-center">
		My Queries
	</b>
	<br/>
	<div class="w3-row">
		<div class="w3-col l2 m2">
			<br/>
		</div>
		<div class="w3-col l8 m8">
			<div class="w3-padding w3-border w3-border-red w3-large w3-wide w3-center w3-text-bold w3-red">
				Under Development
			</div>
		</div>
	</div>
	<br/><br/>
	<br/><br/>

	<br/><br/>
</div>

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

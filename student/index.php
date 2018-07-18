<?php
	session_start();

//include CONNECTION FILE
	$ROOT = $_SERVER["DOCUMENT_ROOT"];
	require_once( "$ROOT/includes/connect.php" );

//CHECK WHETHER USER LOGGED IN
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
	<div class="w3-bar w3-wide w3-large w3-pale-blue w3-text-bold w3-border-bottom">
		<span class="w3-bar-item">
			DASHBOARD
		</span>
		<span class="w3-bar-item w3-right">
		<?php
			echo( strtoupper($STUDENT->s_name) );
		?>
		<i class="fa fa-user"></i>
		</span>
	</div>
<div class="w3-container w3-white">
	<br/>
	<div class="w3-row">
		<div class="w3-col l3 m3">
			<br/>
		</div>
		<div class="w3-col l2 m2">
			<img src="/img/userIcon.png" class="w3-block" />
		</div>
		<div class="w3-col l4 m4">
			<div class="w3-padding-small">
			<table class="w3-table w3-table-form w3-text-gray">
				<tr>
					<td>
						<label>Name</label>
					</td>
					<td>
						<label><?php echo($STUDENT->s_name); ?></label>
					</td>
				</tr>
				<tr>
					<td>
						<label>Course</label>
					</td>
					<td>
						<label><?php echo($STUDENT->course_name); ?></label>
					</td>
				</tr>
				<tr>
					<td>
						<label>Roll</label>
					</td>
					<td>
						<label><?php echo($STUDENT->s_roll); ?></label>
					</td>
				</tr>
				<tr>
					<td>
						<label>Status</label>
					</td>
					<td>
						<label><?php echo($STUDENT->s_status); ?></label>
					</td>
				</tr>
			</table>
			</div>
		</div>
	</div>
	<br/><br/>
</div>
<div class="w3-light-gray w3-border-top w3-border-bottom">
	<br/><br/>

	<div class="w3-row w3-text-bold">
		<div class="w3-col l2 m2">
			<br/>
		</div>
		<div class="w3-col l2 m2 w3-center">
			<a href="account.php" class="w3-text-none">
				<div class="w3-padding w3-hover-red w3-round">
					<i class="fa fa-user w3-jumbo w3-block"></i>
					MY ACCOUNT
				</div>
			</a>
		</div>
		<div class="w3-col l2 m2 w3-center">
			<a href="courses.php" class="w3-text-none">
				<div class="w3-padding w3-hover-red w3-round">
					<i class="fa fa-book w3-jumbo w3-block"></i>
					MY COURSES
				</div>
			</a>
		</div>
		<div class="w3-col l2 m2 w3-center">
			<a href="assignment.php" class="w3-text-none">
				<div class="w3-padding w3-hover-red w3-round">
					<i class="fa fa-user w3-jumbo w3-block"></i>
					ASSIGNMENTS
				</div>
			</a>
		</div>
		<div class="w3-col l2 m2 w3-center">
			<a href="queries.php" class="w3-text-none">
				<div class="w3-padding w3-hover-red w3-round">
					<i class="fa fa-question-circle w3-jumbo w3-block"></i>
					QUERIES
				</div>
			</a>
		</div>
	</div>

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

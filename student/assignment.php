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
//FETCH ALL ASSIGNMENT DETAILS OF THE CURRENT STUDENT COURSE
	$query_as = "SELECT assignment.*, topic_master.topic_name FROM assignment, topic_master WHERE assignment.as_course_id='$STUDENT->s_course_id' AND topic_master.topic_master_id=assignment.as_topic_id";
	$ASSG = mysqli_query( $con, $query_as );

?>
<html>
	<head>
		<title>Richnet | A Complete web & Network Solution</title>
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<meta name="keyword" content="Richnet,Web, Network, Android,Website, Intership">


<?php
	include( "$ROOT/includes/headerStudent.php" );
?>	<div class="w3-bar w3-wide w3-large w3-pale-blue w3-text-bold w3-border-bottom">
		<span class="w3-bar-item">
			ASSIGNMENTS
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
		<div class="w3-col l2 m2">
			<br/>
		</div>
		<div class="w3-col l8 m8">
			<div class="w3-padding-small">
				<table class="w3-table w3-table-fom w3-small w3-border w3-border-green" >
					<tr class="w3-green w3-medium w3-text-bold">
						<td>
							<label>id.</label>
						</td>
						<td>
							<label>Name</label>
						</td>
						<td>
							<label>Questions</label>
						</td>
						<td>
							<label>Topic</label>
						</td>
						<td>
							<label>Action</label>
						</td>
					</tr>
	<?php
		if(mysqli_num_rows($ASSG)==0)
			echo( "
				<tr>
					<td colspan='5'>
						<label>No Assignment Available</label>
					</td>
				</tr>
			" );
		else
			while( $ASSG_ROW = mysqli_fetch_object($ASSG) )
				echo("
					<tr class='w3-text-black w3-hover-green'>
						<td>
							<label>$ASSG_ROW->as_id</label>
						</td>
						<td>
							<label>$ASSG_ROW->as_name</label>
						</td>
						<td>
							<label>$ASSG_ROW->as_questions Questions</label>
						</td>
						<td>
							<label>$ASSG_ROW->topic_name</label>
						</td>
						<td>
							<a href='$ASSG_ROW->as_file' download='$ASSG_ROW->as_name.pdf' class='w3-text-none w3-hover-text-blue' target='_blank'>
								download <i class='fa fa-download'></i>
							</a>
						</td>
					</tr>
				");
	?>
				</table>
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

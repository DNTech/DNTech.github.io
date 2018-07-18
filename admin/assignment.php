<?php
	session_start();

//include CONNECTION FILE
	$ROOT = $_SERVER["DOCUMENT_ROOT"];
	require_once( "$ROOT/includes/connect.php" );

//CHECK WHETHER USER LOGGED IN
	require_once( "$ROOT/includes/verifyAdmin.php" );

//FETCH LOGGED IN STUDENT DETAILS
	$a_id = $_SESSION["LOGIN_ADMIN_ID"];
	$query = "SELECT admin.* FROM admin WHERE admin.admin_id='$a_id'";
	$res = mysqli_query( $con, $query );
	$ADMIN = mysqli_fetch_object($res);

//UPLOAD ASSIGNMENT SCRIPT
	if( isset($_POST["addAssignmentForm"]) ){
		$as_name = addslashes($_POST["assignmentName"]);
		$as_questions = addslashes($_POST["assignmentQuestions"]);
		$as_course = addslashes($_POST["assignmentCourse"]);
		$as_topic = addslashes($_POST["assignmentTopic"]);
		$as_file_tmp = $_FILES["assignmentFile"]["tmp_name"];
		$as_file = GET_UNIQUE_ID();
		$as_file = "$as_file.pdf";
		copy( $as_file_tmp, "$ROOT/student/assignment/pdf/$as_file" );
		$query = "INSERT INTO assignment( `as_name`, `as_questions`, `as_course_id`, `as_topic_id`, `as_file` ) values( '$as_name', '$as_questions', '$as_course', '$as_topic', '$as_file' )";
		if( mysqli_query( $con, $query ) ){
			$MSG = "Assignment Added Successfully";
		}else{
			$ERROR = "Error : Cannot add assignment";
		}
	}

//DELETE ASSIGNMENT REQUEST
	if( isset($_POST["deleteAssignment"]) ){
		$as_id = $_POST["as_id"];
		$query = "DELETE FROM assignment WHERE as_id='$as_id'";
		if( mysqli_query($con, $query) ){
			exit( "SUCCESS" );
		}else{
			exit( "ERROR_QUERY" );
		}
	}

//FETCH ALL ASSIGNMENT DETAILS OF THE CURRENT STUDENT COURSE
	$query_as = "SELECT assignment.*, course_master.course_name, topic_master.topic_name FROM assignment, course_master, topic_master WHERE course_master.course_master_id=assignment.as_course_id AND topic_master.topic_master_id=assignment.as_topic_id";
	$ASSG = mysqli_query( $con, $query_as );

?>
<html>
	<head>
		<title>Richnet | A Complete web & Network Solution</title>
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<meta name="keyword" content="Richnet,Web, Network, Android,Website, Intership">


<?php
	include( "$ROOT/includes/headerAdmin.php" );
?>
	<div class="w3-bar w3-wide w3-large w3-pale-blue w3-text-bold w3-border-bottom">
		<span class="w3-bar-item">
			ASSIGNMENTS
		</span>
		<span class="w3-bar-item w3-right">
		<?php
			echo( strtoupper($ADMIN->admin_name) );
		?>
		<i class="fa fa-user"></i>
		</span>
	</div>
<div class="w3-container w3-white">
	<br/>
	<div class="w3-row">
		<div class="w3-col l4 m4">
			<div class="w3-padding-small">
				<form action="/admin/assignment.php" method="POST" enctype="multipart/form-data">
				<div class="w3-padding-large w3-pale-red w3-border ">
					<label class="w3-text-black w3-text-bold w3-border-bottom w3-padding w3-block">Add Assignment</label>
					<br/>
		<?php
			if( isset($MSG) )
				echo("
					<div class='w3-padding-small w3-small w3-yellow w3-margin-bottom'>
					$MSG
					</div>
				");
			else if(isset($ERROR))
				echo("
					<div class='w3-padding-small w3-small w3-yellow w3-margin-bottom'>
					$ERROR
					</div>
				");
				
		?>
						
					<label> Name</label>
					<input type="text" name="assignmentName" placeholder="Enter Assignment Name" required class='w3-input w3-border w3-small' />
					<br/>
					<label> Questions</label>
					<input type="number" name="assignmentQuestions" placeholder="Number of Questions" required class='w3-input w3-border w3-small' />
					<br/>
					<label> Course</label>
					<select class="w3-select w3-white w3-border w3-small w3-block" name="assignmentCourse" required >
						<option value="" selected disabled>Select Course</option>
			<?php
				$query = "SELECT * FROM course_master";
				$res = mysqli_query( $con, $query );
				while( $row = mysqli_fetch_object($res) ){
					echo("
						<option value='$row->course_master_id'>
							$row->course_name
						</option>
					");
				}
			?>
					</select>
					<br/>
					<label> Topic</label>
					<select class="w3-select w3-white w3-border w3-small w3-block" name="assignmentTopic" required >
						<option value="" selected disabled>Select Topic</option>
			<?php
				$query = "SELECT * FROM topic_master";
				$res = mysqli_query( $con, $query );
				while( $row = mysqli_fetch_object($res) ){
					echo("
						<option value='$row->topic_master_id' course_id='$row->topic_course_id'>
							$row->topic_name
						</option>
					");
				}
			?>
					</select>
					<br/>
					<label> File</label>
					<input type="file" name="assignmentFile" placeholder="Upload Assignment File" required class='w3-input w3-border w3-small w3-white' />
					<br/>
					<button type="submit" class="w3-button w3-round-small w3-red w3-small w3-text-bold" name="addAssignmentForm">
						ADD ASSIGNMENT <i class="fa fa-upload"></i>
					</button>
				</div>
				</form>
			</div>
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
							<label>Course</label>
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
						<label>No Assignment Uploaded Yet</label>
					</td>
				</tr>
			" );
		else
			while( $ASSG_ROW = mysqli_fetch_object($ASSG) ){
				$ASSG_JSON = addslashes(json_encode($ASSG_ROW));
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
							<label>$ASSG_ROW->course_name</label>
						</td>
						<td>
							<label>$ASSG_ROW->topic_name</label>
						</td>
						<td>
							<a href='/student/assignment/pdf/$ASSG_ROW->as_file' download='$ASSG_ROW->as_name.pdf' class='w3-button w3-padding-small w3-pale-blue w3-round'>
								view <i class='fa fa-download'></i>
							</a> &nbsp;
							<button class='w3-button w3-padding-small w3-round w3-pale-red ASSG_ROW' data-row='$ASSG_JSON'>
								edit <i class='fa fa-edit'></i>
							</button>
						</td>
					</tr>
				");
			}
	?>
				</table>
			</div>
		</div>
	</div>
	<br/><br/>
	<br/><br/>
	<br/><br/>
</div>

<?php
	include("$ROOT/includes/footer.php");
?>

<!-- MODALS -->
	<div class="w3-modal " id="UPDATE_ASSG_MODAL">
		<div class="w3-modal-content w3-round w3-border w3-card-4 w3-white mx-300">
			<div class="w3-bar w3-green w3-large">
				<span class="w3-bar-item">
					UPDATE ASSIGNMENT
				</span>
				<button class="w3-bar-item w3-right w3-button w3-hover-green w3-hover-text-blue" dn-dismiss="modal">
					&times;
				</button>
			</div>
			<form action="/admin/assignment.php" method="POST" enctype="multipart/form-data" id="updateAssgForm" style="margin:0px;padding:0px">
			<div class="w3-padding w3-small w3-pale-red">
				<label>ASSG Name</label>
				<input type="text" class="w3-input w3-small w3-border columns" colname="as_name" placeholder="Enter ASSG Name" required/>
				<br/>
				<label>ASSG Questions</label>
				<input type="text" class="w3-input w3-small w3-border columns" colname="as_questions" placeholder="Enter ASSG Name" required/>
				<br/>
				<label>ASSG Course</label>
				<select class="w3-select w3-white w3-border w3-small w3-block columns" colname="as_course_id" name="assignmentCourse" required >
					<option value="" selected disabled>Select Course</option>
		<?php
			$query = "SELECT * FROM course_master";
			$res = mysqli_query( $con, $query );
			while( $row = mysqli_fetch_object($res) ){
				echo("
					<option value='$row->course_master_id'>
						$row->course_name
					</option>
				");
			}
		?>
				</select>
				<br/>
				<label>ASSG Topic</label>
				<select class="w3-select w3-white w3-border w3-small w3-block columns" colname="as_topic_id" name="assignmentTopic" required >
					<option value="" selected disabled>Select Topic</option>
		<?php
			$query = "SELECT * FROM topic_master";
			$res = mysqli_query( $con, $query );
			while( $row = mysqli_fetch_object($res) ){
				echo("
					<option value='$row->topic_master_id' course_id='$row->topic_course_id'>
						$row->topic_name
					</option>
				");
			}
		?>
				</select>
				<br/>
				<label>ASSG File</label>
				<input type="file" class="w3-input w3-white w3-small w3-border" placeholder="Upload Assignment File"/>
				<input type="hidden" id="ASSG_UPDATE_ID" class="columns" colname="as_id"/>
				<br/>
			</div>
			<div class="w3-bar w3-padding w3-pale-red">
				<button class="w3-button w3-round w3-red w3-small" id="DELETE_ASSG_BTN">
					&nbsp;<i class="fa fa-trash"></i>&nbsp;
				</button>
				<button type="submit" class="w3-button w3-round w3-small w3-green w3-right w3-text-bold w3-wide" name="updateAssgForm">
					UPDATE <i class="fa fa-send"></i>
				</button>
			</div>
			</form>
		</div>
	</div>


	<script src="/js/jquery.js"></script>
	<script>
	//EVENT FOR UPDATE ASSIGNMENT MODAL LAUNCH
		$(document).on( "click", ".ASSG_ROW", function(){
			var data = $(this).attr( "data-row" ).replace(/\\/g, "");
			data = JSON.parse( data );
			$("#updateAssgForm .columns").each( function(){
				var k = $(this).attr("colname");
				$(this).val( data[k] );
			} );
			$("#UPDATE_ASSG_MODAL").fadeIn();
		} );

	//EVENT FOR DELETE ASSIGNMENT
		$(document).on( "click", "#DELETE_ASSG_BTN", function(ev){
			ev.preventDefault();
			if( confirm("Delete Assignment?") ){
				var id = $("#ASSG_UPDATE_ID").val() || false;
				if( !id ){
					alert_msg( "No Assignment Selected" );
					return;
				}else{
					loader_custom_show( " Deleting assignment from database" );
					$.ajax({
						url : "/admin/assignment.php",
						type : "POST",
						data : {
							deleteAssignment : "true",
							as_id : id
						},
						success : function( res ){
							loader_custom_hide();
							res = res.trim();
							if( res == "SUCCESS" ){
								alert_msg_reload( "Assignment has been deleted successfully!" );
							}else{
								alert_msg( "Error : Unable to delete assignment" );
							}
						}
					});
				}
			}
		} );
	</script>

	</body>
	
</html>

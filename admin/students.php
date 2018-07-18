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

//UPLOAD STUDENT SCRIPT
	if( isset($_POST["addStudentForm"]) ){
		$s_name = addslashes($_POST["studentName"]);
		$s_roll = addslashes($_POST["studentRoll"]);
		$s_email = addslashes($_POST["studentEmail"]);
		$s_course = addslashes($_POST["studentCourse"]);
		$s_password = addslashes($_POST["studentPassword"]);
		$query = "INSERT INTO student( `s_name`, `s_roll`, `s_email`, `s_course_id`, `s_password`) values( '$s_name', '$s_roll', '$s_email', '$s_course', '$s_password' )";
		if( mysqli_query( $con, $query ) ){
			$MSG = "Student Added Successfully";
		}else{
			$ERROR = "Error : Cannot add student";
		}
	}

//DELETE STUDENT REQUEST
	if( isset($_POST["deleteStudent"]) ){
		$s_id = $_POST["s_id"];
		$query = "DELETE FROM student WHERE s_id='$s_id'";
		if( mysqli_query($con, $query) ){
			exit( "SUCCESS" );
		}else{
			exit( "ERROR_QUERY" );
		}
	}

//FETCH ALL STUDENT DETAILS
	$query_st = "SELECT student.*, course_master.course_name FROM student, course_master WHERE course_master.course_master_id=student.s_course_id";
	$STUD = mysqli_query( $con, $query_st );

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
			STUDENTS
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
				<form action="/admin/students.php" method="POST" enctype="multipart/form-data">
				<div class="w3-padding-large w3-pale-red w3-border ">
					<label class="w3-text-black w3-text-bold w3-border-bottom w3-padding w3-block">Add Students</label>
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
					<input type="text" name="studentName" placeholder="Enter Student Name" required class='w3-input w3-border w3-small' />
					<br/>
					<label> Roll</label>
					<input type="roll" name="studentRoll" placeholder="Student Roll Number" required class='w3-input w3-border w3-small' />
					<br/>
					<label> Email</label>
					<input type="email" name="studentEmail" placeholder="Student Email" required class='w3-input w3-border w3-small' />
					<br/>
					<label> Course</label>
					<select class="w3-select w3-white w3-border w3-small w3-block" name="studentCourse" required >
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
					<label> Password</label>
					<input type="text" name="studentPassword" placeholder="Student Password" required class='w3-input w3-border w3-small w3-white' />
					<br/>
					<button type="submit" class="w3-button w3-round-small w3-red w3-small w3-text-bold" name="addStudentForm">
						ADD STUDENT <i class="fa fa-user"></i>
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
							<label>Roll</label>
						</td>
						<td>
							<label>Course</label>
						</td>
						<td>
							<label>Email</label>
						</td>
						<td>
							<label>Action</label>
						</td>
					</tr>
	<?php
		if(mysqli_num_rows($STUD)==0)
			echo( "
				<tr>
					<td colspan='5'>
						<label>No Student Added Yet</label>
					</td>
				</tr>
			" );
		else
			while( $STUD_ROW = mysqli_fetch_object($STUD) ){
				$STUD_JSON = addslashes(json_encode($STUD_ROW));
				echo("
					<tr class='w3-text-black w3-hover-green'>
						<td>
							<label>$STUD_ROW->s_id</label>
						</td>
						<td>
							<label>$STUD_ROW->s_name</label>
						</td>
						<td>
							<label>$STUD_ROW->s_roll</label>
						</td>
						<td>
							<label>$STUD_ROW->course_name</label>
						</td>
						<td>
							<label>$STUD_ROW->s_email</label>
						</td>
						<td>
							<button class='w3-button w3-padding-small w3-round w3-pale-red STUD_ROW' data-row='$STUD_JSON'>
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
	<div class="w3-modal " id="UPDATE_STUD_MODAL">
		<div class="w3-modal-content w3-round w3-border w3-card-4 w3-white mx-300">
			<div class="w3-bar w3-green w3-large">
				<span class="w3-bar-item">
					UPDATE STUDENT
				</span>
				<button class="w3-bar-item w3-right w3-button w3-hover-green w3-hover-text-blue" dn-dismiss="modal">
					&times;
				</button>
			</div>
			<form action="/admin/students.php" method="POST" enctype="multipart/form-data" id="updateStudForm" style="margin:0px;padding:0px">
			<div class="w3-padding w3-small w3-pale-red">
				<label>Student Name</label>
				<input type="text" class="w3-input w3-small w3-border columns" colname="s_name" placeholder="Enter Student Name" required/>
				<br/>
				<label>Student Roll</label>
				<input type="text" class="w3-input w3-small w3-border columns" colname="s_roll" placeholder="Enter Student Roll" required/>
				<br/>
				<label>Student Course</label>
				<select class="w3-select w3-white w3-border w3-small w3-block columns" colname="s_course_id" name="studentCourse" required >
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
				<label>Student Password</label>
				<input type="text" class="w3-input w3-small w3-border columns" colname="s_password" placeholder="Enter Student Password" required/>
				<br/>
				<label>Student Email</label>
				<input type="email" class="w3-input w3-white w3-small w3-border columns" colname="s_email" placeholder="Student Email"/>
				<input type="hidden" id="STUD_UPDATE_ID" class="columns" colname="s_id"/>
				<br/>
			</div>
			<div class="w3-bar w3-padding w3-pale-red">
				<button class="w3-button w3-round w3-red w3-small" id="DELETE_STUD_BTN">
					&nbsp;<i class="fa fa-trash"></i>&nbsp;
				</button>
				<button type="submit" class="w3-button w3-round w3-small w3-green w3-right w3-text-bold w3-wide" name="updateStudForm">
					UPDATE <i class="fa fa-send"></i>
				</button>
			</div>
			</form>
		</div>
	</div>


	<script src="/js/jquery.js"></script>
	<script>
	//EVENT FOR UPDATE STUDENT MODAL LAUNCH
		$(document).on( "click", ".STUD_ROW", function(){
			var data = $(this).attr( "data-row" ).replace(/\\/g, "");
			data = JSON.parse( data );
			$("#updateStudForm .columns").each( function(){
				var k = $(this).attr("colname");
				$(this).val( data[k] );
			} );
			$("#UPDATE_STUD_MODAL").fadeIn();
		} );

	//EVENT FOR DELETE STUDENT
		$(document).on( "click", "#DELETE_STUD_BTN", function(ev){
			ev.preventDefault();
			if( confirm("Delete Student?") ){
				var id = $("#STUD_UPDATE_ID").val() || false;
				if( !id ){
					alert_msg( "No Student Selected" );
					return;
				}else{
					loader_custom_show( " Deleting student from database" );
					$.ajax({
						url : "/admin/students.php",
						type : "POST",
						data : {
							deleteStudent : "true",
							s_id : id
						},
						success : function( res ){
							loader_custom_hide();
							res = res.trim();
							if( res == "SUCCESS" ){
								alert_msg_reload( "Student has been deleted successfully!" );
							}else{
								alert_msg( "Error : Unable to delete student" );
							}
						}
					});
				}
			}
		} );
	</script>

	</body>
	
</html>

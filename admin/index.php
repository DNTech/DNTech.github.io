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
			DASHBOARD
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
						<label><?php echo($ADMIN->admin_name); ?></label>
					</td>
				</tr>
				<tr>
					<td>
						<label>Email</label>
					</td>
					<td>
						<label><?php echo($ADMIN->admin_email); ?></label>
					</td>
				</tr>
				<tr>
					<td>
						<label>Phone</label>
					</td>
					<td>
						<label><?php echo($ADMIN->admin_phone_1); ?></label>
					</td>
				</tr>
				<tr>
					<td>
						<label>Status</label>
					</td>
					<td>
						<label><?php echo($ADMIN->admin_status); ?></label>
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

	<div class="w3-row">
		<div class="w3-col l2 m2">
			<br/>
		</div>
<?php
	$LINKS = array(
		array(
			"url" => "account.php",
			"icon" => "info-circle",
			"name" => "PROFILE"
		),
		array(
			"url" => "students.php",
			"icon" => "user",
			"name" => "STUDENTS"
		),
		array(
			"url" => "assignment.php",
			"icon" => "stack-overflow",
			"name" => "ASSIGNMENTS"
		),
		array(
			"url" => "queries.php",
			"icon" => "question-circle",
			"name" => "QUERIES"
		)
	);
	foreach( $LINKS as $K=>$ITEM ){
		if( $ITEM !== end($LINKS) )
			$BORDER = "w3-border-right w3-border-bottom";
		else
			$BORDER = "w3-border-bottom";
		echo("
		<div class='w3-col l2 m2 w3-center $BORDER w3-hover-white'>
			<a href='{$ITEM["url"]}' class='w3-text-none'>
				<div class='w3-padding w3-round w3-margin'>
					<i class='fa fa-{$ITEM["icon"]} w3-jumbo w3-block'></i>
					{$ITEM["name"]}
				</div>
			</a>
		</div>
		");
	}
?>
	</div>
	<div class="w3-row">
		<div class="w3-col l2 m2">
			<br/>
		</div>
<?php
	$LINKS = array(
		array(
			"url" => "courses.php",
			"icon" => "graduation-cap",
			"name" => "COURSES"
		),
		array(
			"url" => "topics.php",
			"icon" => "th-large",
			"name" => "TOPICS"
		),
		array(
			"url" => "website.php",
			"icon" => "globe",
			"name" => "WEBSITE"
		),
		array(
			"url" => "admins.php",
			"icon" => "user-md",
			"name" => "ADMINS"
		)
	);
	foreach( $LINKS as $ITEM ){
		if( $ITEM !== end($LINKS) )
			$BORDER = "w3-border-right w3-border-top";
		else
			$BORDER = "w3-border-top";
		echo("
		<div class='w3-col l2 m2 w3-center $BORDER w3-hover-white'>
			<a href='{$ITEM["url"]}' class='w3-text-none'>
				<div class='w3-padding w3-round w3-margin'>
					<i class='fa fa-{$ITEM["icon"]} w3-jumbo w3-block'></i>
					{$ITEM["name"]}
				</div>
			</a>
		</div>
		");
	}
?>
	</div>
	<br/><br/>
</div>
<div class="w3-white">
	<br/><br/>
</div>
<?php
	include("$ROOT/includes/footer.php");
?>


	<script src="/js/jq.js"></script>
	<script>
		
	</script>

	</body>
	
</html>

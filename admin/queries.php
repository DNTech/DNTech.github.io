<?php
	session_start();

//include CONNECTION FILE
	$ROOT = $_SERVER["DOCUMENT_ROOT"];
	require_once( "$ROOT/includes/connect.php" );

//CHECK WHETHER USER ALREADY LOGGED IN
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

<?php
	include( "$ROOT/includes/footer.php" );
?>


	<script src="/js/jq.js"></script>
	<script>
		
	</script>

	</body>
	
</html>

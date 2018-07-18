<?php

//FUNCTION FOR DATABASE CONNECTIVITY
function db() {
	$dbh = "localhost";
	$dbu = "richnet_ebooks";
	$dbp = "C80b905b65fc@#$%";
	$dbn = "richnet_ebooks";
	static $conn;
	if($con===NULL)
		$con = mysqli_connect ($dbh, $dbu, $dbp, $dbn) ;
	return $con;
}


//FUNCTION FOR DUMPING OUT NORMAL ERROR MESSAGE
function error( $msg ){
	$DATA = new stdClass();
	$DATA->error = true;
	$DATA->error_msg = $msg;
	exit( json_encode($DATA) );
}


/*	FUNCTION FOR DUMPING OUT SECURITY ERROR MESSAGE
	1. GET USER IP
	2. STORE IN DATABASE WITH CURRENT DATE TIME
*/
function spam_error( $msg ){
	$con = db();
	$DATA = new stdClass();
	$DATA->error = true;
	$DATA->error_msg = $msg;
	//GET USER IP
	$ip = $_SERVER['REMOTE_ADDR'];
	//GET COMPLETE USER INFO
	$server = addslashes(json_encode($_SERVER));
	$query = "INSERT INTO mst_spam_request VALUES( null, '$ip', NOW(), '$server' )";
	mysqli_query( $con, $query ) or error("Server did not respond");
	exit( json_encode($DATA) );
}


/*
	FUNCTION TO CHECK WHETHER A USER IS ALREADY A SPAMMER
	1. GET USER IP
	2. COUNT THE NUMBER OF SPAM REQUEST BY THIS IP
	3. IF SPAM COUNT GREATER THAN 10 - BLOCK EM
*/
function IS_SPAM_USER(){
	$con = db();
	//GET USER IP
	$ip = $_SERVER['REMOTE_ADDR'];
	$query = "SELECT * FROM mst_spam_request WHERE user_ip='$ip'";
	$res = mysqli_query( $con, $query );
	if( mysqli_num_rows($res)>=10 )
		return true;
	else
		return false;
}

?>

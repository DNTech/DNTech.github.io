<?php

	//INCLUDE FUNCTIONS
	require( "functions.php" );

	//GET USER IP
	$ip = $_SERVER['REMOTE_ADDR'];

	//JSON DATA OBJECT
	$DATA = new stdClass();
	$DATA->error = false;
	$DATA->error_msg = "";

	//CONFIRM HEADER COOKIE
	if( !isset($_SERVER["HTTP_X_EBOOKS_RICHNET"]) )
		spam_error( "INVALID REQUEST" );
	
	//VALIDATE HEADER COOKIE VALUE
	if( $_SERVER["HTTP_X_EBOOKS_RICHNET"]!="dc40f114f1f2f3f4" )
		error( "UPDATE APP" );
	
	//CONFIRM POST TYPE
	if( !isset($_POST["POST_TYPE"]) )
		spam_error( "NO MODULE REQUEST" );
	else
		$POST_TYPE = $_POST["POST_TYPE"];
	
	//CONFIRM POST DATA
	$POST_DATA = false;
	if( isset($_POST["POST_DATA"]) )
		$POST_DATA = json_decode( $_POST["POST_DATA"] );

	//GET CONNECTION VARIABLE
	$con = db();
	
	//EXECUTE REQUESTED MODULE
	switch( $POST_TYPE ){
	
	//GET HOMEPAGE CONTENTS
	/*
		01. CATEGORIES from mst_category
		02. ON DEMAND TOPICS from mst_on_demand_topic
		03. TOP DOWNLOADS EBOOKS FROM mst_book ( book_download_count )
	*/
		case "GET_HOMEPAGE_DATA":
			$DATA->categories = array();
			$query = "SELECT cat_name,cat_id,cat_icon FROM mst_category";
			$res_cat = mysqli_query( $con, $query );
			$DATA->categories = mysqli_fetch_all( $res_cat, MYSQLI_ASSOC );
			$DATA->on_demand_topic = array();
			$query = "SELECT mst_topic.topic_name,mst_topic.topic_id,mst_topic.topic_icon FROM mst_on_demand_topic,mst_topic WHERE mst_topic.topic_id=mst_on_demand_topic.topic_id";
			$res_top = mysqli_query( $con, $query );
			$DATA->on_demand_topic = mysqli_fetch_all( $res_top, MYSQLI_ASSOC );
			$DATA->top_downloads = array();
			$query = "SELECT * FROM mst_book ORDER BY book_download_count LIMIT 20";
			$res_book = mysqli_query( $con, $query );
			$DATA->top_downloads = mysqli_fetch_all( $res_book, MYSQLI_ASSOC );
			break;

	//IF UNKOWN MODULE HAS BEEN REQUESTED
		default :
			spam_error( "INVALID MODULE REQUEST" );
			break;
	}

	//DUMP OUT DATA
	echo( json_encode($DATA) );

?>

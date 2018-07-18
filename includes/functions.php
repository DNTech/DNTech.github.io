<?php
//GET UNIQUE ID
	function GET_UNIQUE_ID(){
		$ROOT = $_SERVER["DOCUMENT_ROOT"];
		$id = (int)file_get_contents("$ROOT/uniqueId.pdf");
		$id++;
		file_put_contents( "$ROOT/uniqueId.pdf", $id );
		return $id;
	}
?>

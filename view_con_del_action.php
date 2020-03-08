<?php
session_start ();
	include ("connectionDB.php");
	
	$conid = $_POST["connid"];
	
	$sql = "DELETE FROM concert WHERE con_id = ".$conid;
	
	if ($con->query ( $sql ) === TRUE) {
		header("location:view_concert.php");
	}else {
		header("location:Home_admin.php");
	}
?>
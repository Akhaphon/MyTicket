<?php 
session_start();
	include ("connectionDB.php");
	
	$adminid = $_SESSION["memberID"];
	
	$sql = "DELETE FROM memberdata WHERE member_id = ".$adminid;
	
	if ($con->query ( $sql ) === TRUE) {
		header("location:view_admin.php");
	}else {
		header("location:Home_admin.php");
	}
?>

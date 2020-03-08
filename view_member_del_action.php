<?php
session_start ();
	include ("connectionDB.php");
	
	$memberid = $_POST["memberID"];
	
	$sql = "DELETE FROM memberdata WHERE member_id = ".$memberid;
	
	if ($con->query ( $sql ) === TRUE) {
		header("location:view_member.php");
	}else {
		header("location:Home_admin.php");
	}
?>
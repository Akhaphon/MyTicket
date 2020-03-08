<?php
session_start ();
	include ("connectionDB.php");
	
	$conid = $_POST["conID"];
	$conname = $_POST["cn"];
	$location= $_POST["location"];
	$organizer = $_POST["organ"];
	$showtime= $_POST["time"];
	$date = $_POST["date"];
	$statusb = $_POST["statusbuy"];
	$statusc = $_POST["statuscon"];
	
	
	
	$sql = "UPDATE concert SET con_id =".$conid.",concert_name = '".$conname."', location = '".$location."', organizer = '".$organizer."', show_time = '".$showtime."', status_buy = '".$statusb."', status_con = '".$statusc."', con_date = '".$date."' WHERE con_id = ".$conid;
	
	if ($con->query ( $sql ) === TRUE) {
		header("location:view_concert.php");
	}else {
		header("location:Home_admin.php");
	}
?>

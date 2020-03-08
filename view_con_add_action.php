<?php
	session_start ();
	include ("connectionDB.php");
	
	
	$conname = $_POST["cn"];
	$location = $_POST["location"];
	$organizer= $_POST["organ"];
	$showtime = $_POST["time"];
	$datetime = $_POST["date"];
	$statusbuy = $_POST["statusbuy"];
	$statuscon = $_POST["statuscon"];
	$pic = $_POST["pic"];
	
	

	
	$sql = "INSERT INTO concert(concert_name, location, organizer, show_time, status_buy, status_con, con_date, path_con) VALUES ('".$conname."','".$location."','".$organizer."','".$showtime."','".$statusbuy."','".$statuscon."','".$datetime."','".$pic."')";
	


	if ($con->query ( $sql ) === TRUE) {
		header("location:view_concert.php");
	} else {
		header("location:Home_admin.php");
	}
		
	$con->close();


?>


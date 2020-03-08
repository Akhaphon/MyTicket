<?php
session_start ();
	include ("connectionDB.php");
	
	$memberid = $_SESSION["memberID"];
	$firstname = $_POST["fname"];
	$lastname= $_POST["lname"];
	$email= $_POST["email"];
	$birthday= $_POST["bd"];
	$pwd = $_POST["pass"];
	$idcard= $_POST["card"];
	$phone= $_POST["phone"];
	$address= $_POST["address"];
	
	
	$sql = "UPDATE memberdata SET first_name='".$firstname."',last_name='".$lastname."',id_card='".$idcard."',date_birth='".$birthday."',email='".$email."',password='".$pwd."',phone='".$phone."',address='".$address."' WHERE member_id=".$memberid;
	
	if ($con->query ( $sql ) === TRUE) {
		header("location:Home.php");
	}else {
		header("location:login.php");
	}
?>
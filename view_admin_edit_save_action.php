<?php
session_start ();
	include ("connectionDB.php");
	
	$memberid = $_SESSION["memberID"];
	$firstname = $_POST["firstname"];
	$lastname= $_POST["lastname"];
	$email= $_POST["email"];
	$birthday= $_POST["bd"];
	$pwd = $_POST["password"];
	$idcard= $_POST["idcard"];
	$phone= $_POST["phonenumber"];
	$address= $_POST["address"];
	
	
	$sql = "UPDATE memberdata SET first_name='".$firstname."',last_name='".$lastname."',id_card='".$idcard."',date_birth='".$birthday."',email='".$email."',password='".$pwd."',phone='".$phone."',address='".$address."' WHERE member_id=".$memberid;
	
	if ($con->query ( $sql ) === TRUE) {
		header("location:view_admin.php");
	}else {
		header("location:Home_admin.php");
	}
?>
<?php 
 	session_start();
 	include ("connectionDB.php");
 	
 	
 	$firstname = $_POST["firstname"];
 	$lastname= $_POST["lastname"];
 	$email= $_POST["email"];
 	$birthday= $_POST["bd"];
 	$type= $_POST["type"];
 	$pwd = $_POST["password"];
 	$idcard= $_POST["idcard"];
 	$phone= $_POST["phonenumber"];
 	$address= $_POST["address"];
 	
 	$sql = "INSERT INTO memberdata(first_name, last_name, id_card, date_birth, email, password, phone, address, type) VALUES ('".$firstname."','".$lastname."','".$idcard."','".$birthday."','".$email."','".$pwd."','".$phone."','".$address."','".$type."')";
 	
 	if ($con->query ( $sql ) === TRUE) {
 		header("location:view_admin.php");
 	} else {
 		header("location:Home_admin.php");
 	}
?>


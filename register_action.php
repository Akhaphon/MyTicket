<?php 
 	session_start();
 	include ("connectionDB.php");
 	
 
 	$firstname = $_POST["fname"];
 	$lastname= $_POST["lname"];
 	$email= $_POST["email"];
 	$birthday= $_POST["bd"];
 	$type= $_POST["type"];
 	$pwd = $_POST["pass"];
 	$idcard= $_POST["card"];
 	$phone= $_POST["phone"];
 	$address= $_POST["address"];
 	
 	$sql = "INSERT INTO memberdata(first_name, last_name, id_card, date_birth, email, password, phone, address, type) VALUES ('".$firstname."','".$lastname."','".$idcard."','".$birthday."','".$email."','".$pwd."','".$phone."','".$address."','".$type."')";
 	
 	if ($con->query ( $sql ) === TRUE) {
 		header("location:Home.php");
 	} else {
 		header("location:login_admin.php");
 	}
?>

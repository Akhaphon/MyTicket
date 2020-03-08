<?php
session_start();
if (isset($_POST["uname"])){
	include("connectionDB.php");
	
	$username = $_POST["uname"];
	$password = $_POST["psw"];
	
	
	$sql = "SELECT * FROM memberdata WHERE email = '".$username."' AND password = '".$password."'";
	$rs = $con->query($sql);
	if ($rs->num_rows > 0){
		while ($row = $rs->fetch_assoc()){
			
			$_SESSION["password"] = $row["password"];
			$_SESSION["email"] = $row["email"];
			$_SESSION["firstName"] = $row["first_name"];
			$_SESSION["lastName"] = $row["last_name"];
			$_SESSION["memberID"] = $row["member_id"];
			
			
			
			
		 if ($_SESSION["email"]==$username && $_SESSION["password"] == $password){
			 	
		 		if($row["type"] == 'M'){
		 			header("location:Home.php");
		 		}else{
		 			header("location:Home_admin.php"); //redirect to page admin
		 		}
			 }else {
			 	header("location:login.php?res=''");
			 }
			
		}
		
	}else {
		header("location:login.php?res=Username or Password is incorrect !!".$username);
	}
	$con->close();
}


?>

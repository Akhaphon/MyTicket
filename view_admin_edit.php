<?php
session_start ();
$rs1;
	$member = $_SESSION["memberID"];
if (! $_SESSION ["email"]) {
	header ( "location:login_form.php" );
} else {
	include ("connectionDB.php");
	$sql = "SELECT * FROM memberdata WHERE  member_id = ".$member;
	$rs = $con->query ( $sql );
	
	$rs1 = $con->query ( $sql );
	if ($rs1->num_rows > 0) {
		while ( $row = $rs1->fetch_assoc () ) {
			$mail = $row["email"];
			$pass = $row["password"];
			$fname = $row["first_name"];
			$lname = $row["last_name"];
			$date = $row["date_birth"];
			$card = $row["id_card"];
			$phone = $row["phone"];
			$address= $row["address"];
		}
	}
	
	$con->close ();
}
?>

<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
<title>Edit</title>
<link rel="stylesheet" href="css/style.css" type="text/css" />
<link rel="stylesheet" href="fontawesome/css/fontawesome.css"
	type="text/css" />
<link rel="stylesheet" href="css/bootstrap.min.css" />
<link rel="icon" href="edit_icon.png" type="imags/png">

<script src="js/jquery.min.js"></script>
<script src="js/popper.min.js"></script>
<script src="js/bootstrap.min.js"></script>

<style>
body {
	font-family: Arial, Helvetica, sans-serif;
}

.addproduct {
	/*  border: 1px solid #f1f1f1; */
	padding: 5px;
	text-align: center;
}

input[type=text], input[type=password] {
	width: 115%;
	padding: 6px 20px;
	margin: 8px 0;
	display: inline-block;
	border: 1px solid #ccc;
	box-sizing: border-box;
}

button.submit1 {
	background-color: #4CAF50;
	color: white;
	padding: 14px 20px;
	margin: 8px 0;
	border: none;
	cursor: pointer;
	width: 100%;
}

button.clear {
	background-color: #8B8989;
	color: white;
	padding: 14px 20px;
	margin: 8px 0;
	border: none;
	cursor: pointer;
	width: 100%;
}

button:hover {
	opacity: 0.8;
}

.cancelbtn {
	width: auto;
	padding: 10px 18px;
	background-color: #f44336;
}

.imgcontainer {
	text-align: center;
}

img.avatar {
	width: 120px;;
	border-radius: 50%;
}

.container {
	padding: 20px;
}

span.psw {
	float: right;
	padding-top: 16px;
}

/* Change styles for span and cancel button on extra small screens */
@media screen and (max-width: 300px) {
	span.psw {
		display: block;
		float: none;
	}
	.cancelbtn {
		width: 100%;
	}
}

.bgHeader {
	height: 80px;
	padding-top: 7px;
}

.bgBody {
	background-color: #FFDEAD;
	margin-top: 30px;
}

.text-align-left1 {
	text-align: left;
	top: 12px;
	color: #CD5C5C;
}

.text-align {
	text-align: right;
}
</style>

</head>
<body>
	<div class="container">
		<div class="row bgHeader">
			<div class="col-md-6">
				<form action="/MyTicketProject/view_admin.php">
					<button type="submit" id="btnBack" name="btnBack" class="btn btn-primary">Back</button>
				</form>
			</div>
			<div class="col-md-6 text-align">
				<form action="/MyTicketProject/login.php">
					<button type="submit" id="btnLogout" name="btnLogout" class="btn btn-danger">Logout</button>
				</form>
			</div>

		</div>

		<div class="col-md-6 text-align-left1">
			<h2>Edit Admin</h2>
		</div>

		<div class="row bgBody">
			<form class="addproduct" action="/MyTicketProject/view_admin_edit_save_action.php" method="post">

				<div class="row">
					<div class="col-md-3" style="padding-top: 15px; width: 170px;">ID : </div>
					<div class="col-md-3">
						<input type="text" name="id" id="id"value="<?php echo $member?>" disabled="disabled" /> 
						<input type="hidden" id="memberid" name="memberid" value="<?php echo $member?>" />
					</div>

					<div class="col-md-3" style="padding-top: 15px; width: 220px;">E-mail:</div>
					<div class="col-md-3">
						<input type="text" name="email" id="email" value="<?php echo $mail?>" />
					</div>
				</div>

				<div class="row">
					<div class="col-md-3" style="padding-top: 15px; width: 170px;">Password:</div>
					<div class="col-md-3">
						<input type="text" name="password" id="password" value="<?php echo $pass?>" />
					</div>

					<div class="col-md-3" style="padding-top: 15px;">First Name :</div>
					<div class="col-md-3">
						<input type="text" name="firstname" id="firstname" value="<?php echo $fname?>" />
					</div>
				</div>

				<div class="row">
					<div class="col-md-3" style="padding-top: 15px; width: 170px;">Last Name :</div>
					<div class="col-md-3">
						<input type="text" name="lastname" id="lastname" value="<?php echo $lname?>" />
					</div>

					<div class="col-md-3" style="padding-top: 15px; width: 170px;">Birthday:</div>
					<div class="col-md-3">
						<input type="text" name="bd" id="bd" value="<?php echo $date?>" />
					</div>
				</div>

				<div class="row">
					<div class="col-md-3" style="padding-top: 15px; width: 170px;">ID card :</div>
					<div class="col-md-3">
						<input type="text" name="idcard" id="idcard" value="<?php echo $card?>" />
					</div>

					<div class="col-md-3" style="padding-top: 15px; width: 220px;">Phone number:</div>
					<div class="col-md-3">
						<input type="text" name="phonenumber" id="phonenumber" value="<?php echo $phone?>" />
					</div>
				</div>

				<div class="row">
					<div class="col-md-3" style="padding-top: 15px; width: 170px;">Address :</div>
					<div class="col-md-3">
						<input type="text" name="address" id="address" value="<?php echo $address?>" />
					</div>

				</div><br>
				<div style="padding-left: 1000px;">

					<button type="submit" id="btnSave" name="btnSave"
						class="btn btn-success">Save</button>
				</div>
			</form>
		</div>

	</div>
</body>
</html>


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
<!-- Website template by freewebsitetemplates.com -->
<html>
<head>
<meta charset="UTF-8">
<title>Editinformation</title>
<link rel="stylesheet" href="css/style.css" type="text/css">
<link rel="stylesheet" href="css/bootstrap.min.css" />
<link rel="icon" href="edit1_icon.png" type="imags/png">

<script src="js/jquery.min.js"></script>
<script src="js/popper.min.js"></script>
<script src="js/bootstrap.min.js"></script>

<style type="text/css">
.container {
	padding: 20px;
}

.logo {
	padding-top: 30px;
}
.bgBody {
	background-color: #FFDEAD;
	margin-top: 50px;
}
.addproduct {
	
	padding: 5px;
	text-align: center;
}
.text-align-left1 {
	text-align: left;
	top: 12px;
	color: #CD5C5C;
}
.was-validated{
	padding-top: 30px;
}
.was-validated-1{
	margin-top: 20px;
	margin-right: 20px;
}
</style>
</head>

<body>
	<div id="header">
		<div>
			<div id="logo">
				<a href="Home.php"><img class="logo" src="images/logo5.png" alt="LOGO"></a>
			</div>
			<ul id="navigation">
				<li ><a href="Home.php">Home</a></li>
				<li><a href="Buy.php">Buy Ticket</a></li>
<!-- 				<li><a href="Ticket.php">Ticket</a></li> -->
				
				<li class="nav-item dropdown">
				<a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown"
					aria-haspopup="true" aria-expanded="false" style="line-height: 135px;"> Edit
				</a>
					<div class="dropdown-menu " aria-labelledby="navbarDropdown">
						<a class="dropdown-item" href="Edit.php">Edit information</a>
<!-- 						<a class="dropdown-item" href="purchase.php">Purchase history</a> -->
					</div>
				</li>
				
				<li>
				<form action="/MyTicketProject/login.php">
					<button type="submit" class="btn btn-danger text-align" onclick="BuyTicket(this);">Logout</button>
				</form>
				</li>
			</ul>
		</div>
	</div>

			<div class="container">
				<div class="col-md-6 text-align-left1">
					<h2>Edit information</h2>
				</div>

				<div class="row bgBody">
					<form class="addproduct was-validated"  action="/MyTicketProject/Edit_member_save_action.php" method="post">
						<div class="row was-validated-1">
							<div class="col-md-3" style="padding-top: 15px; width: 220px;">E-mail:</div>
							<div class="col-md-3">
								<input type="text" class="form-control" id="email" name="email" value="<?php echo $mail?>" />
							</div>
							
							<div class="col-md-3" style="padding-top: 15px; width: 170px;">Password :</div>
							<div class="col-md-3">
								<input type="text" class="form-control" id="pass" name="pass" value="<?php echo $pass?>"/>
							</div>
							
						</div>

						<div class="row was-validated-1">
							<div class="col-md-3" style="padding-top: 15px;">First Name :</div>
							<div class="col-md-3">
								<input type="text" class="form-control" id="fname" name="fname" value="<?php echo $fname?>" />
							</div>
							<div class="col-md-3" style="padding-top: 15px; width: 170px;">Last Name :</div>
							<div class="col-md-3">
								<input type="text" class="form-control" id="lname" name="lname" value="<?php echo $lname?>" />
							</div>
						</div>

						<div class="row was-validated-1">
							<div class="col-md-3" style="padding-top: 15px; width: 170px;">Birthday:</div>
							<div class="col-md-3">
								<input type="text" class="form-control" id="bd" name="bd" value="<?php echo $date?>" />
							</div>
							<div class="col-md-3" style="padding-top: 15px; width: 170px;">ID card :</div>
							<div class="col-md-3">
								<input type="text" class="form-control" id="card" name="card" value="<?php echo $card?>" />
							</div>
						</div>

						<div class="row was-validated-1">
							<div class="col-md-3" style="padding-top: 15px; width: 220px;">Phone number:</div>
							<div class="col-md-3">
								<input type="text" class="form-control" id="phone" name="phone" value="<?php echo $phone?>" />
							</div>
							<div class="col-md-3" style="padding-top: 15px; width: 170px;">Address:</div>
							<div class="col-md-3">
									<input  type ="text" class="form-control" id="address"name="address" value="<?php echo $address?>" />
							</div>
						</div></br>
						
						<div style="padding-left: 1000px;">

							<button type="submit" id="btnSave" name="btnSave"
								class="btn btn-info">Save</button>
						</div>
					</form>
				</div>

			</div>

	<div id="footer">
		<div id="connect">
			<a href="http://freewebsitetemplates.com/go/facebook/"
				target="_blank" class="facebook"></a><a
				href="http://www.freewebsitetemplates.com/misc/contact/"
				target="_blank" class="email"></a><a
				href="http://freewebsitetemplates.com/go/twitter/" target="_blank"
				class="twitter"></a><a
				href="http://freewebsitetemplates.com/go/googleplus/"
				target="_blank" class="googleplus"></a>
		</div>
		<p>© 2023 Vistida. All Rights Reserved.</p>
	</div>
</body>
</html>
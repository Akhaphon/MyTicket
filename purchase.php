<?php
session_start ();
$rs1;
//$rs2;
	$member = $_SESSION["memberID"];
if (! $_SESSION ["email"]) {
	header ( "location:login_form.php" );
} else {
	include ("connectionDB.php");
	$sql = "SELECT sum(price) as countPrice FROM purchase WHERE  member_id = ".$member;
	$rs = $con->query ( $sql );
	if ($rs->num_rows > 0) {
			if ($row = $rs->fetch_assoc ()) {
				$count = $row ["countPrice"];
			}
		}
	$sql1 = "SELECT purchase.*,concert.con_id,concert.concert_name FROM purchase LEFT JOIN concert ON purchase.con_id = concert.con_id where member_id = ".$_SESSION["memberID"];
	$rs1 = $con->query ( $sql1 );
	if ($rs1->num_rows > 0) {
		while ( $row = $rs1->fetch_assoc () ) {
			$seat = $row["seat"];
			$price = $row["price"];
			$conname = $row["concert_name"];
		}
	}
// 	$sql2 = "SELECT sum(seat) as countSeat FROM purchase WHERE  member_id = ".$member;
// 	$rs2 = $con->query ( $sql2 );
// 	if ($rs2->num_rows > 0) {
// 		if ($row = $rs2->fetch_assoc ()) {
// 			$countseat = $row ["countSeat"];
// 		}
// 	}
	$con->close ();
}
?>
<!DOCTYPE html>
<!-- Website template by freewebsitetemplates.com -->
<html>
<head>
<meta charset="UTF-8">
<title>Purchase</title>
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

.was-validated {
	padding-top: 20px;
}

.was-validated-1 {
	margin-top: 20px;
	margin-left: 50px;
	margin-bottom: 20px;
}
</style>
</head>

<body>
	<div id="header">
		<div>
			<div id="logo">
				<a href="Home.php"><img class="logo" src="images/logo5.png"
					alt="LOGO"></a>
			</div>
			<ul id="navigation">
				<li><a href="Home.php">Home</a></li>
				<li><a href="Buy.php">Buy Ticket</a></li>
				<!-- 				<li><a href="Ticket.php">Ticket</a></li> -->

				<li class="nav-item dropdown"><a class="nav-link dropdown-toggle"
					href="#" id="navbarDropdown" role="button" data-toggle="dropdown"
					aria-haspopup="true" aria-expanded="false"
					style="line-height: 135px;"> Edit </a>
					<div class="dropdown-menu " aria-labelledby="navbarDropdown">
						<a class="dropdown-item" href="Edit.php">Edit information</a> <a
							class="dropdown-item" href="purchase.php">Purchase history</a>
					</div></li>

				<li>
					<form action="/MyTicketProject/login.php">
						<button type="submit" class="btn btn-danger text-align"
							onclick="BuyTicket(this);">Logout</button>
					</form>
				</li>
			</ul>
		</div>
	</div>

	<div class="container ">
		<div class="col-md-6 text-align-left1">
			<h2>Purchase history</h2>
		</div>

		<div class="row bgBody ">
			<form class="addproduct was-validated" method="post">
				<div class="row was-validated-1">
					<div class="col-md-3" style="padding-top: 15px; width: 220px;">Seat
						:</div>
					<div class="col-md-3">
						<input type="text" class="form-control" id="email" name="email"
							value="<?php echo $seat?>" disabled="disabled" />
					</div>

					<div class="col-md-3" style="padding-top: 15px; width: 170px;">Price
						:</div>
					<div class="col-md-3">
						<input type="text" class="form-control" id="pass" name="pass"
							value="<?php echo $count?>" disabled="disabled" />
					</div>
				</div>

				<div class="row was-validated-1">
					<div class="col-md-3" style="padding-top: 15px;">Con name :</div>
					<div class="col-md-3">
						<input type="text" class="form-control" id="fname" name="fname"
							value="<?php echo $conname?>" disabled="disabled" />
					</div>
				</div>
			</form>
		</div>

	</div>


</body>
</html>
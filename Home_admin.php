<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
<title>HomeAdmin</title>
<link rel="stylesheet" href="css/style.css" type="text/css" />
<link rel="stylesheet" href="fontawesome/css/fontawesome.css"
	type="text/css" />
<link rel="stylesheet" href="css/bootstrap.min.css" />
<link rel = "icon" href = "home_icon.png" type = "imags/png">

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

.bgBody {
	/* 	background-color: #F5FFFA; */
	margin-top: 30px;
}

.text-align {
	text-align: right;
}
.bgHeader {
	height: 80px;
	padding-top: 7px;
}
</style>

</head>
<body>
	<div class="container">
		<div class="row bgHeader">
			<div class="col-md-12 text-align">
				<form action="/MyTicketProject/login.php">
					<button type="submit" id="btnLogout" name="btnLogout"  class="btn btn-danger">Logout</button>
			</form>
			</div>
		</div>
		<div class="row bgBody">
			<form action="/MyTicketProject/view_concert.php" method="post">
				<button type="submit" id="btnMp" name="btnMp" class="btn btn-success"
					style="width: 550px; height: 250px; margin-right: 30px">Manage Concert</button>
			</form>


			<form action="/MyTicketProject/view_admin.php" method="post">
				<button type="submit" id="btnMm" name="btnMm" class="btn btn-info"
					style="width: 550px; height: 250px;">Manage Admin</button>
			</form>
			
			<form action="/MyTicketProject/view_member.php" method="post">
				<button type="submit" id="btnMm" name="btnMm" class="btn btn-danger"
					style="width: 550px; height: 250px; margin-top: 30px; margin-left: 280px">Manage Member</button>
			</form>

		</div>

	</div>
</body>
</html>


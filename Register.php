<?php
session_start ();
?>
<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
<title>Register</title>
<link rel="stylesheet" href="css/style.css" type="text/css" />
<link rel="stylesheet" href="fontawesome/css/fontawesome.css"
	type="text/css" />
<link rel="stylesheet" href="css/bootstrap.min.css" />
<link rel="icon" href="add_icon.png" type="imags/png">

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

.was-validated-1 {
	/* 	margin-top: 20px; */
	margin-right: 40px;
}

.was-validated {
	padding-top: 30px;
}
</style>

</head>
<body>
	<div class="container">
		<div class="row bgHeader">
			<div class="col-md-6">
				<form action="/MyTicketProject/login.php">
					<button type="submit" id="btnLogout" name="btnLogout"
						class="btn btn-primary">Back</button>
				</form>
			</div>
			<div class="col-md-6 text-align">
				<form action="/MyTicketProject/login.php">
					<button type="submit" id="btnLogout" name="btnLogout"
						class="btn btn-danger">Logout</button>
				</form>
			</div>

		</div>

		<div class="col-md-6 text-align-left1">
			<h2>Please Register</h2>
		</div>


		<div class="row bgBody">
			<form class="addproduct was-validated"
				action="/MyTicketProject/register_action.php" method="post">
				<div class="row was-validated-1">
					<div class="col-md-3" style="padding-top: 15px; width: 220px;">E-mail:</div>
					<div class="col-md-3">
						<input type="text" class="form-control" id="email"
							placeholder="Enter Email" name="email" required>
						<div class="valid-feedback">Valid.</div>
						<div class="invalid-feedback">Please fill out this field.</div>
					</div>
					<div class="col-md-3" style="padding-top: 15px; width: 170px;">Password:</div>
					<div class="col-md-3">
						<input type="text" class="form-control" id="pass"
							placeholder="Enter Password" name="pass" required>
						<div class="valid-feedback">Valid.</div>
						<div class="invalid-feedback">Please fill out this field.</div>
					</div>
				</div>

				<div class="row was-validated-1">
					<div class="col-md-3" style="padding-top: 15px;">First Name :</div>
					<div class="col-md-3">
						<input type="text" class="form-control" id="fname"
							placeholder="Enter Firstname" name="fname" required>
						<div class="valid-feedback">Valid.</div>
						<div class="invalid-feedback">Please fill out this field.</div>
					</div>

					<div class="col-md-3" style="padding-top: 15px; width: 170px;">Last
						Name :</div>
					<div class="col-md-3">
						<input type="text" class="form-control" id="lname"
							placeholder="Enter Lastname" name="lname" required>
						<div class="valid-feedback">Valid.</div>
						<div class="invalid-feedback">Please fill out this field.</div>
					</div>
				</div>

				<div class="row was-validated-1">
					<div class="col-md-3" style="padding-top: 15px; width: 170px;">Birthday
						:</div>
					<div class="col-md-3">
						<input type="text" class="form-control" id="bd"
							placeholder="Enter Birthday" name="bd" required>
						<div class="valid-feedback">Valid.</div>
						<div class="invalid-feedback">Please fill out this field.</div>
					</div>
					<div class="col-md-3" style="padding-top: 15px; width: 170px;">ID
						card :</div>
					<div class="col-md-3">
						<input type="text" class="form-control" id="card"
							placeholder="Enter IDcard" name="card" required>
						<div class="valid-feedback">Valid.</div>
						<div class="invalid-feedback">Please fill out this field.</div>
					</div>
				</div>

				<div class="row was-validated-1">
					<div class="col-md-3" style="padding-top: 15px; width: 220px;">Phone
						number:</div>
					<div class="col-md-3">
						<input type="text" class="form-control" id="phone"
							placeholder="Enter Phonenumber" name="phone" required>
						<div class="valid-feedback">Valid.</div>
						<div class="invalid-feedback">Please fill out this field.</div>
					</div>

					<div class="col-md-3" style="padding-top: 15px; width: 170px;">Address:</div>
					<div class="col-md-3">
						<textarea rows="5" cols="30" class="form-control" id="address"
							placeholder="Enter Address" name="address" required></textarea>
						<div class="valid-feedback">Valid.</div>
						<div class="invalid-feedback">Please fill out this field.</div>
					</div>

				</div>

				<div class="row was-validated-1">
					<div class="col-md-3">
						<input type="hidden" class="form-control" id="type" placeholder="Enter Type" name="type" value="M" required>
					</div>
				</div>



				<div style="padding-left: 1000px;">

					<button type="submit" id="btnSave" name="btnSave"
						class="btn btn-info">Submit</button>
				</div>
			</form>
		</div>

	</div>
</body>
</html>

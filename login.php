<?php
$res = $_GET["res"];
// echo "Php".$res;
?>
<!DOCTYPE html>
<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel = "icon" href = "login_icon.png" type = "imags/png">

<style>
body {
	font-family: Arial, Helvetica, sans-serif;
}

form {
	/*border: 3px solid #f1f1f1;*/
	
}

input[type=text], input[type=password] {
	width: 100%;
	padding: 12px 20px;
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

button.regis {
	background-color: #1E90FF;
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
	margin: 24px 0 12px 0;
}

img.avatar {
	width: 50%;
	border-radius: 20%;
}

.container {
	padding: 140px;
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

</style>
</head>
<body>

	<div class="container">
		<form action="/MyTicketProject/login_action.php" method="post">
		
			<div class="imgcontainer">
				<img src="images/logo5.png" alt="Avatar" class="avatar">
			</div>

			<label for="uname"><b>Username</b></label> <input type="text" placeholder="Enter Username" name="uname" required> 
			<label for="psw"><b>Password</b></label>
			<input type="password" placeholder="Enter Password" name="psw" required>

			<div class="row">
				&nbsp;&nbsp;&nbsp;&nbsp;<label style="color: red;"><?php echo $res ?></label>
			</div>

			<div class="row">
				<div class="col-md-12">
					<button class="submit1" type="submit">Login</button>
				</div>
			</div>

		</form>

		<div class="row">
			<div class="col-md-12">
				<form class="addproduct" action="/MyTicketProject/Register.php" method="post">
					<button type="submit" id="btnRe" name="btnRe" class="regis">Register Member</button>
				</form>
			</div>
		</div>
	</div>

</body>
</html>


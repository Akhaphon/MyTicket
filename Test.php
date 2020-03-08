<!DOCTYPE html>
<!-- Website template by freewebsitetemplates.com -->
<html>
<head>
<meta charset="UTF-8">
<title>Register</title>
<link rel="stylesheet" href="css/style.css" type="text/css">
<link rel="stylesheet" href="css/bootstrap.min.css" />
<script src="js/jquery.min.js"></script>
<script src="js/popper.min.js"></script>
<script src="js/bootstrap.min.js"></script>

<style type="text/css">
.outer-container {
	padding: 60px;
	background-color: Moccasin;
}

.layout {
	padding-top: 50px;
	padding-bottom: 50px;
}

</style>
</head>

<body>
	<div id="header">
		<div>
			<div id="logo">
				<a href="Home.php"><img src="images/ttm.png" alt="LOGO"></a>
			</div>
			<ul id="navigation">
				<li><a href="Home.php">Home</a></li>
				<li><a href="Buy.php">Buy Ticket</a></li>
				<li class="selected"><a href="Register.php">Register</a></li>
				<li><a href="Card.php">CardInformation</a></li>
				<li><a href="Ticket.php">Contact</a></li>
			</ul>
		</div>
	</div>
	<div id="contents" class="layout">
		<div id="about">
			<div class="container">
				<div class="outer-container">
					<h2>Please Register</h2>
						<form class="was-validated">

							<div class="form-group">
								<label for="fname">First Name:</label> <input type="text"
									class="form-control" id="fname" placeholder="Enter Firstname"
									name="fname" value="<?php echo $_GET["fname"]; ?>">
							</div>

							<div class="form-group">
								<label for="lname">Last Name:</label> <input type="text"
									class="form-control" id="lname" placeholder="Enter Lastname"
									name="lname" value="<?php echo $_GET["lname"]; ?>">
								
							</div>


							<div class="form-group">
								<label for="idcard" >ID Card:</label> <input type="text"
									class="form-control" id="idcard" placeholder="Enter IDCard"
									name="idcard" value="<?php echo $_GET["idcard"]; ?>">
							</div>

							<div class="form-group">
								<label for="dfb" >Date of Birth:</label> 
								<?php echo $_GET["dfb"]; ?>
							</div>

							<div class="form-group">
								<label for="email">Email:</label> 
								<?php echo $_GET["email"]; ?>
							</div>

							<div class="form-group">
								<label for="mb">Mobile Phone:</label> 
								<?php echo $_GET["mb"]; ?>
							</div>
						</form>

					
				</div>
			</div>
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
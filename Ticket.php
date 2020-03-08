<!DOCTYPE html>
<!-- Website template by freewebsitetemplates.com -->
<html>
<head>
<meta charset="UTF-8">
<title>Ticket</title>
<link rel="stylesheet" href="css/style.css" type="text/css" />
<link rel="stylesheet" href="css/bootstrap.min.css" />
<link rel="icon" href="ticket1_icon.png" type="imags/png">

<script src="js/jquery.min.js"></script>
<script src="js/popper.min.js"></script>
<script src="js/bootstrap.min.js"></script>
<script src="js/stepper.js"></script>

<style type="text/css">
/* Make the image fully responsive */
.logo {
	padding-top: 30px;
}

.container {
	padding: 30px;
	background-color: #FFE7BA;
}

.label {
	color: #FF6A6A;
	font-weight: bold;
}

.card {
	width: 780px;
	margin-top: 20px;
	margin-left: 60px;
}
</style>
</head>
<body>
	<div id="header">
		<div>
			<div id="logo">
				<a href="Home.php"><img class="logo" src="images/ttm.png" alt="LOGO"></a>
			</div>
			<ul id="navigation">
				<li><a href="Home.php">Home</a></li>
				<li><a href="Buy.php">Buy Ticket</a></li>
				<li class="selected"><a href="Ticket.php">Ticket</a></li>

				<li class="nav-item dropdown">
				<a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown"
					aria-haspopup="true" aria-expanded="false" style="line-height: 135px;"> Dropdown 
				</a>
					<div class="dropdown-menu" aria-labelledby="navbarDropdown">
						<a class="dropdown-item" href="Edit.php">Edit information</a>
						<a class="dropdown-item" href="Edit.php">Purchase history</a>
					</div>
				</li>

				<form action="/MyTicketProject/login.php">
					<button type="submit" class="btn btn-danger text-align"
						onclick="BuyTicket(this);">Logout</button>
				</form>

			</ul>
		</div>
	</div>
	<div id="contents">
		<div id="contact">
			<div class="container">
				<div class="card card">
					<img class="card-img-top" src="images/1.jpg" alt="Card image cap">
					<div class="card-body">
						<h5 class="card-title" style="text-align: center">Khalid Free
							Spirit World Tour Live in Bangkok 2020</h5>
						<p class="card-text">SHOW DATE : 24/03/2563</p>
						<p class="card-text">SHOW TIME : 17:00</p>
						<p class="card-text">ZONE : A1</p>
						<p class="card-text">ROW : A</p>
						<p class="card-text">SEAT NO : A8</p>

					</div>
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

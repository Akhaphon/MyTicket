<?php
session_start ();
$rs1;
if (! $_SESSION ["email"]) {
	header ( "location:login_form.php" );
} else {
	include ("connectionDB.php");
	$sql = "SELECT * FROM concert WHERE status_con = 'Y'";
	$rs1 = $con->query ( $sql );
	$con->close ();
}
function destroySession(){
	session_unset();
	session_destroy();
}

?>

<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
<title>CSTICKET</title>

<link rel="stylesheet" href="css/style.css" type="text/css" />
<link rel="stylesheet" href="fontawesome/css/fontawesome.css"
	type="text/css" />
<link rel="stylesheet" href="css/bootstrap.min.css" />
<link rel="icon" href="home_icon.png" type="imags/png">

<script src="js/jquery.min.js"></script>
<script src="js/popper.min.js"></script>
<script src="js/bootstrap.min.js"></script>


<style>
Make the image fully responsive 

.carousel-inner img {
	width: 100%;
	height: 100%;
}

.img {
	width: 200px;
}

.logo {
	padding-top: 30px;
}

.text-align {
	text-align: right;
}
</style>

<script type="text/javascript">
	function BuyTicket(thiz)
	{
		$('#loginForm').modal('show');
	}
	
</script>



</head>

<body>
	<div id="header">
		<div>
			<div id="logo">
				<a href="Home.php"><img class="logo" src="images/logo5.png"
					alt="LOGO"></a>
			</div>
			<ul id="navigation">
				<li class="selected"><a href="Home.php">Home</a></li>
				<li><a href="Buy.php">Buy Ticket</a></li>
				<!-- 				<li><a href="Ticket.php">Ticket</a></li> -->

				<li class="nav-item dropdown"><a class="nav-link dropdown-toggle"
					href="#" id="navbarDropdown" role="button" data-toggle="dropdown"
					aria-haspopup="true" aria-expanded="false"
					style="line-height: 135px;">Edit </a>
					<div class="dropdown-menu" aria-labelledby="navbarDropdown">
						<a class="dropdown-item" href="Edit.php">Edit information</a> 
<!-- 						<a class="dropdown-item" href="purchase.php">Purchase history</a> -->
					</div></li>

				<li>
					<form action="/MyTicketProject/login.php">
						<button type="submit" class="btn btn-danger text-align">Logout</button>
					</form>
				</li>

			</ul>
		</div>
	</div>



<!--  	<form class="form-inline md-form mr-auto mb-4 ">  -->
<!-- 		<input class="form-control mr-sm-2 " type="text" placeholder="Search"  -->
<!-- 			aria-label="Search" style="margin-left: 900px;">  -->
<!-- 		<button type="submit" id="btnSrc" name="btnSrc" class="btn btn-info">Search</button>  -->
<!-- 	</form>  -->

	<div id="contents">
		<div id="adbox">
			<div id="carouselExampleControls" class="carousel slide"
				data-ride="carousel">
				<div class="carousel-inner">
					<div class="carousel-item active">
						<img class="d-block w-100" src="images/1.jpg" alt="First slide">
					</div>
					<div class="carousel-item">
						<img class="d-block w-100" src="images/2.jpg" alt="Second slide">
					</div>
					<div class="carousel-item">
						<img class="d-block w-100" src="images/3.jpg" alt="Third slide">
					</div>
					<div class="carousel-item">
						<img class="d-block w-100" src="images/4.jpg" alt="Four slide">
					</div>
					<div class="carousel-item">
						<img class="d-block w-100" src="images/5.jpg" alt="Five slide">
					</div>
					<div class="carousel-item">
						<img class="d-block w-100" src="images/6.jpg" alt="Six slide">
					</div>
				</div>
				<a class="carousel-control-prev" href="#carouselExampleControls"
					role="button" data-slide="prev"> <span
					class="carousel-control-prev-icon" aria-hidden="true"></span> <span
					class="sr-only">Previous</span>
				</a> <a class="carousel-control-next"
					href="#carouselExampleControls" role="button" data-slide="next"> <span
					class="carousel-control-next-icon" aria-hidden="true"></span> <span
					class="sr-only">Next</span>
				</a>
			</div>
		</div>

		<div id="featured">
			<div class="container">

				<ul>
				<?php if ($rs1->num_rows > 0){ ?>
							<?php while ($row = $rs1->fetch_assoc()){?>
					<li><a href="Buy.php"><img
							src="images/<?php echo $row["path_con"]?>" alt="Img"></a> <B><?php echo $row["concert_name"]?></B>
						<p><?php echo $row["con_date"]?></p>
						<p><?php echo $row["location"]?></p>
						
						<?php if ($row["status_buy"] === 'Y'){?>
							<form action="/MyTicketProject/Buy.php" method="post">
							<input type="hidden" name="conid" id="conid"
								value="<?php echo $row["con_id"]?>" />
							<button type="submit" class="btn btn-danger">ซื้อบัตร</button>
						</form>
						<?php }else {?>
						<button type="button" class="btn btn-outline-danger">เร็วๆนี้</button>
						<?php }?>
					</li>
					<?php } ?>
						<?php } ?>
						
				</ul>
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
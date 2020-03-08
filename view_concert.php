<?php
session_start ();
$rs1;
if (! $_SESSION ["email"]) {
	header ( "location:login_form.php" );
} else {
	include ("connectionDB.php");
	$sql = "SELECT * FROM concert";
	$rs = $con->query ( $sql );
	
	$rs1 = $con->query ( $sql );
	$con->close ();
}
?>

<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
<title>View Concert</title>
<link rel="stylesheet" href="css/style.css" type="text/css" />
<link rel="stylesheet" href="fontawesome/css/fontawesome.css"
	type="text/css" />
<link rel="stylesheet" href="css/bootstrap.min.css" />
<link rel="icon" href="view_icon.png" type="imags/png">

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
	width: 50%;
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
	background-color: #F5FFFA;
	margin-top: 20px;
}

.text-align-left1 {
	text-align: left;
	top: 12px;
}

.text-align {
	text-align: right;
}

.text-align1 {
	text-align: center;
}
</style>

</head>
<body>
	<div class="container">
		<div class="row bgHeader">
			<div class="col-md-6">
				<form action="/MyTicketProject/Home_admin.php">
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
		<br>

		<div class="col-md-12 text-align">
			<form class="addproduct1"
				action="/MyTicketProject/view_concert_add.php" method="post">
				<button type="submit" id="btnDel" name="btnDel" class="btn btn-info">Add
					Concert</button>
			</form>
		</div>



		<div class="row bgBody">
			<table class="table">
				<thead class="bg-warning">
					<tr>
						<th scope="col" width="10px;" style="text-align: center">ID</th>
						<th scope="col" width="10px;" style="text-align: center">Image</th>
						<th scope="col" width="30px;" style="text-align: center">Concert
							name</th>
						<th scope="col" width="20px;" style="text-align: center">Location</th>
						<th scope="col" width="30px;" style="text-align: center">Organizer</th>
						<th scope="col" width="30px;" style="text-align: center">Show time</th>
						<th scope="col" width="10px;" style="text-align: center">Date time</th>
						<th scope="col" width="10px;" style="text-align: center">Edit</th>
						<th scope="col" width="10px;" style="text-align: center">Delete</th>

					</tr>
				</thead>
				<tbody>
					<?php if ($rs1->num_rows > 0){ ?>
							<?php while ($row = $rs1->fetch_assoc()){?>
					<tr>
						<td class="text-align1"> <?php echo $row["con_id"]?>.</td>
						<td>
							<div class="imgcontainer ">
								<img src="images/<?php echo $row["path_con"]?>" alt="Avatar" class="avatar">
							</div>
						</td>
						<td class="text-align1"><?php echo $row["concert_name"]?></td>
						<td class="text-align1"><?php echo $row["location"]?></td>
						<td class="text-align1"><?php echo $row["organizer"]?></td>
						<td class="text-align1"><?php echo $row["show_time"]?></td>
						<td class="text-align1"><?php echo $row["con_date"]?></td>


						<td>
							<form class="addproduct" action="/MyTicketProject/view_concert_edit.php" method="post">
								<input type="hidden" name="conid" id="conid" value="<?php echo $row["con_id"]?>" />
								<button type="submit" id="btnLogout" name="btnAdd" class="btn btn-success">Edit</button>
							</form>
						</td>

						<td>
							<form class="addproduct" action="/MyTicketProject/view_con_del_action.php" method="post">
								<input type="hidden" name="connid" id="connid" value="<?php echo $row["con_id"]?>" />
								<button type="submit" id="btnLogout" name="btnDel" class="btn btn-danger">Delete</button>
							</form>
						</td>
					</tr>
					<?php } ?>
						<?php } ?>
				</tbody>
			</table>
		</div>

	</div>
</body>
</html>


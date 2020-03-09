<?php
session_start ();
$rs;
$rs1;
$rs2;
$rs3;
$rs4;
$rs5;
$conid = $_POST["conid"];
$seat = '';

$seatAll = 288;

$seatZoneAAvalible = 0;
$seatZoneBAvalible = 0;
$seatZoneCAvalible = 0;
$seatZoneDAvalible = 0;

if (! $_SESSION ["email"]) {
	header ( "location:login_form.php" );
} else {
	include ("connectionDB.php");
	
	$sql = "SELECT * FROM concert WHERE con_id = " . $conid;
	$sql1 = "SELECT seat FROM purchase WHERE con_id = " . $conid;
	$sql2 = "SELECT * FROM purchase WHERE seat LIKE 'A%' and con_id = " . $conid;
	$sql3 = "SELECT * FROM purchase WHERE seat LIKE 'B%' and con_id = " . $conid;
	$sql4 = "SELECT * FROM purchase WHERE seat LIKE 'C%' and con_id = " . $conid;
	$sql5 = "SELECT * FROM purchase WHERE seat LIKE 'D%' and con_id = " . $conid;
	
	$rs = $con->query ( $sql1 );
	if ($rs->num_rows > 0) {
		while ( $row1 = $rs->fetch_assoc () ) {
			$seat = $seat . ',' . $row1 ["seat"];
		}
	}
	
	$rs1 = $con->query ( $sql );
	if ($rs1->num_rows > 0) {
		while ( $row = $rs1->fetch_assoc () ) {
			$conname = $row ["concert_name"];
			$location = $row ["location"];
			$organizer = $row ["organizer"];
			$showtime = $row ["show_time"];
			$condate = $row ["con_date"];
			$img = $row["path_con"];
			$img1 = $row["price_con"];
		}
	}
	$rs2 = $con->query ( $sql2 );
	if ($rs2->num_rows > 0){
		
		while ( $row2 = $rs2->fetch_assoc ()){
			$arr = explode(",",$row2["seat"]);
		//	echo sizeof($arr).'<br>';
			$seatZoneAAvalible = $seatZoneAAvalible + sizeof($arr);
		}
	}
	$rs3 = $con->query ( $sql3 );
	if ($rs3->num_rows > 0){
	
		while ( $row2 = $rs3->fetch_assoc ()){
			$arr = explode(",",$row2["seat"]);
			//	echo sizeof($arr).'<br>';
			$seatZoneBAvalible = $seatZoneBAvalible + sizeof($arr);
		}
	}
	$rs4 = $con->query ( $sql4 );
	if ($rs4->num_rows > 0){
	
		while ( $row2 = $rs4->fetch_assoc ()){
			$arr = explode(",",$row2["seat"]);
			//	echo sizeof($arr).'<br>';
			$seatZoneCAvalible = $seatZoneCAvalible + sizeof($arr);
		}
	}
	$rs5 = $con->query ( $sql5 );
	if ($rs5->num_rows > 0){
	
		while ( $row2 = $rs5->fetch_assoc ()){
			$arr = explode(",",$row2["seat"]);
			//	echo sizeof($arr).'<br>';
			$seatZoneDAvalible = $seatZoneDAvalible + sizeof($arr);
		}
	}
	
	

	if($seatZoneAAvalible > 0){
		$seatZoneAAvalible = $seatAll - $seatZoneAAvalible;
	}
	if ($seatZoneBAvalible > 0){
		$seatZoneBAvalible = $seatAll - $seatZoneBAvalible;
	}
	if ($seatZoneCAvalible > 0){
		$seatZoneCAvalible = $seatAll - $seatZoneCAvalible;
	}
	if ($seatZoneDAvalible > 0){
		$seatZoneDAvalible = $seatAll - $seatZoneDAvalible;
	}
	

	
	
	$con->close ();
}
?>
<!DOCTYPE html>
<!-- Website template by freewebsitetemplates.com -->
<html>
<head>
<meta charset="UTF-8">
<title>Buy Ticket</title>
<link rel="stylesheet" href="css/style.css" type="text/css" />
<link rel="stylesheet" href="css/bootstrap.min.css" />
<link rel="icon" href="ticket_icon.png" type="imags/png">

<script src="js/jquery.min.js"></script>
<script src="js/popper.min.js"></script>
<script src="js/bootstrap.min.js"></script>
<script src="js/stepper.js"></script>

<style type="text/css">
.outer-container {
	padding: 60px;
	background-color: white;
}

.step-content {
	padding: 40px 0;
}

.nav {
	padding-left: 0;
	margin-bottom: 0;
	list-style: none;
}

.label {
	color: #FF6A6A;
	font-weight: bold;
}

.stage {
	padding-left: 150px;
	padding-right: 150px;
	margin-right: 40px;
}

.stage-1 {
	background-color: #EEE5DE;
	text-align: center;
	height: 120px;
	vertical-align: middle;
	padding: 50px;
}

.zone-A {
	margin-top: 15px;
	margin-right: 70px;
}

.zone-A-1 {
	height: 150px;
	background-color: #FAF0E6;
	text-align: center;
	padding: 60px;
	cursor: pointer;
}

.zone-B {
	height: 150px;
	background-color: #FFDAB9;
	text-align: center;
	padding: 60px;
	cursor: pointer;
}

.font {
	font-size: 28px;
	font-weight: bold;
}

.logo {
	padding-top: 30px;
}

.seatInactive {
	background: red !important;
	border-color: red;
	padding: 5px;
	width: 30px;
	height: 30px;
	color: white !important;
	cursor: default;
}

.seatActive {
	background-color: #FAF0E6 !important;
	border-color: #FAF0E6;
	padding: 5px;
	width: 30px;
	height: 30px;
}

.seatActive-1 {
	background-color: #FFDAB9 !important;
	border-color: #FFDAB9;
	padding: 5px;
	width: 30px;
	height: 30px;
}

.seatSelect {
	background: green !important;
	padding: 5px;
	width: 30px;
	height: 30px;
	color: white !important;
}

html {
	height: 100%
}

#grad1 {
	background-color: : #9C27B0;
	background-image: linear-gradient(120deg, #FF4081, #81D4FA)
}

#msform {
	text-align: center;
	position: relative;
	margin-top: 20px
}

#msform fieldset .form-card {
	background: white;
	border: 0 none;
	border-radius: 0px;
	box-shadow: 0 2px 2px 2px rgba(0, 0, 0, 0.2);
	padding: 20px 40px 30px 40px;
	box-sizing: border-box;
	width: 94%;
	margin: 0 3% 20px 3%;
	position: relative
}

#msform fieldset {
	background: white;
	border: 0 none;
	border-radius: 0.5rem;
	box-sizing: border-box;
	width: 100%;
	margin: 0;
	padding-bottom: 20px;
	position: relative
}

#msform fieldset .form-card {
	text-align: left;
	color: #9E9E9E
}

#msform input, #msform textarea {
	padding: 0px 8px 4px 8px;
	border: none;
	border-bottom: 1px solid #ccc;
	border-radius: 0px;
	margin-bottom: 25px;
	margin-top: 2px;
	width: 100%;
	box-sizing: border-box;
	font-family: montserrat;
	color: #2C3E50;
	font-size: 16px;
	letter-spacing: 1px
}

#msform input:focus, #msform textarea:focus {
	-moz-box-shadow: none !important;
	-webkit-box-shadow: none !important;
	box-shadow: none !important;
	border: none;
	font-weight: bold;
	border-bottom: 2px solid skyblue;
	outline-width: 0
}

#msform .action-button {
	width: 100px;
	background: skyblue;
	font-weight: bold;
	color: white;
	border: 0 none;
	border-radius: 0px;
	cursor: pointer;
	padding: 10px 5px;
	margin: 10px 5px
}

#msform .action-button:hover, #msform .action-button:focus {
	box-shadow: 0 0 0 2px white, 0 0 0 3px skyblue
}

#msform .action-button-previous {
	width: 100px;
	background: #616161;
	font-weight: bold;
	color: white;
	border: 0 none;
	border-radius: 0px;
	cursor: pointer;
	padding: 10px 5px;
	margin: 10px 5px
}

#msform .action-button-previous:hover, #msform .action-button-previous:focus
	{
	box-shadow: 0 0 0 2px white, 0 0 0 3px #616161
}

select.list-dt {
	border: none;
	outline: 0;
	border-bottom: 1px solid #ccc;
	padding: 2px 5px 3px 5px;
	margin: 2px
}

select.list-dt:focus {
	border-bottom: 2px solid skyblue
}

.card {
	z-index: 0;
	border: none;
	border-radius: 0.5rem;
	position: relative;
	width: 960px;
}

.fs-title {
	font-size: 25px;
	color: #2C3E50;
	margin-bottom: 10px;
	font-weight: bold;
	text-align: left
}

#progressbar {
	margin-bottom: 30px;
	overflow: hidden;
	color: lightgrey
}

#progressbar .active {
	color: #000000
}

#progressbar li {
	list-style-type: none;
	font-size: 12px;
	width: 24%;
	float: left;
	position: relative
}

#progressbar #account:before {
	font-family: FontAwesome;
	content: "Step 1"
}

#progressbar #personal:before {
	font-family: FontAwesome;
	content: "Step 2"
}

#progressbar #payment:before {
	font-family: FontAwesome;
	content: "Step 3"
}

#progressbar #confirm:before {
	font-family: FontAwesome;
	content: "Step 4"
}

#progressbar li:before {
	width: 60px;
	height: 60px;
	line-height: 52px;
	display: block;
	font-size: 18px;
	color: #ffffff;
	background: lightgray;
	border-radius: 50%;
	margin: 0 auto 10px auto;
	padding: 2px
}

#progressbar li:after {
	content: '';
	width: 100%;
	height: 2px;
	background: lightgray;
	position: absolute;
	left: 0;
	top: 25px;
	z-index: -1
}

#progressbar li.active:before, #progressbar li.active:after {
	background: skyblue
}

.radio-group {
	position: relative;
	margin-bottom: 25px
}

.radio {
	display: inline-block;
	width: 204;
	height: 104;
	border-radius: 0;
	background: lightblue;
	box-shadow: 0 2px 2px 2px rgba(0, 0, 0, 0.2);
	box-sizing: border-box;
	cursor: pointer;
	margin: 8px 2px
}

.radio:hover {
	box-shadow: 2px 2px 2px 2px rgba(0, 0, 0, 0.3)
}

.radio.selected {
	box-shadow: 1px 1px 2px 2px rgba(0, 0, 0, 0.1)
}

.fit-image {
	width: 100%;
	object-fit: cover
}

.font {
	font-size: 14px;
}

.noneShow {
	display: none;
}

.text {
	text-align: center;
}
</style>

<script type="text/javascript">
	 
	<?php $tmpZone =''?>
	 var tmppp ='';
	$(document).ready(function(){

		var current_fs, next_fs, previous_fs; //fieldsets
		var opacity;
	
		$(".next").click(function(){
			//alert('next');
			current_fs = $(this).parent();
			next_fs = $(this).parent().next();

			//alert(current_fs +'   ---   '+ next_fs);
		
			//Add Class Active
			$("#progressbar li").eq($("fieldset").index(next_fs)).addClass("active");
		
			//show the next fieldset
			next_fs.show();
			//hide the current fieldset with style
			current_fs.animate({opacity: 0}, {
			step: function(now) {
				// for making fielset appear animation
					opacity = 1 - now;
					current_fs.css({
						'display': 'none',
						'position': 'relative'
					});
					
					next_fs.css({'opacity': opacity});
				},duration: 600
			});	

			keepSeatSelect();
		});
	
		$(".previous").click(function(){
	
			current_fs = $(this).parent();
			previous_fs = $(this).parent().prev();
		
			//Remove class active
			$("#progressbar li").eq($("fieldset").index(current_fs)).removeClass("active");
		
			//show the previous fieldset
			previous_fs.show();
		
			//hide the current fieldset with style
			current_fs.animate({opacity: 0}, {
			step: function(now) {
			// for making fielset appear animation
			opacity = 1 - now;
		
			current_fs.css({
				'display': 'none',
				'position': 'relative'
			});
			
			previous_fs.css({'opacity': opacity});
			},
			duration: 600
			});

			clearSeat();
		});
	
		$('.radio-group .radio').click(function(){
			$(this).parent().find('.radio').removeClass('selected');
			$(this).addClass('selected');
		});
	
		$(".submit").click(function(){
			return false;
		});

		$(".zoneA").click(function(){
			tiggerNextStepFirstStep('A');
		});

		$(".zoneB").click(function(){
			tiggerNextStepFirstStep('B');
		});
		
		$(".zoneC").click(function(){
			tiggerNextStepFirstStep('C');
			
		});

		$(".zoneD").click(function(){
			tiggerNextStepFirstStep('D');
		});

	});

	
	
	function tiggerNextStepFirstStep(zoneName){
		$('#zoneSelect').text(zoneName);
		$('#zoneN').text(zoneName);
		if(zoneName == 'A'){
			$('#priceZone').val('3500');
			$('#seatZoneA').removeClass('noneShow');
			$('#seatZoneB').addClass('noneShow');
			$('#seatZoneC').addClass('noneShow');
			$('#seatZoneD').addClass('noneShow');
		}else if(zoneName == 'B'){
			$('#priceZone').val('3500');
			$('#seatZoneA').addClass('noneShow');
			$('#seatZoneB').removeClass('noneShow');
			$('#seatZoneC').addClass('noneShow');
			$('#seatZoneD').addClass('noneShow');
		}else if(zoneName == 'C'){
			$('#priceZone').val('2500');
			$('#seatZoneA').addClass('noneShow');
			$('#seatZoneB').addClass('noneShow');
			$('#seatZoneC').removeClass('noneShow');
			$('#seatZoneD').addClass('noneShow');
		}else if(zoneName == 'D'){
			$('#priceZone').val('2500');
			$('#seatZoneA').addClass('noneShow');
			$('#seatZoneB').addClass('noneShow');
			$('#seatZoneC').addClass('noneShow');
			$('#seatZoneD').removeClass('noneShow');
		}
		
		$( "#btnFirstStep" ).click();
	}

	function clearSeat(){
		$(".seatSelect" ).each(function() {
			$(this).html('');
			$(this).removeClass('seatSelect');
			
			if($('#zoneN').text()== 'A' || $('#zoneN').text()== 'B'){
				$(this).addClass('seatActive');
			}else{
				$(this).addClass('seatActive-1');

			} 
		 });
		}

	var tmpSeat = '';
	var count = 0;
	function keepSeatSelect(){
		 tmpSeat ='';
		 $(".seatSelect" ).each(function() {
			 tmpSeat = (tmpSeat == '' ? $(this).attr('id') : tmpSeat +','+$(this).attr('id'));
			 count++;
		 });
		//alert(count +' '+ $('#priceZone').val());
		 $('#seatPrice').text((count * $('#priceZone').val()) +' Bath');
		 $('#seatSelect').text(tmpSeat);
		 $('#seatSelectHid').val(tmpSeat);
		 $('#seatPriceHid').val(count * $('#priceZone').val());
		 //alert(tmpSeat);
	}
	

	function selectSeat(thiz){
		//alert($(thiz).attr('id'));
		var numItems = $('.seatSelect').length;
		
		if($(thiz).hasClass('seatSelect')){
			$(thiz).addClass('seatActive');
			$(thiz).removeClass('seatSelect');
			$(thiz).html('');
		}else{
			if(numItems < 5){
				$(thiz).removeClass('seatActive');
				$(thiz).addClass('seatSelect');
				$(thiz).html('&#10003');
			}else{
				alert("เลิอกได้สูงสุด 5 ที่นั่ง");
			}
			
		}
		
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
				<li><a href="Home.php">Home</a></li>
				<li class="selected"><a href="Buy.php">Buy Ticket</a></li>
				<!-- 				<li><a href="Ticket.php">Ticket</a></li> -->

				<li class="nav-item dropdown"><a class="nav-link dropdown-toggle"
					href="#" id="navbarDropdown" role="button" data-toggle="dropdown"
					aria-haspopup="true" aria-expanded="false"
					style="line-height: 135px;"> Edit </a>
					<div class="dropdown-menu" aria-labelledby="navbarDropdown">
						<a class="dropdown-item" href="Edit.php">Edit information</a> 
<!-- 						<a class="dropdown-item" href="purchase.php">Purchase history</a> -->
					</div></li>
				<li>
					<form action="/MyTicketProject/login.php" id="logoutForm">
						<button type="submit" class="btn btn-danger text-align"
							onclick="BuyTicket(this);">Logout</button>
					</form>
				</li>
			</ul>
		</div>
	</div>

	<div id="contents">
		<div class="row mt-0">
			<div
				class="col-11 col-sm-9 col-md-7 col-lg-6 text-center p-0 mt-3 mb-2">
				<div class="card px-0 pt-4 pb-0 mt-3 mb-3">

					<div class="row">
						<div class="col-md-12 mx-0">
							<form id="msform" action="/MyTicketProject/save_action.php"
								method="post">
								<!-- progressbar -->
								<ul id="progressbar">
									<li class="active" id="account"><strong>แผนผัง</strong></li>
									<li id="personal"><strong>เลือกที่นั่ง</strong></li>
									<li id="payment"><strong>ยืนยัน</strong></li>
									<li id="confirm"><strong>ชำระเงิน</strong></li>

								</ul>
								<!-- fieldsets -->
								<fieldset>

									<div class="form-card">
										<div class="row"
											style="background-color: #EEE9E9; padding: 10px">
											<div class="col-md-3 col-md-push-9">
												<img src="images/<?php echo $img?>" alt="Img"
													style="width: 180px; height: 250px">
											</div>
											<div class="col-md-9 col-md-pull-3">

												<div class="row">
													<div class="col-md-12">
														<label class="label" style="font-size: 22px;"><?php echo $conname ?></label>
														<input type="hidden" id="conID" name="conID" value="<?php echo $conid?>" />
													</div>
												</div>
												<br>



												<div class="row">
													<div class="col-md-4">
														<label class="label">สถานที่แสดง / Venue :</label>
													</div>
													<div class="col-md-8"><?php echo $location?></div>
												</div>

												<div class="row">
													<div class="col-md-4">
														<label class="label">ผู้จัด / Promoter: </label>
													</div>
													<div class="col-md-8"><?php echo $organizer?></div>
												</div>

												<div class="row">
													<div class="col-md-7">
														<label class="label">วันและเวลาการแสดง / Show Date and
															Time : </label>
													</div>
													<div class="col-md-5"><?php echo $showtime." ".$condate?></div>
												</div>

												<div class="row">
													<div class="col-md-12">
														<button type="button" class="btn btn-danger"
															data-toggle="modal" data-target="#exampleModalLong">
															ที่นั่งว่าง / Seats Available</button>

													</div>

												</div>

											</div>
										</div>
										<div class="row" style="padding-top: 50px;">
											<h2>แผนผังที่นั่ง</h2>
										</div>

										<div class="row" style="padding-top: 50px;">

											<div class="col-md-9 col-md-push-3">
												<div class="row stage">
													<div class="col-md-9 stage-1">
														<label style="font-size: 20px; font-weight: bold;">STAGE</label>
													</div>
													<div class="col-md-3"></div>
												</div>

												<div class="row zone-A">
													<div class="col-md-5 zone-A-1 zoneA">
														<label class="font">A</label>
													</div>
													<div class="col-md-2"></div>
													<div class="col-md-5 zone-A-1 zoneB">
														<label class="font">B</label>
													</div>
												</div>

												<div class="row zone-A">
													<div class="col-md-5  zone-B zoneC">
														<label class="font">C</label>
													</div>
													<div class="col-md-2"></div>
													<div class="col-md-5  zone-B zoneD">
														<label class="font">D</label>
													</div>
												</div>

											</div>
											<div class="col-md-3">
												<img src="images/<?php echo $img1?>" alt="Img"
													style="width: 190px; height: 400px">
											</div>

										</div>
									</div>

									<input type="button" name="next" id="btnFirstStep"
										class="next action-button" value="Next Step"
										style="display: none;" />

								</fieldset>
								<fieldset style="display: none">
									<div class="form-card">
										<h2>
											เลือกที่นั่ง Zone <label id="zoneN"></label>
										</h2>
										<input type="hidden" id="priceZone" name="priceZone" />
										<div class="step-content" id="seatZoneA">
											<?php if(true){?>
												<table>
													<?php for ($row = 1; $row <= 12; $row++) {?>
														<tr>
														<?php for ($col = 1; $col <= 24; $col++) {?>
															<td>
																<?php $tmp = 'A'.$row.$col?>
																<?php if(strpos($seat, $tmp) == true){ ?>
																	<button type="button" class="btn seatInactive" disabled>&#x2718;</button>
																<?php }else{?>
																	<button type="button" class="btn seatActive"
															onclick="selectSeat(this);" id="<?php echo $tmp?>"></button>
																<?php }?>
															</td>
							  							<?php } ?>
							  							</tr>
													<?php } ?>
												</table>
											<?php }?>
										</div>

										<div class="step-content" id="seatZoneB">
											<?php if(true){?>
												<table>
													<?php for ($row = 1; $row <= 12; $row++) {?>
														<tr>
														<?php for ($col = 1; $col <= 24; $col++) {?>
															<td>
																<?php $tmp = 'B'.$row.$col?>
																<?php if(strpos($seat, $tmp) == true){ ?>
																	<button type="button" class="btn seatInactive" disabled>&#x2718;</button>
																<?php }else{?>
																	<button type="button" class="btn seatActive"
															onclick="selectSeat(this);" id="<?php echo $tmp?>"></button>
																<?php }?>
															</td>
							  							<?php } ?>
							  							</tr>
													<?php } ?>
												</table>
											<?php }?>
										</div>

										<div class="step-content" id="seatZoneC">
											<?php if(true){?>
												<table>
													<?php for ($row = 1; $row <= 12; $row++) {?>
														<tr>
														<?php for ($col = 1; $col <= 24; $col++) {?>
															<td>
																<?php $tmp = 'C'.$row.$col?>
																<?php if(strpos($seat, $tmp) == true){ ?>
																	<button type="button" class="btn seatInactive" disabled>&#x2718;</button>
																<?php }else{?>
																	<button type="button" class="btn seatActive-1"
															onclick="selectSeat(this);" id="<?php echo $tmp?>"></button>
																<?php }?>
															</td>
							  							<?php } ?>
							  							</tr>
													<?php } ?>
												</table>
											<?php }?>
										</div>


										<div class="step-content" id="seatZoneD">
											<?php if(true){?>
												<table>
													<?php for ($row = 1; $row <= 12; $row++) {?>
														<tr>
														<?php for ($col = 1; $col <= 24; $col++) {?>
															<td>
																<?php $tmp = 'D'.$row.$col?>
																<?php if(strpos($seat, $tmp) == true){ ?>
																	<button type="button" class="btn seatInactive" disabled>&#x2718;</button>
																<?php }else{?>
																	<button type="button" class="btn seatActive-1"
															onclick="selectSeat(this);" id="<?php echo $tmp?>"></button>
																<?php }?>
															</td>
							  							<?php } ?>
							  							</tr>
													<?php } ?>
												</table>
											<?php }?>
										</div>

									</div>
									<input type="button" name="previous"
										class="previous action-button-previous" value="Previous" /> <input
										type="button" name="next" class="next action-button"
										value="Next Step" />
								</fieldset>
								<fieldset style="display: none">
									<div class="form-card">
										<h2 class="fs-title">Payment Information</h2>
										<div class="radio-group">
											<div class="row"
												style="background-color: #EEE9E9; padding: 10px">
												<div class="col-md-3 col-md-push-9">
													<img src="images/1_1.jpg" alt="Img"
														style="width: 180px; height: 250px">
												</div>
												<div class="col-md-9 col-md-pull-3">
													<div class="row">
														<div class="col-md-12">
															<label class="label" style="font-size: 22px;"><?php echo $conname ?></label>
														</div>
													</div>
													<br>

													<div class="row font">
														<div class="col-md-4">
															<label class="label">สถานที่แสดง / Venue :</label>
														</div>
														<div class="col-md-8"><?php echo $location?></div>
													</div>

													<div class="row font">
														<div class="col-md-4">
															<label class="label">วันและเวลาการแสดง / Show Date and
																Time :</label>
														</div>
														<div class="col-md-8"><?php echo $showtime." ".$condate?></div>
													</div>

													<div class="row font">
														<div class="col-md-4">
															<label class="label">โซนที่นั่ง / Zone : </label>
														</div>
														<div class="col-md-8">
															<label id="zoneSelect" name="zoneSelect"></label>
														</div>
													</div>

													<div class="row font">
														<div class="col-md-4">
															<label class="label">เลขที่นั่ง / Seat :</label>
														</div>
														<div class="col-md-8">
															<input type="hidden" id="seatSelectHid"
																name="seatSelectHid" /> <label id="seatSelect"
																name="seatSelect"></label>
														</div>
													</div>

													<div class="row font">
														<div class="col-md-4">
															<label class="label">ราคา / Price :</label>
														</div>
														<input type="hidden" id="seatPriceHid" name="seatPriceHid" />
														<div class="col-md-8">
															<label id="seatPrice" name="seatPrice"></label>
														</div>
													</div>


												</div>
											</div>


										</div>


									</div>
									<input type="button" name="previous"
										class="previous action-button-previous" value="Previous" /> <input
										type="submit" name="make_payment" class="action-button"
										value="Save" />
								</fieldset>

								<fieldset style="display: none">
									<div class="form-card">
										<h2 class="fs-title text-center">Complete !</h2>
										<br> <br>
										<div class="row justify-content-center">
											<div class="col-3">
												<img src="https://img.icons8.com/color/96/000000/ok--v2.png"
													class="fit-image">
											</div>
										</div>
										<br> <br>
										<div class="row justify-content-center">
											<div class="col-7 text-center">
												<h5>You have purchased the card successfully</h5>
											</div>
										</div>
									</div>
								</fieldset>
							</form>
						</div>
					</div>
				</div>
			</div>
		</div>


	</div>

	<!-- Modal -->
	<div class="modal fade" id="exampleModalLong" tabindex="-1"
		role="dialog" aria-labelledby="exampleModalLongTitle"
		aria-hidden="true">
		<div class="modal-dialog" role="document">
			<div class="modal-content">
				<div class="modal-header">
					<h5 class="modal-title" id="exampleModalLongTitle">โซนที่นั่ง /
						Zone</h5>
					<button type="button" class="close" data-dismiss="modal"
						aria-label="Close">
						<span aria-hidden="true">&times;</span>
					</button>
				</div>
				<div class="modal-body">
					<table class="table text">
						<thead class="thead-dark">
							<tr>
								<th scope="col">โซน</th>
								<th scope="col">ที่นั่งว่าง</th>

							</tr>
						</thead>
						<tbody>
							<tr>
								<td >A</td>
								<td><?php echo $seatZoneAAvalible ?></td>
							</tr>
							<tr>
								<td>B</td>
								<td><?php echo $seatZoneBAvalible ?></td>
							</tr>
							<tr>
								<td>C</td>
								<td><?php echo $seatZoneCAvalible?></td>
							</tr>
							<tr>
								<td>D</td>
								<td><?php echo $seatZoneDAvalible?></td>
							</tr>
						</tbody>
					</table>
				</div>
				<div class="modal-footer">
					<button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>

				</div>
			</div>
		</div>
	</div>

</body>
</html>


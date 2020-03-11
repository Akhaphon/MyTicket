<?php
session_start ();
	include ("connectionDB.php");
	
	$memberid = $_SESSION["memberID"];
	$conid = $_POST["conID"];
	$seat = $_POST["seatSelectHid"];
	$price = $_POST["seatPriceHid"];
	$currentDate = date("Y-m-d");

	// random
	function getRand(){
		return rand(0,10000000);
	}
	$rand = getRand();
// image
	$arrImg = array(
		1 => '1_1.jpg',
		2 => '2_2.jpg',
		3 => '3_3.jpg',
		4 => '4_2.jpg',
		5 => '5_1.jpg',
		6 => '6_1.jpg'
	);

	$img = "<img src=\"images/".$arrImg[$conid]."\" alt=\"Img\">";

	require_once __DIR__ . '/vendor/autoload.php';
	$mpdf = new \Mpdf\Mpdf();

	$str = "<br>".
	$img ."<br>".
	"<br>"."Invoice : " . $rand. "<br>".
	"MemberID : " . $memberid . "<br>" .
	"ConcertID : " . $conid . "<br>" .
	"Seat : " . $seat . "<br>" .
	"Price : " . $price . "<br>" .
	"Date : " . $currentDate . "<br>" ."</p>";

	$mpdf->WriteHTML($str);

	$sql = "INSERT INTO purchase(member_id, con_id, seat, price, price_status, confirm_date) VALUES (".$memberid.",".$conid.",'".$seat."',".$price.",'A','".$currentDate."')";
	
	if ($con->query ( $sql ) === TRUE) {
		// header("location:Home.php");
		// echo "inserted";
	$mpdf->Output('payment/'.$memberid.'.pdf', \Mpdf\Output\Destination::DOWNLOAD);
	}else{

	}

	header("location:Home.php");
?>

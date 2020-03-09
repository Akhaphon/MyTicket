<?php
session_start ();
	include ("connectionDB.php");
	
	$memberid = $_SESSION["memberID"];
	$conid = $_POST["conID"];
	$seat = $_POST["seatSelectHid"];
	$price = $_POST["seatPriceHid"];
	$currentDate = date("Y-m-d");

	require_once __DIR__ . '/vendor/autoload.php';

	$mpdf = new \Mpdf\Mpdf();


	$mpdf->WriteHTML("MemberID :" . $memberid . "<br>" .
	"ConcertID :" . $conid . "<br>" .
	"Seat :" . $seat . "<br>" .
	"Price :" . $price . "<br>" .
	"CurrentDate :" . $currentDate . "<br>");

	$sql = "INSERT INTO purchase(member_id, con_id, seat, price, price_status, confirm_date) VALUES (".$memberid.",".$conid.",'".$seat."',".$price.",'A','".$currentDate."')";
	
	if ($con->query ( $sql ) === TRUE) {
		header("location:Home.php");
	}else{
		
	}

$mpdf->Output();
?>

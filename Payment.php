<?php

session_start();
include("connectionDB.php");

$memberid = $_SESSION["memberID"];
$conid = $_POST["conID"];
$seat = $_POST["seatSelectHid"];
$price = $_POST["seatPriceHid"];
$currentDate = date("Y-m-d");

require_once __DIR__ . '/vender/autoload.php';

$mpdf = new \Mpdf\Mpdf();


$toPDF = "MemberID : .'$memberid'. <br>
ConcertID : .'$conid'.<br>
Seat : .'$seat'.<br>
Price : .'$price'.<br>
CurrentDate : .'$currentDate'.<br>";

$mpdf->WriteHTML($toPDF);

$mpdf->Output();
?>


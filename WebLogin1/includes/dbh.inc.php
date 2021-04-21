<?php
$servername = "localhost";
$dBUsername = "root";
$dBPwd = "";
$dBName = "weblogin";

$conn = mysqli_connect($servername,$dBUsername,$dBPwd,$dBName);

if(!$conn){
	die("Failed to connect to DB, error: " .mysqli_connect_error());
}
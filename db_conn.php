<?php  

$sname = "localhost";
$uname = "root";
$password = "root";

$db_name = "image";

$conn = new mysqli($sname, $uname, $password, $db_name);

if($conn->connect_error)
{
	die("Xatolik".$conn->connect_error);
}
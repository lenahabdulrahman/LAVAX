<!--Reema Almobarak
Razan Aboali
Leena Alghamdi
Nouf Alghamdi
Rayanh Alyami
Jumana Aleleyo
Lenah Al-Helal-->

<?php
session_start();
ob_start();
$server_name = "localhost";
$username = "root";
$password="";
$database="tables";
$connection = mysqli_connect($server_name,$username,$password,$database);
if(!$connection){
	echo "ERROR! Unable to connect with DB";
}


?>
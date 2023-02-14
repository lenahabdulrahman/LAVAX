<!--Reema Almobarak
Razan Aboali
Leena Alghamdi
Nouf Alghamdi
Rayanh Alyami
Jumana Aleleyo
Lenah Al-Helal-->


<?php

include_once("config1.php");
$usern=$_SESSION["customerid"];


$delquery="delete from cart where customerid='$usern'";
$run=mysqli_query($connection,$delquery);

session_destroy();
setcookie("username", "", time()-3600);
header("location: Sign in.php");



?>
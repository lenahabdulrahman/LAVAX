<!--Reema Almobarak
Razan Aboali
Leena Alghamdi
Nouf Alghamdi
Rayanh Alyami
Jumana Aleleyo
Lenah Al-Helal-->

<html>
    <head>
        <meta charset="utf-8">
        <title>Sign in</title>
      <link rel="stylesheet" type="text/css" href="style.css">
	  <script type="text/javascript" src="simplejava.js"></script>
    </head>
    <body>  
       <div class="main">
			 <?php include 'header.php'?>
					
					</div>
        <h2>Sign in</h2>
<div class="body">
<br>

<?php
$emaildb=0;
$passworddb=0;
if(isset($_POST['login'])){
$email=$_POST['email'];
$password=$_POST['password'];
$type=$_POST['type'];

if($type==0) { $query="select * from admins where email_address='$email'"; }
else if($type==1){ $query="select * from customers where email_address='$email'"; }
else {}

$select=mysqli_query($conn, $query);
$row=mysqli_fetch_array($select);
if(isset($row)){
$emaildb=$row['email_address'];
$namedb=$row['name'];
$passworddb=$row['password'];
$ID=$row['id'];
}
if($emaildb==$email && $passworddb==$password){

if($type==0) { 
$_SESSION["rank"]="admin";

header("location: Admin.php"); }
else if($type==1){
$_SESSION["rank"]="customer"; 
$_SESSION["customerid"]=$ID;
$_SESSION["nameuser"]=$namedb;
setcookie("username", $ID, time()+30*24*60*60);
 header("location: candles.php"); }


}
else {
echo "<center><h3 style='color:red;'> Your Email or Password is Wrong! </h3></center>";
}





//end isset
}


?>

<br>
            <div class="empty">
                 <form method="post" action="Sign in.php">
          
              
              
          <center><p><label >Email Address:<br>
          <input  class="format" name="email" type="email" id="email">
              </label></p></center>
              <center><p><label>Password:<br>
          <input  class="format" name="password" type="password" id="password">
              </label></p></center>
			  
			  <center><p>
          <select name="type" id="typee">
		  <option value="1"> Customer </option>
		  <option value="0"> Admin </option>
		  
		  </select>
              </p></center> 
			  
         <center><input type="submit"  class="button" value="Sign in" name="login" onClick="return checklogin()"></center>
     </form></div>
       <footer>
			<p class="footer">All rights reserved.</p>
			<div class="social-icons">
				<img class="sicon" src="PHOTO/icons/twitter.png"> 
				<img class="sicon" src="PHOTO/icons/facebook.png"> 
				<img class="sicon" src="PHOTO/icons/instagram.png"> 
				<img class="sicon" src="PHOTO/icons/youtube.png"> 
			</div>
    </footer>
        </div>
    </body>
</html>


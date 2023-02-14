<?php  
function succ(){
echo "<script>
			window.alert('You are Register Successfully!');
			location.href='Sign in.php';
		</script>";
}

?>

<html>
    <head>
        <meta charset="utf-8">
        <title>Sign up</title>
<link rel="stylesheet" type="text/css" href="style.css">
<script type="text/javascript" src="js/simplejava.js"></script>


    </head>
    <body>  
       <div class="main">
			<header>
					<div class="logo">
					<img src="PHOTO/Logo.jpeg" width="130">
                      <h4> <a href="index.php">Home</a> | <a href="candles.php">Candles</a> | <a href="candles.php#new"> New Arrivals</a>  |<a href="contact.php">Contact us</a></h4>
				</div>
                 <button type="button" class="search-button" style="position: relative; bottom: 4em" onClick="window.location.href='Sign in.php'">Sign in</button>
				<div class="search">
				 <button  style="position: relative; top: 0.3em" class="cart-icon" type="button" name="cart" onClick="window.location.href='shoppingCart.php'"><img src="PHOTO/icons/cart.png"></button></div>
                    </header></div>
					
					
					<?php
include_once("config1.php");
 $seq="SELECT * FROM customers
ORDER BY id DESC;";
 $seqk=mysqli_query($connection, $seq);
$now=mysqli_fetch_array($seqk);
$num=$now['id'];
$numnew=$num+1;
if(isset($_POST['register'])){
$name=$_POST['name'];
$email=$_POST['email'];
$password=$_POST['password'];
$cpassword=$_POST['cpassword'];
$phone=$_POST['phone'];
$address=$_POST['address'];

if($password==$cpassword){
$query="insert into customers (id,name,email_address,password,address ,phone_no) values ('$numnew','$name','$email','$password','$address','$phone')";
$signup=mysqli_query($connection,$query);
if($signup){
succ();
}
}
else{
echo '<br><center><h3> Your Both Passwords are not Matched! </h3><center>'; 

}




//end isset
}


?>

					
					
					
					
        <h2>Welcome To Lavax !<br> Sign up</h2>
<div class="body">
            <div class="empty">

				
				
          <form method="post" onSubmit="return regValidate()" action="Signup.php" name="form1" >
               <center><p><label class="size">Name:<br>
          <input  class="format" name="name" type="text" id="namee" >
              </label></p></center>
              
          <center><p><label class="size">Email Address:<br>
          <input  class="format" name="email" type="email"  >
              </label></p></center>
			  
              <center><p><label class="size">Password:<br>
          <input  class="format" name="password" type="password" >
              </label></p></center>
              <center><p><label class="size">Confirm Password:<br>
          <input  class="format" name="cpassword" type="password" >
              </label></p></center> 
           <center><p><label class="size">Phone No.:<br>
          <input  class="format" name="phone" type="tel" placeholder="(+966) 5* *** ****" >
              </label></p></center> 
			   <center><p><label class="size">Address:<br>
          <input  class="format" name="address" type="text"  required>
              </label></p></center>
			  
			  
         <center><input class="button" type="submit" value="Register" name="register" id="hellobutton"></center>
     </form></div></div>     
	 <script type="text/javascript">
  

document.getElementById("hellobutton").addEventListener("click", formValidate);
</script>

	  
       <footer>
			<p class="footer">All rights reserved.</p>
			<div class="social-icons">
				<img class="sicon" src="PHOTO/icons/twitter.png"> 
				<img class="sicon" src="PHOTO/icons/facebook.png"> 
				<img class="sicon" src="PHOTO/icons/instagram.png"> 
				<img class="sicon" src="PHOTO/icons/youtube.png"> 
			</div>
		</footer>
    </body>
</html>

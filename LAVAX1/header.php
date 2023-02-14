<!--Reema Almobarak
Razan Aboali
Leena Alghamdi
Nouf Alghamdi
Rayanh Alyami
Jumana Aleleyo
Lenah Al-Helal-->


<header>
    <div class="logo"> <a href="index.php">
        <img src="PHOTO/Logo.jpeg" width="130"> </a>
        <h4> <a href="index.php">Home</a> | <a href="candles.php">Candles</a> | <a href="candles.php#new"> New Arrivals</a>  |<a href="contact.php">Contact us</a></h4>
    </div> 
	 <?php 
	 include 'config.php';
  if(!isset($_SESSION["customerid"])){
  ?>
    <button type="button" class="search-button" style="position: relative; bottom: 4em" onClick="window.location.href='Sign in.php'">Sign in</button>
    <button type="button" class="search-button" style="position: relative; bottom: 4em" onClick="window.location.href='Signup.php'">Sign up</button>
	  <?php  } else {?>
	  
	  
    <button type="button" class="search-button" style="position: relative; bottom: 4em" onClick="window.location.href='logout.php'">Log out</button>
	  <?php  }
	  
	  if(isset($_SESSION["nameuser"])){
	  echo 'Welcome '; echo $_SESSION["nameuser"];
	  }
	  
	  
	  ?> 
    <div class="search">
	
	<?php
	$it=0;
if(isset($_SESSION["customerid"])){
	 $usern=$_SESSION["customerid"];



$query="select * from cart where customerid='$usern'";

$run=mysqli_query($conn,$query);

while($rows=mysqli_fetch_array($run)){

$pid=$rows['id'];
$it++;

}
	}
	?>
      Items in cart = <?php echo $it; ?>
        <button style="position: relative; top: 0.3em" class="cart-icon" type="button" name="cart" onClick="window.location.href='shoppingCart.php'" ><img
                src="PHOTO/icons/cart.png"></button>
    </div>
</header>
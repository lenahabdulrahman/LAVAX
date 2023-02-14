
<!--Reema Almobarak
Razan Aboali
Leena Alghamdi
Nouf Alghamdi
Rayanh Alyami
Jumana Aleleyo
Lenah Al-Helal-->

<?php

include_once("config1.php");



?>

<html>

    <head>

        <meta charset = "utf-8">

        <title>Thank You</title>

<link rel="stylesheet" type="text/css" href="style.css">

        </head>



        <body>

            	<div class="main">

			<header>

				<div class="logo">

					<img src="PHOTO/Logo.jpeg" width="130">

                     <h4> <a href="index.php">Home</a> | <a href="candles.php">Candles</a> | <a href="candles.php#new"> New Arrivals</a>  |<a href="contact.php">Contact us</a></h4>

				</div>

                 <?php 

  if(!isset($_SESSION["customerid"])){

  ?>

    <button type="button" class="search-button" style="position: relative; bottom: 4em" onClick="window.location.href='Sign in.html'">Sign in</button>

    <button type="button" class="search-button" style="position: relative; bottom: 4em" onClick="window.location.href='Sign up.html'">Sign up</button>

	  <?php  } else {?>

	  

	

    <button type="button" class="search-button" style="position: relative; bottom: 4em" onClick="window.location.href='logout.php'">Log out</button>

	  <?php  }?>

				<div class="search">

				 <button  style="position: relative; top: 0.3em" class="cart-icon" type="button" name="cart" onClick="window.location.href='shoppingCart.php'"><img src="PHOTO/icons/cart.png"></button></div>

                    </header></div>



               <h2><center>Thank You For Order</center></h2>

               <br> <div class="shopping-cart">

			   

			    <?php

 include_once("config1.php");

 $usern=$_SESSION["customerid"];

 if(isset($_POST['order'])){

 

$totalbill=$_POST['totalbill'];

$method=$_POST['payment_method'];

$query="insert into orders (customer_id,total_bill,payment_method) values ('$usern','$totalbill','$method')";

$run=mysqli_query($connection,$query);



$query1="select * from orders ORDER BY id DESC";

$select=mysqli_query($connection, $query1);

$row=mysqli_fetch_array($select);

$orderid=$row['id'];



$query2="select * from cart where customerid='$usern'";

$select2=mysqli_query($connection, $query2);

while($rows=mysqli_fetch_array($select2)){






//adjudt stock




$pid=$rows['id'];

 $pamount=$rows['productquantity'];

$query="insert into order_product (id_product,id_order) values ('$pid','$orderid')";

$run=mysqli_query($connection,$query);


$query1="select * from products where id='$pid'";

$run1=mysqli_query($connection,$query1);

$rows1=mysqli_fetch_array($run1);

$stock=$rows1['quantity'];

$newstock=$stock-$pamount;



$query2="update products set quantity='$newstock' where id='$pid'";

$run2=mysqli_query($connection,$query2);



}

















$delquery="delete from cart where customerid='$usern'";

$run=mysqli_query($connection,$delquery);



}





 ?>
<script type="text/javascript">
   
  alert("Thanks for your Purchase! Your Billl is <?php echo $totalbill ?> Thank You!");

</script>
             <!-- item #1 --> <center>

			<div class="item"> <center>

<a href="index.php"> <h2> Go back to Home </h2> </a> 

</center>

</div>

			 

			 

			

             <!-- item #2 -->

			

             <!-- item #3 --><center>

			

            

	<div>

      

	

	

            <br>

		</div>	

 <footer style="position: relative; top: 10em;">

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
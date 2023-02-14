<!--Reema Almobarak
Razan Aboali
Leena Alghamdi
Nouf Alghamdi
Rayanh Alyami
Jumana Aleleyo
Lenah Al-Helal-->


<html>

    <head>

        <meta charset = "utf-8">

        <title>Checkout</title>

<link rel="stylesheet" type="text/css" href="style.css">

<style>

.alert{

color:#FF0000;

font-weight:bold;

}

</style>

        </head>



        <body>

            	<div class="main">

			 <?php include 'header.php'?>
			 
			 <?php
			 $it=0;
			 
			 $query="select * from cart where customerid='$usern'";

$run=mysqli_query($conn,$query);

while($rows=mysqli_fetch_array($run)){

$pid=$rows['id'];
$it++;

}
			 



if($_SESSION["rank"]=="customer")

echo "";

else

header("location: logout.php");



?>
			</div>



               <h2><center>SHOPPING CART</center></h2>

               <br> <div class="shopping-cart">

             <!-- item #1 -->

			 

			  <?php

			  

			  

	if(isset($_POST['update'])){

	 $usern=$_SESSION["customerid"];

	$addid=$_POST['piid'];

	 $itemamount=$_POST['amount'];



$query5="select * from products where id='$addid'";

$run5=mysqli_query($conn,$query5);

$rows5=mysqli_fetch_array($run5);

$cstock=$rows5['quantity'];



if($itemamount<=0 || $itemamount==null){ echo'<div class="alert alert-warning alert-dismissible">

    <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>

    <strong>Warning!</strong> Please Enter Positive Number!

  </div>';}

 else if($itemamount>$cstock){ 

 $getquery="select * from products where id='$addid'";

$runpget=mysqli_query($conn,$getquery);

$sst=mysqli_fetch_array($runpget);

$ssto=$sst['quantity'];

 

 echo'<div class="alert alert-warning alert-dismissible">

    <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>

    <strong>Warning!</strong> We have limited stock! We have only '.$ssto.' Items!

  </div>';}

else{



$cquery="select * from cart where id='$addid' and customerid='$usern'";

$runq=mysqli_query($conn,$cquery);

$row=mysqli_fetch_array($runq);

$cid=$row['id'];

$amount=$row['productquantity'];

$price=$row['price'];



$tprice=$price*$itemamount;

$updatequery="update cart set productquantity='$itemamount', totalprice='$tprice' where id='$addid' and customerid='$usern'";

$save=mysqli_query($conn, $updatequery);



//header("location: shoppingCart.php");

}

	

	

	}



			  

 

 if(isset($_GET['delete_item'])){

$deleteid=$_GET['delete_item'];

$query2="delete from cart where id='$deleteid'";

$delete=mysqli_query($conn, $query2);
header("location: shoppingCart.php");

}

 

 $usern=$_SESSION["customerid"];



$query="select * from cart where customerid='$usern'";

$run=mysqli_query($conn,$query);

while($rows=mysqli_fetch_array($run)){

$pid=$rows['id'];

$pname=$rows['name'];

$productquantity=$rows['productquantity'];

$pprice=$rows['price'];

$tprice=$rows['totalprice'];

$picpath=$rows['image'];

 ?>

			 

			<form method="post" action="shoppingCart.php"> 

			 <input type="hidden" name="piid" value="<?php echo $pid; ?>">

			<div class="item">

				<a href="shoppingCart.php?delete_item=<?php echo $pid; ?>"><div class="buttons"><span class="delete-btn"><p style="color:white;">X</p> </span></div> </a>



				<div class="description">

					<img src="<?php echo $picpath; ?>" height="80px" width="80px"   ><br>

					<span style="position: relative; right: 7em;"><?php echo $pname; ?></span>

				</div>

				<div style="position: relative;left: 1em;">

					<input class="number" type="number" min="1", max="10" value="<?php echo $productquantity; ?>" name="amount">

                </div>



				<div style="position: relative;left: 4em;"><strong><input class="total-price" type="text" size="25" value="<?php echo $tprice; ?> SR" disabled="disabled"></strong></div>       

				

			</div> 

			<input type="submit" value="Update Cart" name="update">

			</form>

			

			 <?php    } ?>

             <!-- item #2 -->

		  

             <!-- item #3 -->

	

				

				<!- End of shopping cart ->   

              

            

            

              

	<div>
	<?php if($it==0){ echo "";} else { ?>
	
	<a href="Checkout.php">

    <input style="position: relative; top: 12em; left: 22.5em;"  type="submit" value = "Checkout" class = "button"> </a>
	
	<?php } ?>
	
	</div>

	

	

            <br> <br> <br>

		</div>	

 <footer style="position: relative; top: 20em;">

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
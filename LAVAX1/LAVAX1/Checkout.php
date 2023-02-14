<!--Reema Almobarak
Razan Aboali
Leena Alghamdi
Nouf Alghamdi
Rayanh Alyami
Jumana Aleleyo
Lenah Al-Helal-->


<?php




?>

<html>

    <head>

        <meta charset = "utf-8">

        <title>Checkout</title>

<link rel="stylesheet" type="text/css" href="style.css">
<script type="text/javascript" src="js/simplejava.js"></script>

<style>
.box{
        color: #fff;
        padding: 20px;
        display: none;
        margin-top: 20px;
    }
	</style>


        </head>



        <body>

            	<div class="main">

			<?php include 'header.php'?>
			
			</div>



               <h2><center>Check out</center></h2>

               <br> <div class="shopping-cart">

			   

			    <?php


 if(isset($_GET['delete_item'])){

$deleteid=$_GET['delete_item'];

$query2="delete from cart where id='$deleteid'";

$delete=mysqli_query($conn, $query2);

}

 

 $usern=$_SESSION["customerid"];

$totalbill=0;

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

 <form method="post" action="cart.php"> 

			 <input type="hidden" name="piid" value="<?php echo $pid; ?>">

             <!-- item #1 -->

					 

			<div class="item">

				<a href="shoppingCart.php?delete_item=<?php echo $pid; ?>"><div class="buttons"><span class="delete-btn"><p style="color:white;">X</p> </span></div> </a>



				<div class="description">

					<img src="<?php echo $picpath; ?>" height="80px" width="80px"   ><br>

					<span style="position: relative; right: 7em;"><?php echo $pname; ?></span>

				</div>

				<div style="position: relative;left: 1em;">

					<input class="number" type="number" min="1", max="10" value="<?php echo $productquantity; ?>" name="amount" disabled="disabled">

                </div>



				<div style="position: relative;left: 4em;"><strong><input class="total-price" type="text" size="25" value="<?php echo $tprice; ?> SR" disabled="disabled"></strong></div>       

			</div> 

					<!--<input type="submit" value="Update Cart" name="updatech">-->

			</form>

			 <?php  $totalbill+=$tprice;    } ?>

			 

			 <form action="ordercomplete.php" onSubmit="return formValidate()" method="post" name="form1">

			

             <!-- item #2 -->

			

             <!-- item #3 --><center>

			 Chose Your Payment Methode <br>

			  <input  type="hidden" name="payment_method" value="visa card" ><img  src="PHOTO/icons/visa.png" height="120px" width="120px"> <br>

                    
					
					<br><br>
					 <div>
					 Card Number:
					 <input type="number" placeholder="1111 2222 3333 4444" name="cname" > <br> <br>
					 Expire Date:
					 <input type="date" min="2021-04-07" required> <br> <br>
					 CSV:
					 <input type="text" placeholder="000" maxlength="3" name="csv" required> <br>
					 
					 
					 </div>
				

					</center>

         

            

	<div> <input type="hidden" value="<?php echo $totalbill ?>" name="totalbill">

       <input class="total-checkout"type="text" size="50" value="Your Total = <?php echo $totalbill ?> SR">

    <input style="position: relative; top: 12em; left: 18em;"  type="submit" value = "Buy" class = "button" name="order" id="hellobutton" > </form></div>

	

	
<script type="text/javascript">
   function myFunction() {
  alert("Thanks for your Purchase! Your Billl is <?php echo $totalbill ?> Thank You!");
}

document.getElementById("hellobutton").addEventListener("click", formValidate);
</script>
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
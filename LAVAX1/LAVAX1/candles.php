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

    <meta charset="utf-8">

    <title>Candles</title>

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

</div>

<h2>Season after season, from reliving favorite memories to setting a mood, we share your passion for fragrance. It’s

    what drives us to search the world for fresh inspiration in creating evocative, long-lasting scents that will help

    make your house feel like home ♡</h2>

<br>

<nav class="center"><h1> Candles</h1>

    <center>

	

	<?php

	

	$cartstock1=0;

	if(isset($_GET['add_cart'])){

$addid=$_GET['add_cart'];

$itemamount=$_POST['producttamount'];

$usern=$_SESSION["customerid"];

$query5="select * from products where id='$addid'";

$run5=mysqli_query($conn,$query5);

$rows5=mysqli_fetch_array($run5);

$cstock=$rows5['quantity'];



$query6="select * from cart where id='$addid'";

$run6=mysqli_query($conn,$query6);

$row6=mysqli_fetch_array($run6);

if(isset($row6)){

$cartstock1=$row6['productquantity'];

}

$checks=$itemamount+$cartstock1;

if($itemamount<=0 || $itemamount==null){ echo'<div class="alert alert-warning alert-dismissible">

    <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>

    <strong>Warning!</strong> Please Enter Positive Number!

  </div>';}

 else if($checks>$cstock){ 

 $getquery="select * from products where id='$addid'";

$runpget=mysqli_query($conn,$getquery);

$sst=mysqli_fetch_array($runpget);

$ssto=$sst['quantity'];

 

 echo'<div class="alert alert-warning alert-dismissible">

    <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>

    <strong>Warning!</strong> We have limited stock! We have only '.$ssto.' Items!

  </div>';}

else{



$getquery="select * from products where id='$addid'";

$runpget=mysqli_query($conn,$getquery);

$rowget=mysqli_fetch_array($runpget);

$getpname=$rowget['product_name'];

$getpamount=$rowget['price'];

$getpicpath=$rowget['image'];



$adprice=$itemamount*$getpamount;

//..



$cquery="select * from cart where id='$addid'";

$runq=mysqli_query($conn,$cquery);

$row=mysqli_fetch_array($runq);

$cid=$row['id'];

$amount=$row['productquantity'];

$price=$row['totalprice'];



if(!isset($cid)){

$addquery="insert into cart (id, productquantity, customerid, name, price, totalprice, image) values('$addid','$itemamount','$usern','$getpname','$getpamount','$adprice','$getpicpath')";

$save=mysqli_query($conn, $addquery);

header("location: candles.php");

}

else{

$nprice=$getpamount*$itemamount;

$tprice=$price+$nprice;

$addamount=$amount+$itemamount;

$updatequery="update cart set productquantity='$addamount', totalprice='$tprice' where id='$addid'";

$save=mysqli_query($conn, $updatequery);

header("location: candles.php");

}



}



}







	

	

	?>



	

	

	

	

        <ul>



            <?php

            $sql = "SELECT * FROM products";

            $result = mysqli_query($conn, $sql);

            if (!$result) {

                print("There is no product");

            }

            while ($row = mysqli_fetch_array($result)) {

                $product_id = $row['id'];

                ?>

                <li>

                    <a href="candles_description.php?id=<?php echo $product_id?>" >

                    <center><img src="<?php echo $row['image']?>" width="130" style="position:static; top:2em"></center>

                    <p><?php echo $row['product_name']?> </p> </a>

                    <p>price : <?php echo $row['price']?> SR </p>

                    <p> Avaliable Quantity : <?php echo $row['quantity']?> </p>

					  <p><form action="candles.php?add_cart=<?php echo $product_id; ?> " method="post">

					  <input type="number" maxlength="2" value="1" min="1" size="2" name="producttamount">

					  

					  <?php 

  if(!isset($_SESSION["customerid"])){  echo ' <p> Login Required</p>';} else { 

  ?> 

					  

					  <input type="submit" name="cartt" value="Add to cart">

					  <?php } ?>

					  </form> </p>

                    

                        



                </li>

                <br>

                <?php  } ?>

            <br>

        </ul>

    </center>

</nav>

<br>

<h2>Candle Delirium is always bringing you the latest trending luxury candles and scents. Check out our newest arrivals,

    added weekly! Try them out first!</h2>

<br>





<nav class="center" id="new"><h1>New Arrival Collection !</h1>

    <center>

        <ul>

            <?php

            $sql = "SELECT * FROM products ORDER BY id DESC ";

            $result = mysqli_query($conn, $sql);

            if (!$result) {

                print("There is no product");

            }

            while ($row = mysqli_fetch_array($result)) {

                $product_id = $row['id'];

                ?>

                <li>

                    <a href="candles_description.php?id=<?php echo $product_id?>" >

                        <center><img src="<?php echo $row['image']?>" width="130" style="position:static; top:2em"></center>

                        <p><?php echo $row['product_name']?> </p>  </a>

                        <p style="color: white;font-family:Fantasy;font-size: 14px;"><?php echo $row['Product_details']?> </p>

                        <p>price : <?php echo $row['price']?> SR </p>

                   <p> Avaliable Quantity : <?php echo $row['quantity']?> </p>

					  <p><form action="candles.php?add_cart=<?php echo $product_id; ?> " method="post">

					  <input type="number" maxlength="2" min="1" value="1" size="2" name="producttamount">

					  

					  <?php 

  if(!isset($_SESSION["customerid"])){ echo ' <p> Login Required</p>';} else {

  ?> 

					  

					  <input type="submit" name="cartt" value="Add to cart">

					  <?php } ?>

					  </form> </p>

                </li>

                <br>

            <?php  } ?>

        </ul>

    </center>

</nav>





  





<?php include  'footer.php'?>

</body>

</html>


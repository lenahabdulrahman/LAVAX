<!--Reema Almobarak
Razan Aboali
Leena Alghamdi
Nouf Alghamdi
Rayanh Alyami
Jumana Aleleyo
Lenah Al-Helal-->


<?php
	include_once("config1.php");
	
	if(isset($_GET['add_cart'])){
$addid=$_GET['add_cart'];
$itemamount=$_POST['producttamount'];
$usern=$_SESSION["customerid"];

$query5="select * from products where id='$addid'";
$run5=mysqli_query($connection,$query5);
$rows5=mysqli_fetch_array($run5);
$cstock=$rows5['quantity'];

$query6="select * from cart where id='$addid'";
$run6=mysqli_query($connection,$query6);
$row6=mysqli_fetch_array($run6);
$cartstock1=$row6['productquantity'];

$checks=$itemamount+$cartstock1;

if($itemamount<=0 || $itemamount==null){ echo'<div class="alert alert-warning alert-dismissible">
    <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
    <strong>Warning!</strong> Please Enter Positive Number!
  </div>';}
 else if($checks>$cstock){ 
 $getquery="select * from products where id='$addid'";
$runpget=mysqli_query($connection,$getquery);
$sst=mysqli_fetch_array($runpget);
$ssto=$sst['quantity'];
 
 echo"<script>
			window.alert('We have Limited Stock!');
			window.history.back();
		</script>";}
else{

$getquery="select * from products where id='$addid'";
$runpget=mysqli_query($connection,$getquery);
$rowget=mysqli_fetch_array($runpget);
$getpname=$rowget['product_name'];
$getpamount=$rowget['price'];
$getpicpath=$rowget['image'];

$adprice=$itemamount*$getpamount;
//..

$cquery="select * from cart where id='$addid'";
$runq=mysqli_query($connection,$cquery);
$row=mysqli_fetch_array($runq);
$cid=$row['id'];
$amount=$row['productquantity'];
$price=$row['totalprice'];

if(!isset($cid)){
$addquery="insert into cart (id, productquantity, customerid, name, price, totalprice, image) values('$addid','$itemamount','$usern','$getpname','$getpamount','$adprice','$getpicpath')";
$save=mysqli_query($connection, $addquery);
header("location: candles.php");
}
else{
$nprice=$getpamount*$itemamount;
$tprice=$price+$nprice;
$addamount=$amount+$itemamount;
$updatequery="update cart set productquantity='$addamount', totalprice='$tprice' where id='$addid'";
$save=mysqli_query($connection, $updatequery);
header("location: candles.php");
}

}

}



	if(isset($_POST['update'])){
	echo $usern=$_SESSION["customerid"];
	echo $addid=$_POST['piid'];
	echo $itemamount=$_POST['amount'];

$query5="select * from products where id='$addid'";
$run5=mysqli_query($connection,$query5);
$rows5=mysqli_fetch_array($run5);
$cstock=$rows5['quantity'];

if($itemamount<=0 || $itemamount==null){ echo'<div class="alert alert-warning alert-dismissible">
    <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
    <strong>Warning!</strong> Please Enter Positive Number!
  </div>';}
 else if($itemamount>$cstock){ 
 $getquery="select * from products where id='$addid'";
$runpget=mysqli_query($connection,$getquery);
$sst=mysqli_fetch_array($runpget);
$ssto=$sst['quantity'];
 
 echo'<div class="alert alert-warning alert-dismissible">
    <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
    <strong>Warning!</strong> We have limited stock! We have only '.$ssto.' Items!
  </div>';}
else{

$cquery="select * from cart where id='$addid' and customerid='$usern'";
$runq=mysqli_query($connection,$cquery);
$row=mysqli_fetch_array($runq);
$cid=$row['id'];
$amount=$row['productquantity'];
$price=$row['price'];

$tprice=$price*$itemamount;
$updatequery="update cart set productquantity='$itemamount', totalprice='$tprice' where id='$addid' and customerid='$usern'";
$save=mysqli_query($connection, $updatequery);

header("location: shoppingCart.php");
}

	
	
	
	
	
	
	
	
	
	}




	if(isset($_POST['updatech'])){
	echo $usern=$_SESSION["customerid"];
	echo $addid=$_POST['piid'];
	echo $itemamount=$_POST['amount'];

$query5="select * from products where id='$addid'";
$run5=mysqli_query($connection,$query5);
$rows5=mysqli_fetch_array($run5);
$cstock=$rows5['quantity'];

if($itemamount<=0 || $itemamount==null){ echo'<div class="alert alert-warning alert-dismissible">
    <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
    <strong>Warning!</strong> Please Enter Positive Number!
  </div>';}
 else if($itemamount>$cstock){ 
 $getquery="select * from products where id='$addid'";
$runpget=mysqli_query($connection,$getquery);
$sst=mysqli_fetch_array($runpget);
$ssto=$sst['quantity'];
 
 echo'<div class="alert alert-warning alert-dismissible">
    <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
    <strong>Warning!</strong> We have limited stock! We have only '.$ssto.' Items!
  </div>';}
else{

$cquery="select * from cart where id='$addid' and customerid='$usern'";
$runq=mysqli_query($connection,$cquery);
$row=mysqli_fetch_array($runq);
$cid=$row['id'];
$amount=$row['productquantity'];
$price=$row['price'];

$tprice=$price*$itemamount;
$updatequery="update cart set productquantity='$itemamount', totalprice='$tprice' where id='$addid' and customerid='$usern'";
$save=mysqli_query($connection, $updatequery);

header("location: Checkout.php");
}

	
	
	
	
	
	
	
	
	
	}



	
	?>

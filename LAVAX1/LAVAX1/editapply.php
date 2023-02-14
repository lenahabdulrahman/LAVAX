<!--Reema Almobarak
Razan Aboali
Leena Alghamdi
Nouf Alghamdi
Rayanh Alyami
Jumana Aleleyo
Lenah Al-Helal-->

<?php

include_once("config1.php");
	
		if(isset($_GET['id'])){
$id=$_GET['id'];
	$query = "DELETE FROM products WHERE id='$id'";
	$del = mysqli_query($connection, $query);
	if($del) {
	echo "<script>
			window.alert('Product Delete Successfully!');
			window.location.replace('Admin.php');
		</script>";
	//header("location: Admin.php");
	}
}



			
if(isset($_POST['update'])){
				$id=$_POST['idd'];
$itemtitle=$_POST['itemtitle'];
$itemprice=$_POST['itemprice'];
$itemquant=$_POST['itemquant'];
$itemdess=$_POST['itemdess'];
$picsave=$_POST['picsave'];

$query="update products set  product_name='$itemtitle', price='$itemprice', quantity='$itemquant', Product_details='$itemdess' where id='$id'";
$save=mysqli_query($connection,$query);
if($save){ 

echo "<script>
			window.alert('Product Update Successfully!');
			window.location.replace('Admin.php');
		</script>";

//header("location: Admin.php");
}

}



?>
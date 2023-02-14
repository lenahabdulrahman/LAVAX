<!--Reema Almobarak
Razan Aboali
Leena Alghamdi
Nouf Alghamdi
Rayanh Alyami
Jumana Aleleyo
Lenah Al-Helal-->



 
		<?php
			//start php code
		include_once("config1.php");
			if(isset($_POST['Create'])){
$itemtitle=$_POST['itemtitle'];
$itemprice=$_POST['itemprice'];
$itemstock=$_POST['itemstock'];
$itemdes=$_POST['itemdes'];
if(isset($_FILES['image']['name']))
$picname=$_FILES['image']['name'];
$tmp=$_FILES['image']['tmp_name'];

$net="png";
 $imagee="productimages/$itemtitle.$net";
$query="insert into products (product_name,price,quantity,Product_details,image) values ('$itemtitle','$itemprice','$itemstock','$itemdes','$imagee')";
$add=mysqli_query($connection,$query);
if($add){  move_uploaded_file($tmp,$imagee); 
echo "<script>
			window.alert('Product Added Successfully!');
			window.location.replace('Admin-add Item.html');
		</script>";

}



}
			
			
			?>
		
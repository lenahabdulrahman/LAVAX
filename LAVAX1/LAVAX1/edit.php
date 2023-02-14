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
        <title>Admin</title>
<link rel="stylesheet" type="text/css" href="style.css">
    </head>
    <body>  
        <div class="main">
			<header>
				<div class="logo">
					<img src="PHOTO/Logo.jpeg" width="130">
					<a href="Admin.php"><h4> Home</h4> </a>
				</div>
                 <div class="welcome-user">Welcome: Admin <a href="logout.php"> [Logout]</a></div>
            </header></div>
           <h2><center>MANGING</center></h2>
        <br>
        <div class="body">
            <div class="empty">
        <br>
        <br>
		<?php
		

		include_once("config1.php");
		if(isset($_GET['id'])){
$select_id=$_GET['id'];
$query1="select * from products where id='$select_id'";
$update=mysqli_query($connection,$query1);
$row=mysqli_fetch_array($update);
$id=$row['id'];
$product_name=$row['product_name'];
$price=$row['price'];
$quantity=$row['quantity'];
$Product_details=$row['Product_details'];
$image=$row['image'];

}
		?>
				<form method="post" action="editapply.php" style="text-align:left; margin-left: 15px" enctype="multipart/form-data">
                    
					<input type="hidden" name="idd" value="<?php echo $id  ?>">
					<input type="hidden" name="picsave" value="<?php echo $image  ?>">
					<label class="input-style">Item Name:
					<input  class="format" name="itemtitle" type="text" size="25" value="<?php echo $product_name ?>"  style="position: relative; left: 11.2em" required>
					</label>
					<br><br>
					<label class="input-style">Update Item Price:
					<input  class="format" name="itemprice" type="text" size="25" value="<?php echo $price  ?>"  style="position: relative; left: 2.5em" required>
					</label>
					<br><br>
                    <label class="input-style">Update Item quantity:
					<input  class="format" name="itemquant" min="0" type="number" size="25" value="<?php echo $quantity  ?>"  required>
					</label>
					<br><br>
                    <label class="input-style">Item Description:
					<input  class="format" name="itemdess" type="text"  value="<?php echo $Product_details  ?>"  required>
					</label>
					
					<br><br>
					<input class="button" type="submit" name="update" style="height: 40px;font-size:14px;width:150px;" value="UPDATE ITEM">
					<button class="button" type="button" name="delete" style="height: 40px;font-size:14px;" onClick="window.location.href='editapply.php?id=<?php echo $select_id ?>'"> DELETE ITEM </button>
					<br><br>
				</form>
				
			</div>
		</div>
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
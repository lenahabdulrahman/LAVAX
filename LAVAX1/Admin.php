<!--Reema Almobarak
Razan Aboali
Leena Alghamdi
Nouf Alghamdi
Rayanh Alyami
Jumana Aleleyo
Lenah Al-Helal-->


<?php

include 'config1.php';
if($_SESSION["rank"]=="admin")
echo "";
else
header("location: logout.php");
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
				<div class="logo"> <a href="Admin.php">
					<img src="PHOTO/Logo.jpeg" width="130"> </a>
					<a href="Admin.php"><h4> Home</h4> </a>
				</div>
                 <div class="welcome-user">Welcome: Admin <a href="logout.php"> [Logout]</a></div>
				<div class="search">
				
				<form action="Admin.php" method="post">
				<input  type="submit" class="search-button" value="Search" name="ser"> <input type="text" placeholder="Search the Product ID" name="search" class="search-input" required></form>
                </div>
            </header></div>
           <h2><center>MANGING</center></h2>
        <br>
        <div class="body">
            <div class="empty">
        <br>
        <br>
				
                    <div>  <button style="position: relative; left: 40em;width: 150px; height: 40px;font-size:14px;" class=" button" onClick="window.location.href='Admin-add Item.html'"> TO ADD NEW ITEM</button></div>
				<center>	
					
						
<?php
if(isset($_POST['ser'])){
$search=$_POST['search'];
$query="select * from products where id='$search'";
}
else {
$query="select * from products order by id desc";
}



echo"<table border='2px'> <thead><tr>  <tr><th>Item ID</th> <th>Name</th><th> Quantity</th><th> Price</th><th>Discription</th><th> Image</th><th> Select</th></tr> </thead>";
$run=mysqli_query($connection,$query);
while($rows=mysqli_fetch_array($run)){
$id=$rows['id'];
$product_name=$rows['product_name'];
$price=$rows['price'];
$quantity=$rows['quantity'];
$Product_details=$rows['Product_details'];
$image=$rows['image'];


echo"
<tbody>
<tr>
<th>". $id."</th>
<th>". $product_name."</th>
<th>".$quantity."  </th>
<th>".$price."SR</th>
<th>".$Product_details." </th>
<th><img src='$image' width='200px' height='200px'> </th>
<th><a href='edit.php?id=$id'>Select</a></th>

</tr>";
} 
echo " </tbody></table>";



?>
					
					</center>
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
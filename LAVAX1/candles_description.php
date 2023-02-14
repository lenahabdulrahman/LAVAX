<!--Reema Almobarak
Razan Aboali
Leena Alghamdi
Nouf Alghamdi
Rayanh Alyami
Jumana Aleleyo
Lenah Al-Helal-->


<html>
<head>
    <meta charset="utf-8">
    <title>Candles Description</title>
    <link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>

<div class="main">
    <?php include 'header.php'?>
</div>
<?php

if (isset($_GET['id'])) {
    $product_id = $_GET['id'];

    $sql = "SELECT * FROM products WHERE id  =  " . $product_id;
    $result = mysqli_query($conn, $sql);
    if (!$result) {
        print("There is no product");
    }
    $row = mysqli_fetch_array($result);

	
}
?>


<h2>Season after season, from reliving favorite memories to setting a mood, we share your passion for fragrance. It’s
    what drives us to search the world for fresh inspiration in creating evocative, long-lasting scents that will help
    make your house feel like home ♡ .. </h2>
<br>

<nav class="center"><h1> Candles</h1>
    <center>
        <ul>
            <li>
                <a href="candles_description.php?id=<?php echo $product_id?>" >
                    <center><img src="<?php echo $row['image']?>" width="130" style="position:static; top:2em"></center>
                    <p><?php echo $row['product_name']?> </p>    </a>
                    <p style="color: white;font-family:Fantasy;font-size: 14px;"><?php echo $row['Product_details']?> </p>
                    <p>price : <?php echo $row['price']?> SR </p>
             
               <p> Avaliable Quantity : <?php echo $row['quantity']?> </p>
					  <p><form action="cart.php?add_cart=<?php echo $product_id; ?> " method="post">
					  <input type="number" maxlength="2" min="1" value="1" size="2" name="producttamount">
					  
					  <?php 
  if(!isset($_SESSION["customerid"])){ echo ' <p> Login Required</p>';} else {
  ?> 
					  
					  <input type="submit" name="cartt" value="Add to cart">
					  <?php } ?>
					  </form> </p>
                    
					<p> <button onClick="help();"> Help Window </button></p>
            </li>

            <br>

<!--            <input style="position: relative ; background-color:white; font-size: 14px; color:#7d6c86; font-family: URW Chancery L,Blippo, Apple Chancery, cursive;"-->
<!--                   class="button" type="button" name="Previous" value="Previous page">-->

        </ul>
    </center>
	
<script>
function help(){
window.open("hellp.php", "", "width=400,height=400");
			
			}
		</script>
	
	

</nav>
<?php include  'footer.php'?>
</body>
</html>

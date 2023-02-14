<!--Reema Almobarak
Razan Aboali
Leena Alghamdi
Nouf Alghamdi
Rayanh Alyami
Jumana Aleleyo
Lenah Al-Helal-->

<?php 
session_start();

include('includes/cart.php'); 

if(isset($_GET['action']) && $_GET['action'] == "add_to_cart"){
	
	if(isset($_GET['product_id']) && !empty($_GET['product_id'])){
		$product_id = $_GET['product_id'];
	} else {
		DIE("ERROR: no product selected!");
	}
	
	if(isset($_GET['quantity']) && !empty($_GET['quantity'])){
		$quantity = $_GET['quantity'];
	} else {
		$quantity = 1;
	}
	
	// Create connection to data base
	$conn = new mysqli("localhost", "username", "password", "myDB");
	// Check connection
	if ($conn->connect_error) {
	  die("Connection failed: " . $conn->connect_error);
	}
	
	$check_product = "SELECT * FROM product WHERE id = '".$product_id."'"; // Check product id
	$result = $conn->query($check_product);

	if ($result->num_rows > 0) {
		// output data of each row
		$row = $result->fetch_assoc();
		
		// if quantity is available
		if($row["quantity"] >= $quantity){

			if(isset($_SESSION["shopping_cart"])){
				
				$product_array_id = array_column($_SESSION["shopping_cart"], "product_id");  
				
				if(!in_array($_GET["product_id"], $product_array_id)){
					$count = count($_SESSION["shopping_cart"]);  
					$product_array = array(  
						'product_id'           =>     $row["id"],  
						'product_name'         =>     $row["product_name"],
						'product_price'        =>     $row["price"],
						'total_bill'           =>     $row['price'] * $quantity,
						'product_quantity'     =>     $quantity,
						'customers_id'		   =>	  $_SESSION["customers_id"]
					);
					
					$_SESSION["shopping_cart"][$count] = $product_array;
					header('location: cart.php');
					
				}else{
					echo "Product Already Added";
				}
				
			} else {
				$product_array = array(  
					'product_id'           =>     $row["id"],  
					'product_name'         =>     $row["product_name"],
					'product_price'        =>     $row["price"],
					'total_bill'           =>     $row['price'] * $quantity,  
					'product_quantity'     =>     $quantity,
					'customers_id'		   =>	  $_SESSION["customers_id"]
				);  
				$_SESSION["shopping_cart"][0] = $product_array;
				header('location: cart.php');
			} 
		} else {
			echo "Quantity is not available!";
		}
	}
}

?>
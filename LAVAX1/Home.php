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
        <title>Home</title>
        <style type="text/css">
		a{
		text-decoration:none;
		}
        body{font-family:monospace,sans-serif, fantasy;
                 color: black;
                 background-color: #F7F7F7;
                }
             h2{
              font-family: fantasy, URW Chancery L,Blippo, Apple Chancery, cursive;
                 color:#460D63;
                font-size: 20px;
                 padding: 30px;
                font-weight: lighter;
                 border-style: double solid ;
                 border-color: #692F86;
                  text-align: center;
                 margin: auto;            
               }
		
            /*================*/
			.main{
				padding-right: 15px;
				padding-left: 15px;
				margin-top: 15px;
				padding-bottom: 15px;
			}
			.header{
			
			}
			.logo{
				width: 100%;
				text-align: center;
			}
			.search{
				position: absolute;
				right: 25px;
				top: 160px;
			}
			.search-button {
				padding: 5px;
				background: #e9e2ea;
				border: 1px solid #b2a1bb;
				color: #7d6c86;
			}
			.search-input{
			    padding: 5px;
				border: 1px solid #b2a1bb;
			}
			.cart{
				width: 15%;
				text-align: right;
			}
			.cart-icon {
				border: 0;
				width: 40px;
				padding: 5px;
				background: #e9e2ea;
			}
			.backimg {
				background-image: url(PHOTO/Lavax.jpg);
				background-position: center;
				background-repeat: no-repeat;
				background-size: cover;
				height: 400px;
				width: 100%;
				padding-top: 10%;
				margin-top: 15px;
			}
			.backimg .text {
				font-size: 60pt;
				text-align: center;
				color: white;
			}
			footer {
				text-align: center;
			}
            


        tr:nth-child(even) {
            background-color: white;
        }
			
        </style>
        </head>

        <body>
		
		<div class="main">
			 <?php include 'header.php'?>
					
					
					</div>
			<div class="body">
				<h2>Lavax's websit offers a variety of special custom made candles.	Our	collections will help customers to relieve stress and anxiety, be relaxed, energized as well as help their brain get into a productive mindset, In addition improving their focus and mood because of our natural resources and products. Our goal is to ocreate an accessible and appealing website to attracts customers around the world and adding some functionalities to ease the use of it and benefit from its services.</h2>				
				
				<div class="backimg">
					<p class="text">#LAVAX</p>
                </div>		
			</div>
            
                
            <br>
            <br>
			<?php 
			if(isset($_COOKIE["username"])){
				?>
            
            <h2>Here's your last order ! </h2>



        <div> 
            
     <br>
	 <center>
            <table width="80%" border="3px">

          <tr>
            <td>Items</td>
            <td>Orders ID</td>
            <td>Total Bill</td>
          </tr>
          
            
        <?php
		}
		
		if(isset($_COOKIE["username"])){
		$usern=$_COOKIE["username"];
		}
		else { $usern=0;}
       $sql = "SELECT * FROM orders where customer_id='$usern' ";
            $result = mysqli_query($conn, $sql);
        while($row = mysqli_fetch_array($result)) {
        ?>
            
        <tr width="80%" border="3px">
            <td ><?php
			$orid=$row["id"];
			 $sql1 = "SELECT * FROM order_product where id_order='$orid' ";
            $result1 = mysqli_query($conn, $sql1);
        while($row1 = mysqli_fetch_array($result1)) {
			
				 $PROD=$row1["id_product"];
			  $sql3 = "SELECT * FROM products where id='$PROD' ";
			 $select=mysqli_query($conn, $sql3);
$row3=mysqli_fetch_array($select);
echo $row3['product_name'];
			 
			 
			 
			  echo "<br>";} ?>
			 
			</td>
            <td><?php echo $row["id"]; ?></td>
            <td ><?php echo $row["total_bill"]; ?></td>

        </tr>
      
          

        <?php
		}
             ?>
			   </table>
		
			
            </center>
      
            </div>   
            
            
            
 <footer>
			<p>All rights reserved.</p>
			<div class="social-icons">
				<img class="sicon" src="PHOTO/icons/twitter.png"> 
				<img class="sicon" src="PHOTO/icons/facebook.png"> 
				<img class="sicon" src="PHOTO/icons/instagram.png"> 
				<img class="sicon" src="PHOTO/icons/youtube.png"> 
			</div>
		</footer>     
        </body>
    </html>
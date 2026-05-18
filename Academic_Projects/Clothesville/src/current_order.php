<?php  //cart.php
session_start();
if (isset($_POST['edit_order_btn'])){
	$_SESSION['productid'] = $_POST['edit_order_btn'];
	header('location: edit_product_currentorder.php'. SID);
	exit();
}	
?>
<html>
<head>
	<title>ClothesVille - Latest Orders</title>
	<meta charset="utf-8">
	<link rel="stylesheet" href="assets/css/clothesville.css">
</head>

<body>

	<header>
		<img src="assets/images/logo1.png" alt = "logo" height = "100px" width = "500px" style = "padding:10px;">
	</header>
	  
	<nav>
		<b><i> 
			<a href = "index.php">Home</a> &nbsp 
			<a href = "contact.html">Contact Us</a> &nbsp 
			<a href = "login_before_view_order.php">Latest Orders</a> &nbsp 
			<a href = "login_before_cart.php"><img src = "assets/images/cart.png" alt = "cart" height = "30" width = "30" align = "right" style = "padding-right:20px;"> </a>&nbsp 
			<a href = "user_details.php"><img src = "assets/images/user.png" alt = "user" height = "30" width = "30" align = "right" style = "padding-right:20px;"> </a>
		</i></b>
	</nav>	
	<br>
	<br>
	<div class="content"> 
		<center><h2></h2></center>
		<center><br><h2>LATEST ORDERS</h2></center>
		<div id = "cart">
			<?php
				
				@ $db = new mysqli('localhost', 'root', '', 'f32ee');
				if (mysqli_connect_errno()) {
					echo "Error: Could not connect to database.  Please try again later.";
					exit;
				}
				$username = $_SESSION['valid_user'];
				
				$query = "SELECT productid, status FROM clothesville_orders WHERE username = '$username' AND status = 'checked out'";
				$result = $db->query($query);
				$num_results = $result->num_rows;
				if ($num_results == 0){
					echo "<center><br><h2>No latest orders.</h2><br><br><br><br><br><br><br><br></center>";
					echo "<center><a href='index.php'>Continue Shopping</a></center><br>";
				} else {
					echo "<center><br><br><table border = 1><tbody>";
					for ($i=0; $i <$num_results; $i++) {
						$row = $result->fetch_assoc();
						$productid = $row['productid'];
						
						$query_prod = "SELECT img, name, price, item_size, color FROM clothesville_products WHERE productid = $productid LIMIT 1";
						$result_prod = $db->query($query_prod);
						$row_prod = $result_prod->fetch_assoc();
						
						echo "<tr>";
						echo "<td><img src='" . $row_prod['img'] . "' alt = 'test_pic' height = '250px' width = '200px' style = 'padding:30px 50px'></td>";
						echo "<td> <table>";
							echo "<tr><td><b>Name: </b></td><td>" .$row_prod['name']. "</td></tr>";
							echo "<tr><td><b>Price: </b></td><td>$" .number_format($row_prod['price'],2). "</td></tr>";
							echo "<tr><td><b>Size: </b></td><td>" .$row_prod['item_size']. "</td></tr>";
							echo "<tr><td><b>Color: </b></td><td>" .$row_prod['color']. "</td></tr>";
						echo "</table></td>";
						
						echo '<form method = "post"><td>';
						echo '<button name = "edit_order_btn" value = "'.$productid.'" type = "submit" class = "button_small"><span>Edit Item</span></button>';
						echo "</form></tr>";
					}
					echo "</tbody></table></center>";
					echo '<center>
							<p><a href="index.php">Back to home</a></p>
							<br>
						  </center>';
				}
			?>
			
		</div>	
	</div>
	<footer>
		<center><small><i>Copyright &copy; 2021 ClothesVille</i></small></center>
	</footer>
</body>
</html>
<?php  //cart.php
session_start();
if (!isset($_SESSION['cart'])){
	$_SESSION['cart'] = array();
}
if (isset($_GET['empty'])) {
	unset($_SESSION['cart']);
	header('location: ' . $_SERVER['PHP_SELF']);
	exit();
}
if (isset($_POST['edit_btn'])){
	$_SESSION['index'] = $_POST['edit_btn'];
	header('location: edit_product.php'. SID);
	exit();
}	
if (isset($_POST['remove_btn'])){
	$index = $_POST['remove_btn'];
	$cart = $_SESSION['cart'];
	unset($cart[$index]);
	$_SESSION['cart'] = array_values($cart);
	header('location: ' . $_SERVER['PHP_SELF']);
}
?>
<html>
<head>
	<title>ClothesVille - Cart</title>
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
		<div id = "cart">
			<?php
				@ $db = new mysqli('localhost', 'root', '', 'f32ee');
				if (mysqli_connect_errno()) {
					echo "Error: Could not connect to database.  Please try again later.";
					exit;
				}
				$items = $_SESSION['cart'];
				$arrLength = count($items);
				$total = 0;
				if ($arrLength == 0){
					echo "<center><br><h2>No items in cart.</h2><br><br><br><br><br><br><br><br></center>";
					echo "<center><a href='index.php'>Continue Shopping</a></center><br>";
				} else {
					echo "<center><br><br><table border = 1><tbody>";
					for($i = 0; $i < $arrLength; $i++) {
						$productid = $_SESSION['cart'][$i];
						$query = "SELECT img, name, price, item_size, color FROM clothesville_products WHERE productid = $productid LIMIT 1";
						$result = $db->query($query);
						$row = $result->fetch_assoc();
						echo "<tr>";
						echo "<td><img src='" . $row['img'] . "' alt = 'test_pic' height = '250px' width = '200px' style = 'padding:30px 50px'></td>";
						
						echo "<td> <table>";
							echo "<tr><td><b>Name: </b></td><td>" .$row['name']. "</td></tr>";
							echo "<tr><td><b>Price: </b></td><td>$" .number_format($row['price'],2). "</td></tr>";
							echo "<tr><td><b>Size: </b></td><td>" .$row['item_size']. "</td></tr>";
							echo "<tr><td><b>Color: </b></td><td>" .$row['color']. "</td></tr>";
						echo "</table></td>";
						
						echo '<form method = "post"><td>';
						echo '<button name = "edit_btn" value = "'.$i.'" type = "submit" class = "button_small"><span>Edit Item</span></button>';
						echo '<br><br><button name = "remove_btn" value = "'.$i.'" type = "submit" class = "button_small"><span>Remove Item</span></button></td>';
						echo "</form></tr>";
						$total = $total + $row['price'];
						$_SESSION['total_price'] = $total;
						
					}
					echo "</tbody></table></center>";
					echo '<center>
								<h2>Total Price: $'.number_format($total, 2).'</h2>
								<form method = "POST" action = "checkout.php">
								<button name = "checkout_btn" value = "checkout_btn" type = "submit" class = "button"><span>CHECKOUT</span></button>
								</form>
								<p><a href="index.php">Continue Shopping</a> or <a href="'.$_SERVER['PHP_SELF'].'?empty=1">Empty entire cart</a></p>
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
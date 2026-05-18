<?php 
session_start();
if (isset($_POST['cancel_btn'])) {
	header('location:cart.php'. SID);
	exit();
}
if (isset($_POST['edit_cart_btn'])) {
	
	$index = $_SESSION['index'];
	$id = $_SESSION['cart'][$index];
	
	@ $db = new mysqli('localhost', 'root', '', 'f32ee');
	if (mysqli_connect_errno()) {
		echo "Error: Could not connect to database.  Please try again later.";
		exit;
	}
	//getting name of product
	$query = "SELECT name FROM clothesville_products WHERE productid = $id LIMIT 1";
	$result = $db->query($query);
	$row = $result->fetch_assoc();
	$name = $row['name'];
	$result->free();
	
	//getting id of new product
	$color = $_POST['color'];
	$size = $_POST['size'];
	$query = "SELECT productid FROM clothesville_products WHERE name = '$name' AND color = '$color' AND item_size = '$size' LIMIT 1";
	$result = $db->query($query);
	$row = $result->fetch_assoc();
	$new_id = $row['productid'];
	$result->free();
	
	//replacing id
	$_SESSION['cart'][$index] = $new_id;
	header('location:cart.php'. SID);
	exit();
}		 				  
?>
<html lang="en">
<head>
	<title>ClothesVille - Edit Product</title>
	<meta charset="utf-8">
	<link rel="stylesheet" href="assets/css/clothesville.css">
</head>

<body>
	<!-- <div id="wrapper"> -->
		<header>
			<img src="logo1.png" alt = "logo" height = "100px" width = "500px" style = "padding:10px;">
		</header>
	  
		<nav>
			<b><i> 
			<a href = "assets/images/index.php">Home</a> &nbsp 
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
			<?php 
				$index = $_SESSION['index'];
				$id = $_SESSION['cart'][$index];
			
				@ $db = new mysqli('localhost', 'root', '', 'f32ee');
				if (mysqli_connect_errno()) {
					echo "Error: Could not connect to database.  Please try again later.";
					exit;
				}
				
				//getting name
				$query = "SELECT name FROM clothesville_products WHERE productid = $id LIMIT 1";
				$result = $db->query($query);
				$row = $result->fetch_assoc();
				$value = $row['name'];
				$result->free();
				
				//getting picture and price
				$query = "SELECT distinct(img), price FROM clothesville_products WHERE name = '$value'";
				$result = $db->query($query);
				$num_results = $result->num_rows;
				for ($i=0; $i <$num_results; $i++) {
					$row = $result->fetch_assoc();
					echo "<div id = 'product_image'><img src='" . $row['img'] . "' alt = 'test_pic' height = '400px' width = '300px' style = 'padding:50px 60px 0px;'>";
					echo '</div>';
					
					//echo '<iframe name="dummyframe" id="dummyframe" style="display: none;"></iframe>';
					echo '<form method="post">';//target = "dummyframe">
					echo '<div id = "product_details">
								<h2>PRODUCT DETAILS</h2>
								<table>
									<tr>';
					echo "<td>Name: </td><td>".$value."</td></tr><tr>";
					echo "<td>Price: </td><td>$ ".$row['price']."</td></tr>";
				}
				$result->free();
				
				//getting size dropdown
				echo "<tr><td>Sizes Available:</td>
					  <td><select id = 'size' name='size'>";
				$query = "SELECT distinct(item_size) FROM clothesville_products WHERE name = '$value'";
				$result = $db->query($query);
				$num_results = $result->num_rows;
				for ($i=0; $i <$num_results; $i++) {
					$row = $result->fetch_assoc();
					echo '<option value="'.$row['item_size'].'">'.$row['item_size'].'</option>';
				}
				$result->free();
				
				//getting color dropdown
				echo '</select></td></tr>
					  <tr><td>Colours Available:</td>
					  <td><select id = "color" name="color">';
				$query = "SELECT distinct(color) FROM clothesville_products WHERE name = '$value'";
				$result = $db->query($query);
				$num_results = $result->num_rows;
				for ($i=0; $i <$num_results; $i++) {
					$row = $result->fetch_assoc();
					echo '<option value="'.$row['color'].'">'.$row['color'].'</option>';
				}
				$result->free();
				echo '</select></td></tr></table>';
				
					
				echo '<br><button name = "edit_cart_btn" value = "edit_cart_btn" type = "submit" class = "button"><span>Submit Changes</span></button>';
				echo '<button name = "cancel_btn" class = "button"><span>Cancel</span></button>';
				
				echo '<br><br><br></div></form>';
			?>
		</div>

		<footer>
			<center><small><i>Copyright &copy; 2021 ClothesVille</i></small></center>
		</footer>
	<!-- </div> -->

</body>	
</html>
<?php 
session_start();
//$_SESSION['valid_user'] = "a";

if (!isset($_SESSION['valid_user'])) {
	$_SESSION['valid_user'] = "";
	$_SESSION['valid_user_email'] = "";
	$_SESSION['valid_user_address'] = "";
}
if (isset($_POST['pic_btn'])){
	$val1 = htmlentities($_POST['pic_btn']);
	$_SESSION['value'] = $_POST['pic_btn'];
	header('location: product.php'.SID);
	exit;
}					 				  
?>

<html lang="en">
<head>
	<title>ClothesVille</title>
	<meta charset="utf-8">
	<link rel="stylesheet" href="assets/css/clothesville.css">
</head>

<body>
	<header>
		<img src="assets\images\logo1.png" alt = "logo" height = "100px" width = "500px" style = "padding:10px;">
	</header>
	  
	<nav>
		<b><i> 
			<a href = "index.php">Home</a> &nbsp 
			<a href = "contact.html">Contact Us</a> &nbsp 
			<a href = "login_before_view_order.php">Latest Orders</a> &nbsp 
			<a href = "login_before_cart.php"><img src = "assets\images\cart.png" alt = "cart" height = "30" width = "30" align = "right" style = "padding-right:20px;"> </a>&nbsp 
			<a href = "user_details.php"><img src = "assets\images\user.png" alt = "user" height = "30" width = "30" align = "right" style = "padding-right:20px;"> </a>
		</i></b>
	</nav>
		
	<br>
		
	<div id = "filters">
		<form method="post">
			Filters: &nbsp 
			<select id = "filter_size" name="filter_size">
				<option value = "all" <?= !empty($_POST) && $_POST['filter_size'] == 'all' ? 'selected' : 'all' ?>>All</option>
				<option value = "XL"<?= !empty($_POST) && $_POST['filter_size'] == 'XL' ? 'selected' : 'XL' ?>>XL</option>
				<option value = "L"<?= !empty($_POST) && $_POST['filter_size'] == 'L' ? 'selected' : 'L' ?>>L</option>
				<option value = "M"<?= !empty($_POST) && $_POST['filter_size'] == 'M' ? 'selected' : 'M' ?>>M</option>
				<option value = "S"<?= !empty($_POST) && $_POST['filter_size'] == 'S' ? 'selected' : 'S' ?>>S</option>
				<option value = "XS"<?= !empty($_POST) && $_POST['filter_size'] == 'XS' ? 'selected' : 'XS' ?>>XS</option>
			</select> &nbsp 
			<select id = "filter_type" name="filter_type">
				<option value = "all" <?= !empty($_POST) && $_POST['filter_type'] == 'all' ? 'selected' : 'all' ?>>All</option>
				<option value = "Shirt" <?= !empty($_POST) && $_POST['filter_type'] == 'Shirt' ? 'selected' : 'Shirt' ?>>Shirt</option>
				<option value = "Pants" <?= !empty($_POST) && $_POST['filter_type'] == 'Pants' ? 'selected' : 'Pants' ?>>Pants</option>
				<option value = "Kids" <?= !empty($_POST) && $_POST['filter_type'] == 'Kids' ? 'selected' : 'Kids' ?>>Kids</option>
				<option value = "Hoodie" <?= !empty($_POST) && $_POST['filter_type'] == 'Hoodie' ? 'selected' : 'Hoodie' ?>>Hoodies</option>
			</select> &nbsp  
			<input type="submit" name="submit" value="Apply Filters">
			&nbsp  &nbsp &nbsp  &nbsp 
		<?php
			$searchterm = $_POST['searchterm'] ?? '';
			$searchterm = trim($searchterm);
			$searchterm = addslashes($searchterm);
			
			//search bar html
			echo 'Enter Search Term:
			<input name="searchterm" type="text" size="15" value = '.$searchterm.'> &nbsp 
			<input type="submit" name="submit" value="Search">';
			echo '</form></div>';
			
			echo '<div class="content"> <center><h2><br>Product Selection</h2></center><center><form method="post" ><table><tr>';
		
			$size = $_POST['filter_size'] ?? 'all';
			$type = $_POST['filter_type'] ?? 'all';
			
			//queries
			$searchterm = $_POST['searchterm'] ?? '';
			if ($searchterm !== "" && !empty($_POST)){
				echo "Showing search results for: '".$searchterm."'";
			}
			// connect to database
			@ $db = new mysqli('localhost', 'root', '', 'f32ee');
			if (mysqli_connect_errno()) {
				echo "Error: Could not connect to database.  Please try again later.";
				exit;
			}
			
			if (($size == "all" && $type == "all") || !$size || !$type) {
				//At default selections
				
				if (!$searchterm){
					$query = "SELECT DISTINCT(name), img, price FROM clothesville_products";
				} else {
					$query = "SELECT DISTINCT(name), img, price FROM clothesville_products WHERE name LIKE '%$searchterm%'";
				}
				
				$result = $db->query($query);
				$num_results = $result->num_rows;
				$count = 0;
				if ($num_results == 0){
					echo "<p><h2 style = 'padding:200px'>No results found.</h2></p>";
				} else {
					for ($i=0; $i <$num_results; $i++) {
						$row = $result->fetch_assoc();
						$count = $count + 1;
						if ($count > 4){
							$count = 1;
							echo "</tr><tr>";
						}
						echo "<td><button class = img_btn style = 'margin:30px 50px' name = 'pic_btn' value = '".$row['name']."'><img src='" . $row['img'] . "' alt = 'test_pic' height = '350px' width = '250px'><p class = 'p_btn'>".$row['name']."<br>Price: $".$row['price']."</p></button></td>";	
					}
				}

			} else if ($size != "all" && $type == "all"){
				//when type is all
				if (!$searchterm){
					$query = "SELECT DISTINCT(name), img, price FROM clothesville_products WHERE item_size = '$size'";
					
				} else {
					$query = "SELECT DISTINCT(name), img, price FROM clothesville_products WHERE item_size = '$size' AND name LIKE '%$searchterm%'";
				}
				
				$result = $db->query($query);
				$num_results = $result->num_rows;
				$count = 0;
				if ($num_results == 0){
					echo "<p><h2 style = 'padding:200px'>No results found.</h2></p>";
				} else {
					for ($i=0; $i <$num_results; $i++) {
						$row = $result->fetch_assoc();
						$count = $count + 1;
						if ($count > 4){
							$count = 1;
							echo "</tr><tr>";
						}
						echo "<td><button class = img_btn style = 'margin:30px 50px' name = 'pic_btn' value = '".$row['name']."'><img src='" . $row['img'] . "' alt = 'test_pic' height = '350px' width = '250px'><p class = 'p_btn'>".$row['name']."<br>Price: $".$row['price']."</p></button></td>";	
					}
				}
				
			} else if ($size == "all" && $type != "all"){
				//when size is all
				if (!$searchterm){
					$query = "SELECT DISTINCT(name), img, price FROM clothesville_products WHERE category = '$type'";
					
				} else {
					$query = "SELECT DISTINCT(name), img, price FROM clothesville_products WHERE category = '$type' AND name LIKE '%$searchterm%'";
				}
				$result = $db->query($query);
				
				$num_results = $result->num_rows;
				$count = 0;
				if ($num_results == 0){
					echo "<p><h2 style = 'padding:200px'>No results found.</h2></p>";
				} else {
					for ($i=0; $i <$num_results; $i++) {
						$row = $result->fetch_assoc();
						$count = $count + 1;
						if ($count > 4){
							$count = 1;
							echo "</tr><tr>";
						}
						echo "<td><button class = img_btn style = 'margin:30px 50px' name = 'pic_btn' value = '".$row['name']."'><img src='" . $row['img'] . "' alt = 'test_pic' height = '350px' width = '250px'><p class = 'p_btn'>".$row['name']."<br>Price: $".$row['price']."</p></button></td>";	
					}
				}
			} else {
				//At all other selections				
				if (!$searchterm){
					$query = "SELECT DISTINCT(name), img, price FROM clothesville_products WHERE item_size = '$size' AND category = '$type'";
					
				} else {
					$query = "SELECT DISTINCT(name), img, price FROM clothesville_products WHERE item_size = '$size' AND category = '$type' AND name LIKE '%$searchterm%'";
				}
				$result = $db->query($query);
				
				$num_results = $result->num_rows;
				$count = 0;
				if ($num_results == 0){
					echo "<p><h2 style = 'padding:200px'>No results found.</h2></p>";
				} else {
					for ($i=0; $i <$num_results; $i++) {
						$row = $result->fetch_assoc();
						$count = $count + 1;
						if ($count > 4){
							$count = 1;
							echo "</tr><tr>";
						}
						echo "<td><button class = img_btn style = 'margin:30px 50px' name = 'pic_btn' value = '".$row['name']."'><img src='" . $row['img'] . "' alt = 'test_pic' height = '350px' width = '250px'><p class = 'p_btn'>".$row['name']."<br>Price: $".$row['price']."</p></button></td>";	
					}
				}
			}	
			
			?>
			</tr></table></form></center>
			<br>
			
		</div>
		
		<footer>
			<center><small><i>Copyright &copy; 2021 ClothesVille</i></small></center>
		</footer>
</body>	
</html>



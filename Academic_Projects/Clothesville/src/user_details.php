<?php 
//removed all 'exit;' from first if-else loop here
//user_details.php

session_start();
if ($_SESSION['valid_user'] == "" || !isset($_SESSION['valid_user'])) {
	header('Location: login.php'.SID);
	exit();
	}

else {
	if($_SESSION['valid_user_email'] == "" || $_SESSION['valid_user_address'] == "") {
	//show user details
	@ $db = new mysqli('localhost', 'root', '', 'f32ee');
	if (mysqli_connect_errno()) {
		echo "Error: Could not connect to database.  Please try again later.";
	}

	$name = $_SESSION['valid_user'];

	$query = "SELECT * FROM users WHERE Name = '$name'";
	$result = $db->query($query);
	$row = $result->fetch_assoc();

	$_SESSION['valid_user_email'] = $row['Email'];
	$_SESSION['valid_user_address'] = $row['Address'];

	$result->free(); 
	$db->close();
	}	
}				 				  
?>

<html lang="en">
<head>
	<title>ClothesVille - User Details</title>
	<meta charset="utf-8">
	<link rel="stylesheet" href="assets/css/clothesville.css">
</head>

<body>
	<!-- <div id="wrapper"> -->
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
		<div class="content"> <div id = "cart">
			<center><h2></h2></center>
			<?php 
					echo '<center><h2>USER DETAILS</h2>
								<table>
									<tr>';
					echo "<td>Name: </td><td>".$_SESSION['valid_user']."</td></tr><tr>";
					echo "<td>Email: </td><td>".$_SESSION['valid_user_email']."</td></tr>";
					echo "<td>Address: </td><td>".$_SESSION['valid_user_address']."</td></tr> </table>";
				
				echo '<p><a href="logout.php">Logout</a></p></center>';
			?>
		<center><a href="edit_user_details.php">Edit User Details</a><br><br></center> </div>
		</div>

		<footer>
			<center><small><i>Copyright &copy; 2021 ClothesVille</i></small></center>
		</footer>
	<!-- </div> -->

</body>	
</html>
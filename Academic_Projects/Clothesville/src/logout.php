<?php //logout.php
session_start();
  
  // store to test if they *were* logged in
  $old_user = $_SESSION['valid_user'];  
  unset($_SESSION['valid_user']);
  unset($_SESSION['valid_user_address']);
  unset($_SESSION['valid_user_email']);
  unset($_SESSION['cart']);
  session_destroy();
?>

<html>

<html lang="en">
<head>
	<title>ClothesVille - Logout</title>
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
		<div id = "contact">
			<h1><center>Logged Out</center></h1>
<?php 
  if (!empty($old_user))
  {
    echo 'Logged out.<br />';
  }
  else
  {
    // if they weren't logged in but came to this page somehow
    echo 'You were not logged in, and so have not been logged out.<br />'; 
  }
?> 
		<a href="index.php">Back to home page</a> 
		</div> </div>

		<footer>
			<center><small><i>Copyright &copy; 2021 ClothesVille</i></small></center>
		</footer>


</body>
</html>
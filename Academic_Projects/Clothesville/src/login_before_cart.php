<?php //authmain.php
session_start();

if ($_SESSION['valid_user']!= "") {
  header("Location: cart.php");
}
else {
  header("Location: login.php");
}
?>

/*<html>
<head>

	<title>ClothesVille - Login</title>
	<link rel="stylesheet" href="assets/css/clothesville.css">
	<script type = "text/javascript"  src = "login.js" ></script>
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

	<div class="content">
	<div id = "contact">
				<?php echo "User not logged in; login to continue."?> <br>
				<center> <form id = "MyForm" method="post" action="login.php">
								<label for="myEmail">E-mail:</label>
								<input type="text" type="email" id="myEmail" name="myEmail" required="1" placeholder = "Enter your Email-ID here">

<br>

								<label for="myPassword">Password:</label>
								<input type ="text" type = "password" id="myPassword" name="myPassword" required= "1" placeholder = "Enter your password here"> 
				
<br>				
								<input type="submit" value="LOGIN" id="mySubmit" />
				</form>

								<div id = "button">
								<b><a href="signup.html">SIGN UP</a></b></center>

			</div>

	</div>
	</div>
</body>
</html>
*/

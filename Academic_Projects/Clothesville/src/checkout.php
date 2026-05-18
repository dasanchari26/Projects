<?php //checkout.php

session_start();

/*$_SESSION['total_price'] = "39";
$_SESSION['valid_user'] = "a";
$_SESSION['valid_user_email'] = "b";
$_SESSION['valid_user_address'] = "c"; */

$total = $_SESSION['total_price'];
$name = $_SESSION['valid_user'];
$email = $_SESSION['valid_user_email'];
$address = $_SESSION['valid_user_address']; 
?>

<html>
<html>
<head>
	<title>ClothesVille - Checkout</title>
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

		<center><h1>Billing Details </h1>

		<form method = "post" action = "order_confirmation.php">
		<table border="1">
		<?php 
			echo "<tr> <td>Name: </td>";
			echo "<td align='center'>".$name."</td> </tr>";

			echo "<tr> <td>Email: </td>";
			echo "<td align='center'>".$email."</td> </tr>";

			echo "<tr> <td>Address: </td>";
			echo '<td align="center">'.$address.'</td> </tr>'; 

			echo "<tr> <td>Card Number: </td>";
			echo '<td><input type="number" name="card_number" required = "1"></td></tr>'; 

			echo "<tr> <td>CVV: </td>"; 
			echo '<td><input type="number" name="CVV" required = "1"></td></tr>'; 

			echo '</table>';

			echo '<br><b>Price: $'.$total.'<br><br></b>';
			echo '<button type="submit" class = "button">SUBMIT ORDER</button> &nbsp &nbsp';
			echo '<button type="reset" class = "button">CLEAR DETAILS</button></center></form>'; 
		?>

		<center><a href="edit_user_details.php">Edit User Details<br><br></a></center>
</div>	
	</div>
	<footer>
		<center><small><i>Copyright &copy; 2021 ClothesVille</i></small></center>
	</footer>
	
</body>
</html>
<?php //order_confirmation.php

session_start();

?>

<html lang="en">
<head>
	<title>ClothesVille - Order Confirmation</title>
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
		
		<div class="content"> 
		
			<center><h2></h2></center>
		<div id = "contact">
			<h2><em><center>ORDER CONFIRMED!</center></em></h2>
	<!-- </div> -->

<?php

  //adding order deets to 'orders' table


  @ $db = new mysqli('localhost', 'root', '', 'f32ee');

  if (mysqli_connect_errno()) {
     echo "Error: Could not connect to database.  Please try again later.";
     exit;
  } 

  $items = $_SESSION['cart'];
  $arrLength = count($items);
  $name = $_SESSION['valid_user'];

	for($i = 0; $i < $arrLength; $i++) {
		$productid = $_SESSION['cart'][$i];
		$query = "insert into clothesville_orders (username, productid, status) values ('$name', $productid, 'checked out')";
		$result = $db->query($query);
		/*if($result<=0) {
  	  		echo "An error has occurred.  The item was not added.";
  		}
		$result->free(); */
	}
	$db->close();

  //destroy session variable for cart
  unset($_SESSION['cart']);

  //commenting out since user email has already been retrieved during login

  /*$query = "select * from users where Name = ".$_SESSION['valid_user'];
  $result = $db->query($query);
  $row = $result->fetch_assoc(); 
  $user_email = $row['Email']; */

  $user_email = $_SESSION['valid_user_email'];

  //for testing only
  //$user_email = 'sanchari001@e.ntu.edu.sg';
  $to = 'f32ee@localhost';
  
  $subject = 'Clothesville: Order Confirmation';
  $message = 'Order Confirmed for '.$name.'. Order details can be viewed at http://192.168.56.2/f32ee/ClothesVille/login_before_view_order.php';
  $headers = 'From: f32ee@localhost'. "\r\n".'Reply-To: f32ee@localhost'. "\r\n".'X-Mailer: PHP/'.phpversion();

  //mail($to,$subject, $message, $headers, '-ff32ee@localhost'); 

  echo("mail sent to : ".$user_email);

?>

</div>
		</div>
		
		<footer>
			<center><small><i>Copyright &copy; 2021 ClothesVille</i></small></center>
		</footer>

</body>	
</html>



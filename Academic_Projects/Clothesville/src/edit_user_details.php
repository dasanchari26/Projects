<?php

session_start();

//edit_user_details.php
  // create short variable names
if(isset($_POST['myEmail']) && isset($_POST['myHome'])) {

  $name = $_SESSION['valid_user'];
  $email= $_POST['myEmail'];
  $address= $_POST['myHome'];


  @ $db = new mysqli('localhost', 'root', '', 'f32ee');

  if (mysqli_connect_errno()) {
     echo "Error: Could not connect to database.  Please try again later.";
     exit;
  }

 //updating database
  $query = "UPDATE users SET Email = '$email', Address = '$address' WHERE Name = '$name'";
  $result = $db->query($query);

  if ($result>0) {
      //echo "user details updated into the database.";

      //update session variables
      $_SESSION['valid_user_email'] = $email;
      $_SESSION['valid_user_address'] = $address;

      $query = "select * from users where Name = '$name'";
      $result1 = $db->query($query);

      $row = $result1->fetch_assoc();
      //echo $row['Address'];

      $result1->free();
      $db->close();

      header('Location: user_details.php'.SID);
      exit();

  } 
  else {
  	  echo "An error has occurred.  The item was not updated.";
  } 
} 
?>

<html lang="en">
<head>

	<title>ClothesVille - Edit User Details</title>	
	<link rel="stylesheet" href="assets/css/clothesville.css">
	<script type = "text/javascript"  src = "assets\js\signup.js" ></script>
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


		<h1>Update Email and Address </h1>
				<form id = "MyForm" method="post" action="edit_user_details.php" align = "center">
				<table border="0">


							<td><label for="myEmail">New E-mail:</label></td>
							<td><input type="email" id="myEmail" name="myEmail" required="1"></td> </tr>

<br> <tr>


							<td><label for="myHome">Address:</label></td>
							<td><input type="text" id="myHome" name="myHome" required="1"></td> </tr>
	</table>			
							<center>
								<button type="submit" id="mySubmit" class = "button">UPDATE DETAILS</button> <br> <br>
								<a href = "user_details.php">Back to user details</a>
								<br><br>
							</center>
				</form>


	<script type = "text/javascript"> 
	document.getElementById("MyForm").onsubmit = checkVal; 
	</script>

	<script type = "text/javascript"  src = "assets\js\signupr.js" ></script> 

	</div>
	</div>

</body>	
</html>
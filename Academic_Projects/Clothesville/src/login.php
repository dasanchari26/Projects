<?php //login.php
session_start();

@ $db = new mysqli('localhost', 'root', '', 'f32ee');
				if (mysqli_connect_errno()) {
					echo "Error: Could not connect to database.  Please try again later.";
					exit;
				}

if (isset($_POST['userid']) && isset($_POST['password']))
{
  // if the user has just tried to log in
  $userid = $_POST['userid'];
  $password = $_POST['password'];

  $password = md5($password);

  $query = "select * from users where Name='$userid' and Password='$password'";

  $result = $db->query($query);
 	$row = $result->fetch_assoc();
  if ($result->num_rows >0 )
  {
    // if they are in the database register the user id
    $_SESSION['valid_user'] = $userid;   

    //accessing user address and email 
    $_SESSION['valid_user_email'] = $row['Email'];
    $_SESSION['valid_user_address'] = $row['Address'];
  }
  //$db->close();
}

?>

<html lang="en">
<head>
	<title>ClothesVille - Login</title>
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
			<?php
			 if($_SESSION['valid_user']!= ""){
				echo '<div id = "product_details">';
				echo '<h2>Congrats! You are logged in. Welcome '.$_SESSION['valid_user'].'!</h2>';
				echo '<a href="index.php">Home Page</a> </div>';
			}
			else {
					if (isset($userid)) {
      					// if they've tried and failed to log in
      					echo '<center><br><br>Could not log you in.</center><br>';
    					}
   			 		else {
      					// they have not tried to log in yet or have logged out
      					echo '<center><br><br>Please login to proceed.</center><br>';
    					}

					echo '<div id = "cart">
								<center><h2>LOGIN</h2>';
					echo '<form method="post" action="login.php">';
    					echo '<table>';
    					echo '<tr><td>User Name:</td>';
    					echo '<td><input type="text" name="userid" required = "1"></td></tr>';
    					echo '<tr><td>Password:</td>';
    					echo '<td><input type="password" name="password" required = "1"></td></tr></center>';
    					echo '<tr><td colspan="2" align="center">';
    					echo '<input type="submit" value="Log in"></td></tr>';
    					echo '</table> </div> </form>'; 
					echo '<center><a href="signup.php">Sign Up<br><br></center></a>';
				}
			?>
		</div>

		<footer>
			<center><small><i>Copyright &copy; 2021 ClothesVille</i></small></center>
		</footer>
	<!-- </div> -->

</body>	
</html>
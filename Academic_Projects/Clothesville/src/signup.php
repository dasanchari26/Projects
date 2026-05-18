<?php
session_start();

if (
    isset($_POST['myName']) &&
    isset($_POST['myEmail']) &&
    isset($_POST['myHome']) &&
    isset($_POST['myPassword'])
) {

    $name = $_POST['myName'];
    $email = $_POST['myEmail'];
    $address = $_POST['myHome'];
    $pwd = md5($_POST['myPassword']);

    // DB connection
    $db = new mysqli('localhost', 'root', '', 'f32ee');

    if ($db->connect_error) {
        die("Error: Could not connect to database.");
    }

    // escape inputs (basic safety)
    $name = $db->real_escape_string($name);
    $email = $db->real_escape_string($email);
    $address = $db->real_escape_string($address);

    // check if user exists
    $query = "SELECT * FROM users WHERE Name = '$name'";
    $result = $db->query($query);

    if ($result && $result->num_rows > 0) {
        echo "User Name already exists. Try again.";
    } else {

        // insert user
        $query = "INSERT INTO users (Name, Email, Address, Password)
                  VALUES ('$name', '$email', '$address', '$pwd')";

        if ($db->query($query)) {
            $db->close();
            header('Location: login.php');
            exit;
        } else {
            echo "Error: could not insert user.";
        }
    }

    if ($result) {
        $result->free();
    }
}
?>

<html lang="en">
<head>
    <title>ClothesVille - SignUp</title>
    <link rel="stylesheet" href="assets/css/clothesville.css">
    <script src="assets/js/signup.js"></script>
</head>

<body>
<header>
    <img src="assets/images/logo1.png" alt="logo" height="100" width="500">
</header>

<nav>
    <b><i>
        <a href="index.php">Home</a> &nbsp
        <a href="contact.html">Contact Us</a> &nbsp
        <a href="login_before_view_order.php">Latest Orders</a> &nbsp
        <a href = "login_before_cart.php"><img src = "assets/images/cart.png" alt = "cart" height = "30" width = "30" align = "right" style = "padding-right:20px;"> </a>&nbsp 
		<a href = "user_details.php"><img src = "assets/images/user.png" alt = "user" height = "30" width = "30" align = "right" style = "padding-right:20px;"> </a>
    </i></b>
</nav>

<div class="content">
    <div id="cart">

        <h1>Sign Up</h1>

        <form id="MyForm" method="post" action="signup.php">
            <table>

                <tr>
                    <td>Name:</td>
                    <td><input type="text" name="myName" required></td>
                </tr>

                <tr>
                    <td>Email:</td>
                    <td><input type="email" name="myEmail" required></td>
                </tr>

                <tr>
                    <td>Address:</td>
                    <td><input type="text" name="myHome" required></td>
                </tr>

                <tr>
                    <td>Password:</td>
                    <td><input type="password" name="myPassword" required></td>
                </tr>

                <tr>
                    <td>Retype Password:</td>
                    <td><input type="password" name="retypePassword" required></td>
                </tr>

                <tr>
                    <td colspan="2" style="text-align:center;">
                        <button type="submit" class="button">SIGN UP</button>
                    </td>
                </tr>

            </table>
        </form>

    </div>
</div>

<script>
document.getElementById("MyForm").onsubmit = checkVal;
</script>

</body>
</html>
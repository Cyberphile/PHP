<?php
include("Connection.php");
?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>

</head>

<body>
    <header class="header">
        <a href="#" class="logo"> <i class="fas fa-mug-hot"></i> Baristo</a>

        <nav class="navbar">
            <a href="index.php" class="active">home</a>
            <a href="about.php">about</a>
            <a href="menu.php">menu</a>
            <a href="review.php">review</a>
            <a href="contact.php">contact</a>
        </nav>

        <div class="icons">
            <div class="fas fa-bars" id="menu-btn"></div>
            <!--<div class="fas fa-search" id="search-btn"></div>-->
            <div class="fas fa-user" id="login-btn"></div>
            <a href="mycart.php" id="cartButton" class="btn btn-outline-success">My Cart</a>
        </div>

        <div class="navbar">
            <!--<form action="#" id="search-btn" method="POST">
    <input type="search" name="" id="search-box" placeholder="search here..">
    <label id="searchButton" class="btn-icon"><i class="fas fa-search"></i></label>
</form> -->



            <!-- login -->
            <form class="login-form" method="POST">
                <h3>Login Form</h3>
                <input type="email" placeholder="Email" name="Email" class="box">
                <input type="password" placeholder="Password" name="Password" class="box">
                <p>Forget your password? <a href="#">Click here</a></p>
                <p>Don't have an account? <a href="create_accnt.php">Create now</a></p>
                <input type="submit" value="Login" class="btn">
            </form>


            <script>
                let login = document.querySelector('.login-form');
                let search = document.querySelector('.search'); // Assuming you have defined this element
                let cart = document.querySelector('.cart'); // Assuming you have defined this element
                let navbar = document.querySelector('.navbar'); // Assuming you have defined this element

                document.querySelector('#login-btn').onclick = () => {
                    login.classList.toggle('active');
                    search.classList.remove('active'); // Remove 'active' class from other elements if required
                    cart.classList.remove('active'); // Remove 'active' class from other elements if required
                    navbar.classList.remove('active'); // Remove 'active' class from other elements if required
                }
            </script>



        </div>

    </header>

</body>

</html>

<?php
 // Start session at the beginning of your script

if (isset($_POST['login'])) {
    $Email = $_POST['Email'];
    $pwd = $_POST['Password'];
    $query = "SELECT * FROM coffee where `Email` = '$Email' AND `Password` = '$pwd'";
    $data = mysqli_query($conn, $query);
    if (mysqli_num_rows($data) == 1) {

        $_SESSION['Admin_Login_Id'] = $_POST['Admin_Name'];

        // Define the $profilePage variable

        // Redirect to profilepage.php
        header("Location: profilePage.php");
        exit();
    } else {
        echo "<script>alert('Incorrect Password');</script>";
    }
}
?>

<script src="script.js"></script>
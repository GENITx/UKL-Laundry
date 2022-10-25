<?php 
session_start();
    if($_SESSION['status_login']!=true){
        header('location: login.php');
    }
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <title>Side Navigation Bar</title>
        <link rel="stylesheet" href="css/header.css">
        <script src="https://kit.fontawesome.com/b99e675b6e.js"></script>
        <link
            rel="stylesheet"
            href="https://maxst.icons8.com/vue-static/landings/line-awesome/line-awesome/1.3.0/css/line-awesome.min.css">
    </head>
    <body>

        <div class="wrapper">
            <div class="sidebar">
                <h2>
                    <i class="lab la-accusoft"></i>
                    <br>Laundry Babayo</h2>
            </br>
            <ul>
                <li>
                    <a href="home.php">
                        <i class="fas fa-home"></i>Home</a>
                </li>
                <?php 
                    if ($_SESSION['role'] == 'admin'){
                ?>
                <li>
                    <a href="user.php">
                        <i class="fas fa-user"></i>User</a>
                </li>

                <li>
                    <a href="member.php">
                        <i class="fas fa-address-card"></i>Member</a>
                </li>
                <li>
                    <a href="paket.php">
                        <i class="fas fa-box"></i>Paket</a>
                </li>
                <?php
                    }
                ?>
                <li>
                    <a href="keranjang.php">
                        <i class="fas fa-cart-plus"></i>Keranjang</a>
                </li>
                <li>
                    <a href="histori.php">
                        <i class="fas fa-money-check"></i>Histori</a>
                </li>
                <!--<li><a href="#"><i class="fas fa-blog"></i>Blogs</a></li> <li><a href="#"><i
                class="fas fa-address-book"></i>Contact</a></li>-->
                <li>
                    <a href="logout.php" onclick="return confirm('are you sure');">
                        <i class="fas fa-power-off"></i>Logout</a>
                </li>
            </ul>
            <div class="social_media">
                <a href="#">
                    <i class="fab fa-facebook"></i>
                </a>
                <a href="https://github.com/GENITx">
                    <i class="fab fa-github"></i>
                </a>
                <a href="https://www.instagram.com/imhgl_/">
                    <i class="fab fa-instagram"></i>
                </a>
            </div>
        </div>

    </div>
</body>
</html>
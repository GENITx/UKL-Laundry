<?php
    session_start();
    unset($_SESSION['cart'][$_GET['id_paket']]);
    header('location: keranjang.php');
?>
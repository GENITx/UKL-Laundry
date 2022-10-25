<?php
if($_POST){
    $nama=$_POST['nama'];
    $username=$_POST['username'];
    $password=$_POST['password'];
    $role=$_POST['role'];

    include "koneksi.php";
        $insert=mysqli_query($conn,"insert into user (nama, username, password, role) value ('".$nama."','".$username."','".md5($password)."', '".$role."')");
        if($insert){
            echo "<script>alert('Sukses menambahkan');location.href='login.php';</script>";
        } else {
            echo "<script>alert('Gagal menambahkan');location.href='login.php';</script>";
        }
    }
?>
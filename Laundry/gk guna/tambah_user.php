<!DOCTYPE html>
<html>
<head>
    <title>Tambah User</title>
    <link rel="stylesheet" href="css/tambah_usermember.css">
</head>
<body>
    <?php
        include "header.php";
    ?>
    <div class="main_content">
    <div class="header"><h3>Tambah User</h3></div>
    <div class="info">
    <form action="proses_tambah_user.php" method="post">
        Nama User :
        <input type="text" name="nama" value="" > <br>
        Username : 
        <input type="text" name="username" value="" > <br>
        Password : 
        <input type="password" name="password" value="" > <br>
        Role :
        <select name="role" >
            <option></option>
            <option value="admin">Admin</option>
            <option value="kasir">Kasir</option>
        </select> <br>
        <input type="submit" name="simpan" value="Tambah User">
    </form>
    </div>
    </div>

</body>
</html>
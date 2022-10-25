<!DOCTYPE html>
<html>
    <head>
        <title>Tambah Paket</title>
        <link rel="stylesheet" href="css/tambah_usermember.css">
    </head>
    <body>
        <?php
        include "header.php";
    ?>
        <div class="main_content">
            <div class="header">
                <h3>Tambah Paket</h3>
            </div>
            <div class="info">
                <form action="proses_tambah_paket.php" method="post">
                    Nama paket :
                    <input type="text" name="nama_paket" value="">
                    <br>
                    Harga :
                    <input type="text" name="harga" value="">
                    <br>
                    <input class="submit" type="submit" name="simpan" value="Tambah paket">
                </form>
            </div>
        </div>

    </body>
</html>
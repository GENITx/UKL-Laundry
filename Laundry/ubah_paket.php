<!DOCTYPE html>
<html>
    <head>
        <title>Ubah Paket</title>
        <link rel="stylesheet" href="css/ubah_member_user.css">
    </head>
    <body>
        <?php 
    include "header.php";
    include "koneksi.php";
    $qry_get_paket = mysqli_query($conn,"select * from paket where id_paket = '".$_GET['id_paket']."'");
    $dt_paket=mysqli_fetch_array($qry_get_paket);
    ?>
        <div class="main_content">
            <div class="header">
                <h3>Ubah Paket</h3>
            </div>
            <div class="info">
                <form action="proses_ubah_paket.php" method="post">
                    <input type="hidden" name="id_paket" value="<?=$dt_paket['id_paket']?>">
                    Nama paket :
                    <input type="text" name="nama_paket" value="<?=$dt_paket['nama_paket']?>">
                    <br>
                    Harga :
                    <input type="text" name="harga" value="<?=$dt_paket['harga']?>">
                    <br>
                    <input class="submit" type="submit" name="simpan" value="Ubah paket">
                </form>
            </div>
        </div>
    </body>
</html>
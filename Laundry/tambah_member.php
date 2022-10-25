<!DOCTYPE html>
<html>
    <head>
        <title>Tambah Member</title>
        <link rel="stylesheet" href="css/tambah_usermember.css">
    </head>
    <body>
        <?php
        include "header.php";
    ?>
        <div class="main_content">
            <div class="header">
                <h3>Tambah Member</h3>
            </div>
            <div class="info">
                <form action="proses_tambah_member.php" method="post">
                    Nama Member :
                    <input type="text" name="nama" value="">
                    <br>
                    Alamat :
                    <input type="text" name="alamat" value="">
                    <br>
                    Gender :
                    <select name="jk">
                        <option></option>
                        <option value="l">Laki-Laki</option>
                        <option value="p">Perempuan</option>
                    </select>
                    <br>
                    Telepon :
                    <input type="int" name="telp" value="">
                    <br>
                    Kota:
                    <input type="text" name="kota" value="">
                    <br>
                    <input class="submit" type="submit" name="simpan" value="Tambah Member">
                    <br>
                    
                </form>
            </div>
        </div>

    </body>
</html>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Paket Page</title>
        <link rel="stylesheet" href="css/paket.css">
    </head>
    <body>
        <?php
        include "header.php";
    ?>
        <div class="main_content">
            <div class="header">Tabel Paket</div>
            <div class="info">
                <table>
                    <thead>
                        <tr>
                            <th>Id Paket</th>
                            <th>Nama Paket</th>
                            <th>Harga</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php 
                        include "koneksi.php";
                        $qry_paket=mysqli_query($conn,"select * from paket");
                        $no=0;
                        while($data_paket=mysqli_fetch_array($qry_paket)){
                        $no++;?>
                        <tr>
                            <td><?=$no?></td>
                            <td><?=$data_paket['nama_paket']?></td>
                            <td>
                                <?php
                                    echo "Rp. ".number_format($data_paket['harga'], 2, ',', '.')."";
                                ?>
                            </td>
                            <td>
                                <a href="ubah_paket.php?id_paket=<?=$data_paket['id_paket']?>">
                                    <button>Ubah</button>
                                </a>
                                |
                                <a
                                    href="hapus_paket.php?id_paket=<?=$data_paket['id_paket']?>"
                                    onclick="return confirm('Apakah anda yakin menghapus data ini?')">
                                    <button>Hapus</button>
                                </a>
                            </td>
                        </tr>
                        <?php
                        }
                    ?>
                    </tbody>
                </table>
                <br>
                <?php 
                    if ($_SESSION['role'] == 'admin'){
                ?>
                <a href="tambah_paket.php">
                    <button>Tambah Paket</button>
                </a>
                <?php } ?>
            </div>
        </div>
    </body>
</html>
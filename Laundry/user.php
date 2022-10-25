<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>User Page</title>
        <link rel="stylesheet" href="css/member_user.css">
    </head>
    <body>
        <?php
        include "header.php";
    ?>
        <div class="main_content">
            <div class="header">Tabel User</div>
            <div class="info">
                <table>
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Nama</th>
                            <th>Username</th>
                            <th>Role</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php 
                        include "koneksi.php";
                        $qry_user=mysqli_query($conn,"select * from user");
                        $no=0;
                        while($data_user=mysqli_fetch_array($qry_user)){
                        $no++;?>
                        <tr>
                            <td><?=$no?></td>
                            <td><?=$data_user['nama']?></td>
                            <td><?=$data_user['username']?></td>
                            <td><?=$data_user['role']?></td>
                            <td>
                                <a href="ubah_user.php?id_user=<?=$data_user['id_user']?>">
                                    <button>Ubah</button>
                                </a>
                                |
                                <a
                                    href="hapus_user.php?id_user=<?=$data_user['id_user']?>"
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
                <!--<br> <a href="tambah_user.php"><button>Tambah User</button></a>-->
            </div>
        </div>
    </body>
</html>
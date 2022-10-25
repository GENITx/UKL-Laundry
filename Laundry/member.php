<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Member Page</title>
        <link rel="stylesheet" href="css/member_user.css">
    </head>
    <body>
        <?php
        include "header.php";
    ?>
        <div class="main_content">
            <div class="header">Tabel Member</div>
            <div class="info">
                <table>
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Nama</th>
                            <th>Alamat</th>
                            <th>Jenis Kelamin</th>
                            <th>Telepon</th>
                            <th>Kota</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php 
                        include "koneksi.php";
                        $qry_member=mysqli_query($conn,"select * from member");
                        $no=0;
                        while($data_member=mysqli_fetch_array($qry_member)){
                        $no++;?>
                        <tr>
                            <td><?=$no?></td>
                            <td><?=$data_member['nama']?></td>
                            <td><?=$data_member['alamat']?></td>
                            <td><?=$data_member['jk']?></td>
                            <td><?=$data_member['telp']?></td>
                            <td><?=$data_member['kota']?></td>
                            <td>
                                <a href="ubah_member.php?id_member=<?=$data_member['id_member']?>">
                                    <button>Ubah</button>
                                </a>
                                |
                                <a
                                    href="hapus_member.php?id_member=<?=$data_member['id_member']?>"
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
                <a href="tambah_member.php">
                    <button>Tambah Member</button>
                </a>
            </div>
        </div>
    </body>
</html>
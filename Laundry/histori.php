<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Transaksi Page</title>
        <link rel="stylesheet" href="css/histori.css">
    </head>
    <body>
        <?php
        include "header.php";
    ?>
        <div class="header">
            Histori Page
        </div>
        <div class="main_content">
            <div class="info">
                <table class="table table-bordered border-primary">
                    <thead>
                        <tr>
                            <th>NO</th>
                            <th>Nama Member</th>
                            <th>Nama User</th>
                            <th>Nama Paket - Qty - Harga</th>
                            <th>Total Harga</th>

                            <?php
            include "koneksi.php";
                $qry_histori=mysqli_query($conn,"select * from transaksi  order by id_transaksi desc");
                $dt_histori=mysqli_fetch_array($qry_histori);
                ?>
                            <th>Status Bayar</th>
                            <th>Status Paket</th>
                            <th>Aksi</th>
                            <th>Nota</th>

                        </tr>
                    </thead>
                    <tbody>

                        <?php
            include "koneksi.php";
            $no=0;
            $qry_histori=mysqli_query($conn, "select transaksi.*, member.nama as nama_member, user.nama as nama_user from transaksi join user ON user.id_user = transaksi.id_user join member ON member.id_member = transaksi.id_member order by id_transaksi desc");
            while($dt_histori=mysqli_fetch_array($qry_histori)){
                    $total=0;
                    $no++;
                    $paket_dibeli="<ol>";
                    $jumlah_barang="<ol>";
                    // $qry_barang=mysqli_query($conn,"select * from  detail_transaksi join barang on barang.id_barang=detail_transaksi.id_barang");
                    $qry_paket = mysqli_query($conn,"select * from  detail_transaksi join paket on paket.id_paket=detail_transaksi.id_paket where id_transaksi = ".$dt_histori['id_transaksi']);
                    while($dt_paket=mysqli_fetch_array($qry_paket)){
                        $subtotal = 0;
                        $subtotal += $dt_paket['harga'] * $dt_paket['qty'];
                        $paket_dibeli.="<li class = 'paket'>".$dt_paket['nama_paket']."&nbsp;&nbsp;-&nbsp;&nbsp;".$dt_paket['qty']."&nbsp;&nbsp;-&nbsp;&nbsp;"."Rp. ".number_format($subtotal, 2, ',', '.').""."</li>";
                        $jumlah_barang.="<li>".$dt_paket['qty']."</li>";
                        $total += $dt_paket['harga'] * $dt_paket['qty'];
                    }
                    $paket_dibeli.="</ol>";
            ?>
                        <tr>
                            <td><?=$no?></td>
                            <td><?=$dt_histori['nama_member']?></td>
                            <td><?=$dt_histori['nama_user']?></td>
                            <td><?=$paket_dibeli?></td>
                            <td>
                                <?php
                            echo "Rp. ".number_format($total, 2, ',', '.')."";
                        ?>
                            </td>
                            <td><?=$dt_histori['status_bayar']?></td>
                            <td><?=$dt_histori['status_order']?></td>
                            <td>
                                <?php
                            if ($dt_histori['status_bayar'] == "belum lunas") {
                            ?>
                                <a href="ubah_status.php?id_transaksi=<?=$dt_histori['id_transaksi']?>">
                                    <button>Lunas</button>
                                </a>
                                |
                            <?php
                            } else {
                            ?>
                                <a href="#">
                                    <button class="done">✔</button>
                                </a>
                                |
                                <?php
                            }
                            ?>
                                <?php
                            if ($dt_histori['status_order'] == "baru") {
                            ?>
                                <a
                                    href="ubah_status_paket.php?id_transaksi=<?=$dt_histori['id_transaksi']?>&status_order=diproses">
                                    <button>Diproses</button>
                                </a>
                            <?php
                            } elseif ($dt_histori['status_order'] == "diproses") {
                            ?>
                                <a
                                    href="ubah_status_paket.php?id_transaksi=<?=$dt_histori['id_transaksi']?>&status_order=selesai">
                                    <button>Selesai</button>
                                </a>
                            <?php
                            } elseif ($dt_histori['status_order'] == "selesai") {
                            ?>
                                <a
                                    href="ubah_status_paket.php?id_transaksi=<?=$dt_histori['id_transaksi']?>&status_order=diambil">
                                    <button>Diambil</button>
                                </a>
                            <?php
                            } elseif ($dt_histori['status_order'] == "diambil") {
                            ?>
                                <a href="#">
                                    <button class="done">✔</button>
                                </a>
                                <?php
                            }
                            ?>
                            </td>
                            <?php 
                                if ($dt_histori['status_bayar'] == 'lunas' and $dt_histori['status_order'] == 'diambil'){
                            ?>
                            <td>
                            <a href="nota.php?id_transaksi=<?=$dt_histori['id_transaksi']?>">
                                    <button class="done">O</button>
                                </a>
                            </td>
                            <?php
                                }
                            ?>
                        </tr>
                        <?php
                        }
                    ?>
                    </tbody>
                </table>
                <!-- <a href="hapus_histori.php" onclick="return confirm('Yakin menghapus
                seluruh histori?');"> <button>Hapus Seluruh Histori</button> </a> -->
            </div>
        </div>

    </body>
</html>
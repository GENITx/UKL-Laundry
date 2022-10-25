<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Nota</title>
        <link rel="stylesheet" href="css/nota.css">
    </head>
    <body>
        <?php
            include "koneksi.php";
        ?>

        <div class="main_content">
           <a href="histori.php"><button><</button></a> 
            <div class="info">
                <div class="nota">
                    <div class="header">Nota Transaksi</div>
                    <h1>LaundryQ</h1>
                    <br>
                    <?php
                    $qry_transaksi = mysqli_query($conn, "select transaksi.*, member.nama as nama_member, user.nama as nama_user
                                                        from transaksi 
                                                        join user ON user.id_user = transaksi.id_user 
                                                        join member ON member.id_member = transaksi.id_member
                                                        where transaksi.id_transaksi = '".$_GET['id_transaksi']."'");

                    
                    while ($dt_transksi = mysqli_fetch_array($qry_transaksi)) {
    
                        $total = 0;
                        $harga_sub = "<ol style='list-style:none'>";
                        $harga = "<ol style='list-style:none'>";
                        $qty = "<ol style='list-style:none'>";
                        $nota_paket = "<ol style='list-style:none'>";
                        $qry_paket = mysqli_query($conn,"select * from  detail_transaksi join paket on paket.id_paket=detail_transaksi.id_paket where id_transaksi = ".$dt_transksi['id_transaksi']);
                        while($dt_paket=mysqli_fetch_array($qry_paket)){
                            
                            $subtotal = 0;
                            $subtotal += $dt_paket['harga'] * $dt_paket['qty'];
                            $qty .= "<li>".$dt_paket['qty']."</li><br>";
                            $nota_paket .= "<li>".$dt_paket['nama_paket']."</li><br>";
                            $total += $dt_paket['harga'] * $dt_paket['qty'];
                            $harga.= "<li>"."Rp. ".number_format($dt_paket['harga'], 2, ',', '.').""."</li><br>";
                            $harga_sub.= "<li>"."Rp. ".number_format($subtotal, 2, ',', '.').""."</li><br>";
                        }
                        $nota_paket .= "</ol>";
                        $qty .= "</ol>";
                        $harga .= "</ol>";
                        $harga_sub .= "</ol>";
                        ?>
                    <p class="right">Status Bayar&nbsp;:&nbsp;<?=$dt_transksi['status_bayar']?></p>
                    <p>Nama Member&nbsp;:&nbsp;<?=$dt_transksi['nama_member']?></p>
                    <p class="right">Tanggal Transaksi&nbsp;:&nbsp;<?=$dt_transksi['tgl_transaksi']?></p>
                    <p class="jeda">Nama User&nbsp;:&nbsp;<?=$dt_transksi['nama_user']?></p>
                    
                    
                    <table>
                        <thead>
                            <tr>
                                <th>Nama Paket</th>
                                <th>Qty</th>
                                <th>Harga</th>
                                <th>Total Harga</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td><?=$nota_paket?></td>
                                <td><?=$qty?></td>
                                <td><?=$harga?></td>
                                <td><?=$harga_sub?></td>
                            </tr>
                            <tr>
                                <td colspan="3">Total</td>
                                <td colspan="3">
                                    <?php
                                        echo "Rp. ".number_format($total, 2, ',', '.')."";
                                    ?>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                    <?php
                    }
                ?>
                </div>
            </div>
        </div>
    </body>
</html>
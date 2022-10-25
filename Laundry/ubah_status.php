<?php
    include "koneksi.php";
    $update_status = mysqli_query($conn, "update transaksi set status_bayar = 'lunas', tgl_bayar = '".date('Y-m-d')."' where id_transaksi = '".$_GET['id_transaksi']."'");
    if ($update_status) {
        echo "<script>alert('Proses Pembayaran Sukses');location.href='histori.php';</script>";
    } else {
        echo "<script>alert('Proses Pembayaran Gagal');location.href='histori.php';</script>";
    }
?>
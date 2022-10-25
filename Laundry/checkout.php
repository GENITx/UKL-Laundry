<?php
    session_start();
    include "koneksi.php";
    $cart=@$_SESSION['cart'];
    $id_member = $_POST['nama'];
    if(count($cart)>0 and $id_member != NULL){
        $tgl_bayar=5; //satuan hari
        $tgl_harus_bayar=date('Y-m-d',mktime(0,0,0,date('m'),(date('d')+$tgl_bayar),date('Y')));
        mysqli_query($conn,"insert into transaksi (id_member, id_user, tgl_transaksi, batas_waktu, tgl_bayar, status_bayar, status_order) value('".$id_member."', '".$_SESSION['id_user']."', '".date('Y-m-d')."','".$tgl_harus_bayar."', '".date('Y-m-d')."', 'belum lunas', 'baru')");
        $id=mysqli_insert_id($conn);
        foreach ($cart as $key_produk => $val_produk) {
            mysqli_query($conn,"insert into detail_transaksi (id_transaksi, id_paket, qty) value('".$id."','".$val_produk['id_paket']."', '".$val_produk['qty']."')");
        }
        unset($_SESSION['cart']);
        echo '<script>alert("Pembelian berhasil");location.href="histori.php"</script>';
    }else {
        echo '<script>alert("Belum diisi semua");location.href="keranjang.php"</script>';
    }
?>
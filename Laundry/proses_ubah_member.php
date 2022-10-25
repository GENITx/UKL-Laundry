<?php
if($_POST){
    $id_member=$_POST['id_member'];
    $nama=$_POST['nama'];
    $alamat=$_POST['alamat'];
    $jk=$_POST['jk'];
    $telp=$_POST['telp'];
    $kota=$_POST['kota'];
    if(empty($nama)){
        echo "<script>alert('nama member tidak boleh kosong');location.href='ubah_member.php';</script>";
    } elseif(empty($alamat)){
        echo "<script>alert('alamat tidak boleh kosong');location.href='ubah_member.php';</script>";
    } elseif(empty($jk)){
        echo "<script>alert('jenis kelamin tidak boleh kosong');location.href='ubah_member.php';</script>";
    } else {
        include "koneksi.php";
        if(empty($telp)){
            $update=mysqli_query($conn,"update member set nama='".$nama."', alamat='".$alamat."', jk='".$jk."', kota='".$kota."' where id_member = '".$id_member."' ") or die(mysqli_error($conn));
            if($update){
                echo "<script>alert('Sukses update member');location.href='member.php';</script>";
            } else {
                echo "<script>alert('Gagal update member');location.href='ubah_member.php?id_member=".$id_member."';</script>";
            }
        } else {
            $update=mysqli_query($conn,"update member set nama='".$nama."', alamat='".$alamat."', jk='".$jk."', telp='".$telp."',kota='".$kota."' where id_member = '".$id_member."'") or die(mysqli_error($conn));
            if($update){
                echo "<script>alert('Sukses update member');location.href='member.php';</script>";
            } else {
                echo "<script>alert('Gagal update member');location.href='ubah_member.php?id_member=".$id_member."';</script>";
            }
        }
        
    } 
}
?>
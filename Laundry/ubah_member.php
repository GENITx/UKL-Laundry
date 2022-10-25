<!DOCTYPE html>
<html>
    <head>
        <title>Ubah Member</title>
        <link rel="stylesheet" href="css/ubah_member_user.css">
    </head>
    <body>
        <?php 
    include "header.php";
    include "koneksi.php";
    $qry_get_member = mysqli_query($conn,"select * from member where id_member = '".$_GET['id_member']."'");
    $dt_member=mysqli_fetch_array($qry_get_member);
    ?>
        <div class="main_content">
            <div class="header">
                <h3>Ubah Member</h3>
            </div>
            <div class="info">
                <form action="proses_ubah_member.php" method="post">
                    <input type="hidden" name="id_member" value="<?=$dt_member['id_member']?>">
                    Nama Member :
                    <input type="text" name="nama" value="<?=$dt_member['nama']?>">
                    <br>
                    Alamat :
                    <input type="text" name="alamat" value="<?=$dt_member['alamat']?>">
                    <br>
                    Jenis Kelamin :
                    <?php 
        $arr_gender=array('L'=>'Laki-laki','P'=>'Perempuan');
        ?>
                    <select name="jk" class="form-control">
                    <?php foreach ($arr_gender as $key_gender => $val_gender):
                if($key_gender==$dt_member['jk']){
                    $selek="selected";
                } else {
                    $selek="";
                }
             ?>
                        <option value="<?=$key_gender?>" <?=$selek?>><?=$val_gender?></option>
                        <?php endforeach ?>
                    </select>
                    <br>
                    Telepon :
                    <input type="text" name="telp" value="<?=$dt_member['telp']?>">
                    <br>
                    Kota:
                    <input type="text" name="kota"value="<?=$dt_member['kota']?>">
                    <br>
                    <input class="submit" type="submit" name="simpan" value="Ubah member">
                </form>
            </div>
        </div>
    </body>
</html>
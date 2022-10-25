<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="css/cart.css">
</head>
<body>
    <?php
        include "header.php";
    ?>
    <div class="main_content">
        <div class="info">
    <table>
        <thead>
            <tr>
                <th>No</th>
                <th>Nama Paket</th>
                <th>Harga</th>
            </tr>
        </thead>
        <?php
        if (@$_SESSION['cart']){
        foreach ($_SESSION['cart'] as $key_paket => $val_paket): ?>
        <tbody>
            <tr>
                <td class = "no"><?=($key_paket+1)?></td>
                <td class = "nama"><?=$val_paket['nama_paket']?></td>
                <td class = "harga">
                    <?php
                        echo "Rp. ".number_format($val_paket['harga'], 2, ',', '.')."";
                    ?>
                </td>
                <td class = "x"><a href="hapus_cart.php?id_paket=<?=$key_paket?>" onclick="return confirm('Are you sure?');"><strong>X</strong></a></td>
            </tr>
        </tbody>
        <?php endforeach ?>
        <?php
            }
        ?>
    </table>
    <a href="#" onclick="return confirm('Are you sure?');"><button>Checkout</button></a>
    </div>
    </div>
</body>
</html>
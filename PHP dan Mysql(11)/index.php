<?php 
    require 'fungsi.php';
    $vap = query("SELECT * FROM vapor");
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" con tent="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        img{
            width: 50px; 
            height: 50px;
        }
    </style>
</head>
<body>

<h1>Daftar Vapor</h1>
    <table border="1" cellpadding="10" cellspacing="0">
        <tr>
            <th>id</th>
            <th>Aksi</th>
            <th>Gambar</th>
            <th>Merk</th>
            <th>Tipe</th>
            <th>Warna</th>
            
        </tr>
        <?php $i = 1 ?>
        <?php foreach ($vap as $vapor) : ?>

        <tr>
            <td><?= $i ?></td>
            <td>
                <a href="">ubah</a>|
                <a href="">hapus</a>
            </td>
            <td><img src="img/<?= $vapor["gambar"] ?>" alt=""></td>
            <td><?= $vapor["merk"] ?></td>
            <td><?= $vapor["tipe"] ?></td>
            <td><?= $vapor["warna"] ?></td>
        </tr>
        
        <?php $i++ ?>
        <?php endforeach; ?>

    </table>
</body>
</html>
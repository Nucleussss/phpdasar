<?php 
    require 'fungsi.php';
    session_start();
    if(!isset($_SESSION['login'])){
        header('Location: login.php');
        exit;
    }
    
    $vap = query("SELECT * FROM vapor");
    
    if (isset($_POST["cari"])) {
        $vap = cari($_POST["keyword"]);
    }
    
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" con tent="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>vapor</title>
    <style>
        img{
            width: 50px; 
            height: 50px;
        }
    </style>
</head>
<body>
<a href="logout.php">Logout</a>
<h1>Daftar Vapor</h1>
<a href="tambah.php">tambahkan data</a>
<br> <br>
<form action="" method="post">
    <input type="text" name="keyword" class="keyword" autofocus autocomplete="off" placeholder="Masukan Keyword...">
    <button type="submit" name="cari" class="cari">Cari!</button>
</form> <br>

    <div class="container">
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
                    <a href="ubah.php?id= <?= $vapor["id"]?>">ubah</a>|
                    <a href="hapus.php?id= <?= $vapor["id"]?>" onclick="return confirm('yakin');">hapus</a>
                </td>
                <td><img src="img/<?= $vapor["gambar"] ?>" alt=""></td>
                <td><?= $vapor["merk"] ?></td>
                <td><?= $vapor["tipe"] ?></td>
                <td><?= $vapor["warna"] ?></td>
            </tr>
            
            <?php $i++ ?>
            <?php endforeach; ?>
        </table>
    </div>
    <script src="js/script.js"></script>
</body>
</html>
<?php 
    if (
        !isset($_GET['merk']) ||
        !isset($_GET['tipe']) ||
        !isset($_GET['warna']) ||
        !isset($_GET['gambar']) 
    ) {
        // redirect
        header('Location: index.php');
        exit;
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>get</title>
</head>
<body>
    <h1>Latihan get</h1>
    <ul>
        <li>Merk: <?= $_GET['merk'] ?> </li>
        <li>Tipe: <?= $_GET['tipe'] ?></li>
        <li>Warna: <?= $_GET['warna'] ?></li>
        <li><img src="img/<?=$_GET['gambar']?>"></li>
    </ul>
    <a href="index.php">kembali kehalaman awal</a>
</body>
</html>
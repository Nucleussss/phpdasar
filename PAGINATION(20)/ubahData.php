<?php 
    session_start();
    require 'fungsi.php';

    if (!isset($_SESSION['login'])) {
        header('Location: login.php');
    }

    $id = $_GET['id'];
    $dataVapor = query("SELECT * FROM vapor WHERE id = $id");

    if (isset($_POST['ubah'])) {
        if (ubahData($_POST) > 0) {
            echo 
                "<script>
                    alert('Berhasil mengubah data');
                    document.location.href ='index.php';
                </script>";
        }else {
            echo 
                "<script>
                    alert('Gagal mengubah data');
                    document.location.href ='index.php';
                </script>";
        }
    }
    
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Mengubah Data</title>
    <style>
        img{
            width :50px;
            height : 50px;
        }
    </style>
</head>
<body>
    <h1>Mengubah Data Pada Table Vapor</h1>
    <form action="" method="post" enctype="multipart/form-data">
        <ul>
            <?php foreach ($dataVapor as $vape) : ?>
            <input type="hidden" name="id" value="<?= $vape['id'] ?>">
            <input type="hidden" name="namaGambarLama" value="<?= $vape['gambar'] ?>">
            
            <li>
                <label for="merk">Merk : </label>
                <input type="text" name="merk" id="merk" value="<?= $vape['merk'] ?>" >
            </li>
            <li>
                <label for="tipe">Tipe : </label>
                <input type="text" name="tipe" id="tipe" value="<?= $vape['tipe'] ?>">
            </li>
            <li>
                <label for="warna">Warna : </label>
                <input type="text" name="warna" id="warna" value="<?= $vape['warna'] ?>">
            </li>
            <li>
                <label for="gambar">Gambar : </label><br>
                <img src="img/<?= $vape['gambar']  ?>" alt=""><br>
                <input type="file" name="gambar" id="gambar">
            </li>
            <li>
                <button type="submit" name="ubah"> Ubah!</button>
            </li>
            <?php endforeach; ?>
        </ul>
    </form>
</body>
</html>
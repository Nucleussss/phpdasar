<?php 
    session_start();
    require 'fungsi.php';

    if (!isset($_SESSION['login'])) {
        header('Location: login.php');
    }

    if (isset($_POST["tambah"])) {

        if(tambahData($_POST) > 0) {
            echo 
            "<script>
                alert('Berhasil memasukan data');
                document.location.href ='index.php';
            </script>";
        }else {
            echo 
            "<script>
                alert('Gagal memasukan data');
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
    <title>Tambah Data</title>
</head>
<body>
    <h1>Halaman Tambah Data</h1>
    <form action="" method="post" enctype="multipart/form-data" >
        <ul>
            <li>
                <label for="merk">Merk :</label>
                <input type="text" name="merk" id="merk">
            </li>
            <li>
                <label for="tipe">Tipe :</label>
                <input type="text" name="tipe" id="tipe">
            </li>
            <li>    
                <label for="warna">Warna :</label>
                <input type="text" name="warna" id="warna">
            </li>
            <li>
                <label for="gambar">gambar :</label>
                <input type="file" name="gambar" id="gambar">
            </li>
            <li>
                <button type="submit" name="tambah">Tambah!</button>
            </li>
        </ul>
    </form>
</body>
</html>
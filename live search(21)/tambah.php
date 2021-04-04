<?php 
require "fungsi.php";
session_start();
if(!isset($_SESSION['login'])){
    header('Location: login.php');
    exit;
}

    
    
    if (isset($_POST["submit"])) {
        if (tambah($_POST) > 0) {
            echo "<script>
                alert('data berhasil ditambahkan!');
                document.location.href = 'index.php';
            </script>";
        }else{
            echo "<script>
                alert('data gagal ditambahkan!');
                document.location.href = 'index.php';
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
    <title>tambah data</title>
</head>
<body>
    <h1>Tambah Data vapor</h1>
    
    <form action="" method = "post" enctype="multipart/form-data">
        <ul>
            <li>
                <label for="merk">Merk:</label>
                <input type="text" name ="merk" id="merk" required>
            </li>
            <li>
                <label for="tipe">Tipe:</label>
                <input type="text" name ="tipe" id="tipe"required>
            </li>
            <li>
                <label for="warna">Warna:</label>
                <input type="text" name ="warna" id="warna"required>
            </li>
            <li>
                <label for="gambar">Gambar:</label>
                <input type="file" name ="gambar" id="gambar">
            </li>
            <li>
                <button type="submit" name="submit">Kirim Data!</button>
            </li> 
        </ul>
    </form>

</body>
</html>
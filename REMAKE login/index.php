<?php 
    session_start();
    require 'fungsi.php';
    if (!isset($_SESSION['login'])) {
        header('Location: login.php');
    }
    
    // pagination
    $jumlahDataPerhalaman = 2;
    $jumlahData = count(query("SELECT * FROM vapor"));
    $jumlahHalaman = ceil( $jumlahData / $jumlahDataPerhalaman);
    $halamanAktif = isset($_GET['halaman']) ? $_GET['halaman'] : 1;
    $indexData = ($jumlahDataPerhalaman * $halamanAktif) - $jumlahDataPerhalaman;
    $dataVapor = query("SELECT * FROM vapor LIMIT $indexData,$jumlahDataPerhalaman");
    
    if (isset($_POST['cari'])) {
        $dataVapor = count(cariData($_POST['keyword']));
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Data Vapor</title>
    <style>

        img{
            width : 50px;
            height : 50px;
        }
        .aktif{
            font-weight: 500;
            color: red;
        }

    </style>
</head>
<body>
    <a href="logout.php">Logout</a>
    <h1>Daftar Vapor</h1>
    <a href="tambahData.php" >Tambah data Vapor</a><br><br>
    <form action="" method="post">
        <input type="search" name="keyword" autofocus autocomplete="off" placeholder="masukan keyword...">
        <button type="submit" name="cari">cari!</button>
    </form><br>

    <!-- panah kekiri -->
    <?php if ($halamanAktif > 1) : ?>
        <a href="?halaman= <?= $halamanAktif - 1 ?>">&laquo;</a>
    <?php endif; ?>

    <!-- menampilkan halaman -->
    <?php for ($i=1; $i <= $jumlahHalaman; $i++) : ?>
        <?php if ($i == $halamanAktif) :?>
            <a href="?halaman=<?=$i?>" class="aktif"><?=$i?></a>
        <?php else :?>
            <a href="?halaman=<?=$i?>"><?=$i?></a>
        <?php endif; ?>
    <?php endfor; ?>

    <!-- panah kekanan -->
    <?php if ($halamanAktif < $jumlahHalaman) : ?>
        <a href="?halaman= <?= $halamanAktif + 1 ?>">&raquo;</a>
    <?php endif; ?>

    <table border="1" cellspacing="0" cellpadding="10">
        <tr>
            <th>Id</th>
            <th>Aksi</th>
            <th>Gambar</th>
            <th>merk</th>
            <th>Tipe</th>
            <th>Warna</th>
        </tr>

        <?php $id = 1; ?>
        <?php foreach ($dataVapor as $vape) : ?>
        <tr>
            <td> <?= $id ?> </td>
            <td>
                <a href="hapusData.php?id=<?= $vape['id']?>">hapus</a> |
                <a href="ubahData.php?id=<?= $vape['id']?>">ubah</a>
            </td>
            <td><img src="img/<?= $vape["gambar"] ?>" alt=""></td>
            <td><?= $vape["merk"] ?></td>
            <td><?= $vape['tipe'] ?></td>
            <td><?= $vape['warna'] ?></td>
        </tr>
        <?php $id += 1; ?>
        <?php endforeach; ?>
    </table>
    
</body>
</html>
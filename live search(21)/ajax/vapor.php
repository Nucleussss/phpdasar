<?php 
    require '../fungsi.php';
    $keyword = $_GET['keyword'];
    $query = "SELECT * FROM vapor WHERE merk LIKE '%$keyword%' OR 
        tipe LIKE '%$keyword%' OR 
        warna LIKE '%$keyword%'";
    $vap = query($query);
?>

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
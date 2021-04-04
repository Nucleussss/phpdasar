<?php 
    // membuat array di PHP
    $hari = ["senin" , "selasa" ,"rabu" ,"kamis" ,"jumat"];
    $bulan = ["januari","februari","maret","april"];
    $angka = [12,23,12,2,65,234];
    $mhs = [["sapari",1231,"@mamakkau"],["man yuni",5235,"@pikmakkau"],["dolgani",23523,"@papagw"]]

    //       macam-macam cara menampilkan array 
    // mennggunakan print_r()
    // echo print_r($hari);

    // mennggunakan var_dump()
    // echo var_dump($hari);

    // menggunakan foreach()
    // foreach ($bulam as $e ) {
    //     echo $e;
    // }

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>test</title>
    <style>
        .kotak{
            width: 100px;
            height: 100px;
            margin: 3px;
            background-color: red;
            text-align: center;
            line-height: 100px;
            float : left;
            list-style: none;
        }
    </style>
</head>
<body>
    <h1>Menampilkan Array</h1>
    <ul>
    <!-- <?php foreach ($angka as $e) : ?>
        <li class = "kotak"> <?php echo $e ?> </li>
    <?php endforeach; ?> -->
    <br>
    <?php foreach ($mhs as $e) : ?>

        <?php foreach ($e as $a) : ?>
        <li> <?= $a  ?> </li>
        <?php endforeach ?>
        
        <br>
    <?php endforeach; ?>
    </ul>
</body>
</html>
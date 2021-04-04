<?php 
    //      Standart Output pada PHP
    // echo,print -> digunakn untuk menampilkan sesuatu ke layar
        // echo 'halo, dunia';
    // print_r() -> bisa mencetak string bisa juga mencetak array 
        // $angka = 12;
        // print_r($angka);
    // var_dump() -> biasanya digunakan untuk debugging,karena menampilkan informasi tambahan
    //                berupa keterangan tipe data dan ukurannya(spasi juga dihitung).
        // var_dump('sandiaga')

    

?>

<!--  Penulisan Sintaks pada PHP
    1.PHP di dalam HTML -->

    <!-- <!DOCTYPE html>
    <html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Document</title>
    </head>
    <body>
        <h1>halo nama saya <?php echo "samuji" ?> </h1>
    </body>
    </html> -->


    <!-- 2.HTML dalam PHP -->
    <!-- <!DOCTYPE html>
    <html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Document</title>
    </head>
    <body>
    <?php
        echo "<h1>Halo,bapak kamu tukang ojek ya?</h1>"
    ?>
    </body>
    </html> -->

<?php 
    //      Variable dan Tipe data pada PHP
    // menuliskan variable pada PHP cukup menggunakan tanda ($) dilanjut dengan nama variablenya
    // $nama = 'saipuji';
    // echo $nama;


    //      operator pada PHP
    // Aritmatika + - * / %
    // $x = 10;
    // $y = 20;
    // echo $x + $y;

    // Penggabung String/Concatination yaitu tanda(.)
    // $string1 = 'sapi saya';
    // $string2 = 'berwarna hitam';
    // echo $string1." ".$string2;

    // Assigment 
    // = , += , -= , *= , /= , %= , .=
    // $string1 = 'sapi saya';
    // $string1 .= ' ';
    // $string1 .= 'berwarna hitam';
    // echo $string1;

    // Perbandingan
    // < , > , <= , >= , == , !=
    // var_dump(12 > 13)

    // Identitas
    // === , !==
    // var_dump( '13' === 13)

    // Logika
    // && , || , ! 
    $x = 'nasi';
    var_dump($x == 'nai' || $x === "nasi" );
?>

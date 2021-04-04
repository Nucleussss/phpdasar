<?php  
    //       Pengulangan : For , While , Do While , Foreach-> digunakan spesifik untuk array
    // For
    // for ($i=0; $i < 5 ; $i++) { 
    //     echo "bapakmu ada ". $i+1 ." <br> ";
    // };

    // While
    // $a = 1;
    // while ($a <= 10) {
    //     echo "bapakmu ada ".$a+1 ." <br> ";
    //     $a++;
    // }

    // Do while
    // $b = 1;
    // do {
    //     echo "bapakmu ada ".$b+1 ." <br> ";
    //     $b++;
    // } while ($b <= 10);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        .warna-baris{
            background-color : grey;
        }
    </style>
</head>
<body>
    <table border="1" cellpadding="10" cellspacing="0">
        <?php for ($i=1; $i <= 5; $i++) :?>
            <?php if ($i % 2 == 1) :?>
            <tr class="warna-baris">
            <?php else :?>
            <tr>
            <?php endif; ?>
            
                <?php for ($j=1; $j <= 5; $j++) :?> 
                    <td> <?= "$i,$j";  ?> </td>
                <?php endfor; ?>
            </tr>
        <?php endfor; ?>
    </table>
</body>
</html>
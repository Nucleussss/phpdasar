<?php
    //          Bulitin function pada PHP

    //      untuk Waktu : time() , date() , mktime() , strtotime() ,dll..
    // date() mengembalikan waktu tanggal,bullan,tahun atau apapun tergantung dengan parameter.
    // untuk parameter lebih lengkapnya bisa lihat di dokumentasi.
    // echo date('l,F, Y');

    // time() 
    // echo time();
    // $nextWeek = time() + (8 * 24 * 60 * 60);
    // echo date('l-M-Y',$nextWeek)

    // mktime() membuat timestamp sendiri urutan parameternya adalah :
    // mktime(jam , menit , detik , bulan , tanggal ,tahun)
    // echo "July 1, 2000 is on a " . date("l", mktime(0, 0, 0, 7, 1, 2000));

    // strtotime() -> menginputkan tanggal lalu yang dikembalikan adalah detik
    // $tahun_lahir = date("Y", strtotime("24 july 2001"));
    // $tahun_sekarang = date("Y", strtotime("11 march 2021"));
    // $umur =  $tahun_sekarang - $tahun_lahir;
    // echo is_int($umur);

    //       untuk string : strlen() , strtcmp() , explode() , htmlspecialchars()
    // strlen() -> Mengembalikan panjang string (dalam byte) saat berhasil, dan 0 jika string kosong.
    // echo strlen('12345 6'); 
    
    // strcmp() -> Bandingkan dua string (peka huruf besar-kecil)
    // echo strcmp("Hello world!","Hello world!");

    // explode() ->  memecah string menjadi array. 
    // $str = "Hello world. It's a beautiful day bitch.";
    // print_r (explode(" ",$str));

    //      untuk utility : var_dump() , isset() , empty() , die() , sleep()
    // var_dump() -> menampilkan tipe data dan jumlah char
    // $a = 'sampah pemuda';
    // var_dump($a);

    // isset() -> Periksa apakah variabel kosong. Periksa juga apakah variabel sudah disetel / dideklarasikan
    //$a = 23;
    // // True because $a is set
    // if (isset($a)) {
    //     echo "Variable 'a' is set.<br>";
    // }
    
    // $b = null;
    // // False because $b is NULL
    // if (isset($b)) {
    //     echo "Variable 'b' is set.";
    // }

    // empty() -> mengecek apakah variable kosong
    // True because $a is empty
    // if (empty($a)) {
    //     echo "Variable 'a' is empty.<br>";
    // }

    // die() -> Cetak pesan dan hentikan skrip saat ini
    //     $site = "https://www.w3schools.com/";
    // fopen($site,"r") or die("Unable to connect to $site");

    // sleep() ->  menunda eksekusi skrip saat ini selama beberapa detik tertentu.
    // echo date('h:i:s') . "<br>";
    // //sleep for 3 seconds
    // sleep(3);
    // //start again
    // echo date('h:i:s');
    

    //           User difend function
    function salam($waktu ="datang", $nama="admin"){
        return "selamat $waktu, $nama";
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>test</title>
</head>
<body>
    <h1> <?php echo salam('pagi','kucing') ?> </h1>
</body>
</html>
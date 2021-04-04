<?php     

    // (fetch) digunakan untuk mengambil data dari objct
    // method - method nya
    // mysqli_fetch_row() -> mengembalikan array numerik
    // mysqli_fetch_assoc() -> mengembalikan array associative
    // mysqli_fetch_array() -> mengembalikan array numerik dan asoociative

    $con = mysqli_connect("localhost","root","","phpdasar"); // -> menyambungkan ke data base

    function query($query){
        global $con;
        $result = mysqli_query($con,$query); // -> mengambil table vapor di database
        $rows = [];

        while ($row = mysqli_fetch_assoc($result)) { // -> mengambil data yang ada didalam result dan mengubahnya menjadi array assoc
            $rows[] = $row; 
        }
        return $rows;
    }
    
?>
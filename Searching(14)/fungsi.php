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

    function tambah($data){
        global $con;
        $merk =  htmlspecialchars($data["merk"]) ;
        $tipe = htmlspecialchars($data["tipe"]);
        $warna = htmlspecialchars($data["warna"]);
        $gambar = htmlspecialchars($data["gambar"]);
        $query = "INSERT INTO vapor VALUES('','$merk','$tipe','$warna','$gambar')";
        mysqli_query($con,$query);  
        return mysqli_affected_rows($con);
    }
    
    function hapus($id){
        global $con; 
        $query = "DELETE FROM vapor WHERE id= $id";
        mysqli_query($con,$query); 
        return mysqli_affected_rows($con);
    }
    
    function ubah($data){
        global $con;

        $id = $data["id"];
        $merk =  htmlspecialchars($data["merk"]);
        $tipe = htmlspecialchars($data["tipe"]);
        $warna = htmlspecialchars($data["warna"]);
        $gambar = htmlspecialchars($data["gambar"]);
        $query = "UPDATE vapor SET
            merk = '$merk',
            tipe = '$tipe',
            warna = '$warna',
            gambar = '$gambar'
            WHERE id = $id
            ";

        mysqli_query($con,$query); 
        return mysqli_affected_rows($con);
    }

    function cari($keyword){
        $query = "SELECT * FROM vapor WHERE merk LIKE '%$keyword%' OR 
        tipe LIKE '%$keyword%' OR 
        warna LIKE '%$keyword%'";
        return query($query);
    }
?>
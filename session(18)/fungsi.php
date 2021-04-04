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

        $gambar = upload();
        if (!$gambar) {
            return false;
        }

        $query = "INSERT INTO vapor VALUES('','$merk','$tipe','$warna','$gambar')";
        mysqli_query($con,$query);  
        return mysqli_affected_rows($con);
    }
    
    function upload(){
        $namaFile = $_FILES['gambar']['name'];
        $ukuranFile = $_FILES['gambar']['size'];
        $error = $_FILES['gambar']['error']; 
        $tmpName = $_FILES['gambar']['tmp_name'];

        // mengecek apakah user sudah mengupload gambar atau belum
        if ($error === 4) {
            echo "<script>
                alert('pilih gambar terlebih dahulu');
            </script>";
            return false;
        }

        // mengecek ekstensi file
        $ekstensiValid = ['jpeg','jpg','png'];
        $ekstensi = explode(".",$namaFile);
        $ekstensi =  strtolower(end($ekstensi));
        if (!in_array($ekstensi , $ekstensiValid)) {
            echo "<script>
                alert('yang anda upload bukan gambar!');
            </script>";
            return false;
        }

        // mengecek ukuran gambar
        if ( $ukuranFile > 1000000000 ) {
            echo "<script>
                alert('ukuran file terlalu besar!');
            </script>";
            return false;
        }

        $namaFileBaru = uniqid();
        $namaFileBaru .= ".$ekstensi"; 
        // lolos pengecekan
        move_uploaded_file($tmpName,"img/$namaFileBaru");
        return $namaFileBaru;
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
        $gambarLama = htmlspecialchars($data["gambarLama"]);

        if ($_FILES['gambar']['error']=== 4) {
            $gambar = $gambarLama;
        }else{
            $gambar = upload();
        }
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

    function registrasi($data){
        global $con;
        $username = strtolower(stripslashes($data["username"]));
        $password = mysqli_real_escape_string($con,$data["password"]);
        $password2 = mysqli_real_escape_string($con,$data["password2"]);

        // pengecekan username
        $cekUser = mysqli_query($con, "SELECT username FROM user WHERE username = '$username'");
        if (mysqli_fetch_assoc($cekUser)) {
            echo "<script>
                alert('Username telah dipakai');
            </script>";
            return false;
        }

        // pengecekan password
        if ($password !== $password2) {
            echo 
            "<script>
                alert('password dan konfirmasi password berbeda!');
            </script>";
            return false;
        }

        // enkripsi password
        $password = password_hash($password, PASSWORD_DEFAULT);

        // tambahkan user baru ke database
        mysqli_query($con,"INSERT INTO user VALUES('','$username','$password')");
        
        return mysqli_affected_rows($con);
    }
?>
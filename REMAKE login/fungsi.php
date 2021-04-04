<?php 
    // menghubungkan ke database
    $connection = mysqli_connect("localhost","root","","phpdasar");

    // fungsi untuk mengambil data ke database 
    function query($query){
        global $connection;
        $req = mysqli_query($connection,$query);
        $rows = [];
        while ($row =  mysqli_fetch_assoc($req)) {
            $rows[] = $row;
        }
        return $rows;
    }

    // fungsi untuk menambah data
    function tambahData($data){
        global $connection;
        $merk = htmlspecialchars($data["merk"]);
        $tipe = htmlspecialchars($data["tipe"]);
        $warna = htmlspecialchars($data["warna"]);
        
        $gambar = upload();
        if (!$gambar) {
            return false;
        }

        $query = "INSERT INTO vapor VALUES('','$merk','$tipe','$warna','$gambar')";
        mysqli_query($connection,$query);
        // fungsi "mysqli_affected_rows" membutuhkan parameter koneksi
        return mysqli_affected_rows($connection);
    }

    function upload(){
        $nama = $_FILES['gambar']['name'];
        $type = $_FILES['gambar']['type'];
        $error = $_FILES['gambar']['error'];
        $tmpName = $_FILES['gambar']['tmp_name'];
        $size = $_FILES['gambar']['size'];

        // mengecek apakah user sudah mengupload gambar
        if ($error == 4) {
            echo 
            "<script>
                alert('upload gambar terlebih dahulu');
            </script>";
            return false;
        }

        // memastikan user memasukan file berupa gambar
        $formatValid = ['jpg','png','jpeg'];
        $formatfile = explode('.',$nama);
        $formatfile = strtolower(end($formatfile));
        
        if (!in_array($formatfile,$formatValid)) {
            echo 
            "<script>
                alert('yang anda upload bukan gambar');
            </script>";
            return false;
        }

        // mengecek ukuran gambar yang di upload user
        if ($size > 2000000) {
            echo 
            "<script>
                alert('ukuran gambar yang anda upload terlalu besar');
            </script>";
            return false;
        }

        // lolos pengecekan gambar
        // generate nama gambar
        $namaFileBaru = uniqid();
        $namaFileBaru .= '.';
        $namaFileBaru .= $formatfile;
        move_uploaded_file($tmpName,'img/'.$namaFileBaru);
        return $namaFileBaru;
    }

    function hapus($data){
        global $connection;
        // menghapus data dalam table vapor sesuai dengan id yang dipilih
        $query = "DELETE FROM vapor WHERE id = $data";
        mysqli_query($connection,$query);
        return mysqli_affected_rows($connection);
    }

    function ubahData($data){
        global $connection;
        $id = htmlspecialchars($data["id"]);
        $merk = htmlspecialchars($data["merk"]);
        $tipe = htmlspecialchars($data["tipe"]);
        $warna = htmlspecialchars($data["warna"]);
        $gambarLama = htmlspecialchars($data["namaGambarLama"]);

        // cek apakah user mengupload gambar baru atau tidak
        if ($_FILES['gambar']['error'] === 4) {
            $gambar = $gambarLama;
        } else{
            $gambar = upload();
        }
        
        $query = "UPDATE vapor SET
                merk = '$merk',
                tipe = '$tipe',
                warna = '$warna',
                gambar = '$gambar'
                WHERE id = $id";
        mysqli_query($connection,$query);       
        return mysqli_affected_rows($connection);
    }

    function cariData($keyword){
        $query = "SELECT * FROM vapor WHERE 
            merk LIKE '%$keyword%' OR
            tipe LIKE '%$keyword%' OR
            warna LIKE '%$keyword%'";
        return query($query);
    }

    function registrasi($data){
        global $connection;
        $username = strtolower(stripslashes($data['username']));
        $password = mysqli_real_escape_string($connection,$data['password']);
        $confirmPass = mysqli_real_escape_string($connection,$data['password2']);

        // cek ketersediaan username
        $cekUserName = mysqli_query($connection,"SELECT username FROM user WHERE username = '$username'");
        if (mysqli_fetch_assoc($cekUserName)) {
            echo 
            "<script>
                alert('username sudah terdaftar');
            </script>";
            return false;
        }

        // mengecek password dan confirmasinya
        if ($password !== $confirmPass) {
            echo 
            "<script>
                alert('konfirmasi password salah!');
            </script>";
            return false;
        }

        // enkripsi password
        $password = password_hash($password,PASSWORD_DEFAULT);

        // tambahkan user baru kedalam database
        $query = "INSERT INTO user VALUES ('','$username','$password')";
        mysqli_query($connection,$query);
        return mysqli_affected_rows($connection);
    }

    
?>
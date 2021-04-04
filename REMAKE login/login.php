<?php 
    session_start();
    require 'fungsi.php';

    // CEK COOKIE
    if (isset($_COOKIE['id']) && isset($_COOKIE['key']) ) {
        $id = $_COOKIE['id'];
        $key = $_COOKIE['key'];
        $dataUser = query("SELECT username FROM user WHERE id = $id");
        
        if ($key == hash('sha256',$dataUser[0]['username'])) {
            // set nilai $_session
            $_SESSION['login'] = true;
        } 
    }

    if (isset($_SESSION['login'])) {
        header('Location: index.php');
    }

    if (isset($_POST['login'])) {
        $username = $_POST['username'];
        $password = $_POST['password'];
        $query = "SELECT * FROM user WHERE username = '$username'";

        //      VERSI SAYA
        // // cek username
        // $data2user = query($query);
        // if ($data2user) {
        //     // cek password
        //     if (password_verify($password,$data2user[0]["password"])) {
        //         echo 
        //         "<script>
        //             document.location.href ='index.php';
        //         </script>";
        //     }else{
        //     "<script>
        //         alert('Gagal login!, Password salah.');
        //     </script>";
        //     }
        // } else {
        //     echo 
        //     "<script>
        //         alert('Gagal login!, Username atau Password tidak terdaftar.');
        //     </script>";
        // }

        //      VERSI PAK DIKA
        // cek username
        $data_dataUser = mysqli_query($connection,$query);
        if ( mysqli_num_rows($data_dataUser) == 1) {
            $data_dataUser = mysqli_fetch_assoc($data_dataUser);
            // cek password
            if (password_verify($password,$data_dataUser['password'])) {
                // set nilai $_session
                $_SESSION['login'] = true;

                if (isset($_POST['remember'])) {
                    setcookie('id',$data_dataUser['id'],time()+60);

                    $key = hash('sha256',$data_dataUser['username']);
                    setcookie('key',$key,time()+60);
                }

                header("Location: index.php");
                exit;
            } 
        } 
        $error = true;
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Halaman Login</title>
    <style>
        label{
            display: block;
        }
        li:nth-child(3) label{
            display: inline;
        }

        h4{
            color: red;
            font-style: italic;
        }
    </style>
</head>
<body>
    <h1>Halaman Login</h1>

    <?php if(isset($error)) : ?>
        <h4>Password atau Username salah!</h4>
    <?php endif; ?>

    <form action="" method="post">
        <ul>
            <li>
                <label for="username">Username :</label>
                <input type="text" name="username" id="username">
            </li>
            <li>
                <label for="password">Password :</label>
                <input type="text" name="password" id="password">
            </li>
            <li>
                <label for="remember">ingat saya!</label>
                <input type="checkbox" name="remember"> <br>
            </li>
            <li>
                <button type="submit" name="login">Login!</button>
            </li>
            <li>
                <p>Belum punya akun? Buat <a href="registrasiUser.php">disini</a></p>
            </li>
        </ul>
    </form>
</body>
</html>
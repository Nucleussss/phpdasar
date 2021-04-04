<?php 
    session_start();
    require 'fungsi.php';
    
    if (isset($_COOKIE['id']) && isset($_COOKIE['key'])) {
        $id = $_COOKIE['id'];
        $key = $_COOKIE['key'];

        // ambil username berdasarkan id
        $hasil = mysqli_query($con, "SELECT username FROM user WHERE id = $id");
        $hasil = mysqli_fetch_assoc($hasil);

        // cek username dengan cookie
        if ($key == hash('sha256',$hasil['username'])) {
            $_SESSION['login'] = true; 
        }
    }
    
    // cek session
    if(isset($_SESSION['login'])){
        header('Location: index.php'); 
        exit;
    }

    if (isset($_POST['login'])) {
        $username = $_POST['username'];
        $password = $_POST['password'];
        // mengecek useraname
        $result = mysqli_query($con,"SELECT * FROM user WHERE username = '$username'");
        if (mysqli_num_rows($result) == 1) {
            // mengecek password
            $row = mysqli_fetch_assoc($result);
            if (password_verify($password,$row['password'])) {
                // set session
                $_SESSION['login'] = true;
                
                // cek remember me
                if (isset($_POST['remember'])) {
                    // buat cookie
                    setcookie('key', hash('sha256',$row['username']),time()+60); 
                    setcookie('id', $row['id'] , time()+60);
                    
                }
                header('Location: index.php');
                exit;
            }
        }else{
            $error = true;
        }
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <style>
        h4{
            color:red;
            font-style: italic;
        }

        ul{
            list-style :none;
        }
    </style>
</head>
<body>
<h1>Halaman Login</h1>
<?php if (isset($error)) :?>
    <h4>Password Atau Username Salah</h4>
<?php endif; ?>

    <form action="" method="post">
        <ul>
            <li>
                <label for="username" >username :</label>
                <input type="text" name="username" id="username">
            </li>
            <li>
                <label for="password">password :</label>
                <input type="password" name="password" id="password">
            </li>
            <li>
                <input type="checkbox" name="remember" id="remember">
                <label for="remember">remember me.</label>
            </li>
            <li>
                <button type="submit" name="login">Log In</button>
            </li>
        </ul>
    </form>
</body>
</html>
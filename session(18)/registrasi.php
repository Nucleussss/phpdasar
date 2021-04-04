<?php 
    require 'fungsi.php';
    
    if (isset($_POST['register'])) {
        
        if (registrasi($_POST) > 0) {
            echo "<script>
                alert('Registrasi Berhasil!');
            </script>";
            
        } else {
            echo mysqli_error($con);
        }

    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>registrasi</title>
    <style>
        label{
            display: block;
        }
    </style>
</head>
<body>
    <h1>Halaman Registrasi</h1>
    <form action="" method="post">
        <ul>
            <li>
                <label for="username">username :</label>
                <input type="text" id="username" name="username">
            </li>
            <li>
                <label for="password">password :</label>
                <input type="password" id="password" name="password">
            </li>
            <li>
                <label for="password2">konfirmasi password :</label>
                <input type="password" id="password2" name="password2">
            </li>
            <li>
                <button type="submit" name="register">Register</button>
            </li>
        </ul>
    </form>
</body>
</html>
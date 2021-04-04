<?php 
    
    session_start();
    if(isset($_SESSION['login'])){
        header('Location: index.php');
        exit;
    }

    require 'fungsi.php';

    if (isset($_POST['login'])) {
        $username = $_POST['username'];
        $password = $_POST['password'];

        // mengecek useraname
        $result = mysqli_query($con,"SELECT * FROM user WHERE username = '$username'");
        if (mysqli_num_rows($result) == 1) {
            // mengecek password
            $row = mysqli_fetch_assoc($result);
            if (password_verify($password,$row['password'])) {
                $_SESSION['login'] = true;
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
                <button type="submit" name="login">Log In</button>
            </li>
        </ul>
    </form>
</body>
</html>
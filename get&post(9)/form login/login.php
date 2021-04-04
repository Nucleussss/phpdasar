<?php 
    if (isset($_POST['submit'])) {
        if ($_POST["username"] == "admin" && $_POST["password"] == "123") {
            header("Location: admin.php");
            exit;
        } else{
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
    <title>login</title>
    <style>
        h4{
            color: red;
        }
    </style>
</head>
<body>
    <h1>Halaman Login</h1>
    <?php if (isset($error)) : ?>
        <h4>Username dan Password SALAH!</h4>
    <?php endif; ?>

    <form action="" method="post">
        <ul>
            <li><label for="username">Username: </label><input type="text" name="username" id="username"></li>
            <li><label for="password">Password: </label><input type="password" name="password" id="password"></li>
            <button type="submit" name="submit">Gass ken</button>
        </ul>
    </form>
</body>
</html>
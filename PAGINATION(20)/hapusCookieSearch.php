<?php 
    setcookie('modePencarian','', time() - 1);
    setcookie('keyword','',time() - 1);
    header('Location: index.php');
?>
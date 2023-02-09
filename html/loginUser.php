<?php
require_once('Modeli.php');

if (!isset($_SESSION)) {
    session_start();
}

if (isset($_POST['login'])) {
    $Modeli = new Modeli();
    $Modeli->setEmail($_POST['email']);
    $kontrolloUser = $Modeli->kontrolloUser();


    if ($kontrolloUser == true) {
        $Modeli->setPassword($_POST['password']);
        $kontrolloLlogarin = $Modeli->kontrolloLlogarin();

        if ($kontrolloLlogarin == true) {
            $_SESSION['aksesi'] = $kontrolloLlogarin['aksesi'];
            $_SESSION['id'] = $kontrolloLlogarin['id'];
            $_SESSION['emri'] = $kontrolloLlogarin['emri'];
            $_SESSION['mbiemri'] = $kontrolloLlogarin['mbiemri'];
            $_SESSION['email'] = $kontrolloLlogarin['email'];
            echo "<script>document.location='blood-donor.php'</script>";
        } else {
            $_SESSION['passGabim'] = true;
            echo "<script>document.location='login.php'</script>";
        }
    } else {
        $_SESSION['uNameGabim'] = true;
        echo "<script>document.location='login.php'</script>";
    }
}
?>
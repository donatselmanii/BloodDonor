<?php
require_once('../CRUD/Modeli.php');
if (!isset($_SESSION)) {
    session_start();
}
if ($kontrolloLlogarin == true) {
            $_SESSION['aksesi'] = $kontrolloLlogarin['aksesi'];
            $_SESSION['id'] = $kontrolloLlogarin['id'];
            $_SESSION['emri'] = $kontrolloLlogarin['emri'];
            $_SESSION['mbiemri'] = $kontrolloLlogarin['mbiemri'];
            echo "<script>document.location='../faqet/Donate.php'</script>";
        }

?>
<?php
require_once('Modeli.php');
if(isset($_POST['save'])){
$Donator = new Modeli();
$Donator->setNrleternjoftimit($_POST['nrleternjoftimit']);
$Donator->setEmri($_POST['emri']);
$Donator->setMbiemri($_POST['mbiemri']);
$Donator->setDatelindja($_POST['datelindja']);
$Donator->setAdresa($_POST['adresa']);
$Donator->insertoDhenat();
echo "<script>
alert('dhenat jane Regjistruar me sukses');
document.location='edito.php';</script>";
}
?>
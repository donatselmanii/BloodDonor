<?php
require_once('Modeli.php');
if(isset($_POST['save'])){
$Donator = new Modeli();
$Donator->setGrupi($_POST['grupi']);
$Donator->setSemundjet($_POST['semundjet']);
$Donator->setPershkrimi($_POST['pershkrimi']);
$Donator->setNrleternjoftimit($_POST['nrleternjoftimit']);
$Donator->insertotherData();
echo "<script>
alert('dhenat jane Regjistruar me sukses');
document.location='displayDhenat.php';</script>";
}
?>
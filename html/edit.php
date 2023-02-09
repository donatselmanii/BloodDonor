<?php

if(isset($_POST['edit'])){
$dhenat->setGrupi($_POST['grupi']);
$dhenat->setSemundjet($_POST['semundjet']);
$dhenat->setPershkrimi($_POST['pershkrimi']);
echo $dhenat->edito();
echo "<script>
alert('dhenat jane Perditsuar me sukses');
document.location='displayDhenat.php';</script>";
}
?>
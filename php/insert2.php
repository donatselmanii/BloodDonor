<?php
require_once('Modeli.php');
$dhenat = new Modeli();
$id = $_GET['id'];
$dhenat->setId($id);
if(isset($_POST['edit'])){
$dhenat->setGrupi($_POST['grupi']);
$dhenat->setSemundjet($_POST['semundjet']);
$dhenat->setDept($_POST['pershkrimi']);
echo $dhenat->edito();
echo "<script>
alert('dhenat jane Perditsuar me sukses');
document.location='displayDhenat.php';</script>";
}
$editoDhenen = $dhenat->shfaqSipasIDs();
$vlera = $editoDhenen[0];
?>
<!DOCTYPE html>
<html>
<head>
<link rel="stylesheet" href ="css/mysingUPstyle.css" />
<title>Formulari i Regjistrimit</title>
</head>
<body>
<div id="formulari">
<h3>Shto te dhenat ne Formularin e Regjistrimit</h3>
<form action='' method="POST">
<label>Grupi</label>
<input type="text" class="inp" name="grupi"/>
<label>semundjet</label>
<input type="text" class="inp" name="semundjet"/>
<label>pershkrimi</label>
<input type="text" class="inp" name="pershkrimi"/>
<button name='edit'>EDITO</button>
</form>
</div>
</body>
</html>


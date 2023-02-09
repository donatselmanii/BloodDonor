<?php
require_once('Modeli.php');
$dhenat = new Modeli();
$id = $_GET['id'];
$dhenat->setId($id);

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
<form action='edit.php' method="POST">
<label>Emri</label>
<input type="text" class="inp" name="grupi"
value="<?php echo $vlera['grupi'];?>"
/>
<label>Mbiemri</label>
<input type="text" class="inp" name="semundjet"
value="<?php echo $vlera['semundjet'];?>"
/>
<label>Departementi</label>
<input type="text" class="inp" name="pershkrimi"
value="<?php echo $vlera['pershkrimi'];?>"
/>
<button name='edit'>EDITO</button>
</form>
</div>
</body>
</html>
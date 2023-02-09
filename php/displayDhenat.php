?php
require_once('crudModeli.php');
$studenti = new crudModeli();
$allStudenti=$studenti->shfaqDhenat();
?>
<!DOCTYPE html>
<html>
<head>
<link rel="stylesheet" href ="css/displayStyle.css" />
<title>Shfaq dhenat</title>
</head>
<body>
<div id="a1">
<header>
<h3>Ju lutem shtype per te regjistruar te dhenat ne Sistem</h3>
<a href="insert.php"><Button id='r'>Regjistrohu</Button></a>
</header>
<table>
<hr>
<p>Lista e te dhenave:</p>
<tr>
<th>Emri</th>
<th>Mbiemri</th>
<th>Departamenti</th>
<th>Adresa</th>
<th>Action</th>
</tr>
<tr>
<?php
 foreach ($allStudenti as $key=>$vlerat) {
 ?>
<td><?php echo $vlerat['emri']?></td>
<td><?php echo $vlerat['mbiemri']?></td>
<td><?php echo $vlerat['departamenti']?></td>
<td id='de'><a href="delete.php?id=<?=$vlerat['id']?>"><button id="d">DELETE</button></a>
<a href="edit.php?id=<?=$vlerat['id']?>"><button id='e'>EDIT</button></a></td>
</tr>
<?php
 }
?>
</table>
</div>
</body
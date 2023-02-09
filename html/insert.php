<!DOCTYPE html>
<htm>
<head>
<link rel="stylesheet" href ="css/mysingUPstyle.css" />
<title>Formulari i Regjistrimit</title>
</head>
<body>
<div id="formulari">
<h3>Shto te dhenat ne Formularin e Regjistrimit</h3>
<form action='regDonator.php' method="POST">
<label>Numri Leternjoftimit</label>
<input type="text" class="inp" name="nrleternjoftimit" placeholder="shto nrleternjoftimit..."/>
<label>Emri</label>
<input type="text" class="inp" name="emri" placeholder="shto emrin..."/>
<label>Mbiemri</label>
<input type="text" class="inp" name="mbiemri" placeholder="shto mbiemrin..."/>
<label>Datelindja</label>
<input type="date" class="inp" name="datelindja" placeholder="shto Datelindjen..."/>
<label>Adresa</label>
<input type="text" class="inp" name="adresa" placeholder="shto adresen"/>
<button name='save'>RUAJ</button>
</form>
</div>
</body>
</htm>
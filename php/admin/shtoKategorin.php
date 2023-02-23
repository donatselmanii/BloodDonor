<?php
require_once('../adminFunksione/kontrolloAksesin.php');
require_once('../CRUD/kategoriaCRUD.php');

$katCRUD = new kategoriaCRUD();

if (isset($_POST['shtoKategorin'])) {
  $_SESSION['emriKategorise'] = $_POST['emriKategorise'];
  $_SESSION['pershkrimiKategorise'] = $_POST['pershkrimiKategorise'];
  $katCRUD->insertoKategorinLajmit ();

  $_SESSION['katUShtua'] = true;
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Vendosja e Kategorive</title>
  <link rel="shortcut icon" href="../../img/web/favicon.ico" />
  <link rel="stylesheet" href="../../css/header.css" />
  <link rel="stylesheet" href="../../css/forms.css" />
  <link rel="stylesheet" href="../../css/mesazhetStyle.css" />
</head>

<body>
  
  <div class="forms">
    <form name="shtoKategorin" onsubmit="return validimiKategoris();" action='' method="POST">
      <?php
      if (isset($_SESSION['katUShtua']) == true) {
        ?>
        <div class="mesazhiSuksesStyle">
          <p>Kategoria u shtua me sukses!</p>
          <button id="mbyllMesazhin">
            X
          </button>
        </div>
        <?php
      }
      ?>
      <h1 class="form-title">Vendosja e Kategorive</h1>
      <input class="form-input" name="emriKategorise" type="text" placeholder="Emri i Kategoris">
      <input class="form-input" name="pershkrimiKategorise" type="text" placeholder="Pershkrimi i Kategoris">
      <input class="button" type="submit" value="Shtoni Kategorin" name='shtoKategorin'>
    </form>
  </div>
  <?php include('../funksione/skriptat.php') ?>
</body>

</html>
<?php
unset($_SESSION['katUShtua']);
?>
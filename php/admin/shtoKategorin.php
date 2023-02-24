<?php
require_once('../adminFunksione/kontrolloAksesin.php');
require_once('../CRUD/kategoriaCRUD.php');
require_once('../CRUD/kategoriaCRUDGrupi.php');
require_once('../CRUD/kategoriaCRUDQyteti.php');

$katCRUD = new kategoriaCRUD();
$katCRUDGrupi = new kategoriaCRUDGrupi();
$katCRUDQyteti = new kategoriaCRUDQyteti();

if (isset($_POST['shtoKategorin'])) {
  $_SESSION['emriKategorise'] = $_POST['emriKategorise'];
  $_SESSION['pershkrimiKategorise'] = $_POST['pershkrimiKategorise'];
  $katCRUD->insertoKategorinLajmit ();

  $_SESSION['katUShtua'] = true;
}

if (isset($_POST['shtoKategorinGrupi'])) {
  $_SESSION['emriKategoriseGrupi'] = $_POST['emriKategoriseGrupi'];
  $_SESSION['pershkrimiKategoriseGrupi'] = $_POST['pershkrimiKategoriseGrupi'];
  $katCRUDGrupi->insertoKategorinLajmit ();

  $_SESSION['katUShtua'] = true;
}

if (isset($_POST['shtoKategorinQyteti'])) {
  $_SESSION['emriKategoriseQyteti'] = $_POST['emriKategoriseQyteti'];
  $_SESSION['pershkrimiKategoriseQyteti'] = $_POST['pershkrimiKategoriseQyteti'];
  $katCRUDQyteti->insertoKategorinLajmit ();

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
</head>

<body>
  <p>Kategorit e lajmeve</p>
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
    <br>
    <br>
    <br>
    <br>
    <br>
    <br>
    <p>Kategorit e grupit te gjakut</p>
    <form name="shtoKategorinGrupi" onsubmit="return validimiKategoris();" action='' method="POST">
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
      <h1 class="form-title">Vendosja e Kategorive Grupi</h1>
      <input class="form-input" name="emriKategoriseGrupi" type="text" placeholder="Emri i Kategoris">
      <input class="form-input" name="pershkrimiKategoriseGrupi" type="text" placeholder="Pershkrimi i Kategoris">
      <input class="button" type="submit" value="Shtoni Kategorin" name='shtoKategorinGrupi'>
    </form>
    <br>
    <br>
    <br>
    <br>
    <br>
    <br>
    <p>Kategorit e Qyteteve</p>
    <form name="shtoKategorinQyteti" onsubmit="return validimiKategoris();" action='' method="POST">
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
      <input class="form-input" name="emriKategoriseQyteti" type="text" placeholder="Emri i Kategoris">
      <input class="form-input" name="pershkrimiKategoriseQyteti" type="text" placeholder="Pershkrimi i Kategoris">
      <input class="button" type="submit" value="Shtoni Kategorin" name='shtoKategorinQyteti'>
    </form>
  </div>
  <?php include('../funksione/skriptat.php') ?>
</body>

</html>
<?php
unset($_SESSION['katUShtua']);
?>
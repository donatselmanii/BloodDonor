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
  $katCRUDGrupi->insertoKategorinGrupi ();

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
  <style>
 .goBack {
    color: white;
    padding: 15px;
    background-color: rgb(184,29,29);
    text-decoration: none;
    border-radius: 10px;
    margin: 30px;
    transition: 300ms;
}
.goBack:hover {
  background-color: rgba(184,29,29, 0.7);
}
    .forms {
      display: flex;
      justify-content: center;
      align-items: center;
      flex-direction: column;
      height: 100vh;
    }
    .form-title {
      text-align: center;
      color: rgb(184,29,29);
      font-weight: 100;
    } 
    .form-each {
      margin: 30px 0;
    }
    .form-input, .form-each .button {
      padding: 10px;
      border-radius: 10px;
      box-shadow: 3px 3px 5px gray;
      border:none;
      margin:10px;
      outline:none;
      transition: 300ms;
      background-color: rgb(250,250,250);
    }
    .form-input:focus {
      border: 1px solid rgb(184,29,29);
      box-shadow: none;
      background-color: white;
    }
    .form-each .button {
      color: white;
      background-color: rgb(184,29,29);
      box-shadow: none;
      cursor: pointer;
    }
    .form-each .button:hover {
      background-color: rgba(184,29,29,0.7)
    }
  </style>
</head>

<body>
  <div class="forms">
    <form class="form-each" name="shtoKategorin" onsubmit="return validimiKategoris();" action='' method="POST">
      <?php
      if (isset($_SESSION['katUShtua']) == true) {
        echo '
        <script>alert("Kategoria u shtua me sukses");</script>
        ';
      }
      ?>
      <h1 class="form-title">Kategoria e Lajmeve</h1>
      <input class="form-input" name="emriKategorise" type="text" placeholder="Emri i Kategoris">
      <input class="form-input" name="pershkrimiKategorise" type="text" placeholder="Pershkrimi i Kategoris">
      <input class="button" type="submit" value="Shto Kategorin" name='shtoKategorin'>
    </form>


    <form class="form-each" name="shtoKategorinGrupi" onsubmit="return validimiKategoris();" action='' method="POST">
      <?php
      if (isset($_SESSION['katUShtua']) == true) {
        echo '
        <script>alert("Kategoria u shtua me sukses");</script>
        ';
      }
      ?>
      <h1 class="form-title">Kategoria e Grupit te Gjakut</h1>
      <input class="form-input" name="emriKategoriseGrupi" type="text" placeholder="Emri i Kategoris">
      <input class="form-input" name="pershkrimiKategoriseGrupi" type="text" placeholder="Pershkrimi i Kategoris">
      <input class="button" type="submit" value="Shtoni Kategorin" name='shtoKategorinGrupi'>
    </form>

    <form class="form-each" name="shtoKategorinQyteti" onsubmit="return validimiKategoris();" action='' method="POST">
      <?php
      if (isset($_SESSION['katUShtua']) == true) {
        echo '
        <script>alert("Kategoria u shtua me sukses");</script>
        ';
      }
      ?>
      <h1 class="form-title">Kategoria e Qyteteve</h1>
      <input class="form-input" name="emriKategoriseQyteti" type="text" placeholder="Emri i Kategoris">
      <input class="form-input" name="pershkrimiKategoriseQyteti" type="text" placeholder="Pershkrimi i Kategoris">
      <input class="button" type="submit" value="Shtoni Kategorin" name='shtoKategorinQyteti'>
    </form>
    <a href="dashboard.php" class="goBack">Go Back to Dashboard</a>
  </div>
  <?php include('../funksione/skriptat.php') ?>
</body>

</html>
<?php
unset($_SESSION['katUShtua']);
?>
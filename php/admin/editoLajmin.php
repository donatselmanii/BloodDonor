<?php
require_once('../adminFunksione/kontrolloAksesin.php');
require_once('../CRUD/NewsCRUD.php');
require_once('../CRUD/kategoriaCRUD.php');
$kompania = new kompaniaCRUD();
$kategoria = new kategoriaCRUD();
$NewsCRUD = new NewsCRUD();

$NewsCRUD->setProduktiID($_GET['lajmiID']);
$lajmi = $NewsCRUD->shfaqLajminSipasID();
if (!isset($_SESSION)) {
  session_start();
}
if (isset($_POST['editoLajmin'])) {
  $_SESSION['lajmiID'] = $_GET['lajmiID'];
  $_SESSION['titulli'] = $_POST['titulli'];
  $_SESSION['pershkrimi'] = $_POST['pershkrimi'];
  $_SESSION['content'] = $_POST['content'];
  $_SESSION['kategorialajmit'] = $_POST['kategoria'];
  if ($_FILES['lajmiPhoto']['name'] == '') {
    $NewsCRUD->editoProduktinPaFoto();
  } else {
    $_SESSION['FotoProduktit'] = $_FILES['pdPhoto'];
    $_SESSION['EmriFotosProduktit'] = $_FILES['pdPhoto']['name'];
    $NewsCRUD->editoProduktinMeFoto();
  }
}
if (isset($_POST['anulo'])) {
  echo '<script>document.location="./produktet.php"</script>';
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Editimi i Produktiti | Tech Store</title>
</head>

<body>
  <?php
  include '../design/header.php';
  echo '<div class="containerDashboard">';
  echo '</div>';
  ?>
  <div class="forms">
    <form name="editoProduktin" onsubmit="" action='' method="POST" enctype="multipart/form-data">
      <h1 class="form-title">Editimi i Produktiti</h1>
      <input class="form-input" name="pdName" type="text" placeholder="Emri i Produktit"
        value='<?php echo $produkti['emriProduktit'] ?>' required>
      <?php
      $kompanit = $kompania->shfaqKompanin();

      echo '<select name="kompania" class="dropdown">
              <option hidden value="te tjera">Zgjedhni Kompanin</option>
          ';

      foreach ($kompanit as $kompania) {
        echo '<option value="' . $kompania['emriKompanis'] . '">' . $kompania['emriKompanis'] . '</option>';
      }
      echo '<option selected hidden value="' . $produkti['emriKompanis'] . '">' . $produkti['emriKompanis'] . '</option> </select>';
      ?>
      <?php
      $kategorit = $kategoria->shfaqKategorin();

      echo '<select name="kategoria" class="dropdown">
              <option value="te tjera">Zgjedhni Kategorin</option>
          ';
      foreach ($kategorit as $kategoria) {
        echo '<option value="' . $kategoria['emriKategoris'] . '">' . $kategoria['emriKategoris'] . '</option>';
      }
      echo '<option selected hidden value="' . $produkti['kategoriaProduktit'] . '">' . $produkti['kategoriaProduktit'] . '</option> </select>';
      ?>
      <input class="form-input" name="pdPhoto" accept="image/*" type="file" placeholder="Foto Produktit">
      <input class="form-input" name="cmimiPd" type="text" placeholder="Qmimi i Produktit"
        value='<?php echo $produkti['qmimiProduktit'] ?>' required>
      <input class="button" type="submit" value="Editoni Produktin" name='editoProd'>
      <input class="button" type="submit" value="anulo" name='anulo'>
    </form>
  </div>
  <script src="../../js/validimiFormave.js"></script>
  <script src="../../js/mbyllMesazhin.js"></script>
</body>

</html>
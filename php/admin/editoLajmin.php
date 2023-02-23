<?php
require_once('../adminFunksione/kontrolloAksesin.php');
require_once('../CRUD/NewsCRUD.php');
require_once('../CRUD/kategoriaCRUD.php');
$kategoria = new kategoriaCRUD();
$NewsCRUD = new NewsCRUD();

$NewsCRUD->setLajmiID($_GET['lajmiID']);
$lajmi = $NewsCRUD->shfaqLajminSipasID();
if (!isset($_SESSION)) {
  session_start();
}
if (isset($_POST['editoLajmin'])) {
  $NewsCRUD->setLajmiID($_GET['lajmiID']);
  $NewsCRUD->setTitulli($_POST['titulli']);
  $NewsCRUD->setPershkrimi($_POST['pershkrimi']);
  $NewsCRUD->setKategorialajmit($_POST['kategoria']);
  $NewsCRUD->setContent($_POST['content']);
  
  if ($_FILES['lajmiPhoto']['name'] == '' || $_FILES['contentPhoto']['name'] == '' ) {
    $NewsCRUD->editoLajmin(false);
  } else{
    $_SESSION['contentfoto'] = $_FILES['contentPhoto'];
    $_SESSION['fotolajmit'] = $_FILES['lajmiPhoto'];
    $NewsCRUD->editoLajmin(true);
  }
}
if (isset($_POST['anulo'])) {
  echo '<script>document.location="lajmet.php"</script>';
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Editimi i Lajmit</title>
</head>

<body>
  <?php
  echo '<div class="containerDashboard">';
  echo '</div>';
  ?>
  <div class="forms">
    <form name="editoLajmin" onsubmit="" action='' method="POST" enctype="multipart/form-data">
      <h1 class="form-title">Editimi i Lajmit</h1>
      <input class="form-input" name="titulli" type="text" placeholder="Titulli i lajmit"value='<?php echo $lajmi['titulli'] ?>' required>
      <input class="form-input" name="pershkrimi" type="text" placeholder="Pershkrimi i lajmit"value='<?php echo $lajmi['pershkrimi'] ?>' required>
      <?php
      $kategorit = $kategoria->shfaqKategorin();

      echo '<select name="kategoria" class="dropdown">
              <option value="lajme">Zgjedhni Kategorin</option>
          ';
      foreach ($kategorit as $kategoria) {
        echo '<option value="' . $kategoria['emriKategoris'] . '">' . $kategoria['emriKategoris'] . '</option>';
      }
      echo '<option selected hidden value="' . $lajmi['kategorialajmit'] . '">' . $lajmi['kategorialajmit'] . '</option> </select>';
      ?>
      <input class="form-input" name="lajmiPhoto" accept="image/*" type="file" placeholder="Fotolajmit">
      <input class="form-input" name="contentPhoto" accept="image/*" type="file" placeholder="ContentPhoto">
      <input class="form-input" name="content" type="text" placeholder="Content" value='<?php echo $lajmi['content'] ?>' required>
      <input class="button" type="submit" value="Editoni Lajmin" name='editoLajmin'>
      <input class="button" type="submit" value="anulo" name='anulo'>
    </form>
  </div>
</body>

</html>
<?php
require_once('../CRUD/Modeli.php');
require_once('../CRUD/kategoriaCRUDGrupi.php');

if (!isset($_SESSION)) {
    session_start();
  }


$kategoriaGrupi = new kategoriaCRUDGrupi();
$Modeli = new Modeli();

$Modeli->setId($_GET['id']);
$donatori = $Modeli->shfaqSipasIDs();



if (isset($_POST['UpdateUser'])) {

          $Modeli->setEmail($_POST['email']);
          $Modeli->setSemundjet($_POST['semundjet']);
          $Modeli->setPershkrimi($_POST['pershkrimi']);
          $Modeli->setDatelindja($_POST['datelindja']);
          $Modeli->setKategoriagrupit($_POST['kategoriaGrupit']);

          $Modeli->insertotherData();
         
  
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Te dhenat e nevojshme</title>
</head>

<body>
  
  
  <div class="main-box">
    <form name="UpdateUser" onsubmit="return validimiShtimiProduktit();" action='' method="POST"
      enctype="multipart/form-data">
      <?php
      if (isset($_SESSION['tedhenatuinsertuan'])) {
        echo '
                  <script>alert("Te dhenat u shtuan me sukses!");</script>
            '; 
      }
      
      $donatori = $Modeli->shfaqSipasIDs();
      ?>
    
      <h1 class="form-title">Vendosja e te dhenave te nevojshme</h1>
      <input name="email" type="text" placeholder="Email" required>
      <input name="semundjet" type="text" placeholder="Semundjet" required>
      <input name="pershkrimi" type="text" placeholder="Pershkrimi" required>
      <input name="datelindja" type="date" required>
      <?php $kategoriaGrupi->shfaqKategorinSelektim(); ?>
      <input type="submit" value="Shtoni te dhenat" name='UpdateUser'>
      
    </form>
  </div>
  <?php include('../funksione/Skriptat.php') ?>
</body>

</html>
<?php
unset($_SESSION['LajmiUinsertua']);
unset($_SESSION['madhesiaGabim']);
unset($_SESSION['problemNeBartje']);
unset($_SESSION['fileNukSuportohet']);
?>
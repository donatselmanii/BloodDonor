<?php
require_once('../adminFunksione/kontrolloAksesin.php');
require_once('../CRUD/DonationCRUD.php');
require_once('../CRUD/kategoriaCRUDGrupi.php');
require_once('../CRUD/kategoriaCRUDQyteti.php');

$kategoriaGrupi = new kategoriaCRUDGrupi();
$kategoriaQyteti = new kategoriaCRUDQyteti();
$DonationCRUD = new DonationCRUD();

if (!isset($_SESSION)) {
  session_start();
}


if (isset($_POST['shtoDonacionin'])) {

          $DonationCRUD->setTitulli($_POST['donationName']);
          $DonationCRUD->setPershkrimi($_POST['pershkrimi']);
          $DonationCRUD->setKategoriagrupit($_POST['kategoriaGrupit']);
          $DonationCRUD->setKategoriaqytetit($_POST['kategoriaQytetit']);
          $_SESSION['fotorequest'] = $_FILES['donationPhoto'];

          $DonationCRUD->InsertDonation();
         
  
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Vendosja e Donacioneve</title>
</head>

<body>
  
  
  <div class="main-box">
    <form name="shtoDonacionin" onsubmit="return validimiShtimiProduktit();" action='' method="POST"
      enctype="multipart/form-data">
      <?php
      if (isset($_SESSION['DonationUinsertua'])) {
        echo '
                  <script>alert("Donacioni u shtua me sukses");</script>
            '; 
      }
      ?>
    
      <h1 class="form-title">Vendosja e Donacionit</h1>
      <input name="donationName" type="text" placeholder="Titulli i donacionit" required>
      <input name="pershkrimi" type="text" placeholder="Pershkrimi" required>
      <input name="donationPhoto" accept="image/*" type="file" value="Foto e Lajmit" required>
      <?php $kategoriaGrupi->shfaqKategorinSelektim(); ?>
      <?php $kategoriaQyteti->shfaqKategorinSelektim(); ?>
      <input type="submit" value="Shtoni Donacionin" name='shtoDonacionin'>
      
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
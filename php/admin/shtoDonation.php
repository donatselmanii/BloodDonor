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
  <style>
  .goBack {
    color: white;
    padding: 15px;
    background-color: rgb(184,29,29);
    text-decoration: none;
    border-radius: 10px;
    transition: 300ms;
    margin: 10px;
}
.goBack:hover {
  background-color: rgba(184,29,29, 0.7);
}
    .formDonacioni {
      height: 100vh;
      display: flex;
      justify-content: center;
      align-items: center;
    }
    .form-title {
      text-align: center;
      color: rgb(184,29,29);
      font-weight: 100;
    } 
    .form-input, .donacioniEach .button {
      padding: 10px;
      border-radius: 10px;
      box-shadow: 3px 3px 5px gray;
      border:none;
      margin:20px;
      outline:none;
      transition: 300ms;
      background-color: rgb(250,250,250);
    }
    .form-input:focus {
      border: 1px solid rgb(184,29,29);
      box-shadow: none;
      background-color: white;
    }
    .donacioniEach .button {
      color: white;
      background-color: rgb(184,29,29);
      box-shadow: none;
      cursor: pointer;

    }
    .donacioniEach .button:hover {
      background-color: rgba(184,29,29,0.7)
    }
.donacioniEach {
  display: grid;
  grid-template-columns: 1fr 1fr;
}
.form-input-file {
  margin: 20px;
}
  </style>
</head>

<body>
  
  
  <div class="formDonacioni">
    <form  name="shtoDonacionin" onsubmit="return validimiShtimiDonacionit();" action='' method="POST"
      enctype="multipart/form-data">
      <?php
      if (isset($_SESSION['DonationUinsertua'])) {
        echo '
                  <script>alert("Donacioni u shtua me sukses");</script>
            '; 
      }
      ?>
    
      <h1 class="form-title">Vendosja e Donacionit</h1>
      <div class="donacioniEach">
      <input class="form-input" name="donationName" type="text" placeholder="Titulli i donacionit" required>
      <input class="form-input" name="pershkrimi" type="text" placeholder="Pershkrimi" required>
      <?php $kategoriaGrupi->shfaqKategorinSelektim(); ?>
      <?php $kategoriaQyteti->shfaqKategorinSelektim(); ?>
      <input class="form-input-file" name="donationPhoto" accept="image/*" type="file" value="Foto e Lajmit" required>
      <input class="button" type="submit" value="Shtoni Donacionin" name='shtoDonacionin'>
      <a href="dashboard.php" class="goBack">Go Back to Dashboard</a class="form-input">
    </div>
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
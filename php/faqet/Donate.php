<?php
if (!isset($_SESSION)) {
    session_start();
}
if (!isset($_SESSION['id'])) {
    echo '<script>document.location="../faqet/login.php"</script>';
    $_SESSION['nukJeLogin'] = true;
}
include_once('../CRUD/Modeli.php');
require_once('../CRUD/DonationCRUD.php');
require_once('../CRUD/kategoriaCRUDQyteti.php');
require_once('../CRUD/TerminiCRUD.php');

$kategoriaQytetit= new kategoriaCRUDQyteti();
$DonationCRUD = new DonationCRUD();
$Modeli = new Modeli();
$TerminiCRUD= new TerminiCRUD();






$Modeli->setId($_SESSION['id']);
$teDhenatKlientit = $Modeli->shfaqSipasIDs();
if ($teDhenatKlientit == false) {
    echo '<script>document.location="../faqet/login.php"</script>';
    $_SESSION['nukJeLogin'] = true;
}

$TerminiCRUD->setDonatoriID($_SESSION['id']);
$kontrollotermini=$TerminiCRUD->kontrolloterminin();

if (isset($_POST['shtoTermin'])) {
  if($kontrollotermini==true){
    echo'<script>alert("Nuk mund te aplikoni me shume se nje here");</script>';
    
  }else{
  $TerminiCRUD->setDonatoriID($_SESSION['id']);
  $TerminiCRUD->setDataTerminit($_POST['dataTerminit']);
  $TerminiCRUD->setKategoriaqytetit($_POST['kategoriaQytetit']);
  $_SESSION['terminiUinsertua'] = true;

  $TerminiCRUD->InsertTerminin();
  }

}
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dhuro Gjak</title>
</head>
<body>
  <div class="termindiv">
  <form name="shtoTermin" onsubmit="return validimiShtimiProduktit();" action='' method="POST"
      enctype="multipart/form-data">
      <?php
      if (isset($_SESSION['terminiUinsertua'])) {
        echo '
                  <script>alert("Kerkesa per termin u krye me sukses");</script>
            '; 
      }
      ?>
    
      <h1 class="form-title">Rezervo termin</h1>
      <input name="dataTerminit" type="datetime-local" id="myDate" min="" placeholder="Data e Terminit" required>
      <?php $kategoriaQytetit->shfaqKategorinSelektim(); ?>
      <input type="submit" value="Rezervo nje termin" name='shtoTermin'>
      
    </form>
    <br><br><br><br><br><br>
  </div>
<div class="container">
    <form class="searchBarForm" name='kerko' action='../funksione/search.php' method="post">
      <input class="searchBar" name='kerkimi' type="search" placeholder="Search">
    </form>
    <?php
    
      $donacionet = $DonationCRUD->shfaqiDonations();
      foreach ($donacionet as $donacioni) {
        echo '<tr>
                    <td><img src="../../img/donation/' . $donacioni['fotorequest'] . '" alt="" /></td>
                    <td><p>' . $donacioni['titulli'] . '</p></td>
                    <td><p>' . $donacioni['pershkrimi'] . '</p></td>
                    <button><a href="Donations.php?donationID=' . $donacioni['donationID'] . '">Apliko</a></button>
                    </tr>';
      }
    ?>
    
<script>
    var today = new Date();
    var dd = String(today.getDate()).padStart(2, '1');
    var mm = String(today.getMonth() + 1).padStart(2, '1'); 
    var yyyy = today.getFullYear();
	var tim = today.getHours();

    today = yyyy + '-' + mm + '-' + dd + tim;
    document.getElementById("myDate").setAttribute("min", today);
</script>
</body>
</html>

<?php
unset($_SESSION['terminiUinsertua']);
?>
<?php
require_once('../adminFunksione/kontrolloAksesin.php');
require_once('../CRUD/NewsCRUD.php');
require_once('../CRUD/kategoriaCRUD.php');

$kategoria = new kategoriaCRUD();
$NewsCRUD = new NewsCRUD();

if (!isset($_SESSION)) {
  session_start();
}


if (isset($_POST['shtoLajmin'])) {
  $_SESSION['titulli'] = $_POST['lajmiName'];
  $_SESSION['pershkrimi'] = $_POST['pershkrimi'];
  $_SESSION['fotolajmit'] = $_FILES['lajmiPhoto'];
  $_SESSION['contentfoto'] = $_FILES['contentPhoto'];
  $_SESSION['content'] = $_POST['content'];
  $_SESSION['EmriFotos'] = $_FILES['lajmiPhoto']['name'];
  $_SESSION['kategorialajmit'] = $_POST['kategoria'];



  $NewsCRUD->InsertLajmin(); 
   
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Vendosja e Produkteve | Tech Store</title>
  <link rel="shortcut icon" href="../../img/web/favicon.ico" />
  <link rel="stylesheet" href="../../css/header.css" />
  <link rel="stylesheet" href="../../css/forms.css" />
  <link rel="stylesheet" href="../../css/mesazhetStyle.css" />
</head>

<body>
  
  <div class="main-box">
    <form name="shtoLajmin" onsubmit="return validimiShtimiProduktit();" action='' method="POST"
      enctype="multipart/form-data">
      <?php
      if (isset($_SESSION['LajmiUinsertua'])) {
        echo '
                  <script>alert("Lajmi u shtua me sukses")</script>
            ';
              
              
      }
      if (isset($_SESSION['madhesiaGabim'])) {
        echo '
                  <div class="mesazhiGabimStyle">
                    <p>Madhesia e fotos eshte shume e madhe!</p>
                    <button id="mbyllMesazhin">
                      X
                    </button>
                  </div>
            ';
      }
      if (isset($_SESSION['problemNeBartje'])) {
        echo '
                  <div class="mesazhiGabimStyle">
                    <p>Ndodhi nje problem ne bartjen e fotov!</p>
                    <button id="mbyllMesazhin">
                      X
                    </button>
                  </div>
            ';
      }
      if (isset($_SESSION['fileNukSuportohet'])) {
        echo '
                  <div class="mesazhiGabimStyle">
                    <p>Ky file nuk supportohet!</p>
                    <button id="mbyllMesazhin">
                      X
                    </button>
                  </div>
          ';
      }
      ?>
    
      <h1 class="form-title">Vendosja e Lajmit</h1>
      <input name="lajmiName" type="text" placeholder="Titulli i Lajmit" required>
      <input name="pershkrimi" type="text" placeholder="Pershkrimi" required>
      <input name="lajmiPhoto" accept="image/*" type="file" value="Foto e Lajmit" required>
      <input name="contentPhoto" accept="image/*" type="file" value="Foto e Contentit" required>
      <input name="content" type="text" placeholder="content" required>
      <?php $kategoria->shfaqKategorinSelektim(); ?>
      <input type="submit" value="Shtoni Lajmin" name='shtoLajmin'>
      
    </form>
  </div>
  <?php include('../funksione/Skriptat.php') ?>
</body>

</html>
<?php
unset($_SESSION['mesazhiMeSukses']);
unset($_SESSION['madhesiaGabim']);
unset($_SESSION['problemNeBartje']);
unset($_SESSION['fileNukSuportohet']);
?>
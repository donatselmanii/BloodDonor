<?php
require_once('../adminFunksione/kontrolloAksesin.php');
require_once('../CRUD/Modeli.php');

$Modeli = new Modeli();

if (isset($_GET['userID'])) {
  $Modeli->setId($_GET['id']);
  $useri = $Modeli->shfaqSipasID();

  $Modeli->setId($_GET['id']);
  $Modeli->setEmri($_GET['emri']);
  $Modeli->setMbiemri($_GET['mbiemri']);
  $Modeli->setAksesi($_GET['aksesi']);


  $Modeli->perditesoTeDhenatAdmini();

  $_SESSION['aksesiUPerditesua'] = true;
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Perdoruesit | Tech Store</title>
  <link rel="shortcut icon" href="../../img/web/favicon.ico" />
  <link rel="stylesheet" href="../../css/adminDashboard.css" /> 
  <link rel="stylesheet" href="../../css/mesazhetStyle.css" />
</head>

<body>

  

  <div class="containerDashboardP">
    <?php
    if (isset($_SESSION['aksesiUPerditesua'])) {
      echo '
                <div class="mesazhiSuksesStyle">
                  <p>Llogaria u ndryshua!</p>
                  <button id="mbyllMesazhin">
                    X
                  </button>
                </div>
          ';
    }
    ?>
    <h1>Lista e Perdoruesve</h1>
    <table>
      <tr>
        <th>ID</th>
        <th>Emri</th>
        <th>Mbiemri</th>
        <th>Email</th>
        <th>Aksesi</th>
        <th>Funksione</th>
      </tr>
      <?php
      $perdoruesit = $Modeli->shfaqTeGjithePerdoruesit();

      foreach ($perdoruesit as $perdoruesi) {
        echo '
            <tr>
              <td id="id_' . $perdoruesi['id'] . '">' . $perdoruesi['id'] . '</td>
              <td><input id="emri_' . $perdoruesi['id'] . '" type="text" placeholder="Emri" value="' . $perdoruesi['emri'] . '"></td>
              <td><input id="mbiemri_' . $perdoruesi['id'] . '" type="text" placeholder=""value="' . $perdoruesi['mbiemri'] . '"></td>
              <td>' . $perdoruesi['email'] . '</td>
              <td>' . $perdoruesi['email'] . '</td>';
        if ($perdoruesi['aksesi'] == 2 && $_SESSION['aksesi'] != 2 || $perdoruesi['id'] == $_SESSION['id']) {
          echo '<td id="aksesi_' . $perdoruesi['id'] . '">' . $perdoruesi['aksesi'] . '</td>';
        } else {
          echo '<td><input id="aksesi_' . $perdoruesi['id'] . '" type="number" min="0" max="2" placeholder="Aksesi" value="' . $perdoruesi['aksesi'] . '"></td>';
        }
        echo '<td><button class="edito" onclick="return ndryshoTeDhenat(' . $perdoruesi['id'] . '); ">Edito</button>
              <button class="edito"><a href="../userPages/porosit.php?id=' . $perdoruesi['id'] . '">Porosite</a></button></td>
            </tr>';

      }
      ?>
      </th>
    </table>
  </div>

  <?php
  include '../includes/footer.php';
  include('../funksione/skriptat.php') ?>
</body>

</html>

<script>
  function ndryshoTeDhenat(idUser) {
    const emREGEX = /^[A-Za-z]+$/
    var userID = document.getElementById("userID_" + idUser).innerHTML;
    var emri = document.getElementById("emri_" + idUser).value;
    var mbiemri = document.getElementById("mbiemri_" + idUser).value;
    var aksesi = document.getElementById("aksesi_" + idUser).value;

    if (emri == "") {
      alert("Emri nuk duhet te jet i zbrazet!");
      emri.focus();
      return false;
    }

    else if (mbiemri == "") {
      alert("Mbiemri nuk duhet te jet i zbrazet!");
      mbiemri.focus();
      return false;
    }
    
    else {
      var link = "?userID=" + userID + "&emri=" + emri + "&mbiemri=" + mbiemri + "&aksesi=" + aksesi;
      window.location.href = link;

      return true;
    }
  }
  function fshijKategorin(kategoriaID) {
    var kategoriaID = document.getElementById("kategoriaID_" + kategoriaID).innerHTML;

    var link = "?kategoriaID=" + kategoriaID + "&fshij";
    window.location.href = link;
  }
</script>

<?php
unset($_SESSION['aksesiUPerditesua']);
?>
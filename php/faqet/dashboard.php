<?php
if (!isset($_SESSION)) {
  session_start();
}

require_once('../CRUD/TerminiCRUD.php');
require_once('../CRUD/Modeli.php');

$TerminiCRUD = new TerminiCRUD();
$termini = $TerminiCRUD->shfaqTerminetUserit();

if (isset($_GET['id'])) {
    $Modeli->shfaqSipasIDs($_GET['id']);


    $_SESSION['dataTerminit'] = $teDhenatEDonacionit['dataTerminit'];
    $_SESSION['kategoriaqytetit']  = $teDhenatEDonacionit['kategoriaqytetit'] ;
    $_SESSION['statusiTerminit'] = $teDhenatEDonacionit['statusiTerminit'];
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Dashboard</title>
</head>

<body>


  <div class="containerDashboardP">

    <h1>Terminet</h1>
    <table>
      <tr>
        <th>Data e terminit</th>
        <th>Qyteti</th>
        <th>Statusi</th>
      </tr>
      <?php


        echo '
            <tr>
              <td>' . $terminat['dataTerminit'] . '</td>
              <td>' . $terminat['kategoriaqytetit'] . '</td>
              <td>' . $terminat['statusiTerminit'] . '</td>
            </tr>
          ';
      
      ?>
    </table>
  </div>

  <?php
  include('../funksione/skriptat.php') ?>
</body>

</html>
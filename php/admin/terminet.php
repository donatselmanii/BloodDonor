<?php
if (!isset($_SESSION)) {
  session_start();
}

require_once('../adminFunksione/kontrolloAksesin.php');
require_once('../CRUD/TerminiCRUD.php');

$TerminiCRUD = new TerminiCRUD();
$termini = $TerminiCRUD->shfaqiTerminat();
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Shfaq Mesazhet</title>
</head>

<body>


  <div class="containerDashboardP">
    <?php
    if (isset($_SESSION['mezashiUKonfirmua'])) {
      echo '
                  <script>alert("Mesazhi u konfirmua me sukses!");</script>
            ';

    }
    ?>
    <h1>Lista e Mesazheve</h1>
    <table>
      <tr>
        <th>ID Mesazhi</th>
        <th>Emri</th>
        <th>Email</th>
        <th>Phone</th>
        <th>Mesazhi</th>
        <th>Data e Dergeses</th>
        <th>Statusi</th>
        <th>Funksione</th>
      </tr>
      <?php


      foreach ($termini as $terminat) {
        echo '
            <tr>
              <td>' . $terminat['terminiID'] . '</td>
              <td>' . $terminat['donatoriID'] . '</td>
              <td>' . $terminat['emri'] . '</td>
              <td>' . $terminat['mbiemri'] . '</td>
              <td>' . $terminat['dataTerminit'] . '</td>
              <td>' . $terminat['kategoriaqytetit'] . '</td>
              <td>' . $terminat['kategoriagrupit'] . '</td>
              <td>' . $terminat['semundjet'] . '</td>
              <td>' . $terminat['pershkrimi'] . '</td>
              <td>' . $terminat['datelindja'] . '</td>
              <td>' . $terminat['email'] . '</td>
              <td>' . $terminat['numri'] . '</td>
              <td>' . $terminat['statusiTerminit'] . '</td>
              <td><button class="edito"><a href="../adminFunksione/konfirmoMesazhintermin.php?terminiID=' . $terminat['terminiID'] . '">Konfirmo</a></button></td>
              <td><button class="edito"><a href="../adminFunksione/konfirmoMesazhintermini.php?terminiID=' . $terminat['terminiID'] . '">Perfundo</a></button></td>
              <td><button class="fshij"><a href="../adminFunksione/fshijTermin.php?terminiID=' . $terminat['terminiID'] . '">Fshij</a></button></td>
            </tr>
          ';
      }
      ?>
    </table>
  </div>

  <?php
  include('../funksione/skriptat.php') ?>
</body>

</html>
<?php unset($_SESSION['mezashiUKonfirmua']) ?>
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
.containerDashboardP {
    margin: 50px;
}
.containerDashboardP table {
  display: flex;
  justify-content: center;
}
.adminPageH1 {
  color: rgb(184,29,29);
  text-align:center;
}
.adminPagetable {
  border: 1px solid rgb(176, 176, 176);
  padding: 2px;
  text-align: center;
}
.adminPageTableHead {
  color: white;
  background-color: rgb(184,29,29);
  font-weight: 100;
  text-align: center;
  padding: 5px;
  border-radius: 6px;
}
.adminPageTableButton {
  background-color: rgb(184,29,29);
  color: white;
  padding: 15px 13px;
  border:none;
}
.adminPageTableButton a {
  color: white;
  text-decoration: none;
}

  </style>
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
    <h1 class="adminPageH1">Lista e Mesazheve</h1>
    <table>
      <tr>
        <th class="adminPageTableHead">ID e Terminit</th>
        <th class="adminPageTableHead">ID e Donatorit</th>
        <th class="adminPageTableHead">Emri</th>
        <th class="adminPageTableHead">Mbiemri</th>
        <th class="adminPageTableHead">Data e Terminit</th>
        <th class="adminPageTableHead">Qyteti</th>
        <th class="adminPageTableHead">Grupi i Gjakut</th>
        <th class="adminPageTableHead">Semundjet</th>
        <th class="adminPageTableHead">Pershkrimi</th>
        <th class="adminPageTableHead">Datelindja</th>
        <th class="adminPageTableHead">Email</th>
        <th class="adminPageTableHead">Phone</th>
        <th class="adminPageTableHead">Statusi</th>
      </tr>
      <?php

      foreach ($termini as $terminat) {
        echo '
            <tr>
              <td class="adminPagetable">' . $terminat['terminiID'] . '</td>
              <td class="adminPagetable">' . $terminat['donatoriID'] . '</td>
              <td class="adminPagetable">' . $terminat['emri'] . '</td>
              <td class="adminPagetable">' . $terminat['mbiemri'] . '</td>
              <td class="adminPagetable">' . $terminat['dataTerminit'] . '</td>
              <td class="adminPagetable">' . $terminat['kategoriaqytetit'] . '</td>
              <td class="adminPagetable">' . $terminat['kategoriagrupit'] . '</td>
              <td class="adminPagetable">' . $terminat['semundjet'] . '</td>
              <td class="adminPagetable">' . $terminat['pershkrimi'] . '</td>
              <td class="adminPagetable">' . $terminat['datelindja'] . '</td>
              <td class="adminPagetable">' . $terminat['email'] . '</td>
              <td class="adminPagetable">' . $terminat['numri'] . '</td>
              <td class="adminPagetable">' . $terminat['statusiTerminit'] . '</td>
              <td><button class="adminPageTableButton"><a href="../adminFunksione/konfirmoMesazhintermin.php?terminiID=' . $terminat['terminiID'] . '">Konfirmo</a></button></td>
              <td><button class="adminPageTableButton"><a href="../adminFunksione/konfirmoMesazhintermini.php?terminiID=' . $terminat['terminiID'] . '">Perfundo</a></button></td>
              <td><button class="adminPageTableButton"><a href="../adminFunksione/fshijTermin.php?terminiID=' . $terminat['terminiID'] . '">Fshij</a></button></td>
            </tr>
          ';
      }
      ?>
    </table>
  </div>
  <a href="dashboard.php" class="goBack">Go Back to Dashboard</a class="form-input">
  <?php
  include('../funksione/skriptat.php') ?>
</body>

</html>
<?php unset($_SESSION['mezashiUKonfirmua']) ?>
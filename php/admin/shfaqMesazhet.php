<?php
if (!isset($_SESSION)) {
  session_start();
}

require_once('../adminFunksione/kontrolloAksesin.php');
require_once('../CRUD/contactFormCRUD.php');

$contactFormCRUD = new contactFormCRUD();
$contactForm = $contactFormCRUD->shfaqMesazhet();
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
    margin: 30px;
    transition: 300ms;
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
                  <script>alert("Mesazhi u konfirmua me sukses");</script>
            ';
    }
    ?>
    <h1 class="adminPageH1">Lista e Mesazheve</h1>
    <table>
      <tr>
        <th class="adminPageTableHead">ID Mesazhi</th>
        <th class="adminPageTableHead">Emri</th>
        <th class="adminPageTableHead">Email</th>
        <th class="adminPageTableHead">Phone</th>
        <th class="adminPageTableHead">Mesazhi</th>
        <th class="adminPageTableHead">Data e Dergeses</th>
        <th class="adminPageTableHead">Statusi</th>
        <th class="adminPageTableHead">Funksione</th>
      </tr>
      <?php


      foreach ($contactForm as $mesazhi) {
        echo '
            <tr>
              <td class="adminPagetable">' . $mesazhi['IDmesazhi'] . '</td>
              <td class="adminPagetable">' . $mesazhi['emri'] . '</td>
              <td class="adminPagetable">' . $mesazhi['email'] . '</td>
              <td class="adminPagetable">' . $mesazhi['phone'] . '</td>
              <td class="adminPagetable">' . $mesazhi['mesazhi'] . '</td>
              <td class="adminPagetable">' . $mesazhi['datadergeses'] . '</td>
              <td class="adminPagetable">' . $mesazhi['statusi'] . '</td>
              <td><button class="adminPageTableButton"><a href="../adminFunksione/konfirmoMesazhin.php?IDmesazhi=' . $mesazhi['IDmesazhi'] . '">Konfirmo</a></button></td>
            </tr>
          ';
      }
      ?>
    </table>
</div>
<a href="dashboard.php" class="goBack">Go Back to Dashboard</a>
  <?php
  include('../funksione/skriptat.php') ?>
</body>

</html>
<?php unset($_SESSION['mezashiUKonfirmua']) ?>
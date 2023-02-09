<?php
if (!isset($_SESSION)) {
    session_start();
}

require('../CRUD/Modeli.php');

if (isset($_POST['submit'])) {
  $Modeli = new Modeli();

  $Modeli->setEmail($_POST['email']);

  $kontrollo = $Modeli->$kontrollo();
  if ($kontrollo == true) {
    $_SESSION['emailEkziston'] = true;
    $_SESSION['nrleternjoftimitEkziston'] = true;
    $_SESSION['nrleternjoftimit'] = $_POST['nrleternjoftimit'];
    $_SESSION['emri'] = $_POST['emri'];
    $_SESSION['mbiemri'] = $_POST['mbiemri'];
    $_SESSION['email'] = $_POST['email'];
    $_SESSION['numri'] = $_POST['numri'];
    $_SESSION['datelindja'] = $_POST['datelindja'];
    $_SESSION['adresa'] = $_POST['adresa'];
    $_SESSION['passwordi'] = $_POST['passwordi'];
  } else {
    $Modeli->setNrleternjoftimit($_POST['nrleternjoftimit']);
    $Modeli->setEmri($_POST['emri']);
    $Modeli->setMbiemri($_POST['mbiemri']);
    $Modeli->setEmail($_POST['email']);
    $Modeli->setNumri($_POST['numri']);
    $Modeli->setPassword($_POST['password']);

    $Modeli->insertoDhenat();
    session_destroy();
  }
}


?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sign Up</title>
    <link rel="icon" href="../img/icon.png" type="image/icon">
    <link rel="stylesheet" href="../../css/blood-donor.css">
    <script src="https://kit.fontawesome.com/7be85ed243.js"></script>
</head>

<body class="signup-body">
    <section class="signup">
        <div class="signup-box">
            <div class="signup-box-inside">
            <form name="SignUpForm" action='' method="POST">
              <?php
            if (isset($_SESSION['regMeSukses'])) {
              echo '<script>alert("U regjistrua me sukses!");</script>';
      }
      if (isset($_SESSION['emailkziston'])) {
        echo '<script>alert("Email ekziston");</script>';
      }
      if (isset($_SESSION['nrleternjoftimitEkziston'])) {
        echo '<script>alert("Numri leternjoftimit ekziston");</script>';
      }
      ?>
                <h2>Sign Up</h2>
                <input name="nrleternjoftimit" id="id" type="id" class="field" placeholder="Your ID">
                <input name="emri" id="emri" type="text" class="field" placeholder="First Name">
                <input name="mbiemri" id="mbiemri" type="text" class="field" placeholder="Last Name">
                <input name="email" id="email" type="email" class="field" placeholder="Your Email">
                <input name="numri" id="numri" type="number" class="field" placeholder="Your Number">
                <input name="datelindja" id="datelindja" type="date" class="field" placeholder="Your birthday">
                <input name="adresa" id="adress" type="text" class="field" placeholder="Your Address">
                <input name="password" id="password" type="password" maxlength="15" class="field" placeholder="Password">
                <p>Grupi i gjakut</p>
                <select id="group">
                <option value="0negativ">Grupi</option>   
                <option value="0negativ">0+</option>
                <option value="0pozitiv">0-</option>
                <option value="Apozitiv">A+</option>
                <option value="Anegativ">A-</option>
                <option value="Bpozitiv">B+</option>
                <option value="Bnegativ">B-</option>
                </select>
                <input type="submit" onclick="Valido()" name="submit"class="signup-button">Sign Up</button>
                <a href="login.php">Log In.</a>
            </div>
        </div>
    </section>
    <script src="../../js/regex.js"></script>
</body>
</html>
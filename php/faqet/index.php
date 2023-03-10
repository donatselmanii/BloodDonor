<?php
if (!isset($_SESSION)) {
    session_start();
}
require_once('../CRUD/NewsCRUD.php');
require_once('../CRUD/TerminiCRUD.php');

$NewsCRUD = new NewsCRUD();
$TerminiCRUD= new TerminiCRUD();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Blood Donor</title>
    <link rel="icon" href="../../img/logo.png" type="image/icon">
    <link rel="stylesheet" href="../../css/blood-donor.css">
    <script src="https://kit.fontawesome.com/7be85ed243.js"></script>
    <style>
      .background-text a {
    color: white;
    text-decoration: none;
}
    </style>
</head>
<body>
    
  <?php include '../includes/navbar.php'; ?>

    <main class="background-slider">
        <div class="background1 slider">
            <div class="background-text">
                <h1>Bëhu donator.</h1>
                <p>Kur dhuroni gjak, ju jeni më shumë se thjesht një Dhurues, ju jeni një HERO!</p>
                <h2>Bëj gjënë e duhur.</h2>
                <button><a href="Donate.php">Dhuro gjak tani!</a></button>
            </div>
        </div>
        <div class="background2 slider">
            <div class="background-text background-text2">
                <h1>Shpëto një jetë.</h1>
                <p>Dhuroni gjak ose plazmën për të bërë një ndryshim në këtë botë</p>
                <h2>Edhe ti mund ta bësh këtë.</h2>
                <button><a href="Donate.php">Dhuro gjak tani!</a></button>

                </div>
        </div>
    </main>
    <div class="arrows">
        <a class="prev" onclick="plusSlides(-1)">&#10094;</a>
      <a class="next" onclick="plusSlides(1)">&#10095;</a>
    </div>
    <div class="dots" style="text-align:center">
        <span class="dot" onclick="currentSlide(1)"></span>
        <span class="dot" onclick="currentSlide(2)"></span>
      </div>
<div class="svg1"></div>

<h1 class="wycd">Cfarë mund të dhuroni</h1>
<div class="main-boxes">
    <div class="main-box">
        <img src="../../img/main-box1.JPG" alt="">
        <p class="main-box-header">Gjak</p>
        <p>Zbuloni se si gjaku juaj mund të shpëtojë jetë. Me tre dhurime gjaku që nevojiten çdo minutë, ju mund të bëni një ndryshim sot</p>
        <a href="#">Lexo më shumë &#10095;</a>
    </div>
    <div class="main-box">
      <img src="../../img/main-box2.JPG" alt="">
      <p class="main-box-header">Plazma</p>
      <p>Nëse je këtu për të dhënë gjak, ne kemi mundësi. Mbi gjysma e gjakut tuaj është një lëng i quajtur plazma, dhe është me të vërtetë i fuqishëm.</p>
    <a href="#">Pse të dhuroni plazma &#10095;</a>
    </div>
    <div class="main-box">
     <img src="../../img/main-box3.JPG" alt="">
     <p class="main-box-header">Organe dhe indet</p>
     <p>Me mijëra njerëz janë të sëmurë rëndë në gjithë botën, duke pritur për një transplant organi ose indi. Shihni se si mund të regjistroheni si donator sot.</p>
     <a href="#"> Cakto një termin &#10095;</a>
    </div>
</div>

<section class="main-foto-text">
    <img src="../../img/main-foto.jpg" alt="">
    <div class="main-foto-text-text">
        <h3>A po mendon të bëhesh donator?</h3>
        <h1>Bashkohuni me ne. Shpëto një jetë sot!</h1>
        <p>Çdo pikë gjaku që dhuroni ka fuqinë për të shpëtuar një jetë. Bëhuni hero dhe jepni dhuratën e jetës duke dhuruar gjak sot..</p>
        <button>Cakto një termin</button>
    </div>
</section>

<div id="main-boxes"  class="main-boxes">
<?php
      $lajmet = $NewsCRUD->shfaq4LajmetEFunditLAJME();
      foreach ($lajmet as $lajmi) {
        echo '<div class="main-box"">
        <img src="../../img/lajmet/index/' . $lajmi['fotolajmit'] . '" alt="" />' .
          '<p>' . $lajmi['titulli'] . '</p>' .
          '<p>' . $lajmi['pershkrimi'] . ' </p>
          <a href="./lajmi.php?lajmiID=' . $lajmi['lajmiID'] . '"><button class="button">Lexo më shumë </button></a>
        </div>';
      }

      ?>
</div>

<div class="svg2"></div>
<h1 class="wwd">Cfarë bëjmë ne</h1>
<div class="main-boxes wwd-boxes">
    <?php
$lajmet = $NewsCRUD->shfaq3LajmetEFunditCFAREBEJMNE();
      foreach ($lajmet as $lajmi) {
        echo '<div class="main-box"">
        <img src="../../img/lajmet/index/' . $lajmi['fotolajmit'] . '" alt="" />' .
          '<p>' . $lajmi['titulli'] . '</p>' .
          '<p>' . $lajmi['pershkrimi'] . ' </p>
          <a href="./lajmi.php?lajmiID=' . $lajmi['lajmiID'] . '"><button class="button">Lexo më shumë </button></a>
        </div>';
      }
      ?>
</div>
<div class="research">
    <img src="../../img/research.jpg" alt="">
    <div class="research-text">
        <h1>Ekipi që qëndron pas hulumtimit</h1>
        <p>Ekipi ynë është i motivohet nga kurioziteti për të hulumtuar çdo aspekt të transfuzionit të gjakut.</p>
        <a href="#">Takoni hetuesit tanë &#10095;</a>
    </div>
</div>
<h1 class="faqs">FAQs</h1>
<div class="faq">
    <a href="#">Nëse kam COVID-19, kur mund të dhuroj gjak? &#10095;</a>
    <a href="#">Cilat medikamente më pengojnë nga të dhënit gjak? &#10095;</a>
    <a href="#">Unë kam një tatuazh. A mund të dhuroj gjak? &#10095;</a>
    <a href="#">Kam hekur pak. A mund të dhuroj gjak? &#10095;</a>
</div>

<?php include("../includes/footer.php"); ?>


<?php include("../funksione/skriptat.php"); ?>

</body>
</html>


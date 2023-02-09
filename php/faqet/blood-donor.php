<?php
if (!isset($_SESSION)) {
    session_start();
}
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
</head>
<body>
    <nav class="navbar">
        <div class="logo"><a href="blood-donor.html"><img src="../../img/logo.png" alt=""></a></div>
        <ul class="nav-links">
         <li><a href="why-you-should-donate.php"> Pse duhet të dhuroni gjak </a></li>
         <li><a href="about-us.php"> Rreth nesh </a></li>
         <li><a href="contact-us.php"> Na kontaktoni </a></li>
         <li><a href="login.php"> <i class="fa-solid fa-user"></i> </a></li>
        </ul>
     </nav>


    <main class="background-slider">
        <div class="background1 slider">
            <div class="background-text">
                <h1>Bëhu donator.</h1>
                <p>Kur dhuroni gjak, ju jeni më shumë se thjesht një Dhurues, ju jeni një HERO!</p>
                <h2>Bëj gjënë e duhur.</h2>
                <button>Dhuro gjak tani!</button>
            </div>
        </div>
        <div class="background2 slider">
            <div class="background-text background-text2">
                <h1>Shpëto një jetë.</h1>
                <p>Dhuroni gjak ose plazmën për të bërë një ndryshim në këtë botë</p>
                <h2>Edhe ti mund ta bësh këtë.</h2>
                <button>Dhuro gjak tani!</button>
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
    <div class="main-box">
        <img src="../../img/main-box4.JPG" alt="">
        <p class="main-box-header">Mëso</p>
        <p>Ne ofrojmë një gamë inovative të ngjarjeve arsimore për profesionistët shëndetësorë për të mbështetur praktikën e sigurt të transfuzionit.</p>
        <a href="#">Lexo më shumë &#10095;</a>
    </div>
    <div class="main-box">
      <img src="../../img/main-box5.jpg" alt="">
      <p class="main-box-header">Menaxhimi i Inventarit</p>
      <p>Menaxhimi i inventarit përfshin të gjitha aktivitetet që lidhen me porositjen, ruajtjen, trajtimin dhe lëshimin e produkteve të gjakut.</p>
    <a href="#">Mësoni rreth inventarit tonë &#10095;</a>
    </div>
    <div class="main-box">
     <img src="../../img/main-box6.jpg" alt="">
     <p class="main-box-header">A mund të dhuroj gjak?</p>
     <p>Shihni nëse keni të drejtë të dhuroni gjak sot, ose gjeni përgjigje për pyetjet e bëra shpesh.</p>
     <a href="#">Kontrolloni përshtatshmërinë tuaj &#10095; </a>
    </div>
    <div class="main-box">
        <img src="../../img/main-box7.jpg" alt="">
        <p class="main-box-header"></p>
        <p>Bëhuni pjesë e programit tonë të donacioneve në grup. Bëhet fjalë për miqësinë, komunitetin dhe mirësinë.</p>
        <a href="#">Lexo më shumë &#10095;</a>
    </div>
</div>
<div class="svg2"></div>
<h1 class="wwd">Cfarë bëjmë ne</h1>
<div class="main-boxes wwd-boxes">
    <div class="main-box">
        <img src="../../img/main-box8.JPG" alt="">
        <p class="main-box-header">Programi</p>
        <p>Nga përpjekja për të hequr dhimbjen nga dhurimi i gjakut deri te zbulimi i një grupi krejt të ri gjaku, programi ynë i kërkimit është mahnitës.</p>
        <a href="#">Programi I Kërkimit  &#10095;</a>
    </div>
    <div class="main-box">
      <img src="../../img/main-box9.JPG" alt="">
      <p class="main-box-header">Strategjia</p>
      <p>Sprovat, studimet dhe idetë kërkojnë një planifikim të kujdesshëm për t'i sjellë në jetë. Strategjia jonë e kërkimit na ndihmon me çdo zbulim.</p>
    <a href="#">Strategjia E Kërkimit &#10095;</a>
    </div>
    <div class="main-box">
     <img src="../../img/main-box10.JPG" alt="">
     <p class="main-box-header">Trajnimet</p>
     <p>Ne nuk mund ta bëjmë atë vetëm, ose përgjithmonë. Ne bashkëpunojmë me organizata të tjera dhe trajnojmë studiues të ardhshëm të gjakut.</p>
     <a href="#">Trajnimet E Kërkimit </a>
    </div>
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
<div class="svg3"></div>
<footer class="footer">
    <div class="first">
    <h1>Rrjetet Sociale</h1>
   <div class="social-media">
    <a href="#"><i class="fa-brands fa-facebook"></i></a>
    <a href="#"><i class="fa-brands fa-twitter"></i></a>
    <a href="#"><i class="fa-brands fa-instagram"></i></a>
   </div>
   </div>

   <div class="second">
    <h1>Na gjeni këtu</h1>
    <p>Rruga Shkupi, Nr.25, Prishtinë 10000</p>
       
   </div>
</footer>
<div class="copyright">
    <p>© 2023 All Rights Reserved.</p>
</div>
<!--JS-->
<script src="../../js/blood-donor.js"></script>

</body>
</html>


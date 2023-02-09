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
    <link rel="icon" href="../img/logo.png" type="../../img/icon">
    <link rel="stylesheet" href="../../css/blood-donor.css">
    <script src="https://kit.fontawesome.com/7be85ed243.js"></script>
</head>
<body>
    <nav class="navbar navbar-other">
        <div class="logo"><a href="blood-donor.php"><img src="../../img/logo.png" alt="foto"></a></div>
        <ul>
            <li><a href="why-you-should-donate.php"> Pse duhet të dhuroni gjak </a></li>
            <li><a href="about-us.php">Rreth nesh </a></li>
            <li><a href="contact-us.php"> Na kontaktoni </a></li>
         <li><a href="login.php"> <i class="fa-solid fa-user"></i> </a></li>
        </ul>
     </nav>

    <div class="background-abtus">
     <img src="../../img/abtus.JPG" alt="foto">
     <h1>Rreth Qendrës Nena Terezë</h1>
    </div>
        
<div class="abtus-content">
    <p>Mirë se vini në Qendrën Nëna Terezë, ofruesi kryesor i dhurimit të gjakut dhe shërbimeve të kujdesit ndaj pacientëve në Prishtinë. Misioni ynë është t'i shërbejmë komunitetit tonë duke ofruar kujdes dhe mbështetje me cilësi të lartë për ata që kanë nevojë.</p>
    <p>E themeluar në vitin 2004, Nëna Terezë ka një histori të gjatë ekselence dhe inovacioni në këtë fushë. Ekipi ynë i përkushtuar i profesionistëve të kujdesit shëndetësor është i përkushtuar për të ofruar kujdesin më të mirë të mundshëm për pacientët tanë, dhe ne jemi vazhdimisht në kërkim të mënyrave për të përmirësuar dhe zgjeruar shërbimet tona.</p>
    <p>Objektet tona moderne dhe teknologjia e avancuar mjekësore na lejojnë të ofrojmë një gamë të gjerë shërbimesh për pacientët tanë. Ne jemi gjithashtu krenarë që jemi partnerë me organizata të tjera shëndetësore për të siguruar që jemi në gjendje të ofrojmë kujdesin më të plotë të mundshëm.</p>
    <p>Ne besojmë se kthimi ndaj komunitetit tonë është një pjesë e rëndësishme e misionit tonë. Ne ofrojmë një sërë mundësish vullnetare dhe organizojmë rregullisht aksione gjaku dhe ngjarje të tjera për të mbështetur fqinjët tanë në ne</p>
    <p>Ne jemi mirënjohës për mbështetjen e donatorëve dhe vullnetarëve tanë dhe jemi të përkushtuar që të kemi një ndikim pozitiv në jetën e atyre që u shërbejmë. Faleminderit që zgjodhët Nëna Terezë për dhurimin tuaj të gjakut dhe nevojat tuaja shëndetësore.</p>
</div>
   
   
   <section class="abtus-boxes">
    <div class="abtus-box">
        <img src="../../img/abtus-box1.JPG" alt="foto">
        <h1 class="abtus-box-header">Siguria</h1>
        <p>Pajisjet tona janë testuar profesionalisht dhe mbahen të pastra.</p>
        <a href="#">Lexo më shumë  &#10095;</a>
    </div>
    <div class="abtus-box">
        <img src="../../img/abtus-box2.JPG" alt="foto">
        <h1 class="abtus-box-header">Historia jonë </h1>
        <p>Nëna Terezë ka një histori të vjetër dhe fillim interesant</p>
        <a href="#">Lexo më shumë  &#10095;</a>
    </div>
    <div class="abtus-box">
        <img src="../../img/abtus-box3.JPG" alt="foto">
        <p class="abtus-box-header">Stafi ynë </p>
        <p>Ne punësojmë staf me përvojë në fushën e shëndetësisë.</p>
        <a href="#">Lexo më shumë  &#10095;</a>
    </div>
</section>

<div class="svg4"></div>
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
    <p>Rruga Shkupi, Nr.25, Prishtinë<br> 10000</p>
   </div>
</footer>
<div class="copyright">
    <p>© 2022 All Rights Reserved.</p>
</div>
<!--JS-->
<script src="../../js/blood-donor.js"></script>

</body>
</html>
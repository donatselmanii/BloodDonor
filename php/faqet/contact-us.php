<?php
if (!isset($_SESSION)) {
    session_start();
}

require_once('../CRUD/contactFormCRUD.php');

if (isset($_POST['dergoMSG'])) {
  $cfCRUD = new contactFormCRUD();

  $cfCRUD->setEmri($_POST['name']);
  $cfCRUD->setEmail($_POST['email']);
  $cfCRUD->setPhone($_POST['phone']);
  $cfCRUD->setMsg($_POST['msgField']);

  $cfCRUD->insertoMesazhin();
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Na Kontaktoni</title>
    <link rel="icon" href="../../img/logo.png" type="image/icon">
    <link rel="stylesheet" href="../../css/blood-donor.css">
    <script src="https://kit.fontawesome.com/7be85ed243.js"></script>
</head>
<body>
    <?php
    include("../includes/navbar.php");
    ?>
    <form name="ContactForm" onsubmit="return validimiContactForm()" action="" method="POST">
    <?php
      if (isset($_SESSION['mesazhiMeSukses'])) {
        echo '
                <script>alert("Mesazhi u dergua me sukses!");</script>
          ';
      }
      ?>
    <section id="contact" class="contact">
        <div class="contact-box">
            <div class="foto"></div>
            <div class="box">
                <h2>Na kontaktoni këtu</h2>
                <input type="text" class="contact-field" name="name" placeholder="Emri">
                <input type="text" class="contact-field" name="email" placeholder="Email">
                <input type="text" class="contact-field" name="phone" placeholder="Telefoni">
                <textarea placeholder="Mesazh" name="msgField" class="contact-field"></textarea>
                <input class="btn" type="submit" value="Dergo" name="dergoMSG" />
            </div>
        </div>
    </section>
    </form>
    <div class="map">
    <h1>Na gjeni këtu</h1>
    <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d2327.238844522272!2d21.15822257506029!3d42.64348661715003!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x0%3A0xdd725b95c5b659fb!2sSpitali%20Amerikan!5e1!3m2!1sen!2s!4v1671982024633!5m2!1sen!2s" width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
    </div>

    
<?php include("../includes/footer.php"); ?>


<?php include("../funksione/skriptat.php"); ?>
</body>
</html>
<?php
unset($_SESSION['mesazhiMeSukses']);
?>
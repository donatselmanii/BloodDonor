<?php
if (!isset($_SESSION)) {
  session_start();
}

require_once('../CRUD/DonationCRUD.php');
$DonationCRUD = new DonationCRUD();



?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Kontrollo Donacionet</title>
  <style>
      .container-lajmi {
   display: grid;
   grid-template-columns: repeat(4, 1fr)
}
 .container-lajmi img {
  width: 250px;
  height: 250px;
 }
.lajmi-text h1 {
  font-weight: 100;
  color: rgb(184,29,29);
  padding:5px;
}
.lajmi-each {
  width: 250px;
  box-shadow: 5px 5px 10px rgb(200,200,200)
}
.lajmi-each .button{
 background-color: rgb(184,29,29);
 border: none;
 color: white;
 margin: 5px;
 padding: 5px;
 border-radius: 5px;
}
.lajmi-each .button a {
  color: white;
  text-decoration: none;

}
  </style>
</head>

<body>
  <div class="container-lajmi">
    <?php
    
      $donacionet = $DonationCRUD->shfaqiDonations();
      foreach ($donacionet as $donacioni) {
        echo '<div class="lajmi-each">
                    <div><img src="../../img/donation/' . $donacioni['fotorequest'] . '" alt="" /></div>
                    <div><p>' . $donacioni['titulli'] . '</p></div>
                    <div><p>' . $donacioni['pershkrimi'] . '</p></div>
                    <div><a href="./editoDonation.php?donationID=' . $donacioni['donationID'] . '"><button class="button">Edito</button></a></div>
                    <button class="button"><a href="../adminFunksione/fshiDonation.php?donationID=' . $donacioni['donationID'] . '">Fshij</a></button>
             
                    </div>';
      }
    ?>
  </div>

</body>

</html>
<?php
if (!isset($_SESSION)) {
    session_start();
}

include_once('../CRUD/DonationCRUD.php');
include_once('../CRUD/Modeli.php');
$donacioni = new DonationCRUD();
$Modeli = new Modeli();



if (isset($_GET['donationID'])) {
    $donacioni->setDonationID($_GET['donationID']);

    $teDhenatEDonacionit = $donacioni->shfaqDonationSipasID();

    $_SESSION['donationID'] = $teDhenatEDonacionit['donationID'];
    $_SESSION['titulli'] = $teDhenatEDonacionit['titulli'];
    $_SESSION['fotorequest'] = $teDhenatEDonacionit['fotorequest'];
    $_SESSION['pershkrimi'] = $teDhenatEDonacionit['pershkrimi'];
}

$kontrollotedhenatDonator= $Modeli->kontrolloDonator();
$Modeli->setId($_SESSION['id']);
if($kontrollotedhenatDonator==true){
    
    echo '<script>document.location="regDonator.php?id=' . $kontrollotedhenatDonator['id'] . '"</script>';
}
?>



<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Lajmi</title>
</head>

<body>
    <div class="containerOrder">
        <div>
            <?php
            
            echo ' <img src="../../img/donation/' . $_SESSION['fotorequest'] . '">
            <p>' . $_SESSION['titulli'] . '</p>
            <p>' . $_SESSION['pershkrimi'] . '</p>
            <button><a href="Selamet.php?id=' . $_SESSION['id'] . '">Apliko</a></button>';
            
            
            

            ?> 
        </div>
          
        </div>
    </div>
    <?php include_once('../funksione/skriptat.php'); ?>
</body>


</html>
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
  <title>lajmet</title>
</head>

<body>
  <div class="container">
    <form class="searchBarForm" name='kerko' action='../funksione/search.php' method="post">
      <input class="searchBar" name='kerkimi' type="search" placeholder="Search">
    </form>
    <?php
    
      $donacionet = $DonationCRUD->shfaqiDonations();
      foreach ($donacionet as $donacioni) {
        echo '<tr>
                    <td><img src="../../img/donation/' . $donacioni['fotorequest'] . '" alt="" /></td>
                    <td><p>' . $donacioni['titulli'] . '</p></td>
                    <td><p>' . $donacioni['pershkrimi'] . '</p></td>
                    <td><a href="./editoDonation.php?donationID=' . $donacioni['donationID'] . '"><button>Edito</button></a>
                    <button class="fshij"><a href="../adminFunksione/fshiDonation.php?donationID=' . $donacioni['donationID'] . '">Fshij</a></button>
             
                    </tr>';
      }
    ?>
  </div>

</body>

</html>
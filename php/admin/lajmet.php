<?php
if (!isset($_SESSION)) {
  session_start();
}

require_once('../CRUD/NewsCRUD.php');
$NewsCRUD = new NewsCRUD();



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
    
      $lajmet = $NewsCRUD->shfaqiLajmet();
      foreach ($lajmet as $lajmi) {
        echo '<tr>
                    <td><img src="../../img/lajmet/index/' . $lajmi['fotolajmit'] . '" alt="" /></td>
                    <td><p>' . $lajmi['titulli'] . '</p></td>
                    <td><p>' . $lajmi['pershkrimi'] . '</p></td>
                    <td><a href="./editoLajmin.php?lajmiID=' . $lajmi['lajmiID'] . '"><button class="button">Edito</button></a>
                    <button class="fshij"><a href="../adminFunksione/fshiLajmin.php?lajmiID=' . $lajmi['lajmiID'] . '">Fshij</a></button>
             
                    </tr>';
      }
    ?>
  </div>

</body>

</html>
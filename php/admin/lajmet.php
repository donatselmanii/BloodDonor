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
  <title>Lajmet</title>
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
    
      $lajmet = $NewsCRUD->shfaqiLajmet();
      foreach ($lajmet as $lajmi) {
        echo '<div class="lajmi-each">
                    <div><img src="../../img/lajmet/index/' . $lajmi['fotolajmit'] . '" alt="" /></div>
                    <div class="lajmi-text"><h1>' . $lajmi['titulli'] . '</h1></div>
                    <div class="lajmi-text"><p>' . $lajmi['pershkrimi'] . '</p></div>
                    <div><a href="./editoLajmin.php?lajmiID=' . $lajmi['lajmiID'] . '"><button class="button">Edito</button></a></div>
                    <button class="fshij button"><a href="../adminFunksione/fshiLajmin.php?lajmiID=' . $lajmi['lajmiID'] . '">Fshij</a></button>
             
                 </div>';
      }
    ?>
  </div>

</body>

</html>
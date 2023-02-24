<?php
require_once('../CRUD/Modeli.php');
$Modeli = new Modeli();
if (!isset($_SESSION)) {
    session_start();
}
if (!isset($_SESSION['id'])) {
    echo '<script>document.location="../faqet/login.php"</script>';
    $_SESSION['nukJeLogin'] = true;
    
}?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dhuro Gjak</title>
</head>
<body>
    
<?php


$Modeli->setId($_SESSION['id']);
$teDhenatKlientit = $Modeli->shfaqSipasIDs();
echo '<script>document.location="regDonator.php?id=' . $teDhenatKlientit['id'] . '"</script>';

    if(isset($teDhenatKlientit['id'])) {
    echo '<script>document.location="regDonator.php?id=' . $teDhenatKlientit['id'] . '"</script>';


}
?>
</body>
</html>
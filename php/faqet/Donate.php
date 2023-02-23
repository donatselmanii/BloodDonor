<?php
if (!isset($_SESSION)) {
    session_start();
}
if (!isset($_SESSION['userID'])) {
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
include('../includes/navbar.php');
include_once('../CRUD/Modeli.php');
$Modeli = new Modeli();

$Modeli->setId($_SESSION['id']);
$kontrollotedhenatDonator= $Modeli->kontrolloDonator();
$teDhenatKlientit = $Modeli->shfaqSipasIDs();
if ($teDhenatKlientit == true) {
    echo '<script>document.location="../faqet/login.php"</script>';
    $_SESSION['nukJeLogin'] = true;
}
elseif($kontrollotedhenatDonator==true){
    echo '<script>document.location="../faqet/signup.php"</script>';
}
?>
</body>
</html>
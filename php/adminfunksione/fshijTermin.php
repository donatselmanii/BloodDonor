<?php
if (!isset($_SESSION)) {
    session_start();
}

require_once('../adminFunksione/kontrolloAksesAdmin.php');
require_once('../CRUD/TerminiCRUD.php');

if (isset($_SESSION['skeAksesAdmin']) == true) {
    echo '<script>document.location="../admin/terminet.php"</script>';
} else {
    $TerminiCRUD = new TerminiCRUD();

    $TerminiCRUD->setTerminiID($_GET['terminiID']);
    $TerminiCRUD->fshijTermininSipasID();
}
?>
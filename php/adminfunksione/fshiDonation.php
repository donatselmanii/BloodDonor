<?php
if (!isset($_SESSION)) {
    session_start();
}

require_once('../adminFunksione/kontrolloAksesAdmin.php');
require_once('../CRUD/DonationCRUD.php');

if (isset($_SESSION['skeAksesAdmin']) == true) {
    echo '<script>document.location="../admin/Donate.php"</script>';
} else {
    $DonationCRUD = new DonationCRUD();

    $DonationCRUD->setDonationID($_GET['donationID']);
    $DonationCRUD->fshijDonationSipasID();
}
?>
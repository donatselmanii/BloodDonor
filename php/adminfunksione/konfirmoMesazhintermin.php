<?php
if (!isset($_SESSION)) {
    session_start();
}

require_once('./kontrolloAksesin.php');
require_once('../CRUD/TerminiCRUD.php');

$TerminiCRUD = new TerminiCRUD();

$TerminiCRUD->setTerminiID($_GET['terminiID']);
$TerminiCRUD->konfirmoMesazhin();
?>
<?php
include 'dbcon.php';
$database = new dbcon();
$conn = $database->getConn();

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} else {
    echo "Connected to database successfully";
}
?>
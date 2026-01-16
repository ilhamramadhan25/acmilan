<?php
date_default_timezone_set('Asia/Jakarta');

file_put_contents("debug.txt", "start\n");

$servername = "sql100.infinityfree.com";
$username   = "if0_40858305";
$password   = "h1tMAN25";
$db         = "if0_40858305_webacmilan";

$conn = new mysqli($servername, $username, $password, $db);

if ($conn->connect_error) {
    file_put_contents("debug.txt", "ERROR: " . $conn->connect_error);
    exit;
}

file_put_contents("debug.txt", "CONNECTED");
?>

<?php
$server = "localhost";
// $username = "root";
// $password = "";
// $db = "db_mujahiddin";
$username = "gunn1374_root";
$password = "Padri0@@@";
$db = "gunn1374_mesjid";

$conn = new mysqli($server, $username, $password, $db);
if(!$conn){
    die("koneksi Database gagal". mysqli_connect_error());
}
?>

<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "db_penjualan_test";

$koneksi = mysqli_connect($servername, $username, $password, $dbname);
if (!$koneksi){
        die("Connection Failed:".mysqli_connect_error());
    }
?>

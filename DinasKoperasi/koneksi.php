<?php
$host = "localhost"; // atau "127.0.0.1"
$user = "root";
$pass = "";
$db   = "diskopukm_1";
//$port = "3306";
$koneksi = mysqli_connect($host, $user, $pass, $db);

// Mencoba koneksi
//$koneksi = mysqli_connect($host, $user, $pass, $db);

// Cek koneksi
if (!$koneksi) {
    die("Koneksi ke server kantor gagal: " . mysqli_connect_error());
}
?>
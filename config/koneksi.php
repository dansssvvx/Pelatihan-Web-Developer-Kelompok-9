<?php
$db_host = 'localhost';
$db_user = 'root';
$db_pass = '';
$db_name = 'PelatihanW3';

$koneksi = mysqli_connect($db_host, $db_user, $db_pass, $db_name);

if ($koneksi->connect_error) {
    die("Koneksi gagal: " . $koneksi->connect_error);
}

?>
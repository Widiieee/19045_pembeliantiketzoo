<?php
// Koneksi ke database
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "19045_pembeliantiketzoo";

// Membuat koneksi
$conn = new mysqli($servername, $username, $password, $dbname);

// Cek koneksi
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
?>
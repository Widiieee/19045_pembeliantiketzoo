<?php
include '../koneksi/function.php';

// Memeriksa apakah ID disediakan
if (!isset($_GET['id'])) {
    header('Location: admin_satwa.php');
    exit;
}

$id = $_GET['id'];

// Mengambil data satwa berdasarkan ID
$sql = "SELECT * FROM satwa WHERE id = ?";
$stmt = $conn->prepare($sql);
$stmt->bind_param("i", $id);
$stmt->execute();
$result = $stmt->get_result();

if ($result->num_rows === 0) {
    echo "Data tidak ditemukan.";
    exit;
}

$row = $result->fetch_assoc();

// Hapus foto dari folder
$foto_lama = $row['foto'];
$target_dir = "../img/";
if (file_exists($target_dir . $foto_lama)) {
    unlink($target_dir . $foto_lama);
}

// Hapus data dari database
$sql_delete = "DELETE FROM satwa WHERE id = ?";
$stmt_delete = $conn->prepare($sql_delete);
$stmt_delete->bind_param("i", $id);
$stmt_delete->execute();

header('Location: admin_satwa.php');
exit;
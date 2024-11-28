<?php
include '../koneksi/function.php'; // Pastikan path ke koneksi database benar

if (isset($_GET['id'])) {
    $id = $_GET['id'];

    // Menghindari SQL Injection dengan prepared statement
    $stmt = $conn->prepare("DELETE FROM fasilitas_servis WHERE id = ?");
    $stmt->bind_param("i", $id); // "i" menunjukkan tipe data integer

    if ($stmt->execute()) {
        // Jika berhasil, redirect ke halaman sebelumnya dengan pesan sukses
        header("Location: admin_fasilitas.php?message=Data berhasil dihapus");
        exit();
    } else {
        // Jika gagal, redirect dengan pesan error
        header("Location: admin_fasilitas.php?message=Gagal menghapus data");
        exit();
    }

    $stmt->close();
} else {
    // Jika id tidak diset, redirect dengan pesan error
    header("Location: admin_fasilitas.php?message=ID tidak valid");
    exit();
}

$conn->close();
?>
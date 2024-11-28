<?php
include '../koneksi/function.php'; 

if (isset($_GET['id_harga'])) {
    $id_harga = $_GET['id_harga'];

    // Menghindari SQL Injection dengan prepared statement
    $stmt = $conn->prepare("DELETE FROM harga_tiket WHERE id_harga = ?");
    $stmt->bind_param("i", $id_harga); // "i" menunjukkan tipe data integer

    if ($stmt->execute()) {
        // Jika berhasil, redirect ke halaman sebelumnya dengan pesan sukses
        header("Location: tiket.php?message=Data berhasil dihapus");
        exit();
    } else {
        // Jika gagal, redirect dengan pesan error
        header("Location: tiket.php?message=Gagal menghapus data");
        exit();
    }

    $stmt->close();
} else {
    // Jika id_harga tidak diset, redirect dengan pesan error
    header("Location: tiket.php?message=ID tidak valid");
    exit();
}

$conn->close();
?>
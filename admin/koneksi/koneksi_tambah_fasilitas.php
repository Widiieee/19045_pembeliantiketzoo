<?php
// Koneksi ke database
require '../../koneksi/function.php';

// Periksa apakah form telah disubmit
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Menangkap data dari form
    $nama_fasilitas = $_POST['nama_fasilitas'] ?? '';
    $deskripsi = $_POST['deskripsi'] ?? '';

    // Validasi data
    if (!empty($nama_fasilitas) && !empty($deskripsi)) {
        // Gunakan prepared statements untuk keamanan
        $stmt = $conn->prepare("INSERT INTO fasilitas_servis (nama_fasilitas, deskripsi) VALUES (?, ?)");
        $stmt->bind_param("ss", $nama_fasilitas, $deskripsi);

        if ($stmt->execute()) {
            echo "<script>
                alert('Tambah Data Fasilitas Telah Berhasil');
                window.location.href = '../admin_fasilitas.php';
            </script>";
        } else {
            echo "<script>
                alert('Tambah Data Fasilitas Gagal: " . $stmt->error . "');
                window.location.href = '../admin_fasilitas.php';
            </script>";
        }

        $stmt->close();
    } else {
        echo "<script>
            alert('Semua data harus diisi!');
            window.location.href = '../admin_fasilitas.php';
        </script>";
    }
} else {
    echo "<script>
        alert('Form tidak valid!');
        window.location.href = '../admin_fasilitas.php';
    </script>";
}
?>

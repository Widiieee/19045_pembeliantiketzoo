<?php
// Koneksi ke database
require '../../koneksi/function.php';

// Periksa apakah form telah disubmit
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Menangkap data dari form
    $nama_tiket = $_POST['nama_tiket'] ?? '';
    $harga = $_POST['harga'] ?? '';
    $kategori = $_POST['kategori'] ?? '';
    $deskripsi = $_POST['deskripsi'] ?? '';

    // Validasi data
    if (!empty($nama_tiket) && !empty($harga) && !empty($kategori) && !empty($deskripsi)) {
        // Gunakan prepared statements untuk keamanan
        $stmt = $conn->prepare("INSERT INTO harga_tiket (nama_tiket, harga, kategori, deskripsi) VALUES (?, ?, ?, ?)");
        $stmt->bind_param("ssss", $nama_tiket, $harga, $kategori, $deskripsi);

        if ($stmt->execute()) {
            echo "<script>
                alert('Tambah Data Tiket Telah Berhasil');
                window.location.href = '../tiket.php';
            </script>";
        } else {
            echo "<script>
                alert('Tambah Data Tiket Gagal: " . $stmt->error . "');
                window.location.href = '../tiket.php';
            </script>";
        }

        $stmt->close();
    } else {
        echo "<script>
            alert('Semua data harus diisi!');
            window.location.href = '../tiket.php';
        </script>";
    }
} else {
    echo "<script>
        alert('Form tidak valid!');
        window.location.href = '../tambah.php';
    </script>";
}
?>

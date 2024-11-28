<?php
include '../../koneksi/function.php'; // Koneksi ke database

if (isset($_GET['id_tiket']) && isset($_GET['status'])) {
    $id_tiket = (int) $_GET['id_tiket'];
    $new_status = $_GET['status'];

    // Periksa apakah tiket ada dan ambil status saat ini
    $stmt = $conn->prepare("SELECT status FROM status_tiket WHERE id_tiket = ?");
    $stmt->bind_param("i", $id_tiket);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        $current_status = $row['status'];

        // Debugging: Tampilkan status saat ini dan status baru
        echo "Current Status: $current_status<br>";
        echo "New Status: $new_status<br>";

        // Ubah status berdasarkan kondisi
        if ($current_status == 'booked') {
            if ($new_status == 'claimed' || $new_status == 'canceled') {
                // Jika status saat ini adalah 'booked', bisa diubah menjadi 'claimed' atau 'canceled'
                $stmt_update = $conn->prepare("UPDATE status_tiket SET status = ? WHERE id_tiket = ?");
                $stmt_update->bind_param("si", $new_status, $id_tiket);
            } else {
                echo "<script>alert('Status tiket tidak dapat diubah dari status booked ke status $new_status!'); window.location.href = '../kelola_pemesanan.php';</script>";
                exit;
            }
        } elseif ($current_status == 'claimed') {
            if ($new_status == 'expired') {
                // Jika status saat ini adalah 'claimed', bisa diubah menjadi 'expired'
                $stmt_update = $conn->prepare("UPDATE status_tiket SET status = ? WHERE id_tiket = ?");
                $stmt_update->bind_param("si", $new_status, $id_tiket);
            } else {
                echo "<script>alert('Status tiket tidak dapat diubah dari status claimed ke status $new_status!'); window.location.href = '../kelola_pemesanan.php';</script>";
                exit;
            }
        } elseif ($current_status == 'canceled') {
            echo "<script>alert('Status tiket sudah dibatalkan dan tidak dapat diubah!'); window.location.href = '../kelola_pemesanan.php';</script>";
            exit;
        } elseif ($current_status == 'expired') {
            echo "<script>alert('Status tiket sudah hangus dan tidak dapat diubah!'); window.location.href = '../kelola_pemesanan.php';</script>";
            exit;
        } else {
            echo "<script>alert('Status tiket tidak dikenal!'); window.location.href = '../kelola_pemesanan.php';</script>";
            exit;
        }

        // Eksekusi update jika sudah siap
        if (isset($stmt_update) && $stmt_update->execute()) {
            echo "<script>alert('Status tiket berhasil diubah menjadi $new_status!'); window.location.href = '../kelola_pemesanan.php';</script>";
        } else {
            echo "<script>alert('Terjadi kesalahan saat mengubah status tiket!'); window.location.href = '../kelola_pemesanan.php';</script>";
        }
        $stmt_update->close();
    } else {
        echo "<script>alert('Tiket tidak ditemukan!'); window.location.href = '../kelola_pemesanan.php';</script>";
    }
    $stmt->close();
} else {
    echo "<script>alert('ID tiket tidak valid!'); window.location.href = '../kelola_pemesanan.php';</script>";
}

$conn->close();
?>
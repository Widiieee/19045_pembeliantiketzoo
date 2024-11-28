<?php
include 'function.php'; // Koneksi ke database

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Mendapatkan data dari form dan melakukan validasi
    $id_harga = (int) $_POST['id_harga']; // Ambil langsung dari form
    $nama_pemesan = mysqli_real_escape_string($conn, $_POST['nama_pemesan']);
    $email = mysqli_real_escape_string($conn, $_POST['email']);
    $nomor_telepon = mysqli_real_escape_string($conn, $_POST['nomor_telepon']);
    $jumlah_tiket = (int) mysqli_real_escape_string($conn, $_POST['jumlah_tiket']);
    $tanggal_kunjungan = mysqli_real_escape_string($conn, $_POST['tanggal_kunjungan']);

    // Validasi: Pastikan tidak ada data yang kosong
    if (empty($nama_pemesan) || empty($email) || empty($nomor_telepon) || empty($jumlah_tiket) || empty($tanggal_kunjungan)) {
        echo "<script>alert('Semua data harus diisi!'); window.location.href = '../tiket.php';</script>";
        exit;
    }

    // Mengambil harga tiket dari database berdasarkan id_harga
    $stmt_harga = $conn->prepare("SELECT harga, nama_tiket, kategori FROM harga_tiket WHERE id_harga = ?");
    $stmt_harga->bind_param("i", $id_harga);
    $stmt_harga->execute();
    $result = $stmt_harga->get_result();
    $row = $result->fetch_assoc();

    // Pastikan data tiket ditemukan
    if (!$row) {
        echo "<script>alert('Data harga tiket tidak ditemukan!'); window.location.href = '../tiket.php';</script>";
        exit;
    }

    $harga_tiket = $row['harga'];
    $nama_tiket = $row['nama_tiket'];
    $kategori = $row['kategori'];

    // Menghitung total harga dan mengonversinya menjadi string
    $total_harga = strval($harga_tiket * $jumlah_tiket); // Pastikan ini menjadi string

    // Menyimpan data pembelian tiket
    $stmt = $conn->prepare("INSERT INTO tiket (id_harga, nama_tiket, kategori, harga, nama_pemesan, email, nomor_telepon, jumlah_tiket, tanggal_kunjungan, total_harga, tanggal_pemesanan) 
    VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, NOW())");

    // Bind parameter sesuai dengan tipe data di database
    $stmt->bind_param("issssssiss", $id_harga, $nama_tiket, $kategori, $harga_tiket, $nama_pemesan, $email, $nomor_telepon, $jumlah_tiket, $tanggal_kunjungan, $total_harga);

    // Eksekusi statement
    if ($stmt->execute()) {
        // Ambil ID tiket yang baru saja dibeli
        $id_tiket = $stmt->insert_id; // Mendapatkan ID tiket yang baru dimasukkan

        // Menyimpan status tiket ke tabel status_tiket
        $status = 'booked'; // Status awal
        $stmt_status = $conn->prepare("INSERT INTO status_tiket (id_tiket, status) VALUES (?, ?)");
        $stmt_status->bind_param("is", $id_tiket, $status);

        if ($stmt_status->execute()) {
            // Status tiket berhasil ditambahkan
            echo "<script>alert('Tiket berhasil dibeli!'); window.location.href = '../cetak_tiket.php?id_tiket=$id_tiket';</script>";
        } else {
            // Gagal menambahkan status tiket
            echo "<script>alert('Tiket berhasil dibeli, tetapi gagal menambahkan status!'); window.location.href = '../tiket.php';</script>";
        }

        // Menutup prepared statement status
        $stmt_status->close();
    } else {
        echo "<script>alert('Terjadi kesalahan saat pemesanan!'); window.location.href = '../tiket.php';</script>";
    }

    // Menutup prepared statement
    $stmt->close();
    $stmt_harga->close();
}
?>
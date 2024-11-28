<?php
include "koneksi/function.php";

if (isset($_GET['id_harga']) && is_numeric($_GET['id_harga'])) {
    $id_harga = $_GET['id_harga'];
    $result = mysqli_query($conn, "SELECT * FROM harga_tiket WHERE id_harga = '$id_harga'");

    if ($result && mysqli_num_rows($result) > 0) {
        $row = mysqli_fetch_assoc($result);
    } else {
        echo "<script>alert('Data tiket tidak ditemukan!'); window.location.href = 'index.php';</script>";
        exit;
    }
} else {
    echo "<script>alert('ID Tiket tidak valid!'); window.location.href = 'index.php';</script>";
    exit;
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>Faunatopia</title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <meta content="" name="keywords">
    <meta content="" name="description">

    <!-- Favicon -->
    <link href="img/favicon.ico" rel="icon">

    <!-- Google Web Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@400;500&family=Quicksand:wght@600;700&display=swap" rel="stylesheet"> 

    <!-- Icon Font Stylesheet -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.1/font/bootstrap-icons.css" rel="stylesheet">

    <!-- Libraries Stylesheet -->
    <link href="lib/animate/animate.min.css" rel="stylesheet">
    <link href="lib/lightbox/css/lightbox.min.css" rel="stylesheet">
    <link href="lib/owlcarousel/assets/owl.carousel.min.css" rel="stylesheet">

    <!-- Customized Bootstrap Stylesheet -->
    <link href="css/bootstrap.min.css" rel="stylesheet">

    <!-- Template Stylesheet -->
    <link href="css/style.css" rel="stylesheet">

    <!-- AOS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/aos@2.3.4/dist/aos.css">

    <!-- HOVER -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/hover.css/2.3.1/css/hover-min.css">
</head>

<body>
    <?php include 'layout/navbar.php'; ?>
    <main id="main">
        <div class="container">
            <div class="card">
            <div class="card-header  text-center" style="background-color: #629584;">
                <h2 style="color: white;">Pembelian Tiket</h2>
            </div>
                <div class="card-body">
                <dl class="row">
                <form action="koneksi/koneksi_beli_tiket.php" method="post">
                <input type="hidden" name="id_harga" value="<?php echo htmlspecialchars($row['id_harga']); ?>">
                    <div class="mb-3">
                        <label for="nama_tiket" class="form-label">Nama Tiket</label>
                        <input class="form-control" type="text" value="<?php echo htmlspecialchars($row['nama_tiket']); ?>" aria-label="Disabled input example" disabled readonly>
                    </div>
                    <div class="mb-3">
                        <label for="harga" class="form-label">Kategori Tiket</label>
                        <input class="form-control" type="text" value="<?php echo htmlspecialchars($row['kategori']); ?>" aria-label="Disabled input example" disabled readonly>
                    </div>
                    <div class="mb-3">
                        <label for="harga" class="form-label">Harga Tiket</label>
                        <input class="form-control" type="text" value="Rp <?php echo number_format($row['harga'], 0, ',', '.'); ?>" aria-label="Disabled input example" disabled readonly>
                    </div>
                    <h2 style="text-align: center;">Format Pembelian</h2>

                    <div class="mb-3">
                    <label for="nama_pemesan" class="form-label">Nama Pemesan</label>
                    <input type="text" class="form-control" id="nama_pemesan" name="nama_pemesan" placeholder="Masukan Nama Lengkap" required>
                    </div>

                    <div class="mb-3">
                    <label for="email" class="form-label">Alamat Email</label>
                    <input type="email" class="form-control" id="email" name="email" placeholder="name@example.com" required>
                    </div>

                    <div class="mb-3">
                    <label for="nomor_telepon" class="form-label">Nomor Telepon</label>
                    <input type="text" class="form-control" id="nomor_telepon" name="nomor_telepon" placeholder="Masukan Nomor Telepon" required>
                    </div>

                    <div class="mb-3">
                    <label for="tiket" class="form-label">Jumlah Tiket</label>
                    <input type="number" class="form-control" id="jumlah_tiket" name="jumlah_tiket" placeholder="Masukan Jumlah Tiket" required>
                    </div>

                    <div class="mb-3">
                    <label for="tanggal" class="form-label">Tanggal Kunjungan</label>
                    <input type="date" class="form-control" id="tanggal_kunjungan" name="tanggal_kunjungan" placeholder="Masukan Tanggal Kunjungan" required>
                    </div>

                    <div class="mb-3">
                        <label for="total_harga" class="form-label">Total Harga</label>
                        <input class="form-control" type="text" id="total_harga" name="total_harga" value="Rp 0" aria-label="Disabled input example" disabled readonly>
                    </div>

                    <button type="submit" class="btn btn-primary">Beli</button>
                </form>
                </div>
            </div>
        </div>
    </main>
    <?php include 'layout/footer.php'; ?>

    <!-- Back to Top -->
    <a href="#" class="btn btn-lg btn-primary btn-lg-square back-to-top"><i class="bi bi-arrow-up"></i></a>


    <!-- JavaScript Libraries -->
    <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src="lib/wow/wow.min.js"></script>
    <script src="lib/easing/easing.min.js"></script>
    <script src="lib/waypoints/waypoints.min.js"></script>
    <script src="lib/counterup/counterup.min.js"></script>
    <script src="lib/owlcarousel/owl.carousel.min.js"></script>
    <script src="lib/lightbox/js/lightbox.min.js"></script>

    <!-- Template Javascript -->
    <script src="js/main.js"></script>

    <!-- AOS -->
    <script src="https://cdn.jsdelivr.net/npm/aos@2.3.4/dist/aos.js"></script>

    <script>
    // Ambil elemen-elemen yang dibutuhkan
    const hargaTiket = <?php echo $row['harga']; ?>; // Harga tiket dari PHP
    const jumlahTiketInput = document.getElementById('jumlah_tiket'); // Input jumlah tiket
    const totalHargaInput = document.getElementById('total_harga'); // Input total harga

    // Fungsi untuk menghitung total harga
    function hitungTotalHarga() {
        // Ambil jumlah tiket yang diinput oleh pengguna
        const jumlahTiket = parseInt(jumlahTiketInput.value) || 0; // Jika tidak ada input, anggap 0
        
        // Hitung total harga
        const totalHarga = hargaTiket * jumlahTiket;
        
        // Tampilkan total harga dengan format Rupiah
        totalHargaInput.value = 'Rp ' + totalHarga.toLocaleString('id-ID');
    }

    // Tambahkan event listener agar perhitungan total harga terjadi setiap kali jumlah tiket berubah
    jumlahTiketInput.addEventListener('input', hitungTotalHarga);
</script>

</body>

</html>
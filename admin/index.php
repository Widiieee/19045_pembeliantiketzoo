<?php
session_start();
if (!isset($_SESSION['status']) || $_SESSION['status'] != "login") {
    echo "<script>
    alert('Anda harus login terlebih dahulu!');
    window.location.href = 'login.php';
    </script>";
    exit;
}
include '../koneksi/function.php';
// Query untuk mendapatkan jumlah pemesanan berdasarkan tanggal
$tanggal = isset($_GET['tanggal']) ? $_GET['tanggal'] : date('Y-m-d');
$sql_pemesanan = "SELECT COUNT(*) AS jumlah_pemesanan FROM tiket WHERE DATE(tanggal_pemesanan) = '$tanggal'";
$result_pemesanan = $conn->query($sql_pemesanan);
$row_pemesanan = $result_pemesanan->fetch_assoc();
$jumlah_pemesanan = $row_pemesanan['jumlah_pemesanan'];

// Query untuk mendapatkan total pendapatan berdasarkan tanggal untuk tiket yang sudah berstatus claim
$sql_pendapatan = "
    SELECT SUM(t.total_harga) AS total_pendapatan 
    FROM tiket t 
    LEFT JOIN status_tiket st ON t.id_tiket = st.id_tiket 
    WHERE DATE(t.tanggal_pemesanan) = '$tanggal' AND st.status = 'claim'
";

$result_pendapatan = $conn->query($sql_pendapatan);
$row_pendapatan = $result_pendapatan->fetch_assoc();
$total_pendapatan = $row_pendapatan['total_pendapatan'] ? $row_pendapatan['total_pendapatan'] : 0; // Menghindari null

// Query untuk mendapatkan jumlah tiket terjual berdasarkan tanggal
$sql_tiket_terjual = "SELECT SUM(jumlah_tiket) AS jumlah_tiket FROM tiket WHERE DATE(tanggal_pemesanan) = '$tanggal'";
$result_tiket_terjual = $conn->query($sql_tiket_terjual);
$row_tiket_terjual = $result_tiket_terjual->fetch_assoc();
$jumlah_tiket_terjual = $row_tiket_terjual['jumlah_tiket'];

// Query untuk mendapatkan jumlah tiket yang sudah di-claim dan yang masih booked
$sql_status = "
    SELECT 
        SUM(CASE WHEN st.status = 'claimed' THEN 1 ELSE 0 END) AS jumlah_claimed,
        SUM(CASE WHEN st.status = 'booked' THEN 1 ELSE 0 END) AS jumlah_booked
    FROM tiket t 
    LEFT JOIN status_tiket st ON t.id_tiket = st.id_tiket 
    WHERE DATE(t.tanggal_pemesanan) = '$tanggal'
";

$result_status = $conn->query($sql_status);
$row_status = $result_status->fetch_assoc();
$jumlah_claimed = $row_status['jumlah_claimed'] ? $row_status['jumlah_claimed'] : 0; // Menghindari null
$jumlah_booked = $row_status['jumlah_booked'] ? $row_status['jumlah_booked'] : 0; // Menghindari null

// Query untuk mendapatkan jumlah fasilitas
$sql_fasilitas = "SELECT COUNT(nama_fasilitas) AS jumlah_fasilitas FROM fasilitas_servis";
$result_fasilitas = $conn->query($sql_fasilitas);
$row_fasilitas = $result_fasilitas->fetch_assoc();
$jumlah_fasilitas = $row_fasilitas['jumlah_fasilitas'] ? $row_fasilitas['jumlah_fasilitas'] : 0; // Menghindari null


// Query untuk menghitung pesan masuk
$sql_pesan = "SELECT COUNT(DISTINCT nama_pengirim) AS jumlah_pesan FROM pesan";
$result_pesan = $conn->query($sql_pesan);
$row_pesan = $result_pesan->fetch_assoc();
$jumlah_pesan = $row_pesan['jumlah_pesan'] ? $row_pesan['jumlah_pesan'] : 0; // Menghindari null
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
    <link href="../img/favicon.ico" rel="icon">

    <!-- Google Web Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@400;500&family=Quicksand:wght@600;700&display=swap" rel="stylesheet"> 

    <!-- Icon Font Stylesheet -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.1/font/bootstrap-icons.css" rel="stylesheet">

    <!-- Libraries Stylesheet -->
    <link href="../lib/animate/animate.min.css" rel="stylesheet">
    <link href="../lib/lightbox/css/lightbox.min.css" rel="stylesheet">
    <link href="../lib/owlcarousel/assets/owl.carousel.min.css" rel="stylesheet">

    <!-- Customized Bootstrap Stylesheet -->
    <link href="../css/bootstrap.min.css" rel="stylesheet">

    <!-- Template Stylesheet -->
    <link href="../css/style.css" rel="stylesheet">
</head>

<body>
    <?php include 'navbar.php'; ?>
    <div class="container mt-5">
        <div class="row">
            <!-- Form untuk Memilih Tanggal -->
            <form method="get" class="mb-4">
                <label for="tanggal">Pilih Tanggal:</label>
                <input type="date" id="tanggal" name="tanggal" value="<?= $tanggal ?>" class="form-control" style="width: auto; display: inline-block;">
                <button type="submit" class="btn btn-primary ml-2">Tampilkan</button>
            </form>
            <!-- Card Jumlah Pemesanan -->
            <div class="col-md-4 mb-4">
                <div class="card shadow-sm">
                    <div class="card-body">
                        <h5 class="card-title">Jumlah Pemesanan</h5>
                        <p class="card-text"><?= $jumlah_pemesanan ?> Pemesanan</p>
                        <a href="kelola_pemesanan.php" class="btn btn-outline-success">Selengkapnya</a>
                    </div>
                </div>
            </div>

            <!-- Card Total Pendapatan -->
            <!-- <div class="col-md-4 mb-4">
                <div class="card shadow-sm">
                    <div class="card-body">
                        <h5 class="card-title">Total Pendapatan</h5>
                        <p class="card-text">Rp <?= number_format($total_pendapatan, 2, ',', '.') ?></p>
                        <a href="kelola_pemesanan.php" class="btn btn-outline-success">Selengkapnya</a>
                    </div>
                </div>
            </div> -->

            <!-- Card Jumlah Tiket Terjual -->
            <div class="col-md-4 mb-4">
                <div class="card shadow-sm">
                    <div class="card-body">
                        <h5 class="card-title">Jumlah Tiket Terjual</h5>
                        <p class="card-text"><?= $jumlah_tiket_terjual ?> Tiket</p>
                        <a href="kelola_pemesanan.php" class="btn btn-outline-success">Selengkapnya</a>
                    </div>
                </div>
            </div>

            <!-- Card Status Pemesanan -->
            <div class="col-md-4 mb-4">
                <div class="card shadow-sm">
                    <div class="card-body">
                        <h5 class="card-title">Status Pemesanan</h5>
                        <p class="card-text">Claimed: <?= $jumlah_claimed ?> Tiket</p>
                        <p class="card-text">Booked: <?= $jumlah_booked ?> Tiket</p>
                        <a href="kelola_pemesanan.php" class="btn btn-outline-success">Selengkapnya</a>
                    </div>
                </div>
            </div>

            <!-- Card Jumlah Fasilitas -->
            <div class="col-md-4 mb-4">
                <div class="card shadow-sm">
                    <div class="card-body">
                        <h5 class="card-title">Jumlah Fasilitas</h5>
                        <p class="card-text"><?= $jumlah_fasilitas ?> Fasilitas</p>
                        <a href="admin_fasilitas.php" class="btn btn-outline-success">Selengkapnya</a>
                    </div>
                </div>
            </div>

            <!-- Card Jumlah Pesan -->
            <div class="col-md-4 mb-4">
                <div class="card shadow-sm">
                    <div class="card-body">
                        <h5 class="card-title">Jumlah Pesan</h5>
                        <p class="card-text"><?= $jumlah_pesan ?> Pesan Masuk</p>
                        <a href="pesan.php" class="btn btn-outline-success">Selengkapnya</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <?php include 'footer.php'; ?>

    <!-- Back to Top -->
    <a href="#" class="btn btn-lg btn-primary btn-lg-square back-to-top"><i class="bi bi-arrow-up"></i></a>

    <!-- JavaScript Libraries -->
    <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src="../lib/wow/wow.min.js"></script>
    <script src="../lib/easing/easing.min.js"></script>
    <script src="../lib/waypoints/waypoints.min.js"></script>
    <script src="../lib/counterup/counterup.min.js"></script>
    <script src="../lib/owlcarousel/owl.carousel.min.js"></script>
    <script src="../lib/lightbox/js/lightbox.min.js"></script>

    <!-- Template Javascript -->
    <script src="../js/main.js"></script>
</body>

</html>
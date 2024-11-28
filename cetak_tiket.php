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
                <div class="card-header text-center" style="background-color: #629584;">
                    <h2 style="color: white;">Tiket</h2>
                </div>
                <div class="card-body">
                    <?php
                    include 'koneksi/function.php'; // Koneksi ke database

                    if (isset($_GET['id_tiket'])) {
                        $id_tiket = (int) $_GET['id_tiket'];

                        // Mengambil data tiket dari database berdasarkan id_tiket
                        $stmt = $conn->prepare("SELECT * FROM tiket WHERE id_tiket = ?");
                        $stmt->bind_param("i", $id_tiket);
                        $stmt->execute();
                        $result = $stmt->get_result();
                        $tiket = $result->fetch_assoc();

                        if ($tiket) {
                            // Tampilkan informasi tiket
                            echo '<dl class="row">';
                            echo '<dt class="col-sm-3">ID Tiket</dt>';
                            echo '<dd class="col-sm-9">' . htmlspecialchars($tiket['id_tiket']) . '</dd>';
                            echo '<dt class="col-sm-3">Nama Tiket</dt>';
                            echo '<dd class="col-sm-9">' . htmlspecialchars($tiket['nama_tiket']) . '</dd>';
                            echo '<dt class="col-sm-3">Kategori Tiket</dt>';
                            echo '<dd class="col-sm-9">' . htmlspecialchars($tiket['kategori']) . '</dd>';
                            echo '<dt class="col-sm-3">Harga Tiket</dt>';
                            echo '<dd class="col-sm-9">' . htmlspecialchars($tiket['harga']) . '</dd>';
                            echo '<dt class="col-sm-3">Nama Pemesan</dt>';
                            echo '<dd class="col-sm-9">' . htmlspecialchars($tiket['nama_pemesan']) . '</dd>';
                            echo '<dt class="col-sm-3">Email</dt>';
                            echo '<dd class="col-sm-9">' . htmlspecialchars($tiket['email']) . '</dd>';
                            echo '<dt class="col-sm-3">Nomor Telepon</dt>';
                            echo '<dd class="col-sm-9">' . htmlspecialchars($tiket['nomor_telepon']) . '</dd>';
                            echo '<dt class="col-sm-3">Jumlah Tiket</dt>';
                            echo '<dd class="col-sm-9">' . htmlspecialchars($tiket['jumlah_tiket']) . '</dd>';
                            echo '<dt class="col-sm-3">Tanggal Kunjungan</dt>';
                            echo '<dd class="col-sm-9">' . htmlspecialchars($tiket['tanggal_kunjungan']) . '</dd>';
                            echo '<dt class="col-sm-3">Total Harga</dt>';
                            echo '<dd class="col-sm-9">' . htmlspecialchars($tiket['total_harga']) . '</dd>';
                            echo '<dt class="col-sm-3">Tanggal Pemesanan</dt>';
                            echo '<dd class="col-sm-9">' . htmlspecialchars($tiket['tanggal_pemesanan']) . '</dd>';
                            echo '</dl>';
                        } else {
                            echo "<p>Tiket tidak ditemukan.</p>";
                        }
                        // Menutup prepared statement
                        $stmt->close();
                    } else {
                        echo "<p>ID tiket tidak valid.</p>";
                    }
                    ?>
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
</body>

</html>
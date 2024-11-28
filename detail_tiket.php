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
        <div class="card" style="min-height: 500px;"> <!-- Menetapkan tinggi minimum -->
            <div class="card-header text-center" style="background-color: #629584;">
                <h2 style="color: white;">Detail Tiket</h2>
            </div>
            <div class="card-body">
                <dl class="row">
                    <dt class="col-sm-3">Nama Tiket</dt>
                    <dd class="col-sm-9"><?php echo htmlspecialchars($row['nama_tiket']); ?></dd>

                    <dt class="col-sm-3">Deskripsi Tiket</dt>
                    <dd class="col-sm-9"><?php echo htmlspecialchars($row['deskripsi']); ?></dd>

                    <dt class="col-sm-3">Kategori</dt>
                    <dd class="col-sm-9"><?php echo htmlspecialchars($row['kategori']); ?></dd>

                    <dt class="col-sm-3 text-truncate">Harga Tiket</dt>
                    <dd class="col-sm-9">Rp <?php echo number_format($row['harga'], 0, ',', '.'); ?></dd>
                </dl>
                <a href="beli_tiket.php?id_harga=<?php echo htmlspecialchars($row['id_harga']); ?>">
                    <button type="button" class="btn btn-outline-primary">Beli Tiket</button>
                </a>
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
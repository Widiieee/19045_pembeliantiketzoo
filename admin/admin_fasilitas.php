<?php
include '../koneksi/function.php';
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
    
    <div class="container mt-3">
    <div class="card shadow-sm p-3 mb-5 bg-body-tertiary rounded">
        <div class="card-header text-center" style="background-color: #629584;">
            <h2 style="color: white;">Admin Fasilitas</h2>
        </div>
        <div class="card-body">
        <div class="d-flex justify-content-end mb-3">
            <button type="button" onclick="window.location='tambah_fasilitas.php'" class="btn btn-outline-success">Tambah Fasilitas</button>
        </div>
        <table class="table table-bordered table-hover">
            <thead style="text-align: center; background-color: #629584; color: white">
                <tr>
                <th style="width: 5%;">No</th>
                <th style="width: 20%;">Nama Fasilitas</th>
                <th style="width: 30%;">Deskripsi Fasilitas</th>
                <th style="width: 10%;">OPSI</th>
                </tr>
            </thead>
            <tbody>
                <?php
                $sql = "SELECT * FROM fasilitas_servis";
                $result = $conn->query($sql);
                
                if ($result->num_rows > 0) {
                    $no = 1;
                    while ($row = $result->fetch_assoc()) {
                        echo '<tr>';
                        echo '<td>' . $no++ . '</td>';
                        echo '<td>' . htmlspecialchars($row['nama_fasilitas']) . '</td>';
                        echo '<td>' . htmlspecialchars($row['deskripsi']) . '</td>';
                        echo '<td>';
                        echo '<a href="edit_data_fasilitas.php?id=' . $row['id'] . '" class="btn btn-outline-warning btn-sm">Edit</a> ';
                        echo '<a href="hapus_data_fasilitas.php?id=' . $row['id'] . '" class="btn btn-outline-danger btn-sm" onclick="return confirm(\'Yakin ingin menghapus data ini?\')">Hapus</a>';
                        echo '</td>';
                        echo '</tr>';
                    }
                } else {
                    echo "<tr><td colspan='5'>Tidak ada data fasilitas.</td></tr>";
                }
                ?>
            </tbody>
        </table>
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
    <script src="../js/main.js"></script>
</body>

</html>

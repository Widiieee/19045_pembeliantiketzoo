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

// Existing queries...

// Query to get visitor messages
$sql_messages = "SELECT * FROM pesan ORDER BY tanggal DESC"; // Assuming there's a 'tanggal_kirim' column
$result_messages = $conn->query($sql_messages);
$messages = [];
if ($result_messages) {
    while ($row = $result_messages->fetch_assoc()) {
        $messages[] = $row;
    }
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
            <!-- Existing cards... -->

            <!-- Card for Visitor Messages -->
            <div class="col-md-12 mb-4">
                <div class="card shadow-sm">
                    <div class="card-body">
                        <h5 class="card-title">Pesan Pengunjung</h5>
                        <?php if (count($messages) > 0): ?>
                            <ul class="list-group">
                                <?php foreach ($messages as $message): ?>
                                    <li class="list-group-item">
                                        <strong><?= htmlspecialchars($message['nama_pengirim']) ?>:</strong> <?= htmlspecialchars($message['subjek']) ?>
                                        <br>
                                        <p><?= htmlspecialchars($message['pesan']) ?></p>
                                        <small class="text-muted"><?= $message['tanggal'] ?></small>
                                    </li>
                                <?php endforeach; ?>
                            </ul>
                        <?php else: ?>
                            <p>Tidak ada pesan baru.</p>
                        <?php endif; ?>
                        
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
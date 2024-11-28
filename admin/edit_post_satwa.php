<?php
include '../koneksi/function.php';

// Memeriksa apakah ID disediakan
if (!isset($_GET['id'])) {
    header('Location: admin_postingan_satwa.php');
    exit;
}

$id = $_GET['id'];

// Mengambil data satwa berdasarkan ID
$sql = "SELECT * FROM satwa WHERE id = ?";
$stmt = $conn->prepare($sql);
$stmt->bind_param("i", $id);
$stmt->execute();
$result = $stmt->get_result();

if ($result->num_rows === 0) {
    echo "Data tidak ditemukan.";
    exit;
}

$row = $result->fetch_assoc();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $nama_satwa = $_POST['nama_satwa'];
    $foto_lama = $row['foto'];
    $foto_baru = $_FILES['foto']['name'];
    $target_dir = "../img/";
    $target_file = $target_dir . basename($foto_baru);

    // Menghapus foto lama jika ada foto baru yang diupload
    if (!empty($foto_baru)) {
        // Hapus foto lama dari server
        if (file_exists($target_dir . $foto_lama)) {
            unlink($target_dir . $foto_lama);
        }

        // Upload foto baru
        move_uploaded_file($_FILES['foto']['tmp_name'], $target_file);
        $sql_update = "UPDATE satwa SET nama_satwa = ?, foto = ? WHERE id = ?";
        $stmt_update = $conn->prepare($sql_update);
        $stmt_update->bind_param("ssi", $nama_satwa, $foto_baru, $id);
        $stmt_update->execute();
    } else {
        // Jika tidak ada foto baru, hanya update nama satwa
        $sql_update = "UPDATE satwa SET nama_satwa = ? WHERE id = ?";
        $stmt_update = $conn->prepare($sql_update);
        $stmt_update->bind_param("si", $nama_satwa, $id);
        $stmt_update->execute();
    }

    header('Location: admin_satwa.php');
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
    <link href="../img/favicon.ico" rel="icon">

    <!-- Google Web Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@400;500&family=Quicksand:wght@600;700&display=swap" rel="stylesheet"> 

    <!-- Icon Font Stylesheet -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.1/font /bootstrap-icons.css" rel="stylesheet">

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
    <div class="container mt-3">
        <h2>Edit Post Satwa</h2>
        <form method="post" enctype="multipart/form-data">
            <div class="mb-3">
                <label for="nama_satwa" class="form-label">Nama Satwa</label>
                <input type="text" class="form-control" id="nama_satwa" name="nama_satwa" value="<?php echo htmlspecialchars($row['nama_satwa']); ?>" required>
            </div>
            <div class="mb-3">
                <label for="foto" class="form-label">Foto Satwa</label>
                <input type="file" class="form-control" id="foto" name="foto">
                <small class="form-text text-muted">Foto lama: <img src="../img/<?php echo htmlspecialchars($row['foto']); ?>" alt="Foto Lama" style="width: 100px; height: auto;"></small>
            </div>
            <button type="submit" class="btn btn-primary">Simpan</button>
            <a href="admin_postingan_satwa.php" class="btn btn-secondary">Batal</a>
        </form>
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
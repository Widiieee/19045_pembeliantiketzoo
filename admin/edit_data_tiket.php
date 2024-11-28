<?php
include "../koneksi/function.php";

if (isset($_GET['id_harga']) && is_numeric($_GET['id_harga'])) {
    $id_harga = $_GET['id_harga'];
    $result = mysqli_query($conn, "SELECT * FROM harga_tiket WHERE id_harga='$id_harga'");

    if ($result && mysqli_num_rows($result) > 0) {
        $row = mysqli_fetch_assoc($result);
    } else {
        echo "<script>alert('Data tidak ditemukan!'); window.location.href = 'tiket.php';</script>";
        exit;
    }
} else {
    echo "<script>alert('ID Tiket tidak valid!'); window.location.href = 'tiket.php';</script>";
    exit;
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $nama_tiket = $_POST['nama_tiket'];
    $harga = $_POST['harga'];
    $kategori = $_POST['kategori'];
    $deskripsi = $_POST['deskripsi'];

    $update_query = "UPDATE harga_tiket SET 
                        nama_tiket='$nama_tiket', 
                        harga='$harga', 
                        kategori='$kategori', 
                        deskripsi='$deskripsi' 
                     WHERE id_harga='$id_harga'";

    if (mysqli_query($conn, $update_query)) {
        echo "<script>alert('Data berhasil diperbarui!'); window.location.href = 'tiket.php';</script>";
    } else {
        echo "<script>alert('Gagal memperbarui data: " . mysqli_error($conn) . "');</script>";
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
    <link rel="preconn" href="https://fonts.googleapis.com">
    <link rel="preconn" href="https://fonts.gstatic.com" crossorigin>
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

    <!-- Bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>

<body>
    <?php include 'navbar.php'; ?>
    <div class= "container">
        <form action="" method="post">
            <div class="mb-3">
                <label for="nama_tiket" class="form-label">Nama Tiket</label>
                <input type="text" class="form-control" id="nama_tiket" name="nama_tiket" value="<?php echo htmlspecialchars($row['nama_tiket']); ?>" required>
            </div>
            <div class="mb-3">
                <label for="harga" class="form-label">Harga Tiket</label>
                <input type="number" class="form-control" id="harga" name="harga" value="<?php echo htmlspecialchars($row['harga']); ?>" required>
            </div>
            <div class="mb-3">
                <label for="kategori" class="form-label">Kategori Tiket</label>
                <select class="form-control" name="kategori" aria-label="Default select example" required>
                    <option selected>Pilih kategori untuk tiket</option>
                    <option value="Reguler Senin-Jumat">Reguler Senin-Jumat</option>
                    <option value="Sabtu, Minggu & Hari Libur Nasional">Sabtu, Minggu & Hari Libur Nasional</option>
                    <option value="Hari Libur Lebaran & Libur Sekolah">Hari Libur Lebaran & Libur Sekolah</option>
                </select>
            </div>
            <div class="mb-3">
                <label for="deskripsi" class="form-label">Deskripsi Tiket</label>
                <textarea class="form-control" id="deskripsi" name="deskripsi" rows="3" required><?php echo htmlspecialchars($row['deskripsi']); ?></textarea>
            </div>
            <button type="submit" class="btn btn-primary">Simpan</button>
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

    <!-- Template Javascript -->
    <script src="../js/main.js"></script>

    <!-- Bootstrap -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>

</html>
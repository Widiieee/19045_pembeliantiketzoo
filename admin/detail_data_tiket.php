<?php
include '../koneksi/function.php';

// Pastikan id_harga diterima dari URL
if (isset($_GET['id_harga'])) {
    $id_harga = $_GET['id_harga'];

    // Mengambil data tiket berdasarkan id_harga
    $sql = "SELECT t.*, st.status AS ticket_status FROM tiket t LEFT JOIN status_tiket st ON t.id_tiket = st.id_tiket WHERE t.id_harga = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("i", $id_harga); // Menggunakan parameter integer
    $stmt->execute();
    $result = $stmt->get_result();

    // Cek apakah ada data
    if ($result->num_rows > 0) {
        $ticket = $result->fetch_assoc();
    } else {
        echo "<script>alert('Data tidak ditemukan.'); window.location.href='kelola_pemesanan.php';</script>";
        exit;
    }
} else {
    echo "<script>alert('ID harga tidak valid.'); window.location.href='kelola_pemesanan.php';</script>";
    exit;
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>Detail Tiket - Faunatopia</title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <link href="../css/bootstrap.min.css" rel="stylesheet">
</head>

<body>
    <?php include 'navbar.php'; ?>

    <div class="container mt-5">
        <div class="card shadow-sm bg-body-tertiary rounded">
            <div class="card-header text-center" style="background-color: #629584;">
                <h2 style="color: white;">Detail Tiket</h2>
            </div>
            <div class="card-body">
                <dl class="row">
                    <dt class="col-sm-4">ID Tiket:</dt>
                    <dd class="col-sm-8"><?php echo htmlspecialchars($ticket['id_tiket']); ?></dd>

                    <dt class="col-sm-4">Nama Tiket:</dt>
                    <dd class="col-sm-8"><?php echo htmlspecialchars($ticket['nama_tiket']); ?></dd>

                    <dt class="col-sm-4">Kategori:</dt>
                    <dd class="col-sm-8"><?php echo htmlspecialchars($ticket['kategori']); ?></dd>

                    <dt class="col-sm-4">Harga Tiket:</dt>
                    <dd class="col-sm-8">Rp <?php echo number_format($ticket['harga'], 0, ',', '.'); ?></dd>

                    <dt class="col-sm-4">Nama Pemesan:</dt>
                    <dd class="col-sm-8"><?php echo htmlspecialchars($ticket['nama_pemesan']); ?></dd>

                    <dt class="col-sm-4">Jumlah Tiket:</dt>
                    <dd class="col-sm-8"><?php echo htmlspecialchars($ticket['jumlah_tiket']); ?></dd>

                    <dt class="col-sm-4">Tanggal Kunjungan:</dt>
                    <dd class="col-sm-8"><?php echo htmlspecialchars($ticket['tanggal_kunjungan']); ?></dd>

                    <dt class="col-sm-4">Total Harga:</dt>
                    <dd class="col-sm-8">Rp <?php echo number_format($ticket['total_harga'], 0, ',', '.'); ?></dd>

                    <dt class="col-sm-4">Status:</dt>
                    <dd class="col-sm-8"><?php echo htmlspecialchars($ticket['ticket_status']); ?></dd>
                </dl>
            </div>
            <div class="card-footer text-center">
                <a href="kelola_pemesanan.php" class="btn btn-primary">Kembali</a>
            </div>
        </div>
    </div>

    <?php include 'footer.php'; ?>

    <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
    <script src="../js/bootstrap.bundle.min.js"></script>
</body>

</html>
<?php
include '../koneksi/function.php';

// Memeriksa apakah pengguna adalah admin
$is_admin = true; // Ganti dengan logika yang sesuai untuk memeriksa status admin

// Cek dan update status expired
$current_date = date('Y-m-d'); // Tanggal saat ini
$update_sql = "UPDATE status_tiket st 
               JOIN tiket t ON st.id_tiket = t.id_tiket 
               SET st.status = 'expired' 
               WHERE t.tanggal_kunjungan < '$current_date' AND st.status != 'expired'";
$conn->query($update_sql);
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
    
    <div class="container">
        <div class="card shadow-sm bg-body-tertiary rounded">
            <div class="card-header text-center" style="background-color: #629584;">
                <h2 style="color: white;">Kelola Pemesanan Tiket</h <h2 style="color: white;">Kelola Pemesanan Tiket</h2>
            </div>
            <div class="card-body">
                <div class="mb-3">
                    <form method="GET" action="">
                        <div class="input-group">
                            <input type="text" name="search" class="form-control" placeholder="Cari Nama Pemesan atau ID Tiket" aria-label="Cari">
                            <button class="btn btn-primary" type="submit">Cari</button>
                        </div>
                    </form>
                </div>
                <table class="table table-bordered table-hover">
                    <thead style="text-align: center; background-color: #629584; color: white">
                        <tr>
                            <th>No</th>
                            <th>ID Tiket</th>
                            <th>Nama Tiket</th>
                            <th>Kategori</th>
                            <th>Harga Tiket</th>
                            <th>Nama Pemesan</th>
                            <th>Jumlah Tiket</th>
                            <th>Tanggal Kunjungan</th>
                            <th>Total Harga</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        // Mengambil data tiket dan status
                        $search = isset($_GET['search']) ? $_GET['search'] : '';
                        $sql = "SELECT t.*, st.status AS ticket_status FROM tiket t 
                                LEFT JOIN status_tiket st ON t.id_tiket = st.id_tiket";

                        // Jika ada input pencarian, tambahkan kondisi WHERE
                        if (!empty($search)) {
                            $sql .= " WHERE t.nama_pemesan LIKE '%" . $conn->real_escape_string($search) . "%' OR t.id_tiket LIKE '%" . $conn->real_escape_string($search) . "%'";
                        }

                        $result = $conn->query($sql);
                        
                        if ($result->num_rows > 0) {
                            $no = 1;
                            while ($row = $result->fetch_assoc()) {
                                echo '<tr>';
                                echo '<td>' . $no++ . '</td>';
                                echo '<td>' . htmlspecialchars($row['id_tiket']) . '</td>'; // ID Tiket
                                echo '<td>' . htmlspecialchars($row['nama_tiket']) . '</td>'; // Nama Tiket
                                echo '<td>' . htmlspecialchars($row['kategori']) . '</td>'; // Kategori
                                echo '<td>Rp ' . number_format($row['harga'], 0, ',', '.') . '</td>'; // Harga Tiket
                                echo '<td>' . htmlspecialchars($row['nama_pemesan']) . '</td>'; // Nama Pemesan
                                echo '<td>' . htmlspecialchars($row['jumlah_tiket']) . '</td>'; // Jumlah Tiket
                                echo '<td>' . htmlspecialchars($row['tanggal_kunjungan']) . '</td>'; // Tanggal Kunjungan
                                echo '<td>Rp ' . number_format($row['total_harga'], 0, ',', '.') . '</td>'; // Total Harga
                                echo '<td>';
                                echo '<div class="btn-group" role="group">';

                                // Menambahkan button Detail
                                echo '<a href="detail_data_tiket.php?id_harga=' . $row['id_harga'] . '" class="btn btn-outline-info btn-sm">Detail</a>';

                                if ($row['ticket_status'] == 'booked') {
                                    echo '<a href="edit/ubah_status.php?id_tiket=' . $row['id_tiket'] . '&status=claimed" class="btn btn-outline-success btn-sm" onclick="return confirm(\'Apakah Anda yakin ingin mengubah status tiket ini menjadi diklaim?\')">Klaim</a>';
                                    if ($is_admin) {
                                        echo '<a href="edit/ubah_status.php?id_tiket=' . $row['id_tiket'] . '&status=cancel" class="btn btn-outline-danger btn-sm" onclick="return confirm(\'Apakah Anda yakin ingin membatalkan tiket ini?\')">Batal</a>';
                                    }
                                } elseif ($row['ticket_status'] == 'claimed') {
                                    echo '<button class="btn btn-outline-secondary btn-sm" disabled>Diklaim</button>';
                                } elseif ($row['ticket_status'] == 'cancel') {
                                    echo '<button class="btn btn-outline-danger btn-sm" disabled>Dibatalkan</button>';
                                } elseif ($row['ticket_status'] == 'expired') {
                                    echo '<button class="btn btn-outline-warning btn-sm" disabled>Hangus</button>';
                                }

                                echo '</div>'; // Tutup grup button
                                echo '</td>';
                                echo '</tr>';
                            }
                        } else {
                            echo "<tr><td colspan='10' class='text-center'>Tidak ada data tiket.</td </tr>";
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
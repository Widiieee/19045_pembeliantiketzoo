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
</head>

<body>
    <?php include 'layout/navbar.php'; ?>
    <!-- Header Start -->
    <div class="container-fluid bg-dark p-0 mb-5">
        <div class="row g-0 flex-column-reverse flex-lg-row">
            <div class="col-lg-6 p-0 wow fadeIn" data-wow-delay="0.1s">
                <div class="header-bg h-100 d-flex flex-column justify-content-center p-5">
                    <h1 class="display-4 text-light mb-5">Nikmati Hari Indahmu Bersama Keluarga Tercinta</h1>
                    <div class="d-flex align-items-center pt-4 animated slideInDown">
                        <a href="" class="btn btn-primary py-sm-3 px-3 px-sm-5 me-5">Selengkapnya</a>
                    </div>
                </div>
            </div>
            <div class="col-lg-6 wow fadeIn" data-wow-delay="0.5s">
                <div class="owl-carousel header-carousel">
                    <div class="owl-carousel-item">
                        <img class="img-fluid" src="img/carousel-1.jpg" alt="">
                    </div>
                    <div class="owl-carousel-item">
                        <img class="img-fluid" src="img/carousel-2.jpg" alt="">
                    </div>
                    <div class="owl-carousel-item">
                        <img class="img-fluid" src="img/carousel-3.jpg" alt="">
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Header End -->


    <!-- Video Modal Start -->
    <div class="modal modal-video fade" id="videoModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content rounded-0">
                <div class="modal-header">
                    <h3 class="modal-title" id="exampleModalLabel">Youtube Video</h3>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <!-- 16:9 aspect ratio -->
                    <div class="ratio ratio-16x9">
                        <iframe class="embed-responsive-item" src="" id="video" allowfullscreen allowscriptaccess="always"
                            allow="autoplay"></iframe>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Video Modal End -->


    <!-- About Start -->
    <div class="container-xxl py-5">
        <div class="container">
            <div class="row g-5">
                <div class="col-lg-6 wow fadeInUp" data-wow-delay="0.1s">
                    <p><span class="text-primary me-2">#</span>Selamat Datang di Faunatopia</p>
                    <h1 class="display-5 mb-4">Alasan Kamu Harus Mengunjungi <span class="text-primary">Faunatopia</span></h1>
                    <p class="mb-4"><b>Faunatopia</b> adalah destinasi kebun binatang yang menyenangkan dan edukatif, menawarkan pengalaman seru melalui wahana seperti Petting Zoo dan Panggung Pertunjukan Satwa. Dengan fokus pada pelestarian satwa langka, seperti Harimau Sumatra dan Komodo, pengunjung dapat belajar tentang konservasi sambil menikmati pertunjukan satwa dan berinteraksi dengan hewan-hewan jinak di Petting Zoo. Fasilitas lengkap seperti restoran, area bermain anak, dan toko souvenir menjadikan Faunatopia tempat ideal untuk keluarga. Faunatopia menggabungkan hiburan, edukasi, dan pelestarian alam dalam satu tempat yang menarik.</p>
                    <h5 class="mb-3"><i class="far fa-check-circle text-primary me-3"></i>Are Parkir Luas</h5>
                    <h5 class="mb-3"><i class="far fa-check-circle text-primary me-3"></i>Restoran dan Kafe</h5>
                    <h5 class="mb-3"><i class="far fa-check-circle text-primary me-3"></i>Toilet dan Ruang Istirahat</h5>
                    <h5 class="mb-3"><i class="far fa-check-circle text-primary me-3"></i>Savari Satwa Liar</h5>
                    <a class="btn btn-primary py-3 px-5 mt-3" href="fasilitas.php">Selengkapnya</a>
                </div>
                <div class="col-lg-6 wow fadeInUp" data-wow-delay="0.5s">
                    <div class="img-border">
                        <img class="img-fluid" src="img/about.jpg" alt="">
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- About End -->


    <!-- Facts Start -->
    <div class="container-xxl bg-primary facts my-5 py-5 wow fadeInUp" data-wow-delay="0.1s">
        <div class="container py-5">
            <div class="row g-4">
                <div class="col-md-6 col-lg-4 text-center wow fadeIn" data-wow-delay="0.1s">
                    <i class="fa fa-paw fa-3x text-primary mb-3"></i>
                    <h1 class="text-white mb-2" data-toggle="counter-up">12096</h1>
                    <p class="text-white mb-0">Total Satwa</p>
                </div>
                <div class="col-md-6 col-lg-4 text-center wow fadeIn" data-wow-delay="0.3s">
                    <i class="fa fa-users fa-3x text-primary mb-3"></i>
                    <h1 class="text-white mb-2" data-toggle="counter-up">20587</h1>
                    <p class="text-white mb-0">Pengunjung Harian</p>
                </div>
                <div class="col-md-6 col-lg-4 text-center wow fadeIn" data-wow-delay="0.5s">
                    <i class="fa fa-certificate fa-3x text-primary mb-3"></i>
                    <h1 class="text-white mb-2" data-toggle="counter-up">11987</h1>
                    <p class="text-white mb-0">Total Member</p>
                </div>
            </div>
        </div>
    </div>
    <!-- Facts End -->


    <!-- Service Start -->
    <div class="container-xxl py-5">
        <div class="container">
            <div class="row g-5 mb-5 wow fadeInUp" data-wow-delay="0.1s">
                <div class="col-lg-6">
                    <p><span class="text-primary me-2">#</span>Fasilitas dan Servis Kami</p>
                    <h1 class="display-5 mb-0">Fasilitas dan Servis Spesial Untuk Pengunjung <span class="text-primary">Faunatopia</span></h1>
                </div>
                <div class="col-lg-6">
                    <div class="bg-primary h-100 d-flex align-items-center py-4 px-4 px-sm-5">
                        <i class="fa fa-3x fa-mobile-alt text-white"></i>
                        <div class="ms-4">
                            <p class="text-white mb-0">Hubungi kami untuk informasi lebih lanjut</p>
                            <h2 class="text-white mb-0">+62 844 7668 9823</h2>
                        </div>
                    </div>
                </div>
            </div>
            <?php
            include 'koneksi/function.php';
            // Query to fetch data from the fasilitas_servis table
            $sql = "SELECT nama_fasilitas, deskripsi FROM fasilitas_servis";
            $result = $conn->query($sql);

            // Check if there are results
            if ($result->num_rows > 0) {
                echo '<div class="row gy-5 gx-4">';
                
                // Output data of each row
                while($row = $result->fetch_assoc()) {
                    echo '<div class="col-lg-3 col-md-4 col-sm-6 wow fadeInUp" data-wow-delay="0.1s">';
                    echo '<h5 class="mb-3">' . htmlspecialchars($row['nama_fasilitas']) . '</h5>';
                    echo '<span>' . htmlspecialchars($row['deskripsi']) . '</span>';
                    echo '</div>';
                }
                
                echo '</div>';
            } else {
                echo "0 results";
            }

            // Close connection
            $conn->close();
            ?>
        </div>
    </div>
    <!-- Service End -->


    <!-- Visiting Hours Start -->
    <div class="container-xxl bg-primary visiting-hours my-5 py-5 wow fadeInUp" data-wow-delay="0.1s">
        <div class="container py-5">
            <div class="row g-5">
                <div class="col-md-6 wow fadeIn" data-wow-delay="0.3s">
                    <h1 class="display-6 text-white mb-5">Jam berkunjung</h1>
                    <ul class="list-group list-group-flush">
                        <li class="list-group-item">
                            <span>Senin-Jumat</span>
                            <span>08.00-16.30 WIB</span>
                        </li>
                        <li class="list-group-item">
                            <span>Sabtu & Minggu</span>
                            <span>07.00-16.00 WIB</span>
                        </li>
                        <li class="list-group-item">
                            <span>Hari Libur Lebaran & Sekolah</span>
                            <span>07.30-16.00 WIB</span>
                        </li>
                    </ul>
                </div>
                <div class="col-md-6 text-light wow fadeIn" data-wow-delay="0.5s">
                    <h1 class="display-6 text-white mb-5">Info Kontak</h1>
                    <table class="table">
                        <tbody>
                            <tr>
                                <td>Faunatopia</td>
                                <td>Banjarnegara, Jawa Tengah</td>
                            </tr>
                            <tr>
                                <td>Telepon</td>
                                <td>+62 766 4137 8531</td>
                            </tr>
                            <tr>
                                <td>YouTube</td>
                                <td>faunatopia_official</td>
                            </tr>
                            <tr>
                                <td>Instagram</td>
                                <td>@faunatopia</td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
    <!-- Visiting Hours End -->
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
</body>

</html>
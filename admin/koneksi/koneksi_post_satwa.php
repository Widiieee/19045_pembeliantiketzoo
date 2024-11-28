<?php 
include '../../koneksi/function.php';

$nama_satwa = $_POST['nama_satwa'];

$rand = rand();
$ekstensi = array('png','jpg','jpeg','gif');
$filename = $_FILES['foto']['name']; // Pastikan ini sesuai dengan nama input di form
$ukuran = $_FILES['foto']['size']; // Pastikan ini sesuai dengan nama input di form
$ext = strtolower(pathinfo($filename, PATHINFO_EXTENSION));

// Debug: Cek nama file dan ekstensi yang diterima
error_log("Nama file: $filename");
error_log("Ekstensi file: $ext");

if (empty($ext)) {
    header("location:../admin_satwa.php?alert=gagal_ekstensi&ext=empty"); // Jika ekstensi kosong
    exit; // Pastikan untuk keluar setelah header
} elseif (!in_array($ext, $ekstensi)) {
    header("location:../admin_satwa.php?alert=gagal_ekstensi&ext=$ext"); // Tambahkan parameter untuk debugging
    exit; // Pastikan untuk keluar setelah header
}

// Fungsi untuk mengkompres gambar
function compressImage($source, $destination, $quality) {
    $info = getimagesize($source);
    if ($info['mime'] == 'image/jpeg') {
        $image = imagecreatefromjpeg($source);
        imagejpeg($image, $destination, $quality);
    } elseif ($info['mime'] == 'image/png') {
        $image = imagecreatefrompng($source);
        imagepng($image, $destination, floor($quality / 10));
    } elseif ($info['mime'] == 'image/gif') {
        $image = imagecreatefromgif($source);
        imagegif($image, $destination);
    }
    return $destination;
}

if ($ukuran < 1044070) { 
    $xx = $rand . '_' . $filename;
    move_uploaded_file($_FILES['foto']['tmp_name'], '../../img/' . $xx); // Pastikan ini sesuai dengan nama input di form
    mysqli_query($conn, "INSERT INTO satwa VALUES(NULL,'$nama_satwa','$xx')");
    header("location:../admin_satwa.php?alert=berhasil");
} else {  
    // Nama file baru untuk gambar yang sudah dikompres
    $compressedFile = '../../img/' . $rand . '_' . $filename;

    // Kompres gambar (menggunakan kualitas 70%)
    compressImage($_FILES['foto']['tmp_name'], $compressedFile, 70);

    // Simpan gambar yang sudah dikompres ke database
    $xx = $rand . '_' . $filename;
    mysqli_query($conn, "INSERT INTO satwa VALUES(NULL,'$nama_satwa','$xx')");
    header("location:../admin_satwa.php?alert=berhasil");
}
?>
<?php
// Koneksi ke database
include 'function.php';
// Ambil data dari form
$nama_pengirim = $_POST['nama_pengirim'];
$email = $_POST['email'];
$subjek = $_POST['subjek'];
$pesan = $_POST['pesan'];

// Siapkan dan bind
$stmt = $conn->prepare("INSERT INTO pesan (nama_pengirim, email, subjek, pesan) VALUES (?, ?, ?, ?)");
$stmt->bind_param("ssss", $nama_pengirim, $email, $subjek, $pesan);

//Eksekusi statement
if ($stmt->execute()) {
    // Jika berhasil, redirect dengan alert
    echo "<script>
            alert('Pesan berhasil dikirim!');
            window.location.href = '../kontak.php'; 
          </script>";
} else {
    // Jika gagal, redirect dengan alert
    echo "<script>
            alert('Error: " . $stmt->error . "');
            window.location.href = '../kontak.php';
          </script>";
}

// Tutup koneksi
$stmt->close();
$conn->close();
?>
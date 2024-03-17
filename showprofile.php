<?php
// Koneksi ke database
session_start();
include "koneksi.php";

// Mengecek apakah ada session user yang aktif
if(!isset($_SESSION['user'])) {
    header('location:login.php');
    exit(); // Menghentikan eksekusi kode selanjutnya jika tidak ada sesi pengguna yang aktif
}

// Mendapatkan ID pengguna yang sedang login dari sesi
$id_user = $_SESSION['user']['id_user'];

// Query untuk mengambil data profil pengguna yang sedang login
$query = "SELECT major, fullname, username, email FROM user WHERE id_user = $id_user";

// Eksekusi query
$result = mysqli_query($koneksi, $query);

// Periksa apakah ada data yang ditemukan
if (mysqli_num_rows($result) > 0) {
    // Menampilkan data profil pengguna
    $row = mysqli_fetch_assoc($result);
    echo "<p><strong>Major:</strong> " . $row["major"] . "</p>";
    echo "<p><strong>Fullname:</strong> " . $row["fullname"] . "</p>";
    echo "<p><strong>Username:</strong> " . $row["username"] . "</p>";
    echo "<p><strong>Email:</strong> " . $row["email"] . "</p>";
} else {
    echo "Profil pengguna tidak ditemukan.";
}

// Tutup koneksi
mysqli_close($koneksi);
?>

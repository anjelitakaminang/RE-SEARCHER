<?php
include 'koneksi.php'; // Mengambil file koneksi.php

// Query untuk mengambil data pengguna dari database (misalnya tabel users)
$sql = "SELECT * FROM users WHERE id = 1"; // Mengganti 1 dengan ID pengguna yang diinginkan
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    // Output data dari setiap baris
    $row = $result->fetch_assoc();
    echo json_encode($row); // Mengembalikan data sebagai JSON
} else {
    echo "0 results";
}
$conn->close();
?>

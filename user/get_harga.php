<?php
// Koneksi ke database
$conn = new mysqli('localhost', 'root', '', 'dasprog');

// Cek koneksi
if ($conn->connect_error) {
    die("Koneksi gagal: " . $conn->connect_error);
}

if (isset($_GET['nama'])) {
    $nama_barang = $_GET['nama'];

    // Ambil harga barang berdasarkan nama
    $sql = "SELECT harga FROM barang WHERE nama = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("s", $nama_barang);
    $stmt->execute();
    $stmt->bind_result($harga);
    $stmt->fetch();

    echo $harga;

    $stmt->close();
}

$conn->close();
?>


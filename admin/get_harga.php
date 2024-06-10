<?php
// Koneksi ke database
$conn = new mysqli('localhost', 'root', '', 'dasprog');

// Cek koneksi
if ($conn->connect_error) {
    die("Koneksi gagal: " . $conn->connect_error);
}

if (isset($_GET['id'])) {
    $id_barang = $_GET['id'];

    // Ambil harga barang berdasarkan id
    $sql = "SELECT harga FROM barang WHERE id = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("i", $id_barang);
    $stmt->execute();
    $stmt->bind_result($harga);
    $stmt->fetch();

    echo $harga;

    $stmt->close();
}

$conn->close();
?>
<?php
include("koneksi.php");

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $id_pemesanan = $_POST['id_pemesanan'];
    $username = $_POST['username'];
    $nama_barang = $_POST['nama_barang'];
    $harga = $_POST['harga'];
    $jumlah_barang = $_POST['jumlah_barang'];
    $total_harga = $harga * $jumlah_barang; // Menghitung total harga
    $alamat = $_POST['alamat'];
    $metode_transaksi = $_POST['metode_transaksi'];
    $tanggal_pemesanan = $_POST['tanggal_pemesanan'];

    // Validasi input di sisi server (tambahkan validasi lain jika diperlukan)

    // Menggunakan prepared statement untuk update
    $query = "UPDATE pemesanan SET username=?, nama_barang=?, harga=?, jumlah_barang=?, total_harga=?, alamat=?, metode_transaksi=?, tanggal_pemesanan=? WHERE id_pemesanan=?";
    if ($stmt = $mysqli->prepare($query)) {
        $stmt->bind_param('ssiiisssi', $username, $nama_barang, $harga, $jumlah_barang, $total_harga, $alamat, $metode_transaksi, $tanggal_pemesanan, $id_pemesanan);
        if ($stmt->execute()) {
            // Jika update berhasil
            header('Location: transaksi.php?pesan=sukses');
        } else {
            // Jika update gagal
            echo "Error: " . $stmt->error;
        }
        $stmt->close();
    } else {
        echo "Error: " . $mysqli->error;
    }
} else {
    header('Location: transaksi.php');
    exit();
}
?>



<?php

include_once("koneksi.php");

// Mendapatkan nilai id_pemesanan dari URL
$id_pemesanan = $_GET['id'];

// Menghapus data dari tabel pemesanan berdasarkan id_pemesanan
$result = mysqli_query($mysqli, "DELETE FROM pemesanan WHERE id_pemesanan = '$id_pemesanan'");

if ($result) {
    // Jika penghapusan berhasil, arahkan kembali ke halaman transaksi
    header("Location: transaksi.php");
} else {
    // Jika terjadi kesalahan, tampilkan pesan error
    echo "Terjadi kesalahan: " . mysqli_error($mysqli);
}

?>

<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Koneksi ke database
    $conn = new mysqli('localhost', 'root', '', 'dasprog');

    // Cek koneksi
    if ($conn->connect_error) {
        die("Koneksi gagal: " . $conn->connect_error);
    }

    $username = $_POST['username'];
    $id_barang = $_POST['id_barang'];
    $harga = $_POST['harga_barang'];
    $jumlah_barang = $_POST['jumlah_barang'];
    $total_harga = $_POST['total_harga'];
    $alamat = $_POST['alamat'];
    $metode_transaksi = $_POST['metode_transaksi'];
    $tanggal_pemesanan = $_POST['tanggal_pemesanan'];

    // Ambil id_user berdasarkan username
    $sql = "SELECT id FROM user WHERE username = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("s", $username);
    $stmt->execute();
    $stmt->bind_result($id_user);
    $stmt->fetch();
    $stmt->close();

    if ($id_user) {
        // Insert data ke tabel pemesanan
        $sql = "INSERT INTO pemesanan (id_user, id_barang, harga, jumlah_barang, total_harga, alamat, metode_transaksi, tanggal_pemesanan) VALUES (?, ?, ?, ?, ?, ?, ?, ?)";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("iiidssss", $id_user, $id_barang, $harga, $jumlah_barang, $total_harga, $alamat, $metode_transaksi, $tanggal_pemesanan);

        if ($stmt->execute()) {
            // Transaksi berhasil, tampilkan pop-up dan redirect
            echo "<script>
                    alert('Data sudah di tambahkan');
                    window.location.href = 'transaksi.php';
                  </script>";
        } else {
            echo "Terjadi kesalahan: " . $stmt->error;
        }

        $stmt->close();
    } else {
        echo "<script>alert('Username tidak ditemukan!'); window.history.back();</script>";
    }

    $conn->close();
}
?>



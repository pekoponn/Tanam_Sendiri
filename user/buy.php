<?php
session_start();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Koneksi ke database
    $conn = new mysqli('localhost', 'root', '', 'dasprog');

    // Cek koneksi
    if ($conn->connect_error) {
        die("Koneksi gagal: " . $conn->connect_error);
    }

    // Ambil username dari sesi login
    if (isset($_SESSION['username'])) {
        $username = $_SESSION['username'];
    } else {
        // Jika tidak ada sesi login, arahkan ke halaman login atau tampilkan pesan error
        echo "Anda harus login terlebih dahulu.";
        exit();
    }

    // Ambil data dari form
    $nama_barang = $_POST['nama_barang'];  // Nama barang yang dipilih
    $jumlah_barang = $_POST['jumlah_barang'];
    $harga_barang = $_POST['harga_barang']; // Harga barang sudah diambil dari form
    $total_harga = $_POST['total_harga'];
    $alamat = $_POST['alamat'];
    $metode_transaksi = $_POST['metode_transaksi'];
    $tanggal_pemesanan = date("Y-m-d"); // Tanggal pemesanan otomatis

    // Cek apakah username ada di tabel user
    $sql_user = "SELECT username FROM user WHERE username = ?";
    $stmt_user = $conn->prepare($sql_user);
    $stmt_user->bind_param("s", $username);
    $stmt_user->execute();
    $stmt_user->bind_result($valid_username);
    $stmt_user->fetch();
    $stmt_user->close();

    if ($valid_username) {
        // Ambil stok barang saat ini
        $sql_stok = "SELECT stok FROM barang WHERE nama = ?";
        $stmt_stok = $conn->prepare($sql_stok);
        $stmt_stok->bind_param("s", $nama_barang);
        $stmt_stok->execute();
        $stmt_stok->bind_result($stok_sekarang);
        $stmt_stok->fetch();
        $stmt_stok->close();

        if ($stok_sekarang >= $jumlah_barang) {
            // Insert data ke tabel pemesanan
            $sql_insert = "INSERT INTO pemesanan (username, nama_barang, harga, jumlah_barang, total_harga, alamat, metode_transaksi, tanggal_pemesanan) VALUES (?, ?, ?, ?, ?, ?, ?, ?)";
            $stmt_insert = $conn->prepare($sql_insert);
            $stmt_insert->bind_param("ssdiisss", $username, $nama_barang, $harga_barang, $jumlah_barang, $total_harga, $alamat, $metode_transaksi, $tanggal_pemesanan);
            if ($stmt_insert->execute()) {
                // Kurangi stok barang
                $stok_baru = $stok_sekarang - $jumlah_barang;
                $sql_update_stok = "UPDATE barang SET stok = ? WHERE nama = ?";
                $stmt_update_stok = $conn->prepare($sql_update_stok);
                $stmt_update_stok->bind_param("is", $stok_baru, $nama_barang);
                $stmt_update_stok->execute();

                // Jika berhasil, simpan juga di file JSON (opsional)
                $data = [
                    'username' => $username,
                    'jumlah_barang' => $jumlah_barang,
                    'nama_barang' => $nama_barang,
                    'harga_barang' => $harga_barang,
                    'total_harga' => $total_harga,
                    'alamat' => $alamat,
                    'metode_transaksi' => $metode_transaksi,
                    'tanggal_pemesanan' => $tanggal_pemesanan,
                ];

                $file = 'riwayat_pemesanan.json';
                $riwayat_pemesanan = [];

                if (file_exists($file)) {
                    $riwayat_pemesanan = json_decode(file_get_contents($file), true);
                }

                $riwayat_pemesanan[] = $data;
                file_put_contents($file, json_encode($riwayat_pemesanan));

                // Alihkan ke halaman riwayat pembelian dengan pesan sukses
                header('Location: riwayat_pemesanan.php?status=sukses');
                exit();
            } else {
                echo "Gagal melakukan pemesanan.";
            }
        } else {
            echo "Stok barang tidak mencukupi.";
        }
    } else {
        echo "Username tidak valid.";
    }

    $conn->close();
}
?>

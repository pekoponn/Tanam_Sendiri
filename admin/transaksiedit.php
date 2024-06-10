<?php
include("koneksi.php");

// Pastikan ada parameter id yang diterima dari URL
if (!isset($_GET['id'])) {
    header('Location: transaksi.php');
    exit();
}
$id = $_GET['id'];

// Ambil data pemesanan berdasarkan id
$query = "SELECT * FROM pemesanan WHERE id_pemesanan=?";
$stmt = $mysqli->prepare($query);
$stmt->bind_param('i', $id);
$stmt->execute();
$result = $stmt->get_result();

// Periksa apakah data ditemukan
if ($result->num_rows > 0) {
    $row = $result->fetch_assoc();
    $id_pemesanan = $row['id_pemesanan'];
    $username = $row['username'];
    $nama_barang = $row['nama_barang'];
    $harga = $row['harga'];
    $jumlah_barang = $row['jumlah_barang'];
    $total_harga = $row['total_harga'];
    $alamat = $row['alamat'];
    $metode_transaksi = $row['metode_transaksi'];
    $tanggal_pemesanan = $row['tanggal_pemesanan'];
} else {
    // Jika data tidak ditemukan, redirect ke halaman transaksi.php
    header('Location: transaksi.php');
    exit();
}
$stmt->close();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Pemesanan</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f0f0f0;
            margin: 0;
            padding: 0;
            margin-top: 140px;
        }

        form {
            max-width: 400px;
            margin: 50px auto;
            background-color: #fff;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        form div {
            margin-bottom: 20px;
        }

        label {
            font-weight: bold;
            color: #333;
        }

        input[type="text"],
        input[type="number"],
        select {
            width: 100%;
            padding: 10px;
            border: 1px solid #ccc;
            border-radius: 4px;
            box-sizing: border-box;
        }

        select {
            appearance: none;
            -webkit-appearance: none;
            -moz-appearance: none;
            background-image: url('data:image/svg+xml;utf8,<svg fill="rgba(0,0,0,0)" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" width="24" height="24"><path d="M7 10l5 5 5-5H7z"/></svg>');
            background-repeat: no-repeat;
            background-position-x: calc(100% - 10px);
            background-position-y: center;
        }

        input[type="submit"] {
            background-color: #4caf50;
            color: #fff;
            border: none;
            padding: 10px 20px;
            cursor: pointer;
            border-radius: 4px;
        }

        input[type="submit"]:hover {
            background-color: #45a049;
        }
    </style>
</head>
<body>
    <form action="transaksiedit2.php" method="post">
        <div>
            <label>No</label> <br>
            <input name="id_pemesanan" type="text" value="<?php echo $id_pemesanan; ?>" readonly>
        </div>
        <div>
            <label>Username</label> <br>
            <input name="username" type="text" value="<?php echo $username; ?>">
        </div>
        <div>
            <label>Nama_barang</label> <br>
            <input name="nama_barang" type="text" value="<?php echo $nama_barang; ?>">
        </div>
        <div>
            <label>Harga</label> <br>
            <input name="harga" type="text" value="<?php echo $harga; ?>">
        </div>
        <div>
            <label>Jumlah Barang</label> <br>
            <input name="jumlah_barang" type="number" value="<?php echo $jumlah_barang; ?>">
        </div>
        <div>
            <label>Total Harga</label> <br>
            <input name="total_harga" type="text" value="<?php echo $total_harga; ?>">
        </div>
        <div>
            <label>Alamat</label> <br>
            <input name="alamat" type="text" value="<?php echo $alamat; ?>">
        </div>
        <div>
            <label>Metode Transaksi</label> <br>
            <select name="metode_transaksi">
                <option value="Cash" <?php if ($metode_transaksi == 'Cash') echo 'selected'; ?>>Cash</option>
                <option value="Debit" <?php if ($metode_transaksi == 'Debit') echo 'selected'; ?>>Debit</option>
                <option value="Credit" <?php if ($metode_transaksi == 'Credit') echo 'selected'; ?>>Credit</option>
            </select>
        </div>
        <div>
            <label>Tanggal Pemesanan</label> <br>
            <input name="tanggal_pemesanan" type="date" value="<?php echo $tanggal_pemesanan; ?>">
        </div>
        <div>
            <input type="hidden" name="id" value="<?php echo $id_pemesanan; ?>">
            <input type="submit" name="Simpan" value="Simpan">
        </div>
    </form>
</body>
</html>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Page - Transaksi</title>
    <link rel="stylesheet" href="style.css">
    <style>
        tr td a {
            text-decoration: none;
        }

        footer {
            text-align: center;
            margin-top: 50px;
        }
    </style>
</head>
<body>
    <header>
        <h1>Admin Panel</h1>
    </header>
    
    <nav>
        <ul>
            <li><a href="index.php">Dashboard</a></li>
            <li><a href="produk.php">Produk</a></li>
            <li><a href="index2.php">Users</a></li>
            <li><a href="Transaksi.php">Transaksi</a></li>
            <li><a href="artikel.php">Artikel Tips Menanam</a></li>
            <li><a href="komentar.php">Komentar</a></li>
            <li><a href="artikel_ide_tanaman.php">Artikel ide Tanaman</a></li>
        </ul>
    </nav>
    
    <main>
        <table border='1'>
            <tr>
                <td>no</td>
                <td>username</td> <!-- Ubah sesuai dengan kolom yang sesuai -->
                <td>nama_barang</td> <!-- Ubah sesuai dengan kolom yang sesuai -->
                <td>harga</td>
                <td>jumlah_barang</td>
                <td>total_harga</td>
                <td>alamat</td>
                <td>metode_transaksi</td>
                <td>tanggal_pemesanan</td>
                <td>Edit</td>
                <td>Delete</td>
            </tr>
            
            <?php 
            include "koneksi.php";
            $query_mysql = mysqli_query($mysqli, "SELECT * FROM pemesanan") or die(mysqli_error($mysqli));
            $nomor = 1;
            while($data = mysqli_fetch_array($query_mysql)){
            ?>
            <tr>
                <td><?php echo $data['id_pemesanan']; ?></td>
                <td><?php echo $data['username']; ?></td> <!-- Sesuaikan dengan nama kolom yang benar -->
                <td><?php echo $data['nama_barang']; ?></td> <!-- Sesuaikan dengan nama kolom yang benar -->
                <td><?php echo $data['harga']; ?></td>
                <td><?php echo $data['jumlah_barang']; ?></td>
                <td><?php echo $data['total_harga']; ?></td>
                <td><?php echo $data['alamat']; ?></td>
                <td><?php echo $data['metode_transaksi']; ?></td>
                <td><?php echo $data['tanggal_pemesanan']; ?></td>
                <td><a class="edit" href='transaksiedit.php?id=<?php echo $data['id_pemesanan'];?>'>Edit</a></td>
                <td><a class="delete" href='transaksidelete.php?id=<?php echo $data['id_pemesanan'];?>'>Delete</a></td>
            </tr>
            <?php } ?>
        </table>

        <div>
            <a href="tambahtransaksi.php">Tambah Data</a>
        </div>
    </main>

    <footer>
        <p>Hak Cipta &copy; 2024 Admin Page.</p>
    </footer>

    <script src="scripts.js"></script>
</body>
</html>


<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Halaman Admin - Artikel</title>
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
            <li><a href="transaksi.php">Transaksi</a></li>
            <li><a href="artikel.php">Artikel Tips Menanam</a></li>
            <li><a href="komentar.php">Komentar</a></li>
            <li><a href="artikel_ide_tanaman.php">Artikel ide Tanaman</a></li>
        </ul>
    </nav>
    
    <main>
        <table border='1'>
            <tr>
                <th>No</th>
                <th>Judul</th>
                <th>Konten</th>
                <th>Tanggal</th>
                <th>Edit</th>
                <th>Delete</th>
            </tr>
            
            <?php 
            include "koneksi.php";
            $query_mysql = mysqli_query($mysqli, "SELECT * FROM artikel") or die(mysqli_error($mysqli));
            while($data = mysqli_fetch_array($query_mysql)){
            ?>
            <tr>
                <td><?php echo $data['id']; ?></td>
                <td><?php echo htmlspecialchars($data['judul']); ?></td>
                <td><?php echo htmlspecialchars(substr($data['konten'], 0, 100)); ?>...</td>
                <td><?php echo $data['tanggal']; ?></td>
                <td><a class="edit" href='artikel_edit.php?id=<?php echo $data['id']; ?>'>Edit</a></td>
                <td><a class="delete" href='artikel_delete.php?id=<?php echo $data['id']; ?>'>Delete</a></td>
            </tr>
            <?php } ?>
        </table>

        <div>
            <a href="tambah_artikel.php">Tambah Data</a>
        </div>
    </main>

    <footer>
        <p>Hak Cipta &copy; 2024 Halaman Admin.</p>
    </footer>

    <script src="scripts.js"></script>
</body>
</html>

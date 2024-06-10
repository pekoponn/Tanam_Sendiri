<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Page</title>
    <link rel="stylesheet" href="style.css">
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
    <tr >
        <td>no</td>
        <td>judul</td>
        <td>konten</td>
        <td>tanggal</td>
        <td>aksi</td>
    </tr>
    <div>
    <a href="artikeltambah.php">Tambah Artikel</a>
</div>
    <?php 
include "koneksi.php";
$query_mysql = mysqli_query($mysqli,"SELECT * FROM artikel_ide_tanaman")or die(mysqli_error());
while($data = mysqli_fetch_array($query_mysql)){
?>
<tr>
    <td><?php echo $data['id']; ?></td>
    <td><?php echo $data['judul']; ?></td>
    <td><?php echo $data['konten']; ?></td>
    <td><?php echo $data['tanggal']; ?></td>
    <td>
        <a class="edit" href='artikel_ide_tanaman_update.php?id=<?php echo $data['id'];?>'>Edit</a>
        <a class="delete" href='artikel_ide_tanaman_delete.php?id=<?php echo $data['id'];?>'>Delete</a>
    </td>
</tr>
<?php } ?>
</table>
    </main>

    <footer>
        <p>Hak Cipta &copy; 2024 Admin Page.</p>
    </footer>

    <script src="scripts.js"></script>
</body>
<style>
    tr td a {
        text-decoration: none;
    }

    footer {
        text-align: center;
        margin-top: 50px;
    }
</style>
</html>

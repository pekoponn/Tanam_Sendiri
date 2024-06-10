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
            <li><a href="transaksi.php">Transaksi</a></li>
            <li><a href="artikel.php">Artikel Tips Menanam</a></li>
            <li><a href="komentar.php">Komentar</a></li>
            <li><a href="artikel_ide_tanaman.php">Artikel ide Tanaman</a></li>
        </ul>
    </nav>
    <main>
    <table border='1'>
    <tr >
        <td>no</td>
        <td>nama</td>
        <td>username</td>
        <td>password</td>
        <td>level</td>
        <td>email</td>
    </tr>
    <div>
    <a href="tambah.php">Tambah Data</a>
</div>
    <?php 
include "koneksi.php";
$query_mysql = mysqli_query($mysqli,"SELECT * FROM user")or die(mysqli_error());
$nomor = 1;
while($data = mysqli_fetch_array($query_mysql)){
?>
<tr>
    <td><?php echo $data['id']; ?></td>
    <td><?php echo $data['nama']; ?></td>
    <td><?php echo $data['username']; ?></td>
    <td><?php echo $data['password']; ?></td>
    <td><?php echo $data['level']; ?></td>
    <td><?php echo $data['email']; ?></td>
    <td ><a class="edit" href='edit.php?id=<?php echo $data['id'];?>'>Edit</a></td>
    <td ><a class="delete" href='delete.php?id=<?php echo $data['id'];?>'>Delete</a></td>

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
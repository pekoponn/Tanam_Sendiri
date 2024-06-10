<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Page</title>
    
</head>
<body>
    <header>
        <h1>Admin Panel</h1>
    </header>
    
    <nav>
        <ul>
            <li><a href="#">Dashboard</a></li>
            <li><a href="produk.php">Produk</a></li>
            <li><a href="index2.php">Users</a></li>
            <li><a href="transaksi.php">Transaksi</a></li>
            <li><a href="artikel.php">Artikel Tips Menanam</a></li>
            <li><a href="komentar.php">Komentar</a></li>
            <li><a href="artikel_ide_tanaman.php">Artikel ide Tanaman</a></li>
        </ul>
    </nav>

    <main>
        <section>
            <h2>Dashboard</h2>
            <p>Selamat datang di Dashboard Admin.</p>
        </section>
    </main>

    <footer>
        <p>Hak Cipta &copy; 2024 Admin Page.</p>
    </footer>

    <script src="scripts.js"></script>
</body>
<style>
    /* Reset style */
* {
    margin: 0;
    padding: 0;
    font-family: 'Times New Roman', Times, serif;
}

body {
    font-family: Arial, sans-serif;
    background-color: #f0f7f4; /* Warna latar belakang */
    color: #333; /* Warna teks */
}

header {
    background-color: #333; /* Warna header */
    padding: 20px;
    color: #fff; /* Warna teks header */
    text-align: center;
}

nav ul {
    list-style-type: none;
    padding: 10px;
    background-color: #f4f4f4;
    overflow: hidden;
}

nav ul li {
    float: left;
}

nav ul li a {
    display: block;
    padding: 10px 20px;
    color: #333;
    text-decoration: none;
}

nav ul li a:hover {
    background-color: #ddd;
}

main {
    padding: 20px;
}

section {
    background-color: #ddd; /* Warna latar konten */
    padding: 20px;
    margin-bottom: 20px;
}

footer {
    text-align: center;
    margin-top: 50px;
}
</style>
</html>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Quicksand:wght@500&family=Roboto:wght@300&display=swap" rel="stylesheet">
    <title>Riwayat Pembelian</title>
    <script>
        function logout() {
            alert("Akun anda sudah terlogout");
            window.location.href = "../index.php";
        }
    </script>
    <style>
        body {
            font-family: 'Quicksand', sans-serif;
            font-family: 'Roboto', sans-serif;
            scroll-behavior: smooth;
            background-color: #f4f4f4;
            margin: 0;
            display: flex;
            flex-direction: column;
            min-height: 100vh;
        }

        .main {
            width: 100%;
            background-color: #577D86;
            background-size: cover;
            background-position: center;
            flex: 1;
            padding-bottom: 100px; /* Add padding to the bottom to avoid footer overlap */
        }

        .navbar {
            width: 85%;
            margin: auto;
            padding: 35px 0;
            display: flex;
            align-items: center;
            justify-content: space-between;
        }

        .logo {
            font-size: 36px;
            color: white;
            font-weight: bold;
            width: 120px;
            cursor: pointer;
        }

        .navbar ul li {
            list-style: none;
            display: inline-block;
            margin: 0 20px;
            position: relative;
        }

        .navbar ul li a {
            color: white;
            text-transform: uppercase;
            text-decoration: none;
        }

        .navbar ul li::after {
            content: '';
            height: 3px;
            width: 0;
            background: white;
            position: absolute;
            left: 0;
            bottom: -10px;
            transition: 0.5s;
        }

        .navbar ul li:hover::after {
            width: 100%;
        }

        .container {
            max-width: 600px;
            margin: 0 auto;
            background-color: #fff;
            padding: 20px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            border-radius: 8px;
            margin-top: 20px;
        }

        .message {
            background-color: #dff0d8;
            color: #3c763d;
            padding: 10px;
            border-radius: 4px;
            margin-bottom: 20px;
        }

        .riwayat-item {
            border-bottom: 1px solid #ccc;
            padding: 10px 0;
        }

        .riwayat-item:last-child {
            border-bottom: none;
        }

        .riwayat-item h2 {
            margin: 0 0 10px;
            font-size: 18px;
        }

        .riwayat-item p {
            margin: 5px 0;
        }

        .back-button {
            background-color: #577D86;
            color: #fff;
            padding: 10px 15px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            text-align: center;
            display: inline-block;
            margin-top: 20px;
        }

        .footer1 {
            background-color: #333; 
            color: #fff;
            padding: 50px 0;
        }

        .footer-content {
            display: flex;
            flex-wrap: wrap;
            justify-content: space-between;
            margin-left: 40px;
        }

        .footer-section {
            flex: 1;
            margin-right: 20px;
        }

        .footer-section h2 {
            color: #00d48aea; 
        }

        .footer-section ul {
            list-style: none;
            padding: 0;
        }

        .footer-section a {
            color: #fff;
            text-decoration: none;
        }

        .footer-bottom {
            margin-top: 20px;
            border-top: 1px solid #555; /* Abumuda */
            padding-top: 20px;
            text-align: center;
        }
    </style>
</head>
<body>
    <div class="main">
        <div class="navbar">
            <label class="logo">Tanam Sendiri</label>
            <ul>
                <li><a href="index.php">Home</a></li>
                <li><a href="index3.php">Ide Tanaman</a></li>
                <li><a href="index2.php">Tips Bertani</a></li>
                <li><a href="index4.php">Toko</a></li>
                <li><a href="riwayat_pemesanan.php">Riwayat</a></li>
                <li><a href="../index.php" onclick="logout()">Log out</a></li>
            </ul>
        </div>
        <div class="container">
        <?php if (isset($_GET['status']) && $_GET['status'] == 'sukses'): ?>
            <div class="message">Pesanan segera dikirim.</div>
        <?php endif; ?>

        <h1>Riwayat Pembelian</h1>

        <?php
        $file = 'riwayat_pemesanan.json';
        $riwayat_pembelian = [];

        if (file_exists($file)) {
            $riwayat_pembelian = json_decode(file_get_contents($file), true);
            if ($riwayat_pembelian === null) {
                $riwayat_pembelian = [];
            }
            $riwayat_pembelian = array_reverse($riwayat_pembelian); // Reverse the order of the array
        }

        if (!empty($riwayat_pembelian)): ?>
            <?php foreach ($riwayat_pembelian as $riwayat): ?>
                <div class="riwayat-item">
                    <h2>Pesanan oleh <?= htmlspecialchars($riwayat['username']) ?></h2>
                    <p>Jumlah Barang: <?= htmlspecialchars($riwayat['jumlah_barang']) ?></p>
                    <p>Nama Barang: <?= htmlspecialchars($riwayat['nama_barang']) ?></p>
                    <p>Harga Barang: <?= htmlspecialchars($riwayat['harga_barang']) ?></p>
                    <p>Total Harga: <?= htmlspecialchars($riwayat['total_harga']) ?></p>
                    <p>Alamat: <?= htmlspecialchars($riwayat['alamat']) ?></p>
                    <p>Metode Transaksi: <?= htmlspecialchars($riwayat['metode_transaksi']) ?></p>
                    <p>Tanggal Pemesanan: <?= htmlspecialchars($riwayat['tanggal_pemesanan']) ?></p>
                </div>
            <?php endforeach; ?>
        <?php else: ?>
            <p>Tidak ada riwayat pembelian.</p>
        <?php endif; ?>
        <button class="back-button" onclick="window.location.href='index4.php';">Back</button>
        </div>
    </div>
    <footer class="footer1">
        <div class="container1">
            <div class="footer-content">
                <div class="footer-section about">
                    <h2>Tentang Kami</h2>
                    <p>Kami adalah sumber informasi terkini tentang dunia berkebun dan gaya hidup sehat.</p>
                </div>
                <div class="footer-section links">
                    <h2>Tautan Berguna</h2>
                    <ul>
                        <li><a href="index.php">Home</a></li>
                        <li><a href="#">Ide Tanaman</a></li>
                        <li><a href="index2.php">Tips Bertani</a></li>
                        <li><a href="index4.php">Toko</a></li>
                        <li><a href="riwayat_pemesanan.html">Riwayat</a></li>
                        <li><a href="../index.php" onclick="logout()">Log out</a></li>
                    </ul>
                </div>
                <div class="footer-section contact">
                    <h2>Hubungi Kami</h2>
                    <span><i class="fas fa-envelope"></i> email@situsmenarik.com</span>
                </div>
            </div>
            <div class="footer-bottom">
                <p>&copy; 2023 Situs Menarik. All rights reserved.</p>
            </div>
        </div>
    </footer>
</body>
</html>

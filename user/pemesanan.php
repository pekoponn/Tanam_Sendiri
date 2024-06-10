<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Quicksand:wght@500&family=Roboto:wght@300&display=swap" rel="stylesheet">
    <title>Check out</title>
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

        form {
            background-color: #fff;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            width: 400px;
            margin: 30px auto;
        }

        label {
            display: block;
            margin-bottom: 8px;
        }

        input {
            width: 100%;
            padding: 8px;
            margin-bottom: 16px;
            box-sizing: border-box;
            border: 1px solid #ccc;
            border-radius: 4px;
        }

        button {
            background-color: #577D86;
            color: #fff;
            padding: 10px 15px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            margin-left: 170px;
        }

        .error {
            color: red;
            margin-top: -10px;
            margin-bottom: 10px;
        }

        select {
            width: 100%; 
            padding: 10px;
            font-size: 16px;
            border: 1px solid #ccc;
            border-radius: 4px;
            box-sizing: border-box;
            margin-bottom: 15px;
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
    <script>
        function updateTotalHarga() {
            var jumlah = parseInt(document.getElementById("jumlah_barang").value) || 0;
            var harga = parseFloat(document.getElementById("harga_barang").value) || 0;
            var total = harga * jumlah;

            document.getElementById("total_harga").value = total;
        }

        document.getElementById("jumlah_barang").addEventListener("input", updateTotalHarga);
        
        function logout() {
            alert("Akun anda sudah terlogout");
            window.location.href = "../index.php";
        }
    </script>
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
        <?php
        $nama_barang = isset($_GET['nama_barang']) ? $_GET['nama_barang'] : '';
        $harga_barang = isset($_GET['harga_barang']) ? $_GET['harga_barang'] : '';
        ?>
        <!-- Form pemesanan -->
        <form action="buy.php" method="POST" id="form_pemesanan">
            <!-- Input untuk nama barang -->
            <div class="form-group">
                <label for="nama_barang">Nama Barang:</label>
                <input type="text" id="nama_barang" name="nama_barang" value="<?php echo htmlspecialchars($nama_barang); ?>" readonly>
            </div>
            <!-- Input untuk jumlah barang -->
            <div class="form-group">
                <label for="jumlah_barang">Jumlah Barang:</label>
                <input type="number" id="jumlah_barang" name="jumlah_barang" min="1" required>
            </div>
            <!-- Input untuk harga barang -->
            <div class="form-group">
                <label for="harga_barang">Harga Barang:</label>
                <input type="text" id="harga_barang" name="harga_barang" value="<?php echo htmlspecialchars($harga_barang); ?>" readonly>
            </div>
            <!-- Input untuk total harga -->
            <div class="form-group">
                <label for="total_harga">Total Harga:</label>
                <input type="text" id="total_harga" name="total_harga" readonly>
            </div>
            <!-- Input untuk alamat -->
            <div class="form-group">
                <label for="alamat">Alamat:</label>
                <input type="text" id="alamat" name="alamat" required>
            </div>
            <!-- Select untuk metode transaksi -->
            <div class="form-group">
                <label for="metode_transaksi">Metode Transaksi:</label>
                <select id="metode_transaksi" name="metode_transaksi" required>
                    <option value="Cash">Cod</option>
                    <option value="Debit">Debit</option>
                    <option value="Credit">Credit</option>
                </select>
            </div>
            <!-- Tombol submit -->
            <button type="submit" name="submit" class="button">Submit</button>
        </form>
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
    <script>
        document.getElementById("jumlah_barang").addEventListener("input", updateTotalHarga);
        updateTotalHarga();
    </script>
</body>
</html>

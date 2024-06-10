<?php
include("koneksi.php");

// Ambil semua artikel
$query = "SELECT * FROM artikel ORDER BY tanggal DESC";
$result = $mysqli->query($query);

if (!$result) {
    die("Query error: " . $mysqli->error);
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="styles.css">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Quicksand:wght@500&family=Roboto:wght@300&display=swap" rel="stylesheet">
    <title>Tips Menanam - TanamSendiri</title>
    <script>
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

    <header class="header">
        <div class="container3">
        <div class="image1">
            <img src="images/10-removebg-preview.png" alt="Foto arc" >
        </div>
        <div class="container">
            <h1>Selamat Datang di Halaman Tips Bertani Terbaik!</h1>
            <p>Apakah Anda seorang petani pemula yang ingin meningkatkan hasil panen atau seorang</p>
            <p>penggemar tanaman yang mencari panduan praktis? Anda berada di tempat yang tepat! kami</p>
            <p>hadir dengan beragam tips bertani yang akan membantu Anda menjadi ahli dalam dunia pertanian.</p></p>
        </div>
    </div>
    </header>
    <body>
    <section class="main-content">
            <div class="container4">
            <article class="article">
                <img src="images/13.jpeg" alt="Foto Tanaman">
            </article>
            </div>
            <div class="container1">
                <article class="article">
                    <img src="images/12.jpeg" alt="Foto Tanaman">
                </article>
           </div>
    </section>
    <div class="boxluar">
    <h1>Daftar Artikel</h1>

    <?php while ($row = $result->fetch_assoc()): ?>
            <div class="artikel">
                <h2><?php echo htmlspecialchars($row['judul']); ?></h2>
                <p><?php echo nl2br(htmlspecialchars($row['konten'])); ?></p>
                <small>Ditulis pada: <?php echo htmlspecialchars($row['tanggal']); ?></small>

                <!-- Form komentar -->
                <div class="komentar">
                    <h3>Komentar</h3>
                    <?php
                    $id_artikel = $row['id'];
                    $query_komentar = "
                        SELECT komentar.*, user.nama 
                        FROM komentar 
                        JOIN user ON komentar.id_user = user.id 
                        WHERE komentar.id_artikel = ? 
                        ORDER BY komentar.tanggal DESC";
                    $stmt = $mysqli->prepare($query_komentar);
                    $stmt->bind_param('i', $id_artikel);
                    $stmt->execute();
                    $result_komentar = $stmt->get_result();
                    ?>

                    <?php while ($komentar = $result_komentar->fetch_assoc()): ?>
                        <p><strong><?php echo htmlspecialchars($komentar['nama']); ?>:</strong> <?php echo nl2br(htmlspecialchars($komentar['komentar'])); ?></p>
                        <small>Ditulis pada: <?php echo htmlspecialchars($komentar['tanggal']); ?></small>
                        <hr>
                    <?php endwhile; ?>
                    <form action="tambah_komentar.php" method="post">
                        <input type="hidden" name="id_artikel" value="<?php echo $id_artikel; ?>">
                        <div>
                            <label>Komentar</label> <br>
                            <textarea name="komentar" rows="4" required></textarea>
                        </div>
                        <div>
                            <input type="submit" value="Kirim Komentar">
                        </div>
                    </form>
                </div>
            </div>
        <?php endwhile; ?>
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
                        <li><a href="index.html">Home</a></li>
                        <li><a href="index3.html">Ide Tanaman</a></li>
                        <li><a href="#">Tips Bertani</a></li>
                        <li><a href="index4.html">Follow me</a></li>
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
    <style>
        .boxluar {
            background-color: #577D86;
            width: 90%;
            margin: 20px auto;
            border-radius: 5px;
            padding: 20px;
            margin-top: 100px;
        }

        .boxluar h1 {
            color: white;
        }

        .artikel {
            background-color: #fff;
            padding: 20px;
            margin-bottom: 20px;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            width: 90%;
            margin: 20px auto;
        }


        .artikel h2 {
            margin-bottom: 20px;
        }
        .komentar {
            margin-top: 20px;
            padding: 10px;
            background-color: #f9f9f9;
            border-radius: 5px;
        }
        form {
            margin-top: 20px;
        }
        form div {
            margin-bottom: 15px;
        }
        label {
            font-weight: bold;
            color: #333;
        }
        input[type="text"],
        textarea {
            width: 100%;
            padding: 10px;
            border: 1px solid #ccc;
            border-radius: 4px;
            box-sizing: border-box;
        }
        input[type="submit"] {
            background-color: #577D86;
            color: #fff;
            border: none;
            padding: 10px 20px;
            cursor: pointer;
            border-radius: 4px;
        }
        input[type="submit"]:hover {
            background-color: #577D86;
        }

        h1 {
            margin-top: 40px;
            margin-bottom: 20px;
            margin-left: 20px;
        }
    </style>
</body>
</html>

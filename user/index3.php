<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="styless.css">
    <title>Ide Tanaman - TanamSendiri</title>
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
                <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
                <link href="https://fonts.googleapis.com/css2?family=Quicksand:wght@500&family=Roboto:wght@300&display=swap" rel="stylesheet">
                <li><a href="index4.php">Toko</a></li>
                <li><a href="riwayat_pemesanan.php">Riwayat</a></li>
                <li><a href="../index.php" onclick="logout()">Log out</a></li>
            </ul>
        </div>
          
        <header class="container3">
            <div class="container">
                <div class="teks">
                    <h1>Ide Terbaik, Tanaman Terindah</h1>
                    <p>Dengan koleksi ide yang terus berkembang, kami menghadirkan solusi untuk setiap jenis halaman. Dari taman vertikal yang modern hingga taman kering yang tahan kekeringan, temukan inspirasi yang sesuai dengan gaya hidup Anda. Bersama-sama, kita akan menciptakan ruang hijau yang memberi kebahagiaan setiap hari.</p>
                </div>
                <div class="garis-putih"></div>
                <div class="tombol">
                    <a href="">Read More</a>
                </div>
            </div>
            <div>
                <img src="images/35-removebg-preview.png" alt="Foto arc" class="image1"/>
            </div> 
            <div>
                <img src="images/36-removebg-preview.png" alt="Foto alc2" class="image2"/>
            </div>
        </header>
    </div>

    <div class="isi">
        <div class="atas">
            <div class="judul">
                <h1 class="teks-judul">Sayuran</h1>
            </div>
            <div class="flex">
                <?php
                // Database connection
                $servername = "localhost";
                $username = "root";
                $password = "";
                $dbname = "dasprog";

                // Create connection
                $conn = new mysqli($servername, $username, $password, $dbname);

                // Check connection
                if ($conn->connect_error) {
                    die("Connection failed: " . $conn->connect_error);
                }

                $sql = "SELECT judul, konten, gambar, url FROM artikel_ide_tanaman WHERE judul IN ('Tomat', 'Selada', 'Cabai', 'Wortel', 'Buncis/Kacang Panjang', 'Timun')";
                $result = $conn->query($sql);

                if ($result->num_rows > 0) {
                    // output data of each row
                    while($row = $result->fetch_assoc()) {
                        echo '<div class="kotak1">';
                        echo '<img src="' . $row["gambar"] . '" alt="Foto-Tanaman" class="tanaman1">';
                        echo '<div class="tulisan1">';
                        echo '<h2>' . $row["judul"] . '</h2>';
                        echo '<p class="teks-p">' . $row["konten"] . '</p>';
                        echo '<a href="' . $row["url"] . '" class="tombol-lanjut">more info</a>';
                        echo '</div>';
                        echo '</div>';
                    }
                } else {
                    echo "0 results";
                }
                $conn->close();
                ?>
            </div>
        </div>

        <!-- Section for Tanaman Hias -->
        <div class="atas1">
            <div class="judul">
                <h1 class="teks-judul">Tanaman Hias</h1>
            </div>
            <div class="flex">
                <?php
                // Database connection
                $conn = new mysqli($servername, $username, $password, $dbname);

                // Check connection
                if ($conn->connect_error) {
                    die("Connection failed: " . $conn->connect_error);
                }

                $sql = "SELECT judul, konten, gambar, url FROM artikel_ide_tanaman WHERE judul IN ('Mawar', 'Bunga Matahari', 'Daisy (Margarita)', 'Lavender', 'Krisan (Chrysanthemum)', 'Hosta')";
                $result = $conn->query($sql);

                if ($result->num_rows > 0) {
                    // output data of each row
                    while($row = $result->fetch_assoc()) {
                        echo '<div class="kotak1">';
                        echo '<img src="' . $row["gambar"] . '" alt="Foto-Tanaman" class="tanaman1">';
                        echo '<div class="tulisan1">';
                        echo '<h2>' . $row["judul"] . '</h2>';
                        echo '<p class="teks-p">' . $row["konten"] . '</p>';
                        echo '<a href="' . $row["url"] . '" class="tombol-lanjut">more info</a>';
                        echo '</div>';
                        echo '</div>';
                    }
                } else {
                    echo "0 results";
                }
                $conn->close();
                ?>
            </div>
        </div>

        <!-- Section for Buah-buahan -->
        <div class="atas3">
            <div class="judul">
                <h1 class="teks-judul">Buah-buahan</h1>
            </div>
            <div class="flex">
                <?php
                // Database connection
                $conn = new mysqli($servername, $username, $password, $dbname);

                // Check connection
                if ($conn->connect_error) {
                    die("Connection failed: " . $conn->connect_error);
                }

                $sql = "SELECT judul, konten, gambar, url FROM artikel_ide_tanaman WHERE judul IN ('Pohon Apel', 'Pohon Jeruk', 'Pohon Pisang', 'Pohon Jambu Air', 'Pohon Mangga', 'Pohon Jeruk Nipis')";
                $result = $conn->query($sql);

                if ($result->num_rows > 0) {
                    // output data of each row
                    while($row = $result->fetch_assoc()) {
                        echo '<div class="kotak1">';
                        echo '<img src="' . $row["gambar"] . '" alt="Foto-Tanaman" class="tanaman1">';
                        echo '<div class="tulisan1">';
                        echo '<h2>' . $row["judul"] . '</h2>';
                        echo '<p class="teks-p">' . $row["konten"] . '</p>';
                        echo '<a href="' . $row["url"] . '" class="tombol-lanjut">more info</a>';
                        echo '</div>';
                        echo '</div>';
                    }
                } else {
                    echo "0 results";
                }
                $conn->close();
                ?>
            </div>
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
                        <li><a href="index.html">Home</a></li>
                        <li><a href="#">Ide Tanaman</a></li>
                        <li><a href="index2.html">Tips Bertani</a></li>
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
   * {
    margin: 0;
    padding: 0;
    text-decoration: none;
    font-family: 'Quicksand', sans-serif;
    font-family: 'Roboto', sans-serif;
    scroll-behavior: smooth;
}

.main {
    width: 100%;
    height: 100vh;
    background-color: #577D86;
    background-size: cover;
    background-position: center;
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

.container3 {
    display: flex;
    height: 100vh;
    gap: 25px;
}

.teks {
    width: 600px;
}

.image1 {
    height: 625px;
    width: 300px;
    margin-left: 25px;
}

.image2 {
    height: 630px;
    width: 300px;
    margin-left: 15px;
}

.container {
    margin-left: 200px;
    margin-top: 125px;
    text-align: left;
    color: white;
}

.garis-putih {
    width: 600px;
    height: 5px;
    background-color: white;
    border-radius: 5px;
    margin-top: 10px;
}

.tombol {
    background-color: #fff; /* Putih */
    color: #577D86; /* Hitam */
    padding: 15px;
    border-radius: 5px;
    box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
    width: 80px;
    font-family: Arial, Helvetica, sans-serif;
    margin-top: 10px;
}

.footer1 {
    background-color: #333; 
    color: #fff;
    padding: 50px 0;
    width: 100%;
    margin-top: 150px;
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

.isi {
}

.kotak1, .kotak2, .kotak3 {
    background-color: white;
    border-radius: 5px;
    width: 320px;
    height: 515px;
    margin-top: 20px;
}

.kotak1 {
    margin-left: 50px;
}

.flex {
    display: flex;
    flex-wrap: wrap; /* Allow items to wrap to the next line */
    gap: 20px; /* Adjust gap as needed */
    justify-content: center; /* Center items horizontally */
}

.tanaman1 {
    width: 280px;
    height: 180px;
    margin-top: 15px;
    margin-left: 20px;
}

.judul {
    margin-left: 50px;
    margin-top: 20px;
    color: #fff;
}

.tulisan1 {
    align-items: center;
    display: flex;
    flex-direction: column;
}

.atas, .atas1, .atas3 {
    background-color: #577D86;
    border-radius: 5px;
    width: 1230px;
    height: 1180px;
    padding-top: 10px;
    margin: 0 auto; /* Center the element horizontally */
}

.atas {
    margin-top: 50px; /* Add top margin for spacing */
}

.atas1 {
    margin-top: 70px; /* Add top margin for spacing */
}

.atas3 {
    margin-top: 120px; /* Add top margin for spacing */
}

.teks-p {
    margin-left: 20px;
    margin-right: 20px;
    text-align: justify;
}

.tombol-lanjut, .tombol-lanjut2, .tombol-lanjut3, .tombol-lanjut4, .tombol-lanjut5, .tombol-lanjut6, .tombol-lanjut7, .tombol-lanjut8, .tombol-lanjut9, .tombol-lanjut10, .tombol-lanjut11, .tombol-lanjut12 {
    background-color: #577d86d2;
    color: #fff;
    width: 80px;
    height: 30px;
    border-radius: 5px;
    align-items: center;
    display: flex;
    padding-left: 10px;
}

.tombol-lanjut {
    margin-top: 5px;
}

.tombol-lanjut2 {
    margin-top: 65px;
}

.tombol-lanjut3 {
    margin-top: 123px;
}

.tombol-lanjut4 {
    margin-top: 123px;
}

.tombol-lanjut5 {
    margin-top: 105px;
}

.tombol-lanjut6 {
    margin-top: 140px;
}

.tombol-lanjut7 {
    margin-top: 125px;
}

.tombol-lanjut8 {
    margin-top: 145px;
}

.tombol-lanjut9 {
    margin-top: 125px;
}

.tombol-lanjut10 {
    margin-top: 88px;
}

.tombol-lanjut11 {
    margin-top: 108px;
}

.tombol-lanjut12 {
    margin-top: 110px;
}

</style>

</body>
</html>

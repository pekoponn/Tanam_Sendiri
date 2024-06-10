<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="styl.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Quicksand:wght@500&family=Roboto:wght@300&display=swap" rel="stylesheet">
    <title>Tanam Sendiri</title>
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
                <li><a href="#">Home</a></li>
                <li><a href="index3.php">Ide Tanaman</a></li>
                <li><a href="index2.php">Tips Bertani</a></li>
                <li><a href="index4.php">Toko</a></li>
                <li><a href="riwayat_pemesanan.php">Riwayat</a></li> 
                <li><a href="../index.php" onclick="logout()">Log out</a></li>
            </ul>
        </div>
        <div class="content">
            <h1>Selamat Datang di TanamSendiri</h1>
            <p>Tempat inspirasi untuk menanam dan merawat tumbuhan di halaman belakang rumah Anda.</p>
        </div>
    </div>
    <div class="tanda">
        <div>
        <h2 >Jenis Tanaman</h2>
        </div>
    </div>
    <div class="featured-plants">
        <div class="container4">
            <div class="plant-card">
                <img src="images/8.jpeg" alt="Tanaman 1">
            </div>
            <div class="text1">
                <h3>Tanaman Hias</h3>
                <p>Pencahayaan: Medium</p>
                <p>Perawatan: Mudah</p>
                <p>Fungsi: Tanaman hias umumnya ditanam untuk meningkatkan keindahan ruang. Bentuk, warna, dan tekstur daun serta </p>
                <p>bunga tanaman hias dapat memberikan sentuhan estetis yang menyegarkan dan mempercantik lingkungan.</p>
                <p>Beberapa tanaman hias memiliki kemampuan untuk menyaring udara dengan menyerap polutan dan melepaskan oksigen.</p>
            </div>
        </div>
        <div class="container2">
            <div class="text2">
                <h3>Sayuran Organik</h3>
                <p>Pencahayaan: Sinar Matahari Penuh</p>
                <p>Perawatan: Sedang</p>
                <p>Fungsi: Menanam sayuran di belakang rumah memungkinkan Anda menghasilkan pangan organik. Anda dapat </p>
                <p>mengontrol jenis pupuk dan pestisida yang digunakan atau bahkan beralih ke metode tanam organik sepenuhnya.</p>
                <p>Anda juga memiliki akses langsung ke sayuran segar dan berkualitas tinggi tanpa harus pergi ke toko. Ini dapat </p>
                <p> meningkatkan ketersediaan sayuran segar dalam diet sehari-hari.</p>
            </div>
        <div class="plant-card">
            <img src="images/3.jpeg" alt="Tanaman 2">
        </div>
    </div>
    <div class="container3">
    <div class="plant-card">
        <img src="images/9.jpg" alt="Tanaman 3">
    </div>
        <div class="text1">
            <h3>Buah-buahan</h3>
            <p>Pencahayaan: Sinar Matahari Penuh</p>
            <p>Perawatan: Sedang</p>
            <p>Fungsi: Menanam buah-buahan di halaman belakang memberikan akses langsung ke pangan segar dan alami tanpa tambahan</p>
            <p> pestisida atau bahan kimia berlebihan.dan juga Buah-buahan kaya akan nutrisi yang baik untuk kesehatan.</p>
            <p>Memiliki akses mudah ke buah-buahan dapat meningkatkan asupan nutrisi dan mendukung gaya hidup sehat.</p>
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
                        <li><a href="#">Home</a></li>
                        <li><a href="index3.php">Ide Tanaman</a></li>
                        <li><a href="index2.php">Tips Bertani</a></li>
                        <li><a href="index4.php">Follow me</a></li>
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
    background-image: linear-gradient(rgba(0, 0, 0, 0.25),rgba(0, 0, 0, 0.25)), url("images/image2.png");
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

.content {
    top: 50%;
    width: 100%;
    text-align: center;
    color: white;
    position: absolute;
    transform: translateY(-50%);
}

.content h1 {
    font-size: 80px;
    margin-top: 80px;
}  
.content p {
    margin: 20px auto;
    font-weight: 100;
    line-height: 25px;
}
.container4 {
    display: flex;
    gap: 35px;
    background-color: rgba(128, 128, 128, 0.5); /* Warna abu-abu dengan 50% transparansi */
    margin-bottom: 40px;
    margin-right: 40px;
}

.container3 {
    display: flex;
    gap: 35px;
    background-color: rgba(128, 128, 128, 0.5); /* Warna abu-abu dengan 50% transparansi */
    margin-bottom: 20px;
    margin-top: 40px;
    margin-right: 40px;
}


.text1 {
    margin-top: 20px;
    font-size: 20px;
    color: rgba(255, 255, 255, 0.805);
}

.text1 h3 {
    font-size: 30px;
}

.plant-card {
    margin-left: 30px;
    margin-top: 20px;
}

.plant-card img {
    width: 350px;
    height: 220px;
    border-radius: 5px;
}

.footer {
    margin-top: 50px;
}

.tanda {
    background-color: rgba(0, 0, 0, 0.789);
    color: white;
    text-align: center;
    height: 70px;
    justify-content: center;
    font-size: 30px;
    padding-top: 10px;

}
.featured-plants {
    width: 100%;
    height: 120vh;
    background-image: linear-gradient(rgba(0, 0, 0, 0.55),rgba(0, 0, 0, 0.55)), url("images/1.jpg");
    background-size: cover;
    background-position: center;

}

.plant-card1 {
    width: 350px;
    height: 220px;
    border-radius: 5px;
    margin-left: 840px;
}

.text2 {
    text-align: right;
    color: rgba(255, 255, 255, 0.805);
    margin-top: 20px;
    font-size: 20px;
    margin-left: 20px;
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

.container2 {
    display: flex;
    gap: 10px;
    background-color: rgba(128, 128, 128, 0.5); /* Warna abu-abu dengan 50% transparansi */
    margin-top: 20px;
}

</style>
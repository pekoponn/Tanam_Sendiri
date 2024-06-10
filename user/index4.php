<?php
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

$sql = "SELECT nama, gambar_barang, harga, stok FROM barang";
$result = $conn->query($sql);

$products = array();
if ($result->num_rows > 0) {
    while($row = $result->fetch_assoc()) {
        $products[] = $row;
    }
} else {
    echo "0 results";
}
$conn->close();
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>TOKO</title>
  <script>
        function logout() {
            alert("Akun anda sudah terlogout");
            window.location.href = "../index.php";
        }
  </script>
  <!-- <link rel="stylesheet" href="stylesss.css"> -->
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
    <div class="upper">
        <img src="images/42.jpeg" class="foto-upper">
        <h1 class="h1">Tersedia Berbagai Jenis Tanaman</h1>
        <p class="p1">"Koleksi tanaman pilihan untuk menciptakan taman mini di rumah Anda."</p>
        <button class="overlay" onclick="autoScroll()">Belanja Sekarang</button>
    </div>
    <div class="barang">
        <div class="tanaman1">
            <img src="images/45.jpeg">
            <div class="tombol">
                <a href="">Tanaman Hias ></a>
            </div>
        </div>
        <div class="tanaman2">
            <img src="images/46.jpeg">
            <div class="tombol">
                <a href="">Tanaman Buah></a>
            </div>
        </div>
        <div class="tanaman3" class="tombol">
            <img src="images/47.jpeg">
            <div class="tombol">
                <a href="">Tanaman Sayuran ></a>
            </div>
        </div>
    </div>
    <div class="jual">
        <?php foreach ($products as $product): ?>
            <div class="produk1">
                <img src="<?php echo $product['gambar_barang']; ?>" class="produkimg">
                <h2><?php echo $product['nama']; ?></h2>
                <p>RP<?php echo number_format($product['harga'], 2, ',', '.'); ?></p>
                <p>Stok: <?php echo $product['stok']; ?></p>
                <div class="bton">
                    <a href="pemesanan.php?nama_barang=<?php echo urlencode($product['nama']); ?>&harga_barang=<?php echo $product['harga']; ?>">Buy</a>
                </div>
            </div>
        <?php endforeach; ?>
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
        function autoScroll() {
            window.scrollBy({
                top: 1000, // Jumlah piksel untuk menggulir ke bawah
                left: 0,
                behavior: 'smooth' // Animasi pengguliran halus
            });
        }
    </script>
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
    height: 40vh;
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

.upper {
    position: relative; /* Penting untuk elemen pembungkus */
    display: inline-block; /* Atur sesuai kebutuhan */
    width: 100%; /* Atur sesuai kebutuhan */
    height: auto; /* Atur sesuai kebutuhan */
}

  .foto-upper {
    width: 1519px;
    height: 400px;
    display: block;
    z-index: 9;
  }

  .overlay {
    background-color: white;
    color: black;
    width: 180px;
    height: 35px;
    margin-bottom: -25px;
    margin-left: 650px;
    z-index: 1;
    margin-top: 50px;
    display: inline-block;
    justify-content: center;
}

.overlay a {
  margin-left: 30px;
  margin-top: 10px;
}

  .h1 {
    margin-top: -180px;
    margin-left: 500px;
    color: white;
  }

  .p1 {
    color: white;
    margin-left: 490px;
    margin-top: 5px;
  }

  .button {
    background: white;
    color: black;
    width: 150px;
    height: 50px;
    margin-bottom: -25px;
    margin-left: 670px;
    z-index: 10;
    margin-top: 50px;
  }

  .tanaman {
    margin-left: 220px;
    background-color: white;
    margin-top: 70px;
    width: 500px;
    height: 250px;
  }

  img {
    width: 160px;
    height: 160px;

  }

  .barang {
    display: flex;
  }

  .tanaman1 img {
    width: 370px;
    height: 210px;
  }

  .tanaman1 {
    margin-top: 70px;
    margin-left: 180px;
  }
  
  .tanaman2 {
    margin-left: 15px;
    margin-top: 70px;
  }


  .tanaman2 img {
    width: 370px;
    height: 210px;
  }

  .tanaman3 {
    margin-left: 15px;
    margin-top: 70px;
  }

  .tanaman3 img {
    width: 370px;
    height: 210px;
  }

   .tombol {
    margin-top: -35px;
    margin-left: 220px;
   }

   .tombol a {
    color: white;
   }

   .produk1 {
    margin-left: 100px;
    margin-top: 100px;
    transition: transform 0.3s ease;
   }

   .produk1:hover {
            transform: scale(1.05);
        }
   
   .jual {
    display: flex;
    text-align: right;
   }

   .produkimg {
     width: 250px;
     height: 250px;
   }

   .bton {
    background-color: #577D86;
    width: 50px;
    height: 25px;
    border-radius: 4px;
    margin-left: 200px;
    margin-top: 15px;
   }

   .bton a {
    color:white;
    margin-right: 10px;
    margin-bottom: -10px;
   }

   .produk2 {
    margin-top: 100px;
    margin-left: 30px;
    transition: transform 0.3s ease;
   }

   .produk2:hover {
            transform: scale(1.05);
        }

   .footer1 {
    background-color: #333; 
    color: #fff;
    padding: 50px 0;
    margin-top: 50px;
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

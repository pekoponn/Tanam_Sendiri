-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 30 Bulan Mei 2024 pada 02.02
-- Versi server: 10.4.28-MariaDB
-- Versi PHP: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `dasprog`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `artikel`
--

CREATE TABLE `artikel` (
  `id` int(11) NOT NULL,
  `judul` varchar(255) NOT NULL,
  `konten` text NOT NULL,
  `tanggal` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `artikel`
--

INSERT INTO `artikel` (`id`, `judul`, `konten`, `tanggal`) VALUES
(1, 'Tumbuhan Yang Cocok Didataran Rendah - Artikel 1', 'Salah satunya yaitu dataran rendah, yang ketinggian kurang dari 200 meter di atas permukaan laut dan berada di sekitar pantai dan perkotaan. \r\n\r\nCiri-ciri fisik dataran rendah adalah permukaan tanah lapang yang datar, landai, dan rata. \r\n\r\nSuhu lingkungan di wilayah dataran rendah yaitu normal, tidak terlalu panas seperti di wilayah pantai, dan tidak terlalu dingin seperti wilayah dataran tinggi. \r\n\r\nDataran rendah memiliki curah hujan yang tinggi dan berpotensi mengalami banjir karena dekat dengan wilayah pantai atau hilir sungai. \r\n\r\nPada wilayah dataran rendah, sebagian besar sumber daya alam yang bisa ditemukan adalah pertanian. \r\n\r\nTumbuhan yang hidup di wilayah dataran rendah dapat tumbuh dengan subur, karena suhu lingkungan dan kondisi tanah yang baik. \r\n\r\nNah, dari karakteristik fisik di atas, kita bisa mengetahui bahwa tidak semua tanaman akan tumbuh subur di tanah dataran rendah. 1. Tumbuhan Kelapa\r\n\r\nKelapa biasanya ditemukan di daerah pesisir pantai yang termasuk wilayah dataran rendah. \r\n\r\nHal ini karena tumbuhan kelapa dapat tumbuh dengan subur pada suhu antara 20 hingga 27 derajat Celcius. \r\n\r\nTumbuhan kelapa juga lebih cocok tumbuh di wilayah yang ketinggiannya 0 hingga 450 meter di atas permukaan laut.\r\n\r\nJika lebih dari ketinggian tersebut, maka tumbuhan kelapa akan berbuah lebih lambat. \r\n\r\n2. Tumbuhan Pisang\r\n\r\nPohon pisang juga biasa ditemukan di wilayah dataran rendah yang suhunya hangat dan tanah yang lembap. \r\n\r\nTumbuhan pisang juga membutuhkan banyak sinar matahari untuk tumbuh dengan subur. \r\n\r\nWalaupun pohon pisang juga bisa tumbuh di dataran tinggi, buah yang dihasilkan lebih banyak ketika ditanam di dataran rendah. \r\n\r\n3. Tanaman Padi\r\n\r\nPadi merupakan jenis pertanian lahan basah, yang membutuhkan banyak air dan sinar matahari. Oleh karena itu, padi dapat tumbuh di daerah yang panas dengan curah hujan tinggi. \r\n\r\nPadi juga membutuhkan jenis tanah yang berlumpur namun subur, seperti tanah alluvial, yang mudah ditemukan di wilayah dataran rendah.\r\n\r\n4. Tumbuhan Kangkung\r\n\r\nTumbuhan kangkung cenderung memerlukan kelembaban tanah yang relatif tinggi untuk bisa bertumbuh dengan optimal.\r\n\r\nTanaman ini subur jika ditanam pada kondisi dataran rendah dengan temperatur tinggi dan penyinaran yang pendek. \r\n\r\nTemperatur yang ideal berkisar 25 – 30oC, sedangkan dibawah 10oC tanaman akan rusak.', '2024-05-29 13:56:13');

-- --------------------------------------------------------

--
-- Struktur dari tabel `barang`
--

CREATE TABLE `barang` (
  `id` int(11) NOT NULL,
  `nama` varchar(100) DEFAULT NULL,
  `deskripsi` varchar(255) DEFAULT NULL,
  `harga` int(100) DEFAULT NULL,
  `stok` int(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `barang`
--

INSERT INTO `barang` (`id`, `nama`, `deskripsi`, `harga`, `stok`) VALUES
(1, 'fuschia', 'bungan merah muda seperti sakura', 200000, 3),
(2, 'lidah mertua', 'bunga estetik', 25000, 15),
(3, 'sirih gading', 'tanaman hias', 5000, 20),
(4, 'aglonema', 'tanaman hias', 100000, 5);

-- --------------------------------------------------------

--
-- Struktur dari tabel `detail_pemesanan`
--

CREATE TABLE `detail_pemesanan` (
  `id_detail` int(11) NOT NULL,
  `id_pemesanan` int(100) DEFAULT NULL,
  `id_barang` int(100) DEFAULT NULL,
  `jumlah_barang` varchar(255) DEFAULT NULL,
  `subtotal` int(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `komentar`
--

CREATE TABLE `komentar` (
  `id` int(11) NOT NULL,
  `id_artikel` int(11) DEFAULT NULL,
  `nama` varchar(100) NOT NULL,
  `komentar` text NOT NULL,
  `tanggal` timestamp NOT NULL DEFAULT current_timestamp(),
  `id_user` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `komentar`
--

INSERT INTO `komentar` (`id`, `id_artikel`, `nama`, `komentar`, `tanggal`, `id_user`) VALUES
(1, 1, 'naufal', 'berapa kali penyiramannya', '2024-05-29 12:22:01', NULL),
(2, 1, 'jj', 'dsa', '2024-05-29 12:31:26', NULL),
(3, 1, 'naufal', 'asd', '2024-05-29 13:09:45', NULL),
(4, 1, 'pekopon', 'apakah ini failed', '2024-05-29 13:32:26', 6);

-- --------------------------------------------------------

--
-- Struktur dari tabel `level`
--

CREATE TABLE `level` (
  `id_level` int(50) NOT NULL,
  `id_user` int(50) NOT NULL,
  `user` varchar(50) NOT NULL,
  `admin` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `pemesanan`
--

CREATE TABLE `pemesanan` (
  `id_pemesanan` int(11) NOT NULL,
  `username` varchar(255) DEFAULT NULL,
  `harga` int(50) NOT NULL,
  `tanggal_pemesanan` date NOT NULL,
  `nama_barang` varchar(255) DEFAULT NULL,
  `metode_transaksi` varchar(50) DEFAULT NULL,
  `alamat` varchar(50) NOT NULL,
  `jumlah_barang` int(50) NOT NULL,
  `total_harga` double NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `pemesanan`
--

INSERT INTO `pemesanan` (`id_pemesanan`, `username`, `harga`, `tanggal_pemesanan`, `nama_barang`, `metode_transaksi`, `alamat`, `jumlah_barang`, `total_harga`) VALUES
(36, 'pekopon', 25000, '2024-05-29', 'lidah mertua', 'Cash', 'paciran,lamongan', 2, 50000),
(37, 'jeje', 5000, '2024-05-29', 'sirih gading', 'Cash', 'paciran,lamongan', 3, 15000),
(38, 'jeje', 5000, '2024-05-29', 'sirih gading', 'Cash', 'paciran,lamongan', 3, 15000),
(39, 'jeje', 25000, '2024-05-29', 'lidah mertua', 'Cash', 'paciran,lamongan', 4, 100000),
(40, 'jeje', 25000, '2024-05-29', 'lidah mertua', 'Cash', 'paciran,lamongan', 4, 100000),
(41, 'jeje', 25000, '2024-05-29', 'lidah mertua', 'Cash', 'paciran,lamongan', 4, 100000),
(42, 'naufal', 200000, '2024-05-29', 'fuschia', 'Cash', 'paciran,lamongan', 3, 600000),
(43, 'naufal', 25000, '2024-05-29', 'lidah mertua', 'Credit', 'paciran,lamongan', 3, 75000),
(44, 'jeje', 25000, '2024-05-29', 'lidah mertua', 'Debit', 'paciran,lamongan', 2, 50000),
(45, 'naufal', 5000, '2024-05-29', 'sirih gading', 'Debit', 'sidoarjo', 5, 25000),
(46, 'naufal', 5000, '2024-05-29', 'fuschia', 'Credit', 'sidoarjo', 2, 10000),
(48, 'naufal', 200000, '2024-05-29', 'fuschia', 'Debit', 'paciran,lamongan', 2, 400000);

-- --------------------------------------------------------

--
-- Struktur dari tabel `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `username` varchar(20) NOT NULL,
  `password` varchar(20) NOT NULL,
  `level` varchar(20) NOT NULL,
  `email` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `user`
--

INSERT INTO `user` (`id`, `nama`, `username`, `password`, `level`, `email`) VALUES
(6, 'naufal syarif', 'naufal', '321', 'user', 'naufalmoch064@gmail.com'),
(7, 'sdfsdfs', 'pekopon', 'sdffsf', 'admin', 'werwrw'),
(8, 'dadasd', 'draxy', 'asdas', 'user', 'naufalmoch064@gmail.com'),
(20, 'jeje', 'jeje', '567', 'user', 'naufalwkwkkwkw@gmail.com'),
(21, 'naufal', 'pekopon', '12345', 'admin', 'naufal@gmail.com');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `artikel`
--
ALTER TABLE `artikel`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `barang`
--
ALTER TABLE `barang`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `detail_pemesanan`
--
ALTER TABLE `detail_pemesanan`
  ADD PRIMARY KEY (`id_detail`),
  ADD KEY `fk_spp_relation_barang` (`id_barang`),
  ADD KEY `fk_spp_relation_pemesanan` (`id_pemesanan`);

--
-- Indeks untuk tabel `komentar`
--
ALTER TABLE `komentar`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_artikel_id` (`id_artikel`);

--
-- Indeks untuk tabel `level`
--
ALTER TABLE `level`
  ADD PRIMARY KEY (`id_level`);

--
-- Indeks untuk tabel `pemesanan`
--
ALTER TABLE `pemesanan`
  ADD PRIMARY KEY (`id_pemesanan`),
  ADD KEY `fk_spp_relation_user` (`username`),
  ADD KEY `fk_transaksi_barang` (`nama_barang`);

--
-- Indeks untuk tabel `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `artikel`
--
ALTER TABLE `artikel`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT untuk tabel `barang`
--
ALTER TABLE `barang`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT untuk tabel `komentar`
--
ALTER TABLE `komentar`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT untuk tabel `pemesanan`
--
ALTER TABLE `pemesanan`
  MODIFY `id_pemesanan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=49;

--
-- AUTO_INCREMENT untuk tabel `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `detail_pemesanan`
--
ALTER TABLE `detail_pemesanan`
  ADD CONSTRAINT `fk_spp_relation_pemesanan` FOREIGN KEY (`id_pemesanan`) REFERENCES `pemesanan` (`id_pemesanan`);

--
-- Ketidakleluasaan untuk tabel `komentar`
--
ALTER TABLE `komentar`
  ADD CONSTRAINT `fk_artikel_id` FOREIGN KEY (`id_artikel`) REFERENCES `artikel` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `komentar_ibfk_1` FOREIGN KEY (`id_artikel`) REFERENCES `artikel` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 08, 2021 at 08:05 PM
-- Server version: 10.3.16-MariaDB
-- PHP Version: 7.3.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `skripsi_bayes`
--

-- --------------------------------------------------------

--
-- Table structure for table `aturan`
--

CREATE TABLE `aturan` (
  `id_aturan` int(1) NOT NULL,
  `kode_penyakit` varchar(3) NOT NULL,
  `kode_gejala` varchar(3) NOT NULL,
  `bobot` double NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `aturan`
--

INSERT INTO `aturan` (`id_aturan`, `kode_penyakit`, `kode_gejala`, `bobot`) VALUES
(1, 'P01', 'G01', 0.9),
(2, 'P01', 'G02', 0.85),
(3, 'P01', 'G03', 0.6),
(4, 'P01', 'G04', 0.7),
(5, 'P01', 'G05', 0.4),
(6, 'P01', 'G06', 0.3),
(7, 'P02', 'G07', 0.9),
(8, 'P02', 'G08', 0.7),
(9, 'P02', 'G09', 0.7),
(10, 'P02', 'G10', 0.4),
(11, 'P03', 'G11', 0.9),
(12, 'P03', 'G12', 0.8),
(13, 'P03', 'G13', 0.2),
(14, 'P03', 'G14', 0.9),
(15, 'P03', 'G15', 0.4),
(16, 'P04', 'G16', 0.9),
(17, 'P04', 'G17', 0.8),
(18, 'P04', 'G18', 0.8),
(19, 'P04', 'G19', 0.9),
(20, 'P04', 'G20', 0.9),
(21, 'P05', 'G21', 0.95),
(22, 'P05', 'G22', 0.95),
(23, 'P05', 'G23', 0.9),
(24, 'P05', 'G24', 0.8),
(25, 'P05', 'G25', 0.8),
(26, 'P05', 'G26', 0.8),
(27, 'P06', 'G27', 0.85),
(28, 'P06', 'G28', 0.6),
(29, 'P06', 'G29', 0.7),
(30, 'P06', 'G30', 0.9),
(31, 'P06', 'G31', 0.85);

-- --------------------------------------------------------

--
-- Table structure for table `gejala`
--

CREATE TABLE `gejala` (
  `kode_gejala` varchar(3) NOT NULL,
  `nama_gejala` varchar(400) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `gejala`
--

INSERT INTO `gejala` (`kode_gejala`, `nama_gejala`) VALUES
('G01', ' Garis-garis coklat kehitaman paralet pada helaian daun'),
('G02', 'Bercak memanjang berukuran 2 x 20 mm parallel pada helaian daun'),
('G03', 'Pada awal perkembangan, bercak tersusun segaris searah dengan ibu tulang daun (midrib)'),
('G04', ' Bercak daun membesar berbentuk oval atau memanjang. Terdapat lingkaran berwarna kuning pada pinggiran bercak'),
('G05', 'Bercak bergabung sehingga daun mengalami nekrosis dan mengering pada sebagian atau seluruh helaian daun'),
('G06', 'Buah tidak berkembang dan mengalami pematangan lebih cepat'),
('G07', 'Bercak berwarna kuning sampai coklat pucat berbentuk belah ketupat atau berbentuk seperti mata'),
('G08', 'Bercak dengan pusat lingkaran nekrosis berwarna abu-abu'),
('G09', 'Bercak terjadi di pinggiran daun dan berkembang menuju ke ibu tulang daun (midrib), utamanya pada daun-daun yang tua'),
('G10', ' Bercak bergabung sehingga menyebabkan daun menguning dan mengering'),
('G11', 'Bercak berwarna hitam dengan 4 sudut sehingga berbentuk silang'),
('G12', 'Bercak memanjang searah dengan tulang daun (vein)'),
('G13', 'Bercak menyebar secara acak'),
('G14', 'Bercak bersilang berukuran sampai dengan 6 cm panjang'),
('G15', 'Bercak bergabung menyebabkan daun mengering, tetapi helaian daun tidak patah'),
('G16', 'Daun menguning dimulai dari tepi daun dan dari daun-daun yang tua'),
('G17', 'Helaian daun mengering dan menggantung karena pangkal tangkai daunnya patah'),
('G18', ' Batang semu terbelah atau pecah'),
('G19', 'Terjadi perubahan warna jaringan pembuluh menjadi coklat pada batang semu; berupa titik-titik coklat apabila batang semu dipotong melintang atau garis coklat memanjang apabila batang semu dipotong membujur'),
('G20', 'Terdapat necrosis pada bonggol. Apabila bonggol dibelah melintang, terdapat nekrosis berwarna coklat sampai hitam melingkari bonggol'),
('G21', 'Bunga (jantung) membusuk dan mengering'),
('G22', 'Daging buah busuk berlendir berwarna merah'),
('G23', 'Buah membusuk dan mengering'),
('G24', 'Daun menguning pada seluruh helaian daun, terutama dimulai dari daun termuda'),
('G25', 'Pada empulur dan tangkai tandan terdapat perubahan warna menjadi coklat-kemerahan. Pemotongan melintang pada tangkai tandan akan memperlihatkan titik-titik berwarna coklat kemerahan'),
('G26', 'Bonggol busuk dan berbau tidak sedap'),
('G27', ' Daun mengecil dan berdiri tegak'),
('G28', ' Daun pucat  '),
('G29', ' Ruas daun memendek'),
('G30', ' Pada ibu tulang daun (midrib) terdapat bercak atau garis-garis berwarna hijau gelap'),
('G31', 'Tanaman kerdil');

-- --------------------------------------------------------

--
-- Table structure for table `hasil`
--

CREATE TABLE `hasil` (
  `id_hasil` int(11) NOT NULL,
  `kode_gejala` varchar(5) NOT NULL,
  `jumlah` double NOT NULL,
  `hasil1` double NOT NULL,
  `jumlah2` double NOT NULL,
  `hasil2` double NOT NULL,
  `hasil` double NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `penyakit`
--

CREATE TABLE `penyakit` (
  `kode_penyakit` varchar(3) NOT NULL,
  `nama_penyakit` varchar(100) NOT NULL,
  `solusi` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `penyakit`
--

INSERT INTO `penyakit` (`kode_penyakit`, `nama_penyakit`, `solusi`) VALUES
('P01', 'Bercak Daun Sigatoka (Penyebab : Cendawan Mycosphaerella sp)', '1. Hindari kelembapan tanah yang tinggi dengan drainase(saluran air) yang baik<br>\r\n2. Berikan jarak yang cukup antar tanaman untuk memastikan peredaran udara yang baik <br>\r\n3. Bersihkan lahan dan sekitarnya dari gulma<br>\r\n4. Potong daun yang terinfeksi, kemudian bakar atau kubur di luar perkebunan<br>\r\n\r\n'),
('P02', 'Bercak Daun Cordana (Penyebab : Cendawan Cordana musae)', '1. Gunakan varietas tangguh jika tersedia di daerah anda (bebrapa ada di pasaran)<br>\r\n2. Atur jarak tanam yang tepat untuk menghindari naungan dan kontak daun<br>\r\n3. pastikan bahwa perkebunan baru berada pada jarak yang cukup dari perkebunan yang sakit<br>\r\n4. hidari irigasi pancuran untuk mrminimalkan kelembapan relatif dan gunakan irigasi tetes<br>\r\n'),
('P03', 'Bercak bersilang (Penyebab : Cendawan Phyllachora musicola)', 'ccccccccccc'),
('P04', 'Layu Fusarium (Penyebab : Cendawan Fusarium oxysporum f.sp cubense)', '1. Buang dan bakar tanaman pisang yang sudah terlanjur terserang penyaki ini<br>\r\n2. Menanam lebih dari satu varietas atau menanan bibit yang sehat, Jangan memasukkan bibit <br>\r\n3. bonggol dan tanah dari daerah yang sudah terkontaminasi'),
('P05', 'Penyakit Darah (Penyebab : Bakteri Ralstonia sp)', '1. Selalu gunakan bibit tanaman pisang yang bebas penyakit tanaman (semua pisang rentan) dengan tujuan menjaga keluar masuknya penyakit ke daerah baru<br> \r\n2. Cegah serangga penular atau pembawa penyakit dengan cara bungkus segera jantung pisang segera setelah keluar dengan kantong plastik, kertas ataupun bahan lain dengan tujuan untuk mengurangi penularan penyakit dalam dan di antara lokasi yang ditularkan oleh serangga pengunjung bunga. Jangan tunggu sampai mekar baru dibungkus<br>\r\n3. Potong sesegera mungkin jantung pisang begitu sisir buah terakhir sudah selesai keluar<br>\r\nEradikasi tanaman dengan cara segera hancurkan dan musnahkan tanaman sakit dan tanaman pisang yang ada disekilingnya, selanjutnya selalu amati dan perhatikan jikalau sisa-sisa tanaman sakit yang telah dihancurkan tersebut tumbuh kembal'),
('P06', 'Penyakit Kerdil Pisang (Penyebab : Bunchy top virus)', '1. Gunakan bahan tanaman sehat dari sumber bersertifikat\r\n2. Pantau tanaman secara teratur dan periksa tanaman yang sakit\r\n3. Buang, keringkan dan kubur tanaman pisang yang terinfeksi\r\n4. Buat zona penyangga bebas pisang di -antara kebun-kebun yang berbeda');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id_user` int(1) NOT NULL,
  `username` varchar(10) NOT NULL,
  `password` varchar(120) NOT NULL,
  `role_id` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id_user`, `username`, `password`, `role_id`) VALUES
(1, 'admin', '$2y$10$erLTdRPQQV1cMWQ6o0dQDOA2vJArtd4TVqwRoFy8xKBhRZgBSThrm', 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `aturan`
--
ALTER TABLE `aturan`
  ADD PRIMARY KEY (`id_aturan`),
  ADD KEY `kode_gejala` (`kode_gejala`),
  ADD KEY `kode_penyakit` (`kode_penyakit`);

--
-- Indexes for table `gejala`
--
ALTER TABLE `gejala`
  ADD PRIMARY KEY (`kode_gejala`);

--
-- Indexes for table `hasil`
--
ALTER TABLE `hasil`
  ADD PRIMARY KEY (`id_hasil`);

--
-- Indexes for table `penyakit`
--
ALTER TABLE `penyakit`
  ADD PRIMARY KEY (`kode_penyakit`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id_user`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `aturan`
--
ALTER TABLE `aturan`
  MODIFY `id_aturan` int(1) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=73;

--
-- AUTO_INCREMENT for table `hasil`
--
ALTER TABLE `hasil`
  MODIFY `id_hasil` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id_user` int(1) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `aturan`
--
ALTER TABLE `aturan`
  ADD CONSTRAINT `aturan_ibfk_1` FOREIGN KEY (`kode_gejala`) REFERENCES `gejala` (`kode_gejala`),
  ADD CONSTRAINT `aturan_ibfk_2` FOREIGN KEY (`kode_penyakit`) REFERENCES `penyakit` (`kode_penyakit`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

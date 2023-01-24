-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 24, 2023 at 08:24 PM
-- Server version: 10.4.27-MariaDB
-- PHP Version: 8.0.25

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `sipperpustakaan`
--

-- --------------------------------------------------------

--
-- Table structure for table `buku`
--

CREATE TABLE `buku` (
  `kode_buku` varchar(225) NOT NULL,
  `judul_buku` varchar(225) NOT NULL,
  `id_kategori` int(11) NOT NULL,
  `tahun_buku` varchar(25) NOT NULL,
  `penerbit` varchar(225) NOT NULL,
  `pengarang` varchar(225) NOT NULL,
  `id_rak` int(11) NOT NULL,
  `jumlah` int(11) NOT NULL,
  `foto` varchar(225) NOT NULL,
  `is_active` tinyint(1) DEFAULT 0,
  `deskripsi` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `buku`
--

INSERT INTO `buku` (`kode_buku`, `judul_buku`, `id_kategori`, `tahun_buku`, `penerbit`, `pengarang`, `id_rak`, `jumlah`, `foto`, `is_active`, `deskripsi`) VALUES
('ABCDEFG', 'Harry Potter', 13, '2022', 'asd', 'ads', 4, 98, '230122054235pngtree-hand-drawn-books-book-sketch-png-image_8304997.jpg', 0, 'Entahlah'),
('vsdvsd', 'Doraemon', 13, '3', 'scd', 'cds', 4, 100, '230122040207Sudahkah-Anda-Membaca-Buku-Hari-Ini.jpg', 0, 'csd');

-- --------------------------------------------------------

--
-- Table structure for table `detail_peminjaman`
--

CREATE TABLE `detail_peminjaman` (
  `id_detail_peminjaman` int(11) NOT NULL,
  `id_peminjaman` varchar(225) NOT NULL,
  `id_buku` varchar(225) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `detail_peminjaman`
--

INSERT INTO `detail_peminjaman` (`id_detail_peminjaman`, `id_peminjaman`, `id_buku`) VALUES
(8, 'PEM230122074854', 'ABCDEFG'),
(9, 'PEM230124040059', 'ABCDEFG'),
(10, 'PEM230124040059', 'vsdvsd'),
(11, 'PEM230124041051', 'ABCDEFG'),
(12, 'PEM230124041051', 'vsdvsd'),
(13, 'PEM230124041437', 'ABCDEFG'),
(14, 'PEM230124041437', 'vsdvsd'),
(15, 'PEM230124042226', 'ABCDEFG'),
(16, 'PEM230124042226', 'vsdvsd');

--
-- Triggers `detail_peminjaman`
--
DELIMITER $$
CREATE TRIGGER `ad_detail_peminjaman` AFTER DELETE ON `detail_peminjaman` FOR EACH ROW update buku set buku.jumlah = buku.jumlah + 1 where buku.kode_buku = OLD.id_buku
$$
DELIMITER ;
DELIMITER $$
CREATE TRIGGER `ai_detail_peminjaman` AFTER INSERT ON `detail_peminjaman` FOR EACH ROW update buku set buku.jumlah = buku.jumlah - 1 where buku.kode_buku = NEW.id_buku
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `kategori`
--

CREATE TABLE `kategori` (
  `id` int(11) NOT NULL,
  `nama_kategori` varchar(225) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `kategori`
--

INSERT INTO `kategori` (`id`, `nama_kategori`) VALUES
(13, 'fiksi'),
(14, 'dongeng');

-- --------------------------------------------------------

--
-- Table structure for table `kelas`
--

CREATE TABLE `kelas` (
  `id` int(11) NOT NULL,
  `namakelas` varchar(225) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `kelas`
--

INSERT INTO `kelas` (`id`, `namakelas`) VALUES
(3, '2A'),
(4, '2B');

-- --------------------------------------------------------

--
-- Table structure for table `peminjaman`
--

CREATE TABLE `peminjaman` (
  `id` varchar(225) NOT NULL,
  `id_user` int(11) NOT NULL,
  `id_anggota` int(11) NOT NULL,
  `tgl_pinjam` date NOT NULL,
  `tgl_kembali` date NOT NULL,
  `is_selesai` tinyint(1) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `peminjaman`
--

INSERT INTO `peminjaman` (`id`, `id_user`, `id_anggota`, `tgl_pinjam`, `tgl_kembali`, `is_selesai`) VALUES
('PEM230122074854', 7, 6, '2023-01-22', '2023-01-22', 1),
('PEM230124040059', 1, 6, '2023-01-24', '2023-01-31', 1),
('PEM230124041051', 1, 6, '2023-01-24', '2023-01-31', 0),
('PEM230124041437', 1, 6, '2023-01-24', '2023-01-31', 0),
('PEM230124042226', 1, 6, '2023-01-24', '2023-01-31', 1);

--
-- Triggers `peminjaman`
--
DELIMITER $$
CREATE TRIGGER `ad_peminjaman` AFTER DELETE ON `peminjaman` FOR EACH ROW UPDATE users SET users.`is_pinjam` = 0 WHERE users.`id` = OLD.id_anggota
$$
DELIMITER ;
DELIMITER $$
CREATE TRIGGER `ad_peminjaman_2` AFTER DELETE ON `peminjaman` FOR EACH ROW DELETE FROM detail_peminjaman WHERE detail_peminjaman.id_peminjaman = OLD.id
$$
DELIMITER ;
DELIMITER $$
CREATE TRIGGER `ai_peminjaman` AFTER INSERT ON `peminjaman` FOR EACH ROW update users set users.is_pinjam = 1 where users.id = NEW.id_anggota
$$
DELIMITER ;
DELIMITER $$
CREATE TRIGGER `au_peminjaman` AFTER UPDATE ON `peminjaman` FOR EACH ROW update buku
inner join 
detail_peminjaman on detail_peminjaman.id_buku = buku.kode_buku
set buku.jumlah = buku.jumlah - 1 where detail_peminjaman.id_peminjaman = OLD.id and buku.kode_buku = detail_peminjaman.id_buku
$$
DELIMITER ;
DELIMITER $$
CREATE TRIGGER `au_peminjaman2` AFTER UPDATE ON `peminjaman` FOR EACH ROW IF(NEW.is_selesai = 1)
THEN
UPDATE users set users.is_pinjam = 0 where users.id = OLD.id_anggota;
ELSE
UPDATE users set users.is_pinjam = 1 where users.id = OLD.id_anggota;
END IF
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `pengembalian`
--

CREATE TABLE `pengembalian` (
  `id` varchar(225) NOT NULL,
  `tanggal_pengembalian` date NOT NULL,
  `id_peminjaman` varchar(225) NOT NULL,
  `id_petugas` int(11) NOT NULL,
  `nominaldenda` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `pengembalian`
--

INSERT INTO `pengembalian` (`id`, `tanggal_pengembalian`, `id_peminjaman`, `id_petugas`, `nominaldenda`) VALUES
('PEM240123042514', '2023-01-24', 'PEM230124042226', 7, 0),
('PEM240123042916', '2023-01-24', 'PEM230122074854', 7, 1000),
('PEM240123042930', '2023-01-24', 'PEM230124040059', 7, 0);

--
-- Triggers `pengembalian`
--
DELIMITER $$
CREATE TRIGGER `ad_pengembalian` AFTER DELETE ON `pengembalian` FOR EACH ROW UPDATE peminjaman set peminjaman.is_selesai = 0 where peminjaman.id = OLD.id_peminjaman
$$
DELIMITER ;
DELIMITER $$
CREATE TRIGGER `ai_pengembalian` AFTER INSERT ON `pengembalian` FOR EACH ROW update buku
inner join 
detail_peminjaman on detail_peminjaman.id_buku = buku.kode_buku
set buku.jumlah = buku.jumlah + 1 where detail_peminjaman.id_peminjaman = NEW.id_peminjaman and buku.kode_buku = detail_peminjaman.id_buku
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `rak`
--

CREATE TABLE `rak` (
  `id` int(11) NOT NULL,
  `namarak` varchar(225) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `rak`
--

INSERT INTO `rak` (`id`, `namarak`) VALUES
(4, 'rak keren'),
(5, 'rak busuk');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `no_identitas` varchar(20) NOT NULL,
  `nama_user` varchar(225) NOT NULL,
  `jenis_kelamin` enum('Laki-Laki','Perempuan') NOT NULL,
  `alamat` text NOT NULL,
  `kelas` int(11) DEFAULT NULL,
  `no_telp` varchar(15) DEFAULT NULL,
  `status` enum('Siswa','Petugas','SuperUser') NOT NULL,
  `foto` varchar(225) DEFAULT NULL,
  `is_pinjam` tinyint(1) NOT NULL DEFAULT 0,
  `remember_token` varchar(225) DEFAULT NULL,
  `username` varchar(225) NOT NULL,
  `password` varchar(225) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `no_identitas`, `nama_user`, `jenis_kelamin`, `alamat`, `kelas`, `no_telp`, `status`, `foto`, `is_pinjam`, `remember_token`, `username`, `password`) VALUES
(6, '1234567890', 'Tito Otniels', 'Laki-Laki', 'Helvetia', 3, '085742645203', 'Siswa', '230122050131SI 518063110065 Tito Otniel _CPC2472 (2) copy_11zon.jpg', 1, NULL, 'tito', '$2y$10$fDXxHhxb1iacDL/O.XZTFu5YH8Q.1rsXgKt/T29AtbiWeOSjDSNs6'),
(7, '123456789', 'Anjay', 'Laki-Laki', 'Jln Alamat', NULL, '085742645203', 'Petugas', '230122065553SI 518063110065 Tito Otniel _CPC2472 (2) copy_11zon.jpg', 0, NULL, 'salah', '$2y$10$IR4pH7Mg7WEGXV8v8BzGZukP7iru9dcew8ek1yXSln4fWSplr9GjS'),
(8, '12345678954645', 'Jalan', 'Laki-Laki', 'Alamat', 3, '235324534', 'Siswa', '230124070147Screenshot 2023-01-19 141135.png', 0, NULL, 'bayu', '$2y$10$NSky7v8l2lS7Wv0Lxa.qG.UycmGh7QUEk7IyQXDrg5fhFcuxJcZUa');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `buku`
--
ALTER TABLE `buku`
  ADD PRIMARY KEY (`kode_buku`);

--
-- Indexes for table `detail_peminjaman`
--
ALTER TABLE `detail_peminjaman`
  ADD PRIMARY KEY (`id_detail_peminjaman`);

--
-- Indexes for table `kategori`
--
ALTER TABLE `kategori`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `kelas`
--
ALTER TABLE `kelas`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `peminjaman`
--
ALTER TABLE `peminjaman`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `pengembalian`
--
ALTER TABLE `pengembalian`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `rak`
--
ALTER TABLE `rak`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `detail_peminjaman`
--
ALTER TABLE `detail_peminjaman`
  MODIFY `id_detail_peminjaman` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `kategori`
--
ALTER TABLE `kategori`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `kelas`
--
ALTER TABLE `kelas`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `rak`
--
ALTER TABLE `rak`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

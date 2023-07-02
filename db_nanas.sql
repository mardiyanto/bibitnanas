-- phpMyAdmin SQL Dump
-- version 4.7.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: 02 Jul 2023 pada 14.44
-- Versi Server: 10.1.25-MariaDB
-- PHP Version: 5.6.31

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_nanas`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `bibit`
--

CREATE TABLE `bibit` (
  `id_bibit` int(100) NOT NULL,
  `kode_bibit` varchar(100) NOT NULL,
  `lokasi_bibit` varchar(100) NOT NULL,
  `luas_bibit` varchar(100) NOT NULL,
  `status_bibit` varchar(100) NOT NULL,
  `jenis_bibit` varchar(100) NOT NULL,
  `sempel_luas` varchar(100) NOT NULL,
  `jml_btg_normal` varchar(100) NOT NULL,
  `jml_btg_afkir` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `bibit`
--

INSERT INTO `bibit` (`id_bibit`, `kode_bibit`, `lokasi_bibit`, `luas_bibit`, `status_bibit`, `jenis_bibit`, `sempel_luas`, `jml_btg_normal`, `jml_btg_afkir`) VALUES
(2, 'PG1', '001B', '5', 'NSSC', 'Crown', '0.018', ' 29,944 ', ' 1,944 '),
(3, 'PG2', '001B', '9.5', 'NSSC', 'Crown', '0.018', ' 29,944 ', ' 1,944 ');

-- --------------------------------------------------------

--
-- Struktur dari tabel `galud`
--

CREATE TABLE `galud` (
  `id_galud` int(25) NOT NULL,
  `id_bibit` int(10) NOT NULL,
  `n_1` varchar(25) NOT NULL,
  `n_2` varchar(25) NOT NULL,
  `n_3` varchar(25) NOT NULL,
  `n_4` varchar(25) NOT NULL,
  `n_5` varchar(25) NOT NULL,
  `a_bd` varchar(25) NOT NULL,
  `a_c2` varchar(25) NOT NULL,
  `a_c3` varchar(25) NOT NULL,
  `a_dr` varchar(25) NOT NULL,
  `a_dt` varchar(25) NOT NULL,
  `a_k` varchar(25) NOT NULL,
  `a_rf` varchar(25) NOT NULL,
  `a_rm` varchar(25) NOT NULL,
  `a_t2` varchar(25) NOT NULL,
  `a_t3` varchar(25) NOT NULL,
  `status_galud` varchar(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `galud`
--

INSERT INTO `galud` (`id_galud`, `id_bibit`, `n_1`, `n_2`, `n_3`, `n_4`, `n_5`, `a_bd`, `a_c2`, `a_c3`, `a_dr`, `a_dt`, `a_k`, `a_rf`, `a_rm`, `a_t2`, `a_t3`, `status_galud`) VALUES
(3, 2, '4', '5', '5', '5', '5', '23', '5', '5', '5', '5', '5', '5', '5', '5', '5', 'luar'),
(4, 2, '4', '4', '4', '4', '4', '4', '4', '4', '4', '4', '4', '4', '4', '4', '4', 'dalam'),
(5, 3, '20', '20', '20', '20', '20', '20', '20', '20', '20', '20', '20', '20', '20', '20', '20', 'luar'),
(6, 3, '10', '10', '10', '10', '10', '10', '10', '10', '10', '10', '10', '10', '10', '10', '10', 'dalam');

-- --------------------------------------------------------

--
-- Struktur dari tabel `profil`
--

CREATE TABLE `profil` (
  `id_profil` int(20) NOT NULL,
  `nama_app` varchar(100) NOT NULL,
  `tahun` varchar(250) NOT NULL,
  `nama` varchar(250) NOT NULL,
  `alias` varchar(350) NOT NULL,
  `alamat` text NOT NULL,
  `isi` text NOT NULL,
  `gambar` varchar(100) NOT NULL,
  `akabest` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `profil`
--

INSERT INTO `profil` (`id_profil`, `nama_app`, `tahun`, `nama`, `alias`, `alamat`, `isi`, `gambar`, `akabest`) VALUES
(1, 'GGP', '2022/2023', 'BIBIT NANAS PT GGP', 'BIBIT NANAS', '-', '', '18102022034029.jpg', 'mardybest@gmail.com'),
(2, 're', '', 'MARDIYANTO', '19081989578978975', '', '', '', '');

-- --------------------------------------------------------

--
-- Struktur dari tabel `user`
--

CREATE TABLE `user` (
  `user_id` int(11) NOT NULL,
  `user_nama` varchar(100) NOT NULL,
  `user_username` varchar(100) NOT NULL,
  `user_password` varchar(100) NOT NULL,
  `user_foto` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data untuk tabel `user`
--

INSERT INTO `user` (`user_id`, `user_nama`, `user_username`, `user_password`, `user_foto`) VALUES
(1, 'Adminatun Jhony', 'admin', '21232f297a57a5a743894a0e4a801fc3', '482937136_avatar.png');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `bibit`
--
ALTER TABLE `bibit`
  ADD PRIMARY KEY (`id_bibit`);

--
-- Indexes for table `galud`
--
ALTER TABLE `galud`
  ADD PRIMARY KEY (`id_galud`),
  ADD KEY `id_bibit` (`id_bibit`);

--
-- Indexes for table `profil`
--
ALTER TABLE `profil`
  ADD PRIMARY KEY (`id_profil`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `bibit`
--
ALTER TABLE `bibit`
  MODIFY `id_bibit` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `galud`
--
ALTER TABLE `galud`
  MODIFY `id_galud` int(25) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `profil`
--
ALTER TABLE `profil`
  MODIFY `id_profil` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;
--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `galud`
--
ALTER TABLE `galud`
  ADD CONSTRAINT `galud_ibfk_1` FOREIGN KEY (`id_bibit`) REFERENCES `bibit` (`id_bibit`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

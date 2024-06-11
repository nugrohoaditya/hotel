-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 02 Jun 2024 pada 14.25
-- Versi server: 10.4.24-MariaDB
-- Versi PHP: 8.1.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `hotel`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `kamar`
--

CREATE TABLE `kamar` (
  `idkamar` int(10) NOT NULL,
  `tipe` varchar(50) NOT NULL,
  `jumlah` int(10) NOT NULL,
  `harga` int(10) NOT NULL,
  `gambar` varchar(100) NOT NULL,
  `video` varchar(500) NOT NULL,
  `stok` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `kamar`
--

INSERT INTO `kamar` (`idkamar`, `tipe`, `jumlah`, `harga`, `gambar`, `video`, `stok`) VALUES
(1, 'Standar', 20, 500000, 'standar.jpg', 'https://www.youtube.com/embed/sHYjBNtJJZw?si=MbRvNoc_5fjj-Xp_', 15),
(2, 'Deluxe', 10, 700000, 'deluxe.jpg', 'https://www.youtube.com/embed/sLbHiMmF5b8?si=GJMD-RaHbV5odqHf', 10),
(3, 'Family', 5, 1000000, 'family.jpg', 'https://www.youtube.com/embed/eSxArWhkpYI?si=PJyRCUIN8ZR9uW02', 5);

-- --------------------------------------------------------

--
-- Struktur dari tabel `pengunjung`
--

CREATE TABLE `pengunjung` (
  `idpeng` int(10) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `jk` varchar(10) NOT NULL,
  `nik` int(20) NOT NULL,
  `tipekamar` varchar(10) NOT NULL,
  `harga` int(10) NOT NULL,
  `tanggal` date NOT NULL,
  `durasi` int(5) NOT NULL,
  `breakfast` varchar(5) NOT NULL,
  `total` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `pengunjung`
--

INSERT INTO `pengunjung` (`idpeng`, `nama`, `jk`, `nik`, `tipekamar`, `harga`, `tanggal`, `durasi`, `breakfast`, `total`) VALUES
(5, 'aditya', 'Laki-Laki', 2147483647, 'Standar', 500000, '2024-06-04', 3, 'Ya', 3080000),
(6, 'nugroho', 'Laki-Laki', 2147483647, 'Standar', 500000, '2024-06-06', 5, 'Ya', 6822000);

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `kamar`
--
ALTER TABLE `kamar`
  ADD PRIMARY KEY (`idkamar`);

--
-- Indeks untuk tabel `pengunjung`
--
ALTER TABLE `pengunjung`
  ADD PRIMARY KEY (`idpeng`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `kamar`
--
ALTER TABLE `kamar`
  MODIFY `idkamar` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT untuk tabel `pengunjung`
--
ALTER TABLE `pengunjung`
  MODIFY `idpeng` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

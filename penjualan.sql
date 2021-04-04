-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 04 Apr 2021 pada 14.36
-- Versi server: 10.1.38-MariaDB
-- Versi PHP: 7.3.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `penjualan`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `complaint`
--

CREATE TABLE `complaint` (
  `id` int(11) NOT NULL,
  `custumers_id` int(11) NOT NULL,
  `foto` varchar(255) NOT NULL,
  `description` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `complaint`
--

INSERT INTO `complaint` (`id`, `custumers_id`, `foto`, `description`) VALUES
(7, 6, 'assets/uploads/2.png', 'aaa'),
(9, 6, 'assets/uploads/fa251c8aa5be7f9c7ba96a8372794d22.jpg', 'tt'),
(10, 6, 'assets/uploads/17.png', 'ut');

-- --------------------------------------------------------

--
-- Struktur dari tabel `customers`
--

CREATE TABLE `customers` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `nik` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `telp` varchar(100) NOT NULL,
  `rule` varchar(100) NOT NULL,
  `bod` date DEFAULT NULL,
  `address` text
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `customers`
--

INSERT INTO `customers` (`id`, `name`, `nik`, `email`, `password`, `telp`, `rule`, `bod`, `address`) VALUES
(6, 'aldi', '234234234', 'aldi@gmail.com', '1bbd886460827015e5d605ed44252251', '34534534534', 'Admin', '2021-04-24', 'sdfsdfdsf');

-- --------------------------------------------------------

--
-- Struktur dari tabel `respons`
--

CREATE TABLE `respons` (
  `id` int(11) NOT NULL,
  `custumers_id` int(11) NOT NULL,
  `complaint_id` int(11) NOT NULL,
  `description` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `respons`
--

INSERT INTO `respons` (`id`, `custumers_id`, `complaint_id`, `description`) VALUES
(1, 6, 7, 'ppppp'),
(2, 6, 9, 'test'),
(3, 6, 10, 'hh');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `complaint`
--
ALTER TABLE `complaint`
  ADD PRIMARY KEY (`id`),
  ADD KEY `complaint_custumers_id` (`custumers_id`);

--
-- Indeks untuk tabel `customers`
--
ALTER TABLE `customers`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `name` (`name`),
  ADD UNIQUE KEY `nik` (`nik`),
  ADD UNIQUE KEY `email` (`email`),
  ADD UNIQUE KEY `telp` (`telp`);

--
-- Indeks untuk tabel `respons`
--
ALTER TABLE `respons`
  ADD PRIMARY KEY (`id`),
  ADD KEY `respons_complaint_id` (`complaint_id`),
  ADD KEY `respons_customers_id` (`custumers_id`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `complaint`
--
ALTER TABLE `complaint`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT untuk tabel `customers`
--
ALTER TABLE `customers`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT untuk tabel `respons`
--
ALTER TABLE `respons`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `complaint`
--
ALTER TABLE `complaint`
  ADD CONSTRAINT `complaint_custumers_id` FOREIGN KEY (`custumers_id`) REFERENCES `customers` (`id`);

--
-- Ketidakleluasaan untuk tabel `respons`
--
ALTER TABLE `respons`
  ADD CONSTRAINT `respons_complaint_id` FOREIGN KEY (`complaint_id`) REFERENCES `complaint` (`id`),
  ADD CONSTRAINT `respons_customers_id` FOREIGN KEY (`custumers_id`) REFERENCES `customers` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

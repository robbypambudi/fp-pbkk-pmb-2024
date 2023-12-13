-- phpMyAdmin SQL Dump
-- version 4.9.5
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Jan 28, 2022 at 07:13 PM
-- Server version: 5.7.30
-- PHP Version: 7.4.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";

--
-- Database: `pmb2022`
--

-- --------------------------------------------------------

--
-- Table structure for table `akun`
--

CREATE TABLE `akun` (
  `id` int(11) NOT NULL,
  `email` varchar(128) NOT NULL,
  `password` varchar(256) NOT NULL,
  `nama` varchar(128) NOT NULL,
  `tmp_lahir` varchar(128) NOT NULL,
  `tgl_lahir` date NOT NULL,
  `kelamin` char(1) NOT NULL,
  `alamat` varchar(512) NOT NULL,
  `kota` varchar(64) NOT NULL,
  `provinsi` varchar(64) NOT NULL,
  `kode_pos` varchar(8) NOT NULL,
  `telp` varchar(16) NOT NULL,
  `hp` varchar(16) NOT NULL,
  `riwayat_penyakit` varchar(128) NOT NULL,
  `tinggi_badan` varchar(3) NOT NULL,
  `berat_badan` varchar(3) NOT NULL,
  `seragam` varchar(2) NOT NULL,
  `olahraga` varchar(2) NOT NULL,
  `sepatu_sekolah` varchar(2) NOT NULL,
  `sepatu_olahraga` varchar(2) NOT NULL,
  `lingkar_kepala` varchar(2) NOT NULL,
  `nisn` varchar(128) NOT NULL,
  `nik` varchar(16) NOT NULL,
  `photo` text NOT NULL,
  `nama_ibu` varchar(128) NOT NULL,
  `agama` int(11) NOT NULL,
  `nama_sma` varchar(128) NOT NULL,
  `alamat_sma` varchar(128) NOT NULL,
  `desa_sma` varchar(128) NOT NULL,
  `kec_sma` varchar(128) NOT NULL,
  `kota_sma` varchar(128) NOT NULL,
  `prov_sma` varchar(128) NOT NULL,
  `telp_sma` varchar(128) NOT NULL,
  `lulus_sma` int(11) NOT NULL,
  `nama_ayah` varchar(128) NOT NULL,
  `telp_ortu` varchar(128) NOT NULL,
  `active` int(1) NOT NULL DEFAULT '0',
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `akun`
--

INSERT INTO `akun` (`id`, `email`, `password`, `nama`, `tmp_lahir`, `tgl_lahir`, `kelamin`, `alamat`, `kota`, `provinsi`, `kode_pos`, `telp`, `hp`, `riwayat_penyakit`, `tinggi_badan`, `berat_badan`, `seragam`, `olahraga`, `sepatu_sekolah`, `sepatu_olahraga`, `lingkar_kepala`, `nisn`, `nik`, `photo`, `nama_ibu`, `agama`, `nama_sma`, `alamat_sma`, `desa_sma`, `kec_sma`, `kota_sma`, `prov_sma`, `telp_sma`, `lulus_sma`, `nama_ayah`, `telp_ortu`, `active`, `created_at`, `updated_at`) VALUES
(5, 'rochedi.adha@gmail.com', '$2y$10$Ro7mm2OsbrGaXa2IkUPBSejR93fgO.XyUpYuQWt.WtQZHDyLQbl4q', '', '', '0000-00-00', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '1111111111111111', 'default.png', '', 0, '', '', '', '', '', '', '', 0, '', '', 0, '2022-01-28 12:59:17', '2022-01-28 12:59:17'),
(6, 'rochedi.adha@idu.ac.id', '$2y$10$v9QffrCGrevLg6gQSPcfseL1xJ2JpoSPJJfasuRTaI5AIALUtZuWq', '', '', '0000-00-00', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '2222222222222222', 'default.png', '', 0, '', '', '', '', '', '', '', 0, '', '', 0, '2022-01-28 13:00:44', '2022-01-28 13:00:44');

-- --------------------------------------------------------

--
-- Table structure for table `token`
--

CREATE TABLE `token` (
  `id` int(11) NOT NULL,
  `email` varchar(128) NOT NULL,
  `token` varchar(128) NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `token`
--

INSERT INTO `token` (`id`, `email`, `token`, `created_at`, `updated_at`) VALUES
(4, 'rochedi.adha@gmail.com', 'ep+kJBjtuI8fi/ik24ZCAyfP153OkxyMzlDDX/u0IHk=', '2022-01-28 12:59:17', '2022-01-28 12:59:17'),
(5, 'rochedi.adha@idu.ac.id', '+kWiweOY0z8aIb8eJN95M4PkyJGXRtzSfjde7j1gikA=', '2022-01-28 13:00:44', '2022-01-28 13:00:44');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `akun`
--
ALTER TABLE `akun`
  ADD PRIMARY KEY (`id`),
  ADD KEY `idx_email` (`email`);

--
-- Indexes for table `token`
--
ALTER TABLE `token`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `akun`
--
ALTER TABLE `akun`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `token`
--
ALTER TABLE `token`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;


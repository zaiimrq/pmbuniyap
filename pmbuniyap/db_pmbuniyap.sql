-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Host: sql302.epizy.com
-- Waktu pembuatan: 05 Agu 2023 pada 20.03
-- Versi server: 10.4.17-MariaDB
-- Versi PHP: 7.2.22

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `epiz_34333116_db_pmbuniyap`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `cama`
--

CREATE TABLE `cama` (
  `nisn` int(11) NOT NULL,
  `nama` varchar(100) NOT NULL,
  `kode_prodi` int(11) DEFAULT NULL,
  `no_hp` varchar(15) NOT NULL,
  `email` varchar(100) NOT NULL,
  `thn_lulus` year(4) NOT NULL,
  `jalur_masuk` varchar(50) NOT NULL,
  `asal_sekolah` varchar(100) NOT NULL,
  `hasil_seleksi` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `cama`
--

INSERT INTO `cama` (`nisn`, `nama`, `kode_prodi`, `no_hp`, `email`, `thn_lulus`, `jalur_masuk`, `asal_sekolah`, `hasil_seleksi`) VALUES
(62718, 'Tristyas elda ', 55202, '08226381846', 'tyas@gmail.com', 2022, 'Mandiri', 'SMA', 'LULUS'),
(22641001, 'Slamet Shariful Zaidin', NULL, '', 'zaiimrq@gmail.com', 0000, '', '', ''),
(22641005, 'Slamet Shariful Zaidin', 22201, '085210495637', 'provitworkcuan@gmail.com', 2022, 'Mandiri', 'ma', 'LULUS'),
(24168906, 'Siti Aminah', 22201, '081291467451', 'sitiaminah@gmail.com', 2022, 'Mandiri', 'SMKN 1 Pariwisata Jayapura', 'LULUS'),
(76344888, 'Ajeng Kalista Rahma', 55202, '082253728296', 'ajengka@gmail.com', 2019, 'Mandiri', 'SMK 1 ', 'LULUS'),
(261819994, 'Ajeng Kalista Rahma', 55202, '082253718933', 'ajeng@gmail.com', 2022, 'mandiri', 'SMKN 1 Jayapura', 'LULUS'),
(2147483647, 'Siti Aminah', 22201, '081291467451', 'sitiaminah@gmail.com', 2022, 'mandiri', 'SMKN 1 Pariwisata Jayapura', 'LULUS');

-- --------------------------------------------------------

--
-- Struktur dari tabel `dokumen`
--

CREATE TABLE `dokumen` (
  `id_dokumen` int(11) NOT NULL,
  `nisn` int(11) DEFAULT NULL,
  `dokumen` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `dokumen`
--

INSERT INTO `dokumen` (`id_dokumen`, `nisn`, `dokumen`) VALUES
(37, 76344888, '76344888-Ajeng Kalista Rahma.pdf'),
(38, 22641005, '22641005-Slamet Shariful Zaidin.pdf'),
(39, 2147483647, '5501883628-Marsha Safira.pdf'),
(40, 62718, '62718-Tristyas elda .pdf');

-- --------------------------------------------------------

--
-- Struktur dari tabel `jadwal_pendaftaran`
--

CREATE TABLE `jadwal_pendaftaran` (
  `id_jadwal` int(11) NOT NULL,
  `agenda` varchar(100) DEFAULT NULL,
  `periode_mulai` date DEFAULT NULL,
  `periode_akhir` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `jadwal_pendaftaran`
--

INSERT INTO `jadwal_pendaftaran` (`id_jadwal`, `agenda`, `periode_mulai`, `periode_akhir`) VALUES
(1, 'Pendaftaran Gelombang 1', '2023-02-09', '2023-03-09'),
(2, 'Pendaftaran Gelombang 2', '2023-04-10', '2023-05-15'),
(4, 'Cetak Kartu Tes', '2023-07-03', '2023-07-10'),
(5, 'Pelaksanaan Ujian Offline', '2023-07-17', '2023-07-18'),
(6, 'Tes Wawancara Offline', '2023-07-19', '2023-07-20'),
(7, 'Pengumuman Hasil Seleksi', '2023-07-22', '2023-07-22'),
(8, 'Pembayaran UKT', '2023-07-24', '2023-06-27'),
(9, 'PKKMB', '2023-08-07', '2023-08-12');

-- --------------------------------------------------------

--
-- Struktur dari tabel `pendaftaran`
--

CREATE TABLE `pendaftaran` (
  `no_pendaftar` int(11) NOT NULL,
  `nisn` int(8) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `pendaftaran`
--

INSERT INTO `pendaftaran` (`no_pendaftar`, `nisn`, `password`) VALUES
(2023019, 2147483647, '$2y$10$tmpS7TWoD81KVtvtpN2hNOQBNCXvnSsXm/AucxjgcxTyc94RGCzE6'),
(2023091, 62718, '$2y$10$bUC719DEWTwXsZ6fuaP5N.x0yHpaag33RYFnSjgvgxk68ngrVX0SG'),
(2023152, 2147483647, '$2y$10$cBIfzesrpWZppT0IcpwMCu9UnlgVXprtyELiRX5HERzvObMvETyWq'),
(2023267, 22641001, '$2y$10$4VBBl9Tkn4rP39.w3m24xOO/4eG/U0XoS5GR27uZYMviajbWrA/o6'),
(2023405, 22641005, '$2y$10$5OLOcabawW3hitaZmEyIZO7KqAMhPcjFzavxy3lorPj6OZDRd7rle'),
(2023653, 24168906, '$2y$10$t21H2Ob0yBsGynvhB/.aAeNO7pisWOvUIZM5Lm/oXSRLVD/EEr9w6'),
(2023657, 76344888, '$2y$10$FK3bT5axuBgCx1uSYU8uIe9LgjSh.iN/wa6IB8a8kgQ3v9pkokHXy'),
(2023735, 261819994, '$2y$10$itYEbxJZiq7qkpFxqNZgde75XdSFWr6TqSMe1DOvwo5gM1TZ7575O');

-- --------------------------------------------------------

--
-- Struktur dari tabel `prog_studi`
--

CREATE TABLE `prog_studi` (
  `kode_prodi` int(8) NOT NULL,
  `prodi` varchar(100) NOT NULL,
  `fakultas` varchar(100) NOT NULL,
  `akreditasi` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `prog_studi`
--

INSERT INTO `prog_studi` (`kode_prodi`, `prodi`, `fakultas`, `akreditasi`) VALUES
(22201, 'Teknik Sipil', 'Teknik', 'Baik'),
(23201, 'Arsitektur', 'Teknik', 'Terakreditasi'),
(54243, 'Budidaya Perairan', 'Perikanan dan Ilmu Kelautan', 'B'),
(55202, 'Informatika', 'Ilmu Komputer', 'Terakreditasi'),
(57201, 'Sistem Informasi', 'Ilmu Komputer', 'B'),
(61201, 'Manajemen', 'Ekonomi dan Bisnis', 'B'),
(62201, 'Akuntansi', 'Ekonomi dan Bisnis', 'B'),
(63201, 'Ilmu Administrasi Negara', 'Ilmu Sosial dan Politik', 'B'),
(65201, 'Ilmu Pemerintahan', 'Ilmu Sosial dan Politik', 'B'),
(74201, 'Ilmu Hukum', 'Hukum', 'Baik'),
(86206, 'Pendididkan Guru Sekolah Dasar', 'Keguruan Dan Ilmu Pendidikan', 'Baik'),
(86208, 'Pendididkan Agama Islam', 'Agama Islam', 'B');

-- --------------------------------------------------------

--
-- Struktur dari tabel `user`
--

CREATE TABLE `user` (
  `id_user` int(11) NOT NULL,
  `username` varchar(100) DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `user`
--

INSERT INTO `user` (`id_user`, `username`, `password`) VALUES
(1, 'admin', 'admin');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `cama`
--
ALTER TABLE `cama`
  ADD PRIMARY KEY (`nisn`),
  ADD KEY `kode_prodi` (`kode_prodi`);

--
-- Indeks untuk tabel `dokumen`
--
ALTER TABLE `dokumen`
  ADD PRIMARY KEY (`id_dokumen`),
  ADD KEY `id_cama` (`nisn`);

--
-- Indeks untuk tabel `jadwal_pendaftaran`
--
ALTER TABLE `jadwal_pendaftaran`
  ADD PRIMARY KEY (`id_jadwal`);

--
-- Indeks untuk tabel `pendaftaran`
--
ALTER TABLE `pendaftaran`
  ADD PRIMARY KEY (`no_pendaftar`),
  ADD KEY `nisn` (`nisn`);

--
-- Indeks untuk tabel `prog_studi`
--
ALTER TABLE `prog_studi`
  ADD PRIMARY KEY (`kode_prodi`);

--
-- Indeks untuk tabel `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id_user`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `dokumen`
--
ALTER TABLE `dokumen`
  MODIFY `id_dokumen` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=41;

--
-- AUTO_INCREMENT untuk tabel `jadwal_pendaftaran`
--
ALTER TABLE `jadwal_pendaftaran`
  MODIFY `id_jadwal` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT untuk tabel `user`
--
ALTER TABLE `user`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `cama`
--
ALTER TABLE `cama`
  ADD CONSTRAINT `cama_ibfk_1` FOREIGN KEY (`kode_prodi`) REFERENCES `prog_studi` (`kode_prodi`);

--
-- Ketidakleluasaan untuk tabel `dokumen`
--
ALTER TABLE `dokumen`
  ADD CONSTRAINT `dokumen_ibfk_1` FOREIGN KEY (`nisn`) REFERENCES `cama` (`nisn`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `pendaftaran`
--
ALTER TABLE `pendaftaran`
  ADD CONSTRAINT `pendaftaran_ibfk_1` FOREIGN KEY (`nisn`) REFERENCES `cama` (`nisn`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

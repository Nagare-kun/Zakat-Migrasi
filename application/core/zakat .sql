-- phpMyAdmin SQL Dump
-- version 4.7.7
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 06 Jan 2019 pada 03.56
-- Versi server: 10.1.30-MariaDB
-- Versi PHP: 7.2.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `zakat`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `hewan_kurban`
--

CREATE TABLE `hewan_kurban` (
  `id` int(6) NOT NULL,
  `id_admin` int(5) NOT NULL,
  `tanggal` date NOT NULL,
  `penyumbang` varchar(255) NOT NULL,
  `alamat` varchar(30) NOT NULL,
  `jenis` tinyint(1) NOT NULL,
  `jumlah` smallint(4) NOT NULL,
  `log_time` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Struktur dari tabel `jabatan`
--

CREATE TABLE `jabatan` (
  `id` int(3) NOT NULL,
  `nama` varchar(30) NOT NULL,
  `keterangan` varchar(80) NOT NULL,
  `status_aktif` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Struktur dari tabel `jadwal`
--

CREATE TABLE `jadwal` (
  `id` int(6) NOT NULL,
  `kode_jadwal` int(1) NOT NULL,
  `imam` varchar(30) NOT NULL,
  `bilal` varchar(30) NOT NULL,
  `ceramah` tinyint(1) NOT NULL,
  `tanggal` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data untuk tabel `jadwal`
--

INSERT INTO `jadwal` (`id`, `kode_jadwal`, `imam`, `bilal`, `ceramah`, `tanggal`) VALUES
(6, 1, 'Gunardi', 'Fauzan', 0, '2018-11-01'),
(7, 1, 'Pak Agus', 'Fikri', 1, '2018-11-02'),
(8, 1, 'Mas Hamim', 'Qodir', 0, '2018-11-03'),
(14, 1, 'Afif', 'Fauzan', 0, '2018-11-04'),
(15, 1, 'alucard', 'kagura', 0, '2018-11-05'),
(16, 1, 'balmond', 'wanda', 0, '2018-11-06'),
(17, 1, 'Wibu', 'Kpop', 0, '2018-11-07'),
(18, 2, 'test 1', 'test 1', 1, '2018-11-02'),
(19, 2, 'test 2', 'test 2', 1, '2018-11-09'),
(20, 2, 'test 3', 'test 3', 1, '2018-11-16'),
(22, 3, '&lt;script&gt;alert(&quot;asda', 'hgc', 1, '2018-12-06');

-- --------------------------------------------------------

--
-- Struktur dari tabel `kas_masjid`
--

CREATE TABLE `kas_masjid` (
  `id` int(11) NOT NULL,
  `id_admin` int(5) DEFAULT NULL,
  `id_tipe` int(1) DEFAULT NULL,
  `nama_donatur` varchar(30) NOT NULL,
  `jumlah` int(11) NOT NULL,
  `keterangan` varchar(100) NOT NULL DEFAULT '-',
  `tanggal` varchar(25) NOT NULL,
  `kategori` tinyint(1) UNSIGNED NOT NULL COMMENT 'kategori 1 untuk Kotak Amal',
  `log_time` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data untuk tabel `kas_masjid`
--

INSERT INTO `kas_masjid` (`id`, `id_admin`, `id_tipe`, `nama_donatur`, `jumlah`, `keterangan`, `tanggal`, `kategori`, `log_time`) VALUES
(22, NULL, 1, 'M Nur Fauzan W', 500000, '', '26-October-2018', 0, '2018-10-24 03:32:47'),
(23, NULL, 1, 'terserah', 500000, '-', '08-November-2018', 0, '2018-11-08 00:58:41'),
(24, NULL, 1, '-', 500000, '', '24-November-2018', 1, '2018-11-24 14:59:06');

-- --------------------------------------------------------

--
-- Struktur dari tabel `lap_pengeluaran`
--

CREATE TABLE `lap_pengeluaran` (
  `id_pengeluaran` int(11) NOT NULL,
  `id_admin` int(10) DEFAULT NULL,
  `tanggal` date NOT NULL,
  `jumlah` int(10) NOT NULL,
  `log_time` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `keterangan` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `lap_pengeluaran`
--

INSERT INTO `lap_pengeluaran` (`id_pengeluaran`, `id_admin`, `tanggal`, `jumlah`, `log_time`, `keterangan`) VALUES
(2, 8, '2018-12-05', 3515335, '2018-12-03 07:24:29', 'Initial Testa');

-- --------------------------------------------------------

--
-- Struktur dari tabel `list_anggota`
--

CREATE TABLE `list_anggota` (
  `id_anggota` int(11) NOT NULL,
  `nama` varchar(30) NOT NULL,
  `alamat` varchar(30) NOT NULL,
  `no_hp` varchar(13) NOT NULL,
  `no_telp` varchar(13) NOT NULL,
  `jenis_kelamin` varchar(1) NOT NULL,
  `status` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data untuk tabel `list_anggota`
--

INSERT INTO `list_anggota` (`id_anggota`, `nama`, `alamat`, `no_hp`, `no_telp`, `jenis_kelamin`, `status`) VALUES
(1, 'M Nur Fauzan W ', 'Kapas Madya 3i/4', '083849575737', '', 'L', 1),
(2, 'Ikhya Mumuludin', 'Sembarang', '09123618', '', 'P', 0);

-- --------------------------------------------------------

--
-- Struktur dari tabel `list_zakat`
--

CREATE TABLE `list_zakat` (
  `nomor` int(11) NOT NULL,
  `id_admin` int(5) DEFAULT NULL,
  `tanggal` date NOT NULL,
  `nama` varchar(20) NOT NULL,
  `alamat` varchar(30) NOT NULL,
  `zakat_fitrah` varchar(20) NOT NULL,
  `beli` int(1) DEFAULT NULL,
  `zakat_mall` varchar(20) NOT NULL,
  `infaq` varchar(20) NOT NULL,
  `log_time` timestamp NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `list_zakat`
--

INSERT INTO `list_zakat` (`nomor`, `id_admin`, `tanggal`, `nama`, `alamat`, `zakat_fitrah`, `beli`, `zakat_mall`, `infaq`, `log_time`) VALUES
(18, NULL, '2018-10-24', 'M Nur Fauzan W', 'kapas madya 3i', '5', 0, '5', '', '0000-00-00 00:00:00'),
(19, NULL, '2018-11-24', 'M Nur Fauzan W', 'kapas madya 3i', '5', 0, '', '', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Struktur dari tabel `master_login`
--

CREATE TABLE `master_login` (
  `id_admin` int(5) NOT NULL,
  `kode_akses` int(1) DEFAULT NULL,
  `nama` varchar(30) CHARACTER SET latin1 NOT NULL,
  `username` varchar(30) CHARACTER SET latin1 NOT NULL,
  `password` varchar(32) CHARACTER SET latin1 NOT NULL,
  `status_aktif` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data untuk tabel `master_login`
--

INSERT INTO `master_login` (`id_admin`, `kode_akses`, `nama`, `username`, `password`, `status_aktif`) VALUES
(8, 1, 'M Nur Fauzan W', 'admin', '282134daedcb22b0318581561156a09a', 1),
(9, 2, 'Tester', 'test', '21232f297a57a5a743894a0e4a801fc3', 1);

-- --------------------------------------------------------

--
-- Struktur dari tabel `menu_child`
--

CREATE TABLE `menu_child` (
  `kode_menu_child` int(11) NOT NULL,
  `kode_menu_header` int(11) NOT NULL,
  `menu_name` varchar(100) NOT NULL,
  `file_php` varchar(20) NOT NULL,
  `status_aktif` varchar(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `menu_child`
--

INSERT INTO `menu_child` (`kode_menu_child`, `kode_menu_header`, `menu_name`, `file_php`, `status_aktif`) VALUES
(1, 3, 'Laporan Zakat & Infaq', 'zakat_ctrl', 'YES'),
(2, 3, 'Kotak Amal Sholat Jumat', 'jumat_php', 'NO'),
(3, 3, 'Kotak Amal Sholat Tarawih', 'tarawih_php', 'NO'),
(4, 3, 'Kotak Amal Idul Fitri', 'Amal_idul_fitri', 'NO'),
(5, 3, 'Kotak Amal Idul Adha', 'Amal_idul_adha', 'NO'),
(6, 3, 'Laporan Hewan Kurban', 'Hewan_kurban', 'YES'),
(7, 3, 'Laporan Pengeluaran', 'Lap_pengeluaran', 'YES'),
(8, 3, 'Kotak Amal Ahad Dhuha', 'ahad_dhuha', 'NO'),
(10, 4, 'Jadwal Sholat Tarawih', 'jadwal_tarawih_ctrl', 'YES'),
(11, 4, 'Jadwal Sholat Jum\'at', 'Jadwal_jumat_ctrl', 'YES'),
(12, 4, 'Jadwal Sholat Dhuha', 'Jadwal_dhuha_ctrl', 'YES'),
(13, 4, 'Kotak Amal Idul Adha', 'trans_idul_adha', 'NO'),
(14, 4, 'Hewan Kurban', 'trans_hewan_kurban', 'NO'),
(15, 4, 'Pengeluaran', 'trans_pengeluaran', 'NO'),
(16, 4, 'Kotak Amal Ahad Dhuha', 'trans_ahad_dhuha', 'NO'),
(17, 5, 'Ganti Password', 'Setting_pass', 'YES'),
(18, 5, 'Set Hak Akses', 'Hak_akses_ctrl', 'YES'),
(19, 5, 'Setting Menu', 'Menu_level', 'YES'),
(20, 5, 'Daftar User', 'user_ctrl', 'YES'),
(21, 5, 'Cabang', 'Setting_cabang', 'NO'),
(22, 5, 'Menu Child', 'Setting_child', 'NO'),
(23, 5, 'Menu Header', 'Setting_header', 'NO'),
(24, 3, 'Laporan Kotak Amal', 'Kotak_amal_ctrl', 'YES'),
(25, 1, 'Kas Masjid', '-', 'YES'),
(26, 2, 'Takmir', '-', 'YES'),
(27, 5, 'Setting Jabatan', 'Jabatan_ctrl', 'YES');

-- --------------------------------------------------------

--
-- Struktur dari tabel `menu_hak_akses`
--

CREATE TABLE `menu_hak_akses` (
  `kode_akses` int(1) NOT NULL,
  `hak_akses` varchar(20) CHARACTER SET latin1 NOT NULL,
  `keterangan` varchar(100) CHARACTER SET latin1 NOT NULL,
  `status_aktif` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data untuk tabel `menu_hak_akses`
--

INSERT INTO `menu_hak_akses` (`kode_akses`, `hak_akses`, `keterangan`, `status_aktif`) VALUES
(1, 'Virgorasion', '', 1),
(2, 'Tester', 'untuk debugging', 1);

-- --------------------------------------------------------

--
-- Struktur dari tabel `menu_header`
--

CREATE TABLE `menu_header` (
  `kode_menu_header` int(11) NOT NULL,
  `link` varchar(20) NOT NULL,
  `icon` varchar(20) NOT NULL,
  `menu_header` varchar(20) NOT NULL,
  `menu_child` int(1) NOT NULL,
  `status_aktif` varchar(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `menu_header`
--

INSERT INTO `menu_header` (`kode_menu_header`, `link`, `icon`, `menu_header`, `menu_child`, `status_aktif`) VALUES
(1, 'kas_ctrl', 'fa fa-dollar', 'Kas Masjid', 0, 'YES'),
(2, 'takmir_ctrl', 'fa fa-users', 'Takmir', 0, 'YES'),
(3, '#', 'fa fa-link', 'LAPORAN', 1, 'YES'),
(4, '#', 'fa fa-calendar', 'JADWAL', 1, 'YES'),
(5, '#', 'fa fa-gear', 'PENGATURAN', 1, 'YES');

-- --------------------------------------------------------

--
-- Struktur dari tabel `menu_level`
--

CREATE TABLE `menu_level` (
  `kode_menu_level` int(11) NOT NULL,
  `kode_akses` int(1) NOT NULL,
  `kode_menu_child` int(11) DEFAULT NULL,
  `akses_insert` tinyint(1) NOT NULL,
  `akses_view` tinyint(1) NOT NULL,
  `akses_edit` tinyint(1) NOT NULL,
  `akses_delete` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `menu_level`
--

INSERT INTO `menu_level` (`kode_menu_level`, `kode_akses`, `kode_menu_child`, `akses_insert`, `akses_view`, `akses_edit`, `akses_delete`) VALUES
(73, 4, 1, 0, 1, 0, 0),
(74, 4, 6, 0, 1, 0, 0),
(75, 4, 7, 0, 1, 0, 0),
(76, 4, 10, 0, 1, 0, 0),
(77, 4, 11, 0, 1, 0, 0),
(78, 4, 12, 0, 1, 0, 0),
(79, 4, 17, 0, 1, 0, 0),
(80, 4, 18, 0, 1, 0, 0),
(81, 4, 19, 0, 1, 0, 0),
(82, 4, 20, 0, 1, 0, 0),
(83, 4, 24, 0, 1, 0, 0),
(84, 4, 25, 0, 1, 0, 0),
(85, 4, 26, 0, 1, 0, 0),
(86, 5, 1, 0, 1, 0, 0),
(87, 5, 6, 0, 1, 0, 0),
(88, 5, 7, 0, 1, 0, 0),
(89, 5, 10, 0, 1, 0, 0),
(90, 5, 11, 0, 1, 0, 0),
(91, 5, 12, 0, 1, 0, 0),
(92, 5, 17, 0, 1, 0, 0),
(93, 5, 18, 0, 0, 0, 0),
(94, 5, 19, 0, 0, 0, 0),
(95, 5, 20, 0, 0, 0, 0),
(96, 5, 24, 0, 1, 0, 0),
(97, 5, 25, 0, 1, 0, 0),
(98, 5, 26, 0, 1, 0, 0),
(99, 1, 1, 1, 1, 1, 1),
(100, 1, 6, 1, 1, 1, 1),
(101, 1, 7, 1, 1, 1, 1),
(102, 1, 10, 1, 1, 1, 1),
(103, 1, 11, 1, 1, 1, 1),
(104, 1, 12, 1, 1, 1, 1),
(105, 1, 17, 1, 1, 1, 1),
(106, 1, 18, 1, 1, 1, 1),
(107, 1, 19, 1, 1, 1, 1),
(108, 1, 20, 1, 1, 1, 1),
(109, 1, 24, 1, 1, 1, 1),
(110, 1, 25, 1, 1, 1, 1),
(111, 1, 26, 1, 1, 1, 1),
(112, 1, 27, 1, 1, 1, 1),
(169, 2, 1, 0, 0, 0, 0),
(170, 2, 6, 0, 1, 0, 0),
(171, 2, 7, 0, 1, 0, 0),
(172, 2, 10, 0, 1, 0, 0),
(173, 2, 11, 0, 1, 0, 0),
(174, 2, 12, 0, 1, 0, 0),
(175, 2, 17, 0, 1, 0, 0),
(176, 2, 18, 0, 0, 0, 0),
(177, 2, 19, 0, 0, 0, 0),
(178, 2, 20, 0, 0, 0, 0),
(179, 2, 24, 0, 1, 0, 0),
(180, 2, 25, 0, 1, 0, 0),
(181, 2, 26, 0, 1, 0, 0),
(182, 2, 27, 0, 1, 0, 0);

-- --------------------------------------------------------

--
-- Struktur dari tabel `takmir`
--

CREATE TABLE `takmir` (
  `id` int(6) NOT NULL,
  `id_anggota` int(6) NOT NULL,
  `id_jabatan` int(3) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data untuk tabel `takmir`
--

INSERT INTO `takmir` (`id`, `id_anggota`, `id_jabatan`) VALUES
(11, 1, 1);

-- --------------------------------------------------------

--
-- Struktur dari tabel `tipe_donasi`
--

CREATE TABLE `tipe_donasi` (
  `id_tipe` int(1) NOT NULL,
  `tipe` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data untuk tabel `tipe_donasi`
--

INSERT INTO `tipe_donasi` (`id_tipe`, `tipe`) VALUES
(1, 'Amal Jumatan'),
(2, 'Amal Ahad Dhuha'),
(3, 'Amal Tarawih'),
(4, 'Amal Idul Fitri'),
(5, 'Amal Idul Adha'),
(6, 'Donatur Tetap'),
(7, 'Donatur Tidak Tetap'),
(8, 'Infaq'),
(9, 'Undefined');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `hewan_kurban`
--
ALTER TABLE `hewan_kurban`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_admin` (`id_admin`);

--
-- Indeks untuk tabel `jabatan`
--
ALTER TABLE `jabatan`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `jadwal`
--
ALTER TABLE `jadwal`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `kas_masjid`
--
ALTER TABLE `kas_masjid`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_admin` (`id_admin`),
  ADD KEY `id_tipe` (`id_tipe`);

--
-- Indeks untuk tabel `lap_pengeluaran`
--
ALTER TABLE `lap_pengeluaran`
  ADD PRIMARY KEY (`id_pengeluaran`),
  ADD KEY `id_admin` (`id_admin`);

--
-- Indeks untuk tabel `list_anggota`
--
ALTER TABLE `list_anggota`
  ADD PRIMARY KEY (`id_anggota`);

--
-- Indeks untuk tabel `list_zakat`
--
ALTER TABLE `list_zakat`
  ADD PRIMARY KEY (`nomor`),
  ADD KEY `id_admin` (`id_admin`);

--
-- Indeks untuk tabel `master_login`
--
ALTER TABLE `master_login`
  ADD PRIMARY KEY (`id_admin`),
  ADD KEY `kode_akses` (`kode_akses`);

--
-- Indeks untuk tabel `menu_child`
--
ALTER TABLE `menu_child`
  ADD PRIMARY KEY (`kode_menu_child`),
  ADD KEY `kode_menu_header` (`kode_menu_header`);

--
-- Indeks untuk tabel `menu_hak_akses`
--
ALTER TABLE `menu_hak_akses`
  ADD PRIMARY KEY (`kode_akses`);

--
-- Indeks untuk tabel `menu_header`
--
ALTER TABLE `menu_header`
  ADD PRIMARY KEY (`kode_menu_header`);

--
-- Indeks untuk tabel `menu_level`
--
ALTER TABLE `menu_level`
  ADD PRIMARY KEY (`kode_menu_level`),
  ADD KEY `kode_akses` (`kode_akses`,`kode_menu_child`),
  ADD KEY `kode_menu_child` (`kode_menu_child`);

--
-- Indeks untuk tabel `takmir`
--
ALTER TABLE `takmir`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_anggota` (`id_anggota`),
  ADD KEY `id_jabatan` (`id_jabatan`);

--
-- Indeks untuk tabel `tipe_donasi`
--
ALTER TABLE `tipe_donasi`
  ADD PRIMARY KEY (`id_tipe`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `hewan_kurban`
--
ALTER TABLE `hewan_kurban`
  MODIFY `id` int(6) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `jabatan`
--
ALTER TABLE `jabatan`
  MODIFY `id` int(3) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `jadwal`
--
ALTER TABLE `jadwal`
  MODIFY `id` int(6) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT untuk tabel `kas_masjid`
--
ALTER TABLE `kas_masjid`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT untuk tabel `lap_pengeluaran`
--
ALTER TABLE `lap_pengeluaran`
  MODIFY `id_pengeluaran` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT untuk tabel `list_anggota`
--
ALTER TABLE `list_anggota`
  MODIFY `id_anggota` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT untuk tabel `list_zakat`
--
ALTER TABLE `list_zakat`
  MODIFY `nomor` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT untuk tabel `master_login`
--
ALTER TABLE `master_login`
  MODIFY `id_admin` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT untuk tabel `menu_child`
--
ALTER TABLE `menu_child`
  MODIFY `kode_menu_child` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- AUTO_INCREMENT untuk tabel `menu_hak_akses`
--
ALTER TABLE `menu_hak_akses`
  MODIFY `kode_akses` int(1) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT untuk tabel `menu_header`
--
ALTER TABLE `menu_header`
  MODIFY `kode_menu_header` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT untuk tabel `menu_level`
--
ALTER TABLE `menu_level`
  MODIFY `kode_menu_level` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=183;

--
-- AUTO_INCREMENT untuk tabel `takmir`
--
ALTER TABLE `takmir`
  MODIFY `id` int(6) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT untuk tabel `tipe_donasi`
--
ALTER TABLE `tipe_donasi`
  MODIFY `id_tipe` int(1) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `hewan_kurban`
--
ALTER TABLE `hewan_kurban`
  ADD CONSTRAINT `hewan_kurban_ibfk_1` FOREIGN KEY (`id_admin`) REFERENCES `master_login` (`id_admin`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `jabatan`
--
ALTER TABLE `jabatan`
  ADD CONSTRAINT `jabatan_ibfk_1` FOREIGN KEY (`id`) REFERENCES `takmir` (`id_jabatan`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `kas_masjid`
--
ALTER TABLE `kas_masjid`
  ADD CONSTRAINT `kas_masjid_ibfk_1` FOREIGN KEY (`id_admin`) REFERENCES `master_login` (`id_admin`) ON DELETE SET NULL ON UPDATE CASCADE,
  ADD CONSTRAINT `kas_masjid_ibfk_2` FOREIGN KEY (`id_tipe`) REFERENCES `tipe_donasi` (`id_tipe`) ON DELETE SET NULL ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `lap_pengeluaran`
--
ALTER TABLE `lap_pengeluaran`
  ADD CONSTRAINT `lap_pengeluaran_ibfk_1` FOREIGN KEY (`id_admin`) REFERENCES `master_login` (`id_admin`) ON DELETE SET NULL ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `list_zakat`
--
ALTER TABLE `list_zakat`
  ADD CONSTRAINT `list_zakat_ibfk_1` FOREIGN KEY (`id_admin`) REFERENCES `master_login` (`id_admin`) ON DELETE SET NULL ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `master_login`
--
ALTER TABLE `master_login`
  ADD CONSTRAINT `master_login_ibfk_1` FOREIGN KEY (`kode_akses`) REFERENCES `menu_hak_akses` (`kode_akses`) ON DELETE SET NULL ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `menu_child`
--
ALTER TABLE `menu_child`
  ADD CONSTRAINT `menu_child_ibfk_1` FOREIGN KEY (`kode_menu_header`) REFERENCES `menu_header` (`kode_menu_header`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `menu_level`
--
ALTER TABLE `menu_level`
  ADD CONSTRAINT `menu_level_ibfk_1` FOREIGN KEY (`kode_menu_child`) REFERENCES `menu_child` (`kode_menu_child`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `takmir`
--
ALTER TABLE `takmir`
  ADD CONSTRAINT `takmir_ibfk_1` FOREIGN KEY (`id_anggota`) REFERENCES `list_anggota` (`id_anggota`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

-- phpMyAdmin SQL Dump
-- version 3.4.11.1
-- http://www.phpmyadmin.net
--
-- Inang: localhost
-- Waktu pembuatan: 06 Jun 2013 pada 14.15
-- Versi Server: 5.5.23
-- Versi PHP: 5.2.17

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Basis data: `ebaay_sikost`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `administrator`
--

CREATE TABLE IF NOT EXISTS `administrator` (
  `username` varchar(20) NOT NULL,
  `password` varchar(100) NOT NULL,
  PRIMARY KEY (`username`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `administrator`
--

INSERT INTO `administrator` (`username`, `password`) VALUES
('Fadhil Sultoni', 'selen'),
('IqrarMulfi', 'selen'),
('Ryan Riandi', 'e488d3be9c3bded7e0770e18d0d1e4ea'),
('Yohanes Marganda', 'e488d3be9c3bded7e0770e18d0d1e4ea');

-- --------------------------------------------------------

--
-- Struktur dari tabel `gambar`
--

CREATE TABLE IF NOT EXISTS `gambar` (
  `nomor` int(11) NOT NULL AUTO_INCREMENT,
  `idkost` int(11) NOT NULL,
  `keterangan` text,
  PRIMARY KEY (`nomor`),
  KEY `idkost` (`idkost`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=38 ;

--
-- Dumping data untuk tabel `gambar`
--

INSERT INTO `gambar` (`nomor`, `idkost`, `keterangan`) VALUES
(1, 2, 'Ruang tamu'),
(2, 2, 'Ruang diskusi'),
(3, 2, 'Ruang bersama'),
(4, 2, 'Ruang rekreasi'),
(5, 3, 'Ruang yoga'),
(6, 3, 'Kamar Standar'),
(13, 2, 'Kamar berAC'),
(19, 2, 'kamar vip'),
(20, 2, 'kamar ekonomis'),
(22, 2, 'kamar rahasia'),
(31, 2, 'captcha boy'),
(32, 2, 'dfgdfgfdgfdgfd'),
(33, 2, 'dfgdfgfdgfdgfd'),
(34, 3, 'view dari kos'),
(35, 3, 'view dari kos'),
(36, 5, ''),
(37, 5, '');

-- --------------------------------------------------------

--
-- Struktur dari tabel `kamar_kost`
--

CREATE TABLE IF NOT EXISTS `kamar_kost` (
  `idkamar` varchar(10) NOT NULL,
  `harga` varchar(8) NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT '0',
  `idKost` int(11) NOT NULL,
  `penghuni` varchar(20) DEFAULT NULL,
  `fasilitas` set('kamar mandi','AC','wireless internet','LAN internet','pusat kebugaran','jasa laundry','jasa cleaning service','pemadam kebakaran') DEFAULT NULL,
  PRIMARY KEY (`idkamar`,`idKost`),
  KEY `idKost` (`idKost`),
  KEY `penghuni` (`penghuni`),
  KEY `penghuni_2` (`penghuni`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `kamar_kost`
--

INSERT INTO `kamar_kost` (`idkamar`, `harga`, `status`, `idKost`, `penghuni`, `fasilitas`) VALUES
('A1', '900001', 1, 2, 'b@gmail.com', 'kamar mandi,AC,wireless internet,LAN internet,pusat kebugaran,jasa laundry,jasa cleaning service,pemadam kebakaran'),
('B2', '700000', 1, 2, 'g@gmail.com', 'kamar mandi,AC,wireless internet,LAN internet,pusat kebugaran,jasa laundry,jasa cleaning service,pemadam kebakaran'),
('e203', '1000000', 1, 3, 'madara@madara.com', 'pusat kebugaran,jasa laundry,jasa cleaning service,pemadam kebakaran'),
('e204', '900000', 1, 3, 'naruto@naru.com', 'kamar mandi,AC,wireless internet,LAN internet'),
('e301', '900000', 1, 3, 'b@gmail.com', 'kamar mandi,AC,wireless internet,LAN internet'),
('e302', '1000000', 1, 3, 'surya@di.com', 'pusat kebugaran,jasa laundry,jasa cleaning service,pemadam kebakaran'),
('e303', '1000000', 1, 3, 'naruto@naru.com', 'pusat kebugaran,jasa laundry,jasa cleaning service,pemadam kebakaran'),
('e304', '900000', 1, 3, 'sasuke@sasuke.com', 'kamar mandi,AC,wireless internet,LAN internet'),
('e409', '500000', 0, 3, NULL, 'kamar mandi');

-- --------------------------------------------------------

--
-- Struktur dari tabel `pemilik_kost`
--

CREATE TABLE IF NOT EXISTS `pemilik_kost` (
  `noTelp` varchar(12) NOT NULL,
  `nama` varchar(20) NOT NULL,
  `noRek` varchar(15) NOT NULL,
  `alamat` text NOT NULL,
  `verified` tinyint(1) DEFAULT '0',
  `email` varchar(100) NOT NULL,
  `password` varchar(255) NOT NULL,
  `rangeHarga` int(20) DEFAULT NULL,
  `namaKost` varchar(20) NOT NULL,
  `kuota` int(20) NOT NULL,
  PRIMARY KEY (`email`),
  KEY `Menyetujui` (`verified`),
  KEY `Menyetujui_2` (`verified`),
  KEY `Menyetujui_3` (`verified`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `pemilik_kost`
--

INSERT INTO `pemilik_kost` (`noTelp`, `nama`, `noRek`, `alamat`, `verified`, `email`, `password`, `rangeHarga`, `namaKost`, `kuota`) VALUES
('0', 'Unica baru', '', 'Jalan Kutek Barat', 1, '0', 'd41d8cd98f00b204e9800998ecf8427e', 0, '0', 6),
('0218456984', 'ayu', '', 'Ayu', 1, 'ayu@ayu.com', 'ef7cc633549a95246354cccecd7b8c9e', 0, '0', 10),
('0218456984', 'Coba Pemilik', '', 'Saja', 1, 'coba@pemilik.com', '1621a5dc746d5d19665ed742b2ef9736', 0, '0', 10),
('12345', 'faruq', '', 'depok', 1, 'faruq@faruq.com', '8e9f4806d6cdc02e0a064110e8070571', 0, '0', 21),
('0218752382', 'Samsudin', '21893712893', 'jalan sudirman', 1, 'gee@gmail.com', 'e488d3be9c3bded7e0770e18d0d1e4ea', 0, 'fokus', 0),
('0812345678', 'Gilang Kusuma Jati', '', 'Kukel 1', 0, 'gilang.kusuma@live.com', '25d55ad283aa400af464c76d713c07ad', 0, '0', 10),
('085718915280', 'IQRAR MULFI', '', 'Mulfi', 0, 'iqrarmulfi2012@gmail.com', '80c4ceaabfc444a437a69c6eafedba49', 0, '0', 10),
('182937123', 'jodi', '', 'Jalan kutek barat', 1, 'jo@di.com', 'e488d3be9c3bded7e0770e18d0d1e4ea', 0, '0', 80),
('08577', 'Muhamad', '', 'Jl. Mangga', 1, 'muhamad@gmail.com', 'cebd50a2aac0ee7ad9d6094e67d4e421', 0, '0', 10),
('0218456984', 'Pemilik Kost', '', 'Kost 1', 1, 'pemilik@pemilik.com', '58399557dae3c60e23c78606771dfa3d', 0, '0', 5),
('12345', 'rinaldi', '', 'depok', 0, 'rinaldi@rinaldi.com', '5cb35744bc37d7c46fd3664a50cb4f95', 0, '0', 15),
('12345', 'sakura', '', 'depok', 1, 'sakura@sakura.com', '149afd631693c895f81e508eb5aaef37', 0, '0', 15),
('12387', 'snzen', '', '', 0, 'sanzen@sekai.com', 'e488d3be9c3bded7e0770e18d0d1e4ea', 0, '', 0),
('085718319393', 'Fadhil Sultoni', '', 'Di Hatimu', 0, 'shinra@gmail.com', 'f2ebcb7c67e093f5a78f23a181470609', 0, '0', 5),
('081514823788', 'Surya Pro', '', 'Jalan Kutek TImur', 0, 'Surya@pro.com', 'e488d3be9c3bded7e0770e18d0d1e4ea', 0, '0', 90),
('081514823788', 'Surya Pro', '', 'Jalan Kutek TImur', 0, 'Surya@pro2.com', 'e488d3be9c3bded7e0770e18d0d1e4ea', 0, '0', 90),
('081514823788', 'Surya Pro', '', 'Jalan Kutek TImur', 1, 'Surya@pro3.com', 'e488d3be9c3bded7e0770e18d0d1e4ea', 0, '0', 90);

-- --------------------------------------------------------

--
-- Struktur dari tabel `pendaftaran`
--

CREATE TABLE IF NOT EXISTS `pendaftaran` (
  `email` varchar(100) NOT NULL,
  `fakultas` varchar(20) DEFAULT NULL,
  `nama` varchar(100) NOT NULL,
  `idkost` int(11) NOT NULL,
  `idkamar` varchar(10) NOT NULL,
  `status` set('book','ditolak','batal','diterima','siapbayar') NOT NULL,
  `timestamp` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `bataswaktu` datetime DEFAULT NULL,
  `norekuser` int(15) NOT NULL,
  `norekpemilik` int(15) DEFAULT NULL,
  `kelamin` set('pria','wanita') NOT NULL,
  PRIMARY KEY (`email`,`idkost`,`idkamar`),
  KEY `idkost` (`idkost`),
  KEY `idkamar` (`idkamar`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `pendaftaran`
--

INSERT INTO `pendaftaran` (`email`, `fakultas`, `nama`, `idkost`, `idkamar`, `status`, `timestamp`, `bataswaktu`, `norekuser`, `norekpemilik`, `kelamin`) VALUES
('naruto@naru.com', 'aaaaa', 'ary', 3, 'e303', 'diterima', '2013-05-27 08:45:47', NULL, 0, NULL, ''),
('sasuke@sasuke.com', 'konoha', 'sasuke', 3, 'e304', 'diterima', '2013-05-29 23:46:15', NULL, 1234567898, NULL, ''),
('shinrasakaki@gmail.com', 'Ilmu Komputer', 'Fadhil', 3, 'e302', 'diterima', '2013-05-29 05:55:14', NULL, 1234567890, NULL, ''),
('shinrasakaki@gmail.com', 'Ilmu Komputer', 'Fadhil Sultoni', 3, 'e303', 'book', '2013-05-29 04:30:23', NULL, 1234567890, NULL, ''),
('shinrasakaki@gmail.com', 'Ilmu Komputer', 'Fadhil Sultoni', 3, 'e409', 'book', '2013-06-03 02:57:34', NULL, 1234567890, NULL, ''),
('solichah.iis@gmail.com', 'Psikologi', 'Rossallina', 3, 'e302', 'diterima', '2013-05-29 08:34:06', NULL, 1234567891, 2147483647, ''),
('surya@di.com', 'Ilmu Komputer', 'Johan Marganda Sinaga', 3, 'e302', 'diterima', '2013-05-29 06:58:17', NULL, 2039812093, NULL, 'pria'),
('surya@di.com', 'Ilmu Komputer', 'Johan Marganda Sinaga', 3, 'e303', 'book', '2013-05-29 06:58:43', NULL, 2039812093, NULL, 'pria');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tempat_kost`
--

CREATE TABLE IF NOT EXISTS `tempat_kost` (
  `idkost` int(11) NOT NULL AUTO_INCREMENT,
  `nama` varchar(20) NOT NULL,
  `kuota` int(3) NOT NULL,
  `alamat` text NOT NULL,
  `tersedia` int(3) NOT NULL,
  `deskripsi` text,
  `email` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`idkost`),
  KEY `email` (`email`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=6 ;

--
-- Dumping data untuk tabel `tempat_kost`
--

INSERT INTO `tempat_kost` (`idkost`, `nama`, `kuota`, `alamat`, `tersedia`, `deskripsi`, `email`) VALUES
(2, 'Unica 2', 5, 'Jalan sudirman no 99 di samping warteggg', 0, 'dgfdgff', 'sanzen@sekai.com'),
(3, 'fokus', 3, 'jalan kukusan teknik nomor 2 di depan pintu kutekk', 3, '            Tempat kost yang ada tempat kebugaran', 'gee@gmail.com'),
(5, 'Unica Baru', 6, 'Jalan kutek barat', 40, 'sebuah tempat kost yang banyak penghuniyna', 'Surya@pro.com');

-- --------------------------------------------------------

--
-- Struktur dari tabel `user`
--

CREATE TABLE IF NOT EXISTS `user` (
  `nama` varchar(20) NOT NULL,
  `password` varchar(255) NOT NULL,
  `noTelp` varchar(12) NOT NULL,
  `email` varchar(100) NOT NULL,
  PRIMARY KEY (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `user`
--

INSERT INTO `user` (`nama`, `password`, `noTelp`, `email`) VALUES
('Ajiaji', '7c5b346870692513e8998c5110c3812a', '0218456984', 'aji@aji.com'),
('rian', '3b634f2df0a91ea7cd53', '0218462507', 'b@gmail.com'),
('dinda', '594280c6ddc94399a392934cac9d80d5', '12345', 'dinda@dinda.com'),
('gee', 'selen', '021846507', 'g@gmail.com'),
('ganda', 'e488d3be9c3bded7e077', '2187389123', 'gan@gmail.com'),
('rian2', 'e488d3be9c3bded7e077', '1234567', 'gi@gmail.com'),
('Gilang Kusuma Jati', '25d55ad283aa400af464c76d713c07ad', '0812345678', 'gilang.kusuma@live.com'),
('Yohanes Margonda', 'e488d3be9c3bded7e0770e18d0d1e4ea', '102893123', 'gond@a.com'),
('Iqrar Mulfi', 'b5817802150cf21c30216cbbdaca5ef3', '085718915280', 'iqrarmulfi2012@gmail.com'),
('kimimaro', 'e488d3be9c3bded7e0770e18d0d1e4ea', '921839123', 'kimimaro@kimimaro.co'),
('Liza Melati', 'fe5f664870a0f24f8ad9312ae2d6148a', '123456', 'liza@liza.com'),
('madara', 'e488d3be9c3bded7e0770e18d0d1e4ea', '02913132', 'madara@madara.com'),
('naruto', 'e488d3be9c3bded7e0770e18d0d1e4ea', '91283123', 'naruto@naru.com'),
('pein', 'e488d3be9c3bded7e0770e18d0d1e4ea', '0218462507', 'pein@pein.com'),
('Ryan Riandi', '10c7ccc7a4f0aff03c915c485565b9da', '08965332123', 'ryan.riandi@ui.ac.id'),
('wadefu', '8f60c8102d29fcd525162d02eed4566b', '0000000000', 's@gmail.com'),
('sasuke', '93207db25ad357906be2fd0c3f65f3dc', '123454', 'sasuke@sasuke.com'),
('senzen', 'e488d3be9c3bded7e0770e18d0d1e4ea', '12098323', 'senzen@sen.com'),
('Fadhil Sultoni', 'f2ebcb7c67e093f5a78f23a181470609', '085718319393', 'shinrasakaki@gmail.com'),
('Solichah', '6a9e635f2b61d57fa0172dcbcd5812e8', '0856', 'solichah.iis@gmail.com'),
('Suryadi P', 'e488d3be9c3bded7e0770e18d0d1e4ea', '081514823788', 'sura@di.com'),
('Suryadi P', 'e488d3be9c3bded7e0770e18d0d1e4ea', '081514823788', 'sury@adi.com'),
('Suryadi P', 'e488d3be9c3bded7e0770e18d0d1e4ea', '081514823788', 'surya@di.com'),
('Yohanes Marganda', 'e488d3be9c3bded7e0770e18d0d1e4ea', '81283723', 'Yoh@ma22r.com'),
('Yohanes Marganda', 'e488d3be9c3bded7e0770e18d0d1e4ea', '81283723', 'Yoh@mar.com');

--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `gambar`
--
ALTER TABLE `gambar`
  ADD CONSTRAINT `gambar_ibfk_1` FOREIGN KEY (`idkost`) REFERENCES `tempat_kost` (`idkost`) ON DELETE CASCADE;

--
-- Ketidakleluasaan untuk tabel `kamar_kost`
--
ALTER TABLE `kamar_kost`
  ADD CONSTRAINT `kamar_kost_ibfk_5` FOREIGN KEY (`idKost`) REFERENCES `tempat_kost` (`idkost`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `kamar_kost_ibfk_6` FOREIGN KEY (`penghuni`) REFERENCES `user` (`email`);

--
-- Ketidakleluasaan untuk tabel `pendaftaran`
--
ALTER TABLE `pendaftaran`
  ADD CONSTRAINT `pendaftaran_ibfk_4` FOREIGN KEY (`email`) REFERENCES `user` (`email`),
  ADD CONSTRAINT `pendaftaran_ibfk_5` FOREIGN KEY (`idkost`) REFERENCES `tempat_kost` (`idkost`),
  ADD CONSTRAINT `pendaftaran_ibfk_6` FOREIGN KEY (`idkamar`) REFERENCES `kamar_kost` (`idkamar`);

--
-- Ketidakleluasaan untuk tabel `tempat_kost`
--
ALTER TABLE `tempat_kost`
  ADD CONSTRAINT `tempat_kost_ibfk_1` FOREIGN KEY (`email`) REFERENCES `pemilik_kost` (`email`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

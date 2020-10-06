-- phpMyAdmin SQL Dump
-- version 4.9.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 24 Apr 2020 pada 08.06
-- Versi server: 10.4.8-MariaDB
-- Versi PHP: 7.3.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `apotek`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `detail_transaksi`
--

CREATE TABLE `detail_transaksi` (
  `id` int(11) NOT NULL,
  `no_transaksi` char(6) NOT NULL,
  `kode_buku` char(6) NOT NULL,
  `qty` int(11) NOT NULL,
  `sub_total` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `detail_transaksi`
--

INSERT INTO `detail_transaksi` (`id`, `no_transaksi`, `kode_buku`, `qty`, `sub_total`) VALUES
(47, 'BF0FCE', '6F22D6', 23, 897000),
(48, 'BF0FCE', 'DF43E3', 12, 1200000),
(49, 'BF0FCE', 'B4EAC9', 3, 105000),
(50, '4CB262', 'DF43E3', 8, 800000),
(51, '4CB262', '4527CA', 2, 264000),
(52, '16782F', '1E9175', 3, 600000),
(53, '16782F', '3C37EE', 2, 150000),
(54, '1FBB64', 'FF9F58', 100, 2500000),
(55, '7AE61B', '6F22D6', 2, 78000),
(56, '7AE61B', '3C37EE', 1000, 75000000),
(57, 'F1349C', '1E9175', 50, 10000000),
(58, '260FAC', 'FF9F58', 2000, 50000000),
(59, '78A2D0', '4B9280', 2, 123000),
(60, 'E7C5FF', '4B9280', 410, 25215000),
(61, '40ED02', '4B9280', 82, 5043000),
(62, '36AA99', '6BE87B', 1, 81500),
(63, '0300EB', '1E9175', 1, 200000),
(64, '0300EB', '4527CA', 2, 264000),
(65, '2E2F2F', 'FF9F58', 1, 25000);

-- --------------------------------------------------------

--
-- Struktur dari tabel `kategori`
--

CREATE TABLE `kategori` (
  `id_kategori` int(11) NOT NULL,
  `nama_kategori` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `kategori`
--

INSERT INTO `kategori` (`id_kategori`, `nama_kategori`) VALUES
(1, 'Ibu Hamil'),
(2, 'Anak'),
(3, 'Dewasa');

-- --------------------------------------------------------

--
-- Struktur dari tabel `obat`
--

CREATE TABLE `obat` (
  `kode` char(6) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `id_kategori` int(11) NOT NULL,
  `jenis` varchar(50) NOT NULL,
  `dosis` varchar(30) NOT NULL,
  `harga` int(10) NOT NULL,
  `jumlah` int(10) NOT NULL,
  `keterangan` text NOT NULL,
  `gambar` varchar(50) NOT NULL,
  `jum_pembelian` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `obat`
--

INSERT INTO `obat` (`kode`, `nama`, `id_kategori`, `jenis`, `dosis`, `harga`, `jumlah`, `keterangan`, `gambar`, `jum_pembelian`) VALUES
('1E9175', 'Vicks Formula 44', 2, 'Obat batuk berdahak & batuk kering', '3 x 1 (Sesudah Makan)', 15000, 40, 'Komposisi:\r\n<br> Dextromethorphan HBr dan Guaiphenesin.\r\n<br>\r\n<br>\r\nEfek samping:\r\n<br> -', 'vicks.jpg', 53),
('2EF3RT', 'OSFIT', 3, 'Suplemen Kesehatan Tulang', '2 x 1 (Sesudah Makan)', 118000, 8, 'OSFIT 60 TABLET adalah suplemen untuk kesehatan tulang yang berfungsi untuk mencegah Osteoporosis. Mengandung Kalsium Karbonat sehingga aman untuk ginjal, dilengkapi dengan vitamin D3, vitamin B kompleks, dan mineral untuk membantu penyerapan kalsium.\r\n<br>\r\nSpesifikasi:\r\n<br>\r\nBentuk tablet.\r\n<br>\r\nIsi 60 tablet.', 'osfit.jpg', 3),
('6BE87B', 'OBH Combi Anak', 2, 'Flu & Batuk', '3 x 1 (Sesudah Makan)', 12000, 30, 'Komposisi:\r\n<br> Paracetamol, ekstrak Succus liquiritiae dan Ammonium chloride, pseudoephedrine HCL, serta Chlorpheniramine maleate\r\n<br>\r\n<br>\r\nEfek samping:\r\n<br> -', 'obh.jpg', 36),
('B4EAC9', 'Obat Batuk Madu Syifa Kids Flu', 2, 'Flu & Batuk', '3 x 1 (Sesudah Makan)', 20000, 14, 'Komposisi:\r\n<br> Habbatussauda dan herbal alami.\r\n<br>\r\n<br>\r\nEfek Samping:\r\n<br> -', 'syifa.jpg', 23),
('B5ESC1', 'Promag Gazero Herbal', 3, 'Pencernaan', '3 x 1 (Sebelum Makan)', 14000, 35, 'Kemasan:\r\n<br> 1 Box isi 6 Sachet @ 10 ml\r\n<br>\r\n<br>\r\nPromag Gazero Herbal membantu meredakan gangguan lambung, seperti mual dan muntah, perih pada ulu hati, kembung/sebah. Promag Herbal dengan kandungan 8 herbal yang hangat di perut, praktis untuk dibawa kemana saja dan diminum kapan saja. Promag Herbal juga bisa diminum langsung atau dicampur dengan air hangat.', 'promag.jpg', 50),
('C2A309', 'Blackmores Pregnancy & Breast-Feeding Gold', 1, 'Suplemen Kehamilan & Menyusui', '2 x 1 (Sesudah Makan)', 195000, 8, 'Kemasan Botol\r\n<br> Isi 180 kapsul\r\nKomposisi: Asam folat 400 µg, Kalium iodide 196 µg (Iodium 150 µg), Fish oil 1000 mg mengandung 330 mg Omega-3 (DHA 250mg + EPA 50 mg), Fe (II) fumarate 31.4 mg (Zat besi 10 mg), Niasin 15 mg, Vitamin C 60 mg, Kalsium karbonat 600 mg (Kalsium 240 mg), Zinc sulfat 41.6 mg (Zinc 15 mg), Magnesium oksida 99.6 mg (Magnesium 60 mg), Thiamine nitrate 1000 µg (Vitamin B1 810 µg), Riboflavin (Vit B2 1500 µg), Pyridoxine HCl (Vit B6 1500 µg), Vit B12 3 µg, d-alpha tocopherol (natural Vit E 10.42 IU), Dunaliella salina cell extract soft concentrate 144 mg.', 'blackmores.jpg', 4),
('C43RT5', 'H2 Celery dari H2 Health and Happiness', 3, 'Suplemen', '1 - 2 x 1 (Sesudah Makan)', 200000, 5, 'H2 Celery dari H2 Health and Happiness adalah suplemen dengan kandungan apigenin dari tanaman seledri utuh. Dengan kandungan tersebut, suplemen ini mampu meringankan gejala hipertensi dan menghambat radikal bebas masuk ke tubuh.\r\n<br>\r\n<br>\r\nSpesifikasi:\r\n<br>\r\nSuplemen varian H2 Celery\r\n<br>\r\nIsi 30 kapsul\r\n<br>\r\nTiap kapsul mengandung beberapa bahan baku ekstrak herba seledri (Apii graveolentis)\r\n<br>\r\n<br>\r\nKegunaan:\r\n<br>\r\nMembantu meringankan gejala tekanan darah tinggi ringan atau prehipertensi.\r\n<br>\r\nMenghambat radikal bebas masuk ke tubuh.', 'celery.jpg', 2),
('DF43E3', 'Komix Herbal Original Tube', 3, 'Obat batuk', '3 x 1 (Sesudah Makan)', 10000, 23, 'Sirup obat batuk rasa original.\r\n<br>\r\n<br>\r\nKomposisi:\r\n<br>\r\nLagundi 200 mg, Jahe Merah 30 mg, Thymi Herba 100 mg, Licorice 167 mg, Peppermint oil 11 mg, Madu 3000 mg\r\n<br>\r\n<br>\r\nKhasiat: \r\n<br>\r\nMembantu meredakan batuk berdahak.\r\n<br>\r\n<br>\r\nAturan pakai:\r\n<br>\r\nKocok dahulu sebelum diminum. Simpan pada suhu di bawah 30 derajat Celcius\r\n<br>\r\n<br>\r\nKemasan:\r\n<br>\r\nIsi 4 tube botol @15ml\r\n<br>\r\nNo. Reg. POM TR. 142 679 251', 'komix.jpg', 32),
('FF9F58', 'Lactamor', 1, 'Suplemen Kehamilan & Menyusui', '2 x 1 (Sesudah Makan)', 159000, 12, 'Kombinasi lengkap antara ekstrak biji fenugreek & daun katuk dilengkapi dengan vitamin B12 bekerja membantu meningkatkan & melancarkan produksi ASI pada wanita menyusui.\r\n<br>\r\n<br>\r\nKomposisi :\r\n<br>\r\nEkstrak daun katuk\r\n<br>\r\nEktrak biji fenugreek\r\n<br>\r\nVitamin B12\r\n', 'lactamor.jpg', 3);

-- --------------------------------------------------------

--
-- Struktur dari tabel `pembeli`
--

CREATE TABLE `pembeli` (
  `id_pembeli` char(6) NOT NULL,
  `nama_pembeli` varchar(30) NOT NULL,
  `email` varchar(30) NOT NULL,
  `password` varchar(30) NOT NULL,
  `no_telp` int(16) NOT NULL,
  `alamat` varchar(50) NOT NULL,
  `jk` varchar(14) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `pembeli`
--

INSERT INTO `pembeli` (`id_pembeli`, `nama_pembeli`, `email`, `password`, `no_telp`, `alamat`, `jk`) VALUES
('1DCEE4', 'Afrian Hanafi', 'afrian.hanafi@gmail.com', 'asdasd', 2147483647, 'Bp.Apek Gunawijaya d\\a Gg. Desa Lengkong RT05/01 n', 'Laki-laki'),
('589EDC', 'Fariz', 'asbd@adbu.com', '123', 123123, '123', 'Laki-laki'),
('715EE9', 'Sarah Nur', 'sarah@gmail.com', '1234', 2147483647, 'lalalala', 'Perempuan'),
('9AD6E0', 'Varenza Arivian', 'personavarenza@gmail.com', '1', 2147483647, 'Persona Varenza Aja', 'Laki-laki'),
('A29D49', 'Universitas', 'tesaja@gmail.com', 'asdasd', 2147483647, 'Telkom', 'Laki-laki'),
('BD106B', 'nadhia', 'nadhia@gmail.com', '1234', 83456789, 'lala', 'Perempuan'),
('C391CD', 'sdaasd', '123@passwordnya.com', '123', 123, '1', 'Laki-laki'),
('C58B19', 'Edgarsa B', 'edgar@sa.com', 'qwerty', 2147483647, 'Jl. Telekomunikasi No. 01, Terusan Buah Batu, Suka', 'Laki-laki'),
('FC261D', 'Mahmud MD', 'mahmud@MD.com', 'asdasd', 2147483647, 'Telkom', 'Laki-laki');

-- --------------------------------------------------------

--
-- Struktur dari tabel `transaksi`
--

CREATE TABLE `transaksi` (
  `no_transaksi` char(6) NOT NULL,
  `id_pembeli` char(6) NOT NULL,
  `tgl_transaksi` varchar(12) NOT NULL,
  `total_harga` int(10) NOT NULL,
  `alamat_pengiriman` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `transaksi`
--

INSERT INTO `transaksi` (`no_transaksi`, `id_pembeli`, `tgl_transaksi`, `total_harga`, `alamat_pengiriman`) VALUES
('0300EB', 'BD106B', '23/04/2020', 464000, 'uuuu'),
('16782F', '1DCEE4', '22/11/2018', 750000, 'uihiuhiuh'),
('1FBB64', '1DCEE4', '22/11/2018', 2500000, 'b'),
('260FAC', 'C391CD', '29/11/2018', 50000000, 'ihasdsahd'),
('2E2F2F', '715EE9', '24/04/2020', 25000, '1'),
('36AA99', '715EE9', '22/04/2020', 81500, 'dadasa'),
('40ED02', 'C391CD', '29/11/2018', 5043000, 'sdasdas'),
('4CB262', '1DCEE4', '22/11/2018', 1064000, 'ojiojoj'),
('78A2D0', 'C391CD', '29/11/2018', 123000, 'sad'),
('7AE61B', '589EDC', '24/11/2018', 75078000, 'dsasdas'),
('BF0FCE', '1DCEE4', '22/11/2018', 2202000, 'asd asdas dasdas'),
('E7C5FF', 'C391CD', '29/11/2018', 25215000, 'sad'),
('F1349C', '9AD6E0', '28/11/2018', 10000000, 'Kepo bet');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `detail_transaksi`
--
ALTER TABLE `detail_transaksi`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `kategori`
--
ALTER TABLE `kategori`
  ADD PRIMARY KEY (`id_kategori`);

--
-- Indeks untuk tabel `obat`
--
ALTER TABLE `obat`
  ADD PRIMARY KEY (`kode`);

--
-- Indeks untuk tabel `pembeli`
--
ALTER TABLE `pembeli`
  ADD PRIMARY KEY (`id_pembeli`);

--
-- Indeks untuk tabel `transaksi`
--
ALTER TABLE `transaksi`
  ADD PRIMARY KEY (`no_transaksi`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `detail_transaksi`
--
ALTER TABLE `detail_transaksi`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=66;

--
-- AUTO_INCREMENT untuk tabel `kategori`
--
ALTER TABLE `kategori`
  MODIFY `id_kategori` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

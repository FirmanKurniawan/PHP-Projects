-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 26 Jul 2022 pada 02.12
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
-- Database: `websekolah`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_berita`
--

CREATE TABLE `tbl_berita` (
  `id_berita` int(11) NOT NULL,
  `judul_berita` varchar(100) DEFAULT NULL,
  `slug_berita` varchar(255) DEFAULT NULL,
  `isi_berita` text,
  `gambar_berita` varchar(30) DEFAULT NULL,
  `tgl_berita` date NOT NULL,
  `id_user` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tbl_berita`
--

INSERT INTO `tbl_berita` (`id_berita`, `judul_berita`, `slug_berita`, `isi_berita`, `gambar_berita`, `tgl_berita`, `id_user`) VALUES
(15, 'Pedoman Belajar dari Rumah yang Wajib Diketahui Guru, Siswa, dan Ortu', 'pedoman-belajar-dari-rumah-yang-wajib-diketahui-guru-siswa-dan-ortu', 'Kementerian Pendidikan dan Kebudayaan (Kemendikbud) menerbitkan Surat Edaran Nomor 15 Tahun 2020 tentang Pedoman Penyelenggaraan Belajar Dari Rumah Dalam Masa Darurat Penyebaran Covid-19.\r\nStaf Ahli Menteri Pendidikan dan Kebudayaan Bidang Regulasi Chatarina Muliana Girsang menyampaikan Surat Edaran Nomor 15 ini untuk memperkuat Surat Edaran Mendikbud Nomor 4 Tahun 2020 tentang Pelaksanaan Pendidikan Dalam Masa Darurat Coronavirus Disease (Covid-19).', '1berita.jpg', '2022-06-30', 1),
(17, 'Jangan Sampai Siswa Tak Naik Kelas di Masa Pandemi', 'jangan-sampai-siswa-tak-naik-kelas-di-masa-pandemi', 'Mencermati perkembangan persoalan pendidikan di tengah pandemi Covid-19 saat ini, Federasi Serikat Guru Indonesia (FSGI) menilai pembukaan kembali sekolah harus dipikirkan matang-matang sebelum dilaksanakan.\r\nKebijakan tidak boleh tergesa-gesa, dan harus memperhatikan data terkait penanganan Covid-19 di tiap wilayah. Koordinasi, komunikasi, dan validitas data jadi keharusan bagi pemerintah pusat dan pemerintah daerah.\r\n\"Jika kondisi penyebaran Covid-19 masih tinggi, sebaiknya opsi memperpanjang metode Pembelajaran Jarak Jauh (PJJ) adalah yang terbaik,\" kata Satriwan Salim, Wasekjen FSGI di Jakarta.', '3berita.jpg', '2022-06-30', 1);

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_file`
--

CREATE TABLE `tbl_file` (
  `id_file` int(11) NOT NULL,
  `ket_file` varchar(100) DEFAULT NULL,
  `file` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tbl_file`
--

INSERT INTO `tbl_file` (`id_file`, `ket_file`, `file`) VALUES
(1, 'Materi PPKN', 'demokrasi.docx');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_foto`
--

CREATE TABLE `tbl_foto` (
  `id_foto` int(11) NOT NULL,
  `id_gallery` int(11) NOT NULL,
  `ket_foto` text NOT NULL,
  `foto` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tbl_foto`
--

INSERT INTO `tbl_foto` (`id_foto`, `id_gallery`, `ket_foto`, `foto`) VALUES
(3, 1, 'Membawa Sang Saka Merah Putih', '1ekskul.jpg'),
(4, 1, 'Anggota Pakibraka', '2ekskul.jpg'),
(5, 1, 'Pengibaran Bendera', '3ekskul.jpg'),
(6, 2, 'Goal Basket', '1basket.jpg'),
(7, 2, 'Taktik basket', '2basket.jpg'),
(8, 3, 'Baris Persiapan', '1march.jpg'),
(9, 3, 'Festival', '3march.jpg');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_gallery`
--

CREATE TABLE `tbl_gallery` (
  `id_gallery` int(11) NOT NULL,
  `nama_gallery` text NOT NULL,
  `sampul` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tbl_gallery`
--

INSERT INTO `tbl_gallery` (`id_gallery`, `nama_gallery`, `sampul`) VALUES
(1, 'PASKIBRAKA SDN PANARUBAN', 'ekskul1.jpg'),
(3, 'MARCHING BAND SDN PANARUBAN', 'march1.jpg');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_guru`
--

CREATE TABLE `tbl_guru` (
  `id_guru` int(11) NOT NULL,
  `nip` varchar(20) DEFAULT NULL,
  `nama_guru` varchar(25) DEFAULT NULL,
  `tempat_lahir` varchar(20) DEFAULT NULL,
  `tgl_lahir` date DEFAULT NULL,
  `id_mapel` int(11) DEFAULT NULL,
  `pendidikan` varchar(7) DEFAULT NULL,
  `foto_guru` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tbl_guru`
--

INSERT INTO `tbl_guru` (`id_guru`, `nip`, `nama_guru`, `tempat_lahir`, `tgl_lahir`, `id_mapel`, `pendidikan`, `foto_guru`) VALUES
(22, '197212062008012002', 'Ika Dewi Sartika, S.Pd', 'SUBANG', '1972-12-06', 26, 'S1', 'PHOTO-2022-06-07-12-17-09_2.jpg'),
(23, '197203051995081001', 'Cahya, S.Pd', 'SUBANG', '1972-03-05', 27, 'S1', 'PHOTO-2022-06-07-12-17-08_2.jpg');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_mapel`
--

CREATE TABLE `tbl_mapel` (
  `id_mapel` int(11) NOT NULL,
  `nama_mapel` varchar(30) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tbl_mapel`
--

INSERT INTO `tbl_mapel` (`id_mapel`, `nama_mapel`) VALUES
(25, 'PadBP'),
(26, 'PJOK'),
(27, 'TEMATIK 1'),
(28, 'TEMATIK 2');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_pengumuman`
--

CREATE TABLE `tbl_pengumuman` (
  `id_pengumuman` int(11) NOT NULL,
  `judul_pengumuman` varchar(100) DEFAULT NULL,
  `isi_pengumuman` text,
  `tgl` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_setting`
--

CREATE TABLE `tbl_setting` (
  `id` int(11) NOT NULL,
  `nama_sekolah` varchar(100) DEFAULT NULL,
  `alamat` varchar(100) DEFAULT NULL,
  `no_telepon` varchar(15) DEFAULT NULL,
  `kepala_sekolah` varchar(50) DEFAULT NULL,
  `nip` varchar(20) DEFAULT NULL,
  `foto_kepsek` varchar(255) DEFAULT NULL,
  `visi` text,
  `misi` text
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tbl_setting`
--

INSERT INTO `tbl_setting` (`id`, `nama_sekolah`, `alamat`, `no_telepon`, `kepala_sekolah`, `nip`, `foto_kepsek`, `visi`, `misi`) VALUES
(1, 'SD NEGERI PANARUBAN', 'Jln. Raya Cicadas, Desa Cicadas, Kec.Sagalaherang, Kab. Subang', ' 081322858675', 'Rahayu, S.Pd', '197105312008012003', 'Capture.PNG', 'Terwujudnya SDN Panaruban sebagai penyedia Sumber Daya Manusia yang agamis, mandiri dan berdaya saing tinggi di tingkat Nasional dan Internasional.', '1. Meningkatkan keimanan dan ketaqwaan seluruh warga\r\n2. Meningkatkan Profesionalisme SDM Pengelola\r\n3. Melaksanakan pola pembalajaran yang mengarah ke Life Skill dalam bidang jasa dan Teknologi Informasi\r\n4. Menumbuhkembangkan pola kemitraan baik dengan masyarakat maupun dunia usaha dan dunia industri\r\n5. Mengembangkan fungsi SDN Panaruban kearah pusat penelitian dalam bidang jasa\r\n6. Mengadakan dan mengoptimalkan pemeliharaan / pemanfaatan sarana prasarana pendidikan serta efisiensi penggunaan dana');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_siswa`
--

CREATE TABLE `tbl_siswa` (
  `id_siswa` int(11) NOT NULL,
  `nis` varchar(20) DEFAULT NULL,
  `nama_siswa` varchar(25) DEFAULT NULL,
  `tempat_lahir` varchar(20) DEFAULT NULL,
  `tgl_lahir` date DEFAULT NULL,
  `kelas` varchar(10) DEFAULT NULL,
  `foto_siswa` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tbl_siswa`
--

INSERT INTO `tbl_siswa` (`id_siswa`, `nis`, `nama_siswa`, `tempat_lahir`, `tgl_lahir`, `kelas`, `foto_siswa`) VALUES
(22, '161701001', 'ADELLA DINA SAMBAS', 'SUBANG', '2007-09-07', 'VI', 'IMG_8844_Resize.jpg'),
(23, '161701003', 'AMELLYA FEBRIANTY', 'SUBANG', '2009-02-09', 'VI', 'download.jpg'),
(24, '161701004', 'FARIZ YUSUF ARIFIANTO', 'SUBANG', '2011-06-15', 'IV', 'v1WewHbaPiGtBJOvfezKqxY1XI3Dgp9U9CSYZyzj.jpg');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_user`
--

CREATE TABLE `tbl_user` (
  `id_user` int(11) NOT NULL,
  `nama_user` varchar(25) DEFAULT NULL,
  `username` varchar(25) DEFAULT NULL,
  `password` varchar(50) DEFAULT NULL,
  `level` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tbl_user`
--

INSERT INTO `tbl_user` (`id_user`, `nama_user`, `username`, `password`, `level`) VALUES
(1, 'Administrator', 'admin', 'admin123', 1);

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `tbl_berita`
--
ALTER TABLE `tbl_berita`
  ADD PRIMARY KEY (`id_berita`);

--
-- Indeks untuk tabel `tbl_file`
--
ALTER TABLE `tbl_file`
  ADD PRIMARY KEY (`id_file`);

--
-- Indeks untuk tabel `tbl_foto`
--
ALTER TABLE `tbl_foto`
  ADD PRIMARY KEY (`id_foto`);

--
-- Indeks untuk tabel `tbl_gallery`
--
ALTER TABLE `tbl_gallery`
  ADD PRIMARY KEY (`id_gallery`);

--
-- Indeks untuk tabel `tbl_guru`
--
ALTER TABLE `tbl_guru`
  ADD PRIMARY KEY (`id_guru`);

--
-- Indeks untuk tabel `tbl_mapel`
--
ALTER TABLE `tbl_mapel`
  ADD PRIMARY KEY (`id_mapel`);

--
-- Indeks untuk tabel `tbl_pengumuman`
--
ALTER TABLE `tbl_pengumuman`
  ADD PRIMARY KEY (`id_pengumuman`);

--
-- Indeks untuk tabel `tbl_setting`
--
ALTER TABLE `tbl_setting`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `tbl_siswa`
--
ALTER TABLE `tbl_siswa`
  ADD PRIMARY KEY (`id_siswa`);

--
-- Indeks untuk tabel `tbl_user`
--
ALTER TABLE `tbl_user`
  ADD PRIMARY KEY (`id_user`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `tbl_berita`
--
ALTER TABLE `tbl_berita`
  MODIFY `id_berita` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT untuk tabel `tbl_file`
--
ALTER TABLE `tbl_file`
  MODIFY `id_file` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT untuk tabel `tbl_foto`
--
ALTER TABLE `tbl_foto`
  MODIFY `id_foto` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT untuk tabel `tbl_gallery`
--
ALTER TABLE `tbl_gallery`
  MODIFY `id_gallery` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT untuk tabel `tbl_guru`
--
ALTER TABLE `tbl_guru`
  MODIFY `id_guru` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT untuk tabel `tbl_mapel`
--
ALTER TABLE `tbl_mapel`
  MODIFY `id_mapel` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

--
-- AUTO_INCREMENT untuk tabel `tbl_pengumuman`
--
ALTER TABLE `tbl_pengumuman`
  MODIFY `id_pengumuman` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `tbl_setting`
--
ALTER TABLE `tbl_setting`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT untuk tabel `tbl_siswa`
--
ALTER TABLE `tbl_siswa`
  MODIFY `id_siswa` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT untuk tabel `tbl_user`
--
ALTER TABLE `tbl_user`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

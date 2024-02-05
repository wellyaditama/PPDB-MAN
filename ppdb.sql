-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Feb 01, 2024 at 04:18 AM
-- Server version: 10.11.6-MariaDB-cll-lve
-- PHP Version: 7.2.34

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `u799196338_ppdb`
--

-- --------------------------------------------------------

--
-- Table structure for table `bayar`
--

CREATE TABLE `bayar` (
  `id_bayar` varchar(20) NOT NULL,
  `id_user` int(10) NOT NULL,
  `id_siswa` int(10) NOT NULL,
  `jumlah` int(10) NOT NULL,
  `tgl_bayar` date NOT NULL,
  `keterangan` int(10) DEFAULT NULL,
  `bukti` varchar(50) DEFAULT NULL,
  `verifikasi` int(1) NOT NULL DEFAULT 0,
  `hapus` int(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

-- --------------------------------------------------------

--
-- Table structure for table `biaya`
--

CREATE TABLE `biaya` (
  `id_biaya` varchar(50) NOT NULL,
  `nama_biaya` varchar(200) NOT NULL,
  `jumlah` int(10) NOT NULL,
  `status` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

-- --------------------------------------------------------

--
-- Table structure for table `histori`
--

CREATE TABLE `histori` (
  `id` int(11) NOT NULL,
  `id_permohonan` varchar(30) NOT NULL,
  `nik` int(30) NOT NULL,
  `status` int(1) NOT NULL,
  `tanggal` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `keterangan` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `histori`
--

INSERT INTO `histori` (`id`, `id_permohonan`, `nik`, `status`, `tanggal`, `keterangan`) VALUES
(1, '201907070001', 123, 1, '2019-07-07 14:57:31', 'Silahkan datang ke desa/kelurahan setempat untuk pengumpulan berkas persyaratan permohonan  dan konfirmasi'),
(2, '201907070001', 0, 2, '2019-07-07 21:26:33', 'pemberkasan sedang kami proses silahkan untuk menunggu'),
(4, '202004040001', 12, 1, '2020-04-04 17:25:29', 'Silahkan datang ke desa/kelurahan setempat untuk pengumpulan berkas persyaratan permohonan  dan konfirmasi'),
(5, '202004040002', 12, 1, '2020-04-04 17:25:55', 'Permohonan sudah berhasil masuk, mohon untuk menunggu proses pengecekan data');

-- --------------------------------------------------------

--
-- Table structure for table `jenis`
--

CREATE TABLE `jenis` (
  `id_jenis` varchar(50) NOT NULL,
  `nama_jenis` varchar(50) NOT NULL,
  `status` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `jenis`
--

INSERT INTO `jenis` (`id_jenis`, `nama_jenis`, `status`) VALUES
('PD', 'Pindahan', 1),
('SB', 'Siswa Baru', 1);

-- --------------------------------------------------------

--
-- Table structure for table `jenjang`
--

CREATE TABLE `jenjang` (
  `id_jenjang` int(11) NOT NULL,
  `kode` int(11) NOT NULL,
  `nama_jenjang` varchar(50) DEFAULT NULL,
  `status` int(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `jenjang`
--

INSERT INTO `jenjang` (`id_jenjang`, `kode`, `nama_jenjang`, `status`) VALUES
(3, 10, 'IPS', 1),
(4, 11, 'IPS', 1),
(6, 12, 'IPS', 1);

-- --------------------------------------------------------

--
-- Table structure for table `jurusan`
--

CREATE TABLE `jurusan` (
  `id_jurusan` varchar(50) NOT NULL,
  `nama_jurusan` varchar(100) DEFAULT NULL,
  `kuota` int(10) DEFAULT NULL,
  `status` int(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `jurusan`
--

INSERT INTO `jurusan` (`id_jurusan`, `nama_jurusan`, `kuota`, `status`) VALUES
('AFIRMASI', 'AFIRMASI', 64, 1),
('PRESTASI', 'PRESTASI', 108, 1),
('REGURER', 'REGULER', 260, 1);

-- --------------------------------------------------------

--
-- Table structure for table `kategori`
--

CREATE TABLE `kategori` (
  `id` int(11) NOT NULL,
  `nama` text NOT NULL,
  `status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `kategori`
--

INSERT INTO `kategori` (`id`, `nama`, `status`) VALUES
(2, 'BERITA', 1),
(3, 'Artikel', 1),
(4, 'Teknologi', 1);

-- --------------------------------------------------------

--
-- Table structure for table `kontak`
--

CREATE TABLE `kontak` (
  `id_kontak` int(11) NOT NULL,
  `nama_kontak` varchar(50) DEFAULT NULL,
  `no_kontak` varchar(50) DEFAULT NULL,
  `status` int(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `kontak`
--

INSERT INTO `kontak` (`id_kontak`, `nama_kontak`, `no_kontak`, `status`) VALUES
(1, 'Nasrulloh', '081210654096', 1),
(2, 'Tugiman', '081282656407', 1);

-- --------------------------------------------------------

--
-- Table structure for table `pengumuman`
--

CREATE TABLE `pengumuman` (
  `id_pengumuman` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `judul` varchar(255) DEFAULT NULL,
  `pengumuman` text DEFAULT NULL,
  `tgl` datetime NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `jenis` int(1) DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `pengumuman`
--

INSERT INTO `pengumuman` (`id_pengumuman`, `id_user`, `judul`, `pengumuman`, `tgl`, `jenis`) VALUES
(12, 103, 'Juknis PPDBM MAN Temanggung Tahun Pelajaran 2024/2025', '<p>Berikut adalah link Juknis PPDBM MAN Temanggung Tahun Pelajaran 2024/2025, <a href=\"https://drive.google.com/file/d/1DOWU4pfAWnStKPnMa1G6s4A6xikK2gLI/view?usp=sharing\" target=\"_blank\">Klik Disini</a></p>', '2024-02-01 01:35:38', 2),
(13, 103, 'Jadwal PPDB', '<p>Jadwal PPDBM MAN&nbsp; Temanggung&nbsp; Akan dibuka mulai bulan Februari 2023</p>', '2024-02-01 01:35:56', 2);

-- --------------------------------------------------------

--
-- Table structure for table `setting`
--

CREATE TABLE `setting` (
  `id_setting` int(1) NOT NULL,
  `nama_sekolah` varchar(100) NOT NULL,
  `jenjang` int(11) NOT NULL,
  `nsm` varchar(30) NOT NULL,
  `npsn` varchar(30) DEFAULT NULL,
  `status` text NOT NULL,
  `alamat` varchar(255) DEFAULT NULL,
  `kota` varchar(30) DEFAULT NULL,
  `provinsi` varchar(30) DEFAULT NULL,
  `logo` varchar(50) DEFAULT NULL,
  `favicon` varchar(50) DEFAULT NULL,
  `email` varchar(50) DEFAULT NULL,
  `no_telp` varchar(50) DEFAULT NULL,
  `klikchat` text DEFAULT NULL,
  `livechat` text DEFAULT NULL,
  `nolivechat` varchar(50) DEFAULT NULL,
  `infobayar` text DEFAULT NULL,
  `syarat` text DEFAULT NULL,
  `kab` text NOT NULL,
  `kec` text NOT NULL,
  `web` text NOT NULL,
  `kepala` text NOT NULL,
  `nip` text NOT NULL,
  `ppdb` text DEFAULT NULL,
  `kop` varchar(50) NOT NULL,
  `logo_ppdb` varchar(100) NOT NULL,
  `tgl_pengumuman` date NOT NULL,
  `tgl_tutup` date NOT NULL,
  `gelombang_aktif` int(1) NOT NULL,
  `token` text CHARACTER SET latin1 COLLATE latin1_bin NOT NULL,
  `tema` text NOT NULL,
  `password` text NOT NULL,
  `login` int(1) NOT NULL,
  `_kop` int(1) NOT NULL,
  `lembaga` varchar(128) NOT NULL,
  `template` varchar(128) NOT NULL,
  `ttd` varchar(128) NOT NULL,
  `stempel` varchar(128) NOT NULL,
  `tgl_cetak` date NOT NULL,
  `header` text NOT NULL,
  `isi` text NOT NULL,
  `apikey` varchar(9999) DEFAULT NULL,
  `sender` varchar(9999) DEFAULT NULL,
  `server` varchar(9999) DEFAULT NULL,
  `tahun_pelajaran` varchar(9999) DEFAULT NULL,
  `ketua_panitia` varchar(200) DEFAULT NULL,
  `nip_ketua_panitia` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `setting`
--

INSERT INTO `setting` (`id_setting`, `nama_sekolah`, `jenjang`, `nsm`, `npsn`, `status`, `alamat`, `kota`, `provinsi`, `logo`, `favicon`, `email`, `no_telp`, `klikchat`, `livechat`, `nolivechat`, `infobayar`, `syarat`, `kab`, `kec`, `web`, `kepala`, `nip`, `ppdb`, `kop`, `logo_ppdb`, `tgl_pengumuman`, `tgl_tutup`, `gelombang_aktif`, `token`, `tema`, `password`, `login`, `_kop`, `lembaga`, `template`, `ttd`, `stempel`, `tgl_cetak`, `header`, `isi`, `apikey`, `sender`, `server`, `tahun_pelajaran`, `ketua_panitia`, `nip_ketua_panitia`) VALUES
(1, 'MADRASAH ALIYAH NEGERI TEMANGGUNG', 1, '131133230001', '20363250', 'Negeri', 'Jl. Jenderal Sudirman No.184', '', 'Jawa Tengah', 'assets/img/logo/logo956.png', NULL, 'man.temanggung@yahoo.com', '(0293) 491372', '', 'Assalamualaikum', '+628121592570', '<p>Rincian Pembayaran Daftar Ulang :<br></p><ol><li>Seragam&nbsp; : 200000</li><li>Topi : 20000</li></ol><p>Silahkan Transfer ke BRI : 0098765432</p>', '<p><br></p><ol><li>Surat Keterangan Lulus</li><li>Akta Kelahiran</li><li>Kartu Keluarga</li></ol>', 'Temanggung', 'Temanggung', 'manteamnggung.sch.id', ' H .ALi Masyhar S.Ag M.SI', '197109041999031002', '1', 'assets/img/kop/kop550.jpg', 'assets/img/logo/logo_ppdb100.png', '2024-01-01', '2024-02-06', 1, '0', 'tema6-style.css', '$2y$10$XGmY0sw.MU5wN0nPnYVMt.N/4w6sG1L1hTDGSThfuA9fDVzybi7.W', 1, 1, 'KEMENTERIAN AGAMA', 'assets/img/template/template415.png', 'assets/img/ttd/ttd772.png', 'assets/img/template/stempel484.png', '2020-07-14', 'PENGUMUMAN', '<ol><li style=\"text-align: justify; \"><b>Kartu Pelajar </b>ini merupakan kartu identitas resmi untuk siswa di MA&nbsp; Nurul Mujahidah NW Tanjung Selor</li><li style=\"text-align: justify;\">Kartu Pelajar ini berlaku selama Tercatat menjadi siswa/siswi aktif di MA Nurul Mujahidah NW Tanjung Selor</li><li style=\"text-align: justify;\">Status Kartu pelajar dapat di cek melalui laman Website resmi kami atau melalui scan barcode</li></ol>', '', '', '', '2024/2025', 'Jakfar Sodik, S.Pd.I., M.Pd', '19810124 200710 1 002');

-- --------------------------------------------------------

--
-- Table structure for table `siswa`
--

CREATE TABLE `siswa` (
  `id_siswa` int(4) NOT NULL,
  `nis` varchar(20) DEFAULT NULL,
  `no_daftar` varchar(20) DEFAULT NULL,
  `tgl_daftar` datetime NOT NULL DEFAULT current_timestamp(),
  `gelombang` int(1) NOT NULL,
  `kelas` varchar(100) DEFAULT NULL,
  `nama_siswa` varchar(256) DEFAULT NULL,
  `nisn` varchar(10) DEFAULT NULL,
  `warga_siswa` varchar(256) DEFAULT NULL,
  `nik` varchar(30) DEFAULT NULL,
  `tempat_lahir` varchar(256) DEFAULT NULL,
  `tgl_lahir` date DEFAULT NULL,
  `jk` varchar(1) DEFAULT NULL,
  `anak_ke` int(2) DEFAULT NULL,
  `saudara` int(11) DEFAULT NULL,
  `agama` varchar(256) DEFAULT NULL,
  `cita` varchar(256) DEFAULT NULL,
  `no_hp` varchar(256) DEFAULT NULL,
  `email` varchar(256) DEFAULT NULL,
  `hobi` varchar(256) DEFAULT NULL,
  `status_tinggal_siswa` varchar(256) DEFAULT NULL,
  `prov` varchar(256) DEFAULT NULL,
  `kab` varchar(256) DEFAULT NULL,
  `kec` varchar(256) DEFAULT NULL,
  `desa` varchar(256) DEFAULT NULL,
  `alamat_siswa` varchar(256) DEFAULT NULL,
  `kordinat` varchar(256) DEFAULT NULL,
  `kodepos_siswa` varchar(6) DEFAULT NULL,
  `transportasi` varchar(256) DEFAULT NULL,
  `jarak` varchar(256) DEFAULT NULL,
  `waktu` varchar(256) DEFAULT NULL,
  `biaya_sekolah` varchar(256) DEFAULT NULL,
  `keb_khusus` varchar(256) DEFAULT NULL,
  `keb_disabilitas` varchar(256) DEFAULT NULL,
  `tk` varchar(1) DEFAULT NULL,
  `paud` varchar(1) DEFAULT NULL,
  `hepatitis` varchar(1) DEFAULT NULL,
  `polio` varchar(1) DEFAULT NULL,
  `bcg` varchar(1) DEFAULT NULL,
  `campak` varchar(1) DEFAULT NULL,
  `dpt` varchar(1) DEFAULT NULL,
  `covid` varchar(1) DEFAULT NULL,
  `no_kip` varchar(256) DEFAULT NULL,
  `no_kks` varchar(256) DEFAULT NULL,
  `no_pkh` varchar(256) DEFAULT NULL,
  `no_kk` varchar(16) DEFAULT NULL,
  `kepala_keluarga` varchar(256) DEFAULT NULL,
  `nama_ayah` varchar(256) DEFAULT NULL,
  `status_ayah` varchar(256) DEFAULT NULL,
  `warga_ayah` varchar(256) DEFAULT NULL,
  `nik_ayah` varchar(16) DEFAULT NULL,
  `tempat_lahir_ayah` varchar(256) DEFAULT NULL,
  `tgl_lahir_ayah` text DEFAULT NULL,
  `pendidikan_ayah` varchar(256) DEFAULT NULL,
  `pekerjaan_ayah` varchar(256) DEFAULT NULL,
  `penghasilan_ayah` varchar(256) DEFAULT NULL,
  `no_hp_ayah` varchar(256) DEFAULT NULL,
  `domisili_ayah` varchar(256) DEFAULT NULL,
  `rt_ayah` varchar(4) DEFAULT NULL,
  `rw_ayah` varchar(4) DEFAULT NULL,
  `status_tmp_tinggal_ayah` varchar(256) DEFAULT NULL,
  `prov_ayah` varchar(256) DEFAULT NULL,
  `kab_ayah` varchar(256) DEFAULT NULL,
  `kec_ayah` varchar(256) DEFAULT NULL,
  `desa_ayah` varchar(256) DEFAULT NULL,
  `alamat_ayah` varchar(256) DEFAULT NULL,
  `kodepos_ayah` varchar(6) DEFAULT NULL,
  `nama_ibu` varchar(256) DEFAULT NULL,
  `status_ibu` varchar(256) DEFAULT NULL,
  `warga_ibu` varchar(256) DEFAULT NULL,
  `nik_ibu` varchar(256) DEFAULT NULL,
  `tempat_lahir_ibu` varchar(256) DEFAULT NULL,
  `tgl_lahir_ibu` text DEFAULT NULL,
  `pendidikan_ibu` varchar(256) DEFAULT NULL,
  `pekerjaan_ibu` varchar(256) DEFAULT NULL,
  `penghasilan_ibu` varchar(256) DEFAULT NULL,
  `no_hp_ibu` varchar(256) DEFAULT NULL,
  `status_tinggal_ibu` varchar(256) DEFAULT NULL,
  `domisili_ibu` varchar(128) DEFAULT NULL,
  `status_tmp_tinggal_ibu` varchar(256) DEFAULT NULL,
  `prov_ibu` varchar(256) DEFAULT NULL,
  `kab_ibu` varchar(256) DEFAULT NULL,
  `kec_ibu` varchar(256) DEFAULT NULL,
  `desa_ibu` varchar(256) DEFAULT NULL,
  `alamat_ibu` varchar(256) DEFAULT NULL,
  `kodepos_ibu` varchar(6) DEFAULT NULL,
  `status_wali` varchar(256) DEFAULT NULL,
  `nama_wali` varchar(256) DEFAULT NULL,
  `hubungan_wali` varchar(100) DEFAULT NULL,
  `warga_wali` varchar(256) DEFAULT NULL,
  `nik_wali` varchar(16) DEFAULT NULL,
  `tempat_lahir_wali` varchar(256) DEFAULT NULL,
  `tgl_lahir_wali` text DEFAULT NULL,
  `pendidikan_wali` varchar(256) DEFAULT NULL,
  `pekerjaan_wali` varchar(256) DEFAULT NULL,
  `penghasilan_wali` varchar(256) DEFAULT NULL,
  `no_hp_wali` varchar(16) DEFAULT NULL,
  `domisili_wali` varchar(256) DEFAULT NULL,
  `rt_wali` varchar(4) DEFAULT NULL,
  `rw_wali` varchar(4) DEFAULT NULL,
  `prov_wali` varchar(256) DEFAULT NULL,
  `kab_wali` varchar(256) DEFAULT NULL,
  `kec_wali` varchar(256) DEFAULT NULL,
  `desa_wali` varchar(256) DEFAULT NULL,
  `alamat_wali` varchar(256) DEFAULT NULL,
  `kodepos_wali` varchar(256) DEFAULT NULL,
  `foto` varchar(128) DEFAULT NULL,
  `jurusan` varchar(256) DEFAULT NULL,
  `file_kip` varchar(256) DEFAULT NULL,
  `file_ktp` text DEFAULT NULL,
  `file_kk` varchar(256) DEFAULT NULL,
  `file_ijazah` varchar(256) DEFAULT NULL,
  `file_akte` varchar(256) DEFAULT NULL,
  `file_shun` varchar(256) DEFAULT NULL,
  `tgl_mutasi` text DEFAULT NULL,
  `surat_masuk` text DEFAULT NULL,
  `alasan_mutasi` varchar(100) DEFAULT NULL,
  `asal_sekolah` text DEFAULT NULL,
  `npsn_sekolah` text DEFAULT NULL,
  `seri_ijazah` text DEFAULT NULL,
  `sekolah_mutasi` varchar(255) DEFAULT NULL,
  `level` varchar(10) DEFAULT NULL,
  `aktif` int(1) DEFAULT 0,
  `status` int(1) DEFAULT 0 COMMENT '0 terdaftar, 1 diterima, 2 tidak diterima',
  `tgl_siswa` date DEFAULT NULL,
  `online` int(1) DEFAULT 0,
  `password` text DEFAULT NULL,
  `jenis` int(11) DEFAULT NULL,
  `kelasmutasi` text DEFAULT NULL,
  `konfirmasi` int(11) DEFAULT NULL,
  `tahun_lulus` text DEFAULT NULL,
  `no_ijazahalumni` varchar(128) DEFAULT NULL,
  `golongandarah` text DEFAULT NULL,
  `penyakit` text DEFAULT NULL,
  `bin1` varchar(10) DEFAULT NULL,
  `bin2` varchar(10) DEFAULT NULL,
  `bin3` varchar(10) DEFAULT NULL,
  `bin4` varchar(10) DEFAULT NULL,
  `bin5` varchar(10) DEFAULT NULL,
  `mat1` varchar(10) DEFAULT NULL,
  `mat2` varchar(10) DEFAULT NULL,
  `mat3` varchar(10) DEFAULT NULL,
  `mat4` varchar(10) DEFAULT NULL,
  `mat5` varchar(10) DEFAULT NULL,
  `ipa1` varchar(10) DEFAULT NULL,
  `ipa2` varchar(10) DEFAULT NULL,
  `ipa3` varchar(10) DEFAULT NULL,
  `ipa4` varchar(10) DEFAULT NULL,
  `ipa5` varchar(10) DEFAULT NULL,
  `pai1` varchar(10) DEFAULT NULL,
  `pai2` varchar(10) DEFAULT NULL,
  `pai3` varchar(10) DEFAULT NULL,
  `pai4` varchar(10) DEFAULT NULL,
  `pai5` varchar(10) DEFAULT NULL,
  `jadwal_tes` varchar(100) DEFAULT NULL,
  `sesi_tes` varchar(100) DEFAULT NULL,
  `bta` varchar(10) DEFAULT NULL,
  `skl` varchar(5) DEFAULT NULL,
  `rataratasemester4` float DEFAULT NULL,
  `kkmsemester4` float DEFAULT NULL,
  `rataratasemester5` float DEFAULT NULL,
  `kkmsemester5` float DEFAULT NULL,
  `asrama` varchar(1) DEFAULT NULL,
  `ketrampilan` varchar(1) DEFAULT NULL,
  `kip` varchar(1) DEFAULT NULL,
  `pkh` varchar(1) DEFAULT NULL,
  `kks` varchar(1) DEFAULT NULL,
  `sktm` varchar(1) DEFAULT NULL,
  `peringkatkelassemester1` float DEFAULT NULL,
  `rataratasemester1` float DEFAULT NULL,
  `jumlahkelasparalelsemester1` float DEFAULT NULL,
  `peringkatkelassemester2` float DEFAULT NULL,
  `rataratasemester2` float DEFAULT NULL,
  `jumlahkelasparalelsemester2` float DEFAULT NULL,
  `peringkatkelassemester3` float DEFAULT NULL,
  `rataratasemester3` float DEFAULT NULL,
  `jumlahkelasparalelsemester3` float DEFAULT NULL,
  `peringkatkelassemester4` float DEFAULT NULL,
  `jumlahkelasparalelsemester4` float DEFAULT NULL,
  `peringkatkelassemester5` float DEFAULT NULL,
  `jumlahkelasparalelsemester5` float DEFAULT NULL,
  `juaraprestasi1` varchar(3) DEFAULT NULL,
  `eventprestasi1` varchar(200) DEFAULT NULL,
  `tingkatprestasi1` varchar(50) DEFAULT NULL,
  `tahunprestasi1` varchar(4) DEFAULT NULL,
  `juaraprestasi2` varchar(3) DEFAULT NULL,
  `eventprestasi2` varchar(200) DEFAULT NULL,
  `tingkatprestasi2` varchar(50) DEFAULT NULL,
  `tahunprestasi2` varchar(4) DEFAULT NULL,
  `juaraprestasi3` varchar(3) DEFAULT NULL,
  `eventprestasi3` varchar(200) DEFAULT NULL,
  `tingkatprestasi3` varchar(50) DEFAULT NULL,
  `tahunprestasi3` varchar(4) DEFAULT NULL,
  `validasi_data` int(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `siswa`
--

INSERT INTO `siswa` (`id_siswa`, `nis`, `no_daftar`, `tgl_daftar`, `gelombang`, `kelas`, `nama_siswa`, `nisn`, `warga_siswa`, `nik`, `tempat_lahir`, `tgl_lahir`, `jk`, `anak_ke`, `saudara`, `agama`, `cita`, `no_hp`, `email`, `hobi`, `status_tinggal_siswa`, `prov`, `kab`, `kec`, `desa`, `alamat_siswa`, `kordinat`, `kodepos_siswa`, `transportasi`, `jarak`, `waktu`, `biaya_sekolah`, `keb_khusus`, `keb_disabilitas`, `tk`, `paud`, `hepatitis`, `polio`, `bcg`, `campak`, `dpt`, `covid`, `no_kip`, `no_kks`, `no_pkh`, `no_kk`, `kepala_keluarga`, `nama_ayah`, `status_ayah`, `warga_ayah`, `nik_ayah`, `tempat_lahir_ayah`, `tgl_lahir_ayah`, `pendidikan_ayah`, `pekerjaan_ayah`, `penghasilan_ayah`, `no_hp_ayah`, `domisili_ayah`, `rt_ayah`, `rw_ayah`, `status_tmp_tinggal_ayah`, `prov_ayah`, `kab_ayah`, `kec_ayah`, `desa_ayah`, `alamat_ayah`, `kodepos_ayah`, `nama_ibu`, `status_ibu`, `warga_ibu`, `nik_ibu`, `tempat_lahir_ibu`, `tgl_lahir_ibu`, `pendidikan_ibu`, `pekerjaan_ibu`, `penghasilan_ibu`, `no_hp_ibu`, `status_tinggal_ibu`, `domisili_ibu`, `status_tmp_tinggal_ibu`, `prov_ibu`, `kab_ibu`, `kec_ibu`, `desa_ibu`, `alamat_ibu`, `kodepos_ibu`, `status_wali`, `nama_wali`, `hubungan_wali`, `warga_wali`, `nik_wali`, `tempat_lahir_wali`, `tgl_lahir_wali`, `pendidikan_wali`, `pekerjaan_wali`, `penghasilan_wali`, `no_hp_wali`, `domisili_wali`, `rt_wali`, `rw_wali`, `prov_wali`, `kab_wali`, `kec_wali`, `desa_wali`, `alamat_wali`, `kodepos_wali`, `foto`, `jurusan`, `file_kip`, `file_ktp`, `file_kk`, `file_ijazah`, `file_akte`, `file_shun`, `tgl_mutasi`, `surat_masuk`, `alasan_mutasi`, `asal_sekolah`, `npsn_sekolah`, `seri_ijazah`, `sekolah_mutasi`, `level`, `aktif`, `status`, `tgl_siswa`, `online`, `password`, `jenis`, `kelasmutasi`, `konfirmasi`, `tahun_lulus`, `no_ijazahalumni`, `golongandarah`, `penyakit`, `bin1`, `bin2`, `bin3`, `bin4`, `bin5`, `mat1`, `mat2`, `mat3`, `mat4`, `mat5`, `ipa1`, `ipa2`, `ipa3`, `ipa4`, `ipa5`, `pai1`, `pai2`, `pai3`, `pai4`, `pai5`, `jadwal_tes`, `sesi_tes`, `bta`, `skl`, `rataratasemester4`, `kkmsemester4`, `rataratasemester5`, `kkmsemester5`, `asrama`, `ketrampilan`, `kip`, `pkh`, `kks`, `sktm`, `peringkatkelassemester1`, `rataratasemester1`, `jumlahkelasparalelsemester1`, `peringkatkelassemester2`, `rataratasemester2`, `jumlahkelasparalelsemester2`, `peringkatkelassemester3`, `rataratasemester3`, `jumlahkelasparalelsemester3`, `peringkatkelassemester4`, `jumlahkelasparalelsemester4`, `peringkatkelassemester5`, `jumlahkelasparalelsemester5`, `juaraprestasi1`, `eventprestasi1`, `tingkatprestasi1`, `tahunprestasi1`, `juaraprestasi2`, `eventprestasi2`, `tingkatprestasi2`, `tahunprestasi2`, `juaraprestasi3`, `eventprestasi3`, `tingkatprestasi3`, `tahunprestasi3`, `validasi_data`) VALUES
(665, '9220', 'PPDB2024001', '2024-02-01 07:41:17', 1, NULL, 'Laras Dian Astuti', '0093870513', NULL, '3323114101090001', 'TEMANGGUNG', '2009-01-01', 'P', NULL, NULL, NULL, NULL, '081548958589', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '3323112903120006', NULL, 'SLAMET', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '085643895216', NULL, '003', '001', NULL, '', 'TEMANGGUNG', 'TRETEP', 'TRETEP', 'TRETEP', NULL, 'SARKUMI', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '085826108682', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'AFIRMASI', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'SMP ISLAM NGADIREJO', NULL, NULL, NULL, NULL, 0, 0, NULL, 0, 'LARAS', 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', '', 'Y', '', 'Y', 'Y', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(666, '2107889173', 'PPDB2024002', '2024-02-01 08:00:59', 1, NULL, 'Syafa Adila', '0093146142', NULL, '3323014908090001', 'Temanggung', '2009-08-09', 'P', NULL, NULL, NULL, NULL, '085647197125', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '3323012402070966', NULL, 'Supriadi', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '082220040819', NULL, '004', '002', NULL, '', 'Temanggung', 'Bulu', 'Pakurejo', 'Kuwon', NULL, 'Ninik Kurniawati', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '081229162437', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'REGULER', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'SMP Nur Lintang Kedu', NULL, NULL, NULL, NULL, 0, 0, NULL, 0, 'Syafa0908', 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 74, 0, 76, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(667, NULL, 'PPDB2024003', '2024-02-01 08:01:23', 1, NULL, 'Alina Farda Zahra', '308457542', NULL, NULL, 'Temanggung', '2008-05-26', NULL, NULL, NULL, NULL, NULL, '085647905244', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'assets/upload/foto_siswa/siswa726.jpg', 'REGULER', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'Pdf wustho almubarok', NULL, NULL, NULL, NULL, 0, 0, NULL, 0, '11111', 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(668, '', 'PPDB2024004', '2024-02-01 08:16:28', 1, NULL, 'Zaskia Deswinta Frisky', '0098909724', NULL, '', 'TEMANGGUNG', '2009-04-10', 'P', NULL, NULL, NULL, NULL, '0882006789112', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', NULL, 'Alm. SURYAWAN', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', NULL, '001', '003', NULL, '', 'TEMANGGUNG', 'KRANGGAN', 'BADRAN', 'KUNCEN, BADRAN', NULL, 'NURYANA', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'AFIRMASI', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'SMP N 2 SELOPAMPANG', NULL, NULL, NULL, NULL, 0, 0, NULL, 0, 'ZASKIA10', 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(669, '121133230002214655', 'PPDB2024005', '2024-02-01 08:32:21', 1, NULL, 'Ardan Ridho Pratama', '0099662602', NULL, '3323011312090001', 'TEMANGGUNG', '2009-12-13', 'L', NULL, NULL, NULL, NULL, '083843030220', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '3323010411100003', NULL, 'Kamaludin', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '085647267919', NULL, '001', '002', NULL, '', 'Temanggung', 'Bulu', 'Gondosuli', 'Dusun Salakan', NULL, 'Isfarikhah', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '083843030220', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'REGULER', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'MTSN 2 TEMANGGUNG', NULL, NULL, NULL, NULL, 0, 0, NULL, 0, '123456', 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 76, 70, 75, 70, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(671, NULL, 'PPDB2024007', '2024-02-01 08:39:55', 1, NULL, 'Ardina Putri Maha Dewti', '0092616666', NULL, NULL, 'Temanggung ', '2009-02-19', NULL, NULL, NULL, NULL, NULL, '082253355200', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'REGULER', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'SMP plus albustomi nw', NULL, NULL, NULL, NULL, 0, 0, NULL, 0, 'ardina2009', 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(672, '121133230002214629', 'PPDB2024008', '2024-02-01 09:00:27', 1, NULL, 'Agizta Sherlis Kirany', '3099504099', NULL, '3323094105090001', 'Temanggung', '2009-05-01', 'P', NULL, NULL, NULL, NULL, '085701369795', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '3323090503080003', NULL, 'Suyanto', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '085601626299', NULL, '001', '007', NULL, '', 'Temanggung', 'Ngadirejo', 'Banjarsari', 'Dusun Caruban', NULL, 'Parmi Kuwati', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '085701369795', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'REGULER', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'MTsN 2 Temanggung', NULL, NULL, NULL, NULL, 0, 0, NULL, 0, 'banjarsari', 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 77, 70, 77, 70, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(673, '', 'PPDB2024009', '2024-02-01 09:27:53', 1, NULL, 'Kevin Arkan Kemal Endriyanez', '3089383874', NULL, '3307082710080004', 'Temanggung ', '2008-10-27', 'L', NULL, NULL, NULL, NULL, '081286804822', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '3323082009120002', NULL, 'Wawan endri susanto ', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '081286804822', NULL, '002', '007', NULL, '', 'temanggung ', 'parakan ', 'watu kumpul ', 'sorodanan ', NULL, 'dwi Ratnawati ', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '085878533066', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'assets/upload/foto_siswa/siswa152.jpg', 'PRESTASI', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'SMP IT cahaya insyani temanggung ', NULL, NULL, NULL, NULL, 0, 0, NULL, 0, 'kevin', 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, NULL, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 2, 9, 24, 2, 9, 24, 2, 9, 24, 0, 0, 0, 0, '1 p', 'popda kab.tmg', 'kabupaten', '2023', '1 p', 'akmil cup', 'nasional', '2023', '', '', '', '', NULL),
(674, '2100728', 'PPDB2024010', '2024-02-01 09:29:12', 1, NULL, 'Raditya Kusuma Wardana', '3086783836', NULL, '3323051211080002', 'TEMANGGUNG', '2008-11-12', 'L', NULL, NULL, NULL, NULL, '087734136559', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '3323062708190005', NULL, 'MUHAMMAD SLAMET', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '087734136559', NULL, '001', '001', NULL, '', 'Temanggung', 'Kandangan', 'Kedungumpul', 'Dusun Magetan', NULL, 'RUWATI', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '087734136559', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'REGULER', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'SMP NIDA AL QURAN', NULL, NULL, NULL, NULL, 0, 0, NULL, 0, 'RADITYA', 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 79, 70, 80, 70, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(675, NULL, 'PPDB2024011', '2024-02-01 09:33:42', 1, NULL, 'Nayla Ardanita ', '009620377', NULL, NULL, 'Temanggung ', '2009-07-17', NULL, NULL, NULL, NULL, NULL, '082133647535', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'REGULER', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'Mts N 2 temanggung', NULL, NULL, NULL, NULL, 0, 0, NULL, 0, '77777777', 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(676, '121233230011211330', 'PPDB2024012', '2024-02-01 09:40:59', 1, NULL, 'Naysilla Pertiwi', '3086732178', NULL, '3323046812080003', 'Temanggung', '2008-12-28', 'P', NULL, NULL, NULL, NULL, '085868856605', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '3323041912055677', NULL, 'ADI SUPRAPTPO', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '085643620690', NULL, '07', '03', NULL, '', 'TEMANGGUNG', 'PRINGSURAT', 'NGIPIK', 'GEDOMPON 1', NULL, 'MAEMONAH', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '085868856605', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'REGULER', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'Mts maarif tembarak', NULL, NULL, NULL, NULL, 0, 0, NULL, 0, 'Naysilla', 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 88, 70, 90, 75, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(677, NULL, 'PPDB2024013', '2024-02-01 09:53:15', 1, NULL, 'Malihatunnisa', '3092796511', NULL, NULL, 'Temanggung', '2009-08-15', NULL, NULL, NULL, NULL, NULL, '088239945866', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'PRESTASI', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'MTS BANI HAJI ABDUL ROSYID', NULL, NULL, NULL, NULL, 0, 0, NULL, 0, 'latifah26', 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(678, NULL, 'PPDB2024014', '2024-02-01 10:03:30', 1, NULL, 'Ahmad Abdul Latif ', '0091375707', NULL, NULL, 'Temanggung ', '2009-02-16', NULL, NULL, NULL, NULL, NULL, '081326087712', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'REGULER', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'SMP IT CAHAYA INSANI TEMANGGUNG ', NULL, NULL, NULL, NULL, 0, 0, NULL, 0, 'latif1609', 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(679, '23002122', 'PPDB2024015', '2024-02-01 10:11:04', 1, NULL, 'Maulana Dwi Saputra', '0074247031', NULL, '3323202211070002', 'TEMANGGUNG', '2007-11-22', 'L', NULL, NULL, NULL, NULL, '085727364215', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '3323202502070111', NULL, 'MARSUDI', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '085727364215', NULL, '01', '03', NULL, '', 'Temanggung', 'Gemawang', 'Muncar', 'Jl. Curug Lawe, Muncar Gumuk Rt01/Rw03, Muncar, Gemawang, Temanggung', NULL, 'TUSMIYATI', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '085727364215', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'REGULER', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'SMP D-BAITO SUNAN PLUMBON TEMBARAK', NULL, NULL, NULL, NULL, 0, 0, NULL, 0, 'SAPUTRA2007', 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 78, 65, 77, 65, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(680, NULL, 'PPDB2024016', '2024-02-01 10:14:52', 1, NULL, 'Naubian Agli Baridzky', '0081269317', NULL, NULL, 'TEMANGGUNG', '2008-03-07', NULL, NULL, NULL, NULL, NULL, '087834204222', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'REGULER', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'SMP IT BINA UMAT YOGYA', NULL, NULL, NULL, NULL, 0, 0, NULL, 0, 'BIAN2008', 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(681, '210104506', 'PPDB2024017', '2024-02-01 10:16:11', 1, NULL, 'LUTFIA RIZQI', '0093272674', NULL, '3308215404090002', 'MAGELANG', '2009-04-14', 'P', NULL, NULL, NULL, NULL, '081218410194', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '3323151312130001', NULL, 'ALM.HARI KURNIAWAN', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '081218410194', NULL, '08', '04', NULL, '', 'TEMANGGUNG', 'SELOPAMPANG', 'GAMBASAN', 'GAMBASAN', NULL, 'US WATUN KHASANAH', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '081218410194', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'REGULER', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'SMP SYUBBANUL WATHON', NULL, NULL, NULL, NULL, 0, 0, NULL, 0, 'lutfia rizqi', 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 79, 75, 81, 75, NULL, NULL, 'Y', '', '', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(682, '1210010', 'PPDB2024018', '2024-02-01 10:18:53', 1, NULL, 'Durrotul Aini Azzain', '0099099113', NULL, '3304161908090001', 'Banjarnegara ', '2009-08-19', 'P', NULL, NULL, NULL, NULL, '089630319756', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '3304161601110152', NULL, 'SUPRIYONO ', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '0895433918100', NULL, '03', '03', NULL, '', 'Banjarnegara', 'Batur', 'Karangtengah', 'simpangan ', NULL, 'USWATUN CHASANAH ', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '0895433918100', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'REGULER', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'MTs  N 1 Temanggung', NULL, NULL, NULL, NULL, 0, 0, NULL, 0, 'azza1989', 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(683, NULL, 'PPDB2024019', '2024-02-01 10:23:33', 1, NULL, 'Anis', '1237650', NULL, NULL, 'Swmarang', '2022-02-22', NULL, NULL, NULL, NULL, NULL, '086542379846', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'PRESTASI', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'Mana', NULL, NULL, NULL, NULL, 0, 0, NULL, 0, 'Semarang1', 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(684, '0067377281', 'PPDB2024020', '2024-02-01 10:41:38', 1, NULL, 'Raihan Pradana', '0067377281', NULL, '3323030411060006', 'TEMANGGUNG', '2006-11-04', 'L', NULL, NULL, NULL, NULL, '082329110558', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '3323030411060006', NULL, 'Achmad kumaidi', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '08156645557', NULL, '10', '02', NULL, '', 'Temanggung', 'Temanggung', 'Banyuurip', 'Banyuurip Tengah ', NULL, 'Ary aryati', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '08984239995', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'assets/upload/foto_siswa/siswa553.png', 'REGULER', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'SMPN 3 TEMANGGUNG', NULL, NULL, NULL, NULL, 0, 0, NULL, 0, '411206', 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(685, NULL, 'PPDB2024021', '2024-02-01 10:56:35', 1, NULL, 'Savrilla Kikan Indeswari', '3099789473', NULL, NULL, 'TEMANGGUNG', '2009-04-04', NULL, NULL, NULL, NULL, NULL, '08158858015', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'REGULER', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'SMPN 1 KANDANGAN', NULL, NULL, NULL, NULL, 0, 0, NULL, 0, 'Avrill04', 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(686, '', 'PPDB2024022', '2024-02-01 11:02:24', 1, NULL, 'Agisna Ila Mardiyatika', '0091646245', NULL, '3175026504090004', 'Bekasi', '2009-04-25', 'P', NULL, NULL, NULL, NULL, '0817241639', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '3175021001092363', NULL, 'm. fatkhul akhdlori', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '0817241639', NULL, '01', '02', NULL, '', 'bekasi', 'rawalumbu', 'sepanjang jaya', 'jl bambu kuning 7 no 216', NULL, 'wulan ika lanny', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '08118008232', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'aminatun subkhiyah', 'bude', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '085711918272', NULL, '', '', '', 'temanggung', 'parakan', 'parakan kauman', 'karang tengah no 612', NULL, 'assets/upload/foto_siswa/siswa66.png', 'REGULER', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'smp 2 daar el qolam ', NULL, NULL, NULL, NULL, 0, 0, NULL, 0, 'agisna', 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(687, NULL, 'PPDB2024023', '2024-02-01 11:06:46', 1, NULL, 'Devina Marshalivia', '3095607992', NULL, NULL, 'Temanggung', '2009-03-25', NULL, NULL, NULL, NULL, NULL, '08557041295', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'REGULER', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'Yayasan Subulussalam Nusantara PKBM Zaid Bin Tsabit', NULL, NULL, NULL, NULL, 0, 0, NULL, 0, 'Marsini11', 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `tampil`
--

CREATE TABLE `tampil` (
  `id` int(1) NOT NULL,
  `nisn` text NOT NULL,
  `nis` varchar(11) NOT NULL,
  `nik` text NOT NULL,
  `no_kk` text NOT NULL,
  `no_kip` text NOT NULL,
  `no_hp` text NOT NULL,
  `kewarganegaraan` text NOT NULL,
  `anak_ke` text NOT NULL,
  `saudara` text NOT NULL,
  `status_tinggal` text NOT NULL,
  `nama_ayah` text NOT NULL,
  `status_ayah` text NOT NULL,
  `nik_ayah` text NOT NULL,
  `pendidikan_ayah` text NOT NULL,
  `nama_ibu` text NOT NULL,
  `status_ibu` text NOT NULL,
  `nik_ibu` text NOT NULL,
  `pendidikan_ibu` text NOT NULL,
  `penghasilan_ayah` text NOT NULL,
  `penghasilan_ibu` text NOT NULL,
  `alamat` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `tampil`
--

INSERT INTO `tampil` (`id`, `nisn`, `nis`, `nik`, `no_kk`, `no_kip`, `no_hp`, `kewarganegaraan`, `anak_ke`, `saudara`, `status_tinggal`, `nama_ayah`, `status_ayah`, `nik_ayah`, `pendidikan_ayah`, `nama_ibu`, `status_ibu`, `nik_ibu`, `pendidikan_ibu`, `penghasilan_ayah`, `penghasilan_ibu`, `alamat`) VALUES
(1, 'Y', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id_user` int(11) NOT NULL,
  `nama_user` varchar(128) DEFAULT NULL,
  `level` varchar(128) DEFAULT NULL,
  `username` varchar(128) DEFAULT NULL,
  `password` text DEFAULT NULL,
  `status` int(1) DEFAULT NULL,
  `foto` int(11) DEFAULT NULL,
  `mapel` text DEFAULT NULL,
  `nuptk` text DEFAULT NULL,
  `jenkel` varchar(20) DEFAULT NULL,
  `tempat_lahir` text DEFAULT NULL,
  `tgl_lahir` date DEFAULT NULL,
  `tmt` year(4) DEFAULT NULL,
  `no_sk` text DEFAULT NULL,
  `jenis` text DEFAULT NULL,
  `no_hp` varchar(20) DEFAULT NULL,
  `nik` int(11) DEFAULT NULL,
  `akses` varchar(128) DEFAULT NULL,
  `kelas` varchar(20) DEFAULT NULL,
  `pendidikan` text DEFAULT NULL,
  `status_tmp_tinggal` text DEFAULT NULL,
  `prov` text DEFAULT NULL,
  `kab` text DEFAULT NULL,
  `kec` text DEFAULT NULL,
  `desa` text DEFAULT NULL,
  `alamat` text DEFAULT NULL,
  `kodepos` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id_user`, `nama_user`, `level`, `username`, `password`, `status`, `foto`, `mapel`, `nuptk`, `jenkel`, `tempat_lahir`, `tgl_lahir`, `tmt`, `no_sk`, `jenis`, `no_hp`, `nik`, `akses`, `kelas`, `pendidikan`, `status_tmp_tinggal`, `prov`, `kab`, `kec`, `desa`, `alamat`, `kodepos`) VALUES
(85, 'admin', '', 'admin', '$2y$10$Z61i/VJnVIu6tKt.KdGa9uPa8C3vQfmIE0bztQvZjJqW1VFXxfMPi', 2, 0, '', '', '', '', '0000-00-00', 0000, '', '', '', 0, 'ppdb', '', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `bayar`
--
ALTER TABLE `bayar`
  ADD PRIMARY KEY (`id_bayar`);

--
-- Indexes for table `biaya`
--
ALTER TABLE `biaya`
  ADD PRIMARY KEY (`id_biaya`);

--
-- Indexes for table `histori`
--
ALTER TABLE `histori`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `jenis`
--
ALTER TABLE `jenis`
  ADD PRIMARY KEY (`id_jenis`);

--
-- Indexes for table `jenjang`
--
ALTER TABLE `jenjang`
  ADD PRIMARY KEY (`id_jenjang`);

--
-- Indexes for table `jurusan`
--
ALTER TABLE `jurusan`
  ADD PRIMARY KEY (`id_jurusan`);

--
-- Indexes for table `kategori`
--
ALTER TABLE `kategori`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `kontak`
--
ALTER TABLE `kontak`
  ADD PRIMARY KEY (`id_kontak`);

--
-- Indexes for table `pengumuman`
--
ALTER TABLE `pengumuman`
  ADD PRIMARY KEY (`id_pengumuman`);

--
-- Indexes for table `setting`
--
ALTER TABLE `setting`
  ADD PRIMARY KEY (`id_setting`);

--
-- Indexes for table `siswa`
--
ALTER TABLE `siswa`
  ADD PRIMARY KEY (`id_siswa`) USING BTREE;

--
-- Indexes for table `tampil`
--
ALTER TABLE `tampil`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD UNIQUE KEY `id_user` (`id_user`),
  ADD UNIQUE KEY `username` (`username`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `histori`
--
ALTER TABLE `histori`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `jenjang`
--
ALTER TABLE `jenjang`
  MODIFY `id_jenjang` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `kategori`
--
ALTER TABLE `kategori`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `kontak`
--
ALTER TABLE `kontak`
  MODIFY `id_kontak` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `pengumuman`
--
ALTER TABLE `pengumuman`
  MODIFY `id_pengumuman` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `siswa`
--
ALTER TABLE `siswa`
  MODIFY `id_siswa` int(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=688;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=86;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

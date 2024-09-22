-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 25, 2024 at 06:34 PM
-- Server version: 10.4.22-MariaDB
-- PHP Version: 8.1.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `mbkm`
--

-- --------------------------------------------------------

--
-- Table structure for table `alur`
--

CREATE TABLE `alur` (
  `id` int(11) NOT NULL,
  `id_program` int(11) NOT NULL,
  `nama_program` varchar(50) NOT NULL,
  `gambar` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `alur`
--

INSERT INTO `alur` (`id`, `id_program`, `nama_program`, `gambar`) VALUES
(6, 1, 'Magang Merdeka', 'msib (1).png'),
(7, 2, 'Studi Independen', 'msib (1).png'),
(8, 3, 'IISMA', 'IISMA (2).png'),
(9, 4, 'Pertukaran Mahasiswa Merdeka', 'PMM (2).png'),
(10, 5, 'Kampus Mengajar', 'KM.png'),
(11, 6, 'Praktisi Mengajar', 'PM (1).png'),
(12, 8, 'Wirausaha Merdeka', 'WMK.png'),
(13, 9, 'Bangkit', 'BANGKIT.png');

-- --------------------------------------------------------

--
-- Table structure for table `berita`
--

CREATE TABLE `berita` (
  `id` int(11) NOT NULL,
  `judul` varchar(50) NOT NULL,
  `gambar` varchar(255) NOT NULL,
  `isi` varchar(5000) NOT NULL,
  `penulis` varchar(20) DEFAULT NULL,
  `tanggal_posting` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `berita`
--

INSERT INTO `berita` (`id`, `judul`, `gambar`, `isi`, `penulis`, `tanggal_posting`) VALUES
(6, 'Magang PKKM 2024', '66a863201239d4.48144038.png', '<p><strong>Diberitahukan </strong>kepada mahasiswa&nbsp;<strong>Program Studi Sistem Komputer dan Sistem Informasi</strong>, akan dibuka magang Program Kompetisi Kampus Merdeka yang rencana akan dilaksanakan mulai&nbsp; bulan <strong>September 2024</strong> .</p>\r\n\r\n<p><strong>Magang</strong>&nbsp;<strong>PKKM&nbsp; Program Studi Sistem Komputer&nbsp;</strong>&nbsp;akan dilaksanakan di mitra</p>\r\n\r\n<p><strong>1. Robopark&nbsp;</strong></p>\r\n\r\n<p><strong>2. Reasuransi Indonesia Utama</strong></p>\r\n\r\n<p>Pendaftaran Mahasiswa&nbsp;<strong>Sistem Komputer</strong>&nbsp;di link dibawah ini</p>\r\n\r\n<p><a href=\"https://forms.gle/iJ8eaUUXZsvaaQM19\" target=\"_blank\">https://forms.gle/iJ8eaUUXZsvaaQM19</a></p>\r\n\r\n<p>&nbsp;</p>\r\n', 'Admin MBKM Jakstik', '2024-08-25 12:39:20'),
(7, 'Pembukaan Pendaftaran Batch 7', '66a86a93806194.01820697.png', '<p>Program Magang &amp; Studi Independen Bersertifikat (MSIB) batch 7 telah resmi dibuka. Pendaftaran program MSIB 7 dibuka dari tanggal 26 April sampai 10 Juni 2024.<br />\r\nProgram MSIB merupakan program yang dilaksanakan dengan tujuan untuk persiapan karir yang komprehensif serta memberikan kesempatan bagi para mahasiswa untuk dapat belajar di luar program studi dengan jaminan konversi SKS yang diakui perguruan tinggi.</p>\r\n\r\n<p><br />\r\n<strong>Timeline Kegiatan MSIB 7</strong><br />\r\nProgram MSIB 7 terdiri dari dua jadwal tahapan yakni, jadwal seleksi mahasiswa serta jadwal pelaksanaan kegiatan. Sebagai berikut</p>\r\n\r\n<p><br />\r\n1. Jadwal Seleksi Mahasiswa<br />\r\n26 April-10 Juni 2024: Sosialisasi ke Perguruan Tinggi<br />\r\n26 April-10 Juni 2024: Pendaftaran Mahasiswa<br />\r\n26 April-12 Juni 2024: Verval Dokumen Mahasiswa oleh Perguruan Tinggi<br />\r\n13 Juni-12 Juli 2024: Seleksi dan Offering Mahasiswa oleh Mitra<br />\r\n15 Juli 2024: Laporan Hasil Seleksi Mahasiswa</p>\r\n\r\n<p>2. Jadwal Tes Kebhinekaan<br />\r\nPemanasan 29 Juli 2024<br />\r\nTes 30 Juli 2024</p>\r\n', 'Admin MBKM Jakstik', '2024-08-25 14:27:24');

-- --------------------------------------------------------

--
-- Table structure for table `msib_mandiri`
--

CREATE TABLE `msib_mandiri` (
  `id` int(11) NOT NULL,
  `id_program` int(11) NOT NULL,
  `nama_program` varchar(50) DEFAULT NULL,
  `nama_mitra` varchar(50) DEFAULT NULL,
  `posisi` varchar(50) DEFAULT NULL,
  `kualifikasi` varchar(255) DEFAULT NULL,
  `periode` varchar(30) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `msib_mandiri`
--

INSERT INTO `msib_mandiri` (`id`, `id_program`, `nama_program`, `nama_mitra`, `posisi`, `kualifikasi`, `periode`) VALUES
(1, 10, 'Magang Mandiri', 'PT Teknologi Rekacipta Digital', 'Front End Web Developer', '- Minimal Semester 5\r\n- Mampu Menguasai React Js', '2024-07-15 - 2024-07-25'),
(2, 10, 'Magang Mandiri', 'PT Technolab', 'Robotics Developer', '- Minimal Semester 7\r\n- Memiliki pengetahuan tentang arduino', '010824-311224'),
(3, 10, 'Magang Mandiri', 'PT Telkomsel Indonesia', 'UI/UX Designer', '- Memiliki', '2024-07-16-2024-09-26');

-- --------------------------------------------------------

--
-- Table structure for table `peserta`
--

CREATE TABLE `peserta` (
  `id` int(11) NOT NULL,
  `id_program` int(11) NOT NULL,
  `jenis_program` varchar(255) DEFAULT NULL,
  `npm` varchar(8) NOT NULL,
  `nama_mhs` varchar(255) DEFAULT NULL,
  `prodi` varchar(255) DEFAULT NULL,
  `nama_mitra` varchar(255) DEFAULT NULL,
  `posisi` varchar(255) DEFAULT NULL,
  `batch` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `peserta`
--

INSERT INTO `peserta` (`id`, `id_program`, `jenis_program`, `npm`, `nama_mhs`, `prodi`, `nama_mitra`, `posisi`, `batch`) VALUES
(132, 2, 'Studi Independen', '30419012', 'Beni Apriatna', 'Manajemen Informatika', 'PT. Lentera Bangsa Benderang', 'UI/UX Designer', '2'),
(133, 2, 'Studi Independen', '30419014', 'Fahri Alfiansyah', 'Manajemen Informatika', 'PT. Lentera Bangsa Benderang', 'UI/UX Designer', '2'),
(134, 1, 'Magang', '30419017', 'Salsabila Kamilah', 'Manajemen Informatika', 'PT. Ecart Webportal Indonesia', 'Finance - Tax', '2'),
(135, 2, 'Studi Independen', '30419018', 'Ikhram C Putra', 'Manajemen Informatika', 'PT. Lentera Bangsa Benderang', 'UI/UX Designer', '2'),
(136, 2, 'Studi Independen', '30419019', 'Mutia Fauziah', 'Manajemen Informatika', 'PT. Orbit Ventura Indonesia', 'Foundations of AI and Life Skills for Gen-Z', '2'),
(137, 2, 'Studi Independen', '30419020', 'Fitri Nurhikmah', 'Manajemen Informatika', 'PT. Lentera Bangsa Benderang', 'UI/UX Designer', '2'),
(138, 2, 'Studi Independen', '30419132', 'Ichsan Wahyu Perdana', 'Manajemen Informatika', 'PT. Ruang Raya Indonesia', 'Data, Business Analytics & Operations Bootcamp', '2'),
(139, 2, 'Studi Independen', '20419008', 'Prayogi Aldiansyah', 'Sistem Komputer', 'Balitbang SDM Kominfo', 'CyberSecurity', '2'),
(140, 2, 'Studi Independen', '20419094', 'Husein Alfikri', 'Sistem Komputer', 'Universitas Terbuka', 'Microcredential Game Developer', '2'),
(141, 1, 'Magang', '20418007', 'Daffa Rizki Prasetia', 'Sistem Komputer', 'PT.Bhinneka Mentaridimensi', 'Software Developer Intern', '2'),
(142, 2, 'Studi Independen', '20418222', 'Dodi', 'Sistem Komputer', 'PT.Orbit Ventura Indonesia', 'AI Mastery Program', '2'),
(143, 2, 'Studi Independen', '20418089', 'Ibnu Karim Ismail', 'Sistem Komputer', 'PT. Zona Edukasi Nusantara', 'UI/UX Product Design', '2'),
(144, 1, 'Magang', '10418113', 'Muhammad Nur Hafidz', 'Sistem Informasi', 'Bakrie Center Foundation', 'Divisi IT', '2'),
(145, 2, 'Studi Independen', '10418110', 'Ramdhan Kuncoro Adji', 'Sistem Informasi', 'PT Mitra Semeru Indonesia', 'E-Commerce Batch 02 (SIBE02)', '2'),
(146, 9, 'Bangkit', '10417166', 'Naufal Ramadhan', 'Sistem Informasi', 'PT Presentologics', 'Android Learning Path', '2'),
(147, 1, 'Magang', '10418105', 'Muhammad Zulwan Rivai', 'Sistem Informasi', 'PT. Hashmicro Solusi Indonesia', 'UI/UX Designer', '2'),
(148, 2, 'Studi Independen', '10418042', 'Fitri Inayah', 'Sistem Informasi', 'PT. Lentera Bangsa Benderang', 'UI/UX Designer', '2'),
(149, 2, 'Studi Independen', '10418060', 'Luqman Helmi Rabbani', 'Sistem Informasi', 'PT. Lentera Bangsa Benderang', 'UI/UX Designer', '2'),
(150, 2, 'Studi Independen', '10418068', 'Galeh Putra Ramanda', 'Sistem Informasi', 'PT. Lentera Bangsa Benderang', 'UI/UX Designer', '2'),
(151, 2, 'Studi Independen', '10418087', 'Muhammad Helmi Gusthomuloh', 'Sistem Informasi', 'PT. Lentera Bangsa Benderang', 'Front End Javascript', '2'),
(152, 2, 'Studi Independen', '10418172', 'Imam Kurniansyah', 'Sistem Informasi', 'PT. Lentera Bangsa Benderang', 'Backend Java', '2'),
(153, 2, 'Studi Independen', '10418182', 'Daniel Sibarani', 'Sistem Informasi', 'PT. Lentera Bangsa Benderang', 'UI/UX Designer', '2'),
(154, 2, 'Studi Independen', '10418197', 'Ibnu Syah Zehan', 'Sistem Informasi', 'PT. Lentera Bangsa Benderang', 'UI/UX Designer', '2'),
(155, 2, 'Studi Independen', '10419027', 'Anisya Komalasari', 'Sistem Informasi', 'PT. Lentera Bangsa Benderang', 'UI/UX Designer', '2'),
(156, 2, 'Studi Independen', '10418002', 'Khalila Zahida', 'Sistem Informasi', 'PT. Maribelajar Indonesia Cerdas', 'Intelligence Cloud Track', '2'),
(157, 2, 'Studi Independen', '10418023', 'Alfian Apriansyah', 'Sistem Informasi', 'PT. Maribelajar Indonesia Cerdas', 'Intelligence Cloud Track', '2'),
(158, 2, 'Studi Independen', '10418037', 'Yunif Tanjung', 'Sistem Informasi', 'PT. Maribelajar Indonesia Cerdas', 'Intelligence Cloud Track', '2'),
(159, 2, 'Studi Independen', '10418063', 'Ilham Hafidz Ahmadi', 'Sistem Informasi', 'PT. Maribelajar Indonesia Cerdas', 'Information Worker Track', '2'),
(160, 2, 'Studi Independen', '10418085', 'Ganes Subakti', 'Sistem Informasi', 'PT. Maribelajar Indonesia Cerdas', 'Intelligence Cloud Track', '2'),
(161, 2, 'Studi Independen', '10418100', 'Safrido Ahmad Perdana', 'Sistem Informasi', 'PT. Maribelajar Indonesia Cerdas', 'Intelligence Cloud Track', '2'),
(162, 2, 'Studi Independen', '10418127', 'Haries Anthony', 'Sistem Informasi', 'PT. Maribelajar Indonesia Cerdas', 'Modern Educator Track', '2'),
(163, 2, 'Studi Independen', '10418144', 'Calvin Anang Fauzi', 'Sistem Informasi', 'PT. Maribelajar Indonesia Cerdas', 'Intelligence Cloud Track', '2'),
(164, 2, 'Studi Independen', '10418169', 'Sonny Andrean Sitompul', 'Sistem Informasi', 'PT. Maribelajar Indonesia Cerdas', 'Intelligence Cloud Track', '2'),
(165, 2, 'Studi Independen', '10418185', 'Anggi Nurrohim', 'Sistem Informasi', 'PT. Maribelajar Indonesia Cerdas', 'Intelligence Cloud Track', '2'),
(166, 2, 'Studi Independen', '10419065', 'Clarissa Cahya Ningrum', 'Sistem Informasi', 'PT. Maribelajar Indonesia Cerdas', 'Information Worker Track', '2'),
(167, 2, 'Studi Independen', '10418033', 'Muhammad Dwi Alam Rizki', 'Sistem Informasi', 'PT. Marka Kreasi Persada', 'Becoming Professional UI/UX Designer', '2'),
(168, 2, 'Studi Independen', '10418104', 'Ahmad Sauqy Ghazali', 'Sistem Informasi', 'PT. Marka Kreasi Persada', 'JS Front-End Engineer', '2'),
(169, 1, 'Magang', '10418190', 'Danar Feriantino', 'Sistem Informasi', 'PT. XL Axiata Tbk', 'Information Technology Directorate Intern', '2'),
(170, 2, 'Studi Independen', '10418074', 'Niko Taufiqurrokhman', 'Sistem Informasi', 'PT.Orbit Ventura Indonesia', 'Foundations of AI and Life Skills for Gen-Z', '2'),
(171, 2, 'Studi Independen', '10418114', 'Robin Richard Parulian', 'Sistem Informasi', 'PT.Orbit Ventura Indonesia', 'Foundations of AI and Life Skills for Gen-Z', '2'),
(172, 2, 'Studi Independen', '10418159', 'Arry Wiandana Syahputra', 'Sistem Informasi', 'PT.Orbit Ventura Indonesia', 'Foundations of AI and Life Skills for Gen-Z', '2'),
(173, 2, 'Studi Independen', '10418192', 'Muhammad Farhan', 'Sistem Informasi', 'PT.Orbit Ventura Indonesia', 'Foundations of AI and Life Skills for Gen-Z', '2'),
(174, 2, 'Studi Independen', '10419026', 'Daffa Reyhan Arsyad', 'Sistem Informasi', 'PT.Orbit Ventura Indonesia', 'Foundations of AI and Life Skills for Gen-Z', '2'),
(175, 2, 'Studi Independen', '10418066', 'Irfan Mushadi', 'Sistem Informasi', 'Yayasan Sekolah Ekspor Nasional', 'Digital Ekspor', '2'),
(176, 2, 'Studi Independen', '30420017', 'Muhammad Ilham Sani', 'Manajemen Informatika', 'PT Zona Edukasi Nusantara', 'Web Development', '3'),
(177, 2, 'Studi Independen', '20420108', 'Resti Haffy Marlin', 'Sistem Komputer', 'PT BISA ARTIFISIAL INDONESIA', 'Infrastuktur Kecerdasan Artifisial (AI-INFRA)', '3'),
(178, 1, 'Magang', '20419105', 'Muhammad Jordan Maulana', 'Sistem Komputer', 'Kementerian Komunikasi dan Informatika', 'Cybersecurity Analyst', '3'),
(179, 1, 'Magang', '20419006', 'Mochammad Raihan Firdaussya', 'Sistem Komputer', 'Kementerian Komunikasi dan Informatika', 'Cybersecurity Analyst', '3'),
(180, 1, 'Magang', '20419008', 'Prayogi Aldiansyah Syahputra', 'Sistem Komputer', 'Kementerian Komunikasi dan Informatika', 'Cybersecurity Analyst', '3'),
(181, 2, 'Studi Independen', '20420012', 'Furqon Irkhamni', 'Sistem Komputer', 'PT Ozami Inti Sinergi', 'Internet of Things (IoT) Engineer Camp', '3'),
(182, 2, 'Studi Independen', '20420009', 'Meclin Bintang Geovani', 'Sistem Komputer', 'PT Orbit Ventura Indonesia', 'AI 4 Jobs', '3'),
(183, 2, 'Studi Independen', '10420104', 'Rio Widywasa', 'Sistem Informasi', 'PT. Lentera Bangsa Benderang', 'Fullstack Web', '3'),
(184, 2, 'Studi Independen', '10420102', 'Fauzi Darmawan', 'Sistem Informasi', 'PT. Lentera Bangsa Benderang', 'Fullstack Web', '3'),
(185, 2, 'Studi Independen', '10420090', 'Zidane Arvito', 'Sistem Informasi', 'PT. Lentera Bangsa Benderang', 'Fullstack Web', '3'),
(186, 2, 'Studi Independen', '10420074', 'Faishal Azka Ammar Muthi', 'Sistem Informasi', 'PT. Lentera Bangsa Benderang', 'Fullstack Web', '3'),
(187, 2, 'Studi Independen', '10420075', 'Rizaki Fadhilla Fandi', 'Sistem Informasi', 'PT. Lentera Bangsa Benderang', 'Android Engineering', '3'),
(188, 2, 'Studi Independen', '10420050', 'Mutiara Azka Putri Arifin', 'Sistem Informasi', 'Yayasan Bakti Achmad Zaky', 'Startup Campus - Data Science Track', '3'),
(189, 2, 'Studi Independen', '10419078', 'Anissa Febrina Andreany', 'Sistem Informasi', 'PT. Lentera Bangsa Benderang', 'Product Management - Digital Product', '3'),
(190, 2, 'Studi Independen', '10420076', 'Mohammad Fakhri Haromain', 'Sistem Informasi', 'PT. Lentera Bangsa Benderang', 'Front End Javasript', '3'),
(191, 1, 'Magang', '10420020', 'Muthia Solikin', 'Sistem Informasi', 'PT Digital Inisiatif', 'Data Administrator - Bentara Budaya Jakarta ', '3'),
(192, 2, 'Studi Independen', '10420064', 'Naza Zulfiqi', 'Sistem Informasi', 'PT. Impactbyte Teknologi Edukasi', 'Front-end Web Development', '3'),
(193, 2, 'Studi Independen', '10420033', 'Elsa Nadia Putri', 'Sistem Informasi', 'PT Stechoq Robotika Indonesia', '3D Designing Course for Digital Transformation and Industry 4.0', '3'),
(194, 2, 'Studi Independen', '10419001', 'Revina Anizia', 'Sistem Informasi', 'PT Mitra Semeru Indonesia', 'Digital Marketing Camp', '3'),
(195, 2, 'Studi Independen', '10420088', 'Revin Zuhdi Zanzibar', 'Sistem Informasi', 'PT Mitra Semeru Indonesia', 'E-Commerce: Start Up, Smart Up, & Scale Up', '3'),
(196, 2, 'Studi Independen', '10420087', 'Nur Azkia Rahmah', 'Sistem Informasi', 'PT Dwi Inti Putra', 'Data Scientist', '3'),
(197, 2, 'Studi Independen', '10420039', 'Meilyana Anisa Mawarti', 'Sistem Informasi', 'PT. Impactbyte Teknologi Edukasi', 'Front-end Web Development', '3'),
(198, 2, 'Studi Independen', '10420113', 'Jehezkiel Leonardo', 'Sistem Informasi', 'PT Ruang Raya Indonesia', 'Backend Engineering', '3'),
(199, 2, 'Studi Independen', '10420018', 'Octavia Nur Lestari', 'Sistem Informasi', 'PT. Lentera Bangsa Benderang', 'Fullstack Web', '3'),
(200, 2, 'Studi Independen', '10420001', 'Azizah Dwi Juniasari', 'Sistem Informasi', 'Yayasan Dicoding Indonesia', 'Pengembang Multi-Platform dan Back-End', '3'),
(201, 2, 'Studi Independen', '10420096', 'Radhya Anindita', 'Sistem Informasi', 'Yayasan Dicoding Indonesia', 'Pengembang Multi-Platform dan Back-End', '3'),
(202, 2, 'Studi Independen', '10420047', 'Fernandes Ariadi Simanjuntak', 'Sistem Informasi', 'PT Marka Kreasi Persada', 'Mastering Flutter. From Zero to Hero Engineer Program', '3'),
(203, 10, 'Magang Mandiri', '10419027', 'Anisya Komalasari', 'Sistem Informasi', 'PT. Telkom Indonesia', 'UI/UX Designer', '4'),
(204, 10, 'Magang Mandiri', '10419139', 'Ryan Ardyansyah', 'Sistem Informasi', 'PT. Telkom Indonesia', 'Android Developer', '4'),
(205, 10, 'Magang Mandiri', '10922111', 'Fitri Nurhikmah', 'Sistem Informasi', 'PT. Telkom Indonesia', 'UI/UX Designer', '4'),
(206, 9, 'Bangkit', '20400035', 'Pandu Prastiyo Aji', 'Sistem Komputer', 'Bangkit Academy', 'Android Learning Path', '4'),
(207, 9, 'Bangkit', '30721094', 'Widy Astuti', 'Manajemen Informatika', 'Bangkit Academy', 'Android Learning Path', '4'),
(208, 9, 'Bangkit', '30721091', 'M. Fidyan Aldino', 'Manajemen Informatika', 'Bangkit Academy', 'Android Learning Path', '4'),
(209, 2, 'Studi Independen', '30421041', 'Salman Al Farizi', 'Manajemen Informatika', 'PT Presentologics', 'Pengembang Front-End Web Dan Back-End', '4'),
(210, 2, 'Studi Independen', '30421153', 'AGUNG PRATAMA', 'Manajemen Informatika', 'PT Dibimbing Digital Indonesia', 'Data Warehousing: Modeling And Optimization Techniques', '6'),
(211, 2, 'Studi Independen', '30422006', 'Anisa Wulan Sari', 'Manajemen Informatika', 'PT Educa Sisfomedia Indonesia', 'Kelas Industri Web Back-End Development', '6'),
(212, 2, 'Studi Independen', '30422007', 'Dina Afriyani', 'Manajemen Informatika', 'PT Mahir Technology Indonesia', 'Code Mastery Bootcamp', '6'),
(213, 2, 'Studi Independen', '30421012', 'Isna Hernawati', 'Manajemen Informatika', 'PT Kinema Systrans Multimedia', 'Web Development & UI UX Design', '6'),
(214, 2, 'Studi Independen', '30422008', 'Isma Hasnawati', 'Manajemen Informatika', 'PT Kinema Systrans Multimedia', 'IBM Academy : Hybrid Cloud & Red Hat', '6'),
(215, 2, 'Studi Independen', '30422104', 'Zahra Syaharani', 'Manajemen Informatika', 'PT Mitra Talenta Grup', 'Data Science Basics', '6'),
(216, 2, 'Studi Independen', '10421130', 'Aldrian Putra Andi Pratama', 'Sistem Informasi', 'PT Mitra Talenta Grup', 'Data Engineering Basics', '6'),
(217, 2, 'Studi Independen', '10421060', 'Fikri Kamal', 'Sistem Informasi', 'PT MariBelajar Indonesia Cerdas', 'Microsoft Web & Mobile Developer', '6'),
(218, 2, 'Studi Independen', '10420039', 'Meilyana Anisa Mawarti', 'Sistem Informasi', 'PT Mitra Talenta Grup', 'Data Science Basics', '6'),
(219, 2, 'Studi Independen', '10420088', 'Revin Zuhdi Zanzibar', 'Sistem Informasi', 'Masyarakat Industri Kreatif Teknologi Informasi dan Komunikasi Indonesia', 'Golang Backend Developer Dengan Pendekatan Computer Vision Dan Artificial Intelligence (AI)', '6'),
(220, 1, 'Magang', '10420076', 'Mohammad Fakhri Haromain', 'Sistem Informasi', 'Yayasan Adipurna Inovasi Asia', 'Scrum Master', '6'),
(221, 1, 'Magang', '10420104', 'Rio Widywasa', 'Sistem Informasi', 'PT Hacktivate Teknologi Indonesia', 'Fullstack Javascript - Instructor Assistant', '6'),
(222, 10, 'Magang Mandiri', '10420001', 'Azizah Dwi Juniasari', 'Sistem Informasi', 'campaign.com', 'Quality Assurance', '6'),
(223, 10, 'Magang Mandiri', '10420020', 'Muthia Solikin', 'Sistem Informasi', 'PT Prudential Life Assurance', 'Data Analytics', '6'),
(224, 2, 'Studi Independen', '30421054', 'Aditria Mulyana', 'Manajemen Informatika', 'PT Kinema Systrans Multimedia', 'Web Development', '5'),
(225, 2, 'Studi Independen', '30421010', 'Annisa Ramadhani', 'Manajemen Informatika', 'PT Kinema Systrans Multimedia', 'Web Development', '5'),
(226, 2, 'Studi Independen', '30421011', 'Putra Ilhamsyah Muharam', 'Manajemen Informatika', 'PT Kinema Systrans Multimedia', 'Web Development', '5'),
(227, 2, 'Studi Independen', '20420055', 'Andrianto Wibowo', 'Sistem Komputer', 'PT Gama Multi Usaha Mandiri', 'Cloud Computing Security Engineer (Cybersecurity)', '5'),
(228, 2, 'Studi Independen', '20420011', 'Dedi Misael Nababan', 'Sistem Komputer', 'PT Orbit Ventura Indonesia', 'Artificial Intelligence 4 Jobs', '5'),
(229, 2, 'Studi Independen', '20420021', 'Diaz Ramadhan', 'Sistem Komputer', 'PT Sinergi Transformasi Digital', 'Network Security Operation Center (Cyber Blue Team)', '5'),
(230, 2, 'Studi Independen', '20420012', 'Furqon Irkhamni', 'Sistem Komputer', 'Yayasan Sekolah Ekspor Nasional', 'Be A Digital Exporter', '5'),
(231, 2, 'Studi Independen', '20420035', 'Pandu Prastiyo Aji', 'Sistem Komputer', 'PT Hendevane Indonesia', 'Network Engineering ', '5'),
(232, 2, 'Studi Independen', '10822130', 'Irvan Al Rasyid', 'Sistem Informasi', 'PT Kinema Systrans Multimedia', 'Android Mobile Application Development', '5'),
(233, 2, 'Studi Independen', '10421058', 'Muhammad Zaky', 'Sistem Informasi', 'PT Kinema Systrans Multimedia', 'Red Hat Certified System Administrator - IBM AI & Cybersecurity ', '5'),
(234, 2, 'Studi Independen', '10421017', 'Rivaldi Rahman', 'Sistem Informasi', 'PT Kinema Systrans Multimedia', 'Red Hat Certified System Administrator - IBM AI & Cybersecurity ', '5'),
(235, 2, 'Studi Independen', '10421035', 'Abdul Fatah Ibrahim', 'Sistem Informasi', 'PT Kinema Systrans Multimedia', 'Web Development', '5'),
(236, 2, 'Studi Independen', '10421038', 'Aldy Arya Pratama', 'Sistem Informasi', 'PT Kinema Systrans Multimedia', 'Web Development', '5'),
(237, 2, 'Studi Independen', '10421014', 'Dea Ainun Latifah', 'Sistem Informasi', 'PT Kinema Systrans Multimedia', 'Web Development', '5'),
(238, 2, 'Studi Independen', '10421021', 'Faris Muzhafar', 'Sistem Informasi', 'PT Kinema Systrans Multimedia', 'Web Development', '5'),
(239, 2, 'Studi Independen', '10421061', 'Muhammad Rizky Fakhriansah', 'Sistem Informasi', 'PT Kinema Systrans Multimedia', 'Web Development', '5'),
(240, 2, 'Studi Independen', '10421071', 'Nurfaizi', 'Sistem Informasi', 'PT Kinema Systrans Multimedia', 'Web Development', '5'),
(241, 2, 'Studi Independen', '10421050', 'Putri Rahmawati', 'Sistem Informasi', 'PT Kinema Systrans Multimedia', 'Web Development', '5'),
(242, 2, 'Studi Independen', '10421006', 'Rachmat Mulandani', 'Sistem Informasi', 'PT Kinema Systrans Multimedia', 'Web Development', '5'),
(243, 2, 'Studi Independen', '10421015', 'Sahip Alik', 'Sistem Informasi', 'PT Kinema Systrans Multimedia', 'Web Development', '5'),
(244, 2, 'Studi Independen', '10421024', 'Akmal Fahmi Basyarahil', 'Sistem Informasi', 'PT MariBelajar Indonesia Cerdas', 'Data Analyst And AI', '5'),
(245, 2, 'Studi Independen', '10421033', 'Diajeng Aulia Pangesti', 'Sistem Informasi', 'PT MariBelajar Indonesia Cerdas', 'Data Analyst And AI', '5'),
(246, 2, 'Studi Independen', '10421048', 'Muhammad Dzaki Farizqi', 'Sistem Informasi', 'PT MariBelajar Indonesia Cerdas', 'Data Analyst And AI', '5'),
(247, 1, 'Magang', '10420087', 'Nur Azkia Rahmah', 'Sistem Informasi', 'PT Menara Indonesia', 'AI Programmer & Data Science', '5'),
(248, 1, 'Magang', '10420090', 'Zidane Arvito', 'Sistem Informasi', 'PT Menara Indonesia', 'Back End, API & Database Developer', '5'),
(249, 1, 'Magang', '10420001', 'Azizah Dwi Juniasari', 'Sistem Informasi', 'PT Menara Indonesia', 'IT Quality Assurance & Testing', '5'),
(250, 1, 'Magang', '10420064', 'Naza Zulfiqi', 'Sistem Informasi', 'PT Menara Indonesia', 'Web Front End Developer', '5'),
(251, 2, 'Studi Independen', '10421046', 'Ahmad Fikriansyah', 'Sistem Informasi', 'PT Orbit Ventura Indonesia', 'Artificial Intelligence 4 Jobs', '5'),
(252, 2, 'Studi Independen', '10421005', 'Defi Afrilia', 'Sistem Informasi', 'PT Orbit Ventura Indonesia', 'Artificial Intelligence 4 Jobs', '5'),
(253, 2, 'Studi Independen', '10421045', 'Muhammad Daffa Al Hakim', 'Sistem Informasi', 'PT Orbit Ventura Indonesia', 'Artificial Intelligence 4 Jobs', '5'),
(254, 1, 'Magang', '10420020', 'Muthia Solikin', 'Sistem Informasi', 'PT Prudential Life Assurance', 'Data Analytics', '5'),
(255, 10, 'Magang Mandiri', '10419039', 'Ryan Ardiansyah', 'Sistem Informasi', 'PT Telkom Indonesia', 'Android Developer', '5'),
(256, 1, 'Magang', '10420096', 'Radhya Anindita', 'Sistem Informasi', 'PT Triputra Agro Persada Tbk', 'HC System Development & Medical Internship', '5'),
(257, 2, 'Studi Independen', '10420003', 'Azkiya Kamila', 'Sistem Informasi', 'PT. Ctech ERP Indonesia', 'System Analyst Cloud Enterprise Resource Planning Odoo ', '5'),
(258, 2, 'Studi Independen', '10420056', 'Adiva Khoirunisa', 'Sistem Informasi', 'PT Kinema Systrans Multimedia', 'Web Development', '5'),
(259, 2, 'Studi Independen', '10417110', 'Mochammad Haekal Sandy', 'Sistem Informasi', 'PT Impactbyte Tekonologi Edukasi', 'UI/UX Designer', '1'),
(260, 2, 'Studi Independen', '20418089', 'Ibnu Karim Ismail', 'Sistem Komputer', 'PT Impactbyte Tekonologi Edukasi', 'UI/UX Designer', '1'),
(261, 2, 'Studi Independen', '10418062', 'Alfina Munic', 'Sistem Informasi', 'PT Impactbyte Tekonologi Edukasi', 'UI/UX Designer', '1'),
(262, 2, 'Studi Independen', '10417082', 'Faqih Yugo Susilo', 'Sistem Informasi', 'PT Impactbyte Tekonologi Edukasi', 'UI/UX Designer', '1'),
(263, 2, 'Studi Independen', '10418105', 'Muhammad Zulwan Rivai', 'Sistem Informasi', 'PT Impactbyte Tekonologi Edukasi', 'UI/UX Designer', '1'),
(264, 2, 'Studi Independen', '10418122', 'Muhamad Rizky Putra', 'Sistem Informasi', 'PT Impactbyte Tekonologi Edukasi', 'UI/UX Designer', '1'),
(265, 2, 'Studi Independen', '10418056', 'Nabilah Salsabilah', 'Sistem Informasi', 'PT Impactbyte Tekonologi Edukasi', 'UI/UX Designer', '1'),
(266, 2, 'Studi Independen', '10418001', 'Qorry Oktaviani', 'Sistem Informasi', 'PT Impactbyte Tekonologi Edukasi', 'UI/UX Designer', '1'),
(267, 2, 'Studi Independen', '10418076', 'Aditya Dewanto', 'Sistem Informasi', 'PT Impactbyte Tekonologi Edukasi', 'UI/UX Designer', '1'),
(268, 2, 'Studi Independen', '10418042', 'Fitri Inayah', 'Sistem Informasi', 'PT Impactbyte Tekonologi Edukasi', 'UI/UX Designer', '1'),
(269, 2, 'Studi Independen', '10418002', 'Khalila Zahida', 'Sistem Informasi', 'PT Impactbyte Tekonologi Edukasi', 'UI/UX Designer', '1'),
(270, 2, 'Studi Independen', '10418043', 'Dimas Wahyu Hidayat', 'Sistem Informasi', 'PT Impactbyte Tekonologi Edukasi', 'UI/UX Designer', '1'),
(271, 2, 'Studi Independen', '10418100', 'Safrido Ahmad Perdana', 'Sistem Informasi', 'PT Impactbyte Tekonologi Edukasi', 'UI/UX Designer', '1'),
(272, 2, 'Studi Independen', '10418057', 'Yenni Putri Nurdini', 'Sistem Informasi', 'PT Impactbyte Tekonologi Edukasi', 'UI/UX Designer', '1'),
(273, 2, 'Studi Independen', '10418048', 'Raganata Alrahcy', 'Sistem Informasi', 'PT Impactbyte Tekonologi Edukasi', 'UI/UX Designer', '1'),
(274, 2, 'Studi Independen', '10418096', 'Rima Novitasari', 'Sistem Informasi', 'PT Impactbyte Tekonologi Edukasi', 'UI/UX Designer', '1'),
(275, 2, 'Studi Independen', '10418094', 'Anisah Rona Tanjung', 'Sistem Informasi', 'PT Impactbyte Tekonologi Edukasi', 'UI/UX Designer', '1'),
(276, 2, 'Studi Independen', '10418068', 'Galeh Putra Ramanda', 'Sistem Informasi', 'PT Hacktivate Teknologi Indonesia', 'Android With Java Native', '1'),
(277, 2, 'Studi Independen', '20418222', 'Dodi', 'Sistem Komputer', 'Yayasan Sekolah Ekspor Nasional', 'Menjadi Eksportir Baru 4.0', '1'),
(278, 2, 'Studi Independen', '10418127', 'Haries Anthony', 'Sistem Informasi', 'PT MariBelajar Indonesia Cerdas', 'Microsoft Productivity The Modern Workplace', '1'),
(279, 2, 'Studi Independen', '10418159', 'Arry Wiandana Syahputra', 'Sistem Informasi', 'PT Orbit Ventura Indonesia', 'Artificial Intelligence Gen Y', '1'),
(280, 2, 'Studi Independen', '10418172', 'Imam Kurniansyah', 'Sistem Informasi', 'PT Gits Indonesia', 'Menjadi Mobile APP Developer dengan Android Kotlin', '1'),
(281, 2, 'Studi Independen', '10419083', 'Leo Puji Christyanto', 'Sistem Informasi', 'PT Marka Kreasi Persada', 'Fullstack Engineering', '1'),
(282, 2, 'Studi Independen', '10417094', 'Muhammad Dzaky Rahmatullah', 'Sistem Informasi', 'PT MariBelajar Indonesia Cerdas', 'Microsoft Productivity The Modern Workplace', '1'),
(283, 1, 'Magang', '10417184', 'Riyanti Mauliya', 'Sistem Informasi', 'PT Menara Indonesia', 'Pengembang Aplikasi dan Web Portal', '1'),
(284, 1, 'Magang', '10418190', 'Danar Feriantino', 'Sistem Informasi', 'PT XL Axiata Tbk', 'Information Technology Directorate Intern', '1');

-- --------------------------------------------------------

--
-- Table structure for table `program`
--

CREATE TABLE `program` (
  `id` int(11) NOT NULL,
  `gambar` varchar(255) NOT NULL,
  `nama` varchar(255) NOT NULL,
  `deskripsi` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `program`
--

INSERT INTO `program` (`id`, `gambar`, `nama`, `deskripsi`) VALUES
(1, 'msib.png', 'Magang Merdeka', 'Memberikan kesempatan kepada mahasiswa untuk mendapatkan pengalaman praktis di industri atau lembaga terkait dengan bidang studinya, memperluas wawasan mereka tentang dunia kerja'),
(2, 'msib.png', 'Studi Independen', 'Menyediakan dukungan untuk mahasiswa yang ingin mengembangkan keterampilan dan pengetahuan tambahan di luar kurikulum formal, seperti kursus online, sertifikasi, atau pelatihan mandiri'),
(3, 'iisma.png', 'IISMA', 'Program yang memungkinkan mahasiswa untuk mengikuti perkuliahan atau program akademik di perguruan tinggi lain di luar negeri, untuk meningkatkan pengalaman belajar dan pemahaman lintas budaya'),
(4, 'pmm.png', 'Pertukaran Mahasiswa Merdeka', 'Program yang memungkinkan mahasiswa untuk mengikuti perkuliahan atau program akademik di perguruan tinggi lain di dalam negeri, untuk meningkatkan pengalaman belajar dan pemahaman lintas budaya'),
(5, 'km.webp', 'Kampus Mengajar', 'Mengajak mahasiswa untuk terlibat dalam kegiatan yang memberikan manfaat langsung bagi masyarakat, seperti pengajaran di sekolah-sekolah pedalaman, program kesehatan masyarakat, atau proyek lingkungan'),
(6, 'pm.png', 'Praktisi Mengajar', 'Ruang kolaborasi antara Praktisi sebagai representasi industri dengan dosen Perguruan Tinggi dalam bentuk pengajaran mata kuliah agar mahasiswa lebih siap untuk masuk ke dunia kerja'),
(7, 'mandiri.png', 'Magang Mandiri Kampus Merdeka', 'Temukan pengalaman dunia kerja yang dikelola langsung oleh perusahaan tanpa ada batasan kuota dan jadwal yang lebih fleksibel'),
(8, 'wmk.png', 'Wirausaha Merdeka', 'Mendorong mahasiswa untuk mengembangkan ide bisnis dan keterampilan kewirausahaan, memberikan pelatihan dan dukungan untuk memulai usaha mereka sendiri atau bergabung dengan startup'),
(9, 'bangkit.png', 'Bangkit', 'Dirancang untuk mempersiapkan mahasiswa dengan keterampilan yang dibutuhkan dan sertifikasi teknologi, kurikulum Bangkit menawarkan 3 jalur pembelajaran interdisipliner - pembelajaran mesin, pengembangan aplikasi mobile, dan komputasi awan.'),
(10, 'logo-stmik-jkrt-stik.webp', 'Magang Mandiri ', 'Magang Non Flagship');

-- --------------------------------------------------------

--
-- Table structure for table `testimoni`
--

CREATE TABLE `testimoni` (
  `id` int(11) NOT NULL,
  `id_peserta` int(11) NOT NULL,
  `id_program` int(11) NOT NULL,
  `nama_mhs` varchar(50) NOT NULL,
  `nama_mitra` varchar(255) DEFAULT NULL,
  `posisi` varchar(35) NOT NULL,
  `jenis_program` varchar(35) NOT NULL,
  `batch` varchar(10) NOT NULL,
  `testimoni` varchar(1000) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `testimoni`
--

INSERT INTO `testimoni` (`id`, `id_peserta`, `id_program`, `nama_mhs`, `nama_mitra`, `posisi`, `jenis_program`, `batch`, `testimoni`) VALUES
(10, 207, 9, 'Widy Astuti', 'Bangkit Academy', 'Android Learning Path', 'Bangkit', '4', 'Program Bangkit dengan Android Learning Path sangat bermanfaat. Saya menguasai keterampilan pengembangan aplikasi Android dan siap berkontribusi di industri teknologi dengan pengetahuan praktis dan terkini.'),
(11, 225, 2, 'Annisa Ramadhani', 'PT Kinema Systrans Multimedia', 'Web Development', 'Studi Independen', '5', 'Program Studi Independen di Infinite Learning untuk Web Development sangat efektif. Saya mempelajari keterampilan coding terbaru dan siap menghadapi tantangan dunia kerja di bidang pengembangan web.'),
(12, 254, 1, 'Muthia Solikin', 'PT Prudential Life Assurance', 'Data Analytics', 'Magang', '5', 'Magang di Prudential sebagai Data Analyst sangat berharga. Saya memperoleh pengalaman langsung dalam analisis data dan wawasan mendalam tentang industri asuransi, yang memperkuat keterampilan dan membuka peluang karir.'),
(13, 166, 2, 'Clarissa Cahya Ningrum', 'PT. Maribelajar Indonesia Cerdas', 'Information Worker Track', 'Studi Independen', '2', 'Program Studi Independen di Information Worker Track sangat bermanfaat, memberikan keterampilan praktis yang relevan dan mempersiapkan saya untuk karir di bidang informasi dengan kemampuan teknis dan analitis yang kuat.');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `nama` varchar(30) NOT NULL,
  `username` varchar(255) DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL,
  `role` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `nama`, `username`, `password`, `role`) VALUES
(2, 'Admin MBKM Jakstik', 'admin', '123', 'ADMIN');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `alur`
--
ALTER TABLE `alur`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_program` (`id_program`);

--
-- Indexes for table `berita`
--
ALTER TABLE `berita`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `msib_mandiri`
--
ALTER TABLE `msib_mandiri`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_program` (`id_program`);

--
-- Indexes for table `peserta`
--
ALTER TABLE `peserta`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_program` (`id_program`);

--
-- Indexes for table `program`
--
ALTER TABLE `program`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `testimoni`
--
ALTER TABLE `testimoni`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_peserta` (`id_peserta`),
  ADD KEY `id_program` (`id_program`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `alur`
--
ALTER TABLE `alur`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `berita`
--
ALTER TABLE `berita`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `msib_mandiri`
--
ALTER TABLE `msib_mandiri`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `peserta`
--
ALTER TABLE `peserta`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=286;

--
-- AUTO_INCREMENT for table `program`
--
ALTER TABLE `program`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `testimoni`
--
ALTER TABLE `testimoni`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `alur`
--
ALTER TABLE `alur`
  ADD CONSTRAINT `alur_ibfk_1` FOREIGN KEY (`id_program`) REFERENCES `program` (`id`);

--
-- Constraints for table `msib_mandiri`
--
ALTER TABLE `msib_mandiri`
  ADD CONSTRAINT `msib_mandiri_ibfk_1` FOREIGN KEY (`id_program`) REFERENCES `program` (`id`);

--
-- Constraints for table `peserta`
--
ALTER TABLE `peserta`
  ADD CONSTRAINT `peserta_ibfk_1` FOREIGN KEY (`id_program`) REFERENCES `program` (`id`);

--
-- Constraints for table `testimoni`
--
ALTER TABLE `testimoni`
  ADD CONSTRAINT `testimoni_ibfk_1` FOREIGN KEY (`id_peserta`) REFERENCES `peserta` (`id`),
  ADD CONSTRAINT `testimoni_ibfk_2` FOREIGN KEY (`id_program`) REFERENCES `program` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

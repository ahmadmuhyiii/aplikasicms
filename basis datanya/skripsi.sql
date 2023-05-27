-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 02 Feb 2023 pada 09.13
-- Versi server: 10.4.21-MariaDB
-- Versi PHP: 8.0.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `skripsi`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `citys`
--

CREATE TABLE `citys` (
  `id` bigint(10) UNSIGNED NOT NULL,
  `province_id` bigint(10) UNSIGNED NOT NULL,
  `type` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `city_name` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `postal_code` varchar(10) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `citys`
--

INSERT INTO `citys` (`id`, `province_id`, `type`, `city_name`, `postal_code`, `created_at`, `updated_at`) VALUES
(1, 21, 'Kabupaten', 'Aceh Barat', '23681', NULL, NULL),
(2, 21, 'Kabupaten', 'Aceh Barat Daya', '23764', NULL, NULL),
(3, 21, 'Kabupaten', 'Aceh Besar', '23951', NULL, NULL),
(4, 21, 'Kabupaten', 'Aceh Jaya', '23654', NULL, NULL),
(5, 21, 'Kabupaten', 'Aceh Selatan', '23719', NULL, NULL),
(6, 21, 'Kabupaten', 'Aceh Singkil', '24785', NULL, NULL),
(7, 21, 'Kabupaten', 'Aceh Tamiang', '24476', NULL, NULL),
(8, 21, 'Kabupaten', 'Aceh Tengah', '24511', NULL, NULL),
(9, 21, 'Kabupaten', 'Aceh Tenggara', '24611', NULL, NULL),
(10, 21, 'Kabupaten', 'Aceh Timur', '24454', NULL, NULL),
(11, 21, 'Kabupaten', 'Aceh Utara', '24382', NULL, NULL),
(12, 32, 'Kabupaten', 'Agam', '26411', NULL, NULL),
(13, 23, 'Kabupaten', 'Alor', '85811', NULL, NULL),
(14, 19, 'Kota', 'Ambon', '97222', NULL, NULL),
(15, 34, 'Kabupaten', 'Asahan', '21214', NULL, NULL),
(16, 24, 'Kabupaten', 'Asmat', '99777', NULL, NULL),
(17, 1, 'Kabupaten', 'Badung', '80351', NULL, NULL),
(18, 13, 'Kabupaten', 'Balangan', '71611', NULL, NULL),
(19, 15, 'Kota', 'Balikpapan', '76111', NULL, NULL),
(20, 21, 'Kota', 'Banda Aceh', '23238', NULL, NULL),
(21, 18, 'Kota', 'Bandar Lampung', '35139', NULL, NULL),
(22, 9, 'Kabupaten', 'Bandung', '40311', NULL, NULL),
(23, 9, 'Kota', 'Bandung', '40111', NULL, NULL),
(24, 9, 'Kabupaten', 'Bandung Barat', '40721', NULL, NULL),
(25, 29, 'Kabupaten', 'Banggai', '94711', NULL, NULL),
(26, 29, 'Kabupaten', 'Banggai Kepulauan', '94881', NULL, NULL),
(27, 2, 'Kabupaten', 'Bangka', '33212', NULL, NULL),
(28, 2, 'Kabupaten', 'Bangka Barat', '33315', NULL, NULL),
(29, 2, 'Kabupaten', 'Bangka Selatan', '33719', NULL, NULL),
(30, 2, 'Kabupaten', 'Bangka Tengah', '33613', NULL, NULL),
(31, 11, 'Kabupaten', 'Bangkalan', '69118', NULL, NULL),
(32, 1, 'Kabupaten', 'Bangli', '80619', NULL, NULL),
(33, 13, 'Kabupaten', 'Banjar', '70619', NULL, NULL),
(34, 9, 'Kota', 'Banjar', '46311', NULL, NULL),
(35, 13, 'Kota', 'Banjarbaru', '70712', NULL, NULL),
(36, 13, 'Kota', 'Banjarmasin', '70117', NULL, NULL),
(37, 10, 'Kabupaten', 'Banjarnegara', '53419', NULL, NULL),
(38, 28, 'Kabupaten', 'Bantaeng', '92411', NULL, NULL),
(39, 5, 'Kabupaten', 'Bantul', '55715', NULL, NULL),
(40, 33, 'Kabupaten', 'Banyuasin', '30911', NULL, NULL),
(41, 10, 'Kabupaten', 'Banyumas', '53114', NULL, NULL),
(42, 11, 'Kabupaten', 'Banyuwangi', '68416', NULL, NULL),
(43, 13, 'Kabupaten', 'Barito Kuala', '70511', NULL, NULL),
(44, 14, 'Kabupaten', 'Barito Selatan', '73711', NULL, NULL),
(45, 14, 'Kabupaten', 'Barito Timur', '73671', NULL, NULL),
(46, 14, 'Kabupaten', 'Barito Utara', '73881', NULL, NULL),
(47, 28, 'Kabupaten', 'Barru', '90719', NULL, NULL),
(48, 17, 'Kota', 'Batam', '29413', NULL, NULL),
(49, 10, 'Kabupaten', 'Batang', '51211', NULL, NULL),
(50, 8, 'Kabupaten', 'Batang Hari', '36613', NULL, NULL),
(51, 11, 'Kota', 'Batu', '65311', NULL, NULL),
(52, 34, 'Kabupaten', 'Batu Bara', '21655', NULL, NULL),
(53, 30, 'Kota', 'Bau-Bau', '93719', NULL, NULL),
(54, 9, 'Kabupaten', 'Bekasi', '17837', NULL, NULL),
(55, 9, 'Kota', 'Bekasi', '17121', NULL, NULL),
(56, 2, 'Kabupaten', 'Belitung', '33419', NULL, NULL),
(57, 2, 'Kabupaten', 'Belitung Timur', '33519', NULL, NULL),
(58, 23, 'Kabupaten', 'Belu', '85711', NULL, NULL),
(59, 21, 'Kabupaten', 'Bener Meriah', '24581', NULL, NULL),
(60, 26, 'Kabupaten', 'Bengkalis', '28719', NULL, NULL),
(61, 12, 'Kabupaten', 'Bengkayang', '79213', NULL, NULL),
(62, 4, 'Kota', 'Bengkulu', '38229', NULL, NULL),
(63, 4, 'Kabupaten', 'Bengkulu Selatan', '38519', NULL, NULL),
(64, 4, 'Kabupaten', 'Bengkulu Tengah', '38319', NULL, NULL),
(65, 4, 'Kabupaten', 'Bengkulu Utara', '38619', NULL, NULL),
(66, 15, 'Kabupaten', 'Berau', '77311', NULL, NULL),
(67, 24, 'Kabupaten', 'Biak Numfor', '98119', NULL, NULL),
(68, 22, 'Kabupaten', 'Bima', '84171', NULL, NULL),
(69, 22, 'Kota', 'Bima', '84139', NULL, NULL),
(70, 34, 'Kota', 'Binjai', '20712', NULL, NULL),
(71, 17, 'Kabupaten', 'Bintan', '29135', NULL, NULL),
(72, 21, 'Kabupaten', 'Bireuen', '24219', NULL, NULL),
(73, 31, 'Kota', 'Bitung', '95512', NULL, NULL),
(74, 11, 'Kabupaten', 'Blitar', '66171', NULL, NULL),
(75, 11, 'Kota', 'Blitar', '66124', NULL, NULL),
(76, 10, 'Kabupaten', 'Blora', '58219', NULL, NULL),
(77, 7, 'Kabupaten', 'Boalemo', '96319', NULL, NULL),
(78, 9, 'Kabupaten', 'Bogor', '16911', NULL, NULL),
(79, 9, 'Kota', 'Bogor', '16119', NULL, NULL),
(80, 11, 'Kabupaten', 'Bojonegoro', '62119', NULL, NULL),
(81, 31, 'Kabupaten', 'Bolaang Mongondow (Bolmong)', '95755', NULL, NULL),
(82, 31, 'Kabupaten', 'Bolaang Mongondow Selatan', '95774', NULL, NULL),
(83, 31, 'Kabupaten', 'Bolaang Mongondow Timur', '95783', NULL, NULL),
(84, 31, 'Kabupaten', 'Bolaang Mongondow Utara', '95765', NULL, NULL),
(85, 30, 'Kabupaten', 'Bombana', '93771', NULL, NULL),
(86, 11, 'Kabupaten', 'Bondowoso', '68219', NULL, NULL),
(87, 28, 'Kabupaten', 'Bone', '92713', NULL, NULL),
(88, 7, 'Kabupaten', 'Bone Bolango', '96511', NULL, NULL),
(89, 15, 'Kota', 'Bontang', '75313', NULL, NULL),
(90, 24, 'Kabupaten', 'Boven Digoel', '99662', NULL, NULL),
(91, 10, 'Kabupaten', 'Boyolali', '57312', NULL, NULL),
(92, 10, 'Kabupaten', 'Brebes', '52212', NULL, NULL),
(93, 32, 'Kota', 'Bukittinggi', '26115', NULL, NULL),
(94, 1, 'Kabupaten', 'Buleleng', '81111', NULL, NULL),
(95, 28, 'Kabupaten', 'Bulukumba', '92511', NULL, NULL),
(96, 16, 'Kabupaten', 'Bulungan (Bulongan)', '77211', NULL, NULL),
(97, 8, 'Kabupaten', 'Bungo', '37216', NULL, NULL),
(98, 29, 'Kabupaten', 'Buol', '94564', NULL, NULL),
(99, 19, 'Kabupaten', 'Buru', '97371', NULL, NULL),
(100, 19, 'Kabupaten', 'Buru Selatan', '97351', NULL, NULL),
(101, 30, 'Kabupaten', 'Buton', '93754', NULL, NULL),
(102, 30, 'Kabupaten', 'Buton Utara', '93745', NULL, NULL),
(103, 9, 'Kabupaten', 'Ciamis', '46211', NULL, NULL),
(104, 9, 'Kabupaten', 'Cianjur', '43217', NULL, NULL),
(105, 10, 'Kabupaten', 'Cilacap', '53211', NULL, NULL),
(106, 3, 'Kota', 'Cilegon', '42417', NULL, NULL),
(107, 9, 'Kota', 'Cimahi', '40512', NULL, NULL),
(108, 9, 'Kabupaten', 'Cirebon', '45611', NULL, NULL),
(109, 9, 'Kota', 'Cirebon', '45116', NULL, NULL),
(110, 34, 'Kabupaten', 'Dairi', '22211', NULL, NULL),
(111, 24, 'Kabupaten', 'Deiyai (Deliyai)', '98784', NULL, NULL),
(112, 34, 'Kabupaten', 'Deli Serdang', '20511', NULL, NULL),
(113, 10, 'Kabupaten', 'Demak', '59519', NULL, NULL),
(114, 1, 'Kota', 'Denpasar', '80227', NULL, NULL),
(115, 9, 'Kota', 'Depok', '16416', NULL, NULL),
(116, 32, 'Kabupaten', 'Dharmasraya', '27612', NULL, NULL),
(117, 24, 'Kabupaten', 'Dogiyai', '98866', NULL, NULL),
(118, 22, 'Kabupaten', 'Dompu', '84217', NULL, NULL),
(119, 29, 'Kabupaten', 'Donggala', '94341', NULL, NULL),
(120, 26, 'Kota', 'Dumai', '28811', NULL, NULL),
(121, 33, 'Kabupaten', 'Empat Lawang', '31811', NULL, NULL),
(122, 23, 'Kabupaten', 'Ende', '86351', NULL, NULL),
(123, 28, 'Kabupaten', 'Enrekang', '91719', NULL, NULL),
(124, 25, 'Kabupaten', 'Fakfak', '98651', NULL, NULL),
(125, 23, 'Kabupaten', 'Flores Timur', '86213', NULL, NULL),
(126, 9, 'Kabupaten', 'Garut', '44126', NULL, NULL),
(127, 21, 'Kabupaten', 'Gayo Lues', '24653', NULL, NULL),
(128, 1, 'Kabupaten', 'Gianyar', '80519', NULL, NULL),
(129, 7, 'Kabupaten', 'Gorontalo', '96218', NULL, NULL),
(130, 7, 'Kota', 'Gorontalo', '96115', NULL, NULL),
(131, 7, 'Kabupaten', 'Gorontalo Utara', '96611', NULL, NULL),
(132, 28, 'Kabupaten', 'Gowa', '92111', NULL, NULL),
(133, 11, 'Kabupaten', 'Gresik', '61115', NULL, NULL),
(134, 10, 'Kabupaten', 'Grobogan', '58111', NULL, NULL),
(135, 5, 'Kabupaten', 'Gunung Kidul', '55812', NULL, NULL),
(136, 14, 'Kabupaten', 'Gunung Mas', '74511', NULL, NULL),
(137, 34, 'Kota', 'Gunungsitoli', '22813', NULL, NULL),
(138, 20, 'Kabupaten', 'Halmahera Barat', '97757', NULL, NULL),
(139, 20, 'Kabupaten', 'Halmahera Selatan', '97911', NULL, NULL),
(140, 20, 'Kabupaten', 'Halmahera Tengah', '97853', NULL, NULL),
(141, 20, 'Kabupaten', 'Halmahera Timur', '97862', NULL, NULL),
(142, 20, 'Kabupaten', 'Halmahera Utara', '97762', NULL, NULL),
(143, 13, 'Kabupaten', 'Hulu Sungai Selatan', '71212', NULL, NULL),
(144, 13, 'Kabupaten', 'Hulu Sungai Tengah', '71313', NULL, NULL),
(145, 13, 'Kabupaten', 'Hulu Sungai Utara', '71419', NULL, NULL),
(146, 34, 'Kabupaten', 'Humbang Hasundutan', '22457', NULL, NULL),
(147, 26, 'Kabupaten', 'Indragiri Hilir', '29212', NULL, NULL),
(148, 26, 'Kabupaten', 'Indragiri Hulu', '29319', NULL, NULL),
(149, 9, 'Kabupaten', 'Indramayu', '45214', NULL, NULL),
(150, 24, 'Kabupaten', 'Intan Jaya', '98771', NULL, NULL),
(151, 6, 'Kota', 'Jakarta Barat', '11220', NULL, NULL),
(152, 6, 'Kota', 'Jakarta Pusat', '10540', NULL, NULL),
(153, 6, 'Kota', 'Jakarta Selatan', '12230', NULL, NULL),
(154, 6, 'Kota', 'Jakarta Timur', '13330', NULL, NULL),
(155, 6, 'Kota', 'Jakarta Utara', '14140', NULL, NULL),
(156, 8, 'Kota', 'Jambi', '36111', NULL, NULL),
(157, 24, 'Kabupaten', 'Jayapura', '99352', NULL, NULL),
(158, 24, 'Kota', 'Jayapura', '99114', NULL, NULL),
(159, 24, 'Kabupaten', 'Jayawijaya', '99511', NULL, NULL),
(160, 11, 'Kabupaten', 'Jember', '68113', NULL, NULL),
(161, 1, 'Kabupaten', 'Jembrana', '82251', NULL, NULL),
(162, 28, 'Kabupaten', 'Jeneponto', '92319', NULL, NULL),
(163, 10, 'Kabupaten', 'Jepara', '59419', NULL, NULL),
(164, 11, 'Kabupaten', 'Jombang', '61415', NULL, NULL),
(165, 25, 'Kabupaten', 'Kaimana', '98671', NULL, NULL),
(166, 26, 'Kabupaten', 'Kampar', '28411', NULL, NULL),
(167, 14, 'Kabupaten', 'Kapuas', '73583', NULL, NULL),
(168, 12, 'Kabupaten', 'Kapuas Hulu', '78719', NULL, NULL),
(169, 10, 'Kabupaten', 'Karanganyar', '57718', NULL, NULL),
(170, 1, 'Kabupaten', 'Karangasem', '80819', NULL, NULL),
(171, 9, 'Kabupaten', 'Karawang', '41311', NULL, NULL),
(172, 17, 'Kabupaten', 'Karimun', '29611', NULL, NULL),
(173, 34, 'Kabupaten', 'Karo', '22119', NULL, NULL),
(174, 14, 'Kabupaten', 'Katingan', '74411', NULL, NULL),
(175, 4, 'Kabupaten', 'Kaur', '38911', NULL, NULL),
(176, 12, 'Kabupaten', 'Kayong Utara', '78852', NULL, NULL),
(177, 10, 'Kabupaten', 'Kebumen', '54319', NULL, NULL),
(178, 11, 'Kabupaten', 'Kediri', '64184', NULL, NULL),
(179, 11, 'Kota', 'Kediri', '64125', NULL, NULL),
(180, 24, 'Kabupaten', 'Keerom', '99461', NULL, NULL),
(181, 10, 'Kabupaten', 'Kendal', '51314', NULL, NULL),
(182, 30, 'Kota', 'Kendari', '93126', NULL, NULL),
(183, 4, 'Kabupaten', 'Kepahiang', '39319', NULL, NULL),
(184, 17, 'Kabupaten', 'Kepulauan Anambas', '29991', NULL, NULL),
(185, 19, 'Kabupaten', 'Kepulauan Aru', '97681', NULL, NULL),
(186, 32, 'Kabupaten', 'Kepulauan Mentawai', '25771', NULL, NULL),
(187, 26, 'Kabupaten', 'Kepulauan Meranti', '28791', NULL, NULL),
(188, 31, 'Kabupaten', 'Kepulauan Sangihe', '95819', NULL, NULL),
(189, 6, 'Kabupaten', 'Kepulauan Seribu', '14550', NULL, NULL),
(190, 31, 'Kabupaten', 'Kepulauan Siau Tagulandang Biaro (Sitaro)', '95862', NULL, NULL),
(191, 20, 'Kabupaten', 'Kepulauan Sula', '97995', NULL, NULL),
(192, 31, 'Kabupaten', 'Kepulauan Talaud', '95885', NULL, NULL),
(193, 24, 'Kabupaten', 'Kepulauan Yapen (Yapen Waropen)', '98211', NULL, NULL),
(194, 8, 'Kabupaten', 'Kerinci', '37167', NULL, NULL),
(195, 12, 'Kabupaten', 'Ketapang', '78874', NULL, NULL),
(196, 10, 'Kabupaten', 'Klaten', '57411', NULL, NULL),
(197, 1, 'Kabupaten', 'Klungkung', '80719', NULL, NULL),
(198, 30, 'Kabupaten', 'Kolaka', '93511', NULL, NULL),
(199, 30, 'Kabupaten', 'Kolaka Utara', '93911', NULL, NULL),
(200, 30, 'Kabupaten', 'Konawe', '93411', NULL, NULL),
(201, 30, 'Kabupaten', 'Konawe Selatan', '93811', NULL, NULL),
(202, 30, 'Kabupaten', 'Konawe Utara', '93311', NULL, NULL),
(203, 13, 'Kabupaten', 'Kotabaru', '72119', NULL, NULL),
(204, 31, 'Kota', 'Kotamobagu', '95711', NULL, NULL),
(205, 14, 'Kabupaten', 'Kotawaringin Barat', '74119', NULL, NULL),
(206, 14, 'Kabupaten', 'Kotawaringin Timur', '74364', NULL, NULL),
(207, 26, 'Kabupaten', 'Kuantan Singingi', '29519', NULL, NULL),
(208, 12, 'Kabupaten', 'Kubu Raya', '78311', NULL, NULL),
(209, 10, 'Kabupaten', 'Kudus', '59311', NULL, NULL),
(210, 5, 'Kabupaten', 'Kulon Progo', '55611', NULL, NULL),
(211, 9, 'Kabupaten', 'Kuningan', '45511', NULL, NULL),
(212, 23, 'Kabupaten', 'Kupang', '85362', NULL, NULL),
(213, 23, 'Kota', 'Kupang', '85119', NULL, NULL),
(214, 15, 'Kabupaten', 'Kutai Barat', '75711', NULL, NULL),
(215, 15, 'Kabupaten', 'Kutai Kartanegara', '75511', NULL, NULL),
(216, 15, 'Kabupaten', 'Kutai Timur', '75611', NULL, NULL),
(217, 34, 'Kabupaten', 'Labuhan Batu', '21412', NULL, NULL),
(218, 34, 'Kabupaten', 'Labuhan Batu Selatan', '21511', NULL, NULL),
(219, 34, 'Kabupaten', 'Labuhan Batu Utara', '21711', NULL, NULL),
(220, 33, 'Kabupaten', 'Lahat', '31419', NULL, NULL),
(221, 14, 'Kabupaten', 'Lamandau', '74611', NULL, NULL),
(222, 11, 'Kabupaten', 'Lamongan', '64125', NULL, NULL),
(223, 18, 'Kabupaten', 'Lampung Barat', '34814', NULL, NULL),
(224, 18, 'Kabupaten', 'Lampung Selatan', '35511', NULL, NULL),
(225, 18, 'Kabupaten', 'Lampung Tengah', '34212', NULL, NULL),
(226, 18, 'Kabupaten', 'Lampung Timur', '34319', NULL, NULL),
(227, 18, 'Kabupaten', 'Lampung Utara', '34516', NULL, NULL),
(228, 12, 'Kabupaten', 'Landak', '78319', NULL, NULL),
(229, 34, 'Kabupaten', 'Langkat', '20811', NULL, NULL),
(230, 21, 'Kota', 'Langsa', '24412', NULL, NULL),
(231, 24, 'Kabupaten', 'Lanny Jaya', '99531', NULL, NULL),
(232, 3, 'Kabupaten', 'Lebak', '42319', NULL, NULL),
(233, 4, 'Kabupaten', 'Lebong', '39264', NULL, NULL),
(234, 23, 'Kabupaten', 'Lembata', '86611', NULL, NULL),
(235, 21, 'Kota', 'Lhokseumawe', '24352', NULL, NULL),
(236, 32, 'Kabupaten', 'Lima Puluh Koto/Kota', '26671', NULL, NULL),
(237, 17, 'Kabupaten', 'Lingga', '29811', NULL, NULL),
(238, 22, 'Kabupaten', 'Lombok Barat', '83311', NULL, NULL),
(239, 22, 'Kabupaten', 'Lombok Tengah', '83511', NULL, NULL),
(240, 22, 'Kabupaten', 'Lombok Timur', '83612', NULL, NULL),
(241, 22, 'Kabupaten', 'Lombok Utara', '83711', NULL, NULL),
(242, 33, 'Kota', 'Lubuk Linggau', '31614', NULL, NULL),
(243, 11, 'Kabupaten', 'Lumajang', '67319', NULL, NULL),
(244, 28, 'Kabupaten', 'Luwu', '91994', NULL, NULL),
(245, 28, 'Kabupaten', 'Luwu Timur', '92981', NULL, NULL),
(246, 28, 'Kabupaten', 'Luwu Utara', '92911', NULL, NULL),
(247, 11, 'Kabupaten', 'Madiun', '63153', NULL, NULL),
(248, 11, 'Kota', 'Madiun', '63122', NULL, NULL),
(249, 10, 'Kabupaten', 'Magelang', '56519', NULL, NULL),
(250, 10, 'Kota', 'Magelang', '56133', NULL, NULL),
(251, 11, 'Kabupaten', 'Magetan', '63314', NULL, NULL),
(252, 9, 'Kabupaten', 'Majalengka', '45412', NULL, NULL),
(253, 27, 'Kabupaten', 'Majene', '91411', NULL, NULL),
(254, 28, 'Kota', 'Makassar', '90111', NULL, NULL),
(255, 11, 'Kabupaten', 'Malang', '65163', NULL, NULL),
(256, 11, 'Kota', 'Malang', '65112', NULL, NULL),
(257, 16, 'Kabupaten', 'Malinau', '77511', NULL, NULL),
(258, 19, 'Kabupaten', 'Maluku Barat Daya', '97451', NULL, NULL),
(259, 19, 'Kabupaten', 'Maluku Tengah', '97513', NULL, NULL),
(260, 19, 'Kabupaten', 'Maluku Tenggara', '97651', NULL, NULL),
(261, 19, 'Kabupaten', 'Maluku Tenggara Barat', '97465', NULL, NULL),
(262, 27, 'Kabupaten', 'Mamasa', '91362', NULL, NULL),
(263, 24, 'Kabupaten', 'Mamberamo Raya', '99381', NULL, NULL),
(264, 24, 'Kabupaten', 'Mamberamo Tengah', '99553', NULL, NULL),
(265, 27, 'Kabupaten', 'Mamuju', '91519', NULL, NULL),
(266, 27, 'Kabupaten', 'Mamuju Utara', '91571', NULL, NULL),
(267, 31, 'Kota', 'Manado', '95247', NULL, NULL),
(268, 34, 'Kabupaten', 'Mandailing Natal', '22916', NULL, NULL),
(269, 23, 'Kabupaten', 'Manggarai', '86551', NULL, NULL),
(270, 23, 'Kabupaten', 'Manggarai Barat', '86711', NULL, NULL),
(271, 23, 'Kabupaten', 'Manggarai Timur', '86811', NULL, NULL),
(272, 25, 'Kabupaten', 'Manokwari', '98311', NULL, NULL),
(273, 25, 'Kabupaten', 'Manokwari Selatan', '98355', NULL, NULL),
(274, 24, 'Kabupaten', 'Mappi', '99853', NULL, NULL),
(275, 28, 'Kabupaten', 'Maros', '90511', NULL, NULL),
(276, 22, 'Kota', 'Mataram', '83131', NULL, NULL),
(277, 25, 'Kabupaten', 'Maybrat', '98051', NULL, NULL),
(278, 34, 'Kota', 'Medan', '20228', NULL, NULL),
(279, 12, 'Kabupaten', 'Melawi', '78619', NULL, NULL),
(280, 8, 'Kabupaten', 'Merangin', '37319', NULL, NULL),
(281, 24, 'Kabupaten', 'Merauke', '99613', NULL, NULL),
(282, 18, 'Kabupaten', 'Mesuji', '34911', NULL, NULL),
(283, 18, 'Kota', 'Metro', '34111', NULL, NULL),
(284, 24, 'Kabupaten', 'Mimika', '99962', NULL, NULL),
(285, 31, 'Kabupaten', 'Minahasa', '95614', NULL, NULL),
(286, 31, 'Kabupaten', 'Minahasa Selatan', '95914', NULL, NULL),
(287, 31, 'Kabupaten', 'Minahasa Tenggara', '95995', NULL, NULL),
(288, 31, 'Kabupaten', 'Minahasa Utara', '95316', NULL, NULL),
(289, 11, 'Kabupaten', 'Mojokerto', '61382', NULL, NULL),
(290, 11, 'Kota', 'Mojokerto', '61316', NULL, NULL),
(291, 29, 'Kabupaten', 'Morowali', '94911', NULL, NULL),
(292, 33, 'Kabupaten', 'Muara Enim', '31315', NULL, NULL),
(293, 8, 'Kabupaten', 'Muaro Jambi', '36311', NULL, NULL),
(294, 4, 'Kabupaten', 'Muko Muko', '38715', NULL, NULL),
(295, 30, 'Kabupaten', 'Muna', '93611', NULL, NULL),
(296, 14, 'Kabupaten', 'Murung Raya', '73911', NULL, NULL),
(297, 33, 'Kabupaten', 'Musi Banyuasin', '30719', NULL, NULL),
(298, 33, 'Kabupaten', 'Musi Rawas', '31661', NULL, NULL),
(299, 24, 'Kabupaten', 'Nabire', '98816', NULL, NULL),
(300, 21, 'Kabupaten', 'Nagan Raya', '23674', NULL, NULL),
(301, 23, 'Kabupaten', 'Nagekeo', '86911', NULL, NULL),
(302, 17, 'Kabupaten', 'Natuna', '29711', NULL, NULL),
(303, 24, 'Kabupaten', 'Nduga', '99541', NULL, NULL),
(304, 23, 'Kabupaten', 'Ngada', '86413', NULL, NULL),
(305, 11, 'Kabupaten', 'Nganjuk', '64414', NULL, NULL),
(306, 11, 'Kabupaten', 'Ngawi', '63219', NULL, NULL),
(307, 34, 'Kabupaten', 'Nias', '22876', NULL, NULL),
(308, 34, 'Kabupaten', 'Nias Barat', '22895', NULL, NULL),
(309, 34, 'Kabupaten', 'Nias Selatan', '22865', NULL, NULL),
(310, 34, 'Kabupaten', 'Nias Utara', '22856', NULL, NULL),
(311, 16, 'Kabupaten', 'Nunukan', '77421', NULL, NULL),
(312, 33, 'Kabupaten', 'Ogan Ilir', '30811', NULL, NULL),
(313, 33, 'Kabupaten', 'Ogan Komering Ilir', '30618', NULL, NULL),
(314, 33, 'Kabupaten', 'Ogan Komering Ulu', '32112', NULL, NULL),
(315, 33, 'Kabupaten', 'Ogan Komering Ulu Selatan', '32211', NULL, NULL),
(316, 33, 'Kabupaten', 'Ogan Komering Ulu Timur', '32312', NULL, NULL),
(317, 11, 'Kabupaten', 'Pacitan', '63512', NULL, NULL),
(318, 32, 'Kota', 'Padang', '25112', NULL, NULL),
(319, 34, 'Kabupaten', 'Padang Lawas', '22763', NULL, NULL),
(320, 34, 'Kabupaten', 'Padang Lawas Utara', '22753', NULL, NULL),
(321, 32, 'Kota', 'Padang Panjang', '27122', NULL, NULL),
(322, 32, 'Kabupaten', 'Padang Pariaman', '25583', NULL, NULL),
(323, 34, 'Kota', 'Padang Sidempuan', '22727', NULL, NULL),
(324, 33, 'Kota', 'Pagar Alam', '31512', NULL, NULL),
(325, 34, 'Kabupaten', 'Pakpak Bharat', '22272', NULL, NULL),
(326, 14, 'Kota', 'Palangka Raya', '73112', NULL, NULL),
(327, 33, 'Kota', 'Palembang', '30111', NULL, NULL),
(328, 28, 'Kota', 'Palopo', '91911', NULL, NULL),
(329, 29, 'Kota', 'Palu', '94111', NULL, NULL),
(330, 11, 'Kabupaten', 'Pamekasan', '69319', NULL, NULL),
(331, 3, 'Kabupaten', 'Pandeglang', '42212', NULL, NULL),
(332, 9, 'Kabupaten', 'Pangandaran', '46511', NULL, NULL),
(333, 28, 'Kabupaten', 'Pangkajene Kepulauan', '90611', NULL, NULL),
(334, 2, 'Kota', 'Pangkal Pinang', '33115', NULL, NULL),
(335, 24, 'Kabupaten', 'Paniai', '98765', NULL, NULL),
(336, 28, 'Kota', 'Parepare', '91123', NULL, NULL),
(337, 32, 'Kota', 'Pariaman', '25511', NULL, NULL),
(338, 29, 'Kabupaten', 'Parigi Moutong', '94411', NULL, NULL),
(339, 32, 'Kabupaten', 'Pasaman', '26318', NULL, NULL),
(340, 32, 'Kabupaten', 'Pasaman Barat', '26511', NULL, NULL),
(341, 15, 'Kabupaten', 'Paser', '76211', NULL, NULL),
(342, 11, 'Kabupaten', 'Pasuruan', '67153', NULL, NULL),
(343, 11, 'Kota', 'Pasuruan', '67118', NULL, NULL),
(344, 10, 'Kabupaten', 'Pati', '59114', NULL, NULL),
(345, 32, 'Kota', 'Payakumbuh', '26213', NULL, NULL),
(346, 25, 'Kabupaten', 'Pegunungan Arfak', '98354', NULL, NULL),
(347, 24, 'Kabupaten', 'Pegunungan Bintang', '99573', NULL, NULL),
(348, 10, 'Kabupaten', 'Pekalongan', '51161', NULL, NULL),
(349, 10, 'Kota', 'Pekalongan', '51122', NULL, NULL),
(350, 26, 'Kota', 'Pekanbaru', '28112', NULL, NULL),
(351, 26, 'Kabupaten', 'Pelalawan', '28311', NULL, NULL),
(352, 10, 'Kabupaten', 'Pemalang', '52319', NULL, NULL),
(353, 34, 'Kota', 'Pematang Siantar', '21126', NULL, NULL),
(354, 15, 'Kabupaten', 'Penajam Paser Utara', '76311', NULL, NULL),
(355, 18, 'Kabupaten', 'Pesawaran', '35312', NULL, NULL),
(356, 18, 'Kabupaten', 'Pesisir Barat', '35974', NULL, NULL),
(357, 32, 'Kabupaten', 'Pesisir Selatan', '25611', NULL, NULL),
(358, 21, 'Kabupaten', 'Pidie', '24116', NULL, NULL),
(359, 21, 'Kabupaten', 'Pidie Jaya', '24186', NULL, NULL),
(360, 28, 'Kabupaten', 'Pinrang', '91251', NULL, NULL),
(361, 7, 'Kabupaten', 'Pohuwato', '96419', NULL, NULL),
(362, 27, 'Kabupaten', 'Polewali Mandar', '91311', NULL, NULL),
(363, 11, 'Kabupaten', 'Ponorogo', '63411', NULL, NULL),
(364, 12, 'Kabupaten', 'Pontianak', '78971', NULL, NULL),
(365, 12, 'Kota', 'Pontianak', '78112', NULL, NULL),
(366, 29, 'Kabupaten', 'Poso', '94615', NULL, NULL),
(367, 33, 'Kota', 'Prabumulih', '31121', NULL, NULL),
(368, 18, 'Kabupaten', 'Pringsewu', '35719', NULL, NULL),
(369, 11, 'Kabupaten', 'Probolinggo', '67282', NULL, NULL),
(370, 11, 'Kota', 'Probolinggo', '67215', NULL, NULL),
(371, 14, 'Kabupaten', 'Pulang Pisau', '74811', NULL, NULL),
(372, 20, 'Kabupaten', 'Pulau Morotai', '97771', NULL, NULL),
(373, 24, 'Kabupaten', 'Puncak', '98981', NULL, NULL),
(374, 24, 'Kabupaten', 'Puncak Jaya', '98979', NULL, NULL),
(375, 10, 'Kabupaten', 'Purbalingga', '53312', NULL, NULL),
(376, 9, 'Kabupaten', 'Purwakarta', '41119', NULL, NULL),
(377, 10, 'Kabupaten', 'Purworejo', '54111', NULL, NULL),
(378, 25, 'Kabupaten', 'Raja Ampat', '98489', NULL, NULL),
(379, 4, 'Kabupaten', 'Rejang Lebong', '39112', NULL, NULL),
(380, 10, 'Kabupaten', 'Rembang', '59219', NULL, NULL),
(381, 26, 'Kabupaten', 'Rokan Hilir', '28992', NULL, NULL),
(382, 26, 'Kabupaten', 'Rokan Hulu', '28511', NULL, NULL),
(383, 23, 'Kabupaten', 'Rote Ndao', '85982', NULL, NULL),
(384, 21, 'Kota', 'Sabang', '23512', NULL, NULL),
(385, 23, 'Kabupaten', 'Sabu Raijua', '85391', NULL, NULL),
(386, 10, 'Kota', 'Salatiga', '50711', NULL, NULL),
(387, 15, 'Kota', 'Samarinda', '75133', NULL, NULL),
(388, 12, 'Kabupaten', 'Sambas', '79453', NULL, NULL),
(389, 34, 'Kabupaten', 'Samosir', '22392', NULL, NULL),
(390, 11, 'Kabupaten', 'Sampang', '69219', NULL, NULL),
(391, 12, 'Kabupaten', 'Sanggau', '78557', NULL, NULL),
(392, 24, 'Kabupaten', 'Sarmi', '99373', NULL, NULL),
(393, 8, 'Kabupaten', 'Sarolangun', '37419', NULL, NULL),
(394, 32, 'Kota', 'Sawah Lunto', '27416', NULL, NULL),
(395, 12, 'Kabupaten', 'Sekadau', '79583', NULL, NULL),
(396, 28, 'Kabupaten', 'Selayar (Kepulauan Selayar)', '92812', NULL, NULL),
(397, 4, 'Kabupaten', 'Seluma', '38811', NULL, NULL),
(398, 10, 'Kabupaten', 'Semarang', '50511', NULL, NULL),
(399, 10, 'Kota', 'Semarang', '50135', NULL, NULL),
(400, 19, 'Kabupaten', 'Seram Bagian Barat', '97561', NULL, NULL),
(401, 19, 'Kabupaten', 'Seram Bagian Timur', '97581', NULL, NULL),
(402, 3, 'Kabupaten', 'Serang', '42182', NULL, NULL),
(403, 3, 'Kota', 'Serang', '42111', NULL, NULL),
(404, 34, 'Kabupaten', 'Serdang Bedagai', '20915', NULL, NULL),
(405, 14, 'Kabupaten', 'Seruyan', '74211', NULL, NULL),
(406, 26, 'Kabupaten', 'Siak', '28623', NULL, NULL),
(407, 34, 'Kota', 'Sibolga', '22522', NULL, NULL),
(408, 28, 'Kabupaten', 'Sidenreng Rappang/Rapang', '91613', NULL, NULL),
(409, 11, 'Kabupaten', 'Sidoarjo', '61219', NULL, NULL),
(410, 29, 'Kabupaten', 'Sigi', '94364', NULL, NULL),
(411, 32, 'Kabupaten', 'Sijunjung (Sawah Lunto Sijunjung)', '27511', NULL, NULL),
(412, 23, 'Kabupaten', 'Sikka', '86121', NULL, NULL),
(413, 34, 'Kabupaten', 'Simalungun', '21162', NULL, NULL),
(414, 21, 'Kabupaten', 'Simeulue', '23891', NULL, NULL),
(415, 12, 'Kota', 'Singkawang', '79117', NULL, NULL),
(416, 28, 'Kabupaten', 'Sinjai', '92615', NULL, NULL),
(417, 12, 'Kabupaten', 'Sintang', '78619', NULL, NULL),
(418, 11, 'Kabupaten', 'Situbondo', '68316', NULL, NULL),
(419, 5, 'Kabupaten', 'Sleman', '55513', NULL, NULL),
(420, 32, 'Kabupaten', 'Solok', '27365', NULL, NULL),
(421, 32, 'Kota', 'Solok', '27315', NULL, NULL),
(422, 32, 'Kabupaten', 'Solok Selatan', '27779', NULL, NULL),
(423, 28, 'Kabupaten', 'Soppeng', '90812', NULL, NULL),
(424, 25, 'Kabupaten', 'Sorong', '98431', NULL, NULL),
(425, 25, 'Kota', 'Sorong', '98411', NULL, NULL),
(426, 25, 'Kabupaten', 'Sorong Selatan', '98454', NULL, NULL),
(427, 10, 'Kabupaten', 'Sragen', '57211', NULL, NULL),
(428, 9, 'Kabupaten', 'Subang', '41215', NULL, NULL),
(429, 21, 'Kota', 'Subulussalam', '24882', NULL, NULL),
(430, 9, 'Kabupaten', 'Sukabumi', '43311', NULL, NULL),
(431, 9, 'Kota', 'Sukabumi', '43114', NULL, NULL),
(432, 14, 'Kabupaten', 'Sukamara', '74712', NULL, NULL),
(433, 10, 'Kabupaten', 'Sukoharjo', '57514', NULL, NULL),
(434, 23, 'Kabupaten', 'Sumba Barat', '87219', NULL, NULL),
(435, 23, 'Kabupaten', 'Sumba Barat Daya', '87453', NULL, NULL),
(436, 23, 'Kabupaten', 'Sumba Tengah', '87358', NULL, NULL),
(437, 23, 'Kabupaten', 'Sumba Timur', '87112', NULL, NULL),
(438, 22, 'Kabupaten', 'Sumbawa', '84315', NULL, NULL),
(439, 22, 'Kabupaten', 'Sumbawa Barat', '84419', NULL, NULL),
(440, 9, 'Kabupaten', 'Sumedang', '45326', NULL, NULL),
(441, 11, 'Kabupaten', 'Sumenep', '69413', NULL, NULL),
(442, 8, 'Kota', 'Sungaipenuh', '37113', NULL, NULL),
(443, 24, 'Kabupaten', 'Supiori', '98164', NULL, NULL),
(444, 11, 'Kota', 'Surabaya', '60119', NULL, NULL),
(445, 10, 'Kota', 'Surakarta (Solo)', '57113', NULL, NULL),
(446, 13, 'Kabupaten', 'Tabalong', '71513', NULL, NULL),
(447, 1, 'Kabupaten', 'Tabanan', '82119', NULL, NULL),
(448, 28, 'Kabupaten', 'Takalar', '92212', NULL, NULL),
(449, 25, 'Kabupaten', 'Tambrauw', '98475', NULL, NULL),
(450, 16, 'Kabupaten', 'Tana Tidung', '77611', NULL, NULL),
(451, 28, 'Kabupaten', 'Tana Toraja', '91819', NULL, NULL),
(452, 13, 'Kabupaten', 'Tanah Bumbu', '72211', NULL, NULL),
(453, 32, 'Kabupaten', 'Tanah Datar', '27211', NULL, NULL),
(454, 13, 'Kabupaten', 'Tanah Laut', '70811', NULL, NULL),
(455, 3, 'Kabupaten', 'Tangerang', '15914', NULL, NULL),
(456, 3, 'Kota', 'Tangerang', '15111', NULL, NULL),
(457, 3, 'Kota', 'Tangerang Selatan', '15435', NULL, NULL),
(458, 18, 'Kabupaten', 'Tanggamus', '35619', NULL, NULL),
(459, 34, 'Kota', 'Tanjung Balai', '21321', NULL, NULL),
(460, 8, 'Kabupaten', 'Tanjung Jabung Barat', '36513', NULL, NULL),
(461, 8, 'Kabupaten', 'Tanjung Jabung Timur', '36719', NULL, NULL),
(462, 17, 'Kota', 'Tanjung Pinang', '29111', NULL, NULL),
(463, 34, 'Kabupaten', 'Tapanuli Selatan', '22742', NULL, NULL),
(464, 34, 'Kabupaten', 'Tapanuli Tengah', '22611', NULL, NULL),
(465, 34, 'Kabupaten', 'Tapanuli Utara', '22414', NULL, NULL),
(466, 13, 'Kabupaten', 'Tapin', '71119', NULL, NULL),
(467, 16, 'Kota', 'Tarakan', '77114', NULL, NULL),
(468, 9, 'Kabupaten', 'Tasikmalaya', '46411', NULL, NULL),
(469, 9, 'Kota', 'Tasikmalaya', '46116', NULL, NULL),
(470, 34, 'Kota', 'Tebing Tinggi', '20632', NULL, NULL),
(471, 8, 'Kabupaten', 'Tebo', '37519', NULL, NULL),
(472, 10, 'Kabupaten', 'Tegal', '52419', NULL, NULL),
(473, 10, 'Kota', 'Tegal', '52114', NULL, NULL),
(474, 25, 'Kabupaten', 'Teluk Bintuni', '98551', NULL, NULL),
(475, 25, 'Kabupaten', 'Teluk Wondama', '98591', NULL, NULL),
(476, 10, 'Kabupaten', 'Temanggung', '56212', NULL, NULL),
(477, 20, 'Kota', 'Ternate', '97714', NULL, NULL),
(478, 20, 'Kota', 'Tidore Kepulauan', '97815', NULL, NULL),
(479, 23, 'Kabupaten', 'Timor Tengah Selatan', '85562', NULL, NULL),
(480, 23, 'Kabupaten', 'Timor Tengah Utara', '85612', NULL, NULL),
(481, 34, 'Kabupaten', 'Toba Samosir', '22316', NULL, NULL),
(482, 29, 'Kabupaten', 'Tojo Una-Una', '94683', NULL, NULL),
(483, 29, 'Kabupaten', 'Toli-Toli', '94542', NULL, NULL),
(484, 24, 'Kabupaten', 'Tolikara', '99411', NULL, NULL),
(485, 31, 'Kota', 'Tomohon', '95416', NULL, NULL),
(486, 28, 'Kabupaten', 'Toraja Utara', '91831', NULL, NULL),
(487, 11, 'Kabupaten', 'Trenggalek', '66312', NULL, NULL),
(488, 19, 'Kota', 'Tual', '97612', NULL, NULL),
(489, 11, 'Kabupaten', 'Tuban', '62319', NULL, NULL),
(490, 18, 'Kabupaten', 'Tulang Bawang', '34613', NULL, NULL),
(491, 18, 'Kabupaten', 'Tulang Bawang Barat', '34419', NULL, NULL),
(492, 11, 'Kabupaten', 'Tulungagung', '66212', NULL, NULL),
(493, 28, 'Kabupaten', 'Wajo', '90911', NULL, NULL),
(494, 30, 'Kabupaten', 'Wakatobi', '93791', NULL, NULL),
(495, 24, 'Kabupaten', 'Waropen', '98269', NULL, NULL),
(496, 18, 'Kabupaten', 'Way Kanan', '34711', NULL, NULL),
(497, 10, 'Kabupaten', 'Wonogiri', '57619', NULL, NULL),
(498, 10, 'Kabupaten', 'Wonosobo', '56311', NULL, NULL),
(499, 24, 'Kabupaten', 'Yahukimo', '99041', NULL, NULL),
(500, 24, 'Kabupaten', 'Yalimo', '99481', NULL, NULL),
(501, 5, 'Kota', 'Yogyakarta', '55111', NULL, NULL);

-- --------------------------------------------------------

--
-- Struktur dari tabel `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uuid` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `kategoris`
--

CREATE TABLE `kategoris` (
  `id` bigint(11) UNSIGNED NOT NULL,
  `nama_kategori` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tahun` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `kategoris`
--

INSERT INTO `kategoris` (`id`, `nama_kategori`, `tahun`, `image`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Honda Cb', '2000', 'kategori-images/sDuElEEBTnL0O2fMjfkjFq3ogxRJ2efzZXd84LW2.jpg', NULL, '2022-09-13 23:44:36', '2022-10-20 01:28:49'),
(2, 'Vespa', '1990', 'kategori-images/I0g7uhyDtI32mhbRvdZ01pDxw5ZU0jDcYFZPDl5R.jpg', NULL, '2022-09-13 23:44:36', '2022-10-20 01:28:38'),
(3, 'Yamaha Rx-King', '1990-2002', 'kategori-images/7C5uT1F9UlkjTcnktBY5aFqRm4UvSUyvl8J0XS2F.jpg', NULL, '2022-10-03 22:59:38', '2022-10-03 22:59:38'),
(5, 'Honda C70', '1990', 'kategori-images/WG1vjZSUx0U4kKxnOr5WqjlV7tpMwulaxrTmDdFv.jpg', NULL, '2022-12-13 22:03:50', '2022-12-13 22:03:50'),
(6, 'Honda NSR 150', '1990', 'kategori-images/t3R2x5uiVlbotatu3kPjSIgciZMMOj24JIkz0nWz.jpg', NULL, '2022-12-13 22:06:27', '2022-12-13 22:06:27'),
(7, 'Kawasaki Ninja 150 R', '1990', 'kategori-images/1knDHhibh9652KWguzlUzTxg53qM02LTqmXmq9t3.png', NULL, '2022-12-13 22:07:40', '2022-12-13 22:07:40');

-- --------------------------------------------------------

--
-- Struktur dari tabel `keranjangs`
--

CREATE TABLE `keranjangs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `produk_id` bigint(20) UNSIGNED NOT NULL,
  `qty` int(11) NOT NULL,
  `subtotal` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `messages`
--

CREATE TABLE `messages` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `from` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `to` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `message` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `link` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `messages`
--

INSERT INTO `messages` (`id`, `from`, `to`, `message`, `link`, `created_at`, `updated_at`) VALUES
(17, '3', '6', 'haii', NULL, '2022-09-18 05:37:36', '2022-09-18 05:37:36'),
(18, '3', '6', 'apa kabs', NULL, '2022-09-18 05:37:51', '2022-09-18 05:37:51'),
(19, '6', '3', 'hai juga', NULL, '2022-09-18 05:38:07', '2022-09-18 05:38:07'),
(21, '6', '3', 'baik', NULL, '2022-09-18 05:38:37', '2022-09-18 05:38:37'),
(22, '6', '3', 'apa ini masih ada?', NULL, '2022-09-18 06:37:27', '2022-09-18 06:37:27'),
(23, '3', '6', 'masih', NULL, '2022-09-18 06:38:01', '2022-09-18 06:38:01'),
(24, '6', '3', 'go', NULL, '2022-09-20 01:16:23', '2022-09-20 01:16:23'),
(25, '3', '6', 'bacot', NULL, '2022-09-20 01:17:03', '2022-09-20 01:17:03'),
(26, '5', '3', 'hallo', NULL, '2022-09-20 01:44:21', '2022-09-20 01:44:21'),
(27, '7', '3', 'asu', NULL, '2022-09-22 01:31:23', '2022-09-22 01:31:23'),
(28, '3', '6', 'y', NULL, '2022-09-23 01:39:52', '2022-09-23 01:39:52'),
(29, '3', '5', 'p', NULL, '2022-09-23 01:40:45', '2022-09-23 01:40:45'),
(30, '3', '5', 'hallo', NULL, '2022-09-27 23:04:35', '2022-09-27 23:04:35'),
(31, '5', '3', 'hallo', NULL, '2022-09-27 23:04:46', '2022-09-27 23:04:46'),
(32, '6', '5', 'hallo', NULL, '2022-09-27 23:53:58', '2022-09-27 23:53:58'),
(33, '6', '7', 'p', NULL, '2022-09-27 23:54:08', '2022-09-27 23:54:08'),
(34, '9', '3', 'hallo', NULL, '2022-11-03 22:53:57', '2022-11-03 22:53:57'),
(35, '9', '3', 'Apa ini masih tersedia?', NULL, '2022-11-07 00:47:02', '2022-11-07 00:47:02'),
(36, '10', '3', 'hallo', NULL, '2022-12-09 01:48:41', '2022-12-09 01:48:41'),
(37, '10', '3', 'hai', NULL, '2022-12-09 01:50:12', '2022-12-09 01:50:12'),
(38, '3', '10', 'oke', NULL, '2022-12-09 01:50:31', '2022-12-09 01:50:31'),
(39, '10', '1', 'halo admin', NULL, '2022-12-09 01:52:12', '2022-12-09 01:52:12'),
(40, '1', '10', 'y', NULL, '2022-12-09 06:40:05', '2022-12-09 06:40:05'),
(43, '10', '1', 'aaddaa', NULL, '2022-12-24 01:43:12', '2022-12-24 01:43:12'),
(44, '10', '3', 'daadad', NULL, '2022-12-24 01:43:19', '2022-12-24 01:43:19'),
(45, '10', '3', 'csscs', NULL, '2022-12-24 01:58:33', '2022-12-24 01:58:33'),
(46, '10', '3', 'halo', NULL, '2022-12-24 01:58:42', '2022-12-24 01:58:42'),
(60, '10', '3', 'asdasdd', 'http://127.0.0.1:8000/pelanggan/pelproduk/', '2023-01-21 02:39:05', '2023-01-21 02:39:05'),
(70, '10', '3', 'apa barang ini ready?', 'http://127.0.0.1:8000/pelanggan/pelproduk/', '2023-01-21 06:37:59', '2023-01-21 06:37:59'),
(71, '10', '3', 'apa ini masih ada?', 'http://127.0.0.1:8000/pelanggan/pelproduk/', '2023-01-21 06:39:59', '2023-01-21 06:39:59'),
(72, '3', '10', 'masih', 'http://127.0.0.1:8000/pelanggan/pelproduk/', '2023-01-21 06:40:39', '2023-01-21 06:40:39'),
(73, '10', '3', 'http://127.0.0.1:8000/pelanggan/pelproduk/11 apa ini masih?', 'http://127.0.0.1:8000/pelanggan/pelproduk/', '2023-01-21 07:09:21', '2023-01-21 07:09:21'),
(74, '1', '10', 'adadd', NULL, '2023-01-24 08:04:42', '2023-01-24 08:04:42'),
(75, '3', '1', 'hallo admin', 'http://127.0.0.1:8000/pelanggan/pelproduk/', '2023-01-26 23:36:42', '2023-01-26 23:36:42');

-- --------------------------------------------------------

--
-- Struktur dari tabel `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2019_08_19_000000_create_failed_jobs_table', 1),
(4, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(5, '2022_09_05_085221_create_kategoris_table', 1),
(6, '2022_09_06_074726_create_produks_table', 1),
(7, '2022_09_09_034334_create_keranjangs_table', 1),
(8, '2022_09_12_064250_create_tokos_table', 1),
(9, '2022_09_17_051554_create_messages_table', 2),
(10, '2022_09_22_100752_create_orders_table', 3),
(11, '2022_09_27_110502_create_transaksi_table', 4),
(12, '2022_09_27_132728_create_transaksis_table', 5),
(13, '2022_09_30_075445_create_provinces_table', 6),
(14, '2022_09_30_075903_create_citys_table', 6),
(15, '2022_11_08_142905_create_orders_table', 7),
(16, '2022_12_14_074652_create_subkategori_table', 8),
(17, '2022_12_14_080714_create_subkategoris_table', 9),
(18, '2022_12_14_085353_create_subkategoris_table', 10),
(19, '2022_12_14_090455_create_sukucadangs_table', 11);

-- --------------------------------------------------------

--
-- Struktur dari tabel `orders`
--

CREATE TABLE `orders` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `status` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `transaction_id` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `order_id` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `gross_amount` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `payment_type` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `payment_code` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `pdf_url` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `user_id` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `produk_id` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `toko_id` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `orders`
--

INSERT INTO `orders` (`id`, `status`, `transaction_id`, `order_id`, `gross_amount`, `payment_type`, `payment_code`, `pdf_url`, `user_id`, `produk_id`, `toko_id`, `created_at`, `updated_at`) VALUES
(9, 'settlement', '34ee1c0a-d442-445f-97b5-959918342e85', '95', '3024000.00', 'bank_transfer', NULL, 'https://app.sandbox.midtrans.com/snap/v1/transactions/ecd94128-efe1-4960-965f-7ca143cec6c0/pdf', '6', '[3]', '1', '2022-11-12 00:23:00', '2022-11-12 00:23:00'),
(22, 'settlement', 'da7ee8a0-6de6-4669-baf0-0e7c71818c3c', '111', '512000.00', 'cstore', '139391239876543', 'https://app.sandbox.midtrans.com/snap/v1/transactions/9588d189-d8db-46db-9414-0fa90759d4e9/pdf', '10', '[8]', '1', '2023-01-30 07:07:39', '2023-01-30 07:28:26'),
(24, 'settlement', 'b77d18de-1e32-46da-bef1-7cd86e24e7ec', '113', '512000.00', 'bank_transfer', NULL, 'https://app.sandbox.midtrans.com/snap/v1/transactions/9b14a513-4a4b-4340-8ba8-96b3b15aea4b/pdf', '10', '[8]', '1', '2023-01-30 22:22:09', '2023-01-30 22:22:09');

-- --------------------------------------------------------

--
-- Struktur dari tabel `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `personal_access_tokens`
--

CREATE TABLE `personal_access_tokens` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `tokenable_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tokenable_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(64) COLLATE utf8mb4_unicode_ci NOT NULL,
  `abilities` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `produks`
--

CREATE TABLE `produks` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `nama_produk` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `code` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `kategori_id` bigint(20) UNSIGNED NOT NULL,
  `sukucadang_id` bigint(20) UNSIGNED NOT NULL,
  `toko_id` bigint(20) UNSIGNED NOT NULL,
  `harga` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `qty` int(11) NOT NULL,
  `berat` varchar(11) COLLATE utf8mb4_unicode_ci NOT NULL,
  `deskripsi` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `view` int(100) DEFAULT NULL,
  `published_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `produks`
--

INSERT INTO `produks` (`id`, `nama_produk`, `code`, `kategori_id`, `sukucadang_id`, `toko_id`, `harga`, `qty`, `berat`, `deskripsi`, `image`, `view`, `published_at`, `created_at`, `updated_at`) VALUES
(1, 'Velg vespa', '123', 2, 5, 1, '1000000', 1, '2000', 'Velg satu set Vespa Primavera Px tahun            1990-2000 include ban depan belakang ukuran 90/90 rata.', 'produk-images/7TVSInkinAWCs4NDskTuls4ahl1YjUEngfi2W9XA.jpg', 6, NULL, '2022-09-13 23:44:36', '2022-12-15 01:26:32'),
(2, 'Velg Honda cb', '123123', 1, 5, 1, '20000000', 1, '2000', 'velg Jari-jari honda cb ring 17 include ban            merk corsa ukuran 90/90 rata depan belakang', 'produk-images/OJiTSqTbu1GDi3UxCTfjvD4a6l83lqEbxPNc4K0E.jpg', 2, NULL, '2022-09-13 23:44:36', '2022-12-24 01:44:05'),
(3, 'Rangka Vespa primavera', '1234', 2, 2, 1, '3000000', 1, '3000', 'Rangka vespa primavera px tahun 1993            restorasi sudah mulus luar dalam', 'produk-images/ci3wFTzGZHLaXExqpWtR9MScfUOmhaBJwFqbl0wF.jpg', 9, NULL, '2022-09-13 23:44:36', '2022-12-24 01:43:56'),
(4, 'velg cb', '12345', 1, 5, 3, '1000000', 1, '3000', 'velg satu set', 'produk-images/ZofUZwBXZqcYAoQBsQYM5brShCR1V1jGc99pq6ZK.jpg', 16, NULL, '2022-09-14 03:19:58', '2023-01-26 22:54:53'),
(8, 'Head Lamp Rx-king', 'Rxking-123', 3, 3, 1, '500000', 0, '1000', 'Head Lamp yamaha Rx-king for all type Rxking', 'produk-images/Dev5njbK2HpgOVFqImNfFxHAV3OKPx6kT6boiIC6.jpg', 17, NULL, '2022-12-07 00:23:20', '2023-01-30 22:13:03'),
(11, 'shockbreaker cb100', 'sb123', 1, 7, 1, '500000', 1, '2000', 'shockbreaker cb orisinil', 'produk-images/jex6xjZYqJUvqfesVjXOfCBCl32F0i5ztcSa6Kct.jpg', 36, NULL, '2022-12-15 01:28:46', '2023-01-30 07:34:43');

-- --------------------------------------------------------

--
-- Struktur dari tabel `provinces`
--

CREATE TABLE `provinces` (
  `id` bigint(10) UNSIGNED NOT NULL,
  `province` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `provinces`
--

INSERT INTO `provinces` (`id`, `province`, `created_at`, `updated_at`) VALUES
(1, 'Bali', NULL, NULL),
(2, 'Bangka Belitung', NULL, NULL),
(3, 'Banten', NULL, NULL),
(4, 'Bengkulu', NULL, NULL),
(5, 'DI Yogyakarta', NULL, NULL),
(6, 'DKI Jakarta', NULL, NULL),
(7, 'Gorontalo', NULL, NULL),
(8, 'Jambi', NULL, NULL),
(9, 'Jawa Barat', NULL, NULL),
(10, 'Jawa Tengah', NULL, NULL),
(11, 'Jawa Timur', NULL, NULL),
(12, 'Kalimantan Barat', NULL, NULL),
(13, 'Kalimantan Selatan', NULL, NULL),
(14, 'Kalimantan Tengah', NULL, NULL),
(15, 'Kalimantan Timur', NULL, NULL),
(16, 'Kalimantan Utara', NULL, NULL),
(17, 'Kepulauan Riau', NULL, NULL),
(18, 'Lampung', NULL, NULL),
(19, 'Maluku', NULL, NULL),
(20, 'Maluku Utara', NULL, NULL),
(21, 'Nanggroe Aceh Darussalam (NAD)', NULL, NULL),
(22, 'Nusa Tenggara Barat (NTB)', NULL, NULL),
(23, 'Nusa Tenggara Timur (NTT)', NULL, NULL),
(24, 'Papua', NULL, NULL),
(25, 'Papua Barat', NULL, NULL),
(26, 'Riau', NULL, NULL),
(27, 'Sulawesi Barat', NULL, NULL),
(28, 'Sulawesi Selatan', NULL, NULL),
(29, 'Sulawesi Tengah', NULL, NULL),
(30, 'Sulawesi Tenggara', NULL, NULL),
(31, 'Sulawesi Utara', NULL, NULL),
(32, 'Sumatera Barat', NULL, NULL),
(33, 'Sumatera Selatan', NULL, NULL),
(34, 'Sumatera Utara', NULL, NULL);

-- --------------------------------------------------------

--
-- Struktur dari tabel `sukucadangs`
--

CREATE TABLE `sukucadangs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `nama_sukucadang` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `sukucadangs`
--

INSERT INTO `sukucadangs` (`id`, `nama_sukucadang`, `image`, `created_at`, `updated_at`) VALUES
(2, 'Body', 'sukucadang-images/z5tvHxCI5TXGbqpRZV3PNlQ3a6uiveK6TABZgcN0.jpg', '2022-12-15 00:44:33', '2022-12-15 00:44:33'),
(3, 'Lampu', 'sukucadang-images/0ulCrMa7aqTadAGFLJCscyex4Qye25qWYKhr2mUR.jpg', '2022-12-15 00:44:56', '2022-12-15 00:44:56'),
(4, 'Spakbor', 'sukucadang-images/YRgyLmtLuZlxm8w8OzsjB85BeOqkeJmjjYumO3lq.jpg', '2022-12-15 00:45:16', '2022-12-15 00:45:16'),
(5, 'Velg', 'sukucadang-images/J6FLiBtyNiWiWZMdmRd1VE8UHOUwuBsjqEWEFIrT.jpg', '2022-12-15 00:45:29', '2022-12-15 00:45:29'),
(6, 'Jok Motor', 'sukucadang-images/FYGX5A2BhfhrQrEUNIrES4FpRLY7u24SeuonX1NL.jpg', '2022-12-15 00:45:45', '2022-12-15 00:45:45'),
(7, 'Shockbreaker', 'sukucadang-images/hCU9la4JpzSZijFGAUVWclPJohxBwAQysRfyfCbY.jpg', '2022-12-15 00:46:40', '2022-12-15 00:46:40');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tokos`
--

CREATE TABLE `tokos` (
  `id` bigint(10) UNSIGNED NOT NULL,
  `user_id` bigint(10) UNSIGNED NOT NULL,
  `nama_toko` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `image2` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `nik` bigint(100) DEFAULT NULL,
  `image` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `no_telp` varchar(20) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `nomor_rek` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `province_id` varchar(10) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `city_id` varchar(10) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `alamat` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `tokos`
--

INSERT INTO `tokos` (`id`, `user_id`, `nama_toko`, `image2`, `nik`, `image`, `email`, `no_telp`, `nomor_rek`, `province_id`, `city_id`, `alamat`, `created_at`, `updated_at`) VALUES
(1, 3, 'toko user', 'toko-images2/dLO4IAhaR2JOKbn06dNBkkHL6UwINLfwLHLBRG3O.png', 123123123123, 'toko-images/vgqegq4BiKygZ65XcUmKayjQn1B4IWrDLJYC5JEq.jpg', 'user@gmail.com', '08123456789', '12345678910', '9', '108', 'Cirebon', '2022-09-13 23:44:36', '2023-01-28 07:22:41'),
(3, 5, 'toko ayi', '', NULL, 'toko-images/7i3WiXVdoDGPVWGuwMMU5DHqhc18kkpnhd69xjsN.jpg', 'ayi@gmail.com', '089123123123', NULL, '10', '472', 'tegal', '2022-09-14 02:58:22', '2022-10-09 23:58:18'),
(8, 9, 'Budi Store', '', NULL, 'toko-images/2kaWIOXHDNyGt7bkxVr05xW0qDL2cv1Y4tgJ3mDb.jpg', 'budi@gmail.com', '089876878787', NULL, '9', '22', 'Bandung', '2022-11-03 07:37:55', '2022-11-03 07:37:55');

-- --------------------------------------------------------

--
-- Struktur dari tabel `transaksis`
--

CREATE TABLE `transaksis` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `toko_id` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `produk_id` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nama` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `no_telp` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `alamat` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `jasa_pengiriman` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `no_resi` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `qty` int(10) NOT NULL,
  `total_bayar` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status_pembayaran` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status_pesanan` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `transaksis`
--

INSERT INTO `transaksis` (`id`, `user_id`, `toko_id`, `produk_id`, `nama`, `no_telp`, `alamat`, `jasa_pengiriman`, `no_resi`, `qty`, `total_bayar`, `status_pembayaran`, `status_pesanan`, `created_at`, `updated_at`) VALUES
(58, '9', '1', '[1]', 'Budi', '089876543211', 'Desa palimanan kelurahan palimanan kecamatan palimanan kabupaten cirebon', 'Pos Reguler  (Pos Reguler)   Rp.18000 (Estimasi 3 HARI hari)', NULL, 1, '1018000', 'belum-bayar', 'diproses', '2022-11-02 22:26:46', '2022-11-02 22:26:46'),
(87, '6', '1', '[3]', 'Indri', '089123123123', 'Blok Dukumalang , Kelurahan Tukmudal, Kecamatan sumber', 'Pos Ekonomi  (Pos Ekonomi)   Rp.24000 (Estimasi 7-14 HARI hari)', NULL, 1, '3024000', 'belum-bayar', 'diproses', '2022-11-09 08:10:00', '2022-11-12 05:49:26'),
(95, '6', '1', '[3]', 'Indri s', '089123123123', 'Blok Dukumalang , Kelurahan Tukmudal, Kecamatan sumber', 'Pos Ekonomi  (Pos Ekonomi)   Rp.24000 (Estimasi 7-14 HARI hari)', '1231231', 1, '3024000', 'sudah-bayar', 'dikirim', '2022-11-09 08:10:00', '2023-01-28 08:08:36'),
(97, '10', '1', '[3]', 'Tono s', '089688444833', 'kelurahan adiwerna kecamatan adiwerna Kabupaten tegal', 'OKE  (Ongkos Kirim Ekonomis)   Rp.39000 (Estimasi 3-6 hari)', NULL, 1, '3039000', 'sudah-bayar', 'diproses', '2022-11-12 07:25:04', '2023-01-17 00:08:17'),
(111, '10', '1', '[8]', 'tono aja', '0891239876543', 'jakarta', 'OKE  (Ongkos Kirim Ekonomis)   Rp.12000 (Estimasi 2-3 hari)', NULL, 1, '512000', 'sudah-bayar', 'diproses', '2023-01-30 07:07:08', '2023-01-30 07:07:26'),
(113, '10', '1', '[8]', 'tono aja', '089123123123', 'jakarta', 'OKE  (Ongkos Kirim Ekonomis)   Rp.12000 (Estimasi 2-3 hari)', NULL, 1, '512000', 'sudah-bayar', 'diproses', '2023-01-30 22:13:03', '2023-01-30 22:19:50');

-- --------------------------------------------------------

--
-- Struktur dari tabel `users`
--

CREATE TABLE `users` (
  `id` bigint(10) UNSIGNED NOT NULL,
  `name` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `image` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `password` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `type` tinyint(4) NOT NULL DEFAULT 0,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `image`, `password`, `type`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Admin User', 'admin@gmail.com', NULL, NULL, '$2y$10$tUBFlakYp7WEHpiICZUa9ezdQWGxGIu4HNq5w6e08YOysiDFBb.hC', 1, NULL, '2022-09-13 23:44:36', '2022-09-13 23:44:36'),
(3, 'User', 'user@gmail.com', NULL, 'user-images/z40U7hAA0OHxxivO4UJfQm4tHuK5rwkKzfHbM9A4.png', '$2y$10$tsodylGCTQZJVDNF3Rk3o.oxWlgalg.9dGcaNdqBqjNLAGnFoli1e', 0, NULL, '2022-09-13 23:44:36', '2022-09-19 23:53:34'),
(5, 'ayi', 'ayi@gmail.com', NULL, 'user-images/Kco1T3FBPHecJaHbdSah2BK7TH54WXNtjhB3YS8C.jpg', '$2y$10$D2.8fTaZs3LR9qdn6r64lOYV2qsq/cPMFRO78YIN29ZzhgR/k51Am', 0, NULL, '2022-09-14 01:20:40', '2022-09-27 23:06:43'),
(6, 'indri', 'indri@gmail.com', NULL, 'user-images/EROoeJ4sA1TWX4B92iVWMrkajsoOulg6EqPMaX3V.png', '$2y$10$yCSbFfzry3AbM7oLuJ3t/eZmKQydj3o6tMJZUGLXIYCuWphb143Bm', 0, NULL, '2022-09-14 22:54:39', '2022-09-20 00:06:35'),
(7, 'endi', 'endi@gmail.com', NULL, NULL, '$2y$10$THWgjqPxAWLqOZBgS3xcPuS2wWVCSAhosngkaSXtD4oYd2M5PU/JG', 0, NULL, '2022-09-22 01:31:06', '2022-09-22 01:31:06'),
(9, 'budi', 'budi@gmail.com', NULL, NULL, '$2y$10$JgUlGJXCaGyI7RNUHvKgO.6p0/QbAGaWakatSZebyUGNLlu3EazLy', 0, NULL, '2022-10-26 22:11:09', '2022-10-26 22:11:09'),
(10, 'tono', 'tono@gmail.com', NULL, NULL, '$2y$10$L2FX2Gh7q/x.0oe.YPpUveqhPV8RcrUti1IsdzgjK7PhwdEca63US', 0, NULL, '2022-11-10 22:54:33', '2022-11-10 22:54:33');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `citys`
--
ALTER TABLE `citys`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indeks untuk tabel `kategoris`
--
ALTER TABLE `kategoris`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `keranjangs`
--
ALTER TABLE `keranjangs`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `messages`
--
ALTER TABLE `messages`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indeks untuk tabel `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Indeks untuk tabel `produks`
--
ALTER TABLE `produks`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `provinces`
--
ALTER TABLE `provinces`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `sukucadangs`
--
ALTER TABLE `sukucadangs`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `tokos`
--
ALTER TABLE `tokos`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `transaksis`
--
ALTER TABLE `transaksis`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `citys`
--
ALTER TABLE `citys`
  MODIFY `id` bigint(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=502;

--
-- AUTO_INCREMENT untuk tabel `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `kategoris`
--
ALTER TABLE `kategoris`
  MODIFY `id` bigint(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT untuk tabel `keranjangs`
--
ALTER TABLE `keranjangs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=126;

--
-- AUTO_INCREMENT untuk tabel `messages`
--
ALTER TABLE `messages`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=76;

--
-- AUTO_INCREMENT untuk tabel `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT untuk tabel `orders`
--
ALTER TABLE `orders`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT untuk tabel `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `produks`
--
ALTER TABLE `produks`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT untuk tabel `provinces`
--
ALTER TABLE `provinces`
  MODIFY `id` bigint(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=35;

--
-- AUTO_INCREMENT untuk tabel `sukucadangs`
--
ALTER TABLE `sukucadangs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT untuk tabel `tokos`
--
ALTER TABLE `tokos`
  MODIFY `id` bigint(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT untuk tabel `transaksis`
--
ALTER TABLE `transaksis`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=114;

--
-- AUTO_INCREMENT untuk tabel `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

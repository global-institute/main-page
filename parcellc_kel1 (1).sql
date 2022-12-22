-- phpMyAdmin SQL Dump
-- version 4.9.7
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Aug 02, 2022 at 07:08 AM
-- Server version: 5.7.39
-- PHP Version: 7.4.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `parcellc_kel1`
--

-- --------------------------------------------------------

--
-- Table structure for table `tb_barang`
--

CREATE TABLE `tb_barang` (
  `id_barang` char(25) NOT NULL,
  `nama_barang` varchar(100) DEFAULT NULL,
  `id_jenis` char(25) DEFAULT NULL,
  `nama_brand` varchar(50) NOT NULL,
  `tipe_barang` varchar(50) NOT NULL,
  `satuan_barang` varchar(50) DEFAULT NULL,
  `stok` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_barang`
--

INSERT INTO `tb_barang` (`id_barang`, `nama_barang`, `id_jenis`, `nama_brand`, `tipe_barang`, `satuan_barang`, `stok`) VALUES
('BRG20785', 'Handphone Oppo Find X5 Pro 5G', 'J26316', 'Oppo', 'Find X5 Pro 5G', 'Unit', 0),
('BRG43254', 'Handphone Apple Iphone X', 'J26316', 'Apple', 'Iphone X', 'Unit', 9985),
('BRG51146', 'Handphone Xiaomi POCO M3', 'J26316', 'Xiaomi', 'POCO M3', 'Unit', 0),
('BRG55433', 'Smartphone Infinix Hot 11 Play', 'J99065', 'Infinix', 'Hot 11 Play', 'Unit', 4950),
('BRG59379', 'Handphone Oppo A96', 'J26316', 'Oppo', 'A96', 'Unit', 1995),
('BRG60534', 'Handphone Xiaomi Redmi 10C', 'J26316', 'Xiaomi', 'Redmi 10C', 'Unit', 1480);

-- --------------------------------------------------------

--
-- Table structure for table `tb_device`
--

CREATE TABLE `tb_device` (
  `id` int(11) NOT NULL,
  `perangkat` varchar(50) NOT NULL,
  `type` varchar(30) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1 ROW_FORMAT=DYNAMIC;

--
-- Dumping data for table `tb_device`
--

INSERT INTO `tb_device` (`id`, `perangkat`, `type`) VALUES
(1, 'RMX1805', 'Realme 2'),
(2, 'RMX1811', 'Realme C1'),
(3, 'RMX1821', 'Realme 3'),
(4, 'RMX1851', 'Realme 3 Pro'),
(5, 'RMX1911', 'Realme 5'),
(6, 'RMX1921', 'Realme XT'),
(7, 'RMX1941', 'Realme C2'),
(8, 'RMX1971', 'Realme 5 Pro'),
(9, 'RMX2001', 'Realme 6'),
(10, 'RMX2020', 'Realme C3'),
(11, 'RMX2030', 'Realme 5i'),
(12, 'RMX2101', 'Realme C17'),
(13, 'RMX2103', 'Realme 7i'),
(14, 'RMX2151', 'Realme 7'),
(15, 'RMX2163', 'Realme 7'),
(16, 'RMX2180', 'Realme C15'),
(17, 'RMX2185', 'Realme C11'),
(18, 'RMX2189', 'Realme C12'),
(19, 'RMX2193', 'Realme Narzo 20'),
(20, 'RMX2195', 'Realme C15'),
(21, 'RMX3171', 'Realme Narzo 30A'),
(22, 'Realme 5 Pro', 'Realme 5 Pro'),
(23, 'CPH1605', 'OPPO A39'),
(24, 'CPH1613', 'OPPO F3 PLUS'),
(25, 'CPH1701', 'OPPO A57'),
(26, 'CPH1729', 'OPPO A83'),
(27, 'CPH18', 'CPH18'),
(28, 'CPH1901', 'OPPO A7'),
(29, 'CPH1907', 'OPPO RENO 2'),
(30, 'CPH1909', 'OPPO A5S'),
(31, 'CPH1911', 'OPPO F11'),
(32, 'CPH1923', 'OPPO A1K'),
(33, 'CPH1931', 'OPPO A5'),
(34, 'CPH1933', 'OPPO A5 2020'),
(35, 'CPH1937', 'OPPO A9 2020'),
(36, 'CPH1969', 'OPPO F11 PRO'),
(37, 'CPH1989', 'OPPO RENO 2F'),
(38, 'CPH2015', 'OPPO A31'),
(39, 'CPH2059', 'OPPO A92'),
(40, 'CPH2061', 'OPPO A52'),
(41, 'CPH2083', 'OPPO A12'),
(42, 'CPH2113', 'OPPO RENO 4'),
(43, 'CPH2127', 'OPPO A53'),
(44, 'CPH2159', 'OPPO RENO 5'),
(45, 'CPH2185', 'OPPO A15'),
(46, 'F1f', 'OPPO F1F'),
(47, 'A1601', 'OPPO F1S'),
(48, 'A37f', 'OPPO A37F'),
(49, 'dandelion', 'Dandelion'),
(50, 'SM-A013G', 'SAMSUNG GALAXY A01 CORE'),
(51, 'SM-A015F', 'SAMSUNG GALAXY A01'),
(52, 'SM-A115F', 'SAMSUNG GALAXY A11'),
(53, 'SM-A125F', 'SAMSUNG GALAXY A12'),
(54, 'SM-A507FN', 'SAMSUNG GALAXY A50s'),
(55, 'SM-A510F', 'SAMSUNG GALAXY A5'),
(56, 'SM-A515F', 'SAMSUNG GALAXY A51'),
(57, 'SM-A525F', 'SAMSUNG GALAXY A52'),
(58, 'SM-A107F', 'SAMSUNG GALAXY A10s'),
(59, 'SM-A105G', 'SAMSUNG GALAXY A10'),
(60, 'SM-A910', 'SAMSUNG GALAXY A9'),
(61, 'SM-A217F', 'SAMSUNG GALAXY A21s'),
(62, 'SM-A205F', 'SAMSUNG GALAXY A20'),
(63, 'SM-A207F', 'SAMSUNG GALAXY A20s'),
(64, 'SM-A260G', 'SAMSUNG GALAXY A2 CORE'),
(65, 'SM-A320Y', 'SAMSUNG GALAXY A3'),
(66, 'SM-A315G', 'SAMSUNG GALAXY A31'),
(67, 'SM-A305F', 'SAMSUNG GALAXY A30'),
(68, 'SM-A505F', 'SAMSUNG GALAXY A50'),
(69, 'SM-A705F', 'SAMSUNG GALAXY A70'),
(70, 'SM-A750GN', 'SAMSUNG GALAXY A7'),
(71, 'SM-C710F', 'SAMSUNG GALAXY C7'),
(72, 'SM-G610F', 'SAMSUNG GALAXY J7 Prime'),
(73, 'SM-G532G', 'SAMSUNG GALAXY J2 Prime'),
(74, 'SM-G531H', 'SAMSUNG GALAXY GRAND Prime'),
(75, 'SM-G531Y', 'SAMSUNG GALAXY GRAND Prime'),
(76, 'SM-G900P', 'SAMSUNG GALAXY S5 Sprint'),
(77, 'SM-G960F', 'SAMSUNG GALAXY S9'),
(78, 'SM-G930L', 'SAMSUNG GALAXY S7'),
(79, 'SM-G935L', 'SAMSUNG GALAXY S7 Edge'),
(80, 'SM-G975F', 'SAMSUNG GALAXY S10 PLUS'),
(81, 'SM-G988N', 'SAMSUNG GALAXY S20 ULTRA 5G'),
(82, 'SM-J106B', 'SAMSUNG GALAXY J1 MINI Prime'),
(83, 'SM-J111F', 'SAMSUNG GALAXY J1 Ace'),
(84, 'SM-J110G', 'SAMSUNG GALAXY J1 Ace'),
(85, 'SM-J330G', 'SAMSUNG GALAXY J3 Pro'),
(86, 'SM-J330L', 'SAMSUNG GALAXY J3'),
(87, 'SM-J500G', 'SAMSUNG GALAXY J5'),
(88, 'SM-J610F', 'SAMSUNG GALAXY J6 PLUS'),
(89, 'SM-J701F', 'SAMSUNG GALAXY J7 CORE'),
(90, 'SM-J730G', 'SAMSUNG GALAXY J7 Pro'),
(91, 'SM-J200G', 'SAMSUNG GALAXY J2'),
(92, 'SM-J250F', 'SAMSUNG GALAXY J2 Pro'),
(93, 'SM-J710F', 'SAMSUNG GALAXY J7'),
(94, 'SM-J810Y', 'SAMSUNG GALAXY J8'),
(95, 'SM-J510FN', 'SAMSUNG GALAXY J5'),
(96, 'SM-J530Y', 'SAMSUNG GALAXY J5 Pro'),
(97, 'SM-J400F', 'SAMSUNG GALAXY J4'),
(98, 'SM-J415F', 'SAMSUNG GALAXY J4 Plus'),
(99, 'SM-M205G', 'SAMSUNG GALAXY M20'),
(100, 'SM-M307F', 'SAMSUNG GALAXY M30s'),
(101, 'SM-M105G', 'SAMSUNG GALAXY M10'),
(102, 'SM-M115F', 'SAMSUNG GALAXY M11'),
(103, 'SM-N9005', 'SAMSUNG GALAXY Note 3'),
(104, 'SM-N910C', 'SAMSUNG GALAXY Note 4'),
(105, 'SM-N950F', 'SAMSUNG GALAXY Note 8'),
(106, 'SM-N970F', 'SAMSUNG GALAXY Note 10'),
(107, 'GT-N7100', 'SAMSUNG GALAXY Note II'),
(108, '2014811', 'Redmi 2'),
(109, 'Redmi 3', 'Redmi 3'),
(110, 'Redmi 3S', 'Redmi 3S'),
(111, 'Redmi 4', 'Redmi 4'),
(112, 'Redmi 4a', 'Redmi 4a'),
(257, 'N2G47H', 'N2G47H'),
(114, 'Redmi 5', 'Redmi 5'),
(115, 'Redmi 5A', 'Redmi 5A'),
(116, 'Redmi 6', 'Redmi 6'),
(117, 'Redmi 7', 'Redmi 7'),
(118, 'Redmi 7A', 'Redmi 7A'),
(119, 'Redmi 8', 'Redmi 8'),
(120, 'Redmi 9', 'Redmi 9'),
(121, 'Redmi 9C', 'Redmi 9C'),
(122, 'M2004J19C', 'Redmi 9'),
(123, 'M2006C3LG', 'Redmi 9A'),
(124, 'M2006C3MG', 'Redmi 9c'),
(125, 'Redmi Note 3', 'Redmi Note 3'),
(126, 'Redmi Note 4', 'Redmi Note 4'),
(127, 'Redmi Note 5', 'Redmi Note 5'),
(128, 'Redmi Note 5A', 'Redmi Note 5A'),
(129, 'Redmi Note 6 Pro', 'Redmi Note 6 Pro'),
(130, 'Redmi Note 7', 'Redmi Note 7'),
(131, 'Redmi Note 8', 'Redmi Note 8'),
(132, 'Redmi Note 8 Pro', 'Redmi Note 8 Pro'),
(133, 'Redmi Note 9', 'Redmi Note 9'),
(134, 'Redmi Note 9 Pro', 'Redmi Note 9 Pro'),
(135, 'M2101K6G', 'Redmi Note 10'),
(136, 'Redmi S2', 'Redmi S2'),
(137, 'Mi A1', 'Mi A1'),
(138, 'Mi A2', 'Mi A2'),
(265, 'MI MAX', 'MI MAX'),
(140, 'Mi Max 2', 'Mi Max 2'),
(141, 'Mi Play', 'Mi Play'),
(142, 'iPhone OS 11_3', 'iPhone OS 11_3'),
(143, 'iPhone OS 12_4_1', 'iPhone OS 12_4_1'),
(144, 'iPhone OS 13_7', 'iPhone OS 13_7'),
(145, 'iPhone OS 13_5_1', 'iPhone OS 13_5_1'),
(146, 'iPhone OS 13_1_3', 'iPhone OS 13_1_3'),
(147, 'iPhone OS 14_0_1', 'iPhone OS 14_0_1'),
(148, 'iPhone OS 14_0', 'iPhone OS 14_0'),
(149, 'iPhone OS 14_1', 'iPhone OS 14_1'),
(150, 'iPhone OS 14_2', 'iPhone OS 14_2'),
(151, 'iPhone OS 14_3', 'iPhone OS 14_3'),
(152, 'iPhone OS 14_4', 'iPhone OS 14_4'),
(153, 'iPhone OS 14_5_1', 'iPhone OS 14_5_1'),
(154, 'iPhone OS 14_6', 'iPhone OS 14_6'),
(155, 'Intel Mac OS X 10_15_4', 'Intel Mac OS X 10_15_4'),
(156, 'iPhone OS 14_5 like Mac OS X', 'iPhone OS 14_5 like Mac OS X'),
(157, 'vivo 1603', 'Vivo Y55L'),
(158, 'vivo 1606', 'Vivo Y53'),
(159, 'vivo 1609', 'Vivo V5 Lite'),
(160, 'vivo 1612', 'vivo 1612'),
(161, 'vivo 1714', 'Vivo Y69'),
(162, 'vivo 1718', 'Vivo V7'),
(163, 'vivo 1724', 'Vivo Y71'),
(164, 'vivo 1807', 'Vivo Y95'),
(165, 'vivo 1808', 'Vivo Y81'),
(166, 'vivo 1811', 'Vivo Y91'),
(167, 'vivo 1812', 'Vivo Y81i'),
(168, 'vivo 1814', 'Vivo Y91'),
(169, 'vivo 1816', 'Vivo Y91i'),
(170, 'vivo 1817', 'Vivo Y91'),
(171, 'vivo 1819', 'vivo 1819'),
(172, 'vivo 1820', 'Vivo Y91c'),
(173, 'vivo 1901', 'Vivo Y15'),
(174, 'vivo 1902', 'Vivo Y17'),
(175, 'vivo 1904', 'Vivo Y12'),
(176, 'vivo 1907', 'Vivo S1'),
(177, 'vivo 1915', 'Vivo Y19'),
(178, 'vivo 1918', 'Vivo Z1 Pro'),
(179, 'vivo 1919', 'Vivo V19'),
(180, 'vivo 1935', 'Vivo Y50'),
(181, 'vivo 1938', 'Vivo Y30'),
(182, 'vivo 2007', 'Vivo Y12I'),
(183, 'vivo 2019', 'Vivo Y93'),
(184, 'V2022', 'Vivo V20'),
(185, 'V2026', 'Vivo Y12s'),
(186, 'V2027', 'Vivo Y20'),
(187, 'V2029', 'Vivo Y20s'),
(188, 'V2038', 'Vivo Y20s'),
(189, 'vivo V3', 'vivo V3'),
(190, 'vivo Y21', 'vivo Y21'),
(191, 'vivo Y31', 'vivo Y31'),
(192, 'Infinix X650C', 'Infinix HOT 8'),
(193, 'Infinix X652A', 'Infinix S5'),
(194, 'Infinix X653C', 'Infinix Smart 4'),
(195, 'Infinix X655C', 'Infinix HOT 9'),
(196, 'Infinix X656', 'Infinix Note 7 Lite'),
(197, 'Infinix X657C', 'Infinix Smart 5'),
(198, 'Infinix X680', 'Infinix HOT 9 Play'),
(199, 'Infinix X680B', 'Infinix HOT 9 Play'),
(200, 'Infinix X692', 'Infinix Note 8'),
(201, 'ASUS_I001DE', 'ASUS ROG Phone II'),
(202, 'ASUS_T00G', 'ASUS ZENFONE 6'),
(203, 'ASUS_X00TD', 'ASUS ZENFONE MAX PRO M1'),
(204, 'ASUS_X00RD', 'ASUS ZENFONE LIVE L1'),
(205, 'ASUS_X01BDA', 'ASUS ZENFONE MAX PRO M2'),
(206, 'ASUS_X01AD', 'ASUS ZENFONE MAX M2'),
(207, 'ASUS_X017DA', 'ASUS ZENFONE 5 LITE'),
(208, 'ASUS_Z00AD', 'ASUS ZENFONE 2'),
(209, 'ASUS_Z010D', 'ASUS ZENFONE MAX'),
(210, 'POCO M3', 'Xiaomi POCO M3'),
(211, 'POCO X3', 'Xiaomi POCO X3 NFT'),
(212, 'POCOPHONE F1', 'POCOPHONE F1'),
(213, 'M2007J20CG', 'Xiaomi POCO X3 NFT'),
(214, 'Andromax B16C2G', 'Andromax B16C2G'),
(215, 'X11', 'X11'),
(216, 'XS', 'iPhone XS'),
(217, 'iris702', 'LAVA iris702'),
(218, 'iris 820', 'LAVA iris 820'),
(219, 'LUNA G62', 'LUNA X PRO G62'),
(220, 'MITO_A37_Z1', 'MITO A31 Z1'),
(221, 'NX573J', 'Nubie M2 Lite'),
(222, 'Lenovo L38041', 'Lenovo K5 Pro'),
(223, 'Lenovo A7000-a', 'Lenovo A7000-a'),
(224, 'Lenovo_a2010', 'Lenovo A2010'),
(225, 'R40H', 'Evercoss R40H'),
(226, 'SO-03H', 'SONY Xperia Z5 Premium'),
(227, 'LG-M400', 'LG Stylus 3'),
(228, 'M2003J15SC', 'Redmi 10x'),
(229, 'L60', 'L60'),
(230, 'L6005', 'L6005'),
(231, 'V1', 'V1'),
(232, '6201', '6201'),
(233, 'S45', 'S45'),
(234, 'TA-1032', 'Nokia 3'),
(235, 'LUNA G5', 'LUNA G5 HSM'),
(236, 'MAXTRON S8', 'MAXTRON S8'),
(237, 'M50 MAX', 'Evercoss M50 MAX'),
(238, 'JAT-AL00', 'JAT-AL00'),
(239, 'SH-03G', 'SHARP Aquos Zeta'),
(240, 'LDN-LX2', 'Huawei Y7 Pro'),
(241, 'Windows NT 6', 'Windows NT 6'),
(242, 'Windows NT 10', 'Windows NT 10'),
(243, 'iPhone OS 15_1_1', 'iPhone OS 15_1_1'),
(244, 'M2103K19G', 'Redmi Note 10 5G'),
(245, 'iPhone OS 15_1', 'iPhone OS 15_1'),
(246, 'RMX3241', 'Realme 8 5G'),
(247, 'iPhone OS 15_2', 'iPhone OS 15_2'),
(248, 'iPhone OS 15_0_2', 'iPhone OS 15_0_2'),
(249, 'iPhone OS 12_5_5', 'iPhone OS 12_5_5'),
(250, 'CPH2239', 'OPPO A54'),
(251, 'RMX3201', 'Realme C21'),
(252, 'M2101K7BNY', 'Redmi Note 10s'),
(253, 'SM-A022F', 'SAMSUNG GALAXY A02'),
(254, 'V2110', 'V2110'),
(255, 'RMX3261', 'Realme C21Y'),
(258, 'Redmi 4X', 'Redmi 4X'),
(259, 'iPhone OS 15_3', 'iPhone OS 15_3'),
(260, 'Infinix X688B', 'Infinix X688B'),
(261, 'CPH1717', 'CPH1717'),
(262, 'SM-J105F', 'Samsung Galaxy J1'),
(263, 'iPhone OS 14_8_1', 'iPhone OS 14_8_1'),
(264, 'Infinix X689', 'Infinix X689'),
(266, 'M2102J20SG', 'Xiaomi Poco X3'),
(267, 'M2010J19SG', 'Xiaomi Redmi 9T'),
(268, 'Infinix X657B', 'Infinix X657B'),
(269, 'R1011', 'Oppo Joy Plus R1011'),
(270, 'iPhone OS 15_3_1', 'iPhone OS 15_3_1'),
(271, 'RMX3231', 'Realme C11'),
(272, 'iPhone OS 15_4_1', 'iPhone OS 15_4_1'),
(273, 'SM-A528B', 'Samsung Galaxy A52s 5G'),
(274, 'M2010J19CG', 'POCO M3'),
(275, 'RMX2002', 'Realme 6i'),
(276, 'iPhone OS 15_4', 'iPhone OS 15_4'),
(277, 'Infinix X693', 'Infinix Note 10'),
(278, 'LG-D690', 'LG-D690'),
(279, 'V2043', 'Vivo Y20 2021'),
(280, 'Infinix X6812B', 'Infinix Hot 11S'),
(281, 'RMX3511', 'Realme C35'),
(282, 'CPH2209', 'SMARTPHONE OPPO RENO 4F'),
(283, '801SO', 'Sony Xperia XZ3'),
(284, 'Infinix X695C', 'Infinix Note 10 Pro'),
(285, 'Infinix X682B', 'Infinix Hot 10'),
(286, 'V2111', 'Vivo Y21 2021'),
(287, 'vivo 1920', 'vivo S1 Pro'),
(288, '21061119AG', 'Redmi 10'),
(289, 'vivo 1802', 'Vivo Y83'),
(290, 'CPH2269', 'Oppo A16'),
(291, 'CLT-L29', 'Huawei P20 Pro'),
(292, 'RMX3191', 'Realme C25'),
(293, 'Infinix X690B', 'Infinix Note 7'),
(294, 'MIX', 'MIX'),
(295, 'M2101K7AG', 'Xiaomi Redmi Note 10'),
(296, '21061110AG', 'Poco X3 GT'),
(297, 'SOV40', 'Sony Xperia 1'),
(298, 'iPhone OS 14_8', 'iPhone OS 14_8'),
(299, 'POCO X3 NFC', 'POCO X3 NFC'),
(300, 'Nokia C1', 'Nokia C1'),
(301, 'SM-G530H', 'Samsung Galaxy Grand Prime'),
(302, 'SM-T295', 'Samsung Galaxy Tab A 8.0 (2019'),
(303, 'CPH2235', 'Oppo Reno 6'),
(304, 'SM-A037F', 'Samsung Galaxy A03s'),
(305, 'Infinix X687', 'Infinix Zero 8'),
(306, 'SM-A715F', 'Samsung Galaxy A71'),
(307, 'SM-M225FV', 'Samsung Galaxy M22'),
(308, 'M2007J3SY', 'Xiaomi Mi 10T'),
(309, 'SM-A325F', 'Samsung Galaxy A32'),
(310, 'vivo 1929', 'VIVO Y1S'),
(311, 'vivo 1804', 'Vivo V11'),
(312, 'OPPO A57', 'OPPO A57'),
(313, 'Realme Narzo 20', 'Realme Narzo 20'),
(314, 'SOV34', 'Sony Xperia XZ'),
(315, 'Intel Mac OS X 10_15_6', 'Intel Mac OS X 10_15_6'),
(316, 'SM-G950F', 'Samsung Galaxy S8'),
(317, 'RMX3063', 'Realme C20'),
(318, 'RMX3363', 'Realme GT Master'),
(319, 'GM1917', 'OnePlus 7 Pro'),
(320, 'GT-I9060I', 'Samsung Galaxy Grand Neo'),
(321, 'V2025', 'Vivo V20'),
(322, 'SM-A605G', 'Samsung Galaxy A6+'),
(323, 'Redmi Note 10', 'Redmi Note 10'),
(324, 'Mi 4i', 'Xiaomi Mi 4i'),
(325, 'Infinix X689B', 'Infinix Hot 10S'),
(326, 'SM-J600G', 'Samsung Galaxy J6'),
(327, 'SHV39', 'Sharp Aquos R'),
(328, 'iPhone OS 15_0_1', 'iPhone OS 15_0_1'),
(329, 'CPH2217', 'Oppo Reno 5F'),
(330, 'M2012K11AG', 'Xiaomi Poco F3'),
(331, 'CPH2179', 'Oppo A15s'),
(332, 'iPhone OS 15_0', 'iPhone OS 15_0'),
(333, 'RMX1903', 'Realme X'),
(334, 'RMX3085', 'Realme 8'),
(335, 'SM-G9287C', 'Samsung Galaxy S6 edge+'),
(336, 'RMX2086', 'Realme X3 SuperZoom'),
(337, 'ASUS_Z011DD', 'Asus Zenfone 2'),
(338, 'SM-A307GN', 'Samsung Galaxy A30s'),
(339, 'CPH2065', 'OPPO Reno4 Z 5G'),
(340, 'SKR-H0', 'Xiaomi BLACK SHARK'),
(341, 'CPH2137', 'Oppo A33'),
(342, 'Redmi Note 10 Pro', 'Redmi Note 10 Pro'),
(343, 'YAL-L21', 'Huawei Nova 5T'),
(344, 'iPhone OS 14_7_1', 'iPhone OS 14_7_1'),
(345, 'SM-J260G', 'Samsung Galaxy J2'),
(346, 'iPhone OS 13_2_3', 'iPhone OS 13_2_3'),
(347, 'vivo 1727', 'Vivo V9 Youth'),
(348, 'SM-M215F', 'Samsung Galaxy M21'),
(349, 'DRA-LX2', 'Huawei Y5 Prime'),
(350, 'SM-A600G', 'Samsung Galaxy A6'),
(351, 'Infinix X682C', 'Infinix Hot 10'),
(352, 'SM-A520F', 'Samsung Galaxy A5'),
(353, 'ASUS_X00HD', 'Asus ZenFone 4 Max'),
(354, 'Lenovo P1ma40', 'Lenovo P1ma40'),
(355, 'Andromax A36C5H', 'Andromax A2'),
(356, 'SM-A226B', 'Samsung Galaxy A22s 5G'),
(357, 'CPH2071', 'Oppo A11k'),
(358, 'CPH1723', 'OPPO F5'),
(359, 'SM-M022F', 'Samsung Galaxy M02'),
(360, 'MZ-M5 Note', 'Meizu M5 Note'),
(361, 'ASUS_I005D', 'Asus ROG Phone 5 Pro'),
(362, 'POCO X3 Pro', 'POCO X3 Pro'),
(363, 'ZenFone Max Pro M1', 'Asus Zenfone Max Pro M1'),
(364, 'V2039', 'vivo Y12s'),
(365, 'iPhone OS 12_3_1', 'iPhone OS 12_3_1'),
(366, 'SM-A720F', 'Samsung Galaxy A7'),
(367, 'SM-G986N', 'Samsung Galaxy S20 Plus'),
(368, 'RMX3268', 'Realme C25Y'),
(369, '2201117TY', 'Redmi Note 11'),
(370, 'vivo 1601', 'Vivo V5'),
(371, 'TECNO KD7', 'Tecno Spark 5 Pro'),
(372, 'SM-A025F', 'Samsung Galaxy A02s'),
(373, 'iPhone OS 15_5', 'iPhone OS 15_5'),
(374, 'RMX3263', 'Realme C21Y'),
(375, 'Infinix X6511B', 'Infinix Smart 6'),
(376, 'V2120', 'Vivo Y15S'),
(377, 'Redmi Note 11', 'Redmi Note 11'),
(378, 'SM-G570Y', 'Samsung Galaxy J5 Prime'),
(379, 'M6', 'Meizu M6'),
(380, 'V2109', 'Vivo Y33s'),
(381, 'SM-A135F', 'Samsung Galaxy A13'),
(382, 'Infinix X650B', 'Infinix Hot 8'),
(383, 'SM-A805F', 'Samsung Galaxy A80'),
(384, 'TECNO KG5k', 'Tecno Spark 8c'),
(388, 'M2007J3SG', 'Xiaomi Mi 10T');

-- --------------------------------------------------------

--
-- Table structure for table `tb_export`
--

CREATE TABLE `tb_export` (
  `id_export` char(25) NOT NULL,
  `id_barang` char(25) NOT NULL,
  `id_petugas` char(25) NOT NULL,
  `penerima` varchar(50) NOT NULL,
  `quantity` int(11) NOT NULL,
  `tgl_keluar` date NOT NULL,
  `jam_keluar` time NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_export`
--

INSERT INTO `tb_export` (`id_export`, `id_barang`, `id_petugas`, `penerima`, `quantity`, `tgl_keluar`, `jam_keluar`) VALUES
('OUT16291', 'BRG55433', 'PTG76685', 'Rayhan', 50, '2022-07-15', '16:01:37'),
('OUT70530', 'BRG43254', 'PTG76685', 'Marthin', 15, '2022-07-17', '22:37:58'),
('OUT79005', 'BRG60534', 'PTG76685', 'Novara', 20, '2022-07-15', '16:04:08');

-- --------------------------------------------------------

--
-- Table structure for table `tb_import`
--

CREATE TABLE `tb_import` (
  `id_import` char(25) NOT NULL,
  `id_barang` char(25) NOT NULL,
  `id_petugas` char(25) NOT NULL,
  `id_supplier` char(25) NOT NULL,
  `quantity` int(11) NOT NULL,
  `tgl_masuk` date NOT NULL,
  `jam_masuk` time NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_import`
--

INSERT INTO `tb_import` (`id_import`, `id_barang`, `id_petugas`, `id_supplier`, `quantity`, `tgl_masuk`, `jam_masuk`) VALUES
('IN28135', 'BRG43254', 'PTG58853', 'SUP16152', 10000, '2022-07-17', '22:37:19'),
('IN38435', 'BRG55433', 'PTG58853', 'SUP40459', 5000, '2022-07-15', '14:22:10'),
('IN49303', 'BRG59379', 'PTG76685', 'SUP97940', 2000, '2022-07-14', '23:38:19'),
('IN6348', 'BRG60534', 'PTG76685', 'SUP53322', 1500, '2022-07-14', '22:13:33');

-- --------------------------------------------------------

--
-- Table structure for table `tb_jenis`
--

CREATE TABLE `tb_jenis` (
  `id_jenis` char(25) NOT NULL,
  `nama_jenis` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_jenis`
--

INSERT INTO `tb_jenis` (`id_jenis`, `nama_jenis`) VALUES
('J2048', 'Computer'),
('J26316', 'Handphone'),
('J50292', 'Laptop'),
('J99065', 'Smartphone');

-- --------------------------------------------------------

--
-- Table structure for table `tb_login_history`
--

CREATE TABLE `tb_login_history` (
  `id` int(11) NOT NULL,
  `username` varchar(15) NOT NULL,
  `operating_system` longtext NOT NULL,
  `device_name` varchar(50) NOT NULL,
  `datetime` varchar(50) NOT NULL,
  `status` enum('online','offline') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_login_history`
--

INSERT INTO `tb_login_history` (`id`, `username`, `operating_system`, `device_name`, `datetime`, `status`) VALUES
(1, 'admin', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/103.0.5060.114 Safari/537.36 Edg/103.0.1264.49', 'Windows NT 10', '2022-07-13 08:22:19', 'online'),
(2, 'admin', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/103.0.5060.114 Safari/537.36 Edg/103.0.1264.49', 'Windows NT 10', '2022-07-13 08:27:22', 'offline'),
(3, 'admin', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/103.0.5060.114 Safari/537.36 Edg/103.0.1264.49', 'Windows NT 10', '2022-07-13 08:27:32', 'online'),
(4, 'admin', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/103.0.5060.114 Safari/537.36 Edg/103.0.1264.49', 'Windows NT 10', '2022-07-13 08:55:19', 'offline'),
(5, 'petugas', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/103.0.5060.114 Safari/537.36 Edg/103.0.1264.49', 'Windows NT 10', '2022-07-13 08:55:30', 'online'),
(6, 'petugas', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/103.0.5060.114 Safari/537.36 Edg/103.0.1264.49', 'Windows NT 10', '2022-07-13 08:55:58', 'offline'),
(7, 'admin', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/103.0.5060.114 Safari/537.36 Edg/103.0.1264.49', 'Windows NT 10', '2022-07-13 08:56:02', 'online'),
(8, 'admin', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/103.0.5060.114 Safari/537.36 Edg/103.0.1264.49', 'Windows NT 10', '2022-07-13 08:56:11', 'offline'),
(9, 'admin', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/103.0.5060.114 Safari/537.36 Edg/103.0.1264.49', 'Windows NT 10', '2022-07-13 08:56:16', 'online'),
(10, 'admin', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/103.0.5060.114 Safari/537.36 Edg/103.0.1264.49', 'Windows NT 10', '2022-07-13 08:59:18', 'offline'),
(11, 'petugas', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/103.0.5060.114 Safari/537.36 Edg/103.0.1264.49', 'Windows NT 10', '2022-07-13 08:59:29', 'online'),
(12, 'petugas', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/103.0.5060.114 Safari/537.36 Edg/103.0.1264.49', 'Windows NT 10', '2022-07-13 09:34:03', 'offline'),
(13, 'admin', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/103.0.5060.114 Safari/537.36 Edg/103.0.1264.49', 'Windows NT 10', '2022-07-13 09:40:14', 'online'),
(14, 'admin', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/103.0.5060.114 Safari/537.36 Edg/103.0.1264.49', 'Windows NT 10', '2022-07-13 11:18:33', 'offline'),
(15, 'admin', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/103.0.5060.114 Safari/537.36 Edg/103.0.1264.49', 'Windows NT 10', '2022-07-13 11:19:23', 'online'),
(16, 'admin', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/103.0.5060.114 Safari/537.36 Edg/103.0.1264.49', 'Windows NT 10', '2022-07-13 12:28:02', 'online'),
(17, 'admin', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/103.0.5060.114 Safari/537.36 Edg/103.0.1264.49', 'Windows NT 10', '2022-07-13 21:08:32', 'online'),
(18, 'admin', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/103.0.5060.114 Safari/537.36 Edg/103.0.1264.49', 'Windows NT 10', '2022-07-14 09:05:52', 'online'),
(19, 'admin', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/103.0.5060.114 Safari/537.36 Edg/103.0.1264.49', 'Windows NT 10', '2022-07-14 10:06:28', 'online'),
(20, 'admin', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/103.0.5060.114 Safari/537.36 Edg/103.0.1264.49', 'Windows NT 10', '2022-07-14 10:07:25', 'offline'),
(21, 'admin', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/103.0.5060.114 Safari/537.36 Edg/103.0.1264.49', 'Windows NT 10', '2022-07-14 10:07:39', 'online'),
(22, 'admin', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/103.0.5060.114 Safari/537.36 Edg/103.0.1264.49', 'Windows NT 10', '2022-07-14 10:48:37', 'offline'),
(23, 'admin', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/103.0.5060.114 Safari/537.36 Edg/103.0.1264.49', 'Windows NT 10', '2022-07-14 10:48:42', 'online'),
(24, 'admin', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/103.0.5060.114 Safari/537.36 Edg/103.0.1264.49', 'Windows NT 10', '2022-07-14 10:48:51', 'offline'),
(25, 'supervisor', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/103.0.5060.114 Safari/537.36 Edg/103.0.1264.49', 'Windows NT 10', '2022-07-14 10:49:21', 'online'),
(26, 'supervisor', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/103.0.5060.114 Safari/537.36 Edg/103.0.1264.49', 'Windows NT 10', '2022-07-14 10:50:12', 'offline'),
(27, 'admin', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/103.0.5060.114 Safari/537.36 Edg/103.0.1264.49', 'Windows NT 10', '2022-07-14 10:50:44', 'online'),
(28, 'admin', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/103.0.5060.114 Safari/537.36 Edg/103.0.1264.49', 'Windows NT 10', '2022-07-14 10:50:55', 'offline'),
(29, 'admin', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/103.0.5060.114 Safari/537.36 Edg/103.0.1264.49', 'Windows NT 10', '2022-07-14 10:51:03', 'online'),
(30, 'admin', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/103.0.5060.114 Safari/537.36 Edg/103.0.1264.49', 'Windows NT 10', '2022-07-14 10:54:22', 'offline'),
(31, 'admin', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/103.0.5060.114 Safari/537.36 Edg/103.0.1264.49', 'Windows NT 10', '2022-07-14 10:54:37', 'online'),
(32, 'admin', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/103.0.5060.114 Safari/537.36 Edg/103.0.1264.49', 'Windows NT 10', '2022-07-14 11:04:07', 'offline'),
(33, 'admin', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/103.0.5060.114 Safari/537.36 Edg/103.0.1264.49', 'Windows NT 10', '2022-07-14 11:10:50', 'online'),
(34, 'admin', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/103.0.5060.114 Safari/537.36 Edg/103.0.1264.49', 'Windows NT 10', '2022-07-14 11:29:19', 'offline'),
(35, 'admin', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/103.0.5060.114 Safari/537.36 Edg/103.0.1264.49', 'Windows NT 10', '2022-07-14 11:29:23', 'online'),
(36, 'admin', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/103.0.5060.114 Safari/537.36 Edg/103.0.1264.49', 'Windows NT 10', '2022-07-14 12:20:37', 'offline'),
(37, 'admin', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/103.0.5060.114 Safari/537.36 Edg/103.0.1264.49', 'Windows NT 10', '2022-07-14 12:21:04', 'online'),
(38, 'admin', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/103.0.5060.114 Safari/537.36 Edg/103.0.1264.49', 'Windows NT 10', '2022-07-14 12:21:18', 'offline'),
(39, 'admin', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/103.0.5060.114 Safari/537.36 Edg/103.0.1264.49', 'Windows NT 10', '2022-07-14 12:21:32', 'online'),
(40, 'admin', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/103.0.5060.114 Safari/537.36 Edg/103.0.1264.49', 'Windows NT 10', '2022-07-14 12:23:30', 'offline'),
(41, 'admin', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/103.0.5060.114 Safari/537.36 Edg/103.0.1264.49', 'Windows NT 10', '2022-07-14 12:23:34', 'online'),
(42, 'admin', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/103.0.5060.114 Safari/537.36 Edg/103.0.1264.49', 'Windows NT 10', '2022-07-14 12:23:41', 'offline'),
(43, 'admin', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/103.0.5060.114 Safari/537.36 Edg/103.0.1264.49', 'Windows NT 10', '2022-07-14 12:23:44', 'online'),
(44, 'admin', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/103.0.5060.114 Safari/537.36 Edg/103.0.1264.49', 'Windows NT 10', '2022-07-14 12:24:20', 'offline'),
(45, 'admin', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/103.0.5060.114 Safari/537.36 Edg/103.0.1264.49', 'Windows NT 10', '2022-07-14 12:24:24', 'online'),
(46, 'admin', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/103.0.5060.114 Safari/537.36 Edg/103.0.1264.49', 'Windows NT 10', '2022-07-14 12:29:04', 'offline'),
(47, 'admin', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/103.0.5060.114 Safari/537.36 Edg/103.0.1264.49', 'Windows NT 10', '2022-07-14 12:29:07', 'online'),
(48, 'admin', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/103.0.5060.114 Safari/537.36 Edg/103.0.1264.49', 'Windows NT 10', '2022-07-14 12:53:22', 'offline'),
(49, 'admin', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/103.0.5060.114 Safari/537.36 Edg/103.0.1264.49', 'Windows NT 10', '2022-07-14 12:53:25', 'online'),
(50, 'admin', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/103.0.5060.114 Safari/537.36 Edg/103.0.1264.49', 'Windows NT 10', '2022-07-14 12:53:40', 'offline'),
(51, 'admin', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/103.0.5060.114 Safari/537.36 Edg/103.0.1264.49', 'Windows NT 10', '2022-07-14 12:53:44', 'online'),
(52, 'admin', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/103.0.5060.114 Safari/537.36 Edg/103.0.1264.49', 'Windows NT 10', '2022-07-14 14:18:25', 'offline'),
(53, 'petugas', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/103.0.5060.114 Safari/537.36 Edg/103.0.1264.49', 'Windows NT 10', '2022-07-14 14:18:30', 'online'),
(54, 'petugas', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/103.0.5060.114 Safari/537.36 Edg/103.0.1264.49', 'Windows NT 10', '2022-07-14 14:18:37', 'offline'),
(55, 'petugas', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/103.0.5060.114 Safari/537.36 Edg/103.0.1264.49', 'Windows NT 10', '2022-07-14 14:19:14', 'online'),
(56, 'petugas', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/103.0.5060.114 Safari/537.36 Edg/103.0.1264.49', 'Windows NT 10', '2022-07-14 14:19:28', 'offline'),
(57, 'admin', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/103.0.5060.114 Safari/537.36 Edg/103.0.1264.49', 'Windows NT 10', '2022-07-14 14:19:32', 'online'),
(58, 'admin', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/103.0.5060.114 Safari/537.36 Edg/103.0.1264.49', 'Windows NT 10', '2022-07-14 14:19:40', 'offline'),
(59, 'supervisor', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/103.0.5060.114 Safari/537.36 Edg/103.0.1264.49', 'Windows NT 10', '2022-07-14 14:19:44', 'online'),
(60, 'supervisor', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/103.0.5060.114 Safari/537.36 Edg/103.0.1264.49', 'Windows NT 10', '2022-07-14 14:19:54', 'offline'),
(61, 'admin', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/103.0.5060.114 Safari/537.36 Edg/103.0.1264.49', 'Windows NT 10', '2022-07-14 14:19:57', 'online'),
(62, 'admin', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/103.0.5060.114 Safari/537.36 Edg/103.0.1264.49', 'Windows NT 10', '2022-07-14 15:36:11', 'offline'),
(63, 'admin', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/103.0.5060.114 Safari/537.36 Edg/103.0.1264.49', 'Windows NT 10', '2022-07-14 15:36:19', 'online'),
(64, 'admin', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/103.0.5060.114 Safari/537.36 Edg/103.0.1264.49', 'Windows NT 10', '2022-07-14 15:53:48', 'offline'),
(65, 'petugas', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/103.0.5060.114 Safari/537.36 Edg/103.0.1264.49', 'Windows NT 10', '2022-07-14 15:53:53', 'online'),
(66, 'petugas', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/103.0.5060.114 Safari/537.36 Edg/103.0.1264.49', 'Windows NT 10', '2022-07-14 15:54:02', 'offline'),
(67, 'petugas', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/103.0.5060.114 Safari/537.36 Edg/103.0.1264.49', 'Windows NT 10', '2022-07-14 15:56:03', 'online'),
(68, 'petugas', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/103.0.5060.114 Safari/537.36 Edg/103.0.1264.49', 'Windows NT 10', '2022-07-14 15:56:15', 'offline'),
(69, 'supervisor', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/103.0.5060.114 Safari/537.36 Edg/103.0.1264.49', 'Windows NT 10', '2022-07-14 15:56:26', 'online'),
(70, 'supervisor', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/103.0.5060.114 Safari/537.36 Edg/103.0.1264.49', 'Windows NT 10', '2022-07-14 17:25:06', 'offline'),
(71, 'petugas', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/103.0.5060.114 Safari/537.36 Edg/103.0.1264.49', 'Windows NT 10', '2022-07-14 17:25:10', 'online'),
(72, 'petugas', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/103.0.5060.114 Safari/537.36 Edg/103.0.1264.49', 'Windows NT 10', '2022-07-14 17:25:37', 'offline'),
(73, 'admin', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/103.0.5060.114 Safari/537.36 Edg/103.0.1264.49', 'Windows NT 10', '2022-07-14 17:25:41', 'online'),
(74, 'admin', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/103.0.5060.114 Safari/537.36 Edg/103.0.1264.49', 'Windows NT 10', '2022-07-14 17:27:06', 'offline'),
(75, 'admin', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/103.0.5060.114 Safari/537.36 Edg/103.0.1264.49', 'Windows NT 10', '2022-07-14 17:37:25', 'online'),
(76, 'admin', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/103.0.5060.114 Safari/537.36 Edg/103.0.1264.49', 'Windows NT 10', '2022-07-15 07:38:54', 'online'),
(77, 'admin', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/103.0.5060.114 Safari/537.36 Edg/103.0.1264.49', 'Windows NT 10', '2022-07-15 08:06:37', 'offline'),
(78, 'admin', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/103.0.5060.114 Safari/537.36 Edg/103.0.1264.49', 'Windows NT 10', '2022-07-15 08:06:54', 'online'),
(79, 'admin', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/103.0.5060.114 Safari/537.36 Edg/103.0.1264.49', 'Windows NT 10', '2022-07-15 08:16:25', 'offline'),
(80, 'petugas', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/103.0.5060.114 Safari/537.36 Edg/103.0.1264.49', 'Windows NT 10', '2022-07-15 08:16:38', 'online'),
(81, 'petugas', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/103.0.5060.114 Safari/537.36 Edg/103.0.1264.49', 'Windows NT 10', '2022-07-15 09:02:32', 'offline'),
(82, 'admin', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/103.0.5060.114 Safari/537.36 Edg/103.0.1264.49', 'Windows NT 10', '2022-07-15 09:02:41', 'online'),
(83, 'admin', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/103.0.5060.114 Safari/537.36 Edg/103.0.1264.49', 'Windows NT 10', '2022-07-15 09:10:09', 'offline'),
(84, 'petugas', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/103.0.5060.114 Safari/537.36 Edg/103.0.1264.49', 'Windows NT 10', '2022-07-15 09:10:15', 'online'),
(85, 'petugas', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/103.0.5060.114 Safari/537.36 Edg/103.0.1264.49', 'Windows NT 10', '2022-07-15 09:12:03', 'offline'),
(86, 'supervisor', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/103.0.5060.114 Safari/537.36 Edg/103.0.1264.49', 'Windows NT 10', '2022-07-15 09:12:11', 'online'),
(87, 'supervisor', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/103.0.5060.114 Safari/537.36 Edg/103.0.1264.49', 'Windows NT 10', '2022-07-15 09:14:40', 'offline'),
(88, 'admin', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/103.0.5060.114 Safari/537.36 Edg/103.0.1264.49', 'Windows NT 10', '2022-07-15 09:14:45', 'online'),
(89, 'admin', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/103.0.5060.114 Safari/537.36 Edg/103.0.1264.49', 'Windows NT 10', '2022-07-15 09:57:01', 'offline'),
(90, 'petugas', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/103.0.5060.114 Safari/537.36 Edg/103.0.1264.49', 'Windows NT 10', '2022-07-15 09:57:08', 'online'),
(91, 'petugas', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/103.0.5060.114 Safari/537.36 Edg/103.0.1264.49', 'Windows NT 10', '2022-07-15 10:31:30', 'offline'),
(92, 'admin', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/103.0.5060.114 Safari/537.36 Edg/103.0.1264.49', 'Windows NT 10', '2022-07-15 10:31:34', 'online'),
(93, 'admin', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/103.0.5060.114 Safari/537.36 Edg/103.0.1264.49', 'Windows NT 10', '2022-07-15 13:12:26', 'online'),
(94, 'admin', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/103.0.5060.114 Safari/537.36 Edg/103.0.1264.49', 'Windows NT 10', '2022-07-15 13:50:28', 'offline'),
(95, 'petugas', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/103.0.5060.114 Safari/537.36 Edg/103.0.1264.49', 'Windows NT 10', '2022-07-15 13:50:33', 'online'),
(96, 'petugas', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/103.0.5060.114 Safari/537.36 Edg/103.0.1264.49', 'Windows NT 10', '2022-07-15 13:50:42', 'offline'),
(97, 'admin', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/103.0.5060.114 Safari/537.36 Edg/103.0.1264.49', 'Windows NT 10', '2022-07-15 13:50:46', 'online'),
(98, 'admin', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/103.0.5060.114 Safari/537.36 Edg/103.0.1264.49', 'Windows NT 10', '2022-07-15 13:54:07', 'offline'),
(99, 'petugas', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/103.0.5060.114 Safari/537.36 Edg/103.0.1264.49', 'Windows NT 10', '2022-07-15 13:54:15', 'online'),
(100, 'petugas', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/103.0.5060.114 Safari/537.36 Edg/103.0.1264.49', 'Windows NT 10', '2022-07-15 13:54:19', 'offline'),
(101, 'admin', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/103.0.5060.114 Safari/537.36 Edg/103.0.1264.49', 'Windows NT 10', '2022-07-15 13:54:23', 'online'),
(102, 'admin', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/103.0.5060.114 Safari/537.36 Edg/103.0.1264.49', 'Windows NT 10', '2022-07-15 16:02:18', 'offline'),
(103, 'petugas', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/103.0.5060.114 Safari/537.36 Edg/103.0.1264.49', 'Windows NT 10', '2022-07-15 16:02:24', 'online'),
(104, 'petugas', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/103.0.5060.114 Safari/537.36 Edg/103.0.1264.49', 'Windows NT 10', '2022-07-15 16:13:39', 'offline'),
(105, 'petugas', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/103.0.5060.114 Safari/537.36 Edg/103.0.1264.49', 'Windows NT 10', '2022-07-15 16:13:53', 'online'),
(106, 'petugas', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/103.0.5060.114 Safari/537.36 Edg/103.0.1264.49', 'Windows NT 10', '2022-07-15 16:17:09', 'offline'),
(107, 'supervisor', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/103.0.5060.114 Safari/537.36 Edg/103.0.1264.49', 'Windows NT 10', '2022-07-15 16:17:16', 'online'),
(108, 'supervisor', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/103.0.5060.114 Safari/537.36 Edg/103.0.1264.49', 'Windows NT 10', '2022-07-15 16:18:15', 'offline'),
(109, 'admin', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/103.0.5060.114 Safari/537.36 Edg/103.0.1264.49', 'Windows NT 10', '2022-07-15 16:18:20', 'online'),
(110, 'admin', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/103.0.5060.114 Safari/537.36 Edg/103.0.1264.49', 'Windows NT 10', '2022-07-15 16:19:50', 'offline'),
(111, 'admin', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/103.0.5060.114 Safari/537.36 Edg/103.0.1264.49', 'Windows NT 10', '2022-07-15 16:23:28', 'online'),
(112, 'admin', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/103.0.5060.114 Safari/537.36 Edg/103.0.1264.49', 'Windows NT 10', '2022-07-15 16:23:35', 'offline'),
(113, 'admin', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/103.0.5060.114 Safari/537.36 Edg/103.0.1264.49', 'Windows NT 10', '2022-07-15 16:23:42', 'online'),
(114, 'admin', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/103.0.5060.114 Safari/537.36 Edg/103.0.1264.49', 'Windows NT 10', '2022-07-15 16:25:59', 'offline'),
(115, 'petugas', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/103.0.5060.114 Safari/537.36 Edg/103.0.1264.49', 'Windows NT 10', '2022-07-15 16:28:33', 'online'),
(116, 'petugas', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/103.0.5060.114 Safari/537.36 Edg/103.0.1264.49', 'Windows NT 10', '2022-07-15 16:28:40', 'offline'),
(117, 'petugas', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/103.0.5060.114 Safari/537.36 Edg/103.0.1264.49', 'Windows NT 10', '2022-07-15 16:28:58', 'online'),
(118, 'petugas', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/103.0.5060.114 Safari/537.36 Edg/103.0.1264.49', 'Windows NT 10', '2022-07-15 16:29:12', 'offline'),
(119, 'admin', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/103.0.5060.114 Safari/537.36 Edg/103.0.1264.49', 'Windows NT 10', '2022-07-15 16:29:25', 'online'),
(120, 'admin', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/103.0.5060.114 Safari/537.36 Edg/103.0.1264.49', 'Windows NT 10', '2022-07-15 16:32:21', 'offline'),
(121, 'admin', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/103.0.5060.114 Safari/537.36 Edg/103.0.1264.49', 'Windows NT 10', '2022-07-15 16:32:47', 'online'),
(122, 'admin', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/103.0.5060.114 Safari/537.36 Edg/103.0.1264.49', 'Windows NT 10', '2022-07-15 16:57:43', 'offline'),
(123, 'petugas', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/103.0.5060.114 Safari/537.36 Edg/103.0.1264.49', 'Windows NT 10', '2022-07-15 16:58:00', 'online'),
(124, 'petugas', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/103.0.5060.114 Safari/537.36 Edg/103.0.1264.49', 'Windows NT 10', '2022-07-15 16:59:08', 'offline'),
(125, 'petugas', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/103.0.5060.114 Safari/537.36 Edg/103.0.1264.49', 'Windows NT 10', '2022-07-15 16:59:56', 'online'),
(126, 'petugas', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/103.0.5060.114 Safari/537.36 Edg/103.0.1264.49', 'Windows NT 10', '2022-07-15 17:01:41', 'offline'),
(127, 'supervisor', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/103.0.5060.114 Safari/537.36 Edg/103.0.1264.49', 'Windows NT 10', '2022-07-15 17:02:26', 'online'),
(128, 'supervisor', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/103.0.5060.114 Safari/537.36 Edg/103.0.1264.49', 'Windows NT 10', '2022-07-15 17:02:32', 'offline'),
(129, 'admin', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/103.0.5060.114 Safari/537.36 Edg/103.0.1264.49', 'Windows NT 10', '2022-07-15 17:02:49', 'online'),
(130, 'admin', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/103.0.5060.114 Safari/537.36 Edg/103.0.1264.49', 'Windows NT 10', '2022-07-15 17:20:30', 'offline'),
(131, 'petugas', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/103.0.5060.114 Safari/537.36 Edg/103.0.1264.49', 'Windows NT 10', '2022-07-15 17:20:39', 'online'),
(132, 'petugas', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/103.0.5060.114 Safari/537.36 Edg/103.0.1264.49', 'Windows NT 10', '2022-07-15 17:20:52', 'offline'),
(133, 'admin', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/103.0.5060.114 Safari/537.36 Edg/103.0.1264.49', 'Windows NT 10', '2022-07-15 17:23:01', 'online'),
(134, 'admin', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/103.0.5060.114 Safari/537.36 Edg/103.0.1264.49', 'Windows NT 10', '2022-07-15 17:23:13', 'offline'),
(135, 'petugas', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/103.0.5060.114 Safari/537.36 Edg/103.0.1264.49', 'Windows NT 10', '2022-07-15 17:23:30', 'online'),
(136, 'petugas', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/103.0.5060.114 Safari/537.36 Edg/103.0.1264.49', 'Windows NT 10', '2022-07-15 17:23:32', 'offline'),
(137, 'admin', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/103.0.5060.114 Safari/537.36 Edg/103.0.1264.49', 'Windows NT 10', '2022-07-15 17:24:02', 'online'),
(138, 'admin', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/103.0.5060.114 Safari/537.36 Edg/103.0.1264.49', 'Windows NT 10', '2022-07-15 17:25:17', 'offline'),
(139, 'admin', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/103.0.5060.114 Safari/537.36 Edg/103.0.1264.49', 'Windows NT 10', '2022-07-15 17:25:34', 'online'),
(140, 'petugas', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/103.0.5060.114 Safari/537.36 Edg/103.0.1264.49', 'Windows NT 10', '2022-07-15 17:32:48', 'online'),
(141, 'admin', 'Mozilla/5.0 (Linux; Android 11; 2201117TY) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/103.0.0.0 Mobile Safari/537.36', '2201117TY', '2022-07-15 17:37:30', 'online'),
(142, 'petugas', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/103.0.5060.114 Safari/537.36 Edg/103.0.1264.49', 'Windows NT 10', '2022-07-15 17:55:19', 'offline'),
(143, 'admin', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/103.0.5060.114 Safari/537.36 Edg/103.0.1264.49', 'Windows NT 10', '2022-07-15 18:54:43', 'online'),
(144, 'admin', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/103.0.5060.114 Safari/537.36 Edg/103.0.1264.49', 'Windows NT 10', '2022-07-15 18:55:39', 'offline'),
(145, 'admin', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/103.0.5060.114 Safari/537.36 Edg/103.0.1264.49', 'Windows NT 10', '2022-07-15 19:05:43', 'online'),
(146, 'admin', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/103.0.5060.114 Safari/537.36 Edg/103.0.1264.49', 'Windows NT 10', '2022-07-15 19:07:35', 'offline'),
(147, 'admin', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/103.0.5060.114 Safari/537.36 Edg/103.0.1264.62', 'Windows NT 10', '2022-07-17 16:27:11', 'online'),
(148, 'admin', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/103.0.5060.114 Safari/537.36 Edg/103.0.1264.62', 'Windows NT 10', '2022-07-17 17:27:15', 'online'),
(149, 'admin', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/103.0.5060.114 Safari/537.36 Edg/103.0.1264.62', 'Windows NT 10', '2022-07-17 17:30:50', 'offline'),
(150, 'admin', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/103.0.5060.114 Safari/537.36 Edg/103.0.1264.62', 'Windows NT 10', '2022-07-17 21:24:10', 'online'),
(151, 'admin', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/103.0.0.0 Safari/537.36', 'Windows NT 10', '2022-07-17 21:38:58', 'online'),
(152, 'admin', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/103.0.0.0 Safari/537.36', 'Windows NT 10', '2022-07-17 21:48:16', 'offline'),
(153, 'supervisor', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/103.0.0.0 Safari/537.36', 'Windows NT 10', '2022-07-17 21:48:46', 'online'),
(154, 'supervisor', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/103.0.0.0 Safari/537.36', 'Windows NT 10', '2022-07-17 21:49:04', 'offline'),
(155, 'admin', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/103.0.5060.114 Safari/537.36 Edg/103.0.1264.62', 'Windows NT 10', '2022-07-17 22:12:06', 'online'),
(156, 'admin', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/103.0.5060.114 Safari/537.36 Edg/103.0.1264.62', 'Windows NT 10', '2022-07-17 22:32:00', 'offline'),
(157, 'admin', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/103.0.5060.114 Safari/537.36 Edg/103.0.1264.62', 'Windows NT 10', '2022-07-17 22:32:25', 'online'),
(158, 'admin', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/103.0.5060.114 Safari/537.36 Edg/103.0.1264.62', 'Windows NT 10', '2022-07-17 22:34:43', 'offline'),
(159, 'petugas', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/103.0.5060.114 Safari/537.36 Edg/103.0.1264.62', 'Windows NT 10', '2022-07-17 22:34:53', 'online'),
(160, 'petugas', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/103.0.5060.114 Safari/537.36 Edg/103.0.1264.62', 'Windows NT 10', '2022-07-17 22:35:00', 'offline'),
(161, 'admin', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/103.0.5060.114 Safari/537.36 Edg/103.0.1264.62', 'Windows NT 10', '2022-07-17 22:35:25', 'online'),
(162, 'admin', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/103.0.5060.114 Safari/537.36 Edg/103.0.1264.62', 'Windows NT 10', '2022-07-17 22:57:06', 'offline'),
(163, 'admin', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/103.0.5060.114 Safari/537.36 Edg/103.0.1264.62', 'Windows NT 10', '2022-07-18 09:10:58', 'online'),
(164, 'admin', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/103.0.5060.114 Safari/537.36 Edg/103.0.1264.62', 'Windows NT 10', '2022-07-18 09:11:37', 'offline'),
(165, 'admin', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/103.0.5060.114 Safari/537.36 Edg/103.0.1264.62', 'Windows NT 10', '2022-07-18 09:19:07', 'online'),
(166, 'admin', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/103.0.5060.114 Safari/537.36 Edg/103.0.1264.62', 'Windows NT 10', '2022-07-18 09:22:23', 'offline'),
(167, 'admin', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/103.0.5060.114 Safari/537.36 Edg/103.0.1264.62', 'Windows NT 10', '2022-07-18 09:25:09', 'online'),
(168, 'admin', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/103.0.5060.114 Safari/537.36 Edg/103.0.1264.62', 'Windows NT 10', '2022-07-18 09:30:04', 'offline'),
(169, 'admin', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/103.0.5060.114 Safari/537.36 Edg/103.0.1264.62', 'Windows NT 10', '2022-07-21 08:08:56', 'online'),
(170, 'admin', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/103.0.5060.114 Safari/537.36 Edg/103.0.1264.62', 'Windows NT 10', '2022-07-21 08:15:15', 'offline'),
(171, 'admin', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/103.0.5060.114 Safari/537.36 Edg/103.0.1264.62', 'Windows NT 10', '2022-07-21 08:16:56', 'online'),
(172, 'admin', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/103.0.5060.114 Safari/537.36 Edg/103.0.1264.62', 'Windows NT 10', '2022-07-21 08:20:00', 'offline'),
(173, 'supervisor', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/103.0.5060.114 Safari/537.36 Edg/103.0.1264.62', 'Windows NT 10', '2022-07-21 08:20:07', 'online'),
(174, 'supervisor', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/103.0.5060.114 Safari/537.36 Edg/103.0.1264.62', 'Windows NT 10', '2022-07-21 08:20:18', 'offline'),
(175, 'admin', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/103.0.5060.114 Safari/537.36 Edg/103.0.1264.62', 'Windows NT 10', '2022-07-21 08:20:21', 'online');

-- --------------------------------------------------------

--
-- Table structure for table `tb_pengguna`
--

CREATE TABLE `tb_pengguna` (
  `id` int(11) NOT NULL,
  `username` varchar(15) NOT NULL,
  `password` varchar(100) NOT NULL,
  `jabatan` enum('admin','supervisor','petugas') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_pengguna`
--

INSERT INTO `tb_pengguna` (`id`, `username`, `password`, `jabatan`) VALUES
(1, 'admin', '21232f297a57a5a743894a0e4a801fc3', 'admin'),
(15, 'supervisor', '09348c20a019be0318387c08df7a783d', 'supervisor');

-- --------------------------------------------------------

--
-- Table structure for table `tb_petugas`
--

CREATE TABLE `tb_petugas` (
  `id_petugas` char(25) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `jk` varchar(25) NOT NULL,
  `telepon` varchar(25) NOT NULL,
  `alamat` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_petugas`
--

INSERT INTO `tb_petugas` (`id_petugas`, `nama`, `jk`, `telepon`, `alamat`) VALUES
('PTG1377', 'MOHAMAD RAYHAN NOERFIKRI', 'Laki-Laki', '0812101082', 'Tangerang'),
('PTG58853', 'MAULANA BHAKTI', 'Laki-Laki', '0812080128', 'Jakarta'),
('PTG76685', 'YOHANNES PETRICK SIANTURI', 'Laki-Laki', '089661945791', 'Tangerang');

-- --------------------------------------------------------

--
-- Table structure for table `tb_supplier`
--

CREATE TABLE `tb_supplier` (
  `id_supplier` char(25) NOT NULL,
  `nama_supplier` varchar(100) DEFAULT NULL,
  `nama_brand` varchar(50) NOT NULL,
  `alamat` text,
  `no_telephone` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_supplier`
--

INSERT INTO `tb_supplier` (`id_supplier`, `nama_supplier`, `nama_brand`, `alamat`, `no_telephone`) VALUES
('SUP16152', 'PT Apple Indonesia', 'Apple', 'World Trade Center II 18th Floor 12920 Jakarta Selatan DKI Jakarta', '02129392015'),
('SUP33715', 'PT Nokia Indonesia', 'Nokia', 'Tangerang', '081256465432'),
('SUP39068', 'PT Realme Indonesia', 'Realme', 'Jl. Jend. Soedirman No.463, Kauman Lama, Purwokerto Lor, Kec. Purwokerto Tim., Kabupaten Banyumas', '42187750034'),
('SUP40459', 'PT Infinix Mobile', 'Infinix', 'Tangcity Mall Lt.LG D-38 Jl. Jendral sudirman Tangerang Banten, Kota Tangerang, Jawa Barat 15117', '081285444428'),
('SUP43991', 'PT Samsung Electronics Indonesia', 'SAMSUNG', 'Jl. Jababeka Raya Blok F. 29 No.31, Harja Mekar, Kec. Cikarang Utara, Kabupaten Bekasi, Jawa Barat 17530\r\n', '02189837115'),
('SUP53322', 'PT Xiaomi Indonesia', 'Xiaomi', 'The Suites Tower, Jakarta Utara', '02187750032'),
('SUP97940', 'PT Oppo Indonesia', 'Oppo', 'Jakarta', '02187750033');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tb_barang`
--
ALTER TABLE `tb_barang`
  ADD PRIMARY KEY (`id_barang`),
  ADD KEY `kd_jenis` (`id_jenis`);

--
-- Indexes for table `tb_device`
--
ALTER TABLE `tb_device`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tb_export`
--
ALTER TABLE `tb_export`
  ADD PRIMARY KEY (`id_export`),
  ADD KEY `id_barang` (`id_barang`),
  ADD KEY `id_petugas` (`id_petugas`);

--
-- Indexes for table `tb_import`
--
ALTER TABLE `tb_import`
  ADD PRIMARY KEY (`id_import`),
  ADD KEY `id_barang` (`id_barang`),
  ADD KEY `id_petugas` (`id_petugas`,`id_supplier`);

--
-- Indexes for table `tb_jenis`
--
ALTER TABLE `tb_jenis`
  ADD PRIMARY KEY (`id_jenis`);

--
-- Indexes for table `tb_login_history`
--
ALTER TABLE `tb_login_history`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tb_pengguna`
--
ALTER TABLE `tb_pengguna`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tb_petugas`
--
ALTER TABLE `tb_petugas`
  ADD PRIMARY KEY (`id_petugas`);

--
-- Indexes for table `tb_supplier`
--
ALTER TABLE `tb_supplier`
  ADD PRIMARY KEY (`id_supplier`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tb_device`
--
ALTER TABLE `tb_device`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=389;

--
-- AUTO_INCREMENT for table `tb_login_history`
--
ALTER TABLE `tb_login_history`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=176;

--
-- AUTO_INCREMENT for table `tb_pengguna`
--
ALTER TABLE `tb_pengguna`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

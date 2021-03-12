-- phpMyAdmin SQL Dump
-- version 4.1.12
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: 27 Nov 2019 pada 15.27
-- Versi Server: 5.6.16
-- PHP Version: 5.5.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `db_siswa`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `daemons`
--

CREATE TABLE IF NOT EXISTS `daemons` (
  `Start` text NOT NULL,
  `Info` text NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Struktur dari tabel `gammu`
--

CREATE TABLE IF NOT EXISTS `gammu` (
  `Version` int(11) NOT NULL DEFAULT '0'
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data untuk tabel `gammu`
--

INSERT INTO `gammu` (`Version`) VALUES
(11),
(11),
(11),
(11),
(11),
(11),
(11),
(11),
(11),
(11),
(11),
(11);

-- --------------------------------------------------------

--
-- Struktur dari tabel `inbox`
--

CREATE TABLE IF NOT EXISTS `inbox` (
  `UpdatedInDB` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `ReceivingDateTime` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `Text` text NOT NULL,
  `SenderNumber` varchar(20) NOT NULL DEFAULT '',
  `Coding` enum('Default_No_Compression','Unicode_No_Compression','8bit','Default_Compression','Unicode_Compression') NOT NULL DEFAULT 'Default_No_Compression',
  `UDH` text NOT NULL,
  `SMSCNumber` varchar(20) NOT NULL DEFAULT '',
  `Class` int(11) NOT NULL DEFAULT '-1',
  `TextDecoded` text NOT NULL,
  `ID` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `RecipientID` text NOT NULL,
  `Processed` enum('false','true') NOT NULL DEFAULT 'false',
  PRIMARY KEY (`ID`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=312 ;

--
-- Dumping data untuk tabel `inbox`
--

INSERT INTO `inbox` (`UpdatedInDB`, `ReceivingDateTime`, `Text`, `SenderNumber`, `Coding`, `UDH`, `SMSCNumber`, `Class`, `TextDecoded`, `ID`, `RecipientID`, `Processed`) VALUES
('2019-09-12 08:40:15', '2019-09-12 08:39:51', '00680078006B00670066006800630062', '+6285389653910', 'Default_No_Compression', '', '+6281100000', -1, 'hxkgfhcb', 311, 'LayananSMS', 'true'),
('2019-09-12 08:37:05', '2019-09-12 08:35:47', '00500045004C00230031003500300032', '+6285389653910', 'Default_No_Compression', '', '+6281100000', -1, 'PEL#1502', 310, 'LayananSMS', 'true'),
('2019-09-12 08:34:36', '2019-09-12 08:34:20', '004B006900720069006D002000740065007200750073002000680069006E00670067006100200031003100200053004D0053002000620065007200620061007900610072002000640061006E002000640061007000610074006B0061006E0020006800610072006700610020007300700065007300690061006C002000730065006E0069006C00610069002000520070002000320035002000700065007200200053004D005300200075006E00740075006B00200033003000200053004D005300200062006500720069006B00750074006E00790061002E', 'TELKOMSEL', 'Default_No_Compression', '', '+62811078801', 1, 'Kirim terus hingga 11 SMS berbayar dan dapatkan harga spesial senilai Rp 25 per SMS untuk 30 SMS berikutnya.', 309, 'LayananSMS', 'true'),
('2019-09-12 08:32:11', '2019-09-12 08:31:52', '00500045004C00230031003500300032', '+6285389653910', 'Default_No_Compression', '', '+6281100000', -1, 'PEL#1502', 308, 'LayananSMS', 'true'),
('2019-09-07 06:56:58', '2019-09-07 06:53:51', '004B006900720069006D002000740065007200750073002000680069006E00670067006100200031003100200053004D0053002000620065007200620061007900610072002000640061006E002000640061007000610074006B0061006E0020006800610072006700610020007300700065007300690061006C002000730065006E0069006C00610069002000520070002000320035002000700065007200200053004D005300200075006E00740075006B00200033003000200053004D005300200062006500720069006B00750074006E00790061002E', 'TELKOMSEL', 'Default_No_Compression', '', '+6281107909', -1, 'Kirim terus hingga 11 SMS berbayar dan dapatkan harga spesial senilai Rp 25 per SMS untuk 30 SMS berikutnya.', 297, 'LayananSMS', 'true'),
('2019-09-07 06:56:58', '2019-09-07 06:56:42', '00500045004C0023003300320035003200340035', '+6282352114021', 'Default_No_Compression', '', '+6281100000', -1, 'PEL#325245', 298, 'LayananSMS', 'true'),
('2019-09-12 08:31:19', '2019-09-12 06:12:06', '00500065006C0061006E006700670061006E0020003000380032003300350032003100310034003000320031002C0020004800610072006900200049006E00690020004B0061006D00750020004400610070006100740020002B00310030003000300020004B006F0069006E002000500075006C0073006100200026002000500061006B00650074002000430068006100740020005300650070007500610073006E007900610020006C0068006F002E0020004B006F0071002000420065006C0075006D0020004400690061006D00620069006C003F00200048007500620020002A0035003000300020002A0034003200200023002000640061006E002000500069006C0069006800200031002E0020004200690073006100200042007500610074002000540075006B00610072002000500075006C007300610021', '+6285216045816', 'Default_No_Compression', '', '+6281100501', -1, 'Pelanggan 082352114021, Hari Ini Kamu Dapat +1000 Koin Pulsa & Paket Chat Sepuasnya lho. Koq Belum Diambil? Hub *500 *42 # dan Pilih 1. Bisa Buat Tukar Pulsa!', 307, 'LayananSMS', 'true'),
('2019-09-07 07:02:49', '2019-09-07 07:02:33', '00500045004C0023003300320035003200340035', '+6282352114021', 'Default_No_Compression', '', '+6281100000', -1, 'PEL#325245', 302, 'LayananSMS', 'true'),
('2019-09-07 07:05:34', '2019-09-07 07:05:16', '00500045004C0023003900310037003400360039003100330036', '+6282352114021', 'Default_No_Compression', '', '+6281100000', -1, 'PEL#917469136', 303, 'LayananSMS', 'true'),
('2019-09-07 07:14:10', '2019-09-07 07:13:50', '0050005200450023003900310037003400360039003100330036', '+6285389653910', 'Default_No_Compression', '', '+6281100000', -1, 'PRE#917469136', 304, 'LayananSMS', 'true'),
('2019-09-07 07:14:41', '2019-09-07 07:14:15', '00500052004500530023003900310037003400360039003100330036', '+6285389653910', 'Default_No_Compression', '', '+6281100000', -1, 'PRES#917469136', 305, 'LayananSMS', 'true'),
('2019-09-07 07:14:41', '2019-09-07 07:14:30', '00500045004C0023003900310037003400360039003100330036', '+6285389653910', 'Default_No_Compression', '', '+6281100000', -1, 'PEL#917469136', 306, 'LayananSMS', 'true');

-- --------------------------------------------------------

--
-- Struktur dari tabel `outbox`
--

CREATE TABLE IF NOT EXISTS `outbox` (
  `UpdatedInDB` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `InsertIntoDB` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `SendingDateTime` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `Text` text,
  `DestinationNumber` varchar(20) NOT NULL DEFAULT '',
  `Coding` enum('Default_No_Compression','Unicode_No_Compression','8bit','Default_Compression','Unicode_Compression') NOT NULL DEFAULT 'Default_No_Compression',
  `UDH` text,
  `Class` int(11) DEFAULT '-1',
  `TextDecoded` text NOT NULL,
  `ID` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `MultiPart` enum('false','true') DEFAULT 'false',
  `RelativeValidity` int(11) DEFAULT '-1',
  `SenderID` varchar(255) DEFAULT NULL,
  `SendingTimeOut` timestamp NULL DEFAULT '0000-00-00 00:00:00',
  `DeliveryReport` enum('default','yes','no') DEFAULT 'default',
  `CreatorID` text NOT NULL,
  PRIMARY KEY (`ID`),
  KEY `outbox_date` (`SendingDateTime`,`SendingTimeOut`),
  KEY `outbox_sender` (`SenderID`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=816 ;

-- --------------------------------------------------------

--
-- Struktur dari tabel `outbox_multipart`
--

CREATE TABLE IF NOT EXISTS `outbox_multipart` (
  `Text` text,
  `Coding` enum('Default_No_Compression','Unicode_No_Compression','8bit','Default_Compression','Unicode_Compression') NOT NULL DEFAULT 'Default_No_Compression',
  `UDH` text,
  `Class` int(11) DEFAULT '-1',
  `TextDecoded` text,
  `ID` int(10) unsigned NOT NULL DEFAULT '0',
  `SequencePosition` int(11) NOT NULL DEFAULT '1',
  PRIMARY KEY (`ID`,`SequencePosition`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Struktur dari tabel `pbk`
--

CREATE TABLE IF NOT EXISTS `pbk` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `GroupID` int(11) NOT NULL DEFAULT '-1',
  `Name` text NOT NULL,
  `Number` text NOT NULL,
  PRIMARY KEY (`ID`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Struktur dari tabel `pbk_groups`
--

CREATE TABLE IF NOT EXISTS `pbk_groups` (
  `Name` text NOT NULL,
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  PRIMARY KEY (`ID`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Struktur dari tabel `phones`
--

CREATE TABLE IF NOT EXISTS `phones` (
  `ID` text NOT NULL,
  `UpdatedInDB` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `InsertIntoDB` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `TimeOut` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `Send` enum('yes','no') NOT NULL DEFAULT 'no',
  `Receive` enum('yes','no') NOT NULL DEFAULT 'no',
  `IMEI` varchar(35) NOT NULL,
  `Client` text NOT NULL,
  `Battery` int(11) NOT NULL DEFAULT '0',
  `Signal` int(11) NOT NULL DEFAULT '0',
  `Sent` int(11) NOT NULL DEFAULT '0',
  `Received` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`IMEI`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data untuk tabel `phones`
--

INSERT INTO `phones` (`ID`, `UpdatedInDB`, `InsertIntoDB`, `TimeOut`, `Send`, `Receive`, `IMEI`, `Client`, `Battery`, `Signal`, `Sent`, `Received`) VALUES
('LayananSMS', '2019-09-12 08:52:15', '2019-09-12 08:31:18', '2019-09-12 08:52:25', 'yes', 'yes', '012345678901234', 'Gammu 1.28.90, Windows Server 2007, GCC 4.4, MinGW 3.13', 0, 100, 5, 5);

-- --------------------------------------------------------

--
-- Struktur dari tabel `sentitems`
--

CREATE TABLE IF NOT EXISTS `sentitems` (
  `UpdatedInDB` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `InsertIntoDB` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `SendingDateTime` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `DeliveryDateTime` timestamp NULL DEFAULT NULL,
  `Text` text NOT NULL,
  `DestinationNumber` varchar(20) NOT NULL DEFAULT '',
  `Coding` enum('Default_No_Compression','Unicode_No_Compression','8bit','Default_Compression','Unicode_Compression') NOT NULL DEFAULT 'Default_No_Compression',
  `UDH` text NOT NULL,
  `SMSCNumber` varchar(20) NOT NULL DEFAULT '',
  `Class` int(11) NOT NULL DEFAULT '-1',
  `TextDecoded` text NOT NULL,
  `ID` int(10) unsigned NOT NULL DEFAULT '0',
  `SenderID` varchar(255) NOT NULL,
  `SequencePosition` int(11) NOT NULL DEFAULT '1',
  `Status` enum('SendingOK','SendingOKNoReport','SendingError','DeliveryOK','DeliveryFailed','DeliveryPending','DeliveryUnknown','Error') NOT NULL DEFAULT 'SendingOK',
  `StatusError` int(11) NOT NULL DEFAULT '-1',
  `TPMR` int(11) NOT NULL DEFAULT '-1',
  `RelativeValidity` int(11) NOT NULL DEFAULT '-1',
  `CreatorID` text NOT NULL,
  PRIMARY KEY (`ID`,`SequencePosition`),
  KEY `sentitems_date` (`DeliveryDateTime`),
  KEY `sentitems_tpmr` (`TPMR`),
  KEY `sentitems_dest` (`DestinationNumber`),
  KEY `sentitems_sender` (`SenderID`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data untuk tabel `sentitems`
--

INSERT INTO `sentitems` (`UpdatedInDB`, `InsertIntoDB`, `SendingDateTime`, `DeliveryDateTime`, `Text`, `DestinationNumber`, `Coding`, `UDH`, `SMSCNumber`, `Class`, `TextDecoded`, `ID`, `SenderID`, `SequencePosition`, `Status`, `StatusError`, `TPMR`, `RelativeValidity`, `CreatorID`) VALUES
('2019-09-12 08:40:45', '0000-00-00 00:00:00', '2019-09-12 08:40:45', NULL, '004D00610061006600200050006500720069006E007400610068002000530061006C00610068', '+6285389653910', 'Default_No_Compression', '', '+6281100000', -1, 'Maaf Perintah Salah', 815, 'LayananSMS', 1, 'SendingOKNoReport', -1, 201, 255, ''),
('2019-09-12 08:37:40', '0000-00-00 00:00:00', '2019-09-12 08:37:40', NULL, '004E006900730020003A002000310035003000320020007C00200020004E0061006D00610020003A0020004D005500480041004D004D00410044002000460041004C00410048002000520041005A004100510020004E0020007C002000500065006C0061006E00670067006100720061006E0020003A0020005000650072006B0065006C0061006800690061006E0020007C00200050006F0069006E0020003A002000310030007C002000540067006C002000500065006C0061006E0067006700720061006E0020003A00200032003000310039002D00300039002D003000350020007C002000540069006E00640061006B0061006E0020003A00200053006B006F00720020003300200048006100720069', '+6285389653910', 'Default_No_Compression', '', '+6281100000', -1, 'Nis : 1502 |  Nama : MUHAMMAD FALAH RAZAQ N | Pelanggaran : Perkelahian | Poin : 10| Tgl Pelanggran : 2019-09-05 | Tindakan : Skor 3 Hari', 814, 'LayananSMS', 1, 'SendingError', -1, -1, 255, ''),
('2019-09-12 08:35:04', '0000-00-00 00:00:00', '2019-09-12 08:35:04', NULL, '004D00610061006600200050006500720069006E007400610068002000530061006C00610068', 'TELKOMSEL', 'Default_No_Compression', '', '+6281100000', -1, 'Maaf Perintah Salah', 813, 'LayananSMS', 1, 'SendingError', -1, -1, 255, ''),
('2019-09-07 06:57:43', '0000-00-00 00:00:00', '2019-09-07 06:57:43', NULL, '004D00610061006600200050006500720069006E007400610068002000530061006C00610068', '+6282352114021', 'Default_No_Compression', '', '+6281100000', -1, 'Maaf Perintah Salah', 801, 'LayananSMS', 1, 'SendingOKNoReport', -1, 195, 255, ''),
('2019-09-07 06:58:17', '0000-00-00 00:00:00', '2019-09-07 06:58:17', NULL, '004D00610061006600200050006500720069006E007400610068002000530061006C00610068', '+6282352114021', 'Default_No_Compression', '', '+6281100000', -1, 'Maaf Perintah Salah', 802, 'LayananSMS', 1, 'SendingOKNoReport', -1, 196, 255, ''),
('2019-09-07 06:59:03', '0000-00-00 00:00:00', '2019-09-07 06:59:03', NULL, '004D00610061006600200050006500720069006E007400610068002000530061006C00610068', '+6282352114021', 'Default_No_Compression', '', '+6281100000', -1, 'Maaf Perintah Salah', 803, 'LayananSMS', 1, 'SendingError', -1, -1, 255, ''),
('2019-09-12 08:32:30', '0000-00-00 00:00:00', '2019-09-12 08:32:30', NULL, '004E006900730020003A002000310035003000320020007C00200020004E0061006D00610020003A0020004D005500480041004D004D00410044002000460041004C00410048002000520041005A004100510020004E0020007C002000500065006C0061006E00670067006100720061006E0020003A0020005000650072006B0065006C0061006800690061006E0020007C002000540067006C002000500065006C0061006E0067006700720061006E0020003A00200032003000310039002D00300039002D003000350020007C0020004B006500740020003A00200053006B006F00720020003300200048006100720069', '+6285389653910', 'Default_No_Compression', '', '+6281100000', -1, 'Nis : 1502 |  Nama : MUHAMMAD FALAH RAZAQ N | Pelanggaran : Perkelahian | Tgl Pelanggran : 2019-09-05 | Ket : Skor 3 Hari', 812, 'LayananSMS', 1, 'SendingOKNoReport', -1, 200, 255, ''),
('2019-09-07 07:03:18', '0000-00-00 00:00:00', '2019-09-07 07:03:18', NULL, '004400610074006100200054006900640061006B00200044006900740065006D0075006B0061006E', '+6282352114021', 'Default_No_Compression', '', '+6281100000', -1, 'Data Tidak Ditemukan', 805, 'LayananSMS', 1, 'SendingError', -1, -1, 255, ''),
('2019-09-12 08:31:25', '0000-00-00 00:00:00', '2019-09-12 08:31:25', NULL, '004D00610061006600200050006500720069006E007400610068002000530061006C00610068', '+6285216045816', 'Default_No_Compression', '', '+6281100000', -1, 'Maaf Perintah Salah', 811, 'LayananSMS', 1, 'SendingError', -1, -1, 255, ''),
('2019-09-07 07:06:00', '0000-00-00 00:00:00', '2019-09-07 07:06:00', NULL, '004E006900730020003A00200039003100370034003600390031003300360020007C00200020004E0061006D00610020003A0020004D00610069006D0075006E0061006800670020007C002000500065006C0061006E00670067006100720061006E0020003A0020006D006500730075006D0020007C002000540067006C002000500065006C0061006E0067006700720061006E0020003A00200032003000310039002D00300038002D003100320020007C0020004B006500740020003A002000540061006E007000610020004B00650074006500720061006E00670061006E0020000D000A', '+6282352114021', 'Default_No_Compression', '', '+6281100000', -1, 'Nis : 917469136 |  Nama : Maimunahg | Pelanggaran : mesum | Tgl Pelanggran : 2019-08-12 | Ket : Tanpa Keterangan \r\n', 807, 'LayananSMS', 1, 'SendingError', -1, -1, 255, ''),
('2019-09-07 07:14:35', '0000-00-00 00:00:00', '2019-09-07 07:14:35', NULL, '004E006900730020003A00200039003100370034003600390031003300360020007C00200020004E0061006D00610020003A0020004D00610069006D0075006E0061006800670020007C002000500072006500730065006E007300690020003A00200020007C002000540067006C002000500072006500730065006E007300690020003A00200020007C0020004B006500740020003A002000540061006E007000610020004B00650074006500720061006E00670061006E002000200020', '+6285389653910', 'Default_No_Compression', '', '+6281100000', -1, 'Nis : 917469136 |  Nama : Maimunahg | Presensi :  | Tgl Presensi :  | Ket : Tanpa Keterangan   ', 808, 'LayananSMS', 1, 'SendingOKNoReport', -1, 199, 255, ''),
('2019-09-07 07:15:13', '0000-00-00 00:00:00', '2019-09-07 07:15:13', NULL, '004E006900730020003A00200039003100370034003600390031003300360020007C00200020004E0061006D00610020003A0020004D00610069006D0075006E0061006800670020007C002000500065006C0061006E00670067006100720061006E0020003A0020006D006500730075006D0020007C002000540067006C002000500065006C0061006E0067006700720061006E0020003A00200032003000310039002D00300038002D003100320020007C0020004B006500740020003A002000540061006E007000610020004B00650074006500720061006E00670061006E0020000D000A', '+6285389653910', 'Default_No_Compression', '', '+6281100000', -1, 'Nis : 917469136 |  Nama : Maimunahg | Pelanggaran : mesum | Tgl Pelanggran : 2019-08-12 | Ket : Tanpa Keterangan \r\n', 810, 'LayananSMS', 1, 'SendingError', -1, -1, 255, ''),
('2019-09-07 07:15:28', '0000-00-00 00:00:00', '2019-09-07 07:15:28', NULL, '004E006900730020003A00200039003100370034003600390031003300360020007C00200020004E0061006D00610020003A0020004D00610069006D0075006E0061006800670020007C002000500072006500740061007300690020003A0020004A0075006100720061002000310020007C002000540067006C0020005000720065007300740061007300690020003A00200032003000310039002D00300038002D003200360020007C0020004B006500740020003A002000540061006E007000610020004B00650074006500720061006E00670061006E00200020007A00610061', '+6285389653910', 'Default_No_Compression', '', '+6281100000', -1, 'Nis : 917469136 |  Nama : Maimunahg | Pretasi : Juara 1 | Tgl Prestasi : 2019-08-26 | Ket : Tanpa Keterangan  zaa', 809, 'LayananSMS', 1, 'SendingError', -1, -1, 255, '');

-- --------------------------------------------------------

--
-- Struktur dari tabel `t_admin`
--

CREATE TABLE IF NOT EXISTS `t_admin` (
  `kd_admin` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  PRIMARY KEY (`kd_admin`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data untuk tabel `t_admin`
--

INSERT INTO `t_admin` (`kd_admin`, `username`, `password`) VALUES
(1, 'admin', '21232f297a57a5a743894a0e4a801fc3');

-- --------------------------------------------------------

--
-- Struktur dari tabel `t_guru`
--

CREATE TABLE IF NOT EXISTS `t_guru` (
  `id_nik` int(18) NOT NULL,
  `namag` varchar(50) NOT NULL,
  `jk` enum('Laki-Laki','Perempuan') NOT NULL,
  `tgl_lahir` date NOT NULL,
  `alamat` text NOT NULL,
  `no_hp` varchar(50) NOT NULL,
  `kd_guru` int(11) NOT NULL AUTO_INCREMENT,
  PRIMARY KEY (`kd_guru`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data untuk tabel `t_guru`
--

INSERT INTO `t_guru` (`id_nik`, `namag`, `jk`, `tgl_lahir`, `alamat`, `no_hp`, `kd_guru`) VALUES
(2147483647, 'Sulaiman', 'Laki-Laki', '1991-09-18', ' Banjarbaru adsda        ', '0829121223', 1);

-- --------------------------------------------------------

--
-- Struktur dari tabel `t_jurusan`
--

CREATE TABLE IF NOT EXISTS `t_jurusan` (
  `kd_jurusan` int(11) NOT NULL AUTO_INCREMENT,
  `namajur` varchar(50) NOT NULL,
  PRIMARY KEY (`kd_jurusan`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=7 ;

--
-- Dumping data untuk tabel `t_jurusan`
--

INSERT INTO `t_jurusan` (`kd_jurusan`, `namajur`) VALUES
(3, 'Teknik Kendaraan Ringan'),
(4, 'Tehnik Sepeda Motor'),
(5, 'Teknik Permesinan'),
(6, 'Keperawatan');

-- --------------------------------------------------------

--
-- Struktur dari tabel `t_kelas`
--

CREATE TABLE IF NOT EXISTS `t_kelas` (
  `kd_kelas` int(11) NOT NULL AUTO_INCREMENT,
  `namak` varchar(11) NOT NULL,
  `jnsk` varchar(11) NOT NULL,
  `kd_jurusan` int(11) NOT NULL,
  PRIMARY KEY (`kd_kelas`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=18 ;

--
-- Dumping data untuk tabel `t_kelas`
--

INSERT INTO `t_kelas` (`kd_kelas`, `namak`, `jnsk`, `kd_jurusan`) VALUES
(5, 'X', 'TKR', 3),
(7, 'XI', 'TKR', 3),
(8, 'XII', 'TKR', 3),
(9, 'X', 'TSM', 4),
(10, 'XI', 'TSM', 4),
(11, 'XII', 'TSM', 4),
(12, 'X', 'KPR', 6),
(13, 'XI', 'KPR', 6),
(14, 'XII', 'KPR', 6),
(15, 'X', 'TPN', 5),
(16, 'XI', 'TPN', 5),
(17, 'XII', 'TPN', 5);

-- --------------------------------------------------------

--
-- Struktur dari tabel `t_pelanggaran`
--

CREATE TABLE IF NOT EXISTS `t_pelanggaran` (
  `kd_pel` int(11) NOT NULL AUTO_INCREMENT,
  `nama_pel` varchar(50) NOT NULL,
  `poin` varchar(3) NOT NULL,
  PRIMARY KEY (`kd_pel`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=7 ;

--
-- Dumping data untuk tabel `t_pelanggaran`
--

INSERT INTO `t_pelanggaran` (`kd_pel`, `nama_pel`, `poin`) VALUES
(3, 'Pergaulan', '10'),
(4, 'Perkelahian', '10'),
(5, 'Merokok', '10'),
(6, 'Membolos', '10');

-- --------------------------------------------------------

--
-- Struktur dari tabel `t_presensi`
--

CREATE TABLE IF NOT EXISTS `t_presensi` (
  `kd_pre` int(11) NOT NULL AUTO_INCREMENT,
  `jenis_pre` varchar(50) NOT NULL,
  PRIMARY KEY (`kd_pre`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=7 ;

--
-- Dumping data untuk tabel `t_presensi`
--

INSERT INTO `t_presensi` (`kd_pre`, `jenis_pre`) VALUES
(4, 'Alfa'),
(5, 'Izin'),
(6, 'Sakit');

-- --------------------------------------------------------

--
-- Struktur dari tabel `t_prestasi`
--

CREATE TABLE IF NOT EXISTS `t_prestasi` (
  `kd_pres` int(11) NOT NULL AUTO_INCREMENT,
  `nama_pres` varchar(50) NOT NULL,
  PRIMARY KEY (`kd_pres`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=9 ;

--
-- Dumping data untuk tabel `t_prestasi`
--

INSERT INTO `t_prestasi` (`kd_pres`, `nama_pres`) VALUES
(3, 'Futsal'),
(4, 'Basket'),
(5, 'Badminton'),
(8, 'Voli');

-- --------------------------------------------------------

--
-- Struktur dari tabel `t_prskls`
--

CREATE TABLE IF NOT EXISTS `t_prskls` (
  `kd_prskls` int(11) NOT NULL AUTO_INCREMENT,
  `id_nis` int(50) NOT NULL,
  `id_nik` int(50) NOT NULL,
  `kd_kelas` int(11) NOT NULL,
  `kd_jurusan` int(11) NOT NULL,
  PRIMARY KEY (`kd_prskls`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=12 ;

--
-- Dumping data untuk tabel `t_prskls`
--

INSERT INTO `t_prskls` (`kd_prskls`, `id_nis`, `id_nik`, `kd_kelas`, `kd_jurusan`) VALUES
(11, 1502223432, 2147483647, 5, 3);

-- --------------------------------------------------------

--
-- Struktur dari tabel `t_prspel`
--

CREATE TABLE IF NOT EXISTS `t_prspel` (
  `kd_prspel` int(11) NOT NULL AUTO_INCREMENT,
  `id_nis` int(50) NOT NULL,
  `kd_pel` int(11) NOT NULL,
  `tgl_prspel` date NOT NULL,
  `ket` text NOT NULL,
  PRIMARY KEY (`kd_prspel`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=7 ;

--
-- Dumping data untuk tabel `t_prspel`
--

INSERT INTO `t_prspel` (`kd_prspel`, `id_nis`, `kd_pel`, `tgl_prspel`, `ket`) VALUES
(5, 1503, 4, '2019-09-05', 'Skor 3 Hari');

-- --------------------------------------------------------

--
-- Struktur dari tabel `t_prspresen`
--

CREATE TABLE IF NOT EXISTS `t_prspresen` (
  `kd_prspresen` int(11) NOT NULL AUTO_INCREMENT,
  `kd_pre` int(11) NOT NULL,
  `tgl_prspresen` date NOT NULL,
  `ket` text NOT NULL,
  `id_nis` int(11) NOT NULL,
  PRIMARY KEY (`kd_prspresen`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=6 ;

--
-- Dumping data untuk tabel `t_prspresen`
--

INSERT INTO `t_prspresen` (`kd_prspresen`, `kd_pre`, `tgl_prspresen`, `ket`, `id_nis`) VALUES
(5, 4, '2019-11-14', 'Tanpa Keterangan', 1502);

-- --------------------------------------------------------

--
-- Struktur dari tabel `t_prspretas`
--

CREATE TABLE IF NOT EXISTS `t_prspretas` (
  `kd_prspretas` int(11) NOT NULL AUTO_INCREMENT,
  `id_nis` int(50) NOT NULL,
  `kd_pres` int(111) NOT NULL,
  `tgl_prspretas` date NOT NULL,
  `ket` text NOT NULL,
  PRIMARY KEY (`kd_prspretas`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

--
-- Dumping data untuk tabel `t_prspretas`
--

INSERT INTO `t_prspretas` (`kd_prspretas`, `id_nis`, `kd_pres`, `tgl_prspretas`, `ket`) VALUES
(4, 1502, 3, '2019-09-06', 'Juara 3');

-- --------------------------------------------------------

--
-- Struktur dari tabel `t_siswa`
--

CREATE TABLE IF NOT EXISTS `t_siswa` (
  `id_nis` int(11) NOT NULL,
  `namas` varchar(100) NOT NULL,
  `jk` enum('Laki-Laki','Perempuan') NOT NULL,
  `tgl_lahir` date NOT NULL,
  `alamat` text NOT NULL,
  `no_ortu` varchar(50) NOT NULL,
  `kd_siswa` int(11) NOT NULL AUTO_INCREMENT,
  PRIMARY KEY (`kd_siswa`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=11 ;

--
-- Dumping data untuk tabel `t_siswa`
--

INSERT INTO `t_siswa` (`id_nis`, `namas`, `jk`, `tgl_lahir`, `alamat`, `no_ortu`, `kd_siswa`) VALUES
(1502223432, 'MUHAMMAD FALAH RAZAQ ', 'Laki-Laki', '2001-02-12', ' Matapura   ', '08783174834', 1),
(1503, 'RAHMAN FIKRI HAKIKAL', 'Laki-Laki', '2001-01-31', ' Matapura', '08771665209', 2),
(1504, 'SALMA SALSABILLA PUTRI Y', 'Perempuan', '2001-09-19', ' Banjarbaru', '081516785624', 3),
(1505, 'TEDDY NOVIANDI F', 'Laki-Laki', '2002-07-06', ' Matapura', '08771665207', 4),
(1506, 'WAHYU RAMADHAN', 'Laki-Laki', '2001-07-04', ' Matapura', '085389653910', 5),
(1507, 'YUDITTIRA GUNAWAN PUTRA', 'Laki-Laki', '2000-11-09', ' Matapura', '0853647892', 6),
(1508, 'YAHYA AYYAS PRATAMA', 'Perempuan', '2001-09-18', ' Matapura', '087716665298', 7),
(1509, 'RIDO ARFANDI', 'Laki-Laki', '2001-09-05', ' Banjarbaru', '085389653920', 8),
(1510, 'RYANDI KURNIAWAN', 'Laki-Laki', '2002-09-17', ' Banjarmasin', '086756489710', 9),
(1511, 'SYARIFUL HIDAYAH', 'Laki-Laki', '2000-01-04', 'Banjarbaru ', '089916527678', 10);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

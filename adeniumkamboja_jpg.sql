-- phpMyAdmin SQL Dump
-- version 2.10.2
-- http://www.phpmyadmin.net
-- 
-- Host: localhost
-- Generation Time: Jul 02, 2010 at 12:57 AM
-- Server version: 5.0.45
-- PHP Version: 5.2.3

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";

-- 
-- Database: `kamboja_jpg`
-- 

-- --------------------------------------------------------

-- 
-- Table structure for table `buku_tamu`
-- 

CREATE TABLE `buku_tamu` (
  `id_bk_tamu` int(11) NOT NULL auto_increment,
  `nama` varchar(30) NOT NULL,
  `email` varchar(30) NOT NULL,
  `komentar` text NOT NULL,
  PRIMARY KEY  (`id_bk_tamu`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- 
-- Dumping data for table `buku_tamu`
-- 


-- --------------------------------------------------------

-- 
-- Table structure for table `ciri_batang`
-- 

CREATE TABLE `ciri_batang` (
  `id_cr_batang` int(11) NOT NULL default '0',
  `nm_cr_batang` text NOT NULL,
  PRIMARY KEY  (`id_cr_batang`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- 
-- Dumping data for table `ciri_batang`
-- 

INSERT INTO `ciri_batang` VALUES (1, 'tidak ada ciri pada batang');
INSERT INTO `ciri_batang` VALUES (2, 'pendek');
INSERT INTO `ciri_batang` VALUES (3, 'panjang');

-- --------------------------------------------------------

-- 
-- Table structure for table `ciri_bonggol`
-- 

CREATE TABLE `ciri_bonggol` (
  `id_cr_bonggol` int(11) NOT NULL default '0',
  `nm_cr_bonggol` text NOT NULL,
  PRIMARY KEY  (`id_cr_bonggol`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- 
-- Dumping data for table `ciri_bonggol`
-- 

INSERT INTO `ciri_bonggol` VALUES (1, 'tidak ada ciri pada bonggol');
INSERT INTO `ciri_bonggol` VALUES (2, 'besar (2,5 meter)');

-- --------------------------------------------------------

-- 
-- Table structure for table `ciri_bunga`
-- 

CREATE TABLE `ciri_bunga` (
  `id_cr_bunga` int(11) NOT NULL default '0',
  `nm_cr_bunga` text NOT NULL,
  PRIMARY KEY  (`id_cr_bunga`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- 
-- Dumping data for table `ciri_bunga`
-- 

INSERT INTO `ciri_bunga` VALUES (1, 'tidak ada ciri pada bunga');
INSERT INTO `ciri_bunga` VALUES (2, 'diameter 5 cm');
INSERT INTO `ciri_bunga` VALUES (3, 'diameter 6 cm');
INSERT INTO `ciri_bunga` VALUES (4, 'diameter 7 cm');
INSERT INTO `ciri_bunga` VALUES (5, 'diameter 11 cm');
INSERT INTO `ciri_bunga` VALUES (6, 'diameter 4 cm');
INSERT INTO `ciri_bunga` VALUES (7, 'berwarna merah pucat');
INSERT INTO `ciri_bunga` VALUES (8, 'berwarna merah tua');
INSERT INTO `ciri_bunga` VALUES (9, 'berwarna putih dengan tepi merah');
INSERT INTO `ciri_bunga` VALUES (10, 'berbentuk seperti bintang');
INSERT INTO `ciri_bunga` VALUES (11, 'berwarna merah muda');
INSERT INTO `ciri_bunga` VALUES (12, 'warna putih dengan tepi berwarna merah muda');

-- --------------------------------------------------------

-- 
-- Table structure for table `ciri_daun`
-- 

CREATE TABLE `ciri_daun` (
  `id_cr_daun` int(11) NOT NULL default '0',
  `nm_cr_daun` text NOT NULL,
  `gbr_cr_daun` varchar(33) NOT NULL default '',
  PRIMARY KEY  (`id_cr_daun`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- 
-- Dumping data for table `ciri_daun`
-- 

INSERT INTO `ciri_daun` VALUES (1, 'tidak memilih', 'cr_daun_kosong');
INSERT INTO `ciri_daun` VALUES (2, 'warna hijau cerah', 'cr_daun_hj_cerah');
INSERT INTO `ciri_daun` VALUES (3, 'warna hijau tua', 'cr_daun_hj_tua');
INSERT INTO `ciri_daun` VALUES (4, 'daun besar dan lebar', 'cr_daun_lbr_bsr');
INSERT INTO `ciri_daun` VALUES (5, 'daun paling lebar', 'cr_daun_plg_lebar');
INSERT INTO `ciri_daun` VALUES (6, 'urat daun putih menonjol', 'cr_daun_menonjol');
INSERT INTO `ciri_daun` VALUES (7, 'memanjang dan membulat diujungnya', 'cr_daun_mblt');

-- --------------------------------------------------------

-- 
-- Table structure for table `ciri_ms_istirahat`
-- 

CREATE TABLE `ciri_ms_istirahat` (
  `id_ms_istirahat` int(11) NOT NULL default '0',
  `nm_ms_istirahat` text NOT NULL,
  PRIMARY KEY  (`id_ms_istirahat`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- 
-- Dumping data for table `ciri_ms_istirahat`
-- 

INSERT INTO `ciri_ms_istirahat` VALUES (1, 'tidak memilih');
INSERT INTO `ciri_ms_istirahat` VALUES (2, 'panjang (selama musim dingin)');

-- --------------------------------------------------------

-- 
-- Table structure for table `gejala_akar`
-- 

CREATE TABLE `gejala_akar` (
  `id_gjl_akar` int(11) NOT NULL default '0',
  `nm_gjl_akar` text NOT NULL,
  PRIMARY KEY  (`id_gjl_akar`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- 
-- Dumping data for table `gejala_akar`
-- 

INSERT INTO `gejala_akar` VALUES (1, 'tidak memilih');
INSERT INTO `gejala_akar` VALUES (2, 'akar membusuk');
INSERT INTO `gejala_akar` VALUES (3, 'qwe');

-- --------------------------------------------------------

-- 
-- Table structure for table `gejala_batang`
-- 

CREATE TABLE `gejala_batang` (
  `id_gjl_batang` int(11) NOT NULL default '0',
  `nm_gjl_batang` text NOT NULL,
  PRIMARY KEY  (`id_gjl_batang`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- 
-- Dumping data for table `gejala_batang`
-- 

INSERT INTO `gejala_batang` VALUES (1, 'tidak memilih');
INSERT INTO `gejala_batang` VALUES (2, 'pertumbuhan batang terhambat');

-- --------------------------------------------------------

-- 
-- Table structure for table `gejala_bunga`
-- 

CREATE TABLE `gejala_bunga` (
  `id_gjl_bunga` int(11) NOT NULL default '0',
  `nm_gjl_bunga` text NOT NULL,
  `gbr_gjl_bunga` varchar(33) NOT NULL default '',
  PRIMARY KEY  (`id_gjl_bunga`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- 
-- Dumping data for table `gejala_bunga`
-- 

INSERT INTO `gejala_bunga` VALUES (1, 'tidak memilih', 'cr_daun_kosong');
INSERT INTO `gejala_bunga` VALUES (2, 'bunga tumbuh tidak sempurna', 'cr_daun_kosong');
INSERT INTO `gejala_bunga` VALUES (3, 'kuncup bunga bercak coklat', 'gjl_bunga_brck');
INSERT INTO `gejala_bunga` VALUES (4, 'bunga gagal mekar', 'gjl_bunga_ggl_mkr');
INSERT INTO `gejala_bunga` VALUES (5, 'kuncup bunga rontok', 'cr_daun_kosong');

-- --------------------------------------------------------

-- 
-- Table structure for table `gejala_daun`
-- 

CREATE TABLE `gejala_daun` (
  `id_gjl_daun` int(11) NOT NULL default '0',
  `nm_gjl_daun` text NOT NULL,
  `gbr_gjl_daun` varchar(33) NOT NULL default '',
  PRIMARY KEY  (`id_gjl_daun`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- 
-- Dumping data for table `gejala_daun`
-- 

INSERT INTO `gejala_daun` VALUES (1, 'tidak memilih', 'cr_daun_kosong');
INSERT INTO `gejala_daun` VALUES (2, 'tunas daun keriting', 'gjl_daun_tns_krtg');
INSERT INTO `gejala_daun` VALUES (3, 'tunas daun hitam', 'gjl_daun_tns_htm');
INSERT INTO `gejala_daun` VALUES (4, 'daun mengering', 'gjl_daun_kering');
INSERT INTO `gejala_daun` VALUES (5, 'daun berwarna kuning', 'gjl_daun_kng');
INSERT INTO `gejala_daun` VALUES (6, 'tangkai daun kecoklatan mengandung air', 'gjl_tangkai_daun');
INSERT INTO `gejala_daun` VALUES (7, 'daun bercak coklat', 'gjl_daun_brck_coklat');
INSERT INTO `gejala_daun` VALUES (8, 'daun rontok', 'cr_daun_kosong');
INSERT INTO `gejala_daun` VALUES (9, 'daun bercak hitam', 'gjl_daun_brck_hitam');
INSERT INTO `gejala_daun` VALUES (10, 'pucuk daun menghitam', 'gjl_pck_daun_hitam');
INSERT INTO `gejala_daun` VALUES (11, 'pucuk daun membusuk dan tidak bau jika dicium', 'gjl_pck_daun_mmbsk');
INSERT INTO `gejala_daun` VALUES (12, 'pucuk tidak mau bertunas', 'cr_daun_kosong');
INSERT INTO `gejala_daun` VALUES (13, 'daun muda habis', 'cr_daun_kosong');
INSERT INTO `gejala_daun` VALUES (14, 'dddd', 'ffffggg');

-- --------------------------------------------------------

-- 
-- Table structure for table `jenis`
-- 

CREATE TABLE `jenis` (
  `id_jenis` int(11) NOT NULL default '0',
  `nm_jenis` text NOT NULL,
  `ket_jenis` text NOT NULL,
  `gbr_jenis` varchar(33) NOT NULL default '',
  PRIMARY KEY  (`id_jenis`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- 
-- Dumping data for table `jenis`
-- 

INSERT INTO `jenis` VALUES (1, 'Adenium Obesum', 'di habitatnya yakni sebelah selatan Gurun sahara sosok tanaman ini berbentuk semak yang besar, kaku dan tinggi. Namun setelah "melanglang buana" termasuk di Indonesia, sosoknya menjadi berbentuk semak pendek yang kelihatan kompak.\r\n', 'obesum');
INSERT INTO `jenis` VALUES (2, 'Adenium Arabicum', 'Sesuai dengan nama belakangnya spesies ini berasal dari Jazirah Arab tetutama saudi Arabia dan Yaman. di tempat asalnya, adenium ini tingginya bisa mencapai 3 meter dengan perakaran yang kuat\r\n', 'arabicum');
INSERT INTO `jenis` VALUES (3, 'Adenium Boehmianum', 'Tanaman ini pertumbuhannya lambat karena umumnya ditemukan di tempat berbatu-batu di Namibia dan Angola yang lapisan tanahnya sangat tipis', 'boehmianum');
INSERT INTO `jenis` VALUES (4, 'Adenium Coetaneum', 'Spesies ini berasal dari gunung Kalahari di sebelah selatan Botswana', 'cr_daun_kosong');
INSERT INTO `jenis` VALUES (5, 'Adenium Socrotanum', 'Spesies ini hanya terdapat di pulau Socrota yang terisolasi di semenanjung Arab.', 'socotranum');
INSERT INTO `jenis` VALUES (6, 'Adenium Multiflorum', 'Adenium ini banyak ditemukan di perbatasan Afrika Selatan dan mozambik', 'multiflorum');
INSERT INTO `jenis` VALUES (7, 'Adenium Somalense', 'Sesuai dengan nama belakangnya, adenium ini berasal dari Somalia juga terdapat di Tanzania', 'somalenses');
INSERT INTO `jenis` VALUES (8, 'Adenium Swazicum', 'Adenium ini berasal dari Swaziland, tetapi juga kerap pula ditemukan di Afrika Selatan dan Mozambik', 'swazicum');

-- --------------------------------------------------------

-- 
-- Table structure for table `login`
-- 

CREATE TABLE `login` (
  `username` text NOT NULL,
  `password` text NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- 
-- Dumping data for table `login`
-- 

INSERT INTO `login` VALUES ('admin', 'adenium');

-- --------------------------------------------------------

-- 
-- Table structure for table `penyakit`
-- 

CREATE TABLE `penyakit` (
  `id_penyakit` int(11) NOT NULL default '0',
  `nm_penyakit` text NOT NULL,
  `penyebab` text NOT NULL,
  `obat` text NOT NULL,
  `gbr_penyakit` varchar(33) NOT NULL default '',
  PRIMARY KEY  (`id_penyakit`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- 
-- Dumping data for table `penyakit`
-- 

INSERT INTO `penyakit` VALUES (1, 'Larve Lepidoptera', 'Ulat atau Larva Lepidoptera', 'Jika serangan ulat hanya sedikit, sebaiknya diberantas secara mekanis, yakni diambil satu persatu kemudian dibunuh. Namun, jika serangan cukup banyak dapat dikendalikan dengan menyemprotkan insektisida Sevin.', 'cr_daun_kosong');
INSERT INTO `penyakit` VALUES (2, 'Aphids', 'Semacam kutu berwarna hitam', 'Menyemprotkan Insektisida Confidor dengan dosis 0,5 ml dalam 1 liter air.', 'cr_daun_kosong');
INSERT INTO `penyakit` VALUES (3, 'Spider Mite', 'tetranynchus cinnacinaborinus (red spider mite)\r\ntetranynchus urticae (twospooted spider mite )\r\nsejenis tungau berwarna merah, kuning muda, hijau muda, coklat muda dan hitam', 'biasanya menyerang bagian bawah daun dan ketiak daun, jika di bawah daun terdapat seperti jaring laba-laba maka semprot dengan\r\n- Keltahane (dikofol), konsentrasi : 0,5 - 1 ml/liter air\r\n- Mitac (amitraz), konsentrasi : 0,5 - 1 ml/liter air\r\n- Demiter (piridaben), konsentrasi : 0,5 ml/liter air', 'spidermite');
INSERT INTO `penyakit` VALUES (4, 'Thrips', 'Thisanoptera (Tripidae) sejenis kutu berwana hitam yang bergerak sangat cepat', 'biasanya menyerang jaring daun dan bunga, agar tidak meluas disarankan untuk memetik kuncup bunga yang diserang kemudian dimusnahkan (dikubur/dibakar)\r\nsemprot dengan :\r\n- Agrimex  (abamektin) konsentrasi : 0,5 ml/liter air\r\n- Confidor (imidakloprid) konsentrasi : 0,5 - 1 ml/liter air\r\n- Pegasus (diafentiuron), konsentrasi : 0,5 - 1 ml/liter air', 'thrips');
INSERT INTO `penyakit` VALUES (5, 'Fungus Gnats', 'Diptera (Sciaridae) semacam larva berwarna hitam bening, jika dewasa seperti nyamuk berwarna hitam', 'biasanya menyerang kuncup bunga\r\nlarva ini berkembang biak di media tanam, tempat yang lembab, jaringan tanaman yang sehat terutama kuncup bunga.untuk mencegahnya semprot dengan :\r\n- Diazinon (diazinon) konsentrasi : 1 ml/liter air\r\n- Dursban (klorpirifos) konsentrasi : 1 ml/liter air\r\n- Trigard (Siromazin) konsentrasi : 0,15 - 0,30 ml/liter air\r\nAgrimex (abamektin) konsentrasi : 0,5 ml/liter air', 'fungus');
INSERT INTO `penyakit` VALUES (6, 'Mealybug', 'Kutu berwarna putih yang memiliki seperti tepung di tubuhnya', 'biasanya menyerang pucuk tanaman, ketiak daun dan batang tanaman\r\nsemprot dengan :\r\n- Pegasus (diafentiuron) konsentrasi : 0,5 ml + 0,5 ml biosoft/liter air\r\n- Diazonin (diazonin) konsentrasi : 1 ml/liter air\r\n- Dursban (klorpirifos) konsentrasi : 1 ml/liter air', 'mealybug');
INSERT INTO `penyakit` VALUES (7, 'Root Mealybug', 'Seperti kutu rambut berwarna putih', 'biasanya menyerang akar rambut tanaman (akar muda)\r\nganti media tanam kemudian akar tanaman dicelup ke dalam larutan obat dan siram media tanam dengan :\r\n- Diazonin (diazonin) konsentrasi :1ml/liter air\r\n- Dursban (klorpirifos) konsentrasi : 1ml/liter air\r\n', '');
INSERT INTO `penyakit` VALUES (8, 'Phomopsis', 'Bentuknya seperti cendawan', 'biasanya menyerang permukaan daun yang cekung \r\nhindari penyiraman secara langsung pada tanaman, jika ingin menyiram langsung lakukan pada pagi hari sehingga permukaan daun segera kering setelah terkena sinar matahari. Agar tidak tersebar petik daun yang terserang kemudian dimusnahkan (dikubur/dibakar). lanjutkan dengan melakukan penyemprotan dengan :\r\n- Manzate (mankozeb) konsentrasi 1 gr/liter air\r\n- Daconil (klorotalonil) konsentrasi 1gr/liter air\r\n- Orthocide (kaptan) konsentrasi 1 gr/liter air', 'phomopsis');
INSERT INTO `penyakit` VALUES (9, 'Fusarium', 'Jamur Fusarium sp', 'biasanya menyerang pada pucuk tanaman\r\npenyebaran fusarium cukup berat sehingga sangat disarankan untuk melakukan pemotongan bagian tanaman yang terkena serangan dan memusnahkannya dan dilakukan penyemprotan dengan : \r\n- Manzate (mankozeb) konsentrasi 1 gr/liter air\r\n- Daconil (klorotalonil) konsentrasi 1gr/liter air\r\n- Orthocide (kaptan) konsentrasi 1 gr/liter air', 'fusarium');
INSERT INTO `penyakit` VALUES (10, 'Layu Kuning', 'Penyiraman yang terlalu berlebihan', 'hindari penyiraman yang terlalu berlebihan dan struktur tanah atau media tanam dibuat menjadi porous agar air siraman mengalir lancar', 'cr_daun_kosong');
INSERT INTO `penyakit` VALUES (11, 'Busuk Akar', 'Penyiraman yang terlalu berlebihan', 'hindari penyiraman berlebihan, jika tanah atau media tanam digali terlihat akar tanaman yang membusuk jemur 2-3 hari kemudian tanam kembali pada media tanam', 'cr_daun_kosong');

-- --------------------------------------------------------

-- 
-- Table structure for table `perkawinan_silang`
-- 

CREATE TABLE `perkawinan_silang` (
  `no` int(11) NOT NULL auto_increment,
  `jenis_jantan` int(11) NOT NULL,
  `jenis_betina` int(11) NOT NULL,
  `hasil` text NOT NULL,
  `keterangan` text NOT NULL,
  `gambar` varchar(200) NOT NULL,
  PRIMARY KEY  (`no`),
  KEY `fkjenis_jantan` (`jenis_jantan`),
  KEY `fkjenis_betina` (`jenis_betina`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=3 ;

-- 
-- Dumping data for table `perkawinan_silang`
-- 

INSERT INTO `perkawinan_silang` VALUES (1, 1, 1, 'nani', 'gendud', '');
INSERT INTO `perkawinan_silang` VALUES (2, 1, 2, 'ucy', 'manis', '');

-- --------------------------------------------------------

-- 
-- Table structure for table `rekomendasi_jenis`
-- 

CREATE TABLE `rekomendasi_jenis` (
  `id_cr_daun` int(11) NOT NULL default '0',
  `id_cr_bunga` int(11) NOT NULL default '0',
  `id_cr_bonggol` int(11) NOT NULL default '0',
  `id_ms_istirahat` int(11) NOT NULL default '0',
  `id_cr_batang` int(11) NOT NULL default '0',
  `id_jenis` int(11) NOT NULL default '0',
  `id_r` int(11) NOT NULL auto_increment,
  PRIMARY KEY  (`id_r`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=24 ;

-- 
-- Dumping data for table `rekomendasi_jenis`
-- 

INSERT INTO `rekomendasi_jenis` VALUES (7, 3, 1, 1, 2, 1, 1);
INSERT INTO `rekomendasi_jenis` VALUES (2, 3, 1, 1, 2, 1, 2);
INSERT INTO `rekomendasi_jenis` VALUES (3, 6, 1, 1, 3, 2, 3);
INSERT INTO `rekomendasi_jenis` VALUES (3, 12, 1, 1, 3, 2, 4);
INSERT INTO `rekomendasi_jenis` VALUES (4, 6, 1, 1, 3, 2, 5);
INSERT INTO `rekomendasi_jenis` VALUES (4, 12, 1, 1, 3, 2, 6);
INSERT INTO `rekomendasi_jenis` VALUES (5, 7, 1, 1, 3, 3, 7);
INSERT INTO `rekomendasi_jenis` VALUES (5, 2, 1, 1, 3, 3, 8);
INSERT INTO `rekomendasi_jenis` VALUES (2, 7, 1, 1, 3, 3, 9);
INSERT INTO `rekomendasi_jenis` VALUES (2, 2, 1, 1, 3, 3, 10);
INSERT INTO `rekomendasi_jenis` VALUES (7, 8, 1, 1, 1, 4, 11);
INSERT INTO `rekomendasi_jenis` VALUES (7, 3, 1, 1, 1, 4, 12);
INSERT INTO `rekomendasi_jenis` VALUES (6, 8, 1, 1, 1, 4, 13);
INSERT INTO `rekomendasi_jenis` VALUES (6, 3, 1, 1, 1, 4, 14);
INSERT INTO `rekomendasi_jenis` VALUES (3, 5, 2, 1, 1, 5, 15);
INSERT INTO `rekomendasi_jenis` VALUES (4, 2, 1, 2, 1, 6, 16);
INSERT INTO `rekomendasi_jenis` VALUES (4, 9, 1, 2, 1, 6, 17);
INSERT INTO `rekomendasi_jenis` VALUES (4, 10, 1, 2, 1, 6, 18);
INSERT INTO `rekomendasi_jenis` VALUES (1, 2, 1, 1, 3, 7, 19);
INSERT INTO `rekomendasi_jenis` VALUES (1, 11, 1, 1, 3, 7, 20);
INSERT INTO `rekomendasi_jenis` VALUES (1, 10, 1, 1, 3, 6, 21);
INSERT INTO `rekomendasi_jenis` VALUES (3, 11, 1, 1, 2, 8, 22);
INSERT INTO `rekomendasi_jenis` VALUES (3, 4, 1, 1, 2, 8, 23);

-- --------------------------------------------------------

-- 
-- Table structure for table `rekomendasi_penyakit`
-- 

CREATE TABLE `rekomendasi_penyakit` (
  `id_gjl_daun` int(6) NOT NULL default '0',
  `id_gjl_bunga` int(6) NOT NULL default '0',
  `id_gjl_batang` int(6) NOT NULL default '0',
  `id_gjl_akar` int(6) NOT NULL default '0',
  `id_penyakit` int(6) NOT NULL default '0',
  `id_r` int(11) NOT NULL auto_increment,
  PRIMARY KEY  (`id_r`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=13 ;

-- 
-- Dumping data for table `rekomendasi_penyakit`
-- 

INSERT INTO `rekomendasi_penyakit` VALUES (13, 1, 1, 1, 1, 1);
INSERT INTO `rekomendasi_penyakit` VALUES (2, 1, 1, 1, 2, 2);
INSERT INTO `rekomendasi_penyakit` VALUES (3, 1, 1, 1, 2, 3);
INSERT INTO `rekomendasi_penyakit` VALUES (4, 1, 1, 1, 2, 4);
INSERT INTO `rekomendasi_penyakit` VALUES (5, 1, 1, 1, 10, 5);
INSERT INTO `rekomendasi_penyakit` VALUES (6, 1, 1, 1, 10, 6);
INSERT INTO `rekomendasi_penyakit` VALUES (5, 1, 1, 2, 11, 7);
INSERT INTO `rekomendasi_penyakit` VALUES (5, 1, 1, 1, 3, 8);
INSERT INTO `rekomendasi_penyakit` VALUES (9, 1, 1, 1, 3, 9);
INSERT INTO `rekomendasi_penyakit` VALUES (8, 1, 1, 1, 3, 10);
INSERT INTO `rekomendasi_penyakit` VALUES (8, 5, 1, 1, 4, 11);
INSERT INTO `rekomendasi_penyakit` VALUES (8, 2, 1, 1, 4, 12);

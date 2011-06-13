-- phpMyAdmin SQL Dump
-- version 3.1.3
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Jun 12, 2011 at 11:25 PM
-- Server version: 5.1.32
-- PHP Version: 5.2.9

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `adenium`
--

-- --------------------------------------------------------

--
-- Table structure for table `tb_bagian`
--

CREATE TABLE IF NOT EXISTS `tb_bagian` (
  `id_bagian` int(11) NOT NULL AUTO_INCREMENT,
  `kode_bagian` varchar(11) NOT NULL,
  `nm_bagian` varchar(20) NOT NULL,
  PRIMARY KEY (`id_bagian`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=6 ;

--
-- Dumping data for table `tb_bagian`
--

INSERT INTO `tb_bagian` (`id_bagian`, `kode_bagian`, `nm_bagian`) VALUES
(1, 'B001', 'bunga'),
(2, 'B002', 'batang'),
(3, 'B003', 'daun'),
(4, 'B004', 'akar'),
(5, 'B005', 'bonggol');

-- --------------------------------------------------------

--
-- Table structure for table `tb_buku_tamu`
--

CREATE TABLE IF NOT EXISTS `tb_buku_tamu` (
  `id_bk_tamu` int(11) NOT NULL AUTO_INCREMENT,
  `nama` varchar(30) NOT NULL,
  `email` varchar(30) NOT NULL,
  `komentar` text NOT NULL,
  PRIMARY KEY (`id_bk_tamu`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=9 ;

--
-- Dumping data for table `tb_buku_tamu`
--

INSERT INTO `tb_buku_tamu` (`id_bk_tamu`, `nama`, `email`, `komentar`) VALUES
(8, 'adit', 'raditBagus@yahoo.com', 'baguuusssss........	'),
(6, 'ucy', 'uceye88@gmail.com', '			waw...... Akhirnya...... semnagattttt	'),
(7, 'yogi', 'watzup@yahoo.co.id', 'semgatttttttttttttttttttttttttttttttttttttt!!!!!!!!!!!\nLumayan JUga.. :P');

-- --------------------------------------------------------

--
-- Table structure for table `tb_ciri`
--

CREATE TABLE IF NOT EXISTS `tb_ciri` (
  `id_ciri` int(11) NOT NULL,
  `kode_ciri` varchar(11) NOT NULL,
  `nm_ciri` varchar(150) NOT NULL,
  `kode_bagian` varchar(5) NOT NULL,
  `gbr_ciri` varchar(100) DEFAULT '',
  PRIMARY KEY (`id_ciri`),
  KEY `id_bagian` (`kode_bagian`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_ciri`
--

INSERT INTO `tb_ciri` (`id_ciri`, `kode_ciri`, `nm_ciri`, `kode_bagian`, `gbr_ciri`) VALUES
(1, 'C001', 'lebar bunga 4 cm', 'B001', ''),
(2, 'C002', 'lebar bunga 5 cm', 'B001', NULL),
(3, 'C030', 'daun berwarna hijau kecoklatan', 'B003', NULL),
(4, 'C003', 'lebar bunga 6 cm', 'B001', NULL),
(5, 'C004', 'lebar bunga 7 cm', 'B001', NULL),
(6, 'C005', 'lebar bunga 11 cm', 'B001', NULL),
(7, 'C006', 'bunga berwarna putih dengan tepi merah', 'B001', NULL),
(8, 'C007', 'bunga berwarna putih dengan trepi merah muda', 'B001', NULL),
(9, 'C008', 'bunga berwarna merah pucat', 'B001', NULL),
(10, 'C009', 'bunga berwarna merah tua', 'B001', NULL),
(11, 'C010', 'bunga berwarna merah muda', 'B001', NULL),
(12, 'C011', 'bunga berbentuk bintang', 'B001', NULL),
(13, 'C012', 'kelopak bunga agak lancip', 'B001', NULL),
(14, 'C013', 'bunga berwarna merah muda dengan corong putih atau kuning', 'B001', NULL),
(15, 'C014', 'bunga berwarna ungu muda', 'B001', NULL),
(16, 'C015', 'bunga berwarna magenta', 'B001', NULL),
(17, 'C016', 'terdapat strip di pinggir bunga menuju corong', 'B001', NULL),
(18, 'C017', 'bentuk bunga bulat', 'B001', NULL),
(19, 'C018', 'ujung petal bunga lancip', 'B001', NULL),
(20, 'C019', 'daun memanjang dan membulat diujung', 'B003', NULL),
(21, 'C020', 'daun besar dan lebar', 'B003', NULL),
(22, 'C021', 'daun berwarna hijau muda', 'B003', 'cr_daun_hj_cerah.JPG'),
(23, 'C022', 'daun berwarna hijau tua', 'B003', NULL),
(25, 'C024', 'daun paling lebar', 'B003', NULL),
(26, 'C025', 'daun tebal dan bulat', 'B003', NULL),
(27, 'C026', 'daun beasr dan agak lonjong', 'B003', NULL),
(28, 'C027', 'daun bulat membentuk mangkok', 'B003', NULL),
(29, 'C028', 'daun berbentuk lanset dan panjang', 'B003', NULL),
(30, 'C029', 'daun berbentuk bulat dan panjang', 'B003', NULL),
(31, 'C031', 'daun mengkilap', 'B003', NULL),
(32, 'C032', 'Daun berbulu halus', 'B003', NULL),
(33, 'C033', 'berbatang panjang', 'B002', NULL),
(34, 'C034', 'berbatang pendek', 'B002', NULL),
(35, 'C035', 'banyak terdapat cabang', 'B002', NULL),
(36, 'C036', 'warna batang coklat keabuan', 'B002', NULL),
(37, 'C037', 'batang tumbuh menebal dari bawah dan semakin mengecil ke atas', 'B002', NULL),
(38, 'C038', 'batang berwarna coklat', 'B002', NULL),
(39, 'C039', 'berbonggol besar', 'B005', NULL),
(40, 'C040', 'tulang daun menonjol', 'B003', ''),
(41, 'C041', 'Bunga berwarna merah muda dengan corong putih/kuning', 'B001', ''),
(42, 'C042', 'Daun hijau keabuan', 'B003', ''),
(43, 'C043', 'daun sempit dan memanjang', 'B003', '');

-- --------------------------------------------------------

--
-- Table structure for table `tb_gejala`
--

CREATE TABLE IF NOT EXISTS `tb_gejala` (
  `id_gejala` int(11) NOT NULL,
  `kode_gejala` varchar(11) NOT NULL,
  `kode_bagian` varchar(11) NOT NULL,
  `nm_gejala` varchar(150) NOT NULL,
  `gbr_gejala` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`id_gejala`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_gejala`
--

INSERT INTO `tb_gejala` (`id_gejala`, `kode_gejala`, `kode_bagian`, `nm_gejala`, `gbr_gejala`) VALUES
(1, 'G001', 'B003', 'Daun muda habis ', ''),
(2, 'G002', 'B003', 'Tunas daun keriting', ''),
(3, 'G003', 'B003', 'Daun berwarna kuning', ''),
(4, 'G004', 'B003', 'Daun mengering', ''),
(5, 'G005', 'B003', 'Tunas daun hitam', ''),
(6, 'G006', 'B003', 'Daun rontok', ''),
(31, 'G007', 'B003', 'Terdapat bercak coklat pada daun', ''),
(8, 'G008', 'B003', 'Terdapat bercak hitam pada daun', ''),
(9, 'G009', 'B003', 'Pucuk daun busuk tapi tidak bau', ''),
(10, 'G010', 'B003', 'Tangkai daun coklat', ''),
(11, 'G011', 'B003', 'Daun tidak mau bertunas', ''),
(12, 'G012', 'B003', 'Warna daun pucat', ''),
(13, 'G013', 'B003', 'Daun layu', ''),
(14, 'G014', 'B003', 'Daun berubah menjadi coklat ', ''),
(15, 'G015', 'B003', 'Daun mudah sobek dari pinggir', ''),
(16, 'G016', 'B003', 'Terdapat kutu berwarna putih di sekitar  ketiak daun', ''),
(17, 'G017', 'B001', 'Bunga gagal mekar', 'work-at-home-picture-300x300.jpg'),
(18, 'G018', 'B001', 'Kuncup bunga rontok', 'business_meeting2.jpg'),
(19, 'G019', 'B001', 'Bunga tumbuh tidak sempurna', '1220651452ZE5hFu.jpg'),
(20, 'G020', 'B001', 'Kuncup bunga ada bercak coklat', ''),
(21, 'G021', 'B001', 'Kuncup bunga bengkok lalu gugur', ''),
(22, 'G022', 'B002', 'Pertumbuhan batang terhambat', ''),
(23, 'G023', 'B002', 'Pucuk batang tampak mengering', ''),
(24, 'G024', 'B002', 'Batang berwarna kekuningan', ''),
(25, 'G025', 'B002', 'Pangkal batang membusuk', 'kucing-anjing.jpg'),
(26, 'G026', 'B002', 'Batang berwarna coklat kehitaman', ''),
(27, 'G027', 'B002', 'Batang dipegang tersa lunak', ''),
(28, 'G028', 'B002', 'Kulit batang terlihat kisut terkadang berlubang', ''),
(29, 'G029', 'B004', 'Akar menjadi busuk', ''),
(32, 'G032', 'B004', 'Akar bila dicabut terdapat bintil pada akar serabutnya', ''),
(33, 'G033', 'B004', 'Terdapat lumut hijau disekitar tanaman', '');

-- --------------------------------------------------------

--
-- Table structure for table `tb_jenis`
--

CREATE TABLE IF NOT EXISTS `tb_jenis` (
  `id_jenis` int(11) NOT NULL AUTO_INCREMENT,
  `kode_jenis` varchar(11) NOT NULL,
  `tipe` varchar(11) DEFAULT NULL,
  `kel` varchar(11) DEFAULT NULL,
  `nm_jenis` varchar(50) DEFAULT NULL,
  `keterangan` text,
  `gbr_jenis` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`id_jenis`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=41 ;

--
-- Dumping data for table `tb_jenis`
--

INSERT INTO `tb_jenis` (`id_jenis`, `kode_jenis`, `tipe`, `kel`, `nm_jenis`, `keterangan`, `gbr_jenis`) VALUES
(1, 'J001', 'indukan', 'jantan', 'Adenium Obesum', 'Ciri utama spesies ini adalah daunnya yang memanjang dan membulat di ujungnya dengan tulang daun yang bervariasi, dari tipis sampai kasar. Permukaan daun umumnya berwarna hijau cerah, mahkota bunganya terlihat seperti bintang dengan warna merah muda sampai merah tua, berdiameter kira-kira 6 cm dan tabung atau corong bunganya berwarna putih.', 'obesum2.jpg'),
(2, 'J002', 'indukan', 'jantan', 'Adenium Arabicum', 'Adenium ini tingginya bisa mencapai 3 meter dengan perakaran kuat. Spesies ini memiliki daun-daun yang besar dan lebar dengan warna hijau tua. Mahkota bunganya berwarna putih berbatas merah muda di tepinya, berukuran kecil dengan diameter sekitar 4 cm.', 'arabicum2.jpg'),
(3, 'J003', 'indukan', 'jantan', 'Adenium Boehmianum', 'Adenium ini bercabang banyak dengan tinggi sekitar 3 meter dan daunnya paling lebar dibandingkan semua spesies adenium.', 'boehm1.jpg'),
(4, 'J004', 'indukan', 'jantan', 'Adenium Oleifolium', 'Adenium ini memiliki daun keabuan dan mengkilap. Bentuk daunnya sempit dan memanjang. Adenium ini berbunga kecil, meskipun kecil tetapi memiliki biji yang banyak. Adenium ini mudah dibudidayakan tetapi pertumbuhannya relatif lambat dan berbunga hanya beberapa bulan selama musim panas. Jenis ini berbonggol kecil dibandingkan jenis lainnnya.', 'olaifolium1.jpg'),
(5, 'J005', 'indukan', 'jantan', 'Adenium Socrotanum', 'Adenium ini memiliki bonggol dengan diameter mencapai hampir 2,5 meter, sehingga bentuknya unik. Daunnya berwarna hijau tua, berukuran sedang dengan panjang kira-kira 12 cm dan lebar 4 cm. Bunganya umumnya berwarna merah cerah dengan diameter mahkota 11 cm.\n\n', 'socotranum.JPG'),
(6, 'J006', 'indukan', 'jantan', 'Adenium Multiflorum', 'Adenium ini memiliki masa istirahat atau dorman yang panjang pada musim dingin. Namun, pada saat masa inilah bunga-bunganya muncul dengan jumlah yang sangat banyak dan memenuhi ranting-rantingnya yang gundul.', 'multiflorum1.jpg'),
(7, 'J007', 'indukan', 'jantan', 'Adenium Somalense', 'Adenium ini tumbuh setinggi 3 meter lebih dengan percabangan ke segala arah, sehingga terlihat sebagai semak-semak berukuran raksasa. Ukuran bunganya termasuk kecil karena hanya berdiameter 5 cm dengan warna merah muda dan mahkotanya berbentuk bintang.', 'somalense1.jpg'),
(8, 'J008', 'indukan', 'jantan', 'Adenium Swazicum', 'Adenium ini memiliki tinggi maksimum hanya sekitar 2 meter, daunnya berwarna hijau tua dengan bulu-bulu halus di permukaan bagian bawah. Warna bunganya bervariasi dari putih, merah muda, dadu sampai ungu dengan diameter bunga sekitar 7 cm.', 'adenium_swazicum1.jpg'),
(9, 'J009', 'anakan', NULL, 'Adenium Black Giant', 'Merupakan hasil perkawinan silang antara adenium somalense jantan dengan adenium arabicum betina.\nAdenium ini memiliki ciri-ciri batang semua seperti arabicum dengan banyak cabang, warna batang menghitam, bentuk daun berbulu, ruas batang banyak dan rapat, kulit batang kasar dan bersisik.', ''),
(10, 'J010', 'anakan', NULL, 'Crismon Star', 'cdrtydfghjklvbnm,uuhjkl;', NULL),
(11, 'J011', 'anakan', NULL, 'Volcanic Sunset', 'rtyuiohddubc bvcgsyucshygcux gx vhxuhvdijv', NULL),
(12, 'J012', 'anakan', NULL, 'Red Ribbon', 'fkjhfhfuuehufujhg hdughdhgiuhdgihugh uhuhguhgu', NULL),
(13, 'J013', 'anakan', NULL, 'My Country', 'Daunnya berukuran sedang, kuntum bunga sedang dan pertumbuhan cepat', 'mycountry.jpg'),
(14, 'J014', 'anakan', NULL, 'Big Circle Ficus', 'ukuran bunganya sedang dan perumbuhannya sedang', 'big_circle.jpg'),
(15, 'J015', 'anakan', NULL, 'Chao Paya Violet', 'Corong berwarna magenta, ukuran bunganya besar, jumlah bunga sedang', 'chao_paya_violet.jpg'),
(16, 'J016', 'anakan', NULL, 'Eye Of the Strom', 'Ukuran bunga besar. Corong berwarna magenta dengan dasar petal pink. Percabangan banyak, tidak ada marking dipetalnya', 'eye.jpg'),
(17, 'J017', 'anakan', NULL, 'Black Cyclon', 'Ukuran bunga sedang, kurang lebih 5cm, corong berwarna kekuningan. Petal bergelombnag, dasar dan tengah petal berwarna merah. Di ujung tampak splash hitam di pinggiran petal.', NULL),
(18, 'J018', 'anakan', NULL, 'Black Red', 'Corong kuning keputihan, petal bergelombnag berwarna merah marun di tengah dan kehitaman dipinggirnya', 'Black_Red.jpg'),
(19, 'J019', 'anakan', NULL, 'Ever Red', 'Petal bergelombang, gabungan merah dan merah tua. ukuran bunga sedang.', NULL),
(20, 'J020', 'anakan', NULL, 'Heitienueng', 'Corongnya putih, petal merah dengan pinggiran ditempati warna hitam. Ukuran bunga sedang dan tingkat kerajinan bunnga juga sedang.', 'heitienoeng.jpg'),
(21, 'J021', 'anakan', NULL, 'Home Run', 'Corong kuning. Petal bergelombang, warnanya merupakan gabungan anatra merah denagn hitam. Jumlah kuntum bunga sedang. Uuran bunga besar dan tingkat kerajinan berbunga sedang.', 'home_run.jpg'),
(22, 'J022', 'anakan', NULL, 'Reflection Of Wind', 'Corong merah dengan hitam dipinggirnya. Ukuran bunga sedang. Jumlah bunga banyak.', 'reflection_of_wind.jpg'),
(23, 'J023', 'anakan', NULL, 'Red Harry Potter', 'Ukuran  bunga besar. mahkota berwarna  merah magenta dengan splash putih. jumlah kuntum banyak', 'red_harry_potter.jpg'),
(24, 'J024', 'anakan', NULL, 'Red Sunlight', 'Corong kuning, petalnya bulat berwarna merah. Ukuran bunga sedang dan jumlah bunga sedang.', 'red_sunlight.jpg'),
(25, 'J025', 'anakan', NULL, 'Srikandi', 'Bunga besar, jumlah bunga sedang. Corong kekuningan. Pinggiran petal bergelombangberwarna merah dan hitam', 'srikandi.jpg'),
(26, 'J026', 'anakan', NULL, 'Manyeyen', 'Bunga besar, rajin berbunga. Petal berwarna putih dengan pinggiran merah. ', 'manyeyen.jpg'),
(27, 'J027', 'anakan', NULL, 'Hakuna Matata', 'Warna corong dan petal seragam, merah spalsh merah tua. Ukuran bunga kecil, jumlah kuntum bunga sedang.', 'hakuna_matata.jpg'),
(28, 'J028', 'anakan', NULL, 'Harry Potter', 'dhgycz cyzcg cfyg cyfc ', NULL),
(29, 'J029', 'anakan', NULL, 'Hibrida', 'xaaty6tv yctz6ct zctz6tcz c', NULL),
(30, 'J030', 'anakan', NULL, 'paiheo', 'Bunga tidak terlalu besar. Warna putih dari dalam corong sudah menyebar keluar. Petal putih splash merah merata', 'pai_heo.jpg'),
(31, 'J031', 'anakan', NULL, 'N3', 'dguyug vugyer ger7g gerugu ', NULL),
(32, 'J032', 'anakan', NULL, 'Stella', 'fff fyy  fyyfy', NULL),
(33, 'J033', 'anakan', NULL, 'Diamond Crown', 'g.ryry vvytry uh8ryt eu87y iyb9eh gtufdhguxghdus', NULL),
(35, 'J035', 'anakan', NULL, 'Clasic Touch', 'Jumlah bunga sedikit. Warna petalnya kotor lantaran tidak ada batas yang jelas antara wrna merah, pink dan putih. Rumpunnya padat.', 'clasic_touch.jpg'),
(36, 'J036', 'anakan', NULL, 'Dr Red', 'Bunga bulat besar. Corong putih denga petal merah. Pinggiran petal berwarna lebih tua dari petal tengah.', 'drRED.jpg'),
(37, 'J037', 'anakan', NULL, 'Black Blue', 'Warna bunganya kotor. Warna putih dan spalsh ungu pada petal belum terpisah secara sempurna. Corong berwarna kuning splash ungu. Pangkal petal ungu kehitaman. Jumlah kumtum sedikit.', 'black_blue.jpg'),
(38, 'J038', 'anakan', NULL, 'Carmello', 'Ukuran bunga sedang, jumlah kuntum bunga juga sedang. Corong merah marun. Petal putih dengan spalsh pink di pangkal dan pinggir petal.', 'carmello.jpg'),
(39, 'J039', 'anakan', NULL, 'Have a Dream', 'Corong putih strip merah. Petal campuranmerah dan gradasi merah. Ukuran bunga sedang, jumlah bunga sedang. Termasuk rajin berbunga.', 'have_a_dream.jpg'),
(40, 'J040', 'anakan', NULL, 'Lily', 'Rajin berbunga. Jumlah bunga banyak. Petal bergelombang, berwarna putih splash pink.', 'lily.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `tb_kawin_silang`
--

CREATE TABLE IF NOT EXISTS `tb_kawin_silang` (
  `id_silang` int(11) NOT NULL AUTO_INCREMENT,
  `kode_jantan` varchar(11) NOT NULL,
  `kode_betina` varchar(11) NOT NULL,
  `kode_hasil` varchar(100) NOT NULL,
  `keterangan` text NOT NULL,
  `gbr_bunga_baru` varchar(50) NOT NULL,
  PRIMARY KEY (`id_silang`),
  KEY `fkjenis_jantan` (`kode_jantan`),
  KEY `fkjenis_betina` (`kode_betina`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=8 ;

--
-- Dumping data for table `tb_kawin_silang`
--

INSERT INTO `tb_kawin_silang` (`id_silang`, `kode_jantan`, `kode_betina`, `kode_hasil`, `keterangan`, `gbr_bunga_baru`) VALUES
(1, 'J007', 'J002', 'J009', '', ''),
(2, 'J008', 'J001', 'J010.J011.J012', '', ''),
(3, 'J001', 'J006', 'J013', '', ''),
(4, 'J001', 'J008', 'J014', '', ''),
(5, 'J006', 'J008', 'J015', '', ''),
(6, 'J003', 'J008', 'J016', '', ''),
(7, 'J001', 'J001', 'J017.J018', '', '');

-- --------------------------------------------------------

--
-- Table structure for table `tb_konten`
--

CREATE TABLE IF NOT EXISTS `tb_konten` (
  `id_konten` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `konten` text COLLATE utf8_unicode_ci,
  `page` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `image` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `image_thumb` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id_konten`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=29 ;

--
-- Dumping data for table `tb_konten`
--

INSERT INTO `tb_konten` (`id_konten`, `title`, `konten`, `page`, `image`, `image_thumb`) VALUES
(7, 'Profil', '<p>Adenium termasuk jenis sekulen atau tanaman yang mengandung banyak air dengan ciri utama salah satu bagian tanaman digunakan untuk menyimpan air, karena adenium berasal dari gurun pasir yang kering dan panas. Dengan cadangan air yang didapatnya dari embun pagi, adenium bisa bertahan hidup pada cuaca yang kering dan panas. cadangan air adenium terdapat di bagian pangkal batangnya, sehingga batang ini terlihat seperti memiliki bonggol.\n</p>\n<p>Kamboja jepang atau ngetop dengan sebutan adenium bukan asing bagi masyarakat Indonesia, terutama penggemar tanaman hias. beberapa tahun belakangan ini, adenium banyak disebut dan menjadi buah bibir</p>\n<p>\nSebenarnya istilah "Kamboja Jepang" sama sekali tidak cocok untuk adenium karena tidak termasuk jenis kamboja dan juga tidak berasal dari Jepang</p>\n\n<p>Adenium dan Kamboja adalah dua jenis tanaman yang berbeda meskipun sama-sama dari famili Apocynaceae, perbedaan keduanya sangat jelas. Adenium memiliki nama ilmiah Adenium sp sedangkan kamboja adalah Plumeria .</p>\n', 'profil', '', ''),
(8, 'Selamat Datang', '<p> Selamat datang di website Adenium. Dalam sistem ini Anda dapat memperoleh berbagai informasi serta anda dapat melakukan diagnosa jenis adenium, penyakit yang menyerang adenium serta solusinya. Anda juga dapat mengetahui kemungkinan hasil varietas baru dari hasil perkawinan silang. </p>\n', 'depan', '', ''),
(9, 'Tips Perawatan', '<b>1. Penyiraman </b><br>\n<p>\nAdenium dikenal sebagai tanaman yang tahan terhadapa panas dan tidak membutuhkan banyak air. Teknik penyiraman terhadap adenium disesuaikan dengan keadaan fisik yang ditunjukkan oleh tanamn tersebut. Jika terlalu banyak air mengakibatkan rusaknya akar tanaman. Demikian juga, jika kekurangan air menyebabakan pengerutan pada akar yang berakibat pada rontoknya daun dan tanaman menjadi kerdil.  \n<br>Waktu penyiraman dilakukan pada saat tanaman benar-benar memerlukan air, yaitu dengan mengorek media tanah bagian atas sedalam 2 cm. Jika tanah masi terlihat basah berarti tanaman tidak perlu disiram air. Namun, jika media tanah sudah kering berarti tanaman perlu mendapat siraman air. penyiraman sebaiknya dilakukan pada pagi hari dalam jumlah yang secukupnya. Apabila air siraman telah keluar dari dalam pot, maka penyiraman telah cukup.\n</p>\n<br><b>2. Penyiangan</b></br>\n<p>\n    Media tanam hendaknya harus bersih dari rerumputan atau tumbuhan lain yang dapat mengganggu pertumbuhan adenium secara maksimal. Oleh karena itu, media tanam harus dibebaskan dari tanaman pengganggu, dengan cara melakukan penyiangan. Penyiangan dapat dilakukan dengan sederhana, yaitu dengan cara mencabut rumput atau tanaman lain yang tumbuh di dalam media tanam adenium. \n</p>\n\n<br><b>3. Pemupukan</b><br>\n<p>\nPada dasarnya memupuk merupakan pemberian zat makanan (unsur hara) yang diperlukan oleh tanaman. Unsur hara yang diperoleh dari media tana,an jumlahnya terbatas dan terkadang tidak cukup untuk memenuhi kebutuuhan nutrisi tanaman. oleh karena itu, pupuk peru dilakukan untuk menambah unsur hara yang dibutuhkan.\n<br>Pemberian pupuk dengan dosis yang tepat sangat membantu pertumbuhan dan perkembangan adenium. Namun, pemberian pupuk yang tidak tepat dosisnya akan  menghambat pertumbuhan atau bahkan dapat menyebabkan kematuian adenium. Untuk merawat adenium sebaiknya digunakan pupuk yang mengandung hara makro dan mikro yang lengkap\n<br> Agar pupuk dapat diserap oleh tanama, maka pemberian pupuk disarankan pada pagi hari setelah penyiraman. Hal ini juga dapat membantu adenium dalam proses fotosintesis. Penggunaan pupuk yang mengandung fosfor dan kalium tinggi dapat merangsang adenium agar cepat berbunga.  \n</p>\n\n<br><b>4. Pemangkasan</b> </br>\n<p>\nPemnagkasan pada adenium merupakan hal yang penting agar tanaman ini menghasilkan banyak bunga dari pertumbuhan tunas-tunas baru hasil dari pemangkasan. Sebelum melakukan pemangkasan tanaman harus dicek terlebih dahulu apakah adenium  dalam keadaan benar-benar subur dan tidak terserang hama atau penyakit. untuk memastikan tanaman sehat atautidak, perhatikan besar batang dan bentuk daunnya. jika adenium tumbuh sempurnadan warna daun tidak menguning, berarti tanaman  dianggap cukup sehat. Pemangkasan juga dapat dilakukan jika permukaan kullit batang seperti retak dan binggol berwarna kehijauan.\n<br>Pemangkasan dilakukan dengan menggunakan alat potong pisau atau gunting yang tajam dan streril. Alat ppotong yang terkontaminasi bakteri atau jamur mendatangkan penyakit pada adenium ynag dipangkas. Sterilisasi alat potong dapat dilakukan dengan cara mencelupkannya ke dalam alkohol atau membakarnya beberapa saat.\n<br> Pemnagkasan adenium baik seklai dilakukan pada pagi hari agar bekas potongna segera memngering. Untuk mencegah pembusukan daoat digunakan fungisida. Fungisida dilarukan dalam 0,5 g/liter, kemudian oleskan merata di permukaan potongan. Adenium yang telah dipangkas sebaiknya diletakkan  ditempat yang terkena sinar matahari langsung dan jangan sering disiram air. Tunas cabang baru adenium akan muncul dalam waktu 1-2 minggu. Kemudian bunga akan muncul setelah 1-2 bulan. </p>\n\n<br><b>5. Penggantian Media Tanam/Repotting. </b></br>\n<p>Repotting biasanya kurang diperhatikan oleh para hobiis adenium dengan alasan tanpa repotting pun tanaman ini tetap tumbuh. Namun jika tidak diperhatikan dengan seksama, adenium di dalam pot yang tidak di repotting akan mengalami tanda-tanda kekurangan unsur hara, seperti daun mengecil dan mogok berbung. Kalupun mau berbunga, ukuran bunganya menjadi kecil-kecil, tidak seperti biasanya. <br>\nPenggantian media tanam untuk adenium yang ditanam dalam pot adalah suatu keharusan karena unsur hara dalam media lama-lama akan habis diserap tanaman. Penggantian Media tanam sebaiknya rutin dilakukan setiap 10 bulan sekali. <br>\nCara menggati media tanam dengan mengeluarkan tanaman dari dalam pot dengan hati-hati agar akarnya tidak rusak. Tanah pada perakaran tanaman disisakan sedikit dan kemudian dimasukkan lagi ke dalam pot setelah media tanamnya di ganti. Media tanam yang baru sebaiknya berkomposisi yang sama dengan media tanam yang lain agar tanaman langsung bisa beradaptasi.</p>\n', 'tips', '', ''),
(10, 'Tips Memperindah Adenium', '\n<b>A. Memperbanyak Bunga</b><br>\n<br> 1. Lakukan Pemangkasan batang atau cabang. Alat pangkas harus dalam keadan steril. Sebaiknya pemangkasan dilakukan secara serempak untuk setiap batang atau cabang sehingga tunas-tunas juga muncul serempak dan bunga mekar bersamaan.</br>\n<br> 2. Lakukan pemberian pupuk secara tepat. Dua minggu setelah tanaman dipangkas, diberikan pupuk khusus untuk merangasang pembungaan, yaitu pupuk yang memiliki kandungan nitrogen tinggi. Sebaiknya, berikan pupuk yang lekas larut dalam media supaya proses kerjanya lebih cepat. </br>\n<br> 3. Setelah pemeberian pupuk, letakkan tanaman dibawah panas matahari langsung untuk merangasang pembungaan. </br>\n<br> <b>B. Menampilkan Bonggol </b> </br>\n<br> 1. Bongkar tanaman adenium dari pot, jika adenium ditanam di pot. Lakukan pekerjaan ini dengan hati-hati, jangan merusak atau memotong akar, terutama bonggolnya.</br>\n<br> 2. Semprot akar dengan air hingga tanah yang menempel hilang. Kemudian, pangkas akar-akar yang tidak beraturan, Alat pangkas harus dalam keadaan steril. </br> \n<br> 3. Siapkan media tanam berupa campuran pasir kasar atau pasir malang, sekam arang, dan pupuk kandang matang dengan perbandingan 2 : 1 : 1. </br>\n<br> 4. Siapkan pot yang dangkal, yang biasa digunakan untuk tanaman bonsai. Pilih pot yang besarnya sesuai dengan besarnya tanaman dan bonggol akar agar penampilan tanaman menarik. </br>\n<br> 5. Masukkan media ke dalam pot memenuhi 1/2 dari tinggi pot. Letakkan tanaman di tengah-tengah pot dan usahakan agar bonggol akar tampak  (yang tertanam didalam media hanya akar-akar yang kecil-kecil yang menempel dibawah dan disekitar akar yang besar). </br>\n<br> 6. Penuhi sela-sela akar dengan media tanam supaya agar akar dapat merekat pada media dan posisi tanaman menjadi kuat (tidak mudah goyah).</br>\n<br> 7. Siram media dengan air sampai air keluar melalui lubang pot. Tekan bonggol akar dengan tangan supaya posisi tanaman benar-benar kuat. </br>\n<br> 8. Letakkan tanaman ditempat yang teduh sekurang-kurangnya sebulan sampai perakarannya benar-benar kuat. Setelah kuat, tanaman boleh diletakkan ditempat terbuka yang terkena sinar matahari.   ', 'tips', '', ''),
(11, 'Tips Ketiga', 'Eu fugiat nulla pariatur. Velit esse cillum dolore ut enim ad minim veniam, excepteur sint occaecat. Ut labore et dolore magna aliqua. Sed do eiusmod tempor incididunt mollit anim id est laborum.\n\nConsectetur adipisicing elit, in reprehenderit in voluptate lorem ipsum dolor sit amet. Sunt in culpa sed do eiusmod tempor incididunt cupidatat non proident. Duis aute irure dolor quis nostrud exercitation ut labore et dolore magna aliqua. Mollit anim id est laborum. Ut enim ad minim veniam, excepteur sint occaecat ut labore et dolore magna aliqua.\n\nQuis nostrud exercitation sed do eiusmod tempor incididunt eu fugiat nulla pariatur. Ullamco laboris nisi qui officia deserunt sunt in culpa. Ut enim ad minim veniam, excepteur sint occaecat ut aliquip ex ea commodo consequat.\n\nSed do eiusmod tempor incididunt eu fugiat nulla pariatur. Duis aute irure dolor qui officia deserunt lorem ipsum dolor sit amet. Eu fugiat nulla pariatur.\n\n', 'tips', '', ''),
(12, 'Budidaya Vegetatif Dengan Stek Batang', '<br> 1. Pilih batang yang tua dan benar-benar sehat, yakni yang tampak kuat, bersih, dan licin, serta berwarna hijau keputih-putihan. Diameter batang minimal 2 cm, semakin besar semakin baik. Sterilkan pisau untuk memotong batang adenium agar adenium tidak rusak. Potong batang sesuai dengan ukuran keinginan, panjang dan pendek. Sebaiknya potong batang secara miring. </br>\n<br> 2. Buat irisan berbentuk (+) di permukaan stek. Lalu keringkan denga cara dianginkan bukan dijemur. agar getah batang berhenti. </br>\n<br> 3. Kira-kira 30 menit kemudian, celupkan batang di zat perangsang akar. </br>\n<br> 4. Siapkan media tanam dalam pot, berupa campuran pasir kasar atau pasir malang (pasir vulkan), pupuk kandang matang, dan arang sekam dengan perbandingan 3 : 1 :1. Jika dikehendaki, tambahkan fungisida ke dalmnya. Tancapkan batang stekan ditengah-tengah pot dengan kedalaman kira-kira 5 cm. tekan media dengan tangan supaya batang tidak mudah goyah dan benar-benar melekat pada media. </br>\n<br> 5. pangkas daun agar penguapan minimal. Letakkan pot ditempat yang ternaungi, sekurang-kurangnya 2-4 minggu. Pindahkan ketempat yang panas setelah tanamn benar-benar kuat dan hidup, ditandai dengan tumbuhnya tunas. </br>\n<br> 6. Satu bulan kemudia amati berhasil tidaknya usaha penyetekan yang dilakukan. Jika tumbuh tunas atau batang tampak segar dan tetap keras, serta batang bekas potongan sudah ditumbuhi akar, berarti penyetekan berhasil. Sebaliknya, jika batang tampak mengecil  dan busuk serta tidak ditumbuhi tunas, berarti penyetekan gagal.', 'vegetatif', 'img_796_20110530.jpg', 'img_796_20110530_150x150.jpg'),
(13, 'Budidaya cara Vegetatif Stek Akar', 'Duis aute irure dolor consectetur adipisicing elit, in reprehenderit in voluptate. Excepteur sint occaecat ut labore et dolore magna aliqua. Mollit anim id est laborum. Lorem ipsum dolor sit amet, eu fugiat nulla pariatur. Duis aute irure dolor quis nostrud exercitation sed do eiusmod tempor incididunt.\n\nMollit anim id est laborum. In reprehenderit in voluptate ut enim ad minim veniam, ullamco laboris nisi. Eu fugiat nulla pariatur. Lorem ipsum dolor sit amet. Quis nostrud exercitation consectetur adipisicing elit, ut aliquip ex ea commodo consequat.\n\nVelit esse cillum dolore eu fugiat nulla pariatur. Mollit anim id est laborum. Qui officia deserunt cupidatat non proident, sed do eiusmod tempor incididunt. In reprehenderit in voluptate lorem ipsum dolor sit amet, duis aute irure dolor. Quis nostrud exercitation excepteur sint occaecat sunt in culpa.', 'vegetatif', 'img_474_20110214.jpg', 'img_474_20110214_150x150.jpg'),
(14, 'Budidaya Vegetatif Dengan Cangkok', '<br> 1.  Pilih batang yang tua dan sehat, yaitu batang yang bersih, licin, dan keras. Diameter batang minimal 3 cm, semakin besar semakin baik.</br>\n<br> 2. Kupas kulit batang sepanjang kira-kira 5 cm secara melingkar sampai kelihatan batangtengahnya yang berwarna putih, kemudian kerok kambiumnya (lendir yang menempel pada tengah batang). Untuk keperluan ini, gunakan pisau tajam dan steril. Luka sayatan dikeringkan dengan angin selama 3-6 jam agar getah hilang dari bekas sayatan. Setelah kering oleskan hormon penumbuh akar (misal Rooton F atau merk lain). Bubuk hormon dicampur dengan sedikit air terlebih dahulu hingga berbentuk pasta. oleskan denagn kuas atau jari tangan</br>\n<br> 3. Siapkan media cangkok berupa campuran tanah, pasir, dan pupuk kandang matang. Tambahkan sedikit air sehingga media bisa dikepal dengan tangan, tidak terlalu lembek ataupun terlalu keras.Tutup bekas sayatan dengan media, kemudian bunngkus dengan plastik atau sabut kelapa. Ikat kedua ujungnya  dengan tali rafia </br>\n<br> 4. Alternatif lain bisa menggunakan bekas minum air mineral sebagai tempat media tanamnya. </br>\n</br> 5. Untuk menghindari air hujan atau panas matahari langsung, letakkan tanaman ditempat yang teduh, sekurang-kurangnya selama 2 minggu. </br>\n<br> 6. Lakukan penyiraman hanya jika benar-benar diperlukan karen awaktu pencangkokan relatif singkat. lakukan penyiraman secukupnya jika memang media tampak kering untuk menghindari pembusukan akar yang dicangkok. </br>\n<br> 7. Amati hasil cangkokan 4-6 minggu kemudian, dengan membuka tali atau menyobek sebagian plastik pembungkus. Apabila disekitar syatan tumbuh akar, berarti pencangkokan berhasil, tetapi jika batang mengecil dan daun layu, berarti pencangkokan gagal.</br>\n<br>8. Jika cangkokan benar-benar hidu, ditandai dengan tumbuhnya akar dibagian sayatan, potong cangkokann tersebut kira-kira 2-4 cm dibawah sayatan, kemudian tanaman dalamm pot atau wadah lain.</br>', 'vegetatif', 'img_125_20110530.jpg', 'img_125_20110530_150x150.jpg'),
(15, 'Budidaya Vegetatif Dengan Sambung', '<br>1. Siapkan batang bawah dari hasil semai biji kira-kira 3-4 bulan, pisau stainless, alkohol, plastik es, tali rafia</br>\n<br>2. Siapkan batang atas berukuran lebih kecil 2-3 mm drai batang bawah.</br>\n<br>3. Bersihkan pisau dengan alkohol sebelum dan setelah beberapa kali penyambungan.</br>\n<br>4. Pangkas daun batang bawah dan potong 2-3 cn diatas leher bonggol.</br>\n<br>5. Iris batang bawah untuk membuat celah membentuk V sedalam 1-1,5 cm dari pangkal atas. Pastikan ukuran celah itu tepat untuk memasukkan batang atas.</br>\n<br>6. Iris pangkal entres membentuk V, dalam sayatan 1-1,5 cm, potong entres sepanjang 3 cm.</br>\n<br>7. Selipkan entres atau batang atas pada batang bawa, tekan sedikit agar sambungan rapat.</br>\n<br>8. Balut sambungan dengan plastik es, putar 3 klai denagn erat dan ikat.</br>\n<br>9. Tutup lagi denga plastik es yang lebih besar  agar lembab dan lebih kuat ikat denga talli rafia.</br>\n<br>10. Simpan dibawah naungan plastik UV atau shading net. Lakukan penyiraman secukupnya.</br>', 'vegetatif', 'img_727_20110602.jpg', 'img_727_20110602_150x150.jpg'),
(16, 'Budidaya Generatif', '<br>1. petiklah buiah yang telah matang dari pohon, yakni jika telah pecah/mengelupas. Keluarkan biji-bijinya, buang rambut atau bulu yang menempel pada biji, kemudian kering anginkan selama 1-2 jam.</br>\n<br>2. Siapkan media tanam yang terdiri atas campuran pasir kasar, pupuk kandang, dan akar sekam denga perbandingan 2 : 1 : 1 atau asal media benar-benar porous (tidak mengikat air). Masukkan media tanam yang telash dicampur air kedalam wadah (pot atau lubanng tanamn di lahan bebas), kemudian buat lubanng tanam ditengahnya sedalam 0,5 cm. </br>\n<br>3. Masukkan biji adenium denag posisi horizontal kedalam lubang tana, satu biji dalam satu lubang dan tutup dengan media tanam.</br>\n<br>4. Semprot media tanam denag air secara merata dengan menggunakan sprayer. Letak kan media ditempat yang teduh.</br>\n<br>5. Kecambah calon tanaman muda akan muncul pada hari ke 4-7. Lakukan penyemprotan jika media telah kering .</br>\n<br>6. Setelah tumbuh, pindahkan benih setelah perakarannya benar-benar kuat, yakni sekurang-kurangnya setelah berumur 3 bulan. </br>', 'generatif', 'img_278_20110524.jpg', 'img_278_20110524_150x150.jpg'),
(17, 'Budidaya Kawin Silang', '<br>1. Pilih dua bunga yang sehat dari dua jenis adenium yang berbeda dan  baru 1-2 hari mekar. ciri-ciri bunga yang sehat adalah memiliki kelopak besar, utuh, bersih, dan berwarna cerah. Sobek mahkota bunga secara hati-hati/ pelan-pelanuntuk mempermudah melakukan pengambilan serbuk sari dan penyerbukan.</br>\n<br>2. Buka tabung dengan menarik 1-2 helai benang sari hingga sobek. </br>\n<br>3. Ambil sebuk sari dengan menggunakan kuas (oleskan kuas beberapa kali) atau dnega tusuk gigi</br>\n<br>4. Oleskan ke kepala putik dari bunga yang diserbuki. Kepala putik berada didasr bunga. Supaya bunga yang diserbuki tidak diganggu oleh serangga, angin, atau hujan, tutup tangkai bunga dengan kantong plasti, kemudian ikat dnega tali/rafia. Lubangi kantong plastik di beberapa titik supaya tetap terjadi penguapan. </br>\n<br>5. Amati hasil penyerbukan kira-kira 2-3 minggu berikutnya. Keberhasilan penyerbukan ditandai dengan terdapatnya bakal buah pada ujung tunas (dasar bunga), berbentuk tanduk.</br>\n<br>6. Kira-kira 2-6 bulan kemudian bakal buah akan masak ditandai dengan buah pecah di tengah. Ambil biji didalamnya dan pisahkan dari rambut yang menempel pada biji. Kemudian dapat dilakukan persemaian.</br>', 'kawin-silang', 'img_745_20110602.jpg', 'img_745_20110602_150x150.jpg'),
(23, 'Adenium Crystal', 'Gambar Koala', 'galery', 'img_826_20110610.jpg', 'img_826_20110610_150x150.jpg'),
(24, 'Adenium Rocker Star', 'bhgsy shcusgcyus cgs ckcgyv u   g', 'galery', 'img_194_20110610.jpg', 'img_194_20110610_150x150.jpg'),
(26, 'Adenium Oscar', 'nsytduyfguf bhfubhufu bku ubhuf bhuvghcghvcb ', 'galery', 'img_421_20110610.jpg', 'img_421_20110610_150x150.jpg'),
(27, 'Obesum Star', 'fydtfyufgdu gfdygfyg igv yvtygv yvycyuvy', 'galery', 'img_659_20110610.jpg', 'img_659_20110610_150x150.jpg'),
(28, 'Adenium Purple Rain', 'fgdygfdgdyuvg uvycgcguv yygv vvygyvchvc', 'galery', 'img_925_20110610.jpg', 'img_925_20110610_150x150.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `tb_obat`
--

CREATE TABLE IF NOT EXISTS `tb_obat` (
  `id_obat` int(11) NOT NULL AUTO_INCREMENT,
  `kode_obat` varchar(11) NOT NULL,
  `nm_obat` varchar(50) DEFAULT NULL,
  `pemakaian` varchar(200) DEFAULT NULL,
  PRIMARY KEY (`id_obat`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=15 ;

--
-- Dumping data for table `tb_obat`
--

INSERT INTO `tb_obat` (`id_obat`, `kode_obat`, `nm_obat`, `pemakaian`) VALUES
(1, 'K001', 'kelthane (dikofol)', 'penggunaan denagn konsentrasi 0,5 ml - 1 ml / liter air'),
(2, 'K002', 'mitac (amitraz)', 'penggunaan denagn konsentrasi 0,5 ml - 1 ml / liter air'),
(3, 'K003', 'demiter (piridaben)', 'penggunaan denagn konsentrasi 0,5 ml / liter air'),
(4, 'K004', 'agrimex (abamektin)', 'penggunaan denagn konsentrasi 0,5 ml / liter air'),
(5, 'K005', 'confidor (imidakloprid)', 'penggunaan denagn konsentrasi 0,5 ml / liter air'),
(6, 'K006', 'pegasus (diafentiuron)', 'penggunaan denagn konsentrasi 0,5 ml - 1 ml / liter air'),
(7, 'K007', 'doazinon', 'penggunaan denagn konsentrasi 1 ml / liter air'),
(8, 'K008', 'dursban(kloropirifus)', 'penggunaan denagn konsentrasi 1 ml / liter air'),
(9, 'K009', 'trigard (siromazin)', 'penggunaan denagn konsentrasi 0,15 ml - 0,30 ml / liter air'),
(10, 'K010', 'sevin', 'disemprot menggunakan sevin. jika ulat yang menyerang jumlahnya masih sedikit penagannanya dengan diambil satu per satu lalu dibunuh'),
(11, 'K011', 'manzate (mankozeb)', 'penggunaan denagn konsentrasi 1 gr/ liter air'),
(12, 'K012', 'daconil (klorotalonil)', 'penggunaan denagn konsentrasi  1 gr/ liter air'),
(13, 'K013', 'orthocide (kaptan)', 'penggunaan denagn konsentrasi  1 gr / liter air'),
(14, 'K014', 'Hindari Penyiraman Berlebihan', '0');

-- --------------------------------------------------------

--
-- Table structure for table `tb_page`
--

CREATE TABLE IF NOT EXISTS `tb_page` (
  `id_page` int(11) NOT NULL AUTO_INCREMENT,
  `nm_page` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id_page`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=10 ;

--
-- Dumping data for table `tb_page`
--

INSERT INTO `tb_page` (`id_page`, `nm_page`) VALUES
(1, 'depan'),
(2, 'penyakit'),
(3, 'jenis'),
(4, 'kawin-silang'),
(5, 'tips'),
(6, 'galery'),
(7, 'profil'),
(8, 'generatif'),
(9, 'vegetatif');

-- --------------------------------------------------------

--
-- Table structure for table `tb_penyakit`
--

CREATE TABLE IF NOT EXISTS `tb_penyakit` (
  `id_penyakit` int(11) NOT NULL,
  `kode_penyakit` varchar(11) NOT NULL,
  `nm_penyakit` varchar(50) NOT NULL,
  `keterangan` text,
  `obat` text CHARACTER SET utf8 NOT NULL,
  `gbr_penyakit` varchar(50) NOT NULL,
  PRIMARY KEY (`id_penyakit`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_penyakit`
--

INSERT INTO `tb_penyakit` (`id_penyakit`, `kode_penyakit`, `nm_penyakit`, `keterangan`, `obat`, `gbr_penyakit`) VALUES
(1, 'P001', 'Larva Lepidoptera', 'Sejenis ulat yang biasanya memakan daun-daun adenium yang masih muda. Namun, dapat juga memakan daun-daun yang sudah tua.', '1. Jika serangan masih sedikit 2-5 ulat, dapat dilakukan dengan cara mekanis yaitu diambil dan segera musnahkan. \n<br>2. Jika serangan sudah parah dapat dilakukan dengan menyemprotkan insektisida sevin dengan kadar sesuai dengan aturan yang tertera. </br>', ''),
(2, 'P002', 'Aphids', 'Aphids adalah serangga yang sangat kecil, berbentuk bulat, dan berwarna kekuningan. Aphids hidup secara bergerombol dan sering dijumpai pada pucuk-pucuk daun. Serangga ini menghisap cairan pada benda tempatnya menempel dan menginggalkan bintik-bintik bekas tusukan. Jika dibiarkan, hama ini akan menyebabkan daun menjadi kurus dan keriting.\n', 'Serangan hama ini dapat dicegah dengan menyemprotkan insektisida Confidor dengan dosis 0.5 ml dalam 1 liter air.', ''),
(3, 'P003', 'Thrips', 'Sejenis serangga kecil yang masih termasuk jenis kutu berwarna hitam dan bergerak sangat cepat. Serangga ini sangat menyukai bunga-bunga yang belum mekar, sehingga kuncup tersebut gagal menjadi bunga.', '1. Jika mendapati kuncup bunga yang tumbuh tidak normal segera petik dam musnakan(dibakar atau dikubur). Di dalam kuncup bunga sering terdapat larva thrips yang bisa berkembang jika tidak segera dimusnakan. \n<br> 2. Pengendalian kimiawi: dengan menggunakan inteksida Metindo atau Agrimex. Dosis yang digunakan cukup 1 ml/liter air untuk insektisida berbentuk cair dan 1 gr/liter air.', ''),
(4, 'P004', 'Spider Mite', 'Spider Mite adalah salah satu jenis tungau yang memiliki beberapa waran yaitu merah, kuning muda, hijau tua, coklat muda dan hitam. Spider Mite sangan ganas dan serangannya sering sekali dijumpai. \n<br>Hama ini meneyerang menyerang bagian daun, mengakibatkan daun layu dan kelihatan pucat, kemudian berubah warna menjadi cokelat. Akhirnya, daun kusam, keriting, dan rontok.', '1. Serangan hama dapat dicegah dengan cara meletakkan tanaman adenium ditempat yang mendapat sinar matahari penuh.\n<br> 2. Tanaman yang sudah terserang Spider Mite harus diisolasikan agar serangan itu tidak merembetpada tanaman yang lain. Jika serangan belum berat pengendalian cukup dengan memangkas daun. Bekas pangkasannya dibuang atau dibakar agar hama tidak menyebar. </br>\n<br> 3. Jika serangan cukup berat dapat dibasmi dengan menyemprotkan akarisida Kelthane atau Omnite dengan dosis 1 cc/1 liter air. Penyemprotan dilakukan 2-3 kali selama 2 minggu samapai hamanya hilang. </br>', ''),
(5, 'P005', 'Fungus Gnats', 'Penyakit ini disebabkan oleh larva berkepala hitam dan bening, jika dewasa memiliki ciri-ciri seperti nyamuk berkepala hitam. Larvanya merusak tanaman dengan memakan akar dan batang. Hama ini menyerang kuncup bung asebelum bunga mekar. Disekitar kuncup bunga akan tampak bintik-bintik hitam, kemudian bunga membusuk.', '1. Jika masih sedikit patahkan bunga yang tumbuhnya tidak normal atau terserang hama, lalu buang atau bakar bekas patahannya. \n<br> 2. Jiak serangan sudah cukup parah, penanggulannya dapat dilakukan dengan menyemprotkan insektisida seperti Domier, Trigard 75 wp atau Proleat dengan dosis 1 cc / 1 liter air. Semprotkan pada selurh bagian tanaman.</br> ', ''),
(6, 'P006', 'Mealy Bug', 'Penyakit ini disebabkan oleh serangga seperti kutu yang berwarna putih dan berukuran kecil-kecil. Jika sudah menyebar bentuknya semacam tepung ditubuhnya. Hama ini sering dijumpai disekitar daun dan batang. Mealy Bug menyerang tanaman dengan cara menghisap cairan pada benda yang ditempelinya. Akibat serangannya, daun menjadi rusak dan pertumbuhan daun maupun tunas terhenti.', ' 1. Hama ini menyukai tempat yang lembap, karena itu jika ditemui gejala segera renggakan jarak antar tanaman agar sinar matahari bisa masuk.\n<br> 2. Jika serangan masih ringan, penanggulangannyadilakukan dengan memotong dan membuang pucuk daun yang terserang. </br>\n<br> 3. Jika serangan sudah cukup berat dapat dilakukan penyemprotan dengan insektisida, seperti Klopirifos, pegasus, Dimacide atau Malathion. Dosis yang diberikan separuh dari dosis anjuran. Lakukan penyemprotan 2-3 kali/minggu.', ''),
(7, 'P007', 'Root Mealy Bug', 'Penyakit ini disebabkan oleh serangga seperti kutu rambut dan berwarna putih. Hama ini menyerang media tanam sehingga sulit dideteksi karena tidak tampak. Penyebab serangan ini biasanya adalah kondisi media ynag kurang bersih dan terlalu lembab.', 'Penanggulangan Hama ini adalah dengan membongkar tanaman dan mengganti media tanam baru dan bersih. Namun, sebelumnya akar dan media tanam disemprot insektisida.', ''),
(8, 'P008', 'Nematoda', 'Umumnya nematoda terdapat di media tanam yang sering dipupuk kandang. Kerusakan tanaman pada tingkat yang parah disebabkan oleh sekresi air ludah yang diinjeksikan ke dalam tanaman saat nematoda menggigit atau memakan tanaman.', 'Tanaman yang terserang segera dipisahkan dan dicabut dari pot. cuci. cuci tanamandibawah air mengalir. Buang semua akar serabut dan potong akar yang busuk. Rendam akar hingga pangkal akar selama 0,5 jam dalam larutan nematisida atau insektisida. kemudian angkat dan kering anginkan 1-2 minggu. Tanam kembali dengan media baru dan steril.', ''),
(9, 'P009', 'Cendawan Phomopsis', 'Penyakit yang menyerang permukaan daun ini sering muncul saat musim hujan. ', '1. Musnahkan segera daun yang sudah terkena gejala.\nHindari penyiraman langsung pada tanaman. Jika ingin menyiram langsung pada daun, lakukan pada pagi hari saat sinar matahari penuh sehingga permukaan daun segera mengering.\n\n<br> 2. Jaga kebersihan lingkungan terutama pada musim hujan. Segera singkirkan daun dan bunga yang sudah rontok, jangan biarkan menumpuk dan melapuk disekitar tanaman.</br>\n\n<br> 3. Pengendalian kimiawi gunakan:fungsida berbahan aktif mankozeb, klorotalonil, dann kaptan seperti Manzate danconil, dan ortohicide dosis 1gr/liter air</br>', ''),
(10, 'P010', 'Cendawan Fusarium (Layu Pucuk)', 'Penyakit ini disebabkan oleh jamur Fusarium sp, pucuk yang terkena penyakit ini tidak mau bertunas lagi.', '1. Pengendalian mekanis: karena sifat penyebarannya yang sangat cepat dianjurkan untuk memangkas bagian yang terkena. Oleskan fungisida pada luka potongan.\n\n<br> 2. Pengendalian kimia: dengan aplikasi fungsida berbahan aktif mankozeb, klorotalonil dan kaptan seperti manzate, deconil, dan orthocide.</br>', ''),
(11, 'P011', 'Layu Kuning', 'Penyakit ini dikarenakan penyiraman yang berlebihan dan drainase tanah atau media tanam kurang baik.', ' 1. Media tanam atau struktur tanah dibuat menjadi porous, supaya air mengalir dengan lancar \n<br> 2. Jangan menyiram tanaman terlalu banyak. </br>', ''),
(12, 'P012', 'Busuk Akar', 'Penyakit ini disebabkan oleh penyiraman yang berlebihan dan drainase yang tidak baik.', '1. Mengurangi volume dan frekuensi penyiraman. Karena penyiraman yang terlalu sering akan mengakibatkan media tanam menjadi lembab dan akar membusuk. \n<br> 2. Bagian akar yang membusuk dipotong dengan pisau steril dan diolesi dengan zat perangsang akar. kemudian tanaman ditanam kembali dengan media tanam yang baru dan bersih serta telah disemprot dengan Dagonil, Monsote atau pestisida yang lain dengan dosis 1 cc/ 1 liter air.. </br>\n', '');

-- --------------------------------------------------------

--
-- Table structure for table `tb_penyebab`
--

CREATE TABLE IF NOT EXISTS `tb_penyebab` (
  `id_penyebab` int(11) NOT NULL AUTO_INCREMENT,
  `kode_penyebab` varchar(11) NOT NULL,
  `nm_penyebab` text,
  PRIMARY KEY (`id_penyebab`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=12 ;

--
-- Dumping data for table `tb_penyebab`
--

INSERT INTO `tb_penyebab` (`id_penyebab`, `kode_penyebab`, `nm_penyebab`) VALUES
(1, 'S001', 'Ulat atau Larva Lepidoptera'),
(2, 'S002', 'Semacam kutu berwarna hitam'),
(3, 'S003', 'tetranynchus cinnacinaborinus (red spider mite) tetranynchus urticae (twospooted spider mite ) sejenis tungau berwarna merah, kuning muda, hijau muda, coklat muda dan hitam'),
(4, 'S004', 'Thisanoptera (Tripidae) sejenis kutu berwana hitam yang bergerak sangat cepat'),
(5, 'S005', 'Diptera (Sciaridae) semacam larva berwarna hitam bening, jika dewasa seperti nyamuk berwarna hitam'),
(6, 'S006', 'Kutu berwarna putih yang memiliki seperti tepung di tubuhnya'),
(7, 'S007', 'Seperti kutu rambut berwarna putih'),
(8, 'S008', 'Jamur Fusarium Sp'),
(9, 'S009', 'Penyiraman yang belebihan'),
(10, 'S010', 'cacing nematoda biasanya terdapat pada pupuk kandang'),
(11, 'S011', 'Cendawan');

-- --------------------------------------------------------

--
-- Table structure for table `tb_rek_jenis`
--

CREATE TABLE IF NOT EXISTS `tb_rek_jenis` (
  `id_rek_jenis` int(11) NOT NULL AUTO_INCREMENT,
  `kode_ciri` varchar(200) NOT NULL,
  `kode_jenis` varchar(11) NOT NULL,
  PRIMARY KEY (`id_rek_jenis`),
  KEY `id_ciri` (`kode_ciri`,`kode_jenis`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=9 ;

--
-- Dumping data for table `tb_rek_jenis`
--

INSERT INTO `tb_rek_jenis` (`id_rek_jenis`, `kode_ciri`, `kode_jenis`) VALUES
(1, 'C003.C013.C034.C037.C019.C021.C025.C026.C031.C039', 'J001'),
(2, 'C001.C007.C033.C035.C036.C020.C022.C032', 'J002'),
(3, 'C002.C008.C033.C020.C021.C024.C028', 'J003'),
(4, 'C001.C013.C031.C042.C043', 'J004'),
(5, 'C005.C017.C018.C033.C035.C038.C030.C022.C029.C031.C039', 'J005'),
(6, 'C002.C006.C011.C012.C021.C027', 'J006'),
(7, 'C002.C009.C011.C016.C033.C040', 'J007'),
(8, 'C004.C010.C014.C015.C034.C022.C028.C032', 'J008');

-- --------------------------------------------------------

--
-- Table structure for table `tb_rek_penyakit`
--

CREATE TABLE IF NOT EXISTS `tb_rek_penyakit` (
  `id_rek_penyakit` int(11) NOT NULL AUTO_INCREMENT,
  `kode_gejala` varchar(200) DEFAULT NULL,
  `kode_penyakit` varchar(200) DEFAULT NULL,
  `kode_penyebab` varchar(200) DEFAULT NULL,
  `kode_obat` varchar(200) DEFAULT NULL,
  PRIMARY KEY (`id_rek_penyakit`),
  KEY `id_gejala` (`kode_gejala`,`kode_penyakit`,`kode_penyebab`,`kode_obat`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=12 ;

--
-- Dumping data for table `tb_rek_penyakit`
--

INSERT INTO `tb_rek_penyakit` (`id_rek_penyakit`, `kode_gejala`, `kode_penyakit`, `kode_penyebab`, `kode_obat`) VALUES
(1, 'G001.G015', 'P001', 'S001', 'K010'),
(2, 'G001.G002.G004.G005', 'P002', 'S002', 'K005'),
(3, 'G018.G019.G021.G006', 'P003', 'S004', 'K004.K005.K006'),
(4, 'G023.G003.G006.G008.G012.G013.G014', 'P004', 'S003', 'K001.K002.K003'),
(5, 'G017.G020.G033', 'P005', 'S005', 'K004.K007.K008.K009'),
(6, 'G022.G008.G016', 'P006', 'S006', 'K006.K007.K008'),
(7, 'G022.G023.G016.G029', 'P007', 'S007', 'K007.K008'),
(8, 'G018.G027.G028.G003.G006.G032', 'P008', 'S010', 'K007'),
(9, 'G003.G006.G007', 'P009', 'S011', 'K011.K012.K013'),
(10, 'G005.G009.G011', 'P010', 'S008', 'K011.K012.K013'),
(11, 'G019.G020.G026.G027.G005.G006.G007', 'P013', 'S011', 'K009');

-- --------------------------------------------------------

--
-- Table structure for table `tb_user`
--

CREATE TABLE IF NOT EXISTS `tb_user` (
  `id_user` int(11) NOT NULL AUTO_INCREMENT,
  `username` text NOT NULL,
  `user_display` text,
  `password` text NOT NULL,
  PRIMARY KEY (`id_user`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=4 ;

--
-- Dumping data for table `tb_user`
--

INSERT INTO `tb_user` (`id_user`, `username`, `user_display`, `password`) VALUES
(1, 'admin', 'Administrator', '21232f297a57a5a743894a0e4a801fc3'),
(3, 'adenium', 'Admin Adenium', '21232f297a57a5a743894a0e4a801fc3');

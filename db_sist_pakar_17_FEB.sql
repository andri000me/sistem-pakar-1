/*
SQLyog Enterprise - MySQL GUI v7.15 
MySQL - 5.1.32-community : Database - adenium
*********************************************************************
*/

/*!40101 SET NAMES utf8 */;

/*!40101 SET SQL_MODE=''*/;

/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;

CREATE DATABASE /*!32312 IF NOT EXISTS*/`adenium` /*!40100 DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci */;

USE `adenium`;

/*Table structure for table `tb_bagian` */

DROP TABLE IF EXISTS `tb_bagian`;

CREATE TABLE `tb_bagian` (
  `id_bagian` int(11) NOT NULL AUTO_INCREMENT,
  `kode_bagian` varchar(11) NOT NULL,
  `nm_bagian` varchar(20) NOT NULL,
  PRIMARY KEY (`id_bagian`)
) ENGINE=MyISAM AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;

/*Data for the table `tb_bagian` */

insert  into `tb_bagian`(`id_bagian`,`kode_bagian`,`nm_bagian`) values (1,'B001','bunga'),(2,'B002','batang'),(3,'B003','daun'),(4,'B004','akar'),(5,'B005','bonggol');

/*Table structure for table `tb_buku_tamu` */

DROP TABLE IF EXISTS `tb_buku_tamu`;

CREATE TABLE `tb_buku_tamu` (
  `id_bk_tamu` int(11) NOT NULL AUTO_INCREMENT,
  `nama` varchar(30) NOT NULL,
  `email` varchar(30) NOT NULL,
  `komentar` text NOT NULL,
  PRIMARY KEY (`id_bk_tamu`)
) ENGINE=MyISAM AUTO_INCREMENT=6 DEFAULT CHARSET=utf8;

/*Data for the table `tb_buku_tamu` */

insert  into `tb_buku_tamu`(`id_bk_tamu`,`nama`,`email`,`komentar`) values (1,'ucy','fdgh@gmail.com','								jfdkfkdj				'),(2,'adit','adit@gmail.com','				waaaaa asiiiikkkkk'),(3,'gfdg','aaa@hhh.com','dfgdfgdfg	'),(4,'cbcb','aaa@hhh.com','cvbc				'),(5,'ffff','aaa@hhh.com','aaaaaaaaaaaaaa								');

/*Table structure for table `tb_ciri` */

DROP TABLE IF EXISTS `tb_ciri`;

CREATE TABLE `tb_ciri` (
  `id_ciri` int(11) NOT NULL,
  `kode_ciri` varchar(11) NOT NULL,
  `nm_ciri` varchar(150) NOT NULL,
  `kode_bagian` varchar(5) NOT NULL,
  `gbr_ciri` varchar(100) DEFAULT '',
  PRIMARY KEY (`id_ciri`),
  KEY `id_bagian` (`kode_bagian`)
) ENGINE=MyISAM AUTO_INCREMENT=40 DEFAULT CHARSET=latin1;

/*Data for the table `tb_ciri` */

insert  into `tb_ciri`(`id_ciri`,`kode_ciri`,`nm_ciri`,`kode_bagian`,`gbr_ciri`) values (1,'C001','lebar bunga 4 cm','B001',''),(2,'C002','lebar bunga 5 cm','B001',NULL),(3,'C030','daun berwarna hijau kecoklatan','B003',NULL),(4,'C003','lebar bunga 6 cm','B001',NULL),(5,'C004','lebar bunga 7 cm','B001',NULL),(6,'C005','lebar bunga 11 cm','B001',NULL),(7,'C006','bunga berwarna putih dengan tepi merah','B001',NULL),(8,'C007','bunga berwarna putih dengan trepi merah muda','B001',NULL),(9,'C008','bunga berwarna merah pucat','B001',NULL),(10,'C009','bunga berwarna merah tua','B001',NULL),(11,'C010','bunga berwarna merah muda','B001',NULL),(12,'C011','bunga berbentuk bintang','B001',NULL),(13,'C012','kelopak bubga agak lancip','B001',NULL),(14,'C013','bunga berwarna merah muda dengan corong putih','B001',NULL),(15,'C014','bunga berwarna ungu muda','B001',NULL),(16,'C015','bunga berwarna magenta','B001',NULL),(17,'C016','terdapat strip di pinggir bunga menuju corong','B001',NULL),(18,'C017','bentuk bunga bulat','B001',NULL),(19,'C018','ujung petal bunga lancip','B001',NULL),(20,'C019','daun memanjangh dan membulat diujung','B003',NULL),(21,'C020','daun besar dan lebar','B003',NULL),(22,'C021','daun berwarna hijau muda','B003',NULL),(23,'C022','daun berwarna hijau tua','B003',NULL),(24,'C023','urat daun putih menonjol','B003',NULL),(25,'C024','daun paling lebar','B003',NULL),(26,'C025','daun tebal dan bulat','B003',NULL),(27,'C026','daun beasr dan agak lonjong','B003',NULL),(28,'C027','daun bulat membentuk mangkok','B003',NULL),(29,'C028','daun berbentuk lanset dan panjang','B003',NULL),(30,'C029','daun berbentuk bulat dan panjang','B003',NULL),(31,'C031','daun mengkilap','B003',NULL),(32,'C032','Daun berbulu halus','B003',NULL),(33,'C033','berbatang panjang','B002',NULL),(34,'C034','berbatang pendek','B002',NULL),(35,'C035','banyak terdapat cabang','B002',NULL),(36,'C036','warna batang coklat keabuan','B002',NULL),(37,'C037','batang tumbuh menebal dari bawah dan semakin mengecil ke atas','B002',NULL),(38,'C038','batang berwarna coklat','B002',NULL),(39,'C039','berbonggol besar','B005',NULL),(40,'C040','Ciri Ke empat puluh','B003',NULL);

/*Table structure for table `tb_gejala` */

DROP TABLE IF EXISTS `tb_gejala`;

CREATE TABLE `tb_gejala` (
  `id_gejala` int(11) NOT NULL,
  `kode_gejala` varchar(11) NOT NULL,
  `kode_bagian` varchar(11) NOT NULL,
  `nm_gejala` varchar(150) NOT NULL,
  `gbr_gejala` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`id_gejala`)
) ENGINE=MyISAM AUTO_INCREMENT=35 DEFAULT CHARSET=latin1;

/*Data for the table `tb_gejala` */

insert  into `tb_gejala`(`id_gejala`,`kode_gejala`,`kode_bagian`,`nm_gejala`,`gbr_gejala`) values (1,'G001','B003','daun muda habis ditelan bumi',''),(2,'G002','B003','tunas daun kering',''),(3,'G003','B003','daun berwarna kuning',''),(4,'G004','B003','daun mengering',''),(5,'G005','B003','tunas daun hitam',''),(6,'G006','B003','daun rontok',''),(31,'G007','B003','terdapat bercak coklat pada daun',''),(8,'G008','B003','terdapat bercak hitam pada daun',''),(9,'G009','B003','pucuk daun busuk tapi tidak bau',''),(10,'G010','B003','tangkai daun coklat',''),(11,'G011','B003','daun tidak mau bertunas',''),(12,'G012','B003','warna daun pucat',''),(13,'G013','B003','daun layu',''),(14,'G014','B003','daun berubah menjadi coklat pada daun',''),(15,'G015','B003','daun mudah sobek dari pinggir',''),(16,'G016','B003','terdapat kutu berwarna putih di sekitar  ketiak daun',''),(17,'G017','B001','bunga gagal mekar','work-at-home-picture-300x300.jpg'),(18,'G018','B001','kuncup bunga rontok','business_meeting2.jpg'),(19,'G019','B001','bunga tumbuh tidak sempurna','1220651452ZE5hFu.jpg'),(20,'G020','B001','kuncup bunga ada bercak coklat',''),(21,'G021','B001','kuncup bunga bengkok lalu gugu',''),(22,'G022','B002','pertumbuhan batang terhambat',''),(23,'G023','B002','pucuk batang tampak mengering',''),(24,'G024','B002','batang berwarna kekuningan',''),(25,'G025','B002','pangkal batang membusuk','kucing-anjing.jpg'),(26,'G026','B002','batang berwarna coklat kehitam',''),(27,'G027','B002','batang dipegang tersa lunak',''),(28,'G028','B002','kulit batang terlihat kisut terkadang berlubang',''),(29,'G029','B004','akar menjadi busuk',''),(30,'G030','B001','sdfsdfs','');

/*Table structure for table `tb_jenis` */

DROP TABLE IF EXISTS `tb_jenis`;

CREATE TABLE `tb_jenis` (
  `id_jenis` int(11) NOT NULL AUTO_INCREMENT,
  `kode_jenis` varchar(11) NOT NULL,
  `tipe` varchar(11) DEFAULT NULL,
  `kel` varchar(11) DEFAULT NULL,
  `nm_jenis` varchar(50) DEFAULT NULL,
  `keterangan` text,
  `gbr_jenis` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`id_jenis`)
) ENGINE=MyISAM AUTO_INCREMENT=17 DEFAULT CHARSET=latin1;

/*Data for the table `tb_jenis` */

insert  into `tb_jenis`(`id_jenis`,`kode_jenis`,`tipe`,`kel`,`nm_jenis`,`keterangan`,`gbr_jenis`) values (1,'J001','indukan','jantan','Adenium Obesum','di habitatnya yakni sebelah selatan Gurun sahara sosok tanaman ini berbentuk semak yang besar, kaku dan tinggi. Namun setelah \"melanglang buana\" termasuk di Indonesia, sosoknya menjadi berbentuk semak pendek yang kelihatan ','beagle-anak-anjing-dijual-bandung_(1).jpg'),(2,'J002','indukan','betina','Adenium Arabicum','bla bla bla bala bla bla bla',''),(4,'J004','indukan','jantan','Adenium Coetaneum','chjhcud huhudyu huchduc suduysdy duyduydu',''),(5,'J005','indukan','betina','Adenium socrotanum','shdystyd dytydgt yudgfuydguf gdygfysdg',''),(6,'J006','indukan','jantan','Adenium Multiflorum','hsydusfu udfhudyfue fdugfiusfs udfiudhfudh dufuh',''),(7,'J007','indukan','betina','Adenium Somalense','jdsudfysuf dufydufyudsfy dufyduyus fudshvyus',''),(8,'J008','indukan','jantan','Adenium Swazicum','dufhyriugt gudrhuidughuu  huhtgu',''),(9,'J009','anakan',NULL,'Anak Pertama','','26_business-on-line-belajar-internet-marketing.jpg'),(10,'J010','anakan',NULL,'Anak Kedua','',NULL),(11,'J011','anakan',NULL,'Anak Siapa','',NULL),(12,'J012','anakan',NULL,'Anakan','',NULL);

/*Table structure for table `tb_kawin_silang` */

DROP TABLE IF EXISTS `tb_kawin_silang`;

CREATE TABLE `tb_kawin_silang` (
  `id_silang` int(11) NOT NULL AUTO_INCREMENT,
  `kode_jantan` varchar(11) NOT NULL,
  `kode_betina` varchar(11) NOT NULL,
  `kode_hasil` varchar(100) NOT NULL,
  `keterangan` text NOT NULL,
  PRIMARY KEY (`id_silang`),
  KEY `fkjenis_jantan` (`kode_jantan`),
  KEY `fkjenis_betina` (`kode_betina`)
) ENGINE=MyISAM AUTO_INCREMENT=8 DEFAULT CHARSET=utf8;

/*Data for the table `tb_kawin_silang` */

insert  into `tb_kawin_silang`(`id_silang`,`kode_jantan`,`kode_betina`,`kode_hasil`,`keterangan`) values (1,'J001','J002','J009.J010',''),(2,'J001','J005','J010.J011.J012','dddddddddddddd'),(3,'J001','J007','J012',''),(4,'J006','J005','J009.J010.J012','sdfdsfsdfsdf'),(5,'J001','J001','J009.J010.J011.J012','dddddddddddddddddddddddddddddddd');

/*Table structure for table `tb_konten` */

DROP TABLE IF EXISTS `tb_konten`;

CREATE TABLE `tb_konten` (
  `id_konten` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `konten` text COLLATE utf8_unicode_ci,
  `page` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `image` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `image_thumb` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id_konten`)
) ENGINE=MyISAM AUTO_INCREMENT=29 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

/*Data for the table `tb_konten` */

insert  into `tb_konten`(`id_konten`,`title`,`konten`,`page`,`image`,`image_thumb`) values (7,'Profil','<p>Adenium adalah Sed quia consequuntur magni dolores eos cum soluta nobis est eligendi optio omnis dolor repellendus. Neque porro quisquam est, excepturi sint occaecati cupiditate non provident, nemo enim ipsam voluptatem. Ut aut reiciendis voluptatibus maiores alias consectetur, adipisci velit, cum soluta nobis est eligendi optio. Id est laborum et dolorum fuga.</p>\n<p>Accusantium doloremque laudantium, tempora incidunt ut labore et dolore qui dolorem ipsum quia dolor sit amet. Itaque earum rerum hic tenetur a sapiente delectus, id quod maxime placeat facere possimus, eaque ipsa quae ab illo inventore veritatis. Iste natus error sit voluptatem et quasi architecto beatae vitae nemo enim ipsam voluptatem. At vero eos et accusamus et iusto odio totam rem aperiam, quia voluptas sit aspernatur. Cum soluta nobis est eligendi optio similique sunt in culpa qui officia deserunt mollitia animi, iste natus error sit voluptatem.</p>\n<p>Consectetur, adipisci velit, qui in ea voluptate et expedita distinctio. Et quasi architecto beatae vitae praesentium voluptatum deleniti omnis voluptas assumenda est. Excepturi sint occaecati cupiditate non provident, vel illum qui dolorem eum fugiat cumque nihil impedit quo minus. Totam rem aperiam, ut enim ad minima veniam, qui ratione voluptatem sequi nesciunt.</p>\n<p>Sed quia non numquam eius modi aut odit aut fugit, omnis voluptas assumenda est. Sed ut perspiciatis unde omnis dignissimos ducimus qui blanditiis sed quia consequuntur magni dolores eos. Qui ratione voluptatem sequi nesciunt. Vel illum qui dolorem eum fugiat sed quia non numquam eius modi totam rem aperiam. Similique sunt in culpa qui officia deserunt mollitia animi, iste natus error sit voluptatem aut odit aut fugit.</p>\n','profil','',''),(8,'Selamat Datang','<p>Accusantium doloremque laudantium, tempora incidunt ut labore et dolore qui dolorem ipsum quia dolor sit amet. Itaque earum rerum hic tenetur a sapiente delectus, id quod maxime placeat facere possimus, eaque ipsa quae ab illo inventore veritatis. Iste natus error sit voluptatem et quasi architecto beatae vitae nemo enim ipsam voluptatem. At vero eos et accusamus et iusto odio totam rem aperiam, quia voluptas sit aspernatur. Cum soluta nobis est eligendi optio similique sunt in culpa qui officia deserunt mollitia animi, iste natus error sit voluptatem.</p>\n<p>Consectetur, adipisci velit, qui in ea voluptate et expedita distinctio. Et quasi architecto beatae vitae praesentium voluptatum deleniti omnis voluptas assumenda est. Excepturi sint occaecati cupiditate non provident, vel illum qui dolorem eum fugiat cumque nihil impedit quo minus. Totam rem aperiam, ut enim ad minima veniam, qui ratione voluptatem sequi nesciunt.</p>\n<p>Sed quia non numquam eius modi aut odit aut fugit, omnis voluptas assumenda est. Sed ut perspiciatis unde omnis dignissimos ducimus qui blanditiis sed quia consequuntur magni dolores eos. Qui ratione voluptatem sequi nesciunt. Vel illum qui dolorem eum fugiat sed quia non numquam eius modi totam rem aperiam. Similique sunt in culpa qui officia deserunt mollitia animi, iste natus error sit voluptatem aut odit aut fugit.</p>','depan','',''),(9,'Tips Pertama','Eu fugiat nulla pariatur. Velit esse cillum dolore ut aliquip ex ea commodo consequat. Excepteur sint occaecat ullamco laboris nisi quis nostrud exercitation.\n\nConsectetur adipisicing elit, ut labore et dolore magna aliqua. Qui officia deserunt ut aliquip ex ea commodo consequat. Lorem ipsum dolor sit amet, sunt in culpa in reprehenderit in voluptate. Duis aute irure dolor consectetur adipisicing elit, quis nostrud exercitation.\n\nLorem ipsum dolor sit amet. Ut labore et dolore magna aliqua. Sed do eiusmod tempor incididunt consectetur adipisicing elit, sunt in culpa. Ut aliquip ex ea commodo consequat.\n\nEu fugiat nulla pariatur. Velit esse cillum dolore ut aliquip ex ea commodo consequat. Excepteur sint occaecat ullamco laboris nisi quis nostrud exercitation.\n\nConsectetur adipisicing elit, ut labore et dolore magna aliqua. Qui officia deserunt ut aliquip ex ea commodo consequat. Lorem ipsum dolor sit amet, sunt in culpa in reprehenderit in voluptate. Duis aute irure dolor consectetur adipisicing elit, quis nostrud exercitation.\n\nLorem ipsum dolor sit amet. Ut labore et dolore magna aliqua. Sed do eiusmod tempor incididunt consectetur adipisicing elit, sunt in culpa. Ut aliquip ex ea commodo consequat.\n\n','tips','',''),(10,'Tips Kedua','Sed do eiusmod tempor incididunt ullamco laboris nisi quis nostrud exercitation. Eu fugiat nulla pariatur. Velit esse cillum dolore ut enim ad minim veniam, ut aliquip ex ea commodo consequat.\n\nUt labore et dolore magna aliqua. Consectetur adipisicing elit, duis aute irure dolor velit esse cillum dolore. Cupidatat non proident, sunt in culpa ullamco laboris nisi.\n\n','tips','',''),(11,'Tips Ketiga','Eu fugiat nulla pariatur. Velit esse cillum dolore ut enim ad minim veniam, excepteur sint occaecat. Ut labore et dolore magna aliqua. Sed do eiusmod tempor incididunt mollit anim id est laborum.\n\nConsectetur adipisicing elit, in reprehenderit in voluptate lorem ipsum dolor sit amet. Sunt in culpa sed do eiusmod tempor incididunt cupidatat non proident. Duis aute irure dolor quis nostrud exercitation ut labore et dolore magna aliqua. Mollit anim id est laborum. Ut enim ad minim veniam, excepteur sint occaecat ut labore et dolore magna aliqua.\n\nQuis nostrud exercitation sed do eiusmod tempor incididunt eu fugiat nulla pariatur. Ullamco laboris nisi qui officia deserunt sunt in culpa. Ut enim ad minim veniam, excepteur sint occaecat ut aliquip ex ea commodo consequat.\n\nSed do eiusmod tempor incididunt eu fugiat nulla pariatur. Duis aute irure dolor qui officia deserunt lorem ipsum dolor sit amet. Eu fugiat nulla pariatur.\n\n','tips','',''),(12,'Budidaya Vegetatif Cara Stek Batang','Lorem ipsum dolor sit amet, ullamco laboris nisi cupidatat non proident. In reprehenderit in voluptate ut labore et dolore magna aliqua. Sunt in culpa velit esse cillum dolore duis aute irure dolor.\n\nUt aliquip ex ea commodo consequat. Quis nostrud exercitation excepteur sint occaecat ullamco laboris nisi. Eu fugiat nulla pariatur. Consectetur adipisicing elit, qui officia deserunt velit esse cillum dolore. Mollit anim id est laborum.\n\nDuis aute irure dolor consectetur adipisicing elit, in reprehenderit in voluptate. Excepteur sint occaecat ut labore et dolore magna aliqua. Mollit anim id est laborum. Lorem ipsum dolor sit amet, eu fugiat nulla pariatur. Duis aute irure dolor quis nostrud exercitation sed do eiusmod tempor incididunt.\n\nMollit anim id est laborum. In reprehenderit in voluptate ut enim ad minim veniam, ullamco laboris nisi. Eu fugiat nulla pariatur. Lorem ipsum dolor sit amet. Quis nostrud exercitation consectetur adipisicing elit, ut aliquip ex ea commodo consequat.\n\nVelit esse cillum dolore eu fugiat nulla pariatur. Mollit anim id est laborum. Qui officia deserunt cupidatat non proident, sed do eiusmod tempor incididunt. In reprehenderit in voluptate lorem ipsum dolor sit amet, duis aute irure dolor. Quis nostrud exercitation excepteur sint occaecat sunt in culpa.\n\n','vegetatif','img_679_20110217.jpg','img_679_20110217_150x150.jpg'),(13,'Budidaya cara Vegetatif Stek Akar','Duis aute irure dolor consectetur adipisicing elit, in reprehenderit in voluptate. Excepteur sint occaecat ut labore et dolore magna aliqua. Mollit anim id est laborum. Lorem ipsum dolor sit amet, eu fugiat nulla pariatur. Duis aute irure dolor quis nostrud exercitation sed do eiusmod tempor incididunt.\n\nMollit anim id est laborum. In reprehenderit in voluptate ut enim ad minim veniam, ullamco laboris nisi. Eu fugiat nulla pariatur. Lorem ipsum dolor sit amet. Quis nostrud exercitation consectetur adipisicing elit, ut aliquip ex ea commodo consequat.\n\nVelit esse cillum dolore eu fugiat nulla pariatur. Mollit anim id est laborum. Qui officia deserunt cupidatat non proident, sed do eiusmod tempor incididunt. In reprehenderit in voluptate lorem ipsum dolor sit amet, duis aute irure dolor. Quis nostrud exercitation excepteur sint occaecat sunt in culpa.','vegetatif','img_474_20110214.jpg','img_474_20110214_150x150.jpg'),(14,'Budidaya cara Vegetatif Cangkok','Duis aute irure dolor consectetur adipisicing elit, in reprehenderit in voluptate. Excepteur sint occaecat ut labore et dolore magna aliqua. Mollit anim id est laborum. Lorem ipsum dolor sit amet, eu fugiat nulla pariatur. Duis aute irure dolor quis nostrud exercitation sed do eiusmod tempor incididunt.\n\nMollit anim id est laborum. In reprehenderit in voluptate ut enim ad minim veniam, ullamco laboris nisi. Eu fugiat nulla pariatur. Lorem ipsum dolor sit amet. Quis nostrud exercitation consectetur adipisicing elit, ut aliquip ex ea commodo consequat.\n\nVelit esse cillum dolore eu fugiat nulla pariatur. Mollit anim id est laborum. Qui officia deserunt cupidatat non proident, sed do eiusmod tempor incididunt. In reprehenderit in voluptate lorem ipsum dolor sit amet, duis aute irure dolor. Quis nostrud exercitation excepteur sint occaecat sunt in culpa.','vegetatif','',''),(15,'Budidaya cara Vegetatif Sambung','Duis aute irure dolor consectetur adipisicing elit, in reprehenderit in voluptate. Excepteur sint occaecat ut labore et dolore magna aliqua. Mollit anim id est laborum. Lorem ipsum dolor sit amet, eu fugiat nulla pariatur. Duis aute irure dolor quis nostrud exercitation sed do eiusmod tempor incididunt.\n\nMollit anim id est laborum. In reprehenderit in voluptate ut enim ad minim veniam, ullamco laboris nisi. Eu fugiat nulla pariatur. Lorem ipsum dolor sit amet. Quis nostrud exercitation consectetur adipisicing elit, ut aliquip ex ea commodo consequat.\n\nVelit esse cillum dolore eu fugiat nulla pariatur. Mollit anim id est laborum. Qui officia deserunt cupidatat non proident, sed do eiusmod tempor incididunt. In reprehenderit in voluptate lorem ipsum dolor sit amet, duis aute irure dolor. Quis nostrud exercitation excepteur sint occaecat sunt in culpa.','vegetatif','img_548_20110214.jpg','img_548_20110214_150x150.jpg'),(16,'Budidaya Generatif','Lorem ipsum dolor sit amet, ullamco laboris nisi cupidatat non proident. In reprehenderit in voluptate ut labore et dolore magna aliqua. Sunt in culpa velit esse cillum dolore duis aute irure dolor.\n\nUt aliquip ex ea commodo consequat. Quis nostrud exercitation excepteur sint occaecat ullamco laboris nisi. Eu fugiat nulla pariatur. Consectetur adipisicing elit, qui officia deserunt velit esse cillum dolore. Mollit anim id est laborum.\n\nDuis aute irure dolor consectetur adipisicing elit, in reprehenderit in voluptate. Excepteur sint occaecat ut labore et dolore magna aliqua. Mollit anim id est laborum. Lorem ipsum dolor sit amet, eu fugiat nulla pariatur. Duis aute irure dolor quis nostrud exercitation sed do eiusmod tempor incididunt.\n\nMollit anim id est laborum. In reprehenderit in voluptate ut enim ad minim veniam, ullamco laboris nisi. Eu fugiat nulla pariatur. Lorem ipsum dolor sit amet. Quis nostrud exercitation consectetur adipisicing elit, ut aliquip ex ea commodo consequat.\n\nVelit esse cillum dolore eu fugiat nulla pariatur. Mollit anim id est laborum. Qui officia deserunt cupidatat non proident, sed do eiusmod tempor incididunt. In reprehenderit in voluptate lorem ipsum dolor sit amet, duis aute irure dolor. Quis nostrud exercitation excepteur sint occaecat sunt in culpa.\n\n','generatif','',''),(17,'Budidaya Kawin Silang','Lorem ipsum dolor sit amet, ullamco laboris nisi cupidatat non proident. In reprehenderit in voluptate ut labore et dolore magna aliqua. Sunt in culpa velit esse cillum dolore duis aute irure dolor.\n\nUt aliquip ex ea commodo consequat. Quis nostrud exercitation excepteur sint occaecat ullamco laboris nisi. Eu fugiat nulla pariatur. Consectetur adipisicing elit, qui officia deserunt velit esse cillum dolore. Mollit anim id est laborum.\n\nDuis aute irure dolor consectetur adipisicing elit, in reprehenderit in voluptate. Excepteur sint occaecat ut labore et dolore magna aliqua. Mollit anim id est laborum. Lorem ipsum dolor sit amet, eu fugiat nulla pariatur. Duis aute irure dolor quis nostrud exercitation sed do eiusmod tempor incididunt.\n\nMollit anim id est laborum. In reprehenderit in voluptate ut enim ad minim veniam, ullamco laboris nisi. Eu fugiat nulla pariatur. Lorem ipsum dolor sit amet. Quis nostrud exercitation consectetur adipisicing elit, ut aliquip ex ea commodo consequat.\n\nVelit esse cillum dolore eu fugiat nulla pariatur. Mollit anim id est laborum. Qui officia deserunt cupidatat non proident, sed do eiusmod tempor incididunt. In reprehenderit in voluptate lorem ipsum dolor sit amet, duis aute irure dolor. Quis nostrud exercitation excepteur sint occaecat sunt in culpa.\n\n','kawin-silang','',''),(25,'Gambar Obur ubur','Gambar Obur ubur','galery','img_105_20110118.jpg','img_105_20110118_150x150.jpg'),(23,'Gambar Koala','Gambar Koala','galery','img_653_20110118.jpg','img_653_20110118_150x150.jpg'),(24,'Gambar Pinguin','Gambar Pinguin','galery','img_220_20110118.jpg','img_220_20110118_150x150.jpg'),(26,'Gambar Kembang','Gambar Kembang','galery','img_116_20110118.jpg','img_116_20110118_150x150.jpg'),(27,'Gmbar Hmmmmm Prisasaaaa','Gmbar Hmmmmm Prisasaaaa','galery','img_792_20110118.jpg','img_792_20110118_150x150.jpg'),(28,'Gambar Lagi Hahhh aaa','Ini adalah gambar yang tidak jelas','galery','img_834_20110118.jpg','img_834_20110118_150x150.jpg');

/*Table structure for table `tb_obat` */

DROP TABLE IF EXISTS `tb_obat`;

CREATE TABLE `tb_obat` (
  `id_obat` int(11) NOT NULL AUTO_INCREMENT,
  `kode_obat` varchar(11) NOT NULL,
  `nm_obat` varchar(50) DEFAULT NULL,
  `pemakaian` varchar(200) DEFAULT NULL,
  PRIMARY KEY (`id_obat`)
) ENGINE=MyISAM AUTO_INCREMENT=15 DEFAULT CHARSET=latin1;

/*Data for the table `tb_obat` */

insert  into `tb_obat`(`id_obat`,`kode_obat`,`nm_obat`,`pemakaian`) values (1,'K001','kelthane (dikofol)','penggunaan denagn konsentrasi 0,5 ml - 1 ml / liter air'),(2,'K002','mitac (amitraz)','penggunaan denagn konsentrasi 0,5 ml - 1 ml / liter air'),(3,'K003','demiter (piridaben)','penggunaan denagn konsentrasi 0,5 ml / liter air'),(4,'K004','agrimex (abamektin)','penggunaan denagn konsentrasi 0,5 ml / liter air'),(5,'K005','confidor (imidakloprid)','penggunaan denagn konsentrasi 0,5 ml / liter air'),(6,'K006','pegasus (diafentiuron)','penggunaan denagn konsentrasi 0,5 ml - 1 ml / liter air'),(7,'K007','doazinon','penggunaan denagn konsentrasi 1 ml / liter air'),(8,'K008','dursban(kloropirifus)','penggunaan denagn konsentrasi 1 ml / liter air'),(9,'K009','trigard (siromazin)','penggunaan denagn konsentrasi 0,15 ml - 0,30 ml / liter air'),(10,'K010','sevin','disemprot menggunakan sevin. jika ulat yang menyerang jumlahnya masih sedikit penagannanya dengan diambil satu per satu lalu dibunuh'),(11,'K011','manzate (mankozeb)','penggunaan denagn konsentrasi 1 gr/ liter air'),(12,'K012','daconil (klorotalonil)','penggunaan denagn konsentrasi  1 gr/ liter air'),(13,'K013','orthocide (kaptan)','penggunaan denagn konsentrasi  1 gr / liter air'),(14,'K014','hindari penyiraman berlebihan','media tanam dibuat porous agar air mengalir lancar jika tanah atau media tanam digali terlihat akar tanaman yang membusuk jemur 2-3 hari kemudian tanam kembali pada media ');

/*Table structure for table `tb_page` */

DROP TABLE IF EXISTS `tb_page`;

CREATE TABLE `tb_page` (
  `id_page` int(11) NOT NULL AUTO_INCREMENT,
  `nm_page` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id_page`)
) ENGINE=MyISAM AUTO_INCREMENT=10 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

/*Data for the table `tb_page` */

insert  into `tb_page`(`id_page`,`nm_page`) values (1,'depan'),(2,'penyakit'),(3,'jenis'),(4,'kawin-silang'),(5,'tips'),(6,'galery'),(7,'profil'),(8,'generatif'),(9,'vegetatif');

/*Table structure for table `tb_penyakit` */

DROP TABLE IF EXISTS `tb_penyakit`;

CREATE TABLE `tb_penyakit` (
  `id_penyakit` int(11) NOT NULL,
  `kode_penyakit` varchar(11) NOT NULL,
  `nm_penyakit` varchar(50) NOT NULL,
  `keterangan` text,
  PRIMARY KEY (`id_penyakit`)
) ENGINE=MyISAM AUTO_INCREMENT=12 DEFAULT CHARSET=latin1;

/*Data for the table `tb_penyakit` */

insert  into `tb_penyakit`(`id_penyakit`,`kode_penyakit`,`nm_penyakit`,`keterangan`) values (2,'P002','Aphids','gfr'),(3,'P003','Spider Mites','vfgws'),(4,'P004','Thrips','weee'),(5,'P005','Fungus Gnats','gege'),(6,'P006','Mealy Bugs','zxcv'),(7,'P007','Root Mealy Bugs','vgfg'),(8,'P008','Cendawan Phomosis','vgf'),(9,'P009','Cendawan Fusarium','jhkm'),(23,'P023','xcvcxv','<font size=\"5\">sdgsdgsdgdsgsdg</font><br>'),(22,'P022','dd','ddsd');

/*Table structure for table `tb_penyebab` */

DROP TABLE IF EXISTS `tb_penyebab`;

CREATE TABLE `tb_penyebab` (
  `id_penyebab` int(11) NOT NULL AUTO_INCREMENT,
  `kode_penyebab` varchar(11) NOT NULL,
  `nm_penyebab` text,
  PRIMARY KEY (`id_penyebab`)
) ENGINE=MyISAM AUTO_INCREMENT=12 DEFAULT CHARSET=latin1;

/*Data for the table `tb_penyebab` */

insert  into `tb_penyebab`(`id_penyebab`,`kode_penyebab`,`nm_penyebab`) values (1,'S001','Ulat atau Larva Lepidoptera'),(2,'S002','Semacam kutu berwarna hitam'),(3,'S003','tetranynchus cinnacinaborinus (red spider mite) tetranynchus urticae (twospooted spider mite ) sejenis tungau berwarna merah, kuning muda, hijau muda, coklat muda dan hitam'),(4,'S004','Thisanoptera (Tripidae) sejenis kutu berwana hitam yang bergerak sangat cepat'),(5,'S005','Diptera (Sciaridae) semacam larva berwarna hitam bening, jika dewasa seperti nyamuk berwarna hitam'),(6,'S006','Kutu berwarna putih yang memiliki seperti tepung di tubuhnya'),(7,'S007','Seperti kutu rambut berwarna putih'),(8,'S008','Bentuknya seperti cendawan'),(9,'S009','Jamur Fusarium sp'),(10,'S010','Penyiraman yang terlalu berlebihan'),(11,'S011','Penyiraman yang terlalu berlebihan');

/*Table structure for table `tb_rek_jenis` */

DROP TABLE IF EXISTS `tb_rek_jenis`;

CREATE TABLE `tb_rek_jenis` (
  `id_rek_jenis` int(11) NOT NULL AUTO_INCREMENT,
  `kode_ciri` varchar(200) NOT NULL,
  `kode_jenis` varchar(11) NOT NULL,
  PRIMARY KEY (`id_rek_jenis`),
  KEY `id_ciri` (`kode_ciri`,`kode_jenis`)
) ENGINE=MyISAM AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;

/*Data for the table `tb_rek_jenis` */

insert  into `tb_rek_jenis`(`id_rek_jenis`,`kode_ciri`,`kode_jenis`) values (5,'C002.C003.C034.C028.C039','J002'),(4,'C001.C033.C030.C039','J001');

/*Table structure for table `tb_rek_penyakit` */

DROP TABLE IF EXISTS `tb_rek_penyakit`;

CREATE TABLE `tb_rek_penyakit` (
  `id_rek_penyakit` int(11) NOT NULL AUTO_INCREMENT,
  `kode_gejala` varchar(200) DEFAULT NULL,
  `kode_penyakit` varchar(200) DEFAULT NULL,
  `kode_penyebab` varchar(200) DEFAULT NULL,
  `kode_obat` varchar(200) DEFAULT NULL,
  PRIMARY KEY (`id_rek_penyakit`),
  KEY `id_gejala` (`kode_gejala`,`kode_penyakit`,`kode_penyebab`,`kode_obat`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

/*Data for the table `tb_rek_penyakit` */

insert  into `tb_rek_penyakit`(`id_rek_penyakit`,`kode_gejala`,`kode_penyakit`,`kode_penyebab`,`kode_obat`) values (1,'G017.G018.G023.G024.G001.G002.G029','P002','S001.S002.S003.S004.S009','K006.K007.K009.K010.K014'),(2,'G017.G018.G019.G020.G022.G026.G028.G002.G003.G004.G029','P008','S006.S007.S008','K004.K005.K006');

/*Table structure for table `tb_user` */

DROP TABLE IF EXISTS `tb_user`;

CREATE TABLE `tb_user` (
  `id_user` int(11) NOT NULL AUTO_INCREMENT,
  `username` text NOT NULL,
  `user_display` text,
  `password` text NOT NULL,
  PRIMARY KEY (`id_user`)
) ENGINE=MyISAM AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;

/*Data for the table `tb_user` */

insert  into `tb_user`(`id_user`,`username`,`user_display`,`password`) values (1,'admin','Administrator','21232f297a57a5a743894a0e4a801fc3'),(3,'adenium','Admin Adenium','21232f297a57a5a743894a0e4a801fc3');

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;

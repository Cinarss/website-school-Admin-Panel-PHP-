-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Anamakine: 127.0.0.1
-- Üretim Zamanı: 14 Ağu 2022, 00:53:55
-- Sunucu sürümü: 10.4.24-MariaDB
-- PHP Sürümü: 8.1.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Veritabanı: `school`
--

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `admin`
--

CREATE TABLE `admin` (
  `admin_id` int(11) NOT NULL,
  `admin_username` varchar(150) NOT NULL,
  `admin_password` varchar(150) NOT NULL,
  `admin_name` varchar(150) NOT NULL,
  `admin_imageurl` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Tablo döküm verisi `admin`
--

INSERT INTO `admin` (`admin_id`, `admin_username`, `admin_password`, `admin_name`, `admin_imageurl`) VALUES
(1, 'cinarsak', '123456', 'Çınar Sak', '0');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `connect`
--

CREATE TABLE `connect` (
  `connect_id` int(11) NOT NULL,
  `connect_url` varchar(250) NOT NULL,
  `connect_title` varchar(150) NOT NULL,
  `connect_text` varchar(150) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Tablo döküm verisi `connect`
--

INSERT INTO `connect` (`connect_id`, `connect_url`, `connect_title`, `connect_text`) VALUES
(6, 'https://e-okul.meb.gov.tr', 'e-okul Yönetim Bilgi Sistemleri Giriş Ekranı', 'e-okul Yönetim Bilgi Sistemleri Giriş Ekranı'),
(7, 'https://mebbis.meb.gov.tr', 'MEB Bilişim Sistemleri Giriş Ekranı', 'MEB Bilişim Sistemleri Giriş Ekranı'),
(8, 'https://e-okul.meb.gov.tr', 'e-Okul Veli Bilgilendirme Sistemi', 'e-Okul Veli Bilgilendirme Sistemi'),
(9, 'http://sgb.meb.gov.tr/www/resmi-istatistikler/icerik/64', 'Milli Eğitim Bakanlığı İstatistiki Bilgileri', 'Milli Eğitim Bakanlığı İstatistiki Bilgileri'),
(10, 'http://www.meb.gov.tr/duyurular/duyurular2012/basinmus/mebim.php', '444 0 MEB', '444 0 MEB'),
(11, 'https://www.turkiye.gov.tr', 'e-Devlet Kapısı >> www.turkiye.gov.tr', 'e-Devlet Kapısı >> www.turkiye.gov.tr'),
(12, 'https://www.cimer.gov.tr', 'Cumhurbaşkanlığı İletişim Merkezi', 'Cumhurbaşkanlığı İletişim Merkezi'),
(13, 'http://mebdeogren.meb.gov.tr', 'Mebde Öğren', 'Mebde Öğren'),
(14, 'http://izmir.meb.gov.tr/gocepi/', 'Geleceğin Özel Çocuklarının Eğitim Projesi', 'Geleceğin Özel Çocuklarının Eğitim Projesi');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `contact`
--

CREATE TABLE `contact` (
  `contact_id` int(1) NOT NULL,
  `contact_adres` varchar(250) NOT NULL,
  `contact_tel` varchar(50) NOT NULL,
  `contact_url` varchar(150) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Tablo döküm verisi `contact`
--

INSERT INTO `contact` (`contact_id`, `contact_adres`, `contact_tel`, `contact_url`) VALUES
(1, 'İnönü Mahallesi 677/5. Sk. No58 35380 Buca/İzmir, Türkiye aaaa', '0 (232) 260 10 60 ', 'https://goo.gl/maps/UFzqJ4P1bChndR6k9');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `idari`
--

CREATE TABLE `idari` (
  `idari_id` int(11) NOT NULL,
  `idari_name` varchar(250) NOT NULL,
  `idari_yetki` varchar(250) NOT NULL,
  `idari_time` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Tablo döküm verisi `idari`
--

INSERT INTO `idari` (`idari_id`, `idari_name`, `idari_yetki`, `idari_time`) VALUES
(5, 'İsmet Aslan', 'Müdür Baş Yardımcısı', '2022-08-12 12:40:01'),
(6, 'Sibel Sevinç', 'Müdür Yardımcısı', '2022-08-12 12:40:22'),
(7, 'Özlem GÜNDÜZ ', 'Müdür Yardımcısı', '2022-08-12 12:41:32'),
(8, 'Ebubekir YETKİN ', 'Müdür Yardımcısı', '2022-08-12 12:41:42'),
(9, 'Hüseyin KAYHAN ', 'Müdür Yardımcısı', '2022-08-12 12:42:09'),
(10, 'Nail Canbay', 'Müdür Yardımcısı', '2022-08-12 23:50:11');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `information`
--

CREATE TABLE `information` (
  `information_id` int(1) NOT NULL,
  `information_derslik` int(50) NOT NULL,
  `information_ogretmen` int(50) NOT NULL,
  `information_ogrenci` int(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Tablo döküm verisi `information`
--

INSERT INTO `information` (`information_id`, `information_derslik`, `information_ogretmen`, `information_ogrenci`) VALUES
(1, 24, 67, 671);

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `news`
--

CREATE TABLE `news` (
  `news_id` int(11) NOT NULL,
  `news_title` varchar(150) NOT NULL DEFAULT 'Başlık Girilmemiş',
  `news_description` varchar(250) NOT NULL,
  `news_seourl` varchar(150) NOT NULL,
  `news_time` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `news_image` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Tablo döküm verisi `news`
--

INSERT INTO `news` (`news_id`, `news_title`, `news_description`, `news_seourl`, `news_time`, `news_image`) VALUES
(10, 'Sorumluluk sınav takvimi yayınlandı', '', 'sorumluluk-sinav-takvimi-yayinlandi', '2022-08-11 09:57:01', 'dimg/22637256292381125608sorumluluk.jpg'),
(11, 'Başlık Girilmemiş', 'AR-GE Merkezimizin yaptığı ya da yapmakta olduğu projelerimiz', '', '2022-08-11 10:02:31', 'dimg/28987255512628924589ARGE-OKUL-Tanitim.jpg'),
(12, 'ASDASD', 'asdasdasdasd', 'asdasd', '2022-08-11 09:59:59', 'dimg/23938logo-removebg-preview.png'),
(13, 'dneem başlık haber falan iln', 'asdasdasdasd', 'dneem-baslik-haber-falan-iln', '2022-08-11 10:03:45', 'dimg/26625200772290930433ed25b56eda6afba5408abc8eb2df548d.jpg');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `settings`
--

CREATE TABLE `settings` (
  `settings_id` int(11) NOT NULL,
  `settings_title` varchar(150) NOT NULL,
  `settings_keywords` varchar(250) NOT NULL,
  `settings_description` varchar(250) NOT NULL,
  `settings_author` varchar(50) NOT NULL,
  `settings_image` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Tablo döküm verisi `settings`
--

INSERT INTO `settings` (`settings_id`, `settings_title`, `settings_keywords`, `settings_description`, `settings_author`, `settings_image`) VALUES
(0, 'Buca Necla - Tevfik Karadavut Mesleki ve Teknik Anadolu Lisesi', 'deneme', 'deneme14asdas', 'Çınar Sak', 'g/28638Polish_20220808_003324112.jpg');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `teacher`
--

CREATE TABLE `teacher` (
  `teacher_id` int(11) NOT NULL,
  `teacher_name` varchar(150) NOT NULL,
  `teach_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Tablo döküm verisi `teacher`
--

INSERT INTO `teacher` (`teacher_id`, `teacher_name`, `teach_id`) VALUES
(10, 'Barış Ateş', 1),
(11, 'Seda Aracı', 1),
(12, 'Meral Osmanoğlu', 1),
(13, 'Ertan Çetin', 1),
(14, 'Beril Bayburtoğlu', 1),
(15, 'Neslihan İpek', 14),
(16, 'Selma Tetik', 14),
(17, 'Gürkan Eren', 14),
(18, 'Murat Ergen', 14),
(19, 'Sercan Ersoy', 14),
(20, 'Mehmet Salih Kızılkaya', 14),
(21, 'Mehmey Kutlu', 14),
(22, 'Fatih Akgün', 14),
(23, 'Abdülmuttalip Yüksel', 14),
(24, 'Barış Altunay', 14),
(25, 'Esra Bulut', 3),
(26, 'Özlem Gürbüz', 7),
(27, 'Beyza Çaktır', 9),
(28, 'Cemile Altun', 9),
(29, 'Ahmet Çelik', 16),
(30, 'Aydın Güner', 16),
(31, 'Ali Naim Paker', 16),
(32, 'Ali Gündüz', 16),
(33, 'Hamza Solgan', 16),
(34, 'İsmail Kurşun', 16),
(35, 'Mehmet Sarı', 16),
(36, 'Erkan Akdoğan', 16),
(37, 'Murat Şaşal', 16),
(38, 'Özkan Özen', 16),
(39, 'Cemal Ağaç', 16),
(40, 'Ahmet Çelik', 15),
(43, 'Yılmaz Özen', 8),
(44, 'Gülseven Babacan', 5),
(45, 'Ünay Yılmaz', 5),
(46, 'Sinem Zöhre Kılıçkaya', 2),
(47, 'Aslı Akkaya', 2),
(48, 'Halenur Önel', 2),
(49, 'Gözde Kahraman', 2),
(50, 'Canan Şahan Kip', 2),
(51, 'Ümit Öztemel', 2),
(52, 'Sinan Gül', 6),
(53, 'Sinan Sarper', 6),
(54, 'Gökçen Kurşunel', 6),
(55, 'Emine Karatoprak', 4),
(56, 'Mehtap Duran', 12),
(57, 'Halil Gökhan Sağlık', 10),
(58, 'Berna Emir', 10),
(59, 'Seyhan Güney', 11),
(60, 'Özge Kayaçetin', 15),
(61, 'Ali Tunçinan', 15),
(62, 'Emin Elmacı', 15),
(63, 'Yunus Orak', 15);

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `teachkategori`
--

CREATE TABLE `teachkategori` (
  `teach_id` int(11) NOT NULL,
  `teach_ad` varchar(150) NOT NULL,
  `teach_time` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `teacher_ust` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Tablo döküm verisi `teachkategori`
--

INSERT INTO `teachkategori` (`teach_id`, `teach_ad`, `teach_time`, `teacher_ust`) VALUES
(1, 'Matematik', '2022-08-12 13:11:44', 0),
(2, 'Türk Dili ve Edebiyatı', '2022-08-12 13:13:33', 0),
(3, 'Biyoloji', '2022-08-12 13:12:09', 0),
(4, 'Kimya', '2022-08-12 13:12:13', 0),
(5, 'Fizik', '2022-08-12 13:12:26', 0),
(6, 'İngilizce', '2022-08-12 13:12:36', 0),
(7, 'Coğrafya', '2022-08-12 13:12:47', 0),
(8, 'Felsefe', '2022-08-12 13:12:51', 0),
(9, 'Din Kültürü ve Ahlak Bilgisi', '2022-08-12 13:13:24', 0),
(10, 'Rehberlik', '2022-08-12 13:13:49', 0),
(11, 'Tarih', '2022-08-12 13:13:52', 0),
(12, 'Müzik', '2022-08-12 13:13:55', 0),
(13, 'Görsel Sanatlar', '2022-08-12 13:14:07', 0),
(14, 'Bilişim Teknolojileri', '2022-08-12 13:14:28', 0),
(15, 'Endüstriyel Otomasyon Tek.', '2022-08-12 13:15:03', 0),
(16, 'Elektrik-Elektronik Tek.', '2022-08-12 13:14:59', 0);

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `uscontact`
--

CREATE TABLE `uscontact` (
  `contact_id` int(11) NOT NULL,
  `telefon` varchar(250) NOT NULL,
  `belge` varchar(250) NOT NULL,
  `eposta` varchar(250) NOT NULL,
  `web` varchar(250) NOT NULL,
  `adres` varchar(500) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Tablo döküm verisi `uscontact`
--

INSERT INTO `uscontact` (`contact_id`, `telefon`, `belge`, `eposta`, `web`, `adres`) VALUES
(1, '0 (232) 260 10 60', '(232) 260 1062', '', 'https://ntkmtal.meb.k12.tr', 'İnönü Mahallesi 677/5. Sk. No58 35380 Buca/İzmir, Türkiye');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `usschool`
--

CREATE TABLE `usschool` (
  `school_id` int(11) NOT NULL,
  `vizyon` varchar(500) NOT NULL,
  `misyon` varchar(500) NOT NULL,
  `saatler` varchar(150) NOT NULL,
  `isinma` varchar(250) NOT NULL,
  `internet` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Tablo döküm verisi `usschool`
--

INSERT INTO `usschool` (`school_id`, `vizyon`, `misyon`, `saatler`, `isinma`, `internet`) VALUES
(1, 'Bu okulda okuyan mesleğini ve geleceğini kazanır.', 'Öğrencilerimizin, iş piyasasında aranan niteliklere sahip olmasını sağlamak için sektör ile birlikte çalışarak, nitelikli ara eleman yetiştirmek.', '08:40-17:10', 'Kalorifer', 'Fatih Projesi Fiber İnternet');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `usstatus`
--

CREATE TABLE `usstatus` (
  `status_id` int(11) NOT NULL,
  `ogretmen` int(11) NOT NULL,
  `cok_amacli` int(11) NOT NULL,
  `fizik` int(11) NOT NULL,
  `yemekhane` int(11) NOT NULL,
  `ogrenci` int(11) NOT NULL,
  `mesleki` int(11) NOT NULL,
  `kutuphane` int(11) NOT NULL,
  `derslik` int(11) NOT NULL,
  `kimya` int(11) NOT NULL,
  `kitap` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Tablo döküm verisi `usstatus`
--

INSERT INTO `usstatus` (`status_id`, `ogretmen`, `cok_amacli`, `fizik`, `yemekhane`, `ogrenci`, `mesleki`, `kutuphane`, `derslik`, `kimya`, `kitap`) VALUES
(1, 67, 1, 1, 1, 671, 10, 1, 24, 1, 366);

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `ustransport`
--

CREATE TABLE `ustransport` (
  `transport_id` int(11) NOT NULL,
  `yerlesim` text NOT NULL,
  `adres` text NOT NULL,
  `ulasim_izban` text NOT NULL,
  `il` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Tablo döküm verisi `ustransport`
--

INSERT INTO `ustransport` (`transport_id`, `yerlesim`, `adres`, `ulasim_izban`, `il`) VALUES
(1, 'Semt Garajı, Otokent ve Zikirtepe camisi yakınındadır.', 'İnönü Mahallesi 677/5. Sk. No58 35380 Buca/İzmir, Türkiye', 'Semt garajı durağına 7-8 dk. yürüyüş mesafesi ESHOT ile : 107 hat numaralı otobüs ile saha durağı okulumuzun önündedir. OTOMOBİL ile : Otokent C kapısı karşı çaprazında bulunan sokaktan girilerek 300 metre.', 'İlçe Merkezine Uzaklık Buca ilçe merkezine 8 km.');

--
-- Dökümü yapılmış tablolar için indeksler
--

--
-- Tablo için indeksler `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`admin_id`);

--
-- Tablo için indeksler `connect`
--
ALTER TABLE `connect`
  ADD PRIMARY KEY (`connect_id`);

--
-- Tablo için indeksler `contact`
--
ALTER TABLE `contact`
  ADD PRIMARY KEY (`contact_id`);

--
-- Tablo için indeksler `idari`
--
ALTER TABLE `idari`
  ADD PRIMARY KEY (`idari_id`);

--
-- Tablo için indeksler `information`
--
ALTER TABLE `information`
  ADD PRIMARY KEY (`information_id`);

--
-- Tablo için indeksler `news`
--
ALTER TABLE `news`
  ADD PRIMARY KEY (`news_id`);

--
-- Tablo için indeksler `settings`
--
ALTER TABLE `settings`
  ADD PRIMARY KEY (`settings_id`);

--
-- Tablo için indeksler `teacher`
--
ALTER TABLE `teacher`
  ADD PRIMARY KEY (`teacher_id`);

--
-- Tablo için indeksler `teachkategori`
--
ALTER TABLE `teachkategori`
  ADD PRIMARY KEY (`teach_id`);

--
-- Tablo için indeksler `uscontact`
--
ALTER TABLE `uscontact`
  ADD PRIMARY KEY (`contact_id`);

--
-- Tablo için indeksler `usschool`
--
ALTER TABLE `usschool`
  ADD PRIMARY KEY (`school_id`);

--
-- Tablo için indeksler `usstatus`
--
ALTER TABLE `usstatus`
  ADD PRIMARY KEY (`status_id`);

--
-- Tablo için indeksler `ustransport`
--
ALTER TABLE `ustransport`
  ADD PRIMARY KEY (`transport_id`);

--
-- Dökümü yapılmış tablolar için AUTO_INCREMENT değeri
--

--
-- Tablo için AUTO_INCREMENT değeri `admin`
--
ALTER TABLE `admin`
  MODIFY `admin_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Tablo için AUTO_INCREMENT değeri `connect`
--
ALTER TABLE `connect`
  MODIFY `connect_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- Tablo için AUTO_INCREMENT değeri `contact`
--
ALTER TABLE `contact`
  MODIFY `contact_id` int(1) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Tablo için AUTO_INCREMENT değeri `idari`
--
ALTER TABLE `idari`
  MODIFY `idari_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- Tablo için AUTO_INCREMENT değeri `information`
--
ALTER TABLE `information`
  MODIFY `information_id` int(1) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Tablo için AUTO_INCREMENT değeri `news`
--
ALTER TABLE `news`
  MODIFY `news_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- Tablo için AUTO_INCREMENT değeri `teacher`
--
ALTER TABLE `teacher`
  MODIFY `teacher_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=64;

--
-- Tablo için AUTO_INCREMENT değeri `teachkategori`
--
ALTER TABLE `teachkategori`
  MODIFY `teach_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- Tablo için AUTO_INCREMENT değeri `uscontact`
--
ALTER TABLE `uscontact`
  MODIFY `contact_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Tablo için AUTO_INCREMENT değeri `usschool`
--
ALTER TABLE `usschool`
  MODIFY `school_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Tablo için AUTO_INCREMENT değeri `usstatus`
--
ALTER TABLE `usstatus`
  MODIFY `status_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Tablo için AUTO_INCREMENT değeri `ustransport`
--
ALTER TABLE `ustransport`
  MODIFY `transport_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

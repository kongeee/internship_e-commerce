-- phpMyAdmin SQL Dump
-- version 5.0.3
-- https://www.phpmyadmin.net/
--
-- Anamakine: 127.0.0.1
-- Üretim Zamanı: 23 Haz 2021, 09:59:29
-- Sunucu sürümü: 10.4.14-MariaDB
-- PHP Sürümü: 7.2.34

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Veritabanı: `internship`
--

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `address`
--

CREATE TABLE `address` (
  `address_id` int(11) NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  `location` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Tablo döküm verisi `address`
--

INSERT INTO `address` (`address_id`, `user_id`, `location`) VALUES
(1, 11, 'adana'),
(2, 8, 'adana'),
(3, 12, 'ADANA'),
(4, 12, 'İSTANBUL11');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `admin`
--

CREATE TABLE `admin` (
  `admin_id` int(11) NOT NULL,
  `name` varchar(30) NOT NULL,
  `password` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Tablo döküm verisi `admin`
--

INSERT INTO `admin` (`admin_id`, `name`, `password`) VALUES
(1, 'admin', '21232f297a57a5a743894a0e4a801fc3');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `comment`
--

CREATE TABLE `comment` (
  `comment_id` int(11) NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  `computer_id` int(11) DEFAULT NULL,
  `caption` varchar(100) DEFAULT NULL,
  `comment` varchar(255) DEFAULT NULL,
  `rate` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Tablo döküm verisi `comment`
--

INSERT INTO `comment` (`comment_id`, `user_id`, `computer_id`, `caption`, `comment`, `rate`) VALUES
(4, 12, 38, 'dsfdsf', 'fdsfdsfds', 3);

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `computer`
--

CREATE TABLE `computer` (
  `computer_id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `stock` int(11) NOT NULL,
  `cpu` varchar(50) DEFAULT NULL,
  `cpu_bench` float DEFAULT NULL,
  `gpu` varchar(50) DEFAULT NULL,
  `gpu_bench` float DEFAULT NULL,
  `ram` varchar(50) DEFAULT NULL,
  `storage` varchar(50) DEFAULT NULL,
  `price` float DEFAULT NULL,
  `discount` float DEFAULT NULL,
  `rate` float DEFAULT NULL,
  `type` varchar(10) DEFAULT NULL,
  `description` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Tablo döküm verisi `computer`
--

INSERT INTO `computer` (`computer_id`, `name`, `stock`, `cpu`, `cpu_bench`, `gpu`, `gpu_bench`, `ram`, `storage`, `price`, `discount`, `rate`, `type`, `description`) VALUES
(38, 'Monster Abra A5', 35, 'Intel Core i7-1185G7', 75.2, 'Nvidia RTX 3060', 98, '8 GB', '500 GB SSD', 14999, 3, 3, 'gaming', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aenean blandit hendrerit nibh, hendrerit consequat quam euismod in. Nunc ullamcorper enim nec nisl pharetra ornare. Donec posuere dui id leo condimentum efficitur. Etiam augue tellus, lobortis eu mollis ac, mattis et est. Praesent tincidunt sem lacus, ut accumsan elit mollis in. Vivamus consectetur condimentum purus a congue. Phasellus ut diam eu mi tempus maximus ut et magna. Sed pellentesque, sem eu scelerisque fermentum, dui ipsum blandit ligula, vel porttitor nisl est et ipsum. Nunc tempor porta convallis. Ut tincidunt, massa eu egestas porttitor, diam ante sodales sem, non dignissim nisl urna id orci. Nunc egestas nibh sit amet condimentum varius.'),
(39, 'Asus TUF FX506LI-HN085', 57, 'Intel Core i3-10300', 87.2, 'Zotac Zotac GTX 1650 Super 4GB Gaming', 60.2, '8 GB', '1 TB SSD', 10999, 26, NULL, 'gaming', 'Freedos'),
(40, 'Lenovo V15-IIL', 100, 'Intel Core i5-1035G1', 65.7, 'Intel UHD Graphics 750', 7.71, '8 GB', '256 GB SSD', 5999, 35, NULL, 'normal', ''),
(41, 'Asus ROG Zephyrus GA401QM-HZ210T', 14, 'AMD Ryzen 9 5900HS', 92, 'Nvidia RTX 3060', 98, '16 GB', '1 TB SSD + 2 TB HDD', 17800, 25, NULL, 'gaming', ''),
(42, 'HP Omen X 15-DG0000NT ', 50, 'Intel Core i7-9750H', 78.5, 'Nvidia RTX 2070', 106, '16 GB', '1 TB HDD + 256 GB SSD', 21229, 54, NULL, 'gaming', ''),
(43, 'Hp 250 G8', 62, 'Intel Core i5-1135G7', 73.4, 'Intel UHD Graphics 750', 7.71, '8 GB', '512 GB SSD', 7599, 17, NULL, 'normal', ''),
(44, 'HP 255 G7', 30, 'AMD Ryzen 3 3300X', 81.1, 'AMD RX Vega 3 (Ryzen iGPU)', 4.32, '4 GB', '256 GB SSD', 4999, 28, NULL, 'normal', ''),
(45, 'MSI GE66 Raider 10UG-216TR ', 50, 'Intel Core i7-10870H', 87, 'Nvidia RTX 3070', 153, '16 GB', '512 GB SSD', 26899, 34, NULL, 'gaming', ''),
(46, 'Lenovo Ideapad Flex 5 14IIL05', 32, 'Intel Core i3-1005G1', 59.3, 'Intel UHD Graphics 600', 1.55, '4 GB', '128 GB SSD', 6199, 2, NULL, 'normal', ''),
(47, 'Huawei Matebook D 15 ', 9, 'AMD Ryzen 7 3700U', 54, 'AMD RX Vega 10 (Ryzen iGPU)', 11, '8 GB', '512 GB SSD', 8299, 20, NULL, 'gaming', ''),
(48, 'HP 14S-FQ0034NT', 25, 'AMD Ryzen 5 4500U', 75.4, 'AMD Radeon Pro 5500M', 43, '8 GB', '256 GB SSD', 4999, 12, NULL, 'normal', '');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `image`
--

CREATE TABLE `image` (
  `img_id` int(11) NOT NULL,
  `computer_id` int(11) DEFAULT NULL,
  `path` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Tablo döküm verisi `image`
--

INSERT INTO `image` (`img_id`, `computer_id`, `path`) VALUES
(27, 38, '/images/computers/format_webp (1).jpg'),
(28, 38, '/images/computers/format_webp (2).jpg'),
(29, 38, '/images/computers/format_webp (3).jpg'),
(30, 38, '/images/computers/format_webp (4).jpg'),
(31, 38, '/images/computers/format_webp.jpg'),
(32, 39, '/images/computers/asus_tuf.jpg'),
(33, 40, '/images/computers/lenovo.jpg'),
(34, 41, '/images/computers/asus_rog.jpg'),
(35, 42, '/images/computers/hp_omen.jpg'),
(36, 43, '/images/computers/hp_250.jpg'),
(37, 44, '/images/computers/hp_255.jpg'),
(38, 45, '/images/computers/msi_ge.jpg'),
(39, 46, '/images/computers/idea.jpg'),
(40, 47, '/images/computers/huawei.jpg'),
(46, 48, '/images/computers/ekici.jpg');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `sale`
--

CREATE TABLE `sale` (
  `sale_id` int(11) NOT NULL,
  `computers` text DEFAULT NULL,
  `user_id` int(11) DEFAULT NULL,
  `price` float DEFAULT NULL,
  `state` varchar(50) DEFAULT NULL,
  `address_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Tablo döküm verisi `sale`
--

INSERT INTO `sale` (`sale_id`, `computers`, `user_id`, `price`, `state`, `address_id`) VALUES
(1, '14', 11, 1760, 'preparing', 1),
(3, '39', 12, 8139.26, 'cargo', 4),
(4, '41,43,47', 12, 26296.4, 'cargo', 4);

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `text`
--

CREATE TABLE `text` (
  `text_id` int(11) NOT NULL,
  `text_name` varchar(50) DEFAULT NULL,
  `text_content` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Tablo döküm verisi `text`
--

INSERT INTO `text` (`text_id`, `text_name`, `text_content`) VALUES
(1, 'guide', 'Step 1: Set your technology budget and optimize your shopping strategy.\r\nStep 2: Choose an operating system.\r\nStep 3: Choose a laptop design.\r\nStep 4: Compare these three specs...'),
(2, 'facebook', 'https://www.facebook.com'),
(3, 'twitter', 'https://www.twitter.com'),
(4, 'instagram', 'https://www.instagram.com'),
(5, 'slogan', 'SLOGAN'),
(6, 'aboutus', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Ut elementum nulla vitae vulputate sollicitudin. Suspendisse finibus orci nec dolor pretium, vitae malesuada felis cursus. Mauris urna elit, tempor et laoreet at, sollicitudin nec justo. Nam id velit at sapien mollis ultrices. Phasellus a luctus elit. Duis a arcu ac odio viverra varius a ac nunc. Integer lacinia blandit dolor at fringilla. Sed ac ligula eu diam convallis scelerisque. Suspendisse id mattis dui, quis gravida urna. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Curabitur placerat sapien sit amet nibh malesuada ullamcorper. Curabitur commodo nunc a ante dapibus accumsan. Duis odio velit, condimentum sed purus vel, feugiat scelerisque dui.\r\n\r\nCurabitur in est convallis, volutpat urna ut, iaculis enim. Ut imperdiet porttitor elit et condimentum. Curabitur efficitur maximus velit, id finibus ex sollicitudin vel. Nam scelerisque mauris nisi, in placerat tortor cursus vitae. Suspendisse leo arcu, commodo in posuere vitae, blandit eu orci. Phasellus mi turpis, porttitor a efficitur sit amet, placerat nec nulla. Suspendisse consectetur quam at ornare imperdiet. Vivamus eu massa lacinia, mollis elit id, rutrum turpis. Donec placerat est et dui elementum aliquam. Praesent a lacus augue. Ut ultricies turpis in justo commodo ultricies. Pellentesque quis lectus eu mi mattis luctus eu eget leo. Proin malesuada neque at varius sagittis. Praesent sit amet justo vel nibh consequat pretium. Curabitur lacinia condimentum varius. Ut dictum urna eu augue volutpat, vel pellentesque urna dignissim.');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `user`
--

CREATE TABLE `user` (
  `user_id` int(11) NOT NULL,
  `first_name` varchar(30) DEFAULT NULL,
  `last_name` varchar(30) DEFAULT NULL,
  `email` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Tablo döküm verisi `user`
--

INSERT INTO `user` (`user_id`, `first_name`, `last_name`, `email`, `password`) VALUES
(1, 'Furkan', 'Ekici123', 'furkan1997@gmail.com', '92d0122065dc6d5a24e4bf6ac74092f6'),
(3, 'Furkan', 'Ekici123', 'furkan@gmail.com', '2adfbad759fbd10edbeecd56293dd021'),
(4, 'Furkan', 'Ekici123', 'furkan@gmail.com', 'e1faffb3e614e6c2fba74296962386b7'),
(5, 'Furkan', 'Ekici123', 'furkan@gmail.com', 'e1faffb3e614e6c2fba74296962386b7'),
(8, 'ekici', 'xxx', 'furkan@gmail.com', 'c20ad4d76fe97759aa27a0c99bff6710'),
(11, 'ekici', 'ekici', 'ekici@hotmail.com', '9d3c34ec905b6a2a0e028f243f3459a7'),
(12, 'furkan', 'ekici', 'ekici12@gmail.com', 'c20ad4d76fe97759aa27a0c99bff6710');

--
-- Dökümü yapılmış tablolar için indeksler
--

--
-- Tablo için indeksler `address`
--
ALTER TABLE `address`
  ADD PRIMARY KEY (`address_id`),
  ADD KEY `user_id` (`user_id`);

--
-- Tablo için indeksler `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`admin_id`);

--
-- Tablo için indeksler `comment`
--
ALTER TABLE `comment`
  ADD PRIMARY KEY (`comment_id`),
  ADD KEY `user_id` (`user_id`),
  ADD KEY `computer_id` (`computer_id`);

--
-- Tablo için indeksler `computer`
--
ALTER TABLE `computer`
  ADD PRIMARY KEY (`computer_id`);

--
-- Tablo için indeksler `image`
--
ALTER TABLE `image`
  ADD PRIMARY KEY (`img_id`),
  ADD KEY `computer_id` (`computer_id`);

--
-- Tablo için indeksler `sale`
--
ALTER TABLE `sale`
  ADD PRIMARY KEY (`sale_id`),
  ADD KEY `user_id` (`user_id`),
  ADD KEY `address_id` (`address_id`);

--
-- Tablo için indeksler `text`
--
ALTER TABLE `text`
  ADD PRIMARY KEY (`text_id`);

--
-- Tablo için indeksler `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`user_id`);

--
-- Dökümü yapılmış tablolar için AUTO_INCREMENT değeri
--

--
-- Tablo için AUTO_INCREMENT değeri `address`
--
ALTER TABLE `address`
  MODIFY `address_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- Tablo için AUTO_INCREMENT değeri `admin`
--
ALTER TABLE `admin`
  MODIFY `admin_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Tablo için AUTO_INCREMENT değeri `comment`
--
ALTER TABLE `comment`
  MODIFY `comment_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- Tablo için AUTO_INCREMENT değeri `computer`
--
ALTER TABLE `computer`
  MODIFY `computer_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=49;

--
-- Tablo için AUTO_INCREMENT değeri `image`
--
ALTER TABLE `image`
  MODIFY `img_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=47;

--
-- Tablo için AUTO_INCREMENT değeri `sale`
--
ALTER TABLE `sale`
  MODIFY `sale_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- Tablo için AUTO_INCREMENT değeri `text`
--
ALTER TABLE `text`
  MODIFY `text_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- Tablo için AUTO_INCREMENT değeri `user`
--
ALTER TABLE `user`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- Dökümü yapılmış tablolar için kısıtlamalar
--

--
-- Tablo kısıtlamaları `address`
--
ALTER TABLE `address`
  ADD CONSTRAINT `address_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `user` (`user_id`) ON DELETE CASCADE;

--
-- Tablo kısıtlamaları `comment`
--
ALTER TABLE `comment`
  ADD CONSTRAINT `comment_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `user` (`user_id`) ON DELETE CASCADE,
  ADD CONSTRAINT `comment_ibfk_2` FOREIGN KEY (`computer_id`) REFERENCES `computer` (`computer_id`) ON DELETE CASCADE;

--
-- Tablo kısıtlamaları `image`
--
ALTER TABLE `image`
  ADD CONSTRAINT `image_ibfk_1` FOREIGN KEY (`computer_id`) REFERENCES `computer` (`computer_id`);

--
-- Tablo kısıtlamaları `sale`
--
ALTER TABLE `sale`
  ADD CONSTRAINT `sale_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `user` (`user_id`) ON DELETE SET NULL,
  ADD CONSTRAINT `sale_ibfk_2` FOREIGN KEY (`address_id`) REFERENCES `address` (`address_id`) ON DELETE SET NULL;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

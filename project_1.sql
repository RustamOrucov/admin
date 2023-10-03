-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Anamakine: 127.0.0.1
-- Üretim Zamanı: 03 Eki 2023, 08:18:46
-- Sunucu sürümü: 10.4.28-MariaDB
-- PHP Sürümü: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Veritabanı: `project_1`
--

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `comments`
--

CREATE TABLE `comments` (
  `id` int(10) UNSIGNED NOT NULL,
  `user_id` int(10) NOT NULL,
  `comment` mediumtext NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Tablo döküm verisi `comments`
--

INSERT INTO `comments` (`id`, `user_id`, `comment`) VALUES
(34, 72, 'sdgsaedfyfkyfkhfk'),
(35, 72, 'sdgsaedfyfkyfkhfk');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `fullname` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `type` int(11) NOT NULL DEFAULT 1,
  `password` varchar(50) NOT NULL,
  `photo` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Tablo döküm verisi `users`
--

INSERT INTO `users` (`id`, `fullname`, `email`, `type`, `password`, `photo`) VALUES
(1, 'Dunyaxanim Yusifova', 'admin@gmail.com', 1, '21232f297a57a5a743894a0e4a801fc3', NULL),
(13, 'Dunyaxanim Yusifova', 'admiaasn1@gmail.com', 1, '21232f297a57a5a743894a0e4a801fc3', NULL),
(14, 'Dunyaxanim Yusifova', 'admiaasasn1@gmail.com', 1, '21232f297a57a5a743894a0e4a801fc3', NULL),
(60, 'adsasdasd', 'orucov.r@inboasdasdasdx.ru', 0, '', '1696288925_1.jpeg'),
(61, '', 'orucov.r@inboasdasdasdasdx.ru', 0, '', '1696289815_1.jpeg'),
(62, 'sajhipdiajspja', 'orucov.r@inefdasdfbox.ru', 0, '12345678987654', '1696290037_1.'),
(63, 'asdsadasdasda', 'admin@gmaasdasdil.com', 0, 'asdsdsdadssda', '1696290226_1.'),
(64, '', 'orucov.r@inbasdasdasox.ru', 0, '', '1696290237_1.'),
(65, '', 'admin@gmail.comsadasdasda', 0, '', '1696290249_1.'),
(66, '', 'alknpdlsmadlamsd@ksandfkansd', 0, '', '1696290349_1.'),
(67, '', '', 0, '', '1696290535_1.jpeg'),
(69, '', 'orucov.r@inboasasssssssx.ru', 0, '', NULL),
(70, '', 'admin@gmail.comsadasdasdas', 0, '', '1696290566_1.jpeg'),
(71, 'admin admin', 'admin12@gmail.com', 0, '123456789', NULL),
(72, 'admiadmin', 'orucov.r@inboxx.ru', 0, '25f9e794323b453885f5181f1b624d0b', NULL);

--
-- Dökümü yapılmış tablolar için indeksler
--

--
-- Tablo için indeksler `comments`
--
ALTER TABLE `comments`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_comment` (`user_id`);

--
-- Tablo için indeksler `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`);

--
-- Dökümü yapılmış tablolar için AUTO_INCREMENT değeri
--

--
-- Tablo için AUTO_INCREMENT değeri `comments`
--
ALTER TABLE `comments`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=36;

--
-- Tablo için AUTO_INCREMENT değeri `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=73;

--
-- Dökümü yapılmış tablolar için kısıtlamalar
--

--
-- Tablo kısıtlamaları `comments`
--
ALTER TABLE `comments`
  ADD CONSTRAINT `user_comment` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Anamakine: 127.0.0.1
-- Üretim Zamanı: 16 Eki 2023, 00:52:53
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
-- Veritabanı: `studentinfo`
--

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `classes`
--

CREATE TABLE `classes` (
  `id` int(11) NOT NULL,
  `className` varchar(255) NOT NULL,
  `classTeacherId` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Tablo döküm verisi `classes`
--

INSERT INTO `classes` (`id`, `className`, `classTeacherId`) VALUES
(1, '2023Yavuzlar', 3),
(5, '2023Zayotem', 4),
(6, '2023Cuberium', 4);

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `classesstudents`
--

CREATE TABLE `classesstudents` (
  `id` int(11) NOT NULL,
  `studentId` int(11) NOT NULL,
  `classId` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Tablo döküm verisi `classesstudents`
--

INSERT INTO `classesstudents` (`id`, `studentId`, `classId`) VALUES
(1, 1, 1),
(2, 2, 1),
(3, 3, 1),
(4, 5, 1),
(5, 8, 1),
(6, 6, 6),
(7, 13, 5);

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `exams`
--

CREATE TABLE `exams` (
  `id` int(11) NOT NULL,
  `studentId` int(11) NOT NULL,
  `lessonId` int(11) NOT NULL,
  `classId` int(11) NOT NULL,
  `examScore` tinyint(4) NOT NULL,
  `examDate` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Tablo döküm verisi `exams`
--

INSERT INTO `exams` (`id`, `studentId`, `lessonId`, `classId`, `examScore`, `examDate`) VALUES
(1, 1, 1, 1, 75, '2023-10-05 15:21:36'),
(2, 1, 1, 1, 70, '2023-10-06 13:04:43'),
(3, 1, 3, 1, 93, '2023-10-12 22:49:23'),
(4, 2, 1, 1, 41, '2023-10-13 17:50:39'),
(5, 2, 1, 1, 69, '2023-10-13 00:17:15'),
(6, 3, 3, 1, 90, '2023-10-12 22:49:08'),
(9, 8, 4, 1, 80, '2023-10-12 22:49:33'),
(10, 2, 2, 1, 35, '2023-10-12 22:48:58'),
(11, 2, 2, 1, 43, '2023-10-12 22:48:44'),
(12, 1, 1, 0, 21, '2023-10-12 23:33:51'),
(13, 8, 6, 0, 88, '2023-10-12 23:34:51'),
(16, 2, 1, 1, 54, '2023-10-13 14:36:13'),
(18, 6, 1, 6, 100, '2023-10-13 15:40:15'),
(19, 17, 3, 5, 93, '2023-10-13 15:47:08'),
(20, 2, 4, 1, 55, '2023-10-13 17:25:23'),
(21, 2, 4, 1, 45, '2023-10-13 17:43:47'),
(22, 2, 5, 1, 95, '2023-10-13 17:47:23'),
(23, 2, 1, 1, 98, '2023-10-13 18:01:06'),
(24, 5, 6, 1, 35, '2023-10-13 18:00:39');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `lessons`
--

CREATE TABLE `lessons` (
  `id` int(11) NOT NULL,
  `teacherUserId` int(11) NOT NULL,
  `lessonName` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Tablo döküm verisi `lessons`
--

INSERT INTO `lessons` (`id`, `teacherUserId`, `lessonName`) VALUES
(1, 3, 'PHP'),
(2, 4, 'JS'),
(3, 3, 'OOP'),
(4, 4, 'PL1'),
(5, 4, 'PL2'),
(6, 14, 'DataStructures'),
(10, 14, 'CSS'),
(11, 3, 'math'),
(12, 3, 'math2');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `name` varchar(255) DEFAULT NULL,
  `surname` varchar(255) DEFAULT NULL,
  `username` varchar(255) NOT NULL,
  `password` text NOT NULL,
  `role` int(11) NOT NULL,
  `createdAt` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Tablo döküm verisi `users`
--

INSERT INTO `users` (`id`, `name`, `surname`, `username`, `password`, `role`, `createdAt`) VALUES
(1, 'mehmet', 'yilmaz', 'mehmetylmz', '$argon2id$v=19$m=65536,t=4,p=1$Rm1lVHBYbVdTSXJCZlZJeg$ueWSipFU5cVbas5lPR55UOioobcaQ5g+YIBTQPY3iiQ', 3, '2023-10-06 19:14:04'),
(2, 'ahmet', 'kaya', 'a.kaya', '$argon2id$v=19$m=65536,t=4,p=1$Rm1lVHBYbVdTSXJCZlZJeg$ueWSipFU5cVbas5lPR55UOioobcaQ5g+YIBTQPY3iiQ', 3, '2023-10-06 19:16:54'),
(3, 'mahmut', 'karaca', 'mkaraca', '$argon2id$v=19$m=65536,t=4,p=1$Y0lhdjN4Zjh0Y0padkV3Rw$5RgNerx1LE+oSSj49F8Fuo1D6eGfJvq8QZ6ryGdmNew', 2, '2023-10-13 18:02:45'),
(4, 'ali', 'altay', 'altay', '$argon2id$v=19$m=65536,t=4,p=1$Rm1lVHBYbVdTSXJCZlZJeg$ueWSipFU5cVbas5lPR55UOioobcaQ5g+YIBTQPY3iiQ', 2, '2023-10-06 19:17:15'),
(5, 'alim', 'ornek', 'alimornek', '$argon2id$v=19$m=65536,t=4,p=1$Rm1lVHBYbVdTSXJCZlZJeg$ueWSipFU5cVbas5lPR55UOioobcaQ5g+YIBTQPY3iiQ', 3, '2023-10-06 19:17:25'),
(6, 'ahmet', 'yagmur', 'ayagmur', '$argon2id$v=19$m=65536,t=4,p=1$aC5tM2Q4b1RDMk5FbG1PYQ$AZMr5IV33gV26cJZw9XxXseK/JQdUgVU0YMyZzogNJ8', 3, '2023-10-14 18:35:48'),
(8, 'hasan', 'mezarci', 'hmezarci', '$argon2id$v=19$m=65536,t=4,p=1$TWZvbEJhUkRTdlR2N2V3aw$j/D4pHpcrBqbdXpWvws3urZ1RN97m4/vAcB5kUQeIXY', 3, '2023-10-10 19:38:13'),
(9, 'ayse', 'yilmaz', 'ayse', '$argon2id$v=19$m=65536,t=4,p=1$Rm1lVHBYbVdTSXJCZlZJeg$ueWSipFU5cVbas5lPR55UOioobcaQ5g+YIBTQPY3iiQ', 3, '2023-10-10 19:53:39'),
(10, 'mehmet', 'yilmaz', '', '$argon2id$v=19$m=65536,t=4,p=1$dU5iOFJLOVF5NkNJMHM0cw$N0kxT2bWTBStL4UbUwtbC3FrFffbd0Y9W8nH7tloODs', 3, '2023-10-11 20:42:32'),
(13, 'asfd', 'sdfg', 'mehmetylmzasdfasd', '$argon2id$v=19$m=65536,t=4,p=1$VzUuNWFYMTZzWkt2R0hxZg$Rhjp5zcvadvfJDJk/vU15+2zyHcS7KlcWJLBDP3HIxI', 3, '2023-10-13 01:31:27'),
(14, 'hakan', 'kutucu', 'hkutucu', '$argon2id$v=19$m=65536,t=4,p=1$NVFuUEg1TDk2S0hQTURKWA$Iqcs6W8WCMf5+kGuuMZ7N6oiEnSOWsomG+ifFlN38PI', 2, '2023-10-12 20:51:55'),
(16, '', '', 'admin', '$argon2id$v=19$m=65536,t=4,p=1$eWxrOEVOa3dmZEl4ZW9sNw$oWwsj/RqJ8AKa4G3lZoHwcEQexWWeXnw4OhRLVXjLU4', 1, '2023-10-12 22:17:28'),
(17, 'orhun', 'bayrak', 'orhunb', '$argon2id$v=19$m=65536,t=4,p=1$MmVXTjZ6OHVYL252dzUwVQ$T5GLitW/wOeZ41wZIOd4johSdnhPuUaix/VrpiLzYrQ', 3, '2023-10-13 15:46:39');

--
-- Dökümü yapılmış tablolar için indeksler
--

--
-- Tablo için indeksler `classes`
--
ALTER TABLE `classes`
  ADD PRIMARY KEY (`id`);

--
-- Tablo için indeksler `classesstudents`
--
ALTER TABLE `classesstudents`
  ADD PRIMARY KEY (`id`);

--
-- Tablo için indeksler `exams`
--
ALTER TABLE `exams`
  ADD PRIMARY KEY (`id`);

--
-- Tablo için indeksler `lessons`
--
ALTER TABLE `lessons`
  ADD PRIMARY KEY (`id`);

--
-- Tablo için indeksler `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- Dökümü yapılmış tablolar için AUTO_INCREMENT değeri
--

--
-- Tablo için AUTO_INCREMENT değeri `classes`
--
ALTER TABLE `classes`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- Tablo için AUTO_INCREMENT değeri `classesstudents`
--
ALTER TABLE `classesstudents`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- Tablo için AUTO_INCREMENT değeri `exams`
--
ALTER TABLE `exams`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- Tablo için AUTO_INCREMENT değeri `lessons`
--
ALTER TABLE `lessons`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- Tablo için AUTO_INCREMENT değeri `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

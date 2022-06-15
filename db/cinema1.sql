-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Czas generowania: 20 Paź 2021, 18:30
-- Wersja serwera: 10.4.20-MariaDB
-- Wersja PHP: 8.0.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Baza danych: `cinema1`
--

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `films`
--

CREATE TABLE `films` (
  `id` bigint(20) NOT NULL,
  `name` text COLLATE utf8_polish_ci NOT NULL,
  `img_src` text COLLATE utf8_polish_ci NOT NULL,
  `video_src` text COLLATE utf8_polish_ci NOT NULL,
  `duration` bigint(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_polish_ci;

--
-- Zrzut danych tabeli `films`
--

INSERT INTO `films` (`id`, `name`, `img_src`, `video_src`, `duration`) VALUES
(1, 'MemHub', 'data:image/png;base64,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', './src/video/meme_review.mp4', 120),
(2, 'Venom 2', 'https://cont2.naekranie.pl/wp-content/uploads/2021%2F09%2FE-xl6XhX0AYAMLE_6139cb2edbe4d.jpeg', '', 150),
(4, 'Spider Man Far From Home', 'https://cont4.naekranie.pl/wp-content/uploads/2021%2F08%2Fspider2_6110cfabaa32c.jpeg', '', 160);

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `movie_screenings`
--

CREATE TABLE `movie_screenings` (
  `id` bigint(20) NOT NULL,
  `film` bigint(20) NOT NULL,
  `screening_room` bigint(20) NOT NULL,
  `Date` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_polish_ci;

--
-- Zrzut danych tabeli `movie_screenings`
--

INSERT INTO `movie_screenings` (`id`, `film`, `screening_room`, `Date`) VALUES
(1, 1, 1, '2021-10-13 10:00:00'),
(2, 2, 2, '2021-10-15 18:26:00'),
(5, 2, 2, '2021-10-05 20:39:00'),
(6, 4, 3, '2021-10-12 21:58:00'),
(7, 1, 2, '2021-10-15 21:37:00'),
(8, 1, 3, '2021-11-28 22:11:00'),
(9, 1, 2, '2021-10-15 18:26:00');

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `reserved`
--

CREATE TABLE `reserved` (
  `id` int(11) NOT NULL,
  `user` bigint(20) NOT NULL,
  `movie_screening_id` bigint(20) NOT NULL,
  `seat_id` bigint(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_polish_ci;

--
-- Zrzut danych tabeli `reserved`
--

INSERT INTO `reserved` (`id`, `user`, `movie_screening_id`, `seat_id`) VALUES
(63, 25, 1, 81),
(64, 25, 1, 103),
(65, 25, 1, 104),
(66, 26, 1, 82),
(67, 26, 1, 102),
(68, 26, 1, 122);

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `screening_rooms`
--

CREATE TABLE `screening_rooms` (
  `id` bigint(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_polish_ci;

--
-- Zrzut danych tabeli `screening_rooms`
--

INSERT INTO `screening_rooms` (`id`) VALUES
(1),
(2),
(3);

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `seats`
--

CREATE TABLE `seats` (
  `id` bigint(20) NOT NULL,
  `row_number` int(11) NOT NULL,
  `column_number` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_polish_ci;

--
-- Zrzut danych tabeli `seats`
--

INSERT INTO `seats` (`id`, `row_number`, `column_number`) VALUES
(1, 0, 0),
(2, 0, 1),
(3, 0, 2),
(4, 0, 3),
(5, 0, 4),
(6, 0, 5),
(7, 0, 6),
(8, 0, 7),
(9, 0, 8),
(10, 0, 9),
(11, 0, 10),
(12, 0, 11),
(13, 0, 12),
(14, 0, 13),
(15, 0, 14),
(16, 0, 15),
(17, 0, 16),
(18, 0, 17),
(19, 0, 18),
(20, 0, 19),
(21, 1, 0),
(22, 1, 1),
(23, 1, 2),
(24, 1, 3),
(25, 1, 4),
(26, 1, 5),
(27, 1, 6),
(28, 1, 7),
(29, 1, 8),
(30, 1, 9),
(31, 1, 10),
(32, 1, 11),
(33, 1, 12),
(34, 1, 13),
(35, 1, 14),
(36, 1, 15),
(37, 1, 16),
(38, 1, 17),
(39, 1, 18),
(40, 1, 19),
(41, 2, 0),
(42, 2, 1),
(43, 2, 2),
(44, 2, 3),
(45, 2, 4),
(46, 2, 5),
(47, 2, 6),
(48, 2, 7),
(49, 2, 8),
(50, 2, 9),
(51, 2, 10),
(52, 2, 11),
(53, 2, 12),
(54, 2, 13),
(55, 2, 14),
(56, 2, 15),
(57, 2, 16),
(58, 2, 17),
(59, 2, 18),
(60, 2, 19),
(61, 3, 0),
(62, 3, 1),
(63, 3, 2),
(64, 3, 3),
(65, 3, 4),
(66, 3, 5),
(67, 3, 6),
(68, 3, 7),
(69, 3, 8),
(70, 3, 9),
(71, 3, 10),
(72, 3, 11),
(73, 3, 12),
(74, 3, 13),
(75, 3, 14),
(76, 3, 15),
(77, 3, 16),
(78, 3, 17),
(79, 3, 18),
(80, 3, 19),
(81, 4, 0),
(82, 4, 1),
(83, 4, 2),
(84, 4, 3),
(85, 4, 4),
(86, 4, 5),
(87, 4, 6),
(88, 4, 7),
(89, 4, 8),
(90, 4, 9),
(91, 4, 10),
(92, 4, 11),
(93, 4, 12),
(94, 4, 13),
(95, 4, 14),
(96, 4, 15),
(97, 4, 16),
(98, 4, 17),
(99, 4, 18),
(100, 4, 19),
(101, 5, 0),
(102, 5, 1),
(103, 5, 2),
(104, 5, 3),
(105, 5, 4),
(106, 5, 5),
(107, 5, 6),
(108, 5, 7),
(109, 5, 8),
(110, 5, 9),
(111, 5, 10),
(112, 5, 11),
(113, 5, 12),
(114, 5, 13),
(115, 5, 14),
(116, 5, 15),
(117, 5, 16),
(118, 5, 17),
(119, 5, 18),
(120, 5, 19),
(121, 6, 0),
(122, 6, 1),
(123, 6, 2),
(124, 6, 3),
(125, 6, 4),
(126, 6, 5),
(127, 6, 6),
(128, 6, 7),
(129, 6, 8),
(130, 6, 9),
(131, 6, 10),
(132, 6, 11),
(133, 6, 12),
(134, 6, 13),
(135, 6, 14),
(136, 6, 15),
(137, 6, 16),
(138, 6, 17),
(139, 6, 18),
(140, 6, 19),
(141, 7, 0),
(142, 7, 1),
(143, 7, 2),
(144, 7, 3),
(145, 7, 4),
(146, 7, 5),
(147, 7, 6),
(148, 7, 7),
(149, 7, 8),
(150, 7, 9),
(151, 7, 10),
(152, 7, 11),
(153, 7, 12),
(154, 7, 13),
(155, 7, 14),
(156, 7, 15),
(157, 7, 16),
(158, 7, 17),
(159, 7, 18),
(160, 7, 19),
(161, 8, 0),
(162, 8, 1),
(163, 8, 2),
(164, 8, 3),
(165, 8, 4),
(166, 8, 5),
(167, 8, 6),
(168, 8, 7),
(169, 8, 8),
(170, 8, 9),
(171, 8, 10),
(172, 8, 11),
(173, 8, 12),
(174, 8, 13),
(175, 8, 14),
(176, 8, 15),
(177, 8, 16),
(178, 8, 17),
(179, 8, 18),
(180, 8, 19),
(181, 9, 0),
(182, 9, 1),
(183, 9, 2),
(184, 9, 3),
(185, 9, 4),
(186, 9, 5),
(187, 9, 6),
(188, 9, 7),
(189, 9, 8),
(190, 9, 9),
(191, 9, 10),
(192, 9, 11),
(193, 9, 12),
(194, 9, 13),
(195, 9, 14),
(196, 9, 15),
(197, 9, 16),
(198, 9, 17),
(199, 9, 18),
(200, 9, 19),
(201, 10, 0),
(202, 10, 1),
(203, 10, 2),
(204, 10, 3),
(205, 10, 4),
(206, 10, 5),
(207, 10, 6),
(208, 10, 7),
(209, 10, 8),
(210, 10, 9),
(211, 10, 10),
(212, 10, 11),
(213, 10, 12),
(214, 10, 13),
(215, 10, 14),
(216, 10, 15),
(217, 10, 16),
(218, 10, 17),
(219, 10, 18),
(220, 10, 19),
(221, 11, 0),
(222, 11, 1),
(223, 11, 2),
(224, 11, 3),
(225, 11, 4),
(226, 11, 5),
(227, 11, 6),
(228, 11, 7),
(229, 11, 8),
(230, 11, 9),
(231, 11, 10),
(232, 11, 11),
(233, 11, 12),
(234, 11, 13),
(235, 11, 14),
(236, 11, 15),
(237, 11, 16),
(238, 11, 17),
(239, 11, 18),
(240, 11, 19),
(241, 12, 0),
(242, 12, 1),
(243, 12, 2),
(244, 12, 3),
(245, 12, 4),
(246, 12, 5),
(247, 12, 6),
(248, 12, 7),
(249, 12, 8),
(250, 12, 9),
(251, 12, 10),
(252, 12, 11),
(253, 12, 12),
(254, 12, 13),
(255, 12, 14),
(256, 12, 15),
(257, 12, 16),
(258, 12, 17),
(259, 12, 18),
(260, 12, 19),
(261, 13, 0),
(262, 13, 1),
(263, 13, 2),
(264, 13, 3),
(265, 13, 4),
(266, 13, 5),
(267, 13, 6),
(268, 13, 7),
(269, 13, 8),
(270, 13, 9),
(271, 13, 10),
(272, 13, 11),
(273, 13, 12),
(274, 13, 13),
(275, 13, 14),
(276, 13, 15),
(277, 13, 16),
(278, 13, 17),
(279, 13, 18),
(280, 13, 19),
(281, 14, 0),
(282, 14, 1),
(283, 14, 2),
(284, 14, 3),
(285, 14, 4),
(286, 14, 5),
(287, 14, 6),
(288, 14, 7),
(289, 14, 8),
(290, 14, 9),
(291, 14, 10),
(292, 14, 11),
(293, 14, 12),
(294, 14, 13),
(295, 14, 14),
(296, 14, 15),
(297, 14, 16),
(298, 14, 17),
(299, 14, 18),
(300, 14, 19);

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `users`
--

CREATE TABLE `users` (
  `id` bigint(20) NOT NULL,
  `login` varchar(30) COLLATE utf8_polish_ci NOT NULL,
  `password` text CHARACTER SET ascii COLLATE ascii_bin NOT NULL,
  `phone` varchar(20) COLLATE utf8_polish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_polish_ci;

--
-- Zrzut danych tabeli `users`
--

INSERT INTO `users` (`id`, `login`, `password`, `phone`) VALUES
(0, 'admin', '?????z???9 ?B?V', '000-000-000'),
(25, 'your', '??%??7?;Y??\Z\n??', '123-123-123'),
(26, '123', '??Fr?pU?<6?oz?', '123-012-123');

--
-- Indeksy dla zrzutów tabel
--

--
-- Indeksy dla tabeli `films`
--
ALTER TABLE `films`
  ADD PRIMARY KEY (`id`);

--
-- Indeksy dla tabeli `movie_screenings`
--
ALTER TABLE `movie_screenings`
  ADD PRIMARY KEY (`id`),
  ADD KEY `film` (`film`,`screening_room`),
  ADD KEY `screening_room` (`screening_room`);

--
-- Indeksy dla tabeli `reserved`
--
ALTER TABLE `reserved`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user` (`user`,`movie_screening_id`),
  ADD KEY `movie_screening_id` (`movie_screening_id`),
  ADD KEY `seat_id` (`seat_id`);

--
-- Indeksy dla tabeli `screening_rooms`
--
ALTER TABLE `screening_rooms`
  ADD PRIMARY KEY (`id`);

--
-- Indeksy dla tabeli `seats`
--
ALTER TABLE `seats`
  ADD PRIMARY KEY (`id`);

--
-- Indeksy dla tabeli `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `login` (`login`);

--
-- AUTO_INCREMENT dla zrzuconych tabel
--

--
-- AUTO_INCREMENT dla tabeli `films`
--
ALTER TABLE `films`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT dla tabeli `movie_screenings`
--
ALTER TABLE `movie_screenings`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT dla tabeli `reserved`
--
ALTER TABLE `reserved`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=69;

--
-- AUTO_INCREMENT dla tabeli `screening_rooms`
--
ALTER TABLE `screening_rooms`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT dla tabeli `seats`
--
ALTER TABLE `seats`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=301;

--
-- AUTO_INCREMENT dla tabeli `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- Ograniczenia dla zrzutów tabel
--

--
-- Ograniczenia dla tabeli `movie_screenings`
--
ALTER TABLE `movie_screenings`
  ADD CONSTRAINT `movie_screenings_ibfk_1` FOREIGN KEY (`screening_room`) REFERENCES `screening_rooms` (`id`),
  ADD CONSTRAINT `movie_screenings_ibfk_2` FOREIGN KEY (`film`) REFERENCES `films` (`id`);

--
-- Ograniczenia dla tabeli `reserved`
--
ALTER TABLE `reserved`
  ADD CONSTRAINT `reserved_ibfk_1` FOREIGN KEY (`user`) REFERENCES `users` (`id`),
  ADD CONSTRAINT `reserved_ibfk_2` FOREIGN KEY (`movie_screening_id`) REFERENCES `movie_screenings` (`id`),
  ADD CONSTRAINT `reserved_ibfk_3` FOREIGN KEY (`seat_id`) REFERENCES `seats` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1
-- Généré le :  mer. 27 déc. 2023 à 14:51
-- Version du serveur :  10.4.10-MariaDB
-- Version de PHP :  8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données :  `todolist`
--

-- --------------------------------------------------------

--
-- Structure de la table `task`
--

CREATE TABLE `task` (
  `id` int(11) NOT NULL,
  `created_at` datetime NOT NULL,
  `title` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `content` longtext COLLATE utf8_unicode_ci NOT NULL,
  `is_done` tinyint(1) NOT NULL,
  `user_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Déchargement des données de la table `task`
--

INSERT INTO `task` (`id`, `created_at`, `title`, `content`, `is_done`, `user_id`) VALUES
(487, '2023-12-23 11:00:40', 'Vel', 'Suscipit.', 0, NULL),
(488, '2023-12-23 11:00:40', 'Dicta est', 'Officiis.', 0, NULL),
(489, '2023-12-23 11:00:40', 'Rerum', 'Et omnis.', 0, NULL),
(490, '2023-12-23 11:00:40', 'Ut aut', 'Qui.', 1, NULL),
(491, '2023-12-23 11:00:40', 'Aut sit', 'Eius.', 0, 249),
(492, '2023-12-23 11:00:40', 'Omnis', 'Amet sed.', 0, NULL),
(493, '2023-12-23 11:00:40', 'Dolor', 'Commodi.', 0, 275),
(494, '2023-12-23 11:00:40', 'Harum', 'Occaecati.', 0, 252),
(495, '2023-12-23 11:00:40', 'Eum et id', 'Ducimus.', 0, NULL),
(496, '2023-12-23 11:00:40', 'Earum', 'Culpa.', 0, NULL),
(497, '2023-12-23 11:00:40', 'Rerum quo', 'Ut.', 0, 275),
(498, '2023-12-23 11:00:40', 'Similique', 'Eum et ab.', 0, 272),
(499, '2023-12-23 11:00:40', 'Vel sint', 'Iste.', 0, NULL),
(500, '2023-12-23 11:00:40', 'Est et', 'Cum odit.', 0, 275),
(501, '2023-12-23 11:00:40', 'Est odit', 'Non ut.', 0, 257),
(502, '2023-12-23 11:00:40', 'Et', 'Ipsam.', 0, 248),
(503, '2023-12-23 11:00:40', 'Earum', 'Sit.', 0, NULL),
(504, '2023-12-23 11:00:40', 'Quam', 'Ut omnis.', 0, 275),
(505, '2023-12-23 11:00:40', 'Vero qui', 'Aliquid.', 0, 271),
(506, '2023-12-23 11:00:40', 'Accusamus', 'Odio.', 0, NULL),
(507, '2023-12-23 11:00:40', 'Non at', 'Ut ipsum.', 0, NULL),
(508, '2023-12-23 11:00:40', 'Aut minus', 'Iure.', 0, 273),
(509, '2023-12-23 11:00:40', 'Fugiat', 'Tempora.', 0, NULL),
(510, '2023-12-23 11:00:40', 'Quis ut', 'Qui saepe.', 0, 271),
(511, '2023-12-23 11:00:40', 'Et', 'Minus.', 0, 262),
(512, '2023-12-23 11:00:40', 'Minus', 'Provident.', 0, NULL),
(513, '2023-12-23 11:00:40', 'Repellat', 'Cum.', 0, 243),
(514, '2023-12-23 11:00:40', 'Aut non', 'Adipisci.', 0, 269),
(515, '2023-12-23 11:00:40', 'Autem', 'Est atque.', 0, NULL),
(516, '2023-12-23 11:00:40', 'Deserunt', 'Laborum.', 0, NULL),
(517, '2023-12-23 11:00:40', 'Minus ut', 'Illo.', 0, 279),
(518, '2023-12-23 11:00:40', 'Enim est', 'Ratione.', 0, 272),
(519, '2023-12-23 11:00:40', 'Eligendi', 'Id.', 0, NULL),
(520, '2023-12-23 11:00:40', 'Facilis', 'Occaecati.', 0, 253),
(521, '2023-12-23 11:00:40', 'Placeat', 'Sit modi.', 0, NULL),
(522, '2023-12-23 11:00:40', 'Quia nemo', 'Et nemo.', 0, 252),
(523, '2023-12-23 11:00:40', 'Natus', 'Possimus.', 0, 248);

-- --------------------------------------------------------

--
-- Structure de la table `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `username` varchar(25) COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(64) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(60) COLLATE utf8_unicode_ci NOT NULL,
  `roles` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin NOT NULL COMMENT '(DC2Type:json)' CHECK (json_valid(`roles`))
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Déchargement des données de la table `user`
--

INSERT INTO `user` (`id`, `username`, `password`, `email`, `roles`) VALUES
(242, 'User1', '$2y$10$bskDHypRytYnfLlVCdftgOqpD2ueRvGIXnjfZNXFkrKWb64wx1ZIO', 'user1@gmail.com', '[\"ROLE_ADMIN\"]'),
(243, 'User2', '$2y$10$2bvRhfFuh3EIc5QbN2WeTeVcA87VoatZs.Ye4MHs.bVdkJcn/XcNK', 'user2@gmail.com', '[\"ROLE_ADMIN\"]'),
(244, 'User3', '$2y$10$Gb..hnptAPXJjlTWJJlJO.xx37OxJ6kP2.MoWgdsxXorkgOU9njFW', 'user3@gmail.com', '[\"ROLE_ADMIN\"]'),
(245, 'User4', '$2y$10$lpugPSanl2W28/rVsiGgSuiXGQP38rYCrqqeEBpC7TSGqNeQow6hq', 'user4@gmail.com', '[\"ROLE_ADMIN\"]'),
(246, 'User5', '$2y$10$FAOI49CbmgehNdyihhWxQ.i6JVDGP0h5cxOeKv9EnKH6/EIQzCgKe', 'user5@gmail.com', '[\"ROLE_ADMIN\"]'),
(247, 'User6', '$2y$10$gV./jo3dwNU3i622kBx5d.BCAR1d1yJoVUImnnkWNS7LS7XsJ7gfu', 'user6@gmail.com', '[\"ROLE_USER\"]'),
(248, 'User7', '$2y$10$qx6DkDVVzUHFKHV2juEg3OPpyE1pUBgdw7GBWouXHNM4ed/oVNxfm', 'user7@gmail.com', '[\"ROLE_USER\"]'),
(249, 'User8', '$2y$10$2hlwOwUhBkxPjkYeTunVEumKtA3jmlHGVGv.iMB1kkOyJ.f.yZn3y', 'user8@gmail.com', '[\"ROLE_USER\"]'),
(250, 'User9', '$2y$10$Bn4coOYv92sm30YWOKRAPevt2JiX26A/JITaOdPaRE2vPgVrr9W8S', 'user9@gmail.com', '[\"ROLE_USER\"]'),
(251, 'User10', '$2y$10$Pbv4bPcuYdEq3bWL62xT8OjMj.33ULeY7Qx5K9Y3FjbH1Kh6OZo0a', 'user10@gmail.com', '[\"ROLE_USER\"]'),
(252, 'User11', '$2y$10$gcD08O5s/gW55TPaYDHIo.bkVtJA5YeAy6M49HleEQZ/Txm3g6zHG', 'user11@gmail.com', '[\"ROLE_USER\"]'),
(253, 'User12', '$2y$10$DzCiiJJeKB.TGPGJRz7BGexNyuzeJFRs8.vGnUv.WMhSVR2aqkzOS', 'user12@gmail.com', '[\"ROLE_USER\"]'),
(254, 'User13', '$2y$10$nNyl.yE165QTHfMr6ZHb7uBdJc5rF8zQyfqtpMHRq1QNAfwYHzuz2', 'user13@gmail.com', '[\"ROLE_USER\"]'),
(255, 'User14', '$2y$10$cjTxItXjHMD5bTk0rwuI9edLZXuTX2t8kftUteO84Gq8XCzoyElUO', 'user14@gmail.com', '[\"ROLE_USER\"]'),
(256, 'User15', '$2y$10$oBT2hUNVVIj..n7HDqw8he5V5uDkzEIi4bkG5D9Usx2GWPqbcYf0q', 'user15@gmail.com', '[\"ROLE_USER\"]'),
(257, 'User16', '$2y$10$5.TbFnJMa.aH.P2dri8YnOOIjBIX5tk94y37MLtTq4nTvX./p.Rra', 'user16@gmail.com', '[\"ROLE_USER\"]'),
(258, 'User17', '$2y$10$A91NmXsfTC6odexC4Ldk.OdY1fiFJ//BL60RFvbCdXa6erGetUA4C', 'user17@gmail.com', '[\"ROLE_USER\"]'),
(259, 'User18', '$2y$10$RLstro2iqExhdOWmjpo2kedgdAHSk2UBqGHT6xUffzSklithL6UwG', 'user18@gmail.com', '[\"ROLE_USER\"]'),
(260, 'User19', '$2y$10$pth5y9.eUfEY4.z7ZnlRn.fIQ/aeyIzlI2WHp.WNrPl1B3UAIEHuy', 'user19@gmail.com', '[\"ROLE_USER\"]'),
(261, 'User20', '$2y$10$V1EbvDCmlMPThrRQUBTGy.Bf84l7Azbz/jogV70DD16CGwZC20g9.', 'user20@gmail.com', '[\"ROLE_USER\"]'),
(262, 'User21', '$2y$10$YflUr27jtTF5ds9jNeIHg.c8PB7x3Y2L47be471LmHaDKYzn0B8kO', 'user21@gmail.com', '[\"ROLE_USER\"]'),
(263, 'User22', '$2y$10$nrD4tm0rZn0Y9sLxaOpB/eio60lMPwtYSvRiZmY5AP1CHfKDpM2z6', 'user22@gmail.com', '[\"ROLE_USER\"]'),
(264, 'User23', '$2y$10$ytDjNN3.aclobBhz8AEdIuulzzVS8vZFnaJbCnm.DCOcIEtz9Dp/O', 'user23@gmail.com', '[\"ROLE_USER\"]'),
(265, 'User24', '$2y$10$/aW080oWUx7qjNIL/lxKceYKmyBZeLO.JzYHQoVW32M3l5nbEC5Za', 'user24@gmail.com', '[\"ROLE_USER\"]'),
(266, 'User25', '$2y$10$zlgQY3AbgG.ZBew1QS45jOTxO/pC7bi4v6GUY2DLqa/DR.NSlcYa6', 'user25@gmail.com', '[\"ROLE_USER\"]'),
(267, 'User26', '$2y$10$AZwTBSnJfuQ6ugDAIoeo9u6.yr6cnpyAxG3Bb37kgY5yO5ADI0SyK', 'user26@gmail.com', '[\"ROLE_USER\"]'),
(268, 'User27', '$2y$10$9/OIM7X0eSgI37D3uPgYYueNZA/R55gyFgfaDjo8RxrlG9a67AlOO', 'user27@gmail.com', '[\"ROLE_USER\"]'),
(269, 'User28', '$2y$10$yfkDgKfWr6y.XwCGZW/NrenUhfOX90qy4Fez78kxr85HrFoY/O3Zu', 'user28@gmail.com', '[\"ROLE_USER\"]'),
(270, 'User29', '$2y$10$SnB.PM2jTDvAc4drjrWeP.WWExAY54j2CvRygpylVCzyG8cSEpEZm', 'user29@gmail.com', '[\"ROLE_USER\"]'),
(271, 'User30', '$2y$10$jtiGxwGBeWEjxZtSM14cdekf2d4G9IHSCff.eHLv5OiJTC4wfriFe', 'user30@gmail.com', '[\"ROLE_USER\"]'),
(272, 'User31', '$2y$10$EX1/0J9ba7QFjBlqmWNvDuP5l0NaDsn412gNwr4ao8ov9na9P9MR6', 'user31@gmail.com', '[\"ROLE_USER\"]'),
(273, 'User32', '$2y$10$FOKjzybNjBSaX7qLQBrnSe.qHXdFIxyMAjty585Gm2TPS1TOFi.46', 'user32@gmail.com', '[\"ROLE_USER\"]'),
(274, 'User33', '$2y$10$t9VpXoDIkn3vQHI623yPeOIwaGOyDujkIYNxxgsBTl3IMj7pADDMq', 'user33@gmail.com', '[\"ROLE_USER\"]'),
(275, 'User34', '$2y$10$HrCgOkPEh8AALFPw7om1b.HwribrJKdNLt/UiTRhWqHPt/w28/lAa', 'user34@gmail.com', '[\"ROLE_USER\"]'),
(276, 'User35', '$2y$10$40CfGJIoMTAktglgsEuIQOXHp1NSoMxbdKpZW64or/a7x1kR7V72.', 'user35@gmail.com', '[\"ROLE_USER\"]'),
(277, 'User36', '$2y$10$YAEn4QYBmXL/DHkGMSuTAOZvxvZybsDisOXVNZXH8FSBF6z1qfLFy', 'user36@gmail.com', '[\"ROLE_USER\"]'),
(278, 'User37', '$2y$10$6.p7pQIhnfg/UBujtpiKO.LePv2wnR/JIEpK9.oIEQKN3fMBPaJX6', 'user37@gmail.com', '[\"ROLE_USER\"]'),
(279, 'User38', '$2y$10$6fzMEghP1.069JR2T5flDuMsQSXhKa4fzPs8gXs2bWdNnKwWh/3tK', 'user38@gmail.com', '[\"ROLE_USER\"]'),
(280, 'User39', '$2y$10$.JlXqDlQ4ATwodOV0.boFO9qVW950ENTactK2Jz1qlyK8D27hQa3K', 'user39@gmail.com', '[\"ROLE_USER\"]'),
(281, 'User40', '$2y$10$dk70rmJVJsnb91rfJej4IuQrnO57ItqXwseKzp1FwDw4EE16HblDu', 'user40@gmail.com', '[\"ROLE_USER\"]');

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `task`
--
ALTER TABLE `task`
  ADD PRIMARY KEY (`id`),
  ADD KEY `IDX_527EDB25A76ED395` (`user_id`);

--
-- Index pour la table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `UNIQ_8D93D649F85E0677` (`username`),
  ADD UNIQUE KEY `UNIQ_8D93D649E7927C74` (`email`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `task`
--
ALTER TABLE `task`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=524;

--
-- AUTO_INCREMENT pour la table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=282;

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `task`
--
ALTER TABLE `task`
  ADD CONSTRAINT `FK_527EDB25A76ED395` FOREIGN KEY (`user_id`) REFERENCES `user` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

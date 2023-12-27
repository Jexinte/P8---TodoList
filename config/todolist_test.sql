-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1
-- Généré le :  mer. 27 déc. 2023 à 14:52
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
-- Base de données :  `todolist_test`
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
(1053, '2023-12-27 14:31:19', 'Tâche modifiée avec isolation de la connexion', 'Contenu modifié avec isolation de l\'accès à l\'utilisateur', 1, 1000),
(1054, '2023-12-27 14:31:19', 'Ducimus', 'Eaque.', 0, 1010),
(1056, '2023-12-27 14:31:19', 'Qui', 'Alias.', 0, NULL),
(1057, '2023-12-27 14:31:19', 'Amet', 'Aperiam.', 0, 1007),
(1058, '2023-12-27 14:31:19', 'Sit', 'Laborum.', 0, 990),
(1059, '2023-12-27 14:31:19', 'Doloribus', 'Omnis.', 0, NULL),
(1060, '2023-12-27 14:31:19', 'Non ea', 'Quisquam.', 0, 991),
(1061, '2023-12-27 14:31:19', 'Quod sit', 'Dolore.', 0, 989),
(1062, '2023-12-27 14:31:19', 'Ut', 'Numquam.', 0, 999),
(1063, '2023-12-27 14:31:19', 'Numquam', 'Sunt.', 0, 1011),
(1064, '2023-12-27 14:31:19', 'Nihil', 'Quia quas.', 0, NULL),
(1065, '2023-12-27 14:31:19', 'Quod enim', 'Est at.', 0, NULL),
(1066, '2023-12-27 14:31:19', 'Ut cum id', 'Iusto.', 0, NULL),
(1067, '2023-12-27 14:31:19', 'Sed vero', 'Dolor et.', 0, NULL),
(1068, '2023-12-27 14:31:19', 'Molestiae', 'Deserunt.', 0, NULL),
(1069, '2023-12-27 14:31:19', 'Magni', 'Qui.', 0, 1010),
(1070, '2023-12-27 14:31:19', 'Quis quia', 'Sed.', 0, 979),
(1071, '2023-12-27 14:31:19', 'Deserunt', 'Et ut sit.', 0, 998),
(1072, '2023-12-27 14:31:19', 'Mollitia', 'Fugit.', 0, 992),
(1073, '2023-12-27 14:31:19', 'Ut', 'Similique.', 0, 987),
(1074, '2023-12-27 14:31:19', 'Id amet', 'Sit.', 0, NULL),
(1075, '2023-12-27 14:31:19', 'Sunt et', 'Provident.', 0, NULL),
(1076, '2023-12-27 14:31:19', 'Vero', 'Sit.', 0, 979),
(1077, '2023-12-27 14:31:19', 'Quia ut', 'Deleniti.', 0, NULL),
(1078, '2023-12-27 14:31:19', 'Molestiae', 'Ipsam id.', 0, 1005),
(1079, '2023-12-27 14:31:19', 'Eos sed', 'Culpa.', 0, NULL),
(1080, '2023-12-27 14:31:19', 'Ratione', 'Qui.', 0, NULL),
(1081, '2023-12-27 14:31:19', 'Molestiae', 'Magni qui.', 0, NULL),
(1082, '2023-12-27 14:31:19', 'Facilis', 'Dolor et.', 0, 1006),
(1083, '2023-12-27 14:31:19', 'Illum', 'In qui.', 0, NULL),
(1084, '2023-12-27 14:31:19', 'Beatae', 'Nihil.', 0, NULL),
(1085, '2023-12-27 14:31:19', 'Tempore', 'Et error.', 0, NULL),
(1086, '2023-12-27 14:31:19', 'Voluptas', 'Vitae.', 0, NULL),
(1087, '2023-12-27 14:31:19', 'Et', 'Libero.', 0, NULL),
(1088, '2023-12-27 14:31:19', 'At ad', 'Unde.', 0, 998),
(1089, '2023-12-27 14:31:19', 'Debitis', 'Porro qui.', 0, NULL),
(1090, '2023-12-27 14:31:19', 'Optio', 'Labore.', 0, NULL),
(1091, '2023-12-27 14:31:19', 'Quam', 'Est.', 0, NULL),
(1092, '2023-12-27 14:31:19', 'Qui ipsa', 'Omnis.', 0, NULL),
(1093, '2023-12-27 14:43:19', 'Tâche test', 'Welcome on Todo App', 0, 978);

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
(978, 'User1', '$2y$13$orCkM9OWp0M95j5mUIClE./SviYGXQiNY0g7cSa03A1uxyPBo.WDq', 'user1@gmail.com', '[\"ROLE_USER\"]'),
(979, 'User2', '$2y$10$x7Amq4e2Qa0KJbDFNbL2YeDqiBGyeOkgs.Dco7ty1Fh4ZHZB2I9.G', 'user2@gmail.com', '[\"ROLE_ADMIN\"]'),
(980, 'User3', '$2y$10$ofLbMFYOrt6bI/wgm4Ty5O9qXY1cM60q/4SsvyAtON1UPQDfI/Upq', 'user3@gmail.com', '[\"ROLE_ADMIN\"]'),
(981, 'User4', '$2y$10$sEVYkdK39ZGHcEcsMeNCXu8oIFMxfUXma1QwKPVLXiEEcEBgDikD6', 'user4@gmail.com', '[\"ROLE_ADMIN\"]'),
(982, 'User5', '$2y$10$YPsHkVs6HZ/8c5KPvxSsLO2j.5nqT./Ah/la4OkZN21Kubl4BuhNy', 'user5@gmail.com', '[\"ROLE_ADMIN\"]'),
(983, 'User6', '$2y$10$07EuGIFamFbOn6rXWKpiJeFfCS9Tuq/Hup.OMqt5oKwfRcdNyqqd.', 'user6@gmail.com', '[\"ROLE_USER\"]'),
(984, 'User7', '$2y$10$ENCAKenIl4FPxif/VZUfW.DDpB5Uj6t./19EDmVV/GQlO.1c6dB3a', 'user7@gmail.com', '[\"ROLE_USER\"]'),
(985, 'User8', '$2y$10$uurzZQR0tPyzQDBjxQSdfeFQ7fMB429Ki.FIFuqtwgWRYkcgVcJCu', 'user8@gmail.com', '[\"ROLE_USER\"]'),
(986, 'User9', '$2y$10$vX0qmDYdYM.d7WAkfMHDd.yH9H6gmnFkL4NtSF5pfL6IwACktyL6u', 'user9@gmail.com', '[\"ROLE_USER\"]'),
(987, 'User10', '$2y$10$hgF7KT6BHQlmDSjaJ1yGjunaCFdAnMHqspCJaduYCLttecQor2qJy', 'user10@gmail.com', '[\"ROLE_USER\"]'),
(988, 'User11', '$2y$10$o14eQyr2I.qBbdSzX6U/Pu3brj6jQQZeN1sUpPHkYA6dZgcHr3m5a', 'user11@gmail.com', '[\"ROLE_USER\"]'),
(989, 'User12', '$2y$10$Iro4TjIBWRxiZE1qZIcupeUPxAjzEBJWHSZcO.jvnFO9gWAfrxfSy', 'user12@gmail.com', '[\"ROLE_USER\"]'),
(990, 'User13', '$2y$10$U3CrIMDFc7hhVVpqac2m..sjth80srnwceFzMV2QpboeZTcz1IFhi', 'user13@gmail.com', '[\"ROLE_USER\"]'),
(991, 'User14', '$2y$10$oMGx578cLGsVeFBILiXh5uMVjNus7qfWafui1OLJ4Pq2e2ELj9dIS', 'user14@gmail.com', '[\"ROLE_USER\"]'),
(992, 'User15', '$2y$10$..3fQLpR/7c2h.OMzMmyqOjTmVHZP6fTgQrv.agpRsWNqzccHoDLC', 'user15@gmail.com', '[\"ROLE_USER\"]'),
(993, 'User16', '$2y$10$BLTFdCwGEYFo9WSu5CneBeNrAraISl3trOpwwFE0eBikrRN/Ab15y', 'user16@gmail.com', '[\"ROLE_USER\"]'),
(994, 'User17', '$2y$10$0fu1MMA3A5.G7XzoO9W8yeHUaqWfkq4pEMpsh0k4aeKivt1CRTIDy', 'user17@gmail.com', '[\"ROLE_USER\"]'),
(995, 'User18', '$2y$10$ny0dGDkvfFD9Y5Tq5LKT3.17uwAxXJoslIUBJkgYhHUkgkY7pdOt2', 'user18@gmail.com', '[\"ROLE_USER\"]'),
(996, 'User19', '$2y$10$I7x4BDYE/QD40XPwN5Y2j.2MQJvcELVSCkD9cF7ILdsw0dYumHIMa', 'user19@gmail.com', '[\"ROLE_USER\"]'),
(997, 'User20', '$2y$10$Ry49v8tHUvwROylc8NdFeOM.OIC9AjqylAmF8b3vcU1ZuDhhyv89i', 'user20@gmail.com', '[\"ROLE_USER\"]'),
(998, 'User21', '$2y$10$2vCQw6b/2F72XBkWIhv5Eu0vskCV0QG8yqxdP4h2diCOsH7NKsm9K', 'user21@gmail.com', '[\"ROLE_USER\"]'),
(999, 'User22', '$2y$10$I67QY.NU7U4Dm/mGZWibwuebNqk4ATM55fBT80q0P3h2sT.hRBFwK', 'user22@gmail.com', '[\"ROLE_USER\"]'),
(1000, 'User23', '$2y$10$MP8xitqL9Vcuvv3QfZqze.OTmtO15KxaezvJrL32ba9ZX08cNrhCe', 'user23@gmail.com', '[\"ROLE_USER\"]'),
(1001, 'User24', '$2y$10$ou5Vv.7049ubTAPW1CnD5ugwaYP5HRZVQRVFE9f6MLIbKchU5DWwq', 'user24@gmail.com', '[\"ROLE_USER\"]'),
(1002, 'User25', '$2y$10$0HEs1HcpAbbnL6M48gEPkuTvAE36/Bk5vslAYQydY2rc29o7TRrpu', 'user25@gmail.com', '[\"ROLE_USER\"]'),
(1003, 'User26', '$2y$10$0Wf8vwcHNHclkcVrpXx5gekqNQ3Yba2cZp3pI0kv5H3eHDA5bwlkq', 'user26@gmail.com', '[\"ROLE_USER\"]'),
(1004, 'User27', '$2y$10$bp/L.R8E0CShyBz.Oa.kyeD7vHbV7eCNhRO7qcM.64EhvHKIPcX5K', 'user27@gmail.com', '[\"ROLE_USER\"]'),
(1005, 'User28', '$2y$10$JbofwYjWdi672fsHEGJXB.H099ozL05EpMCHjocWVDSWKQwB7tBhC', 'user28@gmail.com', '[\"ROLE_USER\"]'),
(1006, 'User29', '$2y$10$l.kiGzJatcejT41nAHuxcuUAgD6fBKSE.7dxCde5izEowcLWlgQaW', 'user29@gmail.com', '[\"ROLE_USER\"]'),
(1007, 'User30', '$2y$10$PvBY7D7dk2LpkTrV2oK3de.F6C.RMAD5hGF0h3fqMQGc/CEdc5GQK', 'user30@gmail.com', '[\"ROLE_USER\"]'),
(1008, 'User31', '$2y$10$kociO1Nr0kRj2aor2WRHxOTjg4nRUzhFQDgOsJTb1BX.1mR8P.O8G', 'user31@gmail.com', '[\"ROLE_USER\"]'),
(1009, 'User32', '$2y$10$91DuTu8ZE8qmQ4ecKkH0GeesGi8K1LUMEhtKq2C92Z7KjCZQoSoAO', 'user32@gmail.com', '[\"ROLE_USER\"]'),
(1010, 'User33', '$2y$10$P7LathG4my0RRr.05WJAcOSiJG2mo2HT/hEXdklXdf7Bx4ihIA/uq', 'user33@gmail.com', '[\"ROLE_USER\"]'),
(1011, 'User34', '$2y$10$sZSnyMFEsRpxnINW7SkFyO88Pov39DMpKgGUmDltMpEWvjGD3mGYi', 'user34@gmail.com', '[\"ROLE_USER\"]'),
(1012, 'User35', '$2y$10$yfs2Fp9XSfGrUzuoWWcyBOJf6E0KWMOIvgz9wP2.2X7oL4xLRmxo6', 'user35@gmail.com', '[\"ROLE_USER\"]'),
(1013, 'User36', '$2y$10$A6ksr393tmCIu4dnsj5sRO3gxlfSWb7ndloF7oGNQb1sNOI2gwY/O', 'user36@gmail.com', '[\"ROLE_USER\"]'),
(1014, 'User37', '$2y$10$2zkANVza4b.HZI/kYbSTbOcFRBtnE8Gk5F1HMSg5v0JbfLM24eVie', 'user37@gmail.com', '[\"ROLE_USER\"]'),
(1015, 'User38', '$2y$10$ag.82dN9cUcj21Is/tvS9uhe5xOitQwoBcuRACQXWwlPGfr6AvEJ.', 'user38@gmail.com', '[\"ROLE_USER\"]'),
(1016, 'User39', '$2y$10$wsQjTx9QBt0758.iwJxx3OIzCeCJWh59hcjiSzVof.xlONuWusVW.', 'user39@gmail.com', '[\"ROLE_USER\"]'),
(1017, 'User40', '$2y$10$2E5Xp4YZ4QMk.PTgwjE31uV1niG47uaFjZzcQoxMq7lD7yQoVKO1K', 'user40@gmail.com', '[\"ROLE_USER\"]'),
(1018, 'Testu', '$2y$13$tZXsQILlKq59LaLLR0VPjudGn5/20thATmY2m4sl5Mf3GoHxxhjVG', 'testua@gmail.com', '[\"ROLE_ADMIN\"]');

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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1094;

--
-- AUTO_INCREMENT pour la table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1019;

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

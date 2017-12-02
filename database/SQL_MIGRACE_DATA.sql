-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Počítač: 127.0.0.1
-- Vytvořeno: Sob 02. pro 2017, 11:50
-- Verze serveru: 10.1.26-MariaDB
-- Verze PHP: 7.1.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Databáze: `iis`
--

-- --------------------------------------------------------

--
-- Struktura tabulky `cisteni`
--

CREATE TABLE `cisteni` (
  `id` int(10) UNSIGNED NOT NULL,
  `idOsetrovatele` int(10) UNSIGNED NOT NULL,
  `idVybehu` int(10) UNSIGNED NOT NULL,
  `casCisteni` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Vypisuji data pro tabulku `cisteni`
--

INSERT INTO `cisteni` (`id`, `idOsetrovatele`, `idVybehu`, `casCisteni`) VALUES
(1, 2, 1, '08:30');

-- --------------------------------------------------------

--
-- Struktura tabulky `druhzvirete`
--

CREATE TABLE `druhzvirete` (
  `id` int(10) UNSIGNED NOT NULL,
  `nazev` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Vypisuji data pro tabulku `druhzvirete`
--

INSERT INTO `druhzvirete` (`id`, `nazev`) VALUES
(1, 'Parosnicka rajska'),
(2, 'Lev africky'),
(3, 'Jelen lesny');

-- --------------------------------------------------------

--
-- Struktura tabulky `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Vypisuji data pro tabulku `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2013_10_27_000000_create_tables', 1),
(2, '2014_10_12_000000_create_users_table', 1),
(3, '2014_10_12_100000_create_password_resets_table', 1),
(4, '2015_01_15_105324_create_roles_table', 1),
(5, '2015_01_15_114412_create_role_user_table', 1),
(6, '2015_01_26_115212_create_permissions_table', 1),
(7, '2015_01_26_115523_create_permission_role_table', 1),
(8, '2015_02_09_132439_create_permission_user_table', 1);

-- --------------------------------------------------------

--
-- Struktura tabulky `osetrovalmaskoleni`
--

CREATE TABLE `osetrovalmaskoleni` (
  `idOsetrovatele` int(10) UNSIGNED NOT NULL,
  `idSkoleni` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Vypisuji data pro tabulku `osetrovalmaskoleni`
--

INSERT INTO `osetrovalmaskoleni` (`idOsetrovatele`, `idSkoleni`) VALUES
(2, 1),
(2, 2),
(3, 3),
(3, 5),
(4, 4),
(4, 6);

-- --------------------------------------------------------

--
-- Struktura tabulky `osetrovatel`
--

CREATE TABLE `osetrovatel` (
  `id` int(10) UNSIGNED NOT NULL,
  `rodneCislo` bigint(20) NOT NULL,
  `jmeno` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `prijmeni` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `vzdelani` varchar(20) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `titul` varchar(10) COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Vypisuji data pro tabulku `osetrovatel`
--

INSERT INTO `osetrovatel` (`id`, `rodneCislo`, `jmeno`, `prijmeni`, `vzdelani`, `titul`) VALUES
(1, 8012093359, 'Admin', 'Admin', 'vysokoskolske', 'ING'),
(2, 9558244494, 'Libor', 'Bousek', 'vysokoskolske', 'MGR'),
(3, 9158206539, 'Marian', 'Ostrcil', 'vysokoskolske', 'PHDR'),
(4, 9711242114, 'Martin', 'Silny', 'stredoskolske', 'nema'),
(5, 9103080873, 'Martin', 'Hubeny', 'stredoskolske', 'nema');

-- --------------------------------------------------------

--
-- Struktura tabulky `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktura tabulky `permissions`
--

CREATE TABLE `permissions` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `model` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktura tabulky `permission_role`
--

CREATE TABLE `permission_role` (
  `id` int(10) UNSIGNED NOT NULL,
  `permission_id` int(10) UNSIGNED NOT NULL,
  `role_id` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktura tabulky `permission_user`
--

CREATE TABLE `permission_user` (
  `id` int(10) UNSIGNED NOT NULL,
  `permission_id` int(10) UNSIGNED NOT NULL,
  `user_id` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktura tabulky `roles`
--

CREATE TABLE `roles` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `level` int(11) NOT NULL DEFAULT '1',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Vypisuji data pro tabulku `roles`
--

INSERT INTO `roles` (`id`, `name`, `slug`, `description`, `level`, `created_at`, `updated_at`) VALUES
(1, 'Admin', 'admin', 'Vedoucí zoo', 3, '2017-11-24 07:58:37', '2017-11-24 07:58:37'),
(2, 'HlavniOsetrovatel', 'hlavniosetrovatel', 'Hlavní ošetřovatel', 2, '2017-11-24 07:58:42', '2017-11-24 07:58:42'),
(3, 'Osetrovatel', 'osetrovatel', 'Ošetřovatel', 1, '2017-11-24 07:58:47', '2017-11-24 07:58:47');

-- --------------------------------------------------------

--
-- Struktura tabulky `role_user`
--

CREATE TABLE `role_user` (
  `id` int(10) UNSIGNED NOT NULL,
  `role_id` int(10) UNSIGNED NOT NULL,
  `user_id` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Vypisuji data pro tabulku `role_user`
--

INSERT INTO `role_user` (`id`, `role_id`, `user_id`, `created_at`, `updated_at`) VALUES
(1, 1, 1, '2017-11-24 11:17:14', '2017-11-24 11:17:14'),
(2, 2, 2, '2017-11-24 11:18:30', '2017-11-24 11:18:30'),
(3, 2, 3, '2017-11-24 11:18:33', '2017-11-24 11:18:33'),
(4, 3, 4, '2017-11-24 11:18:36', '2017-11-24 11:18:36'),
(5, 3, 5, '2017-11-24 11:18:38', '2017-11-24 11:18:38');

-- --------------------------------------------------------

--
-- Struktura tabulky `skoleni`
--

CREATE TABLE `skoleni` (
  `id` int(10) UNSIGNED NOT NULL,
  `datumSkoleni` date NOT NULL,
  `idSkoleniNaZvire` int(10) UNSIGNED DEFAULT NULL,
  `idSkoleniNaVybeh` int(10) UNSIGNED DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Vypisuji data pro tabulku `skoleni`
--

INSERT INTO `skoleni` (`id`, `datumSkoleni`, `idSkoleniNaZvire`, `idSkoleniNaVybeh`) VALUES
(1, '2011-08-16', 2, NULL),
(2, '2012-07-16', NULL, 1),
(3, '2011-08-10', 3, NULL),
(4, '2016-08-20', 1, NULL),
(5, '2013-07-06', NULL, 2),
(6, '2017-01-16', NULL, 3);

-- --------------------------------------------------------

--
-- Struktura tabulky `skoleninavybeh`
--

CREATE TABLE `skoleninavybeh` (
  `id` int(10) UNSIGNED NOT NULL,
  `idVybehu` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Vypisuji data pro tabulku `skoleninavybeh`
--

INSERT INTO `skoleninavybeh` (`id`, `idVybehu`) VALUES
(3, 1),
(1, 2),
(2, 3);

-- --------------------------------------------------------

--
-- Struktura tabulky `skoleninazvire`
--

CREATE TABLE `skoleninazvire` (
  `id` int(10) UNSIGNED NOT NULL,
  `idDruhu` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Vypisuji data pro tabulku `skoleninazvire`
--

INSERT INTO `skoleninazvire` (`id`, `idDruhu`) VALUES
(1, 1),
(2, 2),
(3, 3);

-- --------------------------------------------------------

--
-- Struktura tabulky `typvybehu`
--

CREATE TABLE `typvybehu` (
  `id` int(10) UNSIGNED NOT NULL,
  `nazev` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Vypisuji data pro tabulku `typvybehu`
--

INSERT INTO `typvybehu` (`id`, `nazev`) VALUES
(1, 'vybeh_lev'),
(2, 'les'),
(3, 'terarium');

-- --------------------------------------------------------

--
-- Struktura tabulky `users`
--

CREATE TABLE `users` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `idOsetrovatele` int(10) UNSIGNED NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Vypisuji data pro tabulku `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `password`, `idOsetrovatele`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, '', 'admin@admin.admin', '$2y$10$UlY/JXX5QaJ2KO/NY6GWHe2magu058doRoCGEKwsQVeJWpbpjPTre', 1, '0bDt5zoK1KcQN1ew8KTEJUVCQ8o4HgvVgeINgedopU9HNNaVufMF2L2fx4x7', '2017-11-24 11:08:10', '2017-11-24 11:08:10'),
(2, '', 'libor@bousek.cz', '$2y$10$uoA0pE.IuLnxNMPZCgyvLOXp/Un8vR1oNntxtcVFXCnOTbhBZ2PWy', 2, 'X2MpuW3re4OPfwaKHpSqqSpsAAKdz533yDPh45uppLkDcAqiPEJsTG4GWkKF', '2017-11-24 11:13:34', '2017-11-24 11:13:34'),
(3, '', 'marian@ostrcil.cz', '$2y$10$C/egi/gM4IRdprxEY02dy.r7DGhbGTOu2LzXu71VPrzyRqlMBwrI2', 3, 'SwGPLu0KL9CTTQRFNzc4aux8SRHUAEhZK2lMq6sGiszTz0tdak1iz3BQlW13', '2017-11-24 11:14:14', '2017-11-24 11:14:14'),
(4, '', 'martin@silny.cz', '$2y$10$D8lBSqi435xQfDwrXbGJd.IOJg8oSBzbd4sHPzNu.r/auu.NY9ZVC', 4, 'xeu8zyAbw6x9CW0xjkog4RFk15tiK1T6iBXGhdUWiHsBtwTE7DWH1URa7BxD', '2017-11-24 11:14:30', '2017-11-24 11:14:30'),
(5, '', 'martin@hubeny.cz', '$2y$10$BnzKLqSzBfJSU61cPk29IudyaxfUL4boJS/apF0UMDXiyi6/b/DuS', 5, NULL, '2017-11-24 11:14:48', '2017-11-24 11:14:48');

-- --------------------------------------------------------

--
-- Struktura tabulky `vybeh`
--

CREATE TABLE `vybeh` (
  `id` int(10) UNSIGNED NOT NULL,
  `potrebnyCas` int(11) DEFAULT NULL,
  `pomucky` varchar(30) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `maxKapacita` int(11) DEFAULT NULL,
  `pocetPotrebnychOsetrovatelu` int(11) DEFAULT NULL,
  `idTypuVybehu` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Vypisuji data pro tabulku `vybeh`
--

INSERT INTO `vybeh` (`id`, `potrebnyCas`, `pomucky`, `maxKapacita`, `pocetPotrebnychOsetrovatelu`, `idTypuVybehu`) VALUES
(1, 120, 'vysokotlaky cistic', 5, 2, 1),
(2, 60, 'hrable', 30, 10, 2),
(3, 10, 'hubka', 100, 1, 3),
(4, 160, 'vysokotlaky cistic', 6, 2, 1),
(5, 10, 'hubka', 200, 1, 3);

-- --------------------------------------------------------

--
-- Struktura tabulky `zvire`
--

CREATE TABLE `zvire` (
  `id` int(10) UNSIGNED NOT NULL,
  `jmeno` varchar(40) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `zemePuvodu` varchar(20) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `oblastVyskytu` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `rodici` varchar(30) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `datumNarozeni` date NOT NULL,
  `datumUmrti` date DEFAULT NULL,
  `idDruhu` int(10) UNSIGNED NOT NULL,
  `idVybehu` int(10) UNSIGNED NOT NULL,
  `casKrmeni` int(11) NOT NULL,
  `mnozstviZradla` int(11) NOT NULL,
  `idOsetrovatele` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Vypisuji data pro tabulku `zvire`
--

INSERT INTO `zvire` (`id`, `jmeno`, `zemePuvodu`, `oblastVyskytu`, `rodici`, `datumNarozeni`, `datumUmrti`, `idDruhu`, `idVybehu`, `casKrmeni`, `mnozstviZradla`, `idOsetrovatele`) VALUES
(1, 'Mr. Lev', 'Afrika', 'suchozemsky', NULL, '2014-08-06', NULL, 2, 1, 660, 3000, 2),
(2, 'The Jelen King', 'Slovensko', 'suchozemsky', NULL, '2014-04-23', NULL, 3, 2, 760, 2000, 3),
(3, 'Sleepy', 'Madagaskar', 'vodny', NULL, '2003-08-16', NULL, 1, 3, 860, 200, 4),
(4, 'Mrs. Lvice', 'Afrika', 'suchozemsky', NULL, '2015-08-06', NULL, 2, 1, 760, 3000, 2),
(5, 'Mr. Lev junior', 'Afrika', 'suchozemsky', NULL, '2013-08-06', NULL, 2, 4, 960, 3000, 2);

--
-- Klíče pro exportované tabulky
--

--
-- Klíče pro tabulku `cisteni`
--
ALTER TABLE `cisteni`
  ADD PRIMARY KEY (`id`),
  ADD KEY `cisteni_idosetrovatele_foreign` (`idOsetrovatele`),
  ADD KEY `cisteni_idvybehu_foreign` (`idVybehu`);

--
-- Klíče pro tabulku `druhzvirete`
--
ALTER TABLE `druhzvirete`
  ADD PRIMARY KEY (`id`);

--
-- Klíče pro tabulku `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Klíče pro tabulku `osetrovalmaskoleni`
--
ALTER TABLE `osetrovalmaskoleni`
  ADD PRIMARY KEY (`idOsetrovatele`,`idSkoleni`),
  ADD KEY `osetrovalmaskoleni_idskoleni_foreign` (`idSkoleni`);

--
-- Klíče pro tabulku `osetrovatel`
--
ALTER TABLE `osetrovatel`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `rodneCislo_UNIQUE` (`rodneCislo`);

--
-- Klíče pro tabulku `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Klíče pro tabulku `permissions`
--
ALTER TABLE `permissions`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `permissions_slug_unique` (`slug`);

--
-- Klíče pro tabulku `permission_role`
--
ALTER TABLE `permission_role`
  ADD PRIMARY KEY (`id`),
  ADD KEY `permission_role_permission_id_index` (`permission_id`),
  ADD KEY `permission_role_role_id_index` (`role_id`);

--
-- Klíče pro tabulku `permission_user`
--
ALTER TABLE `permission_user`
  ADD PRIMARY KEY (`id`),
  ADD KEY `permission_user_permission_id_index` (`permission_id`),
  ADD KEY `permission_user_user_id_index` (`user_id`);

--
-- Klíče pro tabulku `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `roles_slug_unique` (`slug`);

--
-- Klíče pro tabulku `role_user`
--
ALTER TABLE `role_user`
  ADD PRIMARY KEY (`id`),
  ADD KEY `role_user_role_id_index` (`role_id`),
  ADD KEY `role_user_user_id_index` (`user_id`);

--
-- Klíče pro tabulku `skoleni`
--
ALTER TABLE `skoleni`
  ADD PRIMARY KEY (`id`),
  ADD KEY `skoleni_idskoleninazvire_foreign` (`idSkoleniNaZvire`),
  ADD KEY `skoleni_idskoleninavybeh_foreign` (`idSkoleniNaVybeh`);

--
-- Klíče pro tabulku `skoleninavybeh`
--
ALTER TABLE `skoleninavybeh`
  ADD PRIMARY KEY (`id`),
  ADD KEY `skoleninavybeh_idvybehu_foreign` (`idVybehu`);

--
-- Klíče pro tabulku `skoleninazvire`
--
ALTER TABLE `skoleninazvire`
  ADD PRIMARY KEY (`id`),
  ADD KEY `skoleninazvire_iddruhu_foreign` (`idDruhu`);

--
-- Klíče pro tabulku `typvybehu`
--
ALTER TABLE `typvybehu`
  ADD PRIMARY KEY (`id`);

--
-- Klíče pro tabulku `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`),
  ADD KEY `users_idosetrovatele_foreign` (`idOsetrovatele`);

--
-- Klíče pro tabulku `vybeh`
--
ALTER TABLE `vybeh`
  ADD PRIMARY KEY (`id`),
  ADD KEY `vybeh_idtypuvybehu_foreign` (`idTypuVybehu`);

--
-- Klíče pro tabulku `zvire`
--
ALTER TABLE `zvire`
  ADD PRIMARY KEY (`id`),
  ADD KEY `zvire_iddruhu_foreign` (`idDruhu`),
  ADD KEY `zvire_idvybehu_foreign` (`idVybehu`),
  ADD KEY `zvire_idosetrovatele_foreign` (`idOsetrovatele`);

--
-- AUTO_INCREMENT pro tabulky
--

--
-- AUTO_INCREMENT pro tabulku `cisteni`
--
ALTER TABLE `cisteni`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT pro tabulku `druhzvirete`
--
ALTER TABLE `druhzvirete`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT pro tabulku `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT pro tabulku `osetrovatel`
--
ALTER TABLE `osetrovatel`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT pro tabulku `permissions`
--
ALTER TABLE `permissions`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pro tabulku `permission_role`
--
ALTER TABLE `permission_role`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pro tabulku `permission_user`
--
ALTER TABLE `permission_user`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pro tabulku `roles`
--
ALTER TABLE `roles`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT pro tabulku `role_user`
--
ALTER TABLE `role_user`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT pro tabulku `skoleni`
--
ALTER TABLE `skoleni`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT pro tabulku `skoleninavybeh`
--
ALTER TABLE `skoleninavybeh`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT pro tabulku `skoleninazvire`
--
ALTER TABLE `skoleninazvire`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT pro tabulku `typvybehu`
--
ALTER TABLE `typvybehu`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT pro tabulku `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT pro tabulku `vybeh`
--
ALTER TABLE `vybeh`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT pro tabulku `zvire`
--
ALTER TABLE `zvire`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- Omezení pro exportované tabulky
--

--
-- Omezení pro tabulku `cisteni`
--
ALTER TABLE `cisteni`
  ADD CONSTRAINT `cisteni_idosetrovatele_foreign` FOREIGN KEY (`idOsetrovatele`) REFERENCES `osetrovatel` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `cisteni_idvybehu_foreign` FOREIGN KEY (`idVybehu`) REFERENCES `vybeh` (`id`) ON DELETE CASCADE;

--
-- Omezení pro tabulku `osetrovalmaskoleni`
--
ALTER TABLE `osetrovalmaskoleni`
  ADD CONSTRAINT `osetrovalmaskoleni_idosetrovatele_foreign` FOREIGN KEY (`idOsetrovatele`) REFERENCES `osetrovatel` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `osetrovalmaskoleni_idskoleni_foreign` FOREIGN KEY (`idSkoleni`) REFERENCES `skoleni` (`id`) ON DELETE CASCADE;

--
-- Omezení pro tabulku `permission_role`
--
ALTER TABLE `permission_role`
  ADD CONSTRAINT `permission_role_permission_id_foreign` FOREIGN KEY (`permission_id`) REFERENCES `permissions` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `permission_role_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE;

--
-- Omezení pro tabulku `permission_user`
--
ALTER TABLE `permission_user`
  ADD CONSTRAINT `permission_user_permission_id_foreign` FOREIGN KEY (`permission_id`) REFERENCES `permissions` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `permission_user_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Omezení pro tabulku `role_user`
--
ALTER TABLE `role_user`
  ADD CONSTRAINT `role_user_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `role_user_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Omezení pro tabulku `skoleni`
--
ALTER TABLE `skoleni`
  ADD CONSTRAINT `skoleni_idskoleninavybeh_foreign` FOREIGN KEY (`idSkoleniNaVybeh`) REFERENCES `skoleninavybeh` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `skoleni_idskoleninazvire_foreign` FOREIGN KEY (`idSkoleniNaZvire`) REFERENCES `skoleninazvire` (`id`) ON DELETE CASCADE;

--
-- Omezení pro tabulku `skoleninavybeh`
--
ALTER TABLE `skoleninavybeh`
  ADD CONSTRAINT `skoleninavybeh_idvybehu_foreign` FOREIGN KEY (`idVybehu`) REFERENCES `vybeh` (`id`) ON DELETE CASCADE;

--
-- Omezení pro tabulku `skoleninazvire`
--
ALTER TABLE `skoleninazvire`
  ADD CONSTRAINT `skoleninazvire_iddruhu_foreign` FOREIGN KEY (`idDruhu`) REFERENCES `druhzvirete` (`id`) ON DELETE CASCADE;

--
-- Omezení pro tabulku `users`
--
ALTER TABLE `users`
  ADD CONSTRAINT `users_idosetrovatele_foreign` FOREIGN KEY (`idOsetrovatele`) REFERENCES `osetrovatel` (`id`) ON DELETE CASCADE;

--
-- Omezení pro tabulku `vybeh`
--
ALTER TABLE `vybeh`
  ADD CONSTRAINT `vybeh_idtypuvybehu_foreign` FOREIGN KEY (`idTypuVybehu`) REFERENCES `typvybehu` (`id`) ON DELETE CASCADE;

--
-- Omezení pro tabulku `zvire`
--
ALTER TABLE `zvire`
  ADD CONSTRAINT `zvire_iddruhu_foreign` FOREIGN KEY (`idDruhu`) REFERENCES `druhzvirete` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `zvire_idosetrovatele_foreign` FOREIGN KEY (`idOsetrovatele`) REFERENCES `osetrovatel` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `zvire_idvybehu_foreign` FOREIGN KEY (`idVybehu`) REFERENCES `vybeh` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

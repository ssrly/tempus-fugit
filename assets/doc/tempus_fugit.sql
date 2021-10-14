-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Erstellungszeit: 14. Okt 2021 um 09:57
-- Server-Version: 10.4.19-MariaDB
-- PHP-Version: 7.4.20

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Datenbank: `tempus_fugit`
--

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `roles`
--

CREATE TABLE `roles` (
  `id` int(10) NOT NULL,
  `name` varchar(80) NOT NULL,
  `description` text DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Daten für Tabelle `roles`
--

INSERT INTO `roles` (`id`, `name`, `description`, `created_at`, `updated_at`) VALUES
(1, 'Admin', 'Hat volle Rechte auf alles und jeden.', '2021-10-14 07:28:30', '2021-10-14 07:28:30'),
(2, 'User', 'Was waeren wir ohne unsere User.', '2021-10-14 07:28:30', '2021-10-14 07:28:30');

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `times`
--

CREATE TABLE `times` (
  `id` int(10) NOT NULL,
  `start_at` timestamp NULL DEFAULT NULL ON UPDATE current_timestamp(),
  `end_at` timestamp NULL DEFAULT NULL,
  `duration` int(11) NOT NULL COMMENT 'in seconds',
  `description` text DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `user_id` int(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Daten für Tabelle `times`
--

INSERT INTO `times` (`id`, `start_at`, `end_at`, `duration`, `description`, `created_at`, `updated_at`, `user_id`) VALUES
(1, '2021-10-14 07:35:00', '2021-10-14 07:36:00', 30, 'registrieren', NULL, NULL, 4),
(2, '2021-10-14 07:36:00', '2021-10-14 07:37:00', 60, 'registrieren', NULL, NULL, 3);

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `users`
--

CREATE TABLE `users` (
  `id` int(10) NOT NULL,
  `name` varchar(80) NOT NULL,
  `firstname` varchar(80) NOT NULL,
  `description` text DEFAULT NULL,
  `mail` varchar(80) NOT NULL,
  `user_number` varchar(80) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `pwd` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Daten für Tabelle `users`
--

INSERT INTO `users` (`id`, `name`, `firstname`, `description`, `mail`, `user_number`, `created_at`, `updated_at`, `pwd`) VALUES
(3, 'Mustermann', 'Max', 'Neu Eingestellt', 'm.mustermann@test.de', '0005', '2021-10-14 07:21:36', '2021-10-14 07:21:36', NULL),
(4, 'Admin', 'Adam', 'Die Seele der IT', 'a.admin@test.de', '0001', '2021-10-14 07:21:36', '2021-10-14 07:21:36', NULL);

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `user_role`
--

CREATE TABLE `user_role` (
  `id` int(10) NOT NULL,
  `user_id` int(10) DEFAULT NULL,
  `role_id` int(10) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Daten für Tabelle `user_role`
--

INSERT INTO `user_role` (`id`, `user_id`, `role_id`, `created_at`, `updated_at`) VALUES
(1, 4, 1, '2021-10-14 07:56:06', '2021-10-14 07:56:06'),
(2, 3, 2, '2021-10-14 07:56:06', '2021-10-14 07:56:06');

--
-- Indizes der exportierten Tabellen
--

--
-- Indizes für die Tabelle `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`id`);

--
-- Indizes für die Tabelle `times`
--
ALTER TABLE `times`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id_from_users_in_times` (`user_id`);

--
-- Indizes für die Tabelle `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `mail` (`mail`);

--
-- Indizes für die Tabelle `user_role`
--
ALTER TABLE `user_role`
  ADD PRIMARY KEY (`id`),
  ADD KEY `role_id_from_roles_in_user_role` (`role_id`),
  ADD KEY `user_id_from_users_in_user_role` (`user_id`);

--
-- AUTO_INCREMENT für exportierte Tabellen
--

--
-- AUTO_INCREMENT für Tabelle `roles`
--
ALTER TABLE `roles`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT für Tabelle `times`
--
ALTER TABLE `times`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT für Tabelle `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT für Tabelle `user_role`
--
ALTER TABLE `user_role`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Constraints der exportierten Tabellen
--

--
-- Constraints der Tabelle `times`
--
ALTER TABLE `times`
  ADD CONSTRAINT `user_id_from_users_in_times` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON UPDATE CASCADE;

--
-- Constraints der Tabelle `user_role`
--
ALTER TABLE `user_role`
  ADD CONSTRAINT `role_id_from_roles_in_user_role` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON UPDATE CASCADE,
  ADD CONSTRAINT `user_id_from_users_in_user_role` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

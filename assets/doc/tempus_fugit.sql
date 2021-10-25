-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Erstellungszeit: 25. Okt 2021 um 16:28
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
(33, '2021-10-25 09:57:00', '2021-10-25 09:58:00', 60, 'Registrieren', '2021-10-25 09:57:56', NULL, 3),
(34, '2021-10-25 09:58:00', '2021-10-25 09:59:00', 60, 'Regstrieren', '2021-10-25 09:58:26', NULL, 4);

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `users`
--

CREATE TABLE `users` (
  `id` int(10) NOT NULL,
  `name` varchar(80) NOT NULL,
  `firstname` varchar(80) NOT NULL,
  `description` text DEFAULT NULL,
  `email` varchar(80) NOT NULL,
  `user_number` varchar(80) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `pwd` varchar(255) DEFAULT NULL,
  `is_admin` tinyint(1) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Daten für Tabelle `users`
--

INSERT INTO `users` (`id`, `name`, `firstname`, `description`, `email`, `user_number`, `created_at`, `updated_at`, `pwd`, `is_admin`) VALUES
(3, 'Mustermann', 'Max', 'Neu Eingestellt2', 'm.mustermann@test.de', '0002', '2021-10-14 07:21:36', '2021-10-25 08:21:57', '$2a$12$yJ27jVxES0OrUMWHQ4t/cuq3.UDVA06QpDXkPLbCvdl8D5mIq1J3y', 0),
(4, 'Admin', 'Adam', 'Die Seele der IT', 'a.admin@test.de', '0001', '2021-10-14 07:21:36', '2021-10-25 11:32:18', '$2a$12$DD7b72tGd3MnT.K47dM5yeoDLp/m4RIDTTYeqO0Q/gEm1E5MrnB4m', 1);

--
-- Indizes der exportierten Tabellen
--

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
  ADD UNIQUE KEY `users_email_uindex` (`email`),
  ADD UNIQUE KEY `users_user_number_uindex` (`user_number`);

--
-- AUTO_INCREMENT für exportierte Tabellen
--

--
-- AUTO_INCREMENT für Tabelle `times`
--
ALTER TABLE `times`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=39;

--
-- AUTO_INCREMENT für Tabelle `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;

--
-- Constraints der exportierten Tabellen
--

--
-- Constraints der Tabelle `times`
--
ALTER TABLE `times`
  ADD CONSTRAINT `user_id_from_users_in_times` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

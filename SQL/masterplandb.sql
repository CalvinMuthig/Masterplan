-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Erstellungszeit: 31. Dez 2016 um 18:25
-- Server-Version: 10.1.13-MariaDB
-- PHP-Version: 7.0.5

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Datenbank: `masterplandb`
--

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `posts`
--

CREATE TABLE `posts` (
  `id` int(16) NOT NULL,
  `title` varchar(256) NOT NULL,
  `description` text NOT NULL,
  `startTime` date NOT NULL,
  `endTime` date NOT NULL,
  `creator` varchar(256) NOT NULL,
  `pre` tinyint(1) NOT NULL,
  `preName` varchar(256) NOT NULL,
  `done` tinyint(1) NOT NULL,
  `shares` varchar(2048) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Daten für Tabelle `posts`
--

INSERT INTO `posts` (`id`, `title`, `description`, `startTime`, `endTime`, `creator`, `pre`, `preName`, `done`, `shares`) VALUES
(1, 'MP - Abgabe IT-Talents', '-', '2016-12-31', '2016-12-31', 'admin', 0, '', 0, '');

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `shares`
--

CREATE TABLE `shares` (
  `id` int(16) NOT NULL,
  `username` varchar(256) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Daten für Tabelle `shares`
--

INSERT INTO `shares` (`id`, `username`) VALUES
(2, 'Calvin'),
(1, ''),
(1, 'calvin');

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `users`
--

CREATE TABLE `users` (
  `name` varchar(256) NOT NULL,
  `lastname` varchar(256) NOT NULL,
  `username` varchar(256) NOT NULL,
  `email` varchar(256) NOT NULL,
  `birthday` date NOT NULL,
  `password` varchar(256) NOT NULL,
  `profilimg` varchar(1024) NOT NULL,
  `background` varchar(1024) NOT NULL,
  `id` int(16) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Daten für Tabelle `users`
--

INSERT INTO `users` (`name`, `lastname`, `username`, `email`, `birthday`, `password`, `profilimg`, `background`, `id`) VALUES
('Master', 'Plan', 'admin', 'masterplanapp@calvin-muthig.de', '0000-00-00', '1234', '', '', 1),
('Calvin', 'Muthig', 'Calvin', 'admin@calvin-muthig.de', '0000-00-00', '1234', '', '', 2);

--
-- Indizes der exportierten Tabellen
--

--
-- Indizes für die Tabelle `posts`
--
ALTER TABLE `posts`
  ADD PRIMARY KEY (`id`);

--
-- Indizes für die Tabelle `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT für exportierte Tabellen
--

--
-- AUTO_INCREMENT für Tabelle `posts`
--
ALTER TABLE `posts`
  MODIFY `id` int(16) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT für Tabelle `users`
--
ALTER TABLE `users`
  MODIFY `id` int(16) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

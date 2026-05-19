-- phpMyAdmin SQL Dump
-- version 5.2.3
-- https://www.phpmyadmin.net/
--
-- Host: db
-- Gegenereerd op: 19 mei 2026 om 11:11
-- Serverversie: 8.4.8
-- PHP-versie: 8.3.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `vaygodatabase`
--

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `Boekingen`
--

CREATE TABLE `Boekingen` (
  `Boeking-id` int NOT NULL,
  `Reis-id` int NOT NULL,
  `User-id` int NOT NULL,
  `Aantal-personen` int NOT NULL,
  `Startdatum` date DEFAULT NULL,
  `Einddatum` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `Gebruikers`
--

CREATE TABLE `Gebruikers` (
  `User-id` int NOT NULL,
  `Gebruikersnaam` varchar(50) NOT NULL,
  `Emailadres` varchar(50) NOT NULL,
  `Wachtwoord` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `recensies`
--

CREATE TABLE `recensies` (
  `User-id` int NOT NULL,
  `Reis-id` int NOT NULL,
  `Bericht` varchar(250) NOT NULL,
  `Beoordeling` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `Reizen`
--

CREATE TABLE `Reizen` (
  `Reis-id` int NOT NULL,
  `Bestemming` varchar(50) NOT NULL,
  `Land` varchar(50) NOT NULL,
  `korte-beschrijving` varchar(250) NOT NULL,
  `Prijs` int NOT NULL,
  `Vlag` varchar(250) NOT NULL,
  `Continent` varchar(50) NOT NULL,
  `Strand-en-zon` tinyint(1) NOT NULL,
  `Stedentrip` tinyint(1) NOT NULL,
  `Wintersport` tinyint(1) NOT NULL,
  `Natuur` tinyint(1) NOT NULL,
  `Cultuur` tinyint(1) NOT NULL,
  `Welkom-bericht` varchar(250) NOT NULL,
  `Historie` varchar(250) NOT NULL,
  `Wat-te-doen` varchar(250) NOT NULL,
  `Achtergrond` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Gegevens worden geëxporteerd voor tabel `Reizen`
--

INSERT INTO `Reizen` (`Reis-id`, `Bestemming`, `Land`, `korte-beschrijving`, `Prijs`, `Vlag`, `Continent`, `Strand-en-zon`, `Stedentrip`, `Wintersport`, `Natuur`, `Cultuur`, `Welkom-bericht`, `Historie`, `Wat-te-doen`, `Achtergrond`) VALUES
(1, 'Willemstad', 'Curaçao', 'Willemstad is een stad in Curaçao', 950, 'Curacao.png', 'Noord-Amerika', 1, 0, 0, 0, 0, 'Welkom in Willemstad', 'historie', 'wat te doen', 'willemstad.png');

--
-- Indexen voor geëxporteerde tabellen
--

--
-- Indexen voor tabel `Gebruikers`
--
ALTER TABLE `Gebruikers`
  ADD PRIMARY KEY (`User-id`);

--
-- Indexen voor tabel `Reizen`
--
ALTER TABLE `Reizen`
  ADD PRIMARY KEY (`Reis-id`);

--
-- AUTO_INCREMENT voor geëxporteerde tabellen
--

--
-- AUTO_INCREMENT voor een tabel `Gebruikers`
--
ALTER TABLE `Gebruikers`
  MODIFY `User-id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT voor een tabel `Reizen`
--
ALTER TABLE `Reizen`
  MODIFY `Reis-id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

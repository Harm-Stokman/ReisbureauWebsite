-- phpMyAdmin SQL Dump
-- version 5.2.3
-- https://www.phpmyadmin.net/
--
-- Host: db
-- Gegenereerd op: 02 jun 2026 om 11:08
-- Serverversie: 8.4.8
-- PHP-versie: 8.3.30

SET FOREIGN_KEY_CHECKS=0;
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

DROP TABLE IF EXISTS `Boekingen`;
CREATE TABLE `Boekingen` (
  `Boeking-id` int NOT NULL,
  `Reis-id` int NOT NULL,
  `User-id` int NOT NULL,
  `Aantal-personen` int NOT NULL,
  `Startdatum` date DEFAULT NULL,
  `Einddatum` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Gegevens worden geëxporteerd voor tabel `Boekingen`
--

INSERT INTO `Boekingen` (`Boeking-id`, `Reis-id`, `User-id`, `Aantal-personen`, `Startdatum`, `Einddatum`) VALUES
(1, 1, 1, 1, '2026-05-04', '2026-05-15');

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `Gebruikers`
--

DROP TABLE IF EXISTS `Gebruikers`;
CREATE TABLE `Gebruikers` (
  `User-id` int NOT NULL,
  `Gebruikersnaam` varchar(50) NOT NULL,
  `Emailadres` varchar(50) NOT NULL,
  `Wachtwoord` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Gegevens worden geëxporteerd voor tabel `Gebruikers`
--

INSERT INTO `Gebruikers` (`User-id`, `Gebruikersnaam`, `Emailadres`, `Wachtwoord`) VALUES
(2, 'Erik Bakker', 'ebakker@gmail.com', '1234'),
(3, 'harm-stokman', 'harmstok2006@gmail.com', 'password');

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `recensies`
--

DROP TABLE IF EXISTS `recensies`;
CREATE TABLE `recensies` (
  `User-id` int NOT NULL,
  `Reis-id` int NOT NULL,
  `Bericht` varchar(250) NOT NULL,
  `Beoordeling` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Gegevens worden geëxporteerd voor tabel `recensies`
--

INSERT INTO `recensies` (`User-id`, `Reis-id`, `Bericht`, `Beoordeling`) VALUES
(3, 1, 'Het was een oke reis.', 3),
(2, 4, 'Ik ging naar tokyo met Vaygo. Wat een tyfus. Ik ga morgen weer', 5),
(3, 2, 'De reis naar Ibiza was goed.', 4),
(3, 4, 'Wat een kutreis', 1);

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `Reizen`
--

DROP TABLE IF EXISTS `Reizen`;
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
  `Achtergrond` varchar(250) NOT NULL,
  `kaart-afbeelding` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Gegevens worden geëxporteerd voor tabel `Reizen`
--

INSERT INTO `Reizen` (`Reis-id`, `Bestemming`, `Land`, `korte-beschrijving`, `Prijs`, `Vlag`, `Continent`, `Strand-en-zon`, `Stedentrip`, `Wintersport`, `Natuur`, `Cultuur`, `Welkom-bericht`, `Historie`, `Wat-te-doen`, `Achtergrond`, `kaart-afbeelding`) VALUES
(1, 'Willemstad', 'Curaçao', 'Willemstad is een stad in Curaçao', 950, 'Curacao.png', 'Noord-Amerika', 1, 0, 0, 0, 0, 'Welkom in Willemstad', 'historie', 'wat te doen', 'willemstad.png', 'willemstad-card.png'),
(2, 'Ibiza', 'Spanje', 'Ibiza is een gebied in Spanje', 240, 'Spanje.png', 'Europa', 1, 0, 0, 0, 0, 'Welkom in Ibiza!', 'historie', 'wat te doen', '', 'ibiza-card.png'),
(3, 'Lissabon', 'Portugal', 'Lissabon is een stad in Portugal', 345, 'Portugal.png', 'Europa', 1, 1, 0, 0, 0, 'Welkom in Lissabon!', 'historie', 'wat te doen', '', 'lissabon-card.png'),
(4, 'Tokyo', 'Japan', 'Tokyo is een stad in japan', 1100, 'Japan.png', 'Azië', 0, 1, 0, 0, 0, 'Welkom in Tokyo', 'historie', 'wat te doen', '', 'tokyo-card.png');

--
-- Indexen voor geëxporteerde tabellen
--

--
-- Indexen voor tabel `Boekingen`
--
ALTER TABLE `Boekingen`
  ADD PRIMARY KEY (`Boeking-id`);

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
-- AUTO_INCREMENT voor een tabel `Boekingen`
--
ALTER TABLE `Boekingen`
  MODIFY `Boeking-id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT voor een tabel `Gebruikers`
--
ALTER TABLE `Gebruikers`
  MODIFY `User-id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT voor een tabel `Reizen`
--
ALTER TABLE `Reizen`
  MODIFY `Reis-id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
SET FOREIGN_KEY_CHECKS=1;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

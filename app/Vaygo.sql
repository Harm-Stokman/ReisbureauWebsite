CREATE TABLE `Gebruikers` (
  `User-id` int PRIMARY KEY NOT NULL,
  `Gebruikersnaam` varchar(50) NOT NULL,
  `Emailadres` varchar(50) NOT NULL,
  `Wachtwoord` varchar(50) NOT NULL
);

CREATE TABLE `Reizen` (
  `Reis-id` int PRIMARY KEY NOT NULL,
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
);

CREATE TABLE `Boekingen` (
  `Boeking-id` int NOT NULL,
  `Reis-id` int NOT NULL,
  `User-id` int NOT NULL,
  `Aantal-personen` int NOT NULL,
  `Startdatum` date,
  `Einddatum` date
);

CREATE TABLE `recensies` (
  `User-id` int NOT NULL,
  `Reis-id` int NOT NULL,
  `Bericht` varchar(250) NOT NULL,
  `Beoordeling` int NOT NULL
);

ALTER TABLE `Gebruikers` ADD FOREIGN KEY (`User-id`) REFERENCES `Boekingen` (`User-id`);

ALTER TABLE `Gebruikers` ADD FOREIGN KEY (`User-id`) REFERENCES `recensies` (`User-id`);

ALTER TABLE `Reizen` ADD FOREIGN KEY (`Reis-id`) REFERENCES `Boekingen` (`Reis-id`);

ALTER TABLE `Boekingen` ADD FOREIGN KEY (`Reis-id`) REFERENCES `recensies` (`Reis-id`);

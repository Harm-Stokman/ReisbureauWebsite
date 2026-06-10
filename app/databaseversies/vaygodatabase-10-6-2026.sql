-- phpMyAdmin SQL Dump
-- version 5.2.3
-- https://www.phpmyadmin.net/
--
-- Host: db
-- Gegenereerd op: 10 jun 2026 om 08:49
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
  `Boeking_id` int NOT NULL,
  `Reis_id` int NOT NULL,
  `User_id` int NOT NULL,
  `Aantal_personen` int NOT NULL,
  `Startdatum` date DEFAULT NULL,
  `Einddatum` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Gegevens worden geëxporteerd voor tabel `Boekingen`
--

INSERT INTO `Boekingen` (`Boeking_id`, `Reis_id`, `User_id`, `Aantal_personen`, `Startdatum`, `Einddatum`) VALUES
(3, 5, 2, 1, '2026-06-19', '2026-06-26'),
(4, 2, 6, 1, '2026-06-19', '2026-06-26'),
(6, 11, 15, 1, '2026-06-23', '2026-06-30');

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `Contactformulieren`
--

DROP TABLE IF EXISTS `Contactformulieren`;
CREATE TABLE `Contactformulieren` (
  `Emailadres` varchar(50) NOT NULL,
  `Onderwerp` varchar(50) NOT NULL,
  `Bericht` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `Gebruikers`
--

DROP TABLE IF EXISTS `Gebruikers`;
CREATE TABLE `Gebruikers` (
  `User_id` int NOT NULL,
  `Gebruikersnaam` varchar(50) NOT NULL,
  `Emailadres` varchar(50) NOT NULL,
  `Wachtwoord` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Gegevens worden geëxporteerd voor tabel `Gebruikers`
--

INSERT INTO `Gebruikers` (`User_id`, `Gebruikersnaam`, `Emailadres`, `Wachtwoord`) VALUES
(2, 'Erik Bakker', 'ebakker@gmail.com', '1234'),
(3, 'harm-stokman', 'harmstok2006@gmail.com', 'password'),
(4, 'Admin', 'administrator@vaygo.com', 'P@ssw0rd'),
(15, 'paul', 'paul3@gmail.com', 'paul');

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `recensies`
--

DROP TABLE IF EXISTS `recensies`;
CREATE TABLE `recensies` (
  `User_id` int NOT NULL,
  `Reis_id` int NOT NULL,
  `Bericht` varchar(250) NOT NULL,
  `Beoordeling` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Gegevens worden geëxporteerd voor tabel `recensies`
--

INSERT INTO `recensies` (`User_id`, `Reis_id`, `Bericht`, `Beoordeling`) VALUES
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
  `Reis_id` int NOT NULL,
  `Bestemming` varchar(50) NOT NULL,
  `Land` varchar(50) NOT NULL,
  `korte_beschrijving` varchar(750) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `Prijs` int NOT NULL,
  `Vlag` varchar(250) NOT NULL,
  `Continent` varchar(50) NOT NULL,
  `Strand_en_zon` tinyint(1) NOT NULL,
  `Stedentrip` tinyint(1) NOT NULL,
  `Wintersport` tinyint(1) NOT NULL,
  `Natuur` tinyint(1) NOT NULL,
  `Cultuur` tinyint(1) NOT NULL,
  `Welkom_bericht` varchar(1000) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `Historie` varchar(1000) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `Wat_te_doen` varchar(1000) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `Achtergrond` varchar(1000) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `kaart_afbeelding` varchar(250) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Gegevens worden geëxporteerd voor tabel `Reizen`
--

INSERT INTO `Reizen` (`Reis_id`, `Bestemming`, `Land`, `korte_beschrijving`, `Prijs`, `Vlag`, `Continent`, `Strand_en_zon`, `Stedentrip`, `Wintersport`, `Natuur`, `Cultuur`, `Welkom_bericht`, `Historie`, `Wat_te_doen`, `Achtergrond`, `kaart_afbeelding`) VALUES
(1, 'Willemstad', 'Curaçao', 'Willemstad is de hoofdstad van Curaçao en voormalige hoofdstad van de Nederlandse Antillen. Willemstad telt ~168.000 inwoners en is bekend voor zijn Amsterdam achtige gebouwen. De stad wordt ook wel de Amsterdam van de Nederlandse Antillen genoemd.', 950, 'Curacao.png', 'Noord-Amerika', 1, 0, 0, 0, 0, 'Welkom in Willemstad, het bruisende hart van Curaçao. Zodra je aankomt, word je omringd door kleurrijke gebouwen, een aangenaam klimaat en een ontspannen Caribische sfeer. De stad combineert Nederlandse architectuur met tropische invloeden, wat zorgt voor een unieke uitstraling die je nergens anders vindt. Wandel langs de beroemde waterkant, ontdek gezellige straatjes en geniet van de lokale cultuur. Of je nu komt voor een ontspannen vakantie, mooie foto\'s of het ontdekken van een nieuwe cultuur, Willemstad heeft voor iedere reiziger iets bijzonders te bieden. Wij zorgen ervoor dat jouw reis naar deze prachtige bestemming soepel begint met een comfortabele vlucht naar Curaçao.', 'De geschiedenis van Willemstad begon in 1634, toen de Nederlanders zich op Curaçao vestigden en een handelsnederzetting opbouwden rond een natuurlijke haven. Door de gunstige ligging groeide de stad uit tot een belangrijk handelscentrum in het Caribisch gebied. In de eeuwen daarna ontstonden verschillende wijken, zoals Punda en Otrobanda, die nog steeds het historische karakter van de stad bepalen. De Nederlandse invloeden zijn vandaag de dag duidelijk zichtbaar in de architectuur. Dankzij de goed bewaarde binnenstad en haven werd Willemstad in 1997 opgenomen op de Werelderfgoedlijst van UNESCO.', 'Willemstad biedt genoeg mogelijkheden voor een afwisselende vakantie. Bezoekers kunnen wandelen door de historische wijken Punda en Otrobanda, waar kleurrijke gebouwen en gezellige pleinen het straatbeeld bepalen. Ook de beroemde Koningin Emmabrug is een populaire bezienswaardigheid. Daarnaast zijn er diverse musea, winkels, restaurants en markten te vinden in de stad. Vanuit Willemstad zijn ook verschillende stranden gemakkelijk bereikbaar, waardoor een dag cultuur perfect gecombineerd kan worden met ontspanning aan zee. Of je nu houdt van geschiedenis, architectuur, winkelen of gewoon genieten van de Caribische sfeer, Willemstad heeft voor iedereen iets te bieden.', 'willemstad.png', 'willemstad-card.png'),
(2, 'Ibiza', 'Spanje', 'Ibiza is een Spaans eiland in de Middellandse Zee en maakt deel uit van de Balearen. Het eiland staat wereldwijd bekend om zijn prachtige stranden, helderblauwe water en bruisende nachtleven. Jaarlijks trekken miljoenen bezoekers naar Ibiza om te genieten van de zon, de zee en de beroemde clubs. Dankzij de combinatie van ontspanning overdag en entertainment in de avond is Ibiza een van de populairste vakantiebestemmingen van Europa.', 240, 'Spanje.png', 'Europa', 1, 0, 0, 0, 0, 'Welkom op Ibiza, een eiland waar ontspanning en entertainment perfect samenkomen. Overdag kun je genieten van prachtige stranden, een warme zon en helder water, terwijl het eiland \'s avonds verandert in een van de bekendste uitgaansbestemmingen ter wereld. Of je nu wilt ontspannen aan zee, genieten van een strandwandeling of het bruisende nachtleven wilt ontdekken, Ibiza heeft voor iedere bezoeker iets te bieden. Dankzij het aangename klimaat en de unieke sfeer is het eiland een ideale bestemming voor een onvergetelijke vakantie.', 'Ibiza kent een lange geschiedenis die meer dan 2.500 jaar teruggaat. Het eiland werd oorspronkelijk gesticht door de Feniciërs en groeide later uit tot een belangrijk handelscentrum in de Middellandse Zee. Door de eeuwen heen stond Ibiza onder invloed van verschillende beschavingen, waaronder de Romeinen en de Moren. Deze invloeden zijn nog steeds terug te zien in de cultuur en architectuur van het eiland. Vanaf de tweede helft van de twintigste eeuw werd Ibiza steeds populairder als vakantiebestemming en ontwikkelde het zich tot een internationaal bekende toeristische trekpleister.', 'Ibiza staat vooral bekend om zijn stranden en uitgaansleven. Overdag kun je ontspannen op een van de vele zandstranden, zwemmen in het heldere water of genieten van verschillende watersporten. Langs de kust zijn gezellige strandtenten en restaurants te vinden waar je kunt genieten van de mediterrane sfeer. Wanneer de zon ondergaat, komt het beroemde nachtleven tot leven. Het eiland beschikt over enkele van de bekendste clubs ter wereld en trekt jaarlijks bezoekers die willen genieten van muziek, feesten en entertainment. Hierdoor biedt Ibiza een perfecte combinatie van ontspanning en avontuur.', '', 'ibiza-card.png'),
(3, 'Lissabon', 'Portugal', 'Lissabon is de hoofdstad van Portugal en ligt aan de westkust van het Iberisch Schiereiland. De stad staat bekend om haar kleurrijke gebouwen, historische wijken en ligging aan de Atlantische Oceaan. Met een rijke geschiedenis, een aangenaam klimaat en prachtige stranden in de omgeving trekt Lissabon jaarlijks miljoenen bezoekers. De combinatie van cultuur, moderne voorzieningen en ontspanning aan zee maakt de stad een van de populairste bestemmingen van Zuid-Europa.', 345, 'Portugal.png', 'Europa', 1, 1, 0, 0, 0, 'Welkom in Lissabon, een stad waar cultuur, geschiedenis en strand perfect samenkomen. Wandel door de sfeervolle straatjes van de historische binnenstad, geniet van het uitzicht vanaf een van de vele uitkijkpunten of ontdek de gezellige pleinen en cafés. Daarnaast liggen er verschillende prachtige stranden op korte afstand van het stadscentrum, waardoor je een stedentrip eenvoudig kunt combineren met een ontspannen dag aan zee. Dankzij het zonnige klimaat, de vriendelijke sfeer en de vele bezienswaardigheden is Lissabon een bestemming die voor iedere reiziger iets te bieden heeft.', 'Lissabon is een van de oudste steden van Europa en heeft een geschiedenis die meer dan tweeduizend jaar teruggaat. Door haar ligging aan de Atlantische Oceaan speelde de stad een belangrijke rol tijdens het Portugese tijdperk van ontdekkingsreizen in de vijftiende en zestiende eeuw. Vanuit Lissabon vertrokken beroemde ontdekkingsreizigers naar onbekende delen van de wereld. Hoewel een zware aardbeving in 1755 een groot deel van de stad verwoestte, werd Lissabon herbouwd en groeide het uit tot het politieke en economische centrum van Portugal. Tegenwoordig zijn veel historische gebouwen nog steeds te bewonderen.', 'Lissabon biedt een perfecte combinatie van stad en strand. Je kunt de historische wijken Alfama en Belém verkennen, een rit maken met de beroemde gele tram of genieten van het uitzicht vanaf een van de vele heuvels. Daarnaast zijn populaire stranden zoals Carcavelos en Costa da Caparica gemakkelijk bereikbaar vanuit de stad. Hier kun je zwemmen, zonnen of verschillende watersporten beoefenen. Ook zijn er talloze restaurants, winkels en culturele bezienswaardigheden te vinden. Dankzij deze combinatie van stedelijke activiteiten en strandplezier is Lissabon een veelzijdige vakantiebestemming.', '', 'lissabon-card.png'),
(4, 'Tokyo', 'Japan', 'Tokyo is de hoofdstad van Japan en een van de grootste en meest geavanceerde steden ter wereld. De stad staat bekend om haar indrukwekkende skyline, moderne technologie en unieke mix van traditie en innovatie. Van futuristische wijken tot rustige tempels, Tokyo biedt een enorme variatie aan ervaringen. Met miljoenen inwoners en eindeloze mogelijkheden op het gebied van eten, winkelen en cultuur is Tokyo een van de meest veelzijdige steden ter wereld.', 1100, 'Japan.png', 'Azië', 0, 1, 0, 0, 0, 'Welkom in Tokyo, een stad waar het moderne en het traditionele op een bijzondere manier samenkomen. Tijdens een bezoek ontdek je hypermoderne wijken vol neonlichten, maar ook rustige tempels en traditionele straatjes. Tokyo is een stad die nooit stil lijkt te staan en biedt een unieke energie die je nergens anders vindt. Of je nu wilt genieten van het uitzicht vanaf hoge wolkenkrabbers, lokale gerechten wilt proberen of door bijzondere buurten wilt wandelen, Tokyo heeft voor iedere bezoeker iets te bieden. Het is een bestemming die constant blijft verrassen.', 'Tokyo begon oorspronkelijk als een klein vissersdorp genaamd Edo. In de zeventiende eeuw groeide het uit tot het politieke centrum van Japan onder het shogunaat. In 1868 werd de stad hernoemd tot Tokyo en werd het de hoofdstad van Japan. Door de jaren heen groeide Tokyo uit tot een van de grootste en belangrijkste steden ter wereld. Ondanks zware verwoestingen tijdens de Tweede Wereldoorlog werd de stad snel herbouwd en gemoderniseerd. Tegenwoordig is Tokyo een wereldwijd centrum voor technologie, cultuur en economie.', 'Tokyo biedt een eindeloze hoeveelheid activiteiten voor bezoekers. Je kunt de moderne skyline bewonderen vanaf de Tokyo Skytree, de drukte ervaren op Shibuya Crossing of de luxe winkels in Ginza verkennen. Daarnaast zijn er rustige tempels zoals Senso-ji in Asakusa waar je de traditionele kant van Japan kunt ontdekken. Ook staan de vele wijken zoals Shinjuku en Harajuku bekend om hun unieke sfeer en entertainment. Dankzij de enorme diversiteit is Tokyo een stad waar je elke dag iets nieuws kunt ontdekken.', '', 'tokyo-card.png'),
(5, 'Miami', 'VS', 'Miami is een bruisende stad in de Amerikaanse staat Florida en staat wereldwijd bekend om haar prachtige stranden, moderne skyline en tropische klimaat. De stad trekt jaarlijks miljoenen bezoekers die komen genieten van de zon, de zee en het levendige uitgaansleven. Miami heeft daarnaast een mix van verschillende culturen, wat terug te zien is in de architectuur, muziek en keuken. Hierdoor is de stad een van de populairste vakantiebestemmingen van de Verenigde Staten.', 1050, 'VS.png', 'Noord-Amerika', 1, 1, 0, 0, 0, 'Welkom in Miami, een stad waar zon, strand en cultuur samenkomen. Met haar tropische klimaat, uitgestrekte zandstranden en levendige sfeer is Miami de perfecte bestemming voor een ontspannen vakantie. Overdag kun je genieten van het strand of de stad verkennen, terwijl je \'s avonds terecht kunt in gezellige restaurants en populaire uitgaansgelegenheden. De combinatie van moderne gebouwen, palmbomen en een multiculturele bevolking geeft Miami een unieke uitstraling. Of je nu wilt ontspannen aan zee of de stad wilt ontdekken, Miami biedt voor iedere reiziger een onvergetelijke ervaring.', 'Miami werd officieel gesticht in 1896 en groeide in korte tijd uit van een kleine nederzetting tot een belangrijke stad in Florida. Door de aanleg van spoorwegen werd de stad beter bereikbaar, wat zorgde voor een sterke groei van het toerisme. In de twintigste eeuw vestigden zich veel immigranten uit Latijns-Amerika, vooral uit Cuba, waardoor Miami een unieke culturele identiteit ontwikkelde. Tegenwoordig is de stad niet alleen een populaire vakantiebestemming, maar ook een belangrijk economisch en cultureel centrum van de Verenigde Staten.', 'Miami biedt volop mogelijkheden voor een veelzijdige vakantie. De beroemde stranden van Miami Beach zijn ideaal om te zwemmen, zonnen of watersporten te beoefenen. Daarnaast kun je wandelen langs Ocean Drive, bekend om zijn kleurrijke Art Deco-gebouwen en gezellige sfeer. Ook zijn er verschillende winkelgebieden, parken en musea te bezoeken. Voor liefhebbers van cultuur is de wijk Little Havana een aanrader, waar je de Cubaanse invloeden van de stad kunt ervaren. Of je nu kiest voor ontspanning aan het strand of het verkennen van de stad, in Miami is altijd iets te beleven.', 'plane1.png', 'miami-card.png'),
(9, 'Rio de Janeiro', 'Brazilië', 'Rio de Janeiro is een van de bekendste steden van Brazilië en ligt aan de Atlantische Oceaan. De stad staat wereldwijd bekend om haar prachtige stranden, warme klimaat en indrukwekkende kustlijn. Jaarlijks trekken miljoenen bezoekers naar Rio om te genieten van het strand, de zee en de ontspannen sfeer. Met beroemde stranden zoals Copacabana en Ipanema is Rio de Janeiro een van de populairste strandbestemmingen van Zuid-Amerika.', 1050, 'Brazilië.png', 'Zuid-Amerika', 1, 0, 0, 0, 0, 'Welkom in Rio de Janeiro, een stad waar het leven zich grotendeels afspeelt aan het strand. Met een aangenaam klimaat, gouden zandstranden en een levendige sfeer is Rio de perfecte bestemming voor liefhebbers van zon en zee. Overdag kun je ontspannen op de beroemde stranden van Copacabana en Ipanema, terwijl je geniet van het uitzicht op de oceaan. De combinatie van tropische temperaturen, helder water en een ontspannen levensstijl maakt Rio de Janeiro tot een ideale vakantiebestemming. Of je nu wilt zwemmen, zonnen of gewoon wilt genieten van de unieke sfeer, Rio heeft alles voor een onvergetelijke strandvakantie.', 'Rio de Janeiro werd in 1565 gesticht door de Portugezen en groeide uit tot een van de belangrijkste steden van Brazilië. De stad was lange tijd de hoofdstad van het land en speelde een belangrijke rol in de handel en ontwikkeling van Brazilië. Door de ligging aan de kust werd Rio een belangrijk haven- en handelscentrum. In de twintigste eeuw groeide het toerisme sterk, mede dankzij de beroemde stranden en het aangename klimaat. Tegenwoordig behoort Rio de Janeiro tot de meest bezochte steden van Zuid-Amerika en is het wereldwijd bekend als een populaire vakantiebestemming.', 'De stranden vormen zonder twijfel de grootste trekpleister van Rio de Janeiro. Copacabana en Ipanema behoren tot de bekendste stranden ter wereld en zijn perfect om te zwemmen, zonnen of een wandeling langs de boulevard te maken. Ook zijn er mogelijkheden voor activiteiten zoals beachvolleybal, surfen en andere watersporten. Langs de stranden vind je talloze cafés, restaurants en plekken om te ontspannen. Dankzij het warme weer gedurende een groot deel van het jaar is Rio de Janeiro een ideale bestemming voor iedereen die wil genieten van een vakantie aan zee.', '', 'rio-card.png'),
(10, 'Cairo', 'Egypte', 'Caïro is de hoofdstad van Egypte en de grootste stad van Afrika. De stad ligt aan de rivier de Nijl en staat wereldwijd bekend om haar nabijheid tot de beroemde piramides van Gizeh en de Sfinx. Caïro combineert een eeuwenoude geschiedenis met een levendige moderne metropool. Bezoekers komen hier vooral voor de indrukwekkende oude beschavingen, monumentale gebouwen en archeologische schatten die de stad en omgeving uniek maken.', 625, 'Egypte.png', 'Afrika', 0, 0, 0, 0, 1, 'Welkom in Caïro, een stad waar je geschiedenis op een ongekende schaal ervaart. In en rondom de stad vind je enkele van de meest iconische bouwwerken ter wereld, waaronder de piramides van Gizeh en de Sfinx. Deze eeuwenoude monumenten maken Caïro tot een van de belangrijkste historische bestemmingen ter wereld. Tegelijkertijd is de stad zelf levendig en druk, met markten, pleinen en een mix van oude en moderne wijken. Voor reizigers die geïnteresseerd zijn in de oude wereld en indrukwekkende architectuur is Caïro een bestemming die je niet snel vergeet.', 'Caïro werd in de tiende eeuw gesticht door de Fatimiden, maar de regio rond de stad heeft een veel oudere geschiedenis. In de nabijgelegen oud-Egyptische beschaving werden al duizenden jaren geleden de beroemde piramides gebouwd als grafmonumenten voor farao’s. Deze bouwwerken behoren tot de zeven wereldwonderen van de antieke wereld en zijn tot op de dag van vandaag bewaard gebleven. Door de eeuwen heen groeide Caïro uit tot een belangrijk cultureel en religieus centrum in de Arabische wereld. Tegenwoordig is de stad een levendige metropool waar het verleden en het heden samenkomen.', 'Caïro biedt een indrukwekkende hoeveelheid historische bezienswaardigheden. De piramides van Gizeh en de Sfinx zijn zonder twijfel de grootste trekpleister en liggen net buiten de stad. Daarnaast kun je het Egyptisch Museum bezoeken, waar duizenden oude artefacten te zien zijn, waaronder schatten uit het graf van Toetanchamon. Ook de oude islamitische wijk van Caïro, met haar moskeeën en markten, is een bezoek waard. Een wandeling door de stad laat de mix van oud en modern goed zien. Voor liefhebbers van geschiedenis is Caïro een van de meest indrukwekkende bestemmingen ter wereld.', '', 'cairo-card.png'),
(11, 'Milaan', 'Italië', 'Milaan is een grote stad in het noorden van Italië en staat bekend als een van de belangrijkste mode- en designhoofdsteden van de wereld. Naast haar moderne en stijlvolle uitstraling heeft de stad ook een rijke geschiedenis en indrukwekkende architectuur. Bezienswaardigheden zoals de Duomo di Milano en het Castello Sforzesco trekken jaarlijks veel bezoekers. Milaan combineert cultuur, historie en een levendig stadsleven, waardoor het een populaire bestemming is voor stedentrips.', 200, 'Italië.png', 'Europa', 0, 1, 0, 0, 1, 'Welkom in Milaan, een stad waar geschiedenis en modern leven samenkomen. Tijdens een bezoek ontdek je indrukwekkende gebouwen, elegante winkelstraten en een rijke culturele sfeer. De stad staat bekend om haar stijlvolle uitstraling, maar heeft ook een diep historisch verleden dat nog steeds zichtbaar is in het centrum. Van grote pleinen tot eeuwenoude kerken en kastelen: Milaan heeft voor iedere bezoeker iets te bieden. Of je nu geïnteresseerd bent in architectuur, cultuur of gewoon wilt genieten van een levendige Italiaanse stad, Milaan is een bestemming die je blijft verrassen.', 'Milaan werd oorspronkelijk gesticht door de Kelten en later veroverd door de Romeinen, die de stad Mediolanum noemden. In de Middeleeuwen groeide Milaan uit tot een belangrijk handels- en machtscentrum in Noord-Italië. Onder invloed van invloedrijke families zoals de Visconti en Sforza werd de stad verder ontwikkeld en verrijkt met indrukwekkende bouwwerken. Tijdens de Renaissance speelde Milaan een belangrijke rol in kunst en architectuur. Tegenwoordig is de stad uitgegroeid tot een wereldwijd centrum voor mode, design en economie, terwijl het historische erfgoed nog steeds duidelijk zichtbaar is.', 'Milaan biedt een mix van historische en moderne bezienswaardigheden. Het bekendste monument is de Duomo di Milano, een indrukwekkende kathedraal midden in de stad. Daarnaast kun je het Castello Sforzesco bezoeken of wandelen door de stijlvolle winkelgalerij Galleria Vittorio Emanuele II. Voor liefhebbers van kunst en geschiedenis zijn er verschillende musea en kerken met eeuwenoude werken. Ook de wijk Brera is populair vanwege de gezellige sfeer en culturele uitstraling. Dankzij de combinatie van historie, architectuur en modern stadsleven is Milaan een veelzijdige bestemming voor een stedentrip.', '', 'milaan-card.png'),
(12, 'Tromsø ', 'Noorwegen', 'Tromsø is een stad in het noorden van Noorwegen, gelegen boven de poolcirkel. De stad staat bekend als een van de beste plekken ter wereld om het noorderlicht te zien en is daarnaast een populaire wintersportbestemming. Met besneeuwde landschappen, fjorden en een echt Arctisch klimaat trekt Tromsø jaarlijks veel avontuurlijke reizigers. Naast wintersport biedt de stad ook unieke natuurervaringen en een bijzondere winterse sfeer.', 350, 'Noorwegen.png', 'Europa', 0, 0, 1, 1, 0, 'Welkom in Tromsø, een echte winterbestemming in het hoge noorden van Noorwegen. Hier draait alles om sneeuw, natuur en unieke ervaringen die je nergens anders vindt. Tijdens de wintermaanden verandert het landschap in een witte wereld waar je kunt skiën, sneeuwschoenwandelen of simpelweg genieten van de stilte van de natuur. Daarnaast is Tromsø wereldwijd beroemd als een van de beste plekken om het noorderlicht te bewonderen. De combinatie van ruige natuur, frisse lucht en bijzondere winteractiviteiten maakt deze bestemming perfect voor liefhebbers van wintersport en avontuur.', 'Tromsø heeft een lange geschiedenis als belangrijk handels- en visserscentrum in Noord-Noorwegen. Door de ligging boven de poolcirkel werd de stad al vroeg een uitvalsbasis voor Arctische expedities. In de negentiende en twintigste eeuw speelde Tromsø een belangrijke rol in poolexploraties en wetenschappelijk onderzoek in het noorden. Ondanks het barre klimaat groeide de stad uit tot een levendige gemeenschap. Tegenwoordig combineert Tromsø haar historische rol in de poolgebieden met moderne voorzieningen en toerisme, vooral gericht op winteractiviteiten en natuurbeleving.', 'Tromsø is een paradijs voor wintersport- en natuurliefhebbers. Je kunt er skiën, sneeuwschoenwandelen en hondensledetochten maken door het besneeuwde landschap. Ook zijn er georganiseerde excursies om het noorderlicht te bewonderen, een van de grootste trekpleisters van de regio. Daarnaast kun je genieten van het uitzicht op fjorden en bergen rondom de stad. In het centrum van Tromsø vind je musea, restaurants en gezellige cafés waar je kunt opwarmen na een dag in de kou. Dankzij de combinatie van avontuur en natuur is Tromsø een unieke winterbestemming.', '', 'tromso-card.png');

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `Wachtwoord_vergeten`
--

DROP TABLE IF EXISTS `Wachtwoord_vergeten`;
CREATE TABLE `Wachtwoord_vergeten` (
  `id` int NOT NULL,
  `UID` varchar(50) NOT NULL,
  `expiration` time NOT NULL,
  `Emailadres` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Indexen voor geëxporteerde tabellen
--

--
-- Indexen voor tabel `Boekingen`
--
ALTER TABLE `Boekingen`
  ADD PRIMARY KEY (`Boeking_id`);

--
-- Indexen voor tabel `Gebruikers`
--
ALTER TABLE `Gebruikers`
  ADD PRIMARY KEY (`User_id`);

--
-- Indexen voor tabel `Reizen`
--
ALTER TABLE `Reizen`
  ADD PRIMARY KEY (`Reis_id`);

--
-- Indexen voor tabel `Wachtwoord_vergeten`
--
ALTER TABLE `Wachtwoord_vergeten`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT voor geëxporteerde tabellen
--

--
-- AUTO_INCREMENT voor een tabel `Boekingen`
--
ALTER TABLE `Boekingen`
  MODIFY `Boeking_id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT voor een tabel `Gebruikers`
--
ALTER TABLE `Gebruikers`
  MODIFY `User_id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT voor een tabel `Reizen`
--
ALTER TABLE `Reizen`
  MODIFY `Reis_id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT voor een tabel `Wachtwoord_vergeten`
--
ALTER TABLE `Wachtwoord_vergeten`
  MODIFY `id` int NOT NULL AUTO_INCREMENT;
SET FOREIGN_KEY_CHECKS=1;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

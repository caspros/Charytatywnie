-- phpMyAdmin SQL Dump
-- version 4.8.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Czas generowania: 20 Sty 2020, 00:29
-- Wersja serwera: 10.1.31-MariaDB
-- Wersja PHP: 7.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Baza danych: `charytatywnie`
--

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `adres`
--

CREATE TABLE `adres` (
  `id_adres` int(11) NOT NULL,
  `kod_pocztowy` varchar(6) DEFAULT NULL,
  `miasto` varchar(45) DEFAULT NULL,
  `ulica` varchar(45) DEFAULT NULL,
  `nr_domu` int(11) DEFAULT NULL,
  `nr_lokalu` int(11) DEFAULT NULL,
  `id_klienci` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Zrzut danych tabeli `adres`
--

INSERT INTO `adres` (`id_adres`, `kod_pocztowy`, `miasto`, `ulica`, `nr_domu`, `nr_lokalu`, `id_klienci`) VALUES
(1, '58-533', 'Mysłakowice', 'Nowa', 12, 123, 5),
(2, NULL, NULL, NULL, NULL, NULL, 6),
(3, '66-666', 'Piekło', 'Piekielna', 666, 65, 7),
(4, NULL, NULL, NULL, NULL, NULL, 8),
(5, NULL, NULL, NULL, NULL, NULL, 9),
(6, NULL, NULL, NULL, NULL, NULL, 10),
(8, NULL, NULL, NULL, NULL, NULL, 13),
(9, NULL, NULL, NULL, NULL, NULL, 14),
(10, NULL, NULL, NULL, NULL, NULL, 15),
(11, '50-111', 'Warszawa', 'Fajna', 51, 152, 16),
(12, '58-533', 'Mysłakowice', 'Nowa', 12, 23, 17),
(13, '02-200', 'Komikowo', 'Komikowa', 151, 1, 18);

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `historia`
--

CREATE TABLE `historia` (
  `id_historia` int(11) NOT NULL,
  `id_klienci` int(11) NOT NULL,
  `id_produkty` int(11) NOT NULL,
  `cena` int(11) NOT NULL,
  `data` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf32;

--
-- Zrzut danych tabeli `historia`
--

INSERT INTO `historia` (`id_historia`, `id_klienci`, `id_produkty`, `cena`, `data`) VALUES
(1, 7, 102, 10, '2020-01-12 16:23:39'),
(2, 7, 102, 20, '2020-01-12 16:24:11'),
(3, 5, 102, 50, '2020-01-12 16:34:50'),
(4, 5, 104, 30, '2020-01-12 16:36:37'),
(5, 5, 108, 210, '2020-01-12 16:36:45'),
(6, 7, 104, 35, '2020-01-12 16:36:58'),
(7, 7, 102, 55, '2020-01-12 16:37:02'),
(8, 7, 108, 215, '2020-01-12 16:37:12'),
(9, 7, 104, 40, '2020-01-12 17:05:22'),
(10, 5, 104, 45, '2020-01-12 17:05:36'),
(11, 5, 104, 50, '2020-01-12 17:09:50'),
(12, 5, 104, 55, '2020-01-12 17:10:06'),
(13, 5, 104, 60, '2020-01-12 17:10:50'),
(14, 7, 104, 65, '2020-01-12 17:11:10'),
(16, 5, 108, 220, '2020-01-12 17:46:33'),
(17, 7, 104, 70, '2020-01-12 17:50:45'),
(18, 7, 108, 225, '2020-01-12 17:50:54'),
(19, 5, 104, 100, '2020-01-12 17:51:10'),
(20, 5, 108, 230, '2020-01-12 17:51:15'),
(21, 7, 108, 235, '2020-01-12 17:51:32'),
(22, 7, 102, 60, '2020-01-14 16:58:12'),
(23, 7, 102, 65, '2020-01-14 17:16:57'),
(24, 5, 102, 70, '2020-01-14 17:17:14'),
(25, 5, 108, 240, '2020-01-14 17:17:19'),
(26, 7, 102, 75, '2020-01-14 17:19:40'),
(27, 7, 104, 105, '2020-01-14 17:19:44'),
(28, 7, 108, 245, '2020-01-14 17:19:47'),
(34, 5, 107, 45, '2020-01-14 17:40:15'),
(35, 5, 107, 50, '2020-01-14 17:43:17'),
(36, 5, 107, 55, '2020-01-14 17:43:54'),
(37, 5, 107, 60, '2020-01-14 17:44:02'),
(38, 5, 104, 110, '2020-01-14 17:55:05');

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `kategorie`
--

CREATE TABLE `kategorie` (
  `id_kategorie` int(11) NOT NULL,
  `kategoria` varchar(45) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Zrzut danych tabeli `kategorie`
--

INSERT INTO `kategorie` (`id_kategorie`, `kategoria`) VALUES
(1, 'Wydarzenia'),
(2, 'Przedmioty'),
(3, 'Autografy');

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `klienci`
--

CREATE TABLE `klienci` (
  `id_klienci` int(11) NOT NULL,
  `Imie` varchar(45) NOT NULL,
  `Nazwisko` varchar(45) NOT NULL,
  `haslo` varchar(45) NOT NULL,
  `email` varchar(45) NOT NULL,
  `id_adres` int(11) DEFAULT NULL,
  `uprawnienia` tinyint(3) NOT NULL DEFAULT '0' COMMENT '0 - klient, 1 - administrator'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Zrzut danych tabeli `klienci`
--

INSERT INTO `klienci` (`id_klienci`, `Imie`, `Nazwisko`, `haslo`, `email`, `id_adres`, `uprawnienia`) VALUES
(5, 'Benek', 'Benek', '76678ce4ef2dc607104cf9955b502443', 'benek1@o2.pl', 1, 0),
(6, 'Test', 'Tescik', 'cc03e747a6afbbcbf8be7668acfebee5', 'test@gmail.com', 2, 0),
(7, 'Admin', 'Adminowski', '21232f297a57a5a743894a0e4a801fc3', 'admin@gmail.com', 3, 1),
(8, 'Baltazar', 'KrÃ³l', 'f17f4b3e8e709cd3c89a6dbd949d7171', 'baltazar@123.pl', 4, 0),
(9, 'Robcio', 'Robertos', '6058d199135afa99b8446f246e7b5cec', 'robertos@o2.pl', 5, 0),
(10, 'Graf', 'Graf', '2c01010b99ef591baef2d11237937e54', 'Graf@Graf.pl', 6, 0),
(13, 'Testownik', 'Testownik', 'e77ce99136875685f4ae312c4d45cf3b', 'testownik@gmail.com', 8, 0),
(14, 'Macio', 'Macio', '4959fafb966d47348c32072ce6538d0b', 'macio@o2.pl', 9, 0),
(15, 'Typek', 'Typek', 'b0a767234400dd537a97fe6c47b75172', 'typek@o2.pl', 10, 0),
(16, 'Bartosz', 'Bartosz', 'c9006f26a2b48d3dd09eba5569244f6f', 'bartosz@o2.pl', 11, 0),
(17, 'Wariat', 'Wariat', '027ca5a0d6c257aa627d3a4a9ea6f2e5', 'wariat@o2.pl', 12, 0),
(18, 'Komik', 'Komik', '0bcb58d9edd19ebb002e5da7ac82ebd8', 'komik@o2.pl', 13, 0);

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `koszyk`
--

CREATE TABLE `koszyk` (
  `id_koszyk` int(11) NOT NULL,
  `cena` int(11) NOT NULL,
  `id_produkty` int(11) NOT NULL,
  `id_klienci` int(11) NOT NULL,
  `zlozono` int(11) DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Zrzut danych tabeli `koszyk`
--

INSERT INTO `koszyk` (`id_koszyk`, `cena`, `id_produkty`, `id_klienci`, `zlozono`) VALUES
(20, 60, 107, 5, 0),
(29, 75, 102, 7, 0),
(31, 245, 108, 7, 0),
(32, 110, 104, 5, 0);

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `produkty`
--

CREATE TABLE `produkty` (
  `id_produkty` int(11) NOT NULL,
  `nazwa` varchar(45) NOT NULL,
  `opis` text NOT NULL,
  `cena` decimal(10,2) NOT NULL,
  `rozmiar` varchar(100) DEFAULT NULL,
  `zdjecie` varchar(50) NOT NULL DEFAULT 'default_product.png',
  `id_kategorie` int(11) NOT NULL,
  `data_zakonczenia` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Zrzut danych tabeli `produkty`
--

INSERT INTO `produkty` (`id_produkty`, `nazwa`, `opis`, `cena`, `rozmiar`, `zdjecie`, `id_kategorie`, `data_zakonczenia`) VALUES
(102, 'Autograf Cleo', 'Autograf piosenkarki i influencerki Cleo, która wraz z Donatanem zasłynęła hitem My Słowianie', '75.00', NULL, 'autograf_cleo.png', 3, '2020-01-15 15:53:58'),
(103, 'Kolacja z Andrzejem Dudą', 'Kolacja z Andrzejem Dudą, termin dowolny, nasz prezydent ma bardzo dużo czasu.\r\nSpędź niesamowity wieczór z najważniejsza osobą w państwie!', '1.00', NULL, 'a_duda.jpeg', 1, '2020-01-15 15:53:58'),
(104, 'Kolacja z Vladimirem Putinem', 'Kolacja z najważniejszą osobą w Rosji, Vladimirem Putinem we własnej osobie. Pan Vladimir sam się do nas zgłosił i zaproponował tą oto licytację na szczytny cel, brawa dla niego!', '110.00', NULL, 'vlad.jpg', 1, '2020-01-12 15:53:58'),
(105, 'Przejazd bolidem z Kubicą', 'Przejazd bolidem F1 z Robertem Kubicą. Robert Kubica w ostatnich wyścigach osiąga niesamowite rezultaty i stabilnie trzyma się w czołówce dołu tabeli. Weź udział w przejeździe z Robertem Kubicą w boldzie F1 i osiągnij niebotyczną prędkość 300 km/h!', '1.00', NULL, 'kubica.png', 1, '2020-01-12 15:53:58'),
(106, 'Autograf Roberta Lewandowskiego', 'Autograf najlepszego człowieka Roberta Lewandowskiego. Polak, który zasłynął na arenie międzynarodowej, czterokrotny król strzelców Bundesligi!', '5.00', NULL, 'autograf_lewandowski.jpg', 3, '2020-01-12 15:53:58'),
(107, 'Autograf Friza', 'Autograf influencera i youtubera Friza. Friz jest młodym twórcą, który w krótkim czasie rozwinął kanał i został milionerem.', '60.00', NULL, 'autograf_friz.png', 3, '2020-01-12 15:53:58'),
(108, 'Medal olimpijski Kamila Stocha', 'Złoty medal olimpijski Kamila Stocha, lepszy od Małysza.', '245.00', NULL, 'medal_stoch.jpg', 2, '2020-01-13 15:53:58'),
(109, 'Leo Messi Złota Piłka', 'Piłka jest ze złota, nie można jej kopać. Wygląda ładnie.', '1.00', NULL, 'leo_messi.png', 2, '2020-01-12 15:53:58'),
(110, 'Medal Noblowski Tokarczuk', 'Uwaga: Jest to replika medalu, Pani Olga Tokarczuk otrzymała 3 takie repliki.', '1000.00', NULL, 'medal_nobel.png', 2, '2020-01-12 15:53:58');

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `zamowienia`
--

CREATE TABLE `zamowienia` (
  `id_zamowienia` int(11) NOT NULL,
  `data_zlozenia` datetime NOT NULL,
  `data_wyslania` date NOT NULL,
  `zaplacono` tinyint(4) NOT NULL,
  `id_klienci` int(11) NOT NULL,
  `suma` int(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Zrzut danych tabeli `zamowienia`
--

INSERT INTO `zamowienia` (`id_zamowienia`, `data_zlozenia`, `data_wyslania`, `zaplacono`, `id_klienci`, `suma`) VALUES
(5, '2019-12-05 18:45:49', '0000-00-00', 0, 7, 265),
(6, '2019-12-05 18:50:26', '0000-00-00', 0, 5, 375),
(7, '2019-12-05 20:06:51', '0000-00-00', 0, 5, 75),
(8, '2019-12-05 22:18:42', '0000-00-00', 0, 7, 1550),
(9, '2019-12-05 22:20:44', '2019-12-05', 1, 7, 588),
(10, '2019-12-05 22:24:10', '0000-00-00', 0, 7, 1250),
(11, '2019-12-06 20:59:09', '0000-00-00', 0, 5, 928),
(12, '2019-12-13 15:26:07', '0000-00-00', 0, 5, 77),
(13, '2019-12-13 16:10:28', '0000-00-00', 0, 5, 1480),
(14, '2019-12-17 21:19:51', '2019-12-17', 1, 17, 62);

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `zamowienie_produkty`
--

CREATE TABLE `zamowienie_produkty` (
  `id_zamowienie_produkty` int(11) NOT NULL,
  `ilosc` int(11) NOT NULL,
  `cena` int(11) NOT NULL,
  `id_produkty` int(11) NOT NULL,
  `id_klienci` int(11) NOT NULL,
  `id_zamowienia` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Zrzut danych tabeli `zamowienie_produkty`
--

INSERT INTO `zamowienie_produkty` (`id_zamowienie_produkty`, `ilosc`, `cena`, `id_produkty`, `id_klienci`, `id_zamowienia`) VALUES
(3, 5, 50, 8, 7, 5),
(4, 1, 15, 15, 7, 5),
(5, 2, 50, 8, 5, 6),
(6, 5, 25, 14, 5, 6),
(7, 2, 75, 18, 5, 6),
(8, 5, 15, 15, 5, 7),
(9, 6, 100, 12, 7, 8),
(10, 4, 30, 14, 7, 8),
(11, 2, 70, 16, 7, 8),
(12, 14, 15, 15, 7, 8),
(13, 16, 30, 14, 7, 8),
(14, 6, 50, 8, 7, 9),
(15, 3, 70, 16, 7, 9),
(16, 2, 15, 15, 7, 9),
(17, 6, 15, 15, 7, 10),
(18, 11, 100, 12, 7, 10),
(19, 5, 100, 53, 5, 11),
(20, 4, 30, 14, 5, 11),
(21, 2, 100, 12, 5, 11),
(22, 1, 60, 17, 5, 11),
(23, 1, 50, 8, 5, 12),
(24, 1, 15, 15, 5, 12),
(25, 2, 50, 8, 5, 13),
(26, 1, 1350, 54, 5, 13),
(27, 1, 50, 8, 17, 14);

--
-- Indeksy dla zrzutów tabel
--

--
-- Indeksy dla tabeli `adres`
--
ALTER TABLE `adres`
  ADD PRIMARY KEY (`id_adres`),
  ADD KEY `id_klienci` (`id_klienci`);

--
-- Indeksy dla tabeli `historia`
--
ALTER TABLE `historia`
  ADD PRIMARY KEY (`id_historia`),
  ADD KEY `id_klienci` (`id_klienci`),
  ADD KEY `id_produkty` (`id_produkty`);

--
-- Indeksy dla tabeli `kategorie`
--
ALTER TABLE `kategorie`
  ADD PRIMARY KEY (`id_kategorie`);

--
-- Indeksy dla tabeli `klienci`
--
ALTER TABLE `klienci`
  ADD PRIMARY KEY (`id_klienci`),
  ADD KEY `fk_klienci_adres_idx` (`id_adres`);

--
-- Indeksy dla tabeli `koszyk`
--
ALTER TABLE `koszyk`
  ADD PRIMARY KEY (`id_koszyk`),
  ADD KEY `FK_Klient` (`id_klienci`),
  ADD KEY `FK_Produkt` (`id_produkty`);

--
-- Indeksy dla tabeli `produkty`
--
ALTER TABLE `produkty`
  ADD PRIMARY KEY (`id_produkty`),
  ADD KEY `fk_produkty_kategorie1_idx` (`id_kategorie`);

--
-- Indeksy dla tabeli `zamowienia`
--
ALTER TABLE `zamowienia`
  ADD PRIMARY KEY (`id_zamowienia`),
  ADD KEY `fk_zamowienia_klienci1_idx` (`id_klienci`);

--
-- Indeksy dla tabeli `zamowienie_produkty`
--
ALTER TABLE `zamowienie_produkty`
  ADD PRIMARY KEY (`id_zamowienie_produkty`),
  ADD KEY `id_klienci` (`id_klienci`),
  ADD KEY `id_produkty` (`id_produkty`) USING BTREE,
  ADD KEY `id_zamowienia` (`id_zamowienia`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT dla tabeli `adres`
--
ALTER TABLE `adres`
  MODIFY `id_adres` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT dla tabeli `historia`
--
ALTER TABLE `historia`
  MODIFY `id_historia` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=39;

--
-- AUTO_INCREMENT dla tabeli `kategorie`
--
ALTER TABLE `kategorie`
  MODIFY `id_kategorie` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT dla tabeli `klienci`
--
ALTER TABLE `klienci`
  MODIFY `id_klienci` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT dla tabeli `koszyk`
--
ALTER TABLE `koszyk`
  MODIFY `id_koszyk` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;

--
-- AUTO_INCREMENT dla tabeli `produkty`
--
ALTER TABLE `produkty`
  MODIFY `id_produkty` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=111;

--
-- AUTO_INCREMENT dla tabeli `zamowienia`
--
ALTER TABLE `zamowienia`
  MODIFY `id_zamowienia` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT dla tabeli `zamowienie_produkty`
--
ALTER TABLE `zamowienie_produkty`
  MODIFY `id_zamowienie_produkty` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- Ograniczenia dla zrzutów tabel
--

--
-- Ograniczenia dla tabeli `koszyk`
--
ALTER TABLE `koszyk`
  ADD CONSTRAINT `FK_Klient` FOREIGN KEY (`id_klienci`) REFERENCES `klienci` (`id_klienci`),
  ADD CONSTRAINT `FK_Produkt` FOREIGN KEY (`id_produkty`) REFERENCES `produkty` (`id_produkty`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

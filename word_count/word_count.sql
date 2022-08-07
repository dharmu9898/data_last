-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 25, 2020 at 09:53 AM
-- Server version: 10.4.13-MariaDB
-- PHP Version: 7.2.32

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `word_count`
--

-- --------------------------------------------------------

--
-- Table structure for table `words`
--

CREATE TABLE `words` (
  `id` int(255) NOT NULL,
  `my_word` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `words`
--

INSERT INTO `words` (`id`, `my_word`) VALUES
(127, 'DFGDFFBFG'),
(128, 'DJFOIIOJSVIOOJDFF09VDFOIPKV '),
(129, 'DFJOIJOISGKJG09FVI FS90DIG'),
(130, 'vhnfgncvbndgndghn '),
(131, 'xdzuhcioujszciujxiocjiosc oidsjcxikxzmz 9ipoixcjk poicxxjio juxhcv j'),
(132, 'jhujhujhkjniuyiokmnoiyukmn dfhytrtg'),
(133, 'jxiufsiod cs9d9ifciosd 9c989usdoixc 9isxuic sdx09ic90dsicviopx co9xiu vcoi jdio9cviu oicxvvx90izcvv kljdc90cuivivc'),
(134, 'dharmu kuma'),
(135, 'Knowing the word count of a text can be important. For example, if an author has to write a minimum or maximum amount of words for an article, essay, report, story, book, paper, you name it. WordCounter will help to make sure its word count reaches a specific requirement or stays within a certain limit.'),
(136, 'DevOps Tutorials'),
(137, 'issues from a black background and seems to be toppling towards the viewer. Below and to the left is his tormentor, a satyr with horns and pointed ears, who is gesturing fiercely towards his victim.'),
(138, 'sdjhfuhsuiji'),
(139, ' العربيةDeutschEspañolFrançaisItalianoNederlands日本語PolskiPortuguêsРусскийSvenskaУкраїнськаTiếng Việt中文\r\nMore than 250,000 articles: Bahasa IndonesiaBahasa MelayuBân-lâm-gúБългарскиCatalàČeštinaDanskEsperantoEuskaraفارسی‎עברית한국어MagyarNorsk BokmålRomânăSrpskiSrpskohrvatskiSuomiTürkçe'),
(140, ' العربيةDeutschEspañolFrançaisItalianoNederlands日本語PolskiPortuguêsРусскийSvenskaУкраїнськаTiếng Việt中文\r\nMore than 250,000 articles: Bahasa IndonesiaBahasa MelayuBân-lâm-gúБългарскиCatalàČeštinaDanskEsperantoEuskaraفارسی‎עברית한국어MagyarNorsk BokmålRomânăSrpskiSrpskohrvatskiSuomiTürkçe'),
(141, 'Ixion is an oil-on-canvas painting by the Spanish artist Jusepe de Ribera, signed and dated 1632. It depicts the myth of the eternal punishment meted out by Jupiter on finding the giant Ixion in the bed of his wife Juno. The picture shows the giant tied to a perpetually turning wheel. The condemned man is depicted face down, his agony expressed by his contorted position and strained muscles, the dramatic tension being accentuated by the lighting. His enormous body, animated by the circular movement of his punishment, issues from a black background and seems to be toppling towards the viewer. Below and to the left is his tormentor, a satyr with horns and pointed ears, who is gesturing fiercely towards his victim.\r\n\r\nThis painting was part of a series of four paintings; the other three showed the tortures of Sisyphus, Tantalus and Tityos. Only Ixion and Tityos survive, both in the collection of the Museo del Prado in Madrid.'),
(142, 'Ixion is an oil-on-canvas painting by the Spanish artist Jusepe de Ribera, signed and dated 1632. It depicts the myth of the eternal punishment meted out by Jupiter on finding the giant Ixion in the bed of his wife Juno. The picture shows the giant tied to a perpetually turning wheel. The condemned man is depicted face down, his agony expressed by his contorted position and strained muscles, the dramatic tension being accentuated by the lighting. His enormous body, animated by the circular movement of his punishment, issues from a black background and seems to be toppling towards the viewer. Below and to the left is his tormentor, a satyr with horns and pointed ears, who is gesturing fiercely towards his victim.\r\n\r\nThis painting was part of a series of four paintings; the other three showed the tortures of Sisyphus, Tantalus and Tityos. Only Ixion and Tityos survive, both in the collection of the Museo del Prado in Madrid.'),
(143, 'Ixion is an oil-on-canvas painting by the Spanish artist Jusepe de Ribera, signed and dated 1632. It depicts the myth of the eternal punishment meted out by Jupiter on finding the giant Ixion in the bed of his wife Juno. The picture shows the giant tied to a perpetually turning wheel. The condemned man is depicted face down, his agony expressed by his contorted position and strained muscles, the dramatic tension being accentuated by the lighting. His enormous body, animated by the circular movement of his punishment, issues from a black background and seems to be toppling towards the viewer. Below and to the left is his tormentor, a satyr with horns and pointed ears, who is gesturing fiercely towards his victim.\r\n\r\nThis painting was part of a series of four paintings; the other three showed the tortures of Sisyphus, Tantalus and Tityos. Only Ixion and Tityos survive, both in the collection of the Museo del Prado in Madrid.'),
(144, 'Knowing the word count of a text can be important. For example, if an author has to write a minimum or maximum amount of words for an article, essay, report, story, book, paper, you name it. WordCounter will help to make sure its word count reaches a specific requirement or stays within a certain limit.'),
(145, 'ieriirsjfeoipidf g');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `words`
--
ALTER TABLE `words`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `words`
--
ALTER TABLE `words`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=146;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

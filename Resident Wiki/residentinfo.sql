-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Gegenereerd op: 24 apr 2023 om 07:17
-- Serverversie: 5.7.36
-- PHP-versie: 7.4.26

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `residentinfo`
--

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `game`
--

DROP TABLE IF EXISTS `game`;
CREATE TABLE IF NOT EXISTS `game` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `game` varchar(45) NOT NULL,
  `release` varchar(45) NOT NULL,
  `file` varchar(100) NOT NULL,
  `info` varchar(1000) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=utf8;

--
-- Gegevens worden geëxporteerd voor tabel `game`
--

INSERT INTO `game` (`id`, `game`, `release`, `file`, `info`) VALUES
(1, 'Resident Evil 0', '12-9-2002', 'Resident-evil-0.jpg', 'Resident Evil Zero (or Resident Evil 0) is a survival horror video game developed and published by Capcom for the GameCube in 2002. It is a prequel to Resident Evil (1996), covering the ordeals experienced in the Arklay Mountains by special police force unit, the S.T.A.R.S. Bravo Team. The story follows officer Rebecca Chambers and convict Billy Coen as they explore an abandoned training facility for employees of the pharmaceutical company Umbrella. The gameplay is similar to other Resident Evil games, but adds the ability to switch between characters to solve puzzles and use unique abilities.'),
(2, 'Resident Evil 1', '22-3-2002', 'Resident Evil HD Remaster.jpg', 'In 1998 a special forces team is sent to investigate some bizarre murders on the outskirts of Raccoon City. Upon arriving they are attacked by a pack of blood-thirsty dogs and are forced to take cover in a nearby mansion. But the scent of death hangs heavy in the air. Supplies are scarce as they struggle to stay alive.'),
(3, 'Resident Evil 2', '21-1-1998', 'Resident-evil-2.png', 'The story of Resident Evil 2 takes place two months after the events of the first game, Resident Evil. It is set in Raccoon City, a Midwestern American mountain community whose residents have been transformed into zombies by the t-Virus, a biological weapon developed by the pharmaceutical company Umbrella. In their escape from the city, the two protagonists, Leon S. Kennedy, and Claire Redfield encounter other survivors and are confronted by William Birkin, the mutated creator of the even more powerful G-virus, a variation of the t-Virus.'),
(4, 'Resident Evil 3', '22-9-1999', 'Resident-evil-3.jpg', 'Resident Evil 3 is the third game in the Resident Evil series and takes place almost concurrently with the events of Resident Evil 2. The player must control former elite agent Jill Valentine as she escapes from a city that has been infected by a virus.'),
(5, 'Resident Evil 4', '11-1-2005', 'Resident-evil-4.jpg', 'In Resident Evil 4, special agent Leon S. Kennedy is sent on a mission to rescue the U.S. President\'s daughter who has been kidnapped. Finding his way to a rural village in Europe, he faces new threats that are a departure from the traditional lumbering zombie enemies of the earlier instalments in the series. Leon battles horrific new creatures infested by a new threat called Las Plagas and faces off against an aggressive group of enemies including mind-controlled villagers that are tied to Los Illuminados, the mysterious cult which is behind the abduction.'),
(6, 'Resident Evil 5', '5-3-2009', 'Resident-evil-5.jpg', 'In Resident Evil 5, the Umbrella Corporation and its crop of lethal viruses have been destroyed and contained. But a new, more dangerous threat has emerged. Years after surviving the events in Raccoon City, Chris Redfield has been fighting the scourge of bio-organic weapons all over the world. Now a member of the Bioterrorism Security Assessment Alliance (BSAA), Chris is sent to Africa to investigate a biological agent that is transforming the populace into aggressive and disturbing creatures. Joined by another local BSAA agent, Sheva Alomar, the two must work together to solve the truth behind the disturbing turn of events.'),
(7, 'Resident Evil 6', '2-10-2012', 'Resident-evil-6.jpg', 'Blending action and survival horror, Resident Evil 6 promises to be the dramatic horror experience of 2013. Resident Evil favorites Leon S. Kennedy, Chris Redfield and Ada Wong are joined by new characters, including Jake Muller, to face a new horror, the highly virulent C-virus, as the narrative moves between North America, the war-torn Eastern European state of Edonia and the Chinese city of Lanshiang. '),
(8, 'Resident Evil 7', '23-1-2017', 'Resident-evil-7.jpg', 'Set in modern day rural America and taking place after the dramatic events of Resident Evil 6, players experience the terror directly from the first person perspective. Resident Evil 7 embodies the series\' signature gameplay elements of exploration and tense atmosphere that first coined \"survival horror\" some twenty years ago; meanwhile, a complete refresh of gameplay systems simultaneously propels the survival horror experience to the next level.'),
(9, 'Resident Evil 2 Remake', '25-1-2019', 'Resident-evil-2-remake.jpg', 'The genre-defining masterpiece Resident Evil 2 returns, completely rebuilt from the ground up for a deeper narrative experience. Using Capcom\'s proprietary RE Engine, Resident Evil 2 offers a fresh take on the classic survival horror saga with breathtakingly realistic visuals, heart-pounding immersive audio, a new over-the-shoulder camera, and modernized controls on top of gameplay modes from the original game.'),
(10, 'Resident Evil 3 Remake', '3-4-2020', 'Resident-evil-3-remake.png', 'In this remake of the original Resident Evil 3, Jill Valentine is one of the last remaining people in Raccoon City to witness the atrocities Umbrella performed. To stop her, Umbrella unleashes their ultimate secret weapon; Nemesis!\r\n'),
(11, 'Resident Evil 8', '7-5-2021', 'Resident-evil-8.png', 'Set a few years after the horrifying events in the critically acclaimed Resident Evil 7 biohazard, the all-new storyline begins with Ethan Winters and his wife Mia living peacefully in a new location, free from their past nightmares. Just as they are building their new life together, tragedy befalls them once again.'),
(12, 'Resident Evil 4 Remake', '24-3-2023', 're4.jpg', 'Resident Evil4  remake');

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `tbl_accounts`
--

DROP TABLE IF EXISTS `tbl_accounts`;
CREATE TABLE IF NOT EXISTS `tbl_accounts` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `email` varchar(50) NOT NULL,
  `password` varchar(100) NOT NULL,
  `username` varchar(30) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=6 DEFAULT CHARSET=utf8;

--
-- Gegevens worden geëxporteerd voor tabel `tbl_accounts`
--

INSERT INTO `tbl_accounts` (`id`, `email`, `password`, `username`) VALUES
(1, 'daan@abc.com', '123', 'daan'),
(2, 'test@test.com', 'test', 'tester'),
(5, 'testing@testing.com', 'testing', 'testing');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

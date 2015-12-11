-- phpMyAdmin SQL Dump
-- version 4.1.14
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: 11-Dez-2015 às 03:46
-- Versão do servidor: 5.6.17
-- PHP Version: 5.5.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `casadogui`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `aposta`
--

CREATE TABLE IF NOT EXISTS `aposta` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_confronto` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `data` datetime NOT NULL,
  `placar_casa` int(11) NOT NULL,
  `placar_visitante` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `id_confronto` (`id_confronto`),
  KEY `id_user` (`id_user`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=44 ;

--
-- Extraindo dados da tabela `aposta`
--

INSERT INTO `aposta` (`id`, `id_confronto`, `id_user`, `data`, `placar_casa`, `placar_visitante`) VALUES
(17, 1, 1, '2014-06-06 23:26:45', 2, 1),
(18, 2, 1, '2014-06-06 23:26:45', 1, 1),
(19, 7, 1, '2014-06-06 23:26:45', 2, 2),
(20, 8, 1, '2014-06-06 23:26:45', 2, 1),
(21, 13, 1, '2014-06-06 23:28:45', 3, 2),
(22, 37, 1, '2014-06-07 17:59:53', 1, 1),
(23, 36, 2, '2014-06-13 21:32:25', 2, 2),
(24, 36, 1, '2014-06-13 21:33:20', 1, 1),
(25, 13, 2, '2014-06-13 21:32:59', 2, 3),
(26, 3, 1, '2014-06-13 23:10:09', 3, 1),
(27, 3, 2, '2014-06-13 23:15:56', 1, 3),
(28, 19, 1, '2014-06-13 23:34:45', 3, 3),
(29, 20, 1, '2014-06-13 23:40:43', 3, 3),
(30, 19, 2, '2014-06-13 23:45:19', 3, 2),
(31, 20, 2, '2014-06-13 23:45:39', 1, 1),
(32, 34, 1, '2014-06-24 19:40:09', 1, 2),
(33, 35, 1, '2014-06-24 19:40:09', 2, 1),
(34, 28, 1, '2014-06-24 19:40:09', 2, 1),
(35, 29, 1, '2014-06-24 19:40:09', 2, 2),
(36, 41, 1, '2014-06-24 19:40:09', 1, 2),
(37, 40, 1, '2014-06-24 19:40:09', 1, 1),
(38, 46, 1, '2014-06-24 19:40:09', 2, 1),
(39, 47, 1, '2014-06-24 19:40:09', 2, 1),
(40, 49, 1, '2014-06-24 19:41:00', 2, 1),
(41, 50, 1, '2014-06-24 19:40:09', 2, 1),
(42, 51, 1, '2014-06-24 19:40:09', 1, 2),
(43, 52, 1, '2014-06-24 19:40:09', 1, 2);

-- --------------------------------------------------------

--
-- Estrutura da tabela `confronto`
--

CREATE TABLE IF NOT EXISTS `confronto` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_grupo` int(11) NOT NULL,
  `id_time_casa` int(11) NOT NULL,
  `id_time_visitante` int(11) NOT NULL,
  `data` datetime NOT NULL,
  `placar_casa` int(11) DEFAULT NULL,
  `placar_visitante` int(11) DEFAULT NULL,
  `vencedor` int(11) DEFAULT NULL,
  `empate` tinyint(1) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`),
  KEY `id_grupo` (`id_grupo`),
  KEY `id_time_casa` (`id_time_casa`),
  KEY `id_time_visitante` (`id_time_visitante`),
  KEY `vencedor` (`vencedor`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=53 ;

--
-- Extraindo dados da tabela `confronto`
--

INSERT INTO `confronto` (`id`, `id_grupo`, `id_time_casa`, `id_time_visitante`, `data`, `placar_casa`, `placar_visitante`, `vencedor`, `empate`) VALUES
(1, 1, 1, 3, '2014-06-12 17:00:00', 2, 1, 1, 0),
(2, 1, 4, 2, '2014-06-13 13:00:00', 1, 1, NULL, 1),
(3, 1, 1, 4, '2014-06-14 16:00:00', NULL, NULL, NULL, 0),
(4, 1, 2, 3, '2014-06-18 19:00:00', NULL, NULL, NULL, 0),
(5, 1, 3, 4, '2014-06-23 17:00:00', NULL, NULL, NULL, 0),
(6, 1, 2, 1, '2014-06-23 17:00:00', NULL, NULL, NULL, 0),
(7, 2, 7, 8, '2014-06-13 16:00:00', 1, 1, NULL, 1),
(8, 2, 6, 5, '2014-06-13 19:00:00', 3, 1, 6, 0),
(9, 2, 5, 8, '2014-06-18 13:00:00', NULL, NULL, NULL, 0),
(10, 2, 7, 6, '2014-06-18 16:00:00', NULL, NULL, NULL, 0),
(11, 2, 5, 7, '2014-06-23 13:00:00', NULL, NULL, NULL, 0),
(12, 2, 8, 6, '2014-06-23 13:00:00', NULL, NULL, NULL, 0),
(13, 3, 9, 11, '2014-06-14 13:00:00', 2, 3, 11, 0),
(14, 3, 10, 12, '2014-06-14 22:00:00', NULL, NULL, NULL, 0),
(15, 3, 9, 10, '2014-06-19 13:00:00', NULL, NULL, NULL, 0),
(16, 3, 12, 11, '2014-06-19 19:00:00', NULL, NULL, NULL, 0),
(17, 3, 12, 9, '2014-06-24 17:00:00', NULL, NULL, NULL, 0),
(18, 3, 11, 10, '2014-06-24 17:00:00', NULL, NULL, NULL, 0),
(19, 4, 16, 13, '2014-06-14 16:00:00', NULL, NULL, NULL, 0),
(20, 4, 14, 15, '2014-06-14 19:00:00', NULL, NULL, NULL, 0),
(21, 4, 16, 14, '2014-06-19 16:00:00', NULL, NULL, NULL, 0),
(22, 4, 15, 13, '2014-06-20 13:00:00', NULL, NULL, NULL, 0),
(23, 4, 13, 14, '2014-06-24 13:00:00', NULL, NULL, NULL, 0),
(24, 5, 20, 17, '2014-06-15 13:00:00', NULL, NULL, NULL, 0),
(25, 5, 18, 19, '2014-06-15 16:00:00', NULL, NULL, NULL, 0),
(26, 5, 20, 18, '2014-06-20 16:00:00', NULL, NULL, NULL, 0),
(27, 5, 19, 17, '2014-06-20 19:00:00', NULL, NULL, NULL, 0),
(28, 5, 19, 20, '2014-06-25 17:00:00', NULL, NULL, NULL, 0),
(29, 5, 17, 18, '2014-06-25 17:00:00', NULL, NULL, NULL, 0),
(30, 6, 21, 22, '2014-06-15 19:00:00', NULL, NULL, NULL, 0),
(31, 6, 23, 24, '2014-06-16 16:00:00', NULL, NULL, NULL, 0),
(32, 6, 21, 23, '2014-06-21 13:00:00', NULL, NULL, NULL, 0),
(33, 6, 24, 22, '2014-06-21 19:00:00', NULL, NULL, NULL, 0),
(34, 6, 24, 21, '2014-06-25 13:00:00', 1, 3, 21, 0),
(35, 6, 22, 23, '2014-06-25 13:00:00', 2, 1, 22, 0),
(36, 7, 25, 28, '2014-06-14 13:00:00', NULL, NULL, NULL, 0),
(37, 7, 27, 26, '2014-06-14 19:00:00', NULL, NULL, NULL, 0),
(38, 7, 25, 27, '2014-06-21 16:00:00', NULL, NULL, NULL, 0),
(39, 7, 26, 28, '2014-06-22 19:00:00', NULL, NULL, NULL, 0),
(40, 7, 28, 27, '2014-06-26 13:00:00', NULL, NULL, NULL, 0),
(41, 7, 26, 25, '2014-06-26 13:00:00', NULL, NULL, NULL, 0),
(42, 8, 30, 29, '2014-06-17 13:00:00', NULL, NULL, NULL, 0),
(43, 8, 32, 31, '2014-06-17 19:00:00', NULL, NULL, NULL, 0),
(44, 8, 30, 32, '2014-06-22 13:00:00', NULL, NULL, NULL, 0),
(45, 8, 31, 29, '2014-06-22 16:00:00', NULL, NULL, NULL, 0),
(46, 8, 29, 32, '2014-06-26 17:00:00', NULL, NULL, NULL, 0),
(47, 8, 31, 30, '2014-06-26 17:00:00', NULL, NULL, NULL, 0),
(48, 9, 33, 34, '2014-06-08 16:00:00', NULL, NULL, 1, 0),
(49, 10, 1, 6, '2014-06-28 13:00:00', 2, 1, 1, 0),
(50, 10, 9, 16, '2014-06-28 17:00:00', 3, 1, 9, 0),
(51, 10, 8, 4, '2014-06-29 13:00:00', NULL, NULL, 1, 0),
(52, 10, 13, 11, '2014-06-29 17:00:00', NULL, NULL, 1, 0);

-- --------------------------------------------------------

--
-- Estrutura da tabela `grupo`
--

CREATE TABLE IF NOT EXISTS `grupo` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nome` varchar(1) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=11 ;

--
-- Extraindo dados da tabela `grupo`
--

INSERT INTO `grupo` (`id`, `nome`) VALUES
(1, 'a'),
(2, 'b'),
(3, 'c'),
(4, 'd'),
(5, 'e'),
(6, 'f'),
(7, 'g'),
(8, 'h'),
(9, '1'),
(10, '8');

-- --------------------------------------------------------

--
-- Estrutura da tabela `grupo_time`
--

CREATE TABLE IF NOT EXISTS `grupo_time` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_grupo` int(11) NOT NULL,
  `id_time` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `id_grupo` (`id_grupo`),
  KEY `id_time` (`id_time`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=43 ;

--
-- Extraindo dados da tabela `grupo_time`
--

INSERT INTO `grupo_time` (`id`, `id_grupo`, `id_time`) VALUES
(2, 1, 1),
(3, 1, 2),
(4, 1, 3),
(5, 1, 4),
(6, 2, 5),
(7, 2, 6),
(8, 2, 7),
(9, 2, 8),
(10, 3, 9),
(11, 3, 10),
(12, 3, 11),
(13, 3, 12),
(14, 4, 13),
(15, 4, 14),
(16, 4, 15),
(17, 4, 16),
(18, 5, 17),
(19, 5, 18),
(20, 5, 19),
(21, 5, 20),
(22, 6, 21),
(23, 6, 22),
(24, 6, 23),
(25, 6, 24),
(26, 7, 25),
(27, 7, 26),
(28, 7, 27),
(29, 7, 28),
(30, 8, 29),
(31, 8, 30),
(32, 8, 31),
(33, 8, 32),
(34, 9, 33),
(35, 9, 34),
(36, 10, 1),
(37, 10, 4),
(38, 10, 8),
(39, 10, 13),
(40, 10, 9),
(41, 10, 11),
(42, 10, 6);

-- --------------------------------------------------------

--
-- Estrutura da tabela `poke`
--

CREATE TABLE IF NOT EXISTS `poke` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nome` varchar(100) DEFAULT NULL,
  `foto` varchar(100) DEFAULT NULL,
  `numero` int(11) DEFAULT NULL,
  `pego` tinyint(1) NOT NULL,
  `onde` varchar(50) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=42 ;

--
-- Extraindo dados da tabela `poke`
--

INSERT INTO `poke` (`id`, `nome`, `foto`, `numero`, `pego`, `onde`) VALUES
(1, 'Starly', '396.png', 396, 0, 'filho do Staravia'),
(2, 'Staraptor', '398.png', 398, 0, 'Evoluir Staravia 34'),
(3, 'Kricketot', '401.png', 401, 0, 'Transferir'),
(4, 'Kricketune', '402.png', 402, 0, 'Transferir ou evolui o Kricketot 10'),
(5, 'Shinx', '403.png', 403, 0, 'Breed Luxio'),
(6, 'Luxio', '404.png', 404, 0, 'Friend Safari'),
(7, 'Luxray', '405.png', 405, 0, 'Evolve Luxio 30'),
(8, 'Budew', '406.png', 406, 0, 'Route 4'),
(9, 'Roserade', '407.png', 407, 0, 'Evolve Roselia Shiny Stone'),
(10, 'Cranidos', '408.png', 408, 0, 'Revive Skull Fossil'),
(11, 'Rampardos', '409.png', 409, 0, 'Evolve Cranidos'),
(12, 'Shieldon', '410.png', 410, 0, 'Revive Armor Fossil'),
(13, 'Bastiodon', '411.png', 411, 0, 'Evolve Shieldon 30'),
(14, 'Wormadam', '413.png', 413, 0, 'Evolve Burmy Femea 20'),
(15, 'Mothim', '414.png', 414, 0, 'Evolve Burmy Macho 20'),
(16, 'Combee', '415.png', 415, 0, 'Route 4 Friend Safari'),
(17, 'Vespiquen', '416.png', 416, 0, 'Evolve Combee Femea 21'),
(18, 'Buizel', '418.png', 418, 0, 'Breed Floatzel'),
(19, 'Cherubi', '420.png', 420, 0, 'Transfer required'),
(20, 'Cherrim', '421.png', 421, 0, 'Transfer required'),
(21, 'Shellos', '422.png', 422, 0, 'Breed Gastrodon'),
(22, 'Gastrodon', '423.png', 423, 0, 'Friend Safari'),
(23, 'Ambipom', '424.png', 424, 0, 'Evolve Aipom att Double Hit'),
(24, 'Drifblim', '426.png', 426, 0, 'Evolve Drifloon 28 Friend Safari'),
(25, 'Buneary', '427.png', 427, 0, 'Transfer required'),
(26, 'Lopunny', '428.png', 428, 0, 'Transfer required'),
(27, 'Mismagius', '429.png', 429, 0, 'Transfer required ou  Dusk Stone'),
(28, 'Honchkrow', '430.png', 430, 0, 'Evolve Murkrow Dusk Stone'),
(29, 'Glameow', '431.png', 431, 0, 'Transfer required'),
(30, 'Purugly', '432.png', 432, 0, 'Envolve Glameow 38'),
(31, 'Chingling', '433.png', 433, 0, 'Route 11, Reflection Cave'),
(32, 'Skuntank', '435.png', 435, 0, 'Evolve Stunky 34'),
(33, 'Bronzor', '436.png', 436, 0, 'Breed Bronzor'),
(34, 'Bronzong', '437.png', 437, 0, 'Friend Safari'),
(35, 'Bonsly', '438.png', 438, 0, 'Breed Sudowoodo com Rock Incense'),
(36, 'Mime Jr.', '439.png', 439, 0, 'Reflection Cave breed Mr Mine com Odd Incense'),
(37, 'Happiny', '440.png', 440, 0, 'Breed Chansey Com Luck Incense'),
(38, 'Spiritomb', '442.png', 442, 0, 'Friend Safari'),
(39, 'Garchomp', '445.png', 445, 0, 'Evolve Gabite 48'),
(40, 'Munchlax', '446.png', 446, 0, 'Breed Snorlax Full Incesne'),
(41, 'Hippowdon', '450.png', 450, 0, 'Evolve Hippopotas 34');

-- --------------------------------------------------------

--
-- Estrutura da tabela `pontos`
--

CREATE TABLE IF NOT EXISTS `pontos` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `tipo` varchar(11) NOT NULL,
  `pontos` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

--
-- Extraindo dados da tabela `pontos`
--

INSERT INTO `pontos` (`id`, `tipo`, `pontos`) VALUES
(1, 'exato', 3),
(2, 'vitoria', 2),
(3, 'exato8', 5),
(4, 'vitoria8', 3);

-- --------------------------------------------------------

--
-- Estrutura da tabela `rank`
--

CREATE TABLE IF NOT EXISTS `rank` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_user` int(11) NOT NULL,
  `data` datetime NOT NULL,
  `id_aposta` int(11) NOT NULL,
  `id_ponto` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `id_user` (`id_user`),
  KEY `id_aposta` (`id_aposta`),
  KEY `id_ponto` (`id_ponto`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=21 ;

--
-- Extraindo dados da tabela `rank`
--

INSERT INTO `rank` (`id`, `id_user`, `data`, `id_aposta`, `id_ponto`) VALUES
(10, 1, '2014-06-07 02:27:18', 17, 1),
(11, 1, '2014-06-07 02:27:32', 18, 2),
(12, 1, '2014-06-07 02:27:44', 19, 2),
(13, 1, '2014-06-07 02:28:07', 20, 2),
(14, 2, '2014-06-15 00:00:00', 17, 1),
(15, 2, '2014-06-15 00:00:00', 18, 1),
(16, 2, '2014-06-15 00:00:00', 19, 1),
(17, 1, '2014-06-24 23:06:12', 33, 1),
(18, 1, '2014-06-24 23:06:53', 32, 2),
(19, 1, '2014-06-24 23:07:07', 40, 3),
(20, 1, '2014-06-24 23:07:51', 41, 4);

-- --------------------------------------------------------

--
-- Estrutura da tabela `tbl_user`
--

CREATE TABLE IF NOT EXISTS `tbl_user` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(100) NOT NULL,
  `password` varchar(20) NOT NULL,
  `email` varchar(100) NOT NULL,
  `senha` tinyint(1) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=13 ;

--
-- Extraindo dados da tabela `tbl_user`
--

INSERT INTO `tbl_user` (`id`, `username`, `password`, `email`, `senha`) VALUES
(1, 'diego', 'di140984', 'dieos2@gmail.com', 1),
(2, 'emmely', 'emmely', '', 1),
(3, 'thiago', 'thiago', '', 0),
(4, 'michel', 'michel', '', 0),
(5, 'fernanda', 'fernanda', '', 0),
(6, 'fabio', 'fabio', '', 0),
(7, 'wellington', 'wellington', '', 0),
(8, 'alean', 'alean', '', 0),
(9, 'bruno', 'bruno', '', 0),
(10, 'baranga', 'baranga', '', 0),
(11, 'jessica', 'jessica', '', 0),
(12, 'eunilde', 'eunilde', '', 0);

-- --------------------------------------------------------

--
-- Estrutura da tabela `time`
--

CREATE TABLE IF NOT EXISTS `time` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nome` varchar(100) NOT NULL,
  `escudo` varchar(100) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=35 ;

--
-- Extraindo dados da tabela `time`
--

INSERT INTO `time` (`id`, `nome`, `escudo`) VALUES
(1, 'Brasil', 'brasil.png'),
(2, 'Camarões', 'camaroes.png'),
(3, 'Croacia', 'croacia.png'),
(4, 'Mexico', 'mexico.png'),
(5, 'Australia', 'australia.png'),
(6, 'Chile', 'chile.png'),
(7, 'Espanha', 'espanha.png'),
(8, 'Holanda', 'holanda.png'),
(9, 'Colombia', 'colombia.png'),
(10, 'Costa do marfim', 'costa-do-marfim.png'),
(11, 'Grecia', 'grecia.png'),
(12, 'Japão', 'japao.png'),
(13, 'Costa Rica', 'costa-rica.png'),
(14, 'Inglaterra', 'inglaterra.png'),
(15, 'Italia', 'italia.png'),
(16, 'Uruguai', 'uruguai.png'),
(17, 'Equador', 'equador.png'),
(18, 'França', 'franca.png'),
(19, 'Honduras', 'honduras.png'),
(20, 'Suiça', 'suica.png'),
(21, 'Argentina', 'argentina.png'),
(22, 'Bosnia', 'bosnia-herzegovina.png'),
(23, 'Irã', 'ira.png'),
(24, 'Nigeria', 'nigeria.png'),
(25, 'Alemanha', 'alemanha.png'),
(26, 'Estados Unidos', 'estados-unidos.png'),
(27, 'Gana', 'gana.png'),
(28, 'Portugal', 'portugal.png'),
(29, 'Argelia', 'argelia.png'),
(30, 'Belgica', 'belgica.png'),
(31, 'Coreia do Sul', 'coreia-do-sul.png'),
(32, 'Russia', 'russia.png'),
(33, 'Paysandu', 'paysandu.gif'),
(34, 'Remo', 'remo.jpg');

--
-- Constraints for dumped tables
--

--
-- Limitadores para a tabela `aposta`
--
ALTER TABLE `aposta`
  ADD CONSTRAINT `aposta_ibfk_1` FOREIGN KEY (`id_confronto`) REFERENCES `confronto` (`id`),
  ADD CONSTRAINT `aposta_ibfk_2` FOREIGN KEY (`id_user`) REFERENCES `tbl_user` (`id`);

--
-- Limitadores para a tabela `confronto`
--
ALTER TABLE `confronto`
  ADD CONSTRAINT `confronto_ibfk_1` FOREIGN KEY (`id_grupo`) REFERENCES `grupo` (`id`),
  ADD CONSTRAINT `confronto_ibfk_2` FOREIGN KEY (`id_time_casa`) REFERENCES `time` (`id`),
  ADD CONSTRAINT `confronto_ibfk_3` FOREIGN KEY (`id_time_visitante`) REFERENCES `time` (`id`),
  ADD CONSTRAINT `confronto_ibfk_4` FOREIGN KEY (`vencedor`) REFERENCES `time` (`id`);

--
-- Limitadores para a tabela `grupo_time`
--
ALTER TABLE `grupo_time`
  ADD CONSTRAINT `grupo_time_ibfk_1` FOREIGN KEY (`id_grupo`) REFERENCES `grupo` (`id`),
  ADD CONSTRAINT `grupo_time_ibfk_2` FOREIGN KEY (`id_time`) REFERENCES `time` (`id`);

--
-- Limitadores para a tabela `rank`
--
ALTER TABLE `rank`
  ADD CONSTRAINT `rank_ibfk_1` FOREIGN KEY (`id_user`) REFERENCES `tbl_user` (`id`),
  ADD CONSTRAINT `rank_ibfk_2` FOREIGN KEY (`id_aposta`) REFERENCES `aposta` (`id`),
  ADD CONSTRAINT `rank_ibfk_3` FOREIGN KEY (`id_ponto`) REFERENCES `pontos` (`id`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

-- phpMyAdmin SQL Dump
-- version 4.7.9
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: 30-Maio-2019 às 00:37
-- Versão do servidor: 5.7.21
-- PHP Version: 5.6.35

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `bolao`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `aposta`
--

DROP TABLE IF EXISTS `aposta`;
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
) ENGINE=InnoDB AUTO_INCREMENT=712 DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `aposta`
--

INSERT INTO `aposta` (`id`, `id_confronto`, `id_user`, `data`, `placar_casa`, `placar_visitante`) VALUES
(711, 106, 1, '2019-05-29 21:03:31', 2, 0);

-- --------------------------------------------------------

--
-- Estrutura da tabela `confronto`
--

DROP TABLE IF EXISTS `confronto`;
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
) ENGINE=InnoDB AUTO_INCREMENT=124 DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `confronto`
--

INSERT INTO `confronto` (`id`, `id_grupo`, `id_time_casa`, `id_time_visitante`, `data`, `placar_casa`, `placar_visitante`, `vencedor`, `empate`) VALUES
(106, 1, 51, 67, '2019-06-14 21:30:00', NULL, NULL, 38, 0),
(107, 1, 68, 45, '2019-06-15 16:00:00', NULL, NULL, 38, 0),
(108, 2, 47, 64, '2019-06-15 19:00:00', NULL, NULL, 38, 0),
(109, 2, 70, 69, '2019-06-16 16:00:00', NULL, NULL, 38, 0),
(110, 3, 38, 72, '2019-06-16 19:00:00', NULL, NULL, 38, 0),
(111, 3, 65, 71, '2019-06-17 20:00:00', NULL, NULL, 38, 0),
(112, 1, 67, 45, '2019-06-18 18:30:00', NULL, NULL, 38, 0),
(113, 1, 51, 68, '2019-06-18 21:30:00', NULL, NULL, 38, 0),
(114, 2, 64, 69, '2019-06-19 18:30:00', NULL, NULL, 38, 0),
(115, 2, 47, 70, '2019-06-19 21:30:00', NULL, NULL, 38, 0),
(116, 3, 38, 65, '2019-06-20 20:00:00', NULL, NULL, 38, 0),
(117, 3, 72, 71, '2019-06-21 20:00:00', NULL, NULL, 38, 0),
(118, 1, 45, 51, '2019-06-22 16:00:00', NULL, NULL, 38, 0),
(119, 1, 67, 68, '2019-06-22 16:00:00', NULL, NULL, 38, 0),
(120, 2, 69, 47, '2019-06-23 16:00:00', NULL, NULL, 38, 0),
(121, 2, 64, 70, '2019-06-23 16:00:00', NULL, NULL, 38, 0),
(122, 3, 71, 38, '2019-06-24 20:00:00', NULL, NULL, 38, 0),
(123, 3, 72, 65, '2019-06-24 20:00:00', NULL, NULL, 38, 0);

-- --------------------------------------------------------

--
-- Estrutura da tabela `grupo`
--

DROP TABLE IF EXISTS `grupo`;
CREATE TABLE IF NOT EXISTS `grupo` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nome` varchar(1) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=15 DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `grupo`
--

INSERT INTO `grupo` (`id`, `nome`) VALUES
(1, 'a'),
(2, 'b'),
(3, 'c'),
(11, 'F'),
(12, 'S'),
(13, '3'),
(14, 'Q');

-- --------------------------------------------------------

--
-- Estrutura da tabela `grupo_time`
--

DROP TABLE IF EXISTS `grupo_time`;
CREATE TABLE IF NOT EXISTS `grupo_time` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_grupo` int(11) NOT NULL,
  `id_time` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `id_grupo` (`id_grupo`),
  KEY `id_time` (`id_time`)
) ENGINE=InnoDB AUTO_INCREMENT=75 DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estrutura da tabela `poke`
--

DROP TABLE IF EXISTS `poke`;
CREATE TABLE IF NOT EXISTS `poke` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nome` varchar(100) DEFAULT NULL,
  `foto` varchar(100) DEFAULT NULL,
  `numero` int(11) DEFAULT NULL,
  `pego` tinyint(1) NOT NULL,
  `onde` varchar(50) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=42 DEFAULT CHARSET=latin1;

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

DROP TABLE IF EXISTS `pontos`;
CREATE TABLE IF NOT EXISTS `pontos` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `tipo` varchar(11) NOT NULL,
  `pontos` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `pontos`
--

INSERT INTO `pontos` (`id`, `tipo`, `pontos`) VALUES
(1, 'exato', 3),
(2, 'vitoria', 1),
(3, 'exato8', 6),
(4, 'vitoria8', 2),
(5, 'extato4', 9),
(6, 'vitoria4', 4),
(7, 'exatosemi', 12),
(8, 'vitoriasemi', 6),
(9, 'exatoFinal', 15),
(10, 'vitoriaFina', 8);

-- --------------------------------------------------------

--
-- Estrutura da tabela `posicao`
--

DROP TABLE IF EXISTS `posicao`;
CREATE TABLE IF NOT EXISTS `posicao` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_user` int(11) NOT NULL,
  `antiga` int(11) NOT NULL,
  `atual` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `id_user` (`id_user`)
) ENGINE=InnoDB AUTO_INCREMENT=247 DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `posicao`
--

INSERT INTO `posicao` (`id`, `id_user`, `antiga`, `atual`) VALUES
(229, 1, 6, 6),
(230, 3, 18, 18),
(231, 4, 13, 13),
(232, 6, 9, 9),
(233, 8, 3, 3),
(234, 9, 5, 5),
(235, 12, 15, 15),
(236, 13, 11, 11),
(237, 15, 16, 16),
(238, 16, 4, 4),
(239, 17, 10, 10),
(240, 18, 8, 8),
(241, 19, 2, 2),
(242, 20, 7, 7),
(243, 21, 17, 17),
(244, 22, 14, 14),
(245, 23, 1, 1),
(246, 25, 12, 12);

-- --------------------------------------------------------

--
-- Estrutura da tabela `rank`
--

DROP TABLE IF EXISTS `rank`;
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
) ENGINE=InnoDB AUTO_INCREMENT=786 DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estrutura da tabela `tbl_user`
--

DROP TABLE IF EXISTS `tbl_user`;
CREATE TABLE IF NOT EXISTS `tbl_user` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(100) NOT NULL,
  `password` varchar(20) NOT NULL,
  `email` varchar(100) NOT NULL,
  `senha` tinyint(1) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=26 DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `tbl_user`
--

INSERT INTO `tbl_user` (`id`, `username`, `password`, `email`, `senha`) VALUES
(1, 'diego', 'di140984', 'dieos2@gmail.com', 1),
(3, 'thiago', 'thiago', '', 1),
(4, 'michel', '050886', '', 1),
(6, 'fabio', 'fa601792', '', 1),
(8, 'alean', 'alean2', '', 1),
(9, 'bruno', '2512', '', 1),
(12, 'nilde', 'nilde', '', 1),
(13, 'iran', 'iran', '', 1),
(15, 'rodrigo', '30310612', '', 1),
(16, 'andre', 'andre', '', 1),
(17, 'gabriel', 'gabriel2512', '', 1),
(18, 'fabiane', 'fabrus', '', 1),
(19, 'alberto', '231267', '', 1),
(20, 'eriko', 'mama2006', '', 1),
(21, 'rufino', '210693', '', 1),
(22, 'myrla', 'my601792', '', 1),
(23, 'alan', 'bota', '', 1),
(25, 'jesse', 'openow', '', 1);

-- --------------------------------------------------------

--
-- Estrutura da tabela `time`
--

DROP TABLE IF EXISTS `time`;
CREATE TABLE IF NOT EXISTS `time` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nome` varchar(100) NOT NULL,
  `escudo` varchar(100) NOT NULL,
  `nomeOriginal` varchar(20) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=73 DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `time`
--

INSERT INTO `time` (`id`, `nome`, `escudo`, `nomeOriginal`) VALUES
(38, 'Uruguai', 'uruguai.png', 'Uruguay'),
(45, 'Peru', 'peru.png', 'Peru'),
(47, 'Argentina', 'argentina.png', 'Argentina'),
(51, 'Brasil', 'brasil.png', 'Brazil'),
(64, 'Colômbia', 'colombia.png', 'Colombia'),
(65, 'Japão', 'japao.png', 'Japan'),
(67, 'Bolivia', 'bolivia.jpg', 'bolivia'),
(68, 'Venezuela', 'venezuela.jpg', NULL),
(69, 'Catar', 'catar.jpg', NULL),
(70, 'Paraguai', 'paraguai.jpg', NULL),
(71, 'Chile', 'chile.jpg', NULL),
(72, 'Equador', 'equador.jpg', NULL);

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
-- Limitadores para a tabela `posicao`
--
ALTER TABLE `posicao`
  ADD CONSTRAINT `posicao_ibfk_1` FOREIGN KEY (`id_user`) REFERENCES `tbl_user` (`id`);

--
-- Limitadores para a tabela `rank`
--
ALTER TABLE `rank`
  ADD CONSTRAINT `rank_ibfk_1` FOREIGN KEY (`id_user`) REFERENCES `tbl_user` (`id`),
  ADD CONSTRAINT `rank_ibfk_2` FOREIGN KEY (`id_aposta`) REFERENCES `aposta` (`id`),
  ADD CONSTRAINT `rank_ibfk_3` FOREIGN KEY (`id_ponto`) REFERENCES `pontos` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

-- phpMyAdmin SQL Dump
-- version 4.9.5
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Aug 24, 2021 at 05:59 PM
-- Server version: 5.7.24
-- PHP Version: 7.4.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `espace_membres`
--

-- --------------------------------------------------------

--
-- Table structure for table `acteurs`
--

CREATE TABLE `acteurs` (
  `id` int(11) NOT NULL,
  `acteur` varchar(255) NOT NULL,
  `contenu` text NOT NULL,
  `image_url` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `acteurs`
--

INSERT INTO `acteurs` (`id`, `acteur`, `contenu`, `image_url`) VALUES
(1, 'Formation&Co', '<h2><span style=\"text-decoration: red underline;\" >Formation&co</span></h2>\r\n            <a href=\"https://www.Formation&co.com\">Visiter le site</a>\r\n            <p>Formation&co est une association française présente sur tout le territoire.\r\n                Nous proposons à des personnes issues de tout milieu de devenir entrepreneur grâce à un crédit et un accompagnement professionnel et personnalisé.\r\n                Notre proposition :\r\n            </p>\r\n            <ul>\r\n                <li> un financement jusqu’à 30 000€ ;</li>\r\n                <li> un suivi personnalisé et gratuit ;</li>\r\n                <li> une lutte acharnée contre les freins sociétaux et les stéréotypes.</li>\r\n            </ul>\r\n            <p>\r\n                Le financement est possible, peu importe le métier : coiffeur, banquier, éleveur de chèvres…\r\n                Nous collaborons avec des personnes talentueuses et motivées.\r\n                Vous n’avez pas de diplômes ? Ce n’est pas un problème pour nous ! Nos financements s’adressent à tous.\r\n            </p>', 'img/formation_co.png'),
(2, 'Protectpeople', '<h2><span style=\"text-decoration: red underline;\" >Protectpeople</span></h2>\r\n            <a href=\"https://www.Protectpeople.com\">Visiter le site</a>\r\n            \r\n                <p>Protectpeople finance la solidarité nationale.\r\n                    Nous appliquons le principe édifié par la Sécurité sociale française en 1945 : permettre à chacun de bénéficier d’une protection sociale. \r\n                </p>\r\n                <p>\r\n                    Chez Protectpeople, chacun cotise selon ses moyens et reçoit selon ses besoins.\r\n                    Protecpeople est ouvert à tous, sans considération d’âge ou d’état de santé.\r\n                    Nous garantissons un accès aux soins et une retraite.\r\n                    Chaque année, nous collectons et répartissons 300 milliards d’euros.\r\n                    Notre mission est double :\r\n                </p>\r\n                <ul>\r\n                    <li>\r\n                    sociale : nous garantissons la fiabilité des données sociales ;</li>\r\n                    <li>économique : nous apportons une contribution aux activités économiques.</li>\r\n                </ul>', 'img/protectpeople.png'),
(3, 'DSA France', '<h2><span style=\"text-decoration: red underline;\" >Dsa France</span></h2>\r\n            <a href=\"https://www.DsaFrance.haha\">Visiter le site</a>\r\n            <p>Dsa France accélère la croissance du territoire et s’engage avec les collectivités territoriales.\r\n                Nous accompagnons les entreprises dans les étapes clés de leur évolution.\r\n                Notre philosophie : s’adapter à chaque entreprise.\r\n                Nous les accompagnons pour voir plus grand et plus loin et proposons des solutions de financement adaptées à chaque étape de la vie des entreprises.\r\n            </p>', 'img/Dsa_france.png'),
(4, 'CDE', '<h2><span style=\"text-decoration: red underline;\" >La CDE</span></h2>\r\n            <a href=\"https://www.CDE.haha\">Visiter le site</a>\r\n            <p>La CDE (Chambre Des Entrepreneurs) accompagne les entreprises dans leurs démarches de formation. \r\n               Son président est élu pour 3 ans par ses pairs, chefs d’entreprises et présidents des CDE.\r\n           </p>', 'img/CDE.png');

-- --------------------------------------------------------

--
-- Table structure for table `commentaires`
--

CREATE TABLE `commentaires` (
  `id` int(11) NOT NULL,
  `id_membre` int(11) NOT NULL,
  `id_acteur` int(11) NOT NULL,
  `date_commentaire` datetime NOT NULL,
  `commentaire` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `commentaires`
--

INSERT INTO `commentaires` (`id`, `id_membre`, `id_acteur`, `date_commentaire`, `commentaire`) VALUES
(9, 21, 1, '2021-08-21 23:22:45', 'testtttt'),
(10, 21, 2, '2021-08-21 23:24:36', 'tesssstttt'),
(11, 22, 2, '2021-08-21 23:28:58', 'retestkira'),
(12, 22, 1, '2021-08-21 23:29:43', 'fdgsdgf'),
(13, 23, 1, '2021-08-22 16:17:35', 'aaaaaaaaaaaaaaaaaaaaaaaaaaaaaaa'),
(14, 23, 4, '2021-08-22 17:00:24', 'test en direct');

-- --------------------------------------------------------

--
-- Table structure for table `dislikes`
--

CREATE TABLE `dislikes` (
  `id_dislike` int(11) NOT NULL,
  `id_acteur` int(11) NOT NULL,
  `id_membre` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `dislikes`
--

INSERT INTO `dislikes` (`id_dislike`, `id_acteur`, `id_membre`) VALUES
(2, 2, 24);

-- --------------------------------------------------------

--
-- Table structure for table `likes`
--

CREATE TABLE `likes` (
  `id_like` int(11) NOT NULL,
  `id_acteur` int(11) NOT NULL,
  `id_membre` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `likes`
--

INSERT INTO `likes` (`id_like`, `id_acteur`, `id_membre`) VALUES
(5, 1, 24);

-- --------------------------------------------------------

--
-- Table structure for table `membres`
--

CREATE TABLE `membres` (
  `id` int(11) NOT NULL,
  `nom` varchar(255) NOT NULL,
  `prenom` varchar(255) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(250) NOT NULL,
  `question` varchar(255) NOT NULL,
  `reponse` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `membres`
--

INSERT INTO `membres` (`id`, `nom`, `prenom`, `username`, `password`, `question`, `reponse`) VALUES
(21, 'Perrin', 'Kevin', 'Shazy', '$2y$10$QP87iBv9/xdcTxIbMUfwY.jC4s4j/gNTZhuJhxYTThrY1ytyoi59e', 'coucou ?', 'coucou'),
(22, 'Perrin', 'Cora', 'Kira', '$2y$10$ILFTWww6imIzUY8WseCLv.hbDWEttQD95oTwqOA6H5GPbqHfkr/UK', 'yo', 'yo'),
(23, 'sdfqs', 'sdfqsdf', 'aaa', '$2y$10$A8MDRjFi6WZQyFNbRd/Ua.4ZlUO4PEB2paZrvJ4N9AflALnNFg9Q.', 'aaa', 'aaa'),
(24, 'derniertest', 'derniertest', 'Shazytest', '$2y$10$jliLJoA1eyIH837oTmgX1uiRLi2Xhsai2s8DRx28KEuZ8AvGHUj.S', 'yo', 'yo');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `acteurs`
--
ALTER TABLE `acteurs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `commentaires`
--
ALTER TABLE `commentaires`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_commentaires_acteurs` (`id_acteur`),
  ADD KEY `fk_commentaires_membres` (`id_membre`);

--
-- Indexes for table `dislikes`
--
ALTER TABLE `dislikes`
  ADD PRIMARY KEY (`id_dislike`),
  ADD KEY `fk_dislikes_acteurs` (`id_acteur`),
  ADD KEY `fk_dislikes_membre` (`id_membre`);

--
-- Indexes for table `likes`
--
ALTER TABLE `likes`
  ADD PRIMARY KEY (`id_like`),
  ADD KEY `fk_likes_acteurs` (`id_acteur`),
  ADD KEY `fk_likes_membre` (`id_membre`);

--
-- Indexes for table `membres`
--
ALTER TABLE `membres`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `acteurs`
--
ALTER TABLE `acteurs`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `commentaires`
--
ALTER TABLE `commentaires`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `dislikes`
--
ALTER TABLE `dislikes`
  MODIFY `id_dislike` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `likes`
--
ALTER TABLE `likes`
  MODIFY `id_like` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `membres`
--
ALTER TABLE `membres`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `dislikes`
--
ALTER TABLE `dislikes`
  ADD CONSTRAINT `fk_dislikes_acteurs` FOREIGN KEY (`id_acteur`) REFERENCES `acteurs` (`id`),
  ADD CONSTRAINT `fk_dislikes_membre` FOREIGN KEY (`id_membre`) REFERENCES `membres` (`id`);

--
-- Constraints for table `likes`
--
ALTER TABLE `likes`
  ADD CONSTRAINT `fk_likes_acteurs` FOREIGN KEY (`id_acteur`) REFERENCES `acteurs` (`id`),
  ADD CONSTRAINT `fk_likes_membre` FOREIGN KEY (`id_membre`) REFERENCES `membres` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

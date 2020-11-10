-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le : mar. 10 nov. 2020 à 14:54
-- Version du serveur :  5.7.31
-- Version de PHP : 7.3.21

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `stuliday`
--

-- --------------------------------------------------------

--
-- Structure de la table `adverts`
--

DROP TABLE IF EXISTS `adverts`;
CREATE TABLE IF NOT EXISTS `adverts` (
  `ad_id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `content` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `address` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `city` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `price` int(11) NOT NULL,
  `images` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `author` int(11) NOT NULL,
  PRIMARY KEY (`ad_id`),
  KEY `author_fk` (`author`)
) ENGINE=InnoDB AUTO_INCREMENT=31 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `adverts`
--

INSERT INTO `adverts` (`ad_id`, `title`, `content`, `address`, `city`, `price`, `images`, `author`) VALUES
(20, 'La petite maison dans la prairie', 'Gites de charme. Sur le plateau de la Margeride, situÃ©e Ã  1100m d\' alt, ancien four Ã  pain de 50m2 en pierre et lauze entiÃ¨rement rÃ©novÃ© et proche du lac de Ganivet(pÃªche et baignade) 10mn Ã  pied, Ã©tang privÃ©.\r\nIdÃ©al pour le repos, les randonnÃ©es, les activitÃ©s de plein air, la cueillette de cÃ¨pes, le ski nordique. Visite de la rÃ©serve des bisons d Europe et des loups du GÃ©vaudan etc\r\n\"', 'Occitanie', 'Saint Gal', 164, '', 3),
(21, 'Trewalter, Couples Treehouse in the Brecon Beacons', 'Deep in the heart of the Brecon Beacons, one of the most popular hiking destinations in Europe, you\'ll find Trewalter Treehouse, a luxurious gem set against a rugged and dramatic natural backdrop. This stunning structure is perfect for a romantic getaway, and is the most sumptuous of treehouses you\'ll have ever set eyes upon. Set in four acres of lush Neolithic landscape, on the land of the historic Trewalter House, this cedar snuggery is nestled into the side of an ancient woodland.', 'Pays de galles', 'Powys', 164, '', 3),
(22, 'Mobilheim fÃ¼r 4 GÃ¤ste mit 32mÂ² in Biograd na Moru ', 'BettwÃ¤sche, Hand-/BadetÃ¼cher, GeschirrtÃ¼cher nicht inklusive! Diese nehmen Sie bitte selbst mit.\r\nWÃ¤schepaket (BettwÃ¤sche, HandtÃ¼cher, 2 GeschirrtÃ¼cher) kann vor Ort (gegen GebÃ¼hr) geliehen werden.\r\nMietpreis: Doppelbett 15,00 â‚¬; je Einzelbett 10,00 â‚¬ sowie pro Wechsel', 'Zadarska zupanija Croatie', 'Biograd na Moru', 164, '', 3),
(26, 'SÃ©jour Ã  bord dâ€™un voilier type Studio gosier', 'Logement insolite Ã  quai sur un voilier de 9,2 mÃ¨tres tout confort.\r\nDouchage aux sanitaires du port.\r\nPour plus dâ€™informations, nâ€™hÃ©sitez pas Ã  me contacter .ðŸ˜', 'Gosier - Guadeloupe', 'Pointe-Ã -Pitre', 164, '', 3),
(28, 'SaarÃ³wka', 'Absolutne oderwanie od zgieÅ‚ku cywilizacji, cisza przerywana klangorem Å¼urawi i rechotem Å¼ab w pobliskim stawie. Chatka (35m2) oddalona od asfaltu ok. kilometra, tu koÅ„czy siÄ™ droga. Do najbliÅ¼szej wsi ok. 2 km, do sklepu 3 km, a do jeziora 4 km. Dziki staw widaÄ‡ przez okno antresoli. BÅ‚ogi spokÃ³j natury leczy od codziennej gonitwy, tu, w Å›rodku niczego znajduje siÄ™ \'sanatorium\' SaarÃ³wka.\r\n', 'Warmian Masurian Voivodeship, Pologne', 'Surmowka', 78, '', 3),
(29, 'Ã‰choppe bordelaise 10 min Ã  pied du centre ville', 'Echoppe bordelaise dans le quartier de BergoniÃ© Ã  10 min Ã  pied de la place de la victoire. 25 min Ã  pied de l\'hyper-centre (miroir d\'eau) . AccÃ¨s au tram B (station bergoniÃ© Ã  5 min), carrefour city Ã  5 min. Il ya une chambre avec un lit double et un salon avec un canapÃ© et un matelas gonflable pour 2 personne au sol. La cheminÃ©e est fonctionnelle. Il y a un petit jardinet avec un espace dÃ©tente et un espace table. Il y a toujours de la place pour se garer dans la rue.\"', 'Nouvelle aquitaine', 'Bordeaux', 90, '', 6),
(30, 'Ð¡ÐºÐ°Ð·Ð¾Ñ‡Ð½Ñ‹Ð¹ Ð´Ð¾Ð¼Ð¸Ðº', 'Ð¡ÐºÐ°Ð·Ð¾Ñ‡Ð½Ñ‹Ð¹ Ð´Ð¾Ð¼Ð¸Ðº Ð² Ð»ÐµÑÑƒ^50 ÑÐ¾Ñ‚Ð¾Ðº. Ð“Ñ€Ð¸Ð»ÑŒ Ð´Ð¾Ð¼Ð¸Ðº, Ð±Ð°Ð½Ñ Ð´Ñ€Ð¾Ð²ÑÐ½Ð°Ñ - Ð²Ð¾Ð¹Ð»Ð¾Ñ‡Ð½Ð°Ñ Ð¸ Ð±Ð°Ð½Ñ-Ð±Ð¾Ñ‡ÐºÐ° ÑÐ»ÐµÐºÑ‚Ñ€Ð¸Ñ‡ÐµÑÐºÐ°Ñ Ð² Ð»ÐµÑÑƒ, Ñ ÐºÑƒÐ¿ÐµÐ»ÑŒÑŽ Ð½Ð° Ñ†ÐµÐ¿ÑÑ…, Ð¿Ð¾Ð´Ð¾Ð³Ñ€ÐµÐ²Ð°ÐµÑ‚ÑÑ ÐºÐ¾ÑÑ‚Ñ€Ð¾Ð¼. Ð“Ð¾ÑÑ‚ÐµÐ²Ð¾Ð¹ Ð´Ð¾Ð¼Ð¸Ðº. Ð‘Ð°Ð½Ð½Ñ‹Ð¹ Ð´Ð¾Ð¼Ð¸Ðº. Ð”ÐµÑ‚ÑÐºÐ¸Ð¹ Ð´Ð¾Ð¼Ð¸Ðº Ð½Ð° Ð´ÐµÑ€ÐµÐ²ÑŒÑÑ…. 4 ÑÐ¿Ð°Ð»ÑŒÐ½Ð¸ Ð² Ð´Ð¾Ð¼Ðµ, 3 Ð² Ð´Ñ€ Ð´Ð¾Ð¼Ð¸ÐºÐ°Ñ….', 'Moscow Oblast, Russie', 'ÐžÐ³Ð½Ð¸ÐºÐ¾Ð²Ð¾,', 76, 'pexels-gabby-k-5635112.jpg', 4);

-- --------------------------------------------------------

--
-- Structure de la table `book`
--

DROP TABLE IF EXISTS `book`;
CREATE TABLE IF NOT EXISTS `book` (
  `book_id` int(11) NOT NULL AUTO_INCREMENT,
  `book_name` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `book_adverts_id` int(11) NOT NULL,
  `book_user_id` int(11) NOT NULL,
  PRIMARY KEY (`book_id`),
  KEY `adverts_fk` (`book_adverts_id`),
  KEY `user_fk` (`book_user_id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `users`
--

DROP TABLE IF EXISTS `users`;
CREATE TABLE IF NOT EXISTS `users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `email` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `username` varchar(120) COLLATE utf8mb4_unicode_ci NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `email` (`email`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `users`
--

INSERT INTO `users` (`id`, `email`, `password`, `username`) VALUES
(3, 'cindy.blanc@hotmail.fr', '$2y$10$o16V84mObekshwbN6c5bLuqnOQWh8jBcT1K48fjd56hXR60p1omVq', 'CindyBlanc'),
(4, 'test@test.fr', '$2y$10$3g8554r/1.cG2y1ZNUn0MuXSKejTQF5rsUM/gxn.o5qDYQXaOxWLe', 'TestUser'),
(5, 'aa@aa.fr', '$2y$10$/a1l6GPLe79M0aRlWXxDmufCq0BV4uJ6A9Q80O38iMdUnF3KHtTeG', 'Cindy'),
(6, 'AlexisL@gmail.fr', '$2y$10$ZGMRbuoESuHVeS0WDU.zL.e/T2JZQaQYsyZJpHD.C1f/jd2UyBTXW', 'AlexisL');

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `adverts`
--
ALTER TABLE `adverts`
  ADD CONSTRAINT `author_fk` FOREIGN KEY (`author`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Contraintes pour la table `book`
--
ALTER TABLE `book`
  ADD CONSTRAINT `adverts_fk` FOREIGN KEY (`book_adverts_id`) REFERENCES `adverts` (`ad_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `user_fk` FOREIGN KEY (`book_user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

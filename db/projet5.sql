-- phpMyAdmin SQL Dump
-- version 4.7.9
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1:3306
-- Tiempo de generación: 11-03-2019 a las 14:25:12
-- Versión del servidor: 5.7.21
-- Versión de PHP: 7.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `projet5`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `commentaires`
--

DROP TABLE IF EXISTS `commentaires`;
CREATE TABLE IF NOT EXISTS `commentaires` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `contenu_commentaire` text NOT NULL,
  `datecreation_commentaire` datetime NOT NULL,
  `datemodification_commentaire` datetime NOT NULL,
  `valid` tinyint(1) NOT NULL DEFAULT '0',
  `post_id` int(11) NOT NULL,
  `utilisateur_id` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `post_id` (`post_id`),
  KEY `utilisateur_id` (`utilisateur_id`)
) ENGINE=InnoDB AUTO_INCREMENT=74 DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `commentaires`
--

INSERT INTO `commentaires` (`id`, `contenu_commentaire`, `datecreation_commentaire`, `datemodification_commentaire`, `valid`, `post_id`, `utilisateur_id`) VALUES
(27, 'sdgsdg', '2019-01-16 11:58:19', '2019-01-16 11:58:19', 1, 15, 7),
(28, 'salut c\'est moi', '2019-01-17 10:06:55', '2019-01-17 10:06:55', 1, 15, 7),
(29, 'asdasdasd', '2019-01-17 10:58:22', '2019-01-17 10:58:22', 1, 15, 7),
(34, 'sa', '2019-01-17 14:23:08', '2019-01-17 14:23:08', 1, 15, 9),
(35, 'a', '2019-01-17 14:23:19', '2019-01-17 14:23:19', 1, 15, 9),
(63, 'yeey', '2019-02-15 12:37:09', '2019-02-15 12:37:09', 1, 15, 7),
(64, 'tt', '2019-02-15 13:31:15', '2019-02-15 13:31:15', 1, 15, 10),
(66, 'salut\r\n', '2019-02-15 15:19:16', '2019-02-15 15:19:16', 1, 16, 7),
(67, 'hola', '2019-02-26 22:33:13', '2019-02-26 22:33:13', 1, 16, 7),
(68, 'hola2', '2019-02-26 22:34:42', '2019-02-26 22:34:42', 1, 16, 7),
(69, 'hi', '2019-02-26 22:34:52', '2019-02-26 22:34:52', 1, 15, 7),
(70, 'hola camille', '2019-02-26 22:35:08', '2019-02-26 22:35:08', 1, 16, 9),
(71, 'werwer', '2019-02-26 22:38:39', '2019-02-26 22:38:39', 1, 16, 7),
(72, 'hello', '2019-02-27 00:07:01', '2019-02-27 00:07:01', 1, 16, 12),
(73, 'test', '2019-02-27 00:08:10', '2019-02-27 00:08:10', 0, 16, 7);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `posts`
--

DROP TABLE IF EXISTS `posts`;
CREATE TABLE IF NOT EXISTS `posts` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `auteur` varchar(100) NOT NULL,
  `titre` varchar(255) NOT NULL,
  `chapo` text NOT NULL,
  `contenu` text NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=17 DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `posts`
--

INSERT INTO `posts` (`id`, `auteur`, `titre`, `chapo`, `contenu`, `created_at`, `updated_at`) VALUES
(15, 'apepe', 'apepe', '  asfasfasfasfasf  ', '  asfasfasfasfasf  ', '2018-12-18 19:46:38', '2018-12-28 00:01:18'),
(16, 'post 2', 'post2', 'post2', 'post2 salut salut', '2019-02-15 15:18:52', '2019-02-15 15:18:52');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `role`
--

DROP TABLE IF EXISTS `role`;
CREATE TABLE IF NOT EXISTS `role` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nom` varchar(50) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `role`
--

INSERT INTO `role` (`id`, `nom`) VALUES
(1, 'Membre'),
(2, 'Admin');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `utilisateurs`
--

DROP TABLE IF EXISTS `utilisateurs`;
CREATE TABLE IF NOT EXISTS `utilisateurs` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `email` varchar(50) NOT NULL,
  `pseudo` varchar(50) NOT NULL,
  `password` char(255) NOT NULL,
  `role` int(11) NOT NULL DEFAULT '1',
  PRIMARY KEY (`id`),
  KEY `role` (`role`)
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `utilisateurs`
--

INSERT INTO `utilisateurs` (`id`, `email`, `pseudo`, `password`, `role`) VALUES
(2, 'farfuu@hotmail.com', 'pepito', '65e84be33532fb784c48129675f9eff3a682b27168c0ea744b2cf58ee02337c5', 1),
(3, 'farfuu@hotmail.com', 'zemmaru', '03ac674216f3e15c761ee1a5e255f067953623c8b388b4459e13f978d7c846f4', 1),
(4, 'farfuu@hotmail.com', 'pp', '03ac674216f3e15c761ee1a5e255f067953623c8b388b4459e13f978d7c846f4', 2),
(5, 'farfuu@hotmail.com', 'test', '03ac674216f3e15c761ee1a5e255f067953623c8b388b4459e13f978d7c846f4', 1),
(6, 'farfuu@hotmail.com', 'eva', '03ac674216f3e15c761ee1a5e255f067953623c8b388b4459e13f978d7c846f4', 1),
(7, 'farfuu@hotmail.com', 'admin', '03ac674216f3e15c761ee1a5e255f067953623c8b388b4459e13f978d7c846f4', 2),
(8, 'farfuu@hotmail.com', 'cam', 'eef0c396c1a2c19d3119217a759fad0d6ab57465cb9241e80277378bfd970236', 1),
(9, 'farfuu@hotmail.com', 'camille', '03ac674216f3e15c761ee1a5e255f067953623c8b388b4459e13f978d7c846f4', 1),
(10, 'farfuu@hotmail.com', 'tt', '03ac674216f3e15c761ee1a5e255f067953623c8b388b4459e13f978d7c846f4', 1),
(11, 'farfuu@hotmail.com', 'es', '03ac674216f3e15c761ee1a5e255f067953623c8b388b4459e13f978d7c846f4', 1),
(12, 'farfuu@hotmail.com', 'qwerr', '03ac674216f3e15c761ee1a5e255f067953623c8b388b4459e13f978d7c846f4', 1);

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `commentaires`
--
ALTER TABLE `commentaires`
  ADD CONSTRAINT `commentaires_ibfk_1` FOREIGN KEY (`post_id`) REFERENCES `posts` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `utilisateurs`
--
ALTER TABLE `utilisateurs`
  ADD CONSTRAINT `utilisateurs_ibfk_1` FOREIGN KEY (`role`) REFERENCES `role` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

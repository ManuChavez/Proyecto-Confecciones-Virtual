-- phpMyAdmin SQL Dump
-- version 4.0.10deb1
-- http://www.phpmyadmin.net
--
-- Servidor: localhost
-- Tiempo de generación: 06-07-2016 a las 01:46:43
-- Versión del servidor: 5.5.49-0ubuntu0.14.04.1
-- Versión de PHP: 5.5.9-1ubuntu4.17

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Base de datos: `confecciones_de_ropa`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `cliente`
--

CREATE TABLE IF NOT EXISTS `cliente` (
  `rutCliente` varchar(10) NOT NULL,
  `nombreCliente` varchar(60) NOT NULL,
  `correoCliente` varchar(30) NOT NULL,
  `telefonoCliente` int(11) NOT NULL,
  PRIMARY KEY (`rutCliente`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `cliente`
--

INSERT INTO `cliente` (`rutCliente`, `nombreCliente`, `correoCliente`, `telefonoCliente`) VALUES
('11111111-1', 'Maria Zapata', 'mzapata@gmail.com', 11111111),
('22222222-2', 'Luisa Castaña', 'lcastaña@gmail.com', 22222222),
('33333333-3', 'Angelica Perez', 'aperez@gmail.com', 33333333),
('44444444-4', 'Eliana Mengotti', 'emengotti@gmail.ar', 44444444),
('55555555-5', 'Aurora Ferrari', 'aferrari@gmail.de', 55555555);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `pedido`
--

CREATE TABLE IF NOT EXISTS `pedido` (
  `idPedido` int(11) NOT NULL AUTO_INCREMENT,
  `detallePedido` text NOT NULL,
  `fechaInicioPedido` date NOT NULL,
  `fechaTerminoPedido` date NOT NULL,
  `rutCliente` varchar(10) NOT NULL,
  PRIMARY KEY (`idPedido`),
  KEY `idPedido` (`idPedido`),
  KEY `rutCliente` (`rutCliente`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Volcado de datos para la tabla `pedido`
--

INSERT INTO `pedido` (`idPedido`, `detallePedido`, `fechaInicioPedido`, `fechaTerminoPedido`, `rutCliente`) VALUES
(1, 'Poleron con mangas muy largas.', '2016-07-05', '2016-07-07', '33333333-3'),
(2, 'Crear mantel.', '2016-07-05', '2016-07-08', '22222222-2');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuario`
--

CREATE TABLE IF NOT EXISTS `usuario` (
  `idUsuario` int(11) NOT NULL,
  `nombreUsuario` varchar(60) NOT NULL,
  `contrasenaUsuario` varchar(30) NOT NULL,
  PRIMARY KEY (`idUsuario`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `usuario`
--

INSERT INTO `usuario` (`idUsuario`, `nombreUsuario`, `contrasenaUsuario`) VALUES
(1, 'Matius', '0987'),
(2, 'Manu', '1234');

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `pedido`
--
ALTER TABLE `pedido`
  ADD CONSTRAINT `pedido_ibfk_1` FOREIGN KEY (`rutCliente`) REFERENCES `cliente` (`rutCliente`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

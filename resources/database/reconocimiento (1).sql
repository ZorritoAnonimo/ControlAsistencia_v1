-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 15-01-2024 a las 16:58:42
-- Versión del servidor: 10.4.24-MariaDB
-- Versión de PHP: 7.4.29

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `reconocimiento`
--

DELIMITER $$
--
-- Procedimientos
--
CREATE DEFINER=`root`@`localhost` PROCEDURE `sp_listar_Asistencia` ()   BEGIN

	SELECT A.CodAsistencia as A1, A.Inicio as A2, A.Inicio as A3, A.BreakInicio AS A4,A.BreakFin AS A5, A.Fin AS A6, A.CodUsuario AS A7, U.Nombre AS U1, U.Dni AS U2, U.Sexo AS U3, U.Foto AS U4   
	from asistencia A 
    INNER JOIN usuarios U;

END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `sp_listar_usuarios` ()   BEGIN

SELECT CodUsuario U1, Nombre  U2, Dni  U3, Sexo  U4 , Foto U5  from usuarios;

END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `sp_registrar_Asistencia` (IN `v_Rostro` TEXT, IN `v_Inicio` TEXT, IN `v_BreakInicio` TEXT, IN `v_BreakFin` TEXT, IN `v_Fin` TEXT, IN `v_Usuario` INT, OUT `v_RES` INT)   BEGIN
    DECLARE EXIT HANDLER FOR SQLEXCEPTION
    BEGIN
        ROLLBACK;
        SET v_RES = false;
    END;

    START TRANSACTION;

    INSERT INTO asistencia (Rostro,Inicio,BreakInicio,BreakFin,Fin,CodUsuario )
    VALUES (v_Rostro, v_Inicio,v_BreakInicio,v_BreakFin,v_Fin,v_Usuario);

    COMMIT;
    SET v_RES = true;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `sp_registrar_Usuarios` (IN `v_Foto` VARCHAR(200), IN `v_Nombre` VARCHAR(200), IN `v_Dni` VARCHAR(200), IN `v_Sexo` VARCHAR(200), OUT `v_RES` INT)   BEGIN
    DECLARE EXIT HANDLER FOR SQLEXCEPTION
    BEGIN
        ROLLBACK;
        SET v_RES = false;
    END;

    START TRANSACTION;

    INSERT INTO usuarios (Foto, Nombre, Dni,Sexo )
    VALUES (v_Foto, v_Nombre,v_Dni,v_Sexo);

    COMMIT;
    SET v_RES = true;
END$$

DELIMITER ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `asistencia`
--

CREATE TABLE `asistencia` (
  `CodAsistencia` int(11) NOT NULL,
  `Rostro` text NOT NULL,
  `Inicio` text NOT NULL,
  `BreakInicio` text NOT NULL,
  `BreakFin` text NOT NULL,
  `Fin` text NOT NULL,
  `CodUsuario` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `asistencia`
--

INSERT INTO `asistencia` (`CodAsistencia`, `Rostro`, `Inicio`, `BreakInicio`, `BreakFin`, `Fin`, `CodUsuario`) VALUES
(2, 'sdsdsdsd6sd56sd.png', '07:14:24', '13:09:59', '14:05:00', '20:00:26', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--

CREATE TABLE `usuarios` (
  `CodUsuario` int(11) NOT NULL,
  `Foto` varchar(200) NOT NULL,
  `Nombre` varchar(100) NOT NULL,
  `Dni` varchar(8) NOT NULL,
  `Sexo` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `usuarios`
--

INSERT INTO `usuarios` (`CodUsuario`, `Foto`, `Nombre`, `Dni`, `Sexo`) VALUES
(1, '2551545.png', 'Jefferson Grabiel', '76393671', 'Masculino');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `asistencia`
--
ALTER TABLE `asistencia`
  ADD PRIMARY KEY (`CodAsistencia`),
  ADD KEY `CodUsuario` (`CodUsuario`);

--
-- Indices de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`CodUsuario`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `asistencia`
--
ALTER TABLE `asistencia`
  MODIFY `CodAsistencia` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `CodUsuario` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `asistencia`
--
ALTER TABLE `asistencia`
  ADD CONSTRAINT `asistencia_ibfk_1` FOREIGN KEY (`CodUsuario`) REFERENCES `usuarios` (`CodUsuario`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 04-05-2022 a las 04:39:00
-- Versión del servidor: 10.4.21-MariaDB
-- Versión de PHP: 7.4.25

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `db_appsence`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tbl_area`
--

CREATE TABLE `tbl_area` (
  `area_id` int(5) NOT NULL,
  `area_nom` varchar(50) NOT NULL,
  `area_tel` varchar(10) NOT NULL,
  `area_cor` varchar(30) DEFAULT NULL,
  `area_comp_fk` varchar(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `tbl_area`
--

INSERT INTO `tbl_area` (`area_id`, `area_nom`, `area_tel`, `area_cor`, `area_comp_fk`) VALUES
(1, 'ADMINISTRACIÓN Y RRHH', '3214052310', 'administracion@appsence.com', '90432447'),
(2, 'PRODUCCIÓN', '3214052310', 'produccion@appsence.com', '90432447'),
(3, 'MARKETING', '3214052311', 'marketing@appsence.com', '90432447'),
(4, 'INFORMÁTICA', '3214052312', 'informatica@appsence.com', '90432447');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tbl_ausencia`
--

CREATE TABLE `tbl_ausencia` (
  `ause_id` int(3) UNSIGNED ZEROFILL NOT NULL,
  `ause_des` text NOT NULL,
  `ause_fin` date NOT NULL,
  `ause_ffi` date DEFAULT NULL,
  `ause_dia` int(3) DEFAULT NULL,
  `ause_sop` text DEFAULT NULL,
  `ause_med` int(1) DEFAULT NULL,
  `ause_est` int(1) NOT NULL,
  `ause_usua_fk` int(5) NOT NULL,
  `ause_tipo_fk` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `tbl_ausencia`
--

INSERT INTO `tbl_ausencia` (`ause_id`, `ause_des`, `ause_fin`, `ause_ffi`, `ause_dia`, `ause_sop`, `ause_med`, `ause_est`, `ause_usua_fk`, `ause_tipo_fk`) VALUES
(006, 'Cancun', '2022-05-02', '2022-05-16', 14, '', 0, 1, 3, 1),
(007, 'Cancun', '2022-05-10', '2022-05-25', 15, '', 0, 0, 4, 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tbl_ausencia_tipo`
--

CREATE TABLE `tbl_ausencia_tipo` (
  `taus_id` int(1) NOT NULL,
  `taus_nom` varchar(25) NOT NULL,
  `taus_col` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `tbl_ausencia_tipo`
--

INSERT INTO `tbl_ausencia_tipo` (`taus_id`, `taus_nom`, `taus_col`) VALUES
(1, 'Vacaciones', '#39CAE1'),
(2, 'Licencia de paternidad', '#DC55EA'),
(3, 'Licencia de maternidad', '#EA5599'),
(4, 'Enfermedad', '#EA5565'),
(5, 'Cita medica', '#5570EA');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tbl_cargo_area`
--

CREATE TABLE `tbl_cargo_area` (
  `care_id` int(5) NOT NULL,
  `care_nom` varchar(50) NOT NULL,
  `care_area_fk` int(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `tbl_cargo_area`
--

INSERT INTO `tbl_cargo_area` (`care_id`, `care_nom`, `care_area_fk`) VALUES
(1, 'Gerente general', 1),
(2, 'Gerente de proyectos', 1),
(3, 'Director de recursos humanos', 1),
(4, 'Tecnico de seleccion de personal', 1),
(5, 'Tecnico de informacion', 1),
(6, 'Tecnico de comunicacion interna', 1),
(7, 'Jefe de produccion', 2),
(8, 'Personal Tecnico Especializado', 2),
(9, 'Analista de calidad', 2),
(10, 'Supervisor de la fabrica', 2),
(11, 'SEO', 3),
(12, 'Social media manager', 3),
(13, 'Redactor', 3),
(14, 'Diseñador grafico', 3),
(15, 'Técnico de marketing digital', 3),
(16, 'Desarrollador de sistemas', 4),
(17, 'Programador', 4),
(18, 'Servicio Tecnico', 4),
(19, 'Auditor Informatico', 4),
(20, 'sddas', 2);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tbl_compania`
--

CREATE TABLE `tbl_compania` (
  `comp_nit` varchar(11) NOT NULL,
  `comp_nom` varchar(50) NOT NULL,
  `comp_tel` varchar(10) NOT NULL,
  `comp_cor` varchar(30) DEFAULT NULL,
  `comp_dir` varchar(40) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `tbl_compania`
--

INSERT INTO `tbl_compania` (`comp_nit`, `comp_nom`, `comp_tel`, `comp_cor`, `comp_dir`) VALUES
('90432447', 'AppSence', '8673432', 'info@appsence.com', 'Fusagasugá, Centro');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tbl_estado`
--

CREATE TABLE `tbl_estado` (
  `esta_id` int(1) NOT NULL,
  `esta_nom` varchar(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `tbl_estado`
--

INSERT INTO `tbl_estado` (`esta_id`, `esta_nom`) VALUES
(1, 'Activo'),
(2, 'Inactivo');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tbl_usuario`
--

CREATE TABLE `tbl_usuario` (
  `usua_id` int(5) NOT NULL,
  `usua_ema` varchar(150) NOT NULL,
  `usua_nid` varchar(12) NOT NULL,
  `usua_pas` varchar(50) NOT NULL,
  `usua_pno` varchar(25) NOT NULL,
  `usua_sno` varchar(25) DEFAULT NULL,
  `usua_pap` varchar(25) NOT NULL,
  `usua_sap` varchar(25) DEFAULT NULL,
  `usua_sex` varchar(2) NOT NULL,
  `usua_pro` varchar(255) NOT NULL,
  `usua_dir` varchar(150) DEFAULT NULL,
  `usua_ciu` varchar(50) NOT NULL,
  `usua_pai` varchar(50) NOT NULL,
  `usua_fna` date NOT NULL,
  `usua_cel` varchar(12) NOT NULL,
  `usua_rol` varchar(2) NOT NULL,
  `usua_ipe` varchar(200) DEFAULT NULL,
  `usua_ipo` varchar(200) DEFAULT NULL,
  `usua_col` varchar(15) NOT NULL,
  `usua_esta_fk` int(1) NOT NULL,
  `usua_care_fk` int(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `tbl_usuario`
--

INSERT INTO `tbl_usuario` (`usua_id`, `usua_ema`, `usua_nid`, `usua_pas`, `usua_pno`, `usua_sno`, `usua_pap`, `usua_sap`, `usua_sex`, `usua_pro`, `usua_dir`, `usua_ciu`, `usua_pai`, `usua_fna`, `usua_cel`, `usua_rol`, `usua_ipe`, `usua_ipo`, `usua_col`, `usua_esta_fk`, `usua_care_fk`) VALUES
(1, 'andrestorres@develtec.net', '1069756463', 'e96354301c16f7f2abd98b6382de310c', 'Andres', '', 'Torres', '', 'M', 'Ingeniero analista, diseñador y desarrollador de software.', 'Calle 7 # 11 - 19 Norte,', 'Fusagasugá', 'Colombia', '1996-09-01', '3138746366', '1', 'public/img/usuario/1/img-prf.jpg', 'public/img/usuario/1/experiencia-develtec.jpg', '#1420c8', 1, 1),
(2, 'mymeneses@ucundinamarca.edu.co', '1069756012', '3e8332a51b8867d0796019efc4e4b077', 'Marlin', 'Yulieth', 'Meneses', 'Barrionuevo', 'F', 'Estudiante de ingeniería de sistemas', 'Centro,', 'Fusagasugá', 'Colombia', '2000-10-06', '3102214636', '2', 'public/img/usuario/0/user.jpg', '', '#009ee2', 1, 3),
(3, 'ltatianavargas', '1110598722', 'cfad3c2bd3d60630168fff8927549d8a', 'Leslie', 'Tatiana', 'Vargas', 'Raba', 'F', 'Estudiante de ingeniería de sistemas', 'Centro,', 'Fusagasugá', 'Colombia', '2021-07-21', '3204266941', '1', 'public/img/usuario/0/user-tatiana.jpg', '', '#009ee2', 1, 4),
(4, 'bcgarzon', '1100594501', '822f44880c47553bf6c0672b274e6f22', 'Brayant', 'Camilo', 'Garzon', 'Larrota', 'M', 'Estudiante de ingeniería de sistemas', 'Centro,', 'Fusagasugá', 'Colombia', '2001-06-08', '3172885190', '2', 'public/img/usuario/0/user-cami.jpg', '', '#009ee2', 1, 15);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `tbl_area`
--
ALTER TABLE `tbl_area`
  ADD PRIMARY KEY (`area_id`),
  ADD UNIQUE KEY `area_cor` (`area_cor`),
  ADD KEY `area_comp_fk` (`area_comp_fk`);

--
-- Indices de la tabla `tbl_ausencia`
--
ALTER TABLE `tbl_ausencia`
  ADD PRIMARY KEY (`ause_id`),
  ADD KEY `ause_usua_fk` (`ause_usua_fk`),
  ADD KEY `ause_tipo_fk` (`ause_tipo_fk`);

--
-- Indices de la tabla `tbl_ausencia_tipo`
--
ALTER TABLE `tbl_ausencia_tipo`
  ADD PRIMARY KEY (`taus_id`);

--
-- Indices de la tabla `tbl_cargo_area`
--
ALTER TABLE `tbl_cargo_area`
  ADD PRIMARY KEY (`care_id`),
  ADD KEY `care_area_fk` (`care_area_fk`);

--
-- Indices de la tabla `tbl_compania`
--
ALTER TABLE `tbl_compania`
  ADD PRIMARY KEY (`comp_nit`),
  ADD UNIQUE KEY `comp_cor` (`comp_cor`);

--
-- Indices de la tabla `tbl_estado`
--
ALTER TABLE `tbl_estado`
  ADD PRIMARY KEY (`esta_id`);

--
-- Indices de la tabla `tbl_usuario`
--
ALTER TABLE `tbl_usuario`
  ADD PRIMARY KEY (`usua_id`),
  ADD UNIQUE KEY `usua_ema` (`usua_ema`),
  ADD KEY `usua_esta_fk` (`usua_esta_fk`),
  ADD KEY `usua_care_fk` (`usua_care_fk`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `tbl_area`
--
ALTER TABLE `tbl_area`
  MODIFY `area_id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de la tabla `tbl_ausencia`
--
ALTER TABLE `tbl_ausencia`
  MODIFY `ause_id` int(3) UNSIGNED ZEROFILL NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT de la tabla `tbl_ausencia_tipo`
--
ALTER TABLE `tbl_ausencia_tipo`
  MODIFY `taus_id` int(1) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT de la tabla `tbl_cargo_area`
--
ALTER TABLE `tbl_cargo_area`
  MODIFY `care_id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT de la tabla `tbl_estado`
--
ALTER TABLE `tbl_estado`
  MODIFY `esta_id` int(1) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `tbl_usuario`
--
ALTER TABLE `tbl_usuario`
  MODIFY `usua_id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `tbl_area`
--
ALTER TABLE `tbl_area`
  ADD CONSTRAINT `tbl_area_ibfk_1` FOREIGN KEY (`area_comp_fk`) REFERENCES `tbl_compania` (`comp_nit`) ON UPDATE NO ACTION;

--
-- Filtros para la tabla `tbl_ausencia`
--
ALTER TABLE `tbl_ausencia`
  ADD CONSTRAINT `tbl_ausencia_ibfk_1` FOREIGN KEY (`ause_usua_fk`) REFERENCES `tbl_usuario` (`usua_id`) ON UPDATE NO ACTION,
  ADD CONSTRAINT `tbl_ausencia_ibfk_2` FOREIGN KEY (`ause_tipo_fk`) REFERENCES `tbl_ausencia_tipo` (`taus_id`) ON UPDATE NO ACTION;

--
-- Filtros para la tabla `tbl_cargo_area`
--
ALTER TABLE `tbl_cargo_area`
  ADD CONSTRAINT `tbl_cargo_area_ibfk_1` FOREIGN KEY (`care_area_fk`) REFERENCES `tbl_area` (`area_id`) ON UPDATE NO ACTION;

--
-- Filtros para la tabla `tbl_usuario`
--
ALTER TABLE `tbl_usuario`
  ADD CONSTRAINT `tbl_usuario_ibfk_1` FOREIGN KEY (`usua_esta_fk`) REFERENCES `tbl_estado` (`esta_id`) ON UPDATE NO ACTION,
  ADD CONSTRAINT `tbl_usuario_ibfk_2` FOREIGN KEY (`usua_care_fk`) REFERENCES `tbl_cargo_area` (`care_id`) ON UPDATE NO ACTION;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

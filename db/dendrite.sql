-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 12-01-2021 a las 20:58:08
-- Versión del servidor: 10.4.11-MariaDB
-- Versión de PHP: 7.2.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `dendrite`
--
-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `action`
--

DROP TABLE IF EXISTS `action`;
CREATE TABLE `action` (
  `Act_id` int(11) NOT NULL,
  `Act_observation` varchar(300) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `Act_date` datetime DEFAULT NULL,
  `User_id` int(11) DEFAULT NULL,
  `Req_id` int(11) NOT NULL,
  `Stat_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `application`
--

DROP TABLE IF EXISTS `application`;
CREATE TABLE `application` (
  `App_id` int(11) NOT NULL,
  `App_name` varchar(100) NOT NULL,
  `Mod_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `client`
--

DROP TABLE IF EXISTS `client`;
CREATE TABLE `client` (
  `Client_id` int(11) NOT NULL,
  `Client_name` varchar(100) NOT NULL,
  `Client_identification` varchar(15) NOT NULL,
  `Client_address` varchar(200) NOT NULL,
  `Client_tel` varchar(10) NOT NULL,
  `Client_email` varchar(320) NOT NULL,
  `Client_contactName` varchar(100) NOT NULL,
  `Client_contactTitle` varchar(100) NOT NULL,
  `Client_contactTel` varchar(10) NOT NULL,
  `Client_contactCel` varchar(15) NOT NULL,
  `Client_contactEmail` varchar(320) NOT NULL,
  `Stat_id` int(11) NOT NULL,
  `Client_user` int(11) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `company`
--

DROP TABLE IF EXISTS `company`;
CREATE TABLE `company` (
  `Comp_id` int(11) NOT NULL,
  `Comp_identification` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `Comp_name` varchar(300) COLLATE utf8mb4_unicode_ci NOT NULL,
  `Comp_address` varchar(300) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `Comp_phone` varchar(30) COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `events`
--

CREATE TABLE `events` (
  `Event_id` int(11) NOT NULL,
  `Event_title` varchar(250) CHARACTER SET utf8 NOT NULL,
  `Event_color` varchar(10) CHARACTER SET utf8 NOT NULL,
  `Event_start` datetime DEFAULT NULL,
  `Event_end` datetime DEFAULT NULL,
  `Client_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `login`
--

DROP TABLE IF EXISTS `login`;
CREATE TABLE `login` (
  `Login_id` int(11) NOT NULL,
  `Login_password` varchar(30) NOT NULL,
  `User_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `module`
--

DROP TABLE IF EXISTS `module`;
CREATE TABLE `module` (
  `Mod_id` int(11) NOT NULL,
  `Mod_name` varchar(100) CHARACTER SET utf8 NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `new_user`
--

DROP TABLE IF EXISTS `new_user`;
CREATE TABLE `new_user` (
  `Nuser_id` int(11) NOT NULL,
  `User_id` int(11) NOT NULL,
  `Nuser_date` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `Nuser_hash` varchar(600) NOT NULL,
  `Nuser_state` tinyint(1) NOT NULL
)ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `permission`
--

DROP TABLE IF EXISTS `permission`;
CREATE TABLE `permission` (
  `Per_id` int(11) NOT NULL,
  `Per_name` varchar(100) CHARACTER SET utf8 NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `provider`
--

DROP TABLE IF EXISTS `provider`;
CREATE TABLE `provider` (
  `Pro_id` int(11) NOT NULL,
  `Pro_name` varchar(100) NOT NULL,
  `Pro_identification` varchar(15) NOT NULL,
  `Pro_tel` varchar(10) NOT NULL,
  `Pro_address` varchar(200) NOT NULL,
  `Pro_contactName` varchar(100) NOT NULL,
  `Pro_contactEmail` varchar(320) NOT NULL,
  `Pro_attach` blob DEFAULT NULL,
  `Stat_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `recovery_password`
--

DROP TABLE IF EXISTS `recovery_password`;
CREATE TABLE `recovery_password` (
  `Recover_pass_id` int(11) NOT NULL,
  `User_id` int(11) NOT NULL,
  `Recover_pass_date` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `Recover_pass_hash` varchar(600) NOT NULL,
  `Recover_pass_state` tinyint(1) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `request`
--

DROP TABLE IF EXISTS `request`;
CREATE TABLE `request` (
  `Req_id` int(11) NOT NULL,
  `Req_subject` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `Req_message` varchar(300) COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `role`
--

DROP TABLE IF EXISTS `role`;
CREATE TABLE `role` (
  `Role_id` int(11) NOT NULL,
  `Role_name` varchar(100) CHARACTER SET utf8 NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `security_group`
--

DROP TABLE IF EXISTS `security_group`;
CREATE TABLE `security_group` (
  `Sgroup_id` int(11) NOT NULL,
  `Sgroup_name` varchar(100) CHARACTER SET utf8 NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `security_gxm`
--

DROP TABLE IF EXISTS `security_gxm`;
CREATE TABLE `security_gxm` (
  `Sgxm_id` int(11) NOT NULL,
  `Sgroup_id` int(11) NOT NULL,
  `Mod_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `security_gxmxa`
--

DROP TABLE IF EXISTS `security_gxmxa`;
CREATE TABLE `security_gxmxa` (
  `Sgxmxa_id` int(11) NOT NULL,
  `Sgxm_id` int(11) NOT NULL,
  `App_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `security_gxmxaxp`
--

DROP TABLE IF EXISTS `security_gxmxaxp`;
CREATE TABLE `security_gxmxaxp` (
  `Sgxmxaxp_id` int(11) NOT NULL,
  `Sgxmxa_id` int(11) NOT NULL,
  `Per_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `status`
--

DROP TABLE IF EXISTS `status`;
CREATE TABLE `status` (
  `Stat_id` int(11) NOT NULL,
  `Stat_name` varchar(30) NOT NULL,
  `Type_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;


-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `status_type`
--

DROP TABLE IF EXISTS `status_type`;
CREATE TABLE `status_type` (
  `Type_id` int(11) NOT NULL,
  `Type_name` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;


-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `user`
--

DROP TABLE IF EXISTS `user`;
CREATE TABLE `user` (
  `User_id` int(11) NOT NULL,
  `User_name` varchar(80) NOT NULL,
  `User_identification` varchar(15) NOT NULL,
  `User_email` varchar(320) NOT NULL,
  `User_title` varchar(30) NOT NULL,
  `User_telephone` varchar(15) NOT NULL,
  `Stat_id` int(11) NOT NULL,
  `Role_id` int(11) NOT NULL,
  `Sgroup_id` int(11) NOT NULL,
  `Comp_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `action`
--
ALTER TABLE `action`
  ADD PRIMARY KEY (`Act_id`),
  ADD KEY `User_id` (`User_id`),
  ADD KEY `Stat_id` (`Stat_id`),
  ADD KEY `Req_id` (`Req_id`);

--
-- Indices de la tabla `application`
--
ALTER TABLE `application`
  ADD PRIMARY KEY (`App_id`),
  ADD KEY `Mod_id` (`Mod_id`);

--
-- Indices de la tabla `client`
--
ALTER TABLE `client`
  ADD PRIMARY KEY (`Client_id`),
  ADD KEY `status_client` (`Stat_id`);

--
-- Indices de la tabla `company`
--
ALTER TABLE `company`
  ADD PRIMARY KEY (`Comp_id`);

--
-- Indices de la tabla `events`
--
ALTER TABLE `events`
  ADD PRIMARY KEY (`Event_id`),
  ADD KEY `Client_id` (`Client_id`);

--
-- Indices de la tabla `login`
--
ALTER TABLE `login`
  ADD PRIMARY KEY (`Login_id`),
  ADD KEY `user_login` (`User_id`);

--
-- Indices de la tabla `module`
--
ALTER TABLE `module`
  ADD PRIMARY KEY (`Mod_id`);

--
-- Indices de la tabla `new_user`
--
ALTER TABLE `new_user`
  ADD PRIMARY KEY (`Nuser_id`),
  ADD KEY `User_id` (`User_id`);

--
-- Indices de la tabla `permission`
--
ALTER TABLE `permission`
  ADD PRIMARY KEY (`Per_id`);

--
-- Indices de la tabla `provider`
--
ALTER TABLE `provider`
  ADD PRIMARY KEY (`Pro_id`),
  ADD KEY `status_provider` (`Stat_id`);

--
-- Indices de la tabla `recovery_password`
--
ALTER TABLE `recovery_password`
  ADD PRIMARY KEY (`Recover_pass_id`),
  ADD KEY `recovery_password_user` (`User_id`);

--
-- Indices de la tabla `request`
--
ALTER TABLE `request`
  ADD PRIMARY KEY (`Req_id`);

--
-- Indices de la tabla `role`
--
ALTER TABLE `role`
  ADD PRIMARY KEY (`Role_id`);

--
-- Indices de la tabla `security_group`
--
ALTER TABLE `security_group`
  ADD PRIMARY KEY (`Sgroup_id`);

--
-- Indices de la tabla `security_gxm`
--
ALTER TABLE `security_gxm`
  ADD PRIMARY KEY (`Sgxm_id`),
  ADD KEY `Sgroup_id` (`Sgroup_id`),
  ADD KEY `Mod_id` (`Mod_id`);

--
-- Indices de la tabla `security_gxmxa`
--
ALTER TABLE `security_gxmxa`
  ADD PRIMARY KEY (`Sgxmxa_id`),
  ADD KEY `Sgxm_id` (`Sgxm_id`),
  ADD KEY `App_id` (`App_id`);

--
-- Indices de la tabla `security_gxmxaxp`
--
ALTER TABLE `security_gxmxaxp`
  ADD PRIMARY KEY (`Sgxmxaxp_id`),
  ADD KEY `Sgxmxa_id` (`Sgxmxa_id`),
  ADD KEY `Per_id` (`Per_id`);

--
-- Indices de la tabla `status`
--
ALTER TABLE `status`
  ADD PRIMARY KEY (`Stat_id`),
  ADD KEY `type_status` (`Type_id`);

--
-- Indices de la tabla `status_type`
--
ALTER TABLE `status_type`
  ADD PRIMARY KEY (`Type_id`);

--
-- Indices de la tabla `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`User_id`),
  ADD KEY `user_status` (`Stat_id`),
  ADD KEY `Role_id` (`Role_id`),
  ADD KEY `Sgroup_id` (`Sgroup_id`),
  ADD KEY `Comp_id` (`Comp_id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `action`
--
ALTER TABLE `action`
  MODIFY `Act_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `application`
--
ALTER TABLE `application`
  MODIFY `App_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `client`
--
ALTER TABLE `client`
  MODIFY `Client_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `company`
--
ALTER TABLE `company`
  MODIFY `Comp_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `events`
--
ALTER TABLE `events`
  MODIFY `Event_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `login`
--
ALTER TABLE `login`
  MODIFY `Login_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `module`
--
ALTER TABLE `module`
  MODIFY `Mod_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `new_user`
--
ALTER TABLE `new_user`
  MODIFY `Nuser_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `permission`
--
ALTER TABLE `permission`
  MODIFY `Per_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `provider`
--
ALTER TABLE `provider`
  MODIFY `Pro_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `recovery_password`
--
ALTER TABLE `recovery_password`
  MODIFY `Recover_pass_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `request`
--
ALTER TABLE `request`
  MODIFY `Req_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `role`
--
ALTER TABLE `role`
  MODIFY `Role_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `security_group`
--
ALTER TABLE `security_group`
  MODIFY `Sgroup_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `security_gxm`
--
ALTER TABLE `security_gxm`
  MODIFY `Sgxm_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `security_gxmxa`
--
ALTER TABLE `security_gxmxa`
  MODIFY `Sgxmxa_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `security_gxmxaxp`
--
ALTER TABLE `security_gxmxaxp`
  MODIFY `Sgxmxaxp_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `status`
--
ALTER TABLE `status`
  MODIFY `Stat_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `status_type`
--
ALTER TABLE `status_type`
  MODIFY `Type_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `user`
--
ALTER TABLE `user`
  MODIFY `User_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `action`
--
ALTER TABLE `action`
  ADD CONSTRAINT `action_ibfk_1` FOREIGN KEY (`User_id`) REFERENCES `user` (`User_id`),
  ADD CONSTRAINT `action_ibfk_2` FOREIGN KEY (`Stat_id`) REFERENCES `status` (`Stat_id`),
  ADD CONSTRAINT `action_ibfk_3` FOREIGN KEY (`Req_id`) REFERENCES `request` (`Req_id`);

--
-- Filtros para la tabla `application`
--
ALTER TABLE `application`
  ADD CONSTRAINT `application_ibfk_1` FOREIGN KEY (`Mod_id`) REFERENCES `module` (`Mod_id`);

--
-- Filtros para la tabla `client`
--
ALTER TABLE `client`
  ADD CONSTRAINT `status_client` FOREIGN KEY (`Stat_id`) REFERENCES `status` (`Stat_id`);

--
-- Filtros para la tabla `events`
--
ALTER TABLE `events`
  ADD CONSTRAINT `events_ibfk_1` FOREIGN KEY (`Client_id`) REFERENCES `client` (`Client_id`);

--
-- Filtros para la tabla `login`
--
ALTER TABLE `login`
  ADD CONSTRAINT `user_login` FOREIGN KEY (`User_id`) REFERENCES `user` (`User_id`);

--
-- Filtros para la tabla `new_user`
--
ALTER TABLE `new_user`
  ADD CONSTRAINT `new_user_ibfk_1` FOREIGN KEY (`User_id`) REFERENCES `user` (`User_id`);

--
-- Filtros para la tabla `provider`
--
ALTER TABLE `provider`
  ADD CONSTRAINT `status_provider` FOREIGN KEY (`Stat_id`) REFERENCES `status` (`Stat_id`);

--
-- Filtros para la tabla `recovery_password`
--
ALTER TABLE `recovery_password`
  ADD CONSTRAINT `recovery_password_user` FOREIGN KEY (`User_id`) REFERENCES `user` (`User_id`);

--
-- Filtros para la tabla `security_gxm`
--
ALTER TABLE `security_gxm`
  ADD CONSTRAINT `security_gxm_ibfk_1` FOREIGN KEY (`Sgroup_id`) REFERENCES `security_group` (`Sgroup_id`),
  ADD CONSTRAINT `security_gxm_ibfk_2` FOREIGN KEY (`Mod_id`) REFERENCES `module` (`Mod_id`);

--
-- Filtros para la tabla `security_gxmxa`
--
ALTER TABLE `security_gxmxa`
  ADD CONSTRAINT `security_gxmxa_ibfk_1` FOREIGN KEY (`Sgxm_id`) REFERENCES `security_gxm` (`Sgxm_id`),
  ADD CONSTRAINT `security_gxmxa_ibfk_2` FOREIGN KEY (`App_id`) REFERENCES `application` (`App_id`);

--
-- Filtros para la tabla `security_gxmxaxp`
--
ALTER TABLE `security_gxmxaxp`
  ADD CONSTRAINT `security_gxmxaxp_ibfk_1` FOREIGN KEY (`Sgxmxa_id`) REFERENCES `security_gxmxa` (`Sgxmxa_id`),
  ADD CONSTRAINT `security_gxmxaxp_ibfk_2` FOREIGN KEY (`Per_id`) REFERENCES `permission` (`Per_id`);

--
-- Filtros para la tabla `status`
--
ALTER TABLE `status`
  ADD CONSTRAINT `type_status` FOREIGN KEY (`Type_id`) REFERENCES `status_type` (`Type_id`);

--
-- Filtros para la tabla `user`
--
ALTER TABLE `user`
  ADD CONSTRAINT `user_ibfk_1` FOREIGN KEY (`Role_id`) REFERENCES `role` (`Role_id`),
  ADD CONSTRAINT `user_ibfk_2` FOREIGN KEY (`Sgroup_id`) REFERENCES `security_group` (`Sgroup_id`),
  ADD CONSTRAINT `user_ibfk_3` FOREIGN KEY (`Comp_id`) REFERENCES `company` (`Comp_id`),
  ADD CONSTRAINT `user_status` FOREIGN KEY (`Stat_id`) REFERENCES `status` (`Stat_id`);

--
-- Insert de tablas
--

INSERT INTO status_type (Type_name) VALUES 
('Usuario'),
('General');

INSERT INTO status (Stat_name, Type_id) VALUES 
('Activo', 1),
('Inactivo', 1),
('Activo', 2),
('Inactivo', 2);

INSERT INTO role (Role_id, Role_name) VALUES
(1, 'Root');

INSERT INTO security_group (Sgroup_id, Sgroup_name) VALUES
(1, 'Grupo1');

INSERT INTO user (User_name, User_identification, User_email, User_title, User_telephone, Stat_id, Role_id, Sgroup_id, Comp_id) VALUES
('Laura Grisales', '1030654234', 'lauramggarcia@hotmail.com', 'Ingeniero de Software', '3054752261', 1, 1, 1, 1);

INSERT INTO login (Login_password, User_id) VALUES
('7142c2907bd83fea0ea03e8020878e', 1);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

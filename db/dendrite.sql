-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 15-09-2021 a las 05:11:23
-- Versión del servidor: 10.4.21-MariaDB
-- Versión de PHP: 7.3.30

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
-- Estructura de tabla para la tabla `application`
--

CREATE TABLE `application` (
  `App_id` int(11) NOT NULL,
  `App_name` varchar(100) NOT NULL,
  `Mod_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `client`
--

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

--
-- Volcado de datos para la tabla `client`
--

INSERT INTO `client` (`Client_id`, `Client_name`, `Client_identification`, `Client_address`, `Client_tel`, `Client_email`, `Client_contactName`, `Client_contactTitle`, `Client_contactTel`, `Client_contactCel`, `Client_contactEmail`, `Stat_id`, `Client_user`) VALUES
(1, 'Coominobras', '111111', '', '', '', 'Viviana Daza', 'Asesora', '', '', 'alexa.daza@coominobras.coop', 3, 0);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `company`
--

CREATE TABLE `company` (
  `Comp_id` int(11) NOT NULL,
  `Comp_identification` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `Comp_name` varchar(300) COLLATE utf8mb4_unicode_ci NOT NULL,
  `Comp_address` varchar(300) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `Comp_phone` varchar(30) COLLATE utf8mb4_unicode_ci DEFAULT NULL
)  ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `company`
--

INSERT INTO `company` (`Comp_id`, `Comp_identification`, `Comp_name`, `Comp_address`, `Comp_phone`) VALUES
(1, '1234567', 'Sinapsis', '', '');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `domain_service`
--

CREATE TABLE `domain_service` (
  `Domain_id` int(11) NOT NULL,
  `Domain_name` varchar(100) NOT NULL,
  `Domain_number` varchar(5) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `domain_service`
--

INSERT INTO `domain_service` (`Domain_id`, `Domain_name`, `Domain_number`) VALUES
(1, 'co', '2'),
(2, 'com', '1'),
(3, 'com.co', '1.5'),
(4, 'online', '1'),
(5, 'net', '1'),
(6, 'tech', '1'),
(7, 'org', '1.3'),
(8, 'store', '1');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `email_service`
--

CREATE TABLE `email_service` (
  `Email_id` int(11) NOT NULL,
  `Email_name` varchar(100) NOT NULL,
  `Email_number` varchar(5) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `email_service`
--

INSERT INTO `email_service` (`Email_id`, `Email_name`, `Email_number`) VALUES
(1, 'Sencillo', '2'),
(2, 'Business', '2.3'),
(3, 'Enterprise', '3');


-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `events`
--

CREATE TABLE `events` (
  `Event_id` int(11) NOT NULL,
  `Event_title` varchar(250) NOT NULL,
  `Event_color` varchar(10) NOT NULL,
  `Event_start` datetime DEFAULT NULL,
  `Event_end` datetime DEFAULT NULL,
  `Client_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `host_service`
--

CREATE TABLE `host_service` (
  `Host_id` int(11) NOT NULL,
  `Host_name` varchar(100) NOT NULL,
  `Host_number` varchar(5) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `host_service`
--

INSERT INTO `host_service` (`Host_id`, `Host_name`, `Host_number`) VALUES
(1, 'Hosting Sencillo', '3'),
(2, 'Hosting Premium', '6'),
(3, 'Hosting Empresarial', '12'),
(4, 'Cloud Startup', '18'),
(5, 'Cloud Professional', '25'),
(6, 'Cloud Global', '70');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `login`
--

CREATE TABLE `login` (
  `Login_id` int(11) NOT NULL,
  `Login_password` varchar(30) NOT NULL,
  `User_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `login`
--

INSERT INTO `login` (`Login_id`, `Login_password`, `User_id`) VALUES
(1, '209b42103513851f9fd0e091a59e00', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `module`
--

CREATE TABLE `module` (
  `Mod_id` int(11) NOT NULL,
  `Mod_name` varchar(100) CHARACTER SET utf8 NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `new_user`
--

CREATE TABLE `new_user` (
  `Nuser_id` int(11) NOT NULL,
  `User_id` int(11) NOT NULL,
  `Nuser_date` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `Nuser_hash` varchar(600) NOT NULL,
  `Nuser_state` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `permission`
--

CREATE TABLE `permission` (
  `Per_id` int(11) NOT NULL,
  `Per_name` varchar(100) CHARACTER SET utf8 NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `provider`
--

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
-- Estructura de tabla para la tabla `quotation`
--

CREATE TABLE `quotation` (
  `Quo_id` int(11) NOT NULL,
  `Quo_prefix` varchar(10) NOT NULL,
  `Quo_number` varchar(11) NOT NULL,
  `Quo_parentNumber` int(11) NULL,
  `Quo_date` date NOT NULL,
  `Quo_trm` varchar(10) NOT NULL,
  `Quo_percCompany` int(11) NOT NULL,
  `Quo_percCommission` int(11) NOT NULL,
  `Quo_hours` varchar(5) NOT NULL,
  `Quo_days` varchar(3) NOT NULL,
  `Quo_unexpected` int(11) NOT NULL,
  `Host_id` int(11) NULL,
  `Quo_hostMonths` varchar(3) DEFAULT NULL,
  `Ssl_id` int(11) NULL,
  `Quo_sslMonths` varchar(3) DEFAULT NULL,
  `Domain_id` int(11) NULL,
  `Quo_domainMonths` varchar(3) DEFAULT NULL,
  `Email_id` int(11) NULL,
  `Quo_emailNum` varchar(3) DEFAULT NULL,
  `Quo_emailMonths` varchar(3) DEFAULT NULL,
  `Stat_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

CREATE TABLE `quotation_task` (
  `Quot_id` int(11) NOT NULL,
  `Quo_id` int(11) NOT NULL,
  `Prof_id` int(11) NOT NULL,
  `Quot_salary` varchar(10) DEFAULT NULL,
  `Quot_days` varchar(2) DEFAULT NULL,
  `Quot_hours` varchar(2) DEFAULT NULL,
  `Quot_task` varchar(30) DEFAULT NULL,
  `Quot_opHour` varchar(2) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `recovery_password`
--

CREATE TABLE `recovery_password` (
  `Recover_pass_id` int(11) NOT NULL,
  `User_id` int(11) NOT NULL,
  `Recover_pass_date` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `Recover_pass_hash` varchar(600) NOT NULL,
  `Recover_pass_state` tinyint(1) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `request`
--

CREATE TABLE `request` (
  `Req_id` int(11) NOT NULL,
  `Req_subject` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `Req_message` varchar(300) COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `role`
--

CREATE TABLE `role` (
  `Role_id` int(11) NOT NULL,
  `Role_name` varchar(100) CHARACTER SET utf8 NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `role`
--

INSERT INTO `role` (`Role_id`, `Role_name`) VALUES
(1, 'Root');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `security_group`
--

CREATE TABLE `security_group` (
  `Sgroup_id` int(11) NOT NULL,
  `Sgroup_name` varchar(100) CHARACTER SET utf8 NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `security_group`
--

INSERT INTO `security_group` (`Sgroup_id`, `Sgroup_name`) VALUES
(1, 'Grupo1');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `security_gxm`
--

CREATE TABLE `security_gxm` (
  `Sgxm_id` int(11) NOT NULL,
  `Sgroup_id` int(11) NOT NULL,
  `Mod_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `security_gxmxa`
--

CREATE TABLE `security_gxmxa` (
  `Sgxmxa_id` int(11) NOT NULL,
  `Sgxm_id` int(11) NOT NULL,
  `App_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `security_gxmxaxp`
--

CREATE TABLE `security_gxmxaxp` (
  `Sgxmxaxp_id` int(11) NOT NULL,
  `Sgxmxa_id` int(11) NOT NULL,
  `Per_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `ssl_service`
--

CREATE TABLE `ssl_service` (
  `Ssl_id` int(11) NOT NULL,
  `Ssl_name` varchar(100) NOT NULL,
  `Ssl_number` varchar(5) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `ssl_service`
--

INSERT INTO `ssl_service` (`Ssl_id`, `Ssl_name`, `Ssl_number`) VALUES
(1, 'SSL', '3');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `status`
--

CREATE TABLE `status` (
  `Stat_id` int(11) NOT NULL,
  `Stat_name` varchar(30) NOT NULL,
  `Type_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `status`
--

INSERT INTO `status` (`Stat_id`, `Stat_name`, `Type_id`) VALUES
(1, 'Activo', 1),
(2, 'Inactivo', 1),
(3, 'Activo', 2),
(4, 'Inactivo', 2)
(5, 'Cotizado', 3),
(6, 'Aprobado', 3);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `status_type`
--

CREATE TABLE `status_type` (
  `Type_id` int(11) NOT NULL,
  `Type_name` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `status_type`
--

INSERT INTO `status_type` (`Type_id`, `Type_name`) VALUES
(1, 'Usuario'),
(2, 'General'),
(3, 'Cotización');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `user`
--

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
-- Volcado de datos para la tabla `user`
--

INSERT INTO `user` (`User_id`, `User_name`, `User_identification`, `User_email`, `User_title`, `User_telephone`, `Stat_id`, `Role_id`, `Sgroup_id`, `Comp_id`) VALUES
(1, 'Edwin Ocampo', '1030654234', 'ocampo9125@hotmail.com', 'Ingeniero de Software', '3213260498', 1, 1, 1, 1);

--
-- Índices para tablas volcadas
--

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
-- Indices de la tabla `domain_service`
--
ALTER TABLE `domain_service`
  ADD PRIMARY KEY (`Domain_id`);

--
-- Indices de la tabla `email_service`
--
ALTER TABLE `email_service`
  ADD PRIMARY KEY (`Email_id`);

--
-- Indices de la tabla `events`
--
ALTER TABLE `events`
  ADD PRIMARY KEY (`Event_id`),
  ADD KEY `Client_id` (`Client_id`);

--
-- Indices de la tabla `host_service`
--
ALTER TABLE `host_service`
  ADD PRIMARY KEY (`Host_id`);

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
-- Indices de la tabla `quotation`
--
ALTER TABLE `quotation`
  ADD PRIMARY KEY (`Quo_id`),
  ADD KEY `version_fk` (`Quo_parentNumber`),
  ADD KEY `Host_id` (`Host_id`),
  ADD KEY `Ssl_id` (`Ssl_id`),
  ADD KEY `Domain_id` (`Domain_id`),
  ADD KEY `Email_id` (`Email_id`),
  ADD KEY `Stat_id` (`Stat_id`);

--
-- Indices de la tabla `quotation_task`
--
ALTER TABLE `quotation_task`
  ADD PRIMARY KEY (`Quot_id`),
  ADD KEY `Prof_id` (`Prof_id`),
  ADD KEY `Quo_id` (`Quo_id`);

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
  ADD PRIMARY KEY (`Sgxmxaxp_id`);

--
-- Indices de la tabla `ssl_service`
--
ALTER TABLE `ssl_service`
  ADD PRIMARY KEY (`Ssl_id`);
  
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
  ADD PRIMARY KEY (`User_id`);

--
-- AUTO_INCREMENT de la tabla `application`
--
ALTER TABLE `application`
  MODIFY `App_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `client`
--
ALTER TABLE `client`
  MODIFY `Client_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `company`
--
ALTER TABLE `company`
  MODIFY `Comp_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `domain_service`
--
ALTER TABLE `domain_service`
  MODIFY `Domain_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT de la tabla `email_service`
--
ALTER TABLE `email_service`
  MODIFY `Email_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `events`
--
ALTER TABLE `events`
  MODIFY `Event_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `host_service`
--
ALTER TABLE `host_service`
  MODIFY `Host_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT de la tabla `login`
--
ALTER TABLE `login`
  MODIFY `Login_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

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
-- AUTO_INCREMENT de la tabla `quotation`
--
ALTER TABLE `quotation`
  MODIFY `Quo_id` int(11) NOT NULL AUTO_INCREMENT;

-- AUTO_INCREMENT de la tabla `quotation_task`
--
ALTER TABLE `quotation_task`
  MODIFY `Quot_id` int(11) NOT NULL AUTO_INCREMENT;

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
  MODIFY `Role_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `security_group`
--
ALTER TABLE `security_group`
  MODIFY `Sgroup_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

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
-- AUTO_INCREMENT de la tabla `ssl_service`
--
ALTER TABLE `ssl_service`
  MODIFY `Ssl_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
  
--
-- AUTO_INCREMENT de la tabla `status`
--
ALTER TABLE `status`
  MODIFY `Stat_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de la tabla `status_type`
--
ALTER TABLE `status_type`
  MODIFY `Type_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `user`
--
ALTER TABLE `user`
  MODIFY `User_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Restricciones para tablas volcadas
--

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
-- Filtros para la tabla `quotation`
--
ALTER TABLE `quotation`
  ADD CONSTRAINT `quotation_ibfk_1` FOREIGN KEY (`Host_id`) REFERENCES `host_service` (`Host_id`),
  ADD CONSTRAINT `quotation_ibfk_2` FOREIGN KEY (`Ssl_id`) REFERENCES `ssl_service` (`Ssl_id`),
  ADD CONSTRAINT `quotation_ibfk_3` FOREIGN KEY (`Domain_id`) REFERENCES `domain_service` (`domain_id`),
  ADD CONSTRAINT `quotation_ibfk_4` FOREIGN KEY (`Email_id`) REFERENCES `email_service` (`email_id`),
  ADD CONSTRAINT `quotation_ibfk_5` FOREIGN KEY (`Stat_id`) REFERENCES `status` (`Stat_id`),
  ADD CONSTRAINT `version_fk` FOREIGN KEY (`Quo_parentNumber`) REFERENCES `quotation` (`Quo_id`);

-- Filtros para la tabla `quotation_task`
--
ALTER TABLE `quotation_task`
  ADD CONSTRAINT `quotation_task_ibfk_1` FOREIGN KEY (`Prof_id`) REFERENCES `profile` (`Prof_id`),
  ADD CONSTRAINT `quotation_task_ibfk_2` FOREIGN KEY (`Quo_id`) REFERENCES `quotation` (`Quo_id`);
COMMIT;

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

DELIMITER $$
--
-- Eventos
--
CREATE DEFINER=`root`@`localhost` EVENT `new_user_clean` ON SCHEDULE EVERY 1 DAY STARTS '2020-03-01 00:00:01' ON COMPLETION NOT PRESERVE ENABLE DO DELETE FROM new_user WHERE TIMESTAMPDIFF(MINUTE, NOW(), DATE_ADD(Nuser_date, INTERVAL 24 HOUR)) < 0$$

DELIMITER ;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

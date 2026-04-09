SET NAMES utf8;
SET time_zone = '+00:00';
SET foreign_key_checks = 0;
SET sql_mode = 'NO_AUTO_VALUE_ON_ZERO';

SET NAMES utf8mb4;

-- DROP TABLE IF EXISTS `hallazgos_auditoria`;
CREATE TABLE `hallazgos_auditoria` (
  `orden_id` int(11) NOT NULL AUTO_INCREMENT,
  `id_punto` varchar(10) NOT NULL,
  `categoria` varchar(50) DEFAULT NULL,
  `titulo` varchar(255) DEFAULT NULL,
  `referencia_normativa` varchar(100) DEFAULT NULL,
  `descripcion` text DEFAULT NULL,
  `estado` int(11) DEFAULT 0,
  `severidad` int(11) DEFAULT 5,
  `hash_evidencia` varchar(64) DEFAULT NULL,
  `ultima_modificacion` timestamp NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  PRIMARY KEY (`id_punto`),
  UNIQUE KEY `orden_id` (`orden_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_uca1400_ai_ci;

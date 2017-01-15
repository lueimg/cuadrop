/*
Navicat MySQL Data Transfer

Source Server         : localhost
Source Server Version : 50711
Source Host           : 127.0.0.1:3306
Source Database       : ab23510_cuadrop

Target Server Type    : MYSQL
Target Server Version : 50711
File Encoding         : 65001

Date: 2017-01-15 17:16:43
*/

SET FOREIGN_KEY_CHECKS=0;

-- ----------------------------
-- Table structure for alumnos
-- ----------------------------
DROP TABLE IF EXISTS `alumnos`;
CREATE TABLE `alumnos` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `paterno` varchar(50) DEFAULT NULL,
  `materno` varchar(50) DEFAULT NULL,
  `nombre` varchar(50) DEFAULT NULL,
  `sexo` char(1) DEFAULT NULL COMMENT 'F: Femenino | M: Masculino',
  `email` varchar(100) DEFAULT NULL,
  `telefono` varchar(70) DEFAULT NULL,
  `estado` int(1) DEFAULT '1',
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  `usuario_created_at` int(11) DEFAULT NULL,
  `usuario_updated_at` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=42 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of alumnos
-- ----------------------------
INSERT INTO `alumnos` VALUES ('1', 'TAQUILA ', 'PACORICUNA ', 'HUGO CARLOS', 'M', 'hugoctp@gmail.com', '951098522', '0', '2016-06-06 11:47:45', '2016-06-06 11:47:45', null, null);
INSERT INTO `alumnos` VALUES ('2', 'APAZA', 'MAMANI', 'JORGE BASILIO', 'M', 'JORGBAN@HOTMAIL.COM', '9963659821', '1', '2016-06-06 11:49:38', '2016-06-06 11:49:38', null, null);
INSERT INTO `alumnos` VALUES ('3', 'CALLACONDO', 'LLANQUE ', 'ABEL MARCOS', 'M', 'NODEFINIDO@HOTMAIL.COM', 'NO DEFINIDO', '1', '2016-06-06 11:58:55', '2016-06-06 11:58:55', null, null);
INSERT INTO `alumnos` VALUES ('4', 'BARRIONUEVO ', 'CALATAYUD ', 'MERCEDES ', 'F', 'XXXXXX@HOTMAIL.COM', 'NO  DEFINIDO', '1', '2016-06-06 12:01:01', '2016-06-06 12:01:01', null, null);
INSERT INTO `alumnos` VALUES ('5', 'ENDARA ', 'SACACA', 'LINO HERMOGENES', 'M', 'KKKKKK@HOTMAIL.COM', 'NO DEFINIDO', '1', '2016-06-06 12:02:16', '2016-06-06 12:02:16', null, null);
INSERT INTO `alumnos` VALUES ('6', 'CALSIN', 'OTAZU', 'GLADYS MERY', 'F', 'LLLLLL@HOTMAIL.COM', '982003389', '1', '2016-06-06 12:05:54', '2016-06-06 12:05:54', null, null);
INSERT INTO `alumnos` VALUES ('7', 'ORDOÑO', 'QUISPE', 'ORTENCIA', 'F', 'ORTENCIA@YAHOO.ES', 'NO DEFINIDO', '1', '2016-06-06 12:07:40', '2016-06-06 12:07:40', null, null);
INSERT INTO `alumnos` VALUES ('8', 'QUENAYA ', 'PAURO ', 'VILMA ELVIRA', 'F', 'VILMA@HOTMAIL.COM', 'NO DEFINIDO', '1', '2016-06-06 12:10:51', '2016-06-06 12:10:51', null, null);
INSERT INTO `alumnos` VALUES ('9', 'MAMANI', 'NINARAQUI ', 'WILBER HUGO ', 'M', 'WILBER@HOTMAIL.COM', 'NO DEFINIDO', '1', '2016-06-06 12:12:57', '2016-06-06 12:12:57', null, null);
INSERT INTO `alumnos` VALUES ('10', 'APAZA', 'CONDORI ', 'ALBERTO EMILIO ', 'M', 'ALBERTO@HOTMAIL.COM', 'NO DEFINIDO', '1', '2016-06-06 12:15:50', '2016-06-06 12:15:50', null, null);
INSERT INTO `alumnos` VALUES ('11', 'GUERRERO', ' POZO', ' MARIA ELIZABETH ', 'F', 'TELESUP@TELESUP.EDU.PE', '999999999', '1', '2016-06-06 15:38:10', '2016-06-06 15:38:10', null, null);
INSERT INTO `alumnos` VALUES ('12', 'ARISMENDIS', 'VALLADARES', 'LUISA EDITH FABIOLA', 'F', 'LUISARAISVA@HOTMAIL.COM', '922189644', '1', '2016-06-06 15:44:18', '2016-06-06 15:44:18', null, null);
INSERT INTO `alumnos` VALUES ('13', 'ROMAN', 'AYOSA', 'KETTY CECILIA', 'F', 'KETTYROMAN45@HOTMAIL.COM', '945032206', '1', '2016-06-06 15:45:28', '2016-06-06 15:45:28', null, null);
INSERT INTO `alumnos` VALUES ('14', 'VIGO', 'NEYRA DE VASQUEZ', 'ZOILA DELICIA', 'F', 'VIGO16452@HOTMAIL.COM', '954421760', '1', '2016-06-06 15:46:49', '2016-06-06 15:46:49', null, null);
INSERT INTO `alumnos` VALUES ('15', 'YATA ', 'COBEÑAS ', 'ANGELITA DEL ROSARIO ', 'F', 'UPTTUMBES@TELESUP.EDU.PE', '999999999', '1', '2016-06-06 15:58:54', '2016-06-06 15:58:54', null, null);
INSERT INTO `alumnos` VALUES ('16', 'MEZA', 'ALARCON', 'EDGAR ENRIQUE ', 'M', 'telesup@telesup.net', '972605258', '1', '2016-06-06 19:01:23', '2016-06-06 19:01:23', null, null);
INSERT INTO `alumnos` VALUES ('17', 'URBINA', 'TEJEDA ', 'MARIA DEL CARMEN', 'F', 'MARIA@TELESUP.NET', '999999999', '1', '2016-06-06 22:04:37', '2016-06-06 22:04:37', null, null);
INSERT INTO `alumnos` VALUES ('18', 'APONTE', 'HERRERA', 'SABINA MIRLENY ', 'F', 'SABINA@HOTMAIL.COM', '943085881', '1', '2016-06-06 22:10:14', '2016-06-06 22:10:14', null, null);
INSERT INTO `alumnos` VALUES ('19', 'DIOS ', 'CHIRINOS', 'GABRIELA STEFANY ', 'F', 'GABRIELA@HOTMAIL.COM', '072521748', '1', '2016-06-06 22:14:06', '2016-06-06 22:14:06', null, null);
INSERT INTO `alumnos` VALUES ('20', 'CRUZ ', 'AGUILA ', 'ARACELI DEL PILAR ', 'F', 'ARACELI@HOTMAIL.COM', '945489408', '1', '2016-06-06 22:31:16', '2016-06-06 22:31:16', null, null);
INSERT INTO `alumnos` VALUES ('21', 'AVALOS', ' REYES', 'FRANCO ELVER ', 'M', 'FRANCO@HOTMAIL.COM', '969220598', '1', '2016-06-06 22:37:19', '2016-06-06 22:37:19', null, null);
INSERT INTO `alumnos` VALUES ('22', 'CORDOVA ', 'GIRON ', 'JUAN JOSE ', 'M', 'JUAN@HOTMAIL.COM', '971811075', '1', '2016-06-06 22:47:34', '2016-06-06 22:47:34', null, null);
INSERT INTO `alumnos` VALUES ('23', 'ALCON', 'CLAVIJO', ' PERCY ', 'M', 'PERCY@HOTMAIL.COM', '999999999', '1', '2016-06-06 22:52:42', '2016-06-06 22:52:42', null, null);
INSERT INTO `alumnos` VALUES ('24', 'ROQUE', 'OBLEA ', 'JULIO CESAR ', 'M', 'JULIO@HOTMAIL.COM', '964937303', '1', '2016-06-06 22:57:15', '2016-06-06 22:57:15', null, null);
INSERT INTO `alumnos` VALUES ('25', 'FARIAS', 'AVILA ', 'DANITZA DEL ROCIO ', 'F', 'DANITZA@HOTMAIL.COM', '999999999', '1', '2016-06-06 23:06:46', '2016-06-06 23:06:46', null, null);
INSERT INTO `alumnos` VALUES ('26', 'AGURTO', 'PAREDES ', 'YULIANA ', 'F', 'YULIANA@HOTMAIL.COM', '965050338', '1', '2016-06-06 23:12:05', '2016-06-06 23:12:05', null, null);
INSERT INTO `alumnos` VALUES ('27', 'ZARATE', ' INFANTE', ' JESLEYNE ', 'F', 'JESLEYNE@HOTMAIL.COM', '979185307', '1', '2016-06-06 23:15:03', '2016-06-06 23:15:03', null, null);
INSERT INTO `alumnos` VALUES ('28', 'MENDOZA ', 'ORTIZ', 'LESLY ', 'F', 'LESLY@HOTMAIL.COM', '995082656', '1', '2016-06-06 23:17:49', '2016-06-06 23:17:49', null, null);
INSERT INTO `alumnos` VALUES ('29', 'CRUZ', 'VELASCO', 'ANGELA ', 'F', 'ANGELA@HOTMAIL.COM', '072503101', '1', '2016-06-06 23:25:30', '2016-06-06 23:25:30', null, null);
INSERT INTO `alumnos` VALUES ('30', 'PEREZ', ' AVILA ', 'MARIA OLGA ', 'F', 'MARIA@HOTMAIL.COM', '972804077', '1', '2016-06-06 23:28:28', '2016-06-06 23:28:28', null, null);
INSERT INTO `alumnos` VALUES ('31', 'MONDRAGON ', 'GARCIA ', 'JESSICA ', 'F', 'JESSICA@HOTMAIL.COM', '944493109', '1', '2016-06-06 23:33:10', '2016-06-06 23:33:10', null, null);
INSERT INTO `alumnos` VALUES ('32', 'NEYRA ', 'BELMONT ', 'ANGIE MARIA ', 'F', 'ANGIE@HOTMAIL.COM', '969245600', '1', '2016-06-06 23:38:09', '2016-06-06 23:38:09', null, null);
INSERT INTO `alumnos` VALUES ('33', 'TAPIA', 'UGAZ', 'ORFELINA ', 'F', 'ORFELINA@HOTMAIL.COM', '956088592', '1', '2016-06-06 23:40:13', '2016-06-06 23:40:13', null, null);
INSERT INTO `alumnos` VALUES ('34', 'MORAN', 'CASTILLO', 'MARXY ERENIA', 'F', 'MARXY@HOTMAIL.COM', '999999999', '1', '2016-06-06 23:42:56', '2016-06-06 23:42:56', null, null);
INSERT INTO `alumnos` VALUES ('35', 'CORNEJO', 'CAMPAÑA', 'ANTONY GEFERSON ', 'M', 'ANTONY@HOTMAIL.COM', '937713888', '1', '2016-06-06 23:45:35', '2016-06-06 23:45:35', null, null);
INSERT INTO `alumnos` VALUES ('36', 'REYNA', 'CAMPOS', 'CAROL ANGELINA', 'F', 'NOTIENE@TELESUP.COM', '9999999', '0', '2016-06-10 07:31:04', '2016-06-10 07:31:04', null, null);
INSERT INTO `alumnos` VALUES ('37', 'LOZANO', 'DEL AGUILA', 'LUIS ARTURO', 'M', 'LUIS@HOTMAIL.COM', '999999', '0', '2016-06-10 07:32:33', '2016-06-10 07:32:33', null, null);
INSERT INTO `alumnos` VALUES ('38', 'DEL AGUILA', 'LAYCHE', 'LUIS MARCELO', 'M', 'MARCELO@HOTMAIL.COM', '999999', '0', '2016-06-10 07:34:25', '2016-06-10 07:34:25', null, null);
INSERT INTO `alumnos` VALUES ('39', 'CURI', 'RAMIREZ', 'MILAGROS DE MARIA', 'F', 'MILAGROS@HOTMAIL.COM', '9999999', '0', '2016-06-10 07:35:30', '2016-06-10 07:35:30', null, null);
INSERT INTO `alumnos` VALUES ('40', 'NUNTA', 'APAGUEÑO', 'ARELI', 'F', 'ARELI@HOTMAIL.COM', '999999', '0', '2016-06-10 07:36:36', '2016-06-10 07:36:36', null, null);
INSERT INTO `alumnos` VALUES ('41', 'COLQUI', 'JINES', 'JOHEL', 'M', 'colqui_jj@hotmail.com', '999081543', '1', '2016-06-21 12:29:42', '2016-06-21 12:29:42', null, null);

-- ----------------------------
-- Table structure for alumno_problema
-- ----------------------------
DROP TABLE IF EXISTS `alumno_problema`;
CREATE TABLE `alumno_problema` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `problema_id` int(11) DEFAULT NULL,
  `alumno_id` int(11) DEFAULT NULL,
  `carrera_id` int(11) DEFAULT NULL,
  `ciclo_id` int(11) DEFAULT NULL,
  `carrera` varchar(50) DEFAULT NULL,
  `documento` varchar(70) DEFAULT NULL,
  `observacion` varchar(200) DEFAULT NULL,
  `estado` int(1) DEFAULT '1',
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  `usuario_created_at` int(11) DEFAULT NULL,
  `usuario_updated_at` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `ap_problema_id` (`problema_id`) USING BTREE,
  KEY `ap_alumno_id` (`alumno_id`) USING BTREE,
  KEY `ap_carrera_id` (`carrera_id`) USING BTREE,
  KEY `ap_ciclo_id` (`ciclo_id`) USING BTREE,
  CONSTRAINT `alumno_problema_ibfk_1` FOREIGN KEY (`ciclo_id`) REFERENCES `ciclos` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `alumno_problema_ibfk_2` FOREIGN KEY (`alumno_id`) REFERENCES `alumnos` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `alumno_problema_ibfk_3` FOREIGN KEY (`carrera_id`) REFERENCES `carreras` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `alumno_problema_ibfk_4` FOREIGN KEY (`problema_id`) REFERENCES `problemas` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=36 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of alumno_problema
-- ----------------------------
INSERT INTO `alumno_problema` VALUES ('1', '20', '2', '2', '6', '', 'TITULO', 'TITULO', '1', '2016-06-06 12:17:52', '2016-06-06 12:17:52', '17', null);
INSERT INTO `alumno_problema` VALUES ('2', '27', '11', '3', '6', '', 'RÉCORD DE NOTAS ', 'NO LLEGA AUN ', '1', '2016-06-06 15:48:28', '2016-06-06 15:48:28', '38', null);
INSERT INTO `alumno_problema` VALUES ('3', '28', '12', '7', '1', '', 'CONSTANCIA DE ESTUDIOS ( ARISMENDIZ VALLADARES LUISA-ADMINISTRACION , ', 'ENVIEN URGENTE', '1', '2016-06-06 15:48:41', '2016-06-06 15:48:41', '34', null);
INSERT INTO `alumno_problema` VALUES ('4', '29', '14', '11', '1', '', 'CONSTANCIA DE ESTUSIOS', 'ENVIAR URGENTE', '1', '2016-06-06 15:49:42', '2016-06-06 15:49:42', '34', null);
INSERT INTO `alumno_problema` VALUES ('5', '30', '13', '7', '1', '', 'CONSTANCIA DE ESTUDIOS    ', 'ENVIAR URGENTE', '1', '2016-06-06 15:50:59', '2016-06-06 15:50:59', '34', null);
INSERT INTO `alumno_problema` VALUES ('6', '33', '15', '3', '6', '', 'RÉCORD DE NOTAS ', 'CULMINO SU CARRERA EN EL SEMESTRE 2015-1 ', '1', '2016-06-06 16:31:57', '2016-06-06 16:31:57', '38', null);
INSERT INTO `alumno_problema` VALUES ('7', '36', '16', '2', '6', '', 'RECORD DE NOTAS ', 'CULMINO SU CARRERA EN EL SEMESTRE 2015-1', '1', '2016-06-06 22:02:37', '2016-06-06 22:02:37', '38', null);
INSERT INTO `alumno_problema` VALUES ('8', '37', '17', '2', '6', '', 'RECORD DE NOTAS ', 'CULMINO SU CARRERA EN EL SEMESTRE 2015-2', '1', '2016-06-06 22:08:02', '2016-06-06 22:08:02', '38', null);
INSERT INTO `alumno_problema` VALUES ('9', '38', '18', '3', '6', '', 'RECORD DE NOTAS ', 'CULMINO SU CARRERA EN EL SEMESTRE 2015-2', '1', '2016-06-06 22:11:14', '2016-06-06 22:11:14', '38', null);
INSERT INTO `alumno_problema` VALUES ('10', '39', '19', '2', '6', '', 'RECORD DE NOTAS EN COMPUTACION E INFORMATICA ', 'CULMINO SU CARRERA EN EL SEMESTRE 2015-2', '1', '2016-06-06 22:17:28', '2016-06-06 22:17:28', '38', null);
INSERT INTO `alumno_problema` VALUES ('11', '40', '20', '2', '6', '', 'RÉCORD DE NOTAS EN COMPUTACIÓN E INFORMÁTICA ', 'CULMINO SU CARRERA EN SEMESTRE 2015-2', '1', '2016-06-06 22:35:02', '2016-06-06 22:35:02', '38', null);
INSERT INTO `alumno_problema` VALUES ('12', '43', '21', '2', '6', '', 'RECORD DE NOTAS EN COMPUTACION E INFORMATICA ', 'CULMINO SU CARRERA EN EL SEMESTRE 2015-2', '1', '2016-06-06 22:38:53', '2016-06-06 22:38:53', '38', null);
INSERT INTO `alumno_problema` VALUES ('13', '46', '22', '1', '6', '', 'RECORD DE NOTAS EN CONTABILIDAD', 'CULMINO SU CARRERA EN EL SEMESTRE 2015-2', '1', '2016-06-06 22:49:18', '2016-06-06 22:49:18', '38', null);
INSERT INTO `alumno_problema` VALUES ('14', '47', '23', '2', '6', '', 'RECORD DE NOTAS ', 'CULMINO SU CARRERA EN SEMESTRE 2014-2', '1', '2016-06-06 22:54:23', '2016-06-06 22:54:23', '38', null);
INSERT INTO `alumno_problema` VALUES ('15', '48', '24', '1', '6', '', 'RECORD DE NOTAS ', 'CULMINO SU CARRERA EN EL SEMESTRE 2015-2', '1', '2016-06-06 22:58:47', '2016-06-06 22:58:47', '38', null);
INSERT INTO `alumno_problema` VALUES ('16', '49', '25', '2', '6', '', 'RECORD DE NOTAS EN COMPUTACIÓN E INFORMÁTICA ', 'CULMINO SU CARRERA EN EL SEMESTRE 2015-2', '1', '2016-06-06 23:10:27', '2016-06-06 23:10:27', '38', null);
INSERT INTO `alumno_problema` VALUES ('17', '50', '26', '1', '6', '', 'RECORD DE NOTAS ', 'CULMINO SU CARRERA EN EL SEMESTRE 2015-2', '1', '2016-06-06 23:13:22', '2016-06-06 23:13:22', '38', null);
INSERT INTO `alumno_problema` VALUES ('18', '51', '27', '2', '6', '', 'RECORD DE NOTAS ', 'CULMINO SU CARRERA EN EL SEMESTRE 2015-2', '1', '2016-06-06 23:16:16', '2016-06-06 23:16:16', '38', null);
INSERT INTO `alumno_problema` VALUES ('19', '52', '28', '3', '6', '', 'RECORD DE NOTAS ', 'CULMINO SU CARRERA EN EL SEMESTRE 2015-2', '1', '2016-06-06 23:21:05', '2016-06-06 23:21:05', '38', null);
INSERT INTO `alumno_problema` VALUES ('20', '53', '29', '1', '6', '', 'RECORD DE NOTAS EN CONTABILIDAD ', 'CULMINO SU CARRERA EN SEMESTRE 2015-2', '1', '2016-06-06 23:27:02', '2016-06-06 23:27:02', '38', null);
INSERT INTO `alumno_problema` VALUES ('21', '54', '30', '2', '6', '', 'RECORD DE NOTAS EN COMPUTACIÓN E INFORMÁTICA ', 'CULMINO SU CARRERA EN EL SEMESTRE 2015-2', '1', '2016-06-06 23:31:14', '2016-06-06 23:31:14', '38', null);
INSERT INTO `alumno_problema` VALUES ('22', '55', '31', '1', '6', '', 'RECORD DE NOTAS ', 'CULMINO SU CARRERA EN SEMESTRE 2015-2', '1', '2016-06-06 23:34:34', '2016-06-06 23:34:34', '38', null);
INSERT INTO `alumno_problema` VALUES ('23', '56', '32', '3', '6', '', 'RECORD DE NOTAS ', 'CULMINO SU CARRERA EN SEMESTRE 2015-2', '1', '2016-06-06 23:39:05', '2016-06-06 23:39:05', '38', null);
INSERT INTO `alumno_problema` VALUES ('24', '57', '33', '2', '6', '', 'RECORD DE NOTAS', 'CULMINO SU CARRERA EN SEMESTRE 2015-2', '1', '2016-06-06 23:41:02', '2016-06-06 23:41:02', '38', null);
INSERT INTO `alumno_problema` VALUES ('25', '58', '34', '3', '6', '', 'RECORD DE NOTAS ', 'CULMINO SU CARRERA EN SEMESTRE 2015-2', '1', '2016-06-06 23:44:03', '2016-06-06 23:44:03', '38', null);
INSERT INTO `alumno_problema` VALUES ('26', '59', '35', '2', '6', '', 'RECORD DE NOTAS ', 'CULMINO SU CARRERA EN SEMESTRE 2015-2', '1', '2016-06-06 23:46:18', '2016-06-06 23:46:18', '38', null);
INSERT INTO `alumno_problema` VALUES ('27', '64', '26', null, null, 'COMPUTACION E INFORMATICA', 'TECNICO EN COMPUTACION E INFORMATICA', '', '1', '2016-06-07 10:16:15', '2016-06-07 10:16:15', '21', null);
INSERT INTO `alumno_problema` VALUES ('28', '78', '36', '3', '6', '', 'TITULO PROFESIONAL', 'SUSTENTÓ EN JULIO DEL 2014 ES LA ÚNICA ALUMNA DE QUIEN TODAVÍA NO LLEGA  SU TITULO.', '1', '2016-06-10 07:31:19', '2016-06-10 07:31:19', '19', null);
INSERT INTO `alumno_problema` VALUES ('29', '79', '37', '1', '6', '', 'TITULO PROFESIONAL', 'SUSTENTO EN ABRIL DEL 2015, DE OTROS ALUMNOS QUE SUSTENTARON JUNTO CON EL YA LLEGARON Y DEL ALUMNO NADA.', '1', '2016-06-10 07:33:33', '2016-06-10 07:33:33', '19', null);
INSERT INTO `alumno_problema` VALUES ('30', '80', '38', '2', '6', '', 'TITULO PROFESIONAL', 'SUSTENTO EN ABRIL DEL 2015, DE OTROS ALUMNOS QUE SUSTENTARON JUNTO CON EL YA LLEGARON Y DEL ALUMNO NADA.', '1', '2016-06-10 07:34:51', '2016-06-10 07:34:51', '19', null);
INSERT INTO `alumno_problema` VALUES ('31', '81', '39', '1', '6', '', 'TITULO PROFESIONAL', 'SUSTENTO EN ABRIL DEL 2015, DE OTROS ALUMNOS QUE SUSTENTARON JUNTO CON EL YA LLEGARON Y DEL ALUMNO NADA.', '1', '2016-06-10 07:35:49', '2016-06-10 07:35:49', '19', null);
INSERT INTO `alumno_problema` VALUES ('32', '82', '40', '3', '6', '', 'TITULO PROFESIONAL', 'SUSTENTO EN ABRIL DEL 2015, DE OTROS ALUMNOS QUE SUSTENTARON JUNTO CON EL YA LLEGARON Y DEL ALUMNO NADA.', '1', '2016-06-10 07:37:00', '2016-06-10 07:37:00', '19', null);
INSERT INTO `alumno_problema` VALUES ('33', '109', '41', '11', '10', '', 'Bachiller  ', 'realizao el tramite el 18 de abril del 2016', '1', '2016-06-21 12:34:37', '2016-06-21 12:34:37', '16', null);
INSERT INTO `alumno_problema` VALUES ('34', '111', '36', '3', '6', '', 'TITULO PROFESIONAL', 'HASTA EL MOMENTO NO LLEGA EL TITULO DE LA ALUMNA REYNA CAMPOS CAROL ANGELINA SECRETARIA, ELLA SUSTENTO EN JULIO DEL 2014, DE LOS 10 ALUMNOS QUE SUSTENTARON EN ESA ÉPOCA SOLO DE 09 ENVIARON MAS NO DE L', '1', '2016-06-24 15:57:32', '2016-06-24 15:57:32', '19', null);
INSERT INTO `alumno_problema` VALUES ('35', '121', '36', '3', '6', '', 'TITULO PROFESIONAL A NOMBRE DE LA NACIÓN CARRERA SECRETARIADO', 'LA ALUMNA SUSTENTO EN JULIO DEL 2014, HASTA EL MOMENTO NO LLEGA SU TITULO PUES DELOS 10 QUE SUSTENTARON  9 LLAGARON MENOS DE LA ALUMNA.', '1', '2016-06-28 07:33:25', '2016-06-28 07:33:25', '19', null);

-- ----------------------------
-- Table structure for alumno_problema_nota
-- ----------------------------
DROP TABLE IF EXISTS `alumno_problema_nota`;
CREATE TABLE `alumno_problema_nota` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `alumno_problema_id` int(11) DEFAULT NULL,
  `curso` varchar(80) DEFAULT NULL,
  `frecuencia` varchar(50) DEFAULT NULL,
  `hora` varchar(50) DEFAULT NULL,
  `profesor` varchar(50) DEFAULT NULL,
  `fecha_inicio` date DEFAULT NULL,
  `fecha_fin` date DEFAULT NULL,
  `nota` int(11) DEFAULT NULL,
  `estado` int(1) DEFAULT '1',
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  `usuario_created_at` int(11) DEFAULT NULL,
  `usuario_updated_at` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `apn_alumno_problema_id` (`alumno_problema_id`) USING BTREE,
  CONSTRAINT `alumno_problema_nota_ibfk_1` FOREIGN KEY (`alumno_problema_id`) REFERENCES `alumno_problema` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of alumno_problema_nota
-- ----------------------------
INSERT INTO `alumno_problema_nota` VALUES ('1', '27', '', '', '', '', null, null, '0', '1', '2016-06-07 10:16:15', '2016-06-07 10:16:15', '21', null);
INSERT INTO `alumno_problema_nota` VALUES ('2', '27', '', '', '', '', null, null, '0', '1', '2016-06-07 10:16:15', '2016-06-07 10:16:15', '21', null);
INSERT INTO `alumno_problema_nota` VALUES ('3', '27', '', '', '', '', null, null, '0', '1', '2016-06-07 10:16:15', '2016-06-07 10:16:15', '21', null);
INSERT INTO `alumno_problema_nota` VALUES ('4', '27', '', '', '', '', null, null, '0', '1', '2016-06-07 10:16:15', '2016-06-07 10:16:15', '21', null);
INSERT INTO `alumno_problema_nota` VALUES ('5', '27', '', '', '', '', null, null, '0', '1', '2016-06-07 10:16:15', '2016-06-07 10:16:15', '21', null);
INSERT INTO `alumno_problema_nota` VALUES ('6', '27', '', '', '', '', null, null, '0', '1', '2016-06-07 10:16:15', '2016-06-07 10:16:15', '21', null);
INSERT INTO `alumno_problema_nota` VALUES ('7', '27', '', '', '', '', null, null, '0', '1', '2016-06-07 10:16:15', '2016-06-07 10:16:15', '21', null);
INSERT INTO `alumno_problema_nota` VALUES ('8', '27', '', '', '', '', null, null, '0', '1', '2016-06-07 10:16:15', '2016-06-07 10:16:15', '21', null);
INSERT INTO `alumno_problema_nota` VALUES ('9', '27', '', '', '', '', null, null, '0', '1', '2016-06-07 10:16:15', '2016-06-07 10:16:15', '21', null);
INSERT INTO `alumno_problema_nota` VALUES ('10', '27', '', '', '', '', null, null, '0', '1', '2016-06-07 10:16:15', '2016-06-07 10:16:15', '21', null);
INSERT INTO `alumno_problema_nota` VALUES ('11', '27', '', '', '', '', null, null, '0', '1', '2016-06-07 10:16:15', '2016-06-07 10:16:15', '21', null);
INSERT INTO `alumno_problema_nota` VALUES ('12', '27', '', '', '', '', null, null, '0', '1', '2016-06-07 10:16:15', '2016-06-07 10:16:15', '21', null);

-- ----------------------------
-- Table structure for alumno_problema_pago
-- ----------------------------
DROP TABLE IF EXISTS `alumno_problema_pago`;
CREATE TABLE `alumno_problema_pago` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `alumno_problema_id` int(11) DEFAULT NULL,
  `curso` varchar(80) DEFAULT NULL,
  `recibo` varchar(50) DEFAULT NULL,
  `monto` decimal(10,2) DEFAULT NULL,
  `estado` int(1) DEFAULT '1',
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  `usuario_created_at` int(11) DEFAULT NULL,
  `usuario_updated_at` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `app_alumno_problema_id` (`alumno_problema_id`) USING BTREE,
  CONSTRAINT `alumno_problema_pago_ibfk_1` FOREIGN KEY (`alumno_problema_id`) REFERENCES `alumno_problema` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of alumno_problema_pago
-- ----------------------------

-- ----------------------------
-- Table structure for articulos
-- ----------------------------
DROP TABLE IF EXISTS `articulos`;
CREATE TABLE `articulos` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `tipo_articulo` int(11) DEFAULT NULL COMMENT '1:Servicio | 2:Bien',
  `nombre` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `estado` int(1) DEFAULT '1',
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  `usuario_created_at` int(11) DEFAULT NULL,
  `usuario_updated_at` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- ----------------------------
-- Records of articulos
-- ----------------------------

-- ----------------------------
-- Table structure for cargos
-- ----------------------------
DROP TABLE IF EXISTS `cargos`;
CREATE TABLE `cargos` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(80) NOT NULL,
  `estado` int(11) NOT NULL DEFAULT '1',
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  `usuario_created_at` int(11) DEFAULT NULL,
  `usuario_updated_at` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of cargos
-- ----------------------------
INSERT INTO `cargos` VALUES ('1', 'Administrador', '1', '2015-10-18 20:53:24', '2015-11-18 18:43:28', '1', '1');
INSERT INTO `cargos` VALUES ('2', 'Registrador de Problemas', '1', '2015-10-22 18:14:28', '2015-10-22 18:16:43', '1', '1');
INSERT INTO `cargos` VALUES ('3', 'Solucionador de Problemas', '1', '2015-10-22 18:16:14', '2015-10-27 22:07:19', '1', '1');
INSERT INTO `cargos` VALUES ('4', 'Mantenimiento', '1', '2015-10-23 20:41:48', '2015-10-23 20:41:48', '1', null);

-- ----------------------------
-- Table structure for cargo_opcion
-- ----------------------------
DROP TABLE IF EXISTS `cargo_opcion`;
CREATE TABLE `cargo_opcion` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `cargo_id` int(11) NOT NULL,
  `opcion_id` int(11) NOT NULL,
  `estado` int(11) NOT NULL DEFAULT '1',
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  `usuario_created_at` int(11) DEFAULT NULL,
  `usuario_updated_at` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `co_cargo_id_idx` (`cargo_id`) USING BTREE,
  KEY `co_opcion_id_idx` (`opcion_id`) USING BTREE,
  CONSTRAINT `cargo_opcion_ibfk_1` FOREIGN KEY (`cargo_id`) REFERENCES `cargos` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `cargo_opcion_ibfk_2` FOREIGN KEY (`opcion_id`) REFERENCES `opciones` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=16 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of cargo_opcion
-- ----------------------------
INSERT INTO `cargo_opcion` VALUES ('1', '1', '1', '1', '2015-10-18 21:52:57', null, '1', '1');
INSERT INTO `cargo_opcion` VALUES ('2', '1', '2', '1', '2015-10-18 21:52:57', null, '1', '1');
INSERT INTO `cargo_opcion` VALUES ('3', '1', '3', '1', '2015-10-18 21:52:57', null, '1', '1');
INSERT INTO `cargo_opcion` VALUES ('4', '1', '4', '1', '2015-10-18 21:52:57', null, '1', '1');
INSERT INTO `cargo_opcion` VALUES ('5', '1', '5', '1', '2015-10-18 21:52:57', null, '1', '1');
INSERT INTO `cargo_opcion` VALUES ('6', '1', '6', '1', '2015-10-18 21:52:57', null, '1', '1');
INSERT INTO `cargo_opcion` VALUES ('7', '1', '8', '1', '2015-10-18 21:52:57', null, '1', '1');
INSERT INTO `cargo_opcion` VALUES ('8', '2', '1', '1', null, null, null, '1');
INSERT INTO `cargo_opcion` VALUES ('9', '3', '2', '1', null, null, null, '1');
INSERT INTO `cargo_opcion` VALUES ('10', '1', '9', '1', '2015-10-18 21:52:57', null, '1', '1');
INSERT INTO `cargo_opcion` VALUES ('11', '1', '10', '1', '2015-10-18 21:52:57', null, '1', '1');
INSERT INTO `cargo_opcion` VALUES ('12', '4', '3', '1', null, null, null, null);
INSERT INTO `cargo_opcion` VALUES ('13', '4', '4', '1', null, null, null, null);
INSERT INTO `cargo_opcion` VALUES ('14', '2', '10', '1', null, null, '1', null);
INSERT INTO `cargo_opcion` VALUES ('15', '3', '10', '1', null, null, '1', null);

-- ----------------------------
-- Table structure for cargo_persona
-- ----------------------------
DROP TABLE IF EXISTS `cargo_persona`;
CREATE TABLE `cargo_persona` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `cargo_id` int(11) NOT NULL,
  `persona_id` int(11) NOT NULL,
  `estado` int(11) NOT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  `usuario_created_at` int(11) DEFAULT NULL,
  `usuario_updated_at` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `cargo_cargo_persona_ibfk_1` (`cargo_id`) USING BTREE,
  KEY `persona_cargo_persona_ibfk_2` (`persona_id`) USING BTREE,
  CONSTRAINT `cargo_persona_ibfk_1` FOREIGN KEY (`cargo_id`) REFERENCES `cargos` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `cargo_persona_ibfk_2` FOREIGN KEY (`persona_id`) REFERENCES `personas` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=72 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of cargo_persona
-- ----------------------------
INSERT INTO `cargo_persona` VALUES ('7', '2', '5', '0', null, null, '1', '1');
INSERT INTO `cargo_persona` VALUES ('8', '3', '5', '1', null, null, '1', '1');
INSERT INTO `cargo_persona` VALUES ('9', '1', '5', '0', null, null, '1', '1');
INSERT INTO `cargo_persona` VALUES ('10', '3', '6', '0', null, null, '1', '1');
INSERT INTO `cargo_persona` VALUES ('12', '1', '6', '1', null, null, '1', '1');
INSERT INTO `cargo_persona` VALUES ('13', '2', '8', '1', null, null, '6', null);
INSERT INTO `cargo_persona` VALUES ('14', '2', '9', '1', null, null, '6', null);
INSERT INTO `cargo_persona` VALUES ('15', '2', '10', '1', null, null, '6', '6');
INSERT INTO `cargo_persona` VALUES ('16', '2', '11', '1', null, null, '6', '6');
INSERT INTO `cargo_persona` VALUES ('17', '2', '12', '1', null, null, '6', null);
INSERT INTO `cargo_persona` VALUES ('18', '1', '13', '1', null, null, '6', '6');
INSERT INTO `cargo_persona` VALUES ('19', '2', '14', '1', null, null, '6', null);
INSERT INTO `cargo_persona` VALUES ('20', '2', '15', '1', null, null, '6', null);
INSERT INTO `cargo_persona` VALUES ('21', '2', '16', '1', null, null, '6', null);
INSERT INTO `cargo_persona` VALUES ('22', '2', '17', '1', null, null, '6', null);
INSERT INTO `cargo_persona` VALUES ('23', '2', '18', '1', null, null, '6', null);
INSERT INTO `cargo_persona` VALUES ('24', '2', '19', '1', null, null, '6', null);
INSERT INTO `cargo_persona` VALUES ('25', '2', '20', '1', null, null, '6', null);
INSERT INTO `cargo_persona` VALUES ('26', '2', '21', '1', null, null, '6', null);
INSERT INTO `cargo_persona` VALUES ('27', '2', '22', '1', null, null, '6', null);
INSERT INTO `cargo_persona` VALUES ('28', '2', '23', '1', null, null, '6', null);
INSERT INTO `cargo_persona` VALUES ('29', '2', '24', '1', null, null, '6', null);
INSERT INTO `cargo_persona` VALUES ('30', '2', '25', '1', null, null, '6', null);
INSERT INTO `cargo_persona` VALUES ('31', '2', '26', '1', null, null, '6', null);
INSERT INTO `cargo_persona` VALUES ('32', '2', '27', '1', null, null, '6', '6');
INSERT INTO `cargo_persona` VALUES ('33', '2', '28', '1', null, null, '6', null);
INSERT INTO `cargo_persona` VALUES ('34', '2', '29', '1', null, null, '6', null);
INSERT INTO `cargo_persona` VALUES ('35', '2', '30', '1', null, null, '6', null);
INSERT INTO `cargo_persona` VALUES ('36', '2', '31', '1', null, null, '6', null);
INSERT INTO `cargo_persona` VALUES ('37', '2', '32', '1', null, null, '6', null);
INSERT INTO `cargo_persona` VALUES ('38', '2', '33', '1', null, null, '6', null);
INSERT INTO `cargo_persona` VALUES ('39', '2', '34', '1', null, null, '6', null);
INSERT INTO `cargo_persona` VALUES ('40', '2', '35', '1', null, null, '6', null);
INSERT INTO `cargo_persona` VALUES ('41', '2', '36', '1', null, null, '6', null);
INSERT INTO `cargo_persona` VALUES ('42', '2', '37', '1', null, null, '6', null);
INSERT INTO `cargo_persona` VALUES ('43', '2', '38', '1', null, null, '6', null);
INSERT INTO `cargo_persona` VALUES ('44', '2', '39', '1', null, null, '6', null);
INSERT INTO `cargo_persona` VALUES ('45', '2', '40', '1', null, null, '6', null);
INSERT INTO `cargo_persona` VALUES ('46', '2', '41', '1', null, null, '6', '6');
INSERT INTO `cargo_persona` VALUES ('47', '3', '42', '1', null, null, '6', '6');
INSERT INTO `cargo_persona` VALUES ('48', '3', '43', '1', null, null, '6', null);
INSERT INTO `cargo_persona` VALUES ('49', '3', '44', '1', null, null, '6', null);
INSERT INTO `cargo_persona` VALUES ('50', '3', '45', '1', null, null, '6', null);
INSERT INTO `cargo_persona` VALUES ('51', '3', '46', '1', null, null, '6', '6');
INSERT INTO `cargo_persona` VALUES ('52', '3', '47', '1', null, null, '6', null);
INSERT INTO `cargo_persona` VALUES ('53', '3', '48', '1', null, null, '6', null);
INSERT INTO `cargo_persona` VALUES ('54', '3', '48', '1', null, null, '6', null);
INSERT INTO `cargo_persona` VALUES ('55', '3', '49', '1', null, null, '6', null);
INSERT INTO `cargo_persona` VALUES ('56', '3', '50', '1', null, null, '6', null);
INSERT INTO `cargo_persona` VALUES ('57', '3', '51', '1', null, null, '6', null);
INSERT INTO `cargo_persona` VALUES ('58', '3', '52', '1', null, null, '6', null);
INSERT INTO `cargo_persona` VALUES ('59', '2', '53', '1', null, null, '6', null);
INSERT INTO `cargo_persona` VALUES ('60', '2', '53', '1', null, null, '6', null);
INSERT INTO `cargo_persona` VALUES ('61', '2', '54', '1', null, null, '6', null);
INSERT INTO `cargo_persona` VALUES ('62', '2', '54', '1', null, null, '6', null);
INSERT INTO `cargo_persona` VALUES ('63', '2', '55', '1', null, null, '6', null);
INSERT INTO `cargo_persona` VALUES ('64', '2', '56', '1', null, null, '6', null);
INSERT INTO `cargo_persona` VALUES ('65', '2', '57', '1', null, null, '6', '6');
INSERT INTO `cargo_persona` VALUES ('66', '2', '58', '1', null, null, '6', null);
INSERT INTO `cargo_persona` VALUES ('67', '2', '59', '1', null, null, '6', null);
INSERT INTO `cargo_persona` VALUES ('68', '2', '60', '1', null, null, '6', null);
INSERT INTO `cargo_persona` VALUES ('69', '2', '61', '1', null, null, '6', null);
INSERT INTO `cargo_persona` VALUES ('70', '2', '62', '1', null, null, '6', null);
INSERT INTO `cargo_persona` VALUES ('71', '2', '63', '1', null, null, '6', null);

-- ----------------------------
-- Table structure for carreras
-- ----------------------------
DROP TABLE IF EXISTS `carreras`;
CREATE TABLE `carreras` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(80) DEFAULT NULL,
  `tipo_carrera_id` int(11) DEFAULT NULL,
  `estado` int(1) DEFAULT '1',
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  `usuario_created_at` int(11) DEFAULT NULL,
  `usuario_updated_at` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `c_tipo_carrera_id` (`tipo_carrera_id`) USING BTREE,
  CONSTRAINT `carreras_ibfk_1` FOREIGN KEY (`tipo_carrera_id`) REFERENCES `tipo_carrera` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=30 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of carreras
-- ----------------------------
INSERT INTO `carreras` VALUES ('1', 'Contabilidad', '2', '1', '2015-10-19 02:36:46', null, '1', null);
INSERT INTO `carreras` VALUES ('2', 'Computacion e Informatica', '2', '1', '2015-10-19 02:36:46', null, '1', null);
INSERT INTO `carreras` VALUES ('3', 'Secretariado', '2', '1', '2015-10-19 02:36:46', null, '1', null);
INSERT INTO `carreras` VALUES ('4', 'Administracion', '2', '1', '2015-10-19 02:36:46', null, '1', null);
INSERT INTO `carreras` VALUES ('5', 'Telematica', '2', '1', '2015-10-19 02:36:46', null, '1', null);
INSERT INTO `carreras` VALUES ('6', 'Telecomunicaciones', '2', '1', '2015-10-19 02:36:46', null, '1', null);
INSERT INTO `carreras` VALUES ('7', 'Administracion Finanzas y Negocios Globales', '3', '1', '2015-10-19 02:36:46', null, '1', null);
INSERT INTO `carreras` VALUES ('8', 'Administracion de Negocios Turismo y Hoteleria', '3', '1', '2015-10-19 02:36:46', null, '1', null);
INSERT INTO `carreras` VALUES ('9', 'Derecho Corporativo', '3', '1', '2015-10-19 02:36:46', null, '1', null);
INSERT INTO `carreras` VALUES ('10', 'Contabilidad y Finanzas', '3', '1', '2015-10-19 02:36:46', null, '1', null);
INSERT INTO `carreras` VALUES ('11', 'Psicologia', '3', '1', '2015-10-19 02:36:46', null, '1', null);
INSERT INTO `carreras` VALUES ('12', 'Ciencias de la Comunicacion', '3', '1', '2015-10-19 02:36:46', null, '1', null);
INSERT INTO `carreras` VALUES ('13', 'Marketing y Negocios Globales', '3', '1', '2015-10-19 02:36:46', null, '1', null);
INSERT INTO `carreras` VALUES ('14', 'Medicina Humana', '3', '1', '2015-10-19 02:36:46', null, '1', null);
INSERT INTO `carreras` VALUES ('15', 'Ingenieria Industrial', '3', '1', '2015-10-19 02:36:46', null, '1', null);
INSERT INTO `carreras` VALUES ('16', 'Ingenieria de Sistemas e Informatica', '3', '1', '2015-10-19 02:36:46', null, '1', null);
INSERT INTO `carreras` VALUES ('17', 'Ingenieria de Sistemas y Telecomunicaciones', '3', '1', '2015-10-19 02:36:46', null, '1', null);
INSERT INTO `carreras` VALUES ('18', 'Ingenieria Industrial y Comercial', '3', '1', '2015-10-19 02:36:46', null, '1', null);
INSERT INTO `carreras` VALUES ('19', 'Ingenieria Civil', '3', '1', '2015-10-19 02:36:46', null, '1', null);
INSERT INTO `carreras` VALUES ('20', 'Ingenieria Electronica y Telecomunicaciones', '3', '1', '2015-10-19 02:36:46', null, '1', null);
INSERT INTO `carreras` VALUES ('21', 'Ingenieria Agroindustrial', '3', '1', '2015-10-19 02:36:46', null, '1', null);
INSERT INTO `carreras` VALUES ('22', 'Arquitectura y Urbanismo', '3', '1', '2015-10-19 02:36:46', null, '1', null);
INSERT INTO `carreras` VALUES ('23', 'Economia y Negocios Globales', '3', '1', '2015-10-19 02:36:46', null, '1', null);
INSERT INTO `carreras` VALUES ('24', 'Odontologia', '3', '1', '2015-10-19 02:36:46', null, '1', null);
INSERT INTO `carreras` VALUES ('25', 'Obstreticia', '3', '1', '2015-10-19 02:36:46', null, '1', null);
INSERT INTO `carreras` VALUES ('26', 'Enfermeria', '3', '1', '2015-10-19 02:36:46', null, '1', null);
INSERT INTO `carreras` VALUES ('27', 'Nutricion Salud y Tecnologia de los Alimentos', '3', '1', '2015-10-19 02:36:46', null, '1', null);
INSERT INTO `carreras` VALUES ('28', 'Gastronomia, Arte Culinario y Gestion de Restaurantes', '3', '1', '2015-10-19 02:36:46', null, '1', null);
INSERT INTO `carreras` VALUES ('29', 'Nueva Carrera', '2', '1', '2015-10-23 20:42:37', '2015-10-23 20:42:56', '1', '1');

-- ----------------------------
-- Table structure for ciclos
-- ----------------------------
DROP TABLE IF EXISTS `ciclos`;
CREATE TABLE `ciclos` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(5) DEFAULT NULL,
  `estado` int(1) DEFAULT '1',
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  `usuario_created_at` int(11) DEFAULT NULL,
  `usuario_updated_at` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of ciclos
-- ----------------------------
INSERT INTO `ciclos` VALUES ('1', 'I', '1', '2015-10-19 00:13:33', null, '1', null);
INSERT INTO `ciclos` VALUES ('2', 'II', '1', '2015-10-19 00:13:33', null, '1', null);
INSERT INTO `ciclos` VALUES ('3', 'III', '1', '2015-10-19 00:13:33', null, '1', null);
INSERT INTO `ciclos` VALUES ('4', 'IV', '1', '2015-10-19 00:13:33', null, '1', null);
INSERT INTO `ciclos` VALUES ('5', 'V', '1', '2015-10-19 00:13:33', null, '1', null);
INSERT INTO `ciclos` VALUES ('6', 'VI', '1', '2015-10-19 00:13:33', null, '1', null);
INSERT INTO `ciclos` VALUES ('7', 'VII', '1', '2015-10-19 00:13:33', null, '1', null);
INSERT INTO `ciclos` VALUES ('8', 'VIII', '1', '2015-10-19 00:13:33', null, '1', null);
INSERT INTO `ciclos` VALUES ('9', 'IX', '1', '2015-10-19 00:13:33', null, '1', null);
INSERT INTO `ciclos` VALUES ('10', 'X', '1', '2015-10-19 00:13:33', null, '1', null);

-- ----------------------------
-- Table structure for estado_problema
-- ----------------------------
DROP TABLE IF EXISTS `estado_problema`;
CREATE TABLE `estado_problema` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(50) DEFAULT NULL,
  `estado_problema` int(1) DEFAULT NULL COMMENT '0: Finalizado | 1:Pendiente',
  `clase_boton` varchar(20) DEFAULT 'default' COMMENT 'default primary success info warning danger',
  `estado` int(1) DEFAULT '1',
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  `usuario_created_at` int(11) DEFAULT NULL,
  `usuario_updated_at` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of estado_problema
-- ----------------------------
INSERT INTO `estado_problema` VALUES ('1', 'En espera', '1', 'default', '1', '2015-10-19 00:28:45', null, '1', null);
INSERT INTO `estado_problema` VALUES ('2', 'Atendiendo', '1', 'info', '1', '2015-10-19 00:28:45', null, '1', null);
INSERT INTO `estado_problema` VALUES ('3', 'Solucionado', '0', 'success', '1', '2015-10-19 00:28:45', null, '1', null);
INSERT INTO `estado_problema` VALUES ('4', 'Rechazado', '0', 'warning', '1', '2015-10-19 00:28:45', null, '1', null);
INSERT INTO `estado_problema` VALUES ('5', 'Cancelado', '0', 'danger', '1', '2015-10-19 00:28:45', null, '1', null);

-- ----------------------------
-- Table structure for institutos
-- ----------------------------
DROP TABLE IF EXISTS `institutos`;
CREATE TABLE `institutos` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `modalidad_id` int(11) DEFAULT NULL,
  `nombre` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `estado` int(1) DEFAULT '1',
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  `usuario_created_at` int(11) DEFAULT NULL,
  `usuario_updated_at` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- ----------------------------
-- Records of institutos
-- ----------------------------

-- ----------------------------
-- Table structure for institutos_carreras
-- ----------------------------
DROP TABLE IF EXISTS `institutos_carreras`;
CREATE TABLE `institutos_carreras` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `instituto_id` int(11) DEFAULT NULL,
  `carrera_id` int(11) DEFAULT NULL,
  `estado` int(1) DEFAULT '1',
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  `usuario_created_at` int(11) DEFAULT NULL,
  `usuario_updated_at` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of institutos_carreras
-- ----------------------------

-- ----------------------------
-- Table structure for institutos_ciclos
-- ----------------------------
DROP TABLE IF EXISTS `institutos_ciclos`;
CREATE TABLE `institutos_ciclos` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `instituto_id` int(11) DEFAULT NULL,
  `ciclo` varchar(20) DEFAULT NULL,
  `estado` int(1) DEFAULT '1',
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  `usuario_created_at` int(11) DEFAULT NULL,
  `usuario_updated_at` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of institutos_ciclos
-- ----------------------------

-- ----------------------------
-- Table structure for menus
-- ----------------------------
DROP TABLE IF EXISTS `menus`;
CREATE TABLE `menus` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(80) NOT NULL,
  `ruta` varchar(100) DEFAULT NULL,
  `class_icono` varchar(50) NOT NULL COMMENT 'Clase del icono a mostrar',
  `estado` int(11) NOT NULL DEFAULT '1',
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  `usuario_created_at` int(11) DEFAULT NULL,
  `usuario_updated_at` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of menus
-- ----------------------------
INSERT INTO `menus` VALUES ('1', 'Procesos', 'proceso', 'fa-gears', '1', '2015-10-18 20:58:53', null, '1', null);
INSERT INTO `menus` VALUES ('2', 'Mantenimiento', 'mantenimiento', 'fa-table', '1', '2015-10-18 20:58:53', null, '1', null);
INSERT INTO `menus` VALUES ('3', 'Reportes', 'reporte', 'fa-list-alt', '1', '2015-10-18 20:58:53', null, '1', null);

-- ----------------------------
-- Table structure for modalidades
-- ----------------------------
DROP TABLE IF EXISTS `modalidades`;
CREATE TABLE `modalidades` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(50) DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  `usuario_created_at` int(11) DEFAULT NULL,
  `usuario_updated_at` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of modalidades
-- ----------------------------

-- ----------------------------
-- Table structure for opciones
-- ----------------------------
DROP TABLE IF EXISTS `opciones`;
CREATE TABLE `opciones` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `menu_id` int(11) NOT NULL,
  `nombre` varchar(80) NOT NULL,
  `ruta` varchar(100) NOT NULL,
  `estado` int(11) NOT NULL DEFAULT '1',
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  `usuario_created_at` int(11) DEFAULT NULL,
  `usuario_updated_at` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `o_menu_id_idx` (`menu_id`) USING BTREE,
  CONSTRAINT `opciones_ibfk_1` FOREIGN KEY (`menu_id`) REFERENCES `menus` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of opciones
-- ----------------------------
INSERT INTO `opciones` VALUES ('1', '1', 'Registrar Problema', 'registrarproblema', '1', '2015-10-18 21:10:17', null, '1', null);
INSERT INTO `opciones` VALUES ('2', '1', 'Solucionar Problema', 'solucionarproblema', '1', '2015-10-18 21:10:17', null, '1', null);
INSERT INTO `opciones` VALUES ('3', '2', 'Personas', 'persona', '1', '2015-10-18 21:10:17', null, '1', null);
INSERT INTO `opciones` VALUES ('4', '2', 'Sedes', 'sede', '1', '2015-10-18 21:10:17', null, '1', null);
INSERT INTO `opciones` VALUES ('5', '2', 'Tipos Problemas', 'tipoproblema', '1', '2015-10-18 21:10:17', null, '1', null);
INSERT INTO `opciones` VALUES ('6', '2', 'Estados Problemas', 'estadoproblema', '0', '2015-10-18 21:10:17', null, '1', null);
INSERT INTO `opciones` VALUES ('8', '2', 'Cargos', 'cargo', '1', '2015-10-18 21:10:17', null, '1', null);
INSERT INTO `opciones` VALUES ('9', '2', 'Carreras', 'carrera', '1', '2015-10-18 21:10:17', null, '1', null);
INSERT INTO `opciones` VALUES ('10', '3', 'Consultas de Problemas', 'consultaproblema', '1', '2015-10-18 21:10:17', null, '1', null);

-- ----------------------------
-- Table structure for personas
-- ----------------------------
DROP TABLE IF EXISTS `personas`;
CREATE TABLE `personas` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `paterno` varchar(50) NOT NULL,
  `materno` varchar(50) NOT NULL,
  `nombre` varchar(80) NOT NULL,
  `dni` varchar(11) NOT NULL,
  `sexo` char(1) DEFAULT NULL,
  `email` varchar(100) DEFAULT NULL,
  `password` varchar(100) NOT NULL,
  `fecha_nacimiento` date DEFAULT NULL,
  `estado` int(11) NOT NULL DEFAULT '1',
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  `usuario_created_at` int(11) DEFAULT NULL,
  `usuario_updated_at` int(11) DEFAULT NULL,
  `imagen` varchar(100) DEFAULT NULL,
  `remember_token` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=64 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of personas
-- ----------------------------
INSERT INTO `personas` VALUES ('5', 'Galvez', 'Esquivel', 'Junior', '47869502', 'M', 'junior@gmail.com', '$2y$10$DOnktX5AIG5dcH3N3WANOOo79Hmwk6r.nQm/GXWiwvmYC3Nexdtvq', '2016-04-26', '1', '2016-05-30 20:22:19', '2016-05-31 18:54:44', '1', '1', null, 'Yldt7IalFulO4UmGjJKxqHatbZ5Nz77sC8YWzZtSTUtkmNB9h68tJcB4R6DE');
INSERT INTO `personas` VALUES ('6', 'HUAMANI', 'QUILLAS', 'MARLENE', '07501051', 'F', 'HUAMANI@GMAIL.COM', '$2y$10$5g1vjJH6RB8VRjvarIayk.WkC5nz7hK62EiKVKsrLj/SdFELE6qzi', '2016-06-02', '1', '2016-06-02 16:38:08', '2016-06-09 21:09:32', '1', '1', null, '4fYbkYhxRfwWcIPq3LOxzdmx5ymYKiJ9jY9ZGhWujOcVocFcWCWgWHG0KQn2');
INSERT INTO `personas` VALUES ('8', 'ANCCORI', 'BUSTAMANTE', 'RICHARD JULIO', '24694274', 'M', 'consorciotelesupcusco@gmail.com', '$2y$10$fBXsF0Z1dnn508vp4lcIdObn2V5YNodptW91tZ9SUID7wA1QvVvny', '1973-02-05', '1', '2016-06-04 12:46:21', '2016-06-04 13:17:05', '6', null, 'u8.jpg', 'fRtXtksIQOdOPAvJuZk6U7QmSz7Tti2gZNl5gszD89geEiTB3kpoULIK4z1f');
INSERT INTO `personas` VALUES ('9', 'SANCHEZ', 'HUAMAN', 'ALEX', '45060765', 'M', 'uptctv@telesup.net', '$2y$10$gLsVMM7uT/VvQOHEjtogW.0r0KjzR0Pbn7kQaKLW.wH4Ug5LdUrj6', '1988-04-04', '1', '2016-06-04 12:55:04', '2016-06-04 12:59:50', '6', null, null, 'N2yGeB8hqkbKUmjWKPJfLPOLNQRdXQ6aIHbWQMt5rkFGxV4twpel5Wqo1u0C');
INSERT INTO `personas` VALUES ('10', 'CARRANZA', 'REGALADO', 'ROCIO DEL PILAR', '43824195', 'F', 'consorciotelesuparequipa@gmail.com', '$2y$10$bbSxkecEDTCf6EH3HtZsS.zpfH/D6RW9FOGCncOaBb2/npjgNv5AG', '1986-09-01', '1', '2016-06-04 13:06:02', '2016-06-06 10:00:24', '6', '6', null, 'xWgcxfgcbTxNKUe8PLH38HEXq3FqSjiaKys8E94Giw0Wo5XwIgdmz9cEEv2l');
INSERT INTO `personas` VALUES ('11', 'GUTIERREZ', 'BRIGADA', 'MAYCO MAX', '44342503', 'M', 'consorciotelesupayacucho@gmail.com', '$2y$10$JOtPetu90O3RbqrBPBkvl.2aTgF0HMnvHhlItj1qkRSNoBw/wf6ty', '1984-09-11', '1', '2016-06-04 13:09:59', '2016-06-04 14:22:10', '6', '6', null, '0E2dhKR9KFWpztDLrSmvMbiLrnR4yBHF5DB3aWsYiWJZnjmshMN1gcjyjr8Q');
INSERT INTO `personas` VALUES ('12', 'POMA', 'MOZO', 'JUAN CLAUDIO', '41545132', 'M', 'consorciotelesupbagua@gmail.com', '$2y$10$Pw6MY8nlufmEgEV0xrg5COgIPJO4kaa0quVgfczxmXvxwmq3bIve6', null, '1', '2016-06-04 13:21:50', '2016-06-04 13:21:50', '6', null, null, null);
INSERT INTO `personas` VALUES ('13', 'CHAVEZ', 'INGA', 'YANI FERR', '76641264', 'F', 'yeniferinga2903@hotmail.com', '$2y$10$AW73jcRywpIpHLBC.V0.j.AGnskqIhtVhX1r5tJsslUR38j32hlSa', '1995-03-29', '1', '2016-06-04 13:37:33', '2016-06-04 20:15:22', '6', '6', null, 'WK7hQ1q1joNeMtHwAKNSfK97OPw58GmapzlXCVQ39i7C6tDGCRcqVDrFWYxt');
INSERT INTO `personas` VALUES ('14', 'ESCOBAR', 'TAIPE', 'OLGA', '41268617', 'F', 'consorciotelesupohuancavelica@gmail.com', '$2y$10$IwZA9jAqD9Noi2GfJFvhS.VSLfrA60YRayy7DvGgdDtmnf0ZqpwIG', '1982-02-20', '1', '2016-06-06 08:41:54', '2016-06-06 10:11:13', '6', null, 'u14.xlsx', '2ONNlsdIS86VHD7ncZJgMf3FISRhlqlOPMdpUJ55FJmjjXo0HJf9tFyxupkl');
INSERT INTO `personas` VALUES ('15', 'JARA', 'NAVARRETE', 'LUIS GUILLERMO', '16719360', 'M', 'uptchiclayo@hotmail.com', '$2y$10$xMba44NTc4c016/ZotA6u.GWCptLpDkWRK1q4XQNLtsMOEJ6uEr/S', '1974-02-14', '1', '2016-06-06 09:08:49', '2016-06-06 09:38:58', '6', null, null, 'BKtfOBwYTDpuQ28Ibj4IfwsCQyRcv0eSwTRUW0BBVpttjMN1sQwwk3xgH3LM');
INSERT INTO `personas` VALUES ('16', 'MODESTO', 'AGUILAR', 'SILVANA', '20018762', 'F', 'consorciotelesuppasco@gmail.com', '$2y$10$e93wz5r.0jU1mYoeDk49cujMSZ5enbftlV/XcMlzWHuYfrMHgnQU.', '1970-07-02', '1', '2016-06-06 09:23:35', '2016-06-21 12:37:31', '6', null, null, 'RNS04KNvJRSO6QgkK7TksfGqYrEed1smmzjSkWMUCPaGq722H8oovxGLmaMa');
INSERT INTO `personas` VALUES ('17', 'LAQUISE', 'FUENTES', 'HERMOGENES ROMULO', '01288185', 'M', 'consorciotelesuppuno@gmail.com', '$2y$10$y5RO80AvtU7DVmjN6poq/u7WE0O0YUKUYGm0bEkf8GfnYC.DNHDeO', '1967-07-07', '1', '2016-06-06 09:33:21', '2016-06-06 12:20:13', '6', null, null, 'Y8ToSjyiXWXlEZyx9ZQgfexjE9qE8d8b2lhhjkKwixbUORhNk5Tbii6D6OIU');
INSERT INTO `personas` VALUES ('18', 'HUAMAN', 'HUAYTA', 'MEDALY', '72198447', 'F', 'consorciotelesupica@gmail.com', '$2y$10$O/Jd1EC0hZDDB.phQkcaaez4pfQJ0cfmBNv4YtAUnDsvF8sTcT2IW', '1992-05-15', '1', '2016-06-06 09:39:50', '2016-06-06 10:11:42', '6', null, null, 'r9hAlt1g4x1X3fF90z9882zdPefWa6Le1qJ2w81a8fWUDE27BHTCZVtlUhfW');
INSERT INTO `personas` VALUES ('19', 'CASHU', 'SANCHEZ', 'MANUELA GEORGINA', '05365224', 'F', 'consorciotelesupiquitos@gmail.com', '$2y$10$1BcseYpoDSV4rnL7AiNRtOc.V9cUB4iArpvBO9whHH/4Kmzv33AxG', '1975-12-24', '1', '2016-06-06 09:49:02', '2016-07-01 09:59:10', '6', null, null, 'EYUvSgWhRDXw2W3k4Gc3dO9upuoNhCtOEX0PJ89FrzxmanWTqG9z5qdunI1R');
INSERT INTO `personas` VALUES ('20', 'GUTIERREZ', 'SALOME', 'PAMELA', '46082105', 'F', 'consorciotelesuphuacho@gmail.com', '$2y$10$NYEr2JYSx5UIK6f09gH/Oe9ukENdIaKMbpj/F0oYPlVVLrMc.34Va', '1989-11-03', '1', '2016-06-06 10:02:36', '2016-06-10 08:31:06', '6', null, null, 'RQbl6A0zKrhuZOTs0qpYmLrBGBCDo2rY4gRG4CACEyKeoctuxV8qQpA55fAc');
INSERT INTO `personas` VALUES ('21', 'GONZALES', 'ALVARADO', 'SANDRA JOOVANA', '43738549', 'F', 'uptcajamarca@hotmail.com', '$2y$10$XtaheEEN.yozYqF9IWbvWO6PzE7jWU5WQIJVVqb78NqKbEHYDVrWW', '1986-08-14', '1', '2016-06-06 10:09:05', '2016-06-06 11:57:48', '6', null, null, 'AsV5jlSPJgsa61E79SXDk0C4sioZb5AihvCREXhFyWUA2Z0VHVyiZCBRYvNP');
INSERT INTO `personas` VALUES ('22', 'CASTROMONTE', 'NATIVIDAD', 'ABELARDO LOLI', '44309720', 'F', 'upthuaraz1@yahoo.es', '$2y$10$reeTQ65RNK/BU14fD.v5KeepVwmh3TsZ7gYZf8YmGqcZQ454g6ZPW', '1987-05-08', '1', '2016-06-06 10:18:30', '2016-06-06 10:18:30', '6', null, null, null);
INSERT INTO `personas` VALUES ('23', 'FLORES', 'HUAMAN', 'CARLOS', '80369951', 'M', 'ptotelesup@yahoo.com', '$2y$10$qnnERg/uTivdBlYJgTVW3eMlMQe0QXEfoV2NoIQhNjCUAosIPeMb.', '1978-12-11', '1', '2016-06-06 10:24:43', '2016-06-07 11:30:12', '6', null, null, '4iCPrK9V7oJJFKh9tt1DjIy2ThCz5WNfmEuuIRQfyRs7XdkZk3eoxeLZFhQl');
INSERT INTO `personas` VALUES ('24', 'CACERES', 'CANQUI', 'ANDREAMERICO', '47044103', 'M', 'consorciotelesuptacna@gmail.com', '$2y$10$vLAKVBbZdjWiuGBBUopvhO9jv8akn8aL.JNyTp4gJGsV8WJeYLVQq', '1992-04-13', '1', '2016-06-06 10:48:59', '2016-06-06 11:27:02', '6', null, null, 'ixNiaPFU6K4RUptMUxOPkJfcloRBjVmWUMIZqgtHZHdIwqUNcXJ3hsxXrI2i');
INSERT INTO `personas` VALUES ('25', 'CRUZ', 'GUTIERREZ', 'LEDGAR RISEÑO', '44777845', 'M', 'consorciotelesupjuliaca@gmail.com', '$2y$10$VVDakZYTPGNyi4KKRl6fwum1twp2dxaIue2MwS84u4fx0HWTGqUkW', '1987-10-29', '1', '2016-06-06 10:55:40', '2016-06-06 11:21:20', '6', null, null, 'cgxKIvhI4301KOoOiR5sX3TfFo0Axa6kOQNLOQA15cCEmbIagwGwOr2npPlj');
INSERT INTO `personas` VALUES ('26', 'BALDEON', 'SANCHEZ', 'DALINDA KAREM', '41826450', 'F', 'gemita2710@hotmail.com', '$2y$10$S.k9LCC2/Rn4zVHJfazjQOFxnWBGLRoAAf5JtHdV63SG6khuL9jZm', '1981-03-10', '1', '2016-06-06 11:09:52', '2016-06-07 08:09:15', '6', null, null, 'smlHChNtR10aVz7V3yDKlloQbkLGMaoKsp1JiVIoomxinjWJ6Sbmne33q78O');
INSERT INTO `personas` VALUES ('27', 'LOLI', 'RIVERA', 'FELIPE SANTIAGO', '44678097', 'M', 'uptchimbote@hotmail.com', '$2y$10$O29XSjZWSHz.U2xdLayCDedOirp.T.gZfyyEI0.5BTqmJjOUKFdX2', '1987-04-23', '1', '2016-06-06 11:23:59', '2016-06-06 16:10:20', '6', '6', null, 'JdhDLERtPe2eE1on1t9oNIxY1L5Z4M0rw93jXXKxTjhhLcbVpgDp74iJhoPg');
INSERT INTO `personas` VALUES ('28', 'MEDINA', 'PAITA', 'RUDY', '44443411', 'F', 'consorciotelesuphuancayo@gmail.com', '$2y$10$sAOEM1ON69M0k5y0s7dNquHhFUK/pwLhjbhUjGNlNQdfxIg2UEbCS', '1987-01-27', '1', '2016-06-06 11:33:22', '2016-06-06 12:34:24', '6', null, 'u28.png', 'E6aEOsd5Bkdjw80EG1dMjJSeDTI6X4dbV9x3OCsjJUpnCa0o36SxafqhfSDr');
INSERT INTO `personas` VALUES ('29', 'SALDARRIAGA', 'OLIVERA', 'FRANCISCO JAVIER', '08155463', 'M', 'consorciotelesuphuaral@gmail.com', '$2y$10$4houB17mHuTNFrRGuZQ95eFQWpX40HyIj4fHx65z.uBi.HBMHfODS', null, '1', '2016-06-06 11:40:52', '2016-06-07 09:23:40', '6', null, null, '1KCC13RYGwRStXsm4hMtPBQAgQ6ENEYjon4nUDKclebHkTxZ6dVPC8AqGeyp');
INSERT INTO `personas` VALUES ('30', 'SANTA CRUZ', 'QUIROZ', 'FERNANDO', '16672637', 'M', 'consorciotelesupjaen@gmail.com', '$2y$10$/RNri9mOKe096DmyKv3CKO7JUJLf0OcQruiVYH.ykr6nE4avV/Cpm', null, '1', '2016-06-06 11:55:19', '2016-06-06 13:50:31', '6', null, null, 'uOfMJ9ibpzA4nAs9hKJytkagScjPmNVCCZv1rVzsZZPmvFfgWMvGBCKV4uZ8');
INSERT INTO `personas` VALUES ('31', 'ILLACUTIPA', 'CHARA', 'DENIS', '48095564', 'M', 'consorciotelesupmoquegua@gmail.com', '$2y$10$jZFO3ZtHTyRlRJ8siNEc8O2XyYK5ew6OMtravWYx0twsJkSs7Qy.W', null, '1', '2016-06-06 12:07:07', '2016-06-06 12:07:07', '6', null, null, null);
INSERT INTO `personas` VALUES ('32', 'OSORIO', 'ZUÑIGA', 'WINY', '48691324', 'M', 'consorciotelesupnazca@gmail.com', '$2y$10$MiDuBQodMvzSKEj9H0n4vuY1D9jNDH2ooMyp9vAthX2qsqsxmc42C', null, '1', '2016-06-06 12:12:57', '2016-06-12 09:53:53', '6', null, null, 'pAD6xs223Lm6NcRPczjUk8R6whjTL1Aht7MFbiA5XVERGFpz8NBCXhFCAsD4');
INSERT INTO `personas` VALUES ('33', 'MARTINEZ', 'TRILLO', 'JONATHAN JESUS', '47885907', 'M', 'consorciotelesuppisco@gmail.com', '$2y$10$ZzEneS6ZQI/ewkiMeRLt7u6kI0sKQd2wHmU82qqmz8M4b6pqWCHza', null, '1', '2016-06-06 12:17:19', '2016-06-06 19:16:31', '6', null, null, 'Zw5ihHByV2kBlv4knRimvbAInCipL2lQQ6VlSYFKYNSeUvyxLJjh7Muu3sgU');
INSERT INTO `personas` VALUES ('34', 'ROJAS', 'AGURTO', 'JULISSA VERONICA', '16697144', 'F', 'julissarojas1@hotmail.com', '$2y$10$TdJ/bgALpacAyMvOD2atQebe4L6daYltTZvrTV5I65zkUqJz30FbK', null, '1', '2016-06-06 12:22:55', '2016-06-06 15:52:12', '6', null, null, 'E6RdF6BZGh1TQHAS76JIiAG55RoVU37M5x2lrOpQlVoKbGf6JrqFeuR6pDgj');
INSERT INTO `personas` VALUES ('35', 'SUAREZ', 'ALEGRIA', 'RAFAEL', '10509720', 'M', 'consorciotelesuppucallpa@gmail.com', '$2y$10$flKHNeAYcWC8hYibV6hlTORpjhuXjteeNSNQOt9l0mwM8SsMlWPjq', null, '1', '2016-06-06 12:28:00', '2016-07-22 15:39:52', '6', null, 'u35.jpg', 'xACLLxOO4DFSdfWfhKRrjQYT6STmOEWYw1FM6Ps8sU2zyaYGjKTnflJMUS13');
INSERT INTO `personas` VALUES ('36', 'CCORIMANYA', 'CORDERO', 'ESPERANZA', '10198938', 'F', 'consorciotelesupsicuani@gmail.com', '$2y$10$z0M0Q0MQOwK7tyjn8/yXi.dwxyiGj9PzuE17hr49q4JAsteBYY9hm', null, '1', '2016-06-06 12:33:06', '2016-06-06 12:33:06', '6', null, null, null);
INSERT INTO `personas` VALUES ('37', 'FLORES', 'PATIÑO', 'BEYBY', '46870011', 'F', 'upttrujillo@hotmail.com', '$2y$10$wHBB9x/c6EhGzrIRW8gppeHzwtiRbd867b9OQ.ltRHdmGoAhVb89y', null, '1', '2016-06-06 12:40:54', '2016-06-06 12:40:54', '6', null, null, null);
INSERT INTO `personas` VALUES ('38', 'LUNA', 'ROSILLO', 'NELCY JANETH ', '44613978', 'F', 'upttum@telesup.net', '$2y$10$RIIsP1porLSehlW.mkcIsOwZRNiNbP0WmuNLVm0wtaT5FgHHjZrz6', '1987-11-04', '1', '2016-06-06 12:55:30', '2016-06-27 09:55:09', '6', null, null, '5VxPvsrjfTD9ltdE1RxfQJGyvE1gfGLWtIBGEW4ddCPhiOLkapIvk7K6V68e');
INSERT INTO `personas` VALUES ('39', 'LOPEZ', 'TARRILLO', 'SHILEIR EDWIN', '47096429', 'M', 'shilico_selt@hotmail.com', '$2y$10$NJvYClorWLaYJTkmNsTIru0WE0g9SnSia894tQ3VtSWN69moFgPwW', null, '1', '2016-06-06 13:06:18', '2016-06-06 17:21:44', '6', null, null, 'dupjY3oCJbPW0btnVb8c1GDIlGuBMa6ogup61RBBkSNnZpoM8aF7rJnRlQ0x');
INSERT INTO `personas` VALUES ('40', 'MORA', 'ARDILES', 'ZOICA', '25002224', 'F', 'consorciotelesupcanete@gmail.com', '$2y$10$JEUjHSknFayh1C0LaRAUoeFMKibzhfzXO08zbQ6nglEAzWgEsg6V.', null, '1', '2016-06-06 13:10:55', '2016-06-06 14:55:42', '6', null, null, '8abWXXSi3j3wUmirId6zyLFeFru16LHXs1Kvet2DIVJapSxg2Qgetj8eLB3b');
INSERT INTO `personas` VALUES ('41', 'ROJAS', 'CARDENAS', 'RUTH ELVIRA', '09719316', 'F', 'consorciotelesupabancay@gmail.com', '$2y$10$Be2gna1B6vlWR.dJYL.Pp.M6xoVu..6e6rME4LFvkmqUXFaSCcuTO', null, '1', '2016-06-06 13:16:48', '2016-06-14 14:08:19', '6', '6', null, '8fERWMsWr7Nq2kpOizKG1SAfuApWWGK9NC7hBHfjhy7EhPrXWgrPiQMiwycA');
INSERT INTO `personas` VALUES ('42', 'LOPEZ', 'SIPIRAN', 'PERCY WALTHER ALONSO', '42240431', 'M', 'alonso071630@gmail.com', '$2y$10$JDAPDxDw9IoZDGQVeDXQUO5Iraa38gw2AiU5XNpxYgrpv/6/j9a0a', '1980-07-30', '1', '2016-06-06 15:23:22', '2016-06-06 19:25:47', '6', '6', null, null);
INSERT INTO `personas` VALUES ('43', 'BINASCO', 'JARAMILLO', 'KARLA MELISSA', '40226302', 'F', 'telesupacademico@gmail.com', '$2y$10$pvIXbpcppY0xrXxu7WydH.s4j2JSQUgyaLUV.5GG9HureUAZOJMD.', null, '1', '2016-06-06 15:37:45', '2016-06-07 15:51:24', '6', null, null, 'GFbo4UXohElbWUGaqLQk9t2riieqBqHDpenuoPv81arN0Ph8yrf6EvOd9NJf');
INSERT INTO `personas` VALUES ('44', 'MIRANDA', 'CHAVEZ', 'ROSALINA', '47362642', 'F', 'rosalinamiranda41@gmail.com', '$2y$10$EpkADc406LT3De0/owpX7eDN..UH3VmQAZEY1aX1S4dookzaDUByK', null, '1', '2016-06-06 16:02:16', '2016-06-06 16:02:16', '6', null, null, null);
INSERT INTO `personas` VALUES ('45', 'CARRASCO', 'SAJAMI', 'EUSEBIO', '45840801', 'M', 'colectivarecords@gmail.com', '$2y$10$d6XzeviYyR6BtYKCS8oHquP7K7Jj5WLeX1RBd/sVu7Vir9JL7oE4W', null, '1', '2016-06-06 16:06:07', '2016-06-28 12:10:20', '6', null, 'u45.jpg', 'FLHq7uv5C8c1yN0MsXYiaHTsvU4uVBxU4tKVCWJJQ4n3Drdnk527mu7TU7Pl');
INSERT INTO `personas` VALUES ('46', 'LAINEZ', 'CHACON', 'WALTER GUILLERMO', '06103338', 'M', 'wg_lainez@yahoo.es', '$2y$10$dbe/FkTetm1GNIO2/ZirDelFiwcSgEq/CCWozeKV9tGzqN/wOo7.u', '1966-03-28', '1', '2016-06-06 17:14:03', '2016-06-10 20:52:15', '6', '6', null, 'MAmYHFOsR6EfrDyVfRT6rMwgZ6pTvauhpT8ojo3cWaKE3gGM4RqiWkuJz5qu');
INSERT INTO `personas` VALUES ('47', 'ORDOÑEZ', 'MENDOZA', 'ALEX', '45027508', 'M', 'alex_5714@hotmail.com', '$2y$10$VnzfOLCb6TMfR1RiGti3tuzDZZmiN5wXeEqcW2Nh0tSn17PNDU6HK', null, '1', '2016-06-06 19:40:10', '2016-06-06 19:47:12', '6', null, null, 'ajw0MJNWPOaOT3VkTENwy5EOsr6SbN4YckvAwgGIZkYMWvMYHo7s5OxBfXlr');
INSERT INTO `personas` VALUES ('48', 'HUAYHUA', 'PAUYAC', 'BETZAIDA', '43180874', 'F', 'betssy1020@gmail.com', '$2y$10$avcMLDtLJs7cNq4C7Xox5.B/e6QWoUvJLWOGzMI.95ekDk6og86i.', null, '1', '2016-06-06 19:52:03', '2016-06-06 19:52:03', '6', null, null, null);
INSERT INTO `personas` VALUES ('49', 'LUNA', 'MORALES', 'JOSE LUIS', '45160276', 'M', 'luna794@hotmail.com', '$2y$10$hsX4QSbpZdzgFi9XL3zBgev0KKOKSFAirXNYZYckLCkVVgKP3Hhae', null, '1', '2016-06-06 19:56:57', '2016-06-07 12:47:53', '6', null, null, 'tlYUvU0GvbJml0NRpOIPjPVMBkmontNeS9q1iuG0rICozdBd1dVN8JB6xaU1');
INSERT INTO `personas` VALUES ('50', 'OSORIO', 'PARI', 'SILVIA PAOLA', '10671035', 'F', 'rubyesmeralda6@hotmail.com', '$2y$10$SJgpqb/xEN2rrLnUbwuAC.PzWId.5R5kx4lKleOle3skaTQQNiDWK', null, '1', '2016-06-06 20:02:16', '2016-06-06 20:02:16', '6', null, null, null);
INSERT INTO `personas` VALUES ('51', 'ALAY', 'PAZ', 'PILAR', '40724773', 'F', 'pilar_alay@hotmail.com', '$2y$10$eaKcGFQf7tSV1wdz9V98L.7tBDotlGHMQC9Xf5sFtKixppWjn4AUW', null, '1', '2016-06-06 20:08:54', '2016-06-06 20:08:54', '6', null, null, null);
INSERT INTO `personas` VALUES ('52', 'LLANOS', 'MONCADA', 'GLADYS', '08045595', 'F', 'gladys2599@hotmail.com', '$2y$10$3L5WC.I1snCxt5atNrRPUeOF0/L350JmYFiZukcKGtokJkOp.oVdW', null, '1', '2016-06-06 20:16:53', '2016-06-06 20:16:53', '6', null, null, null);
INSERT INTO `personas` VALUES ('53', 'PURILLA', 'ESPINOZA', 'PEDRO YSAAK', '09936021', 'M', 'pedroysaak@hotmail.com', '$2y$10$JfcWVeFnMNGP5XQiBHqYZOTYouu2ssHhZFD9oqeyq2wUXdXxRivZW', null, '1', '2016-06-09 19:27:06', '2016-06-09 19:27:06', '6', null, null, null);
INSERT INTO `personas` VALUES ('54', 'FERNANDEZ', 'SANTOS', ' BLANCA', '47040002', 'F', 'consorciotelesuparequipa292@gmail.com', '$2y$10$ghbRnCLYdc23BqTLN/bTc.UYq0XopfSIVlokI39HsPMaI.FG3iVZO', null, '1', '2016-06-09 19:57:56', '2016-06-09 19:57:56', '6', null, null, null);
INSERT INTO `personas` VALUES ('55', 'MAYORGA', 'ARANA', 'JOSE DANIEL', '09671788', 'M', 'coordinacion_isel@outlook.com', '$2y$10$UJhANjMK2uEYh8Xvp/hUyeS6i434MvxIX7HetfV3jg0/lN.vSmhE6', null, '1', '2016-06-09 20:20:05', '2016-06-09 20:20:05', '6', null, null, null);
INSERT INTO `personas` VALUES ('56', 'RAMOS', 'ULLOA', 'BRENDA', '73874519', 'F', 'ramosulloab@gmail.com', '$2y$10$uIrF1U3ofYkiO2EryXlUG..Is1WwMzK6VTos0TYdBmJKZQ9YgU.kO', null, '1', '2016-06-09 20:24:43', '2016-06-09 20:24:43', '6', null, null, null);
INSERT INTO `personas` VALUES ('57', 'MAMANI', 'RAMOS', 'OLINDA JULIA', '04438957', 'F', 'olindagad@yahoo.es', '$2y$10$yXqyz6xniDj8ctTbQmVxXemus/3cN0NKgplcHXwabcEF0X.efDmIe', null, '1', '2016-06-09 20:35:15', '2016-06-09 20:36:37', '6', '6', null, null);
INSERT INTO `personas` VALUES ('58', 'ORE', 'GARCIA', 'MARIA ESTHER', '07748340', 'F', 'uptayacucho@hotmail.com', '$2y$10$o.eaXzCo087EMP/73C6HleI5bv.9CwQgFSY/veoYjM4IUm5VWWQlK', null, '1', '2016-06-09 20:44:47', '2016-06-09 20:44:47', '6', null, null, null);
INSERT INTO `personas` VALUES ('59', 'GALVEZ', 'ESPINOZA', 'ADALBERTO', '42173385', 'M', 'adalbertg@hotmail.com', '$2y$10$ipg9CQmVopY/Rrd7WmryHu.NaFTiCmrAmIEqWcsEguX1NiRwCJoea', null, '1', '2016-06-09 20:49:31', '2016-06-09 20:49:31', '6', null, null, null);
INSERT INTO `personas` VALUES ('60', 'GOICOCHEA', 'BAUTISTA', 'WILDER', '44443049', 'M', 'inturperusanjuan@yahoo.com', '$2y$10$MCm8.ENm4GtPgMstybQWZOCG2LDeKOemaihOMA6uUcojxuqvMZMq6', null, '1', '2016-06-09 20:52:49', '2016-06-09 20:52:49', '6', null, null, null);
INSERT INTO `personas` VALUES ('61', 'RAMIREZ', 'COCHA', 'FABIOLA', '40484662', 'M', 'fabilouramcoc1@outlook.com', '$2y$10$yEl27RLN/1UBulNKeDkYoeYx4caQjHIONb2o8O0DGjpuQyQ0/lBcK', null, '1', '2016-06-09 20:58:07', '2016-06-09 20:58:07', '6', null, null, null);
INSERT INTO `personas` VALUES ('62', 'SALAZAR', 'CASTRO', 'JUAN RAFAEL', '06435889', 'M', 'jrscmaferom@hotmail.com', '$2y$10$ORBg/LBsLrQQ4E8r8SKeYujjjNLtDMvHTZS17SXZ9wN2POFHXa9wi', null, '1', '2016-06-09 21:01:34', '2016-06-09 21:01:34', '6', null, null, null);
INSERT INTO `personas` VALUES ('63', 'ESTRADA', 'PEDROZA', 'EMILEX ENRIQUE', '44912735', 'M', 'sebastianvargaslay@gmail.com', '$2y$10$o8VUFm04/.6tybaebRud6Ond1F27xhnISu0CnBahXMqDFcPLfnWtm', null, '1', '2016-06-09 21:05:24', '2016-06-09 21:05:24', '6', null, null, null);

-- ----------------------------
-- Table structure for problemas
-- ----------------------------
DROP TABLE IF EXISTS `problemas`;
CREATE TABLE `problemas` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `descripcion` varchar(500) DEFAULT NULL,
  `fecha_problema` datetime DEFAULT NULL,
  `tipo_problema_id` int(11) DEFAULT NULL,
  `sede_id` int(11) DEFAULT NULL,
  `estado` int(1) DEFAULT '1',
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  `usuario_created_at` int(11) DEFAULT NULL,
  `usuario_updated_at` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `p_tipo_problema_id` (`tipo_problema_id`) USING BTREE,
  KEY `p_sede_id` (`sede_id`) USING BTREE,
  CONSTRAINT `problemas_ibfk_1` FOREIGN KEY (`sede_id`) REFERENCES `sedes` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `problemas_ibfk_2` FOREIGN KEY (`tipo_problema_id`) REFERENCES `tipo_problema` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=129 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of problemas
-- ----------------------------
INSERT INTO `problemas` VALUES ('1', 'TRAMITE DE TÍTULOS INSTITUTO-2015\r\nEnviado en Sep y Oct del 2015\r\n', '2016-06-04 12:52:00', '1', '9', '1', '2016-06-04 12:53:45', '2016-06-04 12:53:45', '8', null);
INSERT INTO `problemas` VALUES ('2', 'TRAMITES DE INSTITUTO CERTIFICADO DEUT:                 PUMA HUILLCA DANIEL - CERTIFICADO TEC. EN DISEÑO GRAFICO A NOMBRE UPT TRAMITO EL 21/07/15', '2016-06-04 12:52:00', '1', '9', '1', '2016-06-04 12:54:10', '2016-06-04 12:54:10', '8', null);
INSERT INTO `problemas` VALUES ('3', 'REVISAR INCONGRUENCIAS (PREGUNTAS MAL FORMULADAS) EN PRACTICAS CALIFICADAS DEL CAMPUS DE VARIOS LOS CURSOS, HAY RECLAMO DE ALUMNOS.', '2016-06-04 12:52:00', '2', '9', '1', '2016-06-04 12:54:56', '2016-06-04 12:54:56', '8', null);
INSERT INTO `problemas` VALUES ('4', 'Firmas de Contratos por renovacion del Local actual y del Nuevo Local. Se envio a Encargado de Contabilidad y legal.', '2016-06-04 13:04:00', '5', '9', '1', '2016-06-04 13:04:53', '2016-06-04 13:04:53', '8', null);
INSERT INTO `problemas` VALUES ('5', '60 Computadoras completas para la adecuacion de laboratorios del Nuevo Local (Santa Monica)\r\n05 Proyectores para el nuevo local\r\nPaneles para fachada de Nuevo Local (medidas y diseño enviado a encargado de Logistica)\r\nPanel 01:  1.3 x 12.8 m\r\nPanel 02:  4.5 x 21.0 m', '2016-06-04 13:04:00', '6', '9', '1', '2016-06-04 13:06:01', '2016-06-04 13:06:01', '8', null);
INSERT INTO `problemas` VALUES ('6', 'Sin problemas', '2016-06-04 13:09:00', '4', '9', '1', '2016-06-04 13:10:20', '2016-06-04 13:10:20', '8', null);
INSERT INTO `problemas` VALUES ('7', '-la demora para enviar un tramite ya sea como constancia de estudios asi como formatos de practicas y cartas de presentación de la universidad \r\n-las notas subir en su debido tiempo ya que el 95% de los alumnos les interesa sus notas así como también el campus virtual deben tener cuidado con poner notas en cursos que el alumno no llego a rendir \r\n ', '2016-06-04 14:13:00', '1', '2', '1', '2016-06-04 14:18:15', '2016-06-04 14:18:15', '11', null);
INSERT INTO `problemas` VALUES ('8', '-se requiere proyectores \r\n-se requiere 60 sillas para el auditorio ya que el ambiente esta acabado asi poder programar talleres \r\n', '2016-06-04 14:13:00', '6', '2', '1', '2016-06-04 14:21:12', '2016-06-04 14:21:12', '11', null);
INSERT INTO `problemas` VALUES ('9', 'FALTA DE SALONES  PARA CARRERAS DE INSTITUTO\r\n\r\n', '2016-06-06 10:12:00', '1', '15', '1', '2016-06-06 10:19:49', '2016-06-06 10:19:49', '18', null);
INSERT INTO `problemas` VALUES ('10', 'SOLICITUD DE LIQUIDACION DEL DOCENTE : JOSE MEDRANO CARMEN  ( SAC y TELEMATICA)\r\n                                                                                            WALFORD TIPACTI   ( TELEMATICA) \r\n', '2016-06-06 10:12:00', '5', '15', '1', '2016-06-06 10:36:49', '2016-06-06 10:36:49', '18', null);
INSERT INTO `problemas` VALUES ('11', 'CERTIFICADO DE ESTUDIOS DEL INSTITUTO  Y  CONSTANCIAS DE EGRESADOS DE LA UNIVERSIDAD', '2016-06-06 10:03:00', '1', '37', '1', '2016-06-06 10:40:29', '2016-06-06 10:40:29', '17', null);
INSERT INTO `problemas` VALUES ('12', 'ACTUALIZAR SUS NOTAS  DE TRABAJOS DE INVESTIGACIÓN  Y  TAMBIÉN NO TENER MUCHOS CORTES  EN EL CAMPUS', '2016-06-06 10:03:00', '2', '37', '1', '2016-06-06 10:42:07', '2016-06-06 10:42:07', '17', null);
INSERT INTO `problemas` VALUES ('13', 'NINGUNA', '2016-06-06 10:03:00', '4', '37', '1', '2016-06-06 10:42:41', '2016-06-06 10:42:41', '17', null);
INSERT INTO `problemas` VALUES ('14', 'SOLICITUD DE CERTIFICADO DE TRABAJO DEL PROFESON ALFREDO VELA ISIA QUE SE SOLISITO\r\nPAGO DE  LOS PREMIOS DE RATIFICACIÓN DE LOS INICIOS  DE 2015-1 ; 2015-2; 2016-1\r\n', '2016-06-06 10:03:00', '5', '37', '1', '2016-06-06 10:44:54', '2016-06-06 10:44:54', '17', null);
INSERT INTO `problemas` VALUES ('15', 'FALTA CONVALIDACION DEL ALUMNO CAXI XHOQUEPUNA HERNAN DE LA CARRERA CONTABILIDAD', '2016-06-06 10:53:00', '1', '1', '1', '2016-06-06 11:01:42', '2016-06-06 11:01:42', '10', null);
INSERT INTO `problemas` VALUES ('16', 'CONSTANCIA DE EGRESADO DE LA ALUMNA YALTA BENAVIDES ALEJANDRA IRMA', '2016-06-06 10:53:00', '1', '1', '1', '2016-06-06 11:03:30', '2016-06-06 11:03:30', '10', null);
INSERT INTO `problemas` VALUES ('17', 'A LA SEÑORITA ROCIO DEL PILAR CARRANZA REGALADO AUN NO LE DAN SU LIQUIDACION PÓR TELEMATICA SAC POR EL PERIODO DE 6 MESES DESDE JULIO DEL 2012 HASTA EL 31 DE DICIEMBRE DEL 2012', '2016-06-06 10:53:00', '5', '1', '1', '2016-06-06 11:04:01', '2016-06-06 11:04:01', '10', null);
INSERT INTO `problemas` VALUES ('18', 'NO SE HAN ENVIADO LAS RESOLUCIONES DE CONVALIDACION DE LOS ALUMNOS DEL INICIO DEL 20 DE MARZO:\r\nMAMANI LUQUE GABY FABIOLA\r\nCAHUANA PATACA MERCEDES\r\nCRUZ MAMANI ZULEMA SANDRA\r\nAGUILAR CONAHUIRE LINDOR MARIO\r\nMAMANI NAVARRO ELEANA\r\nCUTIPA ESTRADA LUZBENIA\r\nMERCADO MERCADO MARTHA\r\nRIVERA SILVA LUIS WALDIR\r\nVILLASANTE MONTES ROSSANA\r\nMACHACA AFARAYA GLADYS\r\nCORNEJO MELO CLAUDIA FIORELLA\r\nLEGUA RAMOS MARIA ELENA\r\nTICONA TICONA MARCO ANTONIO\r\nESPINOZA OBANDO CARLOS ARTURO\r\nTACORA MAMANI GLADYS\r\nQUISPE', '2016-06-06 11:32:00', '1', '39', '1', '2016-06-06 11:34:37', '2016-06-06 11:34:37', '24', null);
INSERT INTO `problemas` VALUES ('19', 'SE REQUIERE MATERIAL PARA CAMPAÑA DE MARKETING Y COLEGIOS:\r\n- BRICHURT UNIVERSIDAD - 80 MILLARES\r\n- BROCHURT INSTITUTO - 80 MILLARES\r\n- BROCHURT INTUR - 60 MILLARES\r\n- BROCHURT DEUT - 80 MILLARES\r\n- TEST VOCACIONALES 300 MILLARES (COLEGIOS - DATA TODO TACNA)\r\n- VOLANTES UNIVERSIDAD/ INSTITUTO - 60 MILLARES\r\n- VOLANTES INTUR/DEUT - 60 MILLARES', '2016-06-06 11:32:00', '7', '39', '1', '2016-06-06 11:37:22', '2016-06-06 11:37:22', '24', null);
INSERT INTO `problemas` VALUES ('20', 'TRAMITE DE CERTIFICADOS Y TITULOS QUE DEBEN', '2016-06-06 10:03:00', '3', '37', '1', '2016-06-06 12:17:52', '2016-06-06 12:17:52', '17', null);
INSERT INTO `problemas` VALUES ('21', 'SE REQUIERE 10 TALONARIOS DE  BOLETAS DE VENTA, ULTIMA SERIE 078 - 003500\r\nENVIAR A AV. FERROCARRIL NRO 571 - FRENTE A LA COMISARIA DE HUANCAYO\r\nTELEFONO: 064 -217080\r\nA NOMBRE DE RUDY MEDINA PAITA\r\nDNI: 44443411', '2016-06-06 11:54:00', '4', '12', '1', '2016-06-06 12:22:10', '2016-06-06 12:22:10', '28', null);
INSERT INTO `problemas` VALUES ('22', 'SOLICITO PROYECTOR MULTIMEDIA PARA LABORATORIO DE CÓMPUTO, PROYECTOR ENVIADO DE LIMA ESTA MALOGRADO', '2016-06-06 12:30:00', '6', '12', '1', '2016-06-06 12:32:14', '2016-06-06 12:32:14', '28', null);
INSERT INTO `problemas` VALUES ('23', 'TRAMITES DE GRADOS DE BACHILLER\r\nTRAMITES DE TITULOS TECNICO', '2016-06-06 13:21:00', '1', '41', '1', '2016-06-06 13:21:50', '2016-06-06 13:21:50', '38', null);
INSERT INTO `problemas` VALUES ('24', 'NO APARECE NOTAS DEL EXAMEN QUE SE REALIZO EL DÍA 22-05-16  DE LOS ALUMNOS DEL INICIO 20-03-16.\r\nLOS ALUMNOS ENVÍAN SUS PRACTICAS CALIFICADAS Y NO APARECEN SUS NOTAS EN LA OPCIÓN CALIFICACIONES.\r\n', '2016-06-06 13:21:00', '2', '41', '1', '2016-06-06 13:35:11', '2016-06-06 13:35:11', '38', null);
INSERT INTO `problemas` VALUES ('25', 'NO', '2016-06-06 15:29:00', '1', '43', '1', '2016-06-06 15:29:53', '2016-06-06 15:29:53', '34', null);
INSERT INTO `problemas` VALUES ('26', 'PROBLEMAS CON ALUMNOS DE CONVALIDACION QUE NO LE AN COLGADO LOS CURSOS QUE LE CORRESPONDE EN EL 3ER MES', '2016-06-06 15:29:00', '2', '43', '1', '2016-06-06 15:37:12', '2016-06-06 15:37:12', '34', null);
INSERT INTO `problemas` VALUES ('27', 'TRAMITE DE RECORD DE NOTAS ', '2016-06-06 15:33:00', '3', '41', '1', '2016-06-06 15:48:28', '2016-06-06 15:48:28', '38', null);
INSERT INTO `problemas` VALUES ('28', 'TRAMITES DE CONSTANCIA DE ESTUDIOS DE UNIVERSIDAD  ARISMENDIZ VALLADARES LUISA, ROMAN AYOSA KETTY, VIGO NEYRA ZOILA', '2016-06-06 15:29:00', '3', '43', '1', '2016-06-06 15:48:41', '2016-06-06 15:48:41', '34', null);
INSERT INTO `problemas` VALUES ('29', 'CONSTANCIA DE ESTUDIOS ', '2016-06-06 15:29:00', '3', '43', '1', '2016-06-06 15:49:42', '2016-06-06 15:49:42', '34', null);
INSERT INTO `problemas` VALUES ('30', 'CONSTANCIA DE ESTUDIOS', '2016-06-06 15:29:00', '3', '43', '1', '2016-06-06 15:50:59', '2016-06-06 15:50:59', '34', null);
INSERT INTO `problemas` VALUES ('31', '10 TALONARIOS DE BOLETAS DE VENTAS ULTIMO NUMOER 083-1000', '2016-06-06 15:29:00', '4', '43', '1', '2016-06-06 15:51:33', '2016-06-06 15:51:33', '34', null);
INSERT INTO `problemas` VALUES ('32', 'CONTRATOS DE PERSONAL ADMINISTRATIVO Y DOCENTES', '2016-06-06 15:29:00', '5', '43', '1', '2016-06-06 15:51:53', '2016-06-06 15:51:53', '34', null);
INSERT INTO `problemas` VALUES ('33', 'TRAMITE DE RECORD DE NOTAS ', '2016-06-06 15:33:00', '3', '41', '1', '2016-06-06 16:31:57', '2016-06-06 16:31:57', '38', null);
INSERT INTO `problemas` VALUES ('34', 'SOLICITO DOS PROYECTORES PARA MEJORAR LA ENSEÑANZA EN LA INSTITUCION UNO QUE SERVIRA PARA EL LABORATORIO Y EL OTRO PARA LAS AULAS, ES DE SUMA URGENCIA.', '2016-06-06 17:23:00', '6', '4', '1', '2016-06-06 17:25:38', '2016-06-06 17:25:38', '39', null);
INSERT INTO `problemas` VALUES ('35', 'SOLICITO  AGENDAS Y LAPICEROS Y MATERIAL EDUCATIVO CON LA MARCA TELESUP PARA HACER PROMOTORIA EN LOS COLEGIOS E INSTITUCIONES PUBLICAS Y PRIVADAS, URGENTE.', '2016-06-06 17:23:00', '7', '4', '1', '2016-06-06 17:28:22', '2016-06-06 17:28:22', '39', null);
INSERT INTO `problemas` VALUES ('36', 'RECORD DE NOTAS', '2016-06-06 22:00:00', '3', '41', '1', '2016-06-06 22:02:37', '2016-06-06 22:02:37', '38', null);
INSERT INTO `problemas` VALUES ('37', 'RECORD DE NOTAS ', '2016-06-06 22:00:00', '3', '41', '1', '2016-06-06 22:08:02', '2016-06-06 22:08:02', '38', null);
INSERT INTO `problemas` VALUES ('38', 'RECORD DE NOTAS ', '2016-06-06 22:00:00', '3', '41', '1', '2016-06-06 22:11:14', '2016-06-06 22:11:14', '38', null);
INSERT INTO `problemas` VALUES ('39', 'RECORD DE NOTAS ', '2016-06-06 22:00:00', '3', '41', '1', '2016-06-06 22:17:28', '2016-06-06 22:17:28', '38', null);
INSERT INTO `problemas` VALUES ('40', 'RECORD DE NOTAS ', '2016-06-06 22:00:00', '3', '41', '1', '2016-06-06 22:35:02', '2016-06-06 22:35:02', '38', null);
INSERT INTO `problemas` VALUES ('41', 'ENVIAR BOLETAS DEL NUMERO 065-012000 EN ADELANTE\r\n', '2016-06-06 13:08:00', '4', '36', '1', '2016-06-06 22:37:49', '2016-06-06 22:37:49', '23', null);
INSERT INTO `problemas` VALUES ('42', 'CONSTANCIA DE TRABAJO SRTA. JESUS VALERIO, LAURA', '2016-06-06 13:08:00', '5', '36', '1', '2016-06-06 22:38:37', '2016-06-06 22:38:37', '23', null);
INSERT INTO `problemas` VALUES ('43', 'RECORD DE NOTAS ', '2016-06-06 22:00:00', '3', '41', '1', '2016-06-06 22:38:53', '2016-06-06 22:38:53', '38', null);
INSERT INTO `problemas` VALUES ('44', 'ENVIAR GIGANTOGRAFIAS DE INSTITUTO Y DE LA UNIVERSIDAD, DEUT, INGLES\r\n5 PROYECTORES\r\n3 TELEVISORES GRANDES\r\n03 AIRES ACONDICIONADOS PARA EL LABORATORIOS 02-03-04 DE 60BTU\r\n02 PARLANTES BOUFERS\r\n', '2016-06-06 13:08:00', '6', '36', '1', '2016-06-06 22:43:45', '2016-06-06 22:43:45', '23', null);
INSERT INTO `problemas` VALUES ('45', 'MIL LAPICEROS, POLOS, PULCERAS, MALETINES, CUADRENILLOS, AGENDAS, STIKERS CON LOGOS UNIVERSIDAD, ETC ', '2016-06-06 13:08:00', '7', '36', '1', '2016-06-06 22:46:51', '2016-06-06 22:46:51', '23', null);
INSERT INTO `problemas` VALUES ('46', 'RECORD DE NOTAS ', '2016-06-06 22:00:00', '3', '41', '1', '2016-06-06 22:49:18', '2016-06-06 22:49:18', '38', null);
INSERT INTO `problemas` VALUES ('47', 'RECORD DE NOTAS ', '2016-06-06 22:00:00', '3', '41', '1', '2016-06-06 22:54:23', '2016-06-06 22:54:23', '38', null);
INSERT INTO `problemas` VALUES ('48', 'RECORD DE NOTAS ', '2016-06-06 22:00:00', '3', '41', '1', '2016-06-06 22:58:47', '2016-06-06 22:58:47', '38', null);
INSERT INTO `problemas` VALUES ('49', 'RECORD DE NOTAS ', '2016-06-06 22:00:00', '3', '41', '1', '2016-06-06 23:10:27', '2016-06-06 23:10:27', '38', null);
INSERT INTO `problemas` VALUES ('50', 'RECORD DE NOTAS ', '2016-06-06 22:00:00', '3', '41', '1', '2016-06-06 23:13:22', '2016-06-06 23:13:22', '38', null);
INSERT INTO `problemas` VALUES ('51', 'RECORD DE NOTAS ', '2016-06-06 22:00:00', '3', '41', '1', '2016-06-06 23:16:16', '2016-06-06 23:16:16', '38', null);
INSERT INTO `problemas` VALUES ('52', 'RECORD DE NOTAS ', '2016-06-06 22:00:00', '3', '41', '1', '2016-06-06 23:21:05', '2016-06-06 23:21:05', '38', null);
INSERT INTO `problemas` VALUES ('53', 'RECORD DE NOTAS ', '2016-06-06 22:00:00', '3', '41', '1', '2016-06-06 23:27:02', '2016-06-06 23:27:02', '38', null);
INSERT INTO `problemas` VALUES ('54', 'RECORD DE NOTAS ', '2016-06-06 22:00:00', '3', '41', '1', '2016-06-06 23:31:14', '2016-06-06 23:31:14', '38', null);
INSERT INTO `problemas` VALUES ('55', 'RECORD DE NOTAS ', '2016-06-06 22:00:00', '3', '41', '1', '2016-06-06 23:34:34', '2016-06-06 23:34:34', '38', null);
INSERT INTO `problemas` VALUES ('56', 'RECORD DE NOTAS ', '2016-06-06 22:00:00', '3', '41', '1', '2016-06-06 23:39:05', '2016-06-06 23:39:05', '38', null);
INSERT INTO `problemas` VALUES ('57', 'RECORD DE NOTAS ', '2016-06-06 22:00:00', '3', '41', '1', '2016-06-06 23:41:02', '2016-06-06 23:41:02', '38', null);
INSERT INTO `problemas` VALUES ('58', 'RECORD DE NOTAS ', '2016-06-06 22:00:00', '3', '41', '1', '2016-06-06 23:44:03', '2016-06-06 23:44:03', '38', null);
INSERT INTO `problemas` VALUES ('59', 'RECORD DE NOTAS ', '2016-06-06 22:00:00', '3', '41', '1', '2016-06-06 23:46:18', '2016-06-06 23:46:18', '38', null);
INSERT INTO `problemas` VALUES ('60', 'SOLICITO BOLETAS DE VENTA..SOLO TENGO EN STOCK 4 TALONARIOS ..EL ULTIMO NUMERO DE BOLETA ES 8000.....', '2016-06-06 23:46:00', '4', '41', '1', '2016-06-06 23:47:42', '2016-06-06 23:47:42', '38', null);
INSERT INTO `problemas` VALUES ('61', 'NO CONTAMOS CON MOBILIARIOS PARA LAS AULAS (75 SILLAS, 75 MESAS, 02 PIZARRAS, 02 PROYECTOR MULTIMEDIA, 05 MÓDULOS PARA EL DOCENTE)\r\nEN PLATAFORMA CARECEMOS DE SILLÓN DE ESPERA, BANDERAS DE UNIVERSIDAD E INSTITUTO, 01 TELEVISOR, 04 MILLARES DE BROCHURE DE UNIVERSIDAD, INSTITUTO Y DEUT.', '2016-06-07 07:47:00', '6', '45', '1', '2016-06-07 07:58:36', '2016-06-07 07:58:36', '26', null);
INSERT INTO `problemas` VALUES ('62', 'REQUERIMOS CON URGENCIA LA INSTALACIÓN DE INTERNET PARA LAS 25 MAQUINAS DEL AULA VIRTUAL, INSTALACIÓN DE RAUNTER PARA PROYECTOR MULTIMEDIA.', '2016-06-07 07:47:00', '2', '45', '1', '2016-06-07 08:02:08', '2016-06-07 08:02:08', '26', null);
INSERT INTO `problemas` VALUES ('63', '- NO CONTAMOS CON AUTORIZACIÓN DE DEFENSA CIVIL\r\n- NO CONTAMOS CON LA LICENCIA DE FUNCIONAMIENTO\r\n- NOTIFICACIÓN DE PAGO DE S/. 2,499.00 NUEVOS SOLES DE PANEL PUBLICITARIO\r\n- EN REFERENCIA AL PERSONAL SE ENCUENTRAN LABORANDO SIN CONTRATO', '2016-06-07 07:47:00', '5', '45', '1', '2016-06-07 08:08:00', '2016-06-07 08:08:00', '26', null);
INSERT INTO `problemas` VALUES ('64', 'ENVIAR BOLETAS DE VENTAS. SOLO TENEMOS UN TALONARIO. CON EL QUE HEMOS INICIADO. LA ULTIMA BOLETA ES 004000, ENVIAR A PARTIR DEL 0040001 ', '2016-06-07 09:57:00', '4', '5', '1', '2016-06-07 10:16:15', '2016-06-07 10:16:15', '21', null);
INSERT INTO `problemas` VALUES ('65', 'ENVIAR UNIFORMES BLANCOS PENDIENTES SEGÚN ARCHIVO ENVIADO CON LISTA DE ALUMNOS TALLAS Y PAGOS. 36 UNIFORMES BLANCOS YA CANCELADOS.', '2016-06-07 09:57:00', '6', '5', '1', '2016-06-07 10:17:55', '2016-06-07 10:17:55', '21', null);
INSERT INTO `problemas` VALUES ('66', 'ENVIAR HOJAS MEMBRETADAS DE LA UNIVERSIDAD PARA IMPRIMIR OFICIOS PARA INGRESO A COLEGIOS.', '2016-06-07 09:57:00', '6', '5', '1', '2016-06-07 10:19:20', '2016-06-07 10:19:20', '21', null);
INSERT INTO `problemas` VALUES ('67', 'DAR CURSO AL DOCUMENTO ENVIADO A RECURSOS HUMANOS POR EL CAJERO GUILLERMO POMPA CARRASCO, SOLICITANDO CAMBIO DE CONTRATO DE TIEMPO COMPLETO A TIEMPO PARCIAL O MEDIO TIEMPO DESDE EL MES DE MAYO.', '2016-06-07 09:57:00', '5', '5', '1', '2016-06-07 10:21:25', '2016-06-07 10:21:25', '21', null);
INSERT INTO `problemas` VALUES ('68', 'ENVIAR RESOLUCIONES PENDIENTES DE CONVALIDACION DE LA UNIVERSODAD, INICIO 20 DE MARZO DE LOS SIGUIENTES ALUMNOS: MUÑOZ BRIONES SANDRA, BANDA LEIVA PIER ALEXANDER, URTEAGA JARA ANGEL SALVADOR, CHAVEZ CRUZADO MARIA JUANA, GALLARDO DIAZ DELSI Y AREAVALO ATALAYA CARMEN AMPARO. DE LAS 9 CONVALIDACION SOLO ENVIARON DE 3 ALUMNOS, POR FAVOR ENVIAR PORQUE LOS ALUMNOS LO ESTAN SOLICITANDO.', '2016-06-07 09:57:00', '1', '5', '1', '2016-06-07 10:27:37', '2016-06-07 10:27:37', '21', null);
INSERT INTO `problemas` VALUES ('69', 'ENVIAR RESOLUCIÓN DE 8 CASOS QUE CANCELARON 53 SOLES POR REVISIÓN DE EXPEDIENTE PARA CONVALIDACION DEL INICIO 19 DE JUNIO DE UNIVERSIDAD, Y YA DESEAN SABER CUANTOS CREDITOS VAN A CONVALIDAR PARA QUE HAGAN EL PAGO POR CREDITO Y TAMBIEN PUEDAN MATRICULARSE PORQUE SOLO PAGARON POR REVISION DE DOCUMENTOS.', '2016-06-07 09:57:00', '1', '5', '1', '2016-06-07 10:30:05', '2016-06-07 10:30:05', '21', null);
INSERT INTO `problemas` VALUES ('70', 'SIN PROBLEMAS.', '2016-06-07 09:57:00', '2', '5', '1', '2016-06-07 10:31:06', '2016-06-07 10:31:06', '21', null);
INSERT INTO `problemas` VALUES ('71', 'ENVIAR 3 MIL BROCHURS DE LA UNIVERSIDAD.', '2016-06-07 09:57:00', '7', '5', '1', '2016-06-07 10:32:30', '2016-06-07 10:32:30', '21', null);
INSERT INTO `problemas` VALUES ('72', 'ACABAMOS DE RECIBIR UN DOCUMENTO DE INDECOPI PARA PRESENTAR UN DESCARGO DE LA QUEJA ADMINISTRATIVA DE LA ALUMNA DAPHNE DIAZ SALGADO, NOS DA PASO A UNA SEGUNDA CONCILIACIÓN PARA DAR POR FINALIZADO EL  CASO.', '2016-06-07 11:24:00', '5', '15', '1', '2016-06-07 11:27:52', '2016-06-07 11:27:52', '18', null);
INSERT INTO `problemas` VALUES ('73', 'ACTUALMENTE HEMOS APERTURADO TRES CARRERAS DE INSTITUTO LAS CUALES HACEN USO DE LOS PROYECTORES MULTIMEDIA Y NO ABASTECE LA DEMANDA  DE REQUERIMIENTOS EN LAS AULAS EN EL DICTADO DE CLASE, Y VAMOS A TENER INCONVENIENTES EN LA CAMPAÑA DE COLEGIO POR QUE TAMBIÉN SE UTILIZA PROYECTORES. ', '2016-06-07 11:24:00', '6', '15', '1', '2016-06-07 11:33:39', '2016-06-07 11:33:39', '18', null);
INSERT INTO `problemas` VALUES ('74', '30 SILLAS PLEGABLES PARA LAB. 01-LAB. 02\r\n30 MESAS\r\nMANTELES DE MESA \r\n30 MONITORES\r\n30 CPU\r\n30 MOUSE\r\n10 UNIFORME TALLA S -NEGRO \r\n10 UNIFORME TALLA M-NEGRO \r\n5 UNIFORME TALLA L-NEGRO\r\n10 UNIFORME TALLA S- BLANCO\r\n10 UNIFORME TALLA M - BLANCO \r\n', '2016-06-07 13:56:00', '6', '41', '1', '2016-06-07 14:00:50', '2016-06-07 14:00:50', '38', null);
INSERT INTO `problemas` VALUES ('75', '5000 BROCHUTZ DE DEUT\r\n5000 BROCHUTZ DE UNIVERSIDAD\r\n5000 BROCHUTZ DE INSTITUTO\r\n5000 BROCHUTZ DE INTUR', '2016-06-07 13:56:00', '7', '41', '1', '2016-06-07 14:01:18', '2016-06-07 14:01:18', '38', null);
INSERT INTO `problemas` VALUES ('76', 'NO HAY ', '2016-06-07 13:56:00', '5', '41', '1', '2016-06-07 14:01:36', '2016-06-07 14:01:36', '38', null);
INSERT INTO `problemas` VALUES ('77', 'SOLICITO LIBROS Y DVD DEL I CICLO PARA EL INICIO DEL 26 DE JUNIO - 70 UNIDADES', '2016-06-10 07:22:00', '1', '16', '1', '2016-06-10 07:23:49', '2016-06-10 07:23:49', '19', null);
INSERT INTO `problemas` VALUES ('78', 'SOLICITO LOS TITULOS FALTANTES: REYNA CAMPOS CAROL ANGELINA, LOZANO DEL AGUILA LUIS ARTURO, NUNTA APAGUEÑO ARELI, DEL AGUILA LAYCHE LUIS MARCELO, CURI RAMIREZ MILAGROS DE MARIA.', '2016-06-10 07:22:00', '3', '16', '1', '2016-06-10 07:31:19', '2016-06-10 07:31:19', '19', null);
INSERT INTO `problemas` VALUES ('79', 'TITULO PROFESIONAL', '2016-06-10 07:22:00', '3', '16', '1', '2016-06-10 07:33:33', '2016-06-10 07:33:33', '19', null);
INSERT INTO `problemas` VALUES ('80', 'TITULO PROFESIONAL', '2016-06-10 07:22:00', '3', '16', '1', '2016-06-10 07:34:51', '2016-06-10 07:34:51', '19', null);
INSERT INTO `problemas` VALUES ('81', 'TITULO PROFESIONAL', '2016-06-10 07:22:00', '3', '16', '1', '2016-06-10 07:35:49', '2016-06-10 07:35:49', '19', null);
INSERT INTO `problemas` VALUES ('82', 'TITULO PROFESIONAL', '2016-06-10 07:22:00', '3', '16', '1', '2016-06-10 07:37:00', '2016-06-10 07:37:00', '19', null);
INSERT INTO `problemas` VALUES ('83', 'FAVOR DE TENER CUIDADO AL CALCULAR LAS HORAS DE DICTADO DE LOS DOCENTES, PUES SE QUEJAN POR QUE NO COINCIDEN LOS MONTOS A COBRAR Y LOS EXCESOS DE DESCUENTOS POR ONP - SEGURO SOCIAL', '2016-06-10 07:22:00', '4', '16', '1', '2016-06-10 07:38:18', '2016-06-10 07:38:18', '19', null);
INSERT INTO `problemas` VALUES ('84', 'SOLICITO CARTA DE RETIRO DE CTS BANCO CONTINETAL EMPRESA TELEMATICA SAC DE GEORGINA CASHU SANCHEZ', '2016-06-10 07:22:00', '5', '16', '1', '2016-06-10 07:39:54', '2016-06-10 07:39:54', '19', null);
INSERT INTO `problemas` VALUES ('85', 'SOLICITO NIVELACION DE SUELDO DE ACUERDO AL NIVEL DE ESTUDIOS UNIVERSITARIOS Y CAPACITACIONES VARIAS, YA QUE TODO ESTE AÑO SE ESTA COBRANDO UNA MISERIA DE 600.00 DE GEORGINA CASHU SANCHEZ, CONSIDERO UNA HUMILLACION EL PAGO DE ESTE MONTO ESPERO SE PUEDA REGULARIZAR DESDE ENERO HASTA LA FECHA DEL 2016', '2016-06-10 07:22:00', '5', '16', '1', '2016-06-10 07:41:32', '2016-06-10 07:41:32', '19', null);
INSERT INTO `problemas` VALUES ('86', 'SOLICITAMOS POLOS, GORROS, LAPICEROS, AGENDAS, REGLAS, MALETINES, MANDILES, ETC. TODO CUANTO SE PUEDA ENVIAR PARA LA CAMPAÑA DE COLEGIOS Y REGALOS A DIRECTORES.', '2016-06-10 07:22:00', '6', '16', '1', '2016-06-10 07:42:30', '2016-06-10 07:42:30', '19', null);
INSERT INTO `problemas` VALUES ('87', 'SOLICITO LIBROS Y DVD DEL I CICLO INICIO 26 DE JUNIO - 70 UNIDADES', '2016-06-10 07:22:00', '6', '16', '1', '2016-06-10 07:42:58', '2016-06-10 07:42:58', '19', null);
INSERT INTO `problemas` VALUES ('88', 'SOLICITO UN DISCO DURO CON TODOS LOS CURSOS DE TODAS LAS CARRERAS DEL I AL XII CICLO, PARA NOSOTROS QUEMARLO EN LA ODE Y ENTREGAR AL ALUMNO.', '2016-06-10 07:22:00', '6', '16', '1', '2016-06-10 07:43:38', '2016-06-10 07:43:38', '19', null);
INSERT INTO `problemas` VALUES ('89', 'SOLICITO 15 MAQUINAS COMPLETAS YA QUE EN EL LABORATORIO SOLO TENEMOS 12 OPERATIVAS Y NO DA PARA UNA ENSEÑANZA PERSONALIZADA Y PEDAGÓGICA, EL ALUMNO SE QUEJA TODOS LOS DÍAS Y GENERA DESERCIÓN.', '2016-06-10 07:22:00', '6', '16', '1', '2016-06-10 07:45:13', '2016-06-10 07:45:13', '19', null);
INSERT INTO `problemas` VALUES ('90', 'Hemos solicitado con Anterioridad la Necesidad de Urgencia de un Proyector primero para ver lo del dictado de clases y lo segundo para la elaboración de charlas en Instituciones Privadas y Publicas en difusión.', '2016-06-14 14:08:00', '1', '47', '1', '2016-06-14 14:10:13', '2016-06-14 14:10:13', '41', null);
INSERT INTO `problemas` VALUES ('91', 'Se ha solicitado con anterioridad también el Apoyo de esta Ode en cuanto a la contratación de Medios de Publicidad  y se ha enviado archivos correspondientes de las Cotizaciones. ', '2016-06-14 14:08:00', '7', '47', '1', '2016-06-14 14:12:32', '2016-06-14 14:12:32', '41', null);
INSERT INTO `problemas` VALUES ('92', 'He solicitado Banner con 10 Parantes o Atriles para que esten visibles en Instituciones Publicas donde ya hemos conseguido el permiso en las salas de atención al publico.', '2016-06-14 14:08:00', '7', '47', '1', '2016-06-14 14:15:36', '2016-06-14 14:15:36', '41', null);
INSERT INTO `problemas` VALUES ('93', 'Necesitamos un TOTAL DE 30 CARPETAS INDIVIDUALES EN EL 2DO SALÓN CON URGENCIA PARA EQUIPAR EL MOBILIARIO.', '2016-06-14 14:16:00', '6', '47', '1', '2016-06-14 18:46:57', '2016-06-14 18:46:57', '41', null);
INSERT INTO `problemas` VALUES ('94', 'Se necesita un TV. 50\' para realizar elaboración de spots de imágenes  rotativos en la seccion de espera de atencion al cliente.', '2016-06-14 14:16:00', '6', '47', '1', '2016-06-14 18:50:23', '2016-06-14 18:50:23', '41', null);
INSERT INTO `problemas` VALUES ('95', 'Se solicita con anticipación los CDS  en caja para el primer semestre  de  100 participantes de la Universidad, estamos aun inscribiendo vamos  87 alumnos.', '2016-06-14 14:16:00', '6', '47', '1', '2016-06-14 19:06:58', '2016-06-14 19:06:58', '41', null);
INSERT INTO `problemas` VALUES ('96', 'SOLICITAMOS FICHAS DE MATRICULAS PARA UNIVERSIDAD E INSTITUTO, SOLO TENEMOS POCAS FICHAS, POR FAVOR.', '2016-06-15 08:18:00', '6', '16', '1', '2016-06-15 08:20:45', '2016-06-15 08:20:45', '19', null);
INSERT INTO `problemas` VALUES ('97', 'alumnos de virtual ciclo regular aun no cuelgan sus cursos correspondientes a este 4to mes , alumnos de convalidacion no cuelgan sus cursos del 4to mes', '2016-06-17 17:39:00', '2', '43', '1', '2016-06-17 17:40:30', '2016-06-17 17:40:30', '34', null);
INSERT INTO `problemas` VALUES ('98', '40000 volantes univ-inst-deut\r\n10000 brochutz de universidad\r\n10000 brochutz de instituto\r\n10000 brochutz de deut\r\n300 agendas para directores de I.E\r\nlapiceros para alumnos de I.E\r\nTest vocacional\r\n40000 suplementos para encarte\r\n ', '2016-06-17 17:39:00', '7', '43', '1', '2016-06-17 17:43:42', '2016-06-17 17:43:42', '34', null);
INSERT INTO `problemas` VALUES ('99', 'TRAMITES DE GRADOS DE BACHILLER\r\nTRAMITES DE TÍTULOS TÉCNICO\r\n\r\n', '2016-06-17 17:41:00', '1', '41', '1', '2016-06-17 17:43:56', '2016-06-17 17:43:56', '38', null);
INSERT INTO `problemas` VALUES ('100', 'ALUMNOS DEL I CICLO NO TIENEN SUS NOTAS DEL EXAMEN FINAL EN SU PLATAFORMA QUE SE REALIZO EL DÍA 22-05-16', '2016-06-17 17:41:00', '2', '41', '1', '2016-06-17 17:45:23', '2016-06-17 17:45:23', '38', null);
INSERT INTO `problemas` VALUES ('101', '03 proyectores \r\nestandarte de universidad\r\n', '2016-06-17 17:39:00', '6', '43', '1', '2016-06-17 17:46:44', '2016-06-17 17:46:44', '34', null);
INSERT INTO `problemas` VALUES ('102', 'BOLETAS DE VENTA -ULTIMO NUMERO DEL TALONARIO QUE TENGO ES: 8000', '2016-06-17 17:41:00', '4', '41', '1', '2016-06-17 17:53:06', '2016-06-17 17:53:06', '38', null);
INSERT INTO `problemas` VALUES ('103', 'BOLETAS DE PAGO DEL PERSONAL DOCENTE Y ADMINISTRATIVO ', '2016-06-17 17:41:00', '5', '41', '1', '2016-06-17 17:54:48', '2016-06-17 17:54:48', '38', null);
INSERT INTO `problemas` VALUES ('104', 'LIBROS DE UNIVERSIDAD PARA EL SEMESTRE 2016-2', '2016-06-17 17:41:00', '6', '41', '1', '2016-06-17 17:55:48', '2016-06-17 17:55:48', '38', null);
INSERT INTO `problemas` VALUES ('105', '5000 BROCHUTZ DE DEUT\r\n5000 BROCHUTZ DE UNIVERSIDAD\r\n5000 BROCHUTZ DE INSTITUTO\r\n5000 BROCHUTZ DE INTUR\r\nLAPICEROS PARA ALUMNOS \r\nAGENDAS PARA DIRECTORES\r\nPOLOS \r\n30 MILLARES DE SUPLEMENTOS URGENTE-NO TENGO NADA EN STOCK \r\n', '2016-06-17 17:41:00', '7', '41', '1', '2016-06-17 17:57:58', '2016-06-17 17:57:58', '38', null);
INSERT INTO `problemas` VALUES ('106', '30 SILLAS PLEGABLES PARA LAB. 01-LAB. 02\r\n30 MONITORES\r\n30 MOUSE\r\n30 TECLADOS \r\n10 UNIFORME TALLA S -NEGRO \r\n10 UNIFORME TALLA M-NEGRO \r\n5 UNIFORME TALLA L-NEGRO\r\n10 UNIFORME TALLA S- BLANCO\r\n10 UNIFORME TALLA M - BLANCO \r\n', '2016-06-17 17:41:00', '6', '41', '1', '2016-06-17 17:59:57', '2016-06-17 17:59:57', '38', null);
INSERT INTO `problemas` VALUES ('107', 'UN PROYECTOR URGENTE', '2016-06-17 18:25:00', '6', '47', '1', '2016-06-17 18:28:59', '2016-06-17 18:28:59', '41', null);
INSERT INTO `problemas` VALUES ('108', 'REQUERIMIENTOS:\r\n- 200 CDS DEL PRIMER CICLO PARA LOS ALUMNOS DE UPT\r\n- 01 PROYECTOR MULTIMEDIA (PORQUE ESTAMOS ALQUILANDONOS)\r\n- 01 LIBRO DE ACTAS DE REGISTRO\r\n- 100 CARPETAS (CADA FIN DE SEMANA NOS ESTAMOS ALQUILANDO)\r\n', '2016-06-18 19:11:00', '6', '45', '1', '2016-06-18 19:16:10', '2016-06-18 19:16:10', '26', null);
INSERT INTO `problemas` VALUES ('109', 'bachiller', '2016-06-21 12:22:00', '3', '33', '1', '2016-06-21 12:34:37', '2016-06-21 12:34:37', '16', null);
INSERT INTO `problemas` VALUES ('110', 'necesito 10,000 revistas para ingresar a colegios y reparto casa por casa', '2016-06-21 12:35:00', '6', '33', '1', '2016-06-21 12:37:03', '2016-06-21 12:37:03', '16', null);
INSERT INTO `problemas` VALUES ('111', 'HASTA EL MOMENTO NO LLEGA EL TITULO DE LA ALUMNA REYNA CAMPOS CAROL ANGELINA SECRETARIA, ELLA SUSTENTO EN JULIO DEL 2014, DE LOS 10 ALUMNOS QUE SUSTENTARON EN ESA ÉPOCA SOLO DE 09 ENVIARON MAS NO DE LA ALUMNA MENCIONADA.', '2016-06-24 15:52:00', '3', '16', '1', '2016-06-24 15:57:32', '2016-06-24 15:57:32', '19', null);
INSERT INTO `problemas` VALUES ('112', 'SOLICITO 10 MAQUINAS COMPLETAS', '2016-06-24 15:52:00', '6', '16', '1', '2016-06-24 15:57:54', '2016-06-24 15:57:54', '19', null);
INSERT INTO `problemas` VALUES ('113', 'SOLICITO DISCO DURO CON CURSOS O PLAN CURRICULAR DE TODAS LAS CARRERAS DE LA UNIVERSIDAD Y TODOS LOS CICLOS, PARA QUEMAR ACÁ LOS DISCO Y ENTREGAR.', '2016-06-24 15:52:00', '6', '16', '1', '2016-06-24 15:58:43', '2016-06-24 15:58:43', '19', null);
INSERT INTO `problemas` VALUES ('114', 'SOLICITO LIBROS O DVD PARA I CICLO INICIO UPT 26 DE JUNIO', '2016-06-24 15:52:00', '6', '16', '1', '2016-06-24 16:03:38', '2016-06-24 16:03:38', '19', null);
INSERT INTO `problemas` VALUES ('115', 'SOLICITO CARTA DE RETIRO CTS BANCO CONTINENTAL CASHU SANCHEZ GEORGINA - EMPRESA TELEMATICA SAC', '2016-06-24 15:52:00', '5', '16', '1', '2016-06-24 16:04:28', '2016-06-24 16:04:28', '19', null);
INSERT INTO `problemas` VALUES ('116', '5000 BROCHUTZ DE DEUT\r\n5000 BROCHUTZ DE UNIVERSIDAD\r\n5000 BROCHUTZ DE INSTITUTO\r\n5000 BROCHUTZ DE INTUR', '2016-06-27 09:49:00', '1', '41', '1', '2016-06-27 09:50:39', '2016-06-27 09:50:39', '38', null);
INSERT INTO `problemas` VALUES ('117', 'NO HAY ', '2016-06-27 09:49:00', '2', '41', '1', '2016-06-27 09:51:09', '2016-06-27 09:51:09', '38', null);
INSERT INTO `problemas` VALUES ('118', 'SOLICITO URGENTE BOLETAS DE VENTA --SOLO ME QUEDA 1 TALONARIO -EL ULTIMO NUMERO DEL TALONARIO ES 8000..', '2016-06-27 09:49:00', '4', '41', '1', '2016-06-27 09:53:02', '2016-06-27 09:53:02', '38', null);
INSERT INTO `problemas` VALUES ('119', '\"5 UNIFORME TALLA S -NEGRO \r\n5 UNIFORME TALLA M-NEGRO \r\n2 UNIFORME TALLA L-NEGRO\r\n10 UNIFORME TALLA S- BLANCO\r\n10 UNIFORME TALLA M - BLANCO \r\n40 MONITORES.\r\n40 CPU.\r\n40 MOUSE.\r\n', '2016-06-27 09:49:00', '6', '41', '1', '2016-06-27 09:54:09', '2016-06-27 09:54:09', '38', null);
INSERT INTO `problemas` VALUES ('120', '\r\n5000 BROCHUTZ DE DEUT\r\n5000 BROCHUTZ DE UNIVERSIDAD\r\n5000 BROCHUTZ DE INSTITUTO\r\n5000 BROCHUTZ DE INTUR\"\r\nLAPICEROS ', '2016-06-27 09:49:00', '7', '41', '1', '2016-06-27 09:54:48', '2016-06-27 09:54:48', '38', null);
INSERT INTO `problemas` VALUES ('121', 'TITULO PROFESIONAL', '2016-06-28 07:29:00', '3', '16', '1', '2016-06-28 07:33:25', '2016-06-28 07:33:25', '19', null);
INSERT INTO `problemas` VALUES ('122', 'TITULO PROFESIONAL TÉCNICO A NOMBRE DE LA NACION', '2016-07-01 09:51:00', '1', '16', '1', '2016-07-01 09:54:35', '2016-07-01 09:54:35', '19', null);
INSERT INTO `problemas` VALUES ('123', 'SOLICITO  COPIAS DE CONTRATOS ', '2016-07-01 09:51:00', '5', '16', '1', '2016-07-01 09:55:33', '2016-07-01 09:55:33', '19', null);
INSERT INTO `problemas` VALUES ('124', 'SOLICITO COPIAS DE LOS CONTRATOS DEL MES DE MARZO Y ABRIL DE TODO EL PERSONAL', '2016-07-01 09:51:00', '5', '16', '1', '2016-07-01 09:56:35', '2016-07-01 09:56:35', '19', null);
INSERT INTO `problemas` VALUES ('125', 'SOLICITO 10 MAQUINAS COMPLETAS, NO TENGO PARA CUBRIR A ALUMNOS QUE TRABAJAN DE A DOS\r\n', '2016-07-01 09:51:00', '6', '16', '1', '2016-07-01 09:58:03', '2016-07-01 09:58:03', '19', null);
INSERT INTO `problemas` VALUES ('126', 'SOLICITO CARTA DE RETIRO DE CTS BANCO CONTINENTAL TELEMATICA SAC, Y AUMENTO DE SUELDO GEORGINA CASHU SANCHEZ\r\n', '2016-07-01 09:51:00', '5', '16', '1', '2016-07-01 09:58:35', '2016-07-01 09:58:35', '19', null);
INSERT INTO `problemas` VALUES ('127', 'SOLICITAMOS LIBROS DE INSTITUTO I CICLO ADMISION 2016 IC INICIO ABRIL 2016 DE LAS 4 CARRERAS,  ADMINISTRACION, SECRETARIADO, COMPUTACION Y CONTABILIDAD \r\n', '2016-07-01 09:51:00', '6', '16', '1', '2016-07-01 09:58:50', '2016-07-01 09:58:50', '19', null);
INSERT INTO `problemas` VALUES ('128', 'SOLICITAMOS FICHA DE MATRICULAS URGENTE\r\n', '2016-07-01 09:51:00', '6', '16', '1', '2016-07-01 09:59:03', '2016-07-01 09:59:03', '19', null);

-- ----------------------------
-- Table structure for problema_detalle
-- ----------------------------
DROP TABLE IF EXISTS `problema_detalle`;
CREATE TABLE `problema_detalle` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `problema_id` int(11) DEFAULT NULL,
  `estado_problema_id` int(11) DEFAULT NULL,
  `fecha_estado` datetime DEFAULT NULL,
  `resultado` varchar(500) DEFAULT NULL,
  `estado` int(1) DEFAULT '1',
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  `usuario_created_at` int(11) DEFAULT NULL,
  `usuario_updated_at` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `pd_estado_problema_id` (`estado_problema_id`) USING BTREE,
  KEY `pd_problema_id` (`problema_id`) USING BTREE,
  CONSTRAINT `problema_detalle_ibfk_1` FOREIGN KEY (`problema_id`) REFERENCES `problemas` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `problema_detalle_ibfk_2` FOREIGN KEY (`estado_problema_id`) REFERENCES `estado_problema` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=148 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of problema_detalle
-- ----------------------------
INSERT INTO `problema_detalle` VALUES ('1', '1', '1', '2016-06-04 12:52:00', '', '1', '2016-06-04 12:53:45', '2016-06-04 12:53:45', '8', null);
INSERT INTO `problema_detalle` VALUES ('2', '2', '1', '2016-06-04 12:52:00', '', '1', '2016-06-04 12:54:10', '2016-06-04 12:54:10', '8', null);
INSERT INTO `problema_detalle` VALUES ('3', '3', '1', '2016-06-04 12:52:00', '', '1', '2016-06-04 12:54:56', '2016-06-04 12:54:56', '8', null);
INSERT INTO `problema_detalle` VALUES ('4', '4', '1', '2016-06-04 13:04:00', '', '1', '2016-06-04 13:04:53', '2016-06-04 13:04:53', '8', null);
INSERT INTO `problema_detalle` VALUES ('5', '5', '1', '2016-06-04 13:04:00', '', '1', '2016-06-04 13:06:01', '2016-06-04 13:06:01', '8', null);
INSERT INTO `problema_detalle` VALUES ('6', '6', '1', '2016-06-04 13:09:00', '', '1', '2016-06-04 13:10:20', '2016-06-04 13:10:20', '8', null);
INSERT INTO `problema_detalle` VALUES ('7', '7', '1', '2016-06-04 14:13:00', '', '1', '2016-06-04 14:18:15', '2016-06-04 14:18:15', '11', null);
INSERT INTO `problema_detalle` VALUES ('8', '8', '1', '2016-06-04 14:13:00', '', '1', '2016-06-04 14:21:12', '2016-06-04 14:21:12', '11', null);
INSERT INTO `problema_detalle` VALUES ('9', '9', '1', '2016-06-06 10:12:00', '', '1', '2016-06-06 10:19:49', '2016-06-06 10:19:49', '18', null);
INSERT INTO `problema_detalle` VALUES ('10', '10', '1', '2016-06-06 10:12:00', '', '1', '2016-06-06 10:36:49', '2016-06-06 10:36:49', '18', null);
INSERT INTO `problema_detalle` VALUES ('11', '11', '1', '2016-06-06 10:03:00', '', '1', '2016-06-06 10:40:29', '2016-06-06 10:40:29', '17', null);
INSERT INTO `problema_detalle` VALUES ('12', '12', '1', '2016-06-06 10:03:00', '', '1', '2016-06-06 10:42:07', '2016-06-06 10:42:07', '17', null);
INSERT INTO `problema_detalle` VALUES ('13', '13', '1', '2016-06-06 10:03:00', '', '1', '2016-06-06 10:42:41', '2016-06-06 10:42:41', '17', null);
INSERT INTO `problema_detalle` VALUES ('14', '14', '1', '2016-06-06 10:03:00', '', '1', '2016-06-06 10:44:54', '2016-06-06 10:44:54', '17', null);
INSERT INTO `problema_detalle` VALUES ('15', '15', '1', '2016-06-06 10:53:00', '', '1', '2016-06-06 11:01:42', '2016-06-06 11:01:42', '10', null);
INSERT INTO `problema_detalle` VALUES ('16', '16', '1', '2016-06-06 10:53:00', '', '1', '2016-06-06 11:03:30', '2016-06-06 11:03:30', '10', null);
INSERT INTO `problema_detalle` VALUES ('17', '17', '1', '2016-06-06 10:53:00', '', '1', '2016-06-06 11:04:01', '2016-06-06 11:04:01', '10', null);
INSERT INTO `problema_detalle` VALUES ('18', '18', '1', '2016-06-06 11:32:00', '', '1', '2016-06-06 11:34:37', '2016-06-06 11:34:37', '24', null);
INSERT INTO `problema_detalle` VALUES ('19', '19', '1', '2016-06-06 11:32:00', '', '1', '2016-06-06 11:37:22', '2016-06-06 11:37:22', '24', null);
INSERT INTO `problema_detalle` VALUES ('20', '20', '1', '2016-06-06 10:03:00', '', '1', '2016-06-06 12:17:52', '2016-06-06 12:17:52', '17', null);
INSERT INTO `problema_detalle` VALUES ('21', '21', '1', '2016-06-06 11:54:00', '', '1', '2016-06-06 12:22:10', '2016-06-06 12:22:10', '28', null);
INSERT INTO `problema_detalle` VALUES ('22', '22', '1', '2016-06-06 12:30:00', '', '1', '2016-06-06 12:32:14', '2016-06-06 12:32:14', '28', null);
INSERT INTO `problema_detalle` VALUES ('23', '23', '1', '2016-06-06 13:21:00', '', '1', '2016-06-06 13:21:50', '2016-06-06 13:21:50', '38', null);
INSERT INTO `problema_detalle` VALUES ('24', '24', '1', '2016-06-06 13:21:00', '', '1', '2016-06-06 13:35:11', '2016-06-06 13:35:11', '38', null);
INSERT INTO `problema_detalle` VALUES ('25', '25', '1', '2016-06-06 15:29:00', '', '1', '2016-06-06 15:29:53', '2016-06-06 15:29:53', '34', null);
INSERT INTO `problema_detalle` VALUES ('26', '26', '1', '2016-06-06 15:29:00', '', '1', '2016-06-06 15:37:12', '2016-06-06 15:37:12', '34', null);
INSERT INTO `problema_detalle` VALUES ('27', '27', '1', '2016-06-06 15:33:00', '', '1', '2016-06-06 15:48:28', '2016-06-06 15:48:28', '38', null);
INSERT INTO `problema_detalle` VALUES ('28', '28', '1', '2016-06-06 15:29:00', '', '1', '2016-06-06 15:48:41', '2016-06-06 15:48:41', '34', null);
INSERT INTO `problema_detalle` VALUES ('29', '29', '1', '2016-06-06 15:29:00', '', '1', '2016-06-06 15:49:42', '2016-06-06 15:49:42', '34', null);
INSERT INTO `problema_detalle` VALUES ('30', '30', '1', '2016-06-06 15:29:00', '', '1', '2016-06-06 15:50:59', '2016-06-06 15:50:59', '34', null);
INSERT INTO `problema_detalle` VALUES ('31', '31', '1', '2016-06-06 15:29:00', '', '1', '2016-06-06 15:51:33', '2016-06-06 15:51:33', '34', null);
INSERT INTO `problema_detalle` VALUES ('32', '32', '1', '2016-06-06 15:29:00', '', '1', '2016-06-06 15:51:53', '2016-06-06 15:51:53', '34', null);
INSERT INTO `problema_detalle` VALUES ('33', '33', '1', '2016-06-06 15:33:00', '', '1', '2016-06-06 16:31:57', '2016-06-06 16:31:57', '38', null);
INSERT INTO `problema_detalle` VALUES ('34', '34', '1', '2016-06-06 17:23:00', '', '1', '2016-06-06 17:25:38', '2016-06-06 17:25:38', '39', null);
INSERT INTO `problema_detalle` VALUES ('35', '35', '1', '2016-06-06 17:23:00', '', '1', '2016-06-06 17:28:22', '2016-06-06 17:28:22', '39', null);
INSERT INTO `problema_detalle` VALUES ('36', '36', '1', '2016-06-06 22:00:00', '', '1', '2016-06-06 22:02:37', '2016-06-06 22:02:37', '38', null);
INSERT INTO `problema_detalle` VALUES ('37', '37', '1', '2016-06-06 22:00:00', '', '1', '2016-06-06 22:08:02', '2016-06-06 22:08:02', '38', null);
INSERT INTO `problema_detalle` VALUES ('38', '38', '1', '2016-06-06 22:00:00', '', '1', '2016-06-06 22:11:14', '2016-06-06 22:11:14', '38', null);
INSERT INTO `problema_detalle` VALUES ('39', '39', '1', '2016-06-06 22:00:00', '', '1', '2016-06-06 22:17:28', '2016-06-06 22:17:28', '38', null);
INSERT INTO `problema_detalle` VALUES ('40', '40', '1', '2016-06-06 22:00:00', '', '1', '2016-06-06 22:35:02', '2016-06-06 22:35:02', '38', null);
INSERT INTO `problema_detalle` VALUES ('41', '41', '1', '2016-06-06 13:08:00', '', '1', '2016-06-06 22:37:49', '2016-06-06 22:37:49', '23', null);
INSERT INTO `problema_detalle` VALUES ('42', '42', '1', '2016-06-06 13:08:00', '', '1', '2016-06-06 22:38:37', '2016-06-06 22:38:37', '23', null);
INSERT INTO `problema_detalle` VALUES ('43', '43', '1', '2016-06-06 22:00:00', '', '1', '2016-06-06 22:38:53', '2016-06-06 22:38:53', '38', null);
INSERT INTO `problema_detalle` VALUES ('44', '44', '1', '2016-06-06 13:08:00', '', '1', '2016-06-06 22:43:45', '2016-06-06 22:43:45', '23', null);
INSERT INTO `problema_detalle` VALUES ('45', '45', '1', '2016-06-06 13:08:00', '', '1', '2016-06-06 22:46:51', '2016-06-06 22:46:51', '23', null);
INSERT INTO `problema_detalle` VALUES ('46', '46', '1', '2016-06-06 22:00:00', '', '1', '2016-06-06 22:49:18', '2016-06-06 22:49:18', '38', null);
INSERT INTO `problema_detalle` VALUES ('47', '47', '1', '2016-06-06 22:00:00', '', '1', '2016-06-06 22:54:23', '2016-06-06 22:54:23', '38', null);
INSERT INTO `problema_detalle` VALUES ('48', '48', '1', '2016-06-06 22:00:00', '', '1', '2016-06-06 22:58:47', '2016-06-06 22:58:47', '38', null);
INSERT INTO `problema_detalle` VALUES ('49', '49', '1', '2016-06-06 22:00:00', '', '1', '2016-06-06 23:10:27', '2016-06-06 23:10:27', '38', null);
INSERT INTO `problema_detalle` VALUES ('50', '50', '1', '2016-06-06 22:00:00', '', '1', '2016-06-06 23:13:22', '2016-06-06 23:13:22', '38', null);
INSERT INTO `problema_detalle` VALUES ('51', '51', '1', '2016-06-06 22:00:00', '', '1', '2016-06-06 23:16:16', '2016-06-06 23:16:16', '38', null);
INSERT INTO `problema_detalle` VALUES ('52', '52', '1', '2016-06-06 22:00:00', '', '1', '2016-06-06 23:21:05', '2016-06-06 23:21:05', '38', null);
INSERT INTO `problema_detalle` VALUES ('53', '53', '1', '2016-06-06 22:00:00', '', '1', '2016-06-06 23:27:02', '2016-06-06 23:27:02', '38', null);
INSERT INTO `problema_detalle` VALUES ('54', '54', '1', '2016-06-06 22:00:00', '', '1', '2016-06-06 23:31:14', '2016-06-06 23:31:14', '38', null);
INSERT INTO `problema_detalle` VALUES ('55', '55', '1', '2016-06-06 22:00:00', '', '1', '2016-06-06 23:34:34', '2016-06-06 23:34:34', '38', null);
INSERT INTO `problema_detalle` VALUES ('56', '56', '1', '2016-06-06 22:00:00', '', '1', '2016-06-06 23:39:05', '2016-06-06 23:39:05', '38', null);
INSERT INTO `problema_detalle` VALUES ('57', '57', '1', '2016-06-06 22:00:00', '', '1', '2016-06-06 23:41:02', '2016-06-06 23:41:02', '38', null);
INSERT INTO `problema_detalle` VALUES ('58', '58', '1', '2016-06-06 22:00:00', '', '1', '2016-06-06 23:44:03', '2016-06-06 23:44:03', '38', null);
INSERT INTO `problema_detalle` VALUES ('59', '59', '1', '2016-06-06 22:00:00', '', '1', '2016-06-06 23:46:18', '2016-06-06 23:46:18', '38', null);
INSERT INTO `problema_detalle` VALUES ('60', '60', '1', '2016-06-06 23:46:00', '', '1', '2016-06-06 23:47:42', '2016-06-06 23:47:42', '38', null);
INSERT INTO `problema_detalle` VALUES ('61', '61', '1', '2016-06-07 07:47:00', '', '1', '2016-06-07 07:58:36', '2016-06-07 07:58:36', '26', null);
INSERT INTO `problema_detalle` VALUES ('62', '62', '1', '2016-06-07 07:47:00', '', '1', '2016-06-07 08:02:08', '2016-06-07 08:02:08', '26', null);
INSERT INTO `problema_detalle` VALUES ('63', '63', '1', '2016-06-07 07:47:00', '', '1', '2016-06-07 08:08:00', '2016-06-07 08:08:00', '26', null);
INSERT INTO `problema_detalle` VALUES ('64', '64', '1', '2016-06-07 09:57:00', '', '1', '2016-06-07 10:16:15', '2016-06-07 10:16:15', '21', null);
INSERT INTO `problema_detalle` VALUES ('65', '65', '1', '2016-06-07 09:57:00', '', '1', '2016-06-07 10:17:55', '2016-06-07 10:17:55', '21', null);
INSERT INTO `problema_detalle` VALUES ('66', '66', '1', '2016-06-07 09:57:00', '', '1', '2016-06-07 10:19:20', '2016-06-07 10:19:20', '21', null);
INSERT INTO `problema_detalle` VALUES ('67', '67', '1', '2016-06-07 09:57:00', '', '1', '2016-06-07 10:21:25', '2016-06-07 10:21:25', '21', null);
INSERT INTO `problema_detalle` VALUES ('68', '68', '1', '2016-06-07 09:57:00', '', '1', '2016-06-07 10:27:37', '2016-06-07 10:27:37', '21', null);
INSERT INTO `problema_detalle` VALUES ('69', '69', '1', '2016-06-07 09:57:00', '', '1', '2016-06-07 10:30:05', '2016-06-07 10:30:05', '21', null);
INSERT INTO `problema_detalle` VALUES ('70', '70', '1', '2016-06-07 09:57:00', '', '1', '2016-06-07 10:31:06', '2016-06-07 10:31:06', '21', null);
INSERT INTO `problema_detalle` VALUES ('71', '71', '1', '2016-06-07 09:57:00', '', '1', '2016-06-07 10:32:30', '2016-06-07 10:32:30', '21', null);
INSERT INTO `problema_detalle` VALUES ('72', '72', '1', '2016-06-07 11:24:00', '', '1', '2016-06-07 11:27:52', '2016-06-07 11:27:52', '18', null);
INSERT INTO `problema_detalle` VALUES ('73', '73', '1', '2016-06-07 11:24:00', '', '1', '2016-06-07 11:33:39', '2016-06-07 11:33:39', '18', null);
INSERT INTO `problema_detalle` VALUES ('74', '6', '2', '2016-06-07 12:50:00', 'actualizado a atendido', '1', '2016-06-07 12:50:23', '2016-06-07 12:50:23', null, null);
INSERT INTO `problema_detalle` VALUES ('75', '74', '1', '2016-06-07 13:56:00', '', '1', '2016-06-07 14:00:50', '2016-06-07 14:00:50', '38', null);
INSERT INTO `problema_detalle` VALUES ('76', '75', '1', '2016-06-07 13:56:00', '', '1', '2016-06-07 14:01:18', '2016-06-07 14:01:18', '38', null);
INSERT INTO `problema_detalle` VALUES ('77', '76', '1', '2016-06-07 13:56:00', '', '1', '2016-06-07 14:01:36', '2016-06-07 14:01:36', '38', null);
INSERT INTO `problema_detalle` VALUES ('78', '62', '2', '2016-06-08 08:04:00', 'actualizado a atendido', '1', '2016-06-08 08:04:06', '2016-06-08 08:04:06', null, null);
INSERT INTO `problema_detalle` VALUES ('79', '70', '2', '2016-06-08 08:49:00', 'actualizado a atendido', '1', '2016-06-08 08:50:02', '2016-06-08 08:50:02', null, null);
INSERT INTO `problema_detalle` VALUES ('80', '70', '3', '2016-06-08 00:00:00', 'si tiene alguna consulta no dude en escribirnos', '1', '2016-06-08 08:50:39', '2016-06-08 08:50:39', null, null);
INSERT INTO `problema_detalle` VALUES ('81', '26', '2', '2016-06-08 08:51:00', 'actualizado a atendido', '1', '2016-06-08 08:51:52', '2016-06-08 08:51:52', null, null);
INSERT INTO `problema_detalle` VALUES ('82', '26', '3', '2016-06-08 00:00:00', 'enviar informacion de estudiantes al correo', '1', '2016-06-08 08:52:11', '2016-06-08 08:52:11', null, null);
INSERT INTO `problema_detalle` VALUES ('83', '24', '2', '2016-06-08 08:52:00', 'actualizado a atendido', '1', '2016-06-08 08:52:30', '2016-06-08 08:52:30', null, null);
INSERT INTO `problema_detalle` VALUES ('84', '24', '3', '2016-06-08 00:00:00', 'enviar al correo de campus', '1', '2016-06-08 08:53:16', '2016-06-08 08:53:16', null, null);
INSERT INTO `problema_detalle` VALUES ('85', '62', '3', '2016-06-08 00:00:00', 'cominiquese con logistica', '1', '2016-06-08 08:53:41', '2016-06-08 08:53:41', null, null);
INSERT INTO `problema_detalle` VALUES ('86', '12', '2', '2016-06-08 08:53:00', 'actualizado a atendido', '1', '2016-06-08 08:53:55', '2016-06-08 08:53:55', null, null);
INSERT INTO `problema_detalle` VALUES ('87', '12', '3', '2016-06-08 00:00:00', 'estan siendo corregidos', '1', '2016-06-08 08:54:10', '2016-06-08 08:54:10', null, null);
INSERT INTO `problema_detalle` VALUES ('88', '3', '2', '2016-06-08 08:54:00', 'actualizado a atendido', '1', '2016-06-08 08:54:32', '2016-06-08 08:54:32', null, null);
INSERT INTO `problema_detalle` VALUES ('89', '3', '3', '2016-06-08 00:00:00', 'estan siendo solucionados', '1', '2016-06-08 08:54:51', '2016-06-08 08:54:51', null, null);
INSERT INTO `problema_detalle` VALUES ('90', '77', '1', '2016-06-10 07:22:00', '', '1', '2016-06-10 07:23:49', '2016-06-10 07:23:49', '19', null);
INSERT INTO `problema_detalle` VALUES ('91', '78', '1', '2016-06-10 07:22:00', '', '1', '2016-06-10 07:31:19', '2016-06-10 07:31:19', '19', null);
INSERT INTO `problema_detalle` VALUES ('92', '79', '1', '2016-06-10 07:22:00', '', '1', '2016-06-10 07:33:33', '2016-06-10 07:33:33', '19', null);
INSERT INTO `problema_detalle` VALUES ('93', '80', '1', '2016-06-10 07:22:00', '', '1', '2016-06-10 07:34:51', '2016-06-10 07:34:51', '19', null);
INSERT INTO `problema_detalle` VALUES ('94', '81', '1', '2016-06-10 07:22:00', '', '1', '2016-06-10 07:35:49', '2016-06-10 07:35:49', '19', null);
INSERT INTO `problema_detalle` VALUES ('95', '82', '1', '2016-06-10 07:22:00', '', '1', '2016-06-10 07:37:00', '2016-06-10 07:37:00', '19', null);
INSERT INTO `problema_detalle` VALUES ('96', '83', '1', '2016-06-10 07:22:00', '', '1', '2016-06-10 07:38:18', '2016-06-10 07:38:18', '19', null);
INSERT INTO `problema_detalle` VALUES ('97', '84', '1', '2016-06-10 07:22:00', '', '1', '2016-06-10 07:39:54', '2016-06-10 07:39:54', '19', null);
INSERT INTO `problema_detalle` VALUES ('98', '85', '1', '2016-06-10 07:22:00', '', '1', '2016-06-10 07:41:32', '2016-06-10 07:41:32', '19', null);
INSERT INTO `problema_detalle` VALUES ('99', '86', '1', '2016-06-10 07:22:00', '', '1', '2016-06-10 07:42:30', '2016-06-10 07:42:30', '19', null);
INSERT INTO `problema_detalle` VALUES ('100', '87', '1', '2016-06-10 07:22:00', '', '1', '2016-06-10 07:42:58', '2016-06-10 07:42:58', '19', null);
INSERT INTO `problema_detalle` VALUES ('101', '88', '1', '2016-06-10 07:22:00', '', '1', '2016-06-10 07:43:38', '2016-06-10 07:43:38', '19', null);
INSERT INTO `problema_detalle` VALUES ('102', '89', '1', '2016-06-10 07:22:00', '', '1', '2016-06-10 07:45:13', '2016-06-10 07:45:13', '19', null);
INSERT INTO `problema_detalle` VALUES ('103', '90', '1', '2016-06-14 14:08:00', '', '1', '2016-06-14 14:10:13', '2016-06-14 14:10:13', '41', null);
INSERT INTO `problema_detalle` VALUES ('104', '91', '1', '2016-06-14 14:08:00', '', '1', '2016-06-14 14:12:32', '2016-06-14 14:12:32', '41', null);
INSERT INTO `problema_detalle` VALUES ('105', '92', '1', '2016-06-14 14:08:00', '', '1', '2016-06-14 14:15:36', '2016-06-14 14:15:36', '41', null);
INSERT INTO `problema_detalle` VALUES ('106', '93', '1', '2016-06-14 14:16:00', '', '1', '2016-06-14 18:46:57', '2016-06-14 18:46:57', '41', null);
INSERT INTO `problema_detalle` VALUES ('107', '94', '1', '2016-06-14 14:16:00', '', '1', '2016-06-14 18:50:23', '2016-06-14 18:50:23', '41', null);
INSERT INTO `problema_detalle` VALUES ('108', '95', '1', '2016-06-14 14:16:00', '', '1', '2016-06-14 19:06:58', '2016-06-14 19:06:58', '41', null);
INSERT INTO `problema_detalle` VALUES ('109', '96', '1', '2016-06-15 08:18:00', '', '1', '2016-06-15 08:20:45', '2016-06-15 08:20:45', '19', null);
INSERT INTO `problema_detalle` VALUES ('110', '97', '1', '2016-06-17 17:39:00', '', '1', '2016-06-17 17:40:30', '2016-06-17 17:40:30', '34', null);
INSERT INTO `problema_detalle` VALUES ('111', '98', '1', '2016-06-17 17:39:00', '', '1', '2016-06-17 17:43:42', '2016-06-17 17:43:42', '34', null);
INSERT INTO `problema_detalle` VALUES ('112', '99', '1', '2016-06-17 17:41:00', '', '1', '2016-06-17 17:43:56', '2016-06-17 17:43:56', '38', null);
INSERT INTO `problema_detalle` VALUES ('113', '100', '1', '2016-06-17 17:41:00', '', '1', '2016-06-17 17:45:23', '2016-06-17 17:45:23', '38', null);
INSERT INTO `problema_detalle` VALUES ('114', '101', '1', '2016-06-17 17:39:00', '', '1', '2016-06-17 17:46:44', '2016-06-17 17:46:44', '34', null);
INSERT INTO `problema_detalle` VALUES ('115', '102', '1', '2016-06-17 17:41:00', '', '1', '2016-06-17 17:53:06', '2016-06-17 17:53:06', '38', null);
INSERT INTO `problema_detalle` VALUES ('116', '103', '1', '2016-06-17 17:41:00', '', '1', '2016-06-17 17:54:48', '2016-06-17 17:54:48', '38', null);
INSERT INTO `problema_detalle` VALUES ('117', '104', '1', '2016-06-17 17:41:00', '', '1', '2016-06-17 17:55:48', '2016-06-17 17:55:48', '38', null);
INSERT INTO `problema_detalle` VALUES ('118', '105', '1', '2016-06-17 17:41:00', '', '1', '2016-06-17 17:57:58', '2016-06-17 17:57:58', '38', null);
INSERT INTO `problema_detalle` VALUES ('119', '106', '1', '2016-06-17 17:41:00', '', '1', '2016-06-17 17:59:57', '2016-06-17 17:59:57', '38', null);
INSERT INTO `problema_detalle` VALUES ('120', '107', '1', '2016-06-17 18:25:00', '', '1', '2016-06-17 18:28:59', '2016-06-17 18:28:59', '41', null);
INSERT INTO `problema_detalle` VALUES ('121', '108', '1', '2016-06-18 19:11:00', '', '1', '2016-06-18 19:16:10', '2016-06-18 19:16:10', '26', null);
INSERT INTO `problema_detalle` VALUES ('122', '109', '1', '2016-06-21 12:22:00', '', '1', '2016-06-21 12:34:37', '2016-06-21 12:34:37', '16', null);
INSERT INTO `problema_detalle` VALUES ('123', '110', '1', '2016-06-21 12:35:00', '', '1', '2016-06-21 12:37:03', '2016-06-21 12:37:03', '16', null);
INSERT INTO `problema_detalle` VALUES ('124', '111', '1', '2016-06-24 15:52:00', '', '1', '2016-06-24 15:57:32', '2016-06-24 15:57:32', '19', null);
INSERT INTO `problema_detalle` VALUES ('125', '112', '1', '2016-06-24 15:52:00', '', '1', '2016-06-24 15:57:54', '2016-06-24 15:57:54', '19', null);
INSERT INTO `problema_detalle` VALUES ('126', '113', '1', '2016-06-24 15:52:00', '', '1', '2016-06-24 15:58:43', '2016-06-24 15:58:43', '19', null);
INSERT INTO `problema_detalle` VALUES ('127', '114', '1', '2016-06-24 15:52:00', '', '1', '2016-06-24 16:03:38', '2016-06-24 16:03:38', '19', null);
INSERT INTO `problema_detalle` VALUES ('128', '115', '1', '2016-06-24 15:52:00', '', '1', '2016-06-24 16:04:28', '2016-06-24 16:04:28', '19', null);
INSERT INTO `problema_detalle` VALUES ('129', '116', '1', '2016-06-27 09:49:00', '', '1', '2016-06-27 09:50:39', '2016-06-27 09:50:39', '38', null);
INSERT INTO `problema_detalle` VALUES ('130', '117', '1', '2016-06-27 09:49:00', '', '1', '2016-06-27 09:51:09', '2016-06-27 09:51:09', '38', null);
INSERT INTO `problema_detalle` VALUES ('131', '118', '1', '2016-06-27 09:49:00', '', '1', '2016-06-27 09:53:02', '2016-06-27 09:53:02', '38', null);
INSERT INTO `problema_detalle` VALUES ('132', '119', '1', '2016-06-27 09:49:00', '', '1', '2016-06-27 09:54:09', '2016-06-27 09:54:09', '38', null);
INSERT INTO `problema_detalle` VALUES ('133', '120', '1', '2016-06-27 09:49:00', '', '1', '2016-06-27 09:54:48', '2016-06-27 09:54:48', '38', null);
INSERT INTO `problema_detalle` VALUES ('134', '121', '1', '2016-06-28 07:29:00', '', '1', '2016-06-28 07:33:25', '2016-06-28 07:33:25', '19', null);
INSERT INTO `problema_detalle` VALUES ('135', '97', '2', '2016-06-28 12:07:00', 'actualizado a atendido', '1', '2016-06-28 12:07:47', '2016-06-28 12:07:47', null, null);
INSERT INTO `problema_detalle` VALUES ('136', '100', '2', '2016-06-28 12:07:00', 'actualizado a atendido', '1', '2016-06-28 12:07:55', '2016-06-28 12:07:55', null, null);
INSERT INTO `problema_detalle` VALUES ('137', '117', '2', '2016-06-28 12:07:00', 'actualizado a atendido', '1', '2016-06-28 12:07:56', '2016-06-28 12:07:56', null, null);
INSERT INTO `problema_detalle` VALUES ('138', '117', '3', '2016-06-28 00:00:00', 'no hay consulta', '1', '2016-06-28 12:08:32', '2016-06-28 12:08:32', null, null);
INSERT INTO `problema_detalle` VALUES ('139', '97', '3', '2016-06-28 00:00:00', 'se realizaron las actualizaciones correspondientes ', '1', '2016-06-28 12:09:00', '2016-06-28 12:09:00', null, null);
INSERT INTO `problema_detalle` VALUES ('140', '100', '3', '2016-06-28 00:00:00', 'notas de examenes finales area de notas con Paucar', '1', '2016-06-28 12:10:01', '2016-06-28 12:10:01', null, null);
INSERT INTO `problema_detalle` VALUES ('141', '122', '1', '2016-07-01 09:51:00', '', '1', '2016-07-01 09:54:35', '2016-07-01 09:54:35', '19', null);
INSERT INTO `problema_detalle` VALUES ('142', '123', '1', '2016-07-01 09:51:00', '', '1', '2016-07-01 09:55:33', '2016-07-01 09:55:33', '19', null);
INSERT INTO `problema_detalle` VALUES ('143', '124', '1', '2016-07-01 09:51:00', '', '1', '2016-07-01 09:56:35', '2016-07-01 09:56:35', '19', null);
INSERT INTO `problema_detalle` VALUES ('144', '125', '1', '2016-07-01 09:51:00', '', '1', '2016-07-01 09:58:03', '2016-07-01 09:58:03', '19', null);
INSERT INTO `problema_detalle` VALUES ('145', '126', '1', '2016-07-01 09:51:00', '', '1', '2016-07-01 09:58:35', '2016-07-01 09:58:35', '19', null);
INSERT INTO `problema_detalle` VALUES ('146', '127', '1', '2016-07-01 09:51:00', '', '1', '2016-07-01 09:58:50', '2016-07-01 09:58:50', '19', null);
INSERT INTO `problema_detalle` VALUES ('147', '128', '1', '2016-07-01 09:51:00', '', '1', '2016-07-01 09:59:03', '2016-07-01 09:59:03', '19', null);

-- ----------------------------
-- Table structure for sedes
-- ----------------------------
DROP TABLE IF EXISTS `sedes`;
CREATE TABLE `sedes` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(50) NOT NULL,
  `telefono` varchar(15) DEFAULT NULL,
  `estado` int(11) NOT NULL DEFAULT '1',
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  `usuario_created_at` int(11) DEFAULT NULL,
  `usuario_updated_at` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=49 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of sedes
-- ----------------------------
INSERT INTO `sedes` VALUES ('1', 'AREQUIPA', null, '1', '2015-10-18 21:27:26', '2016-06-04 12:22:34', '1', '6');
INSERT INTO `sedes` VALUES ('2', 'AYACUCHO', null, '1', '2015-10-18 21:27:26', '2015-10-27 21:14:21', '1', '1');
INSERT INTO `sedes` VALUES ('3', 'BAGUA', null, '1', '2015-10-18 21:27:26', null, '1', null);
INSERT INTO `sedes` VALUES ('4', 'BAGUA GRANDE - UTCUBAMBA', null, '1', '2015-10-18 21:27:26', null, '1', null);
INSERT INTO `sedes` VALUES ('5', 'CAJAMARCA', null, '1', '2015-10-18 21:27:26', null, '1', null);
INSERT INTO `sedes` VALUES ('6', 'CANETE', null, '1', '2015-10-18 21:27:26', null, '1', null);
INSERT INTO `sedes` VALUES ('7', 'CHICLAYO', null, '1', '2015-10-18 21:27:26', null, '1', null);
INSERT INTO `sedes` VALUES ('8', 'CUTERVO', null, '1', '2015-10-18 21:27:26', null, '1', null);
INSERT INTO `sedes` VALUES ('9', 'CUZCO', null, '1', '2015-10-18 21:27:26', null, '1', null);
INSERT INTO `sedes` VALUES ('10', 'HUACHO', null, '1', '2015-10-18 21:27:26', null, '1', null);
INSERT INTO `sedes` VALUES ('11', 'HUANCAVELICA', null, '1', '2015-10-18 21:27:26', null, '1', null);
INSERT INTO `sedes` VALUES ('12', 'HUANCAYO', null, '1', '2015-10-18 21:27:26', null, '1', null);
INSERT INTO `sedes` VALUES ('13', 'HUARAL', null, '1', '2015-10-18 21:27:26', null, '1', null);
INSERT INTO `sedes` VALUES ('14', 'HUARAZ', null, '1', '2015-10-18 21:27:26', null, '1', null);
INSERT INTO `sedes` VALUES ('15', 'ICA', null, '1', '2015-10-18 21:27:26', null, '1', null);
INSERT INTO `sedes` VALUES ('16', 'IQUITOS', null, '1', '2015-10-18 21:27:26', null, '1', null);
INSERT INTO `sedes` VALUES ('17', 'JAEN', null, '1', '2015-10-18 21:27:26', null, '1', null);
INSERT INTO `sedes` VALUES ('18', 'JULIACA', null, '1', '2015-10-18 21:27:26', null, '1', null);
INSERT INTO `sedes` VALUES ('19', 'LIMA-28 DE JULIO', null, '1', '2015-10-18 21:27:26', null, '1', null);
INSERT INTO `sedes` VALUES ('20', 'LIMA-ANCON', null, '1', '2015-10-18 21:27:26', null, '1', null);
INSERT INTO `sedes` VALUES ('21', 'LIMA-AREQ220', null, '1', '2015-10-18 21:27:26', null, '1', null);
INSERT INTO `sedes` VALUES ('22', 'LIMA-AREQ294', null, '1', '2015-10-18 21:27:26', null, '1', null);
INSERT INTO `sedes` VALUES ('23', 'LIMA-AREQ3545', null, '1', '2015-10-18 21:27:26', null, '1', null);
INSERT INTO `sedes` VALUES ('24', 'LIMA-AREQ3565', null, '1', '2015-10-18 21:27:26', null, '1', null);
INSERT INTO `sedes` VALUES ('25', 'LIMA-HUACHIPA', null, '1', '2015-10-18 21:27:26', null, '1', null);
INSERT INTO `sedes` VALUES ('26', 'LIMA-HUAYCAN', null, '1', '2015-10-18 21:27:26', null, '1', null);
INSERT INTO `sedes` VALUES ('27', 'LIMA-JUNIN', null, '1', '2015-10-18 21:27:26', null, '1', null);
INSERT INTO `sedes` VALUES ('28', 'LIMA-LINCE', null, '1', '2015-10-18 21:27:26', null, '1', null);
INSERT INTO `sedes` VALUES ('29', 'LIMA-LOS OLIVOS', null, '1', '2015-10-18 21:27:26', null, '1', null);
INSERT INTO `sedes` VALUES ('30', 'LIMA-S.J.LURIGANCHO', null, '1', '2015-10-18 21:27:26', null, '1', null);
INSERT INTO `sedes` VALUES ('31', 'MOQUEGUA', null, '1', '2015-10-18 21:27:26', null, '1', null);
INSERT INTO `sedes` VALUES ('32', 'NAZCA ', null, '1', '2015-10-18 21:27:26', null, '1', null);
INSERT INTO `sedes` VALUES ('33', 'PASCO', null, '1', '2015-10-18 21:27:26', null, '1', null);
INSERT INTO `sedes` VALUES ('34', 'PISCO', null, '1', '2015-10-18 21:27:26', null, '1', null);
INSERT INTO `sedes` VALUES ('35', 'PUCALLPA', null, '1', '2015-10-18 21:27:26', null, '1', null);
INSERT INTO `sedes` VALUES ('36', 'PUERTO MALDONADO', null, '1', '2015-10-18 21:27:26', null, '1', null);
INSERT INTO `sedes` VALUES ('37', 'PUNO', null, '1', '2015-10-18 21:27:26', null, '1', null);
INSERT INTO `sedes` VALUES ('38', 'SICUANI', null, '1', '2015-10-18 21:27:26', null, '1', null);
INSERT INTO `sedes` VALUES ('39', 'TACNA', null, '1', '2015-10-18 21:27:26', null, '1', null);
INSERT INTO `sedes` VALUES ('40', 'TRUJILLO', null, '1', '2015-10-18 21:27:26', null, '1', null);
INSERT INTO `sedes` VALUES ('41', 'TUMBES', null, '1', '2015-10-18 21:27:26', null, '1', null);
INSERT INTO `sedes` VALUES ('42', 'NUEVA SEDE', null, '1', '2015-10-23 20:43:38', '2015-10-23 20:43:38', '1', null);
INSERT INTO `sedes` VALUES ('43', 'PIURA', null, '1', '2015-10-23 20:44:03', '2015-10-23 20:44:03', '1', null);
INSERT INTO `sedes` VALUES ('44', 'BAMBAMARCA', null, '1', '2016-06-04 13:29:52', '2016-06-04 13:29:52', '6', null);
INSERT INTO `sedes` VALUES ('45', 'HUANUCO', null, '1', '2016-06-06 11:02:13', '2016-06-06 11:02:13', '6', null);
INSERT INTO `sedes` VALUES ('46', 'CHIMBOTE', null, '1', '2016-06-06 11:19:59', '2016-06-06 11:19:59', '6', null);
INSERT INTO `sedes` VALUES ('47', 'ABANCAY', null, '1', '2016-06-06 13:14:43', '2016-06-06 13:14:43', '6', null);
INSERT INTO `sedes` VALUES ('48', 'LIMA SAN LUIS', null, '1', '2016-06-09 20:29:53', '2016-06-09 20:29:53', '6', null);

-- ----------------------------
-- Table structure for sede_cargo_persona
-- ----------------------------
DROP TABLE IF EXISTS `sede_cargo_persona`;
CREATE TABLE `sede_cargo_persona` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `sede_id` int(11) NOT NULL,
  `cargo_persona_id` int(11) NOT NULL,
  `fecha_ingreso` date DEFAULT NULL,
  `fecha_retiro` date DEFAULT NULL,
  `estado` int(11) NOT NULL DEFAULT '1',
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  `usuario_created_at` int(11) DEFAULT NULL,
  `usuario_updated_at` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `acp_area_id_idx` (`sede_id`) USING BTREE,
  KEY `acp_cargo_id_idx` (`cargo_persona_id`) USING BTREE,
  CONSTRAINT `sede_cargo_persona_ibfk_1` FOREIGN KEY (`sede_id`) REFERENCES `sedes` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `sede_cargo_persona_ibfk_2` FOREIGN KEY (`cargo_persona_id`) REFERENCES `cargo_persona` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=962 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of sede_cargo_persona
-- ----------------------------
INSERT INTO `sede_cargo_persona` VALUES ('175', '1', '7', null, null, '0', null, null, '1', '6');
INSERT INTO `sede_cargo_persona` VALUES ('176', '3', '7', null, null, '0', null, null, '1', '1');
INSERT INTO `sede_cargo_persona` VALUES ('177', '3', '8', null, null, '0', null, null, '1', '1');
INSERT INTO `sede_cargo_persona` VALUES ('178', '2', '9', null, null, '0', null, null, '1', '1');
INSERT INTO `sede_cargo_persona` VALUES ('179', '3', '9', null, null, '0', null, null, '1', '1');
INSERT INTO `sede_cargo_persona` VALUES ('180', '4', '9', null, null, '0', null, null, '1', '1');
INSERT INTO `sede_cargo_persona` VALUES ('181', '5', '9', null, null, '0', null, null, '1', '1');
INSERT INTO `sede_cargo_persona` VALUES ('182', '6', '9', null, null, '0', null, null, '1', '1');
INSERT INTO `sede_cargo_persona` VALUES ('183', '7', '9', null, null, '0', null, null, '1', '1');
INSERT INTO `sede_cargo_persona` VALUES ('184', '8', '9', null, null, '0', null, null, '1', '1');
INSERT INTO `sede_cargo_persona` VALUES ('185', '9', '9', null, null, '0', null, null, '1', '1');
INSERT INTO `sede_cargo_persona` VALUES ('186', '10', '9', null, null, '0', null, null, '1', '1');
INSERT INTO `sede_cargo_persona` VALUES ('187', '11', '9', null, null, '0', null, null, '1', '1');
INSERT INTO `sede_cargo_persona` VALUES ('188', '12', '9', null, null, '0', null, null, '1', '1');
INSERT INTO `sede_cargo_persona` VALUES ('189', '13', '9', null, null, '0', null, null, '1', '1');
INSERT INTO `sede_cargo_persona` VALUES ('190', '14', '9', null, null, '0', null, null, '1', '1');
INSERT INTO `sede_cargo_persona` VALUES ('191', '15', '9', null, null, '0', null, null, '1', '1');
INSERT INTO `sede_cargo_persona` VALUES ('192', '16', '9', null, null, '0', null, null, '1', '1');
INSERT INTO `sede_cargo_persona` VALUES ('193', '17', '9', null, null, '0', null, null, '1', '1');
INSERT INTO `sede_cargo_persona` VALUES ('194', '18', '9', null, null, '0', null, null, '1', '1');
INSERT INTO `sede_cargo_persona` VALUES ('195', '19', '9', null, null, '0', null, null, '1', '1');
INSERT INTO `sede_cargo_persona` VALUES ('196', '20', '9', null, null, '0', null, null, '1', '1');
INSERT INTO `sede_cargo_persona` VALUES ('197', '21', '9', null, null, '0', null, null, '1', '1');
INSERT INTO `sede_cargo_persona` VALUES ('198', '22', '9', null, null, '0', null, null, '1', '1');
INSERT INTO `sede_cargo_persona` VALUES ('199', '23', '9', null, null, '0', null, null, '1', '1');
INSERT INTO `sede_cargo_persona` VALUES ('200', '24', '9', null, null, '0', null, null, '1', '1');
INSERT INTO `sede_cargo_persona` VALUES ('201', '25', '9', null, null, '0', null, null, '1', '1');
INSERT INTO `sede_cargo_persona` VALUES ('202', '26', '9', null, null, '0', null, null, '1', '1');
INSERT INTO `sede_cargo_persona` VALUES ('203', '27', '9', null, null, '0', null, null, '1', '1');
INSERT INTO `sede_cargo_persona` VALUES ('204', '28', '9', null, null, '0', null, null, '1', '1');
INSERT INTO `sede_cargo_persona` VALUES ('205', '29', '9', null, null, '0', null, null, '1', '1');
INSERT INTO `sede_cargo_persona` VALUES ('206', '30', '9', null, null, '0', null, null, '1', '1');
INSERT INTO `sede_cargo_persona` VALUES ('207', '31', '9', null, null, '0', null, null, '1', '1');
INSERT INTO `sede_cargo_persona` VALUES ('208', '32', '9', null, null, '0', null, null, '1', '1');
INSERT INTO `sede_cargo_persona` VALUES ('209', '42', '9', null, null, '0', null, null, '1', '1');
INSERT INTO `sede_cargo_persona` VALUES ('210', '33', '9', null, null, '0', null, null, '1', '1');
INSERT INTO `sede_cargo_persona` VALUES ('211', '34', '9', null, null, '0', null, null, '1', '1');
INSERT INTO `sede_cargo_persona` VALUES ('212', '43', '9', null, null, '0', null, null, '1', '1');
INSERT INTO `sede_cargo_persona` VALUES ('213', '35', '9', null, null, '0', null, null, '1', '1');
INSERT INTO `sede_cargo_persona` VALUES ('214', '36', '9', null, null, '0', null, null, '1', '1');
INSERT INTO `sede_cargo_persona` VALUES ('215', '37', '9', null, null, '0', null, null, '1', '1');
INSERT INTO `sede_cargo_persona` VALUES ('216', '38', '9', null, null, '0', null, null, '1', '1');
INSERT INTO `sede_cargo_persona` VALUES ('217', '39', '9', null, null, '0', null, null, '1', '1');
INSERT INTO `sede_cargo_persona` VALUES ('218', '40', '9', null, null, '0', null, null, '1', '1');
INSERT INTO `sede_cargo_persona` VALUES ('219', '41', '9', null, null, '0', null, null, '1', '1');
INSERT INTO `sede_cargo_persona` VALUES ('220', '6', '8', null, null, '1', null, null, '1', null);
INSERT INTO `sede_cargo_persona` VALUES ('221', '1', '10', null, null, '0', null, null, '1', '6');
INSERT INTO `sede_cargo_persona` VALUES ('222', '2', '10', null, null, '0', null, null, '1', '1');
INSERT INTO `sede_cargo_persona` VALUES ('223', '3', '10', null, null, '0', null, null, '1', '1');
INSERT INTO `sede_cargo_persona` VALUES ('224', '4', '10', null, null, '0', null, null, '1', '1');
INSERT INTO `sede_cargo_persona` VALUES ('225', '5', '10', null, null, '0', null, null, '1', '1');
INSERT INTO `sede_cargo_persona` VALUES ('226', '6', '10', null, null, '0', null, null, '1', '1');
INSERT INTO `sede_cargo_persona` VALUES ('227', '7', '10', null, null, '0', null, null, '1', '1');
INSERT INTO `sede_cargo_persona` VALUES ('228', '8', '10', null, null, '0', null, null, '1', '1');
INSERT INTO `sede_cargo_persona` VALUES ('229', '9', '10', null, null, '0', null, null, '1', '1');
INSERT INTO `sede_cargo_persona` VALUES ('230', '10', '10', null, null, '0', null, null, '1', '1');
INSERT INTO `sede_cargo_persona` VALUES ('231', '11', '10', null, null, '0', null, null, '1', '1');
INSERT INTO `sede_cargo_persona` VALUES ('232', '12', '10', null, null, '0', null, null, '1', '1');
INSERT INTO `sede_cargo_persona` VALUES ('233', '13', '10', null, null, '0', null, null, '1', '1');
INSERT INTO `sede_cargo_persona` VALUES ('234', '14', '10', null, null, '0', null, null, '1', '1');
INSERT INTO `sede_cargo_persona` VALUES ('235', '15', '10', null, null, '0', null, null, '1', '1');
INSERT INTO `sede_cargo_persona` VALUES ('236', '16', '10', null, null, '0', null, null, '1', '1');
INSERT INTO `sede_cargo_persona` VALUES ('237', '17', '10', null, null, '0', null, null, '1', '1');
INSERT INTO `sede_cargo_persona` VALUES ('238', '18', '10', null, null, '0', null, null, '1', '1');
INSERT INTO `sede_cargo_persona` VALUES ('239', '19', '10', null, null, '0', null, null, '1', '1');
INSERT INTO `sede_cargo_persona` VALUES ('240', '20', '10', null, null, '0', null, null, '1', '1');
INSERT INTO `sede_cargo_persona` VALUES ('241', '21', '10', null, null, '0', null, null, '1', '1');
INSERT INTO `sede_cargo_persona` VALUES ('242', '22', '10', null, null, '0', null, null, '1', '1');
INSERT INTO `sede_cargo_persona` VALUES ('243', '23', '10', null, null, '0', null, null, '1', '1');
INSERT INTO `sede_cargo_persona` VALUES ('244', '24', '10', null, null, '0', null, null, '1', '1');
INSERT INTO `sede_cargo_persona` VALUES ('245', '25', '10', null, null, '0', null, null, '1', '1');
INSERT INTO `sede_cargo_persona` VALUES ('246', '26', '10', null, null, '0', null, null, '1', '1');
INSERT INTO `sede_cargo_persona` VALUES ('247', '27', '10', null, null, '0', null, null, '1', '1');
INSERT INTO `sede_cargo_persona` VALUES ('248', '28', '10', null, null, '0', null, null, '1', '1');
INSERT INTO `sede_cargo_persona` VALUES ('249', '29', '10', null, null, '0', null, null, '1', '1');
INSERT INTO `sede_cargo_persona` VALUES ('250', '30', '10', null, null, '0', null, null, '1', '1');
INSERT INTO `sede_cargo_persona` VALUES ('251', '31', '10', null, null, '0', null, null, '1', '1');
INSERT INTO `sede_cargo_persona` VALUES ('252', '32', '10', null, null, '0', null, null, '1', '1');
INSERT INTO `sede_cargo_persona` VALUES ('253', '42', '10', null, null, '0', null, null, '1', '1');
INSERT INTO `sede_cargo_persona` VALUES ('254', '33', '10', null, null, '0', null, null, '1', '1');
INSERT INTO `sede_cargo_persona` VALUES ('255', '34', '10', null, null, '0', null, null, '1', '1');
INSERT INTO `sede_cargo_persona` VALUES ('256', '43', '10', null, null, '0', null, null, '1', '1');
INSERT INTO `sede_cargo_persona` VALUES ('257', '35', '10', null, null, '0', null, null, '1', '1');
INSERT INTO `sede_cargo_persona` VALUES ('258', '36', '10', null, null, '0', null, null, '1', '1');
INSERT INTO `sede_cargo_persona` VALUES ('259', '37', '10', null, null, '0', null, null, '1', '1');
INSERT INTO `sede_cargo_persona` VALUES ('260', '38', '10', null, null, '0', null, null, '1', '1');
INSERT INTO `sede_cargo_persona` VALUES ('261', '39', '10', null, null, '0', null, null, '1', '1');
INSERT INTO `sede_cargo_persona` VALUES ('262', '40', '10', null, null, '0', null, null, '1', '1');
INSERT INTO `sede_cargo_persona` VALUES ('263', '41', '10', null, null, '0', null, null, '1', '1');
INSERT INTO `sede_cargo_persona` VALUES ('265', '1', '12', null, null, '0', null, null, '1', '6');
INSERT INTO `sede_cargo_persona` VALUES ('266', '2', '12', null, null, '1', null, null, '1', '1');
INSERT INTO `sede_cargo_persona` VALUES ('267', '3', '12', null, null, '1', null, null, '1', '1');
INSERT INTO `sede_cargo_persona` VALUES ('268', '4', '12', null, null, '1', null, null, '1', '1');
INSERT INTO `sede_cargo_persona` VALUES ('269', '5', '12', null, null, '1', null, null, '1', '1');
INSERT INTO `sede_cargo_persona` VALUES ('270', '6', '12', null, null, '1', null, null, '1', '1');
INSERT INTO `sede_cargo_persona` VALUES ('271', '7', '12', null, null, '1', null, null, '1', '1');
INSERT INTO `sede_cargo_persona` VALUES ('272', '8', '12', null, null, '1', null, null, '1', '1');
INSERT INTO `sede_cargo_persona` VALUES ('273', '9', '12', null, null, '1', null, null, '1', '1');
INSERT INTO `sede_cargo_persona` VALUES ('274', '10', '12', null, null, '1', null, null, '1', '1');
INSERT INTO `sede_cargo_persona` VALUES ('275', '11', '12', null, null, '1', null, null, '1', '1');
INSERT INTO `sede_cargo_persona` VALUES ('276', '12', '12', null, null, '1', null, null, '1', '1');
INSERT INTO `sede_cargo_persona` VALUES ('277', '13', '12', null, null, '1', null, null, '1', '1');
INSERT INTO `sede_cargo_persona` VALUES ('278', '14', '12', null, null, '1', null, null, '1', '1');
INSERT INTO `sede_cargo_persona` VALUES ('279', '15', '12', null, null, '1', null, null, '1', '1');
INSERT INTO `sede_cargo_persona` VALUES ('280', '16', '12', null, null, '1', null, null, '1', '1');
INSERT INTO `sede_cargo_persona` VALUES ('281', '17', '12', null, null, '1', null, null, '1', '1');
INSERT INTO `sede_cargo_persona` VALUES ('282', '18', '12', null, null, '1', null, null, '1', '1');
INSERT INTO `sede_cargo_persona` VALUES ('283', '19', '12', null, null, '1', null, null, '1', '1');
INSERT INTO `sede_cargo_persona` VALUES ('284', '20', '12', null, null, '1', null, null, '1', '1');
INSERT INTO `sede_cargo_persona` VALUES ('285', '21', '12', null, null, '1', null, null, '1', '1');
INSERT INTO `sede_cargo_persona` VALUES ('286', '22', '12', null, null, '1', null, null, '1', '1');
INSERT INTO `sede_cargo_persona` VALUES ('287', '23', '12', null, null, '1', null, null, '1', '1');
INSERT INTO `sede_cargo_persona` VALUES ('288', '24', '12', null, null, '1', null, null, '1', '1');
INSERT INTO `sede_cargo_persona` VALUES ('289', '25', '12', null, null, '1', null, null, '1', '1');
INSERT INTO `sede_cargo_persona` VALUES ('290', '26', '12', null, null, '1', null, null, '1', '1');
INSERT INTO `sede_cargo_persona` VALUES ('291', '27', '12', null, null, '1', null, null, '1', '1');
INSERT INTO `sede_cargo_persona` VALUES ('292', '28', '12', null, null, '1', null, null, '1', '1');
INSERT INTO `sede_cargo_persona` VALUES ('293', '29', '12', null, null, '1', null, null, '1', '1');
INSERT INTO `sede_cargo_persona` VALUES ('294', '30', '12', null, null, '1', null, null, '1', '1');
INSERT INTO `sede_cargo_persona` VALUES ('295', '31', '12', null, null, '1', null, null, '1', '1');
INSERT INTO `sede_cargo_persona` VALUES ('296', '32', '12', null, null, '1', null, null, '1', '1');
INSERT INTO `sede_cargo_persona` VALUES ('297', '42', '12', null, null, '1', null, null, '1', '1');
INSERT INTO `sede_cargo_persona` VALUES ('298', '33', '12', null, null, '1', null, null, '1', '1');
INSERT INTO `sede_cargo_persona` VALUES ('299', '34', '12', null, null, '1', null, null, '1', '1');
INSERT INTO `sede_cargo_persona` VALUES ('300', '43', '12', null, null, '1', null, null, '1', '1');
INSERT INTO `sede_cargo_persona` VALUES ('301', '35', '12', null, null, '1', null, null, '1', '1');
INSERT INTO `sede_cargo_persona` VALUES ('302', '36', '12', null, null, '1', null, null, '1', '1');
INSERT INTO `sede_cargo_persona` VALUES ('303', '37', '12', null, null, '1', null, null, '1', '1');
INSERT INTO `sede_cargo_persona` VALUES ('304', '38', '12', null, null, '1', null, null, '1', '1');
INSERT INTO `sede_cargo_persona` VALUES ('305', '39', '12', null, null, '1', null, null, '1', '1');
INSERT INTO `sede_cargo_persona` VALUES ('306', '40', '12', null, null, '1', null, null, '1', '1');
INSERT INTO `sede_cargo_persona` VALUES ('307', '41', '12', null, null, '1', null, null, '1', '1');
INSERT INTO `sede_cargo_persona` VALUES ('308', '9', '13', null, null, '1', null, null, '6', null);
INSERT INTO `sede_cargo_persona` VALUES ('309', '8', '14', null, null, '1', null, null, '6', null);
INSERT INTO `sede_cargo_persona` VALUES ('310', '1', '15', null, null, '1', null, null, '6', '6');
INSERT INTO `sede_cargo_persona` VALUES ('311', '2', '16', null, null, '1', null, null, '6', '6');
INSERT INTO `sede_cargo_persona` VALUES ('312', '3', '17', null, null, '1', null, null, '6', null);
INSERT INTO `sede_cargo_persona` VALUES ('313', '1', '18', null, null, '1', null, null, '6', '6');
INSERT INTO `sede_cargo_persona` VALUES ('314', '2', '18', null, null, '1', null, null, '6', '6');
INSERT INTO `sede_cargo_persona` VALUES ('315', '3', '18', null, null, '1', null, null, '6', '6');
INSERT INTO `sede_cargo_persona` VALUES ('316', '4', '18', null, null, '1', null, null, '6', '6');
INSERT INTO `sede_cargo_persona` VALUES ('317', '44', '18', null, null, '1', null, null, '6', '6');
INSERT INTO `sede_cargo_persona` VALUES ('318', '5', '18', null, null, '1', null, null, '6', '6');
INSERT INTO `sede_cargo_persona` VALUES ('319', '6', '18', null, null, '1', null, null, '6', '6');
INSERT INTO `sede_cargo_persona` VALUES ('320', '7', '18', null, null, '1', null, null, '6', '6');
INSERT INTO `sede_cargo_persona` VALUES ('321', '8', '18', null, null, '1', null, null, '6', '6');
INSERT INTO `sede_cargo_persona` VALUES ('322', '9', '18', null, null, '1', null, null, '6', '6');
INSERT INTO `sede_cargo_persona` VALUES ('323', '10', '18', null, null, '1', null, null, '6', '6');
INSERT INTO `sede_cargo_persona` VALUES ('324', '11', '18', null, null, '1', null, null, '6', '6');
INSERT INTO `sede_cargo_persona` VALUES ('325', '12', '18', null, null, '1', null, null, '6', '6');
INSERT INTO `sede_cargo_persona` VALUES ('326', '13', '18', null, null, '1', null, null, '6', '6');
INSERT INTO `sede_cargo_persona` VALUES ('327', '14', '18', null, null, '1', null, null, '6', '6');
INSERT INTO `sede_cargo_persona` VALUES ('328', '15', '18', null, null, '1', null, null, '6', '6');
INSERT INTO `sede_cargo_persona` VALUES ('329', '16', '18', null, null, '1', null, null, '6', '6');
INSERT INTO `sede_cargo_persona` VALUES ('330', '17', '18', null, null, '1', null, null, '6', '6');
INSERT INTO `sede_cargo_persona` VALUES ('331', '18', '18', null, null, '1', null, null, '6', '6');
INSERT INTO `sede_cargo_persona` VALUES ('332', '19', '18', null, null, '1', null, null, '6', '6');
INSERT INTO `sede_cargo_persona` VALUES ('333', '20', '18', null, null, '1', null, null, '6', '6');
INSERT INTO `sede_cargo_persona` VALUES ('334', '21', '18', null, null, '1', null, null, '6', '6');
INSERT INTO `sede_cargo_persona` VALUES ('335', '22', '18', null, null, '1', null, null, '6', '6');
INSERT INTO `sede_cargo_persona` VALUES ('336', '23', '18', null, null, '1', null, null, '6', '6');
INSERT INTO `sede_cargo_persona` VALUES ('337', '24', '18', null, null, '1', null, null, '6', '6');
INSERT INTO `sede_cargo_persona` VALUES ('338', '25', '18', null, null, '1', null, null, '6', '6');
INSERT INTO `sede_cargo_persona` VALUES ('339', '26', '18', null, null, '1', null, null, '6', '6');
INSERT INTO `sede_cargo_persona` VALUES ('340', '27', '18', null, null, '1', null, null, '6', '6');
INSERT INTO `sede_cargo_persona` VALUES ('341', '28', '18', null, null, '1', null, null, '6', '6');
INSERT INTO `sede_cargo_persona` VALUES ('342', '29', '18', null, null, '1', null, null, '6', '6');
INSERT INTO `sede_cargo_persona` VALUES ('343', '30', '18', null, null, '1', null, null, '6', '6');
INSERT INTO `sede_cargo_persona` VALUES ('344', '31', '18', null, null, '1', null, null, '6', '6');
INSERT INTO `sede_cargo_persona` VALUES ('345', '32', '18', null, null, '1', null, null, '6', '6');
INSERT INTO `sede_cargo_persona` VALUES ('346', '42', '18', null, null, '1', null, null, '6', '6');
INSERT INTO `sede_cargo_persona` VALUES ('347', '33', '18', null, null, '1', null, null, '6', '6');
INSERT INTO `sede_cargo_persona` VALUES ('348', '34', '18', null, null, '1', null, null, '6', '6');
INSERT INTO `sede_cargo_persona` VALUES ('349', '43', '18', null, null, '1', null, null, '6', '6');
INSERT INTO `sede_cargo_persona` VALUES ('350', '35', '18', null, null, '1', null, null, '6', '6');
INSERT INTO `sede_cargo_persona` VALUES ('351', '36', '18', null, null, '1', null, null, '6', '6');
INSERT INTO `sede_cargo_persona` VALUES ('352', '37', '18', null, null, '1', null, null, '6', '6');
INSERT INTO `sede_cargo_persona` VALUES ('353', '38', '18', null, null, '1', null, null, '6', '6');
INSERT INTO `sede_cargo_persona` VALUES ('354', '39', '18', null, null, '1', null, null, '6', '6');
INSERT INTO `sede_cargo_persona` VALUES ('355', '40', '18', null, null, '1', null, null, '6', '6');
INSERT INTO `sede_cargo_persona` VALUES ('356', '41', '18', null, null, '1', null, null, '6', '6');
INSERT INTO `sede_cargo_persona` VALUES ('357', '11', '19', null, null, '1', null, null, '6', null);
INSERT INTO `sede_cargo_persona` VALUES ('358', '7', '20', null, null, '1', null, null, '6', null);
INSERT INTO `sede_cargo_persona` VALUES ('359', '33', '21', null, null, '1', null, null, '6', null);
INSERT INTO `sede_cargo_persona` VALUES ('360', '37', '22', null, null, '1', null, null, '6', null);
INSERT INTO `sede_cargo_persona` VALUES ('361', '15', '23', null, null, '1', null, null, '6', null);
INSERT INTO `sede_cargo_persona` VALUES ('362', '16', '24', null, null, '1', null, null, '6', null);
INSERT INTO `sede_cargo_persona` VALUES ('363', '10', '25', null, null, '1', null, null, '6', null);
INSERT INTO `sede_cargo_persona` VALUES ('364', '5', '26', null, null, '1', null, null, '6', null);
INSERT INTO `sede_cargo_persona` VALUES ('365', '14', '27', null, null, '1', null, null, '6', null);
INSERT INTO `sede_cargo_persona` VALUES ('366', '36', '28', null, null, '1', null, null, '6', null);
INSERT INTO `sede_cargo_persona` VALUES ('367', '39', '29', null, null, '1', null, null, '6', null);
INSERT INTO `sede_cargo_persona` VALUES ('368', '18', '30', null, null, '1', null, null, '6', null);
INSERT INTO `sede_cargo_persona` VALUES ('369', '45', '31', null, null, '1', null, null, '6', null);
INSERT INTO `sede_cargo_persona` VALUES ('370', '46', '32', null, null, '1', null, null, '6', '6');
INSERT INTO `sede_cargo_persona` VALUES ('371', '12', '33', null, null, '1', null, null, '6', null);
INSERT INTO `sede_cargo_persona` VALUES ('372', '13', '34', null, null, '1', null, null, '6', null);
INSERT INTO `sede_cargo_persona` VALUES ('373', '17', '35', null, null, '1', null, null, '6', null);
INSERT INTO `sede_cargo_persona` VALUES ('374', '31', '36', null, null, '1', null, null, '6', null);
INSERT INTO `sede_cargo_persona` VALUES ('375', '32', '37', null, null, '1', null, null, '6', null);
INSERT INTO `sede_cargo_persona` VALUES ('376', '34', '38', null, null, '1', null, null, '6', null);
INSERT INTO `sede_cargo_persona` VALUES ('377', '43', '39', null, null, '1', null, null, '6', null);
INSERT INTO `sede_cargo_persona` VALUES ('378', '35', '40', null, null, '1', null, null, '6', null);
INSERT INTO `sede_cargo_persona` VALUES ('379', '38', '41', null, null, '1', null, null, '6', null);
INSERT INTO `sede_cargo_persona` VALUES ('380', '40', '42', null, null, '1', null, null, '6', null);
INSERT INTO `sede_cargo_persona` VALUES ('381', '41', '43', null, null, '1', null, null, '6', null);
INSERT INTO `sede_cargo_persona` VALUES ('382', '4', '44', null, null, '1', null, null, '6', null);
INSERT INTO `sede_cargo_persona` VALUES ('383', '6', '45', null, null, '1', null, null, '6', null);
INSERT INTO `sede_cargo_persona` VALUES ('384', '47', '46', null, null, '1', null, null, '6', '6');
INSERT INTO `sede_cargo_persona` VALUES ('385', '47', '47', null, null, '1', null, null, '6', '6');
INSERT INTO `sede_cargo_persona` VALUES ('386', '1', '47', null, null, '1', null, null, '6', '6');
INSERT INTO `sede_cargo_persona` VALUES ('387', '2', '47', null, null, '1', null, null, '6', '6');
INSERT INTO `sede_cargo_persona` VALUES ('388', '3', '47', null, null, '1', null, null, '6', '6');
INSERT INTO `sede_cargo_persona` VALUES ('389', '4', '47', null, null, '1', null, null, '6', '6');
INSERT INTO `sede_cargo_persona` VALUES ('390', '44', '47', null, null, '1', null, null, '6', '6');
INSERT INTO `sede_cargo_persona` VALUES ('391', '5', '47', null, null, '1', null, null, '6', '6');
INSERT INTO `sede_cargo_persona` VALUES ('392', '6', '47', null, null, '1', null, null, '6', '6');
INSERT INTO `sede_cargo_persona` VALUES ('393', '7', '47', null, null, '1', null, null, '6', '6');
INSERT INTO `sede_cargo_persona` VALUES ('394', '46', '47', null, null, '1', null, null, '6', '6');
INSERT INTO `sede_cargo_persona` VALUES ('395', '8', '47', null, null, '1', null, null, '6', '6');
INSERT INTO `sede_cargo_persona` VALUES ('396', '9', '47', null, null, '1', null, null, '6', '6');
INSERT INTO `sede_cargo_persona` VALUES ('397', '10', '47', null, null, '1', null, null, '6', '6');
INSERT INTO `sede_cargo_persona` VALUES ('398', '11', '47', null, null, '1', null, null, '6', '6');
INSERT INTO `sede_cargo_persona` VALUES ('399', '12', '47', null, null, '1', null, null, '6', '6');
INSERT INTO `sede_cargo_persona` VALUES ('400', '45', '47', null, null, '1', null, null, '6', '6');
INSERT INTO `sede_cargo_persona` VALUES ('401', '13', '47', null, null, '1', null, null, '6', '6');
INSERT INTO `sede_cargo_persona` VALUES ('402', '14', '47', null, null, '1', null, null, '6', '6');
INSERT INTO `sede_cargo_persona` VALUES ('403', '15', '47', null, null, '1', null, null, '6', '6');
INSERT INTO `sede_cargo_persona` VALUES ('404', '16', '47', null, null, '1', null, null, '6', '6');
INSERT INTO `sede_cargo_persona` VALUES ('405', '17', '47', null, null, '1', null, null, '6', '6');
INSERT INTO `sede_cargo_persona` VALUES ('406', '18', '47', null, null, '1', null, null, '6', '6');
INSERT INTO `sede_cargo_persona` VALUES ('407', '19', '47', null, null, '1', null, null, '6', '6');
INSERT INTO `sede_cargo_persona` VALUES ('408', '20', '47', null, null, '1', null, null, '6', '6');
INSERT INTO `sede_cargo_persona` VALUES ('409', '21', '47', null, null, '1', null, null, '6', '6');
INSERT INTO `sede_cargo_persona` VALUES ('410', '22', '47', null, null, '1', null, null, '6', '6');
INSERT INTO `sede_cargo_persona` VALUES ('411', '23', '47', null, null, '1', null, null, '6', '6');
INSERT INTO `sede_cargo_persona` VALUES ('412', '24', '47', null, null, '1', null, null, '6', '6');
INSERT INTO `sede_cargo_persona` VALUES ('413', '25', '47', null, null, '1', null, null, '6', '6');
INSERT INTO `sede_cargo_persona` VALUES ('414', '26', '47', null, null, '1', null, null, '6', '6');
INSERT INTO `sede_cargo_persona` VALUES ('415', '27', '47', null, null, '1', null, null, '6', '6');
INSERT INTO `sede_cargo_persona` VALUES ('416', '28', '47', null, null, '1', null, null, '6', '6');
INSERT INTO `sede_cargo_persona` VALUES ('417', '29', '47', null, null, '1', null, null, '6', '6');
INSERT INTO `sede_cargo_persona` VALUES ('418', '30', '47', null, null, '1', null, null, '6', '6');
INSERT INTO `sede_cargo_persona` VALUES ('419', '31', '47', null, null, '1', null, null, '6', '6');
INSERT INTO `sede_cargo_persona` VALUES ('420', '32', '47', null, null, '1', null, null, '6', '6');
INSERT INTO `sede_cargo_persona` VALUES ('421', '42', '47', null, null, '1', null, null, '6', '6');
INSERT INTO `sede_cargo_persona` VALUES ('422', '33', '47', null, null, '1', null, null, '6', '6');
INSERT INTO `sede_cargo_persona` VALUES ('423', '34', '47', null, null, '1', null, null, '6', '6');
INSERT INTO `sede_cargo_persona` VALUES ('424', '43', '47', null, null, '1', null, null, '6', '6');
INSERT INTO `sede_cargo_persona` VALUES ('425', '35', '47', null, null, '1', null, null, '6', '6');
INSERT INTO `sede_cargo_persona` VALUES ('426', '36', '47', null, null, '1', null, null, '6', '6');
INSERT INTO `sede_cargo_persona` VALUES ('427', '37', '47', null, null, '1', null, null, '6', '6');
INSERT INTO `sede_cargo_persona` VALUES ('428', '38', '47', null, null, '1', null, null, '6', '6');
INSERT INTO `sede_cargo_persona` VALUES ('429', '39', '47', null, null, '1', null, null, '6', '6');
INSERT INTO `sede_cargo_persona` VALUES ('430', '40', '47', null, null, '1', null, null, '6', '6');
INSERT INTO `sede_cargo_persona` VALUES ('431', '41', '47', null, null, '1', null, null, '6', '6');
INSERT INTO `sede_cargo_persona` VALUES ('432', '47', '48', null, null, '1', null, null, '6', null);
INSERT INTO `sede_cargo_persona` VALUES ('433', '1', '48', null, null, '1', null, null, '6', null);
INSERT INTO `sede_cargo_persona` VALUES ('434', '2', '48', null, null, '1', null, null, '6', null);
INSERT INTO `sede_cargo_persona` VALUES ('435', '3', '48', null, null, '1', null, null, '6', null);
INSERT INTO `sede_cargo_persona` VALUES ('436', '4', '48', null, null, '1', null, null, '6', null);
INSERT INTO `sede_cargo_persona` VALUES ('437', '44', '48', null, null, '1', null, null, '6', null);
INSERT INTO `sede_cargo_persona` VALUES ('438', '5', '48', null, null, '1', null, null, '6', null);
INSERT INTO `sede_cargo_persona` VALUES ('439', '6', '48', null, null, '1', null, null, '6', null);
INSERT INTO `sede_cargo_persona` VALUES ('440', '7', '48', null, null, '1', null, null, '6', null);
INSERT INTO `sede_cargo_persona` VALUES ('441', '46', '48', null, null, '1', null, null, '6', null);
INSERT INTO `sede_cargo_persona` VALUES ('442', '8', '48', null, null, '1', null, null, '6', null);
INSERT INTO `sede_cargo_persona` VALUES ('443', '9', '48', null, null, '1', null, null, '6', null);
INSERT INTO `sede_cargo_persona` VALUES ('444', '10', '48', null, null, '1', null, null, '6', null);
INSERT INTO `sede_cargo_persona` VALUES ('445', '11', '48', null, null, '1', null, null, '6', null);
INSERT INTO `sede_cargo_persona` VALUES ('446', '12', '48', null, null, '1', null, null, '6', null);
INSERT INTO `sede_cargo_persona` VALUES ('447', '45', '48', null, null, '1', null, null, '6', null);
INSERT INTO `sede_cargo_persona` VALUES ('448', '13', '48', null, null, '1', null, null, '6', null);
INSERT INTO `sede_cargo_persona` VALUES ('449', '14', '48', null, null, '1', null, null, '6', null);
INSERT INTO `sede_cargo_persona` VALUES ('450', '15', '48', null, null, '1', null, null, '6', null);
INSERT INTO `sede_cargo_persona` VALUES ('451', '16', '48', null, null, '1', null, null, '6', null);
INSERT INTO `sede_cargo_persona` VALUES ('452', '17', '48', null, null, '1', null, null, '6', null);
INSERT INTO `sede_cargo_persona` VALUES ('453', '18', '48', null, null, '1', null, null, '6', null);
INSERT INTO `sede_cargo_persona` VALUES ('454', '19', '48', null, null, '1', null, null, '6', null);
INSERT INTO `sede_cargo_persona` VALUES ('455', '20', '48', null, null, '1', null, null, '6', null);
INSERT INTO `sede_cargo_persona` VALUES ('456', '21', '48', null, null, '1', null, null, '6', null);
INSERT INTO `sede_cargo_persona` VALUES ('457', '22', '48', null, null, '1', null, null, '6', null);
INSERT INTO `sede_cargo_persona` VALUES ('458', '23', '48', null, null, '1', null, null, '6', null);
INSERT INTO `sede_cargo_persona` VALUES ('459', '24', '48', null, null, '1', null, null, '6', null);
INSERT INTO `sede_cargo_persona` VALUES ('460', '25', '48', null, null, '1', null, null, '6', null);
INSERT INTO `sede_cargo_persona` VALUES ('461', '26', '48', null, null, '1', null, null, '6', null);
INSERT INTO `sede_cargo_persona` VALUES ('462', '27', '48', null, null, '1', null, null, '6', null);
INSERT INTO `sede_cargo_persona` VALUES ('463', '28', '48', null, null, '1', null, null, '6', null);
INSERT INTO `sede_cargo_persona` VALUES ('464', '29', '48', null, null, '1', null, null, '6', null);
INSERT INTO `sede_cargo_persona` VALUES ('465', '30', '48', null, null, '1', null, null, '6', null);
INSERT INTO `sede_cargo_persona` VALUES ('466', '31', '48', null, null, '1', null, null, '6', null);
INSERT INTO `sede_cargo_persona` VALUES ('467', '32', '48', null, null, '1', null, null, '6', null);
INSERT INTO `sede_cargo_persona` VALUES ('468', '42', '48', null, null, '1', null, null, '6', null);
INSERT INTO `sede_cargo_persona` VALUES ('469', '33', '48', null, null, '1', null, null, '6', null);
INSERT INTO `sede_cargo_persona` VALUES ('470', '34', '48', null, null, '1', null, null, '6', null);
INSERT INTO `sede_cargo_persona` VALUES ('471', '43', '48', null, null, '1', null, null, '6', null);
INSERT INTO `sede_cargo_persona` VALUES ('472', '35', '48', null, null, '1', null, null, '6', null);
INSERT INTO `sede_cargo_persona` VALUES ('473', '36', '48', null, null, '1', null, null, '6', null);
INSERT INTO `sede_cargo_persona` VALUES ('474', '37', '48', null, null, '1', null, null, '6', null);
INSERT INTO `sede_cargo_persona` VALUES ('475', '38', '48', null, null, '1', null, null, '6', null);
INSERT INTO `sede_cargo_persona` VALUES ('476', '39', '48', null, null, '1', null, null, '6', null);
INSERT INTO `sede_cargo_persona` VALUES ('477', '40', '48', null, null, '1', null, null, '6', null);
INSERT INTO `sede_cargo_persona` VALUES ('478', '41', '48', null, null, '1', null, null, '6', null);
INSERT INTO `sede_cargo_persona` VALUES ('479', '47', '49', null, null, '1', null, null, '6', null);
INSERT INTO `sede_cargo_persona` VALUES ('480', '1', '49', null, null, '1', null, null, '6', null);
INSERT INTO `sede_cargo_persona` VALUES ('481', '2', '49', null, null, '1', null, null, '6', null);
INSERT INTO `sede_cargo_persona` VALUES ('482', '3', '49', null, null, '1', null, null, '6', null);
INSERT INTO `sede_cargo_persona` VALUES ('483', '4', '49', null, null, '1', null, null, '6', null);
INSERT INTO `sede_cargo_persona` VALUES ('484', '44', '49', null, null, '1', null, null, '6', null);
INSERT INTO `sede_cargo_persona` VALUES ('485', '5', '49', null, null, '1', null, null, '6', null);
INSERT INTO `sede_cargo_persona` VALUES ('486', '6', '49', null, null, '1', null, null, '6', null);
INSERT INTO `sede_cargo_persona` VALUES ('487', '7', '49', null, null, '1', null, null, '6', null);
INSERT INTO `sede_cargo_persona` VALUES ('488', '46', '49', null, null, '1', null, null, '6', null);
INSERT INTO `sede_cargo_persona` VALUES ('489', '8', '49', null, null, '1', null, null, '6', null);
INSERT INTO `sede_cargo_persona` VALUES ('490', '9', '49', null, null, '1', null, null, '6', null);
INSERT INTO `sede_cargo_persona` VALUES ('491', '10', '49', null, null, '1', null, null, '6', null);
INSERT INTO `sede_cargo_persona` VALUES ('492', '11', '49', null, null, '1', null, null, '6', null);
INSERT INTO `sede_cargo_persona` VALUES ('493', '12', '49', null, null, '1', null, null, '6', null);
INSERT INTO `sede_cargo_persona` VALUES ('494', '45', '49', null, null, '1', null, null, '6', null);
INSERT INTO `sede_cargo_persona` VALUES ('495', '13', '49', null, null, '1', null, null, '6', null);
INSERT INTO `sede_cargo_persona` VALUES ('496', '14', '49', null, null, '1', null, null, '6', null);
INSERT INTO `sede_cargo_persona` VALUES ('497', '15', '49', null, null, '1', null, null, '6', null);
INSERT INTO `sede_cargo_persona` VALUES ('498', '16', '49', null, null, '1', null, null, '6', null);
INSERT INTO `sede_cargo_persona` VALUES ('499', '17', '49', null, null, '1', null, null, '6', null);
INSERT INTO `sede_cargo_persona` VALUES ('500', '18', '49', null, null, '1', null, null, '6', null);
INSERT INTO `sede_cargo_persona` VALUES ('501', '19', '49', null, null, '1', null, null, '6', null);
INSERT INTO `sede_cargo_persona` VALUES ('502', '20', '49', null, null, '1', null, null, '6', null);
INSERT INTO `sede_cargo_persona` VALUES ('503', '21', '49', null, null, '1', null, null, '6', null);
INSERT INTO `sede_cargo_persona` VALUES ('504', '22', '49', null, null, '1', null, null, '6', null);
INSERT INTO `sede_cargo_persona` VALUES ('505', '23', '49', null, null, '1', null, null, '6', null);
INSERT INTO `sede_cargo_persona` VALUES ('506', '24', '49', null, null, '1', null, null, '6', null);
INSERT INTO `sede_cargo_persona` VALUES ('507', '25', '49', null, null, '1', null, null, '6', null);
INSERT INTO `sede_cargo_persona` VALUES ('508', '26', '49', null, null, '1', null, null, '6', null);
INSERT INTO `sede_cargo_persona` VALUES ('509', '27', '49', null, null, '1', null, null, '6', null);
INSERT INTO `sede_cargo_persona` VALUES ('510', '28', '49', null, null, '1', null, null, '6', null);
INSERT INTO `sede_cargo_persona` VALUES ('511', '29', '49', null, null, '1', null, null, '6', null);
INSERT INTO `sede_cargo_persona` VALUES ('512', '30', '49', null, null, '1', null, null, '6', null);
INSERT INTO `sede_cargo_persona` VALUES ('513', '31', '49', null, null, '1', null, null, '6', null);
INSERT INTO `sede_cargo_persona` VALUES ('514', '32', '49', null, null, '1', null, null, '6', null);
INSERT INTO `sede_cargo_persona` VALUES ('515', '42', '49', null, null, '1', null, null, '6', null);
INSERT INTO `sede_cargo_persona` VALUES ('516', '33', '49', null, null, '1', null, null, '6', null);
INSERT INTO `sede_cargo_persona` VALUES ('517', '34', '49', null, null, '1', null, null, '6', null);
INSERT INTO `sede_cargo_persona` VALUES ('518', '43', '49', null, null, '1', null, null, '6', null);
INSERT INTO `sede_cargo_persona` VALUES ('519', '35', '49', null, null, '1', null, null, '6', null);
INSERT INTO `sede_cargo_persona` VALUES ('520', '36', '49', null, null, '1', null, null, '6', null);
INSERT INTO `sede_cargo_persona` VALUES ('521', '37', '49', null, null, '1', null, null, '6', null);
INSERT INTO `sede_cargo_persona` VALUES ('522', '38', '49', null, null, '1', null, null, '6', null);
INSERT INTO `sede_cargo_persona` VALUES ('523', '39', '49', null, null, '1', null, null, '6', null);
INSERT INTO `sede_cargo_persona` VALUES ('524', '40', '49', null, null, '1', null, null, '6', null);
INSERT INTO `sede_cargo_persona` VALUES ('525', '41', '49', null, null, '1', null, null, '6', null);
INSERT INTO `sede_cargo_persona` VALUES ('526', '47', '50', null, null, '1', null, null, '6', null);
INSERT INTO `sede_cargo_persona` VALUES ('527', '1', '50', null, null, '1', null, null, '6', null);
INSERT INTO `sede_cargo_persona` VALUES ('528', '2', '50', null, null, '1', null, null, '6', null);
INSERT INTO `sede_cargo_persona` VALUES ('529', '3', '50', null, null, '1', null, null, '6', null);
INSERT INTO `sede_cargo_persona` VALUES ('530', '4', '50', null, null, '1', null, null, '6', null);
INSERT INTO `sede_cargo_persona` VALUES ('531', '44', '50', null, null, '1', null, null, '6', null);
INSERT INTO `sede_cargo_persona` VALUES ('532', '5', '50', null, null, '1', null, null, '6', null);
INSERT INTO `sede_cargo_persona` VALUES ('533', '6', '50', null, null, '1', null, null, '6', null);
INSERT INTO `sede_cargo_persona` VALUES ('534', '7', '50', null, null, '1', null, null, '6', null);
INSERT INTO `sede_cargo_persona` VALUES ('535', '46', '50', null, null, '1', null, null, '6', null);
INSERT INTO `sede_cargo_persona` VALUES ('536', '8', '50', null, null, '1', null, null, '6', null);
INSERT INTO `sede_cargo_persona` VALUES ('537', '9', '50', null, null, '1', null, null, '6', null);
INSERT INTO `sede_cargo_persona` VALUES ('538', '10', '50', null, null, '1', null, null, '6', null);
INSERT INTO `sede_cargo_persona` VALUES ('539', '11', '50', null, null, '1', null, null, '6', null);
INSERT INTO `sede_cargo_persona` VALUES ('540', '12', '50', null, null, '1', null, null, '6', null);
INSERT INTO `sede_cargo_persona` VALUES ('541', '45', '50', null, null, '1', null, null, '6', null);
INSERT INTO `sede_cargo_persona` VALUES ('542', '13', '50', null, null, '1', null, null, '6', null);
INSERT INTO `sede_cargo_persona` VALUES ('543', '14', '50', null, null, '1', null, null, '6', null);
INSERT INTO `sede_cargo_persona` VALUES ('544', '15', '50', null, null, '1', null, null, '6', null);
INSERT INTO `sede_cargo_persona` VALUES ('545', '16', '50', null, null, '1', null, null, '6', null);
INSERT INTO `sede_cargo_persona` VALUES ('546', '17', '50', null, null, '1', null, null, '6', null);
INSERT INTO `sede_cargo_persona` VALUES ('547', '18', '50', null, null, '1', null, null, '6', null);
INSERT INTO `sede_cargo_persona` VALUES ('548', '19', '50', null, null, '1', null, null, '6', null);
INSERT INTO `sede_cargo_persona` VALUES ('549', '20', '50', null, null, '1', null, null, '6', null);
INSERT INTO `sede_cargo_persona` VALUES ('550', '21', '50', null, null, '1', null, null, '6', null);
INSERT INTO `sede_cargo_persona` VALUES ('551', '22', '50', null, null, '1', null, null, '6', null);
INSERT INTO `sede_cargo_persona` VALUES ('552', '23', '50', null, null, '1', null, null, '6', null);
INSERT INTO `sede_cargo_persona` VALUES ('553', '24', '50', null, null, '1', null, null, '6', null);
INSERT INTO `sede_cargo_persona` VALUES ('554', '25', '50', null, null, '1', null, null, '6', null);
INSERT INTO `sede_cargo_persona` VALUES ('555', '26', '50', null, null, '1', null, null, '6', null);
INSERT INTO `sede_cargo_persona` VALUES ('556', '27', '50', null, null, '1', null, null, '6', null);
INSERT INTO `sede_cargo_persona` VALUES ('557', '28', '50', null, null, '1', null, null, '6', null);
INSERT INTO `sede_cargo_persona` VALUES ('558', '29', '50', null, null, '1', null, null, '6', null);
INSERT INTO `sede_cargo_persona` VALUES ('559', '30', '50', null, null, '1', null, null, '6', null);
INSERT INTO `sede_cargo_persona` VALUES ('560', '31', '50', null, null, '1', null, null, '6', null);
INSERT INTO `sede_cargo_persona` VALUES ('561', '32', '50', null, null, '1', null, null, '6', null);
INSERT INTO `sede_cargo_persona` VALUES ('562', '42', '50', null, null, '1', null, null, '6', null);
INSERT INTO `sede_cargo_persona` VALUES ('563', '33', '50', null, null, '1', null, null, '6', null);
INSERT INTO `sede_cargo_persona` VALUES ('564', '34', '50', null, null, '1', null, null, '6', null);
INSERT INTO `sede_cargo_persona` VALUES ('565', '43', '50', null, null, '1', null, null, '6', null);
INSERT INTO `sede_cargo_persona` VALUES ('566', '35', '50', null, null, '1', null, null, '6', null);
INSERT INTO `sede_cargo_persona` VALUES ('567', '36', '50', null, null, '1', null, null, '6', null);
INSERT INTO `sede_cargo_persona` VALUES ('568', '37', '50', null, null, '1', null, null, '6', null);
INSERT INTO `sede_cargo_persona` VALUES ('569', '38', '50', null, null, '1', null, null, '6', null);
INSERT INTO `sede_cargo_persona` VALUES ('570', '39', '50', null, null, '1', null, null, '6', null);
INSERT INTO `sede_cargo_persona` VALUES ('571', '40', '50', null, null, '1', null, null, '6', null);
INSERT INTO `sede_cargo_persona` VALUES ('572', '41', '50', null, null, '1', null, null, '6', null);
INSERT INTO `sede_cargo_persona` VALUES ('573', '47', '51', null, null, '1', null, null, '6', '6');
INSERT INTO `sede_cargo_persona` VALUES ('574', '1', '51', null, null, '1', null, null, '6', '6');
INSERT INTO `sede_cargo_persona` VALUES ('575', '2', '51', null, null, '1', null, null, '6', '6');
INSERT INTO `sede_cargo_persona` VALUES ('576', '3', '51', null, null, '1', null, null, '6', '6');
INSERT INTO `sede_cargo_persona` VALUES ('577', '4', '51', null, null, '1', null, null, '6', '6');
INSERT INTO `sede_cargo_persona` VALUES ('578', '44', '51', null, null, '1', null, null, '6', '6');
INSERT INTO `sede_cargo_persona` VALUES ('579', '5', '51', null, null, '1', null, null, '6', '6');
INSERT INTO `sede_cargo_persona` VALUES ('580', '6', '51', null, null, '1', null, null, '6', '6');
INSERT INTO `sede_cargo_persona` VALUES ('581', '7', '51', null, null, '1', null, null, '6', '6');
INSERT INTO `sede_cargo_persona` VALUES ('582', '46', '51', null, null, '1', null, null, '6', '6');
INSERT INTO `sede_cargo_persona` VALUES ('583', '8', '51', null, null, '1', null, null, '6', '6');
INSERT INTO `sede_cargo_persona` VALUES ('584', '9', '51', null, null, '1', null, null, '6', '6');
INSERT INTO `sede_cargo_persona` VALUES ('585', '10', '51', null, null, '1', null, null, '6', '6');
INSERT INTO `sede_cargo_persona` VALUES ('586', '11', '51', null, null, '1', null, null, '6', '6');
INSERT INTO `sede_cargo_persona` VALUES ('587', '12', '51', null, null, '1', null, null, '6', '6');
INSERT INTO `sede_cargo_persona` VALUES ('588', '45', '51', null, null, '1', null, null, '6', '6');
INSERT INTO `sede_cargo_persona` VALUES ('589', '13', '51', null, null, '1', null, null, '6', '6');
INSERT INTO `sede_cargo_persona` VALUES ('590', '14', '51', null, null, '1', null, null, '6', '6');
INSERT INTO `sede_cargo_persona` VALUES ('591', '15', '51', null, null, '1', null, null, '6', '6');
INSERT INTO `sede_cargo_persona` VALUES ('592', '16', '51', null, null, '1', null, null, '6', '6');
INSERT INTO `sede_cargo_persona` VALUES ('593', '17', '51', null, null, '1', null, null, '6', '6');
INSERT INTO `sede_cargo_persona` VALUES ('594', '18', '51', null, null, '1', null, null, '6', '6');
INSERT INTO `sede_cargo_persona` VALUES ('595', '19', '51', null, null, '1', null, null, '6', '6');
INSERT INTO `sede_cargo_persona` VALUES ('596', '20', '51', null, null, '1', null, null, '6', '6');
INSERT INTO `sede_cargo_persona` VALUES ('597', '21', '51', null, null, '1', null, null, '6', '6');
INSERT INTO `sede_cargo_persona` VALUES ('598', '22', '51', null, null, '1', null, null, '6', '6');
INSERT INTO `sede_cargo_persona` VALUES ('599', '23', '51', null, null, '1', null, null, '6', '6');
INSERT INTO `sede_cargo_persona` VALUES ('600', '24', '51', null, null, '1', null, null, '6', '6');
INSERT INTO `sede_cargo_persona` VALUES ('601', '25', '51', null, null, '1', null, null, '6', '6');
INSERT INTO `sede_cargo_persona` VALUES ('602', '26', '51', null, null, '1', null, null, '6', '6');
INSERT INTO `sede_cargo_persona` VALUES ('603', '27', '51', null, null, '1', null, null, '6', '6');
INSERT INTO `sede_cargo_persona` VALUES ('604', '28', '51', null, null, '1', null, null, '6', '6');
INSERT INTO `sede_cargo_persona` VALUES ('605', '29', '51', null, null, '1', null, null, '6', '6');
INSERT INTO `sede_cargo_persona` VALUES ('606', '30', '51', null, null, '1', null, null, '6', '6');
INSERT INTO `sede_cargo_persona` VALUES ('607', '31', '51', null, null, '1', null, null, '6', '6');
INSERT INTO `sede_cargo_persona` VALUES ('608', '32', '51', null, null, '1', null, null, '6', '6');
INSERT INTO `sede_cargo_persona` VALUES ('609', '42', '51', null, null, '1', null, null, '6', '6');
INSERT INTO `sede_cargo_persona` VALUES ('610', '33', '51', null, null, '1', null, null, '6', '6');
INSERT INTO `sede_cargo_persona` VALUES ('611', '34', '51', null, null, '1', null, null, '6', '6');
INSERT INTO `sede_cargo_persona` VALUES ('612', '43', '51', null, null, '1', null, null, '6', '6');
INSERT INTO `sede_cargo_persona` VALUES ('613', '35', '51', null, null, '1', null, null, '6', '6');
INSERT INTO `sede_cargo_persona` VALUES ('614', '36', '51', null, null, '1', null, null, '6', '6');
INSERT INTO `sede_cargo_persona` VALUES ('615', '37', '51', null, null, '1', null, null, '6', '6');
INSERT INTO `sede_cargo_persona` VALUES ('616', '38', '51', null, null, '1', null, null, '6', '6');
INSERT INTO `sede_cargo_persona` VALUES ('617', '39', '51', null, null, '1', null, null, '6', '6');
INSERT INTO `sede_cargo_persona` VALUES ('618', '40', '51', null, null, '1', null, null, '6', '6');
INSERT INTO `sede_cargo_persona` VALUES ('619', '41', '51', null, null, '1', null, null, '6', '6');
INSERT INTO `sede_cargo_persona` VALUES ('620', '47', '52', null, null, '1', null, null, '6', null);
INSERT INTO `sede_cargo_persona` VALUES ('621', '1', '52', null, null, '1', null, null, '6', null);
INSERT INTO `sede_cargo_persona` VALUES ('622', '2', '52', null, null, '1', null, null, '6', null);
INSERT INTO `sede_cargo_persona` VALUES ('623', '3', '52', null, null, '1', null, null, '6', null);
INSERT INTO `sede_cargo_persona` VALUES ('624', '4', '52', null, null, '1', null, null, '6', null);
INSERT INTO `sede_cargo_persona` VALUES ('625', '44', '52', null, null, '1', null, null, '6', null);
INSERT INTO `sede_cargo_persona` VALUES ('626', '5', '52', null, null, '1', null, null, '6', null);
INSERT INTO `sede_cargo_persona` VALUES ('627', '6', '52', null, null, '1', null, null, '6', null);
INSERT INTO `sede_cargo_persona` VALUES ('628', '7', '52', null, null, '1', null, null, '6', null);
INSERT INTO `sede_cargo_persona` VALUES ('629', '46', '52', null, null, '1', null, null, '6', null);
INSERT INTO `sede_cargo_persona` VALUES ('630', '8', '52', null, null, '1', null, null, '6', null);
INSERT INTO `sede_cargo_persona` VALUES ('631', '9', '52', null, null, '1', null, null, '6', null);
INSERT INTO `sede_cargo_persona` VALUES ('632', '10', '52', null, null, '1', null, null, '6', null);
INSERT INTO `sede_cargo_persona` VALUES ('633', '11', '52', null, null, '1', null, null, '6', null);
INSERT INTO `sede_cargo_persona` VALUES ('634', '12', '52', null, null, '1', null, null, '6', null);
INSERT INTO `sede_cargo_persona` VALUES ('635', '45', '52', null, null, '1', null, null, '6', null);
INSERT INTO `sede_cargo_persona` VALUES ('636', '13', '52', null, null, '1', null, null, '6', null);
INSERT INTO `sede_cargo_persona` VALUES ('637', '14', '52', null, null, '1', null, null, '6', null);
INSERT INTO `sede_cargo_persona` VALUES ('638', '15', '52', null, null, '1', null, null, '6', null);
INSERT INTO `sede_cargo_persona` VALUES ('639', '16', '52', null, null, '1', null, null, '6', null);
INSERT INTO `sede_cargo_persona` VALUES ('640', '17', '52', null, null, '1', null, null, '6', null);
INSERT INTO `sede_cargo_persona` VALUES ('641', '18', '52', null, null, '1', null, null, '6', null);
INSERT INTO `sede_cargo_persona` VALUES ('642', '19', '52', null, null, '1', null, null, '6', null);
INSERT INTO `sede_cargo_persona` VALUES ('643', '20', '52', null, null, '1', null, null, '6', null);
INSERT INTO `sede_cargo_persona` VALUES ('644', '21', '52', null, null, '1', null, null, '6', null);
INSERT INTO `sede_cargo_persona` VALUES ('645', '22', '52', null, null, '1', null, null, '6', null);
INSERT INTO `sede_cargo_persona` VALUES ('646', '23', '52', null, null, '1', null, null, '6', null);
INSERT INTO `sede_cargo_persona` VALUES ('647', '24', '52', null, null, '1', null, null, '6', null);
INSERT INTO `sede_cargo_persona` VALUES ('648', '25', '52', null, null, '1', null, null, '6', null);
INSERT INTO `sede_cargo_persona` VALUES ('649', '26', '52', null, null, '1', null, null, '6', null);
INSERT INTO `sede_cargo_persona` VALUES ('650', '27', '52', null, null, '1', null, null, '6', null);
INSERT INTO `sede_cargo_persona` VALUES ('651', '28', '52', null, null, '1', null, null, '6', null);
INSERT INTO `sede_cargo_persona` VALUES ('652', '29', '52', null, null, '1', null, null, '6', null);
INSERT INTO `sede_cargo_persona` VALUES ('653', '30', '52', null, null, '1', null, null, '6', null);
INSERT INTO `sede_cargo_persona` VALUES ('654', '31', '52', null, null, '1', null, null, '6', null);
INSERT INTO `sede_cargo_persona` VALUES ('655', '32', '52', null, null, '1', null, null, '6', null);
INSERT INTO `sede_cargo_persona` VALUES ('656', '42', '52', null, null, '1', null, null, '6', null);
INSERT INTO `sede_cargo_persona` VALUES ('657', '33', '52', null, null, '1', null, null, '6', null);
INSERT INTO `sede_cargo_persona` VALUES ('658', '34', '52', null, null, '1', null, null, '6', null);
INSERT INTO `sede_cargo_persona` VALUES ('659', '43', '52', null, null, '1', null, null, '6', null);
INSERT INTO `sede_cargo_persona` VALUES ('660', '35', '52', null, null, '1', null, null, '6', null);
INSERT INTO `sede_cargo_persona` VALUES ('661', '36', '52', null, null, '1', null, null, '6', null);
INSERT INTO `sede_cargo_persona` VALUES ('662', '37', '52', null, null, '1', null, null, '6', null);
INSERT INTO `sede_cargo_persona` VALUES ('663', '38', '52', null, null, '1', null, null, '6', null);
INSERT INTO `sede_cargo_persona` VALUES ('664', '39', '52', null, null, '1', null, null, '6', null);
INSERT INTO `sede_cargo_persona` VALUES ('665', '40', '52', null, null, '1', null, null, '6', null);
INSERT INTO `sede_cargo_persona` VALUES ('666', '41', '52', null, null, '1', null, null, '6', null);
INSERT INTO `sede_cargo_persona` VALUES ('667', '47', '53', null, null, '1', null, null, '6', null);
INSERT INTO `sede_cargo_persona` VALUES ('668', '1', '53', null, null, '1', null, null, '6', null);
INSERT INTO `sede_cargo_persona` VALUES ('669', '2', '53', null, null, '1', null, null, '6', null);
INSERT INTO `sede_cargo_persona` VALUES ('670', '3', '53', null, null, '1', null, null, '6', null);
INSERT INTO `sede_cargo_persona` VALUES ('671', '4', '53', null, null, '1', null, null, '6', null);
INSERT INTO `sede_cargo_persona` VALUES ('672', '44', '53', null, null, '1', null, null, '6', null);
INSERT INTO `sede_cargo_persona` VALUES ('673', '5', '53', null, null, '1', null, null, '6', null);
INSERT INTO `sede_cargo_persona` VALUES ('674', '6', '53', null, null, '1', null, null, '6', null);
INSERT INTO `sede_cargo_persona` VALUES ('675', '7', '53', null, null, '1', null, null, '6', null);
INSERT INTO `sede_cargo_persona` VALUES ('676', '46', '53', null, null, '1', null, null, '6', null);
INSERT INTO `sede_cargo_persona` VALUES ('677', '8', '53', null, null, '1', null, null, '6', null);
INSERT INTO `sede_cargo_persona` VALUES ('678', '9', '53', null, null, '1', null, null, '6', null);
INSERT INTO `sede_cargo_persona` VALUES ('679', '10', '53', null, null, '1', null, null, '6', null);
INSERT INTO `sede_cargo_persona` VALUES ('680', '11', '53', null, null, '1', null, null, '6', null);
INSERT INTO `sede_cargo_persona` VALUES ('681', '12', '53', null, null, '1', null, null, '6', null);
INSERT INTO `sede_cargo_persona` VALUES ('682', '45', '53', null, null, '1', null, null, '6', null);
INSERT INTO `sede_cargo_persona` VALUES ('683', '13', '53', null, null, '1', null, null, '6', null);
INSERT INTO `sede_cargo_persona` VALUES ('684', '14', '53', null, null, '1', null, null, '6', null);
INSERT INTO `sede_cargo_persona` VALUES ('685', '15', '53', null, null, '1', null, null, '6', null);
INSERT INTO `sede_cargo_persona` VALUES ('686', '16', '53', null, null, '1', null, null, '6', null);
INSERT INTO `sede_cargo_persona` VALUES ('687', '17', '53', null, null, '1', null, null, '6', null);
INSERT INTO `sede_cargo_persona` VALUES ('688', '18', '53', null, null, '1', null, null, '6', null);
INSERT INTO `sede_cargo_persona` VALUES ('689', '19', '53', null, null, '1', null, null, '6', null);
INSERT INTO `sede_cargo_persona` VALUES ('690', '20', '53', null, null, '1', null, null, '6', null);
INSERT INTO `sede_cargo_persona` VALUES ('691', '21', '53', null, null, '1', null, null, '6', null);
INSERT INTO `sede_cargo_persona` VALUES ('692', '22', '53', null, null, '1', null, null, '6', null);
INSERT INTO `sede_cargo_persona` VALUES ('693', '23', '53', null, null, '1', null, null, '6', null);
INSERT INTO `sede_cargo_persona` VALUES ('694', '24', '53', null, null, '1', null, null, '6', null);
INSERT INTO `sede_cargo_persona` VALUES ('695', '25', '53', null, null, '1', null, null, '6', null);
INSERT INTO `sede_cargo_persona` VALUES ('696', '26', '53', null, null, '1', null, null, '6', null);
INSERT INTO `sede_cargo_persona` VALUES ('697', '27', '53', null, null, '1', null, null, '6', null);
INSERT INTO `sede_cargo_persona` VALUES ('698', '28', '53', null, null, '1', null, null, '6', null);
INSERT INTO `sede_cargo_persona` VALUES ('699', '29', '53', null, null, '1', null, null, '6', null);
INSERT INTO `sede_cargo_persona` VALUES ('700', '30', '53', null, null, '1', null, null, '6', null);
INSERT INTO `sede_cargo_persona` VALUES ('701', '31', '53', null, null, '1', null, null, '6', null);
INSERT INTO `sede_cargo_persona` VALUES ('702', '32', '53', null, null, '1', null, null, '6', null);
INSERT INTO `sede_cargo_persona` VALUES ('703', '42', '53', null, null, '1', null, null, '6', null);
INSERT INTO `sede_cargo_persona` VALUES ('704', '33', '53', null, null, '1', null, null, '6', null);
INSERT INTO `sede_cargo_persona` VALUES ('705', '34', '53', null, null, '1', null, null, '6', null);
INSERT INTO `sede_cargo_persona` VALUES ('706', '43', '53', null, null, '1', null, null, '6', null);
INSERT INTO `sede_cargo_persona` VALUES ('707', '35', '53', null, null, '1', null, null, '6', null);
INSERT INTO `sede_cargo_persona` VALUES ('708', '36', '53', null, null, '1', null, null, '6', null);
INSERT INTO `sede_cargo_persona` VALUES ('709', '37', '53', null, null, '1', null, null, '6', null);
INSERT INTO `sede_cargo_persona` VALUES ('710', '38', '53', null, null, '1', null, null, '6', null);
INSERT INTO `sede_cargo_persona` VALUES ('711', '39', '53', null, null, '1', null, null, '6', null);
INSERT INTO `sede_cargo_persona` VALUES ('712', '40', '53', null, null, '1', null, null, '6', null);
INSERT INTO `sede_cargo_persona` VALUES ('713', '41', '53', null, null, '1', null, null, '6', null);
INSERT INTO `sede_cargo_persona` VALUES ('714', '47', '53', null, null, '1', null, null, '6', null);
INSERT INTO `sede_cargo_persona` VALUES ('715', '1', '53', null, null, '1', null, null, '6', null);
INSERT INTO `sede_cargo_persona` VALUES ('716', '2', '53', null, null, '1', null, null, '6', null);
INSERT INTO `sede_cargo_persona` VALUES ('717', '3', '53', null, null, '1', null, null, '6', null);
INSERT INTO `sede_cargo_persona` VALUES ('718', '4', '53', null, null, '1', null, null, '6', null);
INSERT INTO `sede_cargo_persona` VALUES ('719', '44', '53', null, null, '1', null, null, '6', null);
INSERT INTO `sede_cargo_persona` VALUES ('720', '5', '53', null, null, '1', null, null, '6', null);
INSERT INTO `sede_cargo_persona` VALUES ('721', '6', '53', null, null, '1', null, null, '6', null);
INSERT INTO `sede_cargo_persona` VALUES ('722', '7', '53', null, null, '1', null, null, '6', null);
INSERT INTO `sede_cargo_persona` VALUES ('723', '46', '53', null, null, '1', null, null, '6', null);
INSERT INTO `sede_cargo_persona` VALUES ('724', '8', '53', null, null, '1', null, null, '6', null);
INSERT INTO `sede_cargo_persona` VALUES ('725', '9', '53', null, null, '1', null, null, '6', null);
INSERT INTO `sede_cargo_persona` VALUES ('726', '10', '53', null, null, '1', null, null, '6', null);
INSERT INTO `sede_cargo_persona` VALUES ('727', '11', '53', null, null, '1', null, null, '6', null);
INSERT INTO `sede_cargo_persona` VALUES ('728', '12', '53', null, null, '1', null, null, '6', null);
INSERT INTO `sede_cargo_persona` VALUES ('729', '45', '53', null, null, '1', null, null, '6', null);
INSERT INTO `sede_cargo_persona` VALUES ('730', '13', '53', null, null, '1', null, null, '6', null);
INSERT INTO `sede_cargo_persona` VALUES ('731', '14', '53', null, null, '1', null, null, '6', null);
INSERT INTO `sede_cargo_persona` VALUES ('732', '15', '53', null, null, '1', null, null, '6', null);
INSERT INTO `sede_cargo_persona` VALUES ('733', '16', '53', null, null, '1', null, null, '6', null);
INSERT INTO `sede_cargo_persona` VALUES ('734', '17', '53', null, null, '1', null, null, '6', null);
INSERT INTO `sede_cargo_persona` VALUES ('735', '18', '53', null, null, '1', null, null, '6', null);
INSERT INTO `sede_cargo_persona` VALUES ('736', '19', '53', null, null, '1', null, null, '6', null);
INSERT INTO `sede_cargo_persona` VALUES ('737', '20', '53', null, null, '1', null, null, '6', null);
INSERT INTO `sede_cargo_persona` VALUES ('738', '21', '53', null, null, '1', null, null, '6', null);
INSERT INTO `sede_cargo_persona` VALUES ('739', '22', '53', null, null, '1', null, null, '6', null);
INSERT INTO `sede_cargo_persona` VALUES ('740', '23', '53', null, null, '1', null, null, '6', null);
INSERT INTO `sede_cargo_persona` VALUES ('741', '24', '53', null, null, '1', null, null, '6', null);
INSERT INTO `sede_cargo_persona` VALUES ('742', '25', '53', null, null, '1', null, null, '6', null);
INSERT INTO `sede_cargo_persona` VALUES ('743', '26', '53', null, null, '1', null, null, '6', null);
INSERT INTO `sede_cargo_persona` VALUES ('744', '27', '53', null, null, '1', null, null, '6', null);
INSERT INTO `sede_cargo_persona` VALUES ('745', '28', '53', null, null, '1', null, null, '6', null);
INSERT INTO `sede_cargo_persona` VALUES ('746', '29', '53', null, null, '1', null, null, '6', null);
INSERT INTO `sede_cargo_persona` VALUES ('747', '30', '53', null, null, '1', null, null, '6', null);
INSERT INTO `sede_cargo_persona` VALUES ('748', '31', '53', null, null, '1', null, null, '6', null);
INSERT INTO `sede_cargo_persona` VALUES ('749', '32', '53', null, null, '1', null, null, '6', null);
INSERT INTO `sede_cargo_persona` VALUES ('750', '42', '53', null, null, '1', null, null, '6', null);
INSERT INTO `sede_cargo_persona` VALUES ('751', '33', '53', null, null, '1', null, null, '6', null);
INSERT INTO `sede_cargo_persona` VALUES ('752', '34', '53', null, null, '1', null, null, '6', null);
INSERT INTO `sede_cargo_persona` VALUES ('753', '43', '53', null, null, '1', null, null, '6', null);
INSERT INTO `sede_cargo_persona` VALUES ('754', '35', '53', null, null, '1', null, null, '6', null);
INSERT INTO `sede_cargo_persona` VALUES ('755', '36', '53', null, null, '1', null, null, '6', null);
INSERT INTO `sede_cargo_persona` VALUES ('756', '37', '53', null, null, '1', null, null, '6', null);
INSERT INTO `sede_cargo_persona` VALUES ('757', '38', '53', null, null, '1', null, null, '6', null);
INSERT INTO `sede_cargo_persona` VALUES ('758', '39', '53', null, null, '1', null, null, '6', null);
INSERT INTO `sede_cargo_persona` VALUES ('759', '40', '53', null, null, '1', null, null, '6', null);
INSERT INTO `sede_cargo_persona` VALUES ('760', '41', '53', null, null, '1', null, null, '6', null);
INSERT INTO `sede_cargo_persona` VALUES ('761', '47', '55', null, null, '1', null, null, '6', null);
INSERT INTO `sede_cargo_persona` VALUES ('762', '1', '55', null, null, '1', null, null, '6', null);
INSERT INTO `sede_cargo_persona` VALUES ('763', '2', '55', null, null, '1', null, null, '6', null);
INSERT INTO `sede_cargo_persona` VALUES ('764', '3', '55', null, null, '1', null, null, '6', null);
INSERT INTO `sede_cargo_persona` VALUES ('765', '4', '55', null, null, '1', null, null, '6', null);
INSERT INTO `sede_cargo_persona` VALUES ('766', '44', '55', null, null, '1', null, null, '6', null);
INSERT INTO `sede_cargo_persona` VALUES ('767', '5', '55', null, null, '1', null, null, '6', null);
INSERT INTO `sede_cargo_persona` VALUES ('768', '6', '55', null, null, '1', null, null, '6', null);
INSERT INTO `sede_cargo_persona` VALUES ('769', '7', '55', null, null, '1', null, null, '6', null);
INSERT INTO `sede_cargo_persona` VALUES ('770', '46', '55', null, null, '1', null, null, '6', null);
INSERT INTO `sede_cargo_persona` VALUES ('771', '8', '55', null, null, '1', null, null, '6', null);
INSERT INTO `sede_cargo_persona` VALUES ('772', '9', '55', null, null, '1', null, null, '6', null);
INSERT INTO `sede_cargo_persona` VALUES ('773', '10', '55', null, null, '1', null, null, '6', null);
INSERT INTO `sede_cargo_persona` VALUES ('774', '11', '55', null, null, '1', null, null, '6', null);
INSERT INTO `sede_cargo_persona` VALUES ('775', '12', '55', null, null, '1', null, null, '6', null);
INSERT INTO `sede_cargo_persona` VALUES ('776', '45', '55', null, null, '1', null, null, '6', null);
INSERT INTO `sede_cargo_persona` VALUES ('777', '13', '55', null, null, '1', null, null, '6', null);
INSERT INTO `sede_cargo_persona` VALUES ('778', '14', '55', null, null, '1', null, null, '6', null);
INSERT INTO `sede_cargo_persona` VALUES ('779', '15', '55', null, null, '1', null, null, '6', null);
INSERT INTO `sede_cargo_persona` VALUES ('780', '16', '55', null, null, '1', null, null, '6', null);
INSERT INTO `sede_cargo_persona` VALUES ('781', '17', '55', null, null, '1', null, null, '6', null);
INSERT INTO `sede_cargo_persona` VALUES ('782', '18', '55', null, null, '1', null, null, '6', null);
INSERT INTO `sede_cargo_persona` VALUES ('783', '19', '55', null, null, '1', null, null, '6', null);
INSERT INTO `sede_cargo_persona` VALUES ('784', '20', '55', null, null, '1', null, null, '6', null);
INSERT INTO `sede_cargo_persona` VALUES ('785', '21', '55', null, null, '1', null, null, '6', null);
INSERT INTO `sede_cargo_persona` VALUES ('786', '22', '55', null, null, '1', null, null, '6', null);
INSERT INTO `sede_cargo_persona` VALUES ('787', '23', '55', null, null, '1', null, null, '6', null);
INSERT INTO `sede_cargo_persona` VALUES ('788', '24', '55', null, null, '1', null, null, '6', null);
INSERT INTO `sede_cargo_persona` VALUES ('789', '25', '55', null, null, '1', null, null, '6', null);
INSERT INTO `sede_cargo_persona` VALUES ('790', '26', '55', null, null, '1', null, null, '6', null);
INSERT INTO `sede_cargo_persona` VALUES ('791', '27', '55', null, null, '1', null, null, '6', null);
INSERT INTO `sede_cargo_persona` VALUES ('792', '28', '55', null, null, '1', null, null, '6', null);
INSERT INTO `sede_cargo_persona` VALUES ('793', '29', '55', null, null, '1', null, null, '6', null);
INSERT INTO `sede_cargo_persona` VALUES ('794', '30', '55', null, null, '1', null, null, '6', null);
INSERT INTO `sede_cargo_persona` VALUES ('795', '31', '55', null, null, '1', null, null, '6', null);
INSERT INTO `sede_cargo_persona` VALUES ('796', '32', '55', null, null, '1', null, null, '6', null);
INSERT INTO `sede_cargo_persona` VALUES ('797', '42', '55', null, null, '1', null, null, '6', null);
INSERT INTO `sede_cargo_persona` VALUES ('798', '33', '55', null, null, '1', null, null, '6', null);
INSERT INTO `sede_cargo_persona` VALUES ('799', '34', '55', null, null, '1', null, null, '6', null);
INSERT INTO `sede_cargo_persona` VALUES ('800', '43', '55', null, null, '1', null, null, '6', null);
INSERT INTO `sede_cargo_persona` VALUES ('801', '35', '55', null, null, '1', null, null, '6', null);
INSERT INTO `sede_cargo_persona` VALUES ('802', '36', '55', null, null, '1', null, null, '6', null);
INSERT INTO `sede_cargo_persona` VALUES ('803', '37', '55', null, null, '1', null, null, '6', null);
INSERT INTO `sede_cargo_persona` VALUES ('804', '38', '55', null, null, '1', null, null, '6', null);
INSERT INTO `sede_cargo_persona` VALUES ('805', '39', '55', null, null, '1', null, null, '6', null);
INSERT INTO `sede_cargo_persona` VALUES ('806', '40', '55', null, null, '1', null, null, '6', null);
INSERT INTO `sede_cargo_persona` VALUES ('807', '41', '55', null, null, '1', null, null, '6', null);
INSERT INTO `sede_cargo_persona` VALUES ('808', '47', '56', null, null, '1', null, null, '6', null);
INSERT INTO `sede_cargo_persona` VALUES ('809', '1', '56', null, null, '1', null, null, '6', null);
INSERT INTO `sede_cargo_persona` VALUES ('810', '2', '56', null, null, '1', null, null, '6', null);
INSERT INTO `sede_cargo_persona` VALUES ('811', '3', '56', null, null, '1', null, null, '6', null);
INSERT INTO `sede_cargo_persona` VALUES ('812', '4', '56', null, null, '1', null, null, '6', null);
INSERT INTO `sede_cargo_persona` VALUES ('813', '44', '56', null, null, '1', null, null, '6', null);
INSERT INTO `sede_cargo_persona` VALUES ('814', '5', '56', null, null, '1', null, null, '6', null);
INSERT INTO `sede_cargo_persona` VALUES ('815', '6', '56', null, null, '1', null, null, '6', null);
INSERT INTO `sede_cargo_persona` VALUES ('816', '7', '56', null, null, '1', null, null, '6', null);
INSERT INTO `sede_cargo_persona` VALUES ('817', '46', '56', null, null, '1', null, null, '6', null);
INSERT INTO `sede_cargo_persona` VALUES ('818', '8', '56', null, null, '1', null, null, '6', null);
INSERT INTO `sede_cargo_persona` VALUES ('819', '9', '56', null, null, '1', null, null, '6', null);
INSERT INTO `sede_cargo_persona` VALUES ('820', '10', '56', null, null, '1', null, null, '6', null);
INSERT INTO `sede_cargo_persona` VALUES ('821', '11', '56', null, null, '1', null, null, '6', null);
INSERT INTO `sede_cargo_persona` VALUES ('822', '12', '56', null, null, '1', null, null, '6', null);
INSERT INTO `sede_cargo_persona` VALUES ('823', '45', '56', null, null, '1', null, null, '6', null);
INSERT INTO `sede_cargo_persona` VALUES ('824', '13', '56', null, null, '1', null, null, '6', null);
INSERT INTO `sede_cargo_persona` VALUES ('825', '14', '56', null, null, '1', null, null, '6', null);
INSERT INTO `sede_cargo_persona` VALUES ('826', '15', '56', null, null, '1', null, null, '6', null);
INSERT INTO `sede_cargo_persona` VALUES ('827', '16', '56', null, null, '1', null, null, '6', null);
INSERT INTO `sede_cargo_persona` VALUES ('828', '17', '56', null, null, '1', null, null, '6', null);
INSERT INTO `sede_cargo_persona` VALUES ('829', '18', '56', null, null, '1', null, null, '6', null);
INSERT INTO `sede_cargo_persona` VALUES ('830', '19', '56', null, null, '1', null, null, '6', null);
INSERT INTO `sede_cargo_persona` VALUES ('831', '20', '56', null, null, '1', null, null, '6', null);
INSERT INTO `sede_cargo_persona` VALUES ('832', '21', '56', null, null, '1', null, null, '6', null);
INSERT INTO `sede_cargo_persona` VALUES ('833', '22', '56', null, null, '1', null, null, '6', null);
INSERT INTO `sede_cargo_persona` VALUES ('834', '23', '56', null, null, '1', null, null, '6', null);
INSERT INTO `sede_cargo_persona` VALUES ('835', '24', '56', null, null, '1', null, null, '6', null);
INSERT INTO `sede_cargo_persona` VALUES ('836', '25', '56', null, null, '1', null, null, '6', null);
INSERT INTO `sede_cargo_persona` VALUES ('837', '26', '56', null, null, '1', null, null, '6', null);
INSERT INTO `sede_cargo_persona` VALUES ('838', '27', '56', null, null, '1', null, null, '6', null);
INSERT INTO `sede_cargo_persona` VALUES ('839', '28', '56', null, null, '1', null, null, '6', null);
INSERT INTO `sede_cargo_persona` VALUES ('840', '29', '56', null, null, '1', null, null, '6', null);
INSERT INTO `sede_cargo_persona` VALUES ('841', '30', '56', null, null, '1', null, null, '6', null);
INSERT INTO `sede_cargo_persona` VALUES ('842', '31', '56', null, null, '1', null, null, '6', null);
INSERT INTO `sede_cargo_persona` VALUES ('843', '32', '56', null, null, '1', null, null, '6', null);
INSERT INTO `sede_cargo_persona` VALUES ('844', '42', '56', null, null, '1', null, null, '6', null);
INSERT INTO `sede_cargo_persona` VALUES ('845', '33', '56', null, null, '1', null, null, '6', null);
INSERT INTO `sede_cargo_persona` VALUES ('846', '34', '56', null, null, '1', null, null, '6', null);
INSERT INTO `sede_cargo_persona` VALUES ('847', '43', '56', null, null, '1', null, null, '6', null);
INSERT INTO `sede_cargo_persona` VALUES ('848', '35', '56', null, null, '1', null, null, '6', null);
INSERT INTO `sede_cargo_persona` VALUES ('849', '36', '56', null, null, '1', null, null, '6', null);
INSERT INTO `sede_cargo_persona` VALUES ('850', '37', '56', null, null, '1', null, null, '6', null);
INSERT INTO `sede_cargo_persona` VALUES ('851', '38', '56', null, null, '1', null, null, '6', null);
INSERT INTO `sede_cargo_persona` VALUES ('852', '39', '56', null, null, '1', null, null, '6', null);
INSERT INTO `sede_cargo_persona` VALUES ('853', '40', '56', null, null, '1', null, null, '6', null);
INSERT INTO `sede_cargo_persona` VALUES ('854', '41', '56', null, null, '1', null, null, '6', null);
INSERT INTO `sede_cargo_persona` VALUES ('855', '47', '57', null, null, '1', null, null, '6', null);
INSERT INTO `sede_cargo_persona` VALUES ('856', '1', '57', null, null, '1', null, null, '6', null);
INSERT INTO `sede_cargo_persona` VALUES ('857', '2', '57', null, null, '1', null, null, '6', null);
INSERT INTO `sede_cargo_persona` VALUES ('858', '3', '57', null, null, '1', null, null, '6', null);
INSERT INTO `sede_cargo_persona` VALUES ('859', '4', '57', null, null, '1', null, null, '6', null);
INSERT INTO `sede_cargo_persona` VALUES ('860', '44', '57', null, null, '1', null, null, '6', null);
INSERT INTO `sede_cargo_persona` VALUES ('861', '5', '57', null, null, '1', null, null, '6', null);
INSERT INTO `sede_cargo_persona` VALUES ('862', '6', '57', null, null, '1', null, null, '6', null);
INSERT INTO `sede_cargo_persona` VALUES ('863', '7', '57', null, null, '1', null, null, '6', null);
INSERT INTO `sede_cargo_persona` VALUES ('864', '46', '57', null, null, '1', null, null, '6', null);
INSERT INTO `sede_cargo_persona` VALUES ('865', '8', '57', null, null, '1', null, null, '6', null);
INSERT INTO `sede_cargo_persona` VALUES ('866', '9', '57', null, null, '1', null, null, '6', null);
INSERT INTO `sede_cargo_persona` VALUES ('867', '10', '57', null, null, '1', null, null, '6', null);
INSERT INTO `sede_cargo_persona` VALUES ('868', '11', '57', null, null, '1', null, null, '6', null);
INSERT INTO `sede_cargo_persona` VALUES ('869', '12', '57', null, null, '1', null, null, '6', null);
INSERT INTO `sede_cargo_persona` VALUES ('870', '45', '57', null, null, '1', null, null, '6', null);
INSERT INTO `sede_cargo_persona` VALUES ('871', '13', '57', null, null, '1', null, null, '6', null);
INSERT INTO `sede_cargo_persona` VALUES ('872', '14', '57', null, null, '1', null, null, '6', null);
INSERT INTO `sede_cargo_persona` VALUES ('873', '15', '57', null, null, '1', null, null, '6', null);
INSERT INTO `sede_cargo_persona` VALUES ('874', '16', '57', null, null, '1', null, null, '6', null);
INSERT INTO `sede_cargo_persona` VALUES ('875', '17', '57', null, null, '1', null, null, '6', null);
INSERT INTO `sede_cargo_persona` VALUES ('876', '18', '57', null, null, '1', null, null, '6', null);
INSERT INTO `sede_cargo_persona` VALUES ('877', '19', '57', null, null, '1', null, null, '6', null);
INSERT INTO `sede_cargo_persona` VALUES ('878', '20', '57', null, null, '1', null, null, '6', null);
INSERT INTO `sede_cargo_persona` VALUES ('879', '21', '57', null, null, '1', null, null, '6', null);
INSERT INTO `sede_cargo_persona` VALUES ('880', '22', '57', null, null, '1', null, null, '6', null);
INSERT INTO `sede_cargo_persona` VALUES ('881', '23', '57', null, null, '1', null, null, '6', null);
INSERT INTO `sede_cargo_persona` VALUES ('882', '24', '57', null, null, '1', null, null, '6', null);
INSERT INTO `sede_cargo_persona` VALUES ('883', '25', '57', null, null, '1', null, null, '6', null);
INSERT INTO `sede_cargo_persona` VALUES ('884', '26', '57', null, null, '1', null, null, '6', null);
INSERT INTO `sede_cargo_persona` VALUES ('885', '27', '57', null, null, '1', null, null, '6', null);
INSERT INTO `sede_cargo_persona` VALUES ('886', '28', '57', null, null, '1', null, null, '6', null);
INSERT INTO `sede_cargo_persona` VALUES ('887', '29', '57', null, null, '1', null, null, '6', null);
INSERT INTO `sede_cargo_persona` VALUES ('888', '30', '57', null, null, '1', null, null, '6', null);
INSERT INTO `sede_cargo_persona` VALUES ('889', '31', '57', null, null, '1', null, null, '6', null);
INSERT INTO `sede_cargo_persona` VALUES ('890', '32', '57', null, null, '1', null, null, '6', null);
INSERT INTO `sede_cargo_persona` VALUES ('891', '42', '57', null, null, '1', null, null, '6', null);
INSERT INTO `sede_cargo_persona` VALUES ('892', '33', '57', null, null, '1', null, null, '6', null);
INSERT INTO `sede_cargo_persona` VALUES ('893', '34', '57', null, null, '1', null, null, '6', null);
INSERT INTO `sede_cargo_persona` VALUES ('894', '43', '57', null, null, '1', null, null, '6', null);
INSERT INTO `sede_cargo_persona` VALUES ('895', '35', '57', null, null, '1', null, null, '6', null);
INSERT INTO `sede_cargo_persona` VALUES ('896', '36', '57', null, null, '1', null, null, '6', null);
INSERT INTO `sede_cargo_persona` VALUES ('897', '37', '57', null, null, '1', null, null, '6', null);
INSERT INTO `sede_cargo_persona` VALUES ('898', '38', '57', null, null, '1', null, null, '6', null);
INSERT INTO `sede_cargo_persona` VALUES ('899', '39', '57', null, null, '1', null, null, '6', null);
INSERT INTO `sede_cargo_persona` VALUES ('900', '40', '57', null, null, '1', null, null, '6', null);
INSERT INTO `sede_cargo_persona` VALUES ('901', '41', '57', null, null, '1', null, null, '6', null);
INSERT INTO `sede_cargo_persona` VALUES ('902', '47', '58', null, null, '1', null, null, '6', null);
INSERT INTO `sede_cargo_persona` VALUES ('903', '1', '58', null, null, '1', null, null, '6', null);
INSERT INTO `sede_cargo_persona` VALUES ('904', '2', '58', null, null, '1', null, null, '6', null);
INSERT INTO `sede_cargo_persona` VALUES ('905', '3', '58', null, null, '1', null, null, '6', null);
INSERT INTO `sede_cargo_persona` VALUES ('906', '4', '58', null, null, '1', null, null, '6', null);
INSERT INTO `sede_cargo_persona` VALUES ('907', '44', '58', null, null, '1', null, null, '6', null);
INSERT INTO `sede_cargo_persona` VALUES ('908', '5', '58', null, null, '1', null, null, '6', null);
INSERT INTO `sede_cargo_persona` VALUES ('909', '6', '58', null, null, '1', null, null, '6', null);
INSERT INTO `sede_cargo_persona` VALUES ('910', '7', '58', null, null, '1', null, null, '6', null);
INSERT INTO `sede_cargo_persona` VALUES ('911', '46', '58', null, null, '1', null, null, '6', null);
INSERT INTO `sede_cargo_persona` VALUES ('912', '8', '58', null, null, '1', null, null, '6', null);
INSERT INTO `sede_cargo_persona` VALUES ('913', '9', '58', null, null, '1', null, null, '6', null);
INSERT INTO `sede_cargo_persona` VALUES ('914', '10', '58', null, null, '1', null, null, '6', null);
INSERT INTO `sede_cargo_persona` VALUES ('915', '11', '58', null, null, '1', null, null, '6', null);
INSERT INTO `sede_cargo_persona` VALUES ('916', '12', '58', null, null, '1', null, null, '6', null);
INSERT INTO `sede_cargo_persona` VALUES ('917', '45', '58', null, null, '1', null, null, '6', null);
INSERT INTO `sede_cargo_persona` VALUES ('918', '13', '58', null, null, '1', null, null, '6', null);
INSERT INTO `sede_cargo_persona` VALUES ('919', '14', '58', null, null, '1', null, null, '6', null);
INSERT INTO `sede_cargo_persona` VALUES ('920', '15', '58', null, null, '1', null, null, '6', null);
INSERT INTO `sede_cargo_persona` VALUES ('921', '16', '58', null, null, '1', null, null, '6', null);
INSERT INTO `sede_cargo_persona` VALUES ('922', '17', '58', null, null, '1', null, null, '6', null);
INSERT INTO `sede_cargo_persona` VALUES ('923', '18', '58', null, null, '1', null, null, '6', null);
INSERT INTO `sede_cargo_persona` VALUES ('924', '19', '58', null, null, '1', null, null, '6', null);
INSERT INTO `sede_cargo_persona` VALUES ('925', '20', '58', null, null, '1', null, null, '6', null);
INSERT INTO `sede_cargo_persona` VALUES ('926', '21', '58', null, null, '1', null, null, '6', null);
INSERT INTO `sede_cargo_persona` VALUES ('927', '22', '58', null, null, '1', null, null, '6', null);
INSERT INTO `sede_cargo_persona` VALUES ('928', '23', '58', null, null, '1', null, null, '6', null);
INSERT INTO `sede_cargo_persona` VALUES ('929', '24', '58', null, null, '1', null, null, '6', null);
INSERT INTO `sede_cargo_persona` VALUES ('930', '25', '58', null, null, '1', null, null, '6', null);
INSERT INTO `sede_cargo_persona` VALUES ('931', '26', '58', null, null, '1', null, null, '6', null);
INSERT INTO `sede_cargo_persona` VALUES ('932', '27', '58', null, null, '1', null, null, '6', null);
INSERT INTO `sede_cargo_persona` VALUES ('933', '28', '58', null, null, '1', null, null, '6', null);
INSERT INTO `sede_cargo_persona` VALUES ('934', '29', '58', null, null, '1', null, null, '6', null);
INSERT INTO `sede_cargo_persona` VALUES ('935', '30', '58', null, null, '1', null, null, '6', null);
INSERT INTO `sede_cargo_persona` VALUES ('936', '31', '58', null, null, '1', null, null, '6', null);
INSERT INTO `sede_cargo_persona` VALUES ('937', '32', '58', null, null, '1', null, null, '6', null);
INSERT INTO `sede_cargo_persona` VALUES ('938', '42', '58', null, null, '1', null, null, '6', null);
INSERT INTO `sede_cargo_persona` VALUES ('939', '33', '58', null, null, '1', null, null, '6', null);
INSERT INTO `sede_cargo_persona` VALUES ('940', '34', '58', null, null, '1', null, null, '6', null);
INSERT INTO `sede_cargo_persona` VALUES ('941', '43', '58', null, null, '1', null, null, '6', null);
INSERT INTO `sede_cargo_persona` VALUES ('942', '35', '58', null, null, '1', null, null, '6', null);
INSERT INTO `sede_cargo_persona` VALUES ('943', '36', '58', null, null, '1', null, null, '6', null);
INSERT INTO `sede_cargo_persona` VALUES ('944', '37', '58', null, null, '1', null, null, '6', null);
INSERT INTO `sede_cargo_persona` VALUES ('945', '38', '58', null, null, '1', null, null, '6', null);
INSERT INTO `sede_cargo_persona` VALUES ('946', '39', '58', null, null, '1', null, null, '6', null);
INSERT INTO `sede_cargo_persona` VALUES ('947', '40', '58', null, null, '1', null, null, '6', null);
INSERT INTO `sede_cargo_persona` VALUES ('948', '41', '58', null, null, '1', null, null, '6', null);
INSERT INTO `sede_cargo_persona` VALUES ('949', '28', '59', null, null, '1', null, null, '6', null);
INSERT INTO `sede_cargo_persona` VALUES ('950', '28', '59', null, null, '1', null, null, '6', null);
INSERT INTO `sede_cargo_persona` VALUES ('951', '22', '61', null, null, '1', null, null, '6', null);
INSERT INTO `sede_cargo_persona` VALUES ('952', '22', '61', null, null, '1', null, null, '6', null);
INSERT INTO `sede_cargo_persona` VALUES ('953', '21', '63', null, null, '1', null, null, '6', null);
INSERT INTO `sede_cargo_persona` VALUES ('954', '19', '64', null, null, '1', null, null, '6', null);
INSERT INTO `sede_cargo_persona` VALUES ('955', '48', '65', null, null, '1', null, null, '6', null);
INSERT INTO `sede_cargo_persona` VALUES ('956', '29', '66', null, null, '1', null, null, '6', null);
INSERT INTO `sede_cargo_persona` VALUES ('957', '27', '67', null, null, '1', null, null, '6', null);
INSERT INTO `sede_cargo_persona` VALUES ('958', '30', '68', null, null, '1', null, null, '6', null);
INSERT INTO `sede_cargo_persona` VALUES ('959', '20', '69', null, null, '1', null, null, '6', null);
INSERT INTO `sede_cargo_persona` VALUES ('960', '25', '70', null, null, '1', null, null, '6', null);
INSERT INTO `sede_cargo_persona` VALUES ('961', '26', '71', null, null, '1', null, null, '6', null);

-- ----------------------------
-- Table structure for tipo_carrera
-- ----------------------------
DROP TABLE IF EXISTS `tipo_carrera`;
CREATE TABLE `tipo_carrera` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(50) DEFAULT NULL,
  `estado` int(1) DEFAULT '1',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of tipo_carrera
-- ----------------------------
INSERT INTO `tipo_carrera` VALUES ('1', 'Escolar', '1');
INSERT INTO `tipo_carrera` VALUES ('2', 'Profesional 3 años', '1');
INSERT INTO `tipo_carrera` VALUES ('3', 'Profesional 5 años', '1');
INSERT INTO `tipo_carrera` VALUES ('4', 'Tecnico', '1');

-- ----------------------------
-- Table structure for tipo_carrera_ciclo
-- ----------------------------
DROP TABLE IF EXISTS `tipo_carrera_ciclo`;
CREATE TABLE `tipo_carrera_ciclo` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `tipo_carrera_id` int(11) NOT NULL,
  `ciclo_id` int(11) NOT NULL,
  `estado` int(11) DEFAULT '1',
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  `usuario_created_at` int(11) DEFAULT NULL,
  `usuario_updated_at` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=17 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of tipo_carrera_ciclo
-- ----------------------------
INSERT INTO `tipo_carrera_ciclo` VALUES ('1', '2', '1', '1', null, null, null, null);
INSERT INTO `tipo_carrera_ciclo` VALUES ('2', '2', '2', '1', null, null, null, null);
INSERT INTO `tipo_carrera_ciclo` VALUES ('3', '2', '3', '1', null, null, null, null);
INSERT INTO `tipo_carrera_ciclo` VALUES ('4', '2', '4', '1', null, null, null, null);
INSERT INTO `tipo_carrera_ciclo` VALUES ('5', '2', '5', '1', null, null, null, null);
INSERT INTO `tipo_carrera_ciclo` VALUES ('6', '2', '6', '1', null, null, null, null);
INSERT INTO `tipo_carrera_ciclo` VALUES ('7', '3', '1', '1', null, null, null, null);
INSERT INTO `tipo_carrera_ciclo` VALUES ('8', '3', '2', '1', null, null, null, null);
INSERT INTO `tipo_carrera_ciclo` VALUES ('9', '3', '3', '1', null, null, null, null);
INSERT INTO `tipo_carrera_ciclo` VALUES ('10', '3', '4', '1', null, null, null, null);
INSERT INTO `tipo_carrera_ciclo` VALUES ('11', '3', '5', '1', null, null, null, null);
INSERT INTO `tipo_carrera_ciclo` VALUES ('12', '3', '6', '1', null, null, null, null);
INSERT INTO `tipo_carrera_ciclo` VALUES ('13', '3', '7', '1', null, null, null, null);
INSERT INTO `tipo_carrera_ciclo` VALUES ('14', '3', '8', '1', null, null, null, null);
INSERT INTO `tipo_carrera_ciclo` VALUES ('15', '3', '9', '1', null, null, null, null);
INSERT INTO `tipo_carrera_ciclo` VALUES ('16', '3', '10', '1', null, null, null, null);

-- ----------------------------
-- Table structure for tipo_problema
-- ----------------------------
DROP TABLE IF EXISTS `tipo_problema`;
CREATE TABLE `tipo_problema` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(70) DEFAULT NULL,
  `estado` int(1) DEFAULT '1',
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  `usuario_created_at` int(11) DEFAULT NULL,
  `usuario_updated_at` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of tipo_problema
-- ----------------------------
INSERT INTO `tipo_problema` VALUES ('1', 'Area Academica', '1', '2015-10-19 00:47:35', null, '1', null);
INSERT INTO `tipo_problema` VALUES ('2', 'Campus Virtual', '1', '2015-10-19 00:47:35', null, '1', null);
INSERT INTO `tipo_problema` VALUES ('3', 'Constancia y Certificado', '1', '2015-10-19 00:47:35', null, '1', null);
INSERT INTO `tipo_problema` VALUES ('4', 'Contabilidad y Finanzas', '1', '2015-10-19 00:47:35', null, '1', null);
INSERT INTO `tipo_problema` VALUES ('5', 'Legal y Personal', '1', '2015-10-19 00:47:35', null, '1', null);
INSERT INTO `tipo_problema` VALUES ('6', 'Logistica', '1', '2015-10-19 00:47:35', null, '1', null);
INSERT INTO `tipo_problema` VALUES ('7', 'Marketing', '1', '2015-10-19 00:47:35', '2016-06-02 13:27:19', '1', '1');

-- ----------------------------
-- Table structure for tipo_problema_categorias
-- ----------------------------
DROP TABLE IF EXISTS `tipo_problema_categorias`;
CREATE TABLE `tipo_problema_categorias` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `tipo_problema_id` int(11) DEFAULT NULL,
  `nombre` varchar(100) DEFAULT NULL,
  `estado` int(1) DEFAULT '1',
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  `usuario_created_at` int(11) DEFAULT NULL,
  `usuario_updated_at` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of tipo_problema_categorias
-- ----------------------------

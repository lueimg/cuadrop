/*
Navicat MySQL Data Transfer

Source Server         : localhost
Source Server Version : 50711
Source Host           : 127.0.0.1:3306
Source Database       : ab23510_cuadrop

Target Server Type    : MYSQL
Target Server Version : 50711
File Encoding         : 65001

Date: 2017-01-22 18:11:47
*/

SET FOREIGN_KEY_CHECKS=0;

-- ----------------------------
-- Table structure for tipo_problema_categorias_etiquetas
-- ----------------------------
DROP TABLE IF EXISTS `tipo_problema_categorias_etiquetas`;
CREATE TABLE `tipo_problema_categorias_etiquetas` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `tipo_problema_categoria_id` int(11) DEFAULT NULL,
  `grupo` varchar(255) DEFAULT NULL,
  `campos` varchar(255) DEFAULT NULL,
  `estado` int(1) DEFAULT '1',
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  `usuario_created_at` int(11) DEFAULT NULL,
  `usuario_updated_at` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=48 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of tipo_problema_categorias_etiquetas
-- ----------------------------
INSERT INTO `tipo_problema_categorias_etiquetas` VALUES ('1', '11', 'carrera', 'slct_carrera', '1', null, null, null, null);
INSERT INTO `tipo_problema_categorias_etiquetas` VALUES ('2', '11', 'ciclosemestre', null, '1', null, null, null, null);
INSERT INTO `tipo_problema_categorias_etiquetas` VALUES ('3', '11', 'pago', null, '1', null, null, null, null);
INSERT INTO `tipo_problema_categorias_etiquetas` VALUES ('4', '12', 'ciclosemestre', 'slct_ciclo', '1', null, null, null, null);
INSERT INTO `tipo_problema_categorias_etiquetas` VALUES ('5', '12', 'pago', null, '1', null, null, null, null);
INSERT INTO `tipo_problema_categorias_etiquetas` VALUES ('6', '12', 'carrera', null, '1', null, null, null, null);
INSERT INTO `tipo_problema_categorias_etiquetas` VALUES ('7', '11', 'alumno', null, '1', null, null, null, null);
INSERT INTO `tipo_problema_categorias_etiquetas` VALUES ('8', '12', 'alumno', null, '1', null, null, null, null);
INSERT INTO `tipo_problema_categorias_etiquetas` VALUES ('9', '13', 'carrera', 'slct_carrera', '1', null, null, null, null);
INSERT INTO `tipo_problema_categorias_etiquetas` VALUES ('10', '13', 'alumno', null, '1', null, null, null, null);
INSERT INTO `tipo_problema_categorias_etiquetas` VALUES ('11', '13', 'pago', null, '1', null, null, null, null);
INSERT INTO `tipo_problema_categorias_etiquetas` VALUES ('12', '14', 'adicional', 'txt_nombre_instituto,txt_persona,txt_cargo,txt_area', '1', null, null, null, null);
INSERT INTO `tipo_problema_categorias_etiquetas` VALUES ('13', '14', 'carrera', 'slct_carrera', '1', null, null, null, null);
INSERT INTO `tipo_problema_categorias_etiquetas` VALUES ('14', '14', 'pago', null, '1', null, null, null, null);
INSERT INTO `tipo_problema_categorias_etiquetas` VALUES ('15', '14', 'alumno', null, '1', null, null, null, null);
INSERT INTO `tipo_problema_categorias_etiquetas` VALUES ('16', '15', 'alumno', null, '1', null, null, null, null);
INSERT INTO `tipo_problema_categorias_etiquetas` VALUES ('17', '15', 'carrera', 'slct_carrera', '1', null, null, null, null);
INSERT INTO `tipo_problema_categorias_etiquetas` VALUES ('18', '15', 'ciclosemestre', 'slct_ciclo', '1', null, null, null, null);
INSERT INTO `tipo_problema_categorias_etiquetas` VALUES ('19', '16', 'carrera', 'slct_carrera', '1', null, null, null, null);
INSERT INTO `tipo_problema_categorias_etiquetas` VALUES ('20', '16', 'pago', null, '1', null, null, null, null);
INSERT INTO `tipo_problema_categorias_etiquetas` VALUES ('21', '16', 'alumno', null, '1', null, null, null, null);
INSERT INTO `tipo_problema_categorias_etiquetas` VALUES ('22', '17', 'semestre', null, '1', null, null, null, null);
INSERT INTO `tipo_problema_categorias_etiquetas` VALUES ('23', '17', 'carrera', 'slct_carrera', '1', null, null, null, null);
INSERT INTO `tipo_problema_categorias_etiquetas` VALUES ('24', '17', 'pago', null, '1', null, null, null, null);
INSERT INTO `tipo_problema_categorias_etiquetas` VALUES ('25', '17', 'alumno', null, '1', null, null, null, null);
INSERT INTO `tipo_problema_categorias_etiquetas` VALUES ('26', '18', 'carrera', 'slct_carrera', '1', null, null, null, null);
INSERT INTO `tipo_problema_categorias_etiquetas` VALUES ('27', '18', 'alumno', null, '1', null, null, null, null);
INSERT INTO `tipo_problema_categorias_etiquetas` VALUES ('28', '18', 'pago', null, '1', null, null, null, null);
INSERT INTO `tipo_problema_categorias_etiquetas` VALUES ('29', '19', 'carrera', 'slct_carrera', '1', null, null, null, null);
INSERT INTO `tipo_problema_categorias_etiquetas` VALUES ('30', '19', 'alumno', null, '1', null, null, null, null);
INSERT INTO `tipo_problema_categorias_etiquetas` VALUES ('31', '19', 'pago', null, '1', null, null, null, null);
INSERT INTO `tipo_problema_categorias_etiquetas` VALUES ('32', '20', 'carrera', null, '1', null, null, null, null);
INSERT INTO `tipo_problema_categorias_etiquetas` VALUES ('33', '20', 'pago', null, '1', null, null, null, null);
INSERT INTO `tipo_problema_categorias_etiquetas` VALUES ('34', '20', 'alumno', null, '1', null, null, null, null);
INSERT INTO `tipo_problema_categorias_etiquetas` VALUES ('35', '21', 'pago', null, '1', null, null, null, null);
INSERT INTO `tipo_problema_categorias_etiquetas` VALUES ('36', '21', 'carrera', 'slct_carrera', '1', null, null, null, null);
INSERT INTO `tipo_problema_categorias_etiquetas` VALUES ('37', '21', 'adicional', 'txt_tema', '1', null, null, null, null);
INSERT INTO `tipo_problema_categorias_etiquetas` VALUES ('38', '21', 'alumno', null, '1', null, null, null, null);
INSERT INTO `tipo_problema_categorias_etiquetas` VALUES ('42', '22', 'curso', null, '1', null, null, null, null);
INSERT INTO `tipo_problema_categorias_etiquetas` VALUES ('39', '22', 'pago', null, '1', null, null, null, null);
INSERT INTO `tipo_problema_categorias_etiquetas` VALUES ('40', '22', 'carrera', 'slct_carrera', '1', null, null, null, null);
INSERT INTO `tipo_problema_categorias_etiquetas` VALUES ('41', '22', 'alumno', null, '1', null, null, null, null);
INSERT INTO `tipo_problema_categorias_etiquetas` VALUES ('43', '23', 'alumno', null, '1', null, null, null, null);
INSERT INTO `tipo_problema_categorias_etiquetas` VALUES ('44', '23', 'pago', null, '1', null, null, null, null);
INSERT INTO `tipo_problema_categorias_etiquetas` VALUES ('45', '23', 'carrera', 'slct_carrera', '1', null, null, null, null);
INSERT INTO `tipo_problema_categorias_etiquetas` VALUES ('46', '23', 'curso', null, '1', null, null, null, null);
INSERT INTO `tipo_problema_categorias_etiquetas` VALUES ('47', '24', 'articulo', null, '1', null, null, null, null);

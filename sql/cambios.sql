-- 2017-01-20 
-- ----------------------------
-- Table structure for areas
-- ----------------------------
DROP TABLE IF EXISTS `areas`;
CREATE TABLE `areas` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(50) NOT NULL,
  `estado` int(11) NOT NULL DEFAULT '1',
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  `usuario_created_at` int(11) DEFAULT NULL,
  `usuario_updated_at` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Table structure for especialidades
-- ----------------------------
DROP TABLE IF EXISTS `especialidades`;
CREATE TABLE `especialidades` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `carrera_id` int(11) DEFAULT NULL,
  `nombre` varchar(100) DEFAULT NULL,
  `estado` int(1) DEFAULT '1',
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  `usuario_created_at` int(11) DEFAULT NULL,
  `usuario_updated_at` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=1 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Table structure for municipalidades
-- ----------------------------
DROP TABLE IF EXISTS `municipalidades`;
CREATE TABLE `municipalidades` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(50) NOT NULL,
  `estado` int(11) NOT NULL DEFAULT '1',
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  `usuario_created_at` int(11) DEFAULT NULL,
  `usuario_updated_at` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=1 DEFAULT CHARSET=utf8;


-- ----------------------------
-- Table structure for licencias
-- ----------------------------
DROP TABLE IF EXISTS `licencias`;
CREATE TABLE `licencias` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(50) NOT NULL,
  `estado` int(11) NOT NULL DEFAULT '1',
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  `usuario_created_at` int(11) DEFAULT NULL,
  `usuario_updated_at` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=1 DEFAULT CHARSET=utf8;

DROP TABLE IF EXISTS `servicios`;
CREATE TABLE `servicios` (
  `id` INT(11) NOT NULL AUTO_INCREMENT,
  `nombre` VARCHAR(50) NOT NULL,
  `estado` INT(11) NOT NULL DEFAULT '1',
  `created_at` DATETIME DEFAULT NULL,
  `updated_at` DATETIME DEFAULT NULL,
  `usuario_created_at` INT(11) DEFAULT NULL,
  `usuario_updated_at` INT(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=INNODB AUTO_INCREMENT=1 DEFAULT CHARSET=utf8;


DROP TABLE IF EXISTS `semestres`;
CREATE TABLE `semestres` (
  `id` INT(11) NOT NULL AUTO_INCREMENT,
  `nombre` VARCHAR(50) NOT NULL,
  `estado` INT(11) NOT NULL DEFAULT '1',
  `created_at` DATETIME DEFAULT NULL,
  `updated_at` DATETIME DEFAULT NULL,
  `usuario_created_at` INT(11) DEFAULT NULL,
  `usuario_updated_at` INT(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=INNODB AUTO_INCREMENT=1 DEFAULT CHARSET=utf8;


CREATE TABLE `archivos`(  
  `id` INT(11) NOT NULL AUTO_INCREMENT COMMENT 'PK',
  `problema_id` INT(11) NOT NULL COMMENT 'FK de tabla problemas',
  `nombre_archivo` VARCHAR(50),
  `ruta_archivo` VARCHAR(50),
  `usuario_updated_at` INT(11),
  `usuario_deleted_at` INT(11) COMMENT 'usuario que elimina',
  `usuario_created_at` INT(11),
  `created_at` DATETIME,
  `updated_at` DATETIME,
  `deteled_at` DATETIME COMMENT 'fecha de eliminacion',
  PRIMARY KEY (`id`)
);

ALTER TABLE `alumno_problema_pago` 
  ADD COLUMN `ruta_archivo` VARCHAR(50) NULL AFTER `alumno_problema_id`;

ALTER TABLE `alumno_problema_pago`
DROP COLUMN `curso`,
ADD COLUMN `fecha`  date NULL AFTER `alumno_problema_id`;

ALTER TABLE `alumno_problema`
ADD COLUMN `especialidad_id`  int NULL AFTER `ciclo_id`,
ADD COLUMN `semestre_ini_id`  int NULL AFTER `especialidad_id`,
ADD COLUMN `semestre_fin_id`  int NULL AFTER `semestre_ini_id`;


CREATE TABLE `alumno_problema_cs` (
`id`  int NOT NULL AUTO_INCREMENT ,
`alumno_problema_id`  int NULL ,
`ciclo_id`  int NULL ,
`semestre_ini_id`  int NULL ,
`semestre_fin_id`  int NULL ,
`estado`  int(1) NULL DEFAULT 1 ,
`usuario_created_at`  int NULL ,
`usuario_updated_at`  int NULL ,
`created_at`  datetime NULL ,
`updated_at`  datetime NULL ,
PRIMARY KEY (`id`)
)
;

ALTER TABLE `articulo_problema`
ADD COLUMN `usuario_created_at`  int NULL AFTER `descripcion`,
ADD COLUMN `usuario_updated_at`  int NULL AFTER `usuario_created_at`;


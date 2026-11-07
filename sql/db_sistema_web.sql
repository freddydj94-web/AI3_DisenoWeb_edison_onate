CREATE DATABASE IF NOT EXISTS db_sistema_web
  CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci;

USE db_sistema_web;

CREATE TABLE estudiantes (
    id              INT AUTO_INCREMENT PRIMARY KEY,
    cedula          VARCHAR(10)  NOT NULL UNIQUE,
    nombres         VARCHAR(80)  NOT NULL,
    apellidos       VARCHAR(80)  NOT NULL,
    correo          VARCHAR(120) NOT NULL UNIQUE,
    carrera         VARCHAR(80)  NOT NULL,
    fecha_nacimiento DATE         NOT NULL,
    fecha_creacion  TIMESTAMP    NOT NULL DEFAULT CURRENT_TIMESTAMP,
    fecha_actualizacion TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP
                                    ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB;
drop database if exists actividad_5;
create database actividad_5;
use actividad_5;
create table usuarios (
	nombre_usuario varchar(30) PRIMARY KEY,
    contraseña varchar(100) NOT NULL
);

create table registro (
    codigo int PRIMARY KEY,
    fecha date
);
create database crud_imagenes;
use crud_imagenes;
create table imagenes(
	id_imagen int auto_increment not null,
    foto varchar(255) null,
    constraint pk_imagen primary key (id_imagen)
);
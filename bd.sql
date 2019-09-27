DROP DATABASE IF EXISTS seg;
CREATE DATABASE seg;

CREATE TABLE seg.usuario(
    id int not null auto_increment primary key,
    email varchar(256) not null UNIQUE,
    senha varchar(256) not null,
    nome varchar(256) not null,
    data_nascimento date not null,
    created_at date not null,
    deleted_at date
);

CREATE TRIGGER ins_created_at BEFORE INSERT ON seg.usuario
    FOR EACH ROW
        SET NEW.created_at = curdate(); 
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

CREATE TABLE seg.recuperacao(
    id int not null auto_increment primary key,
    usuario_id int not null,
    recovery_hash varchar(256) not null,
    created_at timestamp not null,
    foreign key(usuario_id) references usuario(id)
);

CREATE TRIGGER ins_created_at BEFORE INSERT ON seg.usuario
    FOR EACH ROW
        SET NEW.created_at = curdate(); 

CREATE TRIGGER rec_created_at BEFORE INSERT ON seg.recuperacao
    FOR EACH ROW
        SET NEW.created_at = current_timestamp(); 

/*
    CREATE USER 'seg'@'localhost' identified by mysql_native_password 'seg';
    GRANT ALL PRIVILEGES ON seg.usuario TO 'seg'@'localhost' with grant option;

*/
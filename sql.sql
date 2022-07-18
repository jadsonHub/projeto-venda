create database base_pw;
use base_pw;

CREATE TABLE IF NOT EXISTS usuario(
    id_usuario bigint not null primary key auto_increment,
    date_init_usuario TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    nome_usuario varchar(20) not null,
    senha_usuario varchar(32) not null,
    email_usuario varchar(50) not null
);

create TABLE if not EXISTS login(
    id_login bigint not null primary key auto_increment,
    fk_usuario bigint not null,
    session TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);


#o admin é criado sem precisar do site;

create TABLE if  not EXISTS admin(
     id_admin bigint not null primary key auto_increment,
     fk_usuario bigint not null
);


ALTER TABLE login
ADD CONSTRAINT FK_login
FOREIGN KEY (fk_usuario) REFERENCES usuario(id_usuario);

ALTER TABLE admin
ADD CONSTRAINT FK_usuario
FOREIGN KEY (fk_usuario) REFERENCES usuario(id_usuario);


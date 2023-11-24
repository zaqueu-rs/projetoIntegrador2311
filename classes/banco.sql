CREATE DATABASE sistema_livrariapjint;
USE sistema_livrariapjint;


CREATE TABLE editora(
    id int NOT NULL PRIMARY KEY AUTO_INCREMENT,
    nome varchar(255) NOT NULL
);


CREATE TABLE acervo01(
    id int NOT NULL PRIMARY KEY AUTO_INCREMENT,
    idEditora int(255) NOT NULL,
    titulo varchar(255) NOT NULL,
    autor varchar(255),
    ano int,
    preco float,
    quantidade int,
    tipo text,
    FOREIGN KEY (idEditora) REFERENCES editora(id)
    );

INSERT INTO editora (nome) VALUES ('São Paulo');
INSERT INTO editora (nome) VALUES ('Saraiva');

INSERT INTO acervo01
    (idEditora,titulo,autor,ano,preco,quantidade,tipo) VALUES
    (1, 'Portugues', 'Zeca','2023','150', '1','l'
    );


INSERT INTO acervo01
    (idEditora,titulo,autor,ano,preco,quantidade,tipo) VALUES
    (2, 'JAVA', 'Zeca','2023','150', '1','l'
    );

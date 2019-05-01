CREATE DATABASE projeto_cursos;

CREATE TABLE usuarios (
	id_usuario INT NOT NULL PRIMARY KEY UNIQUE AUTO_INCREMENT,
    nome VARCHAR(65) NOT NULL, /*varchar ocupa o tamanho variavel até 65k caracteres*/
    email VARCHAR(65) NOT NULL UNIQUE,/*var ocupa sempre o mesmo tamanho*/
    senha VARCHAR(65) NOT NULL,
    cpf INT,
    foto VARCHAR(65), /* guarda o endereço da foto */
    tipo_usuario INT
);

CREATE TABLE tipo_usuario (
	id_tipo_usuario INT NOT NULL PRIMARY KEY UNIQUE AUTO_INCREMENT,
    nome VARCHAR(65) NOT NULL
);

CREATE TABLE cursos (
id_curso INT NOT NULL PRIMARY KEY UNIQUE AUTO_INCREMENT,
nome VARCHAR(100) NOT NULL,
descricao VARCHAR(1000),
preco FLOAT DEFAULT 0.0,
tag VARCHAR(65),
imagem VARCHAR(1000),
professor INT
);

CREATE TABLE professor (
	id_professor INT NOT NULL PRIMARY KEY UNIQUE AUTO_INCREMENT,
    nome VARCHAR(100) NOT NULL
);

/*alterar dados*/
ALTER TABLE usuarios
CHANGE tipo_usuario tipo_usuario_fk INT;/*alteramos o nome da coluna*/

ALTER TABLE usuarios /*altera uma chave estrangeira, referencia a outra tabela*/
ADD FOREIGN KEY (tipo_usuario_fk) REFERENCES tipo_usuario(id_tipo_usuario);


/*Alterar tabela*/
ALTER TABLE cursos
CHANGE professor professor_fk INT;

ALTER TABLE cursos
ADD FOREIGN KEY (professor_fk) REFERENCES professor(id_professor);

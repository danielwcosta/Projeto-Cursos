INSERT INTO tipo_usuario (nome)
VALUES ('admin');

INSERT INTO  tipo_usuario (nome)
VALUES ('professor'),('aluno');

SELECT * FROM tipo_usuario;

INSERT INTO usuarios (nome, email, senha , cpf, foto, tipo_usuario_fk)
			  VALUES ('Hendy', 'hendy@mail.com', '123', 999999999, 'foto.png', 2);

ALTER TABLE usuarios
CHANGE cpf cpf INT(12);

SELECT * FROM usuarios;

ALTER TABLE usuarios
CHANGE cpf cpf BIGINT(12);

INSERT INTO usuarios (nome, email, senha , cpf, foto, tipo_usuario_fk)
			  VALUES ('Hendy', 'hendy@gmail.com', '123', 99999999999, 'foto.png', 2);

SELECT * FROM usuarios;

INSERT INTO usuarios (nome, email, senha, cpf, foto, tipo_usuario_fk)
			VALUES('Thomaz','thom@mail.com', '123', 12345678909, 'foto.png', 2);
            
            SELECT * FROM usuarios;
INSERT INTO usuarios (nome, email, senha, cpf, foto, tipo_usuario_fk)
			VALUES('Daniel','dan@mail.com', '123', 09876543212, 'foto.png', 3);

INSERT INTO usuarios (nome, email, senha, cpf, foto, tipo_usuario_fk)
			VALUES('Antenor','antenor@mail.com', '321', 10293847560, 'foto.png', 1);
            
INSERT INTO usuarios (nome, email, senha, cpf, foto, tipo_usuario_fk)
			VALUES('Lis','lis@mail.com', '123', 39485710374, 'foto.png', 3);

SELECT * FROM usuarios;
SELECT * FROM usuarios;

SELECT nome, email, tipo_usuario_fk FROM usuarios;

SELECT * FROM usuarios
WHERE tipo_usuario_fk = 2;

SELECT * FROM usuarios
WHERE nome LIKE 'A%';

SELECT * FROM usuarios
WHERE nome LIKE 'h%' AND tipo_usuario_fk = 2;

SELECT * FROM usuarios
WHERE nome LIKE 'h%' OR tipo_usuario_fk = 1;

SELECT * FROM usuarios
WHERE nome IN ('Hendy','Thomaz','Daniel');

SELECT nome, email FROM usuarios
WHERE tipo_usuario_fk = 3
ORDER BY nome DESC;
            
SELECT * FROM usuarios

UPDATE usuarios
SET email = 'thomaz@digitalhouse.com'
WHERE nome = 'Thomaz';

SET sql_safe_updates = 0; /* desabilitando o modo seguro */

UPDATE  usuarios
SET foto = 'nicolascage.`usuarios`png'
WHERE tipo_usuario_fk = 3;

DELETE FROM usuarios
WHERE email = 'hendy@gmail.com'; 


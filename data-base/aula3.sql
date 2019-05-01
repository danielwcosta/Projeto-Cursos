SELECT * FROM projeto_cursos.usuarios;

SELECT COUNT(*) FROM usuarios; /* 13 USUARIOS*/

SELECT COUNT(*) FROM usuarios
WHERE tipo_usuario_fk = 3; /* 9 alunos */

SELECT * FROM cursos;

SELECT AVG(preco)
FROM cursos; /* média de preço: 267.5*/

SELECT MIN(preco)
FROM cursos; /* valor minimo 50*/

SELECT MAX(preco)
FROM cursos; /* valor maximo 800 */

SELECT SUM(preco)
FROM cursos; /* Total : 1070 */

SELECT MIN(preco), MAX(preco), SUM(preco), AVG(preco)
FROM cursos;

SELECT /* com ALIAS, renomeia os nomes na coluna*/
MIN(preco) AS 'minimo', 
MAX(preco) AS 'máximo',
AVG(preco) AS 'média',
SUM(preco) AS 'soma'
FROM cursos;

SELECT tipo_usuario_fk, COUNT(*)
FROM usuarios
GROUP BY tipo_usuario_fk;

SELECT tipo_usuari_fk FROM usuarios;

/* inner Join com ALias*/
SELECT u.nome AS usuario, t.nome AS tipo
FROM usuarios AS u
INNER JOIN tipo_usuario AS t
ON u.tipo_usuario_fk = t.id_tipo_usuario;

/* inner Join sem ALias*/
SELECT usuarios.nome , tipo_usuario.nome
FROM usuarios
INNER JOIN tipo_usuario
ON usuarios.tipo_usuario_fk = tipo_usuario.id_tipo_usuario;

/* inner Join sem ALias*/
/*SELECT TABELA A , TABELA B
FROM TABELA A
INNER JOIN TABELA B
ON TABELA A. FK da TABELA A = TABELA B.PK da TABELA B;*/

/* inner Join COM ALias*/
/*SELECT TABELA A.colunaDeA AS nome da coluna, TABELA B.colunaDeB AS nome da coluna
FROM TABELA A AS abreviaçãoTabelaA
INNER JOIN TABELA B AS abreviaçãoTabelaB
ON TABELA A. FK da TABELA A = TABELA B.PK da TABELA B;*/

SELECT c.nome AS curso , u.nome AS professor
FROM cursos AS c
INNER JOIN usuarios AS u
ON c.professor_fk = u.id_usuario;

/* insert curso sem professor */
SELECT * FROM cursos;
INSERT INTO cursos (nome, descricao, preco, tag, image)
VALUES
('Drinks Maneiros',
'Aprenda a fazer drinks sensacionais',
3000,
'drinks',
'happyhour.png');

SELECT cursos.nome AS cursos, usuarios.nome AS professor
FROM cursos
LEFT JOIN usuarios
ON cursos.professor_fk = usuarios.id_usuario;

SELECT cursos.nome AS cursos, usuarios.nome AS professor
FROM cursos
RIGHT JOIN usuarios
ON cursos.professor_fk = usuarios.id_usuario;
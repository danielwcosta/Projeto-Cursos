<?php

$dsn = 'mysql:host=localhost;dbname=projeto_cursos;charset=utf8mb4;port:3306';
$db_user = 'root';
$db_pass = '';
$conexao = new PDO($dsn,$db_user, $db_pass);

//$conexao = new PDO($dsn,$db_user, $db_pass);// a função PDO pede (host, usuario ,senha)

// var_dump($conexao);

// $conexao->query('SELECT * FROM usuarios');

?>
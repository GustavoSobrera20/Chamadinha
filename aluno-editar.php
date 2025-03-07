<?php

echo'<h1> Aluno Editar </h1>';

$editarId = $_POST['id'];
$editarNome = $_POST['nome'];


$dsn = 'mysql:dbname=bd_chamadinha;host=127.0.0.1';
$user = 'root';
$password = '';

$banco = new PDO($dsn, $user, $password);

$update='UPDATE tb_aluno SET nome = :nome WHERE id= :id';

$box = $banco->prepare($update);

$box->execute([
    ':id' => $editarId,
    ':nome' => $editarNome
]);


?>
    <a class="btn btn-danger" href="./index.php">Voltar</a>
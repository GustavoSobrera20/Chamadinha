<?php
echo "Cadastro de Aluno";

echo '<pre>';
var_dump($_POST);

$nomeFormulario = $_POST['nome'];

$dsn = 'mysql:dbname=bd_chamadinha;host=127.0.0.1';
$user = 'root';
$password = '';

$banco = new PDO($dsn, $user, $password);

$insert='INSERT INTO tb_aluno (nome) VALUE (:nome)';

$box = $banco->prepare($insert);

$box->execute([
    ':nome' => $nomeFormulario
]);

$id_aluno = $banco->lastInsertId();

echo $id_aluno;






$telefoneFormulario = $_POST['tel'];
$emailFormulario = $_POST['email'];
$nascimentoFormulario = $_POST['nasc'];
$frequenteFormulario = $_POST['frequente'];

$imgFormulario = $_POST['img'];

$insert='INSERT INTO tb_info_alunos (telefone, email, nascimento, frequente, id_alunos, img) VALUE (:telefone, :email, :nascimento, :frequente, :id_alunos, :img)';

$boxe = $banco->prepare($insert);

$boxe->execute([
    ':telefone' => $telefoneFormulario,
    ':email' => $emailFormulario,
    ':nascimento' => $nascimentoFormulario,
    ':frequente' => $frequenteFormulario,
    ':id_alunos' => $id_aluno,
    'img' => $imgFormulario,
]);
?>
    <a class="btn btn-danger" href="./index.php">Voltar</a>
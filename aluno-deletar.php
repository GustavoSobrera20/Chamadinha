<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">

<head>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert.min.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert.min.js"></script>
</head>

<?php

echo '<h1>Aluno Deletar.php</h1>';

$dsn = 'mysql:dbname=bd_chamadinha;host=127.0.0.1';
$user = 'root';
$password = '';

$banco = new PDO($dsn, $user, $password);

$idFormulario = $_GET['id'];

$delete = 'DELETE FROM tb_aluno WHERE id = :id';
$box = $banco->prepare($delete);
$box->execute([
    ':id' => $idFormulario
]);


$delete = 'DELETE FROM tb_info_alunos WHERE id_alunos = :id_alunos'; //o primeiro id_alunos é o campo do banco, o segundo id_alunos é uma variável
$box = $banco->prepare($delete);
$box->execute([
    ':id_alunos' => $idFormulario
    //esse id_alunos é a variável da linha 20
]);

echo '<script>

swal({
    title: "Sucesso!",
    text: "Usuário excluído com sucesso!",
    icon: "success",
    button: "OK",
});

</script>';
 
var_dump($box);

?>
<a class="btn btn-danger" href="./index.php">Voltar</a>
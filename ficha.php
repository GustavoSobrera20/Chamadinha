<?php

//Para puxar informação da URL, que nesse caso é o id_aluno
$id_aluno = $_GET['id_aluno'];


$dsn = 'mysql:dbname=bd_chamadinha;host=127.0.0.1';
$user = 'root';
$password = '';

$banco = new PDO($dsn, $user, $password);

$select = "SELECT tb_info_alunos.*, tb_aluno.nome FROM tb_info_alunos INNER JOIN tb_aluno ON tb_aluno.id = tb_info_alunos.id_alunos WHERE tb_info_alunos.id_alunos= " . $id_aluno;

$dados = $banco->query($select)->fetch();

// echo '<pre>'; //Para organizar o var_dump
// var_dump($dados);


?>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">


<style>
    main {
        display: flex;
        flex-direction: column;
        align-items: center;
    }

    form {
        width: 600px;
    }

    img {
        width: 200px;
        object-fit: cover;
    }
</style>

<main class="container text-center my-5">

    <img src="./img/<?= $dados['img'] ?>" alt="imagem do perfil" class="img-thumbnail">

    <form action="#">

        <label for="nome">Nome:</label class="form-control">
        <input type="text" value="<?= $dados['nome'] ?>" disabled class="form-control">
        <div class="row mt-2 ">

            <div class="col">
                <label for="telefone">Telefone:</label>
                <input type="number" value="<?= $dados['telefone'] ?>" disabled class="form-control">
            </div>

            <div class="col">
                <label for="email">Email:</label>
                <input type="email" value="<?= $dados['email'] ?>" disabled class="form-control">
            </div>
        </div>
        <div class="row mt-2">
            <div class="col">
                <label for="data_nascimento">Data de Nascimento:</label>
                <input type="date" value="<?= $dados["nascimento"] ?>" disabled class="form-control">
            </div>

            <div class="col my-4 pt-2">
                <input type="checkbox" class="form-check-input">
                <label for="frequente">Frequente:</label>
            </div>
        </div>
        <a class="btn btn-danger" href="./index.php">Voltar</a>
    </form>
</main>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">

    <title>Formulário</title>
</head>
<body>

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

    <h2>EDITAR CADASTRO</h2>
    <br>
    

    <!--
        MÉTODO DE ENVIO
            GET, através da URL. POST, através do corpo do arquivo

        ACTION
            Fala para onde deve enviar os dados
    -->

        <?php 
        
            $id_aluno_alterar = $_GET['id_aluno_alterar'];
            
            var_dump($id_aluno_alterar);


            $dsn = 'mysql:dbname=bd_chamadinha;host=127.0.0.1';
            $user = 'root';
            $password = '';

            $banco = new PDO($dsn, $user, $password);

            $select = "SELECT tb_info_alunos.*, tb_aluno.nome FROM tb_info_alunos INNER JOIN tb_aluno ON tb_aluno.id = tb_info_alunos.id_alunos WHERE tb_info_alunos.id_alunos= " . $id_aluno_alterar;

            $dados = $banco->query($select)->fetch();

            

        ?>



    <form action="./aluno-editar.php" method="POST">

        <input type="hidden" name="id" value="<?=$dados['id']?>">

        <img src="./img/<?= $dados['img'] ?>" alt=" ">

        <div class="col">
            <label for="img">imagem</label>
            <input type="file" accept="image/*" class="form-control" name="img">
        </div>

        <label for="nome">Nome:</label class="form-control">
        <input type="text"   class="form-control" name="nome" value="<?=$dados['nome']?>">
        <div class="row mt-2 ">

            <div class="col">
                <label for="telefone">Telefone:</label>
                <input type="number"   class="form-control" name="tel" value="<?=$dados['telefone']?>">
            </div>

            <div class="col">
                <label for="email">Email:</label>
                <input type="email"   class="form-control" name="email" value="<?=$dados['email']?>">
            </div>
        </div>
        <div class="row mt-2">
            <div class="col">
                <label for="data_nascimento">Data de Nascimento:</label>
                <input type="date"   class="form-control" name="nasc" value="<?=$dados['nascimento']?>">
            </div>

            <div class="col my-4 pt-2">
                <input type="checkbox" class="form-check-input" name="frequente">
                <label for="frequente">Frequente:</label>
            </div>
        </div>

        <input type="submit">
        <a class="btn btn-danger" href="./index.php">Voltar</a>
    </form>

    
</body>
</html>
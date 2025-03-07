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

    <h2>EDITAR ALUNO</h2>
    <br>
    

    <!--
        MÉTODO DE ENVIO
            GET, através da URL. POST, através do corpo do arquivo

        ACTION
            Fala para onde deve enviar os dados
    -->


    <form action="./aluno-cadastrar.php" method="POST">

        <div class="col">
            <label for="img">imagem</label>
            <input type="file" accept="image/*" class="form-control" name="img">
        </div>

        <label for="nome">Nome:</label class="form-control">
        <input type="text"   class="form-control" name="nome">
        <div class="row mt-2 ">

            <div class="col">
                <label for="telefone">Telefone:</label>
                <input type="number"   class="form-control" name="tel">
            </div>

            <div class="col">
                <label for="email">Email:</label>
                <input type="email"   class="form-control" name="email">
            </div>
        </div>
        <div class="row mt-2">
            <div class="col">
                <label for="data_nascimento">Data de Nascimento:</label>
                <input type="date"   class="form-control" name="nasc">
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
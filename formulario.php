<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <!-- Define a codificação de caracteres para UTF-8, garantindo suporte a caracteres especiais do português -->

    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Define a viewport para que a página seja responsiva em dispositivos móveis -->

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <!-- Importa o CSS do Bootstrap da CDN para estilizar os componentes da página -->

    <title>Formulário</title>
    <!-- Define o título da página que será exibido na aba do navegador -->
</head>
<body>

    <style>
        /* Estilos personalizados para o layout da página */
        main {
            display: flex;
            flex-direction: column;
            align-items: center;
        }
        /* O main será um container flexível centralizado, empilhando os elementos verticalmente */

        form {
            width: 600px;
        }
        /* Define a largura do formulário para 600px */

        img {
            width: 200px;
            object-fit: cover;
        }
        /* Configura a imagem para ter largura de 200px e ajuste adequado (sem distorção) */
    </style>

<main class="container text-center my-5">
    <!-- Main é um container centralizado com margem vertical (my-5) -->
    
    <h2>EDITAR ALUNO</h2>
    <br>
    <!-- Título da página indicando que é uma página de edição de aluno -->

    <!-- Comentários explicando o método de envio e a ação -->
    <!--
        MÉTODO DE ENVIO
            GET, através da URL. POST, através do corpo do arquivo

        ACTION
            Define para onde os dados do formulário serão enviados após o envio (neste caso, para o script aluno-cadastrar.php)
    -->

    <!-- Formulário HTML -->
    <form action="./aluno-cadastrar.php" method="POST">
        <!-- O formulário envia os dados para o script aluno-cadastrar.php usando o método POST -->

        <!-- Campo para seleção de imagem -->
        <div class="col">
            <label for="img">Imagem</label>
            <input type="file" accept="image/*" class="form-control" name="img">
            <!-- Permite ao usuário selecionar uma imagem de arquivo -->
        </div>

        <!-- Campo de entrada para o nome do aluno -->
        <label for="nome">Nome:</label>
        <input type="text" class="form-control" name="nome">
        <!-- O campo de texto permite ao usuário inserir o nome do aluno -->

        <!-- Linha para dois campos (telefone e email) -->
        <div class="row mt-2">
            <div class="col">
                <label for="telefone">Telefone:</label>
                <input type="number" class="form-control" name="tel">
                <!-- Campo numérico para o telefone do aluno -->
            </div>

            <div class="col">
                <label for="email">Email:</label>
                <input type="email" class="form-control" name="email">
                <!-- Campo para o e-mail do aluno -->
            </div>
        </div>

        <!-- Linha para data de nascimento e checkbox para 'frequente' -->
        <div class="row mt-2">
            <div class="col">
                <label for="data_nascimento">Data de Nascimento:</label>
                <input type="date" class="form-control" name="nasc">
                <!-- Campo de data para a data de nascimento do aluno -->
            </div>

            <div class="col my-4 pt-2">
                <input type="checkbox" class="form-check-input" name="frequente">
                <!-- Checkbox que indica se o aluno é frequente -->
                <label for="frequente">Frequente:</label>
            </div>
        </div>

        <!-- Botão para enviar o formulário -->
        <input type="submit" class="btn btn-primary" value="Salvar">
        <!-- O botão de envio envia o formulário para o script PHP de processamento -->

        <!-- Botão 'Voltar' que redireciona para a página principal -->
        <a class="btn btn-danger" href="./index.php">Voltar</a>
    </form>

</main>

</body>
</html>

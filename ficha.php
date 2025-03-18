<?php

// Para puxar informação da URL, que neste caso é o id_aluno
$id_aluno = $_GET['id_aluno']; 
// Pega o parâmetro 'id_aluno' da URL e o armazena na variável $id_aluno.

$dsn = 'mysql:dbname=bd_chamadinha;host=127.0.0.1'; 
// Define a string de conexão para o banco de dados, especificando o nome do banco (bd_chamadinha) e o endereço do servidor (localhost).

$user = 'root'; 
// Nome do usuário do banco de dados.

$password = ''; 
// Senha do banco de dados. Aqui está vazia, mas normalmente seria preenchida para ambientes de produção.

$banco = new PDO($dsn, $user, $password); 
// Cria uma instância de PDO para a conexão com o banco de dados usando as credenciais fornecidas.

$select = "SELECT tb_info_alunos.*, tb_aluno.nome 
           FROM tb_info_alunos 
           INNER JOIN tb_aluno ON tb_aluno.id = tb_info_alunos.id_alunos 
           WHERE tb_info_alunos.id_alunos= " . $id_aluno;
// Monta a query SQL para selecionar os dados do aluno (nome, telefone, e-mail, etc.) do banco de dados 
// usando o id do aluno que foi passado na URL.

$dados = $banco->query($select)->fetch(); 
// Executa a query e busca os dados do aluno. O método fetch() retorna o primeiro resultado da consulta.

?>

<!-- Inclui o link para o CSS do Bootstrap para estilizar os componentes da página -->
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" 
      rel="stylesheet" 
      integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" 
      crossorigin="anonymous">

<style>
    /* Estilos personalizados para a estrutura da página */
    main {
        display: flex;
        flex-direction: column;
        align-items: center;
    }
    /* Alinha os itens no eixo vertical e os centraliza na horizontal */

    form {
        width: 600px;
    }
    /* Define a largura do formulário para 600px */

    img {
        width: 200px;
        object-fit: cover;
    }
    /* A imagem será redimensionada para ter largura de 200px e será cortada para se ajustar sem distorção (cover) */
</style>

<main class="container text-center my-5">
<!-- O elemento <main> envolve todo o conteúdo da página. O conteúdo está centralizado, com espaçamento (my-5) para dar margem superior e inferior -->

    <img src="./img/<?= $dados['img'] ?>" alt="imagem do perfil" class="img-thumbnail">
    <!-- Exibe a imagem do aluno, recuperada da pasta ./img/. A imagem é armazenada no banco no campo 'img'. 
         A classe 'img-thumbnail' aplica um estilo de borda arredondada e sombra. -->

    <form action="#">
    <!-- Define um formulário HTML. O action="#" significa que o formulário não será enviado para outro destino (poderia ser um formulário de visualização). -->

        <label for="nome">Nome:</label>
        <!-- Label para o campo "Nome" -->

        <input type="text" value="<?= $dados['nome'] ?>" disabled class="form-control">
        <!-- Exibe o nome do aluno em um campo de texto desabilitado. O valor vem do banco de dados, no campo 'nome'. 
             A classe 'form-control' aplica o estilo do Bootstrap para os campos de formulário. -->
        
        <div class="row mt-2">
        <!-- Cria uma linha com dois campos de entrada -->

            <div class="col">
            <!-- Coluna 1 -->
                <label for="telefone">Telefone:</label>
                <input type="number" value="<?= $dados['telefone'] ?>" disabled class="form-control">
                <!-- Exibe o número de telefone do aluno em um campo desabilitado. -->
            </div>

            <div class="col">
            <!-- Coluna 2 -->
                <label for="email">Email:</label>
                <input type="email" value="<?= $dados['email'] ?>" disabled class="form-control">
                <!-- Exibe o e-mail do aluno em um campo desabilitado. -->
            </div>
        </div>

        <div class="row mt-2">
        <!-- Cria uma nova linha para data de nascimento e checkbox -->

            <div class="col">
                <label for="data_nascimento">Data de Nascimento:</label>
                <input type="date" value="<?= $dados["nascimento"] ?>" disabled class="form-control">
                <!-- Exibe a data de nascimento do aluno em um campo desabilitado. -->
            </div>

            <div class="col my-4 pt-2">
                <input type="checkbox" class="form-check-input" <?= ($dados['frequente'] ? 'checked' : '') ?>>
                <!-- Exibe um checkbox que indica se o aluno é frequente. O valor é verificado e se for '1' (frequente), o checkbox será marcado -->
                <label for="frequente">Frequente:</label>
            </div>
        </div>

        <a class="btn btn-danger" href="./index.php">Voltar</a>
        <!-- Um botão de "Voltar", que redireciona o usuário para a página inicial -->
    </form>
</main>

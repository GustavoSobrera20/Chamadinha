<?php

echo '<h1> Aluno Editar </h1>';
// Exibe o título "Aluno Editar" na página para indicar que o usuário está editando um aluno

$editarId = $_POST['id']; 
// Pega o ID do aluno que será editado, enviado via POST (por exemplo, ao enviar o formulário de edição)

$editarNome = $_POST['nome']; 
// Pega o novo nome do aluno que será atualizado, também enviado via POST

// Configuração da conexão com o banco de dados MySQL
$dsn = 'mysql:dbname=bd_chamadinha;host=127.0.0.1'; 
// Define o DSN (Data Source Name) para conectar ao banco de dados 'bd_chamadinha' no localhost
$user = 'root'; // Usuário para autenticação no banco de dados
$password = ''; // Senha para autenticação (aqui está vazia, mas deve ser preenchida conforme a configuração do banco)

$banco = new PDO($dsn, $user, $password); 
// Cria a conexão com o banco de dados usando PDO, que permite executar queries de forma segura

// Define a query SQL para atualizar o nome do aluno na tabela tb_aluno
$update = 'UPDATE tb_aluno SET nome = :nome WHERE id= :id'; 

$box = $banco->prepare($update); 
// Prepara a query SQL para execução, substituindo os placeholders :nome e :id com os valores fornecidos

$box->execute([ 
    ':id' => $editarId, // Substitui o placeholder :id pelo ID do aluno a ser editado
    ':nome' => $editarNome // Substitui o placeholder :nome pelo novo nome do aluno
]);

?>
<a class="btn btn-danger" href="./index.php">Voltar</a> 
<!-- Exibe um botão "Voltar" que redireciona o usuário de volta para a página inicial -->

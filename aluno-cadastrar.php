<?php
echo "Cadastro de Aluno"; // Exibe o título "Cadastro de Aluno" na página

echo '<pre>';
var_dump($_POST); // Exibe todos os dados enviados via POST para depuração (verificando os dados do formulário)

$nomeFormulario = $_POST['nome']; // Armazena o valor do campo "nome" do formulário na variável $nomeFormulario

// Configuração da conexão com o banco de dados MySQL
$dsn = 'mysql:dbname=bd_chamadinha;host=127.0.0.1'; // Define o DSN para conexão com o banco 'bd_chamadinha' no localhost
$user = 'root'; // Usuário para autenticação no banco de dados
$password = ''; // Senha para autenticação (aqui está em branco, no seu caso, pode ser diferente)

$banco = new PDO($dsn, $user, $password); // Cria a conexão com o banco de dados usando PDO (uma forma segura de trabalhar com bancos)

$insert = 'INSERT INTO tb_aluno (nome) VALUE (:nome)'; // Query SQL para inserir o nome do aluno na tabela tb_aluno, com um placeholder para o nome

$box = $banco->prepare($insert); // Prepara a query SQL para execução, prevenindo SQL injection

$box->execute([ ':nome' => $nomeFormulario ]); // Executa a query, passando o valor do nome para o placeholder ":nome"

$id_aluno = $banco->lastInsertId(); // Pega o ID gerado automaticamente do último aluno inserido (geralmente gerado por um campo autoincrement)

echo $id_aluno; // Exibe o ID do aluno recém-criado, que pode ser útil para associar outras informações a ele

// Pega os outros dados do formulário enviados pelo usuário
$telefoneFormulario = $_POST['tel']; // Armazena o valor do campo "telefone" do formulário
$emailFormulario = $_POST['email']; // Armazena o valor do campo "email" do formulário
$nascimentoFormulario = $_POST['nasc']; // Armazena o valor do campo "nascimento" do formulário
$frequenteFormulario = $_POST['frequente']; // Armazena o valor do campo "frequente" do formulário
$imgFormulario = $_POST['img']; // Armazena o valor do campo "img" do formulário

// Define a query SQL para inserir as informações adicionais na tabela tb_info_alunos
$insert = 'INSERT INTO tb_info_alunos (telefone, email, nascimento, frequente, id_alunos, img) 
           VALUE (:telefone, :email, :nascimento, :frequente, :id_alunos, :img)'; 

$boxe = $banco->prepare($insert); // Prepara a query SQL para execução, prevenindo SQL injection

$boxe->execute([ // Executa a query com os valores preenchidos
    ':telefone' => $telefoneFormulario,   // Passa o telefone para o placeholder :telefone
    ':email' => $emailFormulario,         // Passa o email para o placeholder :email
    ':nascimento' => $nascimentoFormulario, // Passa a data de nascimento para o placeholder :nascimento
    ':frequente' => $frequenteFormulario,  // Passa a informação sobre frequência para o placeholder :frequente
    ':id_alunos' => $id_aluno,            // Passa o ID do aluno (obtido na primeira inserção) para associar as informações
    'img' => $imgFormulario,              // Passa a imagem (presumivelmente a URL ou caminho da imagem) para o placeholder :img
]);

?>
<a class="btn btn-danger" href="./index.php">Voltar</a> <!-- Exibe um link de retorno à página inicial -->

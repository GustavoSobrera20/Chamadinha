<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous"> 
<!-- Link para incluir o CSS do Bootstrap, para estilizar os elementos da página -->

<head>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert.min.css">
    <!-- Inclui o CSS da biblioteca SweetAlert para exibir popups bonitos -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert.min.js"></script>
    <!-- Inclui o script da SweetAlert para poder exibir os popups de notificação -->
</head>

<?php

echo '<h1>Aluno Deletar.php</h1>'; 
// Exibe o título "Aluno Deletar.php" na página

// Configuração da conexão com o banco de dados MySQL
$dsn = 'mysql:dbname=bd_chamadinha;host=127.0.0.1'; // Endereço e nome do banco de dados
$user = 'root'; // Usuário para autenticação
$password = ''; // Senha para autenticação (está vazia aqui, mas pode ser diferente em produção)

$banco = new PDO($dsn, $user, $password); // Cria a conexão com o banco de dados usando PDO

$idFormulario = $_GET['id']; 
// Pega o ID do aluno que será deletado, passado via URL (como parâmetro GET)

$delete = 'DELETE FROM tb_aluno WHERE id = :id'; 
// Query SQL para deletar o aluno da tabela tb_aluno com o ID correspondente
$box = $banco->prepare($delete); 
// Prepara a query para execução, prevenindo SQL injection
$box->execute([
    ':id' => $idFormulario // Substitui o placeholder :id com o valor do ID do aluno a ser deletado
]);

// Segunda query para deletar as informações adicionais do aluno na tabela tb_info_alunos
$delete = 'DELETE FROM tb_info_alunos WHERE id_alunos = :id_alunos'; 
// Aqui o "id_alunos" é o campo que relaciona a tabela tb_info_alunos com a tabela tb_aluno
$box = $banco->prepare($delete); 
// Prepara a query para execução
$box->execute([
    ':id_alunos' => $idFormulario // Substitui o placeholder :id_alunos com o ID do aluno
]);

// Exibe um alerta de sucesso usando a SweetAlert
echo '<script>
swal({
    title: "Sucesso!", // Título do alerta
    text: "Usuário excluído com sucesso!", // Texto do alerta
    icon: "success", // Tipo de alerta (sucesso)
    button: "OK", // Texto do botão de confirmação
});
</script>';

var_dump($box); 
// Exibe a variável $box para depuração, mostrando se a query foi executada corretamente

?>
<a class="btn btn-danger" href="./index.php">Voltar</a> 
<!-- Exibe um botão para voltar à página inicial -->

<!-- Importação do Bootstrap para estilizar a página -->
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">

<?php

// Conexão com o banco de dados usando PDO
$dsn = 'mysql:dbname=bd_chamadinha;host=127.0.0.1'; // Definindo as credenciais de conexão
$user = 'root'; // Usuário do banco
$password = ''; // Senha do banco (vazia, já que estamos assumindo que não tem senha)

$banco = new PDO($dsn, $user, $password); // Criando a conexão com o banco de dados usando PDO

// Seleção dos dados da tabela tb_aluno
$select = "SELECT * FROM tb_aluno"; // Consulta SQL para pegar todos os alunos

// Executando a consulta e buscando todos os resultados
$resultado = $banco->query($select)->fetchAll(); 

// echo '<pre>'; // Descomentando isso ajuda na visualização de arrays e objetos
// var_dump($resultado); // Essa linha exibe o conteúdo da variável $resultado para debug (não usada no código final)

?>

<!-- Corpo HTML da página -->
<main class="container my-5">
    <!-- O main é a seção centralizada e com espaçamento vertical (my-5) -->
    <table class="table table-striped">
        <!-- A tabela tem um estilo do Bootstrap para se tornar mais legível (tabela com listras) -->

        <div class="my-3 d-flex justify-content-end">
            <!-- Container para o botão de cadastrar novo aluno, alinhado à direita -->
            <a href="formulario.php" class="btn btn-success">Cadastrar Novo Aluno</a>
            <!-- Este botão vai redirecionar para a página de cadastro de aluno -->
        </div>

        <!-- Cabeçalho da tabela -->
        <tr>
            <td>    id  </td> <!-- Coluna para o ID do aluno -->
            <td>    nome  </td> <!-- Coluna para o nome do aluno -->
            <td class="text-center">    ação</td> <!-- Coluna para as ações (botões de editar, excluir, etc.) -->
        </tr>

        <!-- Laço PHP para exibir os dados dos alunos -->
        <?php foreach($resultado as $linha) {?> <!-- $resultado contém todos os alunos -->
            <tr>
                <td>  <?=$linha['id'] ?> </td> <!-- Exibe o ID do aluno -->
                <td>  <?php echo $linha['nome'] ?> </td> <!-- Exibe o nome do aluno -->
                <td class="text-center">
                    <!-- Coloca os botões de ação dentro de uma célula centralizada -->
                    <a class="btn btn-primary" href="ficha.php?id_aluno=<?=$linha['id'] ?>">Abrir</a>
                    <!-- Link para abrir a ficha do aluno, passando o ID como parâmetro na URL -->
                    
                    <a class="btn btn-warning" href="formulario-editar.php?id_aluno_alterar=<?=$linha['id'] ?>">Editar</a>
                    <!-- Link para editar as informações do aluno, passando o ID como parâmetro para identificação -->
                    
                    <a class="btn btn-danger" href="aluno-deletar.php?id=<?=$linha['id'] ?>">Excluir</a>
                    <!-- Link para excluir o aluno, também passando o ID -->
                </td>
            </tr>
        <?php } ?>
        <!-- Fim do loop que percorre todos os alunos -->
    </table>
</main>

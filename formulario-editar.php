<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Configurações de metadados da página: codificação de caracteres e responsividade -->
    
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <!-- Importa o CSS do Bootstrap para estilizar a página -->

    <title>Formulário</title>
    <!-- Define o título da página -->
</head>
<body>

    <style>
        /* Estilos personalizados para o layout da página */
        main {
            display: flex;
            flex-direction: column;
            align-items: center;
        }
        /* Configura o main para ser um container centralizado, empilhando os elementos verticalmente */

        form {
            width: 600px;
        }
        /* Define a largura do formulário para 600px */

        img {
            width: 200px;
            object-fit: cover;
        }
        /* A imagem terá largura de 200px e será ajustada para cobrir o espaço sem distorção */
    </style>

<main class="container text-center my-5">   
    <!-- Main é um container Bootstrap com alinhamento centralizado e espaçamento vertical (my-5) -->

    <h2>EDITAR CADASTRO</h2>
    <br>
    <!-- Cabeçalho principal que indica que é uma página de edição de cadastro -->

    <?php 
        // Recupera o id do aluno a ser editado a partir da URL (id_aluno_alterar)
        $id_aluno_alterar = $_GET['id_aluno_alterar'];
        var_dump($id_aluno_alterar); // Exibe o valor de $id_aluno_alterar para depuração

        // Define a string de conexão com o banco de dados
        $dsn = 'mysql:dbname=bd_chamadinha;host=127.0.0.1';
        $user = 'root';
        $password = '';

        // Cria uma instância do PDO para conectar ao banco de dados
        $banco = new PDO($dsn, $user, $password);

        // Monta a query SQL para buscar os dados do aluno a partir do id_aluno_alterar
        $select = "SELECT tb_info_alunos.*, tb_aluno.nome FROM tb_info_alunos 
                    INNER JOIN tb_aluno ON tb_aluno.id = tb_info_alunos.id_alunos 
                    WHERE tb_info_alunos.id_alunos= " . $id_aluno_alterar;

        // Executa a query e pega os dados do aluno
        $dados = $banco->query($select)->fetch();
    ?>

    <!-- Formulário para editar os dados do aluno -->
    <form action="./aluno-editar.php" method="POST">
        <!-- A ação do formulário será enviada para o arquivo aluno-editar.php usando o método POST -->

        <!-- Campo oculto para enviar o id do aluno para o backend -->
        <input type="hidden" name="id" value="<?=$dados['id']?>">

        <!-- Exibe a imagem do aluno, carregada dinamicamente com base no nome do arquivo da imagem -->
        <img src="./img/<?= $dados['img'] ?>" alt="Imagem do aluno">

        <!-- Campo para alterar a imagem do aluno -->
        <div class="col">
            <label for="img">Imagem</label>
            <input type="file" accept="image/*" class="form-control" name="img">
            <!-- O campo 'input' permite que o usuário selecione uma nova imagem para o aluno -->
        </div>

        <!-- Campo para editar o nome do aluno -->
        <label for="nome">Nome:</label>
        <input type="text" class="form-control" name="nome" value="<?=$dados['nome']?>">
        <!-- O campo de texto exibe o nome atual do aluno, permitindo que ele seja alterado -->

        <div class="row mt-2">
            <!-- Cria uma linha com dois campos (telefone e email) -->
            <div class="col">
                <label for="telefone">Telefone:</label>
                <input type="number" class="form-control" name="tel" value="<?=$dados['telefone']?>">
                <!-- O campo de número exibe o telefone atual do aluno -->
            </div>

            <div class="col">
                <label for="email">Email:</label>
                <input type="email" class="form-control" name="email" value="<?=$dados['email']?>">
                <!-- O campo de e-mail exibe o e-mail atual do aluno -->
            </div>
        </div>

        <div class="row mt-2">
            <!-- Cria uma nova linha com dois campos (data de nascimento e checkbox para frequente) -->
            <div class="col">
                <label for="data_nascimento">Data de Nascimento:</label>
                <input type="date" class="form-control" name="nasc" value="<?=$dados['nascimento']?>">
                <!-- O campo de data permite que o usuário edite a data de nascimento do aluno -->
            </div>

            <div class="col my-4 pt-2">
                <!-- Checkbox para indicar se o aluno é frequente -->
                <input type="checkbox" class="form-check-input" name="frequente" <?= ($dados['frequente'] ? 'checked' : '') ?>>
                <!-- Se o aluno for frequente (valor 1 no banco), o checkbox será marcado -->
                <label for="frequente">Frequente:</label>
            </div>
        </div>

        <!-- Botão de envio para submeter o formulário -->
        <input type="submit" class="btn btn-primary" value="Salvar Alterações">

        <!-- Botão de 'Voltar' que redireciona para a página inicial -->
        <a class="btn btn-danger" href="./index.php">Voltar</a>
    </form>
</main>

</body>
</html>

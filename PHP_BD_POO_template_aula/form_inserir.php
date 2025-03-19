<?php
require_once 'DBClientes.php';

$showForm = false; // Variável de controle para exibir o formulário de gestão após a inserção

// Verifica se o formulário de inserção foi submetido
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['nome']) && isset($_POST['cpf']) && isset($_POST['email'])) {
    // Captura os dados do formulário
    $id = $_POST['id'];
    $nome = $_POST['nome'];
    $cpf = $_POST['cpf'];
    $email = $_POST['email'];

    // Criação do objeto DBClientes para inserir o novo cliente
    $bdClientes = new DBClientes();
    if ($bdClientes->create($id, $nome, $cpf, $email)) {
        echo "Cliente inserido com sucesso !!!";
        $showForm = true;  // Exibe o formulário de gestão após inserção
    } else {
        echo "Erro ao incluir cliente.";
    }
}
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Formulário de Cadastro e Gestão</title>
</head>
<body>
    <!-- Formulário de Cadastro -->
    <h1>Cadastro de Cliente</h1>
    <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">
        <label for="id">ID:</label><br>
        <input type="text" id="id" name="id"><br><br>
        <label for="nome">Nome:</label><br>
        <input type="text" id="nome" name="nome"><br><br>
        <label for="cpf">CPF:</label><br>
        <input type="text" id="cpf" name="cpf"><br><br>
        <label for="email">Email:</label><br>
        <input type="email" id="email" name="email"><br><br>
        <input type="submit" value="Cadastrar">
    </form>

    <?php
    // Exibe o formulário de gestão (consultar, alterar, excluir) após a inserção
    if ($showForm):
    ?>
        <h1>Gestão de Clientes</h1>

        <!-- Formulário de Consulta -->
        <h2>Consultar Cliente</h2>
        <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">
            <label for="id">ID do Cliente:</label><br>
            <input type="text" id="id" name="id"><br><br>
            <input type="hidden" name="action" value="consultar">
            <input type="submit" value="Consultar">
        </form>

        <?php if (isset($cliente)): ?>
            <h3>Cliente Encontrado:</h3>
            <p>ID: <?php echo $cliente['id']; ?></p>
            <p>Nome: <?php echo $cliente['nome']; ?></p>
            <p>CPF: <?php echo $cliente['CPF']; ?></p>
            <p>Email: <?php echo $cliente['email']; ?></p>
        <?php endif; ?>

        <!-- Formulário de Alteração -->
        <h2>Alterar Cliente</h2>
        <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">
            <label for="id">ID do Cliente:</label><br>
            <input type="text" id="id" name="id"><br><br>
            <label for="nome">Nome:</label><br>
            <input type="text" id="nome" name="nome"><br><br>
            <label for="cpf">CPF:</label><br>
            <input type="text" id="cpf" name="cpf"><br><br>
            <label for="email">Email:</label><br>
            <input type="email" id="email" name="email"><br><br>
            <input type="hidden" name="action" value="alterar">
            <input type="submit" value="Alterar Cliente">
        </form>

        <!-- Formulário de Exclusão -->
        <h2>Excluir Cliente</h2>
        <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">
            <label for="id">ID do Cliente:</label><br>
            <input type="text" id="id" name="id"><br><br>
            <input type="hidden" name="action" value="apagar">
            <input type="submit" value="Excluir Cliente">
        </form>

        <?php
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            if (isset($_POST['action'])) {
                if ($_POST['action'] == 'alterar') {
                    echo "Cliente alterado com sucesso!";
                } elseif ($_POST['action'] == 'apagar') {
                    echo "Cliente excluído com sucesso!";
                }
            }
        }
        ?>
    <?php endif; ?>
</body>
</html>

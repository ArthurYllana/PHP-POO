<?php
require_once 'DBClientes.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $bdClientes = new DBClientes();
    if (isset($_POST['action'])) {
        // Consulta de um cliente
        if ($_POST['action'] == 'consultar') {
            $id = $_POST['id'];
            $cliente = $bdClientes->recoveryById($id);
        }
        // Alteração de um cliente
        elseif ($_POST['action'] == 'alterar') {
            $id = $_POST['id'];
            $nome = $_POST['nome'];
            $cpf = $_POST['cpf'];
            $email = $_POST['email'];
            $bdClientes->update($id, $nome, $cpf, $email);
        }
        // Exclusão de um cliente
        elseif ($_POST['action'] == 'apagar') {
            $id = $_POST['id'];
            $bdClientes->delete($id);
        }
    }
}
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Consultas, Alterações e Exclusões</title>
</head>
<body>
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
        <input type="text" id="id" name="id"><br>
        <label for="nome">Nome:</label><br>
        <input type="text" id="nome" name="nome"><br>
        <label for="cpf">CPF:</label><br>
        <input type="text" id="cpf" name="cpf"><br>
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
</body>
</html>

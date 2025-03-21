<?php
    require_once 'DBClientes.php';
    $bdClientes = new DBClientes();
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Formulário de Cadastro</title>
</head>
<body>
    <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">
        <label for="id">ID:</label><br>
        <input type="text" id="id" name="id" required><br>
        <label for="nome">Nome:</label><br>
        <input type="text" id="nome" name="nome"><br>
        <label for="cpf">CPF:</label><br>
        <input type="text" id="cpf" name="cpf"><br>
        <label for="email">Email:</label><br>
        <input type="email" id="email" name="email"><br><br>
        
        <button type="submit" name="acao" value="inserir">Enviar</button>
        <button type="submit" name="acao" value="consultar">Consultar</button>
        <button type="submit" name="acao" value="alterar">Alterar</button>
        <button type="submit" name="acao" value="apagar">Apagar</button>
    </form>

    <?php
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $acao = $_POST['acao'];
        $id = $_POST['id'];
        $nome = $_POST['nome'] ?? null;
        $cpf = $_POST['cpf'] ?? null;
        $email = $_POST['email'] ?? null;
    
        switch ($acao) {
            case 'inserir':
                if ($bdClientes->create($id, $nome, $cpf, $email)) {
                    echo "<p>Cliente inserido com sucesso!</p>";
                } else {
                    echo "<p>Erro ao incluir cliente.</p>";
                }
                break;
            
            case 'consultar':
                $cliente = $bdClientes->read($id);
                if ($cliente) {
                    echo "<p>Nome encontrado: " . $cliente['nome'] . "</p>";
                } else {
                    echo "<p>Nenhum cliente encontrado para o ID fornecido.</p>";
                }
                break;
    
            case 'alterar':
                if ($bdClientes->update($id, $nome, $cpf, $email)) {
                    echo "<p>Dados alterados com sucesso! Novo Nome: $nome</p>";
                } else {
                    echo "<p>Erro ao alterar os dados.</p>";
                }
                break;
    
            case 'apagar':
                if ($bdClientes->delete($id)) {
                    echo "<p>Cliente apagado com sucesso.</p>";
                } else {
                    echo "<p>Erro ao apagar cliente. ID inexistente.</p>";
                }
                break;
    
            default:
                echo "<p>Ação inválida.</p>";
                break;
        }
    }
    ?>
</body>
</html>

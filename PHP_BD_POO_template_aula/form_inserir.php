<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Formulário de Cadastro</title>
</head>
<body>
    <!-- O formulário abaixo envia os dados para a mesma página (PHP_SELF) usando o método POST -->
    <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">
        <label for="id">ID:</label><br>
        <input type="text" id="id" name="id"><br>
        <label for="nome">Nome:</label><br>
        <input type="text" id="nome" name="nome"><br>
        <label for="cpf">CPF:</label><br>
        <input type="text" id="cpf" name="cpf"><br>
        <label for="email">Email:</label><br>
        <input type="email" id="email" name="email"><br><br>
        <input type="submit" value="Enviar">
    </form>

    <?php
    // Verifica se o formulário foi submetido
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        // Captura os dados do formulário
        $id = $_POST['id'];
        $nome = $_POST['nome'];
        $cpf = $_POST['cpf'];
        $email = $_POST['email'];

        $bdClientes = new DBClientes();
        if ($bdClientes->create($id, $nome, $cpf, $email)) {
            echo "Cliente inserido com sucesso !!!";
        }
        else {
            echo "Erro ao incluir cliente.";
        }



        // Exibe os dados
        echo "<h2>Dados Recebidos:</h2>";
        echo "ID: " . $id . "<br>";
        echo "Nome: " . $nome . "<br>";
        echo "CPF: " . $cpf . "<br>";
        echo "Email: " . $email . "<br>";
    }
    ?>
</body>
</html>

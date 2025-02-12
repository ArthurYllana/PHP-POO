<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h1>Somando os números digitados</h1>

    <form method="post">
        <label for="numero">Digite um número inteiro:</label>
        <input type="" name="numero" id="numero" required>
        <button type="submit">Calcular</button>
    </form>

    <?php
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $numero = $_POST["numero"];
        $soma = array_sum(str_split(abs($numero))); // Soma os dígitos diretamente
        echo "<p>A soma dos dígitos de $numero é: $soma</p>";
    }
    ?>
    
</body>
</html>
<?php
session_start(); // iniciando a SESSION
?>
<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <title>CalcTEC</title>
</head>
<body>
    <div class="div-conteudo">
        <form method="GET" action="processamento.php">
            <label>Primeiro número:</label>
            <input type="text" name="inputNum1" placeholder="Digite o número 1" required>
            <label>Segundo número:</label>
            <input type="text" name="inputNum2" placeholder="Digite o número 2 (se escolher a área do circulo, coloque 3.14)" required>
            <select name="selectOperacoes" required>
                <option value="circulo">Área do Círculo</option>
                <option value="triangulo">Área do Triângulo</option>
                <option value="quadrado">Área do Quadrado</option>
                <option value="retangulo">Área do Retângulo</option>
            </select>
            <input id="botao" type="submit" value="Calcular">
        </form>

        <!-- Exibe o resultado da sessão -->
        <h1>
            <?php
                if(isset($_SESSION['resultado'])) {
                    echo $_SESSION['resultado'];
                }
            ?>
        </h1>
    </div>
</body>
</html>

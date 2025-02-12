<?php
session_start(); // iniciando a SESSION
require_once 'calculo.php'; // incluindo um arquivo php externo

// checando se o formulário não está vazio
if (!empty($_GET['inputNum1']) && !empty($_GET['inputNum2']) && !empty($_GET['selectOperacoes'])) {
    $numero1 = $_GET['inputNum1'];
    $numero2 = $_GET['inputNum2'];

    // Validando se os valores são numéricos
    if (!is_numeric($numero1) || !is_numeric($numero2)) {
        $_SESSION['resultado'] = "Por favor, insira valores numéricos.";
        header('location: index.php'); // redireciona de volta para a página principal
        exit();
    }

    // código da parte de seleção do tipo de cálculo
    switch ($_GET['selectOperacoes']) {
        case "circulo":
            $resultado = $numero1 . "² x 3.14 = " . circulo($numero1);
            break;
        case "triangulo":
            $resultado = $numero1 . " x " . $numero2 . " / 2 = " . triangulo($numero1, $numero2);
            break;
        case "retangulo":
            $resultado = $numero1 . " x " . $numero2 . " = " . retangulo($numero1, $numero2);
            break;
        case "quadrado":
            $resultado = $numero1 . "² = " . quadrado($numero1);
            break;
        default:
            $_SESSION['resultado'] = "Operação inválida.";
            header('location: index.php');
            exit();
    }

    // Armazenando o resultado na sessão e redirecionando para a página principal
    $_SESSION['resultado'] = $resultado;
    header('location: index.php');
    exit();
} else {
    $_SESSION['resultado'] = "Por favor, preencha todos os campos.";
    header('location: index.php');
    exit();
}
?>

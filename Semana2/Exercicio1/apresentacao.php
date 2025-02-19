<?php
// Incluindo a classe Calculadora
require_once 'Calcula.php';

function main() {
    // Cria uma instância da classe Calculadora
    $calc = new Calculadora();

    // Realizando operações com a calculadora
    $calc->soma(10);
    echo "Resultado após soma: " . $calc->getRes() . "\n" ."<br>";  // 10

    $calc->multiplicacao(2);
    echo "Resultado após multiplicação: " . $calc->getRes() . "\n" ."<br>";  // 20

    $calc->subtracao(5);
    echo "Resultado após subtração: " . $calc->getRes() . "\n" ."<br>";  // 15

    $calc->divisao(3);
    echo "Resultado após divisão: " . $calc->getRes() . "\n" ."<br>";  // 5

    $calc->potencia(2);
    echo "Resultado após potência: " . $calc->getRes() . "\n" ."<br>";  // 25

    $calc->porcentagem(10);
    echo "Resultado após porcentagem: " . $calc->getRes() . "\n" ."<br>";  // 2.5

    $calc->raiz();
    echo "Resultado após raiz quadrada: " . $calc->getRes() . "\n" ."<br>";  // 1.581138830084

    // Desfaz a última operação (raiz quadrada)
    $calc->desfaz();
    echo "Resultado após desfazer: " . $calc->getRes() . "\n" ."<br>";  // 2.5

    // Zera o resultado
    $calc->zerar();
    echo "Resultado após zerar: " . $calc->getRes() . "\n" ."<br>";  // 0
}

// Chama a função main para executar o programa
main();

?>

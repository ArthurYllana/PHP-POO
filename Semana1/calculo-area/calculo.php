<?php
// Funções de cálculo para as áreas

function circulo($num1){
    return ($num1 * $num1) * 3.14; // Calcula a área do círculo
}

function triangulo($num1, $num2){
    return ($num1 * $num2) / 2; // Calcula a área do triângulo
}

function quadrado($num1){
    return $num1 * $num1; // Calcula a área do quadrado
}

function retangulo($num1, $num2){
    return $num1 * $num2; // Calcula a área do retângulo
}
?>

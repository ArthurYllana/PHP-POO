<?php
// Inclui a classe Carro
require_once 'carros.php';

// Cria um objeto Carro com um consumo de 12 km/l
$carro = new carros(12);

// Abastece o carro com 30 litros de combustível
$carro->setCombustivel(30);

// Verifica o nível de combustível após o abastecimento
echo "Nível de combustível: " . $carro->getCombustivel() . " litros.\n" ."<br>";

// O carro anda 100 km
$carro->andar(100);

// Verifica o nível de combustível após a viagem
echo "Nível de combustível após a viagem: " . $carro->getCombustivel() . " litros.\n" ."<br>";

// Tenta andar 500 km (não há combustível suficiente)
$carro->andar(500);
?>
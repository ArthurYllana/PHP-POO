<?php

class Retangulo{
    private $largura;
    private $altura;
    
    public function __construct($largura = 1, $altura = 1)
    {
        $this-> largura = $largura;
        $this-> altura = $altura;
    }

    public function setAltura($altura){
        $this-> altura = $altura;
    }
    public function setLargura($largura){
        $this-> largura = $largura;
    }
    public function getAltura($altura){
        return $this-> altura = $altura;
    }
    public function getLargura($largura){
        return $this-> largura = $largura;
    }

    public function calculaArea(){
        return $this-> altura * $this-> largura;
    }
    public function calculaPerimetro(){
        return 2 * ($this-> altura * $this-> largura);
    }

    public function ehQuadrado(){
        return $this-> altura === $this-> largura;
    }
}

$retangulo = new Retangulo(10, 10);
echo "Perímetro: " . $retangulo->calculaPerimetro() . "\n" . "<br>";
echo "Área: " . $retangulo->calculaArea() . "\n" . "<br>";
echo "É um quadrado? " . ($retangulo->ehQuadrado() ? "Sim" : "Não") . "\n";

?>
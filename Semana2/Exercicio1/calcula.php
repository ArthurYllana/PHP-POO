<?php

class calculadora{
    private $res;
    private $men;

    public function __construct()
    {
        $this-> res = 0;
        $this -> men = 0;
    }

    public function zerar(){
        $this-> res = 0;
    }
    public function desfaz(){
        $this-> res = $this-> men; 
    }

    public function getRes(){
        return $this-> res; 
    }


    public function soma($valor){
        $this-> men = $this-> res;
        $this-> res += $valor;
    }
    
    public function subtracao($valor){
        $this-> men = $this-> res;
        $this-> res -= $valor;
    }
    
    public function divisao($valor){
        if ($valor != 0){
            $this-> men = $this-> res;
            $this-> res /= $valor; 
        }
        else{
            echo "Não é possível fazer divisão por 0";
        }
    }
    public function multiplicacao($valor) {
        $this-> men = $this->res;  
        $this->res *= $valor;
    }

   
    public function potencia($exp) {
        $this->men = $this->res;  
        $this->res = pow($this->res, $exp);
    }
    public function porcentagem($porc){
        $this-> men = $this-> res;
        $this-> res = ($this-> res * $porc) / 100;
    }
    public function raiz(){
        if ($this-> res = 0){
            $this-> men = $this-> res;
            $this-> res = sqrt($this-> res);
        }
        else{
            echo "Não é possível calcular raiz de número negativo";
        }
    }
}

?>
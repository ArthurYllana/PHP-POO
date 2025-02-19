<?php
class carros{
    private $consumo;
    private $combustivel;

    public function __construct($consumo)
    {
        $this->consumo = $consumo;
        $this->combustivel = 0;
    }

    public function andar($distancia){
        $combustivelNecessario = $distancia / $this->consumo;

        if($combustivelNecessario <= $this->combustivel){
            $this->combustivel -= $combustivelNecessario;
            echo "Você andou " . $distancia. "km. Combustivel restantate: " .  $this->combustivel . " litros.\n";
        }
        else{
            echo "Combustível insuficiente \n";
        }

    }
    public function getCombustivel(){
        return $this->combustivel;
    }
    public function setCombustivel($quantidade){
        if ($quantidade > 0) {
            $this->combustivel += $quantidade;
            echo "Você abasteceu " . $quantidade . " litros. Combustível atual: " . $this->combustivel . " litros.\n";
        } else {
            echo "Erro: Quantidade de combustível inválida.\n";
        }
    }
}

?>
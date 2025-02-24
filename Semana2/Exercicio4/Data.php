<?php
class Data {
    private int $dia;
    private int $mes;
    private int $ano;

    // Construtor padrão e sobrecarga
    public function __construct(int $dia = 0, int $mes = 0, int $ano = 0) {
        $this->dia = $dia;
        $this->mes = $mes;
        $this->ano = $ano;
    }

    // Métodos Getters e Setters
    public function getDia(): int {
        return $this->dia;
    }
    public function setDia(int $dia): void {
        $this->dia = $dia;
    }

    public function getMes(): int {
        return $this->mes;
    }
    public function setMes(int $mes): void {
        $this->mes = $mes;
    }

    public function getAno(): int {
        return $this->ano;
    }
    public function setAno(int $ano): void {
        $this->ano = $ano;
    }

    // Método para verificar se é ano bissexto
    public function ehBissexto(): bool {
        return ($this->ano % 4 == 0 && $this->ano % 100 != 0) || ($this->ano % 400 == 0);
    }

    // Método para incrementar um dia
    public function incrementarDia(): void {
        $data = strtotime("{$this->ano}-{$this->mes}-{$this->dia} +1 day");
        $this->dia = (int)date("d", $data);
        $this->mes = (int)date("m", $data);
        $this->ano = (int)date("Y", $data);
    }

    // Método para decrementar um dia
    public function decrementarDia(): void {
        $data = strtotime("{$this->ano}-{$this->mes}-{$this->dia} -1 day");
        $this->dia = (int)date("d", $data);
        $this->mes = (int)date("m", $data);
        $this->ano = (int)date("Y", $data);
    }

    // Método para retornar a data como string
    public function __toString(): string {
        return sprintf("%02d/%02d/%04d", $this->dia, $this->mes, $this->ano);
    }

    // Método para calcular a diferença em dias entre duas datas
    public function diferencaDias(Data $outraData): int {
        $data1 = strtotime("{$this->ano}-{$this->mes}-{$this->dia}");
        $data2 = strtotime("{$outraData->ano}-{$outraData->mes}-{$outraData->dia}");
        return abs(($data1 - $data2) / 86400);
    }

    // Método para comparar datas
    public function comparar(Data $outraData): int {
        $data1 = strtotime("{$this->ano}-{$this->mes}-{$this->dia}");
        $data2 = strtotime("{$outraData->ano}-{$outraData->mes}-{$outraData->dia}");
        return $data1 <=> $data2;
    }
}

// Exemplo de uso
$data1 = new Data(4, 7, 2023);
$data2 = new Data(5, 7, 2023);

echo $data1 . "\n";
$data1->incrementarDia();
echo $data1 . "\n";
echo "Diferença em dias: " . $data1->diferencaDias($data2) . "\n";
echo "Comparação: " . $data1->comparar($data2) . "\n";

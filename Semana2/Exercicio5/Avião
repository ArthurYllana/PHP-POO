<?php
class Voo {
    private int $numero;
    private Data $data;
    private array $assentos;
    private const MAX_ASSENTOS = 100;

    public function __construct(int $numero, Data $data) {
        $this->numero = $numero;
        $this->data = $data;
        $this->assentos = array_fill(1, self::MAX_ASSENTOS, false);
    }

    public function getProximoAssento(): ?int {
        for ($i = 1; $i <= self::MAX_ASSENTOS; $i++) {
            if (!$this->assentos[$i]) {
                return $i;
            }
        }
        return null;
    }

    public function verificaAssento(int $assento): bool {
        return $this->assentos[$assento] ?? false;
    }

    public function ocupa(int $assento): bool {
        if (isset($this->assentos[$assento]) && !$this->assentos[$assento]) {
            $this->assentos[$assento] = true;
            return true;
        }
        return false;
    }

    public function getVagas(): int {
        return count(array_filter($this->assentos, fn($ocupado) => !$ocupado));
    }

    public function getVoo(): int {
        return $this->numero;
    }

    public function getDataVoo(): Data {
        return $this->data;
    }
}

// Exemplo de uso
$dataVoo = new Data(10, 8, 2023);
$voo = new Voo(1234, $dataVoo);

echo "Próximo assento livre: " . $voo->getProximoAssento() . "\n";
echo "Ocupando assento 5: " . ($voo->ocupa(5) ? "Sucesso" : "Falha") . "\n";
echo "Assento 5 está ocupado? " . ($voo->verificaAssento(5) ? "Sim" : "Não") . "\n";
echo "Vagas disponíveis: " . $voo->getVagas() . "\n";
echo "Número do voo: " . $voo->getVoo() . "\n";
echo "Data do voo: " . $voo->getDataVoo() . "\n";

<?php
require 'Database.php'; // Certifique-se de que este arquivo contém a conexão com o banco de dados
require 'form_inserir.php'; // Garante que a inserção ocorre antes das ações

class Cliente {
    private $conn;

    public function __construct($db) {
        $this->conn = $db;
    }

    public function consultar($id) {
        $sql = "SELECT nome FROM clientes WHERE id = ?";
        $stmt = $this->conn->prepare($sql);
        $stmt->execute([$id]);
        $resultado = $stmt->fetch(PDO::FETCH_ASSOC);
        
        if ($resultado) {
            echo "Nome encontrado: " . $resultado['nome'];
        } else {
            echo "Nenhum resultado encontrado para o ID fornecido.";
        }
    }

    public function alterar($id, $novoNome) {
        $sql = "UPDATE clientes SET nome = ? WHERE id = ?";
        $stmt = $this->conn->prepare($sql);
        
        if ($stmt->execute([$novoNome, $id])) {
            echo "Informações alteradas com sucesso. Novo nome: " . $novoNome;
        } else {
            echo "Não foi possível realizar a alteração.";
        }
    }

    public function apagar($id) {
        $sql = "DELETE FROM clientes WHERE id = ?";
        $stmt = $this->conn->prepare($sql);
        $stmt->execute([$id]);
        
        if ($stmt->rowCount() > 0) {
            echo "Registro apagado com sucesso.";
        } else {
            echo "Não foi possível apagar. ID inexistente.";
        }
    }
}

// Exemplo de uso
$db = new PDO("mysql:host=localhost;dbname=seu_banco", "usuario", "senha");
$cliente = new Cliente($db);

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (isset($_POST['acao']) && isset($_POST['id'])) {
        $acao = $_POST['acao'];
        $id = $_POST['id'];

        switch ($acao) {
            case 'consultar':
                $cliente->consultar($id);
                break;
            case 'alterar':
                if (isset($_POST['novoNome'])) {
                    $cliente->alterar($id, $_POST['novoNome']);
                } else {
                    echo "É necessário informar um novo nome.";
                }
                break;
            case 'apagar':
                $cliente->apagar($id);
                break;
            default:
                echo "Ação inválida.";
        }
    } else {
        echo "Parâmetros insuficientes.";
    }
}
?>

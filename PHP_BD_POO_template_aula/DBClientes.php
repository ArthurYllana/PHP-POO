<?php

require_once "Database.php";

class DBClientes {
    private $conexao;
    private $tableName = 'clientes';

    public function __construct() {
        $db = new Database('localhost', 'banco_sistema', 'root', '');
        $this->conexao = $db->getConnection();
        $this->createTable();
    }

    public function createTable() {
        try {
            $sql = "CREATE TABLE IF NOT EXISTS " . $this->tableName . " (
                    id INT AUTO_INCREMENT PRIMARY KEY,
                    nome VARCHAR(255) NOT NULL,
                    CPF VARCHAR(15) NOT NULL,
                    email VARCHAR(255) NOT NULL
                )";
            $this->conexao->exec($sql);
        } catch (PDOException $e) {
            echo "Erro ao criar a tabela: " . $e->getMessage();
        }
    }

    public function create($id, $nome, $CPF, $email) {
        $sql = 'INSERT INTO ' . $this->tableName . ' (id, nome, CPF, email) VALUES (:param1, :param2, :param3, :param4)';
        try {
            $acesso = $this->conexao->prepare($sql);
            $acesso->bindParam(':param1', $id);
            $acesso->bindParam(':param2', $nome);
            $acesso->bindParam(':param3', $CPF);
            $acesso->bindParam(':param4', $email);
            return $acesso->execute();
        } catch (PDOException $erro) {
            echo "Erro ao inserir na tabela Cliente: " . $erro->getMessage();
            return false;
        }
    }

    public function read($id) {
        $sql = "SELECT * FROM " . $this->tableName . " WHERE id = ?";
        $stmt = $this->conexao->prepare($sql);
        $stmt->execute([$id]);
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    public function update($id, $nome, $CPF, $email) {
        $sql = 'UPDATE ' . $this->tableName . ' SET nome = ?, CPF = ?, email = ? WHERE id = ?';
        try {
            $stmt = $this->conexao->prepare($sql);
            return $stmt->execute([$nome, $CPF, $email, $id]);
        } catch (PDOException $erro) {
            echo "Erro ao atualizar o cliente: " . $erro->getMessage();
            return false;
        }
    }

    public function delete($id) {
        $sql = 'DELETE FROM ' . $this->tableName . ' WHERE id = ?';
        try {
            $stmt = $this->conexao->prepare($sql);
            $stmt->execute([$id]);
            return $stmt->rowCount() > 0;
        } catch (PDOException $erro) {
            echo "Erro ao excluir o cliente: " . $erro->getMessage();
            return false;
        }
    }
}
?>

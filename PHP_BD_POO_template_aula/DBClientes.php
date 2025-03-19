<?php

require_once "Database.php";

class DBClientes {
    private $conexao;
    private $tableName = 'clientes';

    public function __construct() {
        // cria a database e conecta ao banco de dados
        $db = new Database('localhost','banco_sistema','root','');
        $this->conexao = $db->getConnection();
        $this->createTable();
    }
    // criar tabela se não existir
    public function createTable() {
        try {
            $sql = "CREATE TABLE IF NOT EXISTS " . $this->tableName . " (
                    id INT AUTO_INCREMENT PRIMARY KEY,
                    nome VARCHAR(255) NOT NULL,
                    CPF VARCHAR(15) NOT NULL,
                    email VARCHAR(255) NOT NULL
                )";
            $this->conexao->exec($sql);
        }
        catch (PDOException $e) {
            echo "Erro ao criar a tabela: " . $e->getMessage();
        }
    }

    public function create($id, $nome, $CPF, $email) {
        // executar INSERT into clientes
        // insert into utilizando parâmetros
        // este método é considerado mais seguro e evita SQL INJECTION
        $sql = 'INSERT INTO ' . $this->tableName . ' (id, nome, CPF, email) VALUES (:param1, :param2, :param3, :param4)';
        try {
            $acesso = $this->conexao->prepare($sql);
            $acesso->bindParam(':param1', $id);
            $acesso->bindParam(':param2', $nome);
            $acesso->bindParam(':param3', $CPF);
            $acesso->bindParam(':param4', $email);
            if ($acesso->execute()) {
                return true;
            }
            else {
                return false;
            }
        }
        catch (PDOException $erro) {
            echo "Erro ao inserir na tabela Cliente: " . $erro->getMessage();
        }
        // return $dados
    }

    public function recovery() {
        // executar SELECT * from clientes
        $sql = 'SELECT * FROM ' . $this->tableName;
        try {
            $acesso = $this->conexao->prepare($sql);
            $acesso->execute();
            return $acesso->fetchAll(PDO::FETCH_ASSOC); // Retorna todos os dados
        }
        catch (PDOException $erro) {
            echo "Erro ao recuperar os dados: " . $erro->getMessage();
        }
        // return $dados
    }

    public function recoveryById($idBusca) {
        // retornar a linha da tabela com id igual ao parametro
        $sql = 'SELECT * FROM ' . $this->tableName . ' WHERE id = :id';
        try {
            $acesso = $this->conexao->prepare($sql);
            $acesso->bindParam(':id', $idBusca);
            $acesso->execute();
            return $acesso->fetch(PDO::FETCH_ASSOC); // Retorna a linha encontrada
        }
        catch (PDOException $erro) {
            echo "Erro ao recuperar o cliente por ID: " . $erro->getMessage();
        }
    }

    public function recoveryByName($nomeBusca) {
        // retornar a linha da tabela com o nome igual
        $sql = 'SELECT * FROM ' . $this->tableName . ' WHERE nome = :nome';
        try {
            $acesso = $this->conexao->prepare($sql);
            $acesso->bindParam(':nome', $nomeBusca);
            $acesso->execute();
            return $acesso->fetchAll(PDO::FETCH_ASSOC); // Retorna as linhas encontradas
        }
        catch (PDOException $erro) {
            echo "Erro ao recuperar o cliente por nome: " . $erro->getMessage();
        }
    }

    public function update($id, $nome, $CPF, $email) {
        // atualiza o ID com os dados do parâmetro - UPDATE
        $sql = 'UPDATE ' . $this->tableName . ' SET nome = :nome, CPF = :CPF, email = :email WHERE id = :id';
        try {
            $acesso = $this->conexao->prepare($sql);
            $acesso->bindParam(':id', $id);
            $acesso->bindParam(':nome', $nome);
            $acesso->bindParam(':CPF', $CPF);
            $acesso->bindParam(':email', $email);
            if ($acesso->execute()) {
                return true;
            }
            else {
                return false;
            }
        }
        catch (PDOException $erro) {
            echo "Erro ao atualizar o cliente: " . $erro->getMessage();
        }
    }

    public function delete($id) {
        // excluir do banco o cliente com id - DELETE
        $sql = 'DELETE FROM ' . $this->tableName . ' WHERE id = :id';
        try {
            $acesso = $this->conexao->prepare($sql);
            $acesso->bindParam(':id', $id);
            if ($acesso->execute()) {
                return true;
            }
            else {
                return false;
            }
        }
        catch (PDOException $erro) {
            echo "Erro ao excluir o cliente: " . $erro->getMessage();
        }
    }
}
?>
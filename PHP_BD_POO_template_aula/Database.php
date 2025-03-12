<?php
class Database {
    private $host = 'localhost';
    private $db_name = 'banco_sistema';
    private $username = 'root';
    private $password = 'root';
    private $DBConn; // conexao com o banco

    public function __construct($servidor, $nomeBanco, $usuario, $senha) {
        $this->host = $servidor;
        $this->db_name = $nomeBanco;
        $this->username = $usuario;
        $this->password = $senha;
    }

        // criar a conexão
        public function getConnection() {
            $this->DBConn = null;
            try {
                // PDO(mysql:host=localhost;dbname=nome_database, "usuario", "senha")
                $this->DBConn = new PDO('"mysql:host=' . $this->host . ';dbname=' . $this->db_name . '","' . $this->username . '","' . $this->password . '"');
                $this->DBConn.exec('set names utf8'); // permitir o uso de caracteres especiais
            }
            catch (PDOException $e) {
                echo "Erro na conexão com o banco de dados." . $e->getMessage();
            }
            return $this->DBConn;
        }    
}
class DBClientes {
    private $conexao; // conexão criada pelo Database -> GetConnect
    private $tableName = 'clientes';

    public function __construct() {
        $db = new Database('localhost', 'banco_sistema', 'root', 'root');
        $this->conexao = $db->GetConnection();
    }

    public function create($id, $nome, $CPF, $email) {
        $comandoSQL = 'insert into' .$this->tableName. 'values(:param1, :param2, :param3, :param4)';
        try{
            $acesso = $this->conexao->prepare(query:$comandoSQL);
            $acesso->bindParam(param: 'param1', var: $id);
            $acesso->bindParam(param: 'param2', var: $nome);
            $acesso->bindParam(param: 'param3', var: $CPF);
            $acesso->bindParam(param: 'param4', var: $email);
            
            if($acesso->execute())
                {return true;}
            else
                {return false;}
        }
        catch (PDOException $erro) {
            echo 'Erro ao inserir na tabela cliente'. $erro->getMessage();
        // executar INSERT into clientes

        // return $dados
        }
    }

    public function recovery() {
        
        // executar SELECT * from clientes

        // return $dados
    }

    public function recoveryById($idBusca) {
        // return a linha da tabela com id igual ao parametro
    }

    public function recoveryByName($nomeBusca) {
        // retorna a linha da tabela com o nome igual
    }

    public function update($id, $nome, $CPF, $email) {
        // atualiza o ID com os dados do paramentro - UPDATE
    }

    public function delete($id) {
        // excluir do banco o cliente com id - DELETE
    }
}


?>
<?php

class Database // A classe Database é responsável por estabelecer uma conexão com o banco de dados MySQL usando PDO (PHP Data Objects).
{
    private $host = "localhost"; // Endereço do servidor do banco de dados
    private $port = "3306"; // porta do SQL
    private $db = "bd_investimentos"; // nome do banco de dados
    private $user = "root"; // nome do usuário do banco de dados
    private $pass = ""; // senha do banco de dados
    private $pdo; // variável que armazenará a conexão com o banco de dados

    public function connect() // método responsável por criar e retornar a conexão com o banco de dados
    {
        if (!$this->pdo) { // verifica se a conexão já existe. Isso evita criar múltiplas conexões desnecessárias. Se a conexão ainda não foi estabelecida, ele cria uma
            try {
                // mysql:host=localhost;port=3306;dbname=bolsa_de_valores
                $dns = "mysql:host={$this->host};port={$this->port};dbname={$this->db}"; // monta a string de conexão
                $this->pdo = new PDO($dns, $this->user, $this->pass); // cria a conexão com o banco usando PDO
                $this->pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION); // Configura PDO para lançar exceções caso ocorra um erro.
            } catch (\PDOException $th) { // Captura qualquer erro na conexão e exibe uma mensagem.
                die("Erro ao conectar ao banco de dados: " . $th->getMessage()); // mata o script se houver erro
            }
        }

        return $this->pdo; // retorno da conexão
        // Se a conexão foi estabelecida com sucesso, o método retorna o objeto PDO, que poderá ser usado para executar consultas SQL.
    }
}
<?php

class Database // A classe Database é responsável por estabelecer uma conexão com o banco de dados MySQL utilizando PDO (PHP Data Objects).
{
    private $host = "localhost"; // Endereço do servidor do banco de dados (geralmente 'localhost' em ambientes locais)
    private $port = "3306"; // Porta padrão utilizada pelo MySQL
    private $db = "bd_investimentos"; // Nome do banco de dados que será utilizado na conexão
    private $user = "root"; // Nome de usuário com permissões para acessar o banco de dados
    private $pass = ""; // Senha correspondente ao usuário
    private $pdo; // Propriedade que armazenará a instância da conexão PDO

    public function connect() // Método responsável por criar e retornar a conexão com o banco de dados
    {
        // Verifica se a conexão ainda não foi criada. Isso evita múltiplas conexões desnecessárias.
        if (!$this->pdo) {
            try {
                // Monta a DSN (Data Source Name), que define as informações da conexão: tipo de banco, host, porta e nome do banco
                $dns = "mysql:host={$this->host};port={$this->port};dbname={$this->db}";
                
                // Cria uma nova instância de PDO com as credenciais fornecidas
                $this->pdo = new PDO($dns, $this->user, $this->pass);
                
                // Define o modo de erro do PDO para lançar exceções em caso de falhas (mais fácil de debugar)
                $this->pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            } catch (\PDOException $th) {
                // Captura qualquer exceção lançada durante a tentativa de conexão e encerra o script com uma mensagem de erro
                die("Erro ao conectar ao banco de dados: " . $th->getMessage());
            }
        }

        // Retorna o objeto PDO para que ele possa ser utilizado em outras operações com o banco de dados
        return $this->pdo;
    }
}

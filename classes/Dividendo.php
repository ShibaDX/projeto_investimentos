<?php

// Inclui o arquivo 'Database.php', que contém a classe responsável pela conexão com o banco de dados
require_once 'Database.php';

// Define a classe Dividendo, que será usada para manipular os dados da tabela 'dividendos'
class Dividendo
{
    // Propriedade privada que armazenará a conexão com o banco de dados
    private $db;

    // Construtor da classe, executado automaticamente quando um objeto da classe é criado
    public function __construct()
    {
        // Cria uma nova instância da classe Database e obtém a conexão com o banco de dados
        $this->db = (new Database())->connect();
    }

    //Método responsável por adicionar um novo dividendo ao banco de dados.
    public function adicionarDividendo($ativo, $valor, $dataRecebimento)
    {
        // Cria a instrução SQL para inserir os dados na tabela 'dividendos'
        $sql = "INSERT INTO dividendos (ativo, valor, data_recebimento) 
                VALUES (:ativo, :valor, :data_recebimento)";
        
        // Prepara a query para evitar SQL Injection e permitir o uso de parâmetros nomeados
        $query = $this->db->prepare($sql);
        
        // Executa a query substituindo os parâmetros pelos valores recebidos
        $query->execute([
            'ativo' => $ativo,
            'valor' => $valor,
            'data_recebimento' => $dataRecebimento
        ]);
    }
}

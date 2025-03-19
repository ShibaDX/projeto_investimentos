<?php

require_once 'Database.php';

class Compra
{
    private $db; // será usada para armazenar a conexão com o banco de dados, permitindo que a classe execute consultas SQL.


    public function __construct()
    {
        $this->db = (new Database())->connect();
    }

    public function adicionarCompra($ativo, $quantidade, $valorUnitario, $dataCompra) // recebe os dados da compra
    {
        // comando SQL para inserir os dados na tabela compras
        $sql = "INSERT INTO compras (ativo, quantidade, valor_unitario, data_compra) VALUES (:ativo, :quantidade, :valor_unitario, :data_compra)"; // utiliza os placeholders (:ativo, :quantidade) ao invés de valores diretos, o que protege o sistema contra SQL injections
        $query = $this->db->prepare($sql);
        // A conexão $db chama o método prepare(), que prepara a consulta SQL para execução.

        $query->execute([ 
            //os valores reais dos parâmetros são passados para o método execute(),substituindo os placeholders.
            'ativo' => $ativo,
            'quantidade' => $quantidade,
            'valor_unitario' => $valorUnitario,
            'data_compra' => $dataCompra
        ]);
    }
}

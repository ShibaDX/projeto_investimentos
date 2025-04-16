<?php
// Importa o arquivo da classe Database, responsável por estabelecer a conexão com o banco de dados
require_once 'Database.php';

// Define a classe Ativo, responsável por operações relacionadas aos ativos comprados
class Ativo
{
    // Propriedade privada para armazenar a conexão com o banco de dados
    private $db;

    // Construtor da classe: cria a conexão ao instanciar a classe
    public function __construct()
    {
        $this->db = (new Database())->connect();
    }

    /**
     * Calcula o preço médio de cada ativo com base nas compras registradas no banco de dados.
     *
     * O preço médio é calculado pela fórmula:
     * preço_médio = (soma de quantidade * valor_unitário) / (soma da quantidade)
     *
     * @return array Lista de ativos com total de quantidades, valor total investido e preço médio
     */
    public function calcularPrecoMedio()
    {
        /* Query SQL que retorna, para cada ativo:
         - o nome/código do ativo
         - a soma total de quantidades compradas
         - o valor total investido (quantidade * valor unitário) */
        $sql = "SELECT 
                    ativo,
                    SUM(quantidade) as total_quantidade,
                    SUM(quantidade * valor_unitario) as total_valor
                FROM compras 
                GROUP BY ativo";

        // Executa a query diretamente (sem necessidade de parâmetros)
        $query = $this->db->query($sql);

        // Recupera todos os resultados em formato de array associativo
        $ativos = $query->fetchAll(PDO::FETCH_ASSOC);

        // Itera sobre cada ativo para calcular o preço médio
        foreach ($ativos as &$ativo) {
            // Calcula o preço médio dividindo o valor total investido pela quantidade total
            $ativo['preco_medio'] = $ativo['total_valor'] / $ativo['total_quantidade'];
        }

        // Retorna o array de ativos com o preço médio calculado
        return $ativos;
    }
}

<?php

namespace LosYuntas\User\infrastructure;

use LosYuntas\user\domain\Order_record;
use LosYuntas\user\domain\Order_recordRepository;
use PDO;

final class Order_RecordRepositoryMariaDB implements Order_recordRepository
{
    private PDO $connection;
    
    public function __construct(
        string $host, 
        string $database, 
        string $username,
        string $password
    )
    
    {
        $this->connection = new PDO("mysql:host=$host;port=3306;dbname=$database", $username, $password);
        $this->connection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    }

    public function getAll(): ?array
    {
        $sql = 'SELECT 

                worker.rut, 
                worker.name AS trabajador, 
                tool.name AS herramienta, 
                order_record.amount, 
                order_record.order_date, 
                order_record.deadline,
                panolero.name AS panolero, 
                
                state.name AS estado
                FROM order_record 
                INNER JOIN user AS worker ON order_record.worker_id = worker.id 
                INNER JOIN user AS panolero ON order_record.panolero_id = panolero.id 
                INNER JOIN tool ON order_record.tool_id = tool.id 
                INNER JOIN state ON order_record.state_id = state.id';

        $statement = $this->connection->query($sql);
 

        return $statement->fetchAll(PDO::FETCH_ASSOC);
    }



 
}

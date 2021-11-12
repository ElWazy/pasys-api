<?php

namespace LosYuntas\order_record\infrastructure;

use LosYuntas\order_record\domain\OrderRecord;
use LosYuntas\order_record\domain\OrderRecordRepository;
use PDO;

final class OrderRecordRepositoryMariaDB implements OrderRecordRepository
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

    public function getByCriteria(string $criteria): ?array
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
                INNER JOIN state ON order_record.state_id = state.id
                
                WHERE trabajador LIKE :criteria OR
                herramienta LIKE :criteria OR
                order_date LIKE :criteria OR
                panolero LIKE :criteria 
                
                ORDER BY order_record.order_date ASC';

        $statement = $this->connection->prepare($sql);
        $statement->execute([
            'criteria' => "%$criteria%"
        ]);

        return $statement->fetchAll(PDO::FETCH_ASSOC);
    }

    public function getById(int $id): ?array
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
                INNER JOIN state ON order_record.state_id = state.id

                WHERE id = :id
                
                LIMIT 1';

        $statement = $this->connection->prepare($sql);
        $statement->execute([
            'id' => $id
        ]);

        return $statement->fetchAll(PDO::FETCH_ASSOC);
    }

    public function add(OrderRecord $order): void
    {

    }

    public function update(OrderRecord $order): void
    {

    }
 
}
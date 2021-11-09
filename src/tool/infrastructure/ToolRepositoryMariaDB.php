<?php

namespace LosYuntas\tool\infrastructure;

use LosYuntas\tool\domain\Tool;
use LosYuntas\tool\domain\ToolRepository;
use PDO;

final class ToolRepositoryMariaDB implements ToolRepository
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
            tool.id, 
            tool.name, 
            category.name AS category, 
            tool.image, tool.stock_total, 
            tool.stock_actual, 
            tool.is_active 
        FROM tool 
        INNER JOIN category ON tool.category_id = category.id 
        ORDER BY tool.id ASC';

        $statement = $this->connection->query($sql);
 

        return $statement->fetchAll(PDO::FETCH_ASSOC);
    }

    public function getByCriteria(string $criteria): ?array
    {
        $sql = 'SELECT 
            tool.id, 
            tool.name, 
            category.name AS category, 
            tool.image, tool.stock_total, 
            tool.stock_actual, 
            tool.is_active 
        FROM tool 
        INNER JOIN category ON tool.category_id = category.id 
        WHERE tool.name LIKE :criteria OR category.name LIKE :criteria
        ORDER BY tool.id ASC';

        $statement = $this->connection->prepare($sql);
        $statement->execute([
            'criteria' => "%$criteria%"
        ]);

        return $statement->fetchAll(PDO::FETCH_ASSOC);
    }

    public function add(Tool $tool): void
    {
    }

    public function update(Tool $tool): void
    {
    }

    public function remove(int $id): void
    {
    }

}

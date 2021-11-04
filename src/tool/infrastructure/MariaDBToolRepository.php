<?php

namespace LosYuntas\tool\infrastructure;

use LosYuntas\tool\domain\Tool;
use LosYuntas\tool\domain\ToolId;
use LosYuntas\tool\domain\ToolRepository;
use PDO;

final class MariaDBToolRepository implements ToolRepository
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

    public function getByName(string $name): ?array
    {
    }

    public function add(Tool $tool): void
    {
    }

    public function update(Tool $tool): void
    {
    }

    public function remove(ToolId $id): void
    {
    }

}

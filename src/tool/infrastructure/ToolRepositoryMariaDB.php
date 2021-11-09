<?php

namespace LosYuntas\tool\infrastructure;

use LosYuntas\tool\domain\Tool;
use LosYuntas\tool\domain\ToolCategory;
use LosYuntas\tool\domain\ToolId;
use LosYuntas\tool\domain\ToolImage;
use LosYuntas\tool\domain\ToolIsActive;
use LosYuntas\tool\domain\ToolName;
use LosYuntas\tool\domain\ToolRepository;
use LosYuntas\tool\domain\ToolStock;
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

    public function getAll(): array
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

        $tools = [];
        $result = $statement->fetchAll(PDO::FETCH_ASSOC);
        foreach($result as $row) {
            $id = new ToolId((int) $row['id']);
            $name = new ToolName($row['name']);

            $tools[] = new Tool(
                $id,
                $name,
                new ToolCategory($row['category']),
                new ToolImage($row['image']),
                new ToolStock($row['stock_total'], $row['stock_actual']),
                new ToolIsActive($row['is_active'] == 1)
            );
        }
        echo '<pre>';
        var_dump($tools);
        echo '</pre>';

        return $tools;
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

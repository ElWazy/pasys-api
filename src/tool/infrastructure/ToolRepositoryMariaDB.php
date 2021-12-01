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
        WHERE tool.is_active = 1
        ORDER BY tool.id ASC';

        $statement = $this->connection->query($sql);
 
        return $statement->fetchAll(PDO::FETCH_ASSOC);
    }

    public function getAllDeactivated(): ?array
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
        WHERE tool.is_active = 0
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
        WHERE tool.name LIKE :criteria OR 
            category.name LIKE :criteria AND
            tool.is_active = 1
        ORDER BY tool.id ASC';

        $statement = $this->connection->prepare($sql);
        $statement->execute([
            'criteria' => "%$criteria%"
        ]);

        return $statement->fetchAll(PDO::FETCH_ASSOC);
    }

    public function statistics(): ?array
    {
        $sql = 'SELECT 
            name, 
            stock_total,
            stock_actual
        FROM tool';

        $statement = $this->connection->query($sql);

        return $statement->fetchAll(PDO::FETCH_ASSOC);
    }

    public function getById(int $id): ?Tool
    {
        $sql = 'SELECT 
            id, 
            name, 
            category_id,
            stock_total,
            stock_actual
        FROM tool 
        WHERE id = :id';

        $statement = $this->connection->prepare($sql);
        $statement->execute([
            'id' => $id
        ]);

        $data = $statement->fetch(PDO::FETCH_ASSOC);

        return new Tool(
            (int) $data['id'],
            $data['name'],
            (int) $data['category_id'],
            null,
            (int) $data['stock_total'],
            (int) $data['stock_actual']
        );
    }

    public function add(Tool $tool): void
    {
        $sql = 'INSERT INTO tool (name, category_id, image, stock_total, stock_actual) 
            VALUES (:name, :category, :image, :stock_total, :stock_total)';

        $statement = $this->connection->prepare($sql);
        $statement->execute([
            'name' => $tool->name(),
            'category' => $tool->categoryId(),
            'image' => $tool->image(),
            'stock_total' => $tool->stockTotal()
        ]);
    }

    public function update(Tool $tool): void
    {
        $sql = 'UPDATE tool SET 
            name = :name, 
            category_id = :category,
            image = :image,
            stock_total = :stock_total,
            stock_actual = :stock_actual
        WHERE id = :id';

        $statement = $this->connection->prepare($sql);
        $statement->execute([
            'name' => $tool->name(),
            'category' => $tool->categoryId(),
            'image' => $tool->image(),
            'stock_total' => $tool->stockTotal(),
            'stock_actual' => $tool->stockActual(),
            'id' => $tool->id()
        ]);
    }

    public function changeStockActual(Tool $tool): void
    {
        $sql = 'UPDATE tool SET 
            stock_actual = :changeStock
        WHERE id = :id';

        $statement = $this->connection->prepare($sql);
        $statement->execute([
            'changeStock' => $tool->stockActual(),
            'id' => $tool->id()
        ]);
    }

    public function remove(int $id): void
    {
        $sql = 'UPDATE tool SET 
            is_active = 0
        WHERE id = :id';

        $statement = $this->connection->prepare($sql);
        $statement->execute([
            'id' => $id
        ]);
    }

    public function activate(int $id): void
    {
        $sql = 'UPDATE tool SET 
            is_active = 1
        WHERE id = :id';

        $statement = $this->connection->prepare($sql);
        $statement->execute([
            'id' => $id
        ]);
    }
}

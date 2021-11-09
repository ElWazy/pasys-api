<?php

namespace LosYuntas\category\infrastructure;

use LosYuntas\category\domain\CategoryRepository;
use LosYuntas\category\domain\Category;
use PDO;

final class CategoryRepositoryMariaDB implements CategoryRepository
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
        $sql = 'SELECT id, name FROM category ORDER BY name ASC';

        $statement = $this->connection->query($sql);
 

        return $statement->fetchAll(PDO::FETCH_ASSOC);
    }

    public function getByName(string $name): ?array
    {
        $sql = 'SELECT id, name FROM category 
        WHERE name LIKE :name
        ORDER BY name ASC';

        $statement = $this->connection->prepare($sql);
        $statement->execute([
            'name' => "%$name%"
        ]);

        return $statement->fetchAll(PDO::FETCH_ASSOC);
    }

    public function add(Category $category): void
    {
        $sql = 'INSERT INTO category (name) VALUES (:name)';

        $statement = $this->connection->prepare($sql);
        $statement->execute([
            'name' => $category->name()
        ]);
    }

    public function remove(int $id): void
    {
        $sql = 'DELETE FROM category WHERE id = :id';

        $statement = $this->connection->prepare($sql);
        $statement->execute([
            'id' => $id
        ]);
    }
}
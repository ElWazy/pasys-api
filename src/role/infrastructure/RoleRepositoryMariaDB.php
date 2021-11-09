<?php

namespace LosYuntas\role\infrastructure;

use LosYuntas\role\domain\RoleRepository;
use LosYuntas\role\domain\Role;
use PDO;

final class RoleRepositoryMariaDB implements RoleRepository
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
        $sql = 'SELECT id, name FROM role ORDER BY name ASC';

        $statement = $this->connection->query($sql);
 

        return $statement->fetchAll(PDO::FETCH_ASSOC);
    }

    public function getByName(string $name): ?array
    {
        $sql = 'SELECT id, name FROM role 
        WHERE name LIKE :name
        ORDER BY name ASC';

        $statement = $this->connection->prepare($sql);
        $statement->execute([
            'name' => "%$name%"
        ]);

        return $statement->fetchAll(PDO::FETCH_ASSOC);
    }

    public function add(Role $role): void
    {
        $sql = 'INSERT INTO role (name) VALUES (:name)';

        $statement = $this->connection->prepare($sql);
        $statement->execute([
            'name' => $role->name
        ]);
    }

    public function remove(int $id): void
    {
        $sql = 'DELETE FROM role WHERE id = :id';

        $statement = $this->connection->prepare($sql);
        $statement->execute([
            'id' => $id
        ]);
    }
}
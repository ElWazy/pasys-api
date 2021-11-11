<?php

namespace LosYuntas\User\infrastructure;

use LosYuntas\user\domain\User;
use LosYuntas\user\domain\UserRepository;
use PDO;

final class UserRepositoryMariaDB implements UserRepository
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
        $sql = 'SELECT id, name , rut, is_active, role_id FROM user ORDER BY name ASC';

        $statement = $this->connection->query($sql);
 

        return $statement->fetchAll(PDO::FETCH_ASSOC);
    }

    
    public function getByName(string $name): ?array
    {
        $sql = 'SELECT id, name , rut, is_active, role_id FROM user 
        WHERE name LIKE :name
        ORDER BY name ASC';

        $statement = $this->connection->prepare($sql);
        $statement->execute([
            'name' => "%$name%"
        ]);

        return $statement->fetchAll(PDO::FETCH_ASSOC);
    }


    public function add(User $user): void
    {
        $sql = 'INSERT INTO user (name), (password), (rut), (role_id) VALUES (:name), (:password), (:rut), (:role_id)';

        $statement = $this->connection->prepare($sql);
        $statement->execute([

            'name' => $category->name(),
            'password' => $category->password(),
            'rut' => $category->rut(),
            'role_id' => $category->role_id()

        ]);
    }

    public function remove(int $id): void
    {
        $sql = 'DELETE FROM user WHERE id = :id';

        $statement = $this->connection->prepare($sql);
        $statement->execute([
            'id' => $id
        ]);
    }

    public function update(User $user): void
    {
        $sql = 'DELETE FROM user WHERE id = :id';

        $statement = $this->connection->prepare($sql);
        $statement->execute([
            'id' => $id
        ]);
    }

    public function getByCriteria(string $criteria):  ?array
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



}

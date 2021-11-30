<?php

namespace LosYuntas\user\infrastructure;

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

    public function login(string $rut, string $password): int
    {
        $sql = 'SELECT 
            id 
        FROM user 
        WHERE rut = :rut AND
            password = SHA2(:password, 224) AND
            role_id = 2 AND
            is_active = 1
        ORDER BY name ASC
        LIMIT 1';

        $statement = $this->connection->prepare($sql);
        $statement->execute([
            'rut' => $rut,
            'password'=> $password
        ]);

        $id = $statement->fetchAll(PDO::FETCH_ASSOC);

        return (int) $id[0]['id'];
    }

    public function getAll(): ?array
    {
        $sql = 'SELECT 
            user.id, 
            user.name, 
            user.rut, 
            user.is_active, 
            role.name AS role 
            FROM user 
            INNER JOIN role ON user.role_id = role.id 
            ORDER BY name ASC';

        $statement = $this->connection->query($sql);
 

        return $statement->fetchAll(PDO::FETCH_ASSOC);
    }
    
    public function statistics(): ?array
    {
        $sql = 'SELECT 
            role.name, 
            COUNT(user.role_id) AS count 
        FROM role 
        INNER JOIN user ON role.id = user.role_id 
        GROUP BY role.name';

        $statement = $this->connection->query($sql);

        return $statement->fetchAll(PDO::FETCH_ASSOC);
    }
    
    public function getByCriteria(string $criteria): ?array
    {
        $sql = 'SELECT 
            user.id, 
            user.name, 
            user.rut, 
            user.is_active, 
            role.name AS role
        FROM user 
        INNER JOIN role ON user.role_id = role.id 
        WHERE user.name LIKE :name OR 
            user.rut LIKE :name OR
            role.name LIKE :name AND
            user.is_active = 1
        ORDER BY name ASC';

        $statement = $this->connection->prepare($sql);
        $statement->execute([
            'name' => "%$criteria%"
        ]);

        return $statement->fetchAll(PDO::FETCH_ASSOC);
    }

    public function getByRut(string $rut): ?User
    {
        $sql = 'SELECT 
            id, 
            name,
            rut,
            password,
            role_id,
            is_active
        FROM user 
        WHERE rut = :rut AND
            is_active = 1
        ORDER BY name ASC
        LIMIT 1';

        $statement = $this->connection->prepare($sql);
        $statement->execute([
            'rut' => $rut
        ]);

        $data = $statement->fetch(PDO::FETCH_ASSOC);

        if (!$data) {
            return null;
        }

        return new User(
            (int) $data['id'],
            $data['name'],
            $data['password'],
            $data['rut'],
            (int) $data['role_id'],
            (int) $data['is_active']
        );
    }

    public function getById(int $id): ?User
    {
        $sql = 'SELECT 
            id,
            name, 
            rut,
            password,
            role_id,
            is_active
        FROM user 
        WHERE id = :id';

        $statement = $this->connection->prepare($sql);
        $statement->execute([
            'id' => $id
        ]);

        $data = $statement->fetch(PDO::FETCH_ASSOC);

        if (!$data) {
            return null;
        }

        return new User(
            (int) $data['id'],
            $data['name'],
            $data['password'],
            $data['rut'],
            (int) $data['role_id'],
            (int) $data['is_active']
        );
    }    

    public function add(User $user): void
    {
        $sql = 'INSERT INTO user (name, password, rut, role_id ) VALUES 
            (:name, SHA2(:password, 224), :rut, :role_id)';
            

        $rutFormateado = "";
        $rut = $user -> rut();
        $rut = preg_replace('/[^k0-9]/i', '', $rut);
        if( strlen($rut) < 10 && strlen($rut) > 8 ){
            $rutf = substr($rut, 0, 2);
            $rutm = substr($rut, 2, 3);
            $rutr = substr($rut, 5, 3);
            if(strpos($rutf , "k") || strpos($rutm , "k") || strpos($rutr , "k") ){
                $rutFormateado = null;
            }
            elseif(strpos($rutf , "K") || strpos($rutm , "K") || strpos($rutr , "K")){

                $rutFormateado = null;
            }
            else
            {
                $ruti = substr($rut, 8);
                $rutFormateado = sprintf("%s.%s.%s-%s", $rutf, $rutm, $rutr, $ruti);
            }   
        }
        else
        {
            $rutFormateado = null;
        }

        $statement = $this->connection->prepare($sql);
        $statement->execute([
            'name' => $user->name(),
            'password' => $user->password(),
            'rut' => $user->rut(),
            'role_id' => $user->role_id()
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

        $sql = 'UPDATE user SET 
        name = :name,
        role_id = :role_id,
        is_active = :is_active
        WHERE id = :id';

        $statement = $this->connection->prepare($sql);
        $statement->execute([

            'name' => $user->name(),
            'role_id' => $user->role_id(),
            'is_active' => $user->is_active(),
            'id' => $user->id()
        ]);
    }


    public function updatePassword(User $user): void
    {

        $sql = 'UPDATE user SET 
        password = SHA2(:password, 224)
        WHERE id = :id';

        $statement = $this->connection->prepare($sql);
        $statement->execute([
            'id' => $user->id(),
            'password' => $user->password()

        ]);
    }
}

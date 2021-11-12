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
        $sql = '';

        $statement = $this->connection->query($sql);
 

        return $statement->fetchAll(PDO::FETCH_ASSOC);
    }



 
}

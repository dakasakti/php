<?php

class Database
{
    public $connection;

    public function __construct($config)
    {
        $dsn = sprintf("%s:host=%s;port=%d;dbname=%s;charset=utf8mb4", $config["DB_CONNECTION"], $config["DB_HOST"], $config["DB_PORT"], $config["DB_DATABASE"]);
        $this->connection = new PDO($dsn, $config["DB_USERNAME"], $config["DB_PASSWORD"], [
            PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC
        ]);
    }

    public function query($value, $param = [])
    {
        $statement = $this->connection->prepare($value);
        $statement->execute($param);

        return $statement;
    }
}

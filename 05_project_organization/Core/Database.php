<?php

namespace Core;

use PDO;

class Database
{
    public $connection;

    protected $statement;

    protected $table;

    protected $column = "SELECT *";

    protected $query;

    protected $params;

    public function __construct($config)
    {
        $dsn = sprintf("%s:host=%s;port=%d;dbname=%s;charset=utf8mb4", $config["DB_CONNECTION"], $config["DB_HOST"], $config["DB_PORT"], $config["DB_DATABASE"]);
        $this->connection = new PDO($dsn, $config["DB_USERNAME"], $config["DB_PASSWORD"], [
            PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC
        ]);
    }

    public function select(...$datas)
    {
        $res = "SELECT ";
        foreach ($datas as $data) {
            $res .= "$data";
            if ($data !== end($datas)) {
                $res .= ", ";
            }
        }

        $this->column = $res;
        return $this;
    }

    public function table($name)
    {
        $this->table = "$name";
        return $this;
    }

    public function where($params)
    {
        $res = !strpos($this->query, "WHERE") ? "WHERE " : " AND ";

        for ($i = 0; $i < count($params); $i++) {
            $res .= key($params) . " = " . ":" . key($params);
            next($params);
            if ($i < count($params) - 1) {
                $res .= " AND ";
            }
        }

        $this->query .= $res;
        $this->params = array_merge(is_null($this->params) ? [] : $this->params, $params);
        return $this;
    }

    protected function query($value, $params = [])
    {
        $this->statement = $this->connection->prepare($value);
        $this->statement->execute($params);
    }

    protected function run($params)
    {
        if (count($params) > 0) {
            $this->where($params);
        }

        $this->query("{$this->column} FROM {$this->table} {$this->query}", $this->params);
    }

    private function values($params)
    {
        $columns = implode(',', array_keys($params));
        $values = implode(',', array_map(function ($val) {
            return ":$val";
        }, array_keys($params)));

        return "($columns) VALUES ($values)";
    }

    public function create($data)
    {
        $this->query("INSERT INTO {$this->table} {$this->values($data)}", $data);
    }

    public function delete($data)
    {
        $this->query("DELETE FROM {$this->table} {$this->query}", $this->params);
    }

    public function get($params = [])
    {
        $this->run($params);
        return $this->statement->fetchAll();
    }

    public function find($params = [])
    {
        $this->run($params);
        $result = $this->statement->fetch();
        if (!$result) {
            Helper::abort();
        }

        return $result;
    }
}

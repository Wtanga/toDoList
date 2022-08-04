<?php


namespace Framework;

use App\MysqlConnection;
use PDO;

class MysqlModel extends Model
{
    protected $table;
    protected $connection;

    public function __construct()
    {
        $this->connection = MysqlConnection::getConnection();
    }

    public function getById($id)
    {
        $query = $this->connection->prepare("SELECT * FROM `{$this->table}` WHERE {$this->getIdField()} = $id");
        $query->execute();
        return $query->fetchAll(PDO::FETCH_CLASS)[0];
    }

    public function updateById($id, $data)
    {
        $dataStr = implode(", ", array_map(function ($k) use ($data) {
            return "`$k` = :$k";
        }, array_keys($data)));

        $query = $this->connection->prepare("UPDATE `{$this->table}` SET {$dataStr} WHERE {$this->getIdField()} = $id");
        foreach ($data as $column => $placeholder) {
            $query->bindValue($column, $placeholder);
        }

        $query->execute();
    }

    public function create($data)
    {
        $columns = implode(", ", array_keys($data));
        $placeholders = implode(", ", array_map(function ($el) {
            return ":$el";
        }, array_keys($data)));

        $query = $this->connection->prepare("INSERT INTO {$this->table} ({$columns}) VALUES ($placeholders)");
        foreach ($data as $column => $placeholder) {
            $query->bindValue($column, $placeholder);
        }

        return $query->execute();
    }

    public function all()
    {
        $query = $this->connection->prepare("SELECT * FROM `{$this->table}` ORDER BY Status DESC");
        $query->execute();

        return $query->fetchAll(PDO::FETCH_CLASS);
    }

    public function getPage($page = 1, $sort = "Status", $order = "DESC")
    {
        $page = 3 * ($page - 1);

        $query = $this->connection->prepare("SELECT * FROM `{$this->table}` ORDER BY {$sort} {$order} LIMIT :page, 3");
        $query->bindValue(":page", $page, PDO::PARAM_INT);
        $query->execute();

        return $query->fetchAll(PDO::FETCH_CLASS);

    }

    public function rowCount()
    {
        $query= $this->connection->prepare("SELECT COUNT(*) as count FROM `{$this->table}`");
        $query->execute();
        $row = $query->fetch();

        return $row['count'];
    }

    public function passwordVerify($data)
    {
        $query = $this->connection->prepare("SELECT * FROM `{$this->table}` WHERE name = :name");
        $query->bindValue(":name", $data['login']);
        $query->execute();

        $hash = $query->fetch()['password'];
        return password_verify($data['password'], $hash);
    }
}

<?php


namespace App;


use PDO;

class MysqlConnection
{
    private static $connection;

    public static function getConnection()
    {
        if (!self::$connection) self::$connection = new PDO('mysql:dbname=todolist;host=localhost', 'root', 'root');
        return self::$connection;
    }

}

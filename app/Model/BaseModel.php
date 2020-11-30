<?php


namespace App\Model;


class BaseModel
{
    private static $connection = null;

    protected static function getConnection()
    {
        if (self::$connection == null) {
            self::$connection = new \PDO('mysql:host=' . DB_HOST . ';dbname=' . DB_NAME, DB_USER, DB_PASSWORD);
        }

        return self::$connection;
    }
}
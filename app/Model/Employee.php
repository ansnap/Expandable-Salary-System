<?php


namespace App\Model;


class Employee extends BaseModel
{
    public static function all()
    {
        $stm = self::getConnection()->query("SELECT * FROM employees");

        return $stm->fetchAll(\PDO::FETCH_OBJ);
    }
}
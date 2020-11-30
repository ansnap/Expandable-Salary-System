<?php


namespace App\Decorator;


class SalaryBase implements SalaryInterface
{
    public $employee;

    public function __construct($employee)
    {
        $this->employee = $employee;
    }

    public function calculateSalary()
    {
        return $this->employee->salary;
    }
}
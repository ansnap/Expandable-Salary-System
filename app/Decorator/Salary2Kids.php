<?php


namespace App\Decorator;


class Salary2Kids extends SalaryDecorator
{
    const BONUS = 0.02;

    public function calculateSalary()
    {
        return $this->employee->kids > 2 ?
            $this->salary->calculateSalary() + $this->employee->salary * self::BONUS :
            $this->salary->calculateSalary();
    }
}
<?php


namespace App\Decorator;


class SalaryTax extends SalaryDecorator
{
    const DEDUCTION = 0.2;

    public function calculateSalary()
    {
        return $this->salary->calculateSalary() - $this->employee->salary * self::DEDUCTION;
    }
}
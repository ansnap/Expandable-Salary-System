<?php


namespace App\Decorator;


class SalaryCompanyCar extends SalaryDecorator
{
    const DEDUCTION = 500;

    public function calculateSalary()
    {
        return $this->employee->company_car ?
            $this->salary->calculateSalary() - self::DEDUCTION :
            $this->salary->calculateSalary();
    }
}
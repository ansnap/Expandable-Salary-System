<?php


namespace App\Decorator;


class SalaryOlder50 extends SalaryDecorator
{
    const BONUS = 0.07;

    public function calculateSalary()
    {
        $age = (new \DateTime($this->employee->birthday))->diff(new \DateTime('now'))->y;

        return $age > 50 ?
            $this->salary->calculateSalary() + $this->employee->salary * self::BONUS :
            $this->salary->calculateSalary();
    }
}
<?php


namespace App\Decorator;


abstract class SalaryDecorator implements SalaryInterface
{
    protected $salary;
    public $employee;

    public function __construct(SalaryInterface $salary)
    {
        $this->salary = $salary;
        $this->employee = $salary->employee;
    }
}
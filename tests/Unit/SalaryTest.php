<?php

use App\Decorator\Salary2Kids;
use App\Decorator\SalaryBase;
use App\Decorator\SalaryCompanyCar;
use App\Decorator\SalaryOlder50;
use App\Decorator\SalaryTax;
use PHPUnit\Framework\TestCase;

class SalaryTest extends TestCase
{
    /**
     * @dataProvider employeeData
     */
    public function testComputedSalaryIsCorrect($birthday, $kids, $company_car, $salary, $computed_salary)
    {
        $employee = (object)compact('birthday', 'kids', 'company_car', 'salary');
        $salary = new SalaryBase($employee);
        $salary = new SalaryTax($salary);
        $salary = new SalaryOlder50($salary);
        $salary = new Salary2Kids($salary);
        $salary = new SalaryCompanyCar($salary);

        $this->assertEquals($salary->calculateSalary(), $computed_salary);
    }

    public function employeeData()
    {
        return [
            ['1994-11-29', 2, 0, 6000, 4800],
            ['1968-05-05', 0, 1, 4000, 2980],
            ['1984-09-14', 3, 1, 5000, 3600],
        ];
    }
}
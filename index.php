<?php

require_once __DIR__ . '/vendor/autoload.php';
require_once __DIR__ . '/db.php';

use App\Decorator\Salary2Kids;
use App\Decorator\SalaryBase;
use App\Decorator\SalaryCompanyCar;
use App\Decorator\SalaryOlder50;
use App\Decorator\SalaryTax;
use App\Model\Employee;

foreach (Employee::all() as $employee) {
    $salary = new SalaryBase($employee);
    $salary = new SalaryTax($salary);
    $salary = new SalaryOlder50($salary);
    $salary = new Salary2Kids($salary);
    $salary = new SalaryCompanyCar($salary);

    $computedSalary = $salary->calculateSalary();

    echo
        $employee->name . ' is '
        . (new DateTime($employee->birthday))->diff(new DateTime('now'))->y . ' years old, '
        . $employee->kids . ' kids, '
        . ($employee->company_car ? 'company car, ' : 'no company car, ')
        . 'salary is $' . $employee->salary . '. '
        . '<b>Computed salary: $' . $computedSalary . '</b><br>';
}

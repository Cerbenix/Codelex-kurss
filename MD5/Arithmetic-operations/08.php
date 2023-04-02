<?php

/*
Foo Corporation needs a program to calculate how much to pay their hourly employees.
The US Department of Labor requires that employees get paid time and a half for any hours over 40 that they work
in a single week. For example, if an employee works 45 hours, they get 5 hours of overtime, at 1.5 times their base pay.
The State of Massachusetts requires that hourly employees be paid at least $8.00 an hour.
Foo Corp requires that an employee not work more than 60 hours in a week.
 */

function AddEmployee(string $name, int $basePay, int $hours)
{
  $employee = new stdClass();
  $employee->name = $name;
  $employee->basePay = $basePay;
  $employee->hours = $hours;
  return $employee;
}

$employeeList = [
  AddEmployee('John', 750, 35),
  AddEmployee('Paul', 820, 47),
  AddEmployee('Linda', 1000, 73),
];

$normalHours = 40;
$minRate = 800;
$maxHours = 60;

function WageChecker(int $hours, int $rate, string $name): void
{
  global $normalHours, $minRate, $maxHours, $payment;
  if ($rate < $minRate) {
    echo "$name's hourly rate is too small must be at least $8.00";
    return;
  }
  $payment = $hours * $rate;
  if ($hours > $normalHours && $hours < $maxHours) {
    $payment += ($hours - $normalHours) * $rate * 1.5;
    $paymentConvert = number_format(($payment / 100), 2);
    echo "$name's wage is $$paymentConvert";
  } elseif ($hours > $maxHours)
    echo "$name has worked for more than 60h.";
}

function Wages(array $worker)
{
  global $employeeList;
  foreach ($employeeList as $employee) {
    echo PHP_EOL;
    WageChecker($employee->hours, $employee->basePay, $employee->name);
  }
}

Wages($employeeList);
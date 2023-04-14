<?php declare(strict_types=1);

require_once 'Data.php';

$CurrDate = new Date('05', '30', '2022');
echo $CurrDate->getDay() . 'app.php/';
echo $CurrDate->getMonth() . 'app.php/';
echo $CurrDate->getYear() . PHP_EOL;

$CurrDate->setDay('06');
$CurrDate->setMonth('04');
$CurrDate->setYear('2023');

$CurrDate->DisplayDate();

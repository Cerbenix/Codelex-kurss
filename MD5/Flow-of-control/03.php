<?php declare(strict_types=1);

//Write a program that reads a positive integer and count the number of digits the number has.

$number = (int)readline('Input a number: ');

$count = strlen(strval($number));

echo "Number: $number Digit count: $count";

//Option Nr.2

$number = readline('Input a number: ');

$count = strlen($number);

echo "Number: $number Digit count: $count";

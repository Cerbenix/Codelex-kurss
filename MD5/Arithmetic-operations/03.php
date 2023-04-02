<?php

/*
Write a program to produce the sum of 1, 2, 3, ..., to 100. Store 1 and 100 in variables lower bound and upper
bound, so that we can change their values easily. Also compute and display the average. The output shall look like:
 */

$upperBound = 100;
$lowerBound = 1;

function Calculate(int $smallerNum, int $biggerNum): void
{
  $sum = array_sum(range($smallerNum, $biggerNum));
  $average = $sum / $biggerNum;
  echo "The sum of $smallerNum to $biggerNum is $sum" . PHP_EOL;
  echo "The average is $average";
}

Calculate($lowerBound, $upperBound);
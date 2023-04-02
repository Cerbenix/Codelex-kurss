<?php declare(strict_types=1);

$numbers = [
  1789, 2035, 1899, 1456, 2013,
  1458, 2458, 1254, 1472, 2365,
  1456, 2165, 1457, 2456
];

//todo
echo "Original numeric array: ";
foreach ($numbers as $num) {
  echo $num . '; ';
}

echo PHP_EOL;

//todo
echo "Sorted numeric array: ";
$sortedNumbers = [...array_values($numbers)];
sort($sortedNumbers);
foreach ($sortedNumbers as $num) {
  echo $num . '; ';
}

echo PHP_EOL;

$words = [
  "Java",
  "Python",
  "PHP",
  "C#",
  "C Programming",
  "C++"
];

//todo
echo "Original string array: ";
foreach ($words as $word) {
  echo $word . '; ';
}
echo PHP_EOL;

//todo
echo "Sorted string array: ";
$sortedWords = [...array_values($words)];
sort($sortedWords);
foreach ($sortedWords as $word) {
  echo $word . '; ';
}
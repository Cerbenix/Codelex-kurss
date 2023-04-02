<?php

/*
Write a program called coza-loza-woza.php which prints the numbers 1 to 110, 11 numbers per line.
The program shall print "Coza" in place of the numbers which are multiples of 3, "Loza" for multiples of 5,
"Woza" for multiples of 7, "CozaLoza" for multiples of 3 and 5, and so on. The output shall look like:
 */
$low = 1;
$high = 1;
$entriesOnLine = 11;
for ($lines = 1; $lines < $entriesOnLine; $lines++) {
  $high += $entriesOnLine;
  for ($i = $low; $i < $high; $i++) {
    if ($i % 3 == 0 && $i % 5 == 0 && $i % 7 == 0) {
      echo 'CozaLozaWoza';
    } elseif ($i % 3 == 0 && $i % 5 == 0) {
      echo 'CozaLoza';
    } elseif ($i % 3 == 0 && $i % 7 == 0) {
      echo 'CozaWoza';
    } elseif ($i % 5 == 0 && $i % 7 == 0) {
      echo 'WozaLoza';
    } elseif ($i % 7 == 0) {
      echo 'Woza';
    } elseif ($i % 5 == 0) {
      echo 'Loza';
    } elseif ($i % 3 == 0) {
      echo 'Coza';
    } else {
      echo $i;
    }
  }
  $low += $entriesOnLine;
  echo PHP_EOL;
}
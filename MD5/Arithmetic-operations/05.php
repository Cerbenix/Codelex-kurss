<?php

/*
Write a program that picks a random number from 1-100. Give the user a chance to guess it. If they get it right,
tell them so. If their guess is higher than the number, say "Too high." If their guess is lower than the number,
say "Too low." Then quit. (They don't get any more guesses for now.)
 */

$low = 1;
$high = 100;
echo "I'm thinking of a number between $low and $high" . PHP_EOL;
$randNum = rand($low, $high);
$userGuess = readline('Can you guess the number: ');


if ($userGuess > $randNum) {
  echo "Sorry too high. I was thinking of $randNum";
} elseif ($userGuess < $randNum) {
  echo "Sorry too low. I was thinking of $randNum";
} else {
  echo 'You guessed it!';
}
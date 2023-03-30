<?php

$words = [
  'classroom',
  'popcorn',
  'defenestrate',
  'deforestation',
  'engineer'
];

$pickWord = array_rand($words, 1);
$pickedWord = $words[$pickWord];
$playWordSplit = str_split($pickedWord);
$playWord = str_split((str_repeat('_', count($playWordSplit))));

$guesses = 0;

echo 'Lets play *HANGMAN*';
echo PHP_EOL;
echo '**********************';
echo PHP_EOL;

while ($guesses < 3) {

  echo implode($playWord);
  echo PHP_EOL;

  $playerSelection = readline('Please pick a letter:');
  $playerSelectionIndex = array_keys($playWordSplit, $playerSelection);
  if ($playerSelectionIndex[0] > -1) {
    foreach ($playerSelectionIndex as $index) {
      $playWord[$index] = $playerSelection;
    }
  } else {
    $guesses++;
  }

  if ($playWord == $playWordSplit) {
    echo "Correct, your word is - $pickedWord";
    echo PHP_EOL;
    echo 'You Win';
    exit;
  }
}
echo "Your word was - $pickWord";
echo PHP_EOL;
echo 'You Lose';
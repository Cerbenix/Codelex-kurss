<?php declare(strict_types=1);


$paper = new stdClass();
$paper->title = 'Paper';
$paper->beats = [];

$rock = new stdClass();
$rock->title = 'Rock';
$rock->beats = [];

$scissors = new stdClass();
$scissors->title = 'Scissors';
$scissors->beats = [];

$lizard = new stdClass();
$lizard->title = 'Lizard';
$lizard->beats = [];

$spock = new stdClass();
$spock->title = 'Spock';
$spock->beats = [];

$dynamite = new stdClass();
$dynamite->title = 'Dynamite';
$dynamite->beats = [];

array_push($paper->beats, $rock->title, $spock->title);

array_push($rock->beats, $scissors->title, $lizard->title);

array_push($scissors->beats, $paper->title, $lizard->title);

array_push($lizard->beats, $paper->title, $spock->title);

array_push($spock->beats, $scissors->title, $rock->title);

array_push(
  $dynamite->beats,
  $paper->title,
  $scissors->title,
  $rock->title,
  $spock->title,
  $lizard->title
);

$playElements = [
  "Rock" => $rock,
  "Paper" => $paper,
  "Scissors" => $scissors,
  "Lizard" => $lizard,
  "Spock" => $spock,
  'Dynamite' => $dynamite
];

$repeat = 1;

while ($repeat == 1) {

  $pcSelection = array_rand($playElements, 1);

  echo "Welcome to Rock Paper Scissors Lizard Spock";
  echo PHP_EOL;
  echo '-------------------------------';
  echo PHP_EOL;

  foreach ($playElements as $element) {
    echo "$element->title" . PHP_EOL;
  }

  echo '-------------------------------';
  echo PHP_EOL;

  $playerSelection = null;

  while ($playerSelection == null) {

    $playerSelection = readline('Please choose your hero element:');

    if (!array_key_exists($playerSelection, $playElements)) {
      echo 'Invalid element, try again' . PHP_EOL;
      $playerSelection = null;
    }
  }

  if ($pcSelection == $playerSelection) {
    echo "--------->It's a draw!<---------";
  } else {
    if (in_array($playerSelection, $playElements[$pcSelection]->beats)) {
      echo "--------->You lose!<---------";
    } else {
      echo "--------->You win!<---------";
    }
  }

  echo PHP_EOL;

  $repeatSelection = 'y';

  $repeatSelection = readline("Do you want to play again(Y/N)?:");

  if ($repeatSelection == 'N' || $repeatSelection == 'n') {
    return $repeat = 0;
  }
}





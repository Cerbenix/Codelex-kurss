<?php

//Symbols
function addGameSymbol($symbol, $worth)
{
  $element = new stdClass();
  $element->symbol = $symbol;
  $element->worth = $worth;
  return $element;
}

$gameSymbols = [
  addGameSymbol('A ', 10),
  addGameSymbol('K ', 9),
  addGameSymbol('Q ', 8),
  addGameSymbol('J ', 7),
  addGameSymbol('10', 6),
];

$playerCash = 100;
$repeat = 1;

while ($repeat == 1) {
  $playerCash--;
  //Board
  $rows = 3;
  $columns = 4;

  $board = [];
  for ($row = 0; $row < $rows; $row++) {
    for ($index = 0; $index < $columns; $index++) {
      $randKey = array_rand($gameSymbols);
      $board[$row][$index] = array_rand($gameSymbols);
    }
  }
  //Winning lines
  $winningLines = [
    //Straight lines
    [$board[0][0], $board[0][1], $board[0][2], $board[0][3]],
    [$board[1][0], $board[1][1], $board[1][2], $board[1][3]],
    [$board[2][0], $board[2][1], $board[2][2], $board[2][3]],
    //X-lines
    [$board[0][0], $board[1][1], $board[2][2], $board[2][3]],
    [$board[2][0], $board[1][1], $board[0][2], $board[0][3]],
    [$board[0][0], $board[0][1], $board[1][2], $board[2][3]],
    [$board[2][0], $board[2][1], $board[1][2], $board[0][3]]
  ];

  foreach ($board as $row) {
    echo PHP_EOL;
    for ($i = 0; $i < count($row); $i++) {
      echo "|{$gameSymbols[$row[$i]]->symbol}";
    }
  }

  echo PHP_EOL;

  for ($i = 0; $i < count($winningLines); $i++) {
    if (count(array_unique($winningLines[$i])) === 1) {
      echo "Congratulations you got '{$gameSymbols[$winningLines[$i][0]]->symbol}' in a line!" . PHP_EOL;
      echo "You win {$gameSymbols[$winningLines[$i][0]]->worth} credits!" . PHP_EOL;
      $playerCash += $gameSymbols[$winningLines[$i][0]]->worth;
    }
  }

  echo "You have $playerCash credits" . PHP_EOL;

  if ($playerCash <= 0) {
    echo "House always wins :)";
    exit;
  }
  $repeatSelection = 'y';
  $repeatSelection = readline("Do you want to play again(Y/N)?:");
  if ($repeatSelection == 'N' || $repeatSelection == 'n') {
    return $repeat = 0;
  }
}
<?php

$TTT = new stdClass();
$TTT->turn = 'X';
$TTT->board = [['*','*','*'],['*','*','*'],['*','*','*']];
$TTT->result = '*';

$allCells = array_merge(...$TTT->board);

echo "Lets play Tik Tac Toe";
echo PHP_EOL;
echo '*********************';

while($TTT->result == '*') {

  foreach ($TTT->board as $row) {
    echo PHP_EOL;
    foreach ($row as $cell) {
      echo "$cell  ";
    }
  }
  echo PHP_EOL;
  echo "It's $TTT->turn's turn";
  echo PHP_EOL;

    //Read user input
  $playerSelection = readline(
    'Please select a cell by typing 0, 1, 2 corresponding to the row and 0, 1, 2 corresponding to the column: ');
  [$row, $column] = explode(' ', $playerSelection);

    //Determine if user input is valid and change board value
  if ($TTT->board[$row][$column] == '*') {
    $TTT->board[$row][$column] = $TTT->turn;

    //Change active player
    if ($TTT->turn == 'O') {
      $TTT->turn = 'X';
    } else {
      $TTT->turn = 'O';
    }
  } else {
    echo PHP_EOL;
    echo "Invalid input. Try again";
  }

  //Determine winner
  $cell = $TTT->board;

  $combinations = [
    //Rows
    [[0, 0], [0, 1], [0, 2]],
    [[1, 0], [1, 1], [1, 2]],
    [[2, 0], [2, 1], [2, 2]],
    //Columns
    [[0, 0], [1, 0], [2, 0]],
    [[0, 1], [1, 1], [2, 1]],
    [[0, 2], [1, 2], [2, 2]],
    //Diagonals
    [[0, 0], [1, 1], [2, 2]],
    [[2, 0], [1, 1], [0, 2]],
  ];

  foreach($combinations as $combo) {
    $valueArray = [];
    foreach ($combo as $value) {
      [$row, $column] = $value;
      $valueArray[] .= $TTT->board[$row][$column];
    }
    if (count(array_unique($valueArray)) == 1 && array_unique($valueArray) != '*') {
      $TTT->result = implode(array_unique($valueArray));
      break;
    } elseif (!in_array('*', $allCells)) {
      $TTT->result = 'D';
    }
  }

}

if($TTT->result == 'X' || $TTT->result == 'O'){
  echo PHP_EOL;
  echo "The winner is $TTT->result!";
} elseif($TTT->result == 'D'){
  echo PHP_EOL;
  echo "It's a draw!";
}
    //Print final board and result
foreach ($TTT->board as $row) {
  echo PHP_EOL;
  foreach ($row as $cell) {
    echo "$cell  ";
  }
}


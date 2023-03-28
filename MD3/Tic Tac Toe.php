<?php

$TTT = new stdClass();
$TTT->turn = 'X';
$TTT->board = [['*','*','*'],['*','*','*'],['*','*','*']];
$TTT->result = '-';

$allCells = array_merge($TTT->board[0], $TTT->board[1], $TTT->board[2]);

echo "Lets play Tik Tac Toe";
echo PHP_EOL;
echo '*********************';

while($TTT->result == '-') {

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
  $playerSelectionIndex = explode(' ', $playerSelection);

    //Determine if user input is valid and change board value
  if ($TTT->board[$playerSelectionIndex[0]][$playerSelectionIndex[1]] == '*') {
    $TTT->board[$playerSelectionIndex[0]][$playerSelectionIndex[1]] = $TTT->turn;

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
  //Rows
  if ($cell[0][0] == $cell[0][1] && $cell[0][1] == $cell[0][2] && $cell[0][0] != '*') {
    $TTT->result = $cell[0][0];
  }
  if ($cell[1][0] == $cell[1][1] && $cell[1][1] == $cell[1][2] && $cell[1][0] != '*') {
    $TTT->result = $cell[1][0];
  }
  if ($cell[2][0] == $cell[2][1] && $cell[2][1] == $cell[2][2] && $cell[2][0] != '*') {
    $TTT->result = $cell[2][0];
  }
  //Columns
  if ($cell[0][0] == $cell[1][0] && $cell[1][0] == $cell[2][0] && $cell[0][0] != '*') {
    $TTT->result = $cell[0][0];
  }
  if ($cell[0][1] == $cell[1][1] && $cell[1][1] == $cell[2][1] && $cell[0][1] != '*') {
    $TTT->result = $cell[0][1];
  }
  if ($cell[0][2] == $cell[1][2] && $cell[1][2] == $cell[2][2] && $cell[0][2] != '*') {
    $TTT->result = $cell[0][2];
  }
  //Diagonals
  if ($cell[0][0] == $cell[1][1] && $cell[1][1] == $cell[2][2] && $cell[0][0] != '*') {
    $TTT->result = $cell[0][0];
  }
  if ($cell[0][2] == $cell[1][1] && $cell[1][1] == $cell[2][0] && $cell[0][2] != '*') {
    $TTT->result = $cell[0][2];
  }
  elseif (!in_array('*', $allCells)) {
    $TTT->result = 'D';
  }

  if (!in_array('*', $allCells)) {
    $TTT->result = 'D';
  }
}
    //Print final board and result
foreach ($TTT->board as $row) {
  echo PHP_EOL;
  foreach ($row as $cell) {
    echo "$cell  ";
  }
}
if($TTT->result == 'X' || $TTT->result == 'O'){
    echo PHP_EOL;
    echo "The winner is $TTT->result!";
} elseif($TTT->result == 'D'){
    echo PHP_EOL;
    echo "It's a draw!";
}

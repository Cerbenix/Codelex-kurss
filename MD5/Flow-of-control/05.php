<?php

/*
On your phone keypad, the alphabets are mapped to digits as follows: ABC(2), DEF(3), GHI(4), JKL(5), MNO(6), PQRS(7), TUV(8), WXYZ(9).

Write a program called PhoneKeyPad, which prompts user for a String (case insensitive), and converts to a sequence of keypad digits.

Use:

a "nested-if" statement
a "switch-case-default" statement
Hint: In switch-case, you can handle multiple cases by omitting the break statement, e.g.,
 */


$userInput = str_split(strtolower(readline('Input a string: ')));
$convertedToNumbers = [];
$keyPad = new stdClass();
$keyPad->two = ['a', 'b', 'c'];
$keyPad->three = ['d', 'e', 'f'];
$keyPad->four = ['g', 'h', 'i'];
$keyPad->five = ['j', 'k', 'l'];
$keyPad->six = ['m', 'n', 'o'];
$keyPad->seven = ['p', 'q', 'r', 's'];
$keyPad->eight = ['t', 'u', 'v'];
$keyPad->nine = ['w', 'x', 'y', 'z'];

if ($userInput[0] != '') {
  foreach ($userInput as $char) {
    switch ($char) {
      case in_array($char, $keyPad->two):
        for ($letter = -1; $letter < array_search($char, $keyPad->two); $letter++) {
          $convertedToNumbers[] .= 2;
        }
        break;
      case in_array($char, $keyPad->three):
        for ($letter = -1; $letter < array_search($char, $keyPad->three); $letter++) {
          $convertedToNumbers[] .= 3;
        }
        break;
      case in_array($char, $keyPad->four):
        for ($letter = -1; $letter < array_search($char, $keyPad->four); $letter++) {
          $convertedToNumbers[] .= 4;
        }
        break;
      case in_array($char, $keyPad->five):
        for ($letter = -1; $letter < array_search($char, $keyPad->five); $letter++) {
          $convertedToNumbers[] .= 5;
        }
        break;
      case in_array($char, $keyPad->six):
        for ($letter = -1; $letter < array_search($char, $keyPad->six); $letter++) {
          $convertedToNumbers[] .= 6;
        }
        break;
      case in_array($char, $keyPad->seven):
        for ($letter = -1; $letter < array_search($char, $keyPad->seven); $letter++) {
          $convertedToNumbers[] .= 7;
        }
        break;
      case in_array($char, $keyPad->eight):
        for ($letter = -1; $letter < array_search($char, $keyPad->eight); $letter++) {
          $convertedToNumbers[] .= 8;
        }
        break;
      case in_array($char, $keyPad->nine):
        for ($letter = -1; $letter < array_search($char, $keyPad->nine); $letter++) {
          $convertedToNumbers[] .= 9;
        }
        break;
      case is_numeric($char):
        break;
      default:
        $convertedToNumbers[] .= 0;
    }
  }
}
echo implode($convertedToNumbers);
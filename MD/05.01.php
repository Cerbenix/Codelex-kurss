<?php

/*
Exercise 1
Create a function that accepts any string and returns the same value with added "codelex" by the end of it. Print this value out.
 */

$anyString = 'L2Code with';

function addCodelex($string){
  return "$string Codelex";
}

echo addCodelex($anyString);
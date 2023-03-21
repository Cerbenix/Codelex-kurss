<?php

/*
 * Exercise 4
Create a array of objects that uses the function of exercise 3 but in loop printing out if the person has reached age of 18.
 */

$people =[
  [
    "name" => "John",
    "surname" => "Doe",
    "age" => 50,
    "birthday" => 'March 3rd'
  ], [
    "name" => "Peter",
    "surname" => "Pan",
    "age" => 17,
    "birthday" => 'May 7th'
  ]
];
function checkIfOver18 ($person){
  if ($person['age'] >= 18){
    echo 'Person has reached the age of 18';
  } else {
    echo 'Person has NOT reached the age of 18';
  }
}

foreach ($people as $person){
  checkIfOver18($person);
  echo PHP_EOL;
}

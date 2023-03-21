<?php

/*
 * Exercise 3
Create a person object with name, surname and age. Create a function that will determine if the person has reached 18 years of age.
Print out if the person has reached age of 18 or not.
 */
$person = [
  "name" => "John",
  "surname" => "Doe",
  "age" => 50
];

function checkIfOver18 ($personToCheck){
  if ($personToCheck['age'] >= 18){
    echo 'Person has reached the age of 18';
  } else {
    echo 'Person has NOT reached the age of 18';
  }
}

checkIfOver18($person);
<?php

/*
Exercise 5
Create an associative array with objects of multiple persons.
Each person should have a name, surname, age and birthday. Using loop (by your choice) print out every persons personal data.
 */

$johnDoe = new stdClass();
$johnDoe->name = "John";
$johnDoe->surname = "Doe";
$johnDoe->age = 50;
$johnDoe->birthday = 'March 3rd';

$peterPan = new stdClass();
$peterPan->name = "Peter";
$peterPan->surname = "Pan";
$peterPan->age = 55;
$peterPan->birthday = 'May 7th';

$people = [$johnDoe, $peterPan];

foreach ($people as $person){
  echo "$person->name $person->surname $person->age $person->birthday";
  echo PHP_EOL;
}
<?php

/*
 *Exercise 7**
Imagine you own a gun store. Only certain guns can be purchased with license types.
Create an object (person) that will be the requester to purchase a gun (object) Person object has a name, valid licenses (multiple) & cash.
Guns are objects stored within an array. Each gun has license letter, price & name.
Using PHP in-built functions determine if the requester (person) can buy a gun from the store.
 */

$person = new stdClass();
$person->name ="John";
$person->licenses = ['a','b'];
$person->cash = 10000;


function createGun(string $name, int $price, string $license): stdClass{
  $weapon = new stdClass();
  $weapon->name = $name;
  $weapon->price = $price;
  $weapon->license = $license;

  return $weapon;
}

$gunList = [
  'AR' => createGun('AK-47',30000, 'c'),
  'HG' => createGun('Glock 9mm',9000, 'a'),
  'SG' => createGun('M1897',12000, 'b')
];

$cash = $person->cash / 100;
$licenses = implode(',',$person->licenses);

echo "Welcome, $person->name $($cash) [$licenses]";
echo PHP_EOL;
echo "---------------------------------------------";
echo PHP_EOL;

foreach ($gunList as $key => $gun){
  $price = $gun->price /100;
  echo "[$key] $gun->name | $ $price | $gun->license" . PHP_EOL;
}

$selectedGun = null;

while($selectedGun == null){

  $selection = readline('Please choose a gun that you would like to buy:');

  if (!array_key_exists($selection, $gunList)){
    echo "Gun not found" . PHP_EOL;
    $selectedGun = null;
    continue;
  }
  $selectedGun = $gunList[$selection];

  if(!in_array($gunList[$selection]->license, $person->licenses)){
    echo 'Invalid license' . PHP_EOL;
    $selectedGun = null;
    continue;
  }

  if($person->cash < $gunList[$selection]->price){
    echo 'Not enough money' . PHP_EOL;
    $selectedGun = null;
  }
}
//Purchase successful
$person->cash -= $selectedGun->price;
$cash = $person->cash / 100;
echo "You have successfully bought {$gunList[$selection]->name}";
echo PHP_EOL;
echo "You have $$cash";


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
$person->cash = 100;

$assaultRifle = new stdClass();
$assaultRifle->licenseLetter = 'c';
$assaultRifle->name = 'AK-47';
$assaultRifle->price = 300;

$handgun = new stdClass();
$handgun->licenseLetter = 'a';
$handgun->name = 'Glock 9mm';
$handgun->price = 90;

$shotgun = new stdClass();
$shotgun->licenseLetter = 'b';
$shotgun->name = 'M1897';
$shotgun->price = 120;

$gunList = [$assaultRifle, $handgun, $shotgun];

foreach($gunList as $gun){
  if(in_array($gun->licenseLetter,$person->licenses) && $gun->price <= $person->cash){
    echo "$person->name can buy $gun->name";
  }
}

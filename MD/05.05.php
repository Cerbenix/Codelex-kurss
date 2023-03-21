<?php

/*
 * Exercise 5
Create a 2D associative array in 2nd dimension with fruits and their weight.
Create a function that determines if fruit has weight over 10kg. Create a secondary array with shipping costs per weight.
Meaning that you can say that over 10 kg shipping costs are 2 euros, otherwise its 1 euro.
Using foreach loop print out the values of the fruits and how much it would cost to ship this product.
 */

$shoppingCart = [
  'fruit'=>[
    'apple' => 5,
    'orange' => 6,
    'watermelon'=>15
  ]
];


function determineShippingCosts($shoppingCartList){
  $shippingCosts = [
    'over10'=>2,
    'under10'=>1
  ];
  foreach($shoppingCartList['fruit'] as $fruitName=>$fruitWeight){
    if ($fruitWeight > 10){
      echo "$fruitName weighs $fruitWeight kg - Shipping: {$shippingCosts['over10']} euro";
      echo PHP_EOL;
    }else{
      echo "$fruitName weighs $fruitWeight kg - Shipping: {$shippingCosts['under10']} euro";
      echo PHP_EOL;
    }
  }
}

determineShippingCosts($shoppingCart);
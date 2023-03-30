<?php

function addProduct($name, $price)
{
  $product = new stdClass();
  $product->name = $name;
  $product->price = $price;
  return $product;
}

$productList = [
  addProduct('Coffee', 159),
  addProduct('Hot Chocolate', 138),
  addProduct('Tea', 93)
];

foreach ($productList as $key => $product) {
  echo "[$key] | $product->name | Price:$product->price" . PHP_EOL;
}

while ($userSelection == '') {
  $userSelection = readline('Please select your drink: ');
  if (!array_key_exists($userSelection, $productList)) {
    echo "Invalid selection, please type in the number corresponding to a drink." . PHP_EOL;
    $userSelection = '';
  }
}
$insertedCoins = 0;
$coinList = [200, 100, 50, 20, 10, 5, 2, 1];
while ($insertedCoins < $productList[$userSelection]->price) {
  $insertedCoin = (int)readline('Please insert a coin: ');
  if (!in_array($insertedCoin, $coinList)) {
    echo "Not a coin, please insert one of the following: 1, 2, 5, 10, 20, 50, 100, 200" . PHP_EOL;
    continue;
  }
  $insertedCoins += $insertedCoin;
}

$remainder = $insertedCoins - $productList[$userSelection]->price;
$givenCoins = [];
foreach ($coinList as $coin) {
  $times = floor($remainder / $coin);
  $remainder -= $coin * $times;
  for ($i = 0; $i < $times; $i++) {
    $givenCoins[] .= $coin;
  }
}
echo "Your change : " . join(';', $givenCoins);
<?php declare(strict_types=1);

require_once 'Main.php';
require_once 'Product.php';

$store = new Main;
$productList = $store->getProducts();

foreach ($productList as $product) {
  echo $product->printProduct() . PHP_EOL;
}

$productList[0]->changePrice(7500);
$productList[1]->changeAmount(10);

echo '-----------Updated----------' . PHP_EOL;

foreach ($productList as $product) {
  echo $product->printProduct() . PHP_EOL;
}
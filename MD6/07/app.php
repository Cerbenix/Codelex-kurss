<?php declare(strict_types=1);

require_once 'Dog.php';

$dogs = [
  $max = new Dog('Max', 'male'),
  $rocky = new Dog('Rocky', 'male'),
  $sparky = new Dog('Sparky', 'male'),
  $buster = new Dog('Buster', 'male'),
  $sam = new Dog('Sam', 'male'),
  $lady = new Dog('Lady', 'female'),
  $molly = new Dog('Molly', 'female'),
  $coco = new Dog('Coco', 'female')
];
$max->setMother($lady);
$max->setFather($rocky);
$coco->setMother($molly);
$coco->setFather($buster);
$rocky->setMother($molly);
$rocky->setFather($sam);
$buster->setMother($lady);
$buster->setFather($sparky);

echo $coco->getFatherName() . PHP_EOL;
echo $sparky->getFatherName() . PHP_EOL;

if ($coco->hasSameMotherAs($rocky)) {
  echo 'Has same mother.';
} else {
  echo 'Does not have same mother.';
}
echo PHP_EOL;
foreach ($dogs as $dog) {
  echo "Name: {$dog->getName()} Gender: {$dog->getSex()}" . PHP_EOL;
}


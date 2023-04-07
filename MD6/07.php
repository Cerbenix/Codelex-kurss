<?php declare(strict_types=1);

/*
The questions in this exercise all deal with a class Dog that you have to program from scratch.

Create a class Dog. Dogs should have a name, and a sex.
Make a class DogTest with a Main method in which you create the following Dogs:
Max, male
Rocky, male
Sparky, male
Buster, male
Sam, male
Lady, female
Molly, female
Coco, female
Change the Dog class so that each dog has a mother and a father.
Add to the main method in DogTest, so that:
Max has Lady as mother, and Rocky as father
Coco has Molly as mother, and Buster as father
Rocky has Molly as mother, and Sam as father
Buster has Lady as mother, and Sparky as father
Change the dog class to include a method fathersName that return the name of the father.
If the father reference is null, return "Unknown". Test in the DogTest main method that it works.
referenceToCoco.FathersName() returns the string "Buster"
referenceToSparky.FathersName() returns the string "Unknown"
Change the dog class to include a method boolean HasSameMotherAs(Dog otherDog).
The method should return true on the call
referenceToCoco.HasSameMotherAs(referenceToRocky). Show that the new method works in the DogTest main method.
 */

class Dog
{
  private string $name;
  private string $sex;
  private ?Dog $mother;
  private ?Dog $father;

  public function __construct(string $name, string $sex)
  {
    $this->name = $name;
    $this->sex = $sex;
    $this->father = null;
    $this->mother = null;
  }

  public function setMother(Dog $mother): void
  {
    $this->mother = $mother;
  }

  public function getFatherName(): string
  {
    return $this->father ? $this->father->name : 'Unknown';
  }

  public function setFather(Dog $father): void
  {
    $this->father = $father;
  }

  public function hasSameMotherAs(Dog $siblingDog): bool
  {
    if ($this->mother === $siblingDog->mother) {
      echo 'true';
      return true;
    }
    echo 'false';
    return false;
  }
}

class DogTest
{
  private array $dogs = [];

  public function main()
  {
    $this->dogs = [
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

    $coco->hasSameMotherAs($rocky);
  }
}

(new DogTest)->main();
<?php declare(strict_types=1);

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
      return true;
    }
    return false;
  }

  public function getName(): string
  {
    return $this->name;
  }

  public function getSex(): string
  {
    return $this->sex;
  }
}
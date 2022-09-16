<?php
class Person
{
  private $name;
  private $lastName;
  private $age;
  private $mother;
  private $father;

  function __construct($name, $lastName, $age, $mother = null, $father = null)
  {
    $this->name = $name;
    $this->lastName = $lastName;
    $this->age = $age;
    $this->mother = $mother;
    $this->father = $father;
  }

  function getName()
  {
    return $this->name;
  }

  function getAge()
  {
    return $this->age;
  }

  function getLastName()
  {
    return $this->lastName;
  }

  function getMother()
  {
    if ($this->mother == null) {
      return null;
    } else return $this->mother;
  }

  function getFather()
  {
    if ($this->father == null) {
      return null;
    } else return $this->father;
  }

  function getInfo()
  {
    if (
      $this->getFather() == null ||
      $this->getMother() == null ||
      $this->getFather()->getFather() == null ||
      $this->getMother()->getMother() == null
    ) {
      return "
      <h3>A few words about myself</h3>" .
        "<p>My name is " . $this->getName() .
        " my last name is " . $this->getLastName() . " and i`m " . $this->getAge() . "</p>";
    } else return "
      <h3>A few words about myself</h3>" .
      "<p>My name is " . $this->getName() .
      " my last name is " . $this->getLastName() . " and i`m " . $this->getAge() . "</p>" .
      "<p>My father is " . $this->getFather()->getName() . "</p>" .
      "<p>My mother is " . $this->getMother()->getName()  . "</p>" .
      "<p>My Grandfather by father lane is " . $this->getFather()->getFather()->getName() . "</p>" .
      "<p>My Grandmother by father lane is " . $this->getFather()->getMother()->getName() . "</p>" .
      "<p>My Grandfather by mother lane is " . $this->getMother()->getFather()->getName() . "</p>" .
      "<p>My Grandmother by mother lane is " . $this->getMother()->getMother()->getName() . "</p>";
  }
} ///////////end of class
$igor = new Person("Igor", "Ivanov", 65);
$sema = new Person("Sema", "Ivanova", 66);
$tema = new Person("Tema", "Ivanov", 67);
$lena = new Person("Lena", "Ivanova", 69);

$alex = new Person("Alex", "Ivanov", 42, $igor, $sema);
$olga = new Person("Olga", "Ivanova", 42, $tema, $lena);

$val = new Person("Valera", "Ivanov", 20, $olga, $alex);

echo $val->getInfo();
echo $olga->getInfo();

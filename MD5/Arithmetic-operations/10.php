<?php

echo "Geometry Calculator\n";
echo "1. Calculate the Area of a Circle\n";
echo "2. Calculate the Area of a Rectangle\n";
echo "3. Calculate the Area of a Triangle\n";
echo "4. Quit\n";


do {
  $userInput = (int)readline('Enter your choice (1-4): ');
  if ($userInput < 1 || $userInput > 4) {
    echo 'Invalid input.';
    $userInput = null;
  }
} while ($userInput == null);

switch ($userInput) {
  case 1:
    $circles = new Geometry();
    $circles->CircleArea();
    break;
  case 2:
    $rectangles = new Geometry();
    $rectangles->RectangleArea();
    break;
  case 3:
    $triangles = new Geometry();
    $triangles->TriangleArea();
    break;
  case 4:
    exit;
}

class Geometry
{
  function CircleArea()
  {
    global $radius;
    do {
      $radius = (int)readline('Input the radius of a circle in mm:  ');
      if ($radius < 0) {
        $radius = null;
        echo "Please input a positive integer.";
      }
    } while ($radius == null);
    $area = pi() * pow($radius, 2);
    $areaInCM = $area / 100;
    $areaInM = $area / 1000000;
    echo 'The area is ' . number_format($area) . ' in mm^2, ' . number_format($areaInCM, 2);
    echo ' in cm^2, ' . number_format($areaInM, 2) . ' in m^2';
  }

  function RectangleArea()
  {
    global $length, $width;
    do {
      $length = (int)readline('Input the length of a rectangle in mm:  ');
      $width = (int)readline('Input the width of a rectangle in mm:  ');
      if ($length < 0 || $width < 0) {
        $length = null;
        $width = null;
        echo "Please input a positive integer.";
      }
    } while ($length == null && $width == null);
    $area = $length * $width;
    $areaInCM = $area / 100;
    $areaInM = $area / 1000000;
    echo "The area is $area in mm^2, $areaInCM in cm^2, $areaInM in m^2";

  }

  function TriangleArea()
  {
    global $base, $height;
    do {
      $base = readline('Input the base of a triangle in mm:  ');
      $height = readline('Input the height of a triangle in mm:  ');
      if ($base < 0 || $height < 0) {
        $height = null;
        $base = null;
        echo "Please input a positive integer.";
      }
    } while ($base == null && $height == null);
    $area = $base * $height * 0.5;
    $areaInCM = $area / 100;
    $areaInM = $area / 1000000;
    echo "The area is $area in mm^2, $areaInCM in cm^2, $areaInM in m^2";
  }
}
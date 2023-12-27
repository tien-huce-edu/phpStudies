<?php
//khai bao
$num = 30;
var_dump($num);
echo '<br/>';

//ep kieu
$age = (float) $num;
var_dump($age);
echo '<br/>';

//kiem tra so nguyen
$isInt = is_float($age);
var_dump($isInt);
echo '<br/>';


class Lasagna
{
  function expectedCookTime()
  {
    return 40;
  }
}

$timer = new Lasagna();
echo $timer->expectedCookTime();

echo '<br/>';
class AnnalynsInfiltration
{
  public function canFastAttack($is_knight_awake)
  {
    return (boolean) $is_knight_awake;
  }
  public function canLiberate(
    $is_knight_awake,
    $is_archer_awake,
    $is_prisoner_awake,
    $is_dog_present
  ) {
    return ($is_knight_awake || $is_archer_awake) && ($is_prisoner_awake && $is_dog_present);
  }
}

$object = new AnnalynsInfiltration();
// $actual = $object->canFastAttack(is_knight_awake: true);
// echo $actual;
// echo '<br/>';
$actual = $object->canLiberate(
  is_knight_awake: false,
  is_archer_awake: false,
  is_prisoner_awake: false,
  is_dog_present: true
);
var_dump($actual);

class PizzaPi
{
  public function calculateDoughRequirement($number_pizza, $people)
  {
    return $number_pizza * (($people * 2) + 200);
  }

  public function calculateSauceRequirement($number_pizza, $can_volume)
  {
    $sauce_per_pizza = 125;
    return $number_pizza * $sauce_per_pizza / $can_volume;
  }

  public function calculateCheeseCubeCoverage($cheese_dimension, $thickness, $diameter)
  {
    return floor((pow($cheese_dimension, 3)) / ($thickness * M_PI * $diameter));
  }

  public function calculateLeftOverSlices($pizzas, $number_of_friends)
  {
    return $pizzas * 8 % $number_of_friends;
  }
}

$pizza_pi = new PizzaPi();

echo $pizza_pi->calculateLeftOverSlices(4, 8);
echo '<br/>';
class Size
{
  private $height;
  private $width;

  public function __construct($height, $width)
  {
    $this->height = $height;
    $this->width = $width;
  }

  public function getHeight()
  {
    return $this->height;
  }

  public function getWidth()
  {
    return $this->width;
  }
}

class Position
{
  private $x;
  private $y;

  public function __construct($x, $y)
  {
    $this->x = $x;
    $this->y = $y;
  }
  public function getX()
  {
    return $this->x;
  }
  public function getY()
  {
    return $this->y;
  }
}

class ProgramWindow
{
  public $x;
  public $y;
  public $width;
  public $height;

  function __construct()
  {
    $this->x = 0;
    $this->y = 0;
    $this->width = 800;
    $this->height = 600;
  }
  function resize(Size $size, Position &$position = null)
  {
    if ($position !== null) {
      $this->x = $position->getX();
      $this->y = $position->getY();
      $this->width = $size->getWidth();
      $this->height = $size->getHeight();
    } else {
      $this->width = $size->getWidth();
      $this->height = $size->getHeight();
    }

  }
  function move(Position $position)
  {
    $this->x = $position->getX();
    $this->y = $position->getY();
  }
}



$size = new Size(100, 200); // => 100
$position = new Position(50, 100); // => 50
$window = new ProgramWindow();

var_dump($window->resize($size));

var_dump($window->x); // => null
var_dump($window->y); // => null
var_dump($window->width); // => null
var_dump($window->height);


echo '<br/>';


// class HighSchoolSweetheart
// {
//   public function firstLetter(string $name): string
//   {
//     return substr($name, 0, 1);
//   }

//   public function initial(string $name): string
//   {
//     return strtoupper($this->firstLetter($name)) . '.';
//   }

//   public function initials(string $name): string
//   {
//     $str = '';
//     $names = explode(' ', $name);
//     for ($i = 0; $i < count($names); $i++) {
//       $str = $str . ' ' . $this->initial($names[$i]);
//     }
//     return $str;
//   }

//   public function pair(string $sweetheart_a, string $sweetheart_b): string
//   {
//     throw new \BadFunctionCallException("Implement the function");
//   }
// }

// $highSchoolSweetheart = new HighSchoolSweetheart();

// echo $highSchoolSweetheart->initials("john Green");


class HighSchoolSweetheart
{

  public function initials($fullName)
  {
    // Your implementation for extracting initials from a full name
    // (assuming a space-separated first and last name)
    $names = explode(' ', $fullName);
    $initials = '';
    foreach ($names as $name) {
      $initials .= strtoupper($name[0]);
    }
    return $initials;
  }



  public function drawHeart()
  {
    // Create an ASCII heart with the initials
    $pattern = "
    ******       ******
  **      **   **      **
**         ** **         **
**            *            **
**                         **
**     B. M.  +  R. L.     **
**                       **
  **                   **
    **               **
      **           **
        **       **
          **   **
            ***
             *
  ";
    return $pattern;
  }
}

// Example usage:
$sweetheart = new HighSchoolSweetheart();
$initialsHeart = $sweetheart->drawHeart();
echo $initialsHeart;
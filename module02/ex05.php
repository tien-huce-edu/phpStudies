<?php

// function add_to_language_list(array $existingLanguages, $newLanguage)
// {

//   $existingLanguages[] = $newLanguage;
//   return $existingLanguages;
// }

// function prune_language_list(array $existingLanguages)
// {
//   array_shift($existingLanguages);
//   return $existingLanguages;
// }

// function count_of_language_list(array $existingLanguages)
// {
//   return sizeof($existingLanguages);
// }

// // Example usage:
// $existingLanguages = ["PHP", "JavaScript", "Java", "C++"];
// $newLanguage = "Python";

// $result = count_of_language_list($existingLanguages);
// print_r($result);

// class Address { 
//   public string $street;

// }

// class Form {
//   public function blanks(int $length): string {
//     return str_repeat("_", $length);
//   }
// }

$array = array(1, 2, 3);

$string = (int) implode($array);

$number = 123321;

$array = (string) $number;

var_dump($array === strrev($array));

function validate($userInput)
{
  if ($userInput === "") {
    return 'Required field';
  }

  if (!is_numeric($userInput) || $userInput <= 0 || strpos($userInput, '.') !== false) {
    return 'Must be a whole number larger than 0';
  }

  return '';
}


// Test the function with some examples
echo validate("123");      // Output: ''
echo validate("0");        // Output: 'Must be a whole number larger than 0'
echo validate('');          // Output: 'Required field'

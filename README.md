# RandomZ
A simple random generator written in PHP

## Description

This simple PHP-Class will make it easy for you to generate random values.

## Documentation

### Importing the class & declaring a generator
```php
require_once('randomz.php');
$generator = new RandomZ;
```
### Generating a simple random value with GenerateRand(...)
``` php
$code = $generator->GenerateRand(5, 1)[0]; // Generate 1x5 with all characters
echo "$code<br>"; // will print for example "$aB2#"

/* The function GenerateRand(...) will return an array containing the generated values.
   The first param is the length of the values, the second param is the amount of values to generate.
   The other params after amount are booleans that you can set to false if you don't need upper-case letters, numbers...
*/
```

### Generating a couple of random values with GenerateRand(...)
``` php
$code = $generator->GenerateRand(5, 3); // Generates 3x5 with all characters 
for($i = 0; $i < 3; $i++)
  echo "$code[$i]<br>"; // will print for example ".5SmD", "^F}u3" and "VXr(&"
```
### Generating a couple of random values with GenerateRandByPattern(...)
``` php
/* The first param of the function is the pattern. 
   It can contain: 
    A = upper-case letter
    a = lower-case letter
    c = special character
    n = number
 */
$code = $generator->GenerateRandByPattern("AaA anccn", 5);
for($i = 0; $i < 5; $i++)
	echo "$code[$i]<br>"; // will print for example "IrU p2>,1", "IpV f4-&5", "CkW l5.,7", "QlS j3.<6" and "ImG p2{'5"
```
### Changing the characters used for the generation
``` php
/* The generated values can contain characters from the following variables:
   - UpperCase: upper-case letters
   - LowerCase: lower-case letters
   - Characters: special character
   - Numbers: numbers
   
   You can change each variables to add or remove some characters of the standard variables
*/
$generator->UpperCase = "ABC"; // The generator uses only "ABC" as upper-case letters
$code = $generator->GenerateRand(5, 1, true, false, false, false)[0]; // generate 1x5 consisting of only upper-case letters
echo "$code<br>"; // will print for example "BCBAA";
$generator->Reset(); // Restores all characters used for generation (upper-case letters are going to be restored to default value instead of "ABC")
```
#### For more examples please take a look at the "example.php"

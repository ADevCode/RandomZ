<?php
require_once('randomz.php');
$generator = new RandomZ; // declare a RandomZ Generator

/* Generate random values */
$code = $generator->GenerateRand(5, 3); // Generates 3x5 with all characters 
for($i = 0; $i < 3; $i++)
	echo "$code[$i]<br>"; // will print for example ".5SmD", "^F}u3" and "VXr(&"

$code = $generator->GenerateRand(5, 1)[0]; // Generate 1x5 with all characters
echo "$code<br>"; // will print for example "$aB2#"

$generator->UpperCase = "ABC"; // The generator uses only "ABC" as upper-case letters
$code = $generator->GenerateRand(5, 1, true, false, false, false)[0]; // generate 1x5 consisting of only upper-case letters
echo "$code<br>"; // will print for example "BCBAA";

$generator->Reset(); // Restores all characters used for generation (upper-case letters are going to be restored to default value instead of "ABC")
$code = $generator->GenerateRand(5, 1, true, true, false, false)[0]; // generate 1x5 consisting of upper-case & lower-case letters
echo "$code<br>"; // will print for example "KnmAO";

/* Generate random values by pattern
   A = upper-case letter
   a = lower-case letter
   c = special Character
   n = number
 */
$code = $generator->GenerateRandByPattern("AaA anccn", 5);
for($i = 0; $i < 5; $i++)
	echo "$code[$i]<br>"; // will print for example "IrU p2>,1", "IpV f4-&5", "CkW l5.,7", "QlS j3.<6" and "ImG p2{'5"

$generator->Numbers = "12345"; // The generator uses 1 to 5 as numbers
$code = $generator->GenerateRandByPattern("nnn-nnn", 2);
for($i = 0; $i < 2; $i++)
	echo "$code[$i]<br>"; // will print for example "315-433" and "212-545"
?>
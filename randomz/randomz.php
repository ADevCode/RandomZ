<?php
class RandomZ {

	/**
	 * @var $UpperLetters upperletters used for generation
	 * @var $LowerLetters lowerletters used for generation
	 * @var $Numbers      numbers used for generation
	 * @var $Characters   special characters used for generation
	 */
	public $UpperLetters = "ABCDEFGHIJKLMNOPQRSTUVWXYZ";
	public $LowerLetters = "abcdefghijklmnopqrstuvwxyz";
	public $Numbers = "0123456789";
	public $Characters = "^!\\\"$%&/()=?*+-;,.<>'#_{}[]";

	/**
	 * Restores characters used for the generation
	 * @param bool $upperLetters Restore upperletters 
	 * @param bool $lowerLetters Restore lowerletter
	 * @param bool $numbers      Restore numbers
	 * @param bool $characters   Restore characters
	 */
	public function Reset($upperLetters = true, $lowerLetters = true, $numbers = true, $characters = true) {
		$this->UpperLetters = "ABCDEFGHIJKLMNOPQRSTUVWXYZ";
		$this->LowerLetters = "abcdefghijklmnopqrstuvwxyz";
		$this->Numbers = "0123456789";
		$this->Characters = "^!\\\"$%&/()=?*+-;,.<>'#_{}[]";
	} 

	/**
     * Generates random strings with a defined length and stores it in an array
     * @param int $length 	 The length of a value to generate
     * @param int $amount 	 The amount of values to generate
     * @param bool $upperLetters Should the values consist of upperletters
     * @param bool $lowerLetters Should the values consist of lowerletters
     * @param bool $numbers 	 Should the values consist of numbers
     * @param bool $characters 	 Should the values consist of characters
     */
	public function GenerateRand($length, $amount, $upperLetters = true, $lowerLetters = true, $numbers = true, $characters = true) {

		$values = [];
		$pattern = "";

		if($upperLetters == true)
			$pattern .= $this->UpperLetters;
		if($lowerLetters == true)
			$pattern .= $this->LowerLetters;
		if($numbers == true)
			$pattern .= $this->Numbers;
		if($characters == true)
			$pattern .= $this->Characters;

		$patternLength = strlen($pattern)-1;

		for($i = 0; $i < $amount; $i++) {
			$temp = "";

			for($j = 0; $j < $length; $j++)
				$temp .= $pattern[rand(0, $patternLength)];

			$values[$i] = $temp;
		}

		return $values;
	}

	/**
     * Generates strings with an individual pattern and stores it in an array
     *
     * @param string $pattern The pattern of which a random value consists: A = Upperletter, a = Lowerletter, n = number, c = character
     * @param int $amount     The amount of values to generate
     */
	public function GenerateRandByPattern($pattern, $amount) {
		// A = Upperletter, a = Lowerletter, n = number, c = character
		$values = [];
		$patternLength = strlen($pattern);
		$upperLettersLength = strlen($this->UpperLetters)-1;
		$lowerLettersLength = strlen($this->LowerLetters)-1;
		$numbersLength = strlen($this->Numbers)-1;
		$charactersLength = strlen($this->Characters)-1;

		for($i = 0; $i < $amount; $i++) {
			$temp = "";
			for($j = 0; $j < $patternLength; $j++) {
				switch($pattern[$j]) {
					case 'A':
						$temp .= $this->UpperLetters[rand(0, $upperLettersLength)];
						break;
					case 'a':
						$temp .= $this->LowerLetters[rand(0, $lowerLettersLength)];
						break;
					case 'n':
						$temp .= $this->Numbers[rand(0, $numbersLength)];
						break;
					case 'c':
						$temp .= $this->Characters[rand(0, $charactersLength)];
						break;
					default:
						$temp .= $pattern[$j];
				}
			}
			$values[$i] = $temp;
		}

		return $values;
	}
};
?>

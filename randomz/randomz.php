<?php
class RandomZ {

	/**
	 * @var $UpperCase  upper-case letters used for generation
	 * @var $LowerCase  lower-case letters used for generation
	 * @var $Numbers    numbers used for generation
	 * @var $Characters special characters used for generation
	 */
	public $UpperCase = "ABCDEFGHIJKLMNOPQRSTUVWXYZ";
	public $LowerCase = "abcdefghijklmnopqrstuvwxyz";
	public $Numbers = "0123456789";
	public $Characters = "^!\\\"$%&/()=?*+-;,.<>'#_{}[]";

	/**
	 * Restores characters used for the generation
	 * @param bool $upperCase  Restore upper-case letters 
	 * @param bool $lowerCase  Restore lower-case letters
	 * @param bool $numbers    Restore numbers
	 * @param bool $characters Restore characters
	 */
	public function Reset($upperCase = true, $lowerCase = true, $numbers = true, $characters = true) {
		if($upperCase == true)
			$this->UpperCase = "ABCDEFGHIJKLMNOPQRSTUVWXYZ";
		if($lowerCase == true)
			$this->LowerCase = "abcdefghijklmnopqrstuvwxyz";
		if($numbers == true)
			$this->Numbers = "0123456789";
		if($characters == true)
			$this->Characters = "^!\\\"$%&/()=?*+-;,.<>'#_{}[]";
	} 

	/**
     * Generates random strings with a defined length and stores it in an array
     * @param int  $length     The length of a value to generate
     * @param int  $amount 	   The amount of values to generate
     * @param bool $upperCase  Should the values contain upper-case letters
     * @param bool $lowerCase  Should the values contain lower-case letters
     * @param bool $numbers    Should the values contain numbers
     * @param bool $characters Should the values contain characters
     */
	public function GenerateRand($length, $amount, $upperCase = true, $lowerCase = true, $numbers = true, $characters = true) {

		$values = [];
		$pattern = "";

		if($upperCase == true)
			$pattern .= $this->UpperCase;
		if($lowerCase == true)
			$pattern .= $this->LowerCase;
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
     * @param string $pattern The pattern of which a random value consists: A = upper-case letter, a = lower-case letter, n = number, c = character
     * @param int $amount     The amount of values to generate
     */
	public function GenerateRandByPattern($pattern, $amount) {
		// A = upper-case letter, a = lower-case letter, n = number, c = character
		$values = [];
		$patternLength = strlen($pattern);
		$upperCaseLength = strlen($this->UpperCase)-1;
		$lowerCaseLength = strlen($this->LowerCase)-1;
		$numbersLength = strlen($this->Numbers)-1;
		$charactersLength = strlen($this->Characters)-1;

		for($i = 0; $i < $amount; $i++) {
			$temp = "";
			for($j = 0; $j < $patternLength; $j++) {
				switch($pattern[$j]) {
					case 'A':
						$temp .= $this->UpperCase[rand(0, $upperCaseLength)];
						break;
					case 'a':
						$temp .= $this->LowerCase[rand(0, $lowerCaseLength)];
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
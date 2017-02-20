<?php
/**
 * @package Awoods/World
 */
namespace Awoods\World;

/**
 * Class Canada
 * @package Awoods\World
 */
class Canada implements CountryInterface {

	/**
	 * @return string
	 */
	public function getName() {
		return 'Canada';
	}

	/**
	 * @return string
	 */
	public function getFullName() {
		return 'Canada';
	}

	/**
	 * @param string $phoneNumber
	 * @param bool $strict
	 * @return bool
	 */
	public function isPhoneNumberValid( $phoneNumber, $strict = false ) {
		// TODO: Implement isPhoneNumberValid() method.
	}

	/**
	 * Check if a postal code complies with the Canadian postal format
	 *
	 * Are lower case letters allowed? Not sure but I'm allowing them in the spirit of the Robustness Principle
	 *
	 * @see https://en.wikipedia.org/wiki/Robustness_principle
	 *
	 * @param string $postalCode
	 * @return bool
	 */
	public function isPostalCodeValid( $postalCode ) {

		$postalCode = strtoupper($postalCode);
		$simpleRegex = '/^[ABCEGHJKLMNPRSTVXY]\d\w \d\w\d$/';
		preg_match($simpleRegex, $postalCode, $matches);

		if (isset($matches[0]) && $postalCode === $matches[0]){
			return true;
		}

		return false;
	}
}

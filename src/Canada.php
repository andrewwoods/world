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

	use NorthAmericanPhoneNumber;

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
     * @return array
     */
	public function getProvinces(){
		return [
            'AB' => 'Alberta',
            'BC' => 'British Columbia',
            'MB' => 'Manitoba',
            'NB' => 'New Brunswick',
            'NL' => 'Newfoundland and Labrador',
            'NS' => 'Nova Scotia',
            'ON' => 'Ontario',
            'PE' => 'Prince Edward Island',
            'QC' => 'Quebec',
            'SK' => 'Saskatchewan',
		];
	}

    /**
     * @return array
     */
    public function getTerritories(){
        return [
            'NT' => 'Northwest Territories',
            'NU' => 'Nunavut',
            'YT' => 'Yukon'
        ];
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

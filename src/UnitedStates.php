<?php
/**
 * @package awoods\world
 */
namespace Awoods\World;


/**
 * Class UnitedStates
 * @package Awoods\World
 */
class UnitedStates implements CountryInterface {

	use NorthAmericanPhoneNumber;

	/**
	 * UnitedStates constructor.
	 */
	public function __construct() {
	}

	/**
	 * @return string
	 */
	public function getName(){
		return 'United States';
	}

	/**
	 * @return string
	 */
	public function getFullName(){
		return 'United States of America';
	}

	/**
	 * Retrieve a list of US States
	 *
	 * Washington DC is a district, not a state, but sometimes it is included
	 * in state select/drop-down lists.
	 *
	 *
	 * @param bool $includeDC  determine if you want to include Washington DC
	 *
	 * @return array
	 */
	public function getStates($includeDC = false){
		$data = [
			'AL' => 'Alabama',
			'AK' => 'Alaska',
			'AZ' => 'Arizona',
			'AR' => 'Arkansas',
			'CA' => 'California',
			'CO' => 'Colorado',
			'CT' => 'Connecticut',
			'DE' => 'Delaware',
			'FL' => 'Florida',
			'GA' => 'Georgia',
			'HI' => 'Hawaii',
			'ID' => 'Idaho',
			'IL' => 'Illinois',
			'IN' => 'Indiana',
			'IA' => 'Iowa',
			'KS' => 'Kansas',
			'KY' => 'Kentucky',
			'LA' => 'Louisiana',
			'ME' => 'Maine',
			'MD' => 'Maryland',
			'MA' => 'Massachusetts',
			'MI' => 'Michigan',
			'MN' => 'Minnesota',
			'MS' => 'Mississippi',
			'MO' => 'Missouri',
			'MT' => 'Montana',
			'NE' => 'Nebraska',
			'NV' => 'Nevada',
			'NH' => 'New Hampshire',
			'NJ' => 'New Jersey',
			'NM' => 'New Mexico',
			'NY' => 'New York',
			'NC' => 'North Carolina',
			'ND' => 'North Dakota',
			'OH' => 'Ohio',
			'OK' => 'Oklahoma',
			'OR' => 'Oregon',
			'PA' => 'Pennsylvania',
			'RI' => 'Rhode Island',
			'SC' => 'South Carolina',
			'SD' => 'South Dakota',
			'TN' => 'Tennessee',
			'TX' => 'Texas',
			'UT' => 'Utah',
			'VT' => 'Vermont',
			'VA' => 'Virginia',
			'WA' => 'Washington',
			'WV' => 'West Virginia',
			'WI' => 'Wisconsin',
			'WY' => 'Wyoming',
		];

		if ($includeDC){
			$data['DC'] = 'District of Columbia';
		}

		return $data;
	}


	/**
	 * Verify if the value provided looks like a valid ZIP code
	 *
	 * The postal code system used in the United States of America is called ZIP Code.
	 * ZIP is abbreviation from Zone Improvement Program. US ZIP codes were introduced in 1963
	 * to improve mail delivery, make it more efficiently, quickly and simplify it.
	 *
	 * @see http://www.zippostalcodes.com/postcodes/us/us-zip-codes-format/
	 *
	 * @param string $postalCode
	 *
	 * @return bool
	 */
	public function isPostalCodeValid($postalCode){
		$matches = [];

		preg_match('/\d{5}(?:-\d{4})?/',$postalCode, $matches);

		if (isset($matches[0])){
			return ($postalCode === $matches[0]);
		}

		return false;
	}



}


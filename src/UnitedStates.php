<?php
/**
 * @package awoods/world
 */
namespace Awoods\World;

class UnitedStates {

	public function __construct() {
	}

	public function getName(){
		return 'United States';
	}

	public function getFullName(){
		return 'United States of America';
	}

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

	public function isPostalCodeValid($postalCode){
		$matches = [];

		preg_match('/\d{5}(?:-\d{4})?/',$postalCode, $matches);

		if (isset($matches[0])){
			return ($postalCode === $matches[0]);
		}

		return false;
	}

	public function isPhoneNumberValid($phoneNumber, $strict = false){
		$simpleRegex = '/^(\+?1? ?)?((\(\d{3}\)|\d{3}))([-\. ])?\d{3}([-\. ])?\d{4}$/';

		preg_match($simpleRegex, $phoneNumber, $matches);

		if (isset($matches[0]) && $matches[0] === $phoneNumber){
			return true;
		}

		return false;
	}
}


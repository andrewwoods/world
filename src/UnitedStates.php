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

		if ($strict){
			$strictRegex = '/^\(?([2–9][0-9][0-9])\)?(?:[-\. ])?([2-9][0-9][0-9])(?:[-\. ])?(\d{4})$/';
			preg_match($strictRegex, $phoneNumber, $matches);

			if (isset($matches[0]) && $matches[0] === $phoneNumber){

				$area   = $matches[1];
				$prefix = $matches[2];
				$code   = $matches[3];

				// the numbers X11 are reserved e.g. 411, 611
				// These 8 ERCs, called service codes, are not used as area codes.
				if ('11' === substr($area,1, 2)){
					return false;
				}

				// N9X - The 80 codes in this format, called expansion codes, have been reserved for use during the period when the current 10-digit NANP number format undergoes expansion.
				if ('9' === substr($area, 1, 1)){
					return false;
				}

				// 37X and 96X - Two blocks of 10 codes each have been set aside by the INC for unanticipated purposes where it may be important to have a full range of 10 contiguous codes available.
				if ('37' === substr($area, 0, 2) || '96' === substr($area, 0, 2)){
					return false;
				}

				return true;
			}

			return false;

		} else {
			$simpleRegex = '/^(\+?1? ?)?((\(\d{3}\)|\d{3}))([-\. ])?\d{3}([-\. ])?\d{4}$/';
			preg_match($simpleRegex, $phoneNumber, $matches);

			if (isset($matches[0]) && $matches[0] === $phoneNumber){
				return true;
			}

			return false;
		}
	}
}


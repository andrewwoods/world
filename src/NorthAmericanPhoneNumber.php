<?php
/**
 * @package Awoods\World
 */
namespace Awoods\World;

/**
 * Trait NorthAmericanPhoneNumber
 * @package Awoods\World
 */
trait NorthAmericanPhoneNumber {
		/**
	 * Check if the phone number looks like a valid US phone number.
	 *
	 * There are 2 syntaxes - a simple or loose syntax, that checks for formatting only,
	 * and a strict syntax which examines if digits in particular positions are invalid
	 *
	 * @see https://www.nationalnanpa.com/area_codes/index.html
	 *
	 * @param string $phoneNumber
	 * @param bool $strict
	 *
	 * @return bool
	 */
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
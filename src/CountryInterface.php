<?php
/**
 * @package Awoods/World
 */
namespace Awoods\World;

interface CountryInterface {

	/**
	 * @return string
	 */
	public function getName();

	/**
	 * @return string
	 */
	public function getFullName();

	/**
	 * @param string $postalCode
	 *
	 * @return bool
	 */
	public function isPostalCodeValid($postalCode);

	/**
	 * Determine if the provided phone number looks correct.
	 *
	 * @param string $phoneNumber
	 * @param bool $strict Optional. Default is false. Do you want interpret the value according to the country standard?
	 *
	 * @return bool
	 */
	public function isPhoneNumberValid($phoneNumber, $strict = false);
}


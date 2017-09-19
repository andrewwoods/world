<?php
/**
 * This file is part of the World package.
 *
 * (c) Andrew Woods <andrew@andrewwoods.net>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

use Awoods\World\NA\UnitedStates;
use Awoods\World\Country;

class UnitedStatesTest extends PHPUnit_Framework_TestCase {

	public function testGetName(){
		$expected = 'United States';

		$us = new UnitedStates();

		$this->assertEquals($expected, $us->getCommonName());
	}

	public function testGetFullName(){
		$expected = 'United States of America';

		$us = new UnitedStates();

		$this->assertEquals($expected, $us->getOfficialName());
	}

	public function testGetStates(){
		$expectedTotal = 50;
		$includeDC = false;

		$us = new UnitedStates();

		$this->assertEquals($expectedTotal, count($us->getStates($includeDC)));
	}

	public function testGetStatesIncludeDC(){
		$expectedTotal = 51;

		$includeDC = true;
		$us = new UnitedStates();

		$this->assertEquals($expectedTotal, count($us->getStates($includeDC)));
	}

	public function testIsPostalCodeValid(){
		$us = new UnitedStates();

		$goodSeattleZipcode = '98109';
		$this->assertTrue($us->isPostalCodeValid($goodSeattleZipcode));


		$goodSeattleZipcodePlusFour = '98109-1234';
		$this->assertTrue($us->isPostalCodeValid($goodSeattleZipcodePlusFour));

		$goodSchenectadyZipcode = '12345';
		$this->assertTrue($us->isPostalCodeValid($goodSchenectadyZipcode));

		$badZipcode = '12345-1';
		$this->assertFalse($us->isPostalCodeValid($badZipcode));

		$badZipcode = '12345-12';
		$this->assertFalse($us->isPostalCodeValid($badZipcode));

		$badZipcode = '12345-123';
		$this->assertFalse($us->isPostalCodeValid($badZipcode));

		// Valid Postal code for Vancouver, BC, Canada
		$badCanadianZipcode = 'V5K 0A1';
		$this->assertFalse($us->isPostalCodeValid($badCanadianZipcode));

		$goodBeverlyHillsZipcode = '90210';
		$this->assertTrue($us->isPostalCodeValid($goodBeverlyHillsZipcode));

	}

	public function testIsPhoneNumberValidSimpleFormat(){
		$us = new UnitedStates();

		$phoneGoodNumbersOnly = '2065551234';
		$this->assertTrue($us->isPhoneNumberValid($phoneGoodNumbersOnly));

		$phoneGoodNumbersWithHyphens = '206-555-1234';
		$this->assertTrue($us->isPhoneNumberValid($phoneGoodNumbersWithHyphens));

		$phoneGoodNumbersWithDots = '206.555.1234';
		$this->assertTrue($us->isPhoneNumberValid($phoneGoodNumbersWithDots));

		$phoneGoodNumbersWithSpaces = '206 555 1234';
		$this->assertTrue($us->isPhoneNumberValid($phoneGoodNumbersWithSpaces));

		$phoneGoodOneWithNumbersOnly = '12065551234';
		$this->assertTrue($us->isPhoneNumberValid($phoneGoodOneWithNumbersOnly));

		$phoneGoodPlusOneWithNumbersOnly = '+12065551234';
		$this->assertTrue($us->isPhoneNumberValid($phoneGoodPlusOneWithNumbersOnly));

		$phoneGoodOneWithParenFormat = '1 (206) 555-1234';
		$this->assertTrue($us->isPhoneNumberValid($phoneGoodOneWithParenFormat));

		$phoneGoodPlusOneWithParenFormat = '+1 (206) 555-1234';
		$this->assertTrue($us->isPhoneNumberValid($phoneGoodPlusOneWithParenFormat));

		$phoneBadNineDigitsNumbersOnly = '206555123';
		$this->assertFalse($us->isPhoneNumberValid($phoneBadNineDigitsNumbersOnly));

		$phoneBadElevenDigitsNumbersOnly = '20655512345';
		$this->assertFalse($us->isPhoneNumberValid($phoneBadElevenDigitsNumbersOnly));
	}

	public function testIsPhoneNumberValidStrictFormat() {
		$us = new UnitedStates();
		$strict = true;

		$phoneJimmyJohnsNumbersOnly = '2066239500';
		$this->assertTrue($us->isPhoneNumberValid($phoneJimmyJohnsNumbersOnly, $strict));

		$phoneBadPrefix411 = '4115551234';
		$this->assertFalse($us->isPhoneNumberValid($phoneBadPrefix411, $strict));

		$phoneBadPrefix611 = '6115551234';
		$this->assertFalse($us->isPhoneNumberValid($phoneBadPrefix611, $strict));

		$phoneBadPrefixReserved = '6915551234';
		$this->assertFalse($us->isPhoneNumberValid($phoneBadPrefixReserved, $strict));

		$phoneGoodWithDashes = '681-555-1234';
		$this->assertFalse($us->isPhoneNumberValid($phoneGoodWithDashes, $strict));

		$phoneGoodWithDashesWithCountry = '1-681-555-1234';
		$this->assertFalse($us->isPhoneNumberValid($phoneGoodWithDashesWithCountry, $strict));

		$phoneGoodWithDashesWithCountry = '+1-681-555-1234';
		$this->assertFalse($us->isPhoneNumberValid($phoneGoodWithDashesWithCountry, $strict));
	}
}


<?php

class UnitedStatesTest extends PHPUnit_Framework_TestCase {

	public function testGetName(){
		$expected = 'United States';

		$us = new Awoods\World\UnitedStates();

		$this->assertEquals($expected, $us->getName());
	}

	public function testGetFullName(){
		$expected = 'United States of America';

		$us = new Awoods\World\UnitedStates();

		$this->assertEquals($expected, $us->getFullName());
	}

	public function testGetStates(){
		$expectedTotal = 50;
		$includeDC = false;

		$us = new \Awoods\World\UnitedStates();

		$this->assertEquals($expectedTotal, count($us->getStates($includeDC)));
	}

	public function testGetStatesIncludeDC(){
		$expectedTotal = 51;

		$includeDC = true;
		$us = new \Awoods\World\UnitedStates();

		$this->assertEquals($expectedTotal, count($us->getStates($includeDC)));
	}

	public function testIsPostalCodeValid(){
		$us = new \Awoods\World\UnitedStates();

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

}


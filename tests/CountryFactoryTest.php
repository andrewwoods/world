<?php
/**
 *
 */

class CountryFactoryTest extends PHPUnit_Framework_TestCase {

	public function testCreateUnitedStatesWithISO3166Alpha2Code(){
		$expected = 'UnitedStates';

		$factory = new \Awoods\World\CountryFactory();
		$us = $factory->create('US');

		$this->assertContains($expected, get_class($us));
	}


	public function testCreateUnitedStatesWithISO3166Alpha3Code(){
		$expected = 'UnitedStates';

		$factory = new \Awoods\World\CountryFactory();
		$us = $factory->create('USA');

		$this->assertContains($expected, get_class($us));
	}

	public function testCreateUnitedStatesWithISO3166NumericCode(){
		$expected = 'UnitedStates';

		$factory = new \Awoods\World\CountryFactory();
		$us = $factory->create(840);

		$this->assertContains($expected, get_class($us));
	}

	/**
	 * @expectedException UnexpectedValueException
	 */
	public function testCreateWithIncorrectCode(){

		$factory = new \Awoods\World\CountryFactory();
		$badCountry = $factory->create('invalid');

	}
}

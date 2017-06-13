<?php
/**
 * @package Awoods\World
 */

use Awoods\World\CountryFactory;

/**
 * Class CountryFactoryTest
 */
class CountryFactoryTest extends PHPUnit_Framework_TestCase {

	public function testCreateUnitedStatesWithISO3166Alpha2Code(){
		$expected = 'UnitedStates';

		$factory = new CountryFactory();
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

    public function testCreateCanadaWithISO3166Alpha2Code(){
        $expected = 'Canada';

        $factory = new \Awoods\World\CountryFactory();
        $ca = $factory->create('CA');

        $this->assertContains($expected, get_class($ca));
    }

    public function testCreateCanadaWithISO3166NumericCode(){
        $expected = 'Canada';

        $factory = new \Awoods\World\CountryFactory();
        $ca = $factory->create(124);

        $this->assertContains($expected, get_class($ca));
    }

	/**
	 * @expectedException UnexpectedValueException
	 */
	public function testCreateWithIncorrectCode(){

		$factory = new \Awoods\World\CountryFactory();
		$badCountry = $factory->create('invalid');

	}

	public function testGetListCount(){
	    $expected = 3;

        $factory = new \Awoods\World\CountryFactory();
        $countries = $factory->getList();

        $this->assertEquals($expected, count(array_keys($countries)));
    }

    public function testGetListSupportsUnitedStates(){

        $factory = new \Awoods\World\CountryFactory();
        $countries = $factory->getList();

        $this->assertTrue(isset($countries['US']));
    }

    public function testGetListSupportsCanada(){

        $factory = new \Awoods\World\CountryFactory();
        $countries = $factory->getList();

        $this->assertTrue(isset($countries['CA']));
    }

}

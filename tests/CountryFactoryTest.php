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

		$factory = new CountryFactory();
		$us = $factory->create('USA');

		$this->assertContains($expected, get_class($us));
	}


    public function testCreateCanadaWithISO3166Alpha2Code(){
        $expected = 'Canada';

        $factory = new CountryFactory();
        $ca = $factory->create('CA');

        $this->assertContains($expected, get_class($ca));
    }

	/**
	 * @expectedException UnexpectedValueException
	 */
	public function testCreateWithIncorrectCode(){

		$factory = new CountryFactory();
		$badCountry = $factory->create('invalid');

	}

	public function testGetListCount(){
	    $expected = 3;

        $factory = new CountryFactory();
        $countries = $factory->getList();

        $this->assertEquals($expected, count(array_keys($countries)));
    }

    public function testGetListSupportsUnitedStates(){

        $factory = new CountryFactory();
        $countries = $factory->getList();

        $this->assertTrue(isset($countries['US']));
    }

    public function testGetListSupportsCanada(){

        $factory = new CountryFactory();
        $countries = $factory->getList();

        $this->assertTrue(isset($countries['CA']));
    }

}

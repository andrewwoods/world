<?php
/**
 * This file is part of the World package.
 *
 * (c) Andrew Woods <andrew@andrewwoods.net>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
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
        $countries = $factory->getSupportedCountries();

        $this->assertEquals($expected, count(array_keys($countries)));
    }

    public function testGetListSupportsUnitedStates(){

        $factory = new CountryFactory();
        $countries = $factory->getSupportedCountries();

        $this->assertTrue(isset($countries['US']));
    }

    public function testGetListSupportsCanada(){

        $factory = new CountryFactory();
        $countries = $factory->getSupportedCountries();

        $this->assertTrue(isset($countries['CA']));
    }

    public function testHasPostalAndPhoneSupport()
    {
        $unitedStatesSupported = CountryFactory::hasPostalAndPhoneSupport('US');
        self::assertTrue($unitedStatesSupported);

        $canadaSupported = CountryFactory::hasPostalAndPhoneSupport('CA');
        self::assertTrue($canadaSupported);

        $mexicoSupported = CountryFactory::hasPostalAndPhoneSupport('MX');
        self::assertTrue($mexicoSupported);
    }

    public function testGetAllCountries()
    {
        $factory = new CountryFactory();
        $countries = $factory->getAllCountries();

        self::assertEquals(41, count($countries));
        self::assertArrayHasKey('US', $countries);
        self::assertArrayHasKey('CA', $countries);
        self::assertArrayHasKey('MX', $countries);

    }
}

<?php
/**
 * This file is part of the World package.
 *
 * (c) Andrew Woods <andrew@andrewwoods.net>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

use Awoods\World\NA\Mexico;

class MexicoTest extends PHPUnit_Framework_TestCase
{
   public function testGetName(){

       $mexico = new Mexico();

       $this->assertEquals('Mexico', $mexico->getCommonName());
   }

   public function testGetFullName(){
       $mexico = new Mexico();

       $this->assertEquals('Mexico', $mexico->getOfficialName());
   }

   public function testGetLocalityList(){
        $mexico = new Mexico();

        $states = $mexico->getSubdivisionList();

        $this->assertArrayHasKey('MX-COA', $states);
        $this->assertEquals('Coahuila', $states['MX-COA']);

        $this->assertArrayHasKey('MX-HID', $states);
        $this->assertEquals('Hidalgo', $states['MX-HID']);
   }

    public function testIsPostalCodeValid(){

        $invalidPostalCode = 'ABCD';
        $aguascalientesPostalCode = '20010';
        $guerreroPostalCode = '40123';

        $mexico = new Mexico();
        $result = $mexico->isPostalCodeValid($invalidPostalCode);
        self::assertFalse($result);

        $result = $mexico->isPostalCodeValid($aguascalientesPostalCode);
        self::assertTrue($result);

        $result = $mexico->isPostalCodeValid($guerreroPostalCode);
        self::assertTrue($result);
    }

    public function testIsPostalCodeStrictValid(){
        $invalidPostalCode = 'ABCD';
        $aguascalientesPostalCode = '20010';
        $guerreroPostalCode = '40123';

        $mexico = new Mexico();

        $mexico->setPostalCodeState('MX-AGU');
        $result = $mexico->isPostalCodeStrictValid($aguascalientesPostalCode);
        self::assertTrue($result);

        $result = $mexico->isPostalCodeStrictValid($guerreroPostalCode);
        self::assertFalse($result, 'Guerrero postal code is not valid for Aguascalientes');

        $mexico->setPostalCodeState('MX-GRO');
        $result = $mexico->isPostalCodeStrictValid($guerreroPostalCode);
        self::assertTrue($result);
    }

    public function testIsPostalCodeStrictValidException(){
        $invalidPostalCode = 'ABCD';

        $mexico = new Mexico();
        self::setExpectedException('BadMethodCallException');
        $mexico->isPostalCodeStrictValid($invalidPostalCode);
    }

}

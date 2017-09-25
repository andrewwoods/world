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

    public function testIsPhoneNumberValid()
    {
        $invalidHasLetters = '123456789A';
        $invalidTooShort8digits = '12345678';
        $invalidTooShort9digits = '123456789';
        $invalidTooShort11digits = '12345678901';

        $usConsulateMexicoCity = '5550802000'; // Phone: ( 01-55 ) 5080-2000

        $mexico = new Mexico();

        $result = $mexico->isPhoneNumberValid($invalidHasLetters);
        self::assertFalse($result);

        $result = $mexico->isPhoneNumberValid($invalidTooShort8digits);
        self::assertFalse($result);

        $result = $mexico->isPhoneNumberValid($invalidTooShort9digits);
        self::assertFalse($result);

        $result = $mexico->isPhoneNumberValid($invalidTooShort11digits);
        self::assertFalse($result);

        $result = $mexico->isPhoneNumberValid($usConsulateMexicoCity);
        self::assertTrue($result);
    }

    public function testIsPhoneNumberStrictValid()
    {
        $invalidHasLetters = '123456789A';
        $invalidTooShort8digits = '12345678';
        $invalidTooShort9digits = '123456789';
        $invalidTooShort11digits = '12345678901';
        $invalidCantStartWith01 = '0123456789';
        $invalidCantStartWith044 = '0441234567';
        $invalidCantStartWith045 = '0451234567';

        $usConsulateMexicoCity = '5550802000'; // Phone: ( 01-55 ) 5080-2000

        $mexico = new Mexico();

        $result = $mexico->isPhoneNumberStrictValid($invalidHasLetters);
        self::assertFalse($result);

        $result = $mexico->isPhoneNumberStrictValid($invalidTooShort8digits);
        self::assertFalse($result, '8 digits is too short');

        $result = $mexico->isPhoneNumberStrictValid($invalidTooShort9digits);
        self::assertFalse($result, '9 digits is too short');

        $result = $mexico->isPhoneNumberStrictValid($invalidTooShort11digits);
        self::assertFalse($result, '11 digits is too long');

        $result = $mexico->isPhoneNumberStrictValid($invalidCantStartWith01);
        self::assertFalse($result, 'Cannot start with 01');

        $result = $mexico->isPhoneNumberStrictValid($invalidCantStartWith044);
        self::assertFalse($result, 'Cannot start with 044');

        $result = $mexico->isPhoneNumberStrictValid($invalidCantStartWith045);
        self::assertFalse($result, 'Cannot start with 045');

        $result = $mexico->isPhoneNumberStrictValid($usConsulateMexicoCity);
        self::assertTrue($result);
    }
}

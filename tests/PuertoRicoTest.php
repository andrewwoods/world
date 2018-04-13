<?php
/**
 * This file is part of the World package.
 *
 * (c) Andrew Woods <andrew@andrewwoods.net>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

use Awoods\World\NA\PuertoRico;

class PuertoRicoTest extends PHPUnit_Framework_TestCase
{
    public function testValidAreaCodes()
    {
        // 787 and 939
        $goodPhoneNumberIn787 = '7872501234';
        $goodPhoneNumberIn939 = '9395051234';
        $goodPhoneNumberIn206 = '2063551234';

        $badPhoneNumberIn787 = '7875551234'; // 555 is an un-allowed prefix

        $puertoRico = new PuertoRico();

        /*
         * Loose Evaluation Tests
         */
        $result = $puertoRico->isPhoneNumberValid($goodPhoneNumberIn787);
        self::assertTrue($result);

        $result = $puertoRico->isPhoneNumberValid($goodPhoneNumberIn939);
        self::assertTrue($result);

        $result = $puertoRico->isPhoneNumberValid($goodPhoneNumberIn206);
        self::assertTrue($result);

        /*
         * Strict Evaluation Tests
         */
        $result = $puertoRico->isPhoneNumberStrictValid($goodPhoneNumberIn787);
        self::assertTrue($result);

        $result = $puertoRico->isPhoneNumberStrictValid($goodPhoneNumberIn939);
        self::assertTrue($result);

        self::setExpectedException('UnexpectedValueException');
        $result = $puertoRico->isPhoneNumberStrictValid($goodPhoneNumberIn206);

        self::setExpectedException('UnexpectedValueException');
        $result = $puertoRico->isPhoneNumberStrictValid($badPhoneNumberIn787);

    }
}

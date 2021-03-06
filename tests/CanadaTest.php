<?php
/**
 * This file is part of the World package.
 *
 * (c) Andrew Woods <andrew@andrewwoods.net>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

use \Awoods\World\NA\Canada;

/**
 * Unit tests for Canada
 *
 * @package Awoods/World
 */
class CanadaTest extends PHPUnit_Framework_TestCase {

	public function testIsPostalValidSimpleFormat(){
		$canada = new Canada();

		/*
		 * Known Good Cases
		 */

		// H3Z 2Y7 - Montreal, QC
		self::assertTrue( $canada->isPostalCodeValid('H3Z 2Y7') );

		// V8X 3X4 - Victoria, BC
		self::assertTrue( $canada->isPostalCodeValid('V8X 3X4') );

		// T0H 1A0 - Calgary, AB
		self::assertTrue( $canada->isPostalCodeValid('T0H 1A0') );

		// T5H 2H7 - Edmonton, AB
		self::assertTrue( $canada->isPostalCodeValid('T5H 2H7') );

		// H0H 0H0 - Santa Claus
		self::assertTrue( $canada->isPostalCodeValid('H0H 0H0') );

		// M4J 4Z9 - Toronto, Ontario
		self::assertTrue( $canada->isPostalCodeValid('M4J 4Z9') );

		// h3z 2y7 - Montreal, QC - lowercase letters
		self::assertTrue( $canada->isPostalCodeValid('h3z 2y7') );

		/*
		 * Known Bad Cases
		 *
		 */

		// 98101 - Seattle, WA, US
		self::assertFalse( $canada->isPostalCodeValid('98101'));

        // 98101-1806 - (Downtown) Seattle, WA, US
        self::assertFalse( $canada->isPostalCodeValid('98101-1806'));

	}


    public function testIsPostalStrictValid(){
        $canada = new Canada();

        /*
         * Known Good Cases
         */

        // H3Z 2Y7 - Montreal, QC
        self::assertTrue( $canada->isPostalCodeStrictValid('H3Z 2Y7') );

        // V8X 3X4 - Victoria, BC
        self::assertTrue( $canada->isPostalCodeStrictValid('V8X 3X4') );

        // T0H 1A0 - Calgary, AB
        self::assertTrue( $canada->isPostalCodeStrictValid('T0H 1A0') );

        // T5H 2H7 - Edmonton, AB
        self::assertTrue( $canada->isPostalCodeStrictValid('T5H 2H7') );

        // H0H 0H0 - Santa Claus
        self::assertTrue( $canada->isPostalCodeStrictValid('H0H 0H0') );

        // M4J 4Z9 - Toronto, Ontario
        self::assertTrue( $canada->isPostalCodeStrictValid('M4J 4Z9') );

        /*
         * Known Bad Cases
         *
         */

        // 98101 - Seattle, WA, US
        self::assertFalse( $canada->isPostalCodeStrictValid('98101'));

        // 98101-1806 - (Downtown) Seattle, WA, US
        self::assertFalse( $canada->isPostalCodeStrictValid('98101-1806'));

        // h3z 2y7 - Montreal, QC - lowercase letters
        self::assertFalse( $canada->isPostalCodeStrictValid('h3z 2y7') );

        /*
         * First letter cannot be any of these:  D F I O Q U W Z
         */
        self::assertFalse( $canada->isPostalCodeStrictValid('D0A 9X9'));
        self::assertFalse( $canada->isPostalCodeStrictValid('F0A 9X9'));
        self::assertFalse( $canada->isPostalCodeStrictValid('I0A 9X9'));
        self::assertFalse( $canada->isPostalCodeStrictValid('O0A 9X9'));
        self::assertFalse( $canada->isPostalCodeStrictValid('Q0A 9X9'));
        self::assertFalse( $canada->isPostalCodeStrictValid('U0A 9X9'));
        self::assertFalse( $canada->isPostalCodeStrictValid('W0A 9X9'));
        self::assertFalse( $canada->isPostalCodeStrictValid('Z0A 9X9'));
    }


	public function testGetProvinces(){
		$canada = new Canada();

		$provinces = $canada->getProvinces();

		self::assertEquals(10, count(array_keys($provinces)));
		/*
		 * CONSIDER: Should I add a test for every province code?
		 */
		// AB = Alberta, the first province alphabetically
		self::assertTrue(isset($provinces['AB']));

		// SK = Saskatchewan, the last province alphabetically
		self::assertTrue(isset($provinces['SK']));

		// AZ = Arizona, it should not be found
		self::assertFalse(isset($provinces['AZ']));

	}


    public function testGetLocalityList(){
        $canada = new Canada();

        $provinces = $canada->getSubdivisionList();

        self::assertEquals(13, count(array_keys($provinces)));
    }

}


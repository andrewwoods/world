<?php

/**
 * Unit tests for Canada
 *
 * @package Awoods/World
 */
class CanadaTest extends PHPUnit_Framework_TestCase {

	public function testIsPostalValidSimpleFormat(){
		$canada = new \Awoods\World\Canada();

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
		 * First letter cannot be any of these:  D F I O Q U W Z
		 */

		// 98101 - Seattle, WA, US
		self::assertFalse( $canada->isPostalCodeValid('98101'));

		self::assertFalse( $canada->isPostalCodeValid('D0A 9X9'));
		self::assertFalse( $canada->isPostalCodeValid('F0A 9X9'));
		self::assertFalse( $canada->isPostalCodeValid('I0A 9X9'));
		self::assertFalse( $canada->isPostalCodeValid('O0A 9X9'));
		self::assertFalse( $canada->isPostalCodeValid('Q0A 9X9'));
		self::assertFalse( $canada->isPostalCodeValid('U0A 9X9'));
		self::assertFalse( $canada->isPostalCodeValid('W0A 9X9'));
		self::assertFalse( $canada->isPostalCodeValid('Z0A 9X9'));
	}

	public function testGetProvinces(){
		$canada = new \Awoods\World\Canada();

		$provinces = $canada->getProvinces();

		self::assertEquals(13, count(array_keys($provinces)));
		/*
		 * CONSIDER: Should I add a test for every province code?
		 */
		// AB = Alberta, the first province alphabetically
		self::assertTrue(isset($provinces['AB']));

		// YT = Yukon, the last province alphabetically
		self::assertTrue(isset($provinces['YT']));

		// AZ = Arizona, it should not be found
		self::assertFalse(isset($provinces['AZ']));

	}


    public function testGetLocalityList(){
        $canada = new \Awoods\World\Canada();

        $provinces = $canada->getLocalityList();

        self::assertEquals(13, count(array_keys($provinces)));
    }

}


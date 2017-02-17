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



}

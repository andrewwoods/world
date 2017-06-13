<?php

/**
 * @namespace Awoods\World
 */
class MexicoTest extends PHPUnit_Framework_TestCase
{
   public function testGetName(){

       $mexico = new \Awoods\World\Mexico();

       $this->assertEquals('Mexico', $mexico->getName());
   }

   public function testGetFullName(){
       $mexico = new \Awoods\World\Mexico();

       $this->assertEquals('United Mexican States', $mexico->getFullName());
   }

   public function testGetLocalityList(){
        $mexico = new \Awoods\World\Mexico();

        $states = $mexico->getLocalityList();

        $this->assertArrayHasKey('CA', $states);
        $this->assertEquals('Coahuila', $states['CA']);

        $this->assertArrayHasKey('HI', $states);
        $this->assertEquals('Hidalgo', $states['HI']);


   }
}

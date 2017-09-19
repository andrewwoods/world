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

        $this->assertArrayHasKey('CA', $states);
        $this->assertEquals('Coahuila', $states['CA']);

        $this->assertArrayHasKey('HI', $states);
        $this->assertEquals('Hidalgo', $states['HI']);


   }
}

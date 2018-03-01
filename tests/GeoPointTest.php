<?php
/**
 * This file is part of the World package.
 *
 * (c) Andrew Woods <andrew@andrewwoods.net>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */


class GeoPointTest extends PHPUnit_Framework_TestCase
{
    public function testGetPosition()
    {
        // 4th and Pine, Seattle, WA
        $seattleLatitude = 47.611219;
        $seattleLongitude = -122.337546;

        $geo = new \Awoods\World\GeoPoint($seattleLatitude, $seattleLongitude);
        $position = $geo->getPosition();

        self::assertEquals(47.611219, $position['latitude']);
        self::assertEquals(-122.337546, $position['longitude']);
        self::assertEquals(0.0, $position['altitude']);


        $geo = new \Awoods\World\GeoPoint($seattleLatitude, $seattleLongitude, 30);
        $position = $geo->getPosition();

        self::assertEquals(47.611219, $position['latitude']);
        self::assertEquals(-122.337546, $position['longitude']);
        self::assertEquals(30, $position['altitude']);
    }



}

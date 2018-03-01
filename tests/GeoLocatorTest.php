<?php
/**
 * This file is part of the World package.
 *
 * (c) Andrew Woods <andrew@andrewwoods.net>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */


class GeoLocatorTest extends PHPUnit_Framework_TestCase
{
    protected $data = [];

    public function setUp()
    {
        parent::setUp(); // TODO: Implement this method
        // Origin of the Earth grid
        $this->data['origin'] = ['lat' => 0, 'long' => 0];
        // 5th Ave & E 72nd St, New York, NY (Upper East Side)
        $this->data['nyc'] = ['lat' => 40.772450, 'long' => -73.967063];
        // Yankee Stadium
        $this->data['nyy-stadium'] = ['lat' => 40.829876, 'long' => -73.926183];
        // 4th & Pine St, Seattle, WA (Downtown)
        $this->data['seattle'] = ['lat' => 47.611219, 'long' => -122.337546];
        // Safeco Field a.k.a. Mariners Stadium
        $this->data['safeco'] = ['lat' => 47.591637, 'long' => -122.332038];
    }

    public function testCalculateDistanceSeattleToNYC()
    {
        $seattle = new \Awoods\World\GeoPoint(
            $this->data['seattle']['lat'],
            $this->data['seattle']['long']
        );

        $nyc = new \Awoods\World\GeoPoint(
            $this->data['nyc']['lat'],
            $this->data['nyc']['long']
        );

        $locator = new \Awoods\World\GeoLocator();
        $distance = $locator->calculateDistance($seattle, $nyc);

        self::assertEquals(3865.658, $distance);
    }

    public function testCalculateDistanceSeattleToSafeco()
    {
        $seattle = new \Awoods\World\GeoPoint(
            $this->data['seattle']['lat'],
            $this->data['seattle']['long']
        );

        $safeco = new \Awoods\World\GeoPoint(
            $this->data['safeco']['lat'],
            $this->data['safeco']['long']
        );

        $locator = new \Awoods\World\GeoLocator();
        $distance = $locator->calculateDistance($seattle, $safeco);

        self::assertEquals(2.216, $distance);
    }


}

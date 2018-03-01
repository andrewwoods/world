<?php
/**
 * This file is part of the World package.
 *
 * (c) Andrew Woods <andrew@andrewwoods.net>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Awoods\World;

class GeoLocator
{
    const RADIUS_KM = 6371;

    public function __construct()
    {
    }

    /**
     * Calculates the distance in kilometers between two points on the Earth
     *
     * Uses Haversine formula to calculate the distance between the two locations
     *
     * @see http://latlongdata.com/distance-calculator/
     *
     * @param GeoPoint $startPoint
     * @param GeoPoint $endPoint
     *
     * @return float
     */
    public function calculateDistance(GeoPoint $startPoint, GeoPoint $endPoint)
    {
        $start = $startPoint->getPosition();
        $end = $endPoint->getPosition();

        $latitudeDiff = deg2rad($end['latitude'] - $start['latitude']);
        $longitudeDiff = deg2rad($end['longitude'] - $start['longitude']);
        $start['latitude'] = deg2rad($start['latitude']);
        $end['latitude'] = deg2rad($end['latitude']);

        /**
         * @todo replace $a and $c with better names. Not sure what the better names should be
         */
        $a = sin($latitudeDiff/2) * sin($latitudeDiff/2) +
             sin($longitudeDiff/2) * sin($longitudeDiff/2) * cos($start['latitude']) * cos($end['latitude']);

        $c = 2 * atan2(sqrt($a), sqrt(1 - $a));
        $distance = self::RADIUS_KM * $c;

        return sprintf("%.3f", $distance);
    }
}

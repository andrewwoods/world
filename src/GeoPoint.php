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

class GeoPoint
{
    /** @var float Distance North or South from the Equator */
    protected $latitude;

    /** @var float Distance East or West from the Prime Meridian */
    protected $longitude;

    /** @var float Distance from sea level in meters. */
    protected $altitude;

    /**
     * Constructor
     *
     * @param float $latitude distance North or South from the Equator
     * @param float $longitude distance East or West from the Prime Meridian
     * @param float $altitude Optional. distance above sea level in meters
     */
    public function __construct($latitude, $longitude, $altitude = 0.0)
    {
        $this->setLatitude($latitude);
        $this->setLongitude($longitude);
        $this->setAltitude($altitude);
    }

    /**
     * Return the position
     *
     * @return array
     */
    public function getPosition()
    {
        $data = [
            'latitude' => $this->latitude,
            'longitude' => $this->longitude,
            'altitude' => $this->altitude
        ];

        return $data;
    }

    /**
     * Provides the same data as getPosition() but as a string
     *
     * @return string
     */
    public function getPositionAsString()
    {
        $data = 'Latitude: ' . $this->latitude . ', Longitude: ' . $this->longitude;
        if ($this->altitude) {
            $data .= ', Altitude: ' . $this->altitude;
        }

        return $data;
    }

    /**
     *
     * @throws \UnexpectedValueException
     *
     * @param float $latitude distance North or South from the Equator
     * @return void
     */
    protected function setLatitude($latitude)
    {
        if ($latitude > 90.0 || $latitude < -90.0) {
            throw new \UnexpectedValueException('The latitude is out of range');
        }

        $this->latitude = $latitude;
    }

    /**
     *
     * @param float $longitude distance East or West from the Prime Meridian
     *
     * @return void
     */
    protected function setLongitude($longitude)
    {
        if ($longitude > 180.0 || $longitude < -180.0) {
            throw new \UnexpectedValueException('The latitude is out of range');
        }

        $this->longitude = $longitude;
    }

    /**
     * Set the altitude
     *
     * If the altitude is zero, you've crashed or underground
     *
     * @param $altitude
     */
    protected function setAltitude($altitude)
    {
        if ($altitude < 0) {
            throw new \UnexpectedValueException('The altitude cannot be below zero');
        }

        $this->altitude = $altitude;
    }
}
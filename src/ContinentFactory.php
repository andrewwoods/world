<?php
/**
 * This is part of the World project.
 */

namespace Awoods\World;

/**
 * Class ContinentFactory
 */
class ContinentFactory
{
    const AFRICA_CODE = 'AF';
    const ANTARCTICA_CODE = 'AN';
    const ASIA_CODE = 'AS';
    const EUROPE_CODE = 'EU';
    const NORTH_AMERICA_CODE = 'NA';
    const OCEANIA_CODE = 'OC';
    const SOUTH_AMERICA_CODE = 'SA';

    public static function get($code)
    {
        $code = strtoupper($code);
        switch ($code) {
            case self::AFRICA_CODE:
            case "AFRICA":
                return new Continent(self::AFRICA_CODE, 'Africa');
                break;

            case self::ANTARCTICA_CODE:
            case "ANTARCTICA":
                return new Continent(self::ANTARCTICA_CODE, 'Antarctica');
                break;

            case self::ASIA_CODE:
            case "ASIA":
                return new Continent(self::ASIA_CODE, 'Asia');
                break;

            case self::EUROPE_CODE:
            case "EUROPE":
                return new Continent(self::EUROPE_CODE, 'Europe');
                break;

            case self::NORTH_AMERICA_CODE:
            case "NORTH AMERICA":
                return new Continent(self::NORTH_AMERICA_CODE, 'North America');
                break;

            case self::OCEANIA_CODE:
            case "OCEANIA":
                return new Continent(self::OCEANIA_CODE, 'Oceania');
                break;

            case self::SOUTH_AMERICA_CODE:
            case "SOUTH AMERICA":
            case "CENTRAL AMERICA":
                return new Continent(self::SOUTH_AMERICA_CODE, 'South and Central America');
                break;

            default:
                throw new InvalidArgumentException('Invalid Continent specified');
        }
    }
}
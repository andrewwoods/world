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
    public function get($code)
    {
        $code = strtoupper($code);
        switch ($code) {
            case "AF":
            case "AFRICA":
                return new Continent('AF', 'Africa');
                break;

            case "AN":
            case "ANTARCTICA":
                return new Continent('AN', 'Antarctica');
                break;

            case "AS":
            case "ASIA":
                return new Continent('AS', 'Asia');
                break;

            case "EU":
            case "EUROPE":
                return new Continent('EU', 'Europe');
                break;

            case "NA":
            case "NORTH AMERICA":
                return new Continent('NA', 'North America');
                break;

            case "OC":
            case "OCEANIA":
                return new Continent('OC', 'Oceania');
                break;

            case "SA":
            case "SOUTH AMERICA":
            case "CENTRAL AMERICA":
                return new Continent('SA', 'South and Central America');
                break;

            default:
                throw new InvalidArgumentException('Invalid Continent specified');
        }
    }
}
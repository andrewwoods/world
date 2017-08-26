<?php
/**
 * The CountryFactory is used to create Country objects
 *
 * @package Awoods\World
 */

namespace Awoods\World;

use UnexpectedValueException;

/**
 * Class CountryFactory
 *
 * @package Awoods\World
 */
class CountryFactory
{
    /**
     * Retrieve a country object from an country code
     *
     * @throws \UnexpectedValueException
     *
     * @param string|int $countryCode an unique identifier to represent a country
     *
     * @return SubdivisionInterface
     *
     */
    public function create($countryCode)
    {
        switch ($countryCode) {
            /*
             * Africa
             */

            /*
             * Antarctica
             */

            /*
             * Asia
             */

            /*
             * Europe
             */

            /*
             * North America
             */
            case 'US':
            case 'USA':
            case  840:
                return new UnitedStates();
                break;

            case 'CA':
            case 'CAN':
            case  124:
                return new Canada();
                break;

            case 'MX':
            case 'MEX':
            case 484:
                return new Mexico();
                break;

            /*
             * Oceania
             */

            /*
             * South and Central America
             */

            default:
                throw new UnexpectedValueException('You have provided an invalid country code');
                break;
        }
    }

    /**
     * Return list of the currently supported countries
     *
     * @return array
     */
    public function getList()
    {
        return [
            'US' => new UnitedStates(),
            'CA' => new Canada(),
            'MX' => new Mexico(),
        ];
    }
}

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
class CountryFactory {

	/**
     * Retrieve a country object from an country code
     *
	 * @throws \UnexpectedValueException
     *
	 * @param string|int $countryCode an unique identifier to represent a country
	 *
	 * @return CountryInterface
	 *
	 */
    public function create($countryCode){
        switch ($countryCode){
        	/*
        	 * English Name, French Name, Alpha-2 Code, Alpha-3 Code, Numeric Code
        	 *
        	 * United States of America (the),  États-Unis d'Amérique (les), US, USA, 840
        	 * United Kingdom of Great Britain and Northern Ireland (the), Royaume-Uni de Grande-Bretagne et d'Irlande du Nord (le), GB, GBR, 826
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
    public function getList(){
        return [
            'US'  => 'United States',
            'CA'  => 'Canada',
            'MX'  => 'Mexico',
        ];

    }
}

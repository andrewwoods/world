<?php
/**
 * @package Awoods\World
 */

namespace Awoods\World;

class CountryFactory {

	/**
	 * @throws \UnexpectedValueException
	 * @param $countryCode
	 *
	 * @return UnitedStates
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

            default:
            	throw new \UnexpectedValueException('You have provided an invalid country code');
                break;
        }
    }
}

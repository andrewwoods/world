<?php
/**
 * The CountryFactory is used to create Country objects
 *
 * @package Awoods\World
 */

namespace Awoods\World;

use UnexpectedValueException;
use Awoods\World\NA\UnitedStates;
use Awoods\World\NA\Canada;
use Awoods\World\NA\Mexico;

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
     * @throws UnexpectedValueException
     *
     * @param string $countryCode an unique identifier (ISO 3166-2 and ISO 3166-3) to represent a country
     *
     * @return Country
     */
    public static function get($countryCode)
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

            case 'AI':
            case 'AIA':
                return new Country(
                    'AI',
                    'AIA',
                    'XCD',
                    'Anguilla',
                    'Anguilla',
                    ContinentFactory::get('NA')
                );
                break;

            case 'AG':
            case 'ATG':
                return new Country(
                    'AG',
                    'ATG',
                    'XCD',
                    'Antigua & Barbuda',
                    'Antigua and Barbuda',
                    ContinentFactory::get('NA')
                );
                break;

            case 'AW':
            case 'ABW':
                return new Country(
                    'AW',
                    'ABW',
                    'AWG',
                    'Aruba',
                    'Aruba',
                    ContinentFactory::get('NA')
                );
                break;

            case 'BS':
            case 'BHS':
                return new Country(
                    'BS',
                    'BHS',
                    'BSD',
                    'Bahamas',
                    'Bahamas',
                    ContinentFactory::get('NA')
                );
                break;

            case 'BB':
            case 'BRB':
                return new Country(
                    'BB',
                    'BRB',
                    'BBD',
                    'Barbados',
                    'Barbados',
                    ContinentFactory::get('NA')
                );
                break;

            case 'BZ':
            case 'BLZ':
                return new Country(
                    'BZ',
                    'BLZ',
                    'BZD',
                    'Belize',
                    'Belize',
                    ContinentFactory::get('NA')
                );
                break;

            case 'BM':
            case 'BMU':
                return new Country(
                    'BM',
                    'BMU',
                    'BMD',
                    'Bermuda',
                    'Bermuda',
                    ContinentFactory::get('NA')
                );
                break;

            case 'VG':
            case 'VGB':
                return new Country(
                    'VG',
                    'VGB',
                    'USD',
                    'British Virgin Islands',
                    'British Virgin Islands',
                    ContinentFactory::get('NA')
                );
                break;

            case 'CA':
            case 'CAN':
                return new Canada();
                break;

            case 'BQ':
            case 'BES':
                return new Country(
                    'BQ',
                    'BES',
                    'USD',
                    'Caribbean Netherlands',
                    'Bonaire, Sint Eustatius and Saba',
                    ContinentFactory::get('NA')
                );
                break;

            case 'KY':
            case 'CYM':
                return new Country(
                    'KY',
                    'CYM',
                    'KYD',
                    'Cayman Islands',
                    'Cayman Islands',
                    ContinentFactory::get('NA')
                );
                break;

            case 'CR':
            case 'CRI':
                return new Country(
                    'CR',
                    'CRI',
                    'CRC',
                    'Costa Rica',
                    'Costa Rica',
                    ContinentFactory::get('NA')
                );
                break;

            case 'CU':
            case 'CUB':
                return new Country(
                    'CU',
                    'CUB',
                    'CUP',
                    'Cuba',
                    'Cuba',
                    ContinentFactory::get('NA')
                );
                break;

            case 'CW':
            case 'CUW':
                return new Country(
                    'CW',
                    'CUW',
                    'ANG',
                    'Curaçao',
                    'Curaçao',
                    ContinentFactory::get('NA')
                );
                break;

            case 'DM':
            case 'DMA':
                return new Country(
                    'DM',
                    'DMA',
                    'XCD',
                    'Dominica',
                    'Dominica',
                    ContinentFactory::get('NA')
                );
                break;

            case 'DO':
            case 'DOM':
                return new Country(
                    'DO',
                    'DOM',
                    'DOP',
                    'Dominican Republic',
                    'Dominican Republic',
                    ContinentFactory::get('NA')
                );
                break;

            case 'SV':
            case 'SLV':
                return new Country(
                    'SV',
                    'SLV',
                    'USD',
                    'El Salvador',
                    'El Salvador',
                    ContinentFactory::get('NA')
                );
                break;

            case 'GL':
            case 'GRL':
                return new Country(
                    'GL',
                    'GRL',
                    'DKK',
                    'Greenland',
                    'Greenland',
                    ContinentFactory::get('NA')
                );
                break;

            case 'GD':
            case 'GRD':
                return new Country(
                    'GD',
                    'GRD',
                    'XCD',
                    'Grenada',
                    'Grenada',
                    ContinentFactory::get('NA')
                );
                break;

            case 'GP':
            case 'GLP':
                return new Country(
                    'GP',
                    'GLP',
                    'EUR',
                    'Guadeloupe',
                    'Guadeloupe',
                    ContinentFactory::get('NA')
                );
                break;

            case 'GT':
            case 'GTM':
                return new Country(
                    'GT',
                    'GTM',
                    'GTQ',
                    'Guatemala',
                    'Guatemala',
                    ContinentFactory::get('NA')
                );
                break;

            case 'HT':
            case 'HTI':
                return new Country(
                    'HT',
                    'HTI',
                    'USD',
                    'Haiti',
                    'Haiti',
                    ContinentFactory::get('NA')
                );
                break;

            case 'HN':
            case 'HND':
                return new Country(
                    'HN',
                    'HND',
                    'HNL',
                    'Honduras',
                    'Honduras',
                    ContinentFactory::get('NA')
                );
                break;

            case 'JM':
            case 'JAM':
                return new Country(
                    'JM',
                    'JAM',
                    'JMD',
                    'Jamaica',
                    'Jamaica',
                    ContinentFactory::get('NA')
                );
                break;

            case 'MQ':
            case 'MTQ':
                return new Country(
                    'MQ',
                    'MTQ',
                    'EUR',
                    'Martinique',
                    'Martinique',
                    ContinentFactory::get('NA')
                );
                break;

            case 'MX':
            case 'MEX':
                return new Mexico();
                break;

            case 'MS':
            case 'MSR':
                return new Country(
                    'MS',
                    'MSR',
                    'XCD',
                    'Montserrat',
                    'Montserrat',
                    ContinentFactory::get('NA')
                );
                break;

            case 'NI':
            case 'NIC':
                return new Country(
                    'NI',
                    'NIC',
                    'NIO',
                    'Nicaragua',
                    'Nicaragua',
                    ContinentFactory::get('NA')
                );
                break;

            case 'PA':
            case 'PAN':
                return new Country(
                    'PA',
                    'PAN',
                    'USD',
                    'Panama',
                    'Panama',
                    ContinentFactory::get('NA')
                );
                break;

            case 'PR':
            case 'PRI':
                return new Country(
                    'PR',
                    'PRI',
                    'USD',
                    'Puerto Rico',
                    'Puerto Rico',
                    ContinentFactory::get('NA')
                );
                break;

            case 'SX':
            case 'SXM':
                return new Country(
                    'SX',
                    'SXM',
                    'ANG',
                    'Sint Maarten',
                    'Sint Maarten (Dutch part)',
                    ContinentFactory::get('NA')
                );
                break;

            case 'BL':
            case 'BLM':
                return new Country(
                    'BL',
                    'BLM',
                    'EUR',
                    'St. Barthélemy',
                    'Saint Barthélemy',
                    ContinentFactory::get('NA')
                );
                break;

            case 'KN':
            case 'KNA':
                return new Country(
                    'KN',
                    'KNA',
                    'XCD',
                    'St. Kitts & Nevis',
                    'Saint Kitts and Nevis',
                    ContinentFactory::get('NA')
                );
                break;

            case 'LC':
            case 'LCA':
                return new Country(
                    'LC',
                    'LCA',
                    'XCD',
                    'St. Lucia',
                    'Saint Lucia',
                    ContinentFactory::get('NA')
                );
                break;

            case 'MF':
            case 'MAF':
                return new Country(
                    'MF',
                    'MAF',
                    'EUR',
                    'St. Martin',
                    'Saint Martin (French part)',
                    ContinentFactory::get('NA')
                );
                break;

            case 'PM':
            case 'SPM':
                return new Country(
                    'PM',
                    'SPM',
                    'EUR',
                    'St. Pierre & Miquelon',
                    'Saint Pierre and Miquelon',
                    ContinentFactory::get('NA')
                );
                break;

            case 'VC':
            case 'VCT':
                return new Country(
                    'VC',
                    'VCT',
                    'XCD',
                    'St. Vincent & Grenadines',
                    'Saint Vincent and the Grenadines',
                    ContinentFactory::get('NA')
                );
                break;

            case 'TT':
            case 'TTO':
                return new Country(
                    'TT',
                    'TTO',
                    'TTD',
                    'Trinidad & Tobago',
                    'Trinidad and Tobago',
                    ContinentFactory::get('NA')
                );
                break;

            case 'TC':
            case 'TCA':
                return new Country(
                    'TC',
                    'TCA',
                    'USD',
                    'Turks & Caicos Islands',
                    'Turks and Caicos Islands',
                    ContinentFactory::get('NA')
                );
                break;

            case 'VI':
            case 'VIR':
                return new Country(
                    'VI',
                    'VIR',
                    'USD',
                    'U.S. Virgin Islands',
                    'United States Virgin Islands',
                    ContinentFactory::get('NA')
                );
                break;

            case 'US':
            case 'USA':
                return new UnitedStates();
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
     *
     */
    public function getAllCountries()
    {
        return [
            // North America
            'AI' => 'Anguilla',
            'AG' => 'Antigua & Barbuda',
            'AW' => 'Aruba',
            'BS' => 'Bahamas',
            'BB' => 'Barbados',
            'BZ' => 'Belize',
            'BM' => 'Bermuda',
            'VG' => 'British Virgin Islands',
            'CA' => 'Canada',
            'BQ' => 'Caribbean Netherlands',
            'KY' => 'Cayman Islands',
            'CR' => 'Costa Rica',
            'CU' => 'Cuba',
            'CW' => 'Curaçao',
            'DM' => 'Dominica',
            'DO' => 'Dominican Republic',
            'SV' => 'El Salvador',
            'GL' => 'Greenland',
            'GD' => 'Grenada',
            'GP' => 'Guadeloupe',
            'GT' => 'Guatemala',
            'HT' => 'Haiti',
            'HN' => 'Honduras',
            'JM' => 'Jamaica',
            'MQ' => 'Martinique',
            'MX' => 'Mexico',
            'MS' => 'Montserrat',
            'NI' => 'Nicaragua',
            'PA' => 'Panama',
            'PR' => 'Puerto Rico',
            'SX' => 'Sint Maarten',
            'BL' => 'St. Barthélemy',
            'KN' => 'St. Kitts & Nevis',
            'LC' => 'St. Lucia',
            'MF' => 'St. Martin',
            'PM' => 'St. Pierre & Miquelon',
            'VC' => 'St. Vincent & Grenadines',
            'TT' => 'Trinidad & Tobago',
            'TC' => 'Turks & Caicos Islands',
            'VI' => 'U.S. Virgin Islands',
            'US' => 'United States',
        ];
    }

    /**
     * Return list of countries with extended support. They have their own classes.
     *
     * @return array
     */
    public function getSupportedCountries()
    {
        return [
            'US' => new UnitedStates(),
            'CA' => new Canada(),
            'MX' => new Mexico(),
        ];
    }

    /**
     * Determine if a country has Postal Code and Phone Number validation support
     *
     * The countries that have support, have their own class that extends the base country class.
     *
     * @param $iso3166alpha2code
     *
     * @return bool
     */
    public static function hasPostalAndPhoneSupport($iso3166alpha2code)
    {
        $self = new self();
        $supportedCountries = array_keys($self->getSupportedCountries());

        return (in_array($iso3166alpha2code, $supportedCountries)) ? true : false;
    }
}

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
     * @throws UnexpectedValueException
     *
     * @param string $countryCode an unique identifier (ISO 3166-2 and ISO 3166-3) to represent a country
     *
     * @return Country
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
            case 'AI':
            case 'AIA':
                return new Anguilla();
                break;

            case 'AG':
            case 'ATG':
                return new AntiguaAndBarbuda();
                break;

            case 'AW':
            case 'ABW':
                return new Aruba();
                break;

            case 'BS':
            case 'BHS':
                return new Bahamas();
                break;

            case 'BB':
            case 'BRB':
                return new Barbados();
                break;

            case 'BZ':
            case 'BLZ':
                return new Belize();
                break;

            case 'BM':
            case 'BMU':
                return new Bermuda();
                break;

            case 'VG':
            case 'VGB':
                return new BritishVirginIslands();
                break;

            case 'CA':
            case 'CAN':
                return new Canada();
                break;

            case 'BQ':
            case 'BES':
                return new CaribbeanNetherlands();
                break;

            case 'KY':
            case 'CYM':
                return new CaymanIslands();
                break;

            case 'CR':
            case 'CRI':
                return new CostaRica();
                break;

            case 'CU':
            case 'CUB':
                return new Cuba();
                break;

            case 'CW':
            case 'CUW':
                return new Curacao();
                break;

            case 'DM':
            case 'DMA':
                return new Dominica();
                break;

            case 'DO':
            case 'DOM':
                return new DominicanRepublic();
                break;

            case 'SV':
            case 'SLV':
                return new ElSalvador();
                break;

            case 'GL':
            case 'GRL':
                return new Greenland();
                break;

            case 'GD':
            case 'GRD':
                return new Grenada();
                break;

            case 'GP':
            case 'GLP':
                return new Guadeloupe();
                break;

            case 'GT':
            case 'GTM':
                return new Guatemala();
                break;

            case 'HT':
            case 'HTI':
                return new Haiti();
                break;

            case 'HN':
            case 'HND':
                return new Honduras();
                break;

            case 'JM':
            case 'JAM':
                return new Jamaica();
                break;

            case 'MQ':
            case 'MTQ':
                return new Martinique();
                break;

            case 'MX':
            case 'MEX':
                return new Mexico();
                break;

            case 'MS':
            case 'MSR':
                return new Montserrat();
                break;

            case 'NI':
            case 'NIC':
                return new Nicaragua();
                break;

            case 'PA':
            case 'PAN':
                return new Panama();
                break;

            case 'PR':
            case 'PRI':
                return new PuertoRico();
                break;

            case 'SX':
            case 'SXM':
                return new SintMaarten();
                break;

            case 'BL':
            case 'BLM':
                return new StBarthelemy();
                break;

            case 'KN':
            case 'KNA':
                return new StKittsAndNevis();
                break;

            case 'LC':
            case 'LCA':
                return new StLucia();
                break;

            case 'MF':
            case 'MAF':
                return new StMartin();
                break;

            case 'PM':
            case 'SPM':
                return new StPierreAndMiquelon();
                break;

            case 'VC':
            case 'VCT':
                return new StVincentAndGrenadines();
                break;

            case 'TT':
            case 'TTO':
                return new TrinidadAndTobago();
                break;

            case 'TC':
            case 'TCA':
                return new TurksAndCaicosIslands();
                break;

            case 'VI':
            case 'VIR':
                return new USVirginIslands();
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

<?php
/**
 * This file is part of the World package.
 *
 * (c) Andrew Woods <andrew@andrewwoods.net>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Awoods\World\NA;

use Awoods\World\Country;
use Awoods\World\ContinentFactory;
use Awoods\World\SubdivisionInterface;

/**
 * Class Mexico.
 */
class Mexico extends Country implements SubdivisionInterface
{
    /**
     * Constructor.
     */
    public function __construct()
    {
        parent::__construct(
            'MX',
            'MEX',
            'MXN',
            'Mexico',
            'Mexico',
            ContinentFactory::get("NA")
        );
    }

    /**
     * @see https://en.wikipedia.org/wiki/Template:Mexico_State-Abbreviation_Codes
     */
    public function getSubdivisionList()
    {
        $data = [
            'AG' => 'Aguascalientes',
            'BN' => 'Baja California',
            'BS' => 'Baja California Sur',
            'CM' => 'Campeche',
            'CP' => 'Chiapas',
            'CH' => 'Chihuahua',
            'CA' => 'Coahuila',
            'CL' => 'Colima',
            'CX' => 'Mexico City',
            'DU' => 'Durango',
            'GJ' => 'Guanajuato',
            'GR' => 'Guerrero',
            'HI' => 'Hidalgo',
            'JA' => 'Jalisco',
            'MX' => 'México',
            'MC' => 'Michoacán',
            'MR' => 'Morelos',
            'NA' => 'Nayarit',
            'NL' => 'Nuevo León',
            'OA' => 'Oaxaca',
            'PU' => 'Puebla',
            'QE' => 'Querétaro',
            'QR' => 'Quintana Roo',
            'SL' => 'San Luis Potosí',
            'SI' => 'Sinaloa',
            'SO' => 'Sonora',
            'TB' => 'Tabasco',
            'TM' => 'Tamaulipas',
            'TL' => 'Tlaxcala',
            'VE' => 'Veracruz',
            'YU' => 'Yucatán',
            'ZA' => 'Zacatecas',
        ];

        return $data;
    }
}

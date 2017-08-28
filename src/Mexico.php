<?php
/**
 * This is part of the World project.
 *
 * @license https://opensource.org/licenses/mit-license.php MIT
 */

namespace Awoods\World;

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
            ContinentFactory::get(ContinentFactory::NORTH_AMERICA_CODE)
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
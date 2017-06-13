<?php

namespace Awoods\World;

/**
 * Represents the country of Mexico
 *
 * @package Awoods\World
 */
class Mexico implements CountryInterface
{
    /**
     * The common name of the country. The name the average person would use
     *
     * @return string
     */
    public function getName()
    {
       return 'Mexico';
    }

    /**
     * Provides the official name of the country
     *
     * @return string
     */
    public function getFullName()
    {
        return 'United Mexican States';
    }

    /**
     * @see https://en.wikipedia.org/wiki/Template:Mexico_State-Abbreviation_Codes
     */
    public function getLocalityList()
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
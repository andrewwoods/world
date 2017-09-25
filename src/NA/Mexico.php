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
    private $data = [
        ['iso' => 'MX-AGU', 'name' => 'Aguascalientes', 'prefix' => ['20']],
        ['iso' => 'MX-BCN', 'name' => 'Baja California', 'prefix' => ['21', '22']],
        ['iso' => 'MX-BCS', 'name' => 'Baja California Sur', 'prefix' => ['23']],
        ['iso' => 'MX-CAM', 'name' => 'Campeche', 'prefix' => ['24']],
        ['iso' => 'MX-CHH', 'name' => 'Chihuahua', 'prefix' => ['31', '32', '33']],
        ['iso' => 'MX-CHP', 'name' => 'Chiapas', 'prefix' => ['29', '30']],
        ['iso' => 'MX-CMX', 'name' => 'Ciudad de México', 'prefix' => ['01', '02', '03', '04', '05', '06', '07', '08', '09', '10', '11', '12', '13', '14', '15', '16']],
        ['iso' => 'MX-COA', 'name' => 'Coahuila', 'prefix' => ['25', '26', '27']],
        ['iso' => 'MX-COL', 'name' => 'Colima', 'prefix' => ['28']],
        ['iso' => 'MX-DUR', 'name' => 'Durango', 'prefix' => ['34', '35']],
        ['iso' => 'MX-GRO', 'name' => 'Guerrero', 'prefix' => ['39', '40', '41']],
        ['iso' => 'MX-GUA', 'name' => 'Guanajuato', 'prefix' => ['36', '37', '38']],
        ['iso' => 'MX-HID', 'name' => 'Hidalgo', 'prefix' => ['42', '43']],
        ['iso' => 'MX-JAL', 'name' => 'Jalisco', 'prefix' => ['44', '45', '46', '47', '48']],
        ['iso' => 'MX-MEX', 'name' => 'México', 'prefix' => ['50', '51', '52', '53', '54', '55', '56', '57']],
        ['iso' => 'MX-MIC', 'name' => 'Michoacán', 'prefix' => ['58', '59', '60', '61']],
        ['iso' => 'MX-MOR', 'name' => 'Morelos', 'prefix' => ['62']],
        ['iso' => 'MX-NAY', 'name' => 'Nayarit', 'prefix' => ['63']],
        ['iso' => 'MX-NLE', 'name' => 'Nuevo León', 'prefix' => ['64', '65', '66', '67']],
        ['iso' => 'MX-OAX', 'name' => 'Oaxaca', 'prefix' => ['68', '69', '70', '71']],
        ['iso' => 'MX-PUE', 'name' => 'Puebla', 'prefix' => ['72', '73', '74', '75']],
        ['iso' => 'MX-QUE', 'name' => 'Querétaro', 'prefix' => ['76']],
        ['iso' => 'MX-ROO', 'name' => 'Quintana Roo', 'prefix' => ['77']],
        ['iso' => 'MX-SIN', 'name' => 'Sinaloa', 'prefix' => ['80', '81', '82']],
        ['iso' => 'MX-SLP', 'name' => 'San Luis Potosí', 'prefix' => ['78', '79']],
        ['iso' => 'MX-SON', 'name' => 'Sonora', 'prefix' => ['83', '84', '85']],
        ['iso' => 'MX-TAB', 'name' => 'Tabasco', 'prefix' => ['86']],
        ['iso' => 'MX-TAM', 'name' => 'Tamaulipas', 'prefix' => ['87', '88', '89']],
        ['iso' => 'MX-TLA', 'name' => 'Tlaxcala', 'prefix' => ['90']],
        ['iso' => 'MX-VER', 'name' => 'Veracruz', 'prefix' => ['91', '92', '93', '94', '95', '96']],
        ['iso' => 'MX-YUC', 'name' => 'Yucatán', 'prefix' => ['97']],
        ['iso' => 'MX-ZAC', 'name' => 'Zacatecas', 'prefix' => ['98', '99']],
    ];

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
     * Return 31 states and the Federal District using ISO 3166-2 (subdivision) codes
     *
     * 'MX-CMX' => 'Ciudad de México' is the Federal District,
     * @see https://en.wikipedia.org/wiki/Template:Mexico_State-Abbreviation_Codes
     */
    public function getSubdivisionList()
    {
        $data = [];
        foreach ($this->data as $record){
           $data[ $record['iso'] ] = $record['name'];
        }

        return $data;
    }
}

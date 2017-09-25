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
use Awoods\World\PostalCodeInterface;
use Awoods\World\SubdivisionInterface;
use BadMethodCallException;

/**
 * Class Mexico.
 *
 * @see https://gist.githubusercontent.com/matthewbednarski/4d15c7f50258b82e2d7e/raw/bbbe9c50acb24c6930e19e3b0a1951b00a1aebfb/postal-codes.json
 * @see https://en.youbianku.com/Mexico
 */
class Mexico extends Country implements SubdivisionInterface, PostalCodeInterface
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

    private $postalState;

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


    /**
     * Verify if the value provided looks like a valid Postal code
     *
     * The postal code system used in Mexico is loosely based on the United States ZIP code system.
     *
     * @param string $postalCode
     *
     * @return bool
     */
    public function isPostalCodeValid($postalCode)
    {
        $matches = [];
        $stateToCodes = [];

        preg_match('/^\d{5}$/', $postalCode, $matches);

        if (isset($matches[0]) && $postalCode === $matches[0]) {
            return true;
        }

        return false;
    }

    /**
     * Verify if the looks like a strictly valid Postal code
     *
     * Similar to isPostalCodeValid, but also checks if the first two digits of the postal code correspond to the state.
     *
     * Example 02860
     *
     * 02=state or province
     * 8=zone or commune
     * 60=locality, district or quarter
     *
     * @see self::setPostalCodeState()
     *
     * @throws BadMethodCallException
     *
     * @param string $postalCode
     *
     * @return bool
     */
    public function isPostalCodeStrictValid($postalCode)
    {
        if (empty($this->postalState)){
            throw new BadMethodCallException('Call the setPostalState method before calling this');
        }

        $matches = [];
        preg_match('/^(\d\d)\d\d\d$/', $postalCode, $matches);

        if (isset($matches[0]) && $postalCode === $matches[0]) {
            $state = $matches[1];
            $record = $this->findRecordByState($this->postalState);

            if (isset($record['prefix']) && in_array($state, $record['prefix'])){
                return true;
            }

            return false;
        }

        return false;
    }

    /**
     * Look through the data array and retrieve the record for the matching state
     *
     * @param $state
     * @return array
     */
    protected function findRecordByState($state)
    {
        foreach ($this->data as $record)
        {
            if ($state === $record['iso'] || $state === $record['name']){
                return $record;
            }
        }

        return [];
    }

    /**
     * This must be called before isPostalCodeStrictValid, since the 1st 2 digits of the postal code correspond to the state
     *
     * @param $state
     */
    public function setPostalCodeState($state){
        $this->postalState = $state;
    }
}

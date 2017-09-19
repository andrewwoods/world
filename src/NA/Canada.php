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
use Awoods\World\Traits\NorthAmericanPhoneNumber;
use Awoods\World\SubdivisionInterface;
use Awoods\World\PostalCodeInterface;

/**
 * Class Canada.
 */
class Canada extends Country implements SubdivisionInterface, PostalCodeInterface
{
    use NorthAmericanPhoneNumber;

    /**
     * Constructor.
     */
    public function __construct()
    {
        parent::__construct(
            'CA',
            'CAN',
            'CAD',
            'Canada',
            'Canada',
            ContinentFactory::get("NA")
        );
    }

    /**
     * Return a combined list of provinces and territories
     *
     * @return array
     */
    public function getSubdivisionList()
    {
        $provinces   = $this->getProvinces();
        $territories = $this->getTerritories();

        $all = array_merge($provinces, $territories);
        sort($all);

        return $all;
    }

    /**
     * List all the canadian provinces.
     *
     * @return array
     */
    public function getProvinces(){
        return [
            'AB' => 'Alberta',
            'BC' => 'British Columbia',
            'MB' => 'Manitoba',
            'NB' => 'New Brunswick',
            'NL' => 'Newfoundland and Labrador',
            'NS' => 'Nova Scotia',
            'ON' => 'Ontario',
            'PE' => 'Prince Edward Island',
            'QC' => 'Quebec',
            'SK' => 'Saskatchewan',
        ];
    }

    /**
     * List of canadian territories
     *
     * @return array
     */
    public function getTerritories(){
        return [
            'NT' => 'Northwest Territories',
            'NU' => 'Nunavut',
            'YT' => 'Yukon'
        ];
    }


    /**
     * Check if a postal code complies with the Canadian postal format
     *
     * Are lower case letters allowed? Not sure but I'm allowing them in the spirit of the Robustness Principle
     *
     * @see https://en.wikipedia.org/wiki/Robustness_principle
     *
     * @param string $postalCode
     * @return bool
     */
    public function isPostalCodeValid( $postalCode ) {

        $postalCode = strtoupper($postalCode);

        $simpleRegex = '/^\w\d\w \d\w\d$/';
        preg_match($simpleRegex, $postalCode, $matches);

        if (isset($matches[0]) && $postalCode === $matches[0]){
            return true;
        }

        return false;
    }



    /**
     * Check if a postal code complies with the Canadian postal format
     *
     * Only validates successfully with UPPER CASE letters. Also checks
     * the correctness of character values.
     *
     * @see Canada::isPostalCodeValid()
     *
     * @param string $postalCode
     * @return bool
     */
    public function isPostalCodeStrictValid( $postalCode ) {

        $simpleRegex = '/^[ACEGHJKLMNPRSTVXY]\d\w \d\w\d$/';
        preg_match($simpleRegex, $postalCode, $matches);

        if (isset($matches[0]) && $postalCode === $matches[0]){
            return true;
        }

        return false;
    }

}

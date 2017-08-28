<?php
/**
 * This is part of the World project.
 *
 * @license https://opensource.org/licenses/mit-license.php MIT
 */

namespace Awoods\World;

use Awoods\World\Traits\NorthAmericanPhoneNumber;

/**
 * Class UnitedStates.
 */
class UnitedStates extends Country implements SubdivisionInterface, PostalCodeInterface
{
    use NorthAmericanPhoneNumber;

    /**
     * UnitedStates constructor.
     */
    public function __construct()
    {
        parent::__construct(
            'US',
            'USA',
            'USD',
            'United States',
            'United States of America',
            ContinentFactory::get(ContinentFactory::NORTH_AMERICA_CODE)
        );
    }

    /**
     * Return a list of all states plus Washington DC
     *
     * @return array
     */
    public function getSubdivisionList()
    {
        return $this->getStates(true);
    }

    /**
     * Retrieve a list of US States
     *
     * Washington DC is a district, not a state, but sometimes it is included
     * in state select/drop-down lists.
     *
     *
     * @param bool $includeDC determine if you want to include Washington DC
     *
     * @return array
     */
    public function getStates($includeDC = false)
    {
        $data = [
            'AL' => 'Alabama',
            'AK' => 'Alaska',
            'AZ' => 'Arizona',
            'AR' => 'Arkansas',
            'CA' => 'California',
            'CO' => 'Colorado',
            'CT' => 'Connecticut',
            'DE' => 'Delaware',
            'FL' => 'Florida',
            'GA' => 'Georgia',
            'HI' => 'Hawaii',
            'ID' => 'Idaho',
            'IL' => 'Illinois',
            'IN' => 'Indiana',
            'IA' => 'Iowa',
            'KS' => 'Kansas',
            'KY' => 'Kentucky',
            'LA' => 'Louisiana',
            'ME' => 'Maine',
            'MD' => 'Maryland',
            'MA' => 'Massachusetts',
            'MI' => 'Michigan',
            'MN' => 'Minnesota',
            'MS' => 'Mississippi',
            'MO' => 'Missouri',
            'MT' => 'Montana',
            'NE' => 'Nebraska',
            'NV' => 'Nevada',
            'NH' => 'New Hampshire',
            'NJ' => 'New Jersey',
            'NM' => 'New Mexico',
            'NY' => 'New York',
            'NC' => 'North Carolina',
            'ND' => 'North Dakota',
            'OH' => 'Ohio',
            'OK' => 'Oklahoma',
            'OR' => 'Oregon',
            'PA' => 'Pennsylvania',
            'RI' => 'Rhode Island',
            'SC' => 'South Carolina',
            'SD' => 'South Dakota',
            'TN' => 'Tennessee',
            'TX' => 'Texas',
            'UT' => 'Utah',
            'VT' => 'Vermont',
            'VA' => 'Virginia',
            'WA' => 'Washington',
            'WV' => 'West Virginia',
            'WI' => 'Wisconsin',
            'WY' => 'Wyoming',
        ];

        if ($includeDC) {
            $data['DC'] = 'District of Columbia';
        }

        return $data;
    }

    /**
     * Verify if the value provided looks like a valid ZIP code
     *
     * The postal code system used in the United States of America is called ZIP Code.
     * ZIP is abbreviation from Zone Improvement Program. US ZIP codes were introduced in 1963
     * to improve mail delivery, make it more efficiently, quickly and simplify it.
     *
     * @see http://www.zippostalcodes.com/postcodes/us/us-zip-codes-format/
     *
     * @param string $postalCode
     *
     * @return bool
     */
    public function isPostalCodeValid($postalCode)
    {
        $matches = [];

        preg_match('/^\d{5}(?:-\d{4})?$/', $postalCode, $matches);

        if (isset($matches[0]) && $postalCode === $matches[0]) {
            return true;
        }

        return false;
    }

    /**
     * Verify if the value provided looks like a valid ZIP code
     *
     * In the US, There are no specific digits that are illegal for a ZIP Code
     * So this method is just a wrapper for isPostalCodeValid
     *
     * @see UnitedStates::isPostalCodeValid()
     *
     * @param string $postalCode
     *
     * @return bool
     */
    public function isPostalCodeStrictValid($postalCode)
    {
        return $this->isPostalCodeValid($postalCode);
    }
}


<?php
/**
 * This is part of the World project.
 *
 * @license https://opensource.org/licenses/mit-license.php MIT
 */
namespace Awoods\World;

use Awoods\World\Traits\NorthAmericanPhoneNumber;

/**
 * Class Canada.
 */
class Canada extends Country implements SubdivisionInterface, PostalCodeInterface {

	use NorthAmericanPhoneNumber;

	public function __construct()
    {
        parent::__construct(
            'CA',
            'CAN',
            'CAD',
            'Canada',
            'Canada',
            ContinentFactory::get(ContinentFactory::NORTH_AMERICA_CODE)
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
